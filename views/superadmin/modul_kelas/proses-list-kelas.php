<?php

include '../../../database/config.php';

$query = "SELECT * FROM kelas";

$hasil = mysqli_query($db, $query);

// ... menampung semua data kategori
$data_kelas = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_kelas
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_kelas[] = $row;
}


// ... lanjut di tampilan
