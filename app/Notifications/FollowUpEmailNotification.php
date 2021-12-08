<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Mail\FollowUpEmail;

class FollowUpEmailNotification extends Notification
{
<<<<<<< HEAD
    use Queueable;
    private $mailData;
    private $receiver;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mailData, $receiver)
    {
        $this->mailData = $mailData;
        $this->receiver = $receiver;
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
        return (new FollowUpEmail($this->mailData))->to($this->receiver);
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
=======
  use Queueable;
  private $mailData;
  private $receiver;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct($mailData, $receiver)
  {
    $this->mailData = $mailData;
    $this->receiver = $receiver;
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
    return (new FollowUpEmail($this->mailData))->to($this->receiver);
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
>>>>>>> refs/remotes/origin/main
}
