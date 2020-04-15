@extends('layouts.pageWrapper')
@section('content')  
    <div class="container">
        <div class="row-12">
            <div class="jumbotron">
                <div class="container">
                    <div class="row justify-content-center pb-2">
                        <h1 class="display-4"><b>{{$product->model}}</b></h1>
                    </div>
                    <div class="d-flex bd-highlight mb-3">
    
                        <div class="mr-auto p-2 bd-highlight">
                            <h5>{{$product->brand->name}}</h5>
                        </div>
                        <div class="p-2 bd-highlight">
                            {{-- NOTA: PRODUCT N TEM RATING ASSOCIADO --}}
                            <h5>Rating: 4.5</h5>
                        </div>
                        <div class="p-2 bd-highlight">
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row py-3 row justify-content-around ">
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-interval="20000" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    @for($count = 1; $count < count($product->image()); $count++)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$count}}"></li>
                    @endfor
                </ol>
                <div class="carousel-inner pb-5 center-block">
                     <div class="carousel-item active">
                        <img class="d-block" src="{{ asset('images/'.$product->image()[0]) }}" alt="First Slide">
                    </div>
                    @for($count = 1; $count < count($product->image()); $count++)
                        <div class="carousel-item">
                            <img class="d-block " src="{{ asset('images/'.$product->image()[$count]) }}" alt="Slide">
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
        <div class="row">
            <div class="col d-flex justify-content-center">
            <h5><b>{{$product->price}}€</b></h5>
            </div>
            <div class="col d-flex justify-content-center">
                <button type="button" class="btn btn-primary">Add to Cart</button>&nbsp;&nbsp;
                <img src="{{ asset('/images/shopping-cart.svg') }}" width="30" height="30" alt="cart_image">
            </div>
        </div>
    
        <div class="row d-flex justify-content-center my-3">
            <ul class="nav nav-pills nav-fill black mb-3">
                <li class="nav-item">
                    <a class="nav-link active nav-link-color" href="#">Comments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-color" href="#">Specifications</a>
                </li>
            </ul>
            @foreach($product->ratings as $rating)
                <div class="container">
                    <div class="media">
                        <img src="{{ asset('/images/user.svg') }}" class="align-self-start mr-3" alt="...">
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
        </div>
    
    </div>
    
    <!-- Make carousel indicators and controls black -->
    <style>
        .nav-pills>li>a.active {
            background-color: black !important;
            color: white !important;
        }
    
        .nav-pills>li>a:hover {
            color: black !important;
        }
    
        .nav-link-color {
            color: black;
        }
    
        .carousel-control-next,
        .carousel-control-prev,
        .carousel-indicators {
            filter: invert(100%);
        }
    
        /* should be a better way to limit size */
        .carousel-item>* {
            /* width: auto;
            height: auto;
            max-width: inherit;
            object-fit: cover;
            margin: auto;  */
            max-height: 300px;
        }
    
        .fa-star {
            color: #f7aa31;
        }
    </style>
    
@endsection