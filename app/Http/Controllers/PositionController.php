<?php

namespace App\Http\Controllers;

use App\Department;
use App\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::paginate(5);
        // dd($positions);
        return view('positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $edit = false;
        return view('positions.create', compact('edit', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $newDepartment = Position::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'department_id' => $request->input('department_id'),
        ]);
        if ($newDepartment) {
            return redirect()->route('manager.positions.index')->with('success', 'new Department Post Added Successful');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        $departments = Department::all();
        $edit = true;
        $position = Position::find($position->id);
        return view('positions.create', compact('edit', 'departments','position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $position = Position::find($position->id);
        $position->name = $request->input('name');
        $position->description = $request->input('description');
        $position->department_id = $request->input('department_id');

        if ($department->save()) {
            return redirect()->route('manager.departments.index')->with('success', 'Department Updated Successful');
        }else {
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $position = Position::find($position->id);

        if ($position->delete()) {
            return redirect()->route('manager.positions.index')->with('success', 'Department Post deleted Successful');
        }else {
            return back()->withInput();
        }
    }
}
