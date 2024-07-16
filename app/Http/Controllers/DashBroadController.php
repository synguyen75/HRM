<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBroadController extends Controller
{
    function index()
    {
        return view('dashboard.index');
    }
}
