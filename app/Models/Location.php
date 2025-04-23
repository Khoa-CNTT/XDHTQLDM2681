<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = "locations";

    protected $fillable = [
            'City',
            'District',
            'Ward',
            'Address',
            'Latitude',
            'Longitude',
        'restaurant_id',

    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }
}
