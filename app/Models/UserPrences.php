<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPrences extends Model
{
    protected $table = "user_preferences";
    protected $fillable = ['user_id', 'taste_preference'];

    // Khai báo quan hệ ngược lại với model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
