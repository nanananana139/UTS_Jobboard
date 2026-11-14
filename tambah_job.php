
<?php
session_start();
include 'koneksi.php';

// Cek login admin
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}

// Ambil kategori langsung dari database
$categories = [];
$queryCategories = mysqli_query(
    $conn,
    "SELECT id, category_name FROM categories ORDER BY category_name ASC"
);

if (!$queryCategories) {
    die("Gagal mengambil kategori: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($queryCategories)) {
    $categories[] = $row;
}

// Mengubah nama kategori menjadi format lama
// agar tetap kompatibel dengan kode website yang sudah ada
function categoryToSlug($name) {
    $mapping = [
        'IT & Software' => 'technology',
        'Customer Service' => 'customer-service',
        'Human Resources' => 'human-resources',
        'Content Creator' => 'content-creator',
        'Food & Beverage' => 'food-beverage'
    ];

    if (isset($mapping[$name])) {
        return $mapping[$name];
    }

    return strtolower(str_replace(' ', '-', trim($name)));
}

$lokasi_list = [
    'jakarta-pusat', 'jakarta-utara', 'jakarta-barat',
    'jakarta-selatan', 'jakarta-timur', 'bogor',
    'depok', 'bekasi', 'tangerang', 'tangerang-selatan',
    'kabupaten-bogor', 'kabupaten-bekasi',
    'kabupaten-tangerang'
];

$error = "";

if (isset($_POST['simpan'])) {

    $judul       = trim($_POST['judul_posisi']);
    $perusahaan  = trim($_POST['nama_perusahaan']);
    $deskripsi   = trim($_POST['deskripsi']);
    $persyaratan = trim($_POST['persyaratan']);
    $lokasi      = $_POST['lokasi'];
    $category_id = (int) $_POST['category_id'];
    $tipe        = $_POST['tipe'];
    $gaji_min    = (float) $_POST['gaji_min'];
    $gaji_max    = (float) $_POST['gaji_max'];
    $status      = $_POST['status'];

    // Validasi lokasi
    if (!in_array($lokasi, $lokasi_list, true)) {
        $error = "Lokasi tidak valid.";
    } else {

        // Pastikan kategori tersedia di database
        $checkCategory = mysqli_prepare(
            $conn,
            "SELECT category_name FROM categories WHERE id = ?"
        );

        mysqli_stmt_bind_param($checkCategory, "i", $category_id);
        mysqli_stmt_execute($checkCategory);

        $categoryResult = mysqli_stmt_get_result($checkCategory);
        $categoryData = mysqli_fetch_assoc($categoryResult);

        if (!$categoryData) {
            $error = "Kategori tidak ditemukan.";
        } else {

            // Simpan nama kategori dalam format lama
            $kategori = categoryToSlug($categoryData['category_name']);

            $query = "INSERT INTO jobs
                (
                    judul_posisi,
                    nama_perusahaan,
                    deskripsi,
                    persyaratan,
                    lokasi,
                    kategori,
                    category_id,
                    tipe,
                    gaji_min,
                    gaji_max,
                    status
                )
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($conn, $query);

            mysqli_stmt_bind_param(
                $stmt,
                "ssssssiddds",
                $judul,
                $perusahaan,
                $deskripsi,
                $persyaratan,
                $lokasi,
                $kategori,
                $category_id,
                $tipe,
                $gaji_min,
                $gaji_max,
                $status
            );

            if (mysqli_stmt_execute($stmt)) {
                header("Location: kelola_lowongan.php");
                exit;
            } else {
                $error = "Gagal menambahkan lowongan: " . mysqli_stmt_error($stmt);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id" class="no-js">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <title>JobBoard - Tambah Lowongan</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
        #header {
            position: fixed !important;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999 !important;
            background-color: rgba(124, 105, 239, 0.95) !important; /* Warna ungu berlatar */
            backdrop-filter: blur(8px);
            padding: 15px 0 !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15) !important;
        }
    </style>
</head>
<body>

    <header id="header">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="index.php"><img src="img/logo.png" alt="JobBoard" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="dashboard_admin.php">Dashboard Admin</a></li>
                        <li class="menu-active"><a href="kelola_lowongan.php">Kelola Lowongan</a></li>
                        <li><a href="data_pelamar.php">Data Pelamar</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#modalLogout">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <section class="banner-area relative" id="home">    
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">Tambah Lowongan Baru</h1>
                    <p class="text-white link-nav"><a href="kelola_lowongan.php">Kelola Lowongan </a> <span class="lnr lnr-arrow-right"></span> <a href="tambah_job.php"> Tambah Lowongan</a></p>
                </div>                                          
            </div>
        </div>
    </section>

    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <?php if ($error != ""): ?>
                        <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
                    <?php endif; ?>
                    
                    <form action="" method="POST" class="form-wrap">
                        <h3 class="mb-30">Form Input Pekerjaan (Admin)</h3>
                        
                        <div class="form-group">
                            <label><strong>Judul Posisi</strong></label>
                            <input type="text" name="judul_posisi" class="form-control" placeholder="Contoh: Frontend Developer" required>
                        </div>

                        <div class="form-group">
                            <label><strong>Nama Perusahaan</strong></label>
                            <input type="text" name="nama_perusahaan" class="form-control" placeholder="Contoh: PT Maju Bersama" required>
                        </div>

                        <div class="form-group">
                            <label><strong>Deskripsi</strong></label>
                            <textarea name="deskripsi" class="form-control" rows="4" placeholder="Tuliskan deskripsi pekerjaan..." required></textarea>
                        </div>

                        <div class="form-group">
                            <label><strong>Persyaratan</strong></label>
                            <textarea name="persyaratan" class="form-control" rows="4" placeholder="Tuliskan syarat dan kualifikasi..."></textarea>
                        </div>

                        <div class="form-group">
                            <label><strong>Lokasi</strong></label>
                            <select name="lokasi" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($lokasi_list as $l): ?>
                                    <option value="<?= htmlspecialchars($l) ?>">
                                        <?= htmlspecialchars(ucwords(str_replace('-', ' ', $l))) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><strong>Kategori</strong></label>
                            <select name="category_id" class="form-control" required>
                                <option value="">Pilih Kategori</option>

                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= (int) $category['id'] ?>">
                                        <?= htmlspecialchars($category['category_name']) ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label><strong>Tipe Pekerjaan</strong></label>
                            <select name="tipe" class="form-control" required>
                                <option value="full-time">Full Time</option>
                                <option value="part-time">Part Time</option>
                                <option value="contract">Contract</option>
                                <option value="internship">Internship</option>
                                <option value="freelance">Freelance</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><strong>Gaji Minimum</strong></label>
                            <input type="number" name="gaji_min" class="form-control" min="0" value="0">
                        </div>

                        <div class="form-group">
                            <label><strong>Gaji Maksimum</strong></label>
                            <input type="number" name="gaji_max" class="form-control" min="0" value="0">
                        </div>

                        <div class="form-group">
                            <label><strong>Status</strong></label>
                            <select name="status" class="form-control">
                                <option value="Buka">Buka</option>
                                <option value="Tutup">Tutup</option>
                            </select>
                        </div>

                        <button type="submit" name="simpan" class="genric-btn primary e-large btn-block mt-20">Simpan Lowongan</button>
                        <a href="kelola_lowongan.php" class="genric-btn default e-large btn-block mt-10">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Konfirmasi Logout -->
    <div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin ingin keluar dari halaman ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="logout_admin.php" class="btn btn-danger">Ya, Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
</body>
</html>