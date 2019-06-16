<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Action;

class NotifyUsers extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
     public $action;
 public function __construct(Action $action)
    {
        $this->action = $action;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast','mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
   public function toDatabase($notifiable)
    {
        return [
            'action' => $this->action,
        ];
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line($this->action->title)
            ->action('انتقل', url($this->action->link))
            ->line('شكرا لاستخدامك موقع المبادرات لمركز العمل التنموي معا!');
    }
public function toBroadcast($notifiable)
    {
        return [
            'data' => [
                'action' => $this->action,
            ]
        ];
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
