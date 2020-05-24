<script type="text/javascript" src="{{ URL::asset('js/Specs/watresrat.js') }}" defer></script>

<div id="waters">
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Water Resistance Ratings</h4>
        </div>
    </div>
    <div class="row-form">
        <form class="waterForm form-inline" method="POST" action="{{ route('create_water') }}"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input id="inputName" type="text" name="inputWaterName" class="form-control" placeholder="Rating"
                        required autofocus>
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
    <div class="form-group input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
    </div>

    <div class="table-overflow">
        <table id="tabela" class="table table-hover">
            <thead>
                <tr>
                    <th>Value</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody class="waterTableBody">
                @foreach($water as $id => $name)
                <tr class="water" id='water-{{$id}}'>
                    <td>{{$name}}</td>
                    <td><a value="{{$id}}" class="waterDelete thumbnail">
                            <i class="far fa-times-circle fa-2x ml-4 text-danger"></i>
                        </a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>