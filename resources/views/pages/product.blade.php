<link href="{{ asset('css/product.css') }}" rel="stylesheet">
@extends('layouts.pageWrapper')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="jumbotron">
                <div class="mr-auto bd-highlight">
                    <img src="{{asset('images/'.$product->brand->image->path)}}" alt="" style="max-height: 100px;">
                </div>

                <h1 class="display-4"><b>{{$product->model}}</b></h1>

                <div class="p-2 bd-highlight">
                    <h5>
                        @if(count($product->ratings) == 0)
                        No ratings
                        @else
                        {{$product->averageRating()}}
                        @endif
                    </h5>
                </div>
                <div class="p-2 bd-highlight">
                    <i class="fas fa-star"></i>
                </div>
            </div>
        </div>

        <div class="col-8">
            <div class="row bt-4">
                <div class="col-12 mx-auto">
                    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-interval="20000"
                        data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            @for($count = 1; $count < count($product->images); $count++)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$count}}"></li>
                                @endfor
                        </ol>
                        <div class="carousel-inner pb-5 center-block text-center">
                            <div class="carousel-item active">
                                <img class="center-block" src="{{ asset('images/'.$product->images->first()->path) }}"
                                    alt="First Slide">
                            </div>
                            @for($count = 1; $count < count($product->images); $count++)
                                <div class="carousel-item">
                                    <img class="center-block"
                                        src="{{ asset('images/'.$product->images[$count]->path) }}" alt="Slide">
                                </div>
                                @endfor
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-4 m-0">
                    @if(count($product->discounts) > 0)
                    <h2><b>
                            {{$product->price}}€
                        </b></h2>
                    <a style="text-decoration: line-through;">
                        <sup>{{$product->originalPrice()}}€</sup>
                    </a>
                    @else
                    <h2><b>
                            {{$product->price}}€
                        </b></h2>
                    @endif
                </div>
                <div class="col-4 m-0">
                    <a href="{{ url('/product/'.$product->id.'/cart') }}" class="button btn-primary rounded p-1 mx-1">
                        Add to Cart
                    </a>
                    <img src="{{ asset('/images/shopping-cart.svg') }}" width="30" height="30" alt="cart_image">
                </div>
                <div class="col-4 m-0">
                    <a href="{{ url('/product/'.$product->id.'/wishlist') }}"
                        class="button btn-primary rounded p-1 mx-1">
                        Add to Wishlist
                    </a>
                </div>

            </div>
        </div>

        <div class="col-10">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="home"
                        aria-selected="true">Comments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="specs-tab" data-toggle="tab" href="#specs" role="tab"
                        aria-controls="contact" aria-selected="false">Specifications</a>
                </li>
            </ul>
            <div class="tab-content py-5" id="myTabContent">
                <div class="tab-pane fade show active" id="specs" role="tabpanel" aria-labelledby="specs-tab">
                    @include('partials.specsTable',['product' => $product])
                </div>
                <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                    @if(count($product->ratings) < 1) <h4 class="text-center">This product doesn't have comments yet!
                        </h4>
                        @else
                        @foreach($product->ratings as $rating)
                        <div class="container py-3">
                            <div class="media">
                                <img src="{{ asset('/images/'.$rating->user->image->path) }}"
                                    class="align-self-start mr-3" style="max-height: 100px;">
                                <div class="media-body">
                                    <h5 class="mt-0">{{$rating->val}}/5
                                        <i class="fas fa-star"></i>
                                    </h5>
                                    <p>
                                        {{$rating->content}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                </div>

            </div>
        </div>
    </div>
    @endsection