<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "buku";

$db = mysqli_connect($host, $user, $pass, $database) or die("gagal koneksi ke database");
