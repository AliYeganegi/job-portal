<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterationFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    const JOB_SEEKER = 'seeker';
    const JOB_POSTER = 'employer';

    public function createSeeker()
    {
        return view('users.seeker-register');
    }

    public function createEmployer()
    {
        return view('users.employer-register');
    }

    public function storeSeeker(RegisterationFormRequest $request)
    {
        //doing validation in it's request

        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'user_type' => self::JOB_SEEKER,    
        ]);

        return back();
    }

    public function storeEmployer(RegisterationFormRequest $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'user_type' => self::JOB_POSTER,    
        ]);

        return redirect()->route('login');
    }

    public function delete(User $user)
    {
        $user->delete();
    }
}
