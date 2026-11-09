<?php
include 'koneksi.php';

// 6 lowongan terbaru yang masih dibuka
$query = "SELECT * FROM jobs
          WHERE status = 'Buka'
          ORDER BY created_at DESC
          LIMIT 6";

$jobs_result = mysqli_query($conn, $query);

if (!$jobs_result) {
    die("Gagal mengambil data lowongan: " . mysqli_error($conn));
}

// Lowongan berdasarkan lokasi
$location_result = mysqli_query($conn, "
    SELECT lokasi, COUNT(*) AS total
    FROM jobs
    WHERE status = 'Buka'
    GROUP BY lokasi
    ORDER BY total DESC
    LIMIT 7
");

// Lowongan berdasarkan kategori
$category_result = mysqli_query($conn, "
    SELECT kategori, COUNT(*) AS total
    FROM jobs
    WHERE status = 'Buka'
    GROUP BY kategori
    ORDER BY total DESC
    LIMIT 7
");

// 3 lowongan terbaru untuk Featured Job Posts
$top_jobs_result = mysqli_query($conn, "
    SELECT * FROM jobs
    WHERE status = 'Buka'
    ORDER BY created_at DESC
    LIMIT 3
");

if (!$location_result || !$category_result || !$top_jobs_result) {
    die("Gagal mengambil data tambahan: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/fav.png">

    <meta name="author" content="Jobboard">
    <meta name="description" content="Website pencarian lowongan pekerjaan Jabodetabek">
    <meta name="keywords" content="lowongan kerja, Jabodetabek, pekerjaan">
    <meta charset="UTF-8">

    <title>Jobboard - Website Mencari Pekerjaan</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<!-- HEADER -->
<header id="header">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">

            <div id="logo">
                <a href="index.php">
                    <img src="img/logo.png" alt="Jobboard">
                </a>
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active">
                        <a href="index.php">Home</a>
                    </li>

                    <li>
                        <a href="about-us.php">About Us</a>
                    </li>

                    <li>
                        <a href="category.php">Category</a>
                    </li>

                    <li>
                        <a href="blog-home.php">Blog</a>
                    </li>

                    <li>
                        <a href="search.php">Search</a>
                    </li>

                    <li>
                        <a href="register.php" class="ticker-btn">Signup</a>
                    </li>

                    <li>
                        <a href="login.php" class="ticker-btn">Login</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</header>


<!-- BANNER / SEARCH -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>

    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">

            <div class="banner-content col-lg-12">

                <h1 class="text-white">
                    <span>Let's Go!</span>
                    Temukan Pekerjaan yang Sesuai dengan Keinginanmu di
                    <span>Jabodetabek</span>!!
                </h1>

                <form action="search.php" method="GET" class="serach-form-area">

                    <div class="row justify-content-center form-wrap">

                        <div class="col-lg-3 form-cols">
                            <input
                                type="text"
                                class="form-control"
                                name="search"
                                placeholder="What are you looking for?"
                            >
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
                                <option value="1000000-200000">Rp 1.000.000 - Rp 2000.000</option>
                                <option value="200000-5000000">Rp 2000.000 - Rp 5.000.000</option>
                                <option value="5000000-10000000">Rp 5.000.000 - Rp 10.000.000</option>
                                <option value="10000000-20000000">Rp 10.000.000 - Rp 20.000.000</option>
                                <option value="20000000+">Rp 20.000.000+</option>
                            </select>
                        </div>

                        <div class="col-lg-1 form-cols">
                            <button type="submit" class="btn btn-info">
                                <span class="lnr lnr-magnifier"></span>
                                Search
                            </button>
                        </div>

                    </div>
                </form>

                <p class="text-white">
                    <span>Search by tags:</span>
                    Technology & IT, Business & Management, Administration & Office,
                    Finance & Accounting, Marketing, Design & Creative,
                    Software Development
                </p>

            </div>
        </div>
    </div>
</section>


<!-- FEATURES -->
<section class="features-area">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <h4>Find Jobs</h4>
                    <p>Temukan berbagai lowongan pekerjaan sesuai minat dan kemampuanmu di wilayah Jabodetabek.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <h4>Easy Applying</h4>
                    <p>Ajukan lamaran pekerjaan dengan mudah dan praktis melalui platform kami.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <h4>Trusted Jobs</h4>
                    <p>Dapatkan informasi lowongan kerja dari berbagai perusahaan dan bidang pekerjaan.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <h4>Career Growth</h4>
                    <p>Temukan kesempatan untuk mengembangkan kemampuan dan membangun karier.</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- FEATURED JOB CATEGORIES -->
<section class="feature-cat-area pt-100" id="category">
    <div class="container">

        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-10">
                <div class="title text-center">
                    <h1 class="mb-10">Featured Job Categories</h1>
                    <p>Temukan pekerjaan dari berbagai bidang.</p>
                </div>
            </div>
        </div>

        <div class="row">

            <?php
            $featured_categories = [
                'finance' => ['Accounting', 'o1.png'],
                'development' => ['Development', 'o2.png'],
                'technology' => ['Technology', 'o3.png'],
                'media' => ['Media & News', 'o4.png'],
                'healthcare' => ['Medical', 'o5.png'],
                'government' => ['Government', 'o6.png']
            ];

            foreach ($featured_categories as $slug => $item):
            ?>

                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-fcat">

                        <a href="category.php?kategori=<?php echo urlencode($slug); ?>">
                            <img src="img/<?php echo htmlspecialchars($item[1]); ?>" alt="">
                        </a>

                        <p><?php echo htmlspecialchars($item[0]); ?></p>

                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</section>


<!-- POST AREA -->
<section class="post-area section-gap">
    <div class="container">

        <div class="row justify-content-center d-flex">

            <!-- DAFTAR LOWONGAN -->
            <div class="col-lg-8 post-list">

                <ul class="cat-list">
                    <li><a href="search.php">Recent</a></li>
                    <li><a href="search.php?tipe=full-time">Full Time</a></li>
                    <li><a href="search.php?tipe=internship">Intern</a></li>
                    <li><a href="search.php?tipe=part-time">Part Time</a></li>
                </ul>

                <h3 class="mb-20">Lowongan Pekerjaan Terbaru</h3>

                <?php if (mysqli_num_rows($jobs_result) > 0): ?>

                    <?php while ($job = mysqli_fetch_assoc($jobs_result)): ?>

                        <div class="single-post d-flex flex-row">

                            <div class="thumb">
                                <img src="img/post.png" alt="Job">

                                <ul class="tags">
                                    <li>
                                        <a href="category.php?kategori=<?php echo urlencode($job['kategori']); ?>">
                                            <?php echo htmlspecialchars($job['kategori']); ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="details">

                                <div class="title d-flex flex-row justify-content-between">

                                    <div class="titles">
                                        <a href="single.php?id=<?php echo (int) $job['id']; ?>">
                                            <h4><?php echo htmlspecialchars($job['judul_posisi']); ?></h4>
                                        </a>

                                        <h6><?php echo htmlspecialchars($job['nama_perusahaan']); ?></h6>
                                    </div>

                                    <ul class="btns">
                                        <li>
                                            <a href="single.php?id=<?php echo (int) $job['id']; ?>">
                                                Detail
                                            </a>
                                        </li>
                                    </ul>

                                </div>

                                <p>
                                    <?php echo htmlspecialchars($job['deskripsi']); ?>
                                </p>

                                <h5>
                                    Job Nature:
                                    <?php echo htmlspecialchars($job['tipe']); ?>
                                </h5>

                                <p class="address">
                                    <span class="lnr lnr-map"></span>
                                    <?php echo htmlspecialchars($job['lokasi']); ?>
                                </p>

                                <p class="address">
                                    <span class="lnr lnr-database"></span>
                                    Rp<?php echo number_format($job['gaji_min'], 0, ',', '.'); ?>
                                    -
                                    Rp<?php echo number_format($job['gaji_max'], 0, ',', '.'); ?>
                                    / Bulan
                                </p>

                            </div>
                        </div>

                    <?php endwhile; ?>

                <?php else: ?>

                    <p>Belum ada lowongan pekerjaan yang tersedia.</p>

                <?php endif; ?>

                <a class="text-uppercase loadmore-btn mx-auto d-block" href="search.php">
                    Load More Job Posts
                </a>

            </div>


            <!-- SIDEBAR -->
            <div class="col-lg-4 sidebar">


                <!-- JOBS BY LOCATION -->
                <div class="single-slidebar">

                    <h4>Jobs by Location</h4>

                    <ul class="cat-list">

                        <?php if (mysqli_num_rows($location_result) > 0): ?>

                            <?php while ($location = mysqli_fetch_assoc($location_result)): ?>

                                <li>
                                    <a class="justify-content-between d-flex"
                                       href="search.php?lokasi=<?php echo urlencode($location['lokasi']); ?>">

                                        <p><?php echo htmlspecialchars($location['lokasi']); ?></p>

                                        <span><?php echo $location['total']; ?></span>

                                    </a>
                                </li>

                            <?php endwhile; ?>

                        <?php else: ?>

                            <li><p>Belum ada data lokasi.</p></li>

                        <?php endif; ?>

                    </ul>
                </div>


                <!-- TOP RATED JOB POST -->
                <div class="single-slidebar">

                    <h4 class="heading">Top Rated Job Posts</h4>

                    <div class="active-relatedjob-carusel">

                        <?php if (mysqli_num_rows($top_jobs_result) > 0): ?>

                            <?php while ($top_job = mysqli_fetch_assoc($top_jobs_result)): ?>

                                <div class="single-rated">

                                    <img class="img-fluid" src="img/r1.jpg" alt="Job">

                                    <a href="single.php?id=<?php echo (int) $top_job['id']; ?>">
                                        <h4><?php echo htmlspecialchars($top_job['judul_posisi']); ?></h4>
                                    </a>

                                    <h6><?php echo htmlspecialchars($top_job['nama_perusahaan']); ?></h6>

                                    <p>
                                        <?php echo htmlspecialchars($top_job['deskripsi']); ?>
                                    </p>

                                    <h5>
                                        Job Nature:
                                        <?php echo htmlspecialchars($top_job['tipe']); ?>
                                    </h5>

                                    <p class="address">
                                        <span class="lnr lnr-map"></span>
                                        <?php echo htmlspecialchars($top_job['lokasi']); ?>
                                    </p>

                                    <p class="address">
                                        <span class="lnr lnr-database"></span>
                                        Rp<?php echo number_format($top_job['gaji_min'], 0, ',', '.'); ?>
                                        -
                                        Rp<?php echo number_format($top_job['gaji_max'], 0, ',', '.'); ?>
                                    </p>

                                    <a href="single.php?id=<?php echo (int) $top_job['id']; ?>"
                                       class="btns text-uppercase">
                                        View Job
                                    </a>

                                </div>

                            <?php endwhile; ?>

                        <?php else: ?>

                            <p>Belum ada lowongan pilihan.</p>

                        <?php endif; ?>

                    </div>
                </div>


                <!-- JOBS BY CATEGORY -->
                <div class="single-slidebar">

                    <h4>Jobs by Category</h4>

                    <ul class="cat-list">

                        <?php if (mysqli_num_rows($category_result) > 0): ?>

                            <?php while ($category = mysqli_fetch_assoc($category_result)): ?>

                                <li>
                                    <a class="justify-content-between d-flex"
                                       href="category.php?kategori=<?php echo urlencode($category['kategori']); ?>">

                                        <p><?php echo htmlspecialchars($category['kategori']); ?></p>

                                        <span><?php echo $category['total']; ?></span>

                                    </a>
                                </li>

                            <?php endwhile; ?>

                        <?php else: ?>

                            <li><p>Belum ada kategori.</p></li>

                        <?php endif; ?>

                    </ul>
                </div>


                <!-- CAREER ADVICE BLOG -->
                <div class="single-slidebar">

                    <h4>Career Advice Blog</h4>

                    <div class="blog-list">

                        <div class="single-blog" style="background:#000 url(img/blog1.jpg);">
                            <a href="blog-home.php">
                                <h4>Tips Membuat CV yang Menarik</h4>
                            </a>

                            <div class="meta justify-content-between d-flex">
                                <p>Career Tips</p>
                            </div>
                        </div>

                        <div class="single-blog" style="background:#000 url(img/blog2.jpg);">
                            <a href="blog-home.php">
                                <h4>Persiapan Menghadapi Wawancara Kerja</h4>
                            </a>

                            <div class="meta justify-content-between d-flex">
                                <p>Career Tips</p>
                            </div>
                        </div>

                        <div class="single-blog" style="background:#000 url(img/blog1.jpg);">
                            <a href="blog-home.php">
                                <h4>Cara Mencari Pekerjaan yang Sesuai</h4>
                            </a>

                            <div class="meta justify-content-between d-flex">
                                <p>Career Tips</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- END SIDEBAR -->

        </div>
    </div>
</section>
<!-- END POST AREA -->


<!-- CALL TO ACTION -->
<section class="callto-action-area section-gap" id="join">
    <div class="container">

        <div class="row d-flex justify-content-center">
            <div class="menu-content col-lg-9">

                <div class="title text-center">

                    <h1 class="mb-10 text-white">
                        Join Us Today!
                    </h1>

                    <p class="text-white">
                        Mulai perjalanan kariermu dengan menemukan pekerjaan yang sesuai.
                    </p>

                    <a class="primary-btn" href="register.php">
                        Daftar Sekarang
                    </a>

                    <a class="primary-btn" href="search.php">
                        Cari Lowongan
                    </a>

                </div>
            </div>
        </div>

    </div>
</section>


<!-- DOWNLOAD AREA -->
<section class="download-area section-gap" id="app">
    <div class="container">

        <div class="row">

            <div class="col-lg-6 download-left">
                <img class="img-fluid" src="img/d1.png" alt="">
            </div>

            <div class="col-lg-6 download-right">

                <h1>Temukan Pekerjaan <br> Impianmu Hari Ini!</h1>

                <p class="subs">
                    Jelajahi berbagai peluang pekerjaan dan temukan posisi
                    yang sesuai dengan kemampuan serta minatmu.
                </p>

                <a href="search.php" class="primary-btn">
                    Cari Lowongan Sekarang
                </a>

            </div>

        </div>
    </div>
</section>


<!-- FOOTER -->
<footer class="footer-area section-gap">
    <div class="container">

        <div class="row">

            <div class="col-lg-3 col-md-12">
                <div class="single-footer-widget">

                    <h6>Jobboard</h6>

                    <ul class="footer-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="search.php">Cari Lowongan</a></li>
                        <li><a href="category.php">Category</a></li>
                        <li><a href="register.php">Daftar</a></li>
                    </ul>

                </div>
            </div>


            <div class="col-lg-6 col-md-12">
                <div class="single-footer-widget newsletter">

                    <h6>About Jobboard</h6>

                    <p>
                        Jobboard membantu pencari kerja menemukan peluang
                        pekerjaan di wilayah Jabodetabek.
                    </p>

                </div>
            </div>


            <div class="col-lg-3 col-md-12">
                <div class="single-footer-widget">

                    <h6>Contact</h6>

                    <p>
                        Temukan informasi lowongan pekerjaan terbaru melalui Jobboard.
                    </p>

                </div>
            </div>

        </div>


        <div class="row footer-bottom d-flex justify-content-between">

            <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
                Jobboard. All rights reserved.
            </p>

            <div class="col-lg-4 col-sm-12 footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

        </div>

    </div>
</footer>


<!-- SCRIPTS -->
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

</body>
</html>