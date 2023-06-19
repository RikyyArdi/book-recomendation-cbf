<?php
include '../../../database/config.php';

$id_anggota = $_POST['id_anggota'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jk'];
$kelas = $_POST['kelas'];

$query = "UPDATE anggota 
    SET anggota_nama = '$nama',
        anggota_jk = '$jenis_kelamin',
        kelas_id = '$kelas'
    WHERE anggota_id = $id_anggota";

$hasil = mysqli_query($db, $query);
// var_dump(mysqli_error($db));
if ($hasil == true) {
    header('Location: list-anggota.php');
} else {
    header('Location: tambah-anggota.php');
}
