<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
    protected $fillable = [
        'order_id',
        'comment',
        'rating',
        'is_approved '
    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
