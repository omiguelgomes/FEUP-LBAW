@extends('layouts.pageWrapper')
@section('content')
@include('partials.jumboTitle',['title' => 'Cart'])

<div class="container">
    <div class="row justify-content-around">
        @foreach($cart->sortBy('model') as $product)
        <div class="card text-center mb-3 mx-2" style="max-width: 540px;" id="{{$product->id}}">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <a href="{{url('product/'.$product->id)}}">
                        <img src="{{ asset('images/'.$product->images->first()->path)}}" class="card-img"
                            alt="Product image" style="width: 100%; height: auto;">
                    </a>
                </div>
                <div class="col-md-8">
                    {{-- card title --}}
                    <h3 class="card-header">{{$product->brand->name." ".$product->model}}</h3>
                    {{-- card body --}}
                    <div class="card-body">
                        <div class="row mt-4 no-gutters">
                            {{-- quantity --}}
                            <div class="col-4">
                                {{-- classes must be exactly these --}}
                                <a class="cartDecrementer" value="{{$product->id}}" style="font-size:1.5em;">
                                    <i class="fas fa-minus-circle" style="height:50px;"></i>
                                </a>
                                <a class="quantity" style="font-size:1.5em;">{{$product->pivot->quant}}</a>
                                <a class="cartIncrementer" value="{{$product->id}}" style="font-size:1.5em;">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </div>
                            {{-- price --}}
                            <div class="col-4">
                                <a class="productTotal" style="font-size:1.5em;">
                                    {{$product->price*$product->pivot->quant}}
                                </a>
                                <a style="font-size:1.5em;">€</a>
                            </div>
                            {{-- remove --}}
                            {{-- class must be cartDeleter for it to work --}}
                            <div class="col-4">
                                <a class="cartDeleter" value="{{$product->id}}">
                                    <i class="far fa-times-circle fa-2x ml-4"></i>
                                </a>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col col-12 my-3">
            <a>TOTAL PURCHASE:</a>
            <a id="total">
                {{$cart->sum(function ($product) {
                return $product->price * $product->pivot->quant;
            })}}
            </a>
            <a>€</a>
        </div>
        <div class="col col-12">
            <a class="btn btn-primary" href="{{url('home')}}">
                Continue shopping
            </a>

            @if(count($cart) > 0)
            <a href="{{ url('/cart/buy') }}" class="btn btn-primary">
                Proceed with purchase
            </a>
            @endif
        </div>
    </div>
</div>
{{-- script must be here for js to work --}}
<script type="text/javascript" src="{{ URL::asset('js/cart.js') }}"></script>
@endsection