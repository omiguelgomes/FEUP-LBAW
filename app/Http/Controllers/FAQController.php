<?php

namespace App\Http\Controllers;

use App\FAQ;

class FAQController extends Controller
{
    /**
     * Shows the card for a given id.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
      $faqs = FAQ::all();
      return view('pages.FAQ')->with('faqs', $faqs);
    }
}
