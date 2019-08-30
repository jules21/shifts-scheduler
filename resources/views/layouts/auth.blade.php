<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page-title') - {{ config('app.name') }}</title>
    <link rel="icon shortcut" href="{{ asset('assets/img/logo2/image2.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">

    @yield('header-scripts')
</head>
<body class="auth">

    <div class="container">
        @yield('content')
    </div>
    
    <script src="{{ asset('assets/js/vendor.js') }}"></script>
    <script src="{{ asset('assets/js/as/app.js') }}"></script>
    <script src="{{ asset('assets/js/as/btn.js') }}"></script>
    @yield('scripts')
</body>
</html>
