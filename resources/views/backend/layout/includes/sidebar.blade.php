 <!-- Left side column. contains the sidebar -->
 <aside class="main-sidebar">
     <!-- sidebar: style can be found in sidebar.less -->
     <section class="sidebar">
         <!-- Sidebar user panel -->
         <div class="user-panel">
             <div class="pull-left image">
                 <img src="{{asset('/profil-sekolah/logo4.png')}}" class="img-circle" alt="User Image">
             </div>
             <div class="pull-left info">
                 <p>{{strtoupper(auth()->user()->name)}}</p>

                 <a href="#"><i class="fa fa-circle text-success"></i> {{auth()->user()->role == 'calon_siswa' ? 'Calon Siswa' : (auth()->user()->role == 'siswa' ? 'Siswa' : (auth()->user()->role == 'admin' ? 'Admin' : 'Guru'))}}</a>
             </div>
         </div>

         <!-- sidebar menu: : style can be found in sidebar.less -->
         <ul class="sidebar-menu" data-widget="tree">
             <li class="header">MAIN NAVIGATION</li>
             @if($title == 'Dashboard')
             <li class="active">
                 @else
             <li class="">
                 @endif
                 <a href="{{route('dashboard')}}">
                     <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                 </a>
             </li>

             @if(auth()->user()->role == 'calon_siswa')
             @if($title == 'Biodata' || $title == 'Edit Biodata')
             <li class="active">
                 @else
             <li class="">
                 @endif
                 <a href="{{route('bio_data')}}">
                     <i class="fa fa-address-book"></i> <span>Biodata</span>
                 </a>
             </li>

             @if($title == 'Pengumuman' || $title == 'Calon Siswa Lulus')
             <li class="active">
                 @else
             <li class="">
                 @endif
                 <a href="{{route('pengumuman')}}">
                     <i class="fa fa-bullhorn"></i> <span>Pengumuman</span>
                 </a>
             </li>
             @endif


             @if(auth()->user()->role == 'admin')

             @if( $title == 'Siswa' || $title == 'Profil Siswa' || $title == 'Edit Data Siswa' || $title == 'Tambah Siswa' || $title == 'Calon Siswa' || $title == 'Edit Calon Siswa' || $title == 'Export Data Peserta')
             <li class="active treeview">
                 @else
             <li class="treeview">
                 @endif
                 <a href="#">
                     <i class="fa fa-user"></i> <span>Kesiswaan</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                 </a>
                 <ul class="treeview-menu">
                     @if($title == 'Calon Siswa' || $title == 'Edit Calon Siswa' || $title == 'Export Data Peserta')
                     <li class="active">
                         @else
                     <li class="">
                         @endif
                         <a href="{{route('calon_siswa')}}">
                             <i class="fa fa-circle-o"></i> Calon Siswa
                         </a>
                     </li>
                     @if($title == 'Siswa' || $title == 'Profil Siswa' || $title == 'Edit Data Siswa' || $title == 'Tambah Siswa')
                     <li class="active">
                         @else
                     <li>
                         @endif
                         <a href="{{route('siswa')}}">
                             <i class="fa fa-circle-o"></i> Siswa
                         </a>
                     </li>
                 </ul>
             </li>


             @if($title == 'Guru' || $title == 'Tambah Data Guru' || $title == 'Edit Data Guru')
             <li class="active">
                 @else
             <li class="">
                 @endif
                 <a href="{{route('guru')}}">
                     <i class="fa fa-users"></i> <span>Guru</span>
                 </a>
             </li>

             @if($title == 'Mata Pelajaran' || $title == 'Tambah Mata Pelajaran' || $title == 'Edit Mata Pelajaran')
             <li class="active">
                 @else
             <li class="">
                 @endif
                 <a href="{{route('mapel')}}">
                     <i class="fa fa-book"></i> <span>Mata Pelajaran</span>
                 </a>
             </li>

             @if($title == 'Postingan' || $title == 'Tambah Postingan' || $title == 'Edit Data Postingan')
             <li class="active">
                 @else
             <li class="">
                 @endif
                 <a href="{{route('posts')}}">
                     <i class="fa fa-credit-card"></i> <span>Postingan</span>
                 </a>
             </li>
             @endif

             @if(auth()->user()->role == 'siswa')
             @if($title == 'Profil Saya' || $title == 'Password Baru')
             <li class="active">
                 @else
             <li class="">
                 @endif
                 <a href="{{route('profil_saya')}}">
                     <i class="fa fa-user"></i> <span>Profil Saya</span>
                 </a>
             </li>

             @if($title == 'Nilai Siswa' || $title == 'Daftar Nilai Siswa')
             <li class="active">
                 @else
             <li class="">
                 @endif
                 <a href="{{route('nilai_siswa')}}">
                     <i class="fa fa-pencil"></i> <span>Nilai Siswa</span>
                 </a>
             </li>

             @if($title == 'Materi Pelajaran')
             <li class="active">
                 @else
             <li class="">
                 @endif
                 <a href="{{route('materi')}}">
                     <i class="fa fa-book"></i> <span>Materi Pelajaran</span>
                 </a>
             </li>
             @endif

             @if(auth()->user()->role == 'guru')
             @if($title == 'Profil Saya')
             <li class="active">
                 @else
             <li class="">
                 @endif
                 <a href="{{route('guru.profil_saya')}}">
                     <i class="fa fa-user"></i> <span>Profil Saya</span>
                 </a>
             </li>

             @if($title == 'Beri Nilai' || $title == 'Penilaian Siswa' || $title == 'Penilaian')
             <li class="active">
                 @else
             <li class="">
                 @endif
                 <a href="{{route('beri_nilai')}}">
                     <i class="fa fa-file"></i> <span>Beri Nilai</span>
                 </a>
             </li>

             @if($title == 'Materi Pelajaran' || $title == 'Edit Materi Pelajaran' || $title == 'Tambah Materi Pelajaran')
             <li class="active">
                 @else
             <li class="">
                 @endif
                 <a href="{{route('materi')}}">
                     <i class="fa fa-book"></i> <span>Materi Pelajaran</span>
                 </a>
             </li>
             @endif



         </ul>
     </section>
     <!-- /.sidebar -->
 </aside>