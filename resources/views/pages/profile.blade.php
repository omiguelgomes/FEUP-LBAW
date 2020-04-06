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
                    <img src="{{ asset('/images/profilepadrao.jpg') }}" class="rounded mx-auto d-block" alt="imagempadrao" width="150" height="150">
                    <a href="#" class="">Change Photo</a>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email<a class="text-danger">*</a></label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="joaopaulo_n@hotmail.com" readonly>
                    <br>
                    <label for="inputPassword4">Password<a class="text-danger">*</a></label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="**********" readonly>
                    <br>
                    <label for="inputAge">Age</label>
                    <input type="number" class="form-control" id="inputAge" placeholder="20" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Address<a class="text-danger">*</a></label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Rua da Igreja Velha 30" readonly>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City<a class="text-danger">*</a></label>
                    <input type="text" class="form-control" id="inputCity" placeholder="Paredes" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Postal Code<a class="text-danger">*</a></label>
                    <input type="text" class="form-control" id="inputZip" placeholder="4580-113" readonly>
                </div>
            </div>

            <br>
            <h5>Billing Data</h5>
            <br>

            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Rua da Igreja Velha 30" readonly>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="Paredes" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Postal Code</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="4580-113" readonly>
                </div>
            </div>
            <a class="text-danger">* Campos Obrigatórios</a>
            <br><br>
            <button type="button" class="btn btn-primary" disabled>Change</button>&nbsp;&nbsp;
            <a class="text-danger align-middle" href="#"> Delete Account</a>

        </form>
    </div>
</div>
@endsection