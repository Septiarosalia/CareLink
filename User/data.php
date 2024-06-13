<?php
  include ("koneksi.php");
?>

<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Donate - CareLink</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="style-donate.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
      <a class="navbar-brand" href="#">Logo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Logo</h5>
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
              <a class="nav-link mx-lg-2" href="Contact Us.html">Contact Us</a>
            </li>

            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="Target.html">Target</a>
            </li>

            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="Donate.html">Donate</a>
            </li>
          </ul>

          <!-- Profile Icon -->
          <a class="nav-link mx-lg-2" href="#" id="profileIcon">
            <i class="fas fa-user"></i>
          </a>
        </div>
      </div>
    </div>
  </nav>
  <!-- END Navbar -->

  <br><br><br><br><br>
  <div class="table-responsive"> <!-- Added table-responsive class -->
    <table data-toggle="table" data-search="true" data-pagination="true">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Tanggal, Waktu Donasi</th>
          <th>Jumlah Donasi</th>
          <th>Catatan</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $result = $connect->query("SELECT * FROM log_donasi;");
            $no = 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".$no."</td>
                    <td>".$row["nama_donator"]."</td>
                    <td>".$row["email_donator"]."</td>
                    <td>".$row["tanggal_waktu_donasi"]."</td>
                    <td>".$row["jumlah_donasi"]."</td>
                    <td>".$row["catatan"]."</td>
                </tr>";
                $no++;
            }
        ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.js"></script>
</body>

  <div class="text-center mt-4">
    <a href="form-donate.php" class="btn btn-primary">Next</a>
  </div>

  <br><br><br>
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

</html>
