<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Product;

class ProductController extends Controller
{

    public function show($id)
    {
      $product = Product::find($id);
      return view('pages.phone')->with('product', $product);
    }
}
