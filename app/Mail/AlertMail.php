<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AlertMail extends Mailable
{
    use Queueable, SerializesModels;

    public $product;

    public function __construct($product)
    {
        $this->product = $product;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Alert Mail',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'emails.NotifyStock',
        );
    }


    public function attachments(): array
    {
        return [];
    }
}
