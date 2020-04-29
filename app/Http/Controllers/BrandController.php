<?php

namespace App\Http\Controllers;
use App;

class BrandController extends Controller
{
    public function show()
    {
      return view('pages.brands')->with(['brands' => App\Brand::all(), 'products' => App\Product::all()]);
    }
}