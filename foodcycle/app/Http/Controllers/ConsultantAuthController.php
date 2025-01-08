<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ConsultantAuthController extends Controller
{
    // Show registration form
    public function registerForm()
    {
        return view('consultant.register');
    }

    // Handle registration
    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'province' => 'required|string|max:255',
        'contact_no' => 'required|string|max:20',
        'email' => 'required|email|unique:consultants,email',
        'password' => 'required|string|min:8|confirmed',
        'skills' => 'nullable|array',
        'sub_skills' => 'nullable|array',
    ]);

    Consultant::create([
        'name' => $request->name,
        'address' => $request->address,
        'province' => $request->province,
        'contact_no' => $request->contact_no,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'education' => $request->education,
        'qualifications' => $request->qualifications,
        'skills' => json_encode($request->skills ?? []),
        'sub_skills' => json_encode($request->sub_skills ?? []),
    ]);
    
    return redirect()->route('consultant.loginForm')->with('success', 'Registration successful!');
}


    // Show login form
    public function loginForm()
    {
        return view('consultant.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('consultants')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('consultant.dashboard');
        }        

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::guard('consultants')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('consultant.loginForm');
    }

    // View profile
    public function viewProfile()
    {
        $consultant = Auth::guard('consultants')->user();
        return view('consultant.profile', compact('consultant'));
    }

    public function updateProfile(Request $request)
    {
        // Get the authenticated consultant
        $consultant = Auth::guard('consultants')->user();

        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'contact_no' => 'required|string|max:20',
            'education' => 'nullable|string|max:255',
            'qualifications' => 'nullable|string|max:255',
            'email' => 'required|email|unique:consultants,email,' . $consultant->id,
            'password' => 'nullable|string|min:8|confirmed',
            'skills' => 'nullable|array',
            'skills.*' => 'string',
            'sub_skills' => 'nullable|array',
            'sub_skills.*' => 'string',
        ]);

        // Update consultant details
        $consultant->update([
            'name' => $request->name,
            'address' => $request->address,
            'province' => $request->province,
            'contact_no' => $request->contact_no,
            'education' => $request->education,
            'qualifications' => $request->qualifications,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $consultant->password,
            'skills' => json_encode($request->skills ?? []),
            'sub_skills' => json_encode($request->sub_skills ?? []),
        ]);

        // Redirect back with a success message
        return back()->with('success', 'Profile updated successfully.');
    }


    // Delete account
    public function deleteAccount()
    {
        $consultant = Auth::guard('consultant')->user();
        $consultant->delete();

        Auth::guard('consultant')->logout();
        return redirect()->route('consultant.loginForm')->with('success', 'Account deleted successfully.');
    }
    // Public page for consultants
    public function publicInfo()
    {
        return view('consultant.public-info');
    }

}
