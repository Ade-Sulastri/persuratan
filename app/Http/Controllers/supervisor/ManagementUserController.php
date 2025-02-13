<?php

namespace App\Http\Controllers\supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagementUserController extends Controller
{
    function managementUser() {
        return view('components.supervisor.menu.management-user');
    }
}
