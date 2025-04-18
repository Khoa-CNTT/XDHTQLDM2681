<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RestaurantMessage implements ShouldBroadcast
{
    public $restaurantId;
    public $message;

    public function __construct($restaurantId, $message)
    {
        $this->restaurantId = $restaurantId;
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new Channel('chat.' . $this->restaurantId);
    }

    public function broadcastAs()
    {
        return 'res-message';
    }
}
