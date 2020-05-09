$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function encodeForAjax(data) {
  if (data == null) return null;
  return Object.keys(data).map(function (k) {
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

function sendAjaxRequest(method, url, data, handler) {
  let request = new XMLHttpRequest();

  request.open(method, url, true);
  request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.addEventListener('load', handler);
  request.send(encodeForAjax(data));
}

function addEventListeners() {

  let cartDeleters = document.getElementsByClassName("cartDeleter");
  [].forEach.call(cartDeleters, function (deleter) {
    deleter.addEventListener('click', sendCartDeleteRequest);
  });
  let cartIncrementers = document.getElementsByClassName("cartIncrementer");
  [].forEach.call(cartIncrementers, function (incrementer) {
    incrementer.addEventListener('click', sendCartIncrementRequest);
  });
  let cartDecrementers = document.getElementsByClassName("cartDecrementer");
  [].forEach.call(cartDecrementers, function (decrementer) {
    decrementer.addEventListener('click', sendCartDecrementRequest);
  });
}

function sendCartDeleteRequest(event) {
  event.preventDefault();
  let id = this.getAttribute("value");
  sendAjaxRequest('delete', 'cart/delete/' + id, null, cartDeleteHandler);
}

function sendCartIncrementRequest(event) {
  event.preventDefault();
  let id = this.getAttribute("value");
  sendAjaxRequest('put', 'cart/increment/' + id, null, cartIncrementHandler);
}

function sendCartDecrementRequest(event) {
  event.preventDefault();
  let id = this.getAttribute("value");
  sendAjaxRequest('put', 'cart/decrement/' + id, null, cartDecrementHandler);
}

function cartDeleteHandler() {
  if (this.status != 200) {
    window.location = '/cart';
    alert("Failed to remove from cart :'(");
  }

  //card of the current product
  let card = document.getElementById(this.responseText);
  //quantity of the current product
  let quantity = card.getElementsByClassName("quantity")[0];
  //total of the current product (price*quantity)
  let price = card.getElementsByClassName("productTotal")[0];
  //cart total
  let total = document.getElementById("total");
  //reduce total by the product total, of the product deleted
  total.innerHTML = (Number(total.innerHTML) - price.innerHTML).toFixed(2);

  card.remove();
}

function cartIncrementHandler() {
  if (this.status != 200) {
    window.location = '/cart';
    alert("Failed to increment item from cart :'(");
  }

  let card = document.getElementById(this.responseText);
  let quantity = card.getElementsByClassName("quantity")[0];

  let price = card.getElementsByClassName("productTotal")[0];
  let priceDiff = (Number(price.innerHTML) / Number(quantity.innerHTML));
  price.innerHTML = (Number(price.innerHTML) + priceDiff).toFixed(2);

  quantity.innerHTML = Number(quantity.innerHTML) + 1;

  let total = document.getElementById("total");
  total.innerHTML = (Number(total.innerHTML) + priceDiff).toFixed(2);

}

function cartDecrementHandler() {
  if (this.status != 200) {
    window.location = '/cart';
    alert("Failed to decrement item from cart :'(");
  }

  let card = document.getElementById(this.responseText);
  let quantity = card.getElementsByClassName("quantity")[0];

  let price = card.getElementsByClassName("productTotal")[0];
  let priceDiff = (Number(price.innerHTML) / Number(quantity.innerHTML));
  price.innerHTML = (Number(price.innerHTML) - priceDiff).toFixed(2);

  quantity.innerHTML = Number(quantity.innerHTML) - 1;

  let total = document.getElementById("total");
  total.innerHTML = (Number(total.innerHTML) - priceDiff).toFixed(2);
}

addEventListeners();