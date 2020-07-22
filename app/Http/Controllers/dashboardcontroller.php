<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    // function index () {
    //     return view ('dashboard.index');
    // }

    public function index()
    {
        return view('dashboard/index');
    }
}
