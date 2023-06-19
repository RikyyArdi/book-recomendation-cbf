<?php
include '../../../database/config.php';

$penerbit = $_POST['penerbit'];
$id_penerbit = $_POST['id_penerbit'];

$query = "UPDATE penerbit 
    SET nama_penerbit = '$penerbit'
    WHERE id_penerbit = $id_penerbit";

$hasil = mysqli_query($db, $query);
if ($hasil == true) {
    header('Location: list-penerbit.php');
} else {
    header('Location: edit-penerbit.php');
}
