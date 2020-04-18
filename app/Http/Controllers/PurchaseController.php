<?php

namespace App\Http\Controllers;

use App\Purchase;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller {

    public function create($val, $statusID, $paid, $userID)
  {
    $purchase = new Purchase();
    $purchase->val = $val;
    $purchase->statusID= $statusID;
    $purchase->paid= $paid;
    $purchase->userID= $userID;
    $purchase->purchaseDate = date('Y/m/d');
    
    $this->authorize('create');
    $purchase->save();

    return $purchase;
  }

}