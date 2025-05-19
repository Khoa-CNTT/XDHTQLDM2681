<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'driver_id',
        'total_amount',
        'is_payment',
        'is_cancel',
        'status',
        'order_date',
        'delivery_date',
        'delivery_fee',
        'note',
        'requested_delivery_datetime',
        'payment_method'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
    public function menu_items()
    {
        return $this->belongsToMany(MenuItem::class, 'order_details', 'order_id', 'menu_item_id')
            ->withPivot('quantity_ordered', 'sell_price');
    }
}
