<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjectCreationRequestNotification extends Mailable
{
    use Queueable, SerializesModels;

   /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inbox)
    {
        //
        $this->inbox = $inbox;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@mailing.zealhosts.net')
                    ->subject('Zealhosts | A New Mail Sent')
                    ->markdown('emails.projecttCreationRequest')
                    ->with('inbox', $this->inbox);
    }

    

}
