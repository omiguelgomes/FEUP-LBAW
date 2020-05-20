<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
  public function show()
  {
    if (!Auth::check())
      return redirect('/register');
    else
      $user = Auth::user();
    $wishlist = $user->wishlist()->paginate(8);
    return view('pages.wishlist')->with('wishlist', $wishlist);
  }

  public function delete($id)
  {
    if (!Auth::check())
      return redirect('/register');
    else
      $user = Auth::user();

    $user->wishlist()->detach($id);

    return $id;
  }

  public function add($id)
  {
    //should probably make some verification to this id beforehand
    if (!Auth::check())
      return redirect('/register');
    else
      $user = Auth::user();

    $user->wishlist()->attach($id);

    return redirect('wishlist');
  }
  public function filter(Request $request)
  {
    //get all specs to show filters for
    $products = Auth::user()->wishlist();

    // //text Search
    if ($request['textSearch'] != null) {
      //prepare text for tsquery
      $text = explode(" ", $request['textSearch']);
      $text = implode(" & ", $text);

      $products = $products->join('brand', 'brand.id', '=', 'product.brand_id')
        ->join('description', 'description.id', '=', 'product.description_id')
        ->whereRaw("to_tsvector(product.model || ' ' || brand.name || ' ' || description.content) @@ to_tsquery('$text:*')");
    }

    //enable pagination, keep filters for next pages
    $products  = $products->paginate(16)->appends([
      'textSearch' => $request['textSearch']
    ]);

    return view('pages.wishlist')->with('wishlist', $products);
  }
}
