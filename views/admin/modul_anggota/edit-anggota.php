<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header('location:..\..\login\login_form');
    exit();
}

include '../../../database/config.php';

// ambil artikel yang mau di edit
$id_anggota = $_GET['id_anggota'];
$query = "SELECT * FROM anggota WHERE anggota_id = $id_anggota";
$hasil = mysqli_query($db, $query);
$data_anggota = mysqli_fetch_assoc($hasil);

include '../modul_kelas/proses-list-kelas.php';

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

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard_admin.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-school"></i>
                </div>
                <div class="sidebar-brand-text mx-2">E-Library SMAM 8</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../dashboard_admin.php">
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
                <a class="nav-link" href="list-anggota.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Anggota</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../modul_kelas/list-kelas.php">
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
                        <a class="collapse-item" href="../modul_buku/list-buku.php">Buku</a>
                        <a class="collapse-item" href="../modul_kategori/list-kategori.php">Kategori</a>
                        <a class="collapse-item" href="../modul_penerbit/list-penerbit.php">Penerbit</a>
                        <a class="collapse-item" href="../modul_rak/list-rak.php">Rak Buku</a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['admin_name'] ?></span>
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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Data Anggota</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form method="post" action="proses-edit-anggota.php">
                                <input type="hidden" name="id_anggota" value="<?php echo $data_anggota['anggota_id']; ?>">
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <p><input type="text" name="nama" class="form-control" value="<?php echo $data_anggota['anggota_nama']; ?>"></p>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" name="jk">
                                        <?php if ($data_anggota['anggota_jk'] == "laki-laki") : ?>
                                            <option value="laki-laki" selected>Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        <?php else : ?>
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan" selected>Perempuan</option>
                                        <?php endif ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Kelas</label>
                                    <select class="form-select" name="kelas">
                                        <?php foreach ($data_kelas as $kelas) : ?>
                                            <?php
                                            if ($data_kelas['kelas_id'] == $kelas['kelas_id']) {
                                                $selected = "selected";
                                            } else {
                                                $selected = null;
                                            }
                                            ?>
                                            <option value="<?php echo $kelas['kelas_id'] ?>" <?php echo $selected ?>><?php echo $kelas['nama_kelas'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <button type="submit" value="Simpan" class="btn btn-primary">Edit</button>
                                <button type="reset" value="Batal" class="btn btn-danger" onclick="self.history.back();">Batal</button>
                            </form>
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

        <!-- Page level plugins -->
        <script src="../vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/chart-area-demo.js"></script>
        <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>