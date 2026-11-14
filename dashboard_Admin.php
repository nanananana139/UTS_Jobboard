<?php
session_start();
include 'koneksi.php';

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}

// Ambil semua data lowongan
$jml_job = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM jobs"))['total'];
?>

<!DOCTYPE html>
<html lang="id" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Admin JobBoard</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!-- CSS Template JobListing -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
<!-- Header Template -->
    <header id="header">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="index.php"><img src="img/logo.png" alt="JobBoard" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li><a href="index.php">Home</a></li>
                        <li class="menu-active"><a href="dashboard_admin.php">Dashboard Admin</a></li>
                        <li><a href="kelola_lowongan.php">Kelola Lowongan</a></li>
                        <li><a href="data_pelamar.php">Data Pelamar</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#modalLogout">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- Banner Template -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center" style="min-height: 280px; padding-top: 80px;">
                <div class="about-content col-lg-12 text-center">
                    <h1 class="text-white">JobBoard - Dashboard Admin</h1>
                    <p class="text-white">Selamat datang, <strong><?= htmlspecialchars($_SESSION['admin']) ?></strong> — Silakan pilih menu di bawah</p>
                </div>
            </div>
        </div>
    </section>

<!-- Konten Pilihan Menu -->
    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center">

                <!-- Opsi 1: Kelola Lowongan -->
                <div class="col-md-5 mb-4">
                    <div class="bg-white p-4 rounded shadow-sm text-center h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="mb-3">
                                <span class="lnr lnr-briefcase" style="font-size: 46px; color: #49e4fa;"></span>
                            </div>
                            <h3 class="mb-2">Kelola Lowongan</h3>
                            <p class="text-muted mb-3">
                                Tambah, edit, atau hapus daftar lowongan pekerjaan yang tersedia di website.
                            </p>
                            <p class="mb-4">
                                <span class="badge badge-info px-3 py-2">Total Lowongan: <?= $jml_job ?></span>
                            </p>
                        </div>
                        <a href="kelola_lowongan.php" class="genric-btn primary e-large btn-block radius">
                            Masuk ke Kelola Lowongan
                        </a>
                    </div>
                </div>

                <!-- Opsi 2: Data Pelamar -->
                <div class="col-md-5 mb-4">
                    <div class="bg-white p-4 rounded shadow-sm text-center h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="mb-3">
                                <span class="lnr lnr-users" style="font-size: 46px; color: #49e4fa;"></span>
                            </div>
                            <h3 class="mb-2">Data Pelamar Masuk</h3>
                            <p class="text-muted mb-4">
                                Lihat daftar pelamar yang sudah mengirimkan lamaran ke lowongan pekerjaan.
                            </p>
                        </div>
                        <a href="data_pelamar.php" class="genric-btn info e-large btn-block radius">
                            Lihat Data Pelamar
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Modal Konfirmasi Logout -->
    <div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin ingin keluar dari halaman ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="logout_admin.php" class="btn btn-danger">Ya, Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
</body>
</html>