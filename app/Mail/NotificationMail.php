<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notification Mail',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.html_layout', // Specifica il percorso della tua vista personalizzata
            markdown: 'mail.notificationMails',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
