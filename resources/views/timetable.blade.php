@extends('layouts.master')

@section('page-title', trans('Admin Dashboard'))
@section('page-heading', trans('Admin Dashboard'))

@section('breadcrumbs')
    <li class="list-inline-item active">
        @lang('Admin Dashboard')
    </li>
@endsection

@section('content')

@include('partials.messages')
<a href="{{ route('manager.timetable')}}" class="btn btn-block btn-dark mb-4">Re-generate</a>
<div class="card">
    
        <div class="card-body">
            
                {{-- <h1 class="display-3 text-center">If You're reading This <br> You're Too Late.</h1> --}}
                {{-- <table class="table table-bordered table-hover table-striped"> --}}
                <table class="table table-striped table-bordered table-condensed table-hover">
                        <H1 class="text-center p-4">2019 Schedule</H1>
                    <thead> 
                        <tr>
                                <th>Employee</th>
                                <th>mon</th>
                                <th>Tue</th>
                                <th>Wed</th>
                                <th>Thur</th>
                                <th>Fri</th>
                                <th>Sat</th>
                                <th>Sun</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shifts as $timetable)
                            <tr>
                                <td> {{$timetable->user['username']}} </td>
                                <td> {{$timetable->day1}} </td>
                                <td> {{$timetable->day2}} </td>
                                <td> {{$timetable->day3}} </td>
                                <td> {{$timetable->day4}} </td>
                                <td> {{$timetable->day5}} </td>
                                <td> {{$timetable->day6}} </td>
                                <td> {{$timetable->day7}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>

@endsection
@section('scripts')
@stop