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
            <!---Notif --->
            @if(auth()->user()->role == 1)
            <li class="nav-item dropdown-lg">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();" aria-expanded="false">
                    <i class="fa fa-id-card"></i>
                    @if(totalktpnotif() > 0)
                    <span class="badge badge-danger badge-up">{{totalktpnotif()}}</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="javaScript:void();">
                                <div class="media">
                                    <i class="zmdi zmdi-account-box fa-2x mr-3 text-danger"></i>
                                    <div class="media-body">
                                        <h6 class="mt-0 msg-title"> <a href="{{route('ktpIndex')}}">Pendaftaran KTP</a> </h6>
                                        @if(totalktpnotif() > 0)
                                        <p class="msg-danger">{{totalktpnotif()}} Data Perlu Dikonfirmasi</p>
                                        @else
                                        <p class="msg-danger">Tidak Ada Data yang Perlu Dikonfirmasi</p>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item dropdown-lg">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();" aria-expanded="false">
                    <i class="fa fa-window-close"></i>
                    @if(totalpensiunnotif() > 0)
                    <span class="badge badge-danger badge-up">{{totalpensiunnotif()}}</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="javaScript:void();">
                                <div class="media">
                                    <i class="zmdi zmdi-calendar-close fa-2x mr-3 text-danger"></i>
                                    <div class="media-body">
                                        <h6 class="mt-0 msg-title"> <a href="{{route('pensiunIndex')}}">Pengusulan Pensiun</a> </h6>
                                        @if(totalpensiunnotif() > 0) <p class="msg-danger">{{totalpensiunnotif()}} Data Perlu Dikonfirmasi</p>
                                        @else
                                        <p class="msg-danger">Tidak Ada Data yang Perlu Dikonfirmasi</p>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item dropdown-lg">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();" aria-expanded="false">
                    <i class="fa fa-calendar"></i>
                    @if(totalcutinotif() > 0)
                    <span class="badge badge-danger badge-up">{{totalcutinotif()}}</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="javaScript:void();">
                                <div class="media">
                                    <i class="zmdi zmdi-calendar-note fa-2x mr-3 text-danger"></i>
                                    <div class="media-body">
                                        <h6 class="mt-0 msg-title"><a href="{{route('cutiIndex')}}">Pengusulan Cuti</a></h6>
                                        @if(totalcutinotif() > 0) <p class="msg-danger">{{totalcutinotif()}} Data Perlu Dikonfirmasi</p>
                                        @else
                                        <p class="msg-danger">Tidak Ada Data yang Perlu Dikonfirmasi</p>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item dropdown-lg">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();" aria-expanded="false">
                    <i class="fa fa-undo"></i>
                    @if(totalperpanjangnotif() > 0)
                    <span class="badge badge-danger badge-up">{{totalperpanjangnotif()}}</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="javaScript:void();">
                                <div class="media">
                                    <i class="zmdi zmdi-time-restore-setting fa-2x mr-3 text-danger"></i>
                                    <div class="media-body">
                                        <h6 class="mt-0 msg-title"><a href="route('perpanjangIndex')">Perpanjang Masa Cuti</a></h6>
                                        @if(totalperpanjangnotif() > 0) <p class="msg-danger">{{totalperpanjangnotif()}} Data Perlu Dikonfirmasi</p>
                                        @else
                                        <p class="msg-danger">Tidak Ada Data yang Perlu Dikonfirmasi</p>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif

            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                    <span class="user-profile"><img @if(auth()->user()->foto == null ) src="{{url('foto/default.png')}}" @else src="{{ url('foto/'.Auth::user()->foto.'')}}" @endif class="img-circle" ></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item user-details">
                        <a href="{{route('profileIndex')}}">
                            <div class="media">
                                <div class="avatar">
                                    @if(auth()->user()->foto == null)
                                    <img class="align-self-start mr-3" src="{{ url('foto/default.png')}}">
                                    @else
                                    <img class="align-self-start mr-3" src="{{ url('foto/'.Auth::user()->foto.'')}}">
                                    @endif
                                </div>
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
