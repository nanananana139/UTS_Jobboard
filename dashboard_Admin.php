
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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin JobBoard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f4f6f9;
        }

        header {
            background: #222;
            color: white;
            padding: 20px;
        }

        .container {
            padding: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #222;
            color: white;
        }

        a, button {
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            color: white;
            border: none;
            cursor: pointer;
        }

        .tambah {
            background: green;
        }

        .edit {
            background: orange;
        }

        .hapus {
            background: red;
        }

        .logout {
            background: #c0392b;
        }
    </style>
</head>

<body>

<header>
    <h2>JobBoard - Dashboard Admin</h2>
    <p>Selamat datang, <?= htmlspecialchars($_SESSION['admin']) ?></p>
    <a href="logout.php" class="logout">Logout</a>
</header>

<div class="container">

    <h2>Kelola Lowongan Pekerjaan</h2>

    <a href="tambah_job.php" class="tambah">
        + Tambah Lowongan
    </a>

    <table>
        <tr>
            <th>No</th>
            <th>Posisi</th>
            <th>Perusahaan</th>
            <th>Lokasi</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while ($job = mysqli_fetch_assoc($query)):
        ?>

        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($job['judul_posisi']) ?></td>
            <td><?= htmlspecialchars($job['nama_perusahaan']) ?></td>
            <td><?= htmlspecialchars($job['lokasi']) ?></td>
            <td><?= htmlspecialchars($job['kategori']) ?></td>
            <td><?= htmlspecialchars($job['status']) ?></td>

            <td>
                <a class="edit"
                   href="edit_job.php?id=<?= $job['id'] ?>">
                   Edit
                </a>

                <a class="hapus"
                   href="hapus_job.php?id=<?= $job['id'] ?>">
                   Hapus
                </a>
            </td>
        </tr>

        <?php endwhile; ?>

    </table>

</div>

</body>
</html>
