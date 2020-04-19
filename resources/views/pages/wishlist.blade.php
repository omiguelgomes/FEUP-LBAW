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

  <div class="row">
      @foreach($wishlist as $product)
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
          <div class="card mx-1 my-1">
              <img class="card-img" src="{{ asset('images/'.$product->image()[0]) }}" alt="Card image cap">
              <div class="card-body ">

                  <h5 class="card-title">{{$product->model}}</h5>

                  {{-- cant center this for every size, always breaks fsr --}}
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="#" class="btn btn-primary mr-1 px-1"> Buy now <i class="fas fa-euro-sign"></i></a>
                    <a href="{{ url('/product/'.$product->id.'/cart') }}" class="btn btn-primary ml-1 px-1"> Add to cart <i class="fas fa-cart-arrow-down"></i></a>
                  </div>

                  <a href="#" class="btn text-danger my-3">Remove from wishlist</a>
              </div>
          </div>
        </div>
      @endforeach
  </div>
</div>
@endsection