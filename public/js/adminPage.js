function addEventListeners() {

  let url = window.location.href;
  if (url.indexOf('adminAccounts') != -1) {
    document.addEventListener("DOMContentLoaded", showAdminAccounts);
  } else if (url.indexOf('orders') != -1) {
    document.addEventListener("DOMContentLoaded", showOrders);
  } else if (url.indexOf('products') != -1) {
    document.addEventListener("DOMContentLoaded", showProducts);
  } else if (url.indexOf('cpu') != -1) {
    document.addEventListener("DOMContentLoaded", showCPUs);
  } else if (url.indexOf('ram') != -1) {
    document.addEventListener("DOMContentLoaded", showRAMs);
  } else if (url.indexOf('waterres') != -1) {
    document.addEventListener("DOMContentLoaded", showWaters);
  } else if (url.indexOf('os') != -1) {
    document.addEventListener("DOMContentLoaded", showOSs);
  } else if (url.indexOf('gpu') != -1) {
    document.addEventListener("DOMContentLoaded", showGPUs);
  } else if (url.indexOf('screensize') != -1) {
    document.addEventListener("DOMContentLoaded", showScreenSizes);
  } else if (url.indexOf('weight') != -1) {
    document.addEventListener("DOMContentLoaded", showWeights);
  } else if (url.indexOf('storage') != -1) {
    document.addEventListener("DOMContentLoaded", showStorages);
  } else if (url.indexOf('battery') != -1) {
    document.addEventListener("DOMContentLoaded", showBatteries);
  } else if (url.indexOf('brand') != -1) {
    document.addEventListener("DOMContentLoaded", showBrands);
  } else if (url.indexOf('screenres') != -1) {
    document.addEventListener("DOMContentLoaded", showScreenRess);
  } else if (url.indexOf('camres') != -1) {
    document.addEventListener("DOMContentLoaded", showCameraRess);
  } else if (url.indexOf('fingerprint') != -1) {
    document.addEventListener("DOMContentLoaded", showFingerprints);
  } else if (url.indexOf('faq') != -1) {
    document.addEventListener("DOMContentLoaded", showFaqs);
  } else if (url.indexOf('banner') != -1) {
    document.addEventListener("DOMContentLoaded", showBanners);
  } else if (url.indexOf('users') != -1) {
    document.addEventListener("DOMContentLoaded", showUserAccounts);
  } else {
    // document.addEventListener("DOMContentLoaded", showD);
    console.log("none found");
    document.addEventListener("DOMContentLoaded", showUserAccounts);
  }


  document
    .getElementById("userAccountsButton")
    .addEventListener("click", showUserAccounts);
  document
    .getElementById("adminAccountsButton")
    .addEventListener("click", showAdminAccounts);
  document.getElementById("ordersButton").addEventListener("click", showOrders);
  document
    .getElementById("productsButton")
    .addEventListener("click", showProducts);
  document.getElementById("salesButton").addEventListener("click", showSales);
  document.getElementById("brandsButton").addEventListener("click", showBrands);
  document.getElementById("cpusButton").addEventListener("click", showCPUs);
  document.getElementById("ramsButton").addEventListener("click", showRAMs);
  document.getElementById("watersButton").addEventListener("click", showWaters);
  document.getElementById("ossButton").addEventListener("click", showOSs);
  document.getElementById("gpusButton").addEventListener("click", showGPUs);
  document
    .getElementById("screensizesButton")
    .addEventListener("click", showScreenSizes);
  document
    .getElementById("weightsButton")
    .addEventListener("click", showWeights);
  document
    .getElementById("storagesButton")
    .addEventListener("click", showStorages);
  document
    .getElementById("batteriesButton")
    .addEventListener("click", showBatteries);
  document
    .getElementById("screenressButton")
    .addEventListener("click", showScreenRess);
  document
    .getElementById("cameraressButton")
    .addEventListener("click", showCameraRess);
  document
    .getElementById("fingerprintsButton")
    .addEventListener("click", showFingerprints);
  document
    .getElementById("bannersButton")
    .addEventListener("click", showBanners);
  document.getElementById("faqsButton").addEventListener("click", showFaqs);
}

//puts the specified div inside the main container of the admin page
function fillMainContainer(divId) {
  document.getElementById("mainContainer").innerHTML = document.getElementById(
    divId
  ).innerHTML;
}

function showUserAccounts() {
  fillMainContainer("userAccounts");
  addUserEventListeners();
}

function showAdminAccounts() {
  fillMainContainer("adminAccounts");
  addUserEventListeners();
}

function showOrders() {
  fillMainContainer("orders");
  addOrderEventListeners();
}

function showProducts() {
  fillMainContainer("products");
  addProductEventListeners();
}

function showSales() {
  fillMainContainer("sales");
  addSalesEventListeners();
}

function showBrands() {
  fillMainContainer("brands");
  addBrandEventListeners();
}

function showCPUs() {
  fillMainContainer("cpus");
  addCPUEventListeners();
}

function showRAMs() {
  fillMainContainer("rams");
  addRAMEventListeners();
}

function showWaters() {
  fillMainContainer("waters");
  addWaterEventListeners();
}

function showOSs() {
  fillMainContainer("oss");
  addOSEventListeners();
}

function showGPUs() {
  fillMainContainer("gpus");
  addGPUEventListeners();
}

function showScreenSizes() {
  fillMainContainer("screensizes");
  addScreenSizeEventListeners();
}

function showWeights() {
  fillMainContainer("weights");
  addWeightEventListeners();
}

function showStorages() {
  fillMainContainer("storages");
  addStorageEventListeners();
}

function showBatteries() {
  fillMainContainer("batteries");
  addBatteryEventListeners();
}

function showScreenRess() {
  fillMainContainer("screenress");
  addScreenResEventListeners();
}

function showCameraRess() {
  fillMainContainer("cameraress");
  addCameraResEventListeners();
}

function showFingerprints() {
  fillMainContainer("fingerprints");
  addFingerprintEventListeners();
}

function showBanners() {
  fillMainContainer("banners");
  //addBannerEventListeners();
}

function showFaqs() {
  fillMainContainer("faqs");
  addFaqEventListeners();
}

function openNav() {
  document.getElementById("mySidenav").style.width = "350px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

addEventListeners();