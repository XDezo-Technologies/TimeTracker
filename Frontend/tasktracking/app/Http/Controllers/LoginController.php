<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller

{

    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle the login form submission
    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed, redirect to a specific page (e.g., dashboard)
            return redirect()->intended('/dashboard');
        } else {
            // Authentication failed, redirect back to the login form with an error message
            return redirect()->route('login')->withErrors(['login' => 'Invalid credentials.']);
        }
    }

    // Handle user logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
