<?php
include('includes/header.php'); 
include('koneksi.php'); // Sertakan koneksi database dengan jalur yang benar

// // Query untuk menghitung total pesan
// $sql_count = "SELECT COUNT(*) as total_messages FROM contacts";
// $result_count = $conn->query($sql_count);
// $total_messages = 0;

// if ($result_count->num_rows > 0) {
//     $row_count = $result_count->fetch_assoc();
//     $total_messages = $row_count['total_messages'];
// }

// // Query untuk menghitung total jumlah donasi
// $sql_sum_donasi = "SELECT SUM(jumlah_donasi) as total_donasi FROM donasi";
// $result_sum_donasi = $conn->query($sql_sum_donasi);
// $total_donasi = 0;

// if ($result_sum_donasi->num_rows > 0) {
//     $row_sum_donasi = $result_sum_donasi->fetch_assoc();
//     $total_donasi = $row_sum_donasi['total_donasi'];
// }
// ?>

<title>Contact Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="style-contact-us.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    
    .contact-section {
      padding-top: 120px; /* Adjust this value based on the height of your navbar */
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

    <div class="container">
        <div class="main-content">
            <h1>Dashboard</h1>
            <p>Welcome to the dashboard!</p>

            <div class="dashboard-info">
                <div class="info-box">
                    <h3><i class="fas fa-envelope"></i> <a href="message.php">Messages</a></h3>
                    <div class="info-content">
                        <p><?php echo $total_messages; ?></p>
                    </div>
                </div>
                <div class="info-box">
                    <h3><i class="fas fa-donate"></i> <a href="donate.php">Donations</a></h3>
                    <div class="info-content">
                        <p><?php echo $total_donasi; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include('includes/footer.php'); ?>
</body>
</html>