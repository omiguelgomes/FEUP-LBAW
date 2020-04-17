<?php

namespace App\Http\Controllers;

use App\FAQ;

class FAQController extends Controller
{
    public function show()
    {
      $faqs = FAQ::all();
      return view('pages.FAQ')->with('faqs', $faqs);
    }
}
