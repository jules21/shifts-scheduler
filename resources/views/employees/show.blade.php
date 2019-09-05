@extends('layouts.master')

@section('page-title', trans('app.dashboard'))
@section('page-heading', trans('app.dashboard'))

@section('breadcrumbs')
    <li class="list-inline-item active">
        @lang('app.dashboard')
    </li>
@endsection

@section('content')

@include('partials.messages')
<div class="row">
        <div class="col-lg-5 col-xl-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        @lang('app.details')
    
                        <small class="float-right">
                            <a href="{{ route('manager.employees.edit', $user->id) }}" class="edit"
                               data-toggle="tooltip" data-placement="top" title="@lang('app.edit_user')">
                                @lang('app.edit')
                            </a>
                        </small>
                    </h5>
    
                    <div class="d-flex align-items-center flex-column pt-3">
                        <div>
                            <img class="rounded-circle img-thumbnail img-responsive mb-4"
                                 width="130"
                                 {{-- height="130" src="{{ $user->present()->avatar }}" --}}
                                 height="130" src="{{ asset('assets/img/profile.png') }}"
                                 
                                 alt="no image">
                        </div>
    
                        <h5>mr manager</h5>

                        <a href="mailto:{{ $user->email }}" class="text-muted font-weight-light mb-2">
                            {{ $user->email }}
                        </a>
                    </div>
    
                    <ul class="list-group list-group-flush mt-3">
                        @if ($user->phone)
                            <li class="list-group-item">
                                <strong>@lang('app.phone'):</strong>
                                <a href="telto:{{ $user->phone }}">{{ $user->phone }}</a>
                            </li>
                        @endif
                        <li class="list-group-item">
                            <strong>@lang('app.birth'):</strong>
                            {{ $user->birthday }}
                        </li>
                        <li class="list-group-item">
                            <strong>@lang('app.address'):</strong>
                            {{ $user->address }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    
        <div class="col-lg-7 col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        more info

                    </h5>
    

                        <table class="table table-borderless table-striped">
                            <thead>
                            <tr>
                                <th>Department</th>
                                <th>position</th>
                                <th>registration date</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $user->department->name }}</td>
                                    <td>{{ $user->position->name }}</td>
                                    <td class="align-middle">{{ $user->created_at->format(config('app.date_format')) }}</td>
                                </tr>
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@stop