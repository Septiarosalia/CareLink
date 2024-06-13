<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Donasi - CareLink</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Navbar */
        .navbar {
            background-image: linear-gradient(to right, #0e4c92, #97a7d9);
            height: 80px;
            margin: 20px;
            border-radius: 16px;
        }

        .navbar-brand {
            font-weight: 500;
            color: rgb(113, 227, 227);
            font-size: 24px;
            transition: 0.3s color;
            padding: 0.5rem;
        }

        .navbar-toggler {
            border: none;
            font-size: 1.25rem;
        }

        .navbar-toggler:focus,
        .btn-close:focus {
            box-shadow: none;
            outline: none;
        }

        .nav-link {
            color: rgb(255, 255, 255);
            font-weight: 500;
            position: relative;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #ffffff;
        }

        i.fas.fa-user {
            font-size: 1.5rem;
            color: #ffffff;
        }

        @media (min-width: 991px) {
            .nav-link::before {
                content: "";
                position: absolute;
                bottom: -2px;
                left: 0;
                width: 0;
                height: 2px;
                background-color: darkslategrey;
                visibility: hidden;
                transition: width 0.3s ease-in-out;
            }

            .nav-link:hover::before,
            .nav-link.active::before {
                width: 100%;
                visibility: visible;
            }
        }

        /* Donate Section */
        .donate-section {
            padding: 50px 0; /* Adjusted padding */
            background-image: linear-gradient(to left, #b8c7df, #dfdfe1);
        }

        /* CSS untuk tabel donasi */
        .donation-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .donation-table th,
        .donation-table td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }

        .donation-table th {
            background-color: #0e4c92;
            color: white;
        }

        .donation-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .donasi-sekarang {
            text-align: center;
            padding: 20px 0;
            margin-bottom: 30px;
        }
    </style>
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
                            <a class="nav-link mx-lg-2" href="Contact_Us.html">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="Target.html">Target</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="form_donate.php">Donate</a>
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
            <section class="donasi-sekarang text-center py-5 mt-5">
                <h2>Riwayat Donasi</h2>
            </section>
            <br><br><br>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <?php
                            include("koneksi.php");

                            $result = $connect->query("SELECT * FROM log_donasi");
                            if ($result->num_rows > 0) {
                                echo '<table class="donation-table">';
                                echo '<thead><tr><th>Nama</th><th>Email</th><th>Jumlah Donasi</th><th>Target Donasi</th><th>Catatan Untuk Donasi</th></tr></thead>';
                                echo '<tbody>';
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $row["name"] . '</td>';
                                    echo '<td>' . $row["email"] . '</td>';
                                    echo '<td>' . $row["jumlah_donasi"] . '</td>';
                                    echo '<td>' . $row["target_donasi"] . '</td>';
                                    echo '<td>' . $row["catatan_untuk_donasi"] . '</td>';
                                    echo '</tr>';
                                }
                                echo '</tbody>';
                                echo '</table>';
                            } else {
                                echo "Tidak ada riwayat donasi.";
                            }
                            ?>
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