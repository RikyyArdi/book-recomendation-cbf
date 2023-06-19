<?php
include 'database/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>E-Library</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon" />
  <link href="assets/img/logo.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet" />

  <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="" />
        <span>E-Library</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Profil</a></li>
          <li><a class="nav-link scrollto" href="#inventaris">Inventaris</a></li>
          <li><a class="nav-link scrollto" href="#me">About Me</a></li>
          <li><a class="getstarted scrollto" href="views/login/login_form.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Selamat Datang</h1>
          <h1 data-aos="fade-up">di E-Library</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Perpustakaan Sekolah</h2>
          <h2 data-aos="fade-up" data-aos-delay="400">SMA Muhammadiyah 8 Sukodadi</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="views/login/login_form.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Get Started</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/welcome.png" class="img-fluid" alt="" />
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row gx-0">
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Profil Sekolah</h3>
              <h2>SMA Muhammadiyah 8 Sukodadi merupakan sekolah menengah atas di Kota Sukodadi, Jawa Timur, Indonesia, yang didirikan dengan tujuan memberikan pendidikan berkualitas dan berlandaskan nilai-nilai keagamaan.</h2>
              <p>
                Sekolah ini berkomitmen untuk mengembangkan potensi siswa melalui program akademik dan karakter yang berkelanjutan, serta menawarkan berbagai program studi dan ekstrakurikuler. Fasilitas yang dimiliki SMA Muhammadiyah 8
                Sukodadi seperti perpustakaan, laboratorium komputer, laboratorium sains, dan aula serbaguna membuat lingkungan belajar menjadi kondusif. Sekolah ini juga memiliki tenaga pendidik yang berkualitas dan berdedikasi untuk
                membantu siswa mencapai potensi terbaik mereka. SMA Muhammadiyah 8 Sukodadi menjadi salah satu sekolah menengah atas terbaik di Sukodadi, dan menjadi pilihan yang tepat bagi siswa yang ingin mendapatkan pendidikan yang
                berkualitas dan berlandaskan nilai-nilai keagamaan.
              </p>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/about.jpeg" class="img-fluid" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>Profil Perpustakaan</h2>
          <p>Galeri Perpustakaan SMA Muhammadiyah 8 Sukodadi</p>
        </header>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <img src="assets/img/1.jpg" class="img-fluid" alt="" />
              <h3>Galeri</h3>
              <p>Perpustakaan Sekolah SMA Muhammadiyah 8 Sukodadi</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              <img src="assets/img/2.jpg" class="img-fluid" alt="" />
              <h3>Galeri</h3>
              <p>Perpustakaan Sekolah SMA Muhammadiyah 8 Sukodadi</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
              <img src="assets/img/3.jpg" class="img-fluid" alt="" />
              <h3>Galeri</h3>
              <p>Perpustakaan Sekolah SMA Muhammadiyah 8 Sukodadi</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Values Section -->

    <!-- ======= Counts Section ======= -->
    <section id="inventaris" class="counts">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>Inventaris Perpustakaan</h2>
        </header>

        <div class="row gy-4 justify-content-center">

          <!-- card buku -->
          <?php
          $result = mysqli_query($db, "SELECT COUNT(*) AS jumlah_data FROM buku");
          $data = mysqli_fetch_assoc($result);
          $jumlah_data = $data['jumlah_data'];
          ?>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?php echo $jumlah_data ?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>Jumlah Buku</p>
              </div>
            </div>
          </div>

          <!-- card anggota -->
          <?php
          $result = mysqli_query($db, "SELECT COUNT(*) AS jumlah_data FROM anggota");
          $data = mysqli_fetch_assoc($result);
          $jumlah_data = $data['jumlah_data'];
          ?>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-people" style="color: #bb0852;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?php echo $jumlah_data ?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>Jumlah Anggota</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Team Section ======= -->
    <section id="me" class="team">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <p>About Me</p>
        </header>
        <div class="row gy-4 justify-content-center">
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-1.jpeg" class="img-fluid" alt="" />
                <div class="social">
                  <a href="https://instagram.com/rikyyardii?igshid=YmMyMTA2M2Y=" target="_blank"><i class="bi bi-instagram"></i></a>
                  <a href="https://t.me/RikyA" target="_blank"><i class="bi bi-telegram"></i></a>
                  <a href="https://github.com/RikyyArdi" target="_blank"><i class="bi bi-github"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Riky Ardiansyah</h4>
                <p>"Mahasiswa Universitas Muhammadiyah Lamongan program studi S1 Teknik Komputer ~ Alumni SMA Muhammadiyah 8 Sukodadi Tahun 2019"</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Team Section -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="container">
        <div class="copyright">
          Copyright &copy; <strong><span>Ryky Ardiansyah | Skripsi 2023</span></strong>
        </div>
        <div class="credits">
          <a>All Rights Reserved</a>
        </div>
      </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>