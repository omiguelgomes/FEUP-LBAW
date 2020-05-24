$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function addFaqEventListeners() {
    let faqUpdaters = document.getElementsByClassName("faqUpdate");
    [].forEach.call(faqUpdaters, function (updater) {
        updater.addEventListener('click', sendFAQUpdateRequest);
    });

    let faqDeleters = document.getElementsByClassName("faqDelete");
    [].forEach.call(faqDeleters, function (deleter) {
        deleter.addEventListener('click', sendFAQtDeleteRequest);
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


function sendFAQUpdateRequest(event) {
    event.preventDefault();
    let id = this.getAttribute("value");
    let answer = document.getElementById(`answer-${id}`).value;

    sendAjaxRequest('post', 'admin/faq/update/' + id, {
        answer: answer
    }, faqUpdateHandler);
}

function sendFAQtDeleteRequest(event) {
    event.preventDefault();
    let id = this.getAttribute("value");

    sendAjaxRequest('delete', 'admin/faq/delete/' + id, null, faqDeleteHandler);
}

function faqUpdateHandler() {
    if (this.status != 200) {
        window.location = '/admin';
        alert("Failed to update FAQ :'(");
    }

    alert('Updated FAQ item.');
}

function faqDeleteHandler() {
    if (this.status != 200) {
        window.location = '/admin';
        alert("Failed to delete FAQ :'(");
    }

    let faq = JSON.parse(this.responseText);
    let element = document.getElementById('faq-' + faq.id);
    element.remove();
}