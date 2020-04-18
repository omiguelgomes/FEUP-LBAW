<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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

<<<<<<< HEAD
    public function home() {
        return redirect('login');
=======
    public function home()
    {
        return redirect('/home');
>>>>>>> 08184efb404a97a0ab988ef727f03283e0538aae
    }

    public function showLoginForm()
    {
        return view('auth.login');
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
            return redirect()->route('home');
        }

        return redirect()->back()->withInput()->withErrors(['The email and password do not match']); 
    }
}
