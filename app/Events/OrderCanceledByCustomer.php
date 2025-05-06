<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderCanceledByCustomer implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $restaurantId;
    public $message;
    public $orderId;

    public function __construct($restaurantId, $orderId)
    {
        $this->restaurantId = $restaurantId;
        $this->orderId = $orderId;
        $this->message = "Khách hàng đã hủy đơn hàng #$orderId.";
    }

    public function broadcastOn()
    {
        return new Channel('restaurant.' . $this->restaurantId);
    }

    public function broadcastWith()
    {
        return [
            'order_id' => $this->orderId,
            'message' => $this->message,
        ];
    }

    public function broadcastAs()
    {
        return 'OrderCanceledByCustomer';
    }
}
