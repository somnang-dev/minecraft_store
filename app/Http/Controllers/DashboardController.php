<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\RequestHistory;

class DashboardController extends Controller
{
    // Main dashboard
    public function main()
    {
        $requests = Request::all();
        $histories = RequestHistory::all();
        return view('dashboard', ['requests' => $requests, 'histories' => $histories]);
    }
}
