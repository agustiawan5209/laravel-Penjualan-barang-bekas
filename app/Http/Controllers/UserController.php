<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Notification;

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
            abort_if(Auth::user()->role_id == 'Customer', 404);
        }
        return redirect()
            ->route('home')
            ->banner('Selamat Datang ' . Auth::user()->name . '.');
    }


}
