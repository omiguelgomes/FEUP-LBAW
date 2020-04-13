@extends('layouts.pageWrapper')
@section('content')  

@include('partials.jumboTitle',['title' => 'Cart'])
 

<div class="container">
        <table class="table">
            
                @include('partials.phoneList',['phoneNr' => 6, 'xButton' => 'true'])
                <tr>
                    <th scope="row" colspan="5" class="text-right">Shipping Costs: 0.00 €</th>
                </tr>
                <tr>
                    <th scope="row" colspan="5" class="text-right">TOTAL PURCHASE: 1499.97 €</th>
                </tr>
            </tbody>
        </table>

        <div class="d-flex">
            <div class="p-2 bd-highlight">
                <button type="button" class="btn btn-primary bg-white text-primary">Continue shopping</button>
            </div>
            <div class="ml-auto p-2 bd-highlight">
                <button type="button" class="btn btn-primary">Proceed with purchase</button>
            </div>
        </div>

</div>
@endsection