<?php

include '../../database/config.php';

if (isset($_POST['submit'])) {

   $username = mysqli_real_escape_string($db, $_POST['username']);
   $password = md5($_POST['password']);
   $role = $_POST['role'];

   $select = " SELECT * FROM user WHERE username = '$username' && password = '$password' ";

   $result = mysqli_query($db, $select);

   $insert = "INSERT INTO user(username, password, role) VALUES('$username','$password','$role')";
   mysqli_query($db, $insert);
   header('location:login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Daftar Akun Baru</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../../css/style.css">

</head>

<body>

   <div class="form-container">

      <form action="" method="post">
         <img src="../../img/logo.png" alt="logomts" width="120" height="112">
         <h3>Daftar Akun</h3>
         <a>Silahkan buat Username dan Password anda</a>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            };
         };
         ?>
         <input type="text" name="username" required placeholder="Buat username anda" autocomplete="off">
         <input type="password" name="password" required placeholder="Buat password anda" autocomplete="off">
         <input type="text" name="role" value="siswa" hidden>
         <input type="submit" name="submit" value="Daftar" class="form-btn">
         <p>Sudah punya akun? <a href="login_form.php">Login</a></p>
         <p><a href="../../index.php">Kembali ke halaman awal</a></p>
      </form>

   </div>

</body>

</html>