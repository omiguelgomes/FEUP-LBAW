@extends('layouts.pageWrapper')
@section('content')  

<div class="container">
   <div class="jumbotron jumbotron-fluid">
       <div class="container text-center">
         <h1 class="display-4">Cart</h1>
   </div>
</div>  

<div class="container">
    <br>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Products</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a href="{{ url('phone') }}">
                        <img src="{{ asset('/images/tele1.jpg') }}" alt="..." style="width:80px;">
                    </td>
                    <td>
                        <div class="card-body">
                            <h5 class="card-title">Samsung Galaxy S5 (64GB - Preto) </h5>
                            <h6 class="card-text">Samsung</h6>
                        </div>
                    </td>
                    <td>1</td>
                    <td>499.99€</td>
                    <td>
                        <a href="#" class="thumbnail">
                            <i class="far fa-times-circle fa-2x ml-4"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="{{ url('phone') }}">
                        <img src="{{ asset('/images/tele1.jpg') }}" alt="..." style="width:80px;">
                    </td>
                    <td>
                        <div class="card-body">
                            <h5 class="card-title">Samsung Galaxy S5 (64GB - Preto) </h5>
                            <h6 class="card-text">Samsung</h6>
                        </div>
                    </td>
                    <td>1</td>
                    <td>499.99€</td>
                    <td>
                        <a href="#" class="thumbnail">
                            <i class="far fa-times-circle fa-2x ml-4"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="{{ url('phone') }}">
                        <img src="{{ asset('/images/tele1.jpg') }}" alt="..." style="width:80px;">
                    </td>
                    <td>
                        <div class="card-body">
                            <h5 class="card-title">Samsung Galaxy S5 (64GB - Preto) </h5>
                            <h6 class="card-text">Samsung</h6>
                        </div>
                    </td>
                    <td>1</td>
                    <td>499.99€</td>
                    <td>
                        <a href="#" class="thumbnail">
                            <i class="far fa-times-circle fa-2x ml-4"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th scope="row" colspan="5" class="text-right">Shipping Costs: 0.00 €</th>
                </tr>
                <tr>
                    <th scope="row" colspan="5" class="text-right">TOTAL PURCHASE: 1499.97 €</th>
                </tr>
            </tbody>
        </table>

        <div class="d-flex">
            <div class="p-2 bd-highlight">
                <button type="button" class="btn btn-primary bg-white text-primary">Continue shopping</button>
            </div>
            <div class="ml-auto p-2 bd-highlight">
                <button type="button" class="btn btn-primary">Proceed with purchase</button>
            </div>
        </div>
    </div>


@endsection