<?php
session_start();
include 'koneksi.php';

// Cek login admin
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}

$error = "";

if (isset($_POST['simpan'])) {
    $judul       = $_POST['judul_posisi'];
    $perusahaan  = $_POST['nama_perusahaan'];
    $deskripsi   = $_POST['deskripsi'];
    $persyaratan = $_POST['persyaratan'];
    $lokasi      = $_POST['lokasi'];
    $kategori    = $_POST['kategori'];
    $tipe        = $_POST['tipe'];
    $gaji_min    = $_POST['gaji_min'];
    $gaji_max    = $_POST['gaji_max'];
    $status      = $_POST['status'];

    $query = "INSERT INTO jobs
    (judul_posisi, nama_perusahaan, deskripsi, persyaratan,
    lokasi, kategori, tipe, gaji_min, gaji_max, status)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param(
        $stmt, "sssssssdds",
        $judul, $perusahaan, $deskripsi, $persyaratan,
        $lokasi, $kategori, $tipe, $gaji_min, $gaji_max, $status
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: dashboard_admin.php");
        exit;
    } else {
        $error = "Gagal menambahkan lowongan!";
    }
}
?>
<!DOCTYPE html>
<html lang="id" class="no-js">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <title>JobBoard - Tambah Lowongan</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <header id="header">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="dashboard_admin.php">Dashboard Admin</a></li>
                </ul>
            </nav>
            </div>
        </div>
    </header>

    <section class="banner-area relative" id="home">    
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">Tambah Lowongan Baru</h1>
                    <p class="text-white link-nav"><a href="dashboard_admin.php">Dashboard Admin </a> <span class="lnr lnr-arrow-right"></span> <a href="tambah_job.php"> Tambah Lowongan</a></p>
                </div>                                          
            </div>
        </div>
    </section>

    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <?php if ($error != ""): ?>
                        <div class="alert alert-danger"><?= $error; ?></div>
                    <?php endif; ?>
                    
                    <form action="" method="POST" class="form-wrap">
                        <h3 class="mb-30">Form Input Pekerjaan (Admin)</h3>
                        
                        <div class="form-group">
                            <label><strong>Judul Posisi</strong></label>
                            <input type="text" name="judul_posisi" class="form-control" placeholder="Contoh: Frontend Developer" required>
                        </div>

                        <div class="form-group">
                            <label><strong>Nama Perusahaan</strong></label>
                            <input type="text" name="nama_perusahaan" class="form-control" placeholder="Contoh: PT Maju Bersama" required>
                        </div>

                        <div class="form-group">
                            <label><strong>Deskripsi</strong></label>
                            <textarea name="deskripsi" class="form-control" rows="4" placeholder="Tuliskan deskripsi pekerjaan..." required></textarea>
                        </div>

                        <div class="form-group">
                            <label><strong>Persyaratan</strong></label>
                            <textarea name="persyaratan" class="form-control" rows="4" placeholder="Tuliskan syarat dan kualifikasi..."></textarea>
                        </div>

                        <div class="form-group">
                            <label><strong>Lokasi</strong></label>
                            <input type="text" name="lokasi" class="form-control" placeholder="Contoh: jakarta-selatan" required>
                        </div>

                        <div class="form-group">
                            <label><strong>Kategori</strong></label>
                            <input type="text" name="kategori" class="form-control" placeholder="Contoh: design / development / finance" required>
                        </div>

                        <div class="form-group">
                            <label><strong>Tipe Pekerjaan</strong></label>
                            <select name="tipe" class="form-control" required>
                                <option value="full-time">Full Time</option>
                                <option value="part-time">Part Time</option>
                                <option value="contract">Contract</option>
                                <option value="internship">Internship</option>
                                <option value="freelance">Freelance</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><strong>Gaji Minimum</strong></label>
                            <input type="number" name="gaji_min" class="form-control" min="0" value="0">
                        </div>

                        <div class="form-group">
                            <label><strong>Gaji Maksimum</strong></label>
                            <input type="number" name="gaji_max" class="form-control" min="0" value="0">
                        </div>

                        <div class="form-group">
                            <label><strong>Status</strong></label>
                            <select name="status" class="form-control">
                                <option value="Buka">Buka</option>
                                <option value="Tutup">Tutup</option>
                            </select>
                        </div>

                        <button type="submit" name="simpan" class="genric-btn primary e-large btn-block mt-20">Simpan Lowongan</button>
                        <a href="dashboard_admin.php" class="genric-btn default e-large btn-block mt-10">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>
</html>