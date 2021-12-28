<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Mail\BlacklistNotificationEmail;

class BlackListNotification extends Notification implements ShouldQueue
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
        // return (new BlacklistNotificationEmail($this->mailData))->to($this->receiver);
        return (new MailMessage)
                ->from("SFDirect@smartfunding.sg", "SmartFunding Direct")
                ->subject("Blacklist Email from SmartFunding Direct")
                ->greeting("Hello ".$this->mailData['fullName'])
                ->line("Loan reference number : ".$this->mailData['loanReferenceNumber'])
                ->line("You have a total of RM ".number_format($this->mailData['loanAmmount'], 2)." overdue amount, which is accumulated over three months.")
                ->line("We strongly urge you to make immediate payment. Otherwise, other collection methos will take effect including uploading the records to CCRIS & CTOS.")
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
