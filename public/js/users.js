$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function addEventListeners() {
    let userPromoters = document.getElementsByClassName("userPromoter");
    [].forEach.call(userPromoters, function (promoter) {
        promoter.addEventListener('click', sendUserPromoteRequest);
    });

    let userDemoters = document.getElementsByClassName("userDemoter");
    [].forEach.call(userDemoters, function (demoter) {
        demoter.addEventListener('click', sendUserDemoterRequest);
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


function sendUserPromoteRequest(event) {
    event.preventDefault();
    let id = this.getAttribute("value");;

    sendAjaxRequest('post', 'admin/users/promote/' + id, null, promotionHandler);
}

function sendUserDemoterRequest(event) {
    event.preventDefault();
    let id = this.getAttribute("value");

    sendAjaxRequest('post', 'admin/users/demote/' + id, null, demotionHandler);
}

function promotionHandler() {
    if (this.status != 200) {
        window.location = '/admin';
        alert("Failed to promote User :'(");
    }

    //create row in admin table
    let admin = JSON.parse(this.responseText);
    let new_admin = placeAdmin(admin);
    let adminTable = document.querySelector('tbody.adminTableBody');
    adminTable.prepend(new_admin);

    //eliminate row in user table
    let element = document.getElementById('client-' + admin.id);
    element.remove();

}

function demotionHandler() {
    if (this.status != 200) {
        window.location = '/admin';
        alert("Failed to demote Admin :'(");
    }

    //create row in user table
    let user = JSON.parse(this.responseText);
    let new_user = placeUser(user);
    let userTable = document.querySelector('tbody.userTableBody');
    userTable.prepend(new_user);

    //eliminate row in admin table
    let element = document.getElementById('admin-' + user.id);
    element.remove();
}

function placeUser(user) {
    let new_user = document.createElement('tr');
    new_user.classList.add('client');
    new_user.setAttribute('id', 'client-' + user.id);
    new_user.innerHTML =
    `
    <td>${user.name}</td>
    <td>${user.email}</td>
    <td>
        <a value="${user.id}" class="userPromoter thumbnail">
            <i class="fas fa-pencil-alt fa-2x ml-2"></i>
        </a> 
    </td>
    <td>
        <a href="#" value='${user.id}' class="thumbnail">
            <i class="far fa-times-circle fa-2x ml-4"></i>
        </a> 
    </td>
    `;

    new_user.querySelector('a.userPromoter').addEventListener('click', sendUserPromoteRequest);

    return new_user;
}

function placeAdmin(admin) {
    let new_admin = document.createElement('tr');
    new_admin.classList.add('admin');
    new_admin.setAttribute('id', 'admin-' + admin.id);
    new_admin.innerHTML =
    `
    <td>${admin.name}</td>
    <td>${admin.email}</td>
    <td>
        <a value="${admin.id}" class="userDemoter thumbnail">
            <i class="far fa-times-circle fa-2x ml-4"></i>
        </a> 
    </td>
    `;

    new_admin.querySelector('a.userDemoter').addEventListener('click', sendUserDemoterRequest);

    return new_admin;
}

addEventListeners();