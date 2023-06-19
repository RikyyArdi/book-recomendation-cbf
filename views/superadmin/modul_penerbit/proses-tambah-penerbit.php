<?php
session_start();
// ... jika belum login, alihkan ke halaman login
if (!isset($_SESSION['superadmin_name'])) {
    header('location:../../login/login_form');
    exit();
}

include '../../../database/config.php';

$penerbit = $_POST['penerbit'];

$query = "INSERT INTO penerbit (nama_penerbit) 
    VALUES ('$penerbit')";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('Location: list-penerbit.php');
} else {
    header('Location: tambah-penerbit.php');
}
