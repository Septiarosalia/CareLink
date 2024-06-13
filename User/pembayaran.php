<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pembayaran</title>
</head>
<body>
    <h1>Status Pembayaran</h1>
    <p>Terima kasih telah melakukan donasi.</p>

    <!-- Form untuk mengunggah bukti transfer -->
    <form action="upload_bukti_transfer.php" method="post" enctype="multipart/form-data">
        <label for="bukti_transfer">Upload Bukti Transfer:</label>
        <input type="file" id="bukti_transfer" name="bukti_transfer" required><br><br>

        <!-- Tambahkan hidden input untuk meneruskan data yang dibutuhkan, misalnya id transaksi -->
        <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>">

        <button type="submit">Upload Bukti Transfer</button>
    </form>
</body>
</html>