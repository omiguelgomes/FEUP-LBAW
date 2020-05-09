<link href="{{ asset('css/product.css') }}" rel="stylesheet">
@extends('layouts.pageWrapper')
@section('content')
<div class="container-fluid">
    {{-- whole page row --}}
    <div class="row">
        {{-- left side phone image col --}}
        <div class="col-12 col-lg-5">
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-interval="2000"
                data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    @for($count = 1; $count < count($product->images); $count++)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$count}}"></li>
                        @endfor
                </ol>
                <div class="carousel-inner pb-5 center-block text-center">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/'.$product->images->first()->path) }}" alt="First Slide">
                    </div>
                    @for($count = 1; $count < count($product->images); $count++)
                        <div class="carousel-item">
                            <img class="center-block" src="{{ asset('images/'.$product->images[$count]->path) }}"
                                alt={{"Slide ".$count}}>
                        </div>
                        @endfor
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

        {{-- top right side col --}}
        <div class="col-12 col-lg-7">
            <div class="row align-items-center">
                {{-- brand col --}}
                <div class="col-5 col-lg-4">
                    <div class="bd-highlight">
                        <img src="{{asset('images/'.$product->brand->image->path)}}" alt="" class="img-fluid">
                    </div>
                </div>
                {{-- model col --}}
                <div class="col-5 col-lg-6 text-center">
                    <h1>{{$product->model}}</h1>
                </div>
                {{-- ratings --}}
                <div class="col-2">
                    <h5>
                        @if(count($product->ratings) == 0)
                        <a id="noRatings">No ratings</a>
                        @else
                        {{$product->averageRating()}}
                        <i class="fas fa-star"></i>
                        @endif
                    </h5>
                </div>
                {{-- price --}}
                <div class="col-12 col-sm-4 text-center mb-3">
                    <h2><b>{{$product->price}}€ </b></h2>
                    @if(count($product->discounts) > 0)
                    <sup style="text-decoration: line-through;">{{$product->originalPrice()}}€</sup>
                    @endif
                </div>
                {{-- cart wishlist buttons --}}
                <div class="col-12 col-sm-8 text-center mb-3">
                    <a href="{{ url('/product/'.$product->id.'/cart') }}" class="btn btn-primary rounded">
                        Add to Cart
                    </a>
                    <img src="{{ asset('/images/shopping-cart.svg') }}" width="30" height="30" alt="cart_image">

                    <a href="{{ url('/product/'.$product->id.'/wishlist') }}" class="btn btn-primary rounded ml-2">
                        Add to Wishlist
                    </a>
                </div>
            </div>
        </div>

        {{-- comments and specs --}}
        <div class="col-10 mx-auto">
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
                    {{-- Add comment --}}
                    @if($canRate)

                    <div class="container pb-cmnt-container" id="addComment">
                        <div class="row">
                            <div class="col-12">
                                <i class="rating far fa-star" id="star1" value="1"></i>
                                <i class="rating far fa-star" id="star2" value="2"></i>
                                <i class="rating far fa-star" id="star3" value="3"></i>
                                <i class="rating far fa-star" id="star4" value="4"></i>
                                <i class="rating far fa-star" id="star5" value="5"></i>
                            </div>
                            <div class="col-md-6 col-md-offset-3">
                                <div class="panel panel-info">
                                    <div class="panel-body">
                                        {{-- needs this id for add comment to work --}}
                                        <textarea placeholder="Add a review! Don't forget to select a rating"
                                            class="pb-cmnt-textarea" id="reviewInput"></textarea>
                                        <button class="btn btn-primary pull-right" type="button"
                                            id="reviewSubmit">Share</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    {{-- Product comments --}}
                    <div class="commentContainer">
                        @if(count($product->ratings) < 1) <h4 class="text-center" id="noComments">This product doesn't
                            have
                            comments
                            yet!</h4>
                            @else
                            {{-- must maintain class name --}}
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
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/productPage.js') }}"></script>
@endsection