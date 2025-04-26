<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        // Gửi thông qua các kênh như database hoặc email
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Đơn hàng mới: ' . $this->order->id)
            ->line('Bạn có một đơn hàng mới.')
            ->action('Xem chi tiết', url('/restaurant/orders/' . $this->order->id));
    }

    public function toDatabase($notifiable)
    {
        return [
            'order_id' => $this->order->id,
            'message' => 'Đơn hàng mới của bạn: ' . $this->order->id
        ];
    }
}
