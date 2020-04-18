@extends('layouts.pageWrapper')
@section('content')  

@include('partials.jumboTitle',['title' => 'Purchase History'])

<div class="container">
    @foreach($products as $status => $product)
        <div class="d-flex p-3 mb-2 bg-light text-dark">
            <div class="p-2">
                <h4>Orders {{$status}}</h4>
            </div>      
        </div>
        <br>

        <div class="table-responsive">
            <table class="table">
                @if(count($product) > 0)
                    @include('partials.phoneList',['products' => $product, 'xButton' => 'false'])
                @endif
            </tbody>
            </table>
        </div>
    @endforeach
</div>
@endsection