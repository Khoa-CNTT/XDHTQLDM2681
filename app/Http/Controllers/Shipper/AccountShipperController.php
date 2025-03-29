<?php

namespace App\Http\Controllers\Shipper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountShipperController extends Controller
{
    public function loginshipper()
    {
        return view('Shipper.page.login');
    }
}
