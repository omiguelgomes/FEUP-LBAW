<link href="{{ asset('css/purchase_history.css') }}" rel="stylesheet">
@extends('layouts.pageWrapper')
@section('content')  

@include('partials.jumboTitle',['title' => 'Purchase History'])
@foreach($purchases as $purchase)
<div class="container px-1 px-md-4 mx-auto">
    <div class="card px-5">
        <div class="row d-flex justify-content-around px-3 top">
            <div class="d-flex">
            <a href="{{url('purchase/'.$purchase->id)}}"><h5>ORDER <span class="text-primary font-weight-bold">#{{$purchase->id}}</span></h5></a>
            </div>
        </div> <!-- Add class 'active' to progress -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <ul id="progressbar" class="text-center">
                    @if($purchase->status->pstate == 'Awaiting Payment')
                    <li class="step0"></li>
                    <li class="step0"></li>
                    <li class="step0"></li>
                    <li class="step0"></li>
                    @endif
                    @if($purchase->status->pstate == 'Processing')
                    <li class="active step0"></li>
                    <li class="step0"></li>
                    <li class="step0"></li>
                    <li class="step0"></li>
                    @endif
                    @if($purchase->status->pstate == 'Sent')
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="step0"></li>
                    @endif
                    @if($purchase->status->pstate == 'Delivered')
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="row justify-content-between top">
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Payed</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Shipped</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>En Route</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Arrived</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-around">
            @foreach($purchase->products as $product)
                <div class="col-4 col-sm-4 col-md-4 col-lg-2 mx-2">
                    <div class="text-center my-2">
                        <a href="{{ url('product/'.$product->id) }}" >
                            <img class="card-img-top" src="{{ asset('images/'.$product->images->first()->path) }}" alt="Card image cap">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endforeach
@endsection