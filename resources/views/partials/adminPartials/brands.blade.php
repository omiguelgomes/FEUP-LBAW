<script type="text/javascript" src="{{ URL::asset('js/brands.js') }}" defer></script>
<div class="collapse" id="brands">
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Brands</h4>
        </div>

    </div>
    <div class="row-form">
        <form class="form-inline" method="POST" action="{{ route('create_brand') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row col-md-4">
                <input id="inputName" type="text" name="inputName" class="form-control ml-2" placeholder="Name" required
                    autofocus>
                @if ($errors->has('inputName'))
                <span class="error">
                    {{ $errors->first('inputName') }}
                </span>
                @endif
            </div>
            <div class="custom-file col-md-4">
                <input type="file" class="custom-file-input" name="inputFile" id="inputFile" required>
                <label class="custom-file-label" for="inputFile">Choose file</label>
            </div>
            <div class="form-row col-md-2  ml-auto p-2">
                <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i></button>
            </div>
        </form>
    </div>
    <br>
    <div class="form-group input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
    </div>

    <div class="table-overflow">
        <table id="tabela" class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $id => $name)
                <tr class="brand" id='brand-{{$id}}'>
                    <td>{{$name}}</td>
                    <td><a value="{{$id}}" class="brandDelete thumbnail">
                            <i class="far fa-times-circle fa-2x ml-4 text-danger"></i>
                        </a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>