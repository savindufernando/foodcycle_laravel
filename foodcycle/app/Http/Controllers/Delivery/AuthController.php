<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\DeliveryUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showSignupForm()
    {
        return view('delivery.auth.signup');
    }

    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'contact_number' => 'required|string|max:15',
            'profile_photo' => 'nullable|image',
            'vehicle_type' => 'required|string|max:255',
            'vehicle_model' => 'required|string|max:255',
            'vehicle_reg_number' => 'required|string|max:255|unique:delivery_users',
            'vehicle_color' => 'required|string|max:255',
            'vehicle_photo' => 'nullable|image',
            'id_number' => 'required|string|max:255|unique:delivery_users',
            'license_number' => 'required|string|max:255|unique:delivery_users',
            'license_expiry' => 'required|date',
            'photo_id' => 'nullable|image',
            'driving_license' => 'nullable|image',
            'bank_account_name' => 'required|string|max:255',
            'bank_account_number' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'branch_name' => 'required|string|max:255',
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_number' => 'required|string|max:15',
            'location' => 'required|string', // New field
            'email' => 'required|string|email|max:255|unique:delivery_users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = DeliveryUser::create([
            'full_name' => $request->full_name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'contact_number' => $request->contact_number,
            'profile_photo' => $request->file('profile_photo') ? $request->file('profile_photo')->store('profile_photos') : null,
            'vehicle_type' => $request->vehicle_type,
            'vehicle_model' => $request->vehicle_model,
            'vehicle_reg_number' => $request->vehicle_reg_number,
            'vehicle_color' => $request->vehicle_color,
            'vehicle_photo' => $request->file('vehicle_photo') ? $request->file('vehicle_photo')->store('vehicle_photos') : null,
            'id_number' => $request->id_number,
            'license_number' => $request->license_number,
            'license_expiry' => $request->license_expiry,
            'photo_id' => $request->file('photo_id') ? $request->file('photo_id')->store('photo_ids') : null,
            'driving_license' => $request->file('driving_license') ? $request->file('driving_license')->store('driving_licenses') : null,
            'bank_account_name' => $request->bank_account_name,
            'bank_account_number' => $request->bank_account_number,
            'bank_name' => $request->bank_name,
            'branch_name' => $request->branch_name,
            'emergency_contact_name' => $request->emergency_contact_name,
            'emergency_contact_number' => $request->emergency_contact_number,
            'location' => $request->location, // New field
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('delivery')->login($user);

        return redirect()->route('delivery.dashboard');
    }

    public function showLoginForm()
    {
        return view('delivery.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('delivery')->attempt($credentials)) {
            return redirect()->route('delivery.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('delivery')->logout();
        return redirect()->route('service.delivery');
    }

    public function dashboard()
    {
        return view('delivery.dashboard');
    }
}