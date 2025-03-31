<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResRegister extends Controller
{
    public function resRegister()
    {
        return view('Restaurant/page/register');
    }
}
