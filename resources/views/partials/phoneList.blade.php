<thead>
    <tr>
        <th scope="col"></th>
        <th scope="col">Products</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>

        @if($xButton == 'true')
            <th scope="col">Remove</th>
        @endif

    </tr>
</thead>
<tbody>

@foreach($products as $product)
    <tr>
        <td>
            <a href="{{ url('product/'.$product->id) }}">
            <img src="{{ asset('images/'.$product->image()[0]) }}" alt="..." style="width:80px;">
        </td>
        <td>
            <div class="card-body">
            <h5 class="card-title">{{$product->model}}</h5>
                <h6 class="card-text">{{$product->brand->name}}</h6>
            </div>
        </td>
        <td>{{$product['quantity']}}</td>
        <td>{{$product->price*$product['quantity']}}€</td>

        @if($xButton == 'true')
            <td>
                <a href="#" class="thumbnail">
                    <i class="far fa-times-circle fa-2x ml-4"></i>
                </a>
            </td>
        @endif
    </tr>
@endforeach