$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});

function addEventListeners() {
  let creators = document.getElementsByClassName("waterForm");
  [].forEach.call(creators, function (creator) {
    creator.addEventListener("submit", sendWaterCreateRequest);
  });

  let deleters = document.getElementsByClassName("waterDelete");
  [].forEach.call(deleters, function (deleter) {
    deleter.addEventListener("click", sendWaterDeleteRequest);
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

function sendWaterCreateRequest(event) {
  event.preventDefault();
  let value = this.querySelector("input[name=inputWaterName]").value;

  sendAjaxRequest(
    "post",
    "admin/water/add",
    {
      value: value,
    },
    waterCreateHandler
  );
}

function sendWaterDeleteRequest(event) {
  event.preventDefault();
  let id = this.getAttribute("value");

  if (confirm("Are you sure you want to delete this Rating?"))
    sendAjaxRequest(
      "delete",
      "admin/water/delete/" + id,
      null,
      waterDeleteHandler
    );
}

function waterCreateHandler() {
  if (this.status != 201) {
    window.location = "/admin";
    alert("Failed to create Rating :'(");
  }

  //controller function to create brand returns the elem it created in a JSON
  let item = JSON.parse(this.responseText);

  //create the html for the brand and put new brand item in top
  let new_item = createItem(item);
  let table = document.querySelector("tbody.waterTableBody");
  table.prepend(new_item);
}

function waterDeleteHandler() {
  if (this.status == 555) {
    alert(this.responseText);
  } else if (this.status != 200) {
    window.location = "/admin";
    alert("Failed to delete Rating :'(");
  }

  let item = JSON.parse(this.responseText);
  let element = document.getElementById("water-" + item.id);
  element.remove();
}

function createItem(item) {
  let new_item = document.createElement("tr");
  new_item.classList.add("water");
  new_item.setAttribute("id", "water-" + item.id);
  new_item.innerHTML = `
      <td>${item.value}</td>
          <td><a value="${item.id}" class="waterDelete thumbnail">
              <i class="far fa-times-circle fa-2x ml-4 text-danger"></i>
      </a> </td>
      `;

  new_item
    .querySelector("a.waterDelete")
    .addEventListener("click", sendWaterDeleteRequest);

  return new_item;
}

addEventListeners();
