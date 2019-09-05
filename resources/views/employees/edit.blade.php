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
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active"
                                id="details-tab"
                                data-toggle="tab"
                                href="#details"
                                role="tab"
                                aria-controls="home"
                                aria-selected="true">
                                Employee Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                id="authentication-tab"
                                data-toggle="tab"
                                href="#login-details"
                                role="tab"
                                aria-controls="home"
                                aria-selected="true">
                                Login Details
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-4" id="nav-tabContent">
                        <div class="tab-pane fade show active px-2" id="details" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form action="{{ route('manager.employees.update', $user->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                    @include('employees.partials.details')      
                        </div>
                        <div class="tab-pane fade px-2" id="login-details" role="tabpanel" aria-labelledby="nav-profile-tab">
                                @include('employees.partials.auth')
                            
                        </div>
                    </div>
                    @if ($edit)
                    <div class="col-md-12 mt-2">
                        <button type="submit" class="btn btn-primary" id="update-details-btn">
                            <i class="fa fa-refresh"></i>
                            @lang('app.update_details')
                        </button>
                    </div>
                @endif
                </div>
            </form>
            </div>
        </div>
    </div>
    

@endsection
@section('scripts')
@stop