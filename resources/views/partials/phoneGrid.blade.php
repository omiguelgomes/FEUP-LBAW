<div class="row mx-auto" id="phone-grid">
    @foreach($products as $product)
    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 my-2">
        <div class="card h-100 text-center">
            <h4 class="card-header d-flex align-items-center justify-content-around" style="height:80px;">
                {{$product->brand->name." ".$product->model}}</h4>
            <div class="card-body p-0">
                <a href=" {{url('product/'.$product->id)}}">
                    <img style="height: auto; width: 100%; display: block;"
                        src="{{ asset('images/'.$product->images->first()->path) }}" alt="Phone image">
                </a>
                <div class="card-bottom px-0 pt-4">
                    <b>
                        <h5>{{$product->price}}€
                            @if(count($product->discounts) > 0)
                            <sup style="text-decoration: line-through;">{{$product->originalPrice()}}€</sup>
                            @endif
                        </h5>
                    </b>
                    <a type="button" class="btn btn-primary w-100" href="{{url('product/'.$product->id)}}">See</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>