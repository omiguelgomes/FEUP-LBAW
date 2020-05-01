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
    $hotProducts = $this->hotProducts(12);
    $discountProducts = $this->discountProducts(12);
    return view('pages.homePage')->with(['hotProducts' => $hotProducts, 'discountProducts' => $discountProducts]);
  }

  function hotProducts($max)
  {
    $products = Product::all()->sortByDesc(
      function ($product) {
        return count($product->purchases);
      }
    )->take($max);
    return $products;
  }

  function discountProducts($max)
  {
    return Product::all()->filter(
      function ($product) {
        if ($product->discounts->count() > 0) {
          return true;
        }
      }
    )->sortByDesc(
      function ($product) {
        return $product->discounts->first()->val;
      }
    )->take($max);
  }
}
