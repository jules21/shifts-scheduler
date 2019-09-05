<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Shifts Sheduler | @yield('page-title')</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
      <link rel="icon shortcut" href="{{ asset('assets/img/logo2/image2.png') }}">
      <link href="{{ asset('dashboard/assets/css/main.css') }}" rel="stylesheet">
   </head>
   <body>
      <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
         @include('partials.navbar')
         <div class="app-main">
            @include('partials.sidebar')
            <div class="app-main__outer">
               <div class="app-main__inner">
                  <!-- page title -->
                  <div class="app-page-title">
                     <div class="page-title-wrapper">
                        <div class="page-title-heading">
                   
                        </div>
                     </div>
                  </div>
                  <!-- page content goes here -->
                  @yield('content')
               </div>
               <!-- footer  -->
               <div class="app-wrapper-footer">
                  <div class="app-footer bg-white">
                     <div class="">
                        <p class="text-center pt-2">&copy; copyright 2019 Done By Deo Ntwari</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="{{ asset('dashboard/assets/scripts/main.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
      <script src="{{ asset('js/custom.js') }}"></script>
      @yield('scripts')
   </body>
</html>