<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
      if (!Auth::check()) 
        return redirect('/register');
      else
          $user = Auth::user();

      return view('pages.profile')->with('user', $user);
    }
}
