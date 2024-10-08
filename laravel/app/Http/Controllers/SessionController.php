<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    //
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $validatedAttributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $result = Auth::attempt($validatedAttributes);

        if (!$result) {
            throw ValidationException::withMessages(['message' => 'Invalid credentials']);
        }
        request()->session()->regenerate();

        $redirect_to = request()->query('redirect_to', '/jobs');
        return redirect($redirect_to)->with('success', 'Welcome back!');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
