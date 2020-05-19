<link href="{{ asset('css/brands.css') }}" rel="stylesheet">
@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Brands'])

<div class="container">
    <form action="{{url('search/filter')}}" method="GET" enctype="multipart/form-data">
        <div class="row">
            @foreach($brands as $brand)
            <div class="col-6">
                <div class="card w-100">
                    <div class="imgBx" data-text="Design">
                        <img src="{{'images/'.$brand->image->path}}" alt="">
                    </div>
                    <div class="content container d-flex justify-content-end ">
                        <div class="row w-75">
                            @foreach($brand->products->take(5) as $product)
                            <div class="col-4 p-1">
                                <img class="img-fluid" src="{{asset('images/'.$product->images->first()->path)}}">
                            </div>
                            @endforeach
                            <div class="col-1">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <button type="submit" class="btn btn-primary mt-4 mr-4" value="{{$brand->id}}"
                                            name="brand[]">See all
                                            products</button>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </form>
</div>

@endsection