<link href="{{ asset('css/purchase_history.css') }}" rel="stylesheet">
@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Purchase History'])
<div class="container d-flex">
    <div class="row justify-content-center">
        @foreach($purchases as $purchase)
        <div class="card text-center m-3">
            <h5 class="card-title py-2"><b>ORDER #{{$purchase->id}}</b></h5>
            <div class="card-body">
                <div class="image-grid-container p-2">
                    @foreach($purchase->products as $product)
                    <img class="card-img-top" src="{{asset('images/'.$product->images->first()->path)}}"
                        alt="Card image cap">
                    @endforeach
                </div>
                <p class="card-text">
                    <h5>Order status: </h5>
                    @if($purchase->status->pstate == 'Delivered')
                    <h5 class="text-success">{{$purchase->status->pstate}}</h5>
                    @elseif($purchase->status->pstate == 'Sent')
                    <h5 class="text-warning">{{$purchase->status->pstate}}</h5>
                    @elseif($purchase->status->pstate == 'Processing')
                    <h5 class="text-primary">{{$purchase->status->pstate}}</h5>
                    @elseif($purchase->status->pstate == 'Awaiting Payment')
                    <h5 class="text-danger">{{$purchase->status->pstate}}</h5>
                    @endif
                    <h5>Purchase date: {{$purchase->purchasedate}}</h5>
                </p>
                <a href="{{url('purchase/'.$purchase->id)}}" class="btn btn-primary stretched-link">See details</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection