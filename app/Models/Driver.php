<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Driver extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $table = "drivers";

    protected $fillable = [
        'username',
        'password',
        'email',
        'phonenumber',
        'fullname',
        'address',
        'avatar',
        'dateofbirth',
        'vehicle_type',
        'license_plate',
        'id_card',
        'is_active',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
