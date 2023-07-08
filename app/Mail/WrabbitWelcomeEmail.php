<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WrabbitWelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $companyName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name = "", $companyName = "")
    {
        $this->name = $name;
        $this->companyName = $companyName;
    }

    // /**
    //  * Build the message.
    //  *
    //  * @return $this
    //  */
    // public function build()
    // {
    //     return $this->view('emails.wrabbit-welcome-email');
    // }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Wrabbit Welcome Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content 
    {
        return new Content(
            markdown: 'emails.wrabbit-welcome-email',
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
