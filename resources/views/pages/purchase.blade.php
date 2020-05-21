<link href="{{ asset('css/purchase.css') }}" rel="stylesheet">
@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Purchase details'])

<div class="container ">
    <div class="d-flex bd-highlight mb-3">
        <h3>Order status: </h3>
        <div class="bd-highlight">
            @if($purchase->status->pstate == 'Delivered')
            <h3 class="text-success">{{$purchase->status->pstate}}</h3>
            @elseif($purchase->status->pstate == 'Sent')
            <h3 class="text-warning">{{$purchase->status->pstate}}</h3>
            @elseif($purchase->status->pstate == 'Processing')
            <h3 class="text-primary">{{$purchase->status->pstate}}</h3>
            @elseif($purchase->status->pstate == 'Awaiting Payment')
            <h3 class="text-danger">{{$purchase->status->pstate}}</h3>
            @endif
        </div>
    </div>
    <h4>{{"Purchase total: ".$purchase->val." €"}}</h4>
    <div class="row d-flex">
        <div class="col-12">
            <ul id="progressbar" class="text-center" style="display: flex; justify-content: center;">
                @if($purchase->status->pstate == 'Processing')
                <li class="active step0">
                    <i class="fas fa-box-open fa-3x mt-3"></i>
                    <h4>Order Shipped</h4>
                </li>
                <li class="step0">
                    <i class="fas fa-shipping-fast fa-3x mt-3"></i>
                    <h4>Order En Route</h4>
                </li>
                <li class="step0">
                    <i class="fas fa-store fa-3x mt-3"></i>
                    <h4>Order Arrived</h4>
                </li>
                @endif
                @if($purchase->status->pstate == 'Sent')
                <li class="active step0">
                    <i class="fas fa-box-open fa-3x mt-3"></i>
                    <h4>Order Shipped</h4>
                </li>
                <li class="active step0">
                    <i class="fas fa-shipping-fast fa-3x mt-3"></i>
                    <h4>Order En Route</h4>
                </li>
                <li class="step0">
                    <i class="fas fa-store fa-3x mt-3"></i>
                    <h4>Order Arrived</h4>
                </li>
                @endif
                @if($purchase->status->pstate == 'Delivered')
                <li class="active step0">
                    <i class="fas fa-box-open fa-3x mt-3"></i>
                    <h4>Order Shipped</h4>
                </li>
                <li class="active step0">
                    <i class="fas fa-shipping-fast fa-3x mt-3"></i>
                    <h4>Order En Route</h4>
                </li>
                <li class="active step0">
                    <i class="fas fa-store fa-3x mt-3"></i>
                    <h4>Order Arrived</h4>
                </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="container mt-1">
        <div class="row justify-content-around">
            @foreach($purchase->products as $product)
            <div class="card by-0 my-3" style="width: 18rem;">
                <div class="card-title text-center">
                    <h4>{{$product->brand->name." ".$product->model}}</h4>
                </div>
                <img src="{{asset('images/'.$product->images->first()->path)}}" class="card-img-top"
                    alt="Product image">
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection