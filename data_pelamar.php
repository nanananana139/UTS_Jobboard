<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}

// Cek apakah tabel lamaran sudah ada di database
$cek_tabel = mysqli_query($conn, "SHOW TABLES LIKE 'lamaran'");
$query = false;
if ($cek_tabel && mysqli_num_rows($cek_tabel) > 0) {
    $query = mysqli_query($conn, "
        SELECT lamaran.*, jobs.judul_posisi, jobs.nama_perusahaan 
        FROM lamaran 
        JOIN jobs ON lamaran.job_id = jobs.id 
        ORDER BY lamaran.id DESC
    ");
}
?>

<!DOCTYPE html>
<html lang="id" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Pelamar Masuk - JobBoard</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
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
                        <li><a href="dashboard_admin.php">Dashboard Admin</a></li>
                        <li><a href="kelola_lowongan.php">Kelola Lowongan</a></li>
                        <li class="menu-active"><a href="data_pelamar.php">Data Pelamar</a></li>
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
                    <h1 class="text-white">Data Pelamar Masuk</h1>
                    <p class="text-white">Daftar kandidat yang telah melamar pekerjaan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Konten Utama -->
    <section class="post-area section-gap">
        <div class="container">
            <div class="bg-white p-4 rounded shadow-sm">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                    <h3 class="mb-2 mb-md-0">Daftar Pelamar Masuk</h3>
                    <a href="dashboard_admin.php" class="genric-btn default radius">Kembali</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Pelamar</th>
                                <th>Email</th>
                                <th>No. HP</th>
                                <th>Posisi Dilamar</th>
                                <th>Perusahaan</th>
                                <th>CV / Berkas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($query && mysqli_num_rows($query) > 0): ?>
                                <?php $no = 1; while ($row = mysqli_fetch_assoc($query)): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><strong><?= htmlspecialchars($row['nama_pelamar']) ?></strong></td>
                                    <td><?= htmlspecialchars($row['email']) ?></td>
                                    <td><?= htmlspecialchars($row['no_hp']) ?></td>
                                    <td><?= htmlspecialchars($row['judul_posisi']) ?></td>
                                    <td><?= htmlspecialchars($row['nama_perusahaan']) ?></td>
                                    <td>
                                        <?php if (!empty($row['cv'])): ?>
                                            <a href="uploads/<?= htmlspecialchars($row['cv']) ?>" target="_blank" class="btn btn-info btn-sm">Lihat CV</a>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">Belum ada data pelamar yang masuk.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
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