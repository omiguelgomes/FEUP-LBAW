@extends('layouts.pageWrapper')
@section('content')  

@include('partials.jumboTitle',['title' => 'Add a New Product'])


<div class="container">
    <div class="row-form">
        <form>
        <h3>Product Information</h3>
            <div class="form-row">
                <div class="form-group col-md-6 text-center">
                    <br><br>
                    <img src="{{ asset('/productpadrao.jpg') }}" class="rounded mx-auto d-block" alt="imagempadrao" width="150" height="150">
                    <a href="#" class="">Change Photo</a>
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
                    <select class="form-control" id="inputBrand" type="text" required>
                        <option>Apple</option>
                        <option>Samsung</option>
                        <option>Huawei</option>
                        <option>Asus</option>
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
                    <label for="inputOS">Operative Sistem<a class="text-danger"> *</a></label>
                    <br>
                    <select class="form-control" id="inputOS" type="text" required>
                        <option>Apple</option>
                        <option>Android</option>
                    </select>
                    @if ($errors->has('inputOS'))
                    <span class="error">
                        {{ $errors->first('inputOS') }}
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
                    <select class="form-control" id="inputCPUname" type="text" required>
                        <option>Snapdragon 855</option>
                        <option>Snapdragon 865</option>
                        <option>Snapdragon 873</option>
                    </select>
                    @if ($errors->has('inputCPUname'))
                    <span class="error">
                        {{ $errors->first('inputCPUname') }}
                    </span>
                    @endif
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputCPUfreq">CPU Frequency (gHz)<a class="text-danger"> *</a></label>
                    <br>
                    <input id="inputCPUfreq" type="number" class="form-control" name="inputCPUfreq" required>
                    @if ($errors->has('inputCPUfreq'))
                    <span class="error">
                        {{ $errors->first('inputCPUfreq') }}
                    </span>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <label for="inputCPUcores">CPU Cores<a class="text-danger"> *</a></label>
                    <br>
                    <select class="form-control" id="inputCPUcores" type="number" required>
                        <option>2</option>
                        <option>4</option>
                        <option>8</option>
                        <option>16</option>
                    </select>
                    @if ($errors->has('inputCPUcores'))
                    <span class="error">
                        {{ $errors->first('inputCPUcores') }}
                    </span>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <label for="inputCPUthreads">CPU Threads<a class="text-danger"> *</a></label>
                    <br>
                    <select class="form-control" id="inputBrand" type="number" required>
                        <option>4</option>
                        <option>8</option>
                        <option>16</option>
                        <option>32</option>
                    </select>
                    @if ($errors->has('inputCPUthreads'))
                    <span class="error">
                        {{ $errors->first('inputCPUthreads') }}
                    </span>
                    @endif
                </div>
            </div>

            <br>

            <div class="form-group">
                <label for="inputGPU">GPU<a class="text-danger"> *</a></label>
                <br>
                <select class="form-control" id="inputBrand" type=text required>
                        <option>Apple A12Z</option>
                        <option>Nvidia Tegra X1 Maxwell</option>
                        <option>Apple A10 Fusion</option>
                    </select>
                    @if ($errors->has('inputGPU'))
                    <span class="error">
                        {{ $errors->first('inputGPU') }}
                    </span>
                    @endif
            </div>
            

            <br>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputRAM">RAM (Gb)<a class="text-danger"> *</a></label>
                    <br>
                    <select class="form-control" id="inputBrand" type="number" required>
                        <option>1</option>
                        <option>2</option>
                        <option>4</option>
                        <option>6</option>
                        <option>8</option>
                    </select>
                    @if ($errors->has('inputRAM'))
                    <span class="error">
                        {{ $errors->first('inputRAM') }}
                    </span>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="inputScreen">Screen Size (inches)<a class="text-danger"> *</a></label>
                    <br>
                    <input id="inputScreen" type="number" class="form-control" name="inputScreen" required>
                    @if ($errors->has('inputScreen'))
                    <span class="error">
                        {{ $errors->first('inputScreen') }}
                    </span>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="inputStorage">Storage Capacity (Gb)<a class="text-danger"> *</a></label>
                    <br>
                    <select class="form-control" id="inputBrand" type="number" required>
                        <option>24</option>
                        <option>32</option>
                        <option>64</option>
                        <option>128</option>
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
                    <select class="form-control" id="inputBrand" type="number" required>
                        <option>3400</option>
                        <option>4200</option>
                        <option>2700</option>
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
                    <input id="inputWeight" type="number" class="form-control" name="inputWeight" required>
                    @if ($errors->has('inputWeight'))
                    <span class="error">
                        {{ $errors->first('inputWeight') }}
                    </span>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="inputWater">Water Resistance<a class="text-danger"> *</a></label>
                    <br>
                    <input id="inputWater" type="text" class="form-control" name="inputWater" required>
                    @if ($errors->has('inputWater'))
                    <span class="error">
                        {{ $errors->first('inputWater') }}
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