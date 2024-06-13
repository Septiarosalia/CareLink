<?php
include('koneksi.php');

// Pastikan ada id transaksi yang diteruskan dari pembayaran.php atau data yang sesuai dengan struktur Anda
$id_transaksi = $_POST['id_transaksi'];

// Mendapatkan file yang diunggah
$file = $_FILES['bukti_transfer'];

// Direktori untuk menyimpan file yang diunggah
$uploadDirectory = "uploads/";

// Membuat direktori jika belum ada
if (!is_dir($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}

// Membuat nama unik untuk file yang diunggah
$uniqueFileName = $uploadDirectory . basename($file['name']);
$uploadStatus = move_uploaded_file($file['tmp_name'], $uniqueFileName);

if ($uploadStatus) {
    // Menyimpan path file bukti transfer ke database sesuai id transaksi
    $stmt = $conn->prepare("UPDATE payments SET bukti_transfer = ? WHERE id_transaksi = ?");
    $stmt->bind_param("si", $uniqueFileName, $id_transaksi);

    if ($stmt->execute()) {
        echo "Bukti transfer berhasil diunggah.";
        // Redirect atau tampilkan pesan sukses sesuai kebutuhan
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Failed to upload file.";
}

$conn->close();
?>