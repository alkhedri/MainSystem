<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
   // protected $redirectTo = RouteServiceProvider::HOME;
        public function redirectTo()
        {
            if ($this->guard()->user()->hasRole('instructor')) 
                return '/inst';
            else if ($this->guard()->user()->hasRole('college')) 
                return '/test';
                else if ($this->guard()->user()->hasRole('Admin')) 
                return '/Dashboard';
            else if ($this->guard()->user()->hasRole('student')) 
                return '/studentDashboard';
            

            return '/test';
        }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
