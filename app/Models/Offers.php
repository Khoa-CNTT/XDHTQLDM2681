<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $table = "offers";

    protected $fillable = [
        'title',
        'image',
        'discount_value',
        'start_date',
        'end_date',
        'status',
        'description',
        'discount_type',
        'is_global',
    ];
    // Quan hệ: offer thuộc nhiều nhà hàng (nếu không global)
    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class, 'restaurant_offers', 'offer_id', 'restaurant_id');
    }

    public function isActive()
    {
        return $this->status == 1 &&
            $this->start_date <= now() &&
            $this->end_date >= now();
    }
}
