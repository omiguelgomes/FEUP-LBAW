<div class="row w-100 mx-auto" id="phone-grid">
    @foreach($products as $product)
    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 my-2">
        <div class="card h-100">
            <h3 class="card-header">{{$product->brand->name." ".$product->model}}</h3>
            <div class="card-body">
                <h5 class="card-title">{{$product->brand->name}}</h5>
                <h6 class="card-subtitle text-muted">Support card subtitle</h6>
            </div>
            <a href="{{url('product/'.$product->id)}}">
                <img style="height: 200px; width: 100%; display: block;"
                    src="{{ asset('images/'.$product->images->first()->path) }}" alt="Phone image">
            </a>
            <div class="card-body text-center">
                <p class="card-text">Put some info about the phone in here, maybe price idk</p>
                <a type="button" class="btn btn-primary px-sm-5 px-2" href="{{url('product/'.$product->id)}}">See</a>
            </div>
        </div>
    </div>
    @endforeach
</div>