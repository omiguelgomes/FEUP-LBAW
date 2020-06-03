<script type="text/javascript" src="{{ URL::asset('js/Specs/screensize.js') }}" defer></script>
<div id="screensizes">
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="mx-auto">
            <h4 class="mx-auto">Screen Sizes</h4>
        </div>
    </div>

    <div id="screensizes">
        <div class="row-form">
            <form class="ssForm form-inline" method="POST" action="{{ route('create_screensize') }}"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input id="inputName" type="number" step="0.01" name="inputSSName" class="form-control"
                            placeholder="Size" required autofocus>
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
                        <th>Value (inches)</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="ssTableBody">
                    @foreach($screen as $s)
                    <tr class="ss" id='ss-{{$s->id}}'>
                        <td>{{$s->value}}</td>
                        <td><a value="{{$s->id}}" class="ssDelete thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4 text-danger"></i>
                            </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{$screen->render()}}
</div>