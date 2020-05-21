@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Search'])

<link rel="stylesheet" href="{{ asset('/css/search.css') }}">

<form action="{{url('search/filter')}}" method="GET" enctype="multipart/form-data">
    <div class="container" id="main-container">
        <div class="row mx-2">
            <div class="col-2">
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Filters</span>
            </div>
            <div class="col-7 text-center mb-4">
                <input class="form-control form-control-lg w-100" name="textSearch" type="text" placeholder="Search"
                    id="inputLarge" value="{{(request()['textSearch'] == null) ? " " : request()['textSearch']}}">
            </div>
            <div class="col-3">
                <button class="btn btn-secondary" type="submit">
                    <img src="{{ asset('/images/search.svg') }}" width="30" height="30" alt="Serch image">
                </button>
            </div>
            {{ csrf_field() }}
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="row">
                    <div class="col-10 mx-auto">
                        <h1>Filters</h1>
                        {{-- PRICE --}}
                        <label for="minPrice" class="w-75">
                            @if(request()['minPrice'] != null)
                            <a id="minPriceLabel" class="pl-0">{{"Min Price: ".request()['minPrice']."€"}}</a>
                            <input type="range" min="0" max="2500" class="custom-range" id="minPrice" name="minPrice"
                                value={{request()['minPrice']}} step="25">
                            @else
                            <a id="minPriceLabel" class="pl-0">Min Price: 0€ </a>
                            <input type="range" min="0" max="2500" class="custom-range" id="minPrice" name="minPrice"
                                value="0" step="25">
                            @endif
                        </label>
                    </div>
                    <div class="col-10 mx-auto">
                        <label for="maxPrice" class="w-75">
                            @if(request()['maxPrice'] != null)
                            <a id="maxPriceLabel" class="pl-0">{{"Max Price: ".request()['maxPrice']."€"}}</a>
                            <input type="range" min="0" max="2500" class="custom-range" id="maxPrice" name="maxPrice"
                                value={{request()['maxPrice']}} step="25">
                            @else
                            <a id="maxPriceLabel" class="pl-0">Max Price: 2500€ </a>
                            <input type="range" min="0" max="2500" class="custom-range" id="maxPrice" name="maxPrice"
                                value="2500" step="25">
                            @endif
                        </label>
                    </div>

                    {{-- SORT BY PRICE --}}
                    <div class="col-10 mx-auto mb-3">
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

                    {{-- SORT BY TYPE --}}
                    <div class="col-10 mx-auto mb-3">
                        <label>Search by: </label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="deviceTypePhone" name="deviceType" class="custom-control-input"
                                value="phones" {{(request()['deviceType'] == 'phones') ? 'checked' : " "}}>
                            <label class="custom-control-label" for="deviceTypePhone">Phones</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="deviceTypeTablet" name="deviceType" class="custom-control-input"
                                value="tablets" {{(request()['deviceType'] == 'tablets') ? 'checked' : " "}}>
                            <label class="custom-control-label" for="deviceTypeTablet">Tablets</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="deviceTypeBoth" name="deviceType" class="custom-control-input">
                            <label class="custom-control-label" for="deviceTypeBoth">Both</label>
                        </div>
                    </div>

                    {{-- BRAND --}}
                    <div class="col-10 mx-auto mb-2">
                        {{-- BRANDS --}}
                        <button type="button" href="#brands" data-toggle="collapse" class="btn btn-secondary">
                            Brands
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div id="brands" class="collapse mt-2">
                            <div class="form-group">
                                @foreach($brands as $brand)
                                <div class="custom-control custom-checkbox">

                                    <input type="checkbox" class="custom-control-input" id={{"brand".$brand->id}}
                                        value="{{$brand->id}}" name="brand[]"
                                        {{(request()['brand'] !=null && in_array($brand->id, request()['brand']) ? 'checked' : " ")}}>
                                    <label class="custom-control-label" for={{"brand".$brand->id}}>
                                        {{$brand->name}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- FINGERPRINT --}}
                    <div class="col-10 mx-auto mb-2">
                        <button type="button" href="#fingerprints" data-toggle="collapse" class="btn btn-secondary">
                            Fingerprint
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div id="fingerprints" class="collapse mt-2">
                            <div class="form-group">
                                @foreach($fingers as $finger)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id={{"finger".$finger->id}}
                                        value="{{$finger->id}}" name="fingerprint[]"
                                        {{(request()['fingerprint'] !=null && in_array($finger->id, request()['fingerprint']) ? 'checked' : " ")}}>
                                    <label class="custom-control-label" for={{"finger".$finger->id}}>
                                        {{$finger->value}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- WATER RES --}}
                    <div class="col-10 mx-auto">
                        <button type="button" href="#waterres" data-toggle="collapse" class="btn btn-secondary">
                            Water Res
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div id="waterres" class="collapse mt-2">
                            <div class="form-group">
                                @foreach($water as $wr)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id={{"wr".$wr->id}}
                                        value="{{$wr->id}}" name="waterRes[]"
                                        {{(request()['waterRes'] !=null && in_array($wr->id, request()['waterRes']) ? 'checked' : " ")}}>
                                    <label class="custom-control-label" for={{"wr".$wr->id}}>
                                        {{$wr->value}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- RAM --}}
                    <div class="col-10 mx-auto my-2">
                        <label for="ram" class="w-75">
                            @if(request()['minRam'] != null)
                            <a id="minRamLabel" class="pl-0">{{"Min Ram: ".pow(2, request()['minRam'])."GB"}}</a>
                            <input type="range" min="1" max="5" class="custom-range" id="minRam" name="minRam"
                                value={{request()['minRam']}}>
                            @else
                            <a id="minRamLabel" class="pl-0">Min Ram: 2GB</a>
                            <input type="range" min="1" max="5" class="custom-range" id="minRam" name="minRam"
                                value="1">
                            @endif
                        </label>
                    </div>

                    {{-- STORAGE --}}
                    <div class="col-10 mx-auto">
                        <label for="storage" class="w-100">
                            @if(request()['minStorage'] != null)
                            <a id="minStorageLabel"
                                class="pl-0">{{"Min Storage: ".pow(2, request()['minStorage'])."GB"}}</a>
                            <input type="range" min="1" max="10" class="custom-range w-75" id="minStorage"
                                name="minStorage" value={{request()['minStorage']}}>
                            @else
                            <a id="minStorageLabel" class="pl-0">Min Storage: 2GB</a>
                            <input type="range" min="1" max="10" class="custom-range w-75" id="minStorage"
                                name="minStorage" value="1">
                            @endif
                        </label>
                    </div>
                    <div class="col-10 mx-auto mb-5 mt-2">
                        {{-- submit and clear buttons--}}
                        <div class="btn-group" role="group">
                            <button class="btn btn-primary mr-1" type="submit" value="Apply Filters">
                                Apply Filters
                            </button>
                            <button class="btn btn-primary ml-1" href="{{route('search')}}" role="button">
                                Clear Filters
                            </button>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="col-12" id="phone-grid-container">
            <div class="row" id="phone-grid">
                @foreach($products as $product)
                <div class="col-6 col-lg-4 col-xl-3 my-2">
                    <div class="card text-center  vertical-align">
                        <a href="{{ url('product/'.$product->id) }}">
                            <img class="card-img-top" src="{{ asset('images/'.$product->images->first()->path) }}"
                                alt="Card image cap" style="width: 100%; height: auto%;">
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