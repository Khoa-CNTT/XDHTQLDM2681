<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ShipperLocationUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $latitude;
    public $longitude;
    public $restaurantLatitude;
    public $restaurantLongitude;
    public $orderId;

    /**
     * Tạo một instance mới của sự kiện.
     *
     * @param  float  $latitude
     * @param  float  $longitude
     * @param  float  $restaurantLatitude
     * @param  float  $restaurantLongitude
     * @param  int  $orderId
     */
    public function __construct($latitude, $longitude, $restaurantLatitude, $restaurantLongitude, $orderId)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->restaurantLatitude = $restaurantLatitude;
        $this->restaurantLongitude = $restaurantLongitude;
        $this->orderId = $orderId;
    }

    /**
     * Xác định kênh mà sự kiện này sẽ được phát.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('order.' . $this->orderId);
    }
    public function broadcastAs()
    {
        return 'ShipperLocationUpdated';
    }

    /**
     * Dữ liệu để phát đi khi sự kiện được broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'restaurantLatitude' => $this->restaurantLatitude,
            'restaurantLongitude' => $this->restaurantLongitude,
            'orderId' => $this->orderId,
        ];
    }
}
