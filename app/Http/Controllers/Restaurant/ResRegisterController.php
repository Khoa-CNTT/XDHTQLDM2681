<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResRegisterController extends Controller
{
     public function resRegister(){
        return view('restaurant.page.account.register');
     }
}
