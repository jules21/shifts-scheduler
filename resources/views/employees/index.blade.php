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

<div class="card">
        <div class="card-body">
    
            <form action="" method="GET" id="users-form" class="pb-2 mb-3 border-bottom-light">
                <div class="row my-3 flex-md-row flex-column-reverse">
                    <div class="col-md-4 mt-md-0 mt-2">
                        <div class="input-group custom-search-form">
                            <input type="text"
                                   class="form-control input-solid"
                                   name="search"
                                   value="{{ Request::get('search') }}"
                                   placeholder="@lang('app.search_for_users')">
    
                                <span class="input-group-append">
                                    @if (Request::has('search') && Request::get('search') != '')
                                        <a href="{{ route('manager.employees.index') }}"
                                               class="btn btn-light d-flex align-items-center text-muted"
                                               role="button">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    @endif
                                    <button class="btn btn-light" type="submit" id="search-users-btn">
                                        <i class="fas fa-search text-muted"></i>
                                    </button>
                                </span>
                        </div>
                    </div>
    
                    <div class="col-md-2 mt-2 mt-md-0">

                    </div>
    
                    <div class="col-md-6">
                        <a href="{{ route('manager.employees.create') }}" class="btn btn-primary btn-rounded float-right">
                            <i class="fas fa-plus mr-2"></i>
                            @lang('app.add_user')
                        </a>
                    </div>
                </div>
            </form>
    
            <div class="table-responsive" id="users-table-wrapper">
                <table class="table table-borderless table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th class="min-width-80">@lang('app.username')</th>
                        <th class="min-width-150">@lang('app.full_name')</th>
                        <th class="min-width-100">@lang('app.email')</th>
                        <th class="min-width-80">@lang('app.registration_date')</th>
                        <th class="min-width-80">@lang('Department')</th>
                        <th class="min-width-80">@lang('Post[title]')</th>
                        <th class="text-center min-width-150">@lang('app.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if (count($users))
                            @foreach ($users as $user)
                                @include('employees.partials.row')
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7"><em>@lang('app.no_records_found')</em></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
@stop