function addEventListeners() {
  //user list is the default tab open, so the event listeners have to be called when the page loads
  document.addEventListener('DOMContentLoaded',
    showUserAccounts
  );

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
  document.getElementById("screensizesButton").addEventListener("click", showScreenSizes);
  document.getElementById("weightsButton").addEventListener("click", showWeights);
  document.getElementById("storagesButton").addEventListener("click", showStorages);
  document.getElementById("batteriesButton").addEventListener("click", showBatteries);
  document.getElementById("screenressButton").addEventListener("click", showScreenRess);
  document.getElementById("cameraressButton").addEventListener("click", showCameraRess);
  document.getElementById("fingerprintsButton").addEventListener("click", showFingerprints);
  document.getElementById("bannersButton").addEventListener("click", showBanners);
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
  // addSalesEventListeners();
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
  fillMainContainer('weights');
  addWeightEventListeners();
}

function showStorages() {
  fillMainContainer('storages');
  addStorageEventListeners();
}

function showBatteries() {
  fillMainContainer('batteries');
  addBatteryEventListeners();
}

function showScreenRess() {
  fillMainContainer('screenress');
  addScreenResEventListeners();
}

function showCameraRess() {
  fillMainContainer('cameraress');
  addCameraResEventListeners();
}

function showFingerprints() {
  fillMainContainer('fingerprints');
  addFingerprintEventListeners();
}

function showBanners() {
  fillMainContainer('banners');
  //addBannerEventListeners();
}

function showFaqs() {
  fillMainContainer('faqs');
  addFaqEventListeners();
}

function openNav() {
  document.getElementById("mySidenav").style.width = "350px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

addEventListeners();