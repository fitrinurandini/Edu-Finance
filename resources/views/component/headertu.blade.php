<style>
    .nav-link i {
    transition: transform 0.3s;
}

.nav-link:hover i {
    transform: scale(1.2); /* Membesarkan ikon saat hover */
}

</style>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-tie fa-2x"></i> <!-- Mengganti ikon menjadi lebih besar -->
        </div>
        <div class="sidebar-brand-text mx-3" style="font-size: 1.10rem;">Tata Usaha <sup>Online</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('trainer') ? 'active' : '' }}">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('trainer') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('students') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pokok</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ Request::is('trainer') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('pagu_tahunans') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pagu Tahunan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Tambah Materi -->
    <li class="nav-item {{ Request::is('Trainer/TambahMateri*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('tata_usaha.create') }}">
            <i class="fas fa-fw fa-plus-circle"></i>
            <span>Tambah Pembayaran</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    
    <!-- Nav Item - Pengguna Kelas -->
    <li class="nav-item {{ Request::is('trainer/penggunakelas*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('tata_usaha.index') }}">
            <i class="fas fa-chalkboard-teacher mr-2"></i> <!-- Mengganti dengan ikon 'users' -->
            <span>Data Pembayaran</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

     <!-- Nav Item - Pengguna Kelas -->
     <li class="nav-item {{ Request::is('trainer/penggunakelas*') ? 'active' : '' }}">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-table"></i> <!-- Mengganti dengan ikon 'users' -->
            <span>Laporan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

     <!-- Nav Item - Pengguna Kelas -->
     <li class="nav-item {{ Request::is('trainer/penggunakelas*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i> <!-- Mengganti dengan ikon 'users' -->
            <span>Logout</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->



<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

           <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

            <!-- User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button">
        
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>

                </div>
            </li>
            </ul>


        </nav>
        <!-- End of Topbar -->
