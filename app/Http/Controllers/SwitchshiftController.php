<?php

namespace App\Http\Controllers;

use App\Leave;
use App\Switchshift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SwitchshiftController extends Controller
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
            return view('switchshift.index', compact('leaves'));
        }
        $leaves = Leave::where('user_id', Auth::user()->id)->get();
        return view('switchshift.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('switchshift.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Switchshift  $switchshift
     * @return \Illuminate\Http\Response
     */
    public function show(Switchshift $switchshift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Switchshift  $switchshift
     * @return \Illuminate\Http\Response
     */
    public function edit(Switchshift $switchshift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Switchshift  $switchshift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Switchshift $switchshift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Switchshift  $switchshift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Switchshift $switchshift)
    {
        //
    }
}
