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
    $pp->productID= $productID;
    $pp->purchaseID= $purchaseID;
    $pp->quantity= $quantity;
    
    $pp->save();

    return $pp;
  }

}