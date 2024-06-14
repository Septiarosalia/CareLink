<?php
session_start();

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

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO donations (name, email, amount, target, notes, file_path) VALUES (?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    die('Error: ' . $conn->error);
}

$stmt->bind_param("ssdsss", $name, $email, $amount, $target, $notes, $file_path);

// Set parameters
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$amount = isset($_SESSION['jumlah_donasi']) ? $_SESSION['jumlah_donasi'] : '';
$target = isset($_SESSION['target_donasi']) ? $_SESSION['target_donasi'] : '';
$notes = isset($_SESSION['notes']) ? $_SESSION['notes'] : '';

// File upload handling
if(isset($_FILES["file"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Check if file is a valid image
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $file_path = $target_file;
            $stmt->execute();
            // JavaScript code to show a popup notification and redirect to form_donate.php
            echo "<script>alert('Pembayaran berhasil dan file diunggah.'); window.location.href = 'form_donate.php';</script>";
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    } else {
        echo "File bukan gambar yang valid.";
    }
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - CareLink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style-pembayaran.css">
</head>

<body>
    <div class="container">
        <h1>Informasi Pembayaran</h1>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Donasi</h5>
                        <p class="card-text"><strong>Nama:</strong> <?php echo $name; ?></p>
                        <p class="card-text"><strong>Email:</strong> <?php echo $email; ?></p>
                        <p class="card-text"><strong>Jumlah Donasi:</strong> <?php echo $amount; ?></p>
                        <p class="card-text"><strong>Target Donasi:</strong> <?php echo $target; ?></p>
                        <p class="card-text"><strong>Catatan:</strong> <?php echo $notes; ?></p>
                        <!-- File upload handling form -->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="file" class="form-label">Unggah Bukti Pembayaran</label>
                                <input type="file" class="form-control" id="file" name="file">
                            </div>
                            <button type="submit" class="btn btn-primary">Proses Pembayaran</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
