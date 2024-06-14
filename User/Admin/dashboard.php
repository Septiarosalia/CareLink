<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="style-contact-us.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <link href="style(1).css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    body {
        background-color: #A5CCFF;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .main-content {
        padding: 20px;
        flex: 1;
        padding-top: 80px;
    }

    .card-custom {
        background-color: rgb(215, 215, 215);
        color: #060606;
        font-size: 22px;
        padding: 50px;
        border-radius: 10px;
        text-align: center;
    }

    .card-custom:hover {
        background-color: rgb(151, 158, 176);
        color: #515151;
    }

    .card-custom h3 {
        margin-top: 10px;
    }

    .navbar-custom {
        background-color: #ffb6c1;
    }

    .contact-section {
        padding-top: 120px;
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
                            <a class="nav-link mx-lg-2" aria-current="page" href="dashboard.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="About Us.html">Donatur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="message.php">Message</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="dataAdmin.php">Donasi</a>
                        </li>
                    </ul>
                    <!-- Profile Icon -->
                    <div class="dropdown">
                        <a class="nav-link mx-lg-2 dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="../login.php">Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- END Navbar -->

    <div class="d-flex">
        <div class="main-content col-md-10">
            <div class="container mt-5">
                <h2>Dashboard</h2>
                <div class="row">
                    <?php
                    $koneksi = mysqli_connect("localhost", "root", "", "carelink");

                    if (!$koneksi) {
                        die("Koneksi ke database gagal: " . mysqli_connect_error());
                    }

                    // Query untuk mengambil jumlah donasi
                    $query_donasi = mysqli_query($koneksi, "SELECT SUM(jumlah_donasi) AS total_donasi FROM donasi");
                    if ($query_donasi) {
                        $data_donasi = mysqli_fetch_assoc($query_donasi);
                        $jumlah_donasi = $data_donasi['total_donasi'];
                    } else {
                        $jumlah_donasi = "Error: " . mysqli_error($koneksi);
                    }

                    // Query untuk mengambil jumlah pesan
                    $query_pesan = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_pesan FROM contacts");
                    if ($query_pesan) {
                        $data_pesan = mysqli_fetch_assoc($query_pesan);
                        $jumlah_pesan = $data_pesan['jumlah_pesan'];
                    } else {
                        $jumlah_pesan = "Error: " . mysqli_error($koneksi);
                    }

                    // Query untuk mengambil jumlah donatur
                    $query_donatur = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_donatur FROM donasi");
                    if ($query_donatur) {
                        $data_donatur = mysqli_fetch_assoc($query_donatur);
                        $jumlah_donatur = $data_donatur['jumlah_donatur'];
                    } else {
                        $jumlah_donatur = "Error: " . mysqli_error($koneksi);
                    }
                    ?>
                    <div class="col-md-4">
                        <a href="dataAdmin.php" class="text-decoration-none">
                            <div class="card-custom">
                                <div>Jumlah Donasi</div>
                                <h3><?php echo $jumlah_donasi; ?></h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="message.php" class="text-decoration-none">
                            <div class="card-custom">
                                <div>Message</div>
                                <h3><?php echo $jumlah_pesan; ?></h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="donatur.php" class="text-decoration-none">
                            <div class="card-custom">
                                <div>Donatur</div>
                                <h3><?php echo $jumlah_donatur; ?></h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto">
        <div class="social">
            <a href="https://www.instagram.com/septia_rosalia39?igshid=MXM0cjIwbHlla3pkdA%3D%3D&utm_source=qr"><i class='bx bxl-instagram'></i></a>
            <a href="http://wa.me/82282126810"><i class='bx bxl-whatsapp'></i></a>
            <a href="mailto:septiarosalia493@gmail.com"><i class='bx bxs-envelope'></i></a>
        </div>
        <ul class="list">
            <li><a href="about.html">About Us</a></li>
            <li><a href="Contact_Us.html">Contact Us</a></li>
            <li><a href="">Target</a></li>
            <li><a href="">Donate</a></li>
        </ul>
        <p class="copyright">@ 2024 CareLink | All Rights Reserved</p>
    </footer>
    <!-- END Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>
</html>
