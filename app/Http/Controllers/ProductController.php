<?php

namespace App\Http\Controllers;

use App\Product;
use App\PurchaseState;
use App\Purchase;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show($id)
    {
      $product = Product::findOrFail($id);
      return view('pages.product')->with('product', $product);
    }

    public function buy($id)
    {
      //temporary so it doesn't break while auth is incomplete
      if (!Auth::check()) 
          $user = User::find(1);
      else
          $user = Auth::user();

      $product = Product::find($id);

      $newPs = new PurchaseState();
      $newPs->statechangedate = date("Y-m-d");
      $newPs->comment = "Please Pay!";
      $newPs->pstate = "Awaiting Payment";
      $newPs->save();

      $newPurchase = new Purchase();
      $newPurchase->val = $product->price;
      $newPurchase->statusid = $newPs->id;
      //hard-coded payed by card
      $newPurchase->paid = 1;
      $newPurchase->userid = $user->id;
      $newPurchase->purchasedate = date("Y-m-d");
      $newPurchase->save();

      DB::insert('insert into product_purchase (productid, purchaseid, quantity) values (:pid, :puid, 1)',
      ['pid' => $product->id, 'puid' => $newPurchase->id]);

      return redirect('purchase_history');
    }
}
