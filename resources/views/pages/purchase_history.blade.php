@extends('layouts.pageWrapper')
@section('content')  

@include('partials.jumboTitle',['title' => 'Purchase History'])

<div class="container">
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Orders Awaiting Payment</h4>
        </div>      
    </div>
    <br>

    <div class="table-responsive">
        <table class="table">
                @include('partials.phoneList',['products' => $products['Awaiting Payment'][0], 'xButton' => 'false'])
            </tbody>
        </table>
    </div>

    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Orders Processing</h4>
        </div>      
    </div>
    <br>

    <div class="table-responsive">
        <table class="table">
                @include('partials.phoneList',['products' => $products['Processing'][0], 'xButton' => 'false'])
            </tbody>
        </table>
    </div>

    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Orders Sent</h4>
        </div>      
    </div>
    <br>
    <div class="table-responsive">
        <table class="table">
                @include('partials.phoneList',['products' => $products['Sent'][0], 'xButton' => 'false'])
            </tbody>
        </table>
    </div>

    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Orders Delivered</h4>
        </div>      
    </div>
    <br>
    <div class="table-responsive">
        <table class="table">
                @include('partials.phoneList',['products' => $products['Delivered'][0], 'xButton' => 'false'])
            </tbody>
        </table>
    </div>
</div>
@endsection