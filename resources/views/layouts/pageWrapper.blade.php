<!DOCTYPE html>
<html lang="en">

{{-- HEADER --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UPhone</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/pageWrapper.css') }}" rel="stylesheet">
</head>

<body>
    {{-- NAVBAR --}}
    <div class="py-3">
        <nav class="navbar navbar-light bg-light">
            {{-- website name --}}
            <a class="navbar-brand mr-auto ml-4 mt-2 mt-lg-0" href="{{ url('home') }}">
                <img src="{{ asset('/images/uPlaceHolder.png') }}" width="30" height="30" alt="">
                Phone
            </a>

            {{-- cart --}}
            <a class="nav-item nav-link" href="{{ url('cart') }}">
                <img src="{{ asset('/images/shopping-cart.svg') }}" width="30" height="30" alt="">
            </a>

            {{-- search bar --}}
            <a type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('/images/search.svg') }}" width="30" height="30">
            </a>
            <div class="dropdown-menu" style="right: 0; left: auto;">
                <form action="{{url('search/filter')}}" method="GET" enctype="multipart/form-data">
                    <input type="text" placeholder="Search..." name="textSearch" class="ml-1">
                    <button class="btn btn-secondary mr-1" type="submit">
                        <img src="{{ asset('/images/search.svg') }}" width="30" height="30" alt="">
                    </button>
                </form>
            </div>

            {{-- dropdown --}}
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('/images/user.svg') }}" width="30" height="30">
                </button>
                <div class="dropdown-menu" style="right: 0; left: auto;">
                    <a class="dropdown-item" href="{{ url('profile') }}">Profile</a>
                    <a class="dropdown-item" href="{{ url('wishlist') }}">Wishlist</a>
                    <a class="dropdown-item" href="{{ url('purchase_history') }}">Purchase History</a>
                </div>
            </div>
        </nav>
    </div>


    {{-- CONTENT OF A PAGE --}}
    @yield('content')

    {{-- FOOTER --}}
    <!--for search bar/ dropdown-->
</body>
<footer>
    <br>
    <nav class="navbar navbar-light bg-light justify-content-center">
        <a class="navbar-brand" href="{{ url('home') }}">
            <img src="{{ asset('/images/uPlaceHolder.png') }}" width="30" height="30" alt="">Phone
        </a>
    </nav>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-3 bg-light text-center" style="padding-right: -15px; padding-left: -15px;">
                <h5 style="color: black;">Contact us</h5>
                <p>+345 925515415</p>
                <p>support@uphone.com</p>
                <p>R. Dr. Roberto Frias, 4200-465 Porto</p>
            </div>

            <div class="col-3 bg-light text-center">
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

</html>