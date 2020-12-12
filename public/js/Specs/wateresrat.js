$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});

function addWaterEventListeners() {
  let creators = document.getElementsByClassName("waterForm");
  [].forEach.call(creators, function (creator) {
    creator.addEventListener("submit", sendWaterCreateRequest);
  });

  let deleters = document.getElementsByClassName("waterDelete");
  [].forEach.call(deleters, function (deleter) {
    deleter.addEventListener("click", sendWaterDeleteRequest);
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

function sendWaterCreateRequest(event) {
  event.preventDefault();
  let value = this.querySelector("input[name=inputWaterName]").value;

  sendAjaxRequest(
    "post",
    "admin/water/add", {
      value: value,
    },
    waterCreateHandler
  );
}

function sendWaterDeleteRequest(event) {
  event.preventDefault();
  let id = this.getAttribute("value");

  document.getElementsByClassName('modal-title')[0].innerHTML = "Are you sure you want to delete this Fingerprint type?";
  document.getElementById('modal-confirm').addEventListener('click', function () {
    sendAjaxRequest(
      "delete",
      "admin/water/delete/" + id,
      null,
      waterDeleteHandler
    );
  });
}

function waterCreateHandler() {
  if (this.status != 201) {
    myErrorAlert("Failed to create Rating :'(");
  }

  //controller function to create brand returns the elem it created in a JSON
  let item = JSON.parse(this.responseText);

  //create the html for the brand and put new brand item in top
  let new_item = createWaterRes(item);
  let table = document.querySelector("tbody.waterTableBody");
  table.prepend(new_item);

  myAlert('Created water resistance rating successfully!');
}

function waterDeleteHandler() {
  if (this.status == 555) {
    myErrorAlert(this.responseText);
  } else if (this.status != 200) {
    myErrorAlert("Failed to delete Rating :'(");
  } else {
    let item = JSON.parse(this.responseText);
    let element = document.getElementById("water-" + item.id);
    element.remove();
    myAlert('Water resistance rating deleted successfully!');
  }

}

function createWaterRes(item) {
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

  //make modal appear when button is clicked
  new_item.setAttribute('data-toggle', 'modal');
  new_item.setAttribute('data-target', '#exampleModal');

  return new_item;
}