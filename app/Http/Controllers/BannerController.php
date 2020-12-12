<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Banner;
use App\Image;

class BannerController extends Controller
{
  public function update($id, Request $request)
  {
    print_r($_FILES);
    $banner = Banner::find($id);
    $banner->update((array('imgurl' => $request->imgurl)));

    if ($request->hasFile('inputFile')) {
      $this->validate($request, array(
        'inputFile' => 'image|mimes:jpeg,png,jpg,JPG|max:2048',
      ));
      $image = $request->file('inputFile');
      $filename = time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $filename);

      $img = new Image();
      $img->description = "banner image";
      $img->path = $filename;
      $img->save();
      $banner->image_id = $img->id;
    };

    $banner->save();

    return redirect()->to('admin');
  }
}
