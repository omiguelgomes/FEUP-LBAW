$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function addFaqEventListeners() {
    let faqUpdaters = document.getElementsByClassName("faqUpdate");
    [].forEach.call(faqUpdaters, function (updater) {
        updater.addEventListener('click', sendFAQUpdateRequest);

        //make modal appear when button is clicked
        updater.setAttribute('data-toggle', 'modal');
        updater.setAttribute('data-target', '#exampleModal');
    });

    let faqDeleters = document.getElementsByClassName("faqDelete");
    [].forEach.call(faqDeleters, function (deleter) {
        deleter.addEventListener('click', sendFAQDeleteRequest);

        //make modal appear when button is clicked
        deleter.setAttribute('data-toggle', 'modal');
        deleter.setAttribute('data-target', '#exampleModal');
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

    document.getElementsByClassName('modal-title')[0].innerHTML = "Are you sure you want to update this FAQ?";
    document.getElementById('modal-confirm').addEventListener('click', function () {
        sendAjaxRequest('post', 'admin/faq/update/' + id, {
            answer: answer
        }, faqUpdateHandler);
    });

}

function sendFAQDeleteRequest(event) {
    event.preventDefault();
    let id = this.getAttribute("value");

    document.getElementsByClassName('modal-title')[0].innerHTML = "Are you sure you want to delete this FAQ?";
    document.getElementById('modal-confirm').addEventListener('click', function () {
        sendAjaxRequest('delete', 'admin/faq/delete/' + id, null, faqDeleteHandler);
    });
}

function sendFAQCreateRequest(event) {

    event.preventDefault();
    let question = document.getElementById('faq-question').value;
    let answer = document.getElementById('faq-answer').value;
    sendAjaxRequest('put', 'admin/faq/create', {
        question: question,
        answer: answer
    }, faqCreateHandler);

    myAlert('New FAQ created!');

}

function faqUpdateHandler() {
    if (this.status != 200) {
        myErrorAlert("Failed to update FAQ :'(");
    } else {
        myAlert('Updated FAQ item.');
    }
}

function faqDeleteHandler() {
    if (this.status != 200) {
        myErrorAlert("Failed to delete FAQ :'(");
    } else {
        let faq = JSON.parse(this.responseText);
        let element = document.getElementById('faq-' + faq.id);
        element.remove();
        myAlert('FAQ deleted successfully!');
    }
}

function faqCreateHandler() {
    let newFaq = JSON.parse(this.responseText);
    document.getElementById('faq-container').innerHTML =

        ` <div id="faq-` + newFaq.id + `">
                    <div class="d-flex">
                        <div class="p-4">
                            <button class="btn btn-primary bg-primary" type="button" data-toggle="collapse"
                                data-target="#FAQs` + newFaq.id + `" aria-expanded="false"
                                aria-controls="FAQs` + newFaq.id + `">
                                <i class="fas fa-sort-down" style="color: white;"> </i>
                            </button>
                        </div>
                        <div class="p-4">
                            <h5>` + newFaq.question + `</h5>
                        </div>
                    </div>

                    <div class="collapse" id="FAQs` + newFaq.id + `">
                        <textarea name="answer" class="form-control w-75" id="answer-` + newFaq.id + `" cols="20"
                            rows="9">` + newFaq.answer + `</textarea>
                        <a class="faqDelete thumbnail" value="` + newFaq.id + `">
                            Delete FAQ
                            <i class="far fa-times-circle text-danger fa-2x"></i>
                        </a>
                        <a class="faqUpdate thumbnail" value="` + newFaq.id + `">
                            Update FAQ
                            <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                        </a>
                    </div>

                </div>` +
        document.getElementById('faq-container').innerHTML;
    addFaqEventListeners();
}