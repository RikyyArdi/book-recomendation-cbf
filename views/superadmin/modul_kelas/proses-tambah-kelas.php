<?php
session_start();
// ... jika belum login, alihkan ke halaman login
if (!isset($_SESSION['superadmin_name'])) {
    header('location:../../login/login_form');
    exit();
}

include '../../../database/config.php';

$kelas = $_POST['kelas'];

$query = "INSERT INTO kelas (nama_kelas) 
    VALUES ('$kelas')";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('Location: list-kelas.php');
} else {
    header('Location: tambah-kelas.php');
}
