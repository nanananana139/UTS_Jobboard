
<?php
session_start();
include 'koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: category.php");
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);
$result = mysqli_query($conn, "SELECT * FROM jobboard WHERE id = '$id'");
$job = mysqli_fetch_assoc($result);

if (!$job) {
    header("Location: category.php");
    exit();
}

if (isset($_POST['update'])) {
    $title       = mysqli_real_escape_string($conn, $_POST['title']);
    $category    = mysqli_real_escape_string($conn, $_POST['category']);
    $location    = mysqli_real_escape_string($conn, $_POST['location']);
    $type        = mysqli_real_escape_string($conn, $_POST['type']);
    $salary      = mysqli_real_escape_string($conn, $_POST['salary']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $update_query = "UPDATE jobboard SET 
                        title='$title', 
                        category='$category', 
                        location='$location', 
                        type='$type', 
                        salary='$salary', 
                        description='$description' 
                    WHERE id='$id'";

    if (mysqli_query($conn, $update_query)) {
        header("Location: category.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <title>Job Listing - Edit Lowongan</title>
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
            </div>
        </div>
    </header>

    <section class="banner-area relative">    
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">Edit Data Lowongan</h1>
                </div>                                          
            </div>
        </div>
    </section>

    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="" method="POST" class="form-wrap">
                        <h3 class="mb-30">Ubah Pekerjaan #<?= $job['id']; ?></h3>
                        
                        <div class="form-group">
                            <label><strong>Judul Posisi Pekerjaan</strong></label>
                            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($job['title']); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label><strong>Kategori Pekerjaan</strong></label>
                            <input type="text" name="category" class="form-control" value="<?= htmlspecialchars($job['category']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label><strong>Lokasi Penempatan</strong></label>
                            <input type="text" name="location" class="form-control" value="<?= htmlspecialchars($job['location']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label><strong>Tipe Pekerjaan</strong></label>
                            <select name="type" class="form-control" required>
                                <option value="Full Time" <?= $job['type'] == 'Full Time' ? 'selected' : ''; ?>>Full Time</option>
                                <option value="Part Time" <?= $job['type'] == 'Part Time' ? 'selected' : ''; ?>>Part Time</option>
                                <option value="Contract" <?= $job['type'] == 'Contract' ? 'selected' : ''; ?>>Contract</option>
                                <option value="Internship" <?= $job['type'] == 'Internship' ? 'selected' : ''; ?>>Internship</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><strong>Gaji / Subtitle</strong></label>
                            <input type="text" name="salary" class="form-control" value="<?= htmlspecialchars($job['salary']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label><strong>Deskripsi Pekerjaan</strong></label>
                            <textarea name="description" class="form-control" rows="5" required><?= htmlspecialchars($job['description']); ?></textarea>
                        </div>

                        <button type="submit" name="update" class="genric-btn success e-large btn-block mt-20">Update Lowongan</button>
                        <a href="category.php" class="genric-btn default e-large btn-block mt-10">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
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
