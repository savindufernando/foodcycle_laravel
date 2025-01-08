<?php


namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;
    public $finalTotal;

    public function __construct($payment, $finalTotal)
    {
        $this->payment = $payment;
        $this->finalTotal = $finalTotal;
    }

    public function build()
    {
        return $this->view('emails.payment_success')
                    ->subject('Payment Successful')
                    ->with([
                        'payment' => $this->payment,
                        'finalTotal' => $this->finalTotal,
                    ]);
    }
}

