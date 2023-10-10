<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CongratsWinnerMail extends Mailable
{
    use Queueable, SerializesModels;

    private $value;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($value)
    {
        $this->value = $this;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $value = $this->value;
        return $this->view('mail.winner', compact('value'));
    }
}
