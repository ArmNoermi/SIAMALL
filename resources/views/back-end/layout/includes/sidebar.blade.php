<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="/back-end/dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">MA AL-AZHAR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-2 pb-2 mb-3 d-flex">
            <div class="image">
                <img src="{{auth()->user()->getPhoto()}}" height="10px" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{strtoupper(auth()->user()->name)}}</a>

            </div>
            <div class="info">
                @if(auth()->user()->role == 'calon_siswa' )
                <a href="#"></a>
                @else
                <a href="#" class="d-block">{{ucfirst(auth()->user()->role)}}</a>
                @endif
            </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">MENU-MENU</li>
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/bio-data" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Biodata</p>
                    </a>
                </li>

                @if(auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a href="/calon-siswa" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Calon Siswa</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/siswa" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Siswa</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/guru" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Guru</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/mapel" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Mata Pelajaran</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/posts" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Posting</p>
                    </a>
                </li>


                @endif

                @if(auth()->user()->role == 'siswa')
                <li class="nav-item">
                    <a href="/nilai-siswa" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Nilai Siswa</p>
                    </a>
                </li>
                @endif

                @if(auth()->user()->role == 'guru')
                <li class="nav-item">
                    <a href="/beri-nilai" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Beri Nilai</p>
                    </a>
                </li>
                @endif




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>