<!-- Database -->
<?php

include '../../database/config.php';

session_start();

if (isset($_POST['submit'])) {

   $username = mysqli_real_escape_string($db, $_POST['username']);
   $password = md5($_POST['password']);

   $select = " SELECT * FROM user WHERE username = '$username' && password = '$password' ";

   $result = mysqli_query($db, $select);

   if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result);

      if ($row['role'] == 'superadmin') {

         $_SESSION['superadmin_name'] = $row['username'];
         header('location:..\superadmin\dashboard_superadmin.php');
      } else if ($row['role'] == 'admin') {

         $_SESSION['admin_name'] = $row['username'];
         header('location:..\admin\dashboard_admin.php');
      } else {

         $_SESSION['user_name'] = $row['username'];
         header('location:..\siswa\siswa_page.php');
      }
   } else {
      $error[] = 'incorrect username or password!';
   }
};
?>

<!-- Tampilan -->
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>E-Library MTsM 30</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../../css/style.css">

</head>

<body>

   <div class="form-container">
      <form action="" method="post">
         <img src="../../img/logo.png" alt="logomts" width="120" height="112">
         <h3>Selamat Datang</h3>
         <a>Silahkan Login</a>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            };
         };
         ?>
         <input type="text" name="username" required placeholder="Masukkan username anda" autocomplete="off">
         <input type="password" name="password" required placeholder="Masukkan password anda" autocomplete="off">
         <input type="submit" name="submit" value="login" class="form-btn">
         <p>Belum punya akun? <a href="register_form.php">Daftar</a></p>
         <p><a href="../../index.php">Kembali ke halaman awal</a></p>
      </form>

   </div>

</body>

</html>