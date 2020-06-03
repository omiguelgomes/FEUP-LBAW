$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});

function addSalesEventListeners() {
  let deleters = document.getElementsByClassName("saleDelete");
  [].forEach.call(deleters, function (deleter) {
    deleter.addEventListener("click", sendSaleDeleteRequest);
    //make modal appear when button is clicked
    deleter.setAttribute('data-toggle', 'modal');
    deleter.setAttribute('data-target', '#exampleModal');
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

  document.getElementsByClassName('modal-title')[0].innerHTML = "Are you sure you want to delete this sale?";
  document.getElementById('modal-confirm').addEventListener('click', function () {
    sendAjaxRequest(
      "delete",
      "admin/sale/delete/" + id,
      null,
      saleDeleteHandler
    );
  });
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