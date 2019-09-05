@extends('layouts.master')

@section('page-title', 'Employees')
@section('page-heading', $edit ? $department->name : 'New Employee')

@section('breadcrumbs')
/&nbsp;
    <li class="list-inline-item active">
            {{ $edit ? 'Edit' : 'Create' }}
    </li>
@endsection

@section('content')

<form action="{{ route('manager.employees.store') }}" method="post" class="mb-4">
    @csrf
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        @lang('app.user_details')
                    </h5>
                    <p class="text-muted font-weight-light">
                        A general user profile information.
                    </p>
                </div>
                <div class="col-md-9">
                    @include('employees.partials.details', ['edit' => false])
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        @lang('app.login_details')
                    </h5>
                    <p class="text-muted font-weight-light">
                        Details used for authenticating with the application.
                    </p>
                </div>
                <div class="col-md-9">
                    @include('employees.partials.auth', ['edit' => false])
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                @lang('app.create_user')
            </button>
        </div>
    </div>
</form>


    @endsection

@section('scripts')
{{-- <script src="{{ asset('js/custom.js') }}"></script> --}}
@stop