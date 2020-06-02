@extends('layouts.pageWrapper')

@section('content')

@include('partials.jumboTitle',['title' => 'Restore Password'])

<div class="container">
    <form method="POST" action="{{ route('restore_password') }}">
    {{ csrf_field() }}
    
        <label for="email">Email address</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="email@example.com" required autofocus>

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

    
        &nbsp;
        <div class="row p-3">
            <button class="btn btn-primary" type="submit">Send Recovery Email</button> &nbsp;&nbsp;
        </div>
    </form>
    <br>
</div>
@endsection