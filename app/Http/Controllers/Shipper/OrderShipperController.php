<?php

namespace App\Http\Controllers\Shipper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderShipperController extends Controller
{
    public function ordershipper()
    {
        return view('Shipper.page.order');
    }
    public function orderhistoryshipper()
    {
        return view('Shipper.page.orderhistory');
    }
    public function detailhistory()
    {
        return view('Shipper.page.detailhistory');
    }
}
