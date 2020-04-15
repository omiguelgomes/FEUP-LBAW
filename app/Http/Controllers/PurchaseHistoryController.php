<?php

namespace App\Http\Controllers;


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

      return view('pages.purchase_history');
    }
}
