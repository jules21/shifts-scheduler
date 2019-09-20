<?php

namespace App\Http\Controllers;

use App\Leave;
use App\Mail\LeaveMail;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->id == 1) {
            $leaves = Leave::all();
            return view('leave.index', compact('leaves'));
        }
        $leaves = Leave::where('user_id', Auth::user()->id)->get();
        return view('leave.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leave.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $leave = Leave::create([

            'user_id' => Auth::user()->id,
            'day' => $request->input('day'),
            'description' => $request->input('description'),
        ]);

        if ($leave->save()) {
            return redirect()->back()->with('success', 'You\'r request sent successful. you\'ll be notified when approved');
        } else {
            return redirect()->back()->with('error', 'something went wrong, Please try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leave = Leave::find($id);
        $leave->status = "approved";
        $user = User::find($leave->user_id);

        if ($leave->save()) {
            $messages = [
                "email" => $user->email,
                "username" => $user->username,
                "day" => $leave->day,
                "description" => $leave->description,
            ];

            Mail::to($user->email)->send(new LeaveMail($messages));
            return redirect()->back()->with('success', 'request approved');
        } else {
            return redirect()->back()->with('error', 'something went wrong, Please try again');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delUser = Leave::find($id);

        if ($delUser->delete()) {
            return redirect()->route('user.leaves.index')->with('success', 'request deleted Successful');
        } else {
            return back()->withInput();
        }
    }
}
