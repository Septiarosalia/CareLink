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
                <!-- belum bisa -->
                <a class="nav-link mx-lg-2" aria-current="page" href="Home.html">Home</a>
              </li>

              <li class="nav-item">
                <!-- belum bisa -->
                <a class="nav-link mx-lg-2" href="About Us.html">About Us</a>
              </li>

              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="Contact_Us.html">Contact Us</a>
              </li>

              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="Target.html">Target</a>
              </li>

              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="donate.php">Donate</a>
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

    <!-- Donate Form -->
    <section class="donate-section">
      <div class="container">
        <h2 class="text-center mb-5">Donate</h2> <!-- Heading di tengah -->
        <div class="row row-cols-lg-4 g-lg-2">
          <?php
            $result = $connect->query("SELECT * FROM donasi;");
            while($row = $result->fetch_assoc()) {
              echo "<div class=\"col\">
                      <div class=\"card\" style=\"width: 18rem;\">
                        <img src=\"image-placeholder.png\" class=\"card-img-top\" alt=\"Gambar Placeholder Default\">
                        <div class=\"card-body\">
                          <h5 class=\"card-title\">".$row['nama_donasi']."</h5>
                            <p class=\"card-text\">".$row['deskripsi']."</p>
                          <a href=\"form-donate.php?id=".$row['id_donasi']."\" class=\"btn btn-primary\">Donate Now</a>
                        </div>
                      </div>
                    </div>";
            }
            
          ?>
        </div>
      </div>
    </section>
    <!-- END Donate Form -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>