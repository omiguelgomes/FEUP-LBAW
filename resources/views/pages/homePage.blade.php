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
    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <picture>
                    {{-- image for large screens --}}
                    <source srcset="{{asset('images/banner-wide.jpg')}}" media="(min-width: 1200px)">
                    {{-- image for small screens --}}
                    <source srcset="{{asset('images/banner.jpg')}}" media="(min-width: 769px)">
                    <img srcset="{{asset('images/banner.jpg')}}" alt="responsive image"
                        class="d-block img-fluid mx-auto">
                </picture>
            </div>
            <div class="carousel-item">
                <picture>
                    <source srcset="{{asset('images/banner2-wide.jpg')}}" media="(min-width: 1200px)">
                    <source srcset="{{asset('images/banner2.jpg')}}" media="(min-width: 769px)">
                    <img srcset="{{asset('images/banner2.jpg')}}" alt="responsive image"
                        class="d-block img-fluid mx-auto">
                </picture>
            </div>
            <div class="carousel-item">
                <picture>
                    <source srcset="{{asset('images/banner3-wide.jpg')}}" media="(min-width: 1200px)">
                    <source srcset="{{asset('images/banner3.jpg')}}" media="(min-width: 769px)">
                    <img srcset="{{asset('images/banner3.jpg')}}" alt="responsive image"
                        class="d-block img-fluid mx-auto">
                </picture>
            </div>
        </div>

        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
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