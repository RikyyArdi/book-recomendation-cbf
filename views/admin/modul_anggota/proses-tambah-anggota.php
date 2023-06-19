<?php
session_start();
// ... jika belum login, alihkan ke halaman login
if (!isset($_SESSION['admin_name'])) {
    header('location:..\..\login\login_form');
    exit();
}

include '../../../database/config.php';

$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jk'];
$kelas = $_POST['kelas'];

$query = "INSERT INTO anggota (anggota_nama, anggota_jk, kelas_id)
    VALUES ('$nama', '$jenis_kelamin', '$kelas')";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('Location: list-anggota.php');
} else {
    header('Location: tambah-anggota.php');
}
