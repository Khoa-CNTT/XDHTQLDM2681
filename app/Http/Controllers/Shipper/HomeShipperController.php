<?php

namespace App\Http\Controllers\Shipper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeShipperController extends Controller
{
    public function homeshipper()
    {
        return view('Shipper.page.index');
    }
}
