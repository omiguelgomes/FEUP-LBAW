<script type="text/javascript" src="{{ URL::asset('js/users.js') }}" defer></script>
<div id="adminAccounts">
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Admin Accounts</h4>
        </div>
    </div>
    <div class="form-group input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
    </div>
    <div class="table-overflow">
        <table id="tabela" class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Demote</th>
                </tr>
            </thead>
            <tbody class="adminTableBody">
                @foreach($admins as $admin)
                <tr class='admin' id='admin-{{$admin->id}}'>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->email}}</td>
                    <td>
                        <a class="userDemoter thumbnail" value='{{$admin->id}}'>
                            <i class="far fa-times-circle fa-2x ml-4"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>