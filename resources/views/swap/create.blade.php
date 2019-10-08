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
                        <h5 class="card-title">Swap Form</h5>
                        <form action="{{ route('user.swaps.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="role">Employee</label>
                                <select class="form-control @error('employee_id') is-invalid @enderror" id="category" name="swapper" aria-invalid="false" aria-describedby="roles-error" required>
                                        <option value="" disabled selected>choose Employee</option>
                                        @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}"  {{ $edit && $employee->id == $user->employee_id ? 'selected' : '' }}> {{ $employee->username }}</option>
                                        @endforeach
                                </select>
                                @error('employee_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="col-6">
                                    <label for="start_date">Date(be replaced)</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" min="{{date('Y-m-d')}}" required>
                                </div>
                                <div class="col-6">
                                    <label for="end_date">Date(Date(payback)</label>
                                    <input type="date" name="end_date" id="end_date"  min="{{date('Y-m-d')}}" class="form-control" required>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label for="reason">reason</label>
                                <textarea name="description" id="reason"  class="form-control"></textarea>
                            </div> --}}
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </form>
                </div>
    </div>

@endsection
@section('scripts')
@stop