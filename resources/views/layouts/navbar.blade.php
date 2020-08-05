<header class="topbar-nav">
    <nav id="header-setting" class="navbar navbar-expand fixed-top">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu" href="javascript:void();">
                    <i class="icon-menu menu-icon"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                    <span class="user-profile"><img @if(auth()->user()->foto == null ) src="{{url('foto/default.png')}}" @else src="foto/{{auth()->user()->foto}}" @endif class="img-circle" ></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item user-details">
                        <a href="{{route('profileIndex')}}">
                            <div class="media">
                                <div class="avatar"><img class="align-self-start mr-3" @if(auth()->user()->foto == null ) src="{{url('foto/default.png')}}" @else src="foto/{{auth()->user()->foto}}" @endif ></div>
                                <div class="media-body">
                                    <h6 class="mt-2 user-title">{{Auth()->user()->name}}</h6>
                                    <p class="user-subtitle">{{Auth::user()->email}}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item"><i class="icon-user mr-2" style="color: blue;"></i> <a href="{{route('profileIndex')}}">Account</a> </li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="icon-power mr-2" style="color: blue;"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
