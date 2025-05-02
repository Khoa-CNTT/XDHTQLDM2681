<?php

namespace App\Broadcasting;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Auth;
class OrderChannel
{
    public function join(Channel $channel)
    {
        return Auth::check();
    }
}
