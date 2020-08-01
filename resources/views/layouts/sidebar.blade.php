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
                <a href="{{route('pegawaiIndex')}}" style="font-size: 2px;" class="waves-effect"><i class="zmdi zmdi-accounts-list"></i> <span> Data Pegawai </span></a>
            </li>
            <li>
                <a href="{{route('pensiunIndex')}}" style="font-size: 2px;" class="waves-effect"><i class="zmdi zmdi-accounts-list"></i> <span> Data Pengusulan Pensiun </span></a>
            </li>
            <li>
                <a href="{{route('cutiIndex')}}" style="font-size: 2px;" class="waves-effect"><i class="zmdi zmdi-accounts-list"></i> <span> Data Pengusulan Cuti </span></a>
            </li>
            @if(auth()->user()->role == '1')
            <li>
                <a href="{{route('ktpIndex')}}" style="font-size: 2px;" class="waves-effect"><i class="zmdi zmdi-accounts-list"></i> <span> Data KTP </span></a>
            </li>


            <li class="sidebar-header">Kategori</li>
            <li>
                <a href="{{route('instansiIndex')}}" style="font-size: 2px;" class="waves-effect"><i class="zmdi zmdi-accounts-list"></i> <span> Instansi Kerja </span></a>
            </li>
            <li>
                <a href="{{route('unitIndex')}}" style="font-size: 2px;" class="waves-effect"><i class="zmdi zmdi-accounts-list"></i> <span> Unit Kerja </span></a>
            </li>
            <li>
                <a href="{{route('satuanIndex')}}" style="font-size: 2px;" class="waves-effect"><i class="zmdi zmdi-accounts-list"></i> <span> Satuan Kerja </span></a>
            </li>
            <li>
                <a href="{{route('golonganIndex')}}" style="font-size: 2px;" class="waves-effect"><i class="zmdi zmdi-accounts-list"></i> <span> Golongan Kerja </span></a>
            </li>
            <li>
                <a href="{{route('jabatanIndex')}}" style="font-size: 2px;" class="waves-effect"><i class="zmdi zmdi-accounts-list"></i> <span> Jabatan Kerja </span></a>
            </li>
            @endif
            @if(auth()->user()->role == '2')
            <li class="sidebar-header">Setting</li>
            <li>
                <a href="{{route('userIndex')}}" style="font-size: 2px;" class="waves-effect"><i class="zmdi zmdi-accounts-list"></i> <span> Data Admin </span></a>
            </li>
            @endif
        </ul>

    </div>
    <!--End sidebar-wrapper-->
