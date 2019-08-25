@extends('layouts.auth')

@section('page-title', trans('app.login'))

@section('content')

<div class="col-md-8 col-lg-6 col-xl-5 mx-auto mt-4" id="login">
    <div class="text-center">
        <img src="{{ url('assets/img/app-logo.png') }}" alt="{{ config('app.name') }}" height="50" class="mb-5">
    </div>
    <div class="row">
        <div class="col-sm-8">
            
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('login') }}" class="text-center no-decoration">
                        <div class="icon my-1">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                        <p class="lead mb-0">Staff Login</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('login') }}" class="text-center no-decoration">
                        <div class="icon my-1">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                        <p class="lead mb-0">Employee Login</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="jumbotron jumbotron-fluid card" style="background-color:white">
  <div class="container text-center">
    <h1 class="display-4" style="color: #179970;">EMPLOYEE SHIFTS SCHEDULER SYSTEM</h1>

  </div>
</div>
@stop

@section('scripts')
@stop