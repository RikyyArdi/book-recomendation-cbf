<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

// ... jika belum login, alihkan ke halaman login
if (!isset($_SESSION['admin_name'])) {
    header('location:..\..\login\login_form');
    exit();
}


include '../../../database/config.php';

$query = "SELECT anggota.*, kelas.nama_kelas
FROM anggota
JOIN kelas ON anggota.kelas_id = kelas.kelas_id";

$hasil = mysqli_query($db, $query);

// ... menampung semua data kategori
$data_anggota = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_anggota
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_anggota[] = $row;
}


// ... lanjut di tampilan
