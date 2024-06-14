<?php
session_start();

// Buat koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carelink";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses saat tombol donate ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simpan data ke dalam sesi
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['jumlah_donasi'] = $_POST['jumlah_donasi'];
    $_SESSION['target_donasi'] = $_POST['target_donasi'];
    $_SESSION['notes'] = $_POST['notes'];
    $_SESSION['bukti_pembayaran'] = $_FILES['bukti_pembayaran']['name']; // Simpan nama file bukti pembayaran

    // Lokasi penyimpanan file bukti pembayaran
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["bukti_pembayaran"]["name"]);

    // Cek apakah file bukti pembayaran sudah diunggah
    if (move_uploaded_file($_FILES["bukti_pembayaran"]["tmp_name"], $target_file)) {
        echo "File bukti pembayaran " . htmlspecialchars(basename($_FILES["bukti_pembayaran"]["name"])) . " telah diunggah.";

        // Simpan detail donasi beserta lokasi file bukti pembayaran ke dalam database
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $jumlah_donasi = $_SESSION['jumlah_donasi'];
        $target_donasi = $_SESSION['target_donasi'];
        $notes = $_SESSION['notes'];
        $file_path = $target_file;

        $sql = "INSERT INTO donasi (nama, email, jumlah_donasi, target_donasi, catatan, file_path)
        VALUES ('$name', '$email', '$jumlah_donasi', '$target_donasi', '$notes', '$file_path')";

        if ($conn->query($sql) === TRUE) {
            echo "Data donasi berhasil disimpan ke database.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file bukti pembayaran.";
    }
    
    // Redirect ke halaman pembayaran
    header("Location: uploadPayment.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CARELINK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="style(1).css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .target-section h2.text-center {
            margin-top: 2rem; /* Adjust the value as needed */
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
            position: fixed;
            bottom: 0;
            width: 100%;
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

        .payment-info {
            margin-top: 7rem; /* To create space below the navbar */
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
          <div class="offcanvas-body">
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
          </div>
        </div>
      </div>
    </nav>

    <!-- Informasi Pembayaran -->
    <div class="container payment-info">
        <h2>Informasi Pembayaran</h2>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Donasi</h5>
                        <p class="card-text"><strong>Nama:</strong> <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></p>
                        <p class="card-text"><strong>Email:</strong> <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?></p>
                        <p class="card-text"><strong>Jumlah Donasi:</strong> <?php echo isset($_SESSION['jumlah_donasi']) ? $_SESSION['jumlah_donasi'] : ''; ?></p>
                        <p class="card-text"><strong>Target Donasi:</strong> <?php echo isset($_SESSION['target_donasi']) ? $_SESSION['target_donasi'] : ''; ?></p>
                        <p class="card-text"><strong>Catatan:</strong> <?php echo isset($_SESSION['notes']) ? $_SESSION['notes'] : ''; ?></p>
                        <?php if(isset($_SESSION['bukti_pembayaran'])): ?>
                            <p class="card-text"><strong>Bukti Pembayaran:</strong> <a href="<?php echo 'uploads/' . $_SESSION['bukti_pembayaran']; ?>"><?php echo $_SESSION['bukti_pembayaran']; ?></a></p>
                        <?php endif; ?>
                        <form action="uploadPayment.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="bukti_pembayaran" class="form-label">Unggah Bukti Pembayaran</label>
                                <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran">
                            </div>
                            <button type="submit" class="btn btn-primary">Proses Pembayaran</button>
                        </form>
                    </div>
                </div>
            </div>
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
              <a href="Target.html">Target</a>
          </li>
          <li>
            <a href="form_donate.php">Donate</a>
        </li>
      </ul>
    
      <p class="copyright">@ 2024 CareLink | All Rights Reserved</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>
