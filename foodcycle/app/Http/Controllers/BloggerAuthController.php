<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Blogger;

class BloggerAuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('blogger.login');
    }

    // Handle the login process
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = \App\Models\Blogger::where('email', $credentials['email'])->first();

        if (!$user) {
            Log::error('No user found with email: ' . $credentials['email']);
            return back()->withErrors(['email' => 'User not found'])->withInput();
        }

        if (!Auth::guard('blogger')->attempt($credentials)) {
            Log::error('Authentication failed for user: ' . $user->email);
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }

        Log::info('User logged in successfully: ' . $user->email);
        return redirect()->route('blogger.dashboard');
    }

    // Show the signup form
    public function showSignupForm()
    {
        return view('blogger.signup');
    }

    // Handle the registration process
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:bloggers',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'nullable|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
            'profile_pic' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle profile picture upload
        $profilePicPath = null;
        if ($request->hasFile('profile_pic')) {
            $profilePicPath = $request->file('profile_pic')->store('profile_pics', 'public');
        }

        Blogger::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'job_title' => $request->job_title,
            'location' => $request->location,
            'description' => $request->description,
            'profile_pic' => $profilePicPath,
        ]);

        return redirect()->route('blogger.login')->with('success', 'Registration successful. Please log in.');
    }


    // Logout the blogger
    public function logout()
    {
        Auth::guard('blogger')->logout();
        return redirect()->route('blogs.index');
    }

    // Show the dashboard
    public function dashboard()
    {
        $blogs = \App\Models\Blog::with('blogger')
                    ->where('status', 'approved') // Filter only approved posts
                    ->latest()
                    ->paginate(10);

        return view('blogger.dashboard', compact('blogs'));
    }


    public function profile()
    {
        $blogger = Auth::guard('blogger')->user();
        return view('blogger.profile', compact('blogger'));
    }

    // Update the Blogger's Profile
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
            'profile_pic' => 'nullable|image|max:2048',
        ]);

        $blogger = Auth::guard('blogger')->user();
        $blogger->name = $request->name;
        $blogger->address = $request->address;
        $blogger->job_title = $request->job_title;
        $blogger->location = $request->location;
        $blogger->description = $request->description;

        // Handle Profile Picture Upload
        if ($request->hasFile('profile_pic')) {
            $blogger->profile_pic = $request->file('profile_pic')->store('profile_pics', 'public');
        }

        $blogger->save();

        return redirect()->route('blogger.profile')->with('success', 'Profile updated successfully!');
    }



}
