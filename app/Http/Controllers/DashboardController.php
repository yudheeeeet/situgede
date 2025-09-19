<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            // 'totalUsers' => User::count(),
            'annualRevenue' => 215000,
            'taskProgress' => 75,
            'pendingRequests' => 18,
        ];

        return view('dashboard', $data);
    }
}
