<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sprava;
    public$meno;
    public$emailReply;
    public function __construct(String $sprava, String $meno, String $emailReply)
    {
        $this->sprava=$sprava;
        $this->meno=$meno;
        $this->emailReply=$emailReply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.kontakt_email_token');
    }
}
