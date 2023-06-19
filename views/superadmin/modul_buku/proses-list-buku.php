<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

// ... jika belum login, alihkan ke halaman login
if (!isset($_SESSION['superadmin_name'])) {
    header('location:../../login/login_form');
    exit();
}

include '../../../database/config.php';

$query = "SELECT buku.*, kategori.kategori_nama, rak.nama_rak, penerbit.nama_penerbit
    FROM buku
    JOIN kategori ON buku.kategori_id = kategori.kategori_id
    JOIN rak ON buku.rak_id = rak.rak_id
    JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit";

$hasil = mysqli_query($db, $query);
mysqli_connect_error();
// ... menampung semua data kategori
$data_buku = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_buku
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_buku[] = $row;
}

// ... lanjut di tampilan
