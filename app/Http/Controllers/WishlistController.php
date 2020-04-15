<?php

namespace App\Http\Controllers;

use App\User;
use App\Wishlist;

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
      $userid = 1;
      $user = User::find(1);
      $wishlist = $user->wishlist();
      return view('pages.wishlist')->with('wishlist', $wishlist);
    }
}
