<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Mail\EMandateEmail;

class EMandateEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $mailData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // return (new EMandateEmail($this->mailData))->to($this->receiver);
        return (new MailMessage)
                    ->from("SFDirect@smartfunding.sg", "SmartFunding Direct")
                    ->subject("E-Mandate Email Notification")
                    ->greeting("Hello"." ".$this->mailData['fullName'])
                    ->line("Good day! Your loan application has been approved at RM ".number_format($this->mailData['loanAmount'], 2))
                    ->line("We will need you to complete the E-Mandate Process before the cash disbursement.")
                    ->line("")
                    ->line("Please click on the below URL to authorize the E-Mandate process :")
                    ->action('Authorize E-Mandate', $this->mailData['urlAuthorized'])
                    ->line("Should you require any assistance, please whatsapp ".$this->mailData['phoneNumber'].".");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
