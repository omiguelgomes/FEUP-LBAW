<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Product;

class ProductController extends Controller
{

    public function show()
    {
      $id = 1;
      $product = Product::find($id);
      $productInfo = DB::select('
        SELECT product.model, product.price, brand.name as brandName, i.path
        FROM product
        JOIN brand
        ON product.brandid = brand.id
        JOIN image_product ip ON ip.productid = product.id
        JOIN image i ON ip.imageid = i.id
        WHERE product.id = 5');
        //return $productInfo;
      return view('pages.phone')->with('productInfo', $productInfo[0]);
    }
}
