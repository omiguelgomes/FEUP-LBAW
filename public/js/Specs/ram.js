$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function addEventListeners() {
    let ramCreators = document.getElementsByClassName("ramForm");
    [].forEach.call(ramCreators, function (creator) {
        creator.addEventListener('submit', sendRAMCreateRequest);
    });

    let ramDeleters = document.getElementsByClassName("ramDelete");
    [].forEach.call(ramDeleters, function (deleter) {
        deleter.addEventListener('click', sendRAMDeleteRequest);
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


function sendRAMCreateRequest(event) {
    event.preventDefault();
    let value = this.querySelector('input[name=inputRAMName]').value;

    sendAjaxRequest('post', 'admin/ram/add', {
        value: value
    }, ramCreateHandler);
}

function sendRAMDeleteRequest(event) {
    event.preventDefault();
    let id = this.getAttribute("value");
    console.log(id)

    sendAjaxRequest('delete', 'admin/ram/delete/' + id, null, ramDeleteHandler);
}

function ramCreateHandler() {
    console.log(this.responseText);
    if (this.status != 201) {
        window.location = '/admin';
        alert("Failed to create RAM :'(");
    }

    //controller function to create brand returns the elem it created in a JSON
    let ram = JSON.parse(this.responseText);

    //create the html for the brand and put new brand item in top
    let new_ram = createRAM(ram);
    let table = document.querySelector('tbody.ramTableBody');
    table.prepend(new_ram);

    //clean form fields
    let value = document.querySelector('input[name=inputRAMName]').value;
    value = "";
}

function ramDeleteHandler() {
    if (this.status != 200) {
        window.location = '/admin';
        alert("Failed to delete RAM :'(");
    }

    let ram = JSON.parse(this.responseText);
    console.log(ram.id);
    let element = document.getElementById(ram.id);
    element.remove();
}

function createRAM(ram) {
    let new_ram = document.createElement('tr');
    new_ram.classList.add('ram');
    new_ram.setAttribute('id', ram.id);
    new_ram.innerHTML =
        `
    <td>${ram.value}</td>
        <td><a value="${ram.id}" class="ramDelete thumbnail">
            <i class="far fa-times-circle fa-2x ml-4"></i>
    </a> </td>
    `;

    new_ram.querySelector('a.ramDelete').addEventListener('click', sendRAMDeleteRequest);

    return new_ram;
}

addEventListeners();