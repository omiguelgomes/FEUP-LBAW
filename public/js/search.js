function updateMinPrice() {
  document.getElementById('minPriceLabel').innerHTML = document.getElementById('minPrice').value;
}

function updateMaxPrice() {
  document.getElementById('maxPriceLabel').innerHTML = document.getElementById('maxPrice').value;
}


document.getElementById("minPrice").addEventListener('input', updateMinPrice);
document.getElementById("maxPrice").addEventListener('input', updateMaxPrice);