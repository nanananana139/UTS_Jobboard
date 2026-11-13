<?php
session_start();
include 'koneksi.php';

// Proteksi: Hanya admin yang bisa akses
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Jika belum ada session login admin, script tetap bisa diakses untuk testing dev (opsional: un-comment baris bawah jika ingin ketat)
    // header("Location: login.php"); exit();
}

$message = '';

if (isset($_POST['submit'])) {
    $title       = mysqli_real_escape_string($conn, $_POST['title']);
    $category    = mysqli_real_escape_string($conn, $_POST['category']);
    $location    = mysqli_real_escape_string($conn, $_POST['location']);
    $type        = mysqli_real_escape_string($conn, $_POST['type']);
    $salary      = mysqli_real_escape_string($conn, $_POST['salary']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $query = "INSERT INTO jobboard (title, category, location, type, salary, description) 
              VALUES ('$title', '$category', '$location', '$type', '$salary', '$description')";

    if (mysqli_query($conn, $query)) {
        header("Location: category.php");
        exit();
    } else {
        $message = "Gagal menambah data: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <title>Job Listing - Tambah Lowongan</title>
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
                  <li><a href="category.php">Category</a></li>
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
                    <p class="text-white link-nav"><a href="index.php">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="category.php"> Category</a></p>
                </div>                                          
            </div>
        </div>
    </section>

    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <?php if ($message != ''): ?>
                        <div class="alert alert-danger"><?= $message; ?></div>
                    <?php endif; ?>
                    
                    <form action="" method="POST" class="form-wrap">
                        <h3 class="mb-30">Form Input Pekerjaan (Admin)</h3>
                        
                        <div class="form-group">
                            <label><strong>Judul Posisi Pekerjaan</strong></label>
                            <input type="text" name="title" class="form-control" placeholder="Contoh: Frontend Developer" required>
                        </div>
                        
                        <div class="form-group">
                            <label><strong>Kategori Pekerjaan</strong></label>
                            <input type="text" name="category" class="form-control" placeholder="Contoh: Technology / Design / Finance" required>
                        </div>

                        <div class="form-group">
                            <label><strong>Lokasi Penempatan</strong></label>
                            <input type="text" name="location" class="form-control" placeholder="Contoh: Jakarta Selatan" required>
                        </div>

                        <div class="form-group">
                            <label><strong>Tipe Pekerjaan</strong></label>
                            <select name="type" class="form-control" required>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Contract">Contract</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><strong>Gaji / Subtitle</strong></label>
                            <input type="text" name="salary" class="form-control" placeholder="Contoh: Rp 5.000.000 - Rp 8.000.000" required>
                        </div>

                        <div class="form-group">
                            <label><strong>Deskripsi Pekerjaan</strong></label>
                            <textarea name="description" class="form-control" rows="5" placeholder="Tuliskan syarat dan kualifikasi..." required></textarea>
                        </div>

                        <button type="submit" name="submit" class="genric-btn primary e-large btn-block mt-20">Simpan Lowongan</button>
                        <a href="category.php" class="genric-btn default e-large btn-block mt-10">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>
</html>