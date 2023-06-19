<?php

include '../../../database/config.php';

$id_penerbit = $_GET['id_penerbit'];

$query = "DELETE FROM penerbit WHERE id_penerbit = $id_penerbit";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: list-penerbit.php');
} else {
    header('location: tambah-penerbit.php');
}
