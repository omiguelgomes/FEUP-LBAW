<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getUser()
    {
        return $request->user();
    }

    public function home()
    {
        return redirect('/home');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRestorePassword()
    {
        return view('auth.restore_password');
    }

    public function login(Request $request)
    {

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL))
            return redirect()->back()->withInput()->withErrors(['The email entered is not valid']);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->back();
        }

        return redirect()->back()->withInput()->withErrors(['The email and password do not match']);
    }

    public function restorePassword(Request $request) {
        $user = User::where('email', $request->email)->get();

        if($user->count() == 0) {
            return response('No account found with given email! :\'(', 555);
        }

        Mail::send('mail.password', ['id' => $user[0]->id], function($m) use ($request) {
            $m->from('lbaw2065@gmail.com', 'LBAW2065');
            $m->to($request->email);

        });

        return $user;
    }
}
