<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class SearchController extends Controller
{
  public function show()
  {
    $brands = App\Brand::all()->sortBy('name');
    $storage = App\Specs\Storage::all()->sortByDesc('value');
    $ram = App\Specs\RAM::all()->sortByDesc('value');
    //fingers checkbox deletes results with fingerprinttype none
    $fingers = App\Specs\FingerPrintType::all()->sortByDesc('value')->where('value', '!=', 'none');
    $water = App\Specs\WaterRes::all()->sortByDesc('value')->where('value', '!=', 'None');

    $screen = App\Specs\ScreenSize::all();
    $battery = App\Specs\Battery::all();
    $products = App\Product::paginate(20);
    return view(
      'pages.search',
      compact('ram', 'water', 'screen', 'storage', 'battery', 'brands', 'fingers', 'products')
    );
  }

  public function filterResults(Request $request)
  {
    return $request;
  }
}
