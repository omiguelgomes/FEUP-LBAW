<thead>
    <tr>
        <th scope="col"></th>
        <th scope="col">Products</th>
        <th scope="col">Quantity</th>

        @if($xButton == 'cart')
        <th scope="col">Price</th>
        <th scope="col">Remove</th>
        @endif

    </tr>
</thead>
<tbody>
    @foreach($products as $product)
    <tr id="{{$product->id}}">
        <td>
            <a href="{{ url('product/'.$product->id) }}">
                <img src="{{ asset('images/'.$product->images->first()->path)}}" alt="..." style="height:20%;">
        </td>
        <td>
            <div class="card-body">
                <h5 class="card-title">{{$product->model}}</h5>
                <h6 class="card-text">{{$product->brand->name}}</h6>
            </div>
        </td>

        @if($xButton == 'cart')
        <td>
            {{-- classes must be exactly these --}}
            <a class="quantity">{{$product->pivot->quant}}</a>
            <a class="cartIncrementer" value="{{$product->id}}">
                <i class="fas fa-plus-circle"></i>
            </a>
            <a class="cartDecrementer" value="{{$product->id}}">
                <i class="fas fa-minus-circle"></i>
            </a>
        </td>

        <td>
            <a class="productTotal">{{$product->price*$product->pivot->quant}}</a>
            <a>€</a>
        </td>
        <td>
            {{-- class must be cartDeleter for it to work --}}
            <a class="cartDeleter" value="{{$product->id}}">
                <i class="far fa-times-circle fa-2x ml-4"></i>
            </a>
        </td>

        @else
        <td>{{$product->pivot->quantity}}</td>
        @endif
    </tr>
    @endforeach
</tbody>