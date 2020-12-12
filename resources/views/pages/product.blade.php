@extends('layouts.pageWrapper')
@section('content')
<link href="{{ asset('css/product.css') }}" rel="stylesheet">

<div class="container-fluid">
    {{-- whole page row --}}
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <h1>{{$product->brand->name." ".$product->model}}</h1>
                </div>
                {{-- left side phone image col --}}
                <div class="col-12">
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
                                    <img class="center-block"
                                        src="{{ asset('images/'.$product->images[$count]->path) }}"
                                        alt={{"Slide ".$count}}>
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
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="row">
                <div class="col-12 mt-5 text-center">
                    {{-- ratings --}}
                    <h4>
                        <b>
                            @if(count($product->ratings) == 0)
                            <a id="noRatings">No ratings</a>
                            @else
                            {{$product->averageRating()}}
                            <i class="fas fa-star"></i>
                            @endif
                        </b>
                    </h4>
                </div>
                <div class="col-12 my-5">
                    <h3>Description</h3>
                    <p>
                        {{$product->description->content}}
                    </p>
                </div>
                <div class="col-12 text-center px-0">
                    {{-- price --}}
                    <h2><b>{{$product->price}}€
                            @if(count($product->discounts) > 0)
                            <sup style="text-decoration: line-through;">{{$product->originalPrice()}}€</sup>
                            @endif
                        </b></h2>
                    {{-- cart wishlist buttons --}}
                    <a href="{{ url('/product/'.$product->id.'/cart') }}" class="btn btn-primary rounded my-3">
                        Add to Cart
                        <i class="fas fa-shopping-cart fa-lg"></i>
                    </a>
                    <a href="{{ url('/product/'.$product->id.'/wishlist') }}" class="btn btn-primary rounded ml-2 my-3">
                        Add to Wishlist
                        <i class="fas fa-heart fa-lg"></i>
                    </a>
                </div>
            </div>
        </div>



        {{-- comments and specs --}}
        <div class="col-11 mx-auto my-3">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item w-50">
                    <a class="nav-link active p-2 text-center" id="home-tab" data-toggle="tab" href="#comments"
                        role="tab" aria-controls="home">Comments</a>
                </li>
                <li class="nav-item w-50">
                    <a class="nav-link text-center p-2 text-center" id="specs-tab" data-toggle="tab" href="#specs"
                        role="tab" aria-controls="contact">Specifications</a>
                </li>
            </ul>
            <div class="tab-content py-5" id="myTabContent">
                <div class="tab-pane fade" id="specs" role="tabpanel" aria-labelledby="specs-tab">
                    @include('partials.specsTable',['product' => $product])
                </div>
                <div class="tab-pane fade show active" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                    {{-- Add comment --}}
                    @if($canRate)
                    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" id="addComment">
                        <div class="toast-header">
                            <strong class="mr-auto">Add a review!</strong>
                        </div>
                        <div class="toast-body">
                            <div class="col-12 my-3">
                                <i class="rating far fa-star" id="star1" value="1"></i>
                                <i class="rating far fa-star" id="star2" value="2"></i>
                                <i class="rating far fa-star" id="star3" value="3"></i>
                                <i class="rating far fa-star" id="star4" value="4"></i>
                                <i class="rating far fa-star" id="star5" value="5"></i>
                            </div>
                            <div class="col-12">
                                {{-- needs this id for add comment to work --}}
                                <textarea class="form-control" id="reviewInput" rows="3"
                                    style="margin-top: 0px; margin-bottom: 0px; height: 102px;"
                                    placeholder="Add a review! Don't forget to select a rating"></textarea>

                                <button class="btn btn-primary pull-right my-3" type="button"
                                    id="reviewSubmit">Share</button>
                            </div>
                        </div>
                    </div>
                    @endif
                    {{-- Product comments --}}
                    <div class="commentContainer">
                        @if(count($product->ratings) < 1) <h4 class="text-center" id="noComments">This product doesn't
                            have comments yet!</h4>
                            @else
                            {{-- must maintain class name --}}
                            @foreach($product->ratings as $rating)
                            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <strong class="mr-auto">
                                        {{$rating->val}}/5
                                        <i class="fas fa-star"></i>
                                    </strong>
                                </div>
                                <div class="toast-body p-1">
                                    <div class="row">
                                        <div class="col-4 mr-2 h-100">
                                            <img src="{{ asset('/images/'.$rating->user->image->path) }}"
                                                style="max-height: 100px" class="img-fluid" alt="user image"
                                                onerror="this.onerror=null; this.src=`{{$rating->user->image->path}}`;"
                                                onerror="this.onerror=null; this.src=`{{asset('images/profilepadrao.jpg')}}`;" />
                                        </div>
                                        <div class="col-7 h-100">
                                            <p>
                                                {{$rating->user->name.": ".$rating->content}}
                                            </p>
                                        </div>
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