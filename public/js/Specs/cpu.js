$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function addEventListeners() {
    let cpuCreators = document.getElementsByClassName("cpuForm");
    [].forEach.call(cpuCreators, function (creator) {
        creator.addEventListener('submit', sendCPUCreateRequest);
    });

    let cpuDeleters = document.getElementsByClassName("cpuDelete");
    [].forEach.call(cpuDeleters, function (deleter) {
        deleter.addEventListener('click', sendCPUDeleteRequest);
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


function sendCPUCreateRequest(event) {
    event.preventDefault();
    let name = this.querySelector('input[name=inputCPUName]').value;
    let freq = this.querySelector('input[name=inputFreq]').value;
    let cores = this.querySelector('input[name=inputCores]').value;
    let threads = this.querySelector('input[name=inputThreads]').value;

    sendAjaxRequest('post', 'admin/cpu/add', {
            name: name,
            freq: freq,
            cores: cores,
            threads: threads
        },
        cpuCreateHandler);
}

function sendCPUDeleteRequest(event) {
    event.preventDefault();
    let id = this.getAttribute("value");

    sendAjaxRequest('delete', 'admin/cpu/delete/' + id, null, cpuDeleteHandler);
}

function cpuCreateHandler() {
    if (this.status != 201) {
        window.location = '/admin';
        alert("Failed to create CPU :'(");
    }

    //controller function to create brand returns the elem it created in a JSON
    let cpu = JSON.parse(this.responseText);

    //create the html for the brand and put new brand item in top
    let new_cpu = createCPU(cpu);
    let table = document.querySelector('tbody.cpuTableBody');
    table.prepend(new_cpu);

    //clean form fields
    let name = document.querySelector('input[name=inputCPUName]').value;
    let freq = document.querySelector('input[name=inputFreq]').value;
    let cores = document.querySelector('input[name=inputCores]').value;
    let threads = document.querySelector('input[name=inputThreads]').value;
    name = "";
    freq = "";
    cores = "";
    threads = "";
}

function cpuDeleteHandler() {
    if (this.status != 200) {
        window.location = '/admin';
        alert("Failed to delete CPU :'(");
    }

    let cpu = JSON.parse(this.responseText);
    let element = document.getElementById(cpu.id);
    element.remove();
}

function createCPU(cpu) {
    let new_cpu = document.createElement('tr');
    new_cpu.classList.add('cpu');
    new_cpu.setAttribute('id', cpu.id);
    new_cpu.innerHTML =
        `
    <td>${cpu.name}</td>
        <td><a value="${cpu.id}" class="cpuDelete thumbnail">
            <i class="far fa-times-circle fa-2x ml-4"></i>
    </a> </td>
    `;

    new_cpu.querySelector('a.cpuDelete').addEventListener('click', sendDeleteCPURequest);

    return new_cpu;
}

addEventListeners();