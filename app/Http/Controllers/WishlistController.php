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
}
