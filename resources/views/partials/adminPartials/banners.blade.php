<script type="text/javascript" src="{{ URL::asset('js/banner.js') }}" defer></script>
<div id="banners">
    <!-- BANNER -->
    <div class="collapse" id="other">
        <div class="d-flex p-3 mb-2 bg-light text-dark">
            <div class="p-2">
                <h4>Banner</h4>
            </div>

        </div>
        <div class="row-12 py-3">
            <div class="row align-items-center justify-content-md-center">
                @foreach($banners as $banner)
                <form class="form-inline" method="POST" action="{{url('/admin/banner/update/'.$banner->id)}}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-7 p-2 m-2">
                        <img id="img-{{$banner->id}}" class="d-block w-100"
                            src="{{ asset('/images/'.$banner->image->path) }}" alt="banner image">
                        <input type="text" class="form-control w-75 mx-auto m-2" value="{{$banner->imgurl}}"
                            placeholder="Image endpoint" id="imgurl" name="imgurl" maxlength=150>
                        <input type='file' id="{{$banner->id}}" onchange="readURL(this, this.id);"
                            class="custom-file-input-2 m-2" name="inputFile" />
                        <button type="submit" class="btn btn-primary">Submit image</button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>