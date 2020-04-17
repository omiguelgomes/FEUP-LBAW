@extends('layouts.pageWrapper')

@section('content')

<div class="row-12">
    <div class="btn-group d-flex justify-content-between ">
        <div class="btn-group w-100 justify-content-center">
            <a class="btn btn-secondary w-100" href="{{ url('search') }}" role="button">Tablets</a>
        </div>
        <div class="btn-group w-100 justify-content-center">
        <a class="btn btn-secondary w-100" href="#" role="button">Brands</a>
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

<div class="container">
    <nav>
        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="new-tab" href="#">Hot</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="best-tab" href="#">New</a>
            </li>
        </div>
    </nav>
    {{-- NOTA: FIXAR TAMANHO DE CARDS DENTRO DA PHONEGRID, ALTURA VARIA COM A IMAGEM ATM --}}
    @include('partials.phoneGrid',['products' => $hotProducts])
</div>
    
<!-- Make carousel indicators and controls black -->
<style>
    .carousel-control-next,
    .carousel-control-prev,
    .carousel-indicators {
        filter: invert(100%);
    }

    @media only screen and (max-width: 600px) {
        .carousel-item {
            width: 600px;
        }
    }
</style>

{{-- DOENST WORK --}}
<script>
//     $('#nav-tab li:first-child a').on('click', function(e) {
//         e.preventDefault()
//         $(this).tab('show')
//     })

//     $('#nav-tab a').on('click', function(e) {
//         e.preventDefault()
//         $(this).tab('show')
//     })
// </script>

@endsection