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
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
            overflow: auto;
        }
        body::after {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('background.jpg');
            background-size: cover;
            background-position: center;
            opacity: 0.3; /* Adjust the opacity to make the background image semi-transparent */
            z-index: -1;
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
                    <th colspan="5" class="text-center text-black table-heading">Messages from Users</th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Notes</th>
                    <th class="actions-column">Actions</th> <!-- Add custom class to header -->
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

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST["mark_read_id"])) {
                        $mark_read_id = $_POST["mark_read_id"];
                        $update_sql = "UPDATE contacts SET read_status = 1 WHERE id = ?";
                        $stmt = $conn->prepare($update_sql);
                        $stmt->bind_param("i", $mark_read_id);
                        $stmt->execute();
                        $stmt->close();
                    } elseif (isset($_POST["delete_id"])) {
                        $delete_id = $_POST["delete_id"];
                        $delete_sql = "DELETE FROM contacts WHERE id = ?";
                        $stmt = $conn->prepare($delete_sql);
                        $stmt->bind_param("i", $delete_id);
                        $stmt->execute();
                        $stmt->close();
                    }
                }

                $sql = "SELECT * FROM contacts";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $read_status = $row["read_status"] ? "<span class='read-status'>Read</span>" : "";
                        $mark_button_text = $row["read_status"] ? "Read" : "Mark as Read";
                        $mark_button_disabled = $row["read_status"] ? "disabled" : "";
                        $delete_button_disabled = $row["read_status"] ? "" : "disabled";
                        echo "<tr>
                                <td>" . $row["name"] . "</td>
                                <td>" . $row["email"] . "</td>
                                <td>" . $row["subject"] . "</td>
                                <td>" . $row["notes"] . "</td>
                                <td class='actions-column'> <!-- Add custom class to cells -->
                                    <form method='post' style='display:inline;'>
                                        <input type='hidden' name='mark_read_id' value='" . $row["id"] . "'>
                                        <button type='submit' class='btn btn-primary btn-sm' $mark_button_disabled>$mark_button_text</button>
                                    </form>
                                    <form method='post' style='display:inline;'>
                                        <input type='hidden' name='delete_id' value='" . $row["id"] . "'>
                                        <button type='submit' class='btn btn-danger btn-sm' $delete_button_disabled>Delete</button>
                                    </form>
                                    $read_status
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No messages found</td></tr>";
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
</body>
</html>
