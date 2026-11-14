<?php
require 'auth.php';
include_once 'koneksi.php';

$pageTitle = "Job Listing - Category";

// Ikon FontAwesome berdasarkan kategori
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

// Nama tampilan tiap kategori
$categories = [
    "" => "All Category",
    "technology" => "Technology & IT",
    "business" => "Business & Management",
    "administration" => "Administration & Office",
    "finance" => "Finance & Accounting",
    "marketing" => "Marketing",
    "sales" => "Sales",
    "human-resources" => "Human Resources (HR)",
    "design" => "Design & Creative",
    "development" => "Software Development",
    "customer-service" => "Customer Service",
    "education" => "Education & Training",
    "healthcare" => "Healthcare & Medical",
    "engineering" => "Engineering",
    "manufacturing" => "Manufacturing & Production",
    "logistics" => "Logistics & Supply Chain",
    "warehouse" => "Warehouse & Inventory",
    "construction" => "Construction & Property",
    "hospitality" => "Hospitality & Tourism",
    "food-beverage" => "Food & Beverage",
    "retail" => "Retail & Merchandising",
    "transportation" => "Transportation & Driver",
    "legal" => "Legal",
    "media" => "Media & Communication",
    "content-creator" => "Content Creator",
    "security" => "Security",
    "cleaning" => "Cleaning & Maintenance",
    "freelance" => "Freelance & Remote",
    "internship" => "Internship",
    "other" => "Other"
];

function labelKategori($key, $categories) {
    return $categories[$key] ?? ucwords(str_replace('-', ' ', $key));
}

// Kategori terpilih dari URL (hanya nilai yang ada di daftar yang dipakai)
$selectedCategory = $_GET['category'] ?? '';
if (!array_key_exists($selectedCategory, $categories)) {
    $selectedCategory = '';
}

// Daftar lowongan dari database
if ($selectedCategory !== '') {
    $stmt = mysqli_prepare($conn, "SELECT * FROM jobs WHERE status = 'Buka' AND kategori = ? ORDER BY created_at DESC");
    mysqli_stmt_bind_param($stmt, "s", $selectedCategory);
} else {
    $stmt = mysqli_prepare($conn, "SELECT * FROM jobs WHERE status = 'Buka' ORDER BY created_at DESC");
}
mysqli_stmt_execute($stmt);
$jobs_result = mysqli_stmt_get_result($stmt);

// Sidebar: jumlah lowongan per lokasi
$location_result = mysqli_query($conn, "
    SELECT lokasi, COUNT(*) AS total
    FROM jobs WHERE status = 'Buka'
    GROUP BY lokasi ORDER BY total DESC LIMIT 8
");

// Sidebar: jumlah lowongan per kategori
$category_result = mysqli_query($conn, "
    SELECT kategori, COUNT(*) AS total
    FROM jobs WHERE status = 'Buka'
    GROUP BY kategori ORDER BY total DESC LIMIT 10
");

// Sidebar: 2 lowongan terbaru
$top_jobs_result = mysqli_query($conn, "
    SELECT * FROM jobs WHERE status = 'Buka'
    ORDER BY created_at DESC LIMIT 2
");
?>
<!DOCTYPE html>
<html lang="id" class="no-js">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/fav.png">
	<meta name="author" content="codepixer">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<title><?php echo htmlspecialchars($pageTitle); ?></title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/nice-select.css">					
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
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
                        <li>
                            <a href="home.php">Home</a>
                        </li>

                        <li>
                            <a href="about-us.php">About Us</a>
                        </li>

                        <li class="menu-active">
                            <a href="category.php">Category</a>
                        </li>

                        <li>
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

	<!-- Start Banner Area -->
	<section class="banner-area relative" id="home">	
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">Job Category</h1>	
					<p class="text-white link-nav">
						<a href="home.php">Home </a>  
						<span class="lnr lnr-arrow-right"></span>  
						<a href="category.php"> Job category</a>
					</p>
				</div>											
			</div>
		</div>
	</section>
	<!-- End Banner Area -->	
	
	<!-- Start Post Area -->
	<section class="post-area section-gap">
		<div class="container">

			<!-- Filter Kategori -->
			<div class="row mb-30">
				<div class="col-lg-12">
					<form action="category.php" method="get" class="serach-form-area flex-row d-flex justify-content-between align-items-center">
						<div class="single-defination style-select" style="width: 100%;">
							<select name="category" class="app-select wide" onchange="this.form.submit()">
								<?php foreach ($categories as $value => $label): ?>
									<option value="<?php echo htmlspecialchars($value); ?>" <?php echo ($selectedCategory === $value) ? 'selected' : ''; ?>>
										<?php echo htmlspecialchars($label); ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</form>
				</div>
			</div>

			<div class="row justify-content-center d-flex">
				<div class="col-lg-8 post-list">

					<!-- Daftar Lowongan -->
					<?php if (mysqli_num_rows($jobs_result) > 0): ?>
						<?php while ($job = mysqli_fetch_assoc($jobs_result)): ?>
							<div class="single-post d-flex flex-row">
								<div class="thumb" style="margin-right: 20px;">
									<div style="width: 80px; height: 80px; background-color: #f4f5f8; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px;">
										<i class="fa <?php echo getCategoryIcon($job['kategori']); ?>" style="font-size: 32px; color: #49e4fa;"></i>
									</div>
									<ul class="tags">
										<li>
											<a href="category.php?category=<?php echo urlencode($job['kategori']); ?>">
												<?php echo htmlspecialchars(labelKategori($job['kategori'], $categories)); ?>
											</a>
										</li>
									</ul>
								</div>
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="single.php?id=<?php echo (int) $job['id']; ?>"><h4><?php echo htmlspecialchars($job['judul_posisi']); ?></h4></a>
											<h6><?php echo htmlspecialchars($job['nama_perusahaan']); ?></h6>					
										</div>
										<ul class="btns">
											<li><a href="single.php?id=<?php echo (int) $job['id']; ?>">Detail</a></li>
										</ul>
									</div>
									<p><?php echo htmlspecialchars($job['deskripsi']); ?></p>
									<h5>Job Nature: <?php echo htmlspecialchars(ucfirst(str_replace('-', ' ', $job['tipe']))); ?></h5>
									<p class="address"><span class="lnr lnr-map"></span> <?php echo htmlspecialchars(ucwords(str_replace('-', ' ', $job['lokasi']))); ?></p>
									<p class="address"><span class="lnr lnr-database"></span> Rp <?php echo number_format($job['gaji_min'], 0, ',', '.'); ?> - Rp <?php echo number_format($job['gaji_max'], 0, ',', '.'); ?> / Bulan</p>
								</div>
							</div>
						<?php endwhile; ?>
					<?php else: ?>
						<div class="alert alert-warning text-center">
							Belum ada lowongan pekerjaan untuk kategori ini.
						</div>
					<?php endif; ?>

				</div>

				<!-- Sidebar -->
				<div class="col-lg-4 sidebar">
					
					<!-- Jobs by Location -->
					<div class="single-slidebar">
						<h4>Jobs by Location</h4>
						<ul class="cat-list">
							<?php if (mysqli_num_rows($location_result) > 0): ?>
								<?php while ($loc = mysqli_fetch_assoc($location_result)): ?>
									<li>
										<a class="justify-content-between d-flex" href="search.php?lokasi=<?php echo urlencode($loc['lokasi']); ?>">
											<p><?php echo htmlspecialchars(ucwords(str_replace('-', ' ', $loc['lokasi']))); ?></p>
											<span><?php echo (int) $loc['total']; ?></span>
										</a>
									</li>
								<?php endwhile; ?>
							<?php else: ?>
								<li><p>Belum ada data lokasi.</p></li>
							<?php endif; ?>
						</ul>
					</div>

					<!-- Top Rated Job Posts -->
					<div class="single-slidebar">
						<h4>Top Rated Job Posts</h4>
						<div class="active-relatedjob-carusel">
							<?php if (mysqli_num_rows($top_jobs_result) > 0): ?>
								<?php while ($top = mysqli_fetch_assoc($top_jobs_result)): ?>
									<div class="single-rated">
										<img class="img-fluid" src="img/r1.jpg" alt="">
										<a href="single.php?id=<?php echo (int) $top['id']; ?>"><h4><?php echo htmlspecialchars($top['judul_posisi']); ?></h4></a>
										<h6><?php echo htmlspecialchars($top['nama_perusahaan']); ?></h6>
										<p><?php echo htmlspecialchars($top['deskripsi']); ?></p>
										<h5>Job Nature: <?php echo htmlspecialchars(ucfirst(str_replace('-', ' ', $top['tipe']))); ?></h5>
										<p class="address"><span class="lnr lnr-map"></span> <?php echo htmlspecialchars(ucwords(str_replace('-', ' ', $top['lokasi']))); ?></p>
										<p class="address"><span class="lnr lnr-database"></span> Rp <?php echo number_format($top['gaji_min'], 0, ',', '.'); ?> - Rp <?php echo number_format($top['gaji_max'], 0, ',', '.'); ?></p>
										<a href="single.php?id=<?php echo (int) $top['id']; ?>" class="btns text-uppercase">View job</a>
									</div>
								<?php endwhile; ?>
							<?php else: ?>
								<p>Belum ada lowongan pilihan.</p>
							<?php endif; ?>
						</div>
					</div>							

					<!-- Jobs by Category -->
					<div class="single-slidebar">
						<h4>Jobs by Category</h4>
						<ul class="cat-list">
							<?php if (mysqli_num_rows($category_result) > 0): ?>
								<?php while ($cat = mysqli_fetch_assoc($category_result)): ?>
									<li>
										<a class="justify-content-between d-flex" href="category.php?category=<?php echo urlencode($cat['kategori']); ?>">
											<p><?php echo htmlspecialchars(labelKategori($cat['kategori'], $categories)); ?></p>
											<span><?php echo (int) $cat['total']; ?></span>
										</a>
									</li>
								<?php endwhile; ?>
							<?php else: ?>
								<li><p>Belum ada kategori.</p></li>
							<?php endif; ?>
						</ul>
					</div>

				</div>
			</div>
		</div>	
	</section>
	<!-- End Post Area -->

	<!-- Footer Area -->
	<footer class="footer-area section-gap">
		<div class="container">
			<div class="row footer-bottom d-flex justify-content-between">
				<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
					Copyright &copy;<?php echo date('Y'); ?> All rights reserved | Template made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
				</p>
				<div class="col-lg-4 col-sm-12 footer-social">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-dribbble"></i></a>
					<a href="#"><i class="fa fa-behance"></i></a>
				</div>
			</div>
		</div>
	</footer>

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
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