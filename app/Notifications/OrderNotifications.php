<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Channels\WhacenterChannel;
use App\Services\WhacenterService;
use Illuminate\Support\Facades\Http;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderNotifications extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $order;
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [WhacenterChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
   

    public function toWhacenter($notifiable)
    {
        return (new WhacenterService())
        ->to($notifiable->nohp)
        ->line("Assalamualaikum " . $notifiable->name)
        ->line($this->order->nama . " " . "Telah Melakukan Order Pada " . $this->order->created_at )
        ->line("Dengan detail berikut :")
        ->line()
        ->line("*Nama Kos :* " . $this->order->kos->nama)
        ->line("*Alamat Customer :* " . $this->order->alamat)
        ->line("*No Hp :* ".  $this->order->nohp)
        ->line();
    }
}
