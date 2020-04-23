<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function show()
    {
      //get 10 first products from db. should be replaced with query for the hottest products
      $hotProducts = $this->hotProducts();
      $discountProducts = $this->discountProducts();
      return view('pages.homePage')->with(['hotProducts' => $hotProducts, 'discountProducts' => $discountProducts]);
    }

    function hotProducts()
    {
      return Product::get()->take(10);
    }

    function discountProducts()
    {
      $discountProducts = [];
      foreach(Product::all() as $product)
      {
        if(count($product->discounts) > 0)
        {
          array_push($discountProducts, $product);
        }
      }
      return $discountProducts;
    }
}
