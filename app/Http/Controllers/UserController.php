<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function authenticate(Request $request)
    {
        // dd($request);
        if (Auth::user()->role_id == 'SuperAdmin') {
            return redirect()->route('dashboard');
            abort_if(Auth::user()->role_id == "Csutomer", 404);
        }
        return redirect()->route('home');
    }
}
