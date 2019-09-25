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
         @if (Auth::user()->role->name == 'manager')
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
                      <a href="{{ route('manager.employees.create') }}">
                      <i class="metismenu-icon"></i>
                      Add New Employee
                      </a>
                   </li>
                   <li>
                      <a href="{{ route('manager.employees.index') }}">
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
                      <a href="{{ route('manager.departments.create') }}">
                      <i class="metismenu-icon"></i>
                      Add New Department
                      </a>
                   </li>
                   <li>
                      <a href="{{ route('manager.departments.index') }}">
                      <i class="metismenu-icon"></i>show All
                      </a>
                   </li>

                </ul>
             </li>
             {{-- Position links --}}
             <li class="mm-active">
                <a href="#" aria-expanded="true">
                <i class="metismenu-icon pe-7s-diamond"></i>
                Department Posts
                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul class="mm-collapse mm-show" style="">
                   <li>
                      <a href="{{ route('manager.positions.create') }}">
                      <i class="metismenu-icon"></i>
                      Add Post
                      </a>
                   </li>
                   <li>
                      <a href="{{ route('manager.positions.index') }}">
                      <i class="metismenu-icon"></i>show All
                      </a>
                   </li>

                </ul>
             </li>
             {{-- Leave links --}}
             <li class="mm-active">
                <a href="{{ route('user.leaves.index') }}" aria-expanded="true">
                <i class="metismenu-icon pe-7s-diamond"></i>
                Leaves
                {{-- <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i> --}}
                </a>
             </li>
             {{-- Time table links --}}
             <li class="mm-active">
                    <a href="{{ route('manager.timetable') }}" aria-expanded="true">
                    <i class="metismenu-icon pe-7s-diamond"></i>
                    TimeTables
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse mm-show" style="">
                        <li>
                           <a href="{{ route('manager.calendary') }}">
                                 <i class="metismenu-icon"></i>
                                 timetable
                              </a>
                           </li>
                        <li>
                           <a href="{{ route('choose.department') }}">
                           <i class="metismenu-icon"></i>
                           Choose Department
                           </a>
                        </li>
                  
  
                  </ul>
                 </li>
          </ul>
         @else
         <ul class="vertical-nav-menu metismenu">
               <p class="text-center app-sidebar__heading " style="margin-bottom:-30px;">Dashboard</p>
             {{-- <li class="app-sidebar__heading">Dashboard</li> --}}
             <img src="{{ url('assets/img/logo2/image2.png') }}" alt="logo" class="img-fluid">
             {{-- profile links --}}
             <li class="mm-active">
                <a href="{{ route('manager.employees.show', Auth::user()->id) }}" aria-expanded="true" class="text-center">
                Profile 
                </a>
             </li>
             {{-- Timetable links --}}
             <li class="mm-active">
                <a href="{{ url('timetables') }}" aria-expanded="true">
                <i class="metismenu-icon pe-7s-diamond"></i>
                Shift Schedule
                </a>
             </li>

             {{-- Timetable links --}}
             {{-- <li class="mm-active">
                <a href="#" aria-expanded="true">
                <i class="metismenu-icon pe-7s-diamond"></i>
                Shift switching
                </a>
             </li> --}}

             {{-- Leave links --}}
             <li class="mm-active">
                  <a href="#" aria-expanded="true">
                  <i class="metismenu-icon pe-7s-diamond"></i>
                  Leave request
                  <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                  </a>
                  <ul class="mm-collapse mm-show" style="">
                     <li>
                        <a href="{{ route('user.leaves.create') }}">
                        <i class="metismenu-icon"></i>
                        make request
                        </a>
                     </li>
                     <li>
                        <a href="{{ route('user.leaves.index') }}">
                        <i class="metismenu-icon"></i>view leave status
                        </a>
                     </li>
  
                  </ul>
               </li>
               {{-- Switch Shift links --}}
               {{-- <li class="mm-active">
                     <a href="#" aria-expanded="true">
                     <i class="metismenu-icon pe-7s-diamond"></i>
                     switch shift request
                     <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                     </a>
                     <ul class="mm-collapse mm-show" style="">
                        <li>
                           <a href="{{ route('user.switch-shifts.create') }}">
                           <i class="metismenu-icon"></i>
                           make request
                           </a>
                        </li>
                        <li>
                           <a href="{{ route('user.switch-shifts.index') }}">
                           <i class="metismenu-icon"></i>view request status
                           </a>
                        </li>
   
                     </ul>
                  </li> --}}

          </ul>
        
         @endif
       </div>
    </div>
 </div>