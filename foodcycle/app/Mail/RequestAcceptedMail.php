<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestAcceptedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $consultant;
    public $requestDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($consultant, $requestDetails)
    {
        $this->consultant = $consultant;
        $this->requestDetails = $requestDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Request Has Been Accepted')
                    ->view('emails.request_accepted');
    }
}
