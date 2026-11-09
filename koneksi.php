<?php
$conn = mysqli_connect("localhost", "root", "", "jobboard");

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>