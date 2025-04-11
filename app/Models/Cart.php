<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "carts";

    protected $fillable = [
        'user_id',
        'amount',

    ];

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }

    public static function createCartForUser($userId)
    {
        return self::create([
            'user_id' => $userId,
            'amount' => 0,
        ]);
    }
}
