@extends('layouts.pageWrapper')
<link href="{{ asset('css/homePage.css') }}" rel="stylesheet">
@section('content')

{{-- category button group --}}
<div class="row-12 my-2">
    <form action="{{url('search/filter')}}" method="GET" enctype="multipart/form-data">
        <div class="btn-group w-100">
            <div class="col-4 px-1">
                <button type="submit" class="btn btn-primary btn-lg btn-block" value="phones"
                    name="deviceType">Phones</button>
            </div>
            <div class="col-4 px-1">
                <a type="button" class="btn btn-primary btn-lg btn-block" href="{{url('brands')}}">Brands</a>
            </div>
            <div class="col-4 px-1">
                <button type="submit" class="btn btn-primary btn-lg btn-block" value="tablets"
                    name="deviceType">Tablets</button>
            </div>
        </div>
    </form>
</div>
{{-- carousel --}}
<div class="row-12 w-100">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade new-banner" data-interval="2000"
        data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('/images/teste.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('/images/teste.jpg') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('/images/teste.jpg') }}" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
{{-- hot and discount tabs --}}
<ul class="nav nav-tabs justify-content-center mt-4">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#hot">Most bought</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#discounts">Top discounts</a>
    </li>
</ul>
<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade active show" id="hot">
        @include('partials.phoneGrid',['products' => $hotProducts])
    </div>
    <div class="tab-pane fade" id="discounts">
        @include('partials.phoneGrid',['products' => $discountProducts])
    </div>
</div>
@endsection