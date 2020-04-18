<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
Use App\User;
Use App\Cart;

class CartController extends Controller
{
    public function show()
    {
      //will be retrieved from the session in the future
      if (!Auth::check()) return redirect('/register');

      $user = Auth::user();
      return view('pages.cart')->with('cart', $user->cart());
    }

    public function add($id)
    {
      //temporary so it doesn't break while auth is incomplete
      if (!Auth::check()) 
          $user = User::find(1);
      else
          $user = Auth::user();

      //in the future should check if product is already in user's cart and simply increment the quant
      return Cart::create([
        'productID' => $id,
        'userID' => $user->id,
        'quant' => 1,
    ]);
        
    }
}
