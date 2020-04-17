@extends('layouts.pageWrapper')
@section('content')  
 
@include('partials.jumboTitle',['title' => 'Profile Page'])


<div class="container">
    <div class="row-form">
        <form>
            <div class="d-flex">
                <div class="p-1">
                    <h3>Personal Information</h3>
                </div>
                <div class="ml-auto p-1"><button type="button" class="btn btn-small btn-primary"><i class="far fa-edit"></i></button></div>
            </div>

            <div class="form-row">
              
                <div class="form-group col-md-4 text-center">
                    <br><br>
                    <img src="{{ asset('/images/'.$user->image->path) }}" class="rounded mx-auto d-block" alt="imagempadrao" style="max-height: 300px;">
                    <a href="#" class="">Change Photo</a>
                    @if (Auth::check())
                    <div class="row">
                        <a class="button" href="{{ url('/logout') }}"> Logout    </a> <span>{{$user->name }}</span>
                    </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email<a class="text-danger">*</a></label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="{{$user->email}}" readonly>
                    <br>
                    <label for="inputPassword4">Password<a class="text-danger">*</a></label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="**********" readonly>
                    <br>
                    <label for="inputAge">Birth Date</label>
                <input type="number" class="form-control" id="inputAge" placeholder="{{$user->birthdate}}" readonly>
                </div>
            </div>

            {{-- COMMENTED BECAUSE NEWLY CREATED USERS DONT HAVE ADDRESS --}}
            {{-- <div class="form-group">
                <label for="inputAddress">Address<a class="text-danger">*</a></label>
                <input type="text" class="form-control" id="inputAddress" placeholder="{{$user->address->street}}" readonly>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City<a class="text-danger">*</a></label>
                    <input type="text" class="form-control" id="inputCity" placeholder="{{$user->address->city()}}" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Postal Code<a class="text-danger">*</a></label>
                    <input type="text" class="form-control" id="inputZip" placeholder="{{$user->address->postalcode}}" readonly>
                </div>
            </div>

            <br>
            <h5>Billing Data</h5>
            <br>

            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="{{$user->address->street}}" readonly>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="{{$user->address->city()}}" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Postal Code</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="{{$user->address->postalcode}}" readonly>
                </div>
            </div>
            <a class="text-danger">* Campos Obrigatórios</a>
            <br><br>
            <button type="button" class="btn btn-primary" disabled>Change</button>
            <a class="text-danger align-middle" href="#"> Delete Account</a>

        </form> --}}
    </div>
</div>
    @endsection