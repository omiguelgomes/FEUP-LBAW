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
    $wishlist = $user->wishlist;
    return view('pages.wishlist')->with('wishlist', $wishlist);
  }

  public function remove(Request $request)
  {
    if (!Auth::check())
      return redirect('/register');
    else
      $user = Auth::user();

    $user->wishlist()->detach($request->id);
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
}
