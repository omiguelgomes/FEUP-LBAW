@extends('layouts.pageWrapper')
@section('content')
<script type="text/javascript" src="{{ URL::asset('js/searchBar.js') }}"></script>

@include('partials.jumboTitle',['title' => 'Wishlist'])

<div class="container mx-auto py-3">

  <div id="grid-container">
    <div class="row pb-3" id="phone-grid">
      {{-- search bar --}}
      <div class="col-12 d-flex">
        <form class="form-inline w-100" action="{{url('wishlist/filter')}}" method="GET" enctype="multipart/form-data">
          <div class="col-8 col-sm-10">
            @if(request()['textSearch'] != null)
            <input class="form-control form-control-lg w-100" name="textSearch" type="text" placeholder="Search"
              id="inputLarge" value="{{request()['textSearch']}}">
            @else
            <input class="form-control form-control-lg w-100" name="textSearch" type="text" placeholder="Search"
              id="inputLarge">
            @endif
          </div>
          <div class="col-4 col-sm-2">
            <button class="btn btn-secondary w-100" type="submit">
              <img src="{{ asset('/images/search.svg') }}" width="30" height="30" alt="">
            </button>
          </div>
        </form>
      </div>
      @foreach($wishlist as $product)
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-2" id="{{$product->id}}">
        <div class="card h-100">
          <h4 class="card-header d-flex align-items-center justify-content-around" style="height:80px;">
            {{$product->brand->name." ".$product->model}}</h4>
          <div class="card-body">
            <h5 class="card-title">{{$product->brand->name}}</h5>
            <h6 class="card-subtitle text-muted">Support card subtitle</h6>
          </div>
          <a href="{{url('product/'.$product->id)}}">
            <img style="height:auto; width: 100%; display: block;"
              src="{{ asset('images/'.$product->images->first()->path) }}" alt="Phone image">
          </a>
          <div class="card-body text-center">
            <b>
              <h5>{{$product->price}}€
                @if(count($product->discounts) > 0)
                <sup style="text-decoration: line-through;">{{$product->originalPrice()}}€</sup>
                @endif
              </h5>
            </b>
            <a href="{{ url('/product/'.$product->id.'/buy')}}" class="btn btn-primary mr-1 px-1"> Buy now <i
                class="fas fa-euro-sign"></i></a>
            <a href="{{ url('/product/'.$product->id.'/cart') }}" class="btn btn-primary ml-1 px-1"> Add to cart <i
                class="fas fa-cart-arrow-down"></i></a>
            {{-- must mantain wishlistDelete in classname to work --}}
            <a class="btn text-danger my-3 wishlistDelete" value="{{$product->id}}">Remove from wishlist</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    {{$wishlist->links()}}
  </div>

</div>
{{-- must be in the bottom to load properly --}}
<script type="text/javascript" src="{{ URL::asset('js/wishlist.js') }}"></script>
@endsection