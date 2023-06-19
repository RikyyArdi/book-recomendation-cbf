<?php

include '../../../database/config.php';

$id_rak = $_GET['id_rak'];

$query = "DELETE FROM rak WHERE rak_id = $id_rak";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: list-rak.php');
} else {
    header('location: tambah-rak.php');
}
