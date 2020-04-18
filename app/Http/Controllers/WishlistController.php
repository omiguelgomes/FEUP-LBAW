<?php

namespace App\Http\Controllers;

use App\User;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function show()
    {
      if (!Auth::check()) return redirect('/register');

      $user = Auth::user();
      $wishlist = $user->wishlist();
      return view('pages.wishlist')->with('wishlist', $wishlist);
    }
}
