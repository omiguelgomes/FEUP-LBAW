$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


function addEventListeners() {

  let wishlistDeleters = document.getElementsByClassName("wishlistDelete");
  [].forEach.call(wishlistDeleters, function (deleter) {
    deleter.addEventListener('click', sendWishlistDeleteRequest);
  });
}

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

function sendWishlistDeleteRequest(event) {
  event.preventDefault();
  let id = this.getAttribute("value");
  sendAjaxRequest('delete', 'wishlist/delete/' + id, null, wishlistDeleteHandler);
}

function wishlistDeleteHandler() {
  if (this.status != 200) {
    window.location = '/wishlist';
    alert("Failed to remove from wishlist :'(");
  }

  let element = document.getElementById(this.responseText);
  element.remove();
}

addEventListeners();