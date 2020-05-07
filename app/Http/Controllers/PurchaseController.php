<?php

namespace App\Http\Controllers;

use App\Purchase;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{

  // ADICIONAR POLICY, SO O OWNER DE UMA PURCHASE A PODE VER
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
