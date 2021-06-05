<?php

namespace App\Http\Controllers;

use App\Models\WeeklyStatistics;

class StatisticsController extends Controller
{
    public function index()
    {
        $statistics = WeeklyStatistics::latest()->get()->take(100);

        return view('statistics.index', compact('statistics'));
    }
}
