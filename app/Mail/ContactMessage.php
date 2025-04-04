<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $contactMessage;

    /**
     * Create a new message instance.
     *
     * @param $name
     * @param $email
     * @param $contactMessage
     */
    public function __construct($name, $email, $contactMessage)
    {
        $this->name = $name;
        $this->email = $email;
        $this->contactMessage = $contactMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nouveau message de contact')
                    ->from($this->email)
                    ->to('yahyaclarke0@gmail.com')
                    ->view('emails.contact');
    }
}

