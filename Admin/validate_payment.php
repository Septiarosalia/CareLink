<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carelink";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $donationId = $_POST['id'];

    $sql = "UPDATE donasi SET validation_status = 'valid' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $donationId);

    if ($stmt->execute()) {
        echo "Validation updated successfully";
    } else {
        echo "Error updating validation: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
