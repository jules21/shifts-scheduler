<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::paginate(5);
        // dd($departments);
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        return view('departments.create', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newDepartment = Department::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        if ($newDepartment) {
            return redirect()->route('manager.departments.index')->with('success', 'new Department Added Successful');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $edit = true;
        $department = Department::find($department->id);
        return view('departments.create', compact('edit','department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $department = Department::find($department->id);
        $department->name = $request->input('name');
        $department->description = $request->input('description');

        if ($department->save()) {
            return redirect()->route('manager.departments.index')->with('success', 'Department Updated Successful');
        }else {
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department = Department::find($department->id);

        if ($department->delete()) {
            return redirect()->route('manager.departments.index')->with('success', 'Department deleted Successful');
        }else {
            return back()->withInput();
        }
    }
}
