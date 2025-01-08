<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminNewsletterController extends Controller
{
    public function showForm()
    {
        return view('teacher.newsletter');
    }
    public function showSubscribers()
    {
        $subscribers = \App\Models\NewsletterSubscriber::all(); // Fetch all subscribers from the database
        return view('teacher.newsletter', compact('subscribers')); // Pass the subscribers to the view
    }

        public function send(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $subscribers = NewsletterSubscriber::all();
        foreach ($subscribers as $subscriber) {
            Mail::raw($request->content, function ($message) use ($subscriber) {
                $message->to($subscriber->email)
                        ->subject('Our Latest Newsletter');
            });
        }

        return back()->with('success', 'Newsletter sent successfully!');
    }
    public function sendNewsletter(Request $request)
{
    $request->validate([
        'content' => 'required'
    ]);

    $subscribers = NewsletterSubscriber::all();

    if ($subscribers->isEmpty()) {
        return back()->with('error', 'No subscribers found.');
    }

    foreach ($subscribers as $subscriber) {
        Mail::raw($request->content, function ($message) use ($subscriber) {
            $message->to($subscriber->email)
                    ->subject('Food Cycle Newsletter');
        });
    }

    return back()->with('success', 'Newsletter sent successfully to all subscribers.');
}
}
