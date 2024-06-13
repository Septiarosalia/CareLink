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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php include('includes/sidebar.php'); ?>
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