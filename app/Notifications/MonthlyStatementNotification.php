<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Mail\MonthlyStatementEmail;

class MonthlyStatementNotification extends Notification implements ShouldQueue
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
        // return (new MonthlyStatementEmail($this->mailData))->to($this->receiver);
        return (new MailMessage)
                ->from("SFDirect@smartfunding.sg", "SmartFunding Direct")
                ->subject("Monthly Statement Reminder")
                ->greeting("Hello ".$this->mailData['fullName'])
                ->line("Attached is your loan statement for the period of ".$this->mailData['period'].".")
                ->line("To view, please follow the instruction below :")
                ->line("Step 1: Open the attachment")
                ->line("Step 2: Enter your password (last 4 digits of your IC)")
                ->attach($this->mailData['attachment'], [
                    'as' => "MonthlyReminder.pdf",
                    'mime' => "application/pdf",
                    ]);
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
