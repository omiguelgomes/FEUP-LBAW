@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Register'])

<div class="container">
  <div class="card bg-primary">
    <article class="card-body mx-auto" style="max-width: 400px;">
      <h4 class="card-title mt-3 text-center">Create Account</h4>
      <p class="text-center">Get started with your free account</p>
      <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="row my-1">
          <div class="form-group col-12">

            {{-- name  --}}
            @if ($errors->has('name'))
            <a class="error" style="color: red; text-align: center;">
              {{ $errors->first('name') }}
            </a>
            @endif
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
              </div>
              <input id="name" name="name" class="form-control" placeholder="Full name" type="text"
                value="{{ old('name') }}" required>
            </div>

            {{-- email --}}
            @if ($errors->has('email'))
            <a class="error" style="color: red; text-align: center;">
              {{ $errors->first('email') }}
            </a>
            @endif
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
              </div>
              <input id="email" name="email" class="form-control" placeholder="Email address" type="email"
                value="{{ old('email') }}" required>
            </div>

            {{-- bithdate --}}
            @if ($errors->has('birthdate'))
            <a class="error" style="color: red; text-align: center;">
              {{ $errors->first('birthdate') }}
            </a>
            @endif
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-calendar"></i> </span>
              </div>
              <input id="birthdate" type="date" class="form-control" name="birthdate" value="{{ old('birthdate') }}"
                required>
            </div>

            {{-- password --}}
            @if ($errors->has('password'))
            <a class="error" style="color: red; text-align: center;">
              {{ $errors->first('password') }}
            </a>
            @endif
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
              </div>
              <input class="form-control" id="password" name="password" placeholder="Create password" type="password"
                required>
            </div>

            {{-- repeat password --}}
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
              </div>
              <input class="form-control" id="password-confirm" name="password_confirmation"
                placeholder="Repeat password" type="password" required>
            </div>
          </div>
          <div class="row ml-4 justify-content-center">
           <div class="col-auto">
             <button class="btn btn-dark ml-4" type="submit">
               Register
             </button>
            </div>
            <div class="col-auto">
              <a href="login/google" class= "btn btn-danger ">Register with Google</a>
            </div>
          </div>
          <div class="col-12 mt-4 text-center">
            Already have an account?
            <a href="{{ route('login') }}">Login</a>
          </div>
        </div>
      </form>

  </div>


  @endsection