$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});

function addOSEventListeners() {
  let creators = document.getElementsByClassName("osForm");
  [].forEach.call(creators, function (creator) {
    creator.addEventListener("submit", sendOSCreateRequest);
  });

  let deleters = document.getElementsByClassName("osDelete");
  [].forEach.call(deleters, function (deleter) {
    deleter.addEventListener("click", sendOSDeleteRequest);
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

function sendOSCreateRequest(event) {
  event.preventDefault();
  let value = this.querySelector("input[name=inputOsName]").value;
  console.log(value);
  sendAjaxRequest(
    "post",
    "admin/os/add", {
      value: value,
    },
    OSCreateHandler
  );
}

function sendOSDeleteRequest(event) {
  event.preventDefault();
  let id = this.getAttribute("value");

  document.getElementsByClassName('modal-title')[0].innerHTML = "Are you sure you want to delete this OS?";
  document.getElementById('modal-confirm').addEventListener('click', function () {
    sendAjaxRequest("delete", "admin/os/delete/" + id, null, OSDeleteHandler);
  });
}

function OSCreateHandler() {
  if (this.status != 201) {
    myErrorAlert("Failed to create OS :'(");
  }

  //controller function to create brand returns the elem it created in a JSON
  let item = JSON.parse(this.responseText);

  //create the html for the brand and put new brand item in top
  let new_item = createOS(item);
  let table = document.querySelector("tbody.osTableBody");
  table.prepend(new_item);

  myAlert('Created OS successfully!');

}

function OSDeleteHandler() {
  if (this.status == 555) {
    myErrorAlert(this.responseText);
  } else if (this.status != 200) {
    myErrorAlert("Failed to delete OS :'(");
  } else {
    let item = JSON.parse(this.responseText);
    let element = document.getElementById("os-" + item.id);
    element.remove();
    myAlert('OS deleted successfully!');

  }
}

function createOS(item) {
  let new_item = document.createElement("tr");
  new_item.classList.add("os");
  new_item.setAttribute("id", "os-" + item.id);
  new_item.innerHTML = `
        <td>${item.name}</td>
            <td><a value="${item.id}" class="osDelete thumbnail">
                <i class="far fa-times-circle fa-2x ml-4 text-danger"></i>
        </a> </td>
        `;

  new_item
    .querySelector("a.osDelete")
    .addEventListener("click", sendOSDeleteRequest);
  //make modal appear when button is clicked
  new_item.setAttribute('data-toggle', 'modal');
  new_item.setAttribute('data-target', '#exampleModal');

  return new_item;
}