<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ship;
use App\Models\Schedule;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalShips = Ship::count();
        $passengerShips = Ship::where('type', 'passenger')->count();
        $tugboatShips = Ship::where('type', 'tugboat')->count();
        $bargeShips = Ship::where('type', 'barge')->count();

        $totalSchedules = Schedule::count();

        $recentShips = Ship::latest()->take(5)->get();
        $recentSchedules = Schedule::with('ship')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalShips',
            'passengerShips',
            'tugboatShips',
            'bargeShips',
            'totalSchedules',
            'recentShips',
            'recentSchedules'
        ));
    }
}
