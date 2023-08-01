<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{



    // Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle the registration form submission
    public function register(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
        ], [
            'email.unique' => 'This email is already registered.',
            'password.confirmed' => 'The passwords do not match.',
        ]);

        // Create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to the login page with a success message
        return redirect()->route('login')->with('success', 'Registration successful. You can now log in.');
    }
}
