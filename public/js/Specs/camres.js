$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});

function addCameraResEventListeners() {
  let creators = document.getElementsByClassName("camForm");
  [].forEach.call(creators, function (creator) {
    creator.addEventListener("submit", sendItemCreateRequest);
  });

  let deleters = document.getElementsByClassName("camDelete");
  [].forEach.call(deleters, function (deleter) {
    deleter.addEventListener("click", sendItemDeleteRequest);
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

function sendItemCreateRequest(event) {
  event.preventDefault();
  let value = this.querySelector("input[name=inputCamName]").value;

  sendAjaxRequest(
    "post",
    "admin/cam/add", {
      value: value,
    },
    itemCreateHandler
  );
}

function sendItemDeleteRequest(event) {
  event.preventDefault();
  let id = this.getAttribute("value");

  if (confirm("Are you sure you want to delete this camera resolution?"))
    sendAjaxRequest(
      "delete",
      "admin/cam/delete/" + id,
      null,
      itemDeleteHandler
    );
}

function itemCreateHandler() {
  if (this.status != 201) {
    window.location = "/admin";
    alert("Failed to create camera resolution :'(");
  }

  //controller function to create brand returns the elem it created in a JSON
  let item = JSON.parse(this.responseText);

  //create the html for the brand and put new brand item in top
  let new_item = createItem(item);
  let table = document.querySelector("tbody.camTableBody");
  table.prepend(new_item);
}

function itemDeleteHandler() {
  if (this.status == 555) {
    alert(this.responseText);
  } else if (this.status != 200) {
    window.location = "/admin";
    alert("Failed to delete camera resolution :'(");
  }

  let item = JSON.parse(this.responseText);
  let element = document.getElementById("cam-" + item.id);
  element.remove();
}

function createItem(item) {
  let new_item = document.createElement("tr");
  new_item.classList.add("cam");
  new_item.setAttribute("id", "cam-" + item.id);
  new_item.innerHTML = `
                      <td>${item.value}</td>
                          <td><a value="${item.id}" class="camDelete thumbnail">
                              <i class="far fa-times-circle fa-2x ml-4 text-danger"></i>
                      </a> </td>
                      `;

  new_item
    .querySelector("a.camDelete")
    .addEventListener("click", sendItemDeleteRequest);

  return new_item;
}