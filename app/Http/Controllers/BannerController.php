<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Banner;

class FAQController extends Controller
{
  public function update($id, Request $request)
  {
    $faq = FAQ::find($id);
    $faq->update((array('answer' => $request->answer)));

    return $faq;
  }
}