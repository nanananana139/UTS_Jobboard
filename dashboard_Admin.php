<?php
session_start();
include 'koneksi.php';

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}

// Ambil semua data lowongan
$query = mysqli_query($conn, "SELECT * FROM jobs ORDER BY id DESC");
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
                        <li><a href="logout.php" class="text-danger">Logout</a></li>
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
                    <p class="text-white">Selamat datang, <strong><?= htmlspecialchars($_SESSION['admin']) ?></strong></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Konten Utama -->
    <section class="post-area section-gap">
        <div class="container">
            <div class="bg-white p-4 rounded shadow-sm">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                    <h3 class="mb-2 mb-md-0">Kelola Lowongan Pekerjaan</h3>
                    <a href="tambah_job.php" class="genric-btn primary radius">
                        + Tambah Lowongan
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Posisi</th>
                                <th>Perusahaan</th>
                                <th>Lokasi</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($job = mysqli_fetch_assoc($query)):
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><strong><?= htmlspecialchars($job['judul_posisi']) ?></strong></td>
                                <td><?= htmlspecialchars($job['nama_perusahaan']) ?></td>
                                <td><?= htmlspecialchars($job['lokasi']) ?></td>
                                <td><?= htmlspecialchars($job['kategori']) ?></td>
                                <td>
                                    <?php if ($job['status'] == 'Buka'): ?>
                                        <span class="badge badge-success px-2 py-1"><?= htmlspecialchars($job['status']) ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-secondary px-2 py-1"><?= htmlspecialchars($job['status']) ?></span>
                                    <?php endif; ?>
                                </td>
                                <td style="white-space: nowrap;">
                                    <a href="edit_job.php?id=<?= $job['id'] ?>" class="btn btn-warning btn-sm text-white">
                                        Edit
                                    </a>

                                    <button type="button"
                                            class="btn btn-danger btn-sm"
                                            data-toggle="modal"
                                            data-target="#modalHapus"
                                            onclick="setHapusId(<?= $job['id'] ?>, '<?= htmlspecialchars(addslashes($job['judul_posisi'])) ?>')">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Konfirmasi Hapus (UI Bawaan Web) -->
    <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus Lowongan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin ingin menghapus lowongan <strong id="namaLowonganHapus"></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a id="btnKonfirmasiHapus" href="#" class="btn btn-danger">Ya, Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Template untuk Modal -->
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script>
        function setHapusId(id, judul) {
            document.getElementById('namaLowonganHapus').textContent = judul;
            document.getElementById('btnKonfirmasiHapus').href = 'hapus_job.php?id=' + id;
        }
    </script>

</body>
</html>