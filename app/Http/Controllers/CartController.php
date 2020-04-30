<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


use App\User;
use App\ProductPurchase;
use App\Purchase;
use App\PurchaseState;

class CartController extends Controller
{
  public function show()
  {
    if (!Auth::check())
      return redirect('/register');
    else
      $user = Auth::user();

    return view('pages.cart')->with('cart', $user->cart);
  }

  public function add($id)
  {
    if (!Auth::check())
      return redirect('/register');
    else
      $user = Auth::user();

    $cart = $user->cart()->find($id);

    if ($cart == null) {
      $user->cart()->attach($id);
    } else {
      $cart->pivot->quant += 1;
      $cart->pivot->save();
    }
    return redirect('cart');
  }

  // REFRACTOR THIS, USE FUNCTION IN PRODUCT CONTROLLER
  public function buy()
  {
    if (!Auth::check())
      return redirect('/register');
    else
      $user = Auth::user();

    $cart = $user->cart;

    $newPs = PurchaseState::create([
      'statechangedate' => date("Y-m-d"),
      'comment' => "Please Pay!",
      'pstate' => "Processing",
    ]);

    $newPurchase = Purchase::create([
      'val' => $cart->sum(function ($product) {
        return $product->price * $product->pivot->quant;
      }),
      'status_id' => $newPs->id,
      'paid' => 1,
      'user_id' => $user->id,
      'purchasedate' => date("Y-m-d")
    ]);

    foreach ($cart as $product) {
      $newPurchase->products()->attach(
        $product->id,
        ['quantity' => $product->pivot->quant]
      );
    }

    return redirect('purchase_history');
  }

  public function remove(Request $request)
  {
    if (!Auth::check())
      return redirect('/register');
    else
      $user = Auth::user();
    $user->cart()->detach($request->id);
  }
}
