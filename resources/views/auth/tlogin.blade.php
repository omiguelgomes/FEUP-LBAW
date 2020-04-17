@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Login'])

{{ csrf_field() }}
<div class="container">
    <form method="POST" action="{{ route('login') }}">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="email@example.com" required autofocus>
        @if ($errors->has('email'))
            <span class="error">
            {{ $errors->first('email') }}
            </span>
        @endif

        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password">

        @if ($errors->has('password'))
            <span class="error">
                {{ $errors->first('password') }}
            </span>
        @endif

        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="dropdownCheck">
            Remember me
        </label>
        <button type="submit" class="btn btn-primary">Sign in</button>

        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ url('register') }}">New around here? Sign up</a>
        <a class="dropdown-item" href="#">Forgot password?</a>
    </form>
        <br>
    </div>
@endsection