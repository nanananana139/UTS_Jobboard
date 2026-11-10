<?php
// Konfigurasi Title Halaman
$pageTitle = "Job Listing - Category";

// Fungsi Helper untuk Menentukan Ikon FontAwesome Berdasarkan Kategori Pekerjaan
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

// Daftar Pilihan Kategori Lengkap
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

// Data Lowongan Kerja Lengkap untuk Semua Kategori Beserta Range Gaji
$jobListings = [
    [
        "title" => "IT Systems Administrator",
        "category" => "technology",
        "company" => "PT Tech Innovation Indonesia",
        "tags" => ["Tech", "IT", "Infrastructure"],
        "desc" => "MENGELOLA SERVER, INFRASTRUKTUR JARINGAN, SERTA KEAMANAN PERANGKAT KOMPUTER PERUSAHAAN.",
        "type" => "Full time",
        "location" => "Jakarta Selatan, DKI Jakarta",
        "salary" => "Rp 8.000.000 - Rp 14.000.000 / Bulan"
    ],
    [
        "title" => "Business Development Manager",
        "category" => "business",
        "company" => "Solusi Data Nusantara",
        "tags" => ["Business", "Strategy", "Management"],
        "desc" => "MERENCANAKAN STRATEGI PERSIAPAN BISNIS BARU DAN MEMBANGUN KEMITRAAN STRATEGIS DENGAN KLIEN.",
        "type" => "Full time",
        "location" => "BSD City, Tangerang Selatan",
        "salary" => "Rp 12.000.000 - Rp 22.000.000 / Bulan"
    ],
    [
        "title" => "Admin Operations Executive",
        "category" => "administration",
        "company" => "PT Mitra Utama Perkasa",
        "tags" => ["Admin", "Office", "Data Entry"],
        "desc" => "MENGELOLA DOKUMENTASI KANTOR, PENGATURAN JADWAL, DAN OPERASIONAL HARIAN PERUSAHAAN.",
        "type" => "Full time",
        "location" => "Jakarta Pusat, DKI Jakarta",
        "salary" => "Rp 4.800.000 - Rp 7.000.000 / Bulan"
    ],
    [
        "title" => "Senior Finance & Accounting Officer",
        "category" => "finance",
        "company" => "PT Finance Solusindo",
        "tags" => ["Finance", "Accounting", "Tax"],
        "desc" => "MENGELOLA LAPORAN KEUANGAN BULANAN, PEMBAYARAN PAJAK, DAN PERENCANAAN ANGGARAN PERUSAHAAN.",
        "type" => "Full time",
        "location" => "Jakarta Barat, DKI Jakarta",
        "salary" => "Rp 9.000.000 - Rp 15.000.000 / Bulan"
    ],
    [
        "title" => "Digital Marketing Specialist",
        "category" => "marketing",
        "company" => "Media Kreatif Indonesia",
        "tags" => ["Marketing", "SEO", "Ads"],
        "desc" => "MERANCANG STRATEGI KAMPANYE IKLAN DIGITAL (GOOGLE ADS, META ADS) DAN OPTIMASI SEO.",
        "type" => "Full time",
        "location" => "Tangerang, Banten",
        "salary" => "Rp 6.500.000 - Rp 11.000.000 / Bulan"
    ],
    [
        "title" => "Corporate Sales Executive",
        "category" => "sales",
        "company" => "PT Niaga Global Utama",
        "tags" => ["Sales", "B2B", "Account Manager"],
        "desc" => "MENCARI KLIEN B2B BARU DAN MENCAPAI TARGET PENJUALAN PRODUK PERUSAHAAN SECARA KONSISTEN.",
        "type" => "Full time",
        "location" => "Bekasi, Jawa Barat",
        "salary" => "Rp 5.500.000 - Rp 10.000.000 / Bulan + Komisi"
    ],
    [
        "title" => "Human Resources (HR) Specialist",
        "category" => "human-resources",
        "company" => "PT Talent Mandiri Indonesia",
        "tags" => ["HR", "Recruitment", "Payroll"],
        "desc" => "MENGELOLA PROSES REKRUTMEN KARYAWAN, HUBUNGAN INDUSTRIAL, DAN PENGELOLAAN PAYROLL.",
        "type" => "Full time",
        "location" => "Depok, Jawa Barat",
        "salary" => "Rp 7.000.000 - Rp 12.000.000 / Bulan"
    ],
    [
        "title" => "Senior UI/UX Designer",
        "category" => "design",
        "company" => "Studio Kreatif Nusantara",
        "tags" => ["Design", "UI/UX", "Figma"],
        "desc" => "MERANCANG ANTARMUKA DAN PENGALAMAN PENGGUNA UNTUK APLIKASI MOBILE DAN WEB APLICATION.",
        "type" => "Full time",
        "location" => "Jakarta Selatan, DKI Jakarta",
        "salary" => "Rp 10.000.000 - Rp 18.000.000 / Bulan"
    ],
    [
        "title" => "Full Stack Software Developer",
        "category" => "development",
        "company" => "Fintech Nusantara Utama",
        "tags" => ["Development", "React", "NodeJS"],
        "desc" => "MEMBANGUN APLIKASI WEB FRONTEND DAN BACKEND DENGAN SKALABILITAS TINGGI DAN TEKNOLOGI MODERN.",
        "type" => "Full time",
        "location" => "Jakarta Selatan, DKI Jakarta",
        "salary" => "Rp 14.000.000 - Rp 25.000.000 / Bulan"
    ],
    [
        "title" => "Customer Support Representative",
        "category" => "customer-service",
        "company" => "PT Layanan Prima Indonesia",
        "tags" => ["Customer Service", "Helpdesk", "Support"],
        "desc" => "MELAYANI PERTANYAAN KLIEN DAN MENYELESAIKAN KELUHAN PELANGGAN MELALUI TELEPON DAN CHAT.",
        "type" => "Full time",
        "location" => "Jakarta Timur, DKI Jakarta",
        "salary" => "Rp 4.500.000 - Rp 6.500.000 / Bulan"
    ],
    [
        "title" => "Academic Training Instructor",
        "category" => "education",
        "company" => "Lembaga Edukasi Bangsa",
        "tags" => ["Education", "Trainer", "Teacher"],
        "desc" => "MENYUSUN KURIKULUM PEMBELAJARAN DAN MENJADI INSTRUKTUR PELATIHAN PROFESIONAL.",
        "type" => "Full time",
        "location" => "Bogor, Jawa Barat",
        "salary" => "Rp 5.500.000 - Rp 9.500.000 / Bulan"
    ],
    [
        "title" => "Staf Medis / Perawat Kesehatan",
        "category" => "healthcare",
        "company" => "Klinik Medika Sejahtera",
        "tags" => ["Healthcare", "Medical", "Nurse"],
        "desc" => "MEMBANTU DOKTER DALAM PENANGANAN PASIEN SERTA MERAWAT KEBUTUHAN MEDIS HARIAN KLIEN.",
        "type" => "Full time",
        "location" => "Bekasi, Jawa Barat",
        "salary" => "Rp 5.000.000 - Rp 8.000.000 / Bulan"
    ],
    [
        "title" => "Mechanical Engineer",
        "category" => "engineering",
        "company" => "PT Rekayasa Teknik Utama",
        "tags" => ["Engineering", "Mechanical", "AutoCAD"],
        "desc" => "MERANCANG, MENGUJI, DAN MERAWAT MESIN PABRIK SERTA SISTEM MEKANIKAL INDUSTRI.",
        "type" => "Full time",
        "location" => "Cikarang, Bekasi",
        "salary" => "Rp 8.500.000 - Rp 15.000.000 / Bulan"
    ],
    [
        "title" => "Production Supervisor",
        "category" => "manufacturing",
        "company" => "PT Manufaktur Industri Indonesia",
        "tags" => ["Manufacturing", "Production", "Factory"],
        "desc" => "MENGAWASI JALANNYA PROSES PRODUKSI PABRIK DAN MEMASTIKAN TARGET PRODUKSI TERCEPAI.",
        "type" => "Full time",
        "location" => "Karawang, Jawa Barat",
        "salary" => "Rp 7.500.000 - Rp 12.500.000 / Bulan"
    ],
    [
        "title" => "Logistics & Supply Chain Coordinator",
        "category" => "logistics",
        "company" => "PT Logistik Ekspres Nusantara",
        "tags" => ["Logistics", "Supply Chain", "Shipping"],
        "desc" => "MENGATUR DISTRIBUSI BARANG, PENGIRIMAN ARMADA, DAN EFISIENSI RUTE LOGISTIK.",
        "type" => "Full time",
        "location" => "Jakarta Utara, DKI Jakarta",
        "salary" => "Rp 6.000.000 - Rp 10.000.000 / Bulan"
    ],
    [
        "title" => "Warehouse & Inventory Officer",
        "category" => "warehouse",
        "company" => "PT Gudang Trans Logistik",
        "tags" => ["Warehouse", "Inventory", "Stock"],
        "desc" => "MENGELOLA PENCATATAN STOK BARANG, PENERIMAAN DOKUMEN GUDANG, DAN PENGELUARAN ITEM.",
        "type" => "Full time",
        "location" => "Tangerang Kabupaten, Banten",
        "salary" => "Rp 4.800.000 - Rp 7.500.000 / Bulan"
    ],
    [
        "title" => "Site Construction Manager",
        "category" => "construction",
        "company" => "PT Pembangunan Properti Utama",
        "tags" => ["Construction", "Civil", "Property"],
        "desc" => "MEMIMPIN PROJEK KONSTRUKSI LAPANGAN DAN MEMASTIKAN STANDAR KESELAMATAN K3 TERJAGA.",
        "type" => "Full time",
        "location" => "Jakarta Pusat, DKI Jakarta",
        "salary" => "Rp 13.000.000 - Rp 23.000.000 / Bulan"
    ],
    [
        "title" => "Hotel Duty Manager",
        "category" => "hospitality",
        "company" => "Grand Hotel & Resort",
        "tags" => ["Hospitality", "Hotel", "Tourism"],
        "desc" => "MENGELOLA OPERASIONAL HARIAN HOTEL DAN MEMASTIKAN KEPUASAN TAMU DI LEVEL TERTINGGI.",
        "type" => "Full time",
        "location" => "Bogor, Jawa Barat",
        "salary" => "Rp 7.000.000 - Rp 12.000.000 / Bulan"
    ],
    [
        "title" => "Head Chef / Restaurant Manager",
        "category" => "food-beverage",
        "company" => "Nusantara Kuliner Group",
        "tags" => ["Food", "Beverage", "Chef"],
        "desc" => "MENGELOLA DAPUR RESTORAN, MENJAGA KUALITAS MENU, DAN MENJAGA EFISIENSI BAHAN BAKU.",
        "type" => "Full time",
        "location" => "Jakarta Selatan, DKI Jakarta",
        "salary" => "Rp 8.000.000 - Rp 14.000.000 / Bulan"
    ],
    [
        "title" => "Retail Store Manager",
        "category" => "retail",
        "company" => "PT Retail Fashion Indonesia",
        "tags" => ["Retail", "Store", "Merchandising"],
        "desc" => "BERKONTRIBUSI DALAM PENGELOLAAN TOKO RETAIL, PENJUALAN PRODUK, DAN MANAJEMEN STAF.",
        "type" => "Full time",
        "location" => "Tangerang Selatan, Banten",
        "salary" => "Rp 6.000.000 - Rp 9.500.000 / Bulan"
    ],
    [
        "title" => "Corporate Driver & Transport Specialist",
        "category" => "transportation",
        "company" => "PT Armada Transportasi Sejahtera",
        "tags" => ["Transportation", "Driver", "Logistics"],
        "desc" => "BERTANGGUNG JAWAB DALAM PENGANTARAN DOKUMEN DAN OPERASIONAL DIREKSI PERUSAHAAN.",
        "type" => "Full time",
        "location" => "Jakarta Pusat, DKI Jakarta",
        "salary" => "Rp 4.500.000 - Rp 6.200.000 / Bulan"
    ],
    [
        "title" => "Corporate Legal Counsel",
        "category" => "legal",
        "company" => "PT Hukum & Mitra Indonesia",
        "tags" => ["Legal", "Compliance", "Lawyer"],
        "desc" => "MENYUSUN KONTRAK KERJASAMA KLIEN, MENJAGA COMPLIANCE, DAN MEMBERIKAN NASEHAT HUKUM PERUSAHAAN.",
        "type" => "Full time",
        "location" => "Jakarta Selatan, DKI Jakarta",
        "salary" => "Rp 11.000.000 - Rp 20.000.000 / Bulan"
    ],
    [
        "title" => "Media & Public Relations Officer",
        "category" => "media",
        "company" => "PT Media Komunikasi Nusantara",
        "tags" => ["Media", "PR", "Communication"],
        "desc" => "MEMBANGUN HUBUNGAN DENGAN MEDIA MASSA DAN MERANCANG SIARAN PERS RESMI PERUSAHAAN.",
        "type" => "Full time",
        "location" => "Jakarta Barat, DKI Jakarta",
        "salary" => "Rp 6.500.000 - Rp 11.000.000 / Bulan"
    ],
    [
        "title" => "Content Creator & Video Specialist",
        "category" => "content-creator",
        "company" => "Creative Digital Agency",
        "tags" => ["Content Creator", "Video", "TikTok"],
        "desc" => "MEMBUAT KONTEN KREATIF PROMOSI UNTUK PLATFORM TIKTOK, INSTAGRAM REELS, DAN YOUTUBE.",
        "type" => "Full time",
        "location" => "Depok, Jawa Barat",
        "salary" => "Rp 5.500.000 - Rp 9.000.000 / Bulan"
    ],
    [
        "title" => "Security Supervisor (Satpam Kantor)",
        "category" => "security",
        "company" => "PT Garda Keamanan Nasional",
        "tags" => ["Security", "Guard", "Safety"],
        "desc" => "MENJAGA KEAMANAN AREA GEDUNG PERUSAHAAN DAN MEMASTIKAN KETERTIBAN LINGKUNGAN KANTOR.",
        "type" => "Full time",
        "location" => "Bekasi, Jawa Barat",
        "salary" => "Rp 4.500.000 - Rp 6.000.000 / Bulan"
    ],
    [
        "title" => "Facility Cleaning & Maintenance Officer",
        "category" => "cleaning",
        "company" => "PT Bersih Sejahtera Servis",
        "tags" => ["Cleaning", "Maintenance", "Facility"],
        "desc" => "MERAWAT KEBERSIHAN FASILITAS KANTOR DAN MELAKUKAN PERBAIKAN RINGAN PERALATAN GEDUNG.",
        "type" => "Full time",
        "location" => "Tangerang, Banten",
        "salary" => "Rp 4.200.000 - Rp 5.500.000 / Bulan"
    ],
    [
        "title" => "Freelance Graphic Designer & Copywriter",
        "category" => "freelance",
        "company" => "Digital Studio Remote",
        "tags" => ["Freelance", "Remote", "Design"],
        "desc" => "MENERIMA PROJEK DESAIN GRAFIS DAN PENULISAN KONTEN SECARA FLEKSIBEL DARI RUMAH.",
        "type" => "Freelance",
        "location" => "Remote / Work From Home",
        "salary" => "Rp 4.000.000 - Rp 10.000.000 / Project"
    ],
    [
        "title" => "Software Engineering Intern",
        "category" => "internship",
        "company" => "StartUp Inovasi Digital",
        "tags" => ["Internship", "Software", "Magang"],
        "desc" => "MAGANG BELAJAR PENGEMBANGAN SOFTWARE DAN MEMBANTU TIM ENGINEER DALAM PROJEK NYATA.",
        "type" => "Internship",
        "location" => "Jakarta Selatan, DKI Jakarta",
        "salary" => "Rp 2.500.000 - Rp 4.000.000 / Bulan"
    ],
    [
        "title" => "General Operational Staff",
        "category" => "other",
        "company" => "PT Serba Usaha Nusantara",
        "tags" => ["General", "Operations", "Staff"],
        "desc" => "MEMBANTU BERBAGAI TUGAS OPERASIONAL UMUM PERUSAHAAN SESUAI KEBUTUHAN TIM.",
        "type" => "Full time",
        "location" => "Jakarta Barat, DKI Jakarta",
        "salary" => "Rp 4.500.000 - Rp 6.500.000 / Bulan"
    ]
];

// Menangkap filter kategori terpilih dari URL
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : '';

// Melakukan filter lowongan jika ada kategori yang dipilih
$filteredListings = $jobListings;
if (!empty($selectedCategory)) {
    $filteredListings = array_filter($jobListings, function($job) use ($selectedCategory) {
        return $job['category'] === $selectedCategory;
    });
}
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
</head>
<body>

	<header id="header">
	    <div class="container">
	    	<div class="row align-items-center justify-content-between d-flex">
		      <div id="logo">
		        <a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
		      </div>
		      <nav id="nav-menu-container">
		        <ul class="nav-menu">
		          <li class="menu-active"><a href="index.php">Home</a></li>
		          <li><a href="about-us.php">About Us</a></li>
		          <li><a href="category.php">Category</a></li>
		          <li><a href="price.php">Price</a></li>
		          <li><a href="blog-home.php">Blog</a></li>
		          <li><a href="contact.php">Contact</a></li>
		          <li class="menu-has-children"><a href="#">Pages</a>
		            <ul>
						<li><a href="elements.php">elements</a></li>
						<li><a href="search.php">search</a></li>
						<li><a href="single.php">single</a></li>
		            </ul>
		          </li>
		          <li><a class="ticker-btn" href="#">Signup</a></li>
		          <li><a class="ticker-btn" href="#">Login</a></li>				          				          
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
						<a href="index.php">Home </a>  
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

			<!-- Dynamic Dropdown Filter -->
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

					<!-- Job List Output -->
					<?php if (!empty($filteredListings)): ?>
						<?php foreach ($filteredListings as $job): ?>
							<div class="single-post d-flex flex-row">
								<div class="thumb" style="margin-right: 20px;">
									<!-- Kotak Ikon Kategori Berbasis FontAwesome -->
									<div style="width: 80px; height: 80px; background-color: #f4f5f8; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px;">
										<i class="fa <?php echo getCategoryIcon($job['category']); ?>" style="font-size: 32px; color: #49e4fa;"></i>
									</div>
									<ul class="tags">
										<?php foreach ($job['tags'] as $tag): ?>
											<li><a href="#"><?php echo htmlspecialchars($tag); ?></a></li>
										<?php endforeach; ?>
									</ul>
								</div>
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="single.php"><h4><?php echo htmlspecialchars($job['title']); ?></h4></a>
											<h6><?php echo htmlspecialchars($job['company']); ?></h6>					
										</div>
										<ul class="btns">
											<li><a href="#"><span class="lnr lnr-heart"></span></a></li>
											<li><a href="#">Apply</a></li>
										</ul>
									</div>
									<p><?php echo htmlspecialchars($job['desc']); ?></p>
									<h5>Job Nature: <?php echo htmlspecialchars($job['type']); ?></h5>
									<p class="address"><span class="lnr lnr-map"></span> <?php echo htmlspecialchars($job['location']); ?></p>
									<p class="address"><span class="lnr lnr-database"></span> <?php echo htmlspecialchars($job['salary']); ?></p>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="alert alert-warning text-center">
							Belum ada lowongan pekerjaan untuk kategori ini.
						</div>
					<?php endif; ?>

				</div>

				<!-- Sidebar Area -->
				<div class="col-lg-4 sidebar">
					
					<!-- Jobs by Location -->
					<div class="single-slidebar">
						<h4>Jobs by Location</h4>
						<ul class="cat-list">
							<li><a class="justify-content-between d-flex" href="category.php"><p>Jakarta</p><span>142</span></a></li>
							<li><a class="justify-content-between d-flex" href="category.php"><p>Bogor</p><span>35</span></a></li>
							<li><a class="justify-content-between d-flex" href="category.php"><p>Depok</p><span>28</span></a></li>
							<li><a class="justify-content-between d-flex" href="category.php"><p>Tangerang</p><span>64</span></a></li>
							<li><a class="justify-content-between d-flex" href="category.php"><p>Tangerang Selatan</p><span>45</span></a></li>
							<li><a class="justify-content-between d-flex" href="category.php"><p>Bekasi</p><span>52</span></a></li>
						</ul>
					</div>

					<!-- Top Rated Jobs Carousel -->
					<div class="single-slidebar">
						<h4>Top Rated Job Posts</h4>
						<div class="active-relatedjob-carusel">
							<div class="single-rated">
								<img class="img-fluid" src="img/r1.jpg" alt="">
								<a href="single.php"><h4>Full Stack Software Developer</h4></a>
								<h6>Fintech Nusantara Utama</h6>
								<p>Pengembangan sistem dan aplikasi skala besar menggunakan teknologi modern.</p>
								<h5>Job Nature: Full time</h5>
								<p class="address"><span class="lnr lnr-map"></span> Jakarta Selatan</p>
								<p class="address"><span class="lnr lnr-database"></span> Rp 14.000.000 - Rp 25.000.000</p>
								<a href="#" class="btns text-uppercase">Apply job</a>
							</div>
							<div class="single-rated">
								<img class="img-fluid" src="img/r1.jpg" alt="">
								<a href="single.php"><h4>Site Construction Manager</h4></a>
								<h6>PT Pembangunan Properti Utama</h6>
								<p>Memimpin projek konstruksi lapangan dan standar keselamatan kerja.</p>
								<h5>Job Nature: Full time</h5>
								<p class="address"><span class="lnr lnr-map"></span> Jakarta Pusat</p>
								<p class="address"><span class="lnr lnr-database"></span> Rp 13.000.000 - Rp 23.000.000</p>
								<a href="#" class="btns text-uppercase">Apply job</a>
							</div>
						</div>
					</div>							

					<!-- Jobs by Category Sidebar -->
					<div class="single-slidebar">
						<h4>Jobs by Category</h4>
						<ul class="cat-list">
							<?php 
							// Menampilkan sebagian daftar kategori di Sidebar
							$count = 0;
							foreach ($categories as $catKey => $catLabel): 
								if ($catKey === "") continue;
								if ($count >= 10) break; // Tampilkan 10 teratas
								$count++;
							?>
								<li>
									<a class="justify-content-between d-flex" href="category.php?category=<?php echo urlencode($catKey); ?>">
										<p><?php echo htmlspecialchars($catLabel); ?></p>
										<span><?php echo rand(15, 95); ?></span>
									</a>
								</li>
							<?php endforeach; ?>
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