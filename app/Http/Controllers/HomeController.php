<?php

namespace App\Http\Controllers;

use App\Product;

class HomeController extends Controller
{
    public function show()
    {
      //get 10 first products from db. should be replaced with query for the hottest products
      $hotProducts = Product::get()->take(10);
      return view('pages.homePage')->with('hotProducts', $hotProducts);
    }
}
