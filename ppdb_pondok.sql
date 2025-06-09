-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2025 at 11:44 AM
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
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `angkatan` varchar(10) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `link_selengkapnya` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `nama`, `angkatan`, `deskripsi`, `gambar`, `link_selengkapnya`) VALUES
(1, 'Ahmad Zaky, S.Kom', 'Angkatan 1', 'Semangatttttttttt mase', 'zaky3.png', 'alumni.php'),
(2, 'hhhhhhh', '1900', 'ssssssss', 'santri6.png', 'ddd'),
(4, 'NAUFAL', 'Angkatan 2', 'Sebagai representasi dari kualitas pendidikan lembaga, alumni baru memiliki semangat, pengetahuan, serta keterampilan yang diperoleh selama masa belajar. Mereka diharapkan mampu menjadi duta lembaga dalam kehidupan sosial maupun profesional, serta berperan aktif dalam menjaga nama baik dan menjalin hubungan yang erat dengan almamater melalui berbagai kegiatan alumni.', 'logo3.png', 'alumni.php');

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
(1, 1, '2023-10-01', 'Dhani', 'Ahmad Dhani Mulyono', 'Bandung', '2005-05-15', 'Jl. Merdeka No. 123, Jakarta', '', 'Laki-laki', 'SD Negeri 1 Jakarta', 'Ya', 'Pesantren darul ulum', 'Gebang', 'Budi Santoso', 'Siti Aminah', 'Bandung', '1975-08-20', 'Surabaya', '1978-03-25', 'Wiraswasta', 'Wiraswasta', '3-5 Juta', 'Dibawah 1 Juta', 'Jl. Pendidikan No. 45, Bandung Barat', '081234567890', '2025-01-26 00:50:42', 'Tidak Diketahui', 'Ditolak', 'Tidak Lulus', NULL, 0),
(2, 2, '2025-12-12', 'Sri', 'Sri Rahayu', 'Bandung', '2006-08-20', 'Jl. Pendidikan No. 45, Bandung', '', 'Perempuan', 'SMP Bumiayu', 'Ya', 'Pesantren Al Azhar', 'sigambir', 'Supri', 'Kita Kartini', 'Bandung', '1988-01-01', 'Jakarta', '1988-02-02', 'Wiraswasta', 'Wiraswasta', 'Dibawah 1 Juta', 'Dibawah 1 Juta', 'Babakan', '088200601669', '2025-01-26 01:43:25', 'SMP Negeri 2 Bandung', 'Diterima', 'Lulus', NULL, 0),
(3, 3, '2025-02-02', 'Ahmad', 'Ahmad Zaky', 'Brebes', '2003-02-01', 'Dukuhsalam Kec. Losari Kab. Brebes', '', 'Laki-laki', 'STM Sukabumi', 'Tidak', '-', '-', 'Saya satpol', 'Kita Kartini', 'Brebes', '1899-12-21', 'Brebes', '1999-02-12', 'Wiraswasta', 'Wiraswasta', 'Dibawah 1 Juta', 'Dibawah 1 Juta', 'Losarang', '0898988989888', '2025-01-26 02:43:28', NULL, 'Diterima', 'Lulus', NULL, 0),
(4, 4, '2025-02-01', 'Abdul', 'Abdul Hasan Abdullah', 'Jakarta', '2003-02-01', 'Jln. Raya Jakarta Baru Es Teh', '', 'Laki-laki', 'MA Jakarta', 'Ya', 'Darutaqwa Jakarta Selatan', 'Jln. Sigambir Selatan', 'Supri', 'Darmi', 'Bandung', '1889-12-12', 'Jakarta', '1888-02-13', 'Guru', 'Wiraswasta', '1-3 Juta', 'Dibawah 1 Juta', 'Jakarta Selatan, Jl. JalanSendiriAja', '084567826473', '2025-02-01 02:31:06', NULL, 'Diterima', 'Lulus', NULL, 0),
(13, 0, '2025-04-26', 'Denis', 'Denis Adit', 'Solo', '2025-04-26', 'Solo, Jalan raya banget', '', 'Laki-laki', 'SMP Solo', 'Ya', 'Pondok Yalalwathon', 'Desa sukasaya, kec. bener kab. solo', 'Jajang Mul', 'Dini', 'Sulawesi', '1886-02-02', 'Adoh', '1887-01-01', 'Guru', 'Guru', '1-3 Juta', 'Dibawah 1 Juta', 'Jl. Sukasaya no. 123', '008388383838', '2025-04-26 16:02:41', NULL, 'Ditolak', 'Lulus', NULL, 0),
(14, 0, '2025-05-08', 'Naufal', 'Naufal', 'Tangerang', '2025-05-08', 'Kota Tangerang', 'Orang Tua', 'Laki-laki', 'SMK Tadika Mesra', 'Ya', 'Pesantren Rock n Roll', 'Jl. Yang lurus banget', 'Abi', 'Umi', 'Subang', '1888-02-02', 'Subang juga', '1899-03-03', 'TNI/POLRI', 'Guru', 'Di atas 5 Juta', '1-3 Juta', 'Jl. Jalan-jalan ke kota', '089098767677', '2025-05-08 11:47:43', NULL, 'Ditolak', 'Tidak Lulus', NULL, 0),
(25, 0, '2025-05-12', 'Zami', 'Zami', 'Songgom', '2003-03-03', 'Songgom Brebes', 'Orang Tua', 'Laki-laki', 'SMA Maarif Brebes', 'Ya', 'Pondok Pesantren Buntet', 'Songgom Brebes', 'Ayah zami', 'Ibu zami', 'Jalawatu', '1899-03-03', 'Jakarta', '1899-03-04', 'Wiraswasta', 'Wiraswasta', 'Dibawah 1 Juta', 'Dibawah 1 Juta', 'Songgom Brebes', '088888777777', '2025-05-12 14:59:57', NULL, 'Diterima', 'Lulus', NULL, 0),
(27, 0, '2025-05-07', 'Noah', 'Noah', 'Jakarta', '2025-05-08', 'Jakarta barat', 'Orang Tua', 'Laki-laki', 'SMK Otomotif', 'Ya', '-', '-', 'Peterpen', 'Dmasiv', 'Jakarta', '2024-09-11', 'Bogor', '2024-09-18', 'Wiraswasta', 'Wiraswasta', 'Dibawah 1 Juta', 'Dibawah 1 Juta', 'Jakarta barat', '0756555555', '2025-05-13 16:42:05', NULL, 'Diterima', 'Lulus', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `falsafah`
--

CREATE TABLE `falsafah` (
  `id` int(11) NOT NULL,
  `judul_section` varchar(255) DEFAULT NULL,
  `deskripsi_section` text DEFAULT NULL,
  `judul1` varchar(255) DEFAULT NULL,
  `isi1` text DEFAULT NULL,
  `link1` varchar(255) DEFAULT NULL,
  `judul2` varchar(255) DEFAULT NULL,
  `isi2` text DEFAULT NULL,
  `link2` varchar(255) DEFAULT NULL,
  `judul3` varchar(255) DEFAULT NULL,
  `isi3` text DEFAULT NULL,
  `link3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `falsafah`
--

INSERT INTO `falsafah` (`id`, `judul_section`, `deskripsi_section`, `judul1`, `isi1`, `link1`, `judul2`, `isi2`, `link2`, `judul3`, `isi3`, `link3`) VALUES
(1, 'Falsafah Pondok Pesantren Al-Muflihin', 'Al Muflihin adalah Pondok Pesantren Modern dengan manhaj Darunnajah dan Gontor yang menyelenggarakan pendidikan untuk mengembangkan seluruh potensi para santri secara menyeluruh.', 'Panca Jiwa Sejati', 'Seluruh kehidupan di Pondok Modern Al Muflihin didasarkan pada nilai-nilai kehidupan dalam Panca Jiwa.', 'pancajiwa.php', 'Motto Pondok Kita Semuanya', 'Pendidikan Pondok Modern Al Muflihin menekankan pada pembentukan pribadi mukmin muslim.', 'mottopondok.php', 'Visi & Misi', 'Panca Jangka merupakan program kerja Pondok untuk mewujudkan upaya pengembangan dan pemajuan.', 'visimisi.php'),
(3, 'Falsafah Kami', 'Kami berkomitmen menanamkan nilai agama, etika, dan disiplin.', 'Pendidikan Islam', 'Menyediakan pendidikan berbasis Al-Quran dan Hadis.', '#', 'Etika dan Moral', 'Menanamkan karakter mulia kepada seluruh santri.', '#', 'Kedisiplinan', 'Membangun mental dan kedisiplinan dalam kehidupan sehari-hari.', '#');

-- --------------------------------------------------------

--
-- Table structure for table `hero_section`
--

CREATE TABLE `hero_section` (
  `id` int(11) NOT NULL,
  `judul_kecil` varchar(255) NOT NULL,
  `judul_besar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `link_pendaftaran` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hero_section`
--

INSERT INTO `hero_section` (`id`, `judul_kecil`, `judul_besar`, `deskripsi`, `gambar`, `link_pendaftaran`, `created_at`, `updated_at`) VALUES
(1, 'Pendaftaran Santri Baru banget', 'Pondok Pesantren Al-Muflihin Cirebon', 'Tahun Ajaran 2025/2026 membuka pendaftaran santri baru. Daftar Sekarang Saja!', '1747522528_santri6.png', 'http://localhost/pendaftaran-santri/form_pendaftaran.php', '2025-05-17 16:21:38', '2025-05-17 22:55:28');

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
(13, 'Haul Almagfurllah', 'Haul Almagfurllah adalah acara peringatan tahunan untuk mengenang wafatnya seorang tokoh atau ulama yang dihormati, sebagai bentuk doa dan penghormatan kepada beliau. Dalam konteks Pondok Pesantren Al-Muflihin, haul Almagfurllah biasanya diisi dengan pembacaan tahlil, doa bersama, tausiyah, dan pengajian umum yang dihadiri oleh santri, alumni, keluarga besar pesantren, serta masyarakat sekitar. Acara ini bukan hanya sebagai wujud cinta kepada almarhum, tetapi juga menjadi momen mempererat silaturahmi dan memperkuat nilai-nilai keislaman di tengah masyarakat.', 'informasi2.JPG', '', '2025-02-06 01:50:26'),
(14, 'Santri pondok pesantren Al-Muflihin', 'Santri Pondok Pesantren Al-Muflihin adalah generasi muda yang dibina dalam lingkungan islami untuk memperdalam ilmu agama, membentuk akhlak mulia, serta mengembangkan potensi diri melalui pendidikan terpadu yang menggabungkan nilai-nilai keislaman dan keterampilan hidup. Mereka dibimbing untuk menjadi pribadi yang beriman, bertaqwa, dan siap berkontribusi positif bagi masyarakat.', 'informasi1.jpg', '', '2025-02-06 01:51:36'),
(15, 'Khitobah Kelas Akhir TMI', 'Khitobah Kelas Akhir TMI (Tarbiyatul Mu’allimin Al-Islamiyah) merupakan kegiatan rutin yang diselenggarakan bagi santri tingkat akhir sebagai bentuk evaluasi dan pembekalan sebelum mereka menyelesaikan pendidikan di Pondok Pesantren. Dalam kegiatan ini, para santri diberikan kesempatan untuk menyampaikan pidato atau ceramah di hadapan para pengurus, guru, dan santri lainnya, baik dalam bahasa Arab maupun Indonesia. Tujuannya adalah untuk melatih kemampuan public speaking, penguasaan materi keislaman, serta menumbuhkan rasa percaya diri sebagai calon dai dan pendidik di tengah masyarakat. Khitobah ini juga menjadi momen untuk mengukur sejauh mana santri mampu mengimplementasikan ilmu yang telah dipelajari selama menempuh pendidikan di pesantren, sekaligus menjadi ajang pembuktian kesiapan mereka dalam menghadapi dunia luar setelah lulus nanti.', 'informasi3.jpg', 'pendaftaran.php', '2025-02-06 01:57:03'),
(16, 'Ujian Santri', 'Ujian Santri adalah sebuah kegiatan evaluasi yang diselenggarakan di lingkungan pondok pesantren untuk mengukur pemahaman dan kemampuan para santri dalam berbagai mata pelajaran agama maupun umum yang telah dipelajari selama masa pembelajaran. Ujian ini bertujuan untuk menilai sejauh mana santri menguasai materi serta menguji kedisiplinan, ketekunan, dan kesiapan mereka dalam menghadapi tantangan akademik maupun spiritual. Melalui ujian santri, pengelola pesantren dapat mengevaluasi efektivitas proses pembelajaran sekaligus memberikan motivasi bagi santri untuk terus meningkatkan kualitas diri secara menyeluruh.', 'informasi4.jpg', '', '2025-02-06 02:02:16'),
(17, 'Penerimaan santri baru', 'Penerimaan santri baru di Pondok Pesantren Al Muflihin merupakan momen penting yang selalu dinantikan oleh calon santri dan orang tua sebagai langkah awal menempuh pendidikan berbasis agama dan karakter. Setiap tahunnya, pesantren membuka pendaftaran dengan tujuan memberikan kesempatan luas bagi masyarakat yang ingin mendapatkan pendidikan agama yang komprehensif, terpadu dengan ilmu umum serta pembentukan akhlak mulia. Proses pendaftaran dilakukan secara mudah dan transparan, dengan berbagai persyaratan yang jelas untuk memastikan calon santri siap mengikuti kehidupan pesantren. Melalui penerimaan ini, Pondok Pesantren Al Muflihin berkomitmen untuk mendidik generasi muda yang cerdas, beriman, dan berakhlak, serta siap menghadapi tantangan zaman dengan bekal ilmu dan bimbingan yang kuat.', 'brosur1.jpg', 'form_pendaftaran.php', '2025-02-06 02:03:05'),
(18, 'Penerimaan santri baru', 'Penerimaan santri baru di Pondok Pesantren Al Muflihin merupakan momen penting yang selalu dinantikan oleh calon santri dan orang tua sebagai langkah awal menempuh pendidikan berbasis agama dan karakter. Setiap tahunnya, pesantren membuka pendaftaran dengan tujuan memberikan kesempatan luas bagi masyarakat yang ingin mendapatkan pendidikan agama yang komprehensif, terpadu dengan ilmu umum serta pembentukan akhlak mulia. Proses pendaftaran dilakukan secara mudah dan transparan, dengan berbagai persyaratan yang jelas untuk memastikan calon santri siap mengikuti kehidupan pesantren. Melalui penerimaan ini, Pondok Pesantren Al Muflihin berkomitmen untuk mendidik generasi muda yang cerdas, beriman, dan berakhlak, serta siap menghadapi tantangan zaman dengan bekal ilmu dan bimbingan yang kuat.', 'brosur2.jpg', 'form_pendaftaran.php', '2025-02-06 02:03:46'),
(19, 'Penerimaan santriwati baru', 'Penerimaan santri baru tahun ajaran 2025/2026 telah dibuka, ayo daftar sekarang!!!', 'psb1.jpg', '', '2025-02-10 11:52:33'),
(20, 'Penerimaan santriwan', 'Penerimaan santri baru untuk tahun ajaran 2025/2026 di Pondok Pesantren Al Muflihin telah resmi dibuka! Kesempatan emas ini terbuka bagi putra-putri terbaik bangsa yang ingin menimba ilmu agama dan umum dalam lingkungan pesantren yang kondusif, disiplin, dan berlandaskan nilai-nilai keislaman. Dengan sistem pendidikan terpadu serta pembinaan akhlak yang intensif, Pondok Pesantren Al Muflihin siap mencetak generasi yang berilmu, berakhlak mulia, dan siap berkontribusi bagi masyarakat. Jangan lewatkan kesempatan ini, segera daftarkan diri Anda dan jadilah bagian dari keluarga besar Al Muflihin!', 'psb2.jpg', '', '2025-02-10 11:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `judul_alumni`
--

CREATE TABLE `judul_alumni` (
  `id` int(11) NOT NULL,
  `judul_tebal` varchar(255) DEFAULT NULL,
  `judul_biasa` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `judul_alumni`
--

INSERT INTO `judul_alumni` (`id`, `judul_tebal`, `judul_biasa`, `deskripsi`) VALUES
(1, 'Alumni Baru', 'Pondok Pesantren Al-Muflihin Cirebon', 'Pusat Informasi Pondok Pesantren Al-Muflihin hadir untuk memberikan kemudahan akses informasi terkait pendaftaran santri baru, program pendidikan, jadwal kegiatan, dan fasilitas pondok.');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `nomor_hp` varchar(30) DEFAULT NULL,
  `icon` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `jabatan`, `nomor_hp`, `icon`) VALUES
(1, 'Ustadz Ahmad Syafiq', 'Kepala Pengasuhan', '081234567890', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"64\" height=\"64\" class=\"mx-auto text-slate-500 dark:text-slate-300\" fill=\"currentColor\" viewBox=\"0 0 16 16\">\r\n     <path d=\"M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0\" />\r\n     <path fill-rule=\"evenodd\" d=\"M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1\" />\r\n   </svg>'),
(2, 'Ustadzah Nur Aini', 'Bagian Pendaftaran Santri', '089876543210', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"64\" height=\"64\" class=\"mx-auto text-slate-500 dark:text-slate-300\" fill=\"currentColor\" viewBox=\"0 0 16 16\">\r\n     <path d=\"M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z\"/>\r\n   </svg>'),
(3, 'Admin Al Muflihin', 'Layanan Informasi', '085678123456', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"64\" height=\"64\" class=\"mx-auto text-slate-500 dark:text-slate-300\" fill=\"currentColor\" viewBox=\"0 0 16 16\">\r\n     <path d=\"M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v2H7zm0 4h2v4H7z\"/>\r\n   </svg>');

-- --------------------------------------------------------

--
-- Table structure for table `kontak_deskripsi`
--

CREATE TABLE `kontak_deskripsi` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak_deskripsi`
--

INSERT INTO `kontak_deskripsi` (`id`, `judul`, `deskripsi`) VALUES
(1, 'Hubungi Kami Saja', 'Al Muflihin yaitu Pondok Pesantren Modern dengan manhaj Darunnajah dan Gontor yang menyelenggarakan pendidikan untuk mengembangkan seluruh potensi para santri secara menyeluruh.');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_section`
--

CREATE TABLE `lokasi_section` (
  `id` int(11) NOT NULL,
  `judul_awal` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `link_maps` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi_section`
--

INSERT INTO `lokasi_section` (`id`, `judul_awal`, `judul`, `deskripsi`, `link_maps`) VALUES
(1, 'Lokasi Saya', 'Kami', 'Al Muflihin yaitu Pondok Pesantren Modern dengan manhaj Darunnajah dan Gontor yang menyelenggarakan pendidikan untuk mengembangkan seluruh potensi para santri secara menyeluruh.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.5498457306826!2d108.74044787367052!3d-6.8244712931733265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f0751d17aefcd%3A0x1c32cd5446d53dd9!2sPondok%20Pesantren%20Al%20Muflihin!5e0!3m2!1sid!2sid!4v1733900401006!5m2!1sid!2sid');

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
-- Table structure for table `pendaftaran_section`
--

CREATE TABLE `pendaftaran_section` (
  `id` int(11) NOT NULL,
  `sub_judul` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran_section`
--

INSERT INTO `pendaftaran_section` (`id`, `sub_judul`, `judul`, `deskripsi`) VALUES
(1, 'Pendaftaran Santri Baru 2025', 'Pondok Pesantren Al-Muflihin Cirebon', '\"Bergabunglah bersama keluarga besar Pondok Pesantren Al-Muflihin dan jadilah bagian dari generasi islami yang berprestasi dan berakhlakul karimah.\"');

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
-- Table structure for table `tb_tentang_kami`
--

CREATE TABLE `tb_tentang_kami` (
  `id` int(11) NOT NULL,
  `jenis` enum('sejarah','visi_misi','fasilitas') NOT NULL,
  `sub_judul` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `link_selengkapnya` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tentang_kami`
--

INSERT INTO `tb_tentang_kami` (`id`, `jenis`, `sub_judul`, `judul`, `deskripsi`, `gambar`, `link_selengkapnya`) VALUES
(1, 'sejarah', 'Sejarah Tentang', 'Pondok Pesantren  Al-Muflihin Cirebon', 'Pondok pesantren Al Muflihin didirikan oleh salah satu ulama lulusan Pondok Pesantren Darunnajah Jakarta yaitu Alm. Kyai M Rohmat Romdlon dengan dibantu istrinya Hj.Aisyah dan juga mertuanya H.Syamsuri dan Hj.Suhanah, berdiri pada tahun 2003 dengan luas tanah Wakaf ±3 Hektar. Pada saat ini Pondok Pesantren Al Muflihin dipimpin oleh Nyai Aisyah, S. Ag Yang memiliki 100 santri dari berbagai daerah.', 'informasi2.JPG', 'tentang.php?jenis=sejarah'),
(2, 'visi_misi', 'Visi & Misi', 'Pondok Pesantren \n Al-Muflihin', 'Visi Pondok Pesantren Al Muflihin adalah menjadi lembaga pendidikan yang unggul dalam pembentukan kepribadian santri yang berakhlak mulia, berilmu, dan berwawasan global. Misi Pondok Pesantren Al Muflihin adalah menjadi lembaga pendidikan yang unggul dalam pembentukan kepribadian santri yang berakhlak mulia, berilmu, dan berwawasan global.', 'informasi1.JPG', 'sejarah.html'),
(3, 'fasilitas', 'Fasilitas', 'Pondok Pesantren  Al-Muflihin', 'Pondok Pesantren Al-Muflihin menyediakan berbagai fasilitas yang dirancang untuk menunjang kenyamanan dan kelancaran proses pendidikan serta pembinaan karakter para santri. Di lingkungan pesantren ini, tersedia asrama santri yang bersih, aman, dan tertib, masjid utama yang representatif sebagai pusat kegiatan ibadah harian, serta ruang kelas yang nyaman dan kondusif untuk kegiatan belajar mengajar. Selain itu, terdapat perpustakaan dengan koleksi buku keislaman dan umum, laboratorium komputer untuk pengembangan keterampilan digital, serta aula serbaguna untuk berbagai kegiatan seperti seminar, pelatihan, dan acara kepondokan. Pondok ini juga memiliki dapur dan ruang makan yang higienis, fasilitas olahraga seperti lapangan futsal dan voli untuk menunjang kesehatan jasmani santri, serta koperasi santri yang menyediakan kebutuhan harian dengan harga terjangkau. Tidak ketinggalan, tersedia pula klinik kesehatan sebagai tempat pemeriksaan kesehatan dan pertolongan pertama. Seluruh fasilitas ini merupakan bagian dari komitmen Pondok Pesantren Al-Muflihin dalam menciptakan lingkungan belajar yang islami, nyaman, dan mendukung tumbuh kembang santri secara optimal.', 'informasi3.JPG', 'tentang.php?jenis=fasilitas');

-- --------------------------------------------------------

--
-- Table structure for table `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `id` int(11) NOT NULL,
  `sub_judul` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `judul2` varchar(255) DEFAULT NULL,
  `deskripsi2` varchar(255) DEFAULT NULL,
  `kontak_youtube` varchar(255) DEFAULT NULL,
  `kontak_instagram` varchar(255) DEFAULT NULL,
  `kontak_twitter` varchar(255) DEFAULT NULL,
  `kontak_tiktok` varchar(255) DEFAULT NULL,
  `kontak_facebook` varchar(255) DEFAULT NULL,
  `kontak_wa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tentang_kami`
--

INSERT INTO `tentang_kami` (`id`, `sub_judul`, `judul`, `deskripsi`, `judul2`, `deskripsi2`, `kontak_youtube`, `kontak_instagram`, `kontak_twitter`, `kontak_tiktok`, `kontak_facebook`, `kontak_wa`) VALUES
(1, 'Tentang Kami Semua', 'Pendaftaran Santri Baru', 'Pondok Pesantren Al-Muflihin membuka kesempatan bagi generasi muda untuk belajar ilmu agama dan umum. Segera daftarkan diri Anda dan jadilah bagian dari keluarga besar kami!', 'Hubungi Kami', 'Untuk informasi lebih lanjut mengenai pendaftaran atau informasi terkait Pondok Pesantren Al-Muflihin, silakan hubungi kami melalui media sosial atau datang langsung ke pondok pesantren.', 'https://www.youtube.com/@almuflihincirebon7929', 'https://www.instagram.com/almuflihin_cirebon', 'https://twitter.com/almuflihin_crb', 'https://www.tiktok.com/@almuflihin_cirebon', 'https://web.facebook.com/Pesantrenalmuflihin?locale=id_ID', '');

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
(17, 'Abdul', 'abdul@gmail.com', '$2y$10$40fkaTJEnVr4BDmGFvEOf.oCrpMa4q7cD9HOqfCG1//9OzpKZaoiu', 'user', '2025-05-01 06:42:06'),
(24, 'Agus', 'agus@gmail.com', '$2y$10$7/7XNGLcXOVAY424iaHpkOIB0slTp7OjAJjMK5H2Cj4LkaUhH1pXq', 'admin', '2025-05-05 12:20:44'),
(26, 'Ahmad', 'ahmad@gmail.com', '$2y$10$clWepj.0We3UavZh4yQZNODeVvbq3kSvhdHjSAfYDvVA3cG1my33.', 'user', '2025-05-05 15:23:42'),
(27, 'Sri', 'sri@gmail.com', '$2y$10$zPMrW575N7J5B/SneIYliuTEdeQj3yyEtcTr8ILYyMPopk9S4hFza', 'user', '2025-05-05 15:24:44'),
(29, 'Naufal', 'naufal@gmail.com', '$2y$10$dvUf4okwr8BwsUcOudJzt.IrGHBG92qpYxD5BaoHS0TXG6JKZ9W.G', 'user', '2025-05-08 11:48:21'),
(34, 'April', 'april@gmail.com', '$2y$10$kn0pNu6Ru2J0z4ta7vSQ8eAfwDNOgjMyiiElwNrNGDdJFokX1TKP2', 'user', '2025-05-12 11:03:32'),
(35, 'Dewi', 'dewi@gmail.com', '$2y$10$Kv8Z/Am2IUcgrH.i4QGCJO5B6xeOSPgs9CymSKPHFdxepDUzWuJ9m', 'user', '2025-05-12 11:19:30'),
(38, 'Zami', 'zami@gmail.com', '$2y$10$4TLGPT7zKRwi3Wx2qiOeYufFTYPVw/b39DlLxyTA/goWrUj3eVWdS', 'user', '2025-05-12 15:00:53'),
(40, 'Noah', 'noah@gmail.com', '$2y$10$3DUE8WNAruBgFUDgeYEADeI0cmibJeAST6qeySdnGoxsketM66qvq', 'user', '2025-05-13 16:42:17');

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
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calon_santri`
--
ALTER TABLE `calon_santri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `falsafah`
--
ALTER TABLE `falsafah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_section`
--
ALTER TABLE `hero_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `judul_alumni`
--
ALTER TABLE `judul_alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak_deskripsi`
--
ALTER TABLE `kontak_deskripsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_section`
--
ALTER TABLE `lokasi_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calon_santri_id` (`calon_santri_id`);

--
-- Indexes for table `pendaftaran_section`
--
ALTER TABLE `pendaftaran_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_tentang_kami`
--
ALTER TABLE `tb_tentang_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `calon_santri`
--
ALTER TABLE `calon_santri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `falsafah`
--
ALTER TABLE `falsafah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hero_section`
--
ALTER TABLE `hero_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `judul_alumni`
--
ALTER TABLE `judul_alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kontak_deskripsi`
--
ALTER TABLE `kontak_deskripsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lokasi_section`
--
ALTER TABLE `lokasi_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendaftaran_section`
--
ALTER TABLE `pendaftaran_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tentang_kami`
--
ALTER TABLE `tb_tentang_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
