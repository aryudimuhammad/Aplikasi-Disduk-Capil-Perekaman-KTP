    <!--Start sidebar-wrapper-->
    <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
        <div class="brand-logo">
            <a href="index.html">
                <img src="template/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                <h5 class="logo-text">Dashtreme Admin</h5>
            </a>
        </div>
        <div class="user-details">
            <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
                <div class="avatar"><img class="mr-3 side-user-img" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
                <div class="media-body">
                    <h6 class="side-user-name">{{Auth::user()->name}}</h6>
                </div>
            </div>
            <div id="user-dropdown" class="collapse">
                <ul class="user-setting-menu">
                    <li><a href="javaScript:void();"><i class="icon-user"></i> My Profile</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="icon-power mr-2"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="sidebar-header">Data Master</li>
            <li>
                <a href="{{route('userIndex')}}" class="waves-effect">
                    <i class="zmdi zmdi-accounts-list"></i> <span> Data Admin </span>
                </a>
            </li>

            <li class="sidebar-header">Setting</li>
            <li>
                <a href="javaScript:void();" class="waves-effect">
                    <i class="zmdi zmdi-widgets"></i> <span>User</span>
                    <i class="fa fa-angle-left float-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li><a href="widgets-static.html"><i class="zmdi zmdi-dot-circle-alt"></i> Static Widgets</a></li>
                    <li><a href="widgets-data.html"><i class="zmdi zmdi-dot-circle-alt"></i> Data Widgets</a></li>
                </ul>
            </li>
        </ul>

    </div>
    <!--End sidebar-wrapper-->
