@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Purchase details'])

<div class="container">

    <div class="d-flex bd-highlight mb-3">
        
       <div class="p-2 bd-highlight"><h3>Order status:      </h3></div>

        @if($purchase->status->pstate == 'Delivered')
        <div class="p-2 bd-highlight"><h3 class="text-success">{{$purchase->status->pstate}}</h3></div>
        <div class="ml-auto p-2 bd-highlight text-right"><h5>Delivery date: {{$purchase->status->statechangedate}}</h5>
            <div class="float-right"><h5>Comment: {{$purchase->status->comment}}</h5></div> 
        </div>  
        @elseif($purchase->status->pstate == 'Sent')
        <div class="p-2 bd-highlight"> <h3 class="text-warning">{{$purchase->status->pstate}}</h3></div>
        <div class="ml-auto p-2 bd-highlight text-right"><h5>Send date: {{$purchase->status->statechangedate}}</h5>
            <div class="float-right"><h5>Comment: {{$purchase->status->comment}}</h5></div> 
        </div> 
        @elseif($purchase->status->pstate == 'Processing')
        <div class="p-2 bd-highlight"> <h3 class="text-primary">{{$purchase->status->pstate}}</h3></div>
        <div class="ml-auto p-2 bd-highlight text-right"><h5>Processing date: {{$purchase->status->statechangedate}}</h5>
            <div class="float-right"><h5>Comment: {{$purchase->status->comment}}</h5></div> 
        </div> 
        @elseif($purchase->status->pstate == 'Awaiting Payment')
        <div class="p-2 bd-highlight"> <h3 class="text-danger">{{$purchase->status->pstate}}</h3></div>
        <div class="ml-auto p-2 bd-highlight text-right"><h5>Purchase date: {{$purchase->status->statechangedate}}</h5>
            <div class="float-right"><h5>Comment: {{$purchase->status->comment}}</h5></div> 
        </div> 
        &nbsp;   
        <button type="button" class="btn btn-primary">Pay now</button> &nbsp;
        <button type="button" class="btn btn-primary">Pay on delivery</button>
        @endif
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