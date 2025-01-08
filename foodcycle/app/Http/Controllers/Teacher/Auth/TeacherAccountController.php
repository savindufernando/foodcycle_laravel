<?php

namespace App\Http\Controllers\Teacher\Auth;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class TeacherAccountController extends Controller
{
    // Display the list of teachers (index)
    public function index()
    {
        $teachers = Teacher::all();
        return view('teacher.accounts.index', compact('teachers'));
    }

    // Store the new teacher account
    public function store(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers|max:255',
            'password' => 'required|string|min:8|confirmed', // password confirmation rule
        ]);

        // Create the teacher account
        Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Return a JSON response indicating success
        return response()->json(['success' => true]);
    }

    // Delete a teacher account
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teacher.accounts.index')->with('success', 'Teacher account deleted successfully.');
    }
}
