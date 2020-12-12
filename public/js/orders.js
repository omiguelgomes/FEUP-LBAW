function addOrderEventListeners() {
  let stateUpdaters = document.getElementsByClassName("purchaseUpdater");
  [].forEach.call(stateUpdaters, function (updater) {
    updater.addEventListener("change", sendUpdateRequest);
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

function sendUpdateRequest(event) {
  event.preventDefault();
  let idform = this.getAttribute("id");
  let id = idform.split("-")[1];
  let state = document.getElementById("order-" + id).value;

  sendAjaxRequest(
    "post",
    "admin/orders/update/" + id, {
      state: state
    },
    updateHandler
  );
}

function updateHandler() {
  if (this.status != 200) {
    window.location = "/admin";
    alert("Failed to update purchase :'(");
  }

  let purchase = JSON.parse(this.responseText);
  myAlert("Updated state of purchase #" + purchase.id);
}