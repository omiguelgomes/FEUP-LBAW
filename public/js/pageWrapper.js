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
        sendAjaxRequest('post', 'search/textResults', {
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
            `<div class="card mb-3" style="max-width: 300px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <a href="product/` + products[i].id + `">
                            <img class = "card-img-top mt-4 ml-1" src="images/` + products[i].images[0].path + `"alt="Card image cap" style="max-height: 100px;"> 
                        </a> 
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">` + products[i].brand.name + ` </h5> 
                            <p class="card-text"> ` + products[i].model + `</p>
                            <a href="product/` + products[i].id + `"class="btn btn-secondary w-75">See</a>
                        </div>
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