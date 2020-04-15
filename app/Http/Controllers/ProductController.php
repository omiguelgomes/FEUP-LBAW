<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function show($id)
    {
      $product = Product::find($id);
      return view('pages.product')->with('product', $product);
    }
}
