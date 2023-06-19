<?php
session_start();
// ... jika belum login, alihkan ke halaman login
if (!isset($_SESSION['superadmin_name'])) {
    header('location:../../login/login_form');
    exit();
}

include '../../../database/config.php';

$rak = $_POST['rak'];

$query = "INSERT INTO rak (nama_rak) 
    VALUES ('$rak')";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('Location: list-rak.php');
} else {
    header('Location: tambah-rak.php');
}
