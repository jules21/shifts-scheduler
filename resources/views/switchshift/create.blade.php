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
            <div>Request For Leave
                <div class="page-title-subheading">
                </div>
                
            </div>
        </div>
       
    </div>
@endsection
@section('content')

@include('partials.messages')

    <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-body">
                        <h5 class="card-title">Leave Form</h5>
                        <form action="{{ route('user.leaves.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="day" id="date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="reason">reason</label>
                                <textarea name="description" id="reason"  class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </form>
                </div>
    </div>

@endsection
@section('scripts')
@stop