<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function ShowStatistic()
    {
        return view('forAdmin.Statistic.admin_statistic');
    }
}
