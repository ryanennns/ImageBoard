<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index() // show login page
    {
        if(auth()->guest()) {
            return view('login');
        }

        return view('profile', auth()->user());
    }

    public function create(Request $request) // login
    {
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($attributes)) {
            return response()->redirectTo('/me');
        }

        dd('Login failed --', $attributes);
    }

    public function destroy(): RedirectResponse // logout
    {
        auth()->logout();
        return response()->redirectTo('/');
    }
}
