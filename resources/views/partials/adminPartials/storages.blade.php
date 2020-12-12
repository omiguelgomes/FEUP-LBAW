<script type="text/javascript" src="{{ URL::asset('js/Specs/storage.js') }}" defer></script>
<div id="storages">
    <!-- Storage -->
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="mx-auto">
            <h4 class="mx-auto">Storage Values</h4>
        </div>
    </div>

    <div id="tabelStorage">
        <div class="row-form">
            <form class="stForm form-inline" method="POST" action="{{ route('create_storage') }}"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input id="inputName" type="number" name="inputStName" class="form-control" placeholder="Size"
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
                        <th>Value (GB)</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="stTableBody">
                    @foreach($storage as $s)
                    <tr class="st" id='st-{{$s->id}}'>
                        <td>{{$s->value}}</td>
                        <td><a value="{{$s->id}}" class="stDelete thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4 text-danger"></i>
                            </a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{$storage->render()}}
</div>