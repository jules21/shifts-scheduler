<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta http-equiv="Content-Language" content="en">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>Shifts Sheduler |</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
      <meta name="description" content="This is an example dashboard created using build-in elements and components.">
      <meta name="msapplication-tap-highlight" content="no">
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
                           <div class="page-title-icon">
                              <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
                           </div>
                           <div>
                              Analytics Dashboard
                              <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                              </div>
                           </div>
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
   </body>
</html>