function addBrandEventListeners() {
  let productDeleters = document.getElementsByClassName("brandDelete");
  [].forEach.call(productDeleters, function (deleter) {
    deleter.addEventListener("click", sendBrandDeleteRequest);

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

function sendBrandCreateRequest(event) {
  event.preventDefault();
  let name = this.querySelector("input[name=inputBrandName]").value;
  let file = this.querySelector("input[name=inputBrandFile]").files[0];
  let data = new FormData(this);

  console.log(data.get("inputBrandFile"));
  sendAjaxRequest(
    "post",
    "admin/brands/add", {
      inputBrandName: data.get("inputBrandName"),
      inputBrandFile: file,
    },
    brandCreateHandler
  );
}

function sendBrandDeleteRequest(event) {
  var oldModal = document.getElementsByClassName("modal")[0];
  var modal = oldModal.cloneNode(true);
  oldModal.parentNode.replaceChild(modal, oldModal);

  event.preventDefault();
  let id = this.getAttribute("value");

  document.getElementsByClassName('modal-title')[0].innerHTML = "Do you want to delete this brand?";

  document.getElementById('modal-confirm').addEventListener('click', function () {
    sendAjaxRequest(
      "delete",
      "admin/brands/delete/" + id,
      null,
      brandDeleteHandler
    );
  });
}

function brandCreateHandler() {
  console.log(this.responseText);
  if (this.status != 200) {
    alert("Failed to create brand :'(");
  }

  //controller function to create brand returns the elem it created in a JSON
  let brand = JSON.parse(this.responseText);

  //create the html for the brand and put new brand item in top
  let new_brand = createBrand(brand);
  let table = document.getElementsByClassName("brandTableBody");
  table.preprend(new_brand);

  //clean form fields
  let name = this.querySelector("input[name=inputBrandName]");
  let file = this.querySelector("input[name=inputBrandFile]");
  name.value = "";
  file.value = "";
}

function brandDeleteHandler() {
  if (this.status == 555) {
    myErrorAlert(this.responseText);
  } else if (this.status != 200) {
    myErrorAlert("Failed to delete brand :'(");
  }

  let brand = JSON.parse(this.responseText);
  let element = document.getElementById("brand-" + brand.id);
  element.remove();

  myAlert("Deleted " + brand.name);
}

function createBrand(brand) {
  let new_brand = document.createElement("tr");
  new_brand.classList.add("brand");
  new_brand.setAttribute("id", "brand-" + brand.id);
  new_brand.innerHTML = `<td>${brand.name}</td>
        <td><a class="brandDelete thumbnail">
            <i class="far fa-times-circle fa-2x ml-4"></i>
    </a> </td>`;

  new_item
    .querySelector("a.brandDelete")
    .addEventListener("click", sendBrandDeleteRequest);

  return new_item;
}