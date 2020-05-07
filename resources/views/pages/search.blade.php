@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Search'])

{{-- <link rel="stylesheet" href="{{ URL::asset('css/sidebar.css') }}"> --}}
<link rel="stylesheet" href="{{ URL::asset('css/filters.css') }}">
<script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/filter.js') }}"></script>

<div class="container">
    <div class="row justify-content-around">
        <input type="text" id="myInput" onkeyup="filter()" placeholder="Search for products..">
    </div>
    <div class="row">
        <div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2">
            <div class="filters d-flex flex-column p-0">
                <h5>Filters</h5>

                <a href="#brands" data-toggle="collapse" class="btn btn-secondary my-1">Brands <i
                        class="fa fa-caret-down"></i></a>
                <div id="brands" class="collapse">
                    @foreach($brands as $brand)
                    <div class="form-check">
                        <input type="checkbox" class="brandCheckbox" value="{{$brand->name}}">
                        <label class="form-check-label">
                            {{$brand->name}}
                        </label>
                    </div>
                    @endforeach
                </div>

                <a href="#fingerprint" data-toggle="collapse" class="btn btn-secondary my-1">FingerPrint Scanner <i
                        class="fa fa-caret-down"></i></a>
                <div id="fingerprint" class="collapse">
                    @foreach($fingers as $finger)
                    <div class="form-check">
                        <input type="checkbox" class="fingerprintCheckbox" value="{{$finger->value}}">
                        <label class=" form-check-label">
                            {{$finger->value}}
                        </label>
                    </div>
                    @endforeach
                </div>

                <a href="#waterres" data-toggle="collapse" class="btn btn-secondary my-1">Water Resistance <i
                        class="fa fa-caret-down"></i></a>
                <div id="waterres" class="collapse">
                    @foreach($water as $wr)
                    <div class="form-check">
                        <input type="checkbox" class="wrCheckbox" value="{{$wr->value}}">
                        <label class="form-check-label">
                            {{$wr->value}}
                        </label>
                    </div>
                    @endforeach
                </div>

                {{-- <a href="#storage" data-toggle="collapse" class="btn btn-secondary my-1">Storage <i
                    class="fa fa-caret-down"></i></a>
                <div id="storage" class="collapse">
                    @foreach($storage as $st)
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <p>{{$st->value}} GB</p>
                </label>
            </div>
            @endforeach
        </div> --}}

        {{-- <a href="#ram" data-toggle="collapse" class="btn btn-secondary my-1">RAM <i class="fa fa-caret-down"></i></a>
        <div id="ram" class="collapse">
            @foreach($ram as $rm)
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    <p>{{$rm->value}} GB</p>
        </label>
    </div>
    @endforeach
</div> --}}



<input class="btn btn-primary" type="button" id="apply_filter" value="submit" />
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
@endsection