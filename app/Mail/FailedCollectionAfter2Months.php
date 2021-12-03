<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FailedCollectionAfter2Months extends Mailable
{
    use Queueable, SerializesModels;
    private $mailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Failed Collection Email (After 2 Months)')
                    ->view('mail.failed-collection-after2-months', ['mailData' => $this->mailData]);
    }
}
