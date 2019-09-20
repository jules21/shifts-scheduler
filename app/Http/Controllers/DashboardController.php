<?php

namespace App\Http\Controllers;

use App\Department;
use App\Position;
use App\TimeTable;
use App\User;

class DashboardController extends Controller
{

    public function timetable()
    {
        $shifts = TimeTable::all();
        // dd($shifts);
        return view('timetable', compact('shifts'));
    }
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
        $departments = Department::all();
        $positions = Position::all();
        $employees = User::all();

        return view('dashboard.manager',
            [
                'departments' => $departments,
                'positions' => $positions,
                'employees' => $employees,
            ]);
    }
    public function userDashboard()
    {
        return view('dashboard.default');
    }
}
