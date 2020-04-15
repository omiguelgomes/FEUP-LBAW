<?php

namespace App\Http\Controllers;

use App\User;

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
      //Hard coded, will come from session in the future
      $userId = 1;
      $user = User::find($userId);
      return view('pages.profile')->with('user', $user);

    }

    
}
