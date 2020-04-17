<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
Use App\User;

class CartController extends Controller
{
    public function show()
    {
      //will be retrieved from the session in the future
      if (!Auth::check()) return redirect('/register');

      $user = Auth::user();
      return view('pages.cart')->with('cart', $user->cart());
    }
}
