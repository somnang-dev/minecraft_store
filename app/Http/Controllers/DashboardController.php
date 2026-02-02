<?php

namespace App\Http\Controllers;

use App\Models\Request;

class DashboardController extends Controller
{
    // Main dashboard
    public function main() 
    {
        $requests = Request::all();
        return view('dashboard', ['requests' => $requests   ]);
    }
}
