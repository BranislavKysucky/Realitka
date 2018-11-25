<?php

namespace App\Mail;

use App\Pouzivatel;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OverMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $pouzivatel;
    public function __construct(Pouzivatel $pouzivatel)
    {
        $this->pouzivatel=$pouzivatel;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.posli_email_token');
    }
}
