<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\PurchaseState;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller {

    public function show($id)
    {
      if (!Auth::check()) 
        return redirect('/register');
      else
          $user = Auth::user();

       $purchase = Purchase::findOrFail($id);
      return view('pages.purchase')->with('purchase', $purchase);
    }

}