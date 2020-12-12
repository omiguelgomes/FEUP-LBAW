@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Add a New Product'])


<div class="container">
    <div class="row-form">
        <form method="POST" action="{{ route('create_product') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3>Product Information</h3>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <br><br>
                    <label for="inputImg">Product Images<a class="text-danger"> *</a></label>
                    <br>
                    <div class="custom-file col-md-6">
                        <input type="file" class="custom-file-input" name="inputImg[]" id="inputImg" multiple="multiple"
                            required>
                        <label class="custom-file-label" for="inputImg">Choose file</label>
                    </div>
                    @if ($errors->has('inputImg'))
                    <span class="error">
                        {{ $errors->first('inputImg') }}
                    </span>
                    @endif
                    <div class="form-group my-4">
                        <label for="inputDescription">Phone description<a class="text-danger"> *</a></label>
                        <textarea class="form-control my-3" id="exampleTextarea" name="inputDescription" rows="10"
                            required></textarea>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputName">Name and Model<a class="text-danger"> *</a></label>
                    <br>
                    <input id="inputName" type="text" name="inputName" class="form-control" required autofocus>
                    @if ($errors->has('inputName'))
                    <span class="error">
                        {{ $errors->first('inputName') }}
                    </span>
                    @endif

                    <br>
                    <label for="inputBrand">Brand<a class="text-danger"> *</a></label>
                    <br>
                    <select class="form-control" id="inputBrand" name="inputBrand" type="text" required>
                        @foreach($brands as $id => $name)
                        <option value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('inputBrand'))
                    <span class="error">
                        {{ $errors->first('inputBrand') }}
                    </span>
                    @endif

                    <br>
                    <label for="inputPrice">Price<a class="text-danger"> *</a></label>
                    <br>
                    <input id="inputPrice" type="number" name="inputPrice" class="form-control" required>
                    @if ($errors->has('inputPrice'))
                    <span class="error">
                        {{ $errors->first('inputPrice') }}
                    </span>
                    @endif

                    <br>
                    <label for="inputStock">Initial stock:<a class="text-danger"> *</a></label>
                    <br>
                    <input id="inputStock" type="number" name="inputStock" class="form-control" required>
                    @if ($errors->has('inputStock'))
                    <span class="error">
                        {{ $errors->first('inputStock') }}
                    </span>
                    @endif

                    <br>
                    <label for="inputOS">Operating System<a class="text-danger"> *</a></label>
                    <br>
                    <select class="form-control" id="inputOS" name="inputOS" type="text" required>
                        @foreach($os as $id => $name)
                        <option value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('inputOS'))
                    <span class="error">
                        {{ $errors->first('inputOS') }}
                    </span>
                    @endif

                    <br>
                    <label for="inputCat">Category<a class="text-danger"> *</a></label>
                    <br>
                    <select class="form-control" id="inputCat" name="inputCat" type="text" required>
                        <option value="Phones">Phones</option>
                        <option value="Tablets">Tablets</option>
                    </select>
                    @if ($errors->has('inputCat'))
                    <span class="error">
                        {{ $errors->first('inputCat') }}
                    </span>
                    @endif

                </div>
            </div>

            <br>

            <br>
            <h5>Specification Info</h5>
            <br>

            <div class="form-group">
                <label for="inputCPUname">CPU<a class="text-danger"> *</a></label>
                <br>
                <select class="form-control" id="inputCPUname" name="inputCPUname" type="text" required>
                    @foreach($cpu as $id => $name)
                    <option value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('inputCPUname'))
                <span class="error">
                    {{ $errors->first('inputCPUname') }}
                </span>
                @endif
            </div>

            <br>

            <div class="form-group">
                <label for="inputGPU">GPU<a class="text-danger"> *</a></label>
                <br>
                <select class="form-control" id="inputGPU" name="inputGPU" type=text required>
                    @foreach($gpu as $id => $name)
                    <option value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('inputGPU'))
                <span class="error">
                    {{ $errors->first('inputGPU') }}
                </span>
                @endif
            </div>


            <br>

            <div class="form-group">
                <label for="inputRAM">RAM (Gb)<a class="text-danger"> *</a></label>
                <br>
                <select class="form-control" id="inputRAM" name="inputRAM" type="number" required>
                    @foreach($ram as $id => $value)
                    <option value="{{$id}}">{{$value}}</option>
                    @endforeach
                </select>
                @if ($errors->has('inputRAM'))
                <span class="error">
                    {{ $errors->first('inputRAM') }}
                </span>
                @endif
            </div>

            <br>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputScreen">Screen Size (inches)<a class="text-danger"> *</a></label>
                    <br>
                    <select class="form-control" id="inputScreen" name="inputScreen" type="number" required>
                        @foreach($screen as $id => $value)
                        <option value="{{$id}}">{{$value}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('inputScreen'))
                    <span class="error">
                        {{ $errors->first('inputScreen') }}
                    </span>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="inputStorage">Storage Capacity (Gb)<a class="text-danger"> *</a></label>
                    <br>
                    <select class="form-control" id="inputStorage" name="inputStorage" type="number" required>
                        @foreach($storage as $id => $value)
                        <option value="{{$id}}">{{$value}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('inputStorage'))
                    <span class="error">
                        {{ $errors->first('inputStorage') }}
                    </span>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="inputBattery">Battery Capacity (mA)<a class="text-danger"> *</a></label>
                    <br>
                    <select class="form-control" id="inputBattery" name="inputBattery" type="number" required>
                        @foreach($battery as $id => $value)
                        <option value="{{$id}}">{{$value}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('inputBattery'))
                    <span class="error">
                        {{ $errors->first('inputBattery') }}
                    </span>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="inputWeight">Weight (g)<a class="text-danger"> *</a></label>
                    <br>
                    <select class="form-control" id="inputWeight" name="inputWeight" type="number" required>
                        @foreach($weight as $id => $value)
                        <option value="{{$id}}">{{$value}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('inputWeight'))
                    <span class="error">
                        {{ $errors->first('inputWeight') }}
                    </span>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="inputWater">Water Resistance<a class="text-danger"> *</a></label>
                    <br>
                    <select class="form-control" id="inputWater" name="inputWater" type="text" required>
                        @foreach($water as $id => $value)
                        <option value="{{$id}}">{{$value}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('inputWater'))
                    <span class="error">
                        {{ $errors->first('inputWater') }}
                    </span>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="inputSreenRes">Screen Resolution<a class="text-danger"> *</a></label>
                    <br>
                    <select class="form-control" id="inputSreenRes" name="inputSreenRes" type="text" required>
                        @foreach($screenRes as $id => $value)
                        <option value="{{$id}}">{{$value}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('inputSreenRes'))
                    <span class="error">
                        {{ $errors->first('inputSreenRes') }}
                    </span>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="inputCamRes">Camera Resolution<a class="text-danger"> *</a></label>
                    <br>
                    <select class="form-control" id="inputCamRes" name="inputCamRes" type="text" required>
                        @foreach($cams as $id => $value)
                        <option value="{{$id}}">{{$value}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('inputCamRes'))
                    <span class="error">
                        {{ $errors->first('inputCamRes') }}
                    </span>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="inputFinger">Fingerprint Type<a class="text-danger"> *</a></label>
                    <br>
                    <select class="form-control" id="inputFinger" name="inputFinger" type="text" required>
                        @foreach($fingers as $id => $value)
                        <option value="{{$id}}">{{$value}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('inputFinger'))
                    <span class="error">
                        {{ $errors->first('inputFinger') }}
                    </span>
                    @endif
                </div>

            </div>


            <br>
            <a class="text-danger">* Mandatory Fields</a>
            <br><br>
            <button type="submit" class="btn btn-primary">Add product to the store</button>

        </form>
    </div>
    <br>
</div>


@endsection