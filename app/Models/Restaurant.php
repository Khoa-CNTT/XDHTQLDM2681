<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = "restaurants";

    protected $fillable = [
        'name',
        'approved',
        'PhoneNumber',
        'email',
        'status',
        'start_time',
        'end_time',
        'business_type',
        'description',
        'logo',
        'business_license',
        'location_id',
    ];

    /**
     * Định nghĩa mối quan hệ với Location
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function menuItems()
    {
        return $this->hasMany(MenuItem::class, 'restaurant_id');
    }
}
