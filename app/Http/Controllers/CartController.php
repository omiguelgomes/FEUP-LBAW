<?php

namespace App\Http\Controllers;

Use App\User;

class CartController extends Controller
{
    /**
     * Shows the card for a given id.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
      //will be retrieved from the session in the future
      $userid = 1;
      $user = User::find(1);
      return view('pages.cart')->with('products', $user->cart());
    }
}
