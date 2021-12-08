<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoanDisbursementEmail extends Mailable
{
<<<<<<< HEAD
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
        return $this->subject('Loan Disbursement Email')
                    ->view('mail.loan-disbursement-email', ['mailData' => $this->mailData]);
    }
=======
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
    return $this->subject('Loan Disbursement Email')
      ->view('mail.loan-disbursement-email', ['mailData' => $this->mailData]);
  }
>>>>>>> refs/remotes/origin/main
}