<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UnacceptRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;
    public $reason;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request, $reason)
    {
        $this->request = $request;
        $this->reason = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Consultation Request Unaccepted')
                    ->view('emails.unaccept_request');
    }
}
