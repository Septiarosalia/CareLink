<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donate - CareLink</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

        .navbar-toggler:focus,
        .btn-close:focus {
            box-shadow: none;
            outline: none;
        }

        .nav-link {
            color: rgb(255, 255, 255);
            font-weight: 500;
            position: relative;
        }

        .nav-link:hover,
        .nav-link.active {
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

            .nav-link:hover::before,
            .nav-link.active::before {
                width: 100%;
                visibility: visible;
            }
        }

        /* Donate Section */
        .donate-section {
            padding: 50px 0; /* Adjusted padding */
            background-image: linear-gradient(to left, #b8c7df, #dfdfe1);
        }

        /* Card dalam Donate */
        .card {
            border: 1px solid #dee2e6; /* Garis tepi */
            border-radius: 10px; /* Sudut bulat */
            background-color: white; /* Warna latar belakang kartu */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan */
            height: auto; /* Tinggi kartu */
        }

        /* CSS untuk judul kartu */
        .card-title {
            color: #343a40; /* Warna teks judul */
            font-size: 1rem; /* Ukuran font judul */
            font-weight: bold; /* Ketebalan font judul */
        }

        /* CSS untuk teks dalam kartu */
        .card-text {
            color: #6c757d; /* Warna teks konten */
            font-size: 0.875rem; /* Ukuran font teks */
        }

        .donate-section .btn-primary {
            background-color: #0e4c92; /* Button background color */
            border-color: #0e4c92; /* Button border color */
        }

        .donate-section .btn-primary:hover {
            background-color: #0c4287; /* Button hover background color */
            border-color: #0c4287; /* Button hover border color */
        }

        .donate-section .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(14, 76, 146, 0.5); /* Button focus shadow color */
        }

        .donasi-sekarang {
            text-align: center;
            padding: 20px 0; /* Adjusted padding */
            margin-bottom: 30px; /* Adjusted margin-bottom */
        }

        .card {
            margin-top: -130px; /* Adjusted margin-top */
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

            <!-- Profile Icon -->
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
                    <div class="row">
                        <div class="col">
                            <form action="submit_donate.php" method="post">
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
                                        <option value="" disabled selected>Pilih target donasi</option>
                                        <option value="DESA BERDAYA">DESA BERDAYA</option>
                                        <option value="Pendidikan">Pendidikan</option>
                                        <option value="Ekonomi">Ekonomi</option>
                                        <option value="Panti Asuhan">Panti Asuhan</option>
                                        <option value="Rumah Ibadah">Rumah Ibadah</option>
                                        <option value="Lingkungan">Lingkungan</option>
                                        <option value="Kebencanaan">Kebencanaan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="notes" class="form-label">Catatan untuk Donasi</label>
                                    <div class="form-floating">
                                        <textarea class="form-control" id="notes" name="notes"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Donate</button>
                            </form>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
