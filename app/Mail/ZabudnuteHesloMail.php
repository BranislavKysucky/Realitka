<?php

namespace App\Mail;

use App\Inzerat;
use App\Pouzivatel;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ZabudnuteHesloMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $inzerat;
    public function __construct(Inzerat $inzerat)
    {
        $this->inzerat=$inzerat;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.posli_email_zabudnute_heslo');
    }
}
