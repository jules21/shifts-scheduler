<?php

namespace App\Http\Controllers;

use App\Department;
use App\Position;
use App\User;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    public function getMembership($id)
    {
        $memberships = Position::where("department_id", $id)->pluck("name", "id");

        return json_encode($memberships);

    }
    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        $edit = false;
        return view('timetables.employee', compact('edit', 'departments', 'positions'));
    }
    public function store(Request $request)
    {
        $users = User::where('position_id', $request->input('position_id'))->limit(3)->get()->toArray();
        dd($users);
    }
}
