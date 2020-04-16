<?php

namespace App\Http\Controllers;

use App\User;

class PurchaseHistoryController extends Controller
{
    /**
     * Shows the card for a given id.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
      //All this is a placeholder, theses products given to the view aren't the ones in the purchase history
      //will be retrieved from the session in the future
      $userid = 1;
      $user = User::findOrFail(1);
      return view('pages.purchase_history')->with('products', $user->cart());
    }
}
