<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
        // dd($request);
        $email = $request->only('email');
        $password = $request->only('password');
        if (Auth::user()->role_id == 'SuperAdmin') {
            // Authentication passed...
            return view('dashboard');
        }elseif(Auth::user()->role_id == "Customer"){
            return redirect()->route('home');
        }
    }
}
