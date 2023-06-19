<?php
session_start();

if (!isset($_SESSION['superadmin_name'])) {
    header('location:../../login/login_form');
}
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard_superadmin.php">
        <div class="sidebar-brand-icon">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-2">E-Library SMAM 8</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="dashboard_superadmin.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen User
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="../superadmin/modul_user/list-user.php">
            <i class="fas fa-fw fa-id-card"></i>
            <span>Data User</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="../superadmin/modul_anggota/list-anggota.php">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Anggota</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="../superadmin/modul_kelas/list-kelas.php">
            <i class="fas fa-fw fa-school"></i>
            <span>Data Kelas</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen E-Library
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-book-open"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="../superadmin/modul_peminjaman/pinjam-data.php">Peminjaman</a>
                <a class="collapse-item" href="../superadmin/modul_pengembalian/list-pengembalian.php">Pengembalian</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Manajemen Buku</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="../superadmin/modul_buku/list-buku.php">Buku</a>
                <a class="collapse-item" href="../superadmin/modul_kategori/list-kategori.php">Kategori</a>
                <a class="collapse-item" href="../superadmin/modul_penerbit/list-penerbit.php">Penerbit</a>
                <a class="collapse-item" href="../superadmin/modul_rak/list-rak.php">Rak Buku</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Cetak laporan
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-print"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="../superadmin/cetak/cetak-anggota.php">Data Anggota</a>
                <a class="collapse-item" href="../superadmin/cetak/cetak-buku.php">Data Buku</a>
                <a class="collapse-item" href="../superadmin/cetak/cetak-transaksi.php">Transaksi</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->