
<?php
session_start();
include 'koneksi.php';

// Cek login admin
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}

if (isset($_POST['simpan'])) {
    $judul = $_POST['judul_posisi'];
    $perusahaan = $_POST['nama_perusahaan'];
    $deskripsi = $_POST['deskripsi'];
    $persyaratan = $_POST['persyaratan'];
    $lokasi = $_POST['lokasi'];
    $kategori = $_POST['kategori'];
    $tipe = $_POST['tipe'];
    $gaji_min = $_POST['gaji_min'];
    $gaji_max = $_POST['gaji_max'];
    $status = $_POST['status'];

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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Lowongan - JobBoard</title>
</head>
<body>

<h2>Tambah Lowongan Pekerjaan</h2>

<?php if (isset($error)) echo $error; ?>

<form method="POST">

    <label>Judul Posisi</label><br>
    <input type="text" name="judul_posisi" required><br><br>

    <label>Nama Perusahaan</label><br>
    <input type="text" name="nama_perusahaan" required><br><br>

    <label>Deskripsi</label><br>
    <textarea name="deskripsi" required></textarea><br><br>

    <label>Persyaratan</label><br>
    <textarea name="persyaratan"></textarea><br><br>

    <label>Lokasi</label><br>
    <input type="text" name="lokasi" required><br><br>

    <label>Kategori</label><br>
    <input type="text" name="kategori" required><br><br>

    <label>Tipe Pekerjaan</label><br>
    <input type="text" name="tipe" required><br><br>

    <label>Gaji Minimum</label><br>
    <input type="number" name="gaji_min" min="0" value="0"><br><br>

    <label>Gaji Maksimum</label><br>
    <input type="number" name="gaji_max" min="0" value="0"><br><br>

    <label>Status</label><br>
    <select name="status">
        <option value="Buka">Buka</option>
        <option value="Tutup">Tutup</option>
    </select><br><br>

    <button type="submit" name="simpan">
        Simpan Lowongan
    </button>

    <a href="dashboard_admin.php">Kembali</a>

</form>

</body>
</html>
