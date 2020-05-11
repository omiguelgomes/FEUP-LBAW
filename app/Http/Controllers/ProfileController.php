<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Address;
use Illuminate\Http\Request;

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

    public function profileUpdate(Request $request)
    {
   
      $data = $request->all();
  
      if($data['password'] != null)
        $data['password'] = bcrypt($data['password']);
      else
        unset($data['password']);       
     
      Auth::user()->address->city = $data['city'];
      Auth::user()->address->street = $data['street'];
      Auth::user()->address->postalCode = $data['postalcode'];
      Auth::user()->save();
     
      $update = auth()->user()->update($data);
      
      if($update)
        return redirect()
                        ->route('profile')
                        ->with('sucess', 'Update Sucess!');
      
      return redirect()
                    ->back()
                    ->with('error', 'Fail Update Profile!');
    }
}
