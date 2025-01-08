<?php

namespace App\Http\Controllers\Storage;

use App\Http\Controllers\Controller;
use App\Models\StorageProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show the signup form
    public function showSignupForm()
    {
        return view('storage.auth.signup');
    }

    // Handle the signup process
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:storage_providers',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = StorageProvider::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('storage')->login($user);

        // Redirect to the login page after successful registration
        return redirect()->route('storage.dashboard');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('storage.auth.login');
    }

    // Handle the login process
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('storage')->attempt($credentials)) {
            return redirect()->route('storage.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Logout the user
    public function logout()
    {
        Auth::guard('storage')->logout();
        return redirect()->route('service.storage');
    }

    // Show the dashboard (for authenticated users only)
    public function dashboard()
    {
        return view('storage.dashboard');
    }
}
