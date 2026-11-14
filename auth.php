<?php
session_start();
include_once 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

// Ambil data user dari database
$stmt = mysqli_prepare($conn, "SELECT id, nama, email FROM users WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $_SESSION['user_id']);
mysqli_stmt_execute($stmt);
$user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
mysqli_stmt_close($stmt);

// Kalau user sudah dihapus dari database, anggap tidak login
if (!$user) {
    session_destroy();
    header('Location: index.php');
    exit;
}