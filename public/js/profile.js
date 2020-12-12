function addProfileEventListeners() {
  document.getElementById("edit").addEventListener("click", function () {
    //disable readonly on input boxes
    let inputs = document.getElementsByTagName("input");
    [].forEach.call(inputs, function (input) {
      input.removeAttribute("readonly");
    });
    //enable change button
    document.getElementById("change").removeAttribute("disabled");

    //enable upload photo button
    document.getElementById("fileInput").removeAttribute("disabled");

  });

  document
    .getElementById("deleteUser")
    .addEventListener("click", sendDeleteRequest);
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

function sendDeleteRequest(event) {
  event.preventDefault();
  let id = this.getAttribute("value");

  if (confirm("Are you sure you want to delete your account?"))
    sendAjaxRequest("delete", "admin/users/delete/" + id, null, handleDelete);
}

function handleDelete() {
  if (this.status != 200) {
    alert("Failed to delete user :'(");
  }

  window.location = "/home";
}

addProfileEventListeners();