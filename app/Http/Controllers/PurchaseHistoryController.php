<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\User;

class PurchaseHistoryController extends Controller
{
    public function show()
    {
      if (!Auth::check()) return redirect('/register');
      $user = Auth::user();
      return view('pages.purchase_history')->with('products', $user->purchases());
    }
}
