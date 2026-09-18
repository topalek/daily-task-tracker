<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        // Attempt to log the user in
        if (auth()->attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // Authentication passed, redirect to dashboard
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

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
