<!DOCTYPE html>
<html lang="en">

{{-- HEADER --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UPhone</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

</head>

<body>
    {{-- NAVBAR --}}
    <div class="py-3">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand mr-auto ml-4 mt-2 mt-lg-0" href="{{ url('home') }}">
                <img src="{{ asset('/images/uPlaceHolder.png') }}" width="30" height="30" alt="">
                Phone
            </a>

            <a class="nav-item nav-link" href="{{ url('cart') }}">
                <img src="{{ asset('/images/shopping-cart.svg') }}" width="30" height="30" alt="">
            </a>


            <a class="nav-item nav-link" href="{{ url('search') }}">
                <img src="{{ asset('/images/search.svg') }}" width="30" height="30" alt="">
            </a>


            <a class="nav-item nav-link" href="{{ url('profile') }}">
                <img src="{{ asset('/images/user.svg') }}" width="30" height="30" alt="">
            </a>
        </nav>
    </div>


    {{-- CONTENT OF A PAGE --}}
    @yield('content')

    {{-- FOOTER --}}
    <!--for search bar-->
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<footer>
    <nav class="navbar navbar-light bg-light justify-content-center">
        <a class="navbar-brand" href="{{ url('home') }}">
            <img src="{{ asset('/images/uPlaceHolder.png') }}" width="30" height="30" alt="">Phone
        </a>
    </nav>
        <div class="row px-3">

            <div class="col-6 bg-light text-center">
                <h5 style="color: black;">Contact us</h5>
                <p>+345 925515415</p>
                <p>support@uphone.com</p>
                <p>R. Dr. Roberto Frias, 4200-465 Porto</p>
            </div>

            <div class="col-6 bg-light text-center">
                <h5 style="color: black;">Support</h5>
                <br>
                <a href="{{ url('FAQ') }}" class="font-weight-bold">FAQ</a>
                <br>
                <a href="#" class="font-weight-bold">Ticket us</a>
                <br>
                <a class="font-weight-bold" href="{{ url('about') }}">About us</a>
            </div>
        </div>
</footer>

</html>