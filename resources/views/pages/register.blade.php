@extends('layouts.pageWrapper')
@section('content')  

<div class="container">
  <div class="jumbotron jumbotron-fluid">
      <div class="container text-center">
        <h1 class="display-4">Register</h1>
  </div>
</div>  

<div class="container">
    <div class="row-form">
        <form>
        <h3>Personal Information</h3>
            <div class="form-row">
                <div class="form-group col-md-4 text-center">
                    <br><br>
                    <img src="../assets/profilepadrao.jpg" class="rounded mx-auto d-block" alt="imagempadrao" width="150" height="150">
                    <a href="#" class="">Change Photo</a>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email<a class="text-danger">*</a></label>
                    <input type="email" class="form-control" id="inputEmail4">
                    <br>
                    <label for="inputPassword4">Password<a class="text-danger">*</a></label>
                    <input type="password" class="form-control" id="inputPassword4">
                    <br>
                    <label for="inputAge">Age</label>
                    <input type="number" class="form-control" id="inputAge">
                </div>
            </div>

            <div class="form-group">
                <label for="inputAddress">Address<a class="text-danger">*</a></label>
                <input type="text" class="form-control" id="inputAddress">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City<a class="text-danger">*</a></label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Postal Code<a class="text-danger">*</a></label>
                    <input type="text" class="form-control" id="inputZip">
                </div>
            </div>

            <br>
            <h5>Billing Data</h5>
            <br>

            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Postal Code</label>
                    <input type="text" class="form-control" id="inputZip">
                </div>
            </div>

            <a class="text-danger">* Campos Obrigatórios</a>
            <br><br>
            <button type="button" class="btn btn-primary">Create my account</button>


        </form>
    </div>
</div>

