<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ShipperAcceptedOrder implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $restaurantId;
    public $message;
    public $orderId;

    public function __construct($restaurantId, $message, $orderId)
    {
        $this->restaurantId = $restaurantId;
        $this->message = $message;
        $this->orderId = $orderId;
    }

    public function broadcastOn()
    {
        return new Channel('restaurant.' . $this->restaurantId);
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->message,
            'order_id' => $this->orderId,
        ];
    }

    public function broadcastAs()
    {
        return 'ShipperAcceptedOrder';
    }
}
