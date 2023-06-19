<?php
include '../../../database/config.php';

$query = "SELECT * FROM penerbit";

$hasil = mysqli_query($db, $query);

// ... menampung semua data penerbit
$data_penerbit = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_penerbit
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_penerbit[] = $row;
}


// ... lanjut di tampilan
