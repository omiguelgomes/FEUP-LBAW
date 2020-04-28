<link href="{{ asset('css/purchase.css') }}" rel="stylesheet">
@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Purchase details'])

<div class="container">
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
    <!-- Add class 'active' to progress -->
    <div class="row d-flex">
        <div class="col-12">
            <ul id="progressbar" class="text-center" style="display: flex; justify-content: center;">
                @if($purchase->status->pstate == 'Processing')
                <li class="active step0"></li>
                <li class="step0"></li>
                <li class="step0"></li>
                @endif
                @if($purchase->status->pstate == 'Sent')
                <li class="active step0"></li>
                <li class="active step0"></li>
                <li class="step0"></li>
                @endif
                @if($purchase->status->pstate == 'Delivered')
                <li class="active step0"></li>
                <li class="active step0"></li>
                <li class="active step0"></li>
                @endif
            </ul>
        </div>
    </div>
    <div class="row justify-content-around top">
        <div class="row d-flex icon-content"> <img class="icon" src="{{asset('images/order_shipped.png')}}">
            <div class="d-flex flex-column">
                <p class="font-weight-bold">Order<br>Shipped</p>
            </div>
        </div>
        <div class="row d-flex icon-content"> <img class="icon" src="{{asset('images/order_coming.png')}}">
            <div class="d-flex flex-column">
                <p class="font-weight-bold">Order<br>En Route</p>
            </div>
        </div>
        <div class="row d-flex icon-content"> <img class="icon" src="{{asset('images/order_arrived.png')}}">
            <div class="d-flex flex-column">
                <p class="font-weight-bold">Order<br>Arrived</p>
            </div>
        </div>
    </div>
    <table class="table">
        @include('partials.phoneList',['products' => $purchase->products, 'xButton' => 'purchase'])
        <tr>
            <th scope="row" colspan="5" class="text-right">Shipping Costs: 0.00 €</th>
        </tr>
        <tr>
            <th scope="row" colspan="5" class="text-right">TOTAL PURCHASE: {{$purchase->val}} €</th>
        </tr>
        </tbody>
    </table>
</div>

@endsection