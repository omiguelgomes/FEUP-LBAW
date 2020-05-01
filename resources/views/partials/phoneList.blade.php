<thead>
    <tr>
        <th scope="col"></th>
        <th scope="col">Products</th>
        <th scope="col">Quantity</th>

        @if($xButton == 'true')
        <th scope="col">Price</th>
        <th scope="col">Remove</th>
        @endif

    </tr>
</thead>
<tbody>
    @foreach($products as $product)
    <tr>
        <td>
            <a href="{{ url('product/'.$product->id) }}">
                <img src="{{ asset('images/'.$product->images->first()->path)}}" alt="..." style="width:80px;">
        </td>
        <td>
            <div class="card-body">
                <h5 class="card-title">{{$product->model}}</h5>
                <h6 class="card-text">{{$product->brand->name}}</h6>
            </div>
        </td>

        @if($xButton == 'cart')
        <td>{{$product->pivot->quant}}
            <a class="increment_item" value="{{$product->id}}">
                <i class="fas fa-plus-circle"></i>
            </a>
            <a class="decrement_item" value="{{$product->id}}">
                <i class="fas fa-minus-circle"></i>
            </a>
        </td>

        @else
        <td>{{$product->pivot->quantity}}</td>
        @endif

        @if($xButton == 'cart')
        <td>{{$product->price*$product->pivot->quant}}€</td>
        <td>
            <a class="remove_item" value="{{$product->id}}">
                <i class="far fa-times-circle fa-2x ml-4"></i>
            </a>
        </td>
        @endif
    </tr>
    @endforeach
</tbody>