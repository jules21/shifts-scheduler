<?php

namespace App\Http\Controllers;

use App\Calendar;
use App\Leave;
use App\Leavereplacement;
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
        if (Auth::user()->role_id == 1) {
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

    public function store(Request $request)
    {
        $leave = Leave::create([

            'user_id' => Auth::user()->id,
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'description' => $request->input('description'),
        ]);

        if ($leave->save()) {
            return redirect()->route('user.leaves.index')->with('success', 'You\'r request sent successful. you\'ll be notified when approved');
        } else {
            return redirect()->back()->with('error', 'something went wrong, Please try again');
        }
    }

    public function show($id)
    {
        $leave = Leave::find($id);
        // dd($leave->day);
        $timestamp = strtotime($leave->day);

        $day = date('d', $timestamp);
        $pick = Calendar::where('day', $day)->where('worker', $leave->user_id)->first();
        // if ($pick->shift == 1) {
        //     $leave->status = "approved";
        //     $leave->save();
        //     return redirect()->back()->with('success', 'that day is already off');
        // } else {
        // $pick->shift == 1;
        // if ($pick->save()) {
        $leave->status = "approved";
        $user = User::find($leave->user_id);
        //
        Leavereplacement::create([
            'user_id' => $leave->user_id,
            'name' => 'replacement',
        ]);
        //
        if ($leave->save()) {
            $messages = [
                "email" => $user->email,
                "username" => $user->username,
                "day" => $leave->start_date . " - " . $leave->end_date,
                "status" => $leave->status,
                "description" => $leave->description,
            ];

            Mail::to($user->email)->send(new LeaveMail($messages));
            return redirect()->back()->with('success', 'request approved');
        } else {
            return redirect()->back()->with('error', 'something went wrong, Please try again');
        }
        // }
        // }
        // echo $day;

    }

    public function edit($id)
    {
        $leave = Leave::find($id);
        return view('leave.edit', compact('leave'));
    }

    public function update(Request $request, $id)
    {
        $leave = Leave::find($id);
        $leave->reason = $request->input('description');
        $leave->status = 'canceled';
        if ($leave->save()) {
            $user = User::find($leave->user_id);
            $messages = [
                "email" => $user->email,
                "username" => $user->username,
                "day" => $leave->start_date . " - " . $leave->end_date,
                "description" => $leave->reason,
                "status" => $leave->status,
            ];

            Mail::to($user->email)->send(new LeaveMail($messages));
            return redirect()->route('user.leaves.index')->with('success', 'request canceled, check your email for more info.');
        } else {
            return redirect()->back()->with('error', 'something went wrong, Please try again');
        }
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
