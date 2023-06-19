<?php
include '../../../database/config.php';

$id_kelas = $_POST['id_kelas'];
$kelas = $_POST['kelas'];

$query = "UPDATE kelas 
    SET nama_kelas = '$kelas'
    WHERE kelas_id = $id_kelas";

$hasil = mysqli_query($db, $query);
if ($hasil == true) {
    header('Location: list-kelas.php');
} else {
    header('Location: edit-kelas.php');
}
