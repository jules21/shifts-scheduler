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
            <div>Manager Dashboard
                <div class="page-title-subheading">This is Manager dashboard To Manager and control system.
                </div>
                
            </div>
        </div>
       
    </div>
@endsection
@section('content')

@include('partials.messages')
    <form action="{{ route('gentimetable') }}" method="POST">
        @csrf
            <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="role">Department</label>
                            <select class="form-control @error('department_id') is-invalid @enderror" id="category" name="department_id" aria-invalid="false" aria-describedby="roles-error" required>
                                    <option value="" disabled selected>choose Departments</option>
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"  {{ $edit && $department->id == $user->department_id ? 'selected' : '' }}> {{ $department->name }}</option>
                                    @endforeach
                            </select>
                            @error('department_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                      
                    </div>
                
                    <div class="col-md-4">         
                        <div class="form-group">
                            <label for="status">Post[position]</label>
                            <select class="form-control @error('position_id') is-invalid @enderror" id="membership" name="position_id" required>
                                    <option value="" disabled selected> assign position</option>
                                    @foreach ($positions as $position)
                                    <option value="{{ $position->id }}"  {{ $edit && $position->id == $user->position_id ? 'selected' : '' }}> {{ $position->name }}</option>
                                    @endforeach
                            </select>
                            @error('deparment_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                  
                    </div>
                    <div class="col-md-4 mt-4">
                        <button type="submit" class="btn btn-dark">generate</button>
                    </div>
                </div>
    </form>

@endsection
@section('scripts')
@stop