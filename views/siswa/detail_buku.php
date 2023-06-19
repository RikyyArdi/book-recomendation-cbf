<?php
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:../../login/login_form');
}

require_once('vendor/autoload.php');
require_once('Cbrs.php');

$dsn = 'mysql:host=127.0.0.1;dbname=buku';
$user = 'root';
$password = '';
$database = new Nette\Database\Connection($dsn, $user, $password);

$id = $_GET['id'];
$buku = get_buku_detail($id, $database);

$result = $database->query('SELECT buku.*, kategori.kategori_nama
FROM buku
JOIN kategori ON buku.kategori_id = kategori.kategori_id');

// kriteria sistem rekomendasi
$data = [];
foreach ($result as $row) {
    $data[$row->buku_id] = pre_process($row->buku_judul . ' ' . $row->penulis . ' ' . $row->kategori_id . ' ' . $row->buku_deskripsi);
}
// end kriteria sistem rekomendasi

// menampilkan rekomendasi
$cbrs = new Cbrs();
$cbrs->create_index($data);
$cbrs->idf();
$w = $cbrs->weight();
$r = $cbrs->similarity($id);
$n = 5;
// end menampilkan rekomendasi

function pre_process($str)
{
    $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
    $stemmer = $stemmerFactory->createStemmer();

    $stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
    $stopword = $stopWordRemoverFactory->createStopWordRemover();

    $str = strtolower($str);
    $str = $stemmer->stem($str);
    $str = $stopword->remove($str);

    return $str;
}

function get_buku_detail($id, $db)
{
    $rs = $db->fetch('SELECT buku.*, kategori.kategori_nama
    FROM buku
    JOIN kategori ON buku.kategori_id = kategori.kategori_id WHERE buku_id = ' . $id);
    return $rs;
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Detail Buku</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/datatables_hide.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="vendor/datatables/jquery-3.5.1.js" rel="stylesheet">
    <link href="vendor/datatables/jquery.dataTables.min.js" rel="stylesheet">

</head>

<body>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <a class="navbar-brand" href="siswa_page.php">
                        <h1 class=" h4 mb-0 text-gray-800">E-Library SMAM 8</h1>
                    </a>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
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

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['user_name'] ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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
                <!-- End of Topbar -->

                <div class="card-header py-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="../superadmin/modul_buku/cover/<?php echo $buku['buku_cover'] ?>" class="img-thumbnail">
                                </div>
                                <div class="col-md-10">
                                    <h2><span class="label label-success"><?php echo $buku->buku_judul ?></span></h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4><span><a href="<?php echo $buku->link ?> " target="_blank"><button class="btn btn-primary"><?php echo $buku->buku_jenis ?></button></a></span></h4>
                                            <div class="col-md-15">
                                                <p><strong>Kategori :</strong> <?php echo $buku->kategori_nama ?></p>
                                                <p><strong>Penulis :</strong> <?php echo $buku->penulis ?></p>
                                                <p><strong>Deskripsi :</strong> <?php echo $buku->buku_deskripsi ?></p>
                                                <p><strong>Stok :</strong> <?php echo $buku->buku_jumlah ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header py-3 mt-5">
                                    <div class="col-md-12">
                                        <h3>Rekomendasi Buku yang sesuai</h3>
                                        <div class="card-deck mt-4">
                                            <?php $i = 0; ?>
                                            <?php foreach ($r as $k => $row) : ?>
                                                <?php if ($i == $n) break; ?>
                                                <?php if ($row == 1) continue; ?>
                                                <?php $h = get_buku_detail($k, $database); ?>
                                                <div class="card">
                                                    <img src="../superadmin/modul_buku/cover/<?php echo $h->buku_cover ?>" class="card-img-top img-thumbnail" alt="<?php echo $h->buku_judul ?>">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><a href="detail_buku.php?id=<?php echo $h->buku_id ?>"><?php echo $h->buku_judul ?></a></h5>
                                                        <p class="card-text"><?php echo $row ?></p>
                                                    </div>
                                                </div>
                                                <?php $i++ ?>
                                            <?php endforeach ?>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Bootstrap core JavaScript-->
                            <script src="vendor/jquery/jquery.min.js"></script>
                            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                            <!-- Core plugin JavaScript-->
                            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                            <!-- Custom scripts for all pages-->
                            <script src="js/sb-admin-2.min.js"></script>

                            <!-- DataTable plugins -->
                            <script src="vendor/datatables/jquery.dataTables.min.js"></script>
                            <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>