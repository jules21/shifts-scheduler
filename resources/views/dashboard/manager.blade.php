@extends('layouts.master')

@section('page-title', trans('app.dashboard'))
@section('page-heading', trans('app.dashboard'))

@section('breadcrumbs')
    <li class="list-inline-item active">
        @lang('app.dashboard')
    </li>
@endsection
@section('subtitle')
<div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                        <i class="metismenu-icon pe-7s-display2"></i>
                </i>
            </div>
            <div>Manager Dashboard
                <div class="page-title-subheading">This is Manager dashboard To Manager and control system.
                </div>
            </div>
        </div>
       
    </div>
@endsection

@section('content')
<div class="row">
    {{-- employees --}}
        <div class="col-xl-4 col-md-6 mt-2">
            <div class="card widget-content bg-midnight-bloom">
                <div class="card-body mini-stat-img">
                        <div class="font-icon-wrapper font-icon-lg"><i class="pe-7s-users icon-gradient bg-night-fade"> </i></div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3">Total Employees</h6>
                        <h4 class="mb-4">{{count($employees)}}</h4>
                        
                    </div>
                </div>
            </div>
        </div>
        
    {{-- department --}}
        <div class="col-xl-4 col-md-6 mt-2">
            <div class="card widget-content bg-arielle-smile">
                <div class="card-body mini-stat-img">
                        <div class="font-icon-wrapper font-icon-lg"><i class="pe-7s-albums icon-gradient bg-night-fade"> </i></div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3">Total departments</h6>
                        <h4 class="mb-4">{{count($departments)}}</h4>
                        
                    </div>
                </div>
            </div>
        </div>
    {{-- employees --}}
        <div class="col-xl-4 col-md-6 mt-2">
            <div class="card widget-content bg-grow-early">
                <div class="card-body mini-stat-img">
                        <div class="font-icon-wrapper font-icon-lg"><i class="pe-7s-news-paper icon-gradient bg-night-fade"> </i></div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3">Total Department Position</h6>
                        <h4 class="mb-4">{{count($positions)}}</h4>
                        
                    </div>
                </div>
            </div>
        </div>
 

    </div>
@endsection

@section('scripts')
@stop