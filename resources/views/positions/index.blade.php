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
                               id="myInputTextField"
                               class="form-control input-solid"
                               name="search"
                               autocomplete="off" 
                               value="{{ Request::get('search') }}"
                               placeholder="Search position">

                            <span class="input-group-append">
                                @if (Request::has('search') && Request::get('search') != '')
                                    <a href="{{ route('manager.positions.index') }}"
                                           class="btn btn-light d-flex align-items-center text-muted"
                                           role="button">
                                        <i class="fas fa-times"></i>
                                    </a>
                                @endif
                                {{-- <button class="btn btn-light" type="submit" id="search-users-btn">
                                    <i class="fas fa-search text-muted"></i>
                                </button> --}}
                            </span>
                    </div>
                </div>
                <div class="col-md-2 mt-2 mt-md-0">
                        <!-- <select id="status" class="form-control input-solid" name="status"><option value="" selected="selected">All</option><option value="Active">Active</option><option value="Banned">Banned</option><option value="Unconfirmed">Unconfrimed</option></select> -->
                    </div>

                <div class="col-md-6">
                    <a href="{{ route('manager.positions.create') }}" class="btn btn-primary btn-rounded float-right">
                        <i class="fas fa-plus mr-2"></i>
                        Add position Post
                    </a>
                </div>
            </div>
        </form>

        <div class="table-responsive" id="users-table-wrapper">
            <table class="table table-striped table-borderless" id="myTable">
                <thead>
                <tr>
                    <th class="min-width-150">Departments</th>
                    <th>Department positions</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                    @if (count($positions))
                        @foreach ($positions as $position)
                            <tr>
                                <td>{{ $position->department->name }}</td>
                                <td>
                                    {{ $position->name }}
                                </td>
                                <td>
                                    {{ $position->description }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('manager.positions.edit', $position->id) }}" class="btn btn-icon"
                                       title="Edit position" data-toggle="tooltip" data-placement="top">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                                                   <!---->
<form action="{{ route('manager.positions.destroy', $position->id) }}" method="post" class="d-inline">
        @csrf
        <input name="_method" type="hidden" value="DELETE">
<button
title="Delete position"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                        class="btn btn-icon" type="submit" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
      </form>

<!---->
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4"><em>No records found</em></td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{ $positions->links() }}
        </div>
    </div>
</div>
@endsection
@section('scripts')
@stop