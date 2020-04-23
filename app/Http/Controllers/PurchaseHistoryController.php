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
      
      //all purchases for the given user
      return ($user->purchases);
      //all proucts for a given purchase
      return ($user->purchases->first()->products);
      //status of a certain purchase
      return $user->purchases->first()->status;
      //total value of a certain purchase
      return ($user->purchases->first()->val);
      return view('pages.purchase_history')->with('purchases', $user->purchases);
    }
}
