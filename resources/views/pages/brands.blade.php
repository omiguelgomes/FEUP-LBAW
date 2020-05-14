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
                    <div class="content container">
                        <div class="row" style="height: 100%;">
                            @foreach($brand->products->take(5) as $product)
                            <div class="col-4 p-1 show-image text-right">
                                <img src="{{asset('images/'.$product->images->first()->path)}}" style="width: 60%;">
                            </div>
                            @endforeach
                            <div class="col">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <button type="submit" class="btn btn-primary mt-4 ml-4" value="{{$brand->id}}"
                                            name="brand[]">See all products</button>
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