<?php


use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.{restaurantId}.{customerId}', function ($user, $restaurantId, $customerId) {
    // Kiểm tra xem người dùng hiện tại có phải là khách hàng hoặc nhà hàng tương ứng không
    return $user->id === (int) $customerId || $user->restaurant_id === (int) $restaurantId;
});
