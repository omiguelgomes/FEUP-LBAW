@extends('layouts.pageWrapper')

@section('content')

<div class="row-12">
    <div class="btn-group d-flex justify-content-between ">
        <div class="btn-group w-100 justify-content-center">
            <a class="btn btn-secondary w-100" href="{{ url('search') }}" role="button">Tablets</a>
        </div>
        <div class="btn-group w-100 justify-content-center">
            <a class="btn btn-secondary w-100" href="{{url('brands')}}" role="button">Brands</a>
        </div>
        <div class="btn-group w-100 justify-content-center">
            <a class="btn btn-secondary w-100" href="#" role="button">Phones</a>
        </div>
    </div>
</div>

<div class="row-12 y-3 p-4">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-interval="2000" data-ride="carousel">
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

<div class="row-12">
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#hot" role="tab" aria-controls="home"
                aria-selected="true">Hot</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="promotions-tab" data-toggle="tab" href="#promotions" role="tab"
                aria-controls="contact" aria-selected="false">Promotions</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="hot" role="tabpanel" aria-labelledby="hot-tab">
            <div class="col-12">
                @include('partials.phoneGrid',['products' => $hotProducts])
            </div>
        </div>

        <div class="tab-pane fade" id="promotions" role="tabpanel" aria-labelledby="promotions-tab">
            <div class="col-12">
                @include('partials.phoneGrid',['products' => $discountProducts])
            </div>
        </div>
    </div>
</div>

<!-- Make carousel indicators and controls black -->
<style>
    .carousel-control-next,
    .carousel-control-prev,
    .carousel-indicators {
        filter: invert(100%);
    }
</style>
@endsection