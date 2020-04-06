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

    <div class="col">
      <div class="card text-center" style="width: 18rem;">
        <div class="card-body">
          <div class="container">
            <h5 class="card-title">Samsung Galaxy S5</h5>
            <img src="{{ asset('/images/tele1.jpg') }}" class="card-img" alt="..." style="margin: auto;">
            <h6 class="card-text">Samsung</h6>
            <p><b>499.99€</b></p>
            <button type="button" class="btn btn-small btn-primary mx-2 px-3">Buy Now &nbsp;<i class="fas fa-euro-sign"></i></button>
            <br> <br>
            <button type="button" class="btn btn-small btn-primary mx-2">Add to Cart &nbsp;<i class="fas fa-cart-arrow-down"></i></button>
            <p class="py-3"><a href="#" class="card-link text-danger "><b>Remove from wishlist</b></a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card text-center" style="width: 18rem;">
        <div class="card-body">
          <div class="container">
            <h5 class="card-title">Samsung Galaxy S5</h5>
            <img src="{{ asset('/images/tele1.jpg') }}" class="card-img" alt="..." style="margin: auto;">
            <h6 class="card-text">Samsung</h6>
            <p><b>499.99€</b></p>
            <button type="button" class="btn btn-small btn-primary mx-2 px-3">Buy Now &nbsp;<i class="fas fa-euro-sign"></i></button>
            <br> <br>
            <button type="button" class="btn btn-small btn-primary mx-2">Add to Cart &nbsp;<i class="fas fa-cart-arrow-down"></i></button>
            <p class="py-3"><a href="#" class="card-link text-danger "><b>Remove from wishlist</b></a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card text-center" style="width: 18rem;">
        <div class="card-body">
          <div class="container">
            <h5 class="card-title">Samsung Galaxy S5</h5>
            <img src="{{ asset('/images/tele1.jpg') }}" class="card-img" alt="..." style="margin: auto;">
            <h6 class="card-text">Samsung</h6>
            <p><b>499.99€</b></p>
            <button type="button" class="btn btn-small btn-primary mx-2 px-3">Buy Now &nbsp;<i class="fas fa-euro-sign"></i></button>
            <br> <br>
            <button type="button" class="btn btn-small btn-primary mx-2">Add to Cart &nbsp;<i class="fas fa-cart-arrow-down"></i></button>
            <p class="py-3"><a href="#" class="card-link text-danger "><b>Remove from wishlist</b></a></p>
          </div>
        </div>
      </div>
    </div>

  </div>


  <div class="row mt-4">

    <div class="col">
      <div class="card text-center" style="width: 18rem;">
        <div class="card-body">
          <div class="container">
            <h5 class="card-title">Samsung Galaxy S5</h5>
            <img src="{{ asset('/images/tele1.jpg') }}" class="card-img" alt="..." style="margin: auto;">
            <h6 class="card-text">Samsung</h6>
            <p><b>499.99€</b></p>
            <button type="button" class="btn btn-small btn-primary mx-2 px-3">Buy Now &nbsp;<i class="fas fa-euro-sign"></i></button>
            <br> <br>
            <button type="button" class="btn btn-small btn-primary mx-2">Add to Cart &nbsp;<i class="fas fa-cart-arrow-down"></i></button>
            <p class="py-3"><a href="#" class="card-link text-danger "><b>Remove from wishlist</b></a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card text-center" style="width: 18rem;">
        <div class="card-body">
          <div class="container">
            <h5 class="card-title">Samsung Galaxy S5</h5>
            <img src="{{ asset('/images/tele1.jpg') }}" class="card-img" alt="..." style="margin: auto;">
            <h6 class="card-text">Samsung</h6>
            <p><b>499.99€</b></p>
            <button type="button" class="btn btn-small btn-primary mx-2 px-3">Buy Now &nbsp;<i class="fas fa-euro-sign"></i></button>
            <br> <br>
            <button type="button" class="btn btn-small btn-primary mx-2">Add to Cart &nbsp;<i class="fas fa-cart-arrow-down"></i></button>
            <p class="py-3"><a href="#" class="card-link text-danger "><b>Remove from wishlist</b></a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card text-center" style="width: 18rem;">
        <div class="card-body">
          <div class="container">
            <h5 class="card-title">Samsung Galaxy S5</h5>
            <img src="{{ asset('/images/tele1.jpg') }}" class="card-img" alt="..." style="margin: auto;">
            <h6 class="card-text">Samsung</h6>
            <p><b>499.99€</b></p>
            <button type="button" class="btn btn-small btn-primary mx-2 px-3">Buy Now &nbsp;<i class="fas fa-euro-sign"></i></button>
            <br> <br>
            <button type="button" class="btn btn-small btn-primary mx-2">Add to Cart &nbsp;<i class="fas fa-cart-arrow-down"></i></button>
            <p class="py-3"><a href="#" class="card-link text-danger "><b>Remove from wishlist</b></a></p>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection