<script type="text/javascript" src="{{ URL::asset('js/Specs/cpu.js') }}" defer></script>

<div id="cpus">
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="mx-auto">
            <h4 class="mx-auto">CPU models</h4>
        </div>
    </div>
    <div class="row-form">
        <form class="cpuForm form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input id="inputCPUName" type="text" name="inputCPUName" class="form-control" placeholder="Name"
                        required autofocus>
                    @if ($errors->has('inputName'))
                    <span class="error">
                        {{ $errors->first('inputName') }}
                    </span>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <input id="inputFreq" type="number" step="0.01" name="inputFreq" class="form-control"
                        placeholder="Frequency" required autofocus>
                    @if ($errors->has('inputFreq'))
                    <span class="error">
                        {{ $errors->first('inputFreq') }}
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-row col-md-6">
                    <input id="inputCores" type="number" name="inputCores" class="form-control ml-1" placeholder="Cores"
                        required autofocus>
                    @if ($errors->has('inputCores'))
                    <span class="error">
                        {{ $errors->first('inputCores') }}
                    </span>
                    @endif
                </div>

                <div class="form-row col-md-6">
                    <input id="inputThreads" type="number" name="inputThreads" class="form-control ml-3"
                        placeholder="Threads" required autofocus>
                    @if ($errors->has('inputThreads'))
                    <span class="error">
                        {{ $errors->first('inputThreads') }}
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
            <tbody class="cpuTableBody">
                @foreach($cpu as $c)
                <tr class="cpu" id='cpu-{{$c->id}}'>
                    <td>{{$c->name}}</td>
                    <td><a value="{{$c->id}}" class="cpuDelete thumbnail">
                            <i class="far fa-times-circle fa-2x ml-4 text-danger"></i>
                        </a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$cpu->render()}}
</div>