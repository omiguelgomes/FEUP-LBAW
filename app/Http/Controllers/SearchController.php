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

    if ($request['Phones'] != null xor $request['Tablets'] != null) {
      $deviceType = $request['Phones'] != null ? $request['Phones'] : $request['Tablets'];
      $products = $products->where('category', '=', $deviceType);
    }

    // //remove products that dont match the filters
    if ($request['brand'] != null) {
      $products = $products->whereIn('brand_id', $request['brand']);
    }

    if ($request['fingerprint'] != null) {
      $products = $products->whereIn('fingerprinttype_id', $request['fingerprint']);
    }

    if ($request['waterRes'] != null) {
      $products = $products->whereIn('waterproofing_id', $request['waterRes']);
    }

    if ($request['minRam'] != null) {
      $rams = App\Specs\RAM::where('value', '>=', pow(2, $request['minRam']))->pluck('id');
      $products = $products->whereIn('ram_id', $rams);
    }

    if ($request['minStorage'] != null) {
      $storages = App\Specs\Storage::where('value', '>=', pow(2, $request['minStorage']))->pluck('id');
      $products = $products->whereIn('storage_id', $storages);
    }

    // //Price filter
    if ($request['minPrice'] < $request['maxPrice']) {
      $products = $products->where('price', '>=', $request['minPrice'])->where('price', '<=', $request['maxPrice']);
    }

    // //text Search
    if ($request['textSearch'] != null) {
      //prepare text for tsquery
      $text = explode(" ", $request['textSearch']);
      $text = implode(" & ", $text);

      $products = $products->join('brand', 'brand.id', '=', 'product.brand_id')
        ->join('description', 'description.id', '=', 'product.description_id')
        ->whereRaw("to_tsvector(product.model || ' ' || brand.name || ' ' || description.content) @@ to_tsquery('$text')");
    }

    //enable pagination, keep filters for next pages
    $products  = $products->paginate(16)->appends([
      'brand' => $request['brand'], 'fingerprint' => $request['fingerprint'],
      'waterRes' => $request['waterRes'], 'minRam' => $request['minRam'],
      'minStorage' => $request['minStorage'], 'textSearch' => $request['textSearch']
    ]);

    return view(
      'pages.search',
      compact('ram', 'water', 'screen', 'storage', 'battery', 'brands', 'fingers', 'products')
    );
  }
}
