<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TargetUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $Mdata;
    public function __construct($Mdata)
    {
        $this->Mdata = $Mdata;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
    {
        $subject = $this->Mdata['email_subject'];
        return $this->view('mail.target')->subject($subject)->from(env('MAIL_USERNAME'), env('APP_NAME'));
    }
}
