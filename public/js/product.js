$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function addEventListeners() {
    let productCheckers = document.getElementsByClassName("productForm");
    [].forEach.call(productCheckers, function (checker) {
        checker.addEventListener('submit', sendProductUpdateRequest);
    });

    let productDeleters = document.getElementsByClassName("productDelete");
    [].forEach.call(productDeleters, function (deleter) {
        deleter.addEventListener('click', sendProductDeleteRequest);
    });

    //create comment from product page
    let reviewSubmit = document.getElementById('reviewSubmit');
    reviewSubmit.addEventListener('click', sendReviewCreateRequest);
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


function sendProductUpdateRequest(event) {
    event.preventDefault();
    let url = this.closest("form").getAttribute("action");
    let stock = this.querySelector('input[name=inputStock]').value;

    axios.post(
            url, {
                stock: stock,
            })
        .then(function (response) {
            alert('Complete!');
        })
}

function sendProductDeleteRequest(event) {
    event.preventDefault();
    let id = this.getAttribute("value");

    sendAjaxRequest('delete', 'admin/product/delete/' + id, null, productDeleteHandler);
}

function productDeleteHandler() {
    if (this.status != 200) {
        window.location = '/admin';
        alert("Failed to delete product :'(");
    }

    let product = JSON.parse(this.responseText);
    let element = document.getElementById('product-' + product.id);
    element.remove();

    alert("Deleted " + product.model);
}

function sendReviewCreateRequest(event) {
    event.preventDefault();
    // sendAjaxRequest('PUT', window.location.pathname + '/add_review', {
    //     content: document.getElementById('reviewInput').value,
    //     val: 2
    // }, reviewCreateHandler);
    // var newDiv = document.createElement("div");

    // document.getElementsByClassName("commentContainer").innerHTML += newDiv;
}

function reviewCreateHandler() {
    if (this.status == 200) {
        console.log(this.responseText);
    }
    console.log(this.responseText);
}

addEventListeners();