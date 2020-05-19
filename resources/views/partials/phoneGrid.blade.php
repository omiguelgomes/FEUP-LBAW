<div class="row" id="phone-grid">
    @foreach($products as $product)
    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 my-2 hvr-underline-reveal">
        <div class="text-center my-auto">
            <a href="{{ url('product/'.$product->id) }}">
            </a>
            <img class="card-img-top" src="{{ asset('images/'.$product->images->first()->path) }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$product->brand->name}}</h5>
                <h5 class="card-title">{{$product->model}}</h5>
                <a href="{{ url('product/'.$product->id) }}" class="home-product-btn w-75">See more</a>
            </div>
        </div>
    </div>
    @endforeach
</div>