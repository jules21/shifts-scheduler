<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
       <div class="logo-src"></div>
       <div class="header__pane ml-auto">
          <div>
             <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
             <span class="hamburger-box">
             <span class="hamburger-inner"></span>
             </span>
             </button>
          </div>
       </div>
    </div>
    <div class="app-header__mobile-menu">
       <div>
          <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
          <span class="hamburger-box">
          <span class="hamburger-inner"></span>
          </span>
          </button>
       </div>
    </div>
    <div class="app-header__menu">
       <span>
       <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
       <span class="btn-icon-wrapper">
       <i class="fa fa-ellipsis-v fa-w-6"></i>
       </span>
       </button>
       </span>
    </div>
    <div class="scrollbar-sidebar ps">
       <div class="app-sidebar__inner">
          <ul class="vertical-nav-menu metismenu">
               <p class="text-center app-sidebar__heading " style="margin-bottom:-30px;">Dashboard</p>
             {{-- <li class="app-sidebar__heading">Dashboard</li> --}}
             <img src="{{ url('assets/img/logo2/image2.png') }}" alt="logo" class="img-fluid">
             {{-- Employee links --}}
             <li class="mm-active">
                <a href="#" aria-expanded="true">
                <i class="metismenu-icon pe-7s-diamond"></i>
                Employees
                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul class="mm-collapse mm-show" style="">
                   <li>
                      <a href="elements-buttons-standard.html">
                      <i class="metismenu-icon"></i>
                      Add New Employee
                      </a>
                   </li>
                   <li>
                      <a href="elements-dropdowns.html">
                      <i class="metismenu-icon"></i>show All
                      </a>
                   </li>

                </ul>
             </li>
             {{-- Departments links --}}
             <li class="mm-active">
                <a href="#" aria-expanded="true">
                <i class="metismenu-icon pe-7s-diamond"></i>
                Departments
                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul class="mm-collapse mm-show" style="">
                   <li>
                      <a href="elements-buttons-standard.html">
                      <i class="metismenu-icon"></i>
                      Add New Department
                      </a>
                   </li>
                   <li>
                      <a href="elements-dropdowns.html">
                      <i class="metismenu-icon"></i>show All
                      </a>
                   </li>

                </ul>
             </li>
             {{-- Time table links --}}
             <li class="mm-active">
                    <a href="#" aria-expanded="true">
                    <i class="metismenu-icon pe-7s-diamond"></i>
                    TimeTable
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse mm-show" style="">
                       <li>
                          <a href="elements-buttons-standard.html">
                          <i class="metismenu-icon"></i>
                          Add New Schedule
                          </a>
                       </li>
                       <li>
                          <a href="elements-dropdowns.html">
                          <i class="metismenu-icon"></i>show All
                          </a>
                       </li>
    
                    </ul>
                 </li>
          </ul>
       </div>
    </div>
 </div>