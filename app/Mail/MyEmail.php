<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $carRental;

    /**
     * Create a new message instance.
     *
     * @param mixed $carRental
     */
    public function __construct($carRental)
    {
        $this->carRental = $carRental;
    }

    public function sendPaymentRequest(){
        // $this->subject('Car Rentals Payment Request');
        return $this->view('emails.paymentRequest',['carRental'=>$this->carRental]);
    }
    /**
     * Get the message envelope.
     */

    
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'My Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.paymentRequest',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}