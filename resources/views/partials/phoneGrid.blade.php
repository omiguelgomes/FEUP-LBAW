<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="new" role="tabpanel" aria-labelledby="new-tab">
        <div class="row no-gutters">

            @foreach($products as $product)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 ">
                    <div class="card mx-1 my-1">
                        <a href="{{ url('product/'.$product->id) }}" >
                        <img class="card-img-top" src="{{ asset('images/'.$product->image()[0]) }}" alt="Card image cap">
                        </a>
                        <div class="card-body justify-content-center">
                            <h5 class="card-title">{{$product->model}}</h5>
                            <a href="{{ url('product/'.$product->id) }}" class="btn btn-secondary w-75">See</a>
                        </div>
                    </div>
                </div>
            @endforeach
        
        </div>
    </div>
</div>