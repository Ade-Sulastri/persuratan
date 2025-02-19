<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function dashboardSuperAdmin()
    {
        return view('superadmin.dashboard-super-admin');
    }
}
