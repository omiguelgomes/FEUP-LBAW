@extends('layouts.pageWrapper')

@section('content')

@include('partials.jumboTitle',['title' => 'Login'])

<div class="container">
    <form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    
        <label for="email">Email address</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="email@example.com" required autofocus>

        <br>
        <label for="password" class="sr-only">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <br>

        <span class="error">
            @if($errors->all())
            @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
            @endforeach
            @endif
        </span>

        <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
        </label>

        &nbsp;
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ url('register') }}">New around here? Sign up</a>
        <a class="dropdown-item" href="#">Forgot password?</a>
    </form>
    <br>
</div>
@endsection