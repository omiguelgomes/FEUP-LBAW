<script type="text/javascript" src="{{ URL::asset('js/Specs/battery.js') }}" defer></script>
<div id="batteries">
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="mx-auto">
            <h4 class="mx-auto">Battery Size</h4>
        </div>
    </div>

    <div id="tabelBattery">
        <div class="row-form">
            <form class="btForm form-inline" method="POST" action="{{ route('create_battery') }}"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input id="inputName" type="number" name="inputBtName" class="form-control" placeholder="Size"
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

        <div class="table-overflow">
            <table id="tabela" class="table table-hover">
                <thead>
                    <tr>
                        <th>Value (mAh)</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="btTableBody">
                    @foreach($battery as $b)
                    <tr class="bt" id='bt-{{$b->id}}'>
                        <td>{{$b->value}}</td>
                        <td><a value="{{$b->id}}" class="btDelete thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4 text-danger"></i>
                            </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{$battery->render()}}
</div>