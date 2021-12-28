<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Mail\BorrowerRejectionEmail;

class BorrowerRejectionNotification extends Notification implements ShouldQueue
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
        // return (new BorrowerRejectionEmail($this->mailData))->to($this->receiver);
        return (new MailMessage)
                ->from("SFDirect@smartfunding.sg", "SmartFunding Direct")
                ->subject($this->mailData['subject_email'])
                ->greeting("Hello ".$this->mailData['fullname'])
                ->line($this->mailData['body_email']);
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
