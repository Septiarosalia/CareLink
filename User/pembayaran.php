<?php
include ('koneksi.php');

// Mendapatkan data dari form
$name = $_POST['name'];
$email = $_POST['email'];
$amount = $_POST['amount'];
$target = $_POST['target'];
$notes = $_POST['notes'];

// Mendapatkan file yang diunggah
$file = $_FILES['file'];

// Direktori untuk menyimpan file yang diunggah
$uploadDirectory = "uploads/";

// Membuat direktori jika belum ada
if (!is_dir($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}

// Membuat nama unik untuk file yang diunggah
$uniqueFileName = $uploadDirectory . basename($file['name']);
$uploadStatus = move_uploaded_file($file['tmp_name'], $uniqueFileName);

if ($uploadStatus) {
    // Menyimpan data ke database
    $stmt = $conn->prepare("INSERT INTO payments (name, email, amount, target, notes, file_path) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $name, $email, $amount, $target, $notes, $uniqueFileName);

    if ($stmt->execute()) {
        echo "Payment proof uploaded successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Failed to upload file.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Bukti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="style-about-us.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
        }
        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .info {
            display: flex;
            margin: 10px 0;
        }
        .info label {
            font-weight: bold;
            width: 150px;
        }
        .info p {
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }
        .upload {
            margin: 20px 0;
        }
        button {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: none;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
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
            position: absolute;
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

    <div class="container">
        <h1>Bukti Pembayaran</h1>
        <form action="submit_donate.php" method="post" enctype="multipart/form-data">
        <?php
        // Retrieve data from form_donate.php
        $name = $_POST['name'];
        $email = $_POST['email'];
        $jumlah_donasi = $_POST['jumlah_donasi'];
        $target_donasi = $_POST['target_donasi'];
        $notes = $_POST['notes'];
        ?>
            <div class="info">
                <label for="name">Name:</label>
                <p id="name">John Doe</p>
                <input type="hidden" name="name" value="John Doe">
            </div>
            <div class="info">
                <label for="email">Email:</label>
                <p id="email">johndoe@example.com</p>
                <input type="hidden" name="email" value="johndoe@example.com">
            </div>
            <div class="info">
                <label for="amount">Jumlah Donasi:</label>
                <p id="amount">100.00</p>
                <input type="hidden" name="amount" value="100.00">
            </div>
            <div class="info">
                <label for="target">Target Donasi:</label>
                <p id="target">Education</p>
                <input type="hidden" name="target" value="Education">
            </div>
            <div class="info">
                <label for="notes">Catatan untuk Donasi:</label>
                <p id="notes">Thank you for this opportunity to donate!</p>
                <input type="hidden" name="notes" value="Thank you for this opportunity to donate!">
            </div>
            <div class="upload">
                <label for="file">Upload Payment Proof:</label>
                <input type="file" id="file" name="file" required>
            </div>
            <button type="submit">Konfirmasi</button>
        </form>
    </div>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="social">
            <a href="https://www.instagram.com/septia_rosalia39?igsh=MXM0cjIwbHlla3pkdA%3D%3D&utm_source=qr"><i class='bx bxl-instagram'></i></a>
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
    <!-- END Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
</body>
</html>