@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Search'])

<link rel="stylesheet" href="{{ URL::asset('css/sidebar.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/filters.css') }}">
<script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>


{{-- <nav class="navbar navbar-expand-lg shadow navbar-light">
    <div class="navbar-collapse offcanvas-collapse mt-4 ">
        <div class="row">
            <div class="col-md-4 col-lg-3">
                <div class="filters d-flex flex-column">
                    <h5>Filters</h5>
                    <h6>Brand</h6>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <p>Apple</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <p>Samsung</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <p>Google</p>
                        </label>
                    </div>
                    <h6>Storage</h6>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <p>256 GB</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <p>128 GB</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <p>64 GB</p>
                        </label>
                    </div>
                </div>
            </div>
        </div>
</nav> --}}
<div class="container">
    <div class="row justify-content-around">
        <input type="text" id="myInput" onkeyup="filter()" placeholder="Search for products..">
    </div>
    <div class="row-12">
        @include('partials.phoneGrid',['products' => $products])
    </div>
</div>

@endsection