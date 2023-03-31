<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FirstTimePasswordChangeNotification extends Mailable
{
    use Queueable, SerializesModels;

   /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        //
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@mailing.zealhosts.net')
                    ->subject('Zealhosts | First Time Password Change Successfully')
                    ->markdown('emails.FirstTimePasswordChange')
                    ->with('user', $this->user);
    }

    

}
