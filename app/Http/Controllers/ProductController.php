<?php

namespace App\Http\Controllers;

use App\Product;

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

    public function buyProduct($productID, $statusID, $paid, $quantity)
    {
      $id = Auth()::id;
      $product = Product::findOrFail($productID);
      $val = $quantity * $product->price;

      DB::transaction(function()
      {
        $newPurchase = Purchase::create($val, $statusID, $paid, $id);
        $newPP = ProductPurchase::create($productID, $newPurchase->id, $quantity);
      });
    }
}
