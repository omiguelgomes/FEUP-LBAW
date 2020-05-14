@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Search'])

<link rel="stylesheet" href="{{ asset('/css/search.css') }}">

<div class="container">
    <div class="row justify-content-around">
        <input type="text" id="myInput" onkeyup="filter()" placeholder="Search for products..">
    </div>
    <div class="row">
        <form action="{{url('search/filter')}}" method="GET" enctype="multipart/form-data"
            class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2">
            {{ csrf_field() }}
            <div class="filters d-flex flex-column p-0">
                <h5>Filters</h5>
                <label for="minPrice">
                    @if(request()['minPrice'] != null)
                    <a>Min Price: </a> <a id="minPriceLabel">{{request()['minPrice']}}</a>€
                    <input type="range" min="0" max="3000" class="custom-range" id="minPrice" name="minPrice"
                        value={{request()['minPrice']}}>
                    @else
                    <a>Min Price: </a> <a id="minPriceLabel">1500</a>€
                    <input type="range" min="0" max="3000" class="custom-range" id="minPrice" name="minPrice">
                    @endif
                </label>
                <label for="maxPrice">
                    @if(request()['maxPrice'] != null)
                    <a>Max Price</a> <a id="maxPriceLabel">{{request()['maxPrice']}}</a>€
                    <input type="range" min="0" max="3000" class="custom-range" id="maxPrice" name="maxPrice"
                        value={{request()['maxPrice']}}>
                    @else
                    <a>Max Price</a> <a id="maxPriceLabel">1500</a>€
                    <input type="range" min="0" max="3000" class="custom-range" id="maxPrice" name="maxPrice">
                    @endif
                </label>

                <a href="#brands" data-toggle="collapse" class="btn btn-secondary my-1">
                    Brands
                    <i class="fa fa-caret-down"></i>
                </a>
                <div id="brands" class="collapse">
                    @foreach($brands as $brand)
                    <div class="form-check">
                        <label class="form-check-label">
                            {{$brand->name}}
                            <input type="checkbox" class="brandCheckbox" value="{{$brand->id}}" name="brand[]"
                                @if(request()['brand'] !=null && in_array($brand->id, request()['brand'])) checked
                            ="checked"
                            @endif>
                        </label>
                    </div>
                    @endforeach
                </div>
                <a href="#fingerprint" data-toggle="collapse" class="btn btn-secondary my-1">
                    FingerPrint Scanner
                    <i class="fa fa-caret-down"></i>
                </a>
                <div id="fingerprint" class="collapse">
                    @foreach($fingers as $finger)
                    <div class="form-check">
                        <label class="form-check-label">
                            {{$finger->value}}
                            <input type="checkbox" class="fingerprintCheckbox" value="{{$finger->id}}"
                                name="fingerprint[]" @if(request()['fingerprint'] !=null && in_array($finger->id,
                            request()['fingerprint'])) checked
                            ="checked"@endif>
                        </label>
                    </div>
                    @endforeach
                </div>
                <a href="#waterres" data-toggle="collapse" class="btn btn-secondary my-1">
                    Water Resistance
                    <i class="fa fa-caret-down"></i>
                </a>

                <div id="waterres" class="collapse">
                    @foreach($water as $wr)
                    <div class="form-check">
                        <label class="form-check-label">
                            {{$wr->value}}
                            <input type="checkbox" class="wrCheckbox" value="{{$wr->id}}" name="waterRes[]"
                                @if(request()['waterRes'] !=null && in_array($wr->value, request()['waterRes']))
                            checked="checked"
                            @endif>
                        </label>
                    </div>
                    @endforeach
                </div>
                <button class="btn btn-primary" type="submit" id="applyFilters" value="Apply Filters">
                    Apply Filters
                </button>
                <a href="{{url('search')}}" class="btn btn-primary mt-2">
                    Clear Filters
                </a>
            </div>
        </form>

        <div class="col-8 col-sm-8 col-md-9 col-lg-10 col-xl-10" id="phone-grid-container">
            <div class="row" id="phone-grid">
                @foreach($products as $product)
                <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 my-2">
                    <div class="card text-center  vertical-align">
                        <a href="{{ url('product/'.$product->id) }}">
                            <img class="card-img-top" src="{{ asset('images/'.$product->images->first()->path) }}"
                                alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title" value="{{$product->toJson()}}">{{$product->brand->name}}</h5>
                            <h5 class="card-title-model">{{$product->model}}</h5>
                            <a href="{{ url('product/'.$product->id) }}" class="btn btn-secondary w-75">See</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{$products->links()}}
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/searchBar.js') }}"></script>
    @endsection
</div>