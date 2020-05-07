@extends('layouts.pageWrapper')
@section('content')
<script type="text/javascript" src="{{ URL::asset('js/cart.js') }}"></script>
@include('partials.jumboTitle',['title' => 'Cart'])


<div class="container" id="table_container">
    <div class="container" id="table-responsive">
        <table class="table">
            @include('partials.phoneList',['products' => $cart->sortBy('model'), 'xButton' => 'cart'])
            <tr>
                <th scope="row" colspan="5" class="text-right">Shipping Costs: 0.00 €</th>
            </tr>
            <tr>
                <th scope="row" colspan="5" class="text-right">TOTAL PURCHASE: {{$cart->sum(function ($product) {
                    return $product->price * $product->pivot->quant;
                })}} €</th>
            </tr>
        </table>
        <div class="d-flex">
            <div class="ml-auto p-2 bd-highlight">
                <a class="btn btn-primary" href="{{url('home')}}">
                    Continue shopping
                </a>
            </div>
            <div class="ml-auto p-2 bd-highlight">
                @if(count($cart) > 0)
                <a href="{{ url('/cart/buy') }}" class="btn btn-primary">
                    Proceed with purchase
                </a>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection