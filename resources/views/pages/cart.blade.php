@extends('layouts.pageWrapper')
@section('content')  

@include('partials.jumboTitle',['title' => 'Cart'])
 

<div class="container">
        <table class="table">
            
                @include('partials.phoneList',['products' => $cart['products'], 'xButton' => 'true'])
                <tr>
                    <th scope="row" colspan="5" class="text-right">Shipping Costs: 0.00 €</th>
                </tr>
                <tr>
                    <th scope="row" colspan="5" class="text-right">TOTAL PURCHASE: {{$cart['total']}} €</th>
                </tr>
            </tbody>
        </table>

        <div class="d-flex">
            <div class="p-2 bd-highlight">
                <button type="button" class="btn btn-primary">Continue shopping</button>
            </div>
            <div class="ml-auto p-2 bd-highlight">
                @if(count($cart['products']) > 0)
                    <a href="{{ url('/cart/buy') }}" class="button btn-primary rounded p-1 m-5">
                        Proceed with purchase
                    </a>
                @endif
            </div>
        </div>

</div>
@endsection