<?php

namespace App\Http\Controllers;

use App\Department;
use App\Position;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class EmployeeController extends Controller
{
    public function getMembership($id)
    {
        $memberships = Position::where("department_id", $id)->pluck("name", "id");

        return json_encode($memberships);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::where('role_id', 2)->get();
        return view('employees.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        $edit = false;
        return view('employees.create', compact('edit', 'departments', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'nullable|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            // 'birthday' => 'nullable|date',
            // 'department_id' => 'required',
            // 'position_id' => 'required',
        ]);

        $users = User::where('position_id', $request->input('position_id'))->orderBy('id', 'desc')->first();
        $index;
        if ($users->index < 4) {
            $index = $users->index + 1;
        } else {
            $index = 1;
        }
        // dd($index);

        $user = User::create([
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'birthday' => $request->input('birthday'),
            'address' => $request->input('address'),
            'department_id' => $request->input('department_id'),
            'position_id' => $request->input('position_id'),
            'index' => $index,
        ]);

        if ($user) {
            return redirect()->route('manager.employees.index')->with('success', 'new Employee created Successful');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        // dd($user);
        return view('employees.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = true;
        $user = User::find($id);
        $departments = Department::all();
        $positions = Department::find($user->department_id)->positions;
        return view('employees.edit', compact('user', 'departments', 'edit', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            // 'email' => 'required|string|email|max:255|unique:users',
            // 'username' => 'nullable|string|max:255|unique:users',
            'password' => 'nullable|string|min:6|confirmed',
            // 'birthday' => 'nullable|date',
            // 'department_id' => 'required',
            // 'position_id' => 'required',
        ]);
        // dd($request->all());
        $user = User::findOrFail($id);
        if (Input::get('password') == '') {
            $user->email = $request->input('email');
            $user->username = $request->input('username');
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->birthday = $request->input('birthday');
            $user->address = $request->input('address');
            $user->department_id = $request->input('department_id');
            $user->position_id = $request->input('position_id');

            if ($user->save()) {
                return redirect()->back()->with('success', ' Employee updated Successful');
            } else {
                redirect()->back();
            }

        } else {
            $user->email = $request->input('email');
            $user->username = $request->input('username');
            $user->password = Hash::make($request->input('password'));
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->birthday = $request->input('birthday');
            $user->address = $request->input('address');
            $user->department_id = $request->input('department_id');
            $user->position_id = $request->input('position_id');
            if ($user->save()) {
                return redirect()->back()->with('success', ' Employee updated Successful');
            } else {
                redirect()->back();
            }

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delUser = User::find($id);

        if ($delUser->delete()) {
            return redirect()->route('manager.employees.index')->with('success', 'employee deleted Successful');
        } else {
            return back()->withInput();
        }
    }
}
