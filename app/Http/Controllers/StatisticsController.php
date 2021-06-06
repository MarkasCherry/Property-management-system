<?php

namespace App\Http\Controllers;

use App\Models\WeeklyStatistics;

class StatisticsController extends Controller
{
    public function index()
    {
        $statistics = WeeklyStatistics::latest()->get()->take(52);

        return view('statistics.index', compact('statistics'));
    }

    public function logs()
    {
        return view('statistics.logs');
    }
}
