<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the login form data
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);

        // // Attempt to log the user in
        // if (auth()->attempt($credentials)) {
        //     // Authentication passed, redirect to dashboard
        //     return redirect()->intended('/dashboard');
        // }

        // Authentication failed, redirect back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function showResetPasswordForm()
    {
        return view('auth.passwords.reset');
    }

    public function resetPassword(Request $request)
    {
        // Implementation for resetting password
    }
}
