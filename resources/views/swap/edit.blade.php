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
                        <h5 class="card-title">Leave Response</h5>
                        <h3 class="display-4">Canceled</h3>
                        <form action="{{ route('user.leaves.update', $leave->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="user_id" value="{{$leave->user_id}} ">
                            <div class="form-group">
                                <label for="reason">reason</label>
                                <textarea name="description" id="reason"  class="form-control">
                                    
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </form>
                </div>
    </div>

@endsection
@section('scripts')
@stop