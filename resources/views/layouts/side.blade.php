<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            @if(Auth::user()->role == 1)
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
                    <div class="sidebar-brand-text mx-3">CIHAUR <sup>Pamsimas</sup></div>
                </a>
            @else
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('user.dashboard')}}">
                    <div class="sidebar-brand-text mx-3">CIHAUR <sup>Pamsimas</sup></div>
                </a>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{Request::is('admin','user')? 'active':''}}">
                @if (Auth::user()->role == 1)
                    <a class="nav-link" href="{{route('admin.dashboard')}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                @endif
                @if (Auth::user()->role == 0)
                    <a class="nav-link" href="{{route('user.dashboard')}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                @endif
            </li>
        @can('admin')
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{Request::is('admin/show-User*')? 'active':''}}">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <em class="fas fa-users"></em>
                    <span>Pelanggan & Tagihan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pelanggan:</h6>
                        <a class="collapse-item" href="{{route('showUser')}}">Data Pelanggan</a>
                        {{-- <a class="collapse-item" href="{{route('addUser')}}">Input Data</a> --}}
                        <a class="collapse-item" href="{{route('block.index')}}">Data Pelanggan (Block)</a>
                        {{-- <a class="collapse-item" href="{{route('printUser')}}">Print Pelanggan</a> --}}
                        <a class="collapse-item" href="{{route('tunggakan')}}">Tunggakan</a>
                    </div>
                </div>
            </li>
            <li class="nav-item {{Request::is('admin/add-User')? 'active':''}}">
                <a class="nav-link" href="{{route('addUser')}}">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Pelanggan</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            {{-- <li class="nav-item {{Request::is('admin/tagihan/')? 'active':''}}">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <em class="far fa-clipboard"></em>
                    <span>Tagihan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tagihan</h6>
                        <a class="collapse-item">Tagihan</a>
                    </div>
                </div>
            </li> --}}
            <li class="nav-item {{Request::is('admin/block*')? 'active':''}}">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#block"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-th"></i>
                    <span>Block</span>
                </a>
                <div id="block" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Block</h6>
                        <a class="collapse-item" href="{{route('block.create')}}">Input Block</a>
                    </div>
                </div>
            </li>
            <li class="nav-item {{Request::is('admin/layanan*')? 'active':''}}">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#layanan"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="far fa-calendar-check"></i>
                    <span>Layanan</span>
                </a>
                <div id="layanan" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Layanan</h6>
                        {{-- <a class="collapse-item" href="{{route('layanan.create')}}">Input Layanan</a> --}}
                        <a class="collapse-item" href="{{route('layanan.index')}}">Show Layanan</a>
                    </div>
                </div>
            </li>
        @endcan
            <li class="nav-item">
                <a class="nav-link" href="{{route('superAdmin')}}" target="_blank">
                    <i class="fas fa-plus"></i>
                    <span>Super Admin</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('report')}}">
                    <i class="fas fa-folder"></i>
                    <span>Report</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>