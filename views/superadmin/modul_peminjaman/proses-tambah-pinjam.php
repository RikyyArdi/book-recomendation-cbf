<?php
session_start();
// ... jika belum login, alihkan ke halaman login
if (!isset($_SESSION['superadmin_name'])) {
    header('location:../../login/login_form');
    exit();
}

include '../../../database/config.php';
include '../function.php';

$buku                 = $_POST['buku'];
$anggota              = $_POST['anggota'];
$tgl_pinjam         = date('Y-m-d', strtotime($_POST['tgl_pinjam']));
$tgl_jatuh_tempo    = date('Y-m-d', strtotime($_POST['tgl_jatuh_tempo']));

// cek stok buku
$stok_buku = cek_stok($db, $buku);

if ($stok_buku < 1) {
    $_SESSION['messages'] = '<font color="red">Stok buku sudah habis, proses peminjaman gagal!</font>';
    header('Location: pinjam-form.php');
    exit();
}

$query = "INSERT INTO pinjam (buku_id, anggota_id, tgl_pinjam, tgl_jatuh_tempo) 
    VALUES ('$buku', $anggota, '$tgl_pinjam', '$tgl_jatuh_tempo')";
$hasil = mysqli_query($db, $query);
if ($hasil == true) {

    kurangi_stok($db, $buku);

    $_SESSION['messages'] = '<div class="alert alert-success" role="alert">
    Berhasil tambah transaksi!
  </div>';

    header('Location: pinjam-data.php');
} else {
    header('Location: pinjam-form.php');
}
