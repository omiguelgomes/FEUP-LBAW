$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});

function addProductEventListeners() {
  let productCheckers = document.getElementsByClassName("productForm");
  [].forEach.call(productCheckers, function (checker) {
    checker.addEventListener("submit", sendProductUpdateRequest);
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

function sendProductUpdateRequest(event) {
  event.preventDefault();
  let url = this.closest("form").getAttribute("action");
  let stock = this.querySelector("input[name=inputStock]").value;

  axios
    .post(url, {
      stock: stock,
    })
    .then(function (response) {
      alert("Complete!");
    });
}