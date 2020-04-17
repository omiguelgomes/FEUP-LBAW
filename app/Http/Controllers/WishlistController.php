<?php

namespace App\Http\Controllers;

use App\User;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Shows the card for a given id.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
      //will be obtained through session in the future
      if (!Auth::check()) return redirect('/register');

      $user = Auth::user();

      $wishlist = $user->wishlist();
      return view('pages.wishlist')->with('wishlist', $wishlist);
    }
}
