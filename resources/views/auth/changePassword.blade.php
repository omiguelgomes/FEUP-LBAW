@extends('layouts.pageWrapper')

@section('content')

@include('partials.jumboTitle',['title' => 'Change Password'])

<script type="text/javascript" src="{{ URL::asset('js/changePW.js') }}" defer></script>
<div class="container">
    <form class="changePW form" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    
        <label for="pass">Password Field</label>
        <input type="password" class="form-control" id="pass" name="pass"  required autofocus>

        <br>

        <label for="pass2">Confirm Password</label>
        <input type="password" class="form-control" id="pass2" name="pass2"  required autofocus>

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