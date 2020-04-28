<?php

namespace App\Http\Controllers;
use App\Product;
class SearchController extends Controller
{
    public function show()
    {
      return view('pages.search')->with('products', Product::all());
    }
}