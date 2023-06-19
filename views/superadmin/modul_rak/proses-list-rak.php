<?php

include '../../../database/config.php';

$query = "SELECT * FROM rak";

$hasil = mysqli_query($db, $query);

// ... menampung semua data kategori
$data_rak = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_rak
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_rak[] = $row;
}


// ... lanjut di tampilan
