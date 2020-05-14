<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


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
    $products = App\Product::paginate(16);
    return view(
      'pages.search',
      compact('ram', 'water', 'screen', 'storage', 'battery', 'brands', 'fingers', 'products')
    );
  }

  public function filterResults(Request $request)
  {
    //get all specs to show filters for
    $brands = App\Brand::all()->sortBy('name');
    $storage = App\Specs\Storage::all()->sortByDesc('value');
    $ram = App\Specs\RAM::all()->sortByDesc('value');
    //fingers checkbox deletes results with fingerprinttype none
    $fingers = App\Specs\FingerPrintType::all()->sortByDesc('value')->where('value', '!=', 'none');
    $water = App\Specs\WaterRes::all()->sortByDesc('value')->where('value', '!=', 'None');

    $screen = App\Specs\ScreenSize::all();
    $battery = App\Specs\Battery::all();
    $products = App\Product::query();

    //remove products that dont match the filters
    if ($request['brand'] != null) {
      $products = $products->whereIn('brand_id', $request['brand']);
    }

    if ($request['fingerprint'] != null) {
      $products = $products->whereIn('fingerprinttype_id', $request['fingerprint']);
    }

    if ($request['waterRes'] != null) {
      $products = $products->whereIn('waterproofing_id', $request['waterRes']);
    }

    //Price filter
    if (($request['minPrice'] < $request['maxPrice'])) {
      $products = $products->where('price', '>=', $request['minPrice'])->where('price', '<=', $request['maxPrice']);
    }

    //enable pagination, keep filters for next pages
    $products  = $products->paginate(16)->appends([
      'brand' => $request['brand'], 'fingerprint' => $request['fingerprint'],
      'waterRes' => $request['waterRes']
    ]);
    return view(
      'pages.search',
      compact('ram', 'water', 'screen', 'storage', 'battery', 'brands', 'fingers', 'products')
    );
  }
}
