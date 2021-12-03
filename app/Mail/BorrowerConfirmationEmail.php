<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BorrowerConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;
    private $mailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->mailData = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Borrower Confirmation Email')
                    ->view('mail.borrower-confirmation-email', ['mailData' => $this->mailData]);
    }
}
