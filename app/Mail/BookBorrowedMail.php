<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookBorrowedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $book;
    public $bookBorrowed;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($book, $bookBorrowed)
    {
        $this->book = $book;
        $this->bookBorrowed = $bookBorrowed;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.bookborrowed');
    }
}
