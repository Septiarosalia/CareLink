<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carelink";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch donations from database
$sql = "SELECT * FROM donations";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row["id"]."</td>
            <td>".$row["name"]."</td>
            <td>".$row["email"]."</td>
            <td>".$row["date_time"]."</td>
            <td>".$row["amount"]."</td>
            <td>".$row["notes"]."</td>
            <td>";

        // Check validation status and display button accordingly
        if ($row["validation_status"] == "validated") {
            echo "Validated";
        } else {
            echo "<button class='validate-btn' data-donation-id='".$row["id"]."'>Validate Payment</button>";
        }

        echo "</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No donations found</td></tr>";
}

$conn->close();
?>
