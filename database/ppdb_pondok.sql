-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2025 at 02:15 AM
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
-- Database: `ppdb_pondok`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '123', 'admin', '2025-05-04 07:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `calon_santri`
--

CREATE TABLE `calon_santri` (
  `id` int(11) NOT NULL,
  `No` int(11) NOT NULL,
  `tanggal_pendaftaran` date NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `tinggal_bersama` enum('Orang Tua','Wali','Lainnya') NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `sekolah_terakhir` varchar(100) NOT NULL,
  `pernah_mondok` enum('Ya','Tidak') NOT NULL,
  `nama_pondok_sebelumnya` varchar(100) DEFAULT NULL,
  `alamat_pondok_sebelumnya` text DEFAULT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `tempat_lahir_ayah` varchar(50) NOT NULL,
  `tanggal_lahir_ayah` date NOT NULL,
  `tempat_lahir_ibu` varchar(50) NOT NULL,
  `tanggal_lahir_ibu` date NOT NULL,
  `pekerjaan_ayah` enum('Wiraswasta','Guru','PNS','TNI/POLRI','Pensiunan','Lainnya') NOT NULL,
  `pekerjaan_ibu` enum('Wiraswasta','Guru','PNS','TNI/POLRI','Pensiunan','Lainnya') NOT NULL,
  `penghasilan_ayah` enum('Dibawah 1 Juta','1-3 Juta','3-5 Juta','Di atas 5 Juta') NOT NULL,
  `penghasilan_ibu` enum('Dibawah 1 Juta','1-3 Juta','3-5 Juta','Di atas 5 Juta') NOT NULL,
  `alamat_rumah` text NOT NULL,
  `no_hp_ortu` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `status_pendaftaran` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calon_santri`
--

INSERT INTO `calon_santri` (`id`, `No`, `tanggal_pendaftaran`, `username`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `alamat_lengkap`, `tinggal_bersama`, `jenis_kelamin`, `sekolah_terakhir`, `pernah_mondok`, `nama_pondok_sebelumnya`, `alamat_pondok_sebelumnya`, `nama_ayah`, `nama_ibu`, `tempat_lahir_ayah`, `tanggal_lahir_ayah`, `tempat_lahir_ibu`, `tanggal_lahir_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `alamat_rumah`, `no_hp_ortu`, `created_at`, `asal_sekolah`, `status_pendaftaran`, `keterangan`, `email`, `user_id`) VALUES
(1, 1, '2023-10-01', 'Dhani', 'Ahmad Dhani Mulyono', 'Bandung', '2005-05-15', 'Jl. Merdeka No. 123, Jakarta', '', 'Laki-laki', 'SD Negeri 1 Jakarta', 'Ya', 'Pesantren darul ulum', 'Gebang', 'Budi Santoso', 'Siti Aminah', 'Bandung', '1975-08-20', 'Surabaya', '1978-03-25', 'Wiraswasta', '', '3-5 Juta', 'Dibawah 1 Juta', 'Jl. Pendidikan No. 45, Bandung', '081234567890', '2025-01-26 00:50:42', 'Tidak Diketahui', 'Ditolak', 'Tidak Lulus', NULL, 0),
(2, 2, '2025-12-12', 'Sri', 'Sri Rahayu', 'Bandung', '2006-08-20', 'Jl. Pendidikan No. 45, Bandung', '', 'Perempuan', 'SMP Bumiayu', 'Ya', 'Pesantren Al Azhar', 'sigambir', 'Supri', 'Kita Kartini', 'Bandung', '1988-01-01', 'Jakarta', '1988-02-02', 'Wiraswasta', 'Wiraswasta', 'Dibawah 1 Juta', 'Dibawah 1 Juta', 'Babakan', '088200601669', '2025-01-26 01:43:25', 'SMP Negeri 2 Bandung', 'Diterima', 'Lulus', NULL, 0),
(3, 3, '2025-02-02', 'Ahmad', 'Ahmad Zaky', 'Brebes', '2003-02-01', 'Dukuhsalam Kec. Losari Kab. Brebes', '', 'Laki-laki', 'STM Sukabumi', 'Tidak', '-', '-', 'Saya satpol', 'Kita Kartini', 'Brebes', '1899-12-21', 'Brebes', '1999-02-12', 'Wiraswasta', 'Wiraswasta', 'Dibawah 1 Juta', 'Dibawah 1 Juta', 'Losarang', '0898988989888', '2025-01-26 02:43:28', NULL, 'Diterima', 'Lulus', NULL, 0),
(4, 4, '2025-02-01', 'Abdul', 'Abdul Hasan', 'Jakarta', '2003-02-01', 'Jln. Raya Jakarta Baru Es Teh', 'Orang Tua', 'Laki-laki', 'MA Jakarta', 'Ya', 'Darutaqwa Jakarta Selatan', 'Jln. Sigambir Selatan', 'Supri', 'Darmi', 'Bandung', '1889-12-12', 'Jakarta', '1888-02-13', 'Guru', 'Wiraswasta', '1-3 Juta', 'Dibawah 1 Juta', 'Jakarta Selatan, Jl. JalanSendiriAja', '084567826473', '2025-02-01 02:31:06', NULL, 'Diterima', 'Lulus', NULL, 0),
(13, 0, '2025-04-26', 'Denis', 'Denis Adit', 'Solo', '2025-04-26', 'Solo, Jalan raya banget', '', 'Laki-laki', 'SMP Solo', 'Ya', 'Pondok Yalalwathon', 'Desa sukasaya, kec. bener kab. solo', 'Jajang Mul', 'Dini', 'Sulawesi', '1886-02-02', 'Adoh', '1887-01-01', 'Guru', 'Guru', '1-3 Juta', 'Dibawah 1 Juta', 'Jl. Sukasaya no. 123', '008388383838', '2025-04-26 16:02:41', NULL, 'Ditolak', 'Lulus', NULL, 0),
(14, 0, '2025-05-08', 'Naufal', 'Naufal', 'Tangerang', '2025-05-08', 'Kota Tangerang', 'Orang Tua', 'Laki-laki', 'SMK Tadika Mesra', 'Ya', 'Pesantren Rock n Roll', 'Jl. Yang lurus banget', 'Abi', 'Umi', 'Subang', '1888-02-02', 'Subang juga', '1899-03-03', 'TNI/POLRI', 'Guru', 'Di atas 5 Juta', '1-3 Juta', 'Jl. Jalan-jalan ke kota', '089098767677', '2025-05-08 11:47:43', NULL, NULL, NULL, NULL, 0),
(15, 0, '2025-05-02', '', 'Saya', 'Rumah Sakit', '2025-05-01', 'Jl. Jalnin aja dulu', 'Orang Tua', 'Laki-laki', 'SMA Menengah', 'Tidak', NULL, NULL, 'Ayah', 'Ibu', 'Sama aja', '1945-02-02', 'Kaya kemarin', '1965-04-04', 'PNS', 'Guru', 'Di atas 5 Juta', '3-5 Juta', 'Jl. Gede banget', '089999999222', '2025-05-08 12:09:21', NULL, 'Diterima', 'Lulus', NULL, 0),
(25, 0, '2025-05-12', 'Zami', 'Zami', 'Songgom', '2003-03-03', 'Songgom Brebes', 'Orang Tua', 'Laki-laki', 'SMA Maarif Brebes', 'Ya', 'Pondok Pesantren Buntet', 'Songgom Brebes', 'Ayah zami', 'Ibu zami', 'Jalawatu', '1899-03-03', 'Jakarta', '1899-03-04', 'Wiraswasta', 'Wiraswasta', 'Dibawah 1 Juta', 'Dibawah 1 Juta', 'Songgom Brebes', '088888777777', '2025-05-12 14:59:57', NULL, NULL, NULL, NULL, 0),
(26, 0, '2025-05-12', NULL, 'Nobita', 'Jepang', '2025-05-12', 'Angkasa raya', 'Orang Tua', 'Laki-laki', 'SMA Jepang', 'Ya', '-', '-', 'Ayah Nobi', 'Ibu Nobi', 'Jepang', '2025-05-12', 'Jepang', '2025-05-12', 'Wiraswasta', 'Wiraswasta', 'Dibawah 1 Juta', 'Dibawah 1 Juta', 'Jepang dalam negri', '0999999999999', '2025-05-12 15:26:40', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_info` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_info`, `judul`, `deskripsi`, `gambar`, `link`, `created_at`) VALUES
(13, 'Haul Almagfurllah', 'haul akjskdja akjdj aksdj ', 'informasi2.JPG', 'pendaftaran.php', '2025-02-06 01:50:26'),
(14, 'Santri pondok pesantren Al-Muflihin', 'qwoqiei qeiw qejwj ', 'informasi1.jpg', 'informasi.php', '2025-02-06 01:51:36'),
(15, 'Khitobah Kelas Akhir TMI', 'khitobah kelas akhir TMI', 'informasi3.jpg', 'pendaftaran.php', '2025-02-06 01:57:03'),
(16, 'Ujian Santri', 'ujian santri eakeak akjwkjjk ajkfa', 'informasi4.jpg', 'form_pendaftaran.php', '2025-02-06 02:02:16'),
(17, 'Penerimaan santri baru', 'wjjwha dajsfja asjfh', 'brosur1.jpg', 'form_pendaftaran.php', '2025-02-06 02:03:05'),
(18, 'Penerimaan santri baru', 'penerimaan santri baru', 'brosur2.jpg', 'form_pendaftaran.php', '2025-02-06 02:03:46'),
(19, 'Penerimaan santri baru', 'Penerimaan santri baru tahun ajaran 2025/2026 telah dibuka, ayo daftar sekarang!!!', 'psb1.jpg', 'pendaftaran.php', '2025-02-10 11:52:33'),
(20, 'Penerimaan santri baru', 'Penerimaan santri baru tahun ajaran 2025/2026 telah dibuka, ayo daftar sekarang!!!', 'psb2.jpg', 'pendaftaran.php', '2025-02-10 11:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `calon_santri_id` int(11) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `status` enum('Menunggu','Diterima','Ditolak') DEFAULT 'Menunggu',
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `calon_santri_id`, `tanggal_daftar`, `status`, `catatan`) VALUES
(1, 1, '2023-10-01', 'Menunggu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_lengkap` text DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `sekolah_terakhir` varchar(100) DEFAULT NULL,
  `tinggal_bersama` varchar(50) DEFAULT NULL,
  `pernah_mondok` enum('Ya','Tidak') DEFAULT NULL,
  `nama_pondok_sebelumnya` varchar(100) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `penghasilan_ayah` varchar(50) DEFAULT NULL,
  `penghasilan_ibu` varchar(50) DEFAULT NULL,
  `alamat_rumah` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(5, 'Zaky', 'zaky@gmail.com', '$2y$10$oLdq7Zn09//8VK90VdRUFuaKjZS0j7iIOBATZ075ZVYEtKBBBrbi2', 'admin', '2025-01-30 10:27:53'),
(15, 'Denis', 'denis@gmail.com', '$2y$10$1KffMfVfakIPi.J1tSdoKeB26ObY/xoG2Pc.e/umGLpByr9KZL8oO', 'user', '2025-04-25 14:44:29'),
(17, 'Abdul', 'abdul@gmail.com', '$2y$10$40fkaTJEnVr4BDmGFvEOf.oCrpMa4q7cD9HOqfCG1//9OzpKZaoiu', 'user', '2025-05-01 06:42:06'),
(24, 'Agus', 'agus@gmail.com', '$2y$10$7/7XNGLcXOVAY424iaHpkOIB0slTp7OjAJjMK5H2Cj4LkaUhH1pXq', 'admin', '2025-05-05 12:20:44'),
(26, 'Ahmad', 'ahmad@gmail.com', '$2y$10$clWepj.0We3UavZh4yQZNODeVvbq3kSvhdHjSAfYDvVA3cG1my33.', 'user', '2025-05-05 15:23:42'),
(27, 'Sri', 'sri@gmail.com', '$2y$10$zPMrW575N7J5B/SneIYliuTEdeQj3yyEtcTr8ILYyMPopk9S4hFza', 'user', '2025-05-05 15:24:44'),
(29, 'Naufal', 'naufal@gmail.com', '$2y$10$dvUf4okwr8BwsUcOudJzt.IrGHBG92qpYxD5BaoHS0TXG6JKZ9W.G', 'user', '2025-05-08 11:48:21'),
(33, 'Naul', 'naul@gmail.com', '$2y$10$czTnxIktftIKsrnHOvkykuV0tzQAtRKBJZ86esWrnJyNQmW.H8wnq', 'user', '2025-05-12 10:57:05'),
(34, 'April', 'april@gmail.com', '$2y$10$kn0pNu6Ru2J0z4ta7vSQ8eAfwDNOgjMyiiElwNrNGDdJFokX1TKP2', 'user', '2025-05-12 11:03:32'),
(35, 'Dewi', 'dewi@gmail.com', '$2y$10$Kv8Z/Am2IUcgrH.i4QGCJO5B6xeOSPgs9CymSKPHFdxepDUzWuJ9m', 'user', '2025-05-12 11:19:30'),
(38, 'Zami', 'zami@gmail.com', '$2y$10$4TLGPT7zKRwi3Wx2qiOeYufFTYPVw/b39DlLxyTA/goWrUj3eVWdS', 'user', '2025-05-12 15:00:53'),
(39, 'Nobita', 'nobita@gmail.com', '$2y$10$y9hZyej.tjFQdkyES0.1luPhyhajYVUlvJQrlKHcqmlYOMixZd/iu', 'user', '2025-05-12 15:27:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `calon_santri`
--
ALTER TABLE `calon_santri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calon_santri_id` (`calon_santri_id`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `calon_santri`
--
ALTER TABLE `calon_santri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`calon_santri_id`) REFERENCES `calon_santri` (`id`);

--
-- Constraints for table `santri`
--
ALTER TABLE `santri`
  ADD CONSTRAINT `santri_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
