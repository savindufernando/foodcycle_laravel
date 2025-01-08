<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Save contact request to the database
        Contact::create($request->all());

        // Send email to teacher (admin equivalent)
        Mail::raw("You have a new contact request.\n\nName: {$request->name}\nEmail: {$request->email}\nSubject: {$request->subject}\nMessage: {$request->message}", function ($message) use ($request) {
            $message->to('teacher@example.com') // Replace with teacher's email
                    ->subject('New Contact Request');
        });

        return back()->with('success', 'Your message has been sent successfully.');
    }

    public function viewContacts()
    {
        // Check if a teacher is authenticated using the correct guard
        if (auth('teacher')->check()) {
            $contacts = Contact::latest()->paginate(10);
            return view('teacher.contacts', compact('contacts'));
        }

        abort(403, 'Unauthorized');
    }

}
