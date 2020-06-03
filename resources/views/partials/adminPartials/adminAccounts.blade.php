<script type="text/javascript" src="{{ URL::asset('js/users.js') }}" defer></script>
<div id="adminAccounts">
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="mx-auto">
            <h4 class="mx-auto">Admin Accounts</h4>
        </div>
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
                    @if($admin->id != Auth::user()->id)
                    <td>
                        <a class="userDemoter thumbnail" value='{{$admin->id}}'>
                            <i class="far fa-times-circle text-danger fa-2x ml-4"></i>
                        </a>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$admins->render()}}
</div>