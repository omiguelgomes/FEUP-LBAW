<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function show()
  {
    $productNr = 12;
    return view('pages.homePage')->with([
      'hotProducts' => $this->hotProducts($productNr), 'discountProducts' => $this->discountProducts($productNr),
      'newProducts' => $this->newProducts($productNr)
    ]);
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

  public function newProducts($max)
  {
    return Product::all()->sortByDesc('id')->take($max);
  }
}
