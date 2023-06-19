<?php
session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:..\..\login\login_form');
}
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard_admin.php">
        <div class="sidebar-brand-icon">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-2">E-Library SMAM 8</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="dashboard_admin.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen Perpustakaan
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="../admin/modul_anggota/list-anggota.php">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Anggota</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="../admin/modul_kelas/list-kelas.php">
            <i class="fas fa-fw fa-school"></i>
            <span>Data Kelas</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen E-Library
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Buku</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="../admin/modul_buku/list-buku.php">Buku</a>
                <a class="collapse-item" href="../admin/modul_kategori/list-kategori.php">Kategori</a>
                <a class="collapse-item" href="../admin/modul_penerbit/list-penerbit.php">Penerbit</a>
                <a class="collapse-item" href="../admin/modul_rak/list-rak.php">Rak Buku</a>
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