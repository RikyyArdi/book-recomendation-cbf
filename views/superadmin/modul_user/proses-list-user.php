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

$query = "SELECT * FROM user";

$hasil = mysqli_query($db, $query);

// ... menampung semua data kategori
$data_user = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_anggota
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_user[] = $row;
}


// ... lanjut di tampilan
