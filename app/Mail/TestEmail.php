<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $actionUrl;

    /*
    * Before using mailtrap.io for testing purpose, create an account and modify the .env file accordingly.    
    */
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $actionUrl)
    {
        $this->name = $name;
        $this->actionUrl = $actionUrl;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Welcome to Our Platform',
            from: 'no-reply@learnwithoutlimit.com',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'email.test',
            with: [
                'name' => $this->name,
                'actionUrl' => $this->actionUrl
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [
            Attachment::fromPath(storage_path('/app/public/journey/welcome.jpg')),
        ];
    }
}
