
<?php
session_start();
include 'koneksi.php';

// Cek login admin
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}

// Cek ID lowongan
if (!isset($_GET['id'])) {
    header("Location: dashboard_admin.php");
    exit;
}

$id = (int) $_GET['id'];

// Hapus data lowongan
$query = mysqli_prepare($conn, "DELETE FROM jobs WHERE id = ?");
mysqli_stmt_bind_param($query, "i", $id);

if (mysqli_stmt_execute($query)) {
    header("Location: dashboard_admin.php");
    exit;
} else {
    echo "Gagal menghapus lowongan!";
}
?>
