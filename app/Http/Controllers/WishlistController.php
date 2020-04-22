<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function show()
    {
      if (!Auth::check()) return redirect('/register');

      $user = Auth::user();
      $wishlist = $user->wishlist();
      return view('pages.wishlist')->with('wishlist', $wishlist);
    }

    public function remove($id)
    {
      //temporary so it doesn't break while auth is incomplete
      if (!Auth::check()) 
          $user = User::find(1);
      else
          $user = Auth::user();

      DB::delete('delete from wishlist where product_id = :pid and user_id = :uid', ['pid' => $id, 'uid' => $user->id]);

      return redirect('wishlist');
    }

    public function add($id)
    {
      //should probably make some verification to this id beforehand
      if (!Auth::check()) 
        return redirect('/register');
      else
          $user = Auth::user();

        DB::insert('insert into wishlist (product_id, user_id) values (:pid, :uid)',
      ['pid' => $id, 'uid' => $user->id]);
      
      return redirect('wishlist');
    } 
}
