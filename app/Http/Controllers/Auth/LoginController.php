<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Constant;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function getLoginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $creds = $request->only('username', 'password');
        $creds['password'] = hash_pbkdf2(Constant::ALGO, $creds['password'], Constant::SALT, Constant::ITERATION, 20);
        $user = User::where(['username' => $creds["username"]])->first();
        if (!$user) {
            return redirect()->back()->withError('Username atau password salah');
        }
        if ($creds['password'] == $user->password) {
            Session::put('name', $user->name);
            Session::put('logon', true);
            return redirect()->intended();
        }
        return redirect()->back()->withError('Username atau password salah');
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}
