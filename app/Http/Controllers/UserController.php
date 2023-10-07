<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterationFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Events\Registered;

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
        //doing validation in RegisterationFormRequest request

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'user_type' => self::JOB_SEEKER,    
        ]);

        event(new Registered($user));

        return back()->with('successMessage', 'Your account was successfully created :)');
    }

    public function storeEmployer(RegisterationFormRequest $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'user_type' => self::JOB_POSTER,  
            'user_trial' => now()->addWeek(),  
        ]);

        event(new Registered($user));

        return redirect()->route('login')->with('successMessage', 'Your account was successfully created :)');
    }

    public function delete(User $user)
    {
        $user->delete();
    }
}
