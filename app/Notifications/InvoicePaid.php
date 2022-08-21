<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaid extends Notification
{
    use Queueable;
    private $enrolData;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($enrolData)
    {
        $this->enrolData = $enrolData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line($this->enrolData['body'])
    //                 ->action($this->enrolData['action'], $this->enrolData['url'])
    //                 ->line($this->enrolData['to']);
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'type' => $this->enrolData['type'],
            'body' => $this->enrolData['body'],
            'from' => $this->enrolData['from'],
        ];
    }
}
