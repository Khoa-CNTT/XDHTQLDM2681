<?php

namespace App\Events;

use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderOnTheWay implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;

    // Constructor nhận đối tượng Order
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function broadcastOn()
    {
        return new Channel('order.' . $this->order->user_id); // Phát trên kênh của người dùng
    }

    public function broadcastAs()
    {
        return 'order.on_the_way'; // Tên sự kiện
    }

    public function broadcastWith()
    {
        return [
            'order' => [
                'id' => $this->order->id,
                'status' => $this->order->status,
            ],
        ];
    }
}
