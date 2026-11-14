<?php
session_start();

// Kalau sudah login, langsung arahkan ke halaman utama (home.php)
if (isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>JobBoard - Cari Kerja di Jabodetabek</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- CSS Template JobListing -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">

    <style>
        body.landing {
            font-family: 'Poppins', sans-serif;
            color: #555;
        }

        /* Banner */
        .landing-banner .landing-logo {
            display: block;
            height: 64px;
            width: auto;
            margin: 0 auto 28px;
        }

        .landing-banner h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 46px;
            font-weight: 600;
            line-height: 1.25;
            letter-spacing: -0.5px;
            margin-bottom: 14px;
        }

        .landing-banner p {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            font-weight: 300;
            line-height: 1.6;
            margin: 0;
        }

        /* Penjelasan */
        .landing-about h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 28px;
            font-weight: 600;
            color: #222;
            margin-bottom: 18px;
        }

        .landing-about p {
            max-width: 560px;
            margin: 0 auto 32px;
            font-size: 16px;
            font-weight: 400;
            line-height: 1.85;
            color: #666;
        }

        /* Login / Sign Up di kanan atas */
        .landing-nav {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 5;
            padding: 24px 0;
        }

        .landing-nav .nav-links {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 14px;
        }

        .landing-nav a {
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            font-weight: 500;
            line-height: 1;
            border-radius: 6px;
            transition: background .2s ease, color .2s ease;
        }

        .landing-nav a.nav-login {
            color: #fff;
            padding: 11px 18px;
        }

        .landing-nav a.nav-login:hover {
            background: rgba(255, 255, 255, .18);
        }

        .landing-nav a.nav-signup {
            color: #6a4df0;
            background: #fff;
            padding: 11px 22px;
        }

        .landing-nav a.nav-signup:hover {
            background: #49dff1;
            color: #fff;
        }

        .landing-nav a:focus-visible {
            outline: 3px solid #49dff1;
            outline-offset: 2px;
        }

        @media (max-width: 767px) {
            .landing-banner h1 { font-size: 32px; }
            .landing-banner p  { font-size: 16px; }
            .landing-banner .landing-logo { height: 52px; }
        }
        #header {
            position: fixed !important;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999 !important;
            background-color: rgba(124, 105, 239, 0.95) !important; /* Warna ungu berlatar */
            backdrop-filter: blur(8px);
            padding: 15px 0 !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15) !important;
        }        
    </style>
</head>

<body class="landing">

    <!-- Banner -->
    <section class="banner-area relative landing-banner" id="home">
        <div class="overlay overlay-bg"></div>

        <nav class="landing-nav">
            <div class="container">
                <div class="nav-links">
                    <a href="login.php" class="nav-login">Login</a>
                    <a href="register.php" class="nav-signup">Sign Up</a>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row d-flex align-items-center justify-content-center"
                 style="min-height: 540px; padding: 110px 0 90px;">

                <div class="banner-content col-lg-12 text-center">
                    <img src="img/logo.png" alt="JobBoard" class="landing-logo">

                    <h1 class="text-white">
                        Selamat Datang di JobBoard
                    </h1>

                    <p class="text-white">
                        Temukan pekerjaan yang sesuai untukmu di Jabodetabek
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Penjelasan Singkat + Pilihan Login / Sign Up -->
    <div class="container mt-5 mb-5 landing-about">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">

                <h3>Apa itu JobBoard?</h3>

                <p>
                    JobBoard adalah website pencarian kerja untuk wilayah
                    Jakarta, Bogor, Depok, Tangerang, dan Bekasi.
                    Lihat lowongan terbaru, pilih yang cocok dengan keahlian
                    dan lokasimu, lalu lamar langsung dari sini.
                </p>

            </div>
        </div>
    </div>

</body>
</html>