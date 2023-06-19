<?php

include '../../../database/config.php';

$id_user = $_GET['id_user'];

$query = "DELETE FROM user WHERE id = $id_user";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: list-user.php');
} else {
    header('location: tambah-petugas.php');
}
