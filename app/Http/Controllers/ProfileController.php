<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Shows the card for a given id.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
      if (!Auth::check()) return redirect('/register');
      $user = Auth::user();
      return view('pages.profile')->with('user', $user);
    }
}
