<?php
session_start();
// ... jika belum login, alihkan ke halaman login
if (!isset($_SESSION['superadmin_name'])) {
    header('location:../../login/login_form');
    exit();
}

include '../../../database/config.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$role = $_POST['role'];

$query = "INSERT INTO user (username, password, role) 
    VALUES ('$username', '$password', '$role')";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('Location: list-user.php');
} else {
    header('Location: tambah-user.php');
}
