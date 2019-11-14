<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailTemplate extends Mailable
{
    use Queueable, SerializesModels;
    public $mail_text;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_text)
    {
        $this->mail_text = $mail_text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('vendor.mail.html.templates.mail-template')->subject('StandingOrdersPlatform')->with('mail_text', $this->mail_text);
    }
}
