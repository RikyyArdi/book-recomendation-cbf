<?php
include '../connection.php';

$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$role = $_POST['role'];

$query = "UPDATE user 
    SET username = '$username',
    password = '$password',
    role = '$role'
    WHERE id = $id_user";

$hasil = mysqli_query($db, $query);
// var_dump(mysqli_error($db));
if ($hasil == true) {
    header('Location: list-user.php');
} else {
    header('Location: edit-user.php');
}
