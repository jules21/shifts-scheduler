<?php

namespace App\Http\Controllers;

use App\Swap;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SwapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id == 1) {
            $leaves = Swap::all();
            return view('swap.index', compact('leaves'));
        }
        $leaves = Swap::where('user_id', Auth::user()->id)->get();
        return view('swap.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $user_id = Auth::user()->position->id;
        $employees = User::where('position_id', $user_id)->get();
        // dd($employees);
        return view('swap.create', compact('employees', 'edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $slug = uniqid();
        $leave1 = Swap::create([

            'user_id' => Auth::user()->id,
            'swapper' => $request->input('swapper'),
            'date' => $request->input('start_date'),
            'edate' => $request->input('end_date'),
            'right' => 'denial',
            'slug' => $slug
        ]);
        $leave = Swap::create([

            'swapper' => Auth::user()->id,
            'user_id' => $request->input('swapper'),
            'date' => $request->input('start_date'),
            'edate' => $request->input('end_date'),
            'right' => 'approval',
            'slug' => $slug,
        ]);

        if ($leave->save()) {
            return redirect()->route('user.swaps.index')->with('success', 'You\'r request sent successful. you\'ll be notified when approved');
        } else {
            return redirect()->back()->with('error', 'something went wrong, Please try again');
        }
    }

    public function show($id)
    {
        $leave = Swap::find($id);
        // dd($leave->day);
        $slug = Swap::where('slug', $leave->slug)->get();
        foreach ($slug as $swap) {
            $swap->status = "approved";
            $swap->save();
        }
        return redirect()->back()->with('success', 'request approved');
        // $leave->status = "approved";
        // $user = User::find($leave->user_id);

        // if ($leave->save()) {
            // return redirect()->back()->with('success', 'request approved');
        // } else {
        //     return redirect()->back()->with('error', 'something went wrong, Please try again');
        // }
        // }
        // }
        // echo $day;

    }

    public function edit($id)
    {
        // dd($id);
        $leave = Swap::find($id);

        $slug = Swap::where('slug', $leave->slug)->get();
        foreach ($slug as $swap) {
            $swap->status = "cancelled";
            $swap->save();
        }
        return redirect()->back()->with('success', 'request Cancelled');
        // $leave->status = "cancelled";
        // $user = User::find($leave->user_id);

        // if ($leave->save()) {
            // return redirect()->back()->with('success', 'request Cancelled');
        // } else {
            // return redirect()->back()->with('error', 'something went wrong, Please try again');
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Swap  $swap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($id);
        $leave = Swap::find($id);
        $leave->status = "cancelled";
        $user = User::find($leave->user_id);

        if ($leave->save()) {
            return redirect()->back()->with('success', 'request Cancelled');
        } else {
            return redirect()->back()->with('error', 'something went wrong, Please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Swap  $swap
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $leave = Swap::find($id);
        // dd($leave->day);
        $slug = Swap::where('slug', $leave->slug)->get();
        foreach ($slug as $swap) {
            $swap->delete();
        }

            return redirect()->route('user.swaps.index')->with('success', 'request deleted Successful');

    }
}
