$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});

function addPWEventListeners() {
  let deleters = document.getElementsByClassName("recover");
  [].forEach.call(deleters, function (deleter) {
    deleter.addEventListener("submit", sendPassRequest);
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

function sendPassRequest(event) {
  event.preventDefault();
  let email = this.querySelector("input[name=email]").value;

  if (confirm("Are you sure you want to request a password recovery?"))
    sendAjaxRequest(
      "post",
      "email_verify/",
      {
        email: email,
      },
      recoveryHandler
    );
}

function recoveryHandler() {
  if (this.status == 555) {
    alert(this.responseText);
  } else {
    window.location = "/login";
  }
}

addPWEventListeners();
