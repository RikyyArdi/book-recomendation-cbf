<?php

include '../../../database/config.php';

$id_kelas = $_GET['id_kelas'];

$query = "DELETE FROM kelas WHERE kelas_id = $id_kelas";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: list-kelas.php');
} else {
    header('location: tambah-kelas.php');
}
