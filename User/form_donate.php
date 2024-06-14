<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; // Save current page URL for redirection after login
    header("Location: login.php");
    exit;
}

// Remaining code for form_donate.php
include(__DIR__ . '/../session_check.php');

// Proses saat tombol donate ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simpan data ke dalam sesi
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['jumlah_donasi'] = $_POST['jumlah_donasi'];
    $_SESSION['target_donasi'] = $_POST['target_donasi'];
    $_SESSION['notes'] = $_POST['notes'];

    // Redirect ke halaman pembayaran
    header("Location: pembayaran.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donate - CareLink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style-donate.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Navbar */
        .navbar {
            background-image: linear-gradient(to right, #0e4c92, #97a7d9);
            height: 80px;
            margin: 20px;
            border-radius: 16px;
        }
        .navbar-brand {
            font-weight: 500;
            color: rgb(113, 227, 227);
            font-size: 24px;
            transition: 0.3s color;
            padding: 0.5rem;
        }
        .navbar-toggler {
            border: none;
            font-size: 1.25rem;
        }
        .navbar-toggler:focus, .btn-close:focus {
            box-shadow: none;
            outline: none;
        }
        .nav-link {
            color: rgb(255, 255, 255);
            font-weight: 500;
            position: relative;
        }
        .nav-link:hover, .nav-link.active {
            color: #ffffff;
        }
        i.fas.fa-user {
            font-size: 1.5rem;
            color: #ffffff;
        }
        @media (min-width: 991px) {
            .nav-link::before {
                content: "";
                position: absolute;
                bottom: -2px;
                left: 0;
                width: 0;
                height: 2px;
                background-color: darkslategrey;
                visibility: hidden;
                transition: width 0.3s ease-in-out;
            }
            .nav-link:hover::before, .nav-link.active::before {
                width: 100%;
                visibility: visible;
            }
        }

        /* Donate Section */
        .donate-section {
            padding: 50px 0;
            background-image: linear-gradient(to left, #b8c7df, #dfdfe1);
        }
        .card {
            border: 1px solid #dee2e6;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            height: auto;
        }
        .card-title {
            color: #343a40;
            font-size: 1rem;
            font-weight: bold;
        }
        .card-text {
            color: #6c757d;
            font-size: 0.875rem;
        }
        .donate-section .btn-primary {
            background-color: #0e4c92;
            border-color: #0e4c92;
        }
        .donate-section .btn-primary:hover {
            background-color: #0c4287;
            border-color: #0c4287;
        }
        .donate-section .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(14, 76, 146, 0.5);
        }
        .donasi-sekarang {
            text-align: center;
            padding: 20px 0;
            margin-bottom: 30px;
        }
        .card {
            margin-top: -130px;
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

    <section class="donate-section">
        <div class="container text-left-align">
            <section class="donasi-sekarang text-center py-5 mt-5">
                <h2>Donasi Sekarang</h2>
            </section>
            <br><br><br>
            <div class="card">
                <div class="card-body">
                    <form action="form_donate.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <div id="nameHelp" class="form-text">Nama bisa dikosongkan jika ingin anonim</div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Email opsional</div>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_donasi" class="form-label">Jumlah Donasi</label>
                            <input type="number" class="form-control" id="jumlah_donasi" name="jumlah_donasi" required>
                        </div>
                        <div class="mb-3">
                            <label for="target_donasi" class="form-label">Target Donasi</label>
                            <select class="form-select" id="target_donasi" name="target_donasi" required>
                                <option selected>Pilih Target Donasi</option>
                                <option value="Anak Yatim">Anak Yatim</option>
                                <option value="Warga Tidak Mampu">Warga Tidak Mampu</option>
                                <option value="Dana Sosial">Dana Sosial</option>
                                <option value="Bantuan Bencana">Bantuan Bencana</option>
                                <option value="Bantuan Medis">Bantuan Medis</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">Notes</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                            <div id="notesHelp" class="form-text">Catatan opsional</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Donate</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="social">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
        </div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Privacy Policy</a></li>
        </ul>
        <p>&copy; 2023 CareLink. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
