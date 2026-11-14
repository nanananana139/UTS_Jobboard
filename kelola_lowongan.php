<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM jobs ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kelola Lowongan - JobBoard</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
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

<body>

    <!-- Header Template -->
    <header id="header">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="home.php"><img src="img/logo.png" alt="JobBoard" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li><a href="dashboard_admin.php">Dashboard Admin</a></li>
                        <li class="menu-active"><a href="kelola_lowongan.php">Kelola Lowongan</a></li>
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
                    <h1 class="text-white">Kelola Lowongan Pekerjaan</h1>
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
                    <h3 class="mb-2 mb-md-0">Daftar Lowongan Pekerjaan</h3>
                    <div>
                        <a href="dashboard_admin.php" class="genric-btn default radius mr-2">Kembali</a>
                        <a href="tambah_job.php" class="genric-btn primary radius">+ Tambah Lowongan</a>
                    </div>
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

    <!-- Modal Konfirmasi Hapus -->
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
    <script>
        function setHapusId(id, judul) {
            document.getElementById('namaLowonganHapus').textContent = judul;
            document.getElementById('btnKonfirmasiHapus').href = 'hapus_job.php?id=' + id;
        }
    </script>

</body>
</html>