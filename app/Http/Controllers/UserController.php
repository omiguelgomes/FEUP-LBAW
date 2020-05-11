<?php
namespace App\Http\Controllers;

use App\User;

use Illuminate\Support\Facades\DB;

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
}