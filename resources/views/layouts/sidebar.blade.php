    <!--Start sidebar-wrapper-->
    <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
        <div class="brand-logo">
            <a href="index.html">
                <img src="{{url('images/logo.gif')}}" width="10px;" height="40px;" class="logo-icon" alt="logo icon">
                <h5 class="logo-text">Disdukcapil</h5>
            </a>
        </div>
        <div class="user-details">
            <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
                @if(auth()->user()->foto == null)
                <div class="avatar"><img class="mr-3 side-user-img" src="{{url('foto/default.png')}}" class="img-circle"></div>
                @else
                <div class="avatar"><img class="mr-3 side-user-img" src="{{ url('foto/'.Auth::user()->foto.'')}}" class="img-circle"></div>
                @endif
                <div class="media-body">
                    <h6 class="side-user-name">{{Auth::user()->name}}</h6>
                </div>
            </div>
            <div id="user-dropdown" class="collapse">
                <ul class="user-setting-menu">
                    <li><a href="{{route('profileIndex')}}"><i class="icon-user"></i> My Profile</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="icon-power mr-2"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="sidebar-header">Dashboard</li>
            <li>
                <a href="{{route('home')}}" style="font-size: 2px;" class="waves-effect"><i class="zmdi zmdi-view-list-alt"></i> <span> Dashboard </span></a>
            </li>
            <li class="sidebar-header">Data Master</li>
            @if(auth()->user()->role == '1')
            <li>
                <a href="{{route('pegawaiIndex')}}" style="font-size: 2px;" class="waves-effect"><i class="zmdi zmdi-accounts-list"></i> <span> Data Pegawai </span></a>
            </li>
            <li>
                <a href="{{route('ktpIndex')}}" style="font-size: 2px;" class="waves-effect"><i class="zmdi zmdi-account-box"></i> <span> Data Pendaftaran KTP </span></a>
            </li>
            @endif
            <li>
                <a href="{{route('pensiunIndex')}}" style="font-size: 2px;" class="waves-effect"><i class="zmdi zmdi-calendar-close"></i> <span> Pengusulan Pensiun </span></a>
            </li>
            <li>
                <a href="{{route('cutiIndex')}}" style="font-size: 2px;" class="waves-effect"><i class="zmdi zmdi-calendar-note"></i><span> Pengusulan Cuti </span></a>
            </li>
            <li>
                <a href="{{route('perpanjangIndex')}}" style="font-size: 2px;" class="waves-effect"><i class="zmdi zmdi-time-restore-setting"></i><span> Perpanjang Masa Cuti </span></a>
            </li>
            @if(auth()->user()->role == '1')
            <li class="">
                <a href="javaScript:void();" class="waves-effect">
                    <i class="zmdi zmdi-layers"></i> <span>Kategori</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu menu-open" style="display: none;">
                    <li><a href="{{route('instansiIndex')}}"><i class="zmdi zmdi-dot-circle-alt"></i> Instansi</a></li>
                    <li><a href="{{route('unitIndex')}}"><i class="zmdi zmdi-dot-circle-alt"></i> Unit Kerja</a></li>
                    <li><a href="{{route('satuanIndex')}}"><i class="zmdi zmdi-dot-circle-alt"></i> Satuan Kerja</a></li>
                    <li><a href="{{route('golonganIndex')}}"><i class="zmdi zmdi-dot-circle-alt"></i> Golongan</a></li>
                    <li><a href="{{route('jabatanIndex')}}"><i class="zmdi zmdi-dot-circle-alt"></i> Jabatan</a></li>
                </ul>
            </li>
            @endif
            <li class="sidebar-header">Setting</li>
            <li><a href="{{ route('profileIndex') }}"><i class="zmdi zmdi-settings"> </i> Setting</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="zmdi zmdi-power-setting"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>

    </div>
    <!--End sidebar-wrapper-->
