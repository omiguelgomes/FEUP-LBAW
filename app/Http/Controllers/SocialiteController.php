<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Image;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();

        $img = new Image();
        $img->description = "$user->name image";
        $img->path = $user->getAvatar();
        
        $user = User::firstOrCreate([
            'name' => $user->getName(),
            'email' => $user->getEmail()],[
            'password' => Hash::make(str_random(24)), 
            'google_id' => $user->getId(), 
              
        ]);
      
        $img->save();
        $user->image_id = $img->id;
        $user->save();

        Auth::login($user,true);
        return redirect('/profile');

        // $user->token;
    }
}
