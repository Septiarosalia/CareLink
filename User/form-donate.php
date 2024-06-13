<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Proof Submission - CareLink</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="style-donate.css" rel="stylesheet">
    <style>
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

        .submit-section {
            padding: 50px 0;
            background-color: #f8f9fa;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #0e4c92;
            border-color: #0e4c92;
        }

        .btn-primary:hover {
            background-color: #0c4287;
            border-color: #0c4287;
        }

        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(14, 76, 146, 0.5);
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
                    <a class="nav-link mx-lg-2" href="#" id="profileIcon">
                        <i class="fas fa-user"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- END Navbar -->

    <br><br><br>
    <!-- Payment Proof Submission Section -->
    <section class="submit-section">
        <div class="container">
            <div class="form-container">
                <h2 class="text-center mb-4">Bukti Pembayaran</h2>
                <form action="Home.html" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="proof" class="form-label">Upload Payment Proof</label>
                        <input type="file" class="form-control" id="proof" name="proof" accept="image/*,application/pdf" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="mb-3">
                        <label for="transaction_id" class="form-label">Transaction ID</label>
                        <input type="text" class="form-control" id="transaction_id" name="transaction_id" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
                    <div class="alert alert-success mt-4" role="alert">
                        Thank you for your submission!
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
