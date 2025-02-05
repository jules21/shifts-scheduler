@extends('layouts.auth')

@section('page-title', trans('app.login'))

@section('content')

<div class="col-md-8 col-lg-6 col-xl-5 mx-auto " id="login">
    <div class="text-center">
        <img src="{{ url('assets/img/logo2/image2.png') }}" alt="{{ config('app.name') }}" height="200">
    </div>

    <div class="card ">
        <div class="card-body">
            <div class="p-4">
                @include('partials.messages')

                    <form method="POST" action="{{ route('login') }}"  class="mt-3">
                        @csrf
                    <div class="form-group">
                        <label for="username" class="sr-only">E-mail or username</label>

                        <input id="email" type="login" class="form-control {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" name="login" value="{{ old('username') ?: old('email') }}" placeholder="E-mail or username" required autocomplete="email" autofocus>

                            @if ($errors->has('username') || $errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                </span>
                                @endif
                        </div>
                       
                    <div class="form-group password-field">
                        <label for="password" class="sr-only">Password</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                       
                    </div>
                    <div class="custom-control custom-checkbox">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="btn-login">
                            @lang('app.log_in')
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="text-center text-muted">
        Select another option <a class="font-weight-bold" href="<?= url("/") ?>">Select</a>
    </div>

</div>

@stop

@section('scripts')
<script src="{{ asset('assets/js/as/login.js') }} "></script>
@stop

