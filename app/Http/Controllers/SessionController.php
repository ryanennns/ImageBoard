<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index() // show login page
    {
        return view('login');
    }

    public function create(Request $request) // login
    {
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($attributes)) {
            return response()->redirectTo('/');
        }

        dd('Login failed --', $attributes);
    }

    public function destroy(): RedirectResponse // login
    {
        auth()->logout();
        return response()->redirectTo('/');
    }
}
