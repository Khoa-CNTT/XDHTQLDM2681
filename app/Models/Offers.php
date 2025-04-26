<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $table = "offers";

    protected $fillable = [
        'City',
        'District',
        'Ward',
        'Address',
        'Latitude',
        'Longitude',
        'restaurant_id',

    ];
}
