<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('authenticate.register');
    }

    /**
     * Handle user registration.
     */
    public function register(Request $request)
{
    // Validate the incoming request data
    $validator = \Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return response()->json(['success' => false, 'errors' => $validator->errors()]);
    }

    // Create a new user
    User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
    ]);

    // Return a JSON response with success and redirect URL
    return response()->json(['success' => true, 'redirect' => route('login')]);
}


    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('authenticate.login');
    }

    /**
     * Handle user login.
     */
    public function login(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Attempt to log in the user
    if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
        // If login is successful, return a JSON response with success and redirect URL
        return response()->json(['success' => true, 'redirect' => route('books.index')]);
    }

    // If login fails, return a JSON response with errors
    return response()->json(['success' => false, 'errors' => ['email' => ['Invalid credentials provided.']]]);
}

    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        // Logout the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token
        $request->session()->regenerateToken();

        // Redirect to the login page
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}

