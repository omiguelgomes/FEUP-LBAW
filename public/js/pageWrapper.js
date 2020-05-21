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

function sendGetResultRequest() {
    let textInput = document.getElementById("navbarSearch").value;
    if (textInput.length) {
        sendAjaxRequest('post', '/search/textResults', {
            textInput: textInput,
        }, getResultHandler);
    }
}

function getResultHandler() {
    var products = JSON.parse(this.responseText);
    var productGrid = document.getElementsByClassName("productGrid")[0];
    if (products.length) {
        document.getElementById("dropdownResults").classList.add("show");
    } else {
        document.getElementById("dropdownResults").classList.remove("show");
    }

    productGrid.innerHTML = "";
    for (var i = 0; i < products.length; i++) {
        productGrid.innerHTML +=
            `<div class="text-center mb-1">
                    <h5 class="card-header">` + products[i].brand.name + ` ` + products[i].model + `</h5>
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                        <div class = "col-6">
                        <img class = "card-img-top"
                        src = "/images/` + products[i].images[0].path + `"
                        alt = "Card image cap"
                        style = "width: 100%; height: auto;">
                        </div>
                        <div class = "col-6 my-auto">
                            <a type="button" class="btn btn-primary" href="{{url('product/'` + products[i].id + `)}}">See</a>
                        </div>
                    </div>
            </div>`;
    }
}


function addEventListeners() {
    var searchBar = document.getElementById("navbarSearch");
    searchBar.addEventListener('keyup', sendGetResultRequest);
}

addEventListeners();