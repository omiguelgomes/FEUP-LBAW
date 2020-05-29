<script type="text/javascript" src="{{ URL::asset('js/users.js') }}" defer></script>
<div id="userAccounts">
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Client Accounts</h4>
        </div>
    </div>
    <div class="form-group input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
    </div>

    <div class="table w-100">
        <table id="tabela" class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Promote</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class='userTableBody'>
                @foreach($clients as $client)
                @if($client->id != 1)
                <tr class='client' id='client-{{$client->id}}'>
                    <td>{{$client->name}}</td>
                    <td>{{$client->email}}</td>
                    <td>
                        <a class="userPromoter thumbnail" value='{{$client->id}}'>
                            <i class="fas fa-plus-circle fa-2x ml-2"></i>
                        </a>
                    </td>
                    <td>
                        <a value='{{$client->id}}' class="userDeleter thumbnail">
                            <i class=" far fa-times-circle fa-2x ml-4 text-danger"></i>
                        </a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>