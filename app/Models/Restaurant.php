<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Restaurant extends Model
{
    use Notifiable;
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

    ];

    /**
     * Định nghĩa mối quan hệ với Location
     */
    public function locations()
    {
        return $this->hasMany(Location::class, 'restaurant_id'); // Một nhà hàng có nhiều địa điểm
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class, 'restaurant_id');
    }
    public function offers()
    {
        return $this->belongsToMany(Offers::class, 'restaurant_offers', 'restaurant_id', 'offer_id');
    }

    public function availableOffers()
    {
        return Offers::where(function ($query) {
            $query->where('is_global', true)
                ->orWhereHas('restaurants', function ($q) {
                    $q->where('restaurants.id', $this->id);
                });
        })->where('status', 1)
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->get();
    }
}
