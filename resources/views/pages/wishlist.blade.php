<script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>
@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Wishlist'])

<div class="container mx-auto py-3">

  <nav class="navbar navbar-light bg-light mb-4">
    <div class="row justify-content-around">
      <input type="text" id="myInput" onkeyup="filter()" placeholder="Search for products..">
    </div>
  </nav>

  <div class="row" id="phone-grid">
    @foreach($wishlist as $product)
    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
      <div class="card text-center  vertical-align">
        <a href="{{ url('product/'.$product->id) }}">
          <img class="card-img-top" src="{{ asset('images/'.$product->images->first()->path) }}" alt="Card image cap">
        </a>
        <div class="card-body">
          <h5 class="card-title">{{$product->brand->name}}</h5>
          <h5 class="card-title">{{$product->model}}</h5>
          <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ url('/product/'.$product->id.'/buy')}}" class="btn btn-primary mr-1 px-1"> Buy now <i
                class="fas fa-euro-sign"></i></a>
            <a href="{{ url('/product/'.$product->id.'/cart') }}" class="btn btn-primary ml-1 px-1"> Add to cart <i
                class="fas fa-cart-arrow-down"></i></a>
          </div>
          <a href="{{ url('wishlist/remove/'.$product->id)}}" class="btn text-danger my-3">Remove from wishlist</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>


</div>
@endsection