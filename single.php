<?php
// Menghubungkan halaman dengan database
include 'koneksi.php';

// Mengambil ID lowongan dari URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Mengambil data lowongan berdasarkan ID
$stmt = mysqli_prepare($conn, "SELECT * FROM jobs WHERE id = ?");

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$job = mysqli_fetch_assoc($result);

// Mengecek apakah lowongan ditemukan
if (!$job) {
    die("Lowongan pekerjaan tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?php echo htmlspecialchars($job['judul_posisi']); ?> - JobBoard
    </title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Header -->
    <header id="header">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">

                <div id="logo">
                    <a href="index.php">
                        <img src="img/logo.png" alt="JobBoard">
                    </a>
                </div>

                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="search.php">Cari Lowongan</a></li>
                    </ul>
                </nav>

            </div>
        </div>
    </header>

    <!-- Banner -->
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>

        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">

                    <h1 class="text-white">Detail Lowongan</h1>

                    <p class="text-white link-nav">
                        <a href="index.php">Home</a>
                        <span class="lnr lnr-arrow-right"></span>
                        <a href="search.php">Daftar Lowongan</a>
                        <span class="lnr lnr-arrow-right"></span>
                        Detail
                    </p>

                </div>
            </div>
        </div>
    </section>

    <!-- Detail Lowongan -->
    <section class="post-area section-gap">
        <div class="container">

            <div class="row justify-content-center">

                <!-- Informasi Utama -->
                <div class="col-lg-8 post-list">

                    <div class="single-post">

                        <div class="d-flex flex-row align-items-start">

                            <div class="thumb">
                                <img src="img/post.png" alt="Lowongan Pekerjaan">
                            </div>

                            <div class="details ml-4">

                                <div class="title">
                                    <h4>
                                        <?php echo htmlspecialchars($job['judul_posisi']); ?>
                                    </h4>

                                    <h6>
                                        <?php echo htmlspecialchars($job['nama_perusahaan']); ?>
                                    </h6>
                                </div>

                                <p>
                                    <strong>Status:</strong>
                                    <?php echo htmlspecialchars($job['status']); ?>
                                </p>

                                <p>
                                    <strong>Jenis Pekerjaan:</strong>
                                    <?php echo htmlspecialchars(ucwords(str_replace('-', ' ', $job['tipe']))); ?>
                                </p>

                                <p class="address">
                                    <span class="lnr lnr-map"></span>
                                    <?php echo htmlspecialchars(ucwords(str_replace('-', ' ', $job['lokasi']))); ?>
                                </p>

                                <p class="address">
                                    <span class="lnr lnr-database"></span>
                                    Rp<?php echo number_format($job['gaji_min'], 0, ',', '.'); ?>
                                    -
                                    Rp<?php echo number_format($job['gaji_max'], 0, ',', '.'); ?>
                                    / Bulan
                                </p>

                                <p>
                                    <strong>Kategori:</strong>
                                    <?php echo htmlspecialchars(ucwords(str_replace('-', ' ', $job['kategori']))); ?>
                                </p>

                            </div>
                        </div>

                    </div>

                    <!-- Deskripsi Pekerjaan -->
                    <div class="single-post job-details">

                        <h4 class="single-title">Deskripsi Pekerjaan</h4>

                        <p>
                            <?php echo nl2br(htmlspecialchars($job['deskripsi'])); ?>
                        </p>

                    </div>

                    <!-- Persyaratan -->
                    <div class="single-post job-details">

                        <h4 class="single-title">Persyaratan Pekerjaan</h4>

                        <p>
                            <?php
                            if (!empty($job['persyaratan'])) {
                                echo nl2br(htmlspecialchars($job['persyaratan']));
                            } else {
                                echo "Belum ada persyaratan yang ditambahkan.";
                            }
                            ?>
                        </p>

                    </div>

                    <!-- Tombol Kembali -->
                    <div class="mt-4">
                        <a href="search.php" class="primary-btn">
                            Kembali ke Daftar Lowongan
                        </a>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 sidebar">

                    <div class="single-slidebar">

                        <h4>Informasi Lowongan</h4>

                        <ul class="cat-list">

                            <li>
                                <p class="d-flex justify-content-between">
                                    <span>Posisi</span>
                                    <span><?php echo htmlspecialchars($job['judul_posisi']); ?></span>
                                </p>
                            </li>

                            <li>
                                <p class="d-flex justify-content-between">
                                    <span>Perusahaan</span>
                                    <span><?php echo htmlspecialchars($job['nama_perusahaan']); ?></span>
                                </p>
                            </li>

                            <li>
                                <p class="d-flex justify-content-between">
                                    <span>Kategori</span>
                                    <span><?php echo htmlspecialchars(ucwords(str_replace('-', ' ', $job['kategori']))); ?></span>
                                </p>
                            </li>

                            <li>
                                <p class="d-flex justify-content-between">
                                    <span>Status</span>
                                    <span><?php echo htmlspecialchars($job['status']); ?></span>
                                </p>
                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-area section-gap">
        <div class="container">

            <div class="row footer-bottom d-flex justify-content-between">

                <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
                    Copyright &copy; <?php echo date('Y'); ?>
                    JobBoard. All rights reserved.
                </p>

                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </div>

            </div>

        </div>
    </footer>

    <!-- JavaScript -->
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>

<?php
mysqli_stmt_close($stmt);
?>
