$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});

function addSalesEventListeners() {
  let deleters = document.getElementsByClassName("saleDelete");
  [].forEach.call(deleters, function (deleter) {
    deleter.addEventListener("click", sendSaleDeleteRequest);
  });
}

function encodeForAjax(data) {
  if (data == null) return null;
  return Object.keys(data)
    .map(function (k) {
      return encodeURIComponent(k) + "=" + encodeURIComponent(data[k]);
    })
    .join("&");
}

function sendAjaxRequest(method, url, data, handler) {
  let request = new XMLHttpRequest();

  request.open(method, url, true);
  request.setRequestHeader(
    "X-CSRF-TOKEN",
    document.querySelector('meta[name="csrf-token"]').content
  );
  request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  request.addEventListener("load", handler);
  request.send(encodeForAjax(data));
}

function sendSaleDeleteRequest(event) {
  event.preventDefault();
  let id = this.getAttribute("value");

  if (confirm("Are you sure you want to delete this sale event?"))
    sendAjaxRequest(
      "delete",
      "admin/sale/delete/" + id,
      null,
      saleDeleteHandler
    );
}

function saleDeleteHandler() {
  console.log("h");
  if (this.status != 200) {
    window.location = "/admin";
    alert("Failed to delete the Sale :'(");
  }

  let item = JSON.parse(this.responseText);
  let element = document.getElementById("sale-" + item.id);
  element.remove();
}
