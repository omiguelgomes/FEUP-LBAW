@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Search'])

<link rel="stylesheet" href="{{ asset('/css/search.css') }}">

<form action="{{url('search/filter')}}" method="GET" enctype="multipart/form-data">
    <div class="container" id="main-container">
        <div class="row">
            <div class="col-8 text-center mb-4">
                <input class="form-control form-control-lg w-100" name="textSearch" type="text" placeholder="Search"
                    id="inputLarge" value="{{(request()['textSearch'] == null) ? " " : request()['textSearch']}}">
            </div>
            <div class="col-4">
                <button class="btn btn-secondary" type="submit">
                    <img src="{{ asset('/images/search.svg') }}" width="30" height="30" alt="">
                </button>
            </div>

            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Filters</span>
            {{ csrf_field() }}
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="row">
                    <div class="col-10 mx-auto">
                        <h1>Filters</h1>

                        {{-- PRICE --}}
                        <label for="minPrice">
                            @if(request()['minPrice'] != null)
                            <a id="minPriceLabel">{{"Min Price: ".request()['minPrice']."€"}}</a>
                            <input type="range" min="0" max="2500" class="custom-range" id="minPrice" name="minPrice"
                                value={{request()['minPrice']}} step="25">
                            @else
                            <a id="minPriceLabel">Min Price: 0€ </a>
                            <input type="range" min="0" max="2500" class="custom-range" id="minPrice" name="minPrice"
                                value="0" step="25">
                            @endif
                        </label>
                    </div>
                    <div class="col-10 mx-auto">
                        <label for="maxPrice">
                            @if(request()['maxPrice'] != null)
                            <a id="maxPriceLabel">{{"Max Price: ".request()['maxPrice']."€"}}</a>
                            <input type="range" min="0" max="2500" class="custom-range" id="maxPrice" name="maxPrice"
                                value={{request()['maxPrice']}} step="25">
                            @else
                            <a id="maxPriceLabel">Max Price: 2500€ </a>
                            <input type="range" min="0" max="2500" class="custom-range" id="maxPrice" name="maxPrice"
                                value="2500" step="25">
                            @endif
                        </label>
                    </div>

                    {{-- SORT BY PRICE --}}
                    <div class="col-10 mx-auto">
                        <label>Sort by price: </label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="sortByPrice" class="custom-control-input"
                                value="asc" {{(request()['sortByPrice'] == 'asc') ? 'checked' : " "}}>
                            <label class="custom-control-label" for="customRadio1">Ascending</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="sortByPrice" class="custom-control-input"
                                value="desc" {{(request()['sortByPrice'] == 'desc') ? 'checked' : " "}}>
                            <label class="custom-control-label" for="customRadio2">Descending</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio3" name="sortByPrice" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio3">None</label>
                        </div>
                    </div>

                    {{-- BRAND --}}
                    <div class="col-10 mx-auto">
                        {{-- BRANDS --}}
                        <a href="#brands" data-toggle="collapse" class="btn btn-secondary my-1">
                            Brands
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <div id="brands" class="collapse">
                            <div class="form-group">
                                @foreach($brands as $brand)
                                <div class="custom-control custom-checkbox">

                                    <input type="checkbox" class="custom-control-input" id={{"customCheck".$brand->id}}
                                        value="{{$brand->id}}" name="brand[]"
                                        {{(request()['brand'] !=null && in_array($brand->id, request()['brand']) ? 'checked' : " ")}}>
                                    <label class="custom-control-label" for={{"customCheck".$brand->id}}>
                                        {{$brand->name}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-10">
                        {{-- submit and clear buttons--}}
                        <button class="btn btn-primary" type="submit" id="applyFilters" value="Apply Filters">
                            Apply Filters
                        </button>
                        <a href="{{url('search')}}" class="btn btn-primary mt-2">
                            Clear Filters
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12" id="phone-grid-container">
            <div class="row" id="phone-grid">
                @foreach($products as $product)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 my-2">
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
</form>
<script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/searchBar.js') }}"></script>
@endsection
</div>