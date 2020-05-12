<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\FAQ;

class FAQController extends Controller
{
    public function show()
    {
      $faqs = FAQ::all();
      return view('pages.FAQ')->with('faqs', $faqs);
    }

    public function create(Request $request) {
      $faq = new FAQ();
      $faq->question = $request->question;
      $faq->answer = $request->answer;
      $faq->save();

      return redirect()->to('admin');
    }
}
