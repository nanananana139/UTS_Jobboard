
<?php
session_start();
include 'koneksi.php';

// Wajib login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id_user = (int) $_SESSION['user_id'];
$id_job = (int) $_GET['id'];

// Pastikan lowongan tersedia
$cek_job = mysqli_prepare(
    $conn,
    "SELECT id FROM jobs WHERE id = ?"
);
mysqli_stmt_bind_param($cek_job, "i", $id_job);
mysqli_stmt_execute($cek_job);
$hasil_job = mysqli_stmt_get_result($cek_job);

if (mysqli_num_rows($hasil_job) === 0) {
    die("Lowongan tidak ditemukan.");
}

// Simpan lamaran
$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO lamaran (id_user, id_job)
     VALUES (?, ?)"
);

mysqli_stmt_bind_param($stmt, "ii", $id_user, $id_job);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>
        alert('Lamaran berhasil dikirim!');
        window.location.href = 'index.php';
    </script>";
} else {
    if (mysqli_errno($conn) == 1062) {
        echo "<script>
            alert('Kamu sudah pernah melamar pekerjaan ini!');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "Gagal mengirim lamaran: " .
             htmlspecialchars(mysqli_error($conn));
    }
}

mysqli_stmt_close($stmt);
mysqli_stmt_close($cek_job);
?>
