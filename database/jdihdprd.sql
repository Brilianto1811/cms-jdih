-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2025 at 12:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jdihdprd`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_agenda` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `tgl_agenda`, `created_at`, `updated_at`) VALUES
(2, '2025-02-05', '2025-02-12 20:31:54', '2025-02-12 20:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `agenda_kegiatan`
--

CREATE TABLE `agenda_kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agenda_id` bigint(20) UNSIGNED NOT NULL,
  `waktu_kegiatan` time NOT NULL,
  `judul_kegiatan` varchar(255) NOT NULL,
  `deskripsi_kegiatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agenda_kegiatan`
--

INSERT INTO `agenda_kegiatan` (`id`, `agenda_id`, `waktu_kegiatan`, `judul_kegiatan`, `deskripsi_kegiatan`, `created_at`, `updated_at`) VALUES
(2, 2, '12:31:00', 'tttt', 'ttttt', '2025-02-12 20:31:54', '2025-02-12 20:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `kategori_konten` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `status_konten` varchar(255) DEFAULT NULL,
  `status_publish` varchar(255) DEFAULT NULL,
  `caption_image` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `spesial_kategori` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `super_artikel` longtext DEFAULT NULL,
  `tgl_publish` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `text`, `author`, `tags`, `kategori_konten`, `caption`, `status_konten`, `status_publish`, `caption_image`, `summary`, `spesial_kategori`, `file`, `super_artikel`, `tgl_publish`, `created_at`, `updated_at`) VALUES
(51, 'Sambutan', 'sambutan', '<p style=\"margin-left:0px;text-align:justify;\"><i><strong>Assalamu\'alaikum Warahmatullaahi Wabarakaatuh</strong></i></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:rgb(32,33,36);\">﻿</span><span style=\"color:rgb(51,51,51);\">Jaringan Dokumentasi dan Informasi Hukum atau JDIH adalah suatu sistem informasi peraturan perundang-undangan dan dokumen hukum berbasis </span><i>web</i><span style=\"color:rgb(51,51,51);\"> yang disusun secara tertib, terpadu dan berkelanjutan serta merupakan sarana pemberian pelayanan informasi hukum secara mudah, cepat dan akurat.</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:rgb(51,51,51);\">Jaringan Dokumentasi dan Informasi Hukum merupakan salah satu sarana pemberian informasi di bidang hukum kepada pemangku kepentingan, untuk dapat meningkatkan pengetahuan hukum, peraturan perundang-undangan dan bahan dokumen hukum lainnya.</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:rgb(51,51,51);\">Dalam rangka meningkatkan pelayanan informasi peraturan perundang-undangan dan dokumen hukum lainnya, Pemerintah Kabupaten Bogor mengembangkan suatu sistem aplikasi yang telah terintegrasi dengan portal resmi Pemerintah Kabupaten Bogor dan Jaringan Dokumentasi dan Informasi Hukum Nasional (JDIHN).</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:rgb(51,51,51);\">Semoga pemanfaatan teknologi informasi mampu memberikan pelayanan yang berkualitas kepada pemangku kepentingan, tidak hanya terbatas pada </span><i>website</i><span style=\"color:rgb(51,51,51);\">, produk hukum dan dokumen hukum lainnya juga dapat diperoleh dengan mengunjugi perpustakaan JDIH yang berada di Bagian Perundang-Undangan Setda Kabupaten Bogor. Demikian semoga pengelolaan JDIH Kabupaten Bogor dapat berkembang kearah yang lebih baik lagi.</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:rgb(51,51,51);\">Hatur Nuhun</span></p><p style=\"margin-left:0px;text-align:justify;\"><i><strong>Wabillahi Taufik wal Hidayah</strong></i></p><p style=\"margin-left:0px;text-align:justify;\"><i><strong>Wassalamualaikum Warahmatullahi Wabarakatuh</strong></i></p>', 'Brilianto Azhari Suprapto', '[\"sambutan\",\"sekapur\",\"sirih\"]', 'khusus', 'Konten ini termasuk kategori khusus.', NULL, 'spesial', 'tes', NULL, 'spesial', NULL, '<p style=\"margin-left:0px;text-align:justify;\"><i><strong>Assalamu\'alaikum Warahmatullaahi Wabarakaatuh</strong></i></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:rgb(32,33,36);\">﻿</span><span style=\"color:rgb(51,51,51);\">Jaringan Dokumentasi dan Informasi Hukum atau JDIH adalah suatu sistem informasi peraturan perundang-undangan dan dokumen hukum berbasis </span><i>web</i><span style=\"color:rgb(51,51,51);\"> yang disusun secara tertib, terpadu dan berkelanjutan serta merupakan sarana pemberian pelayanan informasi hukum secara mudah, cepat dan akurat.</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:rgb(51,51,51);\">Jaringan Dokumentasi dan Informasi Hukum merupakan salah satu sarana pemberian informasi di bidang hukum kepada pemangku kepentingan, untuk dapat meningkatkan pengetahuan hukum, peraturan perundang-undangan dan bahan dokumen hukum lainnya.</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:rgb(51,51,51);\">Dalam rangka meningkatkan pelayanan informasi peraturan perundang-undangan dan dokumen hukum lainnya, Pemerintah Kabupaten Bogor mengembangkan suatu sistem aplikasi yang telah terintegrasi dengan portal resmi Pemerintah Kabupaten Bogor dan Jaringan Dokumentasi dan Informasi Hukum Nasional (JDIHN).</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:rgb(51,51,51);\">Semoga pemanfaatan teknologi informasi mampu memberikan pelayanan yang berkualitas kepada pemangku kepentingan, tidak hanya terbatas pada </span><i>website</i><span style=\"color:rgb(51,51,51);\">, produk hukum dan dokumen hukum lainnya juga dapat diperoleh dengan mengunjugi perpustakaan JDIH yang berada di Bagian Perundang-Undangan Setda Kabupaten Bogor. Demikian semoga pengelolaan JDIH Kabupaten Bogor dapat berkembang kearah yang lebih baik lagi.</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:rgb(51,51,51);\">Hatur Nuhun</span></p><p style=\"margin-left:0px;text-align:justify;\"><i><strong>Wabillahi Taufik wal Hidayah</strong></i></p><p style=\"margin-left:0px;text-align:justify;\"><i><strong>Wassalamualaikum Warahmatullahi Wabarakatuh</strong></i></p>', '2025-02-24', '2025-02-24 03:23:34', '2025-02-24 03:30:20'),
(52, 'Visi dan Misi', 'visi-dan-misi', '<p style=\"margin-left:0px;text-align:justify;\"><strong>\"Terwujudnya Kabupaten Bogor Termaju, Nyaman dan Berkeadaban\"</strong></p><p><br>&nbsp;</p>', 'Brilianto Azhari Suprapto', '[\"visi\",\"dan\",\"misi\"]', 'khusus', 'Konten ini termasuk kategori khusus.', NULL, 'spesial', 'tes', NULL, 'spesial', NULL, '<p style=\"margin-left:0px;text-align:justify;\"><strong>\"Terwujudnya Kabupaten Bogor Termaju, Nyaman dan Berkeadaban\"</strong></p><p><br>&nbsp;</p>', '2025-02-24', '2025-02-24 03:24:18', '2025-02-24 03:24:18'),
(53, 'Sejarah', 'sejarah', '<p style=\"margin-left:0px;text-align:justify;\"><strong>Pengertian JDIHN</strong></p><p style=\"margin-left:0px;text-align:justify;\">Berdasarkan Peraturan Presiden Nomor 33 Tahun 2012 tentang Jaringan Dokumentasi Dan Informasi Hukum Nasional, Jaringan Dokumentasi dan Informasi Hukum Nasional yang selanjutnya disingkat&nbsp;JDIHN adalah wadah pendayagunaan bersama atas dokumen hukum secara tertib, terpadu, dan berkesinambungan, serta merupakan sarana pemberian pelayanan informasi hukum secara lengkap, akurat, mudah, dan cepat.</p><p style=\"margin-left:0px;text-align:justify;\"><strong>&nbsp;</strong></p><p style=\"margin-left:0px;text-align:justify;\"><strong>Dasar Hukum JDIH</strong></p><ol><li style=\"text-align:justify;\"><span style=\"color:black;\">Peraturan Presiden Nomor 33 Tahun 2012 tentang Jaringan Dokumentasi dan Informasi Hukum Nasional (Lembaran Negara Republik Indonesia Tahun 2012 Nomor 82);&nbsp;</span></li><li style=\"text-align:justify;\"><span style=\"color:black;\">Peraturan Menteri Dalam Negeri Nomor 2 Tahun 2014 tentang Pengelolaan Jaringan Dokumentasi dan Informasi Hukum Kementerian Dalam Negeri dan Pemerintah Daerah (Berita Negara Republik Indonesia Tahun 2014 Nomor 33);</span></li><li style=\"text-align:justify;\"><span style=\"color:black;\">Peraturan Menteri Hukum dan Hak Asasi Manusia Nomor 8 Tahun 2019 tentang </span>Standar Pengelolaan Dokumen Dan Informasi Hukum;</li><li style=\"text-align:justify;\">Peraturan Bupati Bogor Nomor 46 Tahun 2020 tentang Pengelolaan Jaringan Dokumentasi Dan Informasi Hukum Kabupaten Bogor (Berita Daerah Kabupaten Bogor Tahun 2020 Nomor 47); dan</li><li style=\"text-align:justify;\">Keputusan Bupati Bogor Nomor 100.3.8/383/Kpts/Per-UU/2022 tentang Pembentukan Tim Pengelola Jaringan Dokumentasi dan Informasi Hukum Kabupaten Bogor.</li></ol><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\"><strong>Sekilas tentang&nbsp;JDIH Kabupaten Bogor</strong></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">JDIH Kabupaten Bogor dibentuk berdasarkan</span><strong> </strong>Peraturan Bupati Bogor Nomor 46 Tahun 2020 tentang Pengelolaan Jaringan Dokumentasi Dan Informasi Hukum Kabupaten Bogor, pada 20 Juli 2020. JDIH Kabupaten Bogor berkedudukan di Bagian Perundang-undangan pada Sekretariat Daerah Kabupaten Bogor, Bagian Perundang-undangaan melakukan pengelolaan JDIH, yang meliputi :</p><ol><li style=\"text-align:justify;\">pengumpulan, pengolahan, penyimpanan, dan penyebarluasan dokumen hukum;</li><li style=\"text-align:justify;\">penataan sistem informasi hukum melalui pemanfaatan teknologi informasi dan komunikasi; dan</li><li style=\"text-align:justify;\">pelayanan informasi hukum.</li></ol><p style=\"margin-left:0px;text-align:justify;\">Pusat JDIH adalah Bagian Perundang-undangan pada Sekretariat Daerah, dan Anggota JDIH terdiri atas Perangkat Daerah dan Desa.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\"><strong>Tujuan JDIH</strong></p><ol><li style=\"text-align:justify;\">menjamin terciptanya pengelolaan dokumentasi dan informasi hukum yang terpadu, berbasis teknologi informasi dan komunikasi yang terintegrasi dengan Instansi Pemerintah, PD dan Desa; dan</li><li style=\"text-align:justify;\">menjamin ketersediaan dokumentasi dan informasi hukum yang lengkap dan akurat, serta dapat diakses secara cepat dan mudah.</li></ol><p><br>&nbsp;</p>', 'Brilianto Azhari Suprapto', '[\"sejarah\",\"jdih\",\"kab\",\"bogor\"]', 'khusus', 'Konten ini termasuk kategori khusus.', NULL, 'spesial', 'tes', NULL, 'spesial', NULL, '<p style=\"margin-left:0px;text-align:justify;\"><strong>Pengertian JDIHN</strong></p><p style=\"margin-left:0px;text-align:justify;\">Berdasarkan Peraturan Presiden Nomor 33 Tahun 2012 tentang Jaringan Dokumentasi Dan Informasi Hukum Nasional, Jaringan Dokumentasi dan Informasi Hukum Nasional yang selanjutnya disingkat&nbsp;JDIHN adalah wadah pendayagunaan bersama atas dokumen hukum secara tertib, terpadu, dan berkesinambungan, serta merupakan sarana pemberian pelayanan informasi hukum secara lengkap, akurat, mudah, dan cepat.</p><p style=\"margin-left:0px;text-align:justify;\"><strong>&nbsp;</strong></p><p style=\"margin-left:0px;text-align:justify;\"><strong>Dasar Hukum JDIH</strong></p><ol><li style=\"text-align:justify;\"><span style=\"color:black;\">Peraturan Presiden Nomor 33 Tahun 2012 tentang Jaringan Dokumentasi dan Informasi Hukum Nasional (Lembaran Negara Republik Indonesia Tahun 2012 Nomor 82);&nbsp;</span></li><li style=\"text-align:justify;\"><span style=\"color:black;\">Peraturan Menteri Dalam Negeri Nomor 2 Tahun 2014 tentang Pengelolaan Jaringan Dokumentasi dan Informasi Hukum Kementerian Dalam Negeri dan Pemerintah Daerah (Berita Negara Republik Indonesia Tahun 2014 Nomor 33);</span></li><li style=\"text-align:justify;\"><span style=\"color:black;\">Peraturan Menteri Hukum dan Hak Asasi Manusia Nomor 8 Tahun 2019 tentang </span>Standar Pengelolaan Dokumen Dan Informasi Hukum;</li><li style=\"text-align:justify;\">Peraturan Bupati Bogor Nomor 46 Tahun 2020 tentang Pengelolaan Jaringan Dokumentasi Dan Informasi Hukum Kabupaten Bogor (Berita Daerah Kabupaten Bogor Tahun 2020 Nomor 47); dan</li><li style=\"text-align:justify;\">Keputusan Bupati Bogor Nomor 100.3.8/383/Kpts/Per-UU/2022 tentang Pembentukan Tim Pengelola Jaringan Dokumentasi dan Informasi Hukum Kabupaten Bogor.</li></ol><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\"><strong>Sekilas tentang&nbsp;JDIH Kabupaten Bogor</strong></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">JDIH Kabupaten Bogor dibentuk berdasarkan</span><strong> </strong>Peraturan Bupati Bogor Nomor 46 Tahun 2020 tentang Pengelolaan Jaringan Dokumentasi Dan Informasi Hukum Kabupaten Bogor, pada 20 Juli 2020. JDIH Kabupaten Bogor berkedudukan di Bagian Perundang-undangan pada Sekretariat Daerah Kabupaten Bogor, Bagian Perundang-undangaan melakukan pengelolaan JDIH, yang meliputi :</p><ol><li style=\"text-align:justify;\">pengumpulan, pengolahan, penyimpanan, dan penyebarluasan dokumen hukum;</li><li style=\"text-align:justify;\">penataan sistem informasi hukum melalui pemanfaatan teknologi informasi dan komunikasi; dan</li><li style=\"text-align:justify;\">pelayanan informasi hukum.</li></ol><p style=\"margin-left:0px;text-align:justify;\">Pusat JDIH adalah Bagian Perundang-undangan pada Sekretariat Daerah, dan Anggota JDIH terdiri atas Perangkat Daerah dan Desa.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\"><strong>Tujuan JDIH</strong></p><ol><li style=\"text-align:justify;\">menjamin terciptanya pengelolaan dokumentasi dan informasi hukum yang terpadu, berbasis teknologi informasi dan komunikasi yang terintegrasi dengan Instansi Pemerintah, PD dan Desa; dan</li><li style=\"text-align:justify;\">menjamin ketersediaan dokumentasi dan informasi hukum yang lengkap dan akurat, serta dapat diakses secara cepat dan mudah.</li></ol><p><br>&nbsp;</p>', '2025-02-24', '2025-02-24 03:25:03', '2025-02-24 03:25:03'),
(54, 'Dasar Hukum', 'dasar-hukum', '<ol><li style=\"text-align:justify;\">Peraturan Presiden Nomor 33 Tahun 2012 tentang Jaringan Dokumentasi dan Informasi Hukum Nasional;</li><li style=\"text-align:justify;\">Peraturan Menteri Dalam Negeri Nomor 2 Tahun 2014 Tentang Pengelolaan Jaringan Dokumentasi dan Informasi Hukum Nasional;</li><li style=\"text-align:justify;\">Peraturan Menteri Hukum dan Hak Asasi Manusia Nomor 8 Tahun 2019 tentang Pengelolaan Dokumen dan Informasi Hukum;</li><li style=\"text-align:justify;\"><a href=\"https://jdih.bogorkab.go.id/peraturan/peraturan_bupati/show/1238\">Peraturan Bupati Bogor Nomor 46 Tahun 2020</a> tentang Pengelolaan Jaringan Dokumentasi dan Informasi Hukum Kabupaten Bogor; dan</li><li style=\"text-align:justify;\"><a href=\"https://jdih.bogorkab.go.id/peraturan/keputusan_bupati/show/1858\">Keputusan Bupati Bogor Nomor 100.3/236/Kpts/Per-UU/2024</a> tentang Pembentukan Tim Pengelola Jaringan Dokumentasi dan Informasi Hukum Kabupaten Bogor</li></ol>', 'Brilianto Azhari Suprapto', '[\"dasar\",\"hukum\",\"jdih\",\"kabupaten\",\"bogor\"]', 'khusus', 'Konten ini termasuk kategori khusus.', NULL, 'spesial', 'tes', NULL, 'spesial', NULL, '<ol><li style=\"text-align:justify;\">Peraturan Presiden Nomor 33 Tahun 2012 tentang Jaringan Dokumentasi dan Informasi Hukum Nasional;</li><li style=\"text-align:justify;\">Peraturan Menteri Dalam Negeri Nomor 2 Tahun 2014 Tentang Pengelolaan Jaringan Dokumentasi dan Informasi Hukum Nasional;</li><li style=\"text-align:justify;\">Peraturan Menteri Hukum dan Hak Asasi Manusia Nomor 8 Tahun 2019 tentang Pengelolaan Dokumen dan Informasi Hukum;</li><li style=\"text-align:justify;\"><a href=\"https://jdih.bogorkab.go.id/peraturan/peraturan_bupati/show/1238\">Peraturan Bupati Bogor Nomor 46 Tahun 2020</a> tentang Pengelolaan Jaringan Dokumentasi dan Informasi Hukum Kabupaten Bogor; dan</li><li style=\"text-align:justify;\"><a href=\"https://jdih.bogorkab.go.id/peraturan/keputusan_bupati/show/1858\">Keputusan Bupati Bogor Nomor 100.3/236/Kpts/Per-UU/2024</a> tentang Pembentukan Tim Pengelola Jaringan Dokumentasi dan Informasi Hukum Kabupaten Bogor</li></ol>', '2025-02-24', '2025-02-24 03:25:51', '2025-02-24 03:25:51'),
(55, 'Tugas Pokok dan Fungsi', 'tugas-pokok-dan-fungsi', '<p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">Berdasarkan Pasal 5 ayat (2) Peraturan Bupati Bogor Nomor 46 Tahun 2020 tentang </span>Pengelolaan Jaringan Dokumentasi Dan Informasi Hukum Kabupaten Bogor, p<span style=\"color:black;\">usat JDIH adalah &nbsp;Bagian Perundang-undangan pada Sekretariat Daerah; dan</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">Berdasarkan Pasal 5 ayat (3) Anggota JDIH, terdiri atas:</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">a. Perangkat Daerah; dan</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">b. Desa.</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">&nbsp;</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">Pasal 6 Peraturan Bupati Bogor Nomor 46 Tahun 2020 tentang </span>Pengelolaan Jaringan Dokumentasi Dan Informasi Hukum Kabupaten Bogor<span style=\"color:black;\">, Tugas Pusat JDIH adalah melaksanakan pembinaan, pengembangan dan monitoring pada anggota JDIH.</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">Fungsi Pusat JDIH:</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">a.&nbsp;perumusan kebijakan pembinaan dan pengembangan JDIH;</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">b.&nbsp;pemberian konsultasi terhadap permasalahan yang dihadapi oleh anggota JDIH;</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">c.&nbsp;pengumpulan, pengelolaan, penyimpanan, pelestarian, pendayagunaan dan penyebarluasan produk hukum daerah;</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">d.&nbsp;penataan sistem informasi hukum daerah berbasis teknologi informasi dan komunikasi;</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">e.&nbsp;pelaksanaan sosialisasi kebijakan dan pengelolaan teknis dokumentasi dan informasi hukum kepada anggota JDIH;</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">f.&nbsp;&nbsp;pembinaan sumberdaya manusia Pengelola JDIH;</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">g.&nbsp;pusat rujukan dokumentasi dan informasi hukum; dan</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">h.&nbsp;pelaksanaan monitoring dan evaluasi secara berkala terhadap pelaksanaan tugas dan fungsi Anggota JDIH.</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">&nbsp;</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">Pasal 8 Peraturan Bupati Bogor Nomor 46 Tahun 2020 tentang </span>Pengelolaan Jaringan Dokumentasi Dan Informasi Hukum Kabupaten Bogor,<span style=\"color:black;\"> Tugas anggota JDIH adalah melakukan pengelolaan dokumentasi dan informasi hukum.</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">Fungsi anggota JDIH:</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">a.&nbsp;pengumpulan, pengolahan, penyimpanan, pelestarian, dan pendayagunaan informasi dokumen hukum pada instansi masing-masing sesuai dengan sistem yang telah ditetapkan;</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">b.&nbsp;memberikan informasi dan memberikan salinan dokumen hukum yang diterbitkan atau memiliki keterkaitan dengan penyelenggaraan tugas pokok dan fungsi instansi masing-masing kepada Pusat JDIH; dan</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">c.&nbsp;memberikan laporan perkembangan pelaksanaan JDIH kepada Pusat JDIH sesuai ketentuan peraturan perundang-undangan.</span></p>', 'Brilianto Azhari Suprapto', '[\"tugas\",\"pokok\",\"dan\",\"fungsi\",\"jdih\",\"kabupaten\",\"bogor\"]', 'khusus', 'Konten ini termasuk kategori khusus.', NULL, 'spesial', 'tes', NULL, 'spesial', NULL, '<p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">Berdasarkan Pasal 5 ayat (2) Peraturan Bupati Bogor Nomor 46 Tahun 2020 tentang </span>Pengelolaan Jaringan Dokumentasi Dan Informasi Hukum Kabupaten Bogor, p<span style=\"color:black;\">usat JDIH adalah &nbsp;Bagian Perundang-undangan pada Sekretariat Daerah; dan</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">Berdasarkan Pasal 5 ayat (3) Anggota JDIH, terdiri atas:</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">a. Perangkat Daerah; dan</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">b. Desa.</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">&nbsp;</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">Pasal 6 Peraturan Bupati Bogor Nomor 46 Tahun 2020 tentang </span>Pengelolaan Jaringan Dokumentasi Dan Informasi Hukum Kabupaten Bogor<span style=\"color:black;\">, Tugas Pusat JDIH adalah melaksanakan pembinaan, pengembangan dan monitoring pada anggota JDIH.</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">Fungsi Pusat JDIH:</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">a.&nbsp;perumusan kebijakan pembinaan dan pengembangan JDIH;</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">b.&nbsp;pemberian konsultasi terhadap permasalahan yang dihadapi oleh anggota JDIH;</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">c.&nbsp;pengumpulan, pengelolaan, penyimpanan, pelestarian, pendayagunaan dan penyebarluasan produk hukum daerah;</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">d.&nbsp;penataan sistem informasi hukum daerah berbasis teknologi informasi dan komunikasi;</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">e.&nbsp;pelaksanaan sosialisasi kebijakan dan pengelolaan teknis dokumentasi dan informasi hukum kepada anggota JDIH;</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">f.&nbsp;&nbsp;pembinaan sumberdaya manusia Pengelola JDIH;</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">g.&nbsp;pusat rujukan dokumentasi dan informasi hukum; dan</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">h.&nbsp;pelaksanaan monitoring dan evaluasi secara berkala terhadap pelaksanaan tugas dan fungsi Anggota JDIH.</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">&nbsp;</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">Pasal 8 Peraturan Bupati Bogor Nomor 46 Tahun 2020 tentang </span>Pengelolaan Jaringan Dokumentasi Dan Informasi Hukum Kabupaten Bogor,<span style=\"color:black;\"> Tugas anggota JDIH adalah melakukan pengelolaan dokumentasi dan informasi hukum.</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">Fungsi anggota JDIH:</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">a.&nbsp;pengumpulan, pengolahan, penyimpanan, pelestarian, dan pendayagunaan informasi dokumen hukum pada instansi masing-masing sesuai dengan sistem yang telah ditetapkan;</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">b.&nbsp;memberikan informasi dan memberikan salinan dokumen hukum yang diterbitkan atau memiliki keterkaitan dengan penyelenggaraan tugas pokok dan fungsi instansi masing-masing kepada Pusat JDIH; dan</span></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">c.&nbsp;memberikan laporan perkembangan pelaksanaan JDIH kepada Pusat JDIH sesuai ketentuan peraturan perundang-undangan.</span></p>', '2025-02-24', '2025-02-24 03:26:45', '2025-02-24 03:26:45'),
(56, 'Kebijakan Privasi', 'kebijakan-privasi', '<p style=\"margin-left:0px;text-align:justify;\">**Kebijakan Privasi JDIH Kabupaten Bogor**</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">Kebijakan Privasi ini dirancang untuk memberi pemahaman mengenai cara kami mengumpulkan, menggunakan, melindungi, dan mengelola data pribadi yang Anda berikan melalui situs web Jaringan Dokumentasi dan Informasi Hukum (JDIH) Kabupaten Bogor. Kami berkomitmen untuk menjaga privasi Anda dan memastikan data pribadi Anda tetap aman.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">### 1. **Informasi yang Kami Kumpulkan**</p><p style=\"margin-left:0px;text-align:justify;\">Kami mengumpulkan informasi yang Anda berikan kepada kami secara langsung, seperti ketika Anda mengunjungi situs web kami, mengisi formulir, atau berinteraksi dengan layanan kami. Jenis informasi yang kami kumpulkan meliputi:</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">- **Data Pribadi**: Nama, alamat email, nomor telepon, dan informasi lainnya yang Anda berikan saat mengisi formulir atau berinteraksi dengan kami.</p><p style=\"margin-left:0px;text-align:justify;\">- **Data Penggunaan**: Informasi teknis yang dikumpulkan secara otomatis saat Anda mengakses situs web kami, seperti alamat IP, jenis perangkat, sistem operasi, browser yang digunakan, dan aktivitas penelusuran di situs.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">### 2. **Penggunaan Informasi**</p><p style=\"margin-left:0px;text-align:justify;\">Kami menggunakan informasi yang kami kumpulkan untuk tujuan berikut:</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">- Menyediakan dan memelihara layanan kami, termasuk akses ke dokumentasi hukum dan informasi terkait.</p><p style=\"margin-left:0px;text-align:justify;\">- Menanggapi pertanyaan atau permintaan yang Anda ajukan melalui situs web.</p><p style=\"margin-left:0px;text-align:justify;\">- Memperbaiki dan meningkatkan situs web kami untuk pengalaman pengguna yang lebih baik.</p><p style=\"margin-left:0px;text-align:justify;\">- Mematuhi kewajiban hukum dan peraturan yang berlaku.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">### 3. **Keamanan Informasi**</p><p style=\"margin-left:0px;text-align:justify;\">Kami mengambil langkah-langkah teknis dan administratif yang wajar untuk melindungi data pribadi Anda dari akses yang tidak sah, penggunaan yang tidak sah, atau pengungkapan yang tidak sah. Namun, harap diingat bahwa tidak ada metode transmisi data melalui internet atau metode penyimpanan elektronik yang 100% aman.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">### 4. **Pembagian Informasi**</p><p style=\"margin-left:0px;text-align:justify;\">Kami tidak akan menjual atau menyewakan data pribadi Anda kepada pihak ketiga tanpa izin Anda, kecuali dalam kondisi berikut:</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">- Jika diperlukan untuk mematuhi kewajiban hukum atau peraturan yang berlaku.</p><p style=\"margin-left:0px;text-align:justify;\">- Jika diperlukan untuk melindungi hak-hak kami, termasuk tindakan hukum atau untuk mencegah penipuan.</p><p style=\"margin-left:0px;text-align:justify;\">- Jika ada kerjasama dengan pihak ketiga yang terlibat dalam pengelolaan situs web kami, dengan syarat pihak ketiga tersebut menjaga kerahasiaan data Anda.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">### 5. **Cookies**</p><p style=\"margin-left:0px;text-align:justify;\">Kami dapat menggunakan cookies untuk meningkatkan pengalaman pengguna di situs kami. Cookies adalah file teks kecil yang disimpan di perangkat Anda yang membantu kami mengidentifikasi perangkat Anda dan memahami pola penggunaan situs kami. Anda dapat mengatur browser Anda untuk menolak cookies atau memberi peringatan saat cookies akan dikirimkan, tetapi ini dapat memengaruhi fungsi situs kami.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">### 6. **Tautan ke Situs Lain**</p><p style=\"margin-left:0px;text-align:justify;\">Situs web kami mungkin berisi tautan ke situs lain yang tidak dikelola oleh kami. Kami tidak bertanggung jawab atas kebijakan privasi atau praktik pengelolaan data pribadi yang diterapkan oleh situs-situs tersebut.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">### 7. **Hak Pengguna**</p><p style=\"margin-left:0px;text-align:justify;\">Anda berhak untuk mengakses, memperbarui, atau menghapus data pribadi Anda yang kami simpan. Jika Anda ingin mengakses atau memperbaiki data pribadi Anda, atau jika Anda memiliki pertanyaan mengenai kebijakan privasi ini, Anda dapat menghubungi kami melalui informasi kontak yang tersedia di situs web kami.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">### 8. **Perubahan Kebijakan Privasi**</p><p style=\"margin-left:0px;text-align:justify;\">Kami dapat memperbarui kebijakan privasi ini dari waktu ke waktu sesuai dengan perubahan dalam layanan kami atau peraturan yang berlaku. Setiap perubahan akan diumumkan melalui situs web kami, dan kebijakan privasi yang baru akan berlaku setelah dipublikasikan.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">### 9. **Kontak**</p><p style=\"margin-left:0px;text-align:justify;\">Jika Anda memiliki pertanyaan atau kekhawatiran mengenai kebijakan privasi ini atau bagaimana data pribadi Anda diperlakukan, Anda dapat menghubungi kami melalui:</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">**Alamat**: [Masukkan alamat kantor JDIH Kabupaten Bogor]&nbsp;&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">**Email**: [Masukkan alamat email kontak]&nbsp;&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">**Telepon**: [Masukkan nomor telepon]</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">Dengan menggunakan situs web JDIH Kabupaten Bogor, Anda setuju dengan kebijakan privasi ini.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">---</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">Semoga ini sesuai dengan kebutuhan Anda! Jika ada bagian yang perlu disesuaikan lebih lanjut, beri tahu saya.</p>', 'Brilianto Azhari Suprapto', '[\"kebijakan\",\"privasi\",\"jdih\",\"kabupaten\",\"bogor\"]', 'khusus', 'Konten ini termasuk kategori khusus.', NULL, 'spesial', 'tes', NULL, 'spesial', NULL, '<p style=\"margin-left:0px;text-align:justify;\">**Kebijakan Privasi JDIH Kabupaten Bogor**</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">Kebijakan Privasi ini dirancang untuk memberi pemahaman mengenai cara kami mengumpulkan, menggunakan, melindungi, dan mengelola data pribadi yang Anda berikan melalui situs web Jaringan Dokumentasi dan Informasi Hukum (JDIH) Kabupaten Bogor. Kami berkomitmen untuk menjaga privasi Anda dan memastikan data pribadi Anda tetap aman.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">### 1. **Informasi yang Kami Kumpulkan**</p><p style=\"margin-left:0px;text-align:justify;\">Kami mengumpulkan informasi yang Anda berikan kepada kami secara langsung, seperti ketika Anda mengunjungi situs web kami, mengisi formulir, atau berinteraksi dengan layanan kami. Jenis informasi yang kami kumpulkan meliputi:</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">- **Data Pribadi**: Nama, alamat email, nomor telepon, dan informasi lainnya yang Anda berikan saat mengisi formulir atau berinteraksi dengan kami.</p><p style=\"margin-left:0px;text-align:justify;\">- **Data Penggunaan**: Informasi teknis yang dikumpulkan secara otomatis saat Anda mengakses situs web kami, seperti alamat IP, jenis perangkat, sistem operasi, browser yang digunakan, dan aktivitas penelusuran di situs.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">### 2. **Penggunaan Informasi**</p><p style=\"margin-left:0px;text-align:justify;\">Kami menggunakan informasi yang kami kumpulkan untuk tujuan berikut:</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">- Menyediakan dan memelihara layanan kami, termasuk akses ke dokumentasi hukum dan informasi terkait.</p><p style=\"margin-left:0px;text-align:justify;\">- Menanggapi pertanyaan atau permintaan yang Anda ajukan melalui situs web.</p><p style=\"margin-left:0px;text-align:justify;\">- Memperbaiki dan meningkatkan situs web kami untuk pengalaman pengguna yang lebih baik.</p><p style=\"margin-left:0px;text-align:justify;\">- Mematuhi kewajiban hukum dan peraturan yang berlaku.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">### 3. **Keamanan Informasi**</p><p style=\"margin-left:0px;text-align:justify;\">Kami mengambil langkah-langkah teknis dan administratif yang wajar untuk melindungi data pribadi Anda dari akses yang tidak sah, penggunaan yang tidak sah, atau pengungkapan yang tidak sah. Namun, harap diingat bahwa tidak ada metode transmisi data melalui internet atau metode penyimpanan elektronik yang 100% aman.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">### 4. **Pembagian Informasi**</p><p style=\"margin-left:0px;text-align:justify;\">Kami tidak akan menjual atau menyewakan data pribadi Anda kepada pihak ketiga tanpa izin Anda, kecuali dalam kondisi berikut:</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">- Jika diperlukan untuk mematuhi kewajiban hukum atau peraturan yang berlaku.</p><p style=\"margin-left:0px;text-align:justify;\">- Jika diperlukan untuk melindungi hak-hak kami, termasuk tindakan hukum atau untuk mencegah penipuan.</p><p style=\"margin-left:0px;text-align:justify;\">- Jika ada kerjasama dengan pihak ketiga yang terlibat dalam pengelolaan situs web kami, dengan syarat pihak ketiga tersebut menjaga kerahasiaan data Anda.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">### 5. **Cookies**</p><p style=\"margin-left:0px;text-align:justify;\">Kami dapat menggunakan cookies untuk meningkatkan pengalaman pengguna di situs kami. Cookies adalah file teks kecil yang disimpan di perangkat Anda yang membantu kami mengidentifikasi perangkat Anda dan memahami pola penggunaan situs kami. Anda dapat mengatur browser Anda untuk menolak cookies atau memberi peringatan saat cookies akan dikirimkan, tetapi ini dapat memengaruhi fungsi situs kami.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">### 6. **Tautan ke Situs Lain**</p><p style=\"margin-left:0px;text-align:justify;\">Situs web kami mungkin berisi tautan ke situs lain yang tidak dikelola oleh kami. Kami tidak bertanggung jawab atas kebijakan privasi atau praktik pengelolaan data pribadi yang diterapkan oleh situs-situs tersebut.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">### 7. **Hak Pengguna**</p><p style=\"margin-left:0px;text-align:justify;\">Anda berhak untuk mengakses, memperbarui, atau menghapus data pribadi Anda yang kami simpan. Jika Anda ingin mengakses atau memperbaiki data pribadi Anda, atau jika Anda memiliki pertanyaan mengenai kebijakan privasi ini, Anda dapat menghubungi kami melalui informasi kontak yang tersedia di situs web kami.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">### 8. **Perubahan Kebijakan Privasi**</p><p style=\"margin-left:0px;text-align:justify;\">Kami dapat memperbarui kebijakan privasi ini dari waktu ke waktu sesuai dengan perubahan dalam layanan kami atau peraturan yang berlaku. Setiap perubahan akan diumumkan melalui situs web kami, dan kebijakan privasi yang baru akan berlaku setelah dipublikasikan.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">### 9. **Kontak**</p><p style=\"margin-left:0px;text-align:justify;\">Jika Anda memiliki pertanyaan atau kekhawatiran mengenai kebijakan privasi ini atau bagaimana data pribadi Anda diperlakukan, Anda dapat menghubungi kami melalui:</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">**Alamat**: [Masukkan alamat kantor JDIH Kabupaten Bogor]&nbsp;&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">**Email**: [Masukkan alamat email kontak]&nbsp;&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">**Telepon**: [Masukkan nomor telepon]</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">Dengan menggunakan situs web JDIH Kabupaten Bogor, Anda setuju dengan kebijakan privasi ini.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">---</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">Semoga ini sesuai dengan kebutuhan Anda! Jika ada bagian yang perlu disesuaikan lebih lanjut, beri tahu saya.</p>', '2025-02-24', '2025-02-24 03:28:14', '2025-02-24 03:28:14'),
(68, 'Rapat Koordinasi Program Pembentukan Peraturan Daerah dan Peraturan Bupati Tahun 2025', 'rapat-koordinasi-program-pembentukan-peraturan-daerah-dan-peraturan-bupati-tahun-2025', '<p>Release JDIH pada Bagian Perundang-undangan</p><p>22 Oktober 2024</p><p>Cibinong</p><p>&nbsp;</p><p>Program Pembentukan Peraturan Daerah (Propemperda) adalah dokumen perencanaan pembentukan Perda 1 (satu) tahun kedepan yang ditetapkan dalam Keputusan DPRD sebelum ditetapkannya APBD.</p><p>Program Pembentukan Peraturan Bupati (Propemperbup) adalah dokumen perencanaan pembentukan Perbup 1 (satu) tahun kedepan yang ditetapkan dengan Surat Sekretaris Daerah.</p><p>&nbsp;</p><p>Rapat Koordinasi dilaksanakan pada :</p><p>Hari/Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;Selasa/22 Oktober 2024</p><p>Tempat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Ruang Rapat Bupati Bogor</p>', 'Brilianto Azhari Suprapto', '[\"Rapat\",\"Koordinasi\",\"Program\",\"Pembentukan\",\"Peraturan\",\"Daerah\",\"dan\",\"Bupati\",\"Tahun\",\"2025\"]', 'warta', 'Bagian Perundang-undangan Setda. Kab. Bogor mengadakan Rapat Koordinasi Program Pembentukan Peraturan Daerah dan Peraturan Bupati Tahun 2025', NULL, 'publish', NULL, NULL, 'terkini', NULL, NULL, '2025-02-25', '2025-02-24 19:26:21', '2025-02-24 23:09:45'),
(69, 'JDIH Kabupaten Bogor Koordinasi ke Balai Réhabilitasi Sosial Waturnas \"Mulya Jaya\" Jakarta', 'jdih-kabupaten-bogor-koordinasi-ke-balai-rehabilitasi-sosial-waturnas-mulya-jaya-jakarta', '<p><span style=\"background-color:rgb(255,255,255);color:rgb(85,85,85);\">JDIH Kabupaten Bogor melakukan koordinasi ke Balai Réhabilitasi Sosial Waturnas \"Mulya Jaya\" Jakarta. Tujuan koordinasi tersebut terkait rencana mengalihbahasakan Produk Hukum Daerah Kabupaten Bogor yang telah diudangankan ke dalam Bahasa Isyarat, hal ini sebagai implementasi Undang-Undang Nomar 8 Tahun 2016 tentang Disabilitasi, di mana dalam Undang-Undang tersebut salah satunya mengatur mengenai hak penyandang disabilitas untuk memperoleh pelayanan publik secara optimal, wajar, bermartabat tanya diskriminatif. Semoga itikad baik JIDH Kabupaten Bogor dalam memberikan informasi hukum kepada semua kalangan baik masyarakat umum ataupun kaum disabilitas dapat terlaksanan dengan baik dan lancar.</span></p>', 'Brilianto Azhari Suprapto', '[\"JDIH\",\"Kabupaten\",\"Bogor\",\"Koordinasi\",\"ke\",\"Balai\",\"R\\u00e9habilitasi\",\"Sosial\",\"Waturnas\",\"\\\"Mulya\"]', 'warta', NULL, NULL, 'publish', NULL, NULL, 'terkini', NULL, NULL, '2025-02-25', '2025-02-24 19:42:43', '2025-02-24 23:09:36'),
(70, 'JDIH Kabupaten Bogor Konsultasi Ke Pusat Jaringan Dokumentasi dan Informasi Hukum Nasional', 'jdih-kabupaten-bogor-konsultasi-ke-pusat-jaringan-dokumentasi-dan-informasi-hukum-nasional', '<p>Release JDIH pada Bagian Perundang-undangan</p><p>25 September 2024</p><p>Jakarta</p><p>Tujuan: Konsultasi Pengelolaan Jaringan Dokumentasi dan Informasi Hukum Kabupaten Bogor.</p><p>Konsultasi dilaksanakan pada :</p><p>Hari/Tanggal : Rabu/25 September 2024</p><p>Tempat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Ruang Rapat Pusat Jaringan Dokumentasi dan Informasi Hukum Nasional pada Badan Pembinaan Hukum Nasional Kementrian Hukum dan HAM RI</p><p>Konsultasi diterima oleh Bapak Faizal Yusuf, SH, Selaku JFU Analis Hukum-Badan Pembinaan Hukum Nasional dan Bapak Idham.</p><p>Beliau memberikan saran dan masukan terhadap pengelolaan JDIH Kabupaten Bogor, yaitu sebagai berikut:</p><p>1.&nbsp;Dokumen hukum yang berisi: Peraturan Perundang-undangan, monografi, artikel hukum dan putusan pengadilan</p><p>2.&nbsp;Melengkapi dokumen-dokumen yang masuk dalam penilaian, antara lain pengelola JDIH mengikuti bimtek, dan Produk Hukum dalam Bahasa Asing (Inggris),</p><p>3.&nbsp;Peraturan yang sudah tidak berlaku ditambahkan link ke peraturan terkait;</p><p>4.&nbsp;Promosi JDIH melalui media elektronik, media massa/cetak dan Videotron agar ditingkatkan;</p><p>5.&nbsp;Inovasi-inovasi agar ditingkatkan;</p><p>6.&nbsp;Hide menu-menu yang belum ada kontennya; dan</p><p>7.&nbsp;Layanan Mobile JDIH baik android ataupun Ios agar dibuat, sehingga mempermudah pencari informasi;</p>', 'Brilianto Azhari Suprapto', '[\"JDIH\",\"Kabupaten\",\"Bogor\",\"Konsultasi\",\"Ke\",\"Pusat\",\"Jaringan\",\"Dokumentasi\",\"dan\",\"Informasi\"]', 'warta', NULL, NULL, 'publish', NULL, NULL, 'terkini', NULL, NULL, '2025-02-25', '2025-02-24 20:19:40', '2025-02-24 23:09:26'),
(75, 'Kunjungan Studi Tiru', 'kunjungan-studi-tiru', '<p><span style=\"background-color:rgb(255,255,255);color:rgb(85,85,85);\">Kunjungan Studi Tiru Bagian Perundang-Undangan Setda Kabupaten Bogor Ke Bagian Hukum Setda Kabupaten Banyuwangi. Rabu, 20 November 2024</span></p>', 'Brilianto Azhari Suprapto', '[\"Kunjungan\",\"Studi\",\"Tiru\",\"Bagian\",\"Perundang-Undangan\",\"Setda\",\"Kabupaten\",\"Bogor\",\"Ke\",\"Hukum\"]', 'warta', NULL, NULL, 'publish', NULL, NULL, 'terkini', NULL, NULL, '2025-02-25', '2025-02-24 20:42:04', '2025-02-24 23:09:15'),
(77, 'JDIH Kabupaten Bogor Konsultasi Ke Sub Bagian Dokumentasi dan Penyuluhan Hukum Biro Hukum dan Hak Asasi Manusia Provinsi Jawa Barat', 'jdih-kabupaten-bogor-konsultasi-ke-sub-bagian-dokumentasi-dan-penyuluhan-hukum-biro-hukum-dan-hak-asasi-manusia-provinsi-jawa-barat', '<p>Release JDIH pada Bagian Perundang-undangan</p><p>13 September 2024</p><p>Bandung</p><p>Tujuan: Konsultasi Pengelolaan Jaringan Dokumentasi dan Informasi Hukum Sub Bagian Jaringan Dokumentasi dan Informasi Hukum Daerah Kabupaten Bogor.</p><p>Konsultasi dilaksanakan pada :</p><p>Hari/Tanggal&nbsp;&nbsp;:&nbsp;&nbsp;Jumat/13 September 2024</p><p>Tempat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Sub Bagian Dokumentasi dan Penyuluhan Hukum Biro Hukum dan Hak Asasi Manusia Provinsi</p><p>Konsultasi diterima oleh Bapak Beni Ruhiman, Selaku Jafung Pranata Komputer Ahli Pertama Sub Bagian Dokumentasi dan Penyuluhan Hukum pada Biro Hukum dan Hak Asasi Manusia Provinsi.</p><p>Beliau memberikan saran dan masukan terhadap pengelolaan JDIH Kabupaten Bogor, yaitu sebagai berikut :</p><p>1.&nbsp;Menu produk hukum dihilangkan dan isi dari produk hukum masuk ke dokumen hukum yang berisi: Peraturan Perundang-undangan, monografi, artikel hukum dan putusan pengadilan</p><p>2.&nbsp;Tampilan beranda foto keorganisasian tidak ditampilkan di beranda;</p><p>3.&nbsp;Peraturan yang dicabut, mencabut, mengubah dan diubah ditambahkan link ke peraturan terkait;</p><p>4.&nbsp;Peraturan dialihbahasakan ke bahasa asing (Inggris);</p><p>5.&nbsp;Promosi JDIH melalui mediat elektronik, media massa/cetak dan videotron;</p>', 'Brilianto Azhari Suprapto', '[\"JDIH\",\"Kabupaten\",\"Bogor\",\"Konsultasi\",\"Ke\",\"Sub\",\"Bagian\",\"Dokumentasi\",\"dan\",\"Penyuluhan\"]', 'warta', NULL, NULL, 'publish', NULL, NULL, 'terkini', NULL, NULL, '2025-02-25', '2025-02-24 20:45:18', '2025-02-24 23:09:06'),
(79, 'Koordinasi ke Balai Penerbitan Braille Indonesia (BPBI) Sentra Wiyata Guna Ditjen. Rehsos Kementerian Sosial RI Bandung', 'koordinasi-ke-balai-penerbitan-braille-indonesia-bpbi-sentra-wiyata-guna-ditjen-rehsos-kementerian-sosial-ri-bandung', '<p><strong>Release JDIH Bagian Perundang-undangan</strong></p><p><strong>17 September 2024</strong></p><p><strong>Bandung</strong></p><p>Maksud dan Tujuan: Koordinasi dilaksanakan untuk mengetahui proses dari 5 (lima) Peraturan Daerah yang akan dialih hurufkan ke dalam Bentuk <i>Braille</i> dan Layanan <i>Audio Book</i> yaitu Perda Nomor 5 Tahun 2015 tentang Perlindungan Perempuan dan Anak Dari Tindak Kekerasan, Perda Nomor 9 Tahun 2015 tentang Pencegahan dan Penanggulangan <i>Human Immunodeficiency Virus</i> dan <i>Acquired Immune Deficiency Syndrome</i>, Perda Nomor 7 Tahun 2016 tentang Kesejahteraan Sosial, Perda Nomor 8 Tahun 2016 tentang Kawasan Tanpa Rokok dan Perda Nomor 10 Tahun 2016 tentang Bantuan Hukum Bagi Masyarakat Miskin.</p><p>Koordinasi dilaksanakan pada: Hari/Tanggal&nbsp;Selasa/ 17 September 2024</p><p>Tempat : Ruang Rapat <span style=\"color:black;\">Sentra Wiyata Guna</span></p><p>Kunjungan diterima Ibu Irma Dwiandari S.Sos selaku <i>Sosial Worker</i> Direktorat Rehabilitasi Sosial Penyandang Disabilitas pada Balai Penerbitan Braille Indonesia (BPBI) Sentra Wiyata Guna dan Bapak Kokom.</p><p>Beliau menyampaikan bahwa usulan yang disampaikan oleh Pemerintah Kabupaten Bogor akan diproses awal tahun depan, karena sednag menyelesaikan &nbsp;pembuatan alkitab yang merupakan MoU Kementerian Agama RI dengan Kementerian Sosial RI, sebanyak 6000 yang harus selesai dialihbahasakan ke dalam bentuk <i>Braille</i> tahun ini.</p><p>Beliau juga memberi saran agar Kabupaten Bogor agar membuat pojok Braille, dimanan buku-buku dan literasi <i>braille</i> akan dikirim secara rutin setiap terbitan terbaru.</p>', 'Brilianto Azhari Suprapto', '[\"Koordinasi\",\"ke\",\"Balai\",\"Penerbitan\",\"Braille\",\"Indonesia\",\"(BPBI)\",\"Sentra\",\"Wiyata\",\"Guna\"]', 'warta', NULL, NULL, 'publish', NULL, NULL, 'terkini', NULL, NULL, '2025-02-25', '2025-02-24 22:05:22', '2025-02-25 02:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `articles_category`
--

CREATE TABLE `articles_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `articles_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `teu_badan` varchar(255) DEFAULT NULL,
  `cetakan_edisi` varchar(255) DEFAULT NULL,
  `tempat_terbit` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `sumber` varchar(255) DEFAULT NULL,
  `subjek` varchar(255) DEFAULT NULL,
  `bahasa` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `bidang_hukum` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `tipe`, `judul`, `teu_badan`, `cetakan_edisi`, `tempat_terbit`, `penerbit`, `tahun_terbit`, `sumber`, `subjek`, `bahasa`, `lokasi`, `bidang_hukum`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Artikel Hukum', 'Dua Mahasiswa Ditangkap karena Judi Online', 'Harian Pakuan Raya (Bogor)', '4961', 'Bogor', 'Harian Pakuan Raya', '2024', '-', '-', 'Indonesia', 'Bogor', 'Hukum Pidana', NULL, '2025-02-13 01:43:03', '2025-02-13 01:43:20'),
(2, 'Putusan Pengadilan', 'Peraturan Daerah Provinsi Jawa Barat Nomor 12 Tahun 2019 Tentang Perlindungan Dan Pemberdayaan Pembudi Daya Ikan Dan Petambak Garam', 'Bogor (Kabupaten)', '4961', 'Bandung', 'Biro Hukum dan HAM Setda Provinsi Jawa Barat', '2024', 'LD Kabupaten Bogor Tahun 2024 Nomor 6, TLD Kabupaten Bogor Nomor 131', 'PERTANAHAN', 'Indonesia', 'Mahkamah Agung RIii', 'Bidang Hukum', NULL, '2025-02-17 02:33:00', '2025-02-17 02:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:61:{i:0;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:12:\"create roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:1;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:10:\"view roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:2;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:10:\"edit roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:3;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:12:\"delete roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:4;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:16:\"view permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:5;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:18:\"create permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:6;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:16:\"edit permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:7;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:18:\"delete permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:8;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:13:\"create berita\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:9;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:12:\"create warta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:10;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:10:\"view warta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:11;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:12:\"update warta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:12;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:11:\"view slider\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:13;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:13:\"update slider\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:14;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:13:\"delete slider\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:15;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:19:\"create produk hukum\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:16;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:17:\"view produk hukum\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:17;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:19:\"update produk hukum\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:18;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:19:\"delete produk hukum\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:19;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:15:\"create articles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:4;}}i:20;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:13:\"view articles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:4;}}i:21;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:15:\"update articles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:4;}}i:22;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:15:\"delete articles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:4;}}i:23;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:12:\"view dokumen\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:4;}}i:24;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:16:\"create peraturan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:25;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:14:\"view peraturan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:26;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:16:\"update peraturan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:27;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:16:\"delete peraturan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:28;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:22:\"create monografi hukum\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:4;}}i:29;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:20:\"view monografi hukum\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:4;}}i:30;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:22:\"update monografi hukum\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:4;}}i:31;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:22:\"delete monografi hukum\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:4;}}i:32;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:14:\"create artikel\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:4;}}i:33;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:12:\"view artikel\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:4;}}i:34;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:14:\"update artikel\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:4;}}i:35;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:14:\"delete artikel\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:4;}}i:36;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:20:\"create yurisprudensi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:37;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:18:\"view yurisprudensi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:38;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:20:\"update yurisprudensi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:39;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:20:\"delete yurisprudensi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:40;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:13:\"create agenda\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:41;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:11:\"view agenda\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:42;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:13:\"update agenda\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:43;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:13:\"delete agenda\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:44;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:12:\"view tentang\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:45;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:14:\"create sejarah\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:46;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:12:\"view sejarah\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:47;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:14:\"update sejarah\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:48;a:4:{s:1:\"a\";i:78;s:1:\"b\";s:14:\"delete sejarah\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:49;a:4:{s:1:\"a\";i:79;s:1:\"b\";s:20:\"create sekapur sirih\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:50;a:4:{s:1:\"a\";i:80;s:1:\"b\";s:18:\"view sekapur sirih\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:51;a:4:{s:1:\"a\";i:81;s:1:\"b\";s:20:\"update sekapur sirih\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:52;a:4:{s:1:\"a\";i:82;s:1:\"b\";s:20:\"delete sekapur sirih\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:53;a:4:{s:1:\"a\";i:83;s:1:\"b\";s:26:\"create struktur organisasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:54;a:4:{s:1:\"a\";i:84;s:1:\"b\";s:24:\"view struktur organisasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:55;a:4:{s:1:\"a\";i:85;s:1:\"b\";s:26:\"update struktur organisasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:56;a:4:{s:1:\"a\";i:86;s:1:\"b\";s:26:\"delete struktur organisasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:57;a:4:{s:1:\"a\";i:87;s:1:\"b\";s:16:\"create visi misi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:58;a:4:{s:1:\"a\";i:88;s:1:\"b\";s:14:\"view visi misi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:59;a:4:{s:1:\"a\";i:89;s:1:\"b\";s:16:\"update visi misi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:60;a:4:{s:1:\"a\";i:90;s:1:\"b\";s:16:\"delete visi misi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:5:\"Admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:4;s:1:\"b\";s:5:\"Staff\";s:1:\"c\";s:3:\"web\";}}}', 1740566703);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tgl_galeri` date DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `url_video` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `tipe`, `nama`, `tgl_galeri`, `file`, `url_video`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bagian Perundang-undangan Setda. Kab. Bogor mengadakan Rapat Koordinasi Program Pembentukan Peraturan Daerah dan Peraturan Bupati Tahun 2025, pada tanggal  22 Oktober 2024', '2025-02-19', NULL, NULL, NULL, '2025-02-18 23:31:53', '2025-02-18 23:31:53'),
(2, 1, 'Bimbingan Teknis Legal Drafting', '2025-02-19', NULL, NULL, NULL, '2025-02-18 23:32:34', '2025-02-18 23:32:34'),
(3, 1, 'KEGIATAN MONITORING DAN EVALUASI PEMBENTUKAN PRODUK HUKUM DAERAH SERTA PENYEBARLUASAN PRODUK HUKUM DAERAH DI KECAMATAN BABAKAN MADANG', '2024-09-17', NULL, NULL, NULL, '2025-02-18 23:33:28', '2025-02-18 23:33:28'),
(4, 1, 'KEGIATAN MONITORING DAN EVALUASI PEMBENTUKAN PRODUK HUKUM DAERAH SERTA PENYEBARLUASAN PRODUK HUKUM DAERAH DI KECAMATAN CARINGIN', '2025-02-04', NULL, NULL, NULL, '2025-02-18 23:34:37', '2025-02-18 23:34:37'),
(5, 2, 'ALUR PENCARIAN MENU DI WEBSITE JDIH KABUPATEN BOGOR', '2025-02-19', NULL, 'https://www.youtube.com/embed/IB7rbp82Cxk', 'MENU JDIH', '2025-02-18 23:58:26', '2025-02-18 23:58:26'),
(6, 2, 'JDIH KABUPATEN BOGOR', '2025-02-05', NULL, 'https://www.youtube.com/embed/UnVIUqOUOXE?si=qXJv4_zPZ_fEEzJb', 'JDIH', '2025-02-18 23:58:57', '2025-02-18 23:58:57'),
(7, 2, 'PROFIL SETDA KABUPATEN BOGOR', '2025-02-03', NULL, 'https://www.youtube.com/embed/W20prAtu_3E?si=wDRS5240lOTLN059', 'SETDA KABUPATEN BOGOR', '2025-02-18 23:59:22', '2025-02-18 23:59:22'),
(8, 1, 'KEGIATAN MONITORING DAN EVALUASI PEMBENTUKAN PRODUK HUKUM DAERAH SERTA PENYEBARLUASAN PRODUK HUKUM DAERAH DI KECAMATAN KEMANG', '2025-02-19', NULL, NULL, NULL, '2025-02-19 01:45:58', '2025-02-19 01:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `infografis`
--

CREATE TABLE `infografis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infografis`
--

INSERT INTO `infografis` (`id`, `judul`, `file`, `created_at`, `updated_at`) VALUES
(9, 'tes judul', NULL, '2025-02-17 20:09:11', '2025-02-17 20:09:11'),
(10, 'tes judul 2', NULL, '2025-02-18 19:03:02', '2025-02-18 19:03:02'),
(11, 'tes judul 3', NULL, '2025-02-18 19:03:15', '2025-02-18 19:03:15'),
(12, 'tes judul', NULL, '2025-02-18 19:03:25', '2025-02-18 19:03:25'),
(13, 'tes judul 4', NULL, '2025-02-18 19:03:40', '2025-02-18 19:03:40'),
(14, 'tes judul 5', NULL, '2025-02-18 19:03:54', '2025-02-18 19:03:54'),
(15, 'tes gambar tanpa public', NULL, '2025-02-18 19:51:56', '2025-02-18 19:51:56'),
(16, 'tes gambar dengan public', NULL, '2025-02-18 19:53:17', '2025-02-18 19:53:17');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(10, 'App\\Models\\StrukturOrganisasi', 1, '0ece9d0e-9fbb-4c81-94a6-5dfaeae46f2c', 'struktur_files', 'DSC_4269 copy', 'DSC_4269-copy.jpg', 'image/jpeg', 'public', 'public', 840162, '[]', '[]', '[]', '[]', 1, '2025-02-14 03:03:27', '2025-02-14 03:03:27'),
(12, 'App\\Models\\StrukturOrganisasi', 2, '5b433724-81d5-4908-8fcc-82c3e454deac', 'struktur_files', '1702605966_KABAG_PERUU-removebg-preview', '1702605966_KABAG_PERUU-removebg-preview.png', 'image/png', 'public', 'public', 26493, '[]', '[]', '[]', '[]', 1, '2025-02-16 21:51:30', '2025-02-16 21:51:30'),
(18, 'App\\Models\\Peraturan', 4, '2c6aa22a-38d4-4d99-a902-f505606c0048', 'images_peraturan', 'IMG-20220302-WA0091', 'IMG-20220302-WA0091.jpg', 'image/jpeg', 'public', 'public', 99219, '[]', '[]', '[]', '[]', 1, '2025-02-17 01:09:06', '2025-02-17 01:09:06'),
(19, 'App\\Models\\MonografiHukum', 3, '8fb96b3f-65dc-41bb-b2a2-a19dbc2d6a9f', 'images', 'IMG-20220302-WA0091', 'IMG-20220302-WA0091.jpg', 'image/jpeg', 'public', 'public', 99219, '[]', '[]', '[]', '[]', 1, '2025-02-17 01:28:49', '2025-02-17 01:28:49'),
(20, 'App\\Models\\Artikel', 2, 'd2b01f9c-0291-4b59-9a00-6d59648831e2', 'images', 'IMG-20220302-WA0085', 'IMG-20220302-WA0085.jpg', 'image/jpeg', 'public', 'public', 57318, '[]', '[]', '[]', '[]', 1, '2025-02-17 02:33:02', '2025-02-17 02:33:02'),
(21, 'App\\Models\\MonografiHukum', 4, '91a78d31-cb70-4965-9566-2e26a33c1f61', 'images', 'IMG-20220302-WA0084', 'IMG-20220302-WA0084.jpg', 'image/jpeg', 'public', 'public', 348578, '[]', '[]', '[]', '[]', 1, '2025-02-17 02:39:53', '2025-02-17 02:39:53'),
(26, 'App\\Models\\Infografis', 9, 'fc004154-e45c-43c1-9ca9-b4608b938e4a', 'struktur_files', 'IMG-20220302-WA0091', 'IMG-20220302-WA0091.jpg', 'image/jpeg', 'public', 'public', 99219, '[]', '[]', '[]', '[]', 1, '2025-02-17 20:09:11', '2025-02-17 20:09:11'),
(29, 'App\\Models\\Infografis', 10, '29ad2758-6a19-419b-b69e-94eb6a119d3c', 'struktur_files', 'vecteezy_3d-render-office-manager-minimalist-room_5288255', 'vecteezy_3d-render-office-manager-minimalist-room_5288255.jpg', 'image/jpeg', 'public', 'public', 1582384, '[]', '[]', '[]', '[]', 1, '2025-02-18 19:03:02', '2025-02-18 19:03:02'),
(30, 'App\\Models\\Infografis', 11, 'e8cb18bd-1f93-48f2-98f1-43dbb1e7ca07', 'struktur_files', 'IMG-20220302-WA0086', 'IMG-20220302-WA0086.jpg', 'image/jpeg', 'public', 'public', 287087, '[]', '[]', '[]', '[]', 1, '2025-02-18 19:03:15', '2025-02-18 19:03:15'),
(31, 'App\\Models\\Infografis', 12, '84e72477-bdc1-4c31-949f-b5eb32907cf3', 'struktur_files', 'IMG-20220302-WA0092', 'IMG-20220302-WA0092.jpg', 'image/jpeg', 'public', 'public', 111758, '[]', '[]', '[]', '[]', 1, '2025-02-18 19:03:25', '2025-02-18 19:03:25'),
(32, 'App\\Models\\Infografis', 13, 'e22d845a-1f82-45b9-9c36-6e0023e5568b', 'struktur_files', 'IMG-20220302-WA0091', 'IMG-20220302-WA0091.jpg', 'image/jpeg', 'public', 'public', 99219, '[]', '[]', '[]', '[]', 1, '2025-02-18 19:03:40', '2025-02-18 19:03:40'),
(33, 'App\\Models\\Infografis', 14, 'cfe818ca-8b3c-4a6d-8067-984e27936b4e', 'struktur_files', 'IMG-20220302-WA0088', 'IMG-20220302-WA0088.jpg', 'image/jpeg', 'public', 'public', 263804, '[]', '[]', '[]', '[]', 1, '2025-02-18 19:03:54', '2025-02-18 19:03:54'),
(34, 'App\\Models\\Infografis', 15, 'a4839cfb-0813-4ecb-8e29-f354318a8204', 'struktur_files', 'vecteezy_3d-render-office-manager-minimalist-room_5288255', 'vecteezy_3d-render-office-manager-minimalist-room_5288255.jpg', 'image/jpeg', 'public', 'public', 1582384, '[]', '[]', '[]', '[]', 1, '2025-02-18 19:51:58', '2025-02-18 19:51:58'),
(35, 'App\\Models\\Infografis', 16, '5c274591-84d8-4c32-a35c-a7a2cb66e37b', 'struktur_files', 'IMG-20220302-WA0090', 'IMG-20220302-WA0090.jpg', 'image/jpeg', 'public', 'public', 182607, '[]', '[]', '[]', '[]', 1, '2025-02-18 19:53:17', '2025-02-18 19:53:17'),
(36, 'App\\Models\\Galeri', 1, '12b651b6-8d7d-45a3-8779-c0daeca094dc', 'foto', 'IMG-20220302-WA0086', 'IMG-20220302-WA0086.jpg', 'image/jpeg', 'public', 'public', 287087, '[]', '[]', '[]', '[]', 1, '2025-02-18 23:31:56', '2025-02-18 23:31:56'),
(37, 'App\\Models\\Galeri', 2, 'e163d372-2e68-4880-a53c-737ff18e7044', 'foto', 'vecteezy_3d-render-office-manager-minimalist-room_5288255', 'vecteezy_3d-render-office-manager-minimalist-room_5288255.jpg', 'image/jpeg', 'public', 'public', 1582384, '[]', '[]', '[]', '[]', 1, '2025-02-18 23:32:34', '2025-02-18 23:32:34'),
(38, 'App\\Models\\Galeri', 3, 'cabd620e-b1e1-459f-8255-b4666d34f384', 'foto', 'IMG-20220302-WA0085', 'IMG-20220302-WA0085.jpg', 'image/jpeg', 'public', 'public', 57318, '[]', '[]', '[]', '[]', 1, '2025-02-18 23:33:28', '2025-02-18 23:33:28'),
(39, 'App\\Models\\Galeri', 4, '09bc0e16-cf99-488a-be8c-455cb504dca8', 'foto', 'IMG-20220302-WA0091', 'IMG-20220302-WA0091.jpg', 'image/jpeg', 'public', 'public', 99219, '[]', '[]', '[]', '[]', 1, '2025-02-18 23:34:37', '2025-02-18 23:34:37'),
(40, 'App\\Models\\Galeri', 4, '57760176-234d-4ddd-bc29-025862fe3808', 'foto', 'IMG-20220302-WA0090', 'IMG-20220302-WA0090.jpg', 'image/jpeg', 'public', 'public', 182607, '[]', '[]', '[]', '[]', 2, '2025-02-18 23:34:37', '2025-02-18 23:34:37'),
(41, 'App\\Models\\Galeri', 4, '98016caa-ddc8-412f-90d4-6b88b78f5c01', 'foto', 'IMG-20220302-WA0092', 'IMG-20220302-WA0092.jpg', 'image/jpeg', 'public', 'public', 111758, '[]', '[]', '[]', '[]', 3, '2025-02-18 23:34:37', '2025-02-18 23:34:37'),
(42, 'App\\Models\\Galeri', 8, '3c568157-bc10-4a22-bf08-dd7d253f6c07', 'foto', 'DSC_4269 copy', 'DSC_4269-copy.jpg', 'image/jpeg', 'public', 'public', 840162, '[]', '[]', '[]', '[]', 1, '2025-02-19 01:46:01', '2025-02-19 01:46:01'),
(77, 'App\\Models\\Articles', 68, '5977cebc-73c1-49ac-884a-917a7dbf57b6', 'images', 'berita2', 'berita2.jpeg', 'image/jpeg', 'public', 'public', 205376, '[]', '[]', '[]', '[]', 1, '2025-02-24 19:26:21', '2025-02-24 19:26:21'),
(80, 'App\\Models\\Articles', 70, '33b0a30b-f14b-4f5d-b828-1ce2ca3787a9', 'images', 'berita4', 'berita4.jpeg', 'image/jpeg', 'public', 'public', 707502, '[]', '[]', '[]', '[]', 1, '2025-02-24 20:19:40', '2025-02-24 20:19:40'),
(86, 'App\\Models\\Articles', 75, '985eb3ef-d883-4d4b-a5e8-8c22c00f3475', 'images', 'berita1', 'berita1.jpeg', 'image/jpeg', 'public', 'public', 612059, '[]', '[]', '[]', '[]', 1, '2025-02-24 20:42:04', '2025-02-24 20:42:04'),
(88, 'App\\Models\\Articles', 77, 'e9f5ab69-304a-4841-83e1-2c4f61a92a77', 'images', 'berita7', 'berita7.jpeg', 'image/jpeg', 'public', 'public', 501204, '[]', '[]', '[]', '[]', 1, '2025-02-24 20:45:18', '2025-02-24 20:45:18'),
(91, 'App\\Models\\Slider', 6, '1fbc3dbf-2e84-410d-bf16-7daad2d1f3f8', 'images', 'banner1', 'banner1.jpeg', 'image/jpeg', 'public', 'public', 211892, '[]', '[]', '[]', '[]', 1, '2025-02-24 23:47:48', '2025-02-24 23:47:48'),
(93, 'App\\Models\\Articles', 69, '9f892e80-b0f2-49b2-8797-1cc73b169002', 'images', 'berita3', 'berita3.jpeg', 'image/jpeg', 'public', 'public', 276775, '[]', '[]', '[]', '[]', 1, '2025-02-25 02:37:09', '2025-02-25 02:37:09'),
(94, 'App\\Models\\Articles', 79, '76d73c71-039e-48c0-bbf7-5dfe6da06c70', 'images', 'berita5', 'berita5.jpeg', 'image/jpeg', 'public', 'public', 894943, '[]', '[]', '[]', '[]', 1, '2025-02-25 02:40:34', '2025-02-25 02:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_07_044230_create_user_role', 2),
(5, '2025_02_07_062807_add_column_id_on_users_table', 3),
(7, '2025_02_07_090542_create_permission_tables', 4),
(8, '2025_02_10_015022_create_articles_table', 5),
(9, '2025_02_10_064911_add_image_to_articles_table', 6),
(10, '2025_02_11_022809_create_media_table', 7),
(12, '2025_02_11_074602_add_summary_to_articles_table', 8),
(13, '2025_02_11_075405_add_statuspublish_to_articles_table', 9),
(14, '2025_02_12_021521_create_category_table', 10),
(15, '2025_02_12_021540_create_articles_category_table', 10),
(16, '2025_02_12_033503_add_column_to_articles_table', 11),
(17, '2025_02_12_034308_add_tags_articles_table', 12),
(25, '2025_02_13_014658_create_agenda_table', 14),
(26, '2025_02_13_014822_create_agenda_kegiatan_table', 14),
(28, '2025_02_12_064727_create_peraturan_table', 15),
(29, '2025_02_12_064755_create_monografi_hukum_table', 16),
(30, '2025_02_12_064739_create_artikel_table', 17),
(31, '2025_02_12_064809_create_yurisprudensi_table', 18),
(37, '2025_02_14_025623_create_sekapur_sirih_table', 19),
(38, '2025_02_14_030338_create_visi_misi_table', 19),
(39, '2025_02_14_030426_create_struktur_organisasi_table', 19),
(40, '2025_02_14_030852_create_sejarah_table', 19),
(41, '2025_02_14_100936_add_column_to_peraturan_table', 20),
(42, '2025_02_14_101728_add_column_to_artikel_table', 20),
(43, '2025_02_14_101849_add_column_to_monografi_hukum_table', 20),
(44, '2025_02_14_102002_add_column_to_yurisprudensi_table', 20),
(45, '2025_02_17_045511_create_slider_table', 21),
(46, '2025_02_17_094418_add_column_to_articles_table', 22),
(47, '2025_02_17_095751_create_infografis_table', 23),
(48, '2025_02_18_031930_add_column_to_articles_table', 24),
(52, '2025_02_18_094818_add_column_to_peraturan_table', 25),
(53, '2025_02_18_101638_add_column_slug_to_articles_table', 26),
(54, '2025_02_19_013744_add_column_penempatan_to_slider_table', 27),
(55, '2025_02_19_053935_create_galeri_table', 28),
(56, '2025_02_19_064835_add_tipe_to_galeri_table', 29),
(57, '2025_02_20_072403_change_super_artikel_to_longtext_in_articles', 30);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 5),
(5, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `monografi_hukum`
--

CREATE TABLE `monografi_hukum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi_fisik` varchar(255) DEFAULT NULL,
  `no_induk_buku` varchar(255) DEFAULT NULL,
  `bidang_hukum` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `bahasa` varchar(255) DEFAULT NULL,
  `isbn_issn` varchar(255) DEFAULT NULL,
  `subjek` varchar(255) DEFAULT NULL,
  `sumber` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tempat_terbit` varchar(255) DEFAULT NULL,
  `cetakan_edisi` varchar(255) DEFAULT NULL,
  `nomor_panggil` varchar(255) DEFAULT NULL,
  `teu_badan` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monografi_hukum`
--

INSERT INTO `monografi_hukum` (`id`, `deskripsi_fisik`, `no_induk_buku`, `bidang_hukum`, `lokasi`, `bahasa`, `isbn_issn`, `subjek`, `sumber`, `tipe`, `tahun_terbit`, `penerbit`, `tempat_terbit`, `cetakan_edisi`, `nomor_panggil`, `teu_badan`, `judul`, `file`, `created_at`, `updated_at`) VALUES
(1, '95 hlm', '-', 'Hukum Tata Negara', 'Bagian Perundang-Undangan', 'Peraturan Daerah Provinsi Jawa Barat Nomor 12 Tahun 2019 Tentang Perlindungan Dan Pemberdayaan Pembudi Daya Ikan Dan Petambak Garam', '-', '-', '-', 'Monografi', '2019', 'Biro Hukum dan HAM Setda Provinsi Jawa Barat', 'Bandung', '-', '3 A', 'Biro Hukum dan HAM Setda Provinsi Jawa Barattt', 'Peraturan Daerah Provinsi Jawa Barat Nomor 12 Tahun 2019 Tentang Perlindungan Dan Pemberdayaan Pembudi Daya Ikan Dan Petambak Garam', NULL, '2025-02-13 00:35:59', '2025-02-13 01:09:37'),
(2, '95 hlm', '-', 'Hukum Tata Negara', 'Bagian Perundang-Undangan', 'Peraturan Daerah Provinsi Jawa Barat Nomor 12 Tahun 2019 Tentang Perlindungan Dan Pemberdayaan Pembudi Daya Ikan Dan Petambak Garam', '-', '-', '-', 'Monografi', '2019', 'Biro Hukum dan HAM Setda Provinsi Jawa Barat', 'Bandung', '-', '3 A', 'Biro Hukum dan HAM Setda Provinsi Jawa Barat', 'Peraturan Daerah Provinsi Jawa Barat Nomor 12 Tahun 2019 Tentang Perlindungan Dan Pemberdayaan Pembudi Daya Ikan Dan Petambak Garam', NULL, '2025-02-13 01:02:51', '2025-02-13 01:02:51'),
(3, '95 hlm', '-', 'Hukum Tata Negara', 'Mahkamah Agung RI', 'Indonesia', '-', 'PERTANAHAN', 'Mahkamah Agung', 'Putusan Pengadilan', '2024', 'Biro Hukum dan HAM Setda Provinsi Jawa Barat', 'Bandung', '4961', '3 A', 'Bogor (Kabupaten)', 'Peraturan Daerah Kabupaten Bogor Nomor 6 Tahun 2024 Tentang Perusahaan Perseroan Daerah Bank Perekonomian Rakyat Syariah Bogor Tegar Beriman', NULL, '2025-02-17 01:28:46', '2025-02-17 01:28:46'),
(4, '95 hlm', '-', 'Hukum Tata Negara', 'Mahkamah Agung RI', 'Indonesia', '-', 'PERTANAHAN', 'Mahkamah Agung', 'Putusan Pengadilan', '2024', 'Biro Hukum dan HAM Setda Provinsi Jawa Barat', 'Bandung', '4961', '3 A', 'Bogor (Kabupaten)', 'RANCANG BANGUN SISTEM LAYANAN DESA DI KABUPATEN BOGOR', NULL, '2025-02-17 02:39:53', '2025-02-17 02:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peraturan`
--

CREATE TABLE `peraturan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe_dokumen` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `teu_badan` varchar(255) DEFAULT NULL,
  `no_peraturan` varchar(255) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `singkatan_jenis` varchar(255) DEFAULT NULL,
  `tempat_penetapan` varchar(255) DEFAULT NULL,
  `tgl_penetapan` date DEFAULT NULL,
  `tgl_perundangan` varchar(255) DEFAULT NULL,
  `sumber` varchar(255) DEFAULT NULL,
  `subjek` varchar(255) DEFAULT NULL,
  `status_terbit` varchar(255) DEFAULT NULL,
  `status_peraturan` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan_status` varchar(255) DEFAULT NULL,
  `bahasa` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `bidang_hukum` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `file_abstraksi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peraturan`
--

INSERT INTO `peraturan` (`id`, `tipe_dokumen`, `judul`, `teu_badan`, `no_peraturan`, `tahun`, `jenis`, `singkatan_jenis`, `tempat_penetapan`, `tgl_penetapan`, `tgl_perundangan`, `sumber`, `subjek`, `status_terbit`, `status_peraturan`, `status`, `keterangan_status`, `bahasa`, `lokasi`, `bidang_hukum`, `file`, `file_abstraksi`, `created_at`, `updated_at`) VALUES
(1, 'Peraturan Perundang-undangan', 'Peraturan Daerah Kabupaten Bogor Nomor 6 Tahun 2024 Tentang Perusahaan Perseroan Daerah Bank Perekonomian Rakyat Syariah Bogor Tegar Beriman', 'Bogor (Kabupaten)', '6', '2024', 'Peraturan Daerah', 'PERDA', 'Cibinong', '2024-10-03', NULL, 'LD Kabupaten Bogor Tahun 2024 Nomor 6, TLD Kabupaten Bogor Nomor 131', 'BADAN USAHA MILIK DAERAH', NULL, 'Berlaku', NULL, 'Mencabut Peraturan Daerah Kabupaten Bogor Nomor 20 Tahun 2011', 'Indonesia', 'Bagian Perundang-undangan Kab. Bogor', 'Hukum Tata Negara', NULL, NULL, '2025-02-12 23:26:30', '2025-02-12 23:50:36'),
(2, 'Peraturan Perundang-undangan', 'Peraturan Daerah Kabupaten Bogor Nomor 9 Tahun 2023 Tentang Pembentukan Kecamatan', 'Bogor (Kabupaten)', '9', '2023', 'Peraturan Daerah', 'PERDA', 'Cibinong', '2023-12-15', NULL, 'LD Kabupaten Bogor Tahun 2023 Nomor 9, TLD Kabupaten Bogor Tahun 2023 Nomor 124', 'KECAMATAN', NULL, 'Berlaku', NULL, 'Mencabut Peraturan Daerah Kabupaten Bogor Nomor 3 Tahun 2003, Peraturan Pelaksanaan dari Peraturan Daerah Nomor 3 Tahun 2003 masih tetap berlaku sepanjang tidak bertentangan dengan Peraturan Daerah ini', 'Indonesia', 'Bagian Perundang-undangan Kab. Bogor', 'Hukum Tata Negara', NULL, NULL, '2025-02-12 23:28:52', '2025-02-12 23:28:52'),
(3, 'Peraturan Perundang-undangan', 'Peraturan Daerah Kabupaten Bogor Nomor 1 Tahun 2024 Tentang Rencana Tata Ruang Wilayah Kabupaten Bogor Tahun 2024 - 2044', 'Bogor (Kabupaten)', '1', '2024', 'Peraturan Daerah', 'PERDA', 'Cibinong', '2024-05-21', NULL, 'LD Kabupaten Bogor Tahun 2024 Nomor 1 TLD Kabupaten Bogor Tahun 2024 Nomor 128', 'TATA RUANG WILAYAH', NULL, 'Berlaku', NULL, 'Mencabut Pasal 3 dalam Peraturan Daerah Kabupaten Bogor Nomor 7 Tahun 2019 dan Mencabut Peraturan Daerah Kabupaten Bogor Nomor 11 Tahun 2016', 'Indonesia', 'Bagian Perundang-undangan Kab. Bogor', 'Hukum Tata Negara', NULL, NULL, '2025-02-12 23:30:31', '2025-02-12 23:30:31'),
(4, 'dwadawdwa', 'dwadwadaw', 'Bogor (Kabupaten)', '2', '2024', 'Peraturan Daerah', 'PERDA', 'Cibinong', '2025-02-17', NULL, 'Mahkamah Agung', 'BADAN USAHA MILIK DAERAH', NULL, 'Berlaku', NULL, 'keterangan', 'Indonesia', 'Mahkamah Agung RI', 'Hukum Tata Negara', NULL, NULL, '2025-02-17 01:09:06', '2025-02-17 01:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(7, 'create roles', 'web', '2025-02-09 18:31:41', '2025-02-09 18:31:41'),
(8, 'view roles', 'web', '2025-02-09 18:31:49', '2025-02-09 18:31:49'),
(9, 'edit roles', 'web', '2025-02-09 18:31:56', '2025-02-09 18:31:56'),
(10, 'delete roles', 'web', '2025-02-09 18:32:01', '2025-02-09 18:32:01'),
(11, 'view permissions', 'web', '2025-02-09 20:23:11', '2025-02-09 20:23:11'),
(12, 'create permissions', 'web', '2025-02-09 20:23:58', '2025-02-09 20:23:58'),
(13, 'edit permissions', 'web', '2025-02-09 20:24:05', '2025-02-09 20:24:05'),
(14, 'delete permissions', 'web', '2025-02-09 20:24:12', '2025-02-09 20:24:12'),
(19, 'create berita', 'web', '2025-02-10 03:34:41', '2025-02-10 03:34:41'),
(28, 'create warta', 'web', '2025-02-10 20:45:59', '2025-02-10 20:45:59'),
(29, 'view warta', 'web', '2025-02-10 20:45:59', '2025-02-10 20:45:59'),
(30, 'update warta', 'web', '2025-02-10 20:45:59', '2025-02-10 20:45:59'),
(34, 'view slider', 'web', '2025-02-10 20:47:25', '2025-02-10 20:47:25'),
(35, 'update slider', 'web', '2025-02-10 20:47:25', '2025-02-10 20:47:25'),
(36, 'delete slider', 'web', '2025-02-10 20:47:25', '2025-02-10 20:47:25'),
(45, 'create produk hukum', 'web', '2025-02-11 19:30:00', '2025-02-11 19:30:30'),
(46, 'view produk hukum', 'web', '2025-02-11 19:30:00', '2025-02-11 20:10:37'),
(47, 'update produk hukum', 'web', '2025-02-11 19:30:01', '2025-02-11 20:10:48'),
(48, 'delete produk hukum', 'web', '2025-02-11 19:30:01', '2025-02-11 20:10:57'),
(49, 'create articles', 'web', '2025-02-11 20:27:28', '2025-02-11 20:27:28'),
(50, 'view articles', 'web', '2025-02-11 20:27:28', '2025-02-11 20:27:28'),
(51, 'update articles', 'web', '2025-02-11 20:27:28', '2025-02-11 20:27:28'),
(52, 'delete articles', 'web', '2025-02-11 20:27:28', '2025-02-11 20:27:28'),
(53, 'view dokumen', 'web', '2025-02-12 21:24:11', '2025-02-12 21:24:11'),
(54, 'create peraturan', 'web', '2025-02-12 21:29:23', '2025-02-12 21:29:23'),
(55, 'view peraturan', 'web', '2025-02-12 21:29:23', '2025-02-12 21:29:23'),
(56, 'update peraturan', 'web', '2025-02-12 21:29:23', '2025-02-12 21:29:23'),
(57, 'delete peraturan', 'web', '2025-02-12 21:29:23', '2025-02-12 21:29:23'),
(58, 'create monografi hukum', 'web', '2025-02-12 21:29:43', '2025-02-12 21:29:43'),
(59, 'view monografi hukum', 'web', '2025-02-12 21:29:43', '2025-02-12 21:29:43'),
(60, 'update monografi hukum', 'web', '2025-02-12 21:29:43', '2025-02-12 21:29:43'),
(61, 'delete monografi hukum', 'web', '2025-02-12 21:29:43', '2025-02-12 21:29:43'),
(62, 'create artikel', 'web', '2025-02-12 21:30:01', '2025-02-12 21:30:01'),
(63, 'view artikel', 'web', '2025-02-12 21:30:01', '2025-02-12 21:30:01'),
(64, 'update artikel', 'web', '2025-02-12 21:30:01', '2025-02-12 21:30:01'),
(65, 'delete artikel', 'web', '2025-02-12 21:30:01', '2025-02-12 21:30:01'),
(66, 'create yurisprudensi', 'web', '2025-02-12 21:30:12', '2025-02-12 21:30:12'),
(67, 'view yurisprudensi', 'web', '2025-02-12 21:30:12', '2025-02-12 21:30:12'),
(68, 'update yurisprudensi', 'web', '2025-02-12 21:30:12', '2025-02-12 21:30:12'),
(69, 'delete yurisprudensi', 'web', '2025-02-12 21:30:12', '2025-02-12 21:30:12'),
(70, 'create agenda', 'web', '2025-02-13 21:36:25', '2025-02-13 21:36:25'),
(71, 'view agenda', 'web', '2025-02-13 21:36:25', '2025-02-13 21:36:25'),
(72, 'update agenda', 'web', '2025-02-13 21:36:25', '2025-02-13 21:36:25'),
(73, 'delete agenda', 'web', '2025-02-13 21:36:25', '2025-02-13 21:36:25'),
(74, 'view tentang', 'web', '2025-02-13 21:36:57', '2025-02-13 21:36:57'),
(75, 'create sejarah', 'web', '2025-02-13 21:37:12', '2025-02-13 21:37:12'),
(76, 'view sejarah', 'web', '2025-02-13 21:37:12', '2025-02-13 21:37:12'),
(77, 'update sejarah', 'web', '2025-02-13 21:37:12', '2025-02-13 21:37:12'),
(78, 'delete sejarah', 'web', '2025-02-13 21:37:12', '2025-02-13 21:37:12'),
(79, 'create sekapur sirih', 'web', '2025-02-13 21:37:39', '2025-02-13 21:37:39'),
(80, 'view sekapur sirih', 'web', '2025-02-13 21:37:40', '2025-02-13 21:37:40'),
(81, 'update sekapur sirih', 'web', '2025-02-13 21:37:40', '2025-02-13 21:37:40'),
(82, 'delete sekapur sirih', 'web', '2025-02-13 21:37:40', '2025-02-13 21:37:40'),
(83, 'create struktur organisasi', 'web', '2025-02-13 21:37:57', '2025-02-13 21:37:57'),
(84, 'view struktur organisasi', 'web', '2025-02-13 21:37:58', '2025-02-13 21:37:58'),
(85, 'update struktur organisasi', 'web', '2025-02-13 21:37:58', '2025-02-13 21:37:58'),
(86, 'delete struktur organisasi', 'web', '2025-02-13 21:37:58', '2025-02-13 21:37:58'),
(87, 'create visi misi', 'web', '2025-02-13 21:38:17', '2025-02-13 21:38:17'),
(88, 'view visi misi', 'web', '2025-02-13 21:38:17', '2025-02-13 21:38:17'),
(89, 'update visi misi', 'web', '2025-02-13 21:38:17', '2025-02-13 21:38:17'),
(90, 'delete visi misi', 'web', '2025-02-13 21:38:17', '2025-02-13 21:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'web', '2025-02-09 18:32:13', '2025-02-09 19:41:59'),
(4, 'Staff', 'web', '2025-02-09 19:41:14', '2025-02-09 19:41:14'),
(5, 'superadmin', 'web', '2025-02-09 20:54:27', '2025-02-09 20:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(19, 2),
(28, 2),
(29, 2),
(30, 2),
(34, 2),
(35, 2),
(36, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(49, 4),
(50, 2),
(50, 4),
(51, 2),
(51, 4),
(52, 2),
(52, 4),
(53, 2),
(53, 4),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(58, 4),
(59, 2),
(59, 4),
(60, 2),
(60, 4),
(61, 2),
(61, 4),
(62, 2),
(62, 4),
(63, 2),
(63, 4),
(64, 2),
(64, 4),
(65, 2),
(65, 4),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(73, 2),
(74, 2),
(75, 2),
(76, 2),
(77, 2),
(78, 2),
(79, 2),
(80, 2),
(81, 2),
(82, 2),
(83, 2),
(84, 2),
(85, 2),
(86, 2),
(87, 2),
(88, 2),
(89, 2),
(90, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sejarah`
--

CREATE TABLE `sejarah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `text` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sejarah`
--

INSERT INTO `sejarah` (`id`, `judul`, `text`, `created_at`, `updated_at`) VALUES
(1, 'Sejarah JDIH', '<p style=\"margin-left:0px;text-align:justify;\"><strong>Pengertian JDIHN</strong></p><p style=\"margin-left:0px;text-align:justify;\">Berdasarkan Peraturan Presiden Nomor 33 Tahun 2012 tentang Jaringan Dokumentasi Dan Informasi Hukum Nasional, Jaringan Dokumentasi dan Informasi Hukum Nasional yang selanjutnya disingkat&nbsp;JDIHN adalah wadah pendayagunaan bersama atas dokumen hukum secara tertib, terpadu, dan berkesinambungan, serta merupakan sarana pemberian pelayanan informasi hukum secara lengkap, akurat, mudah, dan cepat.</p><p style=\"margin-left:0px;text-align:justify;\"><strong>&nbsp;</strong></p><p style=\"margin-left:0px;text-align:justify;\"><strong>Dasar Hukum JDIH</strong></p><ol><li style=\"text-align:justify;\"><span style=\"color:black;\">Peraturan Presiden Nomor 33 Tahun 2012 tentang Jaringan Dokumentasi dan Informasi Hukum Nasional (Lembaran Negara Republik Indonesia Tahun 2012 Nomor 82);&nbsp;</span></li><li style=\"text-align:justify;\"><span style=\"color:black;\">Peraturan Menteri Dalam Negeri Nomor 2 Tahun 2014 tentang Pengelolaan Jaringan Dokumentasi dan Informasi Hukum Kementerian Dalam Negeri dan Pemerintah Daerah (Berita Negara Republik Indonesia Tahun 2014 Nomor 33);</span></li><li style=\"text-align:justify;\"><span style=\"color:black;\">Peraturan Menteri Hukum dan Hak Asasi Manusia Nomor 8 Tahun 2019 tentang </span>Standar Pengelolaan Dokumen Dan Informasi Hukum;</li><li style=\"text-align:justify;\">Peraturan Bupati Bogor Nomor 46 Tahun 2020 tentang Pengelolaan Jaringan Dokumentasi Dan Informasi Hukum Kabupaten Bogor (Berita Daerah Kabupaten Bogor Tahun 2020 Nomor 47); dan</li><li style=\"text-align:justify;\">Keputusan Bupati Bogor Nomor 100.3.8/383/Kpts/Per-UU/2022 tentang Pembentukan Tim Pengelola Jaringan Dokumentasi dan Informasi Hukum Kabupaten Bogor.</li></ol><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\"><strong>Sekilas tentang&nbsp;JDIH Kabupaten Bogor</strong></p><p style=\"margin-left:0px;text-align:justify;\"><span style=\"color:black;\">JDIH Kabupaten Bogor dibentuk berdasarkan</span><strong> </strong>Peraturan Bupati Bogor Nomor 46 Tahun 2020 tentang Pengelolaan Jaringan Dokumentasi Dan Informasi Hukum Kabupaten Bogor, pada 20 Juli 2020. JDIH Kabupaten Bogor berkedudukan di Bagian Perundang-undangan pada Sekretariat Daerah Kabupaten Bogor, Bagian Perundang-undangaan melakukan pengelolaan JDIH, yang meliputi :</p><ol><li style=\"text-align:justify;\">pengumpulan, pengolahan, penyimpanan, dan penyebarluasan dokumen hukum;</li><li style=\"text-align:justify;\">penataan sistem informasi hukum melalui pemanfaatan teknologi informasi dan komunikasi; dan</li><li style=\"text-align:justify;\">pelayanan informasi hukum.</li></ol><p style=\"margin-left:0px;text-align:justify;\">Pusat JDIH adalah Bagian Perundang-undangan pada Sekretariat Daerah, dan Anggota JDIH terdiri atas Perangkat Daerah dan Desa.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\"><strong>Tujuan JDIH</strong></p><ol><li style=\"text-align:justify;\">menjamin terciptanya pengelolaan dokumentasi dan informasi hukum yang terpadu, berbasis teknologi informasi dan komunikasi yang terintegrasi dengan Instansi Pemerintah, PD dan Desa; dan</li><li style=\"text-align:justify;\">menjamin ketersediaan dokumentasi dan informasi hukum yang lengkap dan akurat, serta dapat diakses secara cepat dan mudah.</li></ol>', '2025-02-16 20:32:36', '2025-02-16 21:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `sekapur_sirih`
--

CREATE TABLE `sekapur_sirih` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `sambutan` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5iq1a02763V7EJFuWbBO28zfE8qjUyJ1W7m6XW9U', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR1VjYTcwMTFnVnY3clJSY05ERWExVDVMNDRRV244RElLYmhHM2ltcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wZXJhdHVyYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1740481449),
('IgehhuauF0X6GGLKiOR9w9mw36e7sW2fO16Hi5Gj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZXJlS0IwckhkTW9xd0lUdE1qdUNUUEkzNmlETXlQRTZjTWpENDRScCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1740481443);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `sub_judul` varchar(255) DEFAULT NULL,
  `judul_tombol` varchar(255) DEFAULT NULL,
  `tombol_url` varchar(255) DEFAULT NULL,
  `penempatan` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `judul`, `sub_judul`, `judul_tombol`, `tombol_url`, `penempatan`, `file`, `created_at`, `updated_at`) VALUES
(6, 'DPRD', 'ini DPRD', NULL, NULL, 'Header', NULL, '2025-02-24 04:30:01', '2025-02-24 04:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `urutan` tinyint(1) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id`, `nama`, `jabatan`, `urutan`, `file`, `created_at`, `updated_at`) VALUES
(1, 'dwadawdaw', 'dwadwadwa', 2, NULL, '2025-02-14 03:03:27', '2025-02-14 03:03:27'),
(2, 'ADI MULYADI, S.H.,M.H.', 'Kepala Bagian Perundang-Undangan (KETUA)', 4, NULL, '2025-02-16 21:51:30', '2025-02-16 21:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin_dprd', 'dprd@gmail.com', NULL, '$2y$12$6A.43Deg6TumMDFbAa..u.Q0zfoYPzf7ZZCg55elXLYWUmmkrR1HS', 'orrU1BQQiQSqBiCVDjvBqCTyedHBb2TdenqUGF1sgpgKtlvEVBmEvdVPdCMm', '2025-02-07 00:46:20', '2025-02-07 00:46:20'),
(2, NULL, 'jdih kabupaten bogor', 'jdih@gmail.com', NULL, '$2y$12$X7WdWbU9rl4uPIe.mZrR3.ALS6TH2lSCBXPUKs6Z7i2k9nMfX.uni', NULL, '2025-02-07 01:51:58', '2025-02-07 01:51:58'),
(3, NULL, 'Superadmin', 'superadmin@gmail.com', NULL, '$2y$12$sbEKjoO.9wlp.sNlSogaKuNQ7iow3VngEntkymSwfWBK2tG2Gk6Pm', NULL, '2025-02-09 20:56:19', '2025-02-09 20:56:19'),
(4, NULL, 'Brilianto', 'brilianto@gmail.com', NULL, '$2y$12$EtkOli2Ahs3m06GzJvNXt.AmlGNlrgmYVcvFEaTncASjn74TNC48a', NULL, '2025-02-09 21:20:03', '2025-02-09 21:20:03'),
(5, NULL, 'Rian', 'rian@gmail.com', NULL, '$2y$12$.XRu1bCyK5t3.x/RxNUEJesxMpb73doqhfW0C5/3zUR0.uC7viA4K', NULL, '2025-02-09 21:21:16', '2025-02-09 21:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visi` varchar(255) DEFAULT NULL,
  `misi` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `yurisprudensi`
--

CREATE TABLE `yurisprudensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `teu_badan` varchar(255) DEFAULT NULL,
  `nomor_putusan` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `jenis_perkara` varchar(255) DEFAULT NULL,
  `singkatan_jenis_peradilan` varchar(255) DEFAULT NULL,
  `jenis_peradilan` varchar(255) DEFAULT NULL,
  `singkatan_jenis` varchar(255) DEFAULT NULL,
  `tempat_peradilan` varchar(255) DEFAULT NULL,
  `tempat_terbit` varchar(255) DEFAULT NULL,
  `tanggal_penetapan` date DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `sumber` varchar(255) DEFAULT NULL,
  `subjek` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `bahasa` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `bidang_hukum` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yurisprudensi`
--

INSERT INTO `yurisprudensi` (`id`, `tipe`, `judul`, `teu_badan`, `nomor_putusan`, `jenis`, `jenis_perkara`, `singkatan_jenis_peradilan`, `jenis_peradilan`, `singkatan_jenis`, `tempat_peradilan`, `tempat_terbit`, `tanggal_penetapan`, `tahun_terbit`, `sumber`, `subjek`, `status`, `bahasa`, `lokasi`, `bidang_hukum`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Putusan Pengadilan', 'Putusan Mahkamah Agung Nomor 69 K/TUN/2024 Tentang Perkara Antara KEPALA KANTOR PERTANAHAN KABUPATEN BOGOR II DKK Melawan HORMAT HASIBUAN', 'Mahkamah Agung (Jakarta)', '69 K/TUN/2024', 'Putusan Pengadilan', 'Agraria', 'MA', 'Mahkamah Agung', '-', 'Jakarta', '-', '2024-03-14', '2024', 'Mahkamah Agung', 'PERTANAHAN', 'Berlaku', 'Indonesia', 'Mahkamah Agung RI', '-', NULL, '2025-02-13 02:25:55', '2025-02-13 02:31:36'),
(2, 'Putusan Pengadilan', 'RANCANG BANGUN SISTEM LAYANAN DESA DI KABUPATEN BOGOR', 'Bogor (Kabupaten)', '69 K/TUN/2024', 'Peraturan Daerah', 'Agraria', 'MA', 'Mahkamah Agung', 'PERDA', 'Jakarta', '-', '2024-03-14', '2024', 'Mahkamah Agung', 'PERTANAHAN', 'Berlaku', 'Indonesia', 'Mahkamah Agung RI', 'Hukum Tata Negara', NULL, '2025-02-13 02:27:35', '2025-02-13 02:27:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agenda_kegiatan`
--
ALTER TABLE `agenda_kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agenda_kegiatan_agenda_id_foreign` (`agenda_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles_category`
--
ALTER TABLE `articles_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_category_articles_id_foreign` (`articles_id`),
  ADD KEY `articles_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infografis`
--
ALTER TABLE `infografis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `monografi_hukum`
--
ALTER TABLE `monografi_hukum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `peraturan`
--
ALTER TABLE `peraturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sejarah`
--
ALTER TABLE `sejarah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekapur_sirih`
--
ALTER TABLE `sekapur_sirih`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_role_id_foreign` (`user_role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yurisprudensi`
--
ALTER TABLE `yurisprudensi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agenda_kegiatan`
--
ALTER TABLE `agenda_kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `articles_category`
--
ALTER TABLE `articles_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `infografis`
--
ALTER TABLE `infografis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `monografi_hukum`
--
ALTER TABLE `monografi_hukum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peraturan`
--
ALTER TABLE `peraturan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sejarah`
--
ALTER TABLE `sejarah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sekapur_sirih`
--
ALTER TABLE `sekapur_sirih`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yurisprudensi`
--
ALTER TABLE `yurisprudensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agenda_kegiatan`
--
ALTER TABLE `agenda_kegiatan`
  ADD CONSTRAINT `agenda_kegiatan_agenda_id_foreign` FOREIGN KEY (`agenda_id`) REFERENCES `agenda` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `articles_category`
--
ALTER TABLE `articles_category`
  ADD CONSTRAINT `articles_category_articles_id_foreign` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_role_id_foreign` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
