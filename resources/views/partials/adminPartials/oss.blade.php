<script type="text/javascript" src="{{ URL::asset('js/Specs/os.js') }}" defer></script>

<div id="oss">
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="mx-auto">
            <h4 class="mx-auto">Operating Systems</h4>
        </div>
    </div>
    <div class="row-form">
        <form class="osForm form-inline" method="POST" action="{{ route('create_os') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input id="inputName" type="text" name="inputOsName" class="form-control"
                        placeholder="Operating System" required autofocus>
                    @if ($errors->has('inputName'))
                    <span class="error">
                        {{ $errors->first('inputName') }}
                    </span>
                    @endif
                </div>
            </div>
            <br>
            <div class="form-group ml-2">
                <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i></button>
            </div>
        </form>
    </div>
    <br>

    <div class="table-overflow">
        <table id="tabela" class="table table-hover">
            <thead>
                <tr>
                    <th>Value</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody class="osTableBody">
                @foreach($os as $o)
                <tr class="os" id='os-{{$o->id}}'>
                    <td>{{$o->name}}</td>
                    <td><a value="{{$o->id}}" class="osDelete thumbnail">
                            <i class="far fa-times-circle fa-2x ml-4 text-danger"></i>
                        </a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$os->render()}}
</div>