@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Search'])

<link rel="stylesheet" href="{{ asset('/css/search.css') }}">

<form action="{{url('search/filter')}}" method="GET" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                @if(request()['textSearch'] != null)
                <input type="text" placeholder="Search..." style="max-width:2000px;" name="textSearch"
                    value="{{request()['textSearch']}}">
                @else
                <input type="text" placeholder="Search..." style="max-width:2000px;" name="textSearch">
                @endif
                <button class="btn btn-secondary" type="submit">
                    <img src="{{ asset('/images/search.svg') }}" width="30" height="30" alt="">
                </button>
            </div>
            <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2">
                {{ csrf_field() }}
                {{-- Text box --}}

                <div class="filters d-flex flex-column p-0">
                    <h5>Filters</h5>

                    {{-- PRICE --}}
                    <label for="minPrice">
                        @if(request()['minPrice'] != null)
                        <a>Min Price: </a> <a id="minPriceLabel">{{request()['minPrice']}}</a>€
                        <input type="range" min="0" max="3000" class="custom-range" id="minPrice" name="minPrice"
                            value={{request()['minPrice']}}>
                        @else
                        <a>Min Price: </a> <a id="minPriceLabel">0</a>€
                        <input type="range" min="0" max="3000" class="custom-range" id="minPrice" name="minPrice"
                            value="0">
                        @endif
                    </label>
                    <label for="maxPrice">
                        @if(request()['maxPrice'] != null)
                        <a>Max Price</a> <a id="maxPriceLabel">{{request()['maxPrice']}}</a>€
                        <input type="range" min="0" max="3000" class="custom-range" id="maxPrice" name="maxPrice"
                            value={{request()['maxPrice']}}>
                        @else
                        <a>Max Price</a> <a id="maxPriceLabel">3000</a>€
                        <input type="range" min="0" max="3000" class="custom-range" id="maxPrice" name="maxPrice"
                            value="3000">
                        @endif
                    </label>

                    {{-- BRANDS --}}
                    <a href="#brands" data-toggle="collapse" class="btn btn-secondary my-1">
                        Brands
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <div id="brands" class="collapse">
                        @foreach($brands as $brand)
                        <div class="form-check">
                            <label class="form-check-label">
                                {{$brand->name}}
                                @if(request()['brand'] !=null && in_array($brand->id, request()['brand']))
                                <input type="checkbox" class="brandCheckbox" value="{{$brand->id}}" name="brand[]"
                                    checked="checked">
                                @else
                                <input type="checkbox" class="brandCheckbox" value="{{$brand->id}}" name="brand[]">
                                @endif
                            </label>
                        </div>
                        @endforeach
                    </div>

                    {{-- FINGERPRINT --}}
                    <a href="#fingerprint" data-toggle="collapse" class="btn btn-secondary my-1">
                        FingerPrint Scanner
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <div id="fingerprint" class="collapse">
                        @foreach($fingers as $finger)
                        <div class="form-check">
                            <label class="form-check-label">
                                {{$finger->value}}
                                @if(request()['fingerprint'] !=null && in_array($finger->id, request()['fingerprint']))
                                <input type="checkbox" class="fingerprintCheckbox" value="{{$finger->id}}"
                                    name="fingerprint[]" checked="checked">
                                @else
                                <input type="checkbox" class="fingerprintCheckbox" value="{{$finger->id}}"
                                    name="fingerprint[]">
                                @endif
                            </label>
                        </div>
                        @endforeach
                    </div>

                    {{-- WATERRES --}}
                    <a href="#waterres" data-toggle="collapse" class="btn btn-secondary my-1">
                        Water Resistance
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <div id="waterres" class="collapse">
                        @foreach($water as $wr)
                        <div class="form-check">
                            <label class="form-check-label">
                                {{$wr->value}}
                                @if(request()['waterRes'] !=null && in_array($wr->id, request()['waterRes']))
                                <input type="checkbox" class="wrCheckbox" value="{{$wr->id}}" name="waterRes[]"
                                    checked="checked">
                                @else
                                <input type="checkbox" class="wrCheckbox" value="{{$wr->id}}" name="waterRes[]">
                                @endif
                            </label>
                        </div>
                        @endforeach
                    </div>

                    {{-- RAM --}}
                    <a href="#ram" data-toggle="collapse" class="btn btn-secondary my-1">
                        RAM
                        <i class="fa fa-caret-down"></i>
                    </a>
                    {{-- dont change min and max. value to search is 2^val--}}
                    <div id="ram" class="collapse">
                        <label for="ram">
                            @if(request()['minRam'] != null)
                            <a>Min RAM: </a> <a id="minRamLabel">{{pow(2, request()['minRam'])}}</a>GB
                            <input type="range" min="1" max="5" class="custom-range" id="minRam" name="minRam"
                                value={{request()['minRam']}}>
                            @else
                            <a>Min Ram: </a> <a id="minRamLabel">2</a>GB
                            <input type="range" min="1" max="5" class="custom-range" id="minRam" name="minRam"
                                value="1">
                            @endif
                        </label>
                    </div>

                    {{-- STORAGE --}}
                    <a href="#storage" data-toggle="collapse" class="btn btn-secondary my-1">
                        Storage
                        <i class="fa fa-caret-down"></i>
                    </a>
                    {{-- dont change min and max. value to search is 2^val--}}
                    <div id="storage" class="collapse">
                        <label for="storage">
                            @if(request()['minStorage'] != null)
                            <a>Min storage: </a> <a id="minStorageLabel">{{pow(2, request()['minStorage'])}}</a>GB
                            <input type="range" min="1" max="10" class="custom-range" id="minStorage" name="minStorage"
                                value={{request()['minStorage']}} step="1">
                            @else
                            <a>Min storage: </a> <a id="minStorageLabel">2</a>GB
                            <input type="range" min="1" max="10" class="custom-range" id="minStorage" name="minStorage"
                                value="1" step="1">
                            @endif
                        </label>
                    </div>

                    {{-- submit and clear buttons--}}
                    <button class="btn btn-primary" type="submit" id="applyFilters" value="Apply Filters">
                        Apply Filters
                    </button>
                    <a href="{{url('search')}}" class="btn btn-primary mt-2">
                        Clear Filters
                    </a>
                </div>
            </div>

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
</form>
<script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/searchBar.js') }}"></script>
@endsection
</div>