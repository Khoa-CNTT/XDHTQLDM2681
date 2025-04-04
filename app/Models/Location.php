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

    ];
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
}
