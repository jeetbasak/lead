<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminNotify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
    {
        $data['data'] =  $this->data;
        //dump($this->request);
        $subject= "A new enquiery";
        return $this->view('mail.adminNotify',$data)
            ->to(env('APP_ADMIN_EMAIL'))
            ->subject($subject)
            ->from(env('MAIL_USERNAME'),env('APP_NAME'));
    }
}
