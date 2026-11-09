-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2026 at 07:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `judul_posisi` varchar(150) NOT NULL,
  `nama_perusahaan` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `persyaratan` text DEFAULT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `gaji_min` bigint(20) DEFAULT 0,
  `gaji_max` bigint(20) DEFAULT 0,
  `status` enum('Buka','Tutup') DEFAULT 'Buka',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `judul_posisi`, `nama_perusahaan`, `deskripsi`, `persyaratan`, `lokasi`, `kategori`, `tipe`, `gaji_min`, `gaji_max`, `status`, `created_at`) VALUES
(1, 'Administrative Staff', 'PT Maju Bersama Indonesia', 'Membantu kegiatan administrasi dan pengelolaan dokumen perusahaan.', 'Mampu mengoperasikan Microsoft Office.', 'jakarta-selatan', 'administration', 'full-time', 4500000, 5500000, 'Buka', '2026-11-09 17:46:08'),
(2, 'Graphic Designer', 'Creative Digital Studio', 'Membuat desain visual untuk kebutuhan promosi dan media sosial.', 'Menguasai aplikasi desain grafis.', 'tangerang-selatan', 'design', 'full-time', 5000000, 7000000, 'Buka', '2026-11-09 17:46:08'),
(3, 'Warehouse Staff', 'PT Logistik Nusantara', 'Mengelola penerimaan, penyimpanan, dan pengiriman barang.', 'Teliti dan mampu bekerja dalam tim.', 'bekasi', 'warehouse', 'full-time', 4000000, 5000000, 'Buka', '2026-11-09 17:46:08'),
(4, 'Customer Service', 'PT Pelayanan Digital', 'Melayani pertanyaan dan membantu menangani keluhan pelanggan.', 'Memiliki kemampuan komunikasi yang baik.', 'jakarta-pusat', 'customer-service', 'full-time', 4500000, 6000000, 'Buka', '2026-11-09 17:46:08'),
(5, 'Junior Web Developer', 'Digital Creative Company', 'Membantu pengembangan dan pemeliharaan website.', 'Menguasai dasar HTML, CSS, JavaScript, dan PHP.', 'depok', 'development', 'internship', 2000000, 3500000, 'Buka', '2026-11-09 17:46:08'),
(6, 'Finance Staff', 'PT Finansial Sejahtera', 'Mengelola pencatatan transaksi dan laporan keuangan.', 'Menguasai dasar Microsoft Excel.', 'bogor', 'finance', 'full-time', 4000000, 5500000, 'Buka', '2026-11-09 17:46:08'),
(7, 'Frontend Developer', 'Pixel Digital Indonesia', 'Mengembangkan tampilan website yang responsif dan mudah digunakan.', 'Menguasai HTML, CSS, JavaScript.', 'jakarta-selatan', 'development', 'full-time', 6000000, 9000000, 'Buka', '2026-11-09 18:22:36'),
(8, 'UI/UX Designer', 'Kreasi Teknologi', 'Merancang tampilan dan pengalaman pengguna untuk aplikasi digital.', 'Menguasai Figma dan memahami UI/UX.', 'jakarta-pusat', 'design', 'full-time', 5000000, 8000000, 'Buka', '2026-11-09 18:22:36'),
(9, 'Digital Marketing Staff', 'Bright Media', 'Mengelola strategi pemasaran digital melalui media sosial dan platform online.', 'Menguasai digital marketing dan media sosial.', 'tangerang', 'marketing', 'full-time', 4500000, 6500000, 'Buka', '2026-11-09 18:22:36'),
(10, 'Data Entry Staff', 'Mitra Administrasi', 'Memasukkan dan mengelola data perusahaan secara teliti.', 'Mampu menggunakan Microsoft Excel.', 'bogor', 'administration', 'full-time', 3500000, 4500000, 'Buka', '2026-11-09 18:22:36'),
(11, 'Content Creator', 'Kreatif Nusantara', 'Membuat konten menarik untuk kebutuhan media sosial perusahaan.', 'Kreatif, mampu membuat video dan desain sederhana.', 'depok', 'content-creator', 'full-time', 4000000, 6000000, 'Buka', '2026-11-09 18:22:36'),
(12, 'HR Recruitment Staff', 'People First Group', 'Membantu proses rekrutmen dan seleksi calon karyawan.', 'Memahami proses rekrutmen dan komunikasi.', 'bekasi', 'human-resources', 'full-time', 4500000, 6000000, 'Buka', '2026-11-09 18:22:36'),
(13, 'Accounting Staff', 'Sejahtera Finance', 'Mengelola laporan keuangan dan pencatatan transaksi perusahaan.', 'Menguasai dasar akuntansi dan Excel.', 'jakarta-pusat', 'finance', 'full-time', 4500000, 6500000, 'Buka', '2026-11-09 18:22:36'),
(14, 'Social Media Admin', 'Media Kreatif', 'Mengelola akun media sosial dan berinteraksi dengan audiens.', 'Memahami platform media sosial.', 'tangerang-selatan', 'media', 'part-time', 2000000, 3500000, 'Buka', '2026-11-09 18:22:36'),
(15, 'Backend Developer Intern', 'CodeLabs Indonesia', 'Membantu pengembangan sistem backend dan pengelolaan database.', 'Memahami dasar PHP dan MySQL.', 'jakarta-selatan', 'development', 'internship', 1500000, 2500000, 'Buka', '2026-11-09 18:22:36'),
(16, 'Customer Support', 'Layanan Prima', 'Membantu pelanggan menyelesaikan pertanyaan dan kendala layanan.', 'Komunikatif dan mampu bekerja dalam tim.', 'bekasi', 'customer-service', 'full-time', 4000000, 5500000, 'Buka', '2026-11-09 18:22:36'),
(17, 'Sales Executive', 'Global Niaga', 'Menawarkan produk dan menjaga hubungan dengan pelanggan.', 'Mampu berkomunikasi dan melakukan negosiasi.', 'jakarta-utara', 'sales', 'full-time', 4500000, 7000000, 'Buka', '2026-11-09 18:22:36'),
(18, 'Video Editor', 'Visual Studio', 'Mengedit video untuk kebutuhan promosi dan konten digital.', 'Menguasai aplikasi editing video.', 'depok', 'design', 'freelance', 1500000, 4000000, 'Buka', '2026-11-09 18:22:36'),
(19, 'Admin Gudang', 'Logistik Bersama', 'Mencatat barang masuk dan keluar serta mengelola stok gudang.', 'Teliti dan mampu menggunakan komputer.', 'bekasi', 'warehouse', 'full-time', 3500000, 5000000, 'Buka', '2026-11-09 18:22:36'),
(20, 'Network Engineer', 'Nusa Teknologi', 'Melakukan pemeliharaan dan pemantauan jaringan komputer.', 'Memahami jaringan komputer dan troubleshooting.', 'jakarta-timur', 'technology', 'contract', 6000000, 8500000, 'Buka', '2026-11-09 18:22:36'),
(21, 'Tutor Matematika', 'Cerdas Edukasi', 'Mengajar dan membantu siswa memahami materi matematika.', 'Menguasai materi matematika dan komunikasi.', 'bogor', 'education', 'part-time', 1500000, 3000000, 'Buka', '2026-11-09 18:22:36'),
(22, 'Staff Logistik', 'Express Cargo', 'Mengelola proses pengiriman dan distribusi barang.', 'Mampu bekerja secara terorganisir.', 'tangerang', 'logistics', 'full-time', 4000000, 5500000, 'Buka', '2026-11-09 18:22:36'),
(23, 'Legal Assistant', 'Hukum Konsultan', 'Membantu administrasi dokumen dan kebutuhan legal perusahaan.', 'Memahami administrasi dokumen hukum.', 'jakarta-pusat', 'legal', 'full-time', 5000000, 7500000, 'Buka', '2026-11-09 18:22:36'),
(24, 'Mechanical Engineer', 'Teknik Industri Mandiri', 'Membantu perawatan dan pemeriksaan mesin produksi.', 'Memahami dasar teknik mesin.', 'tangerang-selatan', 'engineering', 'contract', 5500000, 8000000, 'Buka', '2026-11-09 18:22:36'),
(25, 'Barista', 'Kopi Sudut Kota', 'Melayani pelanggan dan menyiapkan minuman sesuai standar.', 'Mampu berkomunikasi dan bekerja dalam tim.', 'jakarta-barat', 'hospitality', 'part-time', 1800000, 2800000, 'Buka', '2026-11-09 18:22:36'),
(26, 'Security Staff', 'Aman Sentosa', 'Menjaga keamanan dan ketertiban lingkungan kerja.', 'Disiplin, bertanggung jawab, dan memiliki kemampuan komunikasi.', 'jakarta-selatan', 'security', 'full-time', 4000000, 5000000, 'Buka', '2026-11-09 18:22:36'),
(27, 'UI Designer', 'Kreatif Digital', 'Membuat desain tampilan website dan aplikasi.', '	Menguasai Figma dan dasar UI/UX.', '	bekasi', '	design', '	full-time', 5000000, 7000000, 'Buka', '2026-11-09 18:41:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
