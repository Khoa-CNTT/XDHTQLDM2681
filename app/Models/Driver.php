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
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
