<!DOCTYPE html>
<html lang="en">

{{-- HEADER --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UPhone</title>

    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link rel="stylesheet" href="{{ asset('/css/new.css') }}"> --}}
    <link href="{{ asset('css/pageWrapper.css') }}" rel="stylesheet">
    <link href={{ asset("css/bootstrap.min.css") }} rel="stylesheet" />
</head>

<body>
    <div class="allButFooter">
        {{-- website name --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('/images/uPlaceHolder.png') }}" width="30" height="30" alt="">
                Phone
            </a>
            {{-- button for small screens --}}
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- navbar items --}}
            <div class="navbar-collapse collapse" id="navbarColor01" style="">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('cart') }}">Cart
                            <i class="fas fa-shopping-cart fa-lg"></i>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('wishlist') }}">Wishlist
                            <i class="fas fa-heart fa-lg"></i>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('profile') }}">Profile
                            <i class="fas fa-user fa-lg"></i>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('purchase_history') }}">Purchase History
                            <i class="fas fa-history fa-lg"></i>
                        </a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="{{url('search/filter')}}" method="GET"
                    enctype="multipart/form-data" autocomplete="off">
                    <input class="form-control mr-sm-2" name="textSearch" id="navbarSearch" type="text"
                        placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
                <div class="dropdown-menu" style="right: 100; left: auto;" id="dropdownResults">
                    <div class="productGrid">
                    </div>
                </div>
            </div>
        </nav>


        {{-- CONTENT OF A PAGE --}}
        @yield('content')

    </div>
    {{-- FOOTER --}}
    <footer>
        <br>
        <nav class="navbar justify-content-center">
            <a class="navbar-brand" href="{{ url('home') }}">
                <img src="{{ asset('/images/uPlaceHolder.png') }}" width="30" height="30" alt="">Phone
            </a>
        </nav>
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-3 text-center" style="padding-right: -15px; padding-left: -15px;">
                    <h5 style="color: black;">Contact us</h5>
                    <p>+345 925515415</p>
                    <p>support@uphone.com</p>
                    <p>R. Dr. Roberto Frias, 4200-465 Porto</p>
                </div>

                <div class="col-3 text-center">
                    <h5 style="color: black;">Support</h5>
                    <br>
                    <a href="{{ url('FAQ') }}" class="font-weight-bold">FAQ</a>
                    <br>
                    <a href="#" class="font-weight-bold">Ticket us</a>
                    <br>
                    <a class="font-weight-bold" href="{{ url('about') }}">About us</a>
                </div>
            </div>
        </div>

    </footer>
</body>
<script type="text/javascript" src="{{ URL::asset('js/pageWrapper.js') }}"></script>

</html>