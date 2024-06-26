<?php include(__DIR__ . '/../session_check.php'); ?>
<!doctype html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CareLink</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="style-about-us.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
      .footer {
      background-image: url('background.jpg');
      opacity: 80%;
      background-color: black;
      color: white; 
      text-align: center; 
      padding: 20px; 
      display: flex;
      flex-direction: column; 
      align-items: center; 
    }

    .footer .social a {
      color: white; 
      margin: 0 15px; 
      font-size: 24px; 
      display: inline-block; 
      margin-bottom: 15px;
    }

    .footer ul {
      list-style: none; 
      padding: 0; 
      display: flex;
      justify-content: center; 
      gap: 5px; 
    }

    .footer ul li {
      display: inline; 
    }

    .footer ul li a {
      color: white; 
      text-decoration: none;
      padding: 5px 10px;
      margin-top: 20px;
    }

    .footer ul li a:hover {
      text-decoration: underline;
    }

    .footer p {
      margin-top: 5px;
      font-size: 12px;
    }
    </style>
  </head>

  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">CareLink</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">CareLink</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>

          <div class="offcanvas-body d-flex justify-content-between align-items-center">
            <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link mx-lg-2" aria-current="page" href="Home.html">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="About Us.html">About Us</a>
              </li>

              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="Contact_Us.html">Contact Us</a>
              </li>

              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="Target.html">Target</a>
              </li>

              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="form_donate.php">Donate</a>
              </li>
            </ul>

            <div class="dropdown">
              <a class="nav-link mx-lg-2 dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                  <li><a class="dropdown-item" href="login.php">Sign Out</a></li>
              </ul>
          </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- END Navbar -->

          <!-- Hero Section -->
          <section class="hero-section">
            <div class="container">
              <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                  <div class="about-img">
                    <img src="about-us-donate.jpeg" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                  <div class="about-text">
                    <h1>About Us</h1>
                    <p align="justify">CARELINK menyediakan berbagai layanan dan platform teknologi informasi yang dirancang untuk memudahkan dalam menggalang dana secara efektif. Mulai dari pembuatan website penggalangan dana yang informatif dan mudah diakses hingga integrasi sistem untuk pelacakan dan pelaporan donasi, CARELINK berkomitmen untuk memberikan solusi yang memenuhi kebutuhan dalam bidang sosial. Dengan penekanan pada transparansi melalui laporan berkala dan penggunaan teknologi untuk memastikan keamanan dan akuntabilitas dana, CARELINK bertujuan untuk meningkatkan partisipasi masyarakat dalam kegiatan filantropi dan kesadaran sosial terhadap berbagai isu kemanusiaan.</p>
                  </div>
                </div>
              </div>
              </div>
          </section>
          <!-- END Hero Section -->

          <footer class="footer">
            <div class="social">
                <a href="https://www.instagram.com/septia_rosalia39?igsh=MXM0cjIwbHlla3pkdA%3D%3D&utm_source=qr"><i
                        class='bx bxl-instagram'></i></a>
                <a href="http://wa.me/82282126810"><i class='bx bxl-whatsapp'></i></a>
                <a href="mailto:septiarosalia493@gmail.com"><i class='bx bxs-envelope'></i></a>
            </div>
          
            <ul class="list">
                <li>
                    <a href="about.html">About Us</a>
                </li>
                <li>
                    <a href="Contact_Us.html">Contact Us</a>
                </li>
                <li>
                    <a href="">Target</a>
                </li>
                <li>
                  <a href="">Donate</a>
              </li>
            </ul>
          
            <p class="copyright">@ 2024 CareLink | All Rights Reserved</p>
          </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
