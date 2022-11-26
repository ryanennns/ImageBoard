<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'username' => ['required', 'max:255', 'min:2', 'unique:users,username'],
            'email' => ['required', 'max:255', 'email', 'unique:users,email'],
            'password' => ['required', 'max:255', 'min:8'],
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/');
    }
}
