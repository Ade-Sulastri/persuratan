<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardOperatorController extends Controller
{
    public function dashboardOperator()
    {
        return view('operator.dashboard-operator');
    }
}
