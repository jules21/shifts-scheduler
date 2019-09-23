@extends('layouts.master')

@section('page-title', trans('Admin Dashboard'))
@section('page-heading', trans('Admin Dashboard'))

@section('breadcrumbs')
    <li class="list-inline-item active">
        @lang('Admin Dashboard')
    </li>
@endsection
@section('subtitle')
<div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                        <i class="metismenu-icon pe-7s-display2"></i>
                </i>
            </div>
            <div>
                @if (Auth::user()->role_id ==1)
                    Manager
            @endif Dashboard
                <div class="page-title-subheading">
                        <p>
                                M stands for morning |    E stands for evening |    N stands for noon
                            </p>
                </div>
                
            </div>
        </div>
       
    </div>
@endsection
@section('content')

@include('partials.messages')
{{-- <a href="{{ route('manager.timetable')}}" class="btn btn-block btn-dark mb-4">Re-generate</a> --}}

<div class="card">
    
        <div class="card-body">
            
                {{-- Create the table tag opener and day headers --}}
                <table class="table table-bordered table-hover table-striped">
                    <H1 class='text-center p-4'>2019 Schedule</H1>
                     {{-- Create the calendar headers --}}
                        <thead>
                            <tr>
                                @foreach ($daysOfWeek as $day)
                                <th class='header'>{{$day}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            @if ($dayOfWeek > 0)
                            <td colspan='$dayOfWeek'>&nbsp;</td>
                            @endif
                        </tbody>
                        @php
                            $calendar = "";

                            // The variable $dayOfWeek is used to
                            // ensure that the calendar
                            // display consists of exactly 7 columns.

                            if ($dayOfWeek > 0) {
                                $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>";
                            }

                            $month = str_pad($month, 2, "0", STR_PAD_LEFT);

                            while ($currentDay <= $numberDays) {

                                // Seventh column (Saturday) reached. Start a new row.

                                if ($dayOfWeek == 7) {

                                    $dayOfWeek = 0;
                                    $calendar .= "</tr><tr>";

                                }

                                $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);

                                $date = "$year-$month-$currentDayRel";
                                $days = $dayOfWeek + 1;

                                $calendar .= "<td class='day' rel='$date'>";
                                $calendar .="<strong>" .$currentDay . "</strong><br>";

                                // start here
                                // $data = \App\Calendar::all();
                                // $result = $data->groupBy('day')->toArray();

                                // foreach ($result as $id => $days) {

                                // foreach ($days as $pid => $day) {
                                //     $curDay = $day['day'];
                                //     $workers = \App\Calendar::select('worker')->where('day', $curDay)->distinct()->get()->toArray();

                                //     foreach ($workers as $worker) {
                                //         $work;
                                //         $shift;

                                //         $shifts = \App\Calendar::select('shift')->where('worker', $worker)->where('day', $curDay)->distinct()->get()->toArray();

                                //         foreach ($worker as  $w) {
                                //         $work = $w;
                                //         }
                                //         foreach ($shifts as  $wo) {
                                //             foreach ($wo as  $ww) {
                                //             $shift = $ww;
                                //             }
                                //         }
                                //         $calendar .= $shift  . " : " . $work . "<br>";
                                //     }

                                // }
                                // }
                                $workers = \App\Calendar::select('worker')->where('day', $currentDay)->get()->toArray();
                                foreach ($workers as $worker) 
                                {
                                    $shifts = \App\Calendar::select('shift')->where('worker', $worker)->where('day', $currentDay)->get()->toArray();
                                    foreach ($shifts as  $shift) 
                                    {
                                        // echo $worker['worker'].":".$shift['shift']."<br>";
                                        // $calendar .= $worker['worker'] . " : " . $shift['shift'] . "<br>";
                                        // $calendar .=\App\User::find($worker['worker'])->username. " : " . \App\Shift::find($shift['shift'])->abbr . "<br>";
                                        $calendar .=\App\Shift::find($shift['shift'])->abbr. " : " . \App\User::find($worker['worker'])->username . "<br>";
                                    }
                                }
                                // end here
                                
                                // foreach ($array as $row) {
                                    
                                //     $calendar .= \App\Shift::find($row['day' . $days])->abbr  . " : " . $row->user->username . "<br>";
                                // }
                                $calendar .= "</td>";

                                // Increment counters

                                $currentDay++;
                                $dayOfWeek++;
                                // break;

                                }

                                // Complete the row of the last week in month, if necessary

                                if ($dayOfWeek != 7) {

                                    $remainingDays = 7 - $dayOfWeek;
                                    $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>";

                                }

                                $calendar .= "</tr>";

                                $calendar .= "</table>";

                                echo $calendar;

                        @endphp
        </div>
    </div>

@endsection
@section('scripts')
@stop
{{-- $data = \App\Calendar::select('day')->distinct()->get()->toArray();
foreach ($data as $days) 
{
    $curDay = $days['day'];
        echo $days['day']."<br>";
    $workers = \App\Calendar::select('worker')->where('day', $curDay)->get()->toArray();
    foreach ($workers as $worker) 
    {
        $shifts = \App\Calendar::select('shift')->where('worker', $worker)->where('day', $curDay)->get()->toArray();
        foreach ($shifts as  $shift) 
        {
            echo $worker['worker'].":".$shift['shift']."<br>";
        }
    }
} --}}