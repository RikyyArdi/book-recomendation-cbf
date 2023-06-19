<?php
session_start();

if (!isset($_SESSION['superadmin_name'])) {
    header('location:../../login/login_form');
    exit();
}

// ... ambil data dari database
include '../modul_buku/proses-list-buku.php';

// ... ambil data dari database
include '../modul_anggota/proses-list-anggota.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Library SMAM 8</title>
    <link rel="website icon" type="png" href="images/logo.png">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../../css/font.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/select2.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard_superadmin.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-school"></i>
                </div>
                <div class="sidebar-brand-text mx-2">E-Library SMAM 8</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../dashboard_superadmin.php">
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
                <a class="nav-link" href="../modul_user/user_view.php">
                    <i class="fas fa-fw fa-id-card"></i>
                    <span>Data User</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../modul_anggota/anggota_view.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Anggota</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../modul_kelas/kelas_view.php">
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
                        <a class="collapse-item" href="../modul_buku/list-buku.php">Buku</a>
                        <a class="collapse-item" href="../modul_kategori/list-kategori.php">Kategori</a>
                        <a class="collapse-item" href="../modul_penerbit/list-penerbit.php">Penerbit</a>
                        <a class="collapse-item" href="../modul_rak/list-rak.php">Rak Buku</a>
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
                        <a class="collapse-item" href="../cetak/cetak-anggota.php">Data Anggota</a>
                        <a class="collapse-item" href="../cetak/cetak-buku.php">Data Buku</a>
                        <a class="collapse-item" href="../cetak/cetak-transaksi.php">Transaksi</a>
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
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['superadmin_name'] ?></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../../../login/logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>

                            </div>
                        </li>

                    </ul>

                </nav>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Apakah anda yakin ingin logout?</div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                                <a class="btn btn-danger" href="../../login/logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class=" container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Data Transaksi Peminjaman</h1>

                        <?php
                        // pesan
                        if (!empty($_SESSION['messages'])) {
                            echo $_SESSION['messages']; //menampilkan pesan 
                            unset($_SESSION['messages']); //menghapus pesan setelah refresh
                        }
                        ?>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="proses-tambah-pinjam.php" method="post">

                                <div class="mb-3">
                                    <label class="form-label">Pilih Buku</label>
                                    <select class="cariBuku js-states form-control" name="buku">
                                        <?php foreach ($data_buku as $buku) : ?>
                                            <option value="<?php echo $buku['buku_id'] ?>"><?php echo $buku['buku_judul'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>



                                <div class="mb-3">
                                    <label class="form-label">Pilih Anggota</label>
                                    <select class="cariAnggota js-states form-select" name="anggota">
                                        <?php foreach ($data_anggota as $anggota) : ?>
                                            <option value="<?php echo $anggota['anggota_id'] ?>"><?php echo $anggota['anggota_nama'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tanggal Pinjam</label>
                                    <input type="date" name="tgl_pinjam" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tanggal Jatuh Tempo</label>
                                    <input type="date" name="tgl_jatuh_tempo" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
                                <button type="reset" value="Batal" class="btn btn-danger" onclick="self.history.back();">Batal</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Main Content -->

            <?php
            @include '../assets/footer.php'
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <script src="../css/select2.min.js"></script>

    <script>
        $(".cariBuku").select2({
            placeholder: "Masukkan judul buku",
            allowClear: true
        });
    </script>

    <script>
        $(".cariAnggota").select2({
            placeholder: "Masukkan nama anggota",
            allowClear: true
        });
    </script>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>