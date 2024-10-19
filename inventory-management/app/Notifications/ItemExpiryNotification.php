<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ItemExpiryNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Item Expiry Notification')
                    ->line('The following item is nearing its expiry date:')
                    ->line($notifiable->item_name)
                    ->action('View Item', route('items.show', $notifiable));
    }
}
