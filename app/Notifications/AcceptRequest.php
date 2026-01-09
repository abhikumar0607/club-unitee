<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AcceptRequest extends Notification
{
    use Queueable;
     public $sender;
    /**
     * Create a new notification instance.
     */
    public function __construct($sender)
    {
        $this->sender = $sender;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //         ->line('The introduction to the notification.')
    //         ->action('Notification Action', url('/'))
    //         ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type'        => 'accept_request',
            // text
            'message'     => $this->sender->name . ' accepted your connection request',
            'sender_name' => $this->sender->name,
            'sender_id'   => $this->sender->id,
            'icon'        => 'fas fa-user-plus',
            'avatar'      => $this->sender->profile_image
                ? asset('assets/customer/uploads/profile/' . $this->sender->profile_image)
                : asset('assets/customer/images/person-dummy.jpg'),
            'url'         => route('customer.my.connections'),
            'created_at'  => now()->toDateTimeString(),
        ];
    }
}
