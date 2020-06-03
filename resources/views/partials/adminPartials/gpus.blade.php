<script type="text/javascript" src="{{ URL::asset('js/Specs/gpu.js') }}" defer></script>

<div id="gpus">
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="mx-auto">
            <h4 class="mx-auto">GPU models</h4>
        </div>
    </div>

    <div id="tabelGPU">
        <div class="row-form">
            <form class="gpuForm form" method="POST" action="{{ route('create_gpu') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input id="inputName" type="text" name="inputGPUName" class="form-control" placeholder="Name"
                            required autofocus>
                        @if ($errors->has('inputName'))
                        <span class="error">
                            {{ $errors->first('inputName') }}
                        </span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <input id="inputVram" type="number" name="inputVram" class="form-control" placeholder="Vram"
                            required autofocus>
                        @if ($errors->has('inputVram'))
                        <span class="error">
                            {{ $errors->first('inputVram') }}
                        </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="form-group text-center  p-10">
                    <button class="btn btn-block btn-primary" type="submit"><i class="fas fa-plus"></i></button>
                </div>
            </form>
        </div>
        <br>
        <div class="table-overflow">
            <table id="tabela" class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="gpuTableBody">
                    @foreach($gpu as $g)
                    <tr class="gpu" id='gpu-{{$g->id}}'>
                        <td>{{$g->name}}</td>
                        <td><a value="{{$g->id}}" class="gpuDelete thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4 text-danger"></i>
                            </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{$gpu->render()}}
</div>