<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    // Display the newsletter subscription form
    public function showForm()
    {
        return view('newsletter');
    }
    // Subscribe to the newsletter
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        $subscriber = NewsletterSubscriber::create([
            'email' => $request->email,
            'unsubscribe_token' => Str::random(32),
        ]);

        return back()->with('success', 'Thank you for subscribing to our newsletter!');
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
    // Unsubscribe from the newsletter
    public function unsubscribe($token)
    {
        $subscriber = NewsletterSubscriber::where('unsubscribe_token', $token)->first();

        if ($subscriber) {
            $subscriber->delete();
            return redirect()->route('home')->with('success', 'You have successfully unsubscribed from our newsletter.');
        }

        return redirect()->route('home')->with('error', 'Invalid unsubscribe token.');
    }
    public function showSubscribers()
    {
        $subscribers = NewsletterSubscriber::all(); // Fetch all subscribers
        return view('teacher.newsletter', compact('subscribers'));
    }

}
