@extends('layouts.pageWrapper')
@section('content')  

<div class="container">
    <div class="row-12">
        <div class="jumbotron">
            <div class="container">
                <div class="row justify-content-center pb-2">
                    <h1 class="display-4"><b>S20 Ultra</b></h1>
                </div>
                <div class="d-flex bd-highlight mb-3">

                    <div class="mr-auto p-2 bd-highlight">
                        <h5>Samsung</h5>
                    </div>
                    <div class="p-2 bd-highlight">
                        <h5>Rating: 4.9</h5>
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
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner pb-5 center-block">
                <div class="carousel-item active">
                    <img class="d-block " src="{{ asset('/images/s20Ultra.png') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block" src="{{ asset('/images/s20Ultra1.png') }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block" src="{{ asset('/images/s20Ultra2.png') }}" alt="Third slide">
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
    <div class="row">
        <div class="col d-flex justify-content-center">
            <h5><b>1099€</b></h5>
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
        <div class="container">
            <div class="media">
                <img src="{{ asset('/images/user.svg') }}" class="align-self-start mr-3" alt="...">
                <div class="media-body">
                    <h5 class="mt-0">Great phone!</h5>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                        purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                        vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                    <p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Tum soliis natoque
                        penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                </div>
            </div>
        </div>
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