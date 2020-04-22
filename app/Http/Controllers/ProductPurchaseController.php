<?php

namespace App\Http\Controllers;

use App\ProductPurchase;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductPurchaseController extends Controller {

    public function create($productID, $purchaseID, $quantity)
  {
    $pp = new ProductPurchase();
    $pp->product_id= $productID;
    $pp->purchase_id = $purchaseID;
    $pp->quantity= $quantity;
    
    $pp->save();

    return $pp;
  }

}