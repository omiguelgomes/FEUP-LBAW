<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="new" role="tabpanel" aria-labelledby="new-tab">
        <div class="row no-gutters justify-content-center">

            @foreach($products as $product)
                <div class="col-5 col-sm-4 col-md-3 col-lg-2 mx-2 my-2 d-flex align-content-stretch">
                    <div class="card text-center  vertical-align" >
                        <a href="{{ url('product/'.$product->id) }}" >
                        <img class="card-img-top" src="{{ asset('images/'.$product->image()[0]) }}" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{$product->model}}</h5>
                            <a href="{{ url('product/'.$product->id) }}" class="btn btn-secondary w-75">See</a>
                        </div>
                    </div>
                </div>
            @endforeach
        
        </div>
    </div>
</div>