<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $username, $password;

    public function __construct($name, $username, $password)
    {
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject('Account Created - VERIFY')
                    ->view('emails.account-created');
    }
}
