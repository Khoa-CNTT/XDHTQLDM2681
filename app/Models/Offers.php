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
    ];
}
