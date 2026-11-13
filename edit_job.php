
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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Lowongan - JobBoard</title>
</head>
<body>

<h2>Edit Lowongan Pekerjaan</h2>

<?php if (isset($error)) echo $error; ?>

<form method="POST">

    <label>Judul Posisi</label><br>
    <input type="text" name="judul_posisi"
        value="<?= htmlspecialchars($job['judul_posisi']) ?>" required>
    <br><br>

    <label>Nama Perusahaan</label><br>
    <input type="text" name="nama_perusahaan"
        value="<?= htmlspecialchars($job['nama_perusahaan']) ?>" required>
    <br><br>

    <label>Deskripsi</label><br>
    <textarea name="deskripsi" required><?= htmlspecialchars($job['deskripsi']) ?></textarea>
    <br><br>

    <label>Persyaratan</label><br>
    <textarea name="persyaratan"><?= htmlspecialchars($job['persyaratan']) ?></textarea>
    <br><br>

    <label>Lokasi</label><br>
    <input type="text" name="lokasi"
        value="<?= htmlspecialchars($job['lokasi']) ?>" required>
    <br><br>

    <label>Kategori</label><br>
    <input type="text" name="kategori"
        value="<?= htmlspecialchars($job['kategori']) ?>" required>
    <br><br>

    <label>Tipe Pekerjaan</label><br>
    <input type="text" name="tipe"
        value="<?= htmlspecialchars($job['tipe']) ?>" required>
    <br><br>

    <label>Gaji Minimum</label><br>
    <input type="number" name="gaji_min"
        value="<?= htmlspecialchars($job['gaji_min']) ?>" min="0">
    <br><br>

    <label>Gaji Maksimum</label><br>
    <input type="number" name="gaji_max"
        value="<?= htmlspecialchars($job['gaji_max']) ?>" min="0">
    <br><br>

    <label>Status</label><br>
    <select name="status">
        <option value="Buka" <?= $job['status'] == 'Buka' ? 'selected' : '' ?>>Buka</option>
        <option value="Tutup" <?= $job['status'] == 'Tutup' ? 'selected' : '' ?>>Tutup</option>
    </select>
    <br><br>

    <button type="submit" name="update">Update Lowongan</button>
    <a href="dashboard_admin.php">Kembali</a>

</form>

</body>
</html>
