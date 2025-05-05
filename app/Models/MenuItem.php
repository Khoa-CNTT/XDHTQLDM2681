<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $table = 'menu_items';

    protected $fillable = [
        'restaurant_id',
        'category_id',
        'Title_items',
        'Price',
        'Image',
        'Quantity',
        'Status',
        'description',
        'OldPrice',
        'preparation_time',
        'approved',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function ratings()
    {
        return $this->hasManyThrough(
            Rating::class,
            OrderDetail::class,
            'menu_item_id',
            'order_id',
            'id',
            'order_id'
        );
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }
}
