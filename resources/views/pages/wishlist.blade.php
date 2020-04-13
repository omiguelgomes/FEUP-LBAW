@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Wishlist'])

<div class="container mx-auto py-3">

  <nav class="navbar navbar-light bg-light mb-4">
    <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </nav>

  <div class="row no-gutters row-cols-xs-5 row-cols-sm-4 row-col-md-3 row-col-lg-2 text-center">

    <?php $nrCards = 10; $nrCols = 3;

      for ($col = 0; $col < $nrCards; $col++) {?>
        <div class="col-<?= 12/$nrCols?> ">
            <div class="card width-100 mx-1 my-1">
                <img class="card-img-top" src="{{ asset('/images/s20Ultra1.png') }}" alt="Card image cap">
                <div class="card-body justify-content-center">
                    <h5 class="card-title">Phone</h5>
                    <p class="card-text">Quick description of the phone in place.</p>

                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="#" class="btn btn-primary w-75 mx-1"> Buy now <i class="fas fa-euro-sign"></i></a>
                      <a href="#" class="btn btn-primary w-75 mx-1"> Add to cart <i class="fas fa-cart-arrow-down"></i></a>
                    </div>

                    <a href="#" class="btn text-danger my-3">Remove from wishlist</a>

                </div>
            </div>
        </div>

    <?php }?>
  </div>
</div>
@endsection