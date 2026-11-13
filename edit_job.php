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