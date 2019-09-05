<div class="app-header header-shadow">
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
    <div class="app-header__content">
       {{-- app header left --}}
       <div class="row ml-2">
            <div class="col-lg-12 d-flex align-items-center py-3">
                <h4 class="page-header mb-0">
                    @yield('page-heading')  
                </h4>
                &nbsp; |  &nbsp;
                <ol class="list-inline mb-0 font-weight-light">
                    &nbsp;
                    <li class="list-inline-item">
                        <a href="{{ url('/') }}" class="text-muted">
                            <i class="fa fa-home"></i>
                        </a>
                        / &nbsp;  home
                    </li> 
                    
                    @yield('breadcrumbs') 
                </ol>
            </div>
        </div>
       {{-- app header left  end here!--}}
       <div class="app-header-right">
          <!-- user profile  -->
          <div class="header-btn-lg pr-0">
             <div class="widget-content p-0">
                <div class="widget-content-wrapper">
                   <div class="widget-content-left">
                      <div class="btn-group">
                         <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                         <img width="42" class="rounded-circle" src="{{ asset('assets/img/profile.png') }}" alt="">
                         <i class="fa fa-angle-down ml-2 opacity-8"></i>
                         </a>
                         <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('manager.employees.show', Auth::user()->id) }}" tabindex="0" class="dropdown-item">User Profile</a>
                            <div tabindex="-1" class="dropdown-divider"></div>
                            <a tabindex="0" href="{{ route('logout') }}" class="dropdown-item"onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                           </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>
                         </div>
                      </div>
                   </div>
                   <div class="widget-content-left  ml-3 header-user-info">
                      <div class="widget-heading">
                         Mr 
                         {{Auth::user()->username}}
                      </div>
                      <div class="widget-subheading">
                         @auth
                             {{Auth::user()->role->name}}
                         @endauth
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
