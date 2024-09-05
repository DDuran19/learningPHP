<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        dd(request()->all());
        // $attributes = request()->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        // if (auth()->attempt($attributes)) {
        //     session()->regenerate();
        //     return redirect('/')->with('success', 'Welcome back!');
        // }

        // return back()->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }
}
