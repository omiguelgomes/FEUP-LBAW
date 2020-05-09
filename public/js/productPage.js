$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function addEventListeners() {
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

function sendReviewCreateRequest(event) {
    event.preventDefault();
    let rating = 3;
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
        console.log(jsonResponse.user_image_path);
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
    }
}

addEventListeners();