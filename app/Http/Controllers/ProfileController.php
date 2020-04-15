<?php

namespace App\Http\Controllers;

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
      return view('pages.profile');

    }

    
}
