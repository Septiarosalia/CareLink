<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carelink";

// Initialize variables for messages
$success_message = $error_message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $jumlah_donasi = $_POST['jumlah_donasi'];
    $target_donasi = $_POST['target_donasi'];
    $catatan = $_POST['catatan'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, jumlah_donasi, target_donasi, catatan) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $jumlah_donasi, $target_donasi, $catatan);

    // Execute the statement
    if ($stmt->execute()) {
        $success_message = "For contacting us! We'll get back to you soon.";
    } else {
        $error_message = "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="style-contact-us.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            font-family: Poppins, sans-serif;
            background-image: url('background.jpg');
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .container {
            max-width: 500px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input, 
        .form-group textarea {
            width: calc(100% - 12px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group textarea {
            height: 100px;
            resize: none;
        }
        .form-group input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .success-message {
            text-align: center;
            color: black;
            margin-top: 20px;
        }
        .error-message {
            text-align: center;
            color: #ff0000;
            margin-top: 20px;
        }
        .footer {
            background-image: url('background.jpg');
            opacity: 0.8;
            background-color: black;
            color: white;
            text-align: center;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: auto;
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
            <a class="nav-link mx-lg-2" href="#" id="profileIcon">
              <i class="fas fa-user"></i>
            </a>
          </div>
        </div>
      </div>
    </nav>
    <!-- END Navbar -->

<div class="container">
    <h2>Thank You</h2>
    <?php if(!empty($success_message)): ?>
        <div class="success-message"><?php echo $success_message; ?></div>
    <?php endif; ?>
    <?php if(!empty($error_message)): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <?php if(empty($success_message)): ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="nama_donatur" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email_donatur" name="email" required>
            </div>
            <div class="form-group">
                <label for="donation_amount">Donation Amount:</label>
                <input type="text" id="jumlah_donasi" name="donation_amount" required>
            </div>
            <div class="form-group">
                <label for="donation_target">Donation Target:</label>
                <input type="text" id="target_donasi" name="donation_target" required>
            </div>
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea id="comment" name="catatan" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    <?php endif; ?>
</div>

<footer class="footer">
    <div class="social">
        <a href="https://www.instagram.com/septia_rosalia39?igsh=MXM0cjIwbHlla3pkdA%3D%3D&utm_source=qr"><i class='bx bxl-instagram'></i></a>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMv7a4Wmri0sO6FZ20P6mxsmF5upmC6uaImW6B" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ZT0sImRNNtnn6iD69kC4A1IdCBzBQHmkNC1GdT0MAvpGI7YwU7uhDVxrHiH9fuQ" crossorigin="anonymous"></script>
</body>
</html>
