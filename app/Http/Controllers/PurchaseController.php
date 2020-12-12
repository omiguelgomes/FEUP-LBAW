<?php

namespace App\Http\Controllers;

use App\Purchase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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

  public function update($id, Request $request)
  {
    $purchase = Purchase::find($id);
    $purchase->status()->update((array('pstate' => $request->state)));

    return $purchase;
  }
}
