function updateMinPrice() {
  document.getElementById('minPriceLabel').innerHTML = document.getElementById('minPrice').value;
}

function updateMaxPrice() {
  document.getElementById('maxPriceLabel').innerHTML = document.getElementById('maxPrice').value;
}

function updateMinStorage() {
  document.getElementById('minStorageLabel').innerHTML = Math.pow(2, document.getElementById('minStorage').value);
}

function updateMinRam() {
  document.getElementById('minRamLabel').innerHTML = Math.pow(2, document.getElementById('minRam').value);
}

// document.getElementById("minPrice").addEventListener('input', updateMinPrice);
// document.getElementById("maxPrice").addEventListener('input', updateMaxPrice);
// document.getElementById("minStorage").addEventListener('input', updateMinStorage);
// document.getElementById("minRam").addEventListener('input', updateMinRam);