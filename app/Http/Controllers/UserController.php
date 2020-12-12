<?php
namespace App\Http\Controllers;

use App\User;
use App\Purchase;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function promote($id) {
        User::where('id', $id)->update((array('isadmin' => true)));
        $user = User::find($id);

        return $user;
    }

    public function demote($id) {
        User::where('id', $id)->update((array('isadmin' => false)));
        $user = User::find($id);

        return $user;
    }

    public function delete($id) {
        $user = User::find($id);

        $purchases = $user->purchases()->get();
        
        foreach($purchases as $purchase) {
            $purchase->update((array('user_id' => 1)));
        }

        $user->delete();
        return $user;
    }
}