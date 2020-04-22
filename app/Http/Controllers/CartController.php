<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

Use App\User;
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

      if($cart == null)
      {
        $user->cart()->attach($id);
      }
      else
      {
        $cart->pivot->quant += 1;
        $cart->pivot->save();
      }
      return redirect('cart');
    } 

    public function buy()
    {
      if (!Auth::check()) 
        return redirect('/register');
      else
          $user = Auth::user();

      $cart = $user->cart;

      // adicionar atributos por array em vez de ser um por linha
      $newPs = new PurchaseState();
      $newPs->statechangedate = date("Y-m-d");
      $newPs->comment = "Please Pay!";
      $newPs->pstate = "Awaiting Payment";
      $newPs->save();

      $newPurchase = new Purchase();
      $newPurchase->val = $cart->sum(function ($product) {
        return $product->price * $product->pivot->quant;
      });

      $newPurchase->status_id = $newPs->id;
      //hard-coded payed by card
      $newPurchase->paid = 1;
      $newPurchase->user_id = $user->id;
      $newPurchase->purchasedate = date("Y-m-d");
      $newPurchase->save();

      foreach($cart as $product)
      {
        $newProductPurchase = new ProductPurchase();
        $newProductPurchase->product_id = $product->id;
        $newProductPurchase->purchase_id = $newPurchase->id;
        $newProductPurchase->quantity = $product->pivot->quant;
        $newProductPurchase->save();
      }

      return redirect('purchase_history');
    }

    public function remove($id)
    {
      if (!Auth::check()) 
        return redirect('/register');
      else
          $user = Auth::user();

      $user->cart()->detach($id);

      return redirect('cart');
    }
  
}
