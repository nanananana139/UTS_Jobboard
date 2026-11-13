<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: dashboard_admin.php");
    exit;
}

$id = (int) $_GET['id'];

$query = mysqli_prepare($conn, "SELECT * FROM jobs WHERE id = ?");
mysqli_stmt_bind_param($query, "i", $id);
mysqli_stmt_execute($query);

$result = mysqli_stmt_get_result($query);
$job = mysqli_fetch_assoc($result);

if (!$job) {
    die("Lowongan tidak ditemukan!");
}

if (isset($_POST['update'])) {
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

    $sql = "UPDATE jobs SET
        judul_posisi = ?,
        nama_perusahaan = ?,
        deskripsi = ?,
        persyaratan = ?,
        lokasi = ?,
        kategori = ?,
        tipe = ?,
        gaji_min = ?,
        gaji_max = ?,
        status = ?
        WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "sssssssddsi",
        $judul, $perusahaan, $deskripsi, $persyaratan,
        $lokasi, $kategori, $tipe, $gaji_min,
        $gaji_max, $status, $id
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: dashboard_admin.php");
        exit;
    } else {
        $error = "Gagal memperbarui lowongan!";
    }
}
?>
<!DOCTYPE html>
<html lang="id" class="no-js">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <title>JobBoard - Edit Lowongan</title>
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

    <section class="banner-area relative">    
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">Edit Data Lowongan</h1>
                    <p class="text-white link-nav"><a href="dashboard_admin.php">Dashboard Admin </a> <span class="lnr lnr-arrow-right"></span> <a href="#"> Edit Lowongan</a></p>
                </div>                                          
            </div>
        </div>
    </section>

    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?= $error; ?></div>
                    <?php endif; ?>

                    <form action="" method="POST" class="form-wrap">
                        <h3 class="mb-30">Ubah Pekerjaan #<?= $job['id']; ?></h3>
                        
                        <div class="form-group">
                            <label><strong>Judul Posisi</strong></label>
                            <input type="text" name="judul_posisi" class="form-control" value="<?= htmlspecialchars($job['judul_posisi']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label><strong>Nama Perusahaan</strong></label>
                            <input type="text" name="nama_perusahaan" class="form-control" value="<?= htmlspecialchars($job['nama_perusahaan']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label><strong>Deskripsi</strong></label>
                            <textarea name="deskripsi" class="form-control" rows="4" required><?= htmlspecialchars($job['deskripsi']); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label><strong>Persyaratan</strong></label>
                            <textarea name="persyaratan" class="form-control" rows="4"><?= htmlspecialchars($job['persyaratan']); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label><strong>Lokasi</strong></label>
                            <input type="text" name="lokasi" class="form-control" value="<?= htmlspecialchars($job['lokasi']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label><strong>Kategori</strong></label>
                            <input type="text" name="kategori" class="form-control" value="<?= htmlspecialchars($job['kategori']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label><strong>Tipe Pekerjaan</strong></label>
                            <select name="tipe" class="form-control" required>
                                <option value="full-time" <?= $job['tipe'] == 'full-time' ? 'selected' : ''; ?>>Full Time</option>
                                <option value="part-time" <?= $job['tipe'] == 'part-time' ? 'selected' : ''; ?>>Part Time</option>
                                <option value="contract" <?= $job['tipe'] == 'contract' ? 'selected' : ''; ?>>Contract</option>
                                <option value="internship" <?= $job['tipe'] == 'internship' ? 'selected' : ''; ?>>Internship</option>
                                <option value="freelance" <?= $job['tipe'] == 'freelance' ? 'selected' : ''; ?>>Freelance</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><strong>Gaji Minimum</strong></label>
                            <input type="number" name="gaji_min" class="form-control" value="<?= htmlspecialchars($job['gaji_min']); ?>" min="0">
                        </div>

                        <div class="form-group">
                            <label><strong>Gaji Maksimum</strong></label>
                            <input type="number" name="gaji_max" class="form-control" value="<?= htmlspecialchars($job['gaji_max']); ?>" min="0">
                        </div>

                        <div class="form-group">
                            <label><strong>Status</strong></label>
                            <select name="status" class="form-control">
                                <option value="Buka" <?= $job['status'] == 'Buka' ? 'selected' : ''; ?>>Buka</option>
                                <option value="Tutup" <?= $job['status'] == 'Tutup' ? 'selected' : ''; ?>>Tutup</option>
                            </select>
                        </div>

                        <button type="submit" name="update" class="genric-btn success e-large btn-block mt-20">Update Lowongan</button>
                        <a href="dashboard_admin.php" class="genric-btn default e-large btn-block mt-10">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>
</html>