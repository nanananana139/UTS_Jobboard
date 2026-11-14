<?php
require 'auth.php';
function getCategoryIcon($category) {
    switch (strtolower($category)) {
        case 'technology':          return 'fa-laptop';
        case 'business':            return 'fa-briefcase';
        case 'administration':      return 'fa-folder-open';
        case 'finance':             return 'fa-calculator';
        case 'marketing':           return 'fa-bullhorn';
        case 'sales':               return 'fa-line-chart';
        case 'human-resources':     return 'fa-users';
        case 'design':              return 'fa-paint-brush';
        case 'development':         return 'fa-code';
        case 'customer-service':    return 'fa-headphones';
        case 'education':           return 'fa-graduation-cap';
        case 'healthcare':          return 'fa-medkit';
        case 'engineering':         return 'fa-cogs';
        case 'manufacturing':       return 'fa-industry';
        case 'logistics':           return 'fa-truck';
        case 'warehouse':           return 'fa-archive';
        case 'construction':        return 'fa-building';
        case 'hospitality':         return 'fa-bed';
        case 'food-beverage':       return 'fa-cutlery';
        case 'retail':              return 'fa-shopping-cart';
        case 'transportation':      return 'fa-car';
        case 'legal':               return 'fa-balance-scale';
        case 'media':               return 'fa-newspaper-o';
        case 'content-creator':     return 'fa-camera';
        case 'security':            return 'fa-shield';
        case 'cleaning':            return 'fa-wrench';
        case 'freelance':           return 'fa-globe';
        case 'internship':          return 'fa-graduation-cap';
        default:                    return 'fa-briefcase';
    }
}
include 'koneksi.php';

// Mengambil data dari form pencarian
$search   = trim($_GET['search'] ?? '');
$lokasi   = $_GET['lokasi'] ?? '';
$kategori = $_GET['kategori'] ?? '';
$tipe     = $_GET['tipe'] ?? '';
$gaji     = $_GET['gaji'] ?? '';

// Query dasar
$sql = "SELECT * FROM jobs WHERE status = 'Buka'";

$values = [];
$types = '';

// Filter kata kunci
if ($search !== '') {
    $sql .= " AND (judul_posisi LIKE ? OR nama_perusahaan LIKE ?)";
    $keyword = "%$search%";
    $values[] = $keyword;
    $values[] = $keyword;
    $types .= 'ss';
}

// Filter lokasi
if ($lokasi !== '') {
    $sql .= " AND lokasi = ?";
    $values[] = $lokasi;
    $types .= 's';
}

// Filter kategori
if ($kategori !== '') {
    $sql .= " AND kategori = ?";
    $values[] = $kategori;
    $types .= 's';
}

// Filter tipe pekerjaan
if ($tipe !== '') {
    $sql .= " AND tipe = ?";
    $values[] = $tipe;
    $types .= 's';
}

// Filter gaji
if ($gaji !== '') {
    if (substr($gaji, -1) === '+') {
        $batas = (int) substr($gaji, 0, -1);
        $sql .= " AND gaji_max >= ?";
        $values[] = $batas;
        $types .= 'i';
    } else {
        $rentang = explode('-', $gaji);

        if (count($rentang) === 2 && ctype_digit($rentang[0]) && ctype_digit($rentang[1])) {
            $gaji_min = (int) $rentang[0];
            $gaji_max = (int) $rentang[1];

            $sql .= " AND gaji_max >= ? AND gaji_min <= ?";
            $values[] = $gaji_min;
            $values[] = $gaji_max;
            $types .= 'ii';
        }
    }
}

// Urutkan lowongan terbaru
$sql .= " ORDER BY created_at DESC";

// Menyiapkan query
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Query gagal: " . mysqli_error($conn));
}

// Mengikat parameter
if (count($values) > 0) {
    mysqli_stmt_bind_param($stmt, $types, ...$values);
}

// Menjalankan query
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?> 


<!DOCTYPE html>
<html lang="id" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>JobBoard - Katalog Lowongan</title>

    <link rel="shortcut icon" href="img/fav.png">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="style.css">
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

    <!-- HEADER -->
    <header id="header">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">

                <div id="logo">
                    <a href="home.php">
                        <img src="img/logo.png" alt="Jobboard">
                    </a>
                </div>

                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li >
                            <a href="home.php">Home</a>
                        </li>

                        <li>
                            <a href="about-us.php">About Us</a>
                        </li>

                        <li>
                            <a href="category.php">Category</a>
                        </li>

                        <li class="menu-active">
                            <a href="search.php">Search</a>
                        </li>

                        <li>
                            <a href="logout.php" class="ticker-btn">Logout</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </header>

<!-- Banner -->
<section class="banner-area relative">
    <div class="overlay overlay-bg"></div>

    <div class="container">
        <div class="row search-page-top d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-12">

                <h1 class="text-white">
                    Katalog Lowongan Pekerjaan
                </h1>

                <p class="text-white link-nav">
                    <a href="index.php">Home</a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="search.php">Cari Lowongan</a>
                </p>

                <!-- Form Pencarian -->
                <form action="search.php#lowongan-terbaru" method="GET" class="serach-form-area">
                    <div class="row justify-content-center form-wrap">

                        <div class="col-lg-3 form-cols">
                            <input type="text" class="form-control"
                                name="search"
                                placeholder="What are you looking for?">
                        </div>

                        <div class="col-lg-2 form-cols">
                            <select class="form-control" name="lokasi">
                                <option value="">Select Area</option>
                                <option value="jakarta-pusat">Jakarta Pusat</option>
                                <option value="jakarta-utara">Jakarta Utara</option>
                                <option value="jakarta-barat">Jakarta Barat</option>
                                <option value="jakarta-selatan">Jakarta Selatan</option>
                                <option value="jakarta-timur">Jakarta Timur</option>
                                <option value="bogor">Bogor</option>
                                <option value="depok">Depok</option>
                                <option value="bekasi">Bekasi</option>
                                <option value="tangerang">Tangerang</option>
                                <option value="tangerang-selatan">Tangerang Selatan</option>
                                <option value="kabupaten-bogor">Kabupaten Bogor</option>
                                <option value="kabupaten-bekasi">Kabupaten Bekasi</option>
                                <option value="kabupaten-tangerang">Kabupaten Tangerang</option>
                            </select>
                        </div>

                        <div class="col-lg-2 form-cols">
                            <select class="form-control" name="kategori">
                                <option value="">All Category</option>
                                <option value="technology">Technology & IT</option>
                                <option value="business">Business & Management</option>
                                <option value="administration">Administration & Office</option>
                                <option value="finance">Finance & Accounting</option>
                                <option value="marketing">Marketing</option>
                                <option value="sales">Sales</option>
                                <option value="human-resources">Human Resources (HR)</option>
                                <option value="design">Design & Creative</option>
                                <option value="development">Software Development</option>
                                <option value="customer-service">Customer Service</option>
                                <option value="education">Education & Training</option>
                                <option value="healthcare">Healthcare & Medical</option>
                                <option value="engineering">Engineering</option>
                                <option value="manufacturing">Manufacturing & Production</option>
                                <option value="logistics">Logistics & Supply Chain</option>
                                <option value="warehouse">Warehouse & Inventory</option>
                                <option value="construction">Construction & Property</option>
                                <option value="hospitality">Hospitality & Tourism</option>
                                <option value="food-beverage">Food & Beverage</option>
                                <option value="retail">Retail & Merchandising</option>
                                <option value="transportation">Transportation & Driver</option>
                                <option value="legal">Legal</option>
                                <option value="media">Media & Communication</option>
                                <option value="content-creator">Content Creator</option>
                                <option value="security">Security</option>
                                <option value="cleaning">Cleaning & Maintenance</option>
                                <option value="freelance">Freelance & Remote</option>
                                <option value="internship">Internship</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="col-lg-2 form-cols">
                            <select class="form-control" name="tipe">
                                <option value="">All Job Types</option>
                                <option value="full-time">Full Time</option>
                                <option value="part-time">Part Time</option>
                                <option value="contract">Contract</option>
                                <option value="internship">Internship</option>
                                <option value="freelance">Freelance</option>
                            </select>
                        </div>

                        <div class="col-lg-2 form-cols">
                            <select class="form-control" name="gaji">
                                <option value="">Salary Range</option>
                                <option value="0-1000000">Rp 0 - Rp 1.000.000</option>
                                <option value="1000000-3000000">Rp 1.000.000 - Rp 3.000.000</option>
                                <option value="3000000-5000000">Rp 3.000.000 - Rp 5.000.000</option>
                                <option value="5000000-10000000">Rp 5.000.000 - Rp 10.000.000</option>
                                <option value="10000000-20000000">Rp 10.000.000 - Rp 20.000.000</option>
                                <option value="20000000+">Rp 20.000.000+</option>
                            </select>
                        </div>

                        <div class="col-lg-1 form-cols">
                            <button type="submit" class="btn btn-info">
                                <span class="lnr lnr-magnifier"></span> Search
                            </button>
                        </div>

                    </div>
                </form>

                <p class="text-white">
                    Temukan berbagai lowongan pekerjaan sesuai minat dan kemampuanmu di Jabodetabek.
                </p>

            </div>
        </div>
    </div>
</section>

<!-- Daftar Lowongan -->
<section id="lowongan-terbaru" class="post-area section-gap">
    <div class="container">

        <div class="row justify-content-center d-flex">

            <div class="col-lg-8 post-list">

                <h3 class="mb-30">Lowongan Terbaru</h3>
				<?php if (mysqli_num_rows($result) > 0): ?>

					<?php while ($job = mysqli_fetch_assoc($result)): ?>

						<div class="single-post d-flex flex-row">
							<div class="thumb">
                                <div style="width: 80px; height: 80px; background-color: #f4f5f8; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa <?php echo getCategoryIcon($job['kategori']); ?>" style="font-size: 32px; color: #49e4fa;"></i>
                                </div>
							</div>

							<div class="details">
								<div class="title d-flex flex-row justify-content-between">

									<div class="titles">
										<a href="single.php?id=<?php echo $job['id']; ?>">
											<h4><?php echo htmlspecialchars($job['judul_posisi']); ?></h4>
										</a>

										<h6><?php echo htmlspecialchars($job['nama_perusahaan']); ?></h6>
									</div>

									<ul class="btns">
										<li>
											<a href="single.php?id=<?php echo $job['id']; ?>">Detail</a>
										</li>
									</ul>

								</div>

								<p><?php echo htmlspecialchars($job['deskripsi']); ?></p>

								<h5>
									Job Nature:
									<?php echo htmlspecialchars(ucfirst(str_replace('-', ' ', $job['tipe']))); ?>
								</h5>

								<p class="address">
									<span class="lnr lnr-map"></span>
									<?php echo htmlspecialchars(ucwords(str_replace('-', ' ', $job['lokasi']))); ?>
								</p>

								<p class="address">
									<span class="lnr lnr-database"></span>
									Rp<?php echo number_format($job['gaji_min'], 0, ',', '.'); ?>
									- Rp<?php echo number_format($job['gaji_max'], 0, ',', '.'); ?>
									/ Bulan
								</p>
							</div>
						</div>

					<?php endwhile; ?>

				<?php else: ?>

					<div class="alert alert-info">
						Lowongan pekerjaan tidak ditemukan.
						Silakan coba pencarian lainnya.
					</div>

				<?php endif; ?>


            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 sidebar">

                <div class="single-slidebar">
                    <h4>Jobs by Location</h4>
                    <ul class="cat-list">
                        <li><a class="justify-content-between d-flex" href="search.php?lokasi=jakarta-pusat"><p>Jakarta Pusat</p></a></li>
                        <li><a class="justify-content-between d-flex" href="search.php?lokasi=jakarta-utara"><p>Jakarta Utara</p></a></li>
                        <li><a class="justify-content-between d-flex" href="search.php?lokasi=jakarta-barat"><p>Jakarta Barat</p></a></li>
                        <li><a class="justify-content-between d-flex" href="search.php?lokasi=jakarta-selatan"><p>Jakarta Selatan</p></a></li>
                        <li><a class="justify-content-between d-flex" href="search.php?lokasi=jakarta-timur"><p>Jakarta Timur</p></a></li>
                        <li><a class="justify-content-between d-flex" href="search.php?lokasi=bogor"><p>Bogor</p></a></li>
                        <li><a class="justify-content-between d-flex" href="search.php?lokasi=depok"><p>Depok</p></a></li>
                        <li><a class="justify-content-between d-flex" href="search.php?lokasi=bekasi"><p>Bekasi</p></a></li>
                        <li><a class="justify-content-between d-flex" href="search.php?lokasi=tangerang"><p>Tangerang</p></a></li>
                        <li><a class="justify-content-between d-flex" href="search.php?lokasi=tangerang-selatan"><p>Tangerang Selatan</p></a></li>
                    </ul>
                </div>

                <div class="single-slidebar">
                    <h4>Jobs by Category</h4>
                    <ul class="cat-list">
                        <li><a href="search.php?kategori=technology">Technology & IT</a></li>
                        <li><a href="search.php?kategori=business">Business & Management</a></li>
                        <li><a href="search.php?kategori=administration">Administration & Office</a></li>
                        <li><a href="search.php?kategori=finance">Finance & Accounting</a></li>
                        <li><a href="search.php?kategori=marketing">Marketing</a></li>
                        <li><a href="search.php?kategori=design">Design & Creative</a></li>
                        <li><a href="search.php?kategori=development">Software Development</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="single-footer-widget">
                    <h6>JobBoard</h6>
                    <p>
                        Platform pencarian lowongan pekerjaan yang membantu menemukan peluang karier di wilayah Jabodetabek.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-footer-widget">
                    <h6>Navigasi</h6>
                    <ul class="footer-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="search.php">Cari Lowongan</a></li>
                        <li><a href="category.php">Kategori</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Daftar</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="single-footer-widget">
                    <h6>Wilayah Layanan</h6>
                    <p>Jakarta, Bogor, Depok, Tangerang, dan Bekasi.</p>
                </div>
            </div>

        </div>

        <div class="row footer-bottom d-flex justify-content-between">
            <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
                Copyright &copy; <script>document.write(new Date().getFullYear());</script>
                JobBoard. All rights reserved.
                | Template by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            </p>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/easing.min.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/parallax.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/main.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const params = new URLSearchParams(window.location.search);

    if (params.toString() !== "") {
        document.getElementById("lowongan-terbaru").scrollIntoView({
            behavior: "smooth",
            block: "start"
        });
    }
});
</script>

</body>
</html>
