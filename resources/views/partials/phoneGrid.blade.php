<div class="row w-100 mx-auto" id="phone-grid">
    @foreach($products as $product)
    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 my-2">
        <div class="card h-100">
            <h3 class="card-header">{{$product->brand->name." ".$product->model}}</h3>
            <div class="card-body">
                <h5 class="card-title">{{$product->brand->name}}</h5>
                <h6 class="card-subtitle text-muted">Support card subtitle</h6>
            </div>
            <img style="height: 200px; width: 100%; display: block;"
                src="{{ asset('images/'.$product->images->first()->path) }}" alt="Phone image">
            <div class="card-body">
                <p class="card-text">Put some info about the phone in here, maybe price idk</p>
            </div>
        </div>
    </div>
    @endforeach
</div>