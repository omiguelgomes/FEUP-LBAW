$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});

function addBatteryEventListeners() {
  let creators = document.getElementsByClassName("btForm");
  [].forEach.call(creators, function (creator) {
    creator.addEventListener("submit", sendItemCreateRequest);
  });

  let deleters = document.getElementsByClassName("btDelete");
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
  let value = this.querySelector("input[name=inputBtName]").value;

  sendAjaxRequest(
    "post",
    "admin/battery/add", {
      value: value,
    },
    itemCreateHandler
  );
}

function sendItemDeleteRequest(event) {
  event.preventDefault();
  let id = this.getAttribute("value");

  if (confirm("Are you sure you want to delete this battery?"))
    sendAjaxRequest(
      "delete",
      "admin/battery/delete/" + id,
      null,
      itemDeleteHandler
    );
}

function itemCreateHandler() {
  if (this.status != 201) {
    window.location = "/admin";
    alert("Failed to create battery :'(");
  }

  //controller function to create brand returns the elem it created in a JSON
  let item = JSON.parse(this.responseText);

  //create the html for the brand and put new brand item in top
  let new_item = createItem(item);
  let table = document.querySelector("tbody.btTableBody");
  table.prepend(new_item);
}

function itemDeleteHandler() {
  if (this.status == 555) {
    alert(this.responseText);
  } else if (this.status != 200) {
    window.location = "/admin";
    alert("Failed to delete battery :'(");
  }

  let item = JSON.parse(this.responseText);
  let element = document.getElementById("bt-" + item.id);
  element.remove();
}

function createItem(item) {
  let new_item = document.createElement("tr");
  new_item.classList.add("bt");
  new_item.setAttribute("id", "bt-" + item.id);
  new_item.innerHTML = `
                  <td>${item.value}</td>
                      <td><a value="${item.id}" class="btDelete thumbnail">
                          <i class="far fa-times-circle fa-2x ml-4 text-danger"></i>
                  </a> </td>
                  `;

  new_item
    .querySelector("a.btDelete")
    .addEventListener("click", sendItemDeleteRequest);

  return new_item;
}