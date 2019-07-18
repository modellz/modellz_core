<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PublicMailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $name;
    public $email;
    public $phone;

    /**
     * Create a new message instance.
     * @return void
     */
    public function __construct($token,$name,$email,$phone)
    {
        $this->token = $token;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('public_voting.mails.verification');
    }
}
