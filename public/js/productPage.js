$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function addEventListeners() {
    //create comment from product page
    let reviewSubmit = document.getElementById('reviewSubmit');
    reviewSubmit.addEventListener('click', sendReviewCreateRequest);

    let stars = document.getElementsByClassName("rating");
    [].forEach.call(stars, function (star) {
        star.addEventListener('mouseover', selectRating);
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

function sendReviewCreateRequest(event) {
    event.preventDefault();
    let stars = document.getElementsByClassName("rating");
    let rating = 0;
    for (var i = 0; i < stars.length; i++) {
        if (stars[i].classList.contains("fas")) {
            rating += 1;
        }
    }
    var text = document.getElementById('reviewInput').value;
    sendAjaxRequest('PUT', window.location.pathname + '/add_review', {
        content: text,
        val: rating
    }, reviewCreateHandler);
}

function reviewCreateHandler() {
    if (this.status != 200) {
        alert("Could not post your comment :(");
    } else {
        var jsonResponse = JSON.parse(this.responseText);

        document.getElementsByClassName("commentContainer")[0].innerHTML =
            `<div class="container py-3">
            <div class="media">
                <img src="/images/` + jsonResponse.user_image_path + `"
                    class="align-self-start mr-3" style="max-height: 100px;">
                    <div class="media-body">
                        <h5 class = "mt-0"> ` + jsonResponse.val + ` / 5
                            <i class="fas fa-star"></i>
                        </h5>
                        <p>` + jsonResponse.content + `</p>
                    </div>
            </div>
        </div>` + document.getElementsByClassName("commentContainer")[0].innerHTML;

        document.getElementById("addComment").style.display = "none";
        document.getElementById("noComments").style.display = "none";
    }
}

function selectRating() {
    let stars = document.getElementsByClassName("rating");
    for (var i = 0; i < stars.length; i++) {
        if (stars[i].attributes.value.nodeValue < this.attributes.value.nodeValue) {
            stars[i].classList.add("fas");
        } else {
            if (stars[i].attributes.value.nodeValue > this.attributes.value.nodeValue) {
                stars[i].classList.remove("fas");
            }
        }
    }
    this.classList.add("fas");
}

addEventListeners();