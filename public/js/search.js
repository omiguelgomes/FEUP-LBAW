function updateMinPrice() {
  document.getElementById('minPriceLabel').innerHTML = "Min Price: " + document.getElementById('minPrice').value + "€";
}

function updateMaxPrice() {
  document.getElementById('maxPriceLabel').innerHTML = "Max Price: " + document.getElementById('maxPrice').value + "€";
}

function updateMinStorage() {
  document.getElementById('minStorageLabel').innerHTML = Math.pow(2, document.getElementById('minStorage').value);
}

function updateMinRam() {
  document.getElementById('minRamLabel').innerHTML = Math.pow(2, document.getElementById('minRam').value);
}

document.getElementById("minPrice").addEventListener('input', updateMinPrice);
document.getElementById("maxPrice").addEventListener('input', updateMaxPrice);
// document.getElementById("minStorage").addEventListener('input', updateMinStorage);
// document.getElementById("minRam").addEventListener('input', updateMinRam);

function openNav() {
  document.getElementById("mySidenav").style.width = "350px";
  // document.getElementById("main").style.marginLeft = "350px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}