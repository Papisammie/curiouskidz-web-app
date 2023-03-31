<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     
      public function __construct($user)
    {
        $this->user = $user;
    }


    
    
     /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'curiouskidzng@gmail.com';
        $name = 'CuriousKidz';
        $subject = 'CuriousKidz | Register';
        return $this->view('emails.registerNotification')
                    ->from($address, $name)
                    ->subject($subject)
                    ->with('user', $this->user);
    }


}
