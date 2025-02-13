<?php

namespace App\Http\Controllers\supervisor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagementUserController extends Controller
{
    function managementUser() {
        $dataUser = User::all();
        return view('components.supervisor.menu.management-user', compact('dataUser'));
    }
}
