<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewOrderNotification;

class SendOrderNotification
{
    public function handle(OrderCreated $event)
    {
        $order = $event->order;
        $restaurant = Restaurant::find($order->restaurant_id);

        // Gửi thông báo cho nhà hàng qua Notification
        Notification::send($restaurant, new NewOrderNotification($order));
    }
}
