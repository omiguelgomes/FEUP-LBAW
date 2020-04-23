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
      $hotProducts = $this->hotProducts(10);
      $discountProducts = $this->discountProducts(10);
      return view('pages.homePage')->with(['hotProducts' => $hotProducts, 'discountProducts' => $discountProducts]);
    }

    function hotProducts($max)
    {
      $products = Product::all()->sortBy(
        function($product)
        {
          return count($product->purchases);
        }
      )->reverse()->take($max);
      return $products;
    }

    function discountProducts($max)
    {
      return Product::all()->filter(
        function($product)
        {
          if($product->discounts->count() > 0)
          {
            return true;
          }
        }
      )->take($max);
    }
      
}
