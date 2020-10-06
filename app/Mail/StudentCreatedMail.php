<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($student, $password)
    {
        $this->student = $student;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.usercreated')->subject('Your registration is successfully done');
    }
}
