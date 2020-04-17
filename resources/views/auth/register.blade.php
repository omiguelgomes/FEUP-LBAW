@extends('layouts.pageWrapper')
@section('content')  

@include('partials.jumboTitle',['title' => 'Register'])

<div class="container">
    <h3>Personal Information</h3>

    <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="row my-1">
    
          <div class="form-group col-3">
            <br><br>
            <img src="{{ asset('/images/profilepadrao.jpg') }}" class="rounded mx-auto d-block" alt="imagempadrao" width="150" height="150">
            <a href="#" class="">Change Photo</a>
          </div>
          <div class="form-group col">
            
            <div class="row my-1">

              <label for="name">Name</label>
              <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
              @if ($errors->has('name'))
              <span class="error">
                {{ $errors->first('name') }}
              </span>
              @endif
            </div>
            <div class="row my-1">   
              <label for="email">E-Mail Address</label>
              <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required>
              @if ($errors->has('email'))
              <span class="error">
                {{ $errors->first('email') }}
              </span>
              @endif
            </div>
        
            <div class="row my-1">
              <label for="birthdate">E-Mail Address</label>
              <input id="birthdate" type="date" name="birthdate" value="{{ old('email') }}" required>
              @if ($errors->has('birthdate'))
              <span class="error">
                {{ $errors->first('birthdate') }}
              </span>
              @endif
            </div>
            <div class="row my-1">  
              <label for="password">Password</label>
              <input id="password" type="password" name="password" required>
              @if ($errors->has('password'))
              <span class="error">
                {{ $errors->first('password') }}
              </span>
              @endif
            </div>

            <div class="row my-1">
              <label for="password-confirm">Confirm Password</label>
              <input id="password-confirm" type="password" name="password_confirmation" required>
            </div>
        
            <button type="submit">
              Register
            </button>
            <a class="button button-outline" href="{{ route('login') }}">Login</a>
        </div>
    </div>

    </form>
        
</div>

    
@endsection