<?php
session_start();

// Proses saat tombol donate ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simpan data ke dalam sesi
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['jumlah_donasi'] = $_POST['jumlah_donasi'];
    $_SESSION['target_donasi'] = $_POST['target_donasi'];
    $_SESSION['notes'] = $_POST['notes'];
    $_SESSION['bukti_pembayaran'] = $_FILES['bukti_pembayaran']['name']; // Simpan nama file bukti pembayaran

    // Lokasi penyimpanan file bukti pembayaran
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["bukti_pembayaran"]["name"]);

    // Cek apakah file bukti pembayaran sudah diunggah
    if (move_uploaded_file($_FILES["bukti_pembayaran"]["tmp_name"], $target_file)) {
        echo "File bukti pembayaran " . htmlspecialchars(basename($_FILES["bukti_pembayaran"]["name"])) . " telah diunggah.";
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file bukti pembayaran.";
    }
    
    // Redirect ke halaman pembayaran
    header("Location: pembayaran.php");
    exit;
}
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
    <!-- Navbar -->
    <!-- Navbar code here -->
    <!-- End Navbar -->

    <div class="container">
        <h1>Informasi Pembayaran</h1>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Donasi</h5>
                        <p class="card-text"><strong>Nama:</strong> <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></p>
                        <p class="card-text"><strong>Email:</strong> <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?></p>
                        <p class="card-text"><strong>Jumlah Donasi:</strong> <?php echo isset($_SESSION['jumlah_donasi']) ? $_SESSION['jumlah_donasi'] : ''; ?></p>
                        <p class="card-text"><strong>Target Donasi:</strong> <?php echo isset($_SESSION['target_donasi']) ? $_SESSION['target_donasi'] : ''; ?></p>
                        <p class="card-text"><strong>Catatan:</strong> <?php echo isset($_SESSION['notes']) ? $_SESSION['notes'] : ''; ?></p>
                        <?php if(isset($_SESSION['bukti_pembayaran'])): ?>
                            <p class="card-text"><strong>Bukti Pembayaran:</strong> <a href="<?php echo 'uploads/' . $_SESSION['bukti_pembayaran']; ?>"><?php echo $_SESSION['bukti_pembayaran']; ?></a></p>
                        <?php endif; ?>
                        <form action="uploadPayment.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="bukti_pembayaran" class="form-label">Unggah Bukti Pembayaran</label>
                                <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran">
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
