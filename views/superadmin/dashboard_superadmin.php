<?php
include '../../database/config.php';
session_start();

//jika belum login, alihkan ke login
if (!isset($_SESSION['superadmin_name'])) {
    header('location:../../login/login_form');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard <?= $_SESSION['superadmin_name'] ?></title>
    <link rel="website icon" type="png" href="images/logo.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../css/font.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        @include 'assets/sidebar.php'
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

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
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../login/logout.php" data-toggle="modal" data-target="#logoutModal">
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
                                <a class="btn btn-danger" href="../login/logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal-->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Apakah anda yakin ingin menghapus data ini?</div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                <a class="btn btn-danger" href="#">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Selamat Datang, <?= $_SESSION['superadmin_name'] ?>.</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- card jumlah user -->
                        <?php
                        $result = mysqli_query($db, "SELECT COUNT(*) AS jumlah_data FROM user");
                        $data = mysqli_fetch_assoc($result);
                        $jumlah_data = $data['jumlah_data'];
                        ?>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_data ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-id-card fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- card jumlah buku -->
                        <?php
                        $result = mysqli_query($db, "SELECT COUNT(*) AS jumlah_data FROM buku");
                        $data = mysqli_fetch_assoc($result);
                        $jumlah_data = $data['jumlah_data'];
                        ?>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah Buku</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $jumlah_data ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- card jumlah kelas -->
                        <?php
                        $result = mysqli_query($db, "SELECT COUNT(*) AS jumlah_data FROM kelas");
                        $data = mysqli_fetch_assoc($result);
                        $jumlah_data = $data['jumlah_data'];
                        ?>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Kelas
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_data ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-school fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- card jumlah anggota -->
                        <?php
                        $result = mysqli_query($db, "SELECT COUNT(*) AS jumlah_data FROM anggota");
                        $data = mysqli_fetch_assoc($result);
                        $jumlah_data = $data['jumlah_data'];
                        ?>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Jumlah Anggota</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_data ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg mb-4">

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Profil Sekolah</h6>
                                </div>
                                <div class="card-body">
                                    <p>SMA Muhammadiyah 8 Sukodadi adalah sebuah sekolah menengah atas yang terletak di kota Sukodadi, Jawa Timur, Indonesia. Sebagai bagian dari jaringan sekolah Muhammadiyah, SMA Muhammadiyah 8 Sukodadi didirikan dengan tujuan untuk memberikan pendidikan yang berkualitas dan berlandaskan nilai-nilai keagamaan kepada siswa-siswinya.
                                        Sejak didirikan pada tahun 1980, SMA Muhammadiyah 8 Sukodadi telah berkomitmen untuk mengembangkan potensi siswa-siswa yang terbaik melalui program akademik yang unggul dan pengembangan karakter yang berkelanjutan. Dalam hal akademik, sekolah ini menawarkan berbagai program studi yang mencakup mata pelajaran umum seperti matematika, sains, bahasa Inggris, dan sosial-humaniora, serta mata pelajaran agama seperti Al-Quran dan Hadist.</p>
                                    <p>Selain itu, SMA Muhammadiyah 8 Sukodadi juga menawarkan program ekstrakurikuler yang beragam untuk membantu siswa mengembangkan minat dan bakat mereka di berbagai bidang. Beberapa ekstrakurikuler yang ditawarkan antara lain sepak bola, basket, voli, tapak suci dan hizbul wathan.
                                        SMA Muhammadiyah 8 Sukodadi juga memiliki lingkungan belajar yang kondusif, dengan fasilitas yang memadai seperti perpustakaan, laboratorium komputer, laboratorium sains, dan aula serbaguna. Selain itu, sekolah ini juga memiliki tenaga pendidik yang berkualitas dan berdedikasi untuk membantu siswa mencapai potensi terbaik mereka.
                                        Dengan berbagai program yang ditawarkan, lingkungan belajar yang kondusif, dan tenaga pendidik yang berkualitas, SMA Muhammadiyah 8 Sukodadi menjadi salah satu sekolah menengah atas terbaik di Sukodadi, dan menjadi pilihan yang tepat bagi siswa yang ingin mendapatkan pendidikan yang berkualitas dan berlandaskan nilai-nilai keagamaan.</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php
            @include 'assets/footer.php'
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>