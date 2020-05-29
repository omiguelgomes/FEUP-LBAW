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
        deleter.addEventListener('click', sendFAQDeleteRequest);
    });

    document.getElementById('createFaq').addEventListener('click', sendFAQCreateRequest);
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

function sendFAQDeleteRequest(event) {
    if (confirm("Are you sure you want to delete that faq?")) {
        event.preventDefault();
        let id = this.getAttribute("value");
    }

    sendAjaxRequest('delete', 'admin/faq/delete/' + id, null, faqDeleteHandler);
}

function sendFAQCreateRequest(event) {
    if (confirm('Do you want to create this new faq?')) {

        event.preventDefault();
        let question = document.getElementById('faq-question').value;
        let answer = document.getElementById('faq-answer').value;
        sendAjaxRequest('put', 'admin/faq/create', {
            question: question,
            answer: answer
        }, faqCreateHandler);
    }
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

function faqCreateHandler() {

    alert("Faq created!");
    let newFaq = JSON.parse(this.responseText);
    document.getElementById('faq-container').innerHTML =
        `<div class="d-flex">
                    <div class="p-4">
                        <h5>` + newFaq.question + `</h5>
                    </div>
                    <div class="p-4">
                        <button class="btn btn-primary bg-primary" type="button" data-toggle="collapse"
                            data-target="#FAQs` + newFaq.id + `" aria-expanded="false"
                            aria-controls="FAQs` + newFaq.id + `">
                            <i class="fas fa-sort-down" style="color: white;"> </i>
                        </button>
                    </div>
                </div>

                <div class="collapse" id="FAQs` + newFaq.id + `" >
                    <textarea name = "answer" class="form-control w-75" id="answer-` + newFaq.id + `"
                    cols="20" rows="9">` + newFaq.answer + `</textarea>
                    <a class="faqDelete thumbnail" value="` + newFaq.id + `">
                        Delete FAQ
                        <i class="far fa-times-circle text-danger fa-2x"></i>
                    </a>
                    <a class="faqUpdate thumbnail" value="` + newFaq.id + `">
                        Update FAQ
                        <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                    </a>
                </div>
 ` +
        document.getElementById('faq-container').innerHTML;
    addFaqEventListeners();
}