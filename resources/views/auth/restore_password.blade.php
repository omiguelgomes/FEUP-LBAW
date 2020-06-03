@extends('layouts.pageWrapper')

@section('content')

@include('partials.jumboTitle',['title' => 'Restore Password'])

<script type="text/javascript" src="{{ URL::asset('js/recoverPW.js') }}" defer></script>
<div class="container">
    <form class="recover form" method="POST" enctype="multipart/form-data">
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