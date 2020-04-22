<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\User;

class PurchaseHistoryController extends Controller
{
    public function show()
    {
      if (!Auth::check()) 
        return redirect('/register');
      else
          $user = Auth::user();
      //this has all the info to show. purchase history needs to be changed as the prof asked
      return dd($user->purchases);
      return $user->purchases->first()->status;
      return view('pages.purchase_history')->with('products', $user->purchases);
    }
}
