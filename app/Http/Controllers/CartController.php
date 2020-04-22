<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Use App\User;
Use App\Cart;
use App\ProductPurchase;
use App\Purchase;
use App\PurchaseState;
use App\Product;

class CartController extends Controller
{
    public function show()
    {
      if (!Auth::check()) return redirect('/register');

      $user = Auth::user();
      return view('pages.cart')->with('cart', $user->cart());
    }

    public function add($id)
    {
      //should probably make some verification to this id beforehand
      if (!Auth::check()) 
        return redirect('/register');
      else
          $user = Auth::user();

      
      $cart = DB::select('select * from cart where user_id = :id and product_id = :pid', ['id' => $user->id, 'pid' => $id]);

      if(count($cart) > 0)
      {
        DB::update('update cart set quant = :quant where user_id = :uid and product_id = :pid',
         ['quant' => $cart[0]->quant + 1, 'uid' => $user->id, 'pid' => $id]);
      }
      else
      {
        DB::insert('insert into cart (product_id, user_id, quant) values (:pid, :uid, 1)',
      ['pid' => $id, 'uid' => $user->id]);
      }
      
      return redirect('cart');
    } 

    public function buy()
    {
      //temporary so it doesn't break while auth is incomplete
      if (!Auth::check()) 
          $user = User::find(1);
      else
          $user = Auth::user();

      $cart = $user->cart();

      $newPs = new PurchaseState();
      $newPs->statechangedate = date("Y-m-d");
      $newPs->comment = "Please Pay!";
      $newPs->pstate = "Awaiting Payment";
      $newPs->save();

      $newPurchase = new Purchase();
      $newPurchase->val = $cart['total'];
      $newPurchase->status_id = $newPs->id;
      //hard-coded payed by card
      $newPurchase->paid = 1;
      $newPurchase->user_id = $user->id;
      $newPurchase->purchasedate = date("Y-m-d");
      $newPurchase->save();

      foreach($cart['products'] as $product)
      {
        DB::insert('insert into product_purchase (product_id, purchase_id, quantity) values (:pid, :puid, :quant)',
      ['pid' => $product->id, 'puid' => $newPurchase->id, 'quant' => $product->quantity]);
      }

      return redirect('purchase_history');
    }

    public function remove($id)
    {
      //temporary so it doesn't break while auth is incomplete
      if (!Auth::check()) 
          $user = User::find(1);
      else
          $user = Auth::user();

      DB::delete('delete from cart where product_id = :pid and user_id = :uid', ['pid' => $id, 'uid' => $user->id]);

      return redirect('cart');
    }
  
}
