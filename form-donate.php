<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donate - CareLink</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="style-donate.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Logo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body d-flex justify-content-between align-items-center">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" aria-current="page" href="Home.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="About Us.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="Contact Us.html">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="Target.html">Target</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="Donate.html">Donate</a>
                        </li>
                    </ul>

                    <!-- Profile Icon -->
                    <a class="nav-link mx-lg-2" href="#" id="profileIcon">
                        <i class="fas fa-user"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- END Navbar -->
    <section class="donate-section">
    <div class="container text-left-align">
        <br><br><br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <?php

                            include ("koneksi.php");

                            if(isset($_GET['id'])) {
                                $id_donasi = $_GET['id'];
                                $result = $connect->query("SELECT * FROM donasi WHERE id_donasi = $id_donasi");
                                $donasi = $result->fetch_assoc();
                            }

                            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $name = $_POST['name'] == null ? "Anonim": $_POST['name'];
                                $email = $_POST['email'] == null ? NULL : $_POST['email'];
                                $id = $_POST['id_donasi'];
                                $jumlah_donasi = $_POST['jumlah_donasi'];
                                $catatan = $_POST['catatan'] == null ? NULL : $_POST['catatan'];
                    
                                $statement = $connect->prepare("INSERT INTO log_donasi VALUES (NULL,?,?,NOW(),?,?,?)");
                                $statement->bind_param("sidss", $name, $id, $jumlah_donasi, $email, $catatan);
                                if($statement->execute()) {
                                    echo "<br><br>Penduduk baru berhasil ditambahkan!";
                                } else {
                                    echo "Error : " . $statement->error;
                                }
                                $statement->close();
                                header("Location: data.php");
                                exit;
                            }
                            
                        ?>
                        <h1>Buat Donasi untuk <?php echo $donasi['nama_donasi']; ?></h1>
                        <form action="form-donate.php" method="post">
                            <input type="text" class="form-control" name="id_donasi" id="id_donasi" value="<?php echo $donasi['id_donasi']; ?>" hidden>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                                <div id="nameHelp" class="form-text">Nama bisa dikosongkan jika ingin anonim</div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Email opsional</div>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_donasi" class="form-label">Jumlah Donasi</label>
                                <input type="number" class="form-control" id="jumlah_donasi" name="jumlah_donasi" required>
                            </div>
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan untuk Donasi</label>
                                <div class="form-floating">
                                    <textarea class="form-control" id="catatan" name="catatan"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Donate</button>
                        </form>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
