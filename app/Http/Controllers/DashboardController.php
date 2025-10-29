<?php

namespace App\Http\Controllers;
use App\Models\News;

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

        return view('admin', $data);
    }

    public function berita()
    {
        $news = News::latest()->paginate(10);
        return view('pages.berita', compact('news'));
    }
    public function exploreonindex()
    {
        $events = \App\Models\Event::latest()->paginate(10);
        return view('pages.index', compact('events'));
    }

}
