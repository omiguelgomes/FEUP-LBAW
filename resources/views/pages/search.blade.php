@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Search'])


<link rel="stylesheet" href="{{ URL::asset('css/sidebar.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/filters.css') }}">

<script type="text/javascript" src="{{ URL::asset('js/slider.js') }}"></script>


<nav class="navbar navbar-expand-lg shadow navbar-light">
    <button class="navbar-toggler d-block" type="button" id="navToggle">
        <span class="navbar-toggler-icon"></span>
    </button>
    <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
        <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search" aria-label="Search">
        <i class="fas fa-search" aria-hidden="true"></i>
    </form>
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
</nav>
    <div class="container">
            {{-- SEARCH RESULTS IN HERE --}}
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        console.log("document is ready");
        $('[data-toggle="offcanvas"], #navToggle').on('click', function() {
            $('.offcanvas-collapse').toggleClass('open')
        })
    });
    window.onload = function() {
        console.log("window is loaded");
    };
</script>
@endsection