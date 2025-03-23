<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThongkeController extends Controller
{
    public function index()
    {
        return view('Admin.page.thong-ke.index');
    }
}
