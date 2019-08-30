<?php

namespace App\Http\Controllers;

use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function index()
    // {
    //     if (Auth::user()->isManager) {
    //         return $this->managerDashboard();
    //     } else {
    //         return $this->userDashboard();
    //     }
    // }
    public function managerDashboard()
    {
        return view('dashboard.manager');
    }
    public function userDashboard()
    {
        return view('dashboard.default');
    }
}
