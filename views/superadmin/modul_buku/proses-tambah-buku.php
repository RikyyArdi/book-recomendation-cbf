<?php
session_start();
// ... jika belum login, alihkan ke halaman login
if (!isset($_SESSION['superadmin_name'])) {
    header('location:../../login/login_form');
    exit();
}

include '../../../database/config.php';

$jenis     = $_POST['jenis'];
$judul     = $_POST['judul'];
$kategori  = $_POST['kategori'];
$penulis  = $_POST['penulis'];
$rak  = $_POST['rak'];
$penerbit  = $_POST['penerbit'];
$deskripsi = $_POST['deskripsi'];
$jumlah    = $_POST['jumlah'];
$link    = $_POST['link'];

// ambil data file yang diupload
$file        = $_FILES['cover']['tmp_name'];
$nama_file   = $_FILES['cover']['name'];
$destination = "cover/" . $nama_file;

$query = "INSERT INTO buku (buku_jenis, buku_judul, kategori_id, penulis, rak_id, id_penerbit, buku_deskripsi, buku_jumlah, link, buku_cover) 
    VALUES ('$jenis','$judul', $kategori, '$penulis', $rak, $penerbit, '$deskripsi', $jumlah, '$link', '$nama_file')";
$hasil = mysqli_query($db, $query);
if ($hasil == true) {

    // jika data berhasil diinsert, lakukan proses upload
    move_uploaded_file($file, $destination);

    header('Location: list-buku.php');
} else {
    header('Location: tambah-buku.php');
}
