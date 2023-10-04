<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('users.login');
    }

    public function postLogin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return "Wrong email or password!";
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
