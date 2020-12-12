@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Profile Page'])


<div class="container">
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="row-form">
            <div class="d-flex">
                <div class="p-1">
                    <h3>Personal Information</h3>
                </div>
                <div class="btn-group">
                    <div class="ml-auto p-1"><button id="edit" type="button" class="btn btn-small btn-primary"><i
                                class="far fa-edit"></i></button></div>
                    @if($user->isadmin)
                    <a href="{{ url('/admin') }}">
                        <div class="ml-auto p-1"><button type="button" class="btn btn-small btn-primary">Management
                                Area</button></div>
                    </a>
                    @endif

                </div>
            </div>
            <div class="row ml-2">
                <span>{{$user->name}}</span> &nbsp;<a class="button" href="{{ url('/logout') }}">Logout</a>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-4 text-center">
                    <br>
                    <img src="{{ asset('/images/'.$user->image->path) }}" style= "max-width:200px; max-height: 250px" class="img-fluid" alt="user image"
                        onerror="this.onerror=null; this.src=`{{$user->image->path}}`;" onerror="this.onerror=null; this.src=`{{asset('images/profilepadrao.jpg')}}`;" />
                    <input type="file" name="inputImg" class="form-control" id="fileInput" disabled>
                    @if ($errors->has('inputImg'))
                    <span class="error">
                        {{ $errors->first('inputImg') }}
                    </span>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <br>
                    <label for="inputEmail4">Email<a class="text-danger">*</a></label>
                    <input type="email" value='{{$user->email}}' name='email' class="form-control" id="inputEmail4"
                        placeholder="{{$user->email}}" readonly>
                    <br>
                    <label for="inputPassword4">Password<a class="text-danger">*</a></label>
                    <input type="password" name='password' class="form-control" id="inputPassword4"
                        placeholder="**********" readonly>
                    <br>
                    <label for="inputAge">Birth Date</label>
                    <input type="date" value='{{$user->birthdate}}' name='birthdate' class="form-control" id="inputAge"
                        placeholder="{{$user->birthdate}}" readonly>
                </div>
            </div>

            @foreach($user->address as $address)
            <div class="form-group">
                <label for="inputAddress">Address<a class="text-danger">*</a></label>
                <input type="text" value='{{$address->street}}' name='street' class="form-control" id="inputAddress"
                    placeholder="{{$address->street}}" readonly>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="inputCity">City<a class="text-danger">*</a></label>
                    <input type="text" value='{{$address->city->name}}' name='city' class="form-control" id="inputCity"
                        placeholder="{{$address->city->name}}" readonly>
                </div>
                <div class="form-group col-sm-6">
                    <label for="inputCountry">Country<a class="text-danger">*</a></label>
                    <input type="text" value='{{$address->country->name}}' name='country' class="form-control"
                        id="inputCountry" placeholder="{{$address->country->name}}" readonly>
                </div>
                <div class="form-group col-sm-2">
                    <label for="inputZip">Postal Code<a class="text-danger">*</a></label>
                    <input type="text" value='{{$address->postal_code}}' name='postalcode' class="form-control"
                        id="inputZip" placeholder="{{$address->postal_code}}" readonly>
                </div>
                <input type="hidden" name="addressID" value="{{$address->id}}" />
            </div>

            <br>
            <h5>Billing Data</h5>
            <br>
            @if(count($user->address) > 1)
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" value='{{$address->street}}' name='streetbd' class="form-control" id="inputAddress"
                    placeholder="{{$address->street}}" readonly>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" value='{{$address->city->name}}' name='citybd' class="form-control"
                        id="inputCity" placeholder="{{$address->city->name}}" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Postal Code</label>
                    <input type="text" value='{{$address->postalcode}}' name='postalcodebd' class="form-control"
                        id="inputZip" placeholder="{{$address->postalcode}}" readonly>
                </div>
            </div>

            @else <p>Add new Address!</p>
            @endif
            <a class="text-danger">* Campos Obrigatórios</a>
            <br><br>
            <button id="change" type="submit" class="btn btn-primary" disabled>Change</button>
            &nbsp;<a class="text-danger align-middle" id="deleteUser" value="{{$user->id}}">Delete Account</a>
            @endforeach

        </div>
    </form>
</div>
{{-- script must be here for js to work --}}
<script type="text/javascript" src="{{ URL::asset('js/profile.js') }}"></script>
@endsection