<?php
  include ("koneksi.php");
?>

<!doctype html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donate - CareLink</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="style-donate.css" rel="stylesheet">
  </head>

  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
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
    <div class="container">
    <table data-toggle="table"
    data-search="true"
    data-pagination="true">
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