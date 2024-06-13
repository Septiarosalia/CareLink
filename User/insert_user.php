<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carelink";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example user
$username = "user1";
$password = password_hash("password1", PASSWORD_DEFAULT);

// Insert user
$sql = "INSERT INTO user (username, password, role) VALUES ('$username', '$password', 'user')";
if ($conn->query($sql) === TRUE) {
    echo "New user created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Example admin
$username = "admin1";
$password = password_hash("password2", PASSWORD_DEFAULT);

// Insert admin
$sql = "INSERT INTO user (username, password, role) VALUES ('$username', '$password', 'admin')";
if ($conn->query($sql) === TRUE) {
    echo "New admin created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
