<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PurchaseHistoryController extends Controller
{
  public function show()
  {
    if (!Auth::check())
      return redirect('/register');
    else
      $user = Auth::user();

    return view('pages.purchase_history')->with('purchases', $user->purchases()->get()->sortByDesc('id'));
  }
}
