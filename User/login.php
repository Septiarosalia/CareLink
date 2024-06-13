<?php
	session_start();
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
        
        $usr 	= $_POST['username'];
        $pwd 	= $_POST['password'];
        
        $qLogin 	= mysqli_query($conn, "SELECT * FROM user WHERE username='$usr' AND password='$pwd'");
        $row 		= mysqli_num_rows($qLogin);
        
        if($row > 0){
            $login = mysqli_fetch_assoc($qLogin);
            $_SESSION['username'] = $username;
            $success_message = "Login berhasil";
        } else{
            $error_message = "Error : Login tidak valid. Silakan register!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="card shadow-lg p-4">
            <div class="card-body text-center">
                <div class="avatar mb-4">
                    <img src="profil.jpeg" alt="User Avatar" class="rounded-circle shadow">
                </div>
                <h2 class="card-title mb-4">Login to Your Account</h2>
                <?php
                    if($error_message != "") {
                        echo "<div class='alert alert-danger' role='alert'>".$error_message."</div>";
                    } else if($success_message != "") {
                        echo "<div class='alert alert-success' role='alert'>".$success_message."</div>";
                    }
                ?>
                <form action="login.php" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg btn-block">Login</button>
                    <div class="card-footer mt-3">
                        <a href="register.html">Don't have an account? Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
