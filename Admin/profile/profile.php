<?php
include ('koneksi.php');

// Menangani unggahan gambar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Periksa apakah berkas gambar adalah gambar asli atau palsu
    $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Periksa apakah berkas sudah ada
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Periksa ukuran berkas
    if ($_FILES["profile_picture"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Hanya perbolehkan format tertentu
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Periksa apakah $uploadOk diatur ke 0 oleh kesalahan
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // Jika semuanya baik-baik saja, coba unggah berkas
    } else {
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            $sql = "UPDATE admins SET profile_picture='" . basename($_FILES["profile_picture"]["name"]) . "' WHERE id=1";
            if ($conn->query($sql) === TRUE) {
                echo "The file " . htmlspecialchars(basename($_FILES["profile_picture"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error updating your profile picture.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$sql = "SELECT * FROM admins WHERE id = 1";
$result = $conn->query($sql);

$admin = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="profile/styles.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <h1>Admin Profile</h1>
        </div>
        <div class="profile-content">
            <img src="images/<?php echo $admin['profile_picture']; ?>" alt="Profile Picture" class="profile-picture">
            <div class="profile-details">
                <h2><?php echo $admin['name']; ?></h2>
                <p><strong>Email:</strong> <?php echo $admin['email']; ?></p>
                <p><strong>Phone:</strong> <?php echo $admin['phone']; ?></p>
                <p><strong>Address:</strong> <?php echo $admin['address']; ?></p>
            </div>
        </div>
        <div class="upload-form">
            <h2>Upload New Profile Picture</h2>
            <form action="profile.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="profile_picture" id="profile_picture">
                <input type="submit" value="Upload Image" name="submit">
            </form>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>