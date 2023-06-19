<?php
include '../../../database/config.php';

$id_rak = $_POST['id_rak'];
$rak = $_POST['rak'];

$query = "UPDATE rak 
    SET nama_rak = '$rak'
    WHERE rak_id = $id_rak";

$hasil = mysqli_query($db, $query);
if ($hasil == true) {
    header('Location: list-rak.php');
} else {
    header('Location: edit-rak.php');
}
