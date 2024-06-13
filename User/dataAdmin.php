<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="style-contact-us.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background-color:#7794BB;
        }
        .container {
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .table-container {
            overflow-x: auto;
            width: 100%; /* Ensure the container takes up the full width */
            border-radius:10px;
        }
        .table {
            width: 100%; /* Ensure the table takes up the full width */
        }
        .actions-column {
            text-align: center; /* Center align text in Actions column */
        }
        .table-heading {
            font-size: 35px; /* Increase font size */
            font-weight: bold;
        }
        .read-status {
            color: #4662E8; /* Color for read status */
            font-weight: bold;
        }
        
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
            <a class="nav-link mx-lg-2" href="Contact_Us.html">Contact Us</a>
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
<div class="container-fluid" style="margin-top: 120px;">
    <div class="table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="6" class="text-center text-black table-heading">Donation</th>
                </tr>
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
                // Fetch messages from database and display
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "carelink";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $sql = "SELECT * FROM contacts";

                $result = $conn->query("SELECT * FROM log_donasi;");
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
                
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>
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