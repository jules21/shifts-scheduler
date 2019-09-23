<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeaveMail extends Mailable
{
    use Queueable, SerializesModels;
    public $messages = array();

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messages = array())
    {
        $this->messages = $messages;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Leave Request Response at Hotel Villa';
        $content = $this->messages;
        $data = [
            'subject' => $subject,
            'email' => $content['email'],
            'day' => $content['day'],
            'description' => $content['description'],
            'username' => $content['username'],
            'status' => $content['status'],
        ];
        return $this->subject($subject)
            ->view('email.approval', compact('data'));
    }

}
