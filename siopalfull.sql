/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.11-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: siopal_udinus2
-- ------------------------------------------------------
-- Server version	10.11.11-MariaDB-0ubuntu0.24.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `barang_keluar`
--

DROP TABLE IF EXISTS `barang_keluar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `barang_keluar` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_inventaris` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `laboratorium_id` bigint(20) unsigned NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `barang_keluar_laboratorium_id_foreign` (`laboratorium_id`),
  CONSTRAINT `barang_keluar_laboratorium_id_foreign` FOREIGN KEY (`laboratorium_id`) REFERENCES `laboratoria` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang_keluar`
--

LOCK TABLES `barang_keluar` WRITE;
/*!40000 ALTER TABLE `barang_keluar` DISABLE KEYS */;
/*!40000 ALTER TABLE `barang_keluar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barang_masuk`
--

DROP TABLE IF EXISTS `barang_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `barang_masuk` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_inventaris` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `laboratorium_id` bigint(20) unsigned NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `barang_masuk_laboratorium_id_foreign` (`laboratorium_id`),
  CONSTRAINT `barang_masuk_laboratorium_id_foreign` FOREIGN KEY (`laboratorium_id`) REFERENCES `laboratoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang_masuk`
--

LOCK TABLES `barang_masuk` WRITE;
/*!40000 ALTER TABLE `barang_masuk` DISABLE KEYS */;
INSERT INTO `barang_masuk` VALUES
(1,'BM/D2A/2025/07/001','Mic Kabel',1,'2025-07-21',3,'Mic Dari D2B','2025-07-21 05:26:16','2025-07-21 05:26:16');
/*!40000 ALTER TABLE `barang_masuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES
('laravel_cache_356a192b7913b04c54574d18c28d46e6395428ab','i:1;',1778771724),
('laravel_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer','i:1778771724;',1778771724),
('laravel_cache_livewire-rate-limiter:056fc329aaaa757d31db450f525da23fde4d1b36','i:1;',1780321662),
('laravel_cache_livewire-rate-limiter:056fc329aaaa757d31db450f525da23fde4d1b36:timer','i:1780321662;',1780321662);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_software`
--

DROP TABLE IF EXISTS `course_software`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_software` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) unsigned NOT NULL,
  `software_detail_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_software_course_id_foreign` (`course_id`),
  KEY `course_software_software_detail_id_foreign` (`software_detail_id`),
  CONSTRAINT `course_software_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `course_software_software_detail_id_foreign` FOREIGN KEY (`software_detail_id`) REFERENCES `software_details` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_software`
--

LOCK TABLES `course_software` WRITE;
/*!40000 ALTER TABLE `course_software` DISABLE KEYS */;
INSERT INTO `course_software` VALUES
(6,9,47,NULL,NULL),
(7,9,49,NULL,NULL),
(8,9,13,NULL,NULL),
(9,9,15,NULL,NULL),
(10,9,9,NULL,NULL),
(11,9,12,NULL,NULL),
(12,10,17,NULL,NULL),
(13,10,45,NULL,NULL),
(14,10,16,NULL,NULL),
(15,10,18,NULL,NULL),
(16,32,17,NULL,NULL),
(17,32,16,NULL,NULL),
(18,32,18,NULL,NULL),
(28,13,28,NULL,NULL),
(29,13,26,NULL,NULL),
(30,13,27,NULL,NULL),
(32,22,28,NULL,NULL),
(33,22,26,NULL,NULL),
(34,22,27,NULL,NULL),
(35,14,35,NULL,NULL),
(36,14,32,NULL,NULL),
(37,14,26,NULL,NULL),
(38,25,35,NULL,NULL),
(39,25,26,NULL,NULL),
(40,25,30,NULL,NULL),
(41,17,35,NULL,NULL),
(42,17,32,NULL,NULL),
(43,17,26,NULL,NULL),
(44,17,27,NULL,NULL),
(45,23,32,NULL,NULL),
(46,23,33,NULL,NULL),
(47,23,31,NULL,NULL),
(48,24,28,NULL,NULL),
(49,24,26,NULL,NULL),
(50,24,27,NULL,NULL),
(51,26,28,NULL,NULL),
(52,26,26,NULL,NULL),
(53,26,27,NULL,NULL),
(54,26,29,NULL,NULL),
(55,21,33,NULL,NULL),
(58,27,39,NULL,NULL),
(59,27,38,NULL,NULL),
(60,27,31,NULL,NULL),
(61,28,35,NULL,NULL),
(62,28,32,NULL,NULL),
(63,28,31,NULL,NULL),
(64,29,35,NULL,NULL),
(65,29,26,NULL,NULL),
(66,29,27,NULL,NULL),
(67,19,35,NULL,NULL),
(68,19,36,NULL,NULL),
(69,18,35,NULL,NULL),
(71,18,36,NULL,NULL),
(74,20,36,NULL,NULL),
(75,30,42,NULL,NULL),
(76,30,41,NULL,NULL),
(77,30,40,NULL,NULL),
(78,30,43,NULL,NULL),
(79,15,35,NULL,NULL),
(82,31,32,NULL,NULL),
(83,31,44,NULL,NULL),
(85,33,49,NULL,NULL),
(86,33,13,NULL,NULL),
(87,33,15,NULL,NULL),
(88,33,9,NULL,NULL),
(89,33,12,NULL,NULL),
(90,34,10,NULL,NULL),
(91,34,24,NULL,NULL),
(92,34,49,NULL,NULL),
(93,34,9,NULL,NULL),
(94,35,9,NULL,NULL),
(95,36,9,NULL,NULL),
(96,4,9,NULL,NULL),
(97,37,16,NULL,NULL),
(98,38,9,NULL,NULL),
(99,39,9,NULL,NULL),
(100,40,9,NULL,NULL),
(101,44,4,NULL,NULL);
/*!40000 ALTER TABLE `course_software` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `sks` int(11) NOT NULL,
  `jumlah_mahasiswa` int(11) NOT NULL DEFAULT 0,
  `prodi_id` bigint(20) unsigned DEFAULT NULL,
  `software_requirements` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`software_requirements`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `courses_code_unique` (`code`),
  KEY `courses_prodi_id_foreign` (`prodi_id`),
  CONSTRAINT `courses_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodis` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES
(4,' A11.64404','Pemrograman Web Lanjut',2,0,1,NULL,'2026-01-17 00:38:25','2026-01-25 00:45:56'),
(9,'A12.76404','Pemrograman Web Lanjut',2,0,3,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(10,'A12.76603','Manajemen Basis Data',2,0,3,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(11,'A14.37203','Grafis Komputer',2,0,4,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(12,'A14.37407','Reprografika',2,0,4,NULL,'2026-01-24 00:59:24','2026-01-25 00:51:55'),
(13,'A14.37406','Pemodelan 3D',4,0,4,NULL,'2026-01-24 00:59:24','2026-01-25 01:28:47'),
(14,'A14.37602','Grafis Bergerak',2,0,4,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(15,'A14.37603','Proyek Konten Kreatif',2,0,4,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(16,'A14.37605','Proyek Desain Kemasan',2,0,4,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(17,'A14.37606','Proyek Animasi',2,0,4,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(18,'A15.21404','Digital Storytelling',2,0,2,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(19,'A16.22003','Video Editing',2,0,5,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(20,'A16.4105','Tata Suara Pemutaran Film',2,0,5,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(21,'A17.1B115','Ilustrasi',2,0,6,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(22,'A17.1B117','Pemodelan 3D I',2,0,6,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(23,'A17.1B218','Animasi 2D I',2,0,6,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(24,'A17.1B316','Animasi 3D I',2,0,6,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(25,'A17.1B319','Grafika Gerak',2,0,6,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(26,'A17.1B408','Animasi 3D II',2,0,6,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(27,'A17.1B416','Rigging 2D',2,0,6,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(28,'A17.1B418','Efek Visual 2D',2,0,6,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(29,'A17.1B419','Efek Visual 3D',2,0,6,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(30,'A17.1B613','Kecerdasan Artifisial Kreatif',2,0,6,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(31,'A22.63206','Multimedia',2,0,7,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(32,'A22.63207','Basis Data',2,0,7,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(33,'A22.63233','Proyek Aplikasi Web I',2,0,7,NULL,'2026-01-24 00:59:24','2026-01-24 00:59:24'),
(34,'A22.63417','Proyek Aplikasi Mobile II',2,0,7,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(35,' A11.64204','Algoritma Dan Struktur Data',2,0,1,NULL,'2026-01-25 00:44:18','2026-01-25 00:44:18'),
(36,' A11.64403','Pemrograman Berorientasi Objek',2,0,1,NULL,'2026-01-25 00:45:02','2026-01-25 00:45:02'),
(37,' A11.64406','Sistem Basis Data',2,0,1,NULL,'2026-01-25 00:46:36','2026-01-25 00:46:36'),
(38,' A11.64706','Pemrograman Sisi Klien',3,0,1,NULL,'2026-01-25 00:47:06','2026-01-25 01:30:10'),
(39,' A11.64707','Pemrograman Sisi Server',3,0,1,NULL,'2026-01-25 00:48:09','2026-01-25 01:29:59'),
(40,' A11.64710','Pemrograman Game',3,0,1,NULL,'2026-01-25 00:48:40','2026-01-25 01:32:08'),
(44,'A14.37402','Desain Web',2,0,4,NULL,'2026-01-25 00:50:29','2026-01-25 00:52:54');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `d_v_d_s`
--

DROP TABLE IF EXISTS `d_v_d_s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `d_v_d_s` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_inventaris` varchar(255) NOT NULL,
  `dvd` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` tinyint(4) NOT NULL,
  `stok` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `d_v_d_s_no_inventaris_unique` (`no_inventaris`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `d_v_d_s`
--

LOCK TABLES `d_v_d_s` WRITE;
/*!40000 ALTER TABLE `d_v_d_s` DISABLE KEYS */;
INSERT INTO `d_v_d_s` VALUES
(1,'LABKOM/DVD/001/2025','DVD RW','LG','SATA, 24x Write Speed',2025,9,20,NULL,NULL),
(2,'LABKOM/DVD/002/2024','DVD RW','Asus','SATA, 24x Write Speed, M-DISC Support',2024,4,8,NULL,NULL),
(3,'LABKOM/DVD/003/2023','DVD ROM','Samsung','SATA, 16x Read Speed',2023,4,8,NULL,NULL),
(4,'LABKOM/DVD/004/2025','DVD RW','Lite-On','SATA, 24x Write Speed',2025,12,20,NULL,NULL),
(5,'LABKOM/DVD/005/2024','DVD RW External USB','Transcend','USB 2.0, Slim Portable',2024,4,8,NULL,NULL),
(6,'LABKOM/DVD/006/2023','DVD RW','HP','SATA, 24x Write Speed',2023,6,9,NULL,NULL),
(7,'LABKOM/DVD/007/2025','DVD RW','Pioneer','SATA, 24x Write Speed',2025,11,10,NULL,NULL),
(8,'LABKOM/DVD/008/2024','DVD RW External USB','LG','USB 2.0, Slim Portable, M-DISC Support',2024,3,3,NULL,NULL),
(9,'LABKOM/DVD/009/2023','DVD RW','Generic OEM','SATA, 24x Write Speed',2023,9,28,NULL,NULL),
(10,'LABKOM/DVD/010/2025','Blu-ray ROM (Internal)','LG','SATA, Reads Blu-ray, DVD, CD',2025,1,5,NULL,NULL);
/*!40000 ALTER TABLE `d_v_d_s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `headphones`
--

DROP TABLE IF EXISTS `headphones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `headphones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_inventaris` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` tinyint(4) NOT NULL,
  `stok` int(10) unsigned NOT NULL DEFAULT 0,
  `full_name` varchar(255) GENERATED ALWAYS AS (concat(`merk`,'-',`nama`)) VIRTUAL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `headphones_no_inventaris_unique` (`no_inventaris`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `headphones`
--

LOCK TABLES `headphones` WRITE;
/*!40000 ALTER TABLE `headphones` DISABLE KEYS */;
INSERT INTO `headphones` VALUES
(1,'LABKOM/HP/001/2025','Logitech','H111 Stereo Headset','Stereo, Noise-canceling microphone, 3.5mm audio jack',2025,9,23,'Logitech-H111 Stereo Headset',NULL,NULL),
(2,'LABKOM/HP/002/2024','A4Tech','HS-19 Stereo','Stereo, Adjustable microphone, Comfortable earcups',2024,12,24,'A4Tech-HS-19 Stereo',NULL,NULL),
(3,'LABKOM/HP/003/2025','Rexus','Vonix F22','Gaming Headset, LED, 3.5mm jack',2025,1,14,'Rexus-Vonix F22',NULL,NULL),
(4,'LABKOM/HP/004/2024','Philips','SHP2000','Over-ear, Lightweight, 2m cable',2024,12,10,'Philips-SHP2000',NULL,NULL),
(5,'LABKOM/HP/005/2025','JBL','C100SI (In-Ear)','In-ear, Lightweight, JBL Pure Bass sound',2025,10,26,'JBL-C100SI (In-Ear)',NULL,NULL),
(6,'LABKOM/HP/006/2024','Sony','MDR-ZX110AP','On-Ear, Foldable, Inline microphone',2024,3,13,'Sony-MDR-ZX110AP',NULL,NULL),
(7,'LABKOM/HP/007/2025','Fantech','HG15 Captain','Gaming Headset, RGB, USB + 3.5mm jack',2025,11,18,'Fantech-HG15 Captain',NULL,NULL),
(8,'LABKOM/HP/008/2024','Sennheiser','PC 3 Chat','Lightweight, Noise-canceling microphone, Stereo',2024,9,13,'Sennheiser-PC 3 Chat',NULL,NULL),
(9,'LABKOM/HP/009/2025','Edifier','K800 USB','USB Connector, Padded earcups, Microphone',2025,6,19,'Edifier-K800 USB',NULL,NULL),
(10,'LABKOM/HP/010/2024','Genius','HS-04SU','Adjustable Headband, Noise-canceling mic, Stereo',2024,7,15,'Genius-HS-04SU',NULL,NULL);
/*!40000 ALTER TABLE `headphones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventories`
--

DROP TABLE IF EXISTS `inventories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `laboratorium_id` bigint(20) unsigned NOT NULL,
  `kode_inventaris` varchar(255) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `kondisi` enum('Baik','Rusak Ringan','Rusak Berat','Dalam Perbaikan') NOT NULL DEFAULT 'Baik',
  `tanggal_pengadaan` date DEFAULT NULL,
  `inventoriable_id` bigint(20) unsigned NOT NULL,
  `inventoriable_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inventories_kode_inventaris_unique` (`kode_inventaris`),
  KEY `inventories_laboratorium_id_foreign` (`laboratorium_id`),
  KEY `inventories_inventoriable_id_inventoriable_type_index` (`inventoriable_id`,`inventoriable_type`),
  CONSTRAINT `inventories_laboratorium_id_foreign` FOREIGN KEY (`laboratorium_id`) REFERENCES `laboratoria` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventories`
--

LOCK TABLES `inventories` WRITE;
/*!40000 ALTER TABLE `inventories` DISABLE KEYS */;
INSERT INTO `inventories` VALUES
(1,3,'UDN/LABKOM/INV/D2A/PC01',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:15:52','2025-07-21 05:15:52'),
(2,3,'UDN/LABKOM/INV/D2A/PC02',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:15:57','2025-07-21 05:15:57'),
(3,3,'UDN/LABKOM/INV/D2A/PC03',NULL,'Dalam Perbaikan',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:16:03','2025-07-21 18:39:58'),
(4,3,'UDN/LABKOM/INV/D2A/PC04',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:16:13','2025-07-21 05:16:13'),
(5,3,'UDN/LABKOM/INV/D2A/PC05',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:16:16','2025-07-21 05:16:16'),
(6,3,'UDN/LABKOM/INV/D2A/PC06',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:16:19','2025-07-21 05:16:19'),
(7,3,'UDN/LABKOM/INV/D2A/PC07',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:16:22','2025-07-21 05:16:22'),
(8,3,'UDN/LABKOM/INV/D2A/PC08',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:16:26','2025-07-21 05:16:26'),
(9,3,'UDN/LABKOM/INV/D2A/PC09',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:16:29','2025-07-21 05:16:29'),
(10,3,'UDN/LABKOM/INV/D2A/PC10',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:16:42','2025-07-21 05:16:42'),
(11,3,'UDN/LABKOM/INV/D2A/PC11',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:16:46','2025-07-21 05:16:46'),
(12,3,'UDN/LABKOM/INV/D2A/PC12',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:16:51','2025-07-21 05:16:51'),
(13,3,'UDN/LABKOM/INV/D2A/PC13',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:16:56','2025-07-21 05:16:56'),
(14,3,'UDN/LABKOM/INV/D2A/PC14',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:17:00','2025-07-21 05:17:00'),
(15,3,'UDN/LABKOM/INV/D2A/PC15',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:17:04','2025-07-21 05:17:04'),
(16,3,'UDN/LABKOM/INV/D2A/PC16',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:17:08','2025-07-21 05:17:08'),
(17,3,'UDN/LABKOM/INV/D2A/PC17',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:17:12','2025-07-21 05:17:12'),
(18,3,'UDN/LABKOM/INV/D2A/PC18',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:17:17','2025-07-21 05:17:17'),
(19,3,'UDN/LABKOM/INV/D2A/PC19',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:17:21','2025-07-21 05:17:21'),
(20,3,'UDN/LABKOM/INV/D2A/PC20',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 05:17:25','2025-07-21 05:17:25'),
(21,3,'UDN/LABKOM/INV/NON-PC/D2A/01','Kursi','Baik',NULL,1,'App\\Models\\NonPCDetail','2025-07-21 05:19:02','2025-07-21 05:19:02'),
(24,3,'UDN/LABKOM/INV/D2A/PC21',NULL,'Baik',NULL,2,'App\\Models\\PCDetail','2025-07-21 18:38:17','2025-07-21 18:38:17'),
(25,3,'UDN/LABKOM/INV/D2A/PC22',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 18:38:53','2025-07-21 18:38:53'),
(26,3,'UDN/LABKOM/INV/D2A/PC23',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 18:39:03','2025-07-21 18:39:03'),
(27,3,'UDN/LABKOM/INV/D2A/PC24',NULL,'Baik',NULL,1,'App\\Models\\PCDetail','2025-07-21 18:39:10','2025-07-21 18:39:10'),
(31,4,'UDN/LABKOM/INV/SOFTWARE/D2B/01','Adobe Premiere Pro','Baik',NULL,4,'App\\Models\\SoftwareDetail','2026-01-17 00:50:32','2026-01-17 00:50:32'),
(32,3,'UDN/LABKOM/INV/SOFTWARE/D2A/04','NeoVim','Baik',NULL,5,'App\\Models\\SoftwareDetail','2026-01-17 00:52:34','2026-01-17 00:52:34'),
(33,5,'UDN/LABKOM/INV/SOFTWARE/D2C/01','Adobe Premiere Pro','Baik',NULL,4,'App\\Models\\SoftwareDetail','2026-01-17 07:09:43','2026-01-17 07:09:43'),
(34,5,'UDN/LABKOM/INV/SOFTWARE/D2C/02','NeoVim','Baik',NULL,5,'App\\Models\\SoftwareDetail','2026-01-17 07:09:52','2026-01-17 07:09:52'),
(35,9,'UDN/LABKOM/INV/SOFTWARE/D2G/01','NeoVim','Baik',NULL,5,'App\\Models\\SoftwareDetail','2026-01-17 07:11:10','2026-01-17 07:11:10'),
(36,15,'UDN/LABKOM/INV/SOFTWARE/D3M/01','Microsoft Word','Baik',NULL,8,'App\\Models\\SoftwareDetail','2026-01-17 07:12:33','2026-01-17 07:12:33'),
(37,3,'UDN/LABKOM/INV/SOFTWARE/D2A/05','Visual Studio Code','Baik',NULL,9,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(38,3,'UDN/LABKOM/INV/SOFTWARE/D2A/06','Google Chrome','Baik',NULL,47,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(39,3,'UDN/LABKOM/INV/SOFTWARE/D2A/07','Mozilla Firefox','Baik',NULL,48,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(40,3,'UDN/LABKOM/INV/SOFTWARE/D2A/08','Git','Baik',NULL,49,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(44,3,'UDN/LABKOM/INV/SOFTWARE/D2A/12','Figma','Baik',NULL,24,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(45,3,'UDN/LABKOM/INV/SOFTWARE/D2A/13','Blender','Baik',NULL,26,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(46,3,'UDN/LABKOM/INV/SOFTWARE/D2A/14','Autodesk Maya','Baik',NULL,27,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(47,3,'UDN/LABKOM/INV/SOFTWARE/D2A/15','3ds Max','Baik',NULL,28,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(52,4,'UDN/LABKOM/INV/SOFTWARE/D2B/02','Visual Studio Code','Baik',NULL,9,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(53,4,'UDN/LABKOM/INV/SOFTWARE/D2B/03','Google Chrome','Baik',NULL,47,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(54,4,'UDN/LABKOM/INV/SOFTWARE/D2B/04','Mozilla Firefox','Baik',NULL,48,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(55,4,'UDN/LABKOM/INV/SOFTWARE/D2B/05','Git','Baik',NULL,49,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(56,4,'UDN/LABKOM/INV/SOFTWARE/D2B/06','Adobe Photoshop','Baik',NULL,22,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(57,4,'UDN/LABKOM/INV/SOFTWARE/D2B/07','Adobe Illustrator','Baik',NULL,23,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(58,4,'UDN/LABKOM/INV/SOFTWARE/D2B/08','CorelDRAW','Baik',NULL,25,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(59,4,'UDN/LABKOM/INV/SOFTWARE/D2B/09','Figma','Baik',NULL,24,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(60,4,'UDN/LABKOM/INV/SOFTWARE/D2B/10','Blender','Baik',NULL,26,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(62,4,'UDN/LABKOM/INV/SOFTWARE/D2B/12','3ds Max','Baik',NULL,28,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(63,4,'UDN/LABKOM/INV/SOFTWARE/D2B/13','Adobe Animate','Baik',NULL,32,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(64,4,'UDN/LABKOM/INV/SOFTWARE/D2B/14','Adobe After Effects','Baik',NULL,35,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(65,4,'UDN/LABKOM/INV/SOFTWARE/D2B/15','DaVinci Resolve','Baik',NULL,36,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(66,4,'UDN/LABKOM/INV/SOFTWARE/D2B/16','Adobe Audition','Baik',NULL,37,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(67,5,'UDN/LABKOM/INV/SOFTWARE/D2C/03','Visual Studio Code','Baik',NULL,9,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(68,5,'UDN/LABKOM/INV/SOFTWARE/D2C/04','Google Chrome','Baik',NULL,47,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(69,5,'UDN/LABKOM/INV/SOFTWARE/D2C/05','Mozilla Firefox','Baik',NULL,48,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(70,5,'UDN/LABKOM/INV/SOFTWARE/D2C/06','Git','Baik',NULL,49,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(71,5,'UDN/LABKOM/INV/SOFTWARE/D2C/07','Adobe Photoshop','Baik',NULL,22,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(72,5,'UDN/LABKOM/INV/SOFTWARE/D2C/08','Adobe Illustrator','Baik',NULL,23,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(73,5,'UDN/LABKOM/INV/SOFTWARE/D2C/09','CorelDRAW','Baik',NULL,25,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(74,5,'UDN/LABKOM/INV/SOFTWARE/D2C/10','Figma','Baik',NULL,24,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(75,5,'UDN/LABKOM/INV/SOFTWARE/D2C/11','Blender','Baik',NULL,26,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(76,5,'UDN/LABKOM/INV/SOFTWARE/D2C/12','Autodesk Maya','Baik',NULL,27,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(77,5,'UDN/LABKOM/INV/SOFTWARE/D2C/13','3ds Max','Baik',NULL,28,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(78,5,'UDN/LABKOM/INV/SOFTWARE/D2C/14','Adobe Animate','Baik',NULL,32,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(79,5,'UDN/LABKOM/INV/SOFTWARE/D2C/15','Adobe After Effects','Baik',NULL,35,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(80,5,'UDN/LABKOM/INV/SOFTWARE/D2C/16','DaVinci Resolve','Baik',NULL,36,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(81,5,'UDN/LABKOM/INV/SOFTWARE/D2C/17','Adobe Audition','Baik',NULL,37,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(82,6,'UDN/LABKOM/INV/SOFTWARE/D2D/01','Visual Studio Code','Baik',NULL,9,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(83,6,'UDN/LABKOM/INV/SOFTWARE/D2D/02','Google Chrome','Baik',NULL,47,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(84,6,'UDN/LABKOM/INV/SOFTWARE/D2D/03','Mozilla Firefox','Baik',NULL,48,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(85,6,'UDN/LABKOM/INV/SOFTWARE/D2D/04','Git','Baik',NULL,49,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(86,6,'UDN/LABKOM/INV/SOFTWARE/D2D/05','Blender','Baik',NULL,26,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(87,6,'UDN/LABKOM/INV/SOFTWARE/D2D/06','Autodesk Maya','Baik',NULL,27,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(88,6,'UDN/LABKOM/INV/SOFTWARE/D2D/07','3ds Max','Baik',NULL,28,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(89,6,'UDN/LABKOM/INV/SOFTWARE/D2D/08','ZBrush','Baik',NULL,29,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(90,6,'UDN/LABKOM/INV/SOFTWARE/D2D/09','Cinema 4D','Baik',NULL,30,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(91,6,'UDN/LABKOM/INV/SOFTWARE/D2D/10','Toon Boom Harmony','Baik',NULL,31,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(92,6,'UDN/LABKOM/INV/SOFTWARE/D2D/11','Adobe Animate','Baik',NULL,32,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(93,6,'UDN/LABKOM/INV/SOFTWARE/D2D/12','Clip Studio Paint','Baik',NULL,33,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(94,6,'UDN/LABKOM/INV/SOFTWARE/D2D/13','Spine','Baik',NULL,38,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(95,6,'UDN/LABKOM/INV/SOFTWARE/D2D/14','DragonBones','Baik',NULL,39,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(96,6,'UDN/LABKOM/INV/SOFTWARE/D2D/15','Adobe After Effects','Baik',NULL,35,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(97,6,'UDN/LABKOM/INV/SOFTWARE/D2D/16','Adobe Photoshop','Baik',NULL,22,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(98,6,'UDN/LABKOM/INV/SOFTWARE/D2D/17','Adobe Illustrator','Baik',NULL,23,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(99,7,'UDN/LABKOM/INV/SOFTWARE/D2E/01','Visual Studio Code','Baik',NULL,9,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(100,7,'UDN/LABKOM/INV/SOFTWARE/D2E/02','Google Chrome','Baik',NULL,47,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(101,7,'UDN/LABKOM/INV/SOFTWARE/D2E/03','Mozilla Firefox','Baik',NULL,48,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(102,7,'UDN/LABKOM/INV/SOFTWARE/D2E/04','Git','Baik',NULL,49,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(103,7,'UDN/LABKOM/INV/SOFTWARE/D2E/05','Blender','Baik',NULL,26,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(104,7,'UDN/LABKOM/INV/SOFTWARE/D2E/06','Autodesk Maya','Baik',NULL,27,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(105,7,'UDN/LABKOM/INV/SOFTWARE/D2E/07','3ds Max','Baik',NULL,28,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(106,7,'UDN/LABKOM/INV/SOFTWARE/D2E/08','ZBrush','Baik',NULL,29,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(107,7,'UDN/LABKOM/INV/SOFTWARE/D2E/09','Cinema 4D','Baik',NULL,30,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(108,7,'UDN/LABKOM/INV/SOFTWARE/D2E/10','Toon Boom Harmony','Baik',NULL,31,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(109,7,'UDN/LABKOM/INV/SOFTWARE/D2E/11','Adobe Animate','Baik',NULL,32,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(110,7,'UDN/LABKOM/INV/SOFTWARE/D2E/12','Clip Studio Paint','Baik',NULL,33,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(111,7,'UDN/LABKOM/INV/SOFTWARE/D2E/13','Spine','Baik',NULL,38,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(112,7,'UDN/LABKOM/INV/SOFTWARE/D2E/14','DragonBones','Baik',NULL,39,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(113,7,'UDN/LABKOM/INV/SOFTWARE/D2E/15','Adobe After Effects','Baik',NULL,35,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(114,7,'UDN/LABKOM/INV/SOFTWARE/D2E/16','Adobe Photoshop','Baik',NULL,22,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(115,7,'UDN/LABKOM/INV/SOFTWARE/D2E/17','Adobe Illustrator','Baik',NULL,23,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(116,9,'UDN/LABKOM/INV/SOFTWARE/D2G/02','Visual Studio Code','Baik',NULL,9,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(117,9,'UDN/LABKOM/INV/SOFTWARE/D2G/03','Google Chrome','Baik',NULL,47,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(118,9,'UDN/LABKOM/INV/SOFTWARE/D2G/04','Mozilla Firefox','Baik',NULL,48,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(119,9,'UDN/LABKOM/INV/SOFTWARE/D2G/05','Git','Baik',NULL,49,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(120,9,'UDN/LABKOM/INV/SOFTWARE/D2G/06','Adobe Photoshop','Baik',NULL,22,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(121,9,'UDN/LABKOM/INV/SOFTWARE/D2G/07','Adobe Illustrator','Baik',NULL,23,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(122,9,'UDN/LABKOM/INV/SOFTWARE/D2G/08','CorelDRAW','Baik',NULL,25,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(123,9,'UDN/LABKOM/INV/SOFTWARE/D2G/09','Figma','Baik',NULL,24,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(124,9,'UDN/LABKOM/INV/SOFTWARE/D2G/10','Blender','Baik',NULL,26,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(125,9,'UDN/LABKOM/INV/SOFTWARE/D2G/11','Autodesk Maya','Baik',NULL,27,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(126,9,'UDN/LABKOM/INV/SOFTWARE/D2G/12','3ds Max','Baik',NULL,28,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(127,9,'UDN/LABKOM/INV/SOFTWARE/D2G/13','Adobe Animate','Baik',NULL,32,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(128,9,'UDN/LABKOM/INV/SOFTWARE/D2G/14','Adobe After Effects','Baik',NULL,35,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(129,9,'UDN/LABKOM/INV/SOFTWARE/D2G/15','DaVinci Resolve','Baik',NULL,36,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(130,9,'UDN/LABKOM/INV/SOFTWARE/D2G/16','Adobe Audition','Baik',NULL,37,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(131,10,'UDN/LABKOM/INV/SOFTWARE/D2H/01','Visual Studio Code','Baik',NULL,9,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(132,10,'UDN/LABKOM/INV/SOFTWARE/D2H/02','Google Chrome','Baik',NULL,47,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(133,10,'UDN/LABKOM/INV/SOFTWARE/D2H/03','Mozilla Firefox','Baik',NULL,48,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(134,10,'UDN/LABKOM/INV/SOFTWARE/D2H/04','Git','Baik',NULL,49,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(135,10,'UDN/LABKOM/INV/SOFTWARE/D2H/05','Adobe Photoshop','Baik',NULL,22,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(136,10,'UDN/LABKOM/INV/SOFTWARE/D2H/06','Adobe Illustrator','Baik',NULL,23,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(137,10,'UDN/LABKOM/INV/SOFTWARE/D2H/07','CorelDRAW','Baik',NULL,25,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(138,10,'UDN/LABKOM/INV/SOFTWARE/D2H/08','Figma','Baik',NULL,24,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(139,10,'UDN/LABKOM/INV/SOFTWARE/D2H/09','Blender','Baik',NULL,26,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(140,10,'UDN/LABKOM/INV/SOFTWARE/D2H/10','Autodesk Maya','Baik',NULL,27,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(141,10,'UDN/LABKOM/INV/SOFTWARE/D2H/11','3ds Max','Baik',NULL,28,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(142,10,'UDN/LABKOM/INV/SOFTWARE/D2H/12','Adobe Animate','Baik',NULL,32,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(143,10,'UDN/LABKOM/INV/SOFTWARE/D2H/13','Adobe After Effects','Baik',NULL,35,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(144,10,'UDN/LABKOM/INV/SOFTWARE/D2H/14','DaVinci Resolve','Baik',NULL,36,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(145,10,'UDN/LABKOM/INV/SOFTWARE/D2H/15','Adobe Audition','Baik',NULL,37,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(146,11,'UDN/LABKOM/INV/SOFTWARE/D2I/01','Visual Studio Code','Baik',NULL,9,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(147,11,'UDN/LABKOM/INV/SOFTWARE/D2I/02','Google Chrome','Baik',NULL,47,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(148,11,'UDN/LABKOM/INV/SOFTWARE/D2I/03','Mozilla Firefox','Baik',NULL,48,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(149,11,'UDN/LABKOM/INV/SOFTWARE/D2I/04','Git','Baik',NULL,49,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(150,11,'UDN/LABKOM/INV/SOFTWARE/D2I/05','Adobe Photoshop','Baik',NULL,22,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(151,11,'UDN/LABKOM/INV/SOFTWARE/D2I/06','Adobe Illustrator','Baik',NULL,23,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(152,11,'UDN/LABKOM/INV/SOFTWARE/D2I/07','CorelDRAW','Baik',NULL,25,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(153,11,'UDN/LABKOM/INV/SOFTWARE/D2I/08','Figma','Baik',NULL,24,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(154,11,'UDN/LABKOM/INV/SOFTWARE/D2I/09','Blender','Baik',NULL,26,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(155,11,'UDN/LABKOM/INV/SOFTWARE/D2I/10','Autodesk Maya','Baik',NULL,27,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(156,11,'UDN/LABKOM/INV/SOFTWARE/D2I/11','3ds Max','Baik',NULL,28,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(157,11,'UDN/LABKOM/INV/SOFTWARE/D2I/12','Adobe Animate','Baik',NULL,32,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(158,11,'UDN/LABKOM/INV/SOFTWARE/D2I/13','Adobe After Effects','Baik',NULL,35,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(159,11,'UDN/LABKOM/INV/SOFTWARE/D2I/14','DaVinci Resolve','Baik',NULL,36,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(160,11,'UDN/LABKOM/INV/SOFTWARE/D2I/15','Adobe Audition','Baik',NULL,37,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(161,11,'UDN/LABKOM/INV/SOFTWARE/D2I/16','Python','Baik',NULL,40,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(162,11,'UDN/LABKOM/INV/SOFTWARE/D2I/17','Jupyter Notebook','Baik',NULL,41,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(163,11,'UDN/LABKOM/INV/SOFTWARE/D2I/18','ComfyUI','Baik',NULL,42,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(164,11,'UDN/LABKOM/INV/SOFTWARE/D2I/19','Stable Diffusion','Baik',NULL,43,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(165,11,'UDN/LABKOM/INV/SOFTWARE/D2I/20','MySQL Workbench','Baik',NULL,16,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(166,11,'UDN/LABKOM/INV/SOFTWARE/D2I/21','DBeaver','Baik',NULL,17,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(167,12,'UDN/LABKOM/INV/SOFTWARE/D2J/01','Visual Studio Code','Baik',NULL,9,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(168,12,'UDN/LABKOM/INV/SOFTWARE/D2J/02','Google Chrome','Baik',NULL,47,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(169,12,'UDN/LABKOM/INV/SOFTWARE/D2J/03','Mozilla Firefox','Baik',NULL,48,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(170,12,'UDN/LABKOM/INV/SOFTWARE/D2J/04','Git','Baik',NULL,49,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(171,12,'UDN/LABKOM/INV/SOFTWARE/D2J/05','Adobe Photoshop','Baik',NULL,22,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(172,12,'UDN/LABKOM/INV/SOFTWARE/D2J/06','Adobe Illustrator','Baik',NULL,23,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(173,12,'UDN/LABKOM/INV/SOFTWARE/D2J/07','CorelDRAW','Baik',NULL,25,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(174,12,'UDN/LABKOM/INV/SOFTWARE/D2J/08','Figma','Baik',NULL,24,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(175,12,'UDN/LABKOM/INV/SOFTWARE/D2J/09','Blender','Baik',NULL,26,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(176,12,'UDN/LABKOM/INV/SOFTWARE/D2J/10','Autodesk Maya','Baik',NULL,27,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(177,12,'UDN/LABKOM/INV/SOFTWARE/D2J/11','3ds Max','Baik',NULL,28,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(178,12,'UDN/LABKOM/INV/SOFTWARE/D2J/12','Adobe Animate','Baik',NULL,32,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(179,12,'UDN/LABKOM/INV/SOFTWARE/D2J/13','Adobe After Effects','Baik',NULL,35,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(180,12,'UDN/LABKOM/INV/SOFTWARE/D2J/14','DaVinci Resolve','Baik',NULL,36,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(181,12,'UDN/LABKOM/INV/SOFTWARE/D2J/15','Adobe Audition','Baik',NULL,37,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(182,14,'UDN/LABKOM/INV/SOFTWARE/D3L/01','Visual Studio Code','Baik',NULL,9,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(183,14,'UDN/LABKOM/INV/SOFTWARE/D3L/02','Google Chrome','Baik',NULL,47,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(184,14,'UDN/LABKOM/INV/SOFTWARE/D3L/03','Mozilla Firefox','Baik',NULL,48,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(185,14,'UDN/LABKOM/INV/SOFTWARE/D3L/04','Git','Baik',NULL,49,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(186,14,'UDN/LABKOM/INV/SOFTWARE/D3L/05','IntelliJ IDEA','Baik',NULL,11,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(187,14,'UDN/LABKOM/INV/SOFTWARE/D3L/06','Android Studio','Baik',NULL,10,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(188,14,'UDN/LABKOM/INV/SOFTWARE/D3L/07','XAMPP','Baik',NULL,12,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(189,14,'UDN/LABKOM/INV/SOFTWARE/D3L/08','Node.js','Baik',NULL,13,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(190,14,'UDN/LABKOM/INV/SOFTWARE/D3L/09','Laragon','Baik',NULL,14,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(191,14,'UDN/LABKOM/INV/SOFTWARE/D3L/10','MySQL Workbench','Baik',NULL,16,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(192,14,'UDN/LABKOM/INV/SOFTWARE/D3L/11','DBeaver','Baik',NULL,17,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(193,14,'UDN/LABKOM/INV/SOFTWARE/D3L/12','phpMyAdmin','Baik',NULL,18,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(194,14,'UDN/LABKOM/INV/SOFTWARE/D3L/13','Postman','Baik',NULL,15,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(195,14,'UDN/LABKOM/INV/SOFTWARE/D3L/14','Unity','Baik',NULL,19,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(196,14,'UDN/LABKOM/INV/SOFTWARE/D3L/15','Godot Engine','Baik',NULL,20,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(197,15,'UDN/LABKOM/INV/SOFTWARE/D3M/02','Visual Studio Code','Baik',NULL,9,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(198,15,'UDN/LABKOM/INV/SOFTWARE/D3M/03','Google Chrome','Baik',NULL,47,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(199,15,'UDN/LABKOM/INV/SOFTWARE/D3M/04','Mozilla Firefox','Baik',NULL,48,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(200,15,'UDN/LABKOM/INV/SOFTWARE/D3M/05','Git','Baik',NULL,49,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(201,15,'UDN/LABKOM/INV/SOFTWARE/D3M/06','IntelliJ IDEA','Baik',NULL,11,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(202,15,'UDN/LABKOM/INV/SOFTWARE/D3M/07','Android Studio','Baik',NULL,10,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(203,15,'UDN/LABKOM/INV/SOFTWARE/D3M/08','XAMPP','Baik',NULL,12,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(204,15,'UDN/LABKOM/INV/SOFTWARE/D3M/09','Node.js','Baik',NULL,13,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(205,15,'UDN/LABKOM/INV/SOFTWARE/D3M/10','Laragon','Baik',NULL,14,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(206,15,'UDN/LABKOM/INV/SOFTWARE/D3M/11','MySQL Workbench','Baik',NULL,16,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(207,15,'UDN/LABKOM/INV/SOFTWARE/D3M/12','DBeaver','Baik',NULL,17,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(208,15,'UDN/LABKOM/INV/SOFTWARE/D3M/13','phpMyAdmin','Baik',NULL,18,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(209,15,'UDN/LABKOM/INV/SOFTWARE/D3M/14','Postman','Baik',NULL,15,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(210,15,'UDN/LABKOM/INV/SOFTWARE/D3M/15','Unity','Baik',NULL,19,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(211,15,'UDN/LABKOM/INV/SOFTWARE/D3M/16','Godot Engine','Baik',NULL,20,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(212,16,'UDN/LABKOM/INV/SOFTWARE/D3N/01','Visual Studio Code','Baik',NULL,9,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(213,16,'UDN/LABKOM/INV/SOFTWARE/D3N/02','Google Chrome','Baik',NULL,47,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(214,16,'UDN/LABKOM/INV/SOFTWARE/D3N/03','Mozilla Firefox','Baik',NULL,48,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(215,16,'UDN/LABKOM/INV/SOFTWARE/D3N/04','Git','Baik',NULL,49,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(216,16,'UDN/LABKOM/INV/SOFTWARE/D3N/05','IntelliJ IDEA','Baik',NULL,11,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(217,16,'UDN/LABKOM/INV/SOFTWARE/D3N/06','Android Studio','Baik',NULL,10,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(218,16,'UDN/LABKOM/INV/SOFTWARE/D3N/07','XAMPP','Baik',NULL,12,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(219,16,'UDN/LABKOM/INV/SOFTWARE/D3N/08','Node.js','Baik',NULL,13,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(220,16,'UDN/LABKOM/INV/SOFTWARE/D3N/09','Laragon','Baik',NULL,14,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(221,16,'UDN/LABKOM/INV/SOFTWARE/D3N/10','MySQL Workbench','Baik',NULL,16,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(222,16,'UDN/LABKOM/INV/SOFTWARE/D3N/11','DBeaver','Baik',NULL,17,'App\\Models\\SoftwareDetail','2026-01-24 01:16:43','2026-01-24 01:21:24'),
(223,16,'UDN/LABKOM/INV/SOFTWARE/D3N/12','phpMyAdmin','Baik',NULL,18,'App\\Models\\SoftwareDetail','2026-01-24 01:16:44','2026-01-24 01:21:24'),
(224,16,'UDN/LABKOM/INV/SOFTWARE/D3N/13','Postman','Baik',NULL,15,'App\\Models\\SoftwareDetail','2026-01-24 01:16:44','2026-01-24 01:21:24'),
(225,16,'UDN/LABKOM/INV/SOFTWARE/D3N/14','Unity','Baik',NULL,19,'App\\Models\\SoftwareDetail','2026-01-24 01:16:44','2026-01-24 01:21:24'),
(226,16,'UDN/LABKOM/INV/SOFTWARE/D3N/15','Godot Engine','Baik',NULL,20,'App\\Models\\SoftwareDetail','2026-01-24 01:16:44','2026-01-24 01:21:24'),
(236,3,'UDN/LABKOM/INV/SOFTWARE/D2A/16','Adobe After Effects','Baik',NULL,35,'App\\Models\\SoftwareDetail','2026-01-29 08:12:07','2026-01-29 08:12:07'),
(237,4,'UDN/LABKOM/INV/SOFTWARE/D2B/17','Autodesk Maya','Baik',NULL,27,'App\\Models\\SoftwareDetail','2026-01-29 08:13:46','2026-01-29 08:13:46');
/*!40000 ALTER TABLE `inventories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
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
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keyboards`
--

DROP TABLE IF EXISTS `keyboards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `keyboards` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_inventaris` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` tinyint(4) NOT NULL,
  `stok` int(10) unsigned NOT NULL DEFAULT 0,
  `full_name` varchar(255) GENERATED ALWAYS AS (concat(`merk`,'-',`tipe`)) VIRTUAL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `keyboards_no_inventaris_unique` (`no_inventaris`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keyboards`
--

LOCK TABLES `keyboards` WRITE;
/*!40000 ALTER TABLE `keyboards` DISABLE KEYS */;
INSERT INTO `keyboards` VALUES
(1,'LABKOM/KY/001/2025','Logitech','K120 (USB)',2025,3,33,'Logitech-K120 (USB)',NULL,NULL),
(2,'LABKOM/KY/002/2024','Dell','KB216 (USB)',2024,4,23,'Dell-KB216 (USB)',NULL,NULL),
(3,'LABKOM/KY/003/2023','HP','K1500 (USB)',2023,2,20,'HP-K1500 (USB)',NULL,NULL),
(4,'LABKOM/KY/004/2025','A4Tech','KR-85 (USB)',2025,8,22,'A4Tech-KR-85 (USB)',NULL,NULL),
(5,'LABKOM/KY/005/2024','Genius','KB-110X (USB)',2024,2,18,'Genius-KB-110X (USB)',NULL,NULL),
(6,'LABKOM/KY/006/2023','Logitech','MK220 (Wireless Combo)',2023,9,16,'Logitech-MK220 (Wireless Combo)',NULL,NULL),
(7,'LABKOM/KY/007/2025','Fantech','K613 Fighter (Membrane Gaming)',2025,7,14,'Fantech-K613 Fighter (Membrane Gaming)',NULL,NULL),
(8,'LABKOM/KY/008/2024','Rexus','K1 Legionare (Membrane)',2024,8,15,'Rexus-K1 Legionare (Membrane)',NULL,NULL),
(9,'LABKOM/KY/009/2023','Microsoft','Wired Keyboard 600 (USB)',2023,10,13,'Microsoft-Wired Keyboard 600 (USB)',NULL,NULL),
(10,'LABKOM/KY/010/2025','Digital Alliance','DA Gaming K1 (Membrane)',2025,10,11,'Digital Alliance-DA Gaming K1 (Membrane)',NULL,NULL);
/*!40000 ALTER TABLE `keyboards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `klasifikasi_labs`
--

DROP TABLE IF EXISTS `klasifikasi_labs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `klasifikasi_labs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `klasifikasi_labs_kode_kategori_unique` (`kode_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `klasifikasi_labs`
--

LOCK TABLES `klasifikasi_labs` WRITE;
/*!40000 ALTER TABLE `klasifikasi_labs` DISABLE KEYS */;
INSERT INTO `klasifikasi_labs` VALUES
(2,'PM','PEMROGRAMAN','2025-07-21 03:09:33','2025-07-21 03:09:33'),
(4,'DB','DATABASE','2025-07-21 03:10:25','2025-07-21 03:10:25'),
(5,'MM','MULTIMEDIA','2025-07-21 03:10:50','2025-07-21 03:10:50');
/*!40000 ALTER TABLE `klasifikasi_labs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lab_prodi_priority`
--

DROP TABLE IF EXISTS `lab_prodi_priority`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `lab_prodi_priority` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `laboratorium_id` bigint(20) unsigned NOT NULL,
  `prodi_id` bigint(20) unsigned NOT NULL,
  `priority_level` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lab_prodi_priority_laboratorium_id_prodi_id_unique` (`laboratorium_id`,`prodi_id`),
  KEY `lab_prodi_priority_prodi_id_foreign` (`prodi_id`),
  CONSTRAINT `lab_prodi_priority_laboratorium_id_foreign` FOREIGN KEY (`laboratorium_id`) REFERENCES `laboratoria` (`id`) ON DELETE CASCADE,
  CONSTRAINT `lab_prodi_priority_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodis` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab_prodi_priority`
--

LOCK TABLES `lab_prodi_priority` WRITE;
/*!40000 ALTER TABLE `lab_prodi_priority` DISABLE KEYS */;
INSERT INTO `lab_prodi_priority` VALUES
(1,3,1,1,NULL,NULL),
(2,4,1,1,NULL,NULL),
(3,15,1,1,NULL,NULL),
(4,6,6,1,NULL,NULL),
(5,6,4,1,NULL,NULL),
(6,5,6,1,NULL,NULL),
(7,5,4,1,NULL,NULL),
(8,5,5,1,NULL,NULL);
/*!40000 ALTER TABLE `lab_prodi_priority` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lab_software`
--

DROP TABLE IF EXISTS `lab_software`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `lab_software` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `laboratorium_id` bigint(20) unsigned NOT NULL,
  `software_detail_id` bigint(20) unsigned NOT NULL,
  `version` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lab_software_laboratorium_id_software_detail_id_unique` (`laboratorium_id`,`software_detail_id`),
  KEY `lab_software_software_detail_id_foreign` (`software_detail_id`),
  CONSTRAINT `lab_software_laboratorium_id_foreign` FOREIGN KEY (`laboratorium_id`) REFERENCES `laboratoria` (`id`) ON DELETE CASCADE,
  CONSTRAINT `lab_software_software_detail_id_foreign` FOREIGN KEY (`software_detail_id`) REFERENCES `software_details` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab_software`
--

LOCK TABLES `lab_software` WRITE;
/*!40000 ALTER TABLE `lab_software` DISABLE KEYS */;
INSERT INTO `lab_software` VALUES
(1,3,9,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(2,3,47,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(3,3,48,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(4,3,49,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(8,3,24,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(9,3,26,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(10,3,27,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(11,3,28,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(12,3,32,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(13,3,35,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(14,3,36,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(16,4,9,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(17,4,47,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(18,4,48,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(19,4,49,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(23,4,24,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(24,4,26,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(25,4,27,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(26,4,28,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(27,4,32,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(28,4,35,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(29,4,36,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(31,5,9,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(32,5,47,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(33,5,48,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(34,5,49,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(38,5,24,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(39,5,26,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(40,5,27,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(41,5,28,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(42,5,32,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(43,5,35,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(44,5,36,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(46,6,9,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(47,6,47,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(48,6,48,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(49,6,49,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(50,6,26,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(51,6,27,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(52,6,28,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(53,6,29,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(54,6,30,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(55,6,31,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(56,6,32,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(57,6,33,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(58,6,38,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(59,6,39,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(60,6,35,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(63,7,9,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(64,7,47,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(65,7,48,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(66,7,49,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(67,7,26,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(68,7,27,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(69,7,28,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(70,7,29,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(71,7,30,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(72,7,31,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(73,7,32,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(74,7,33,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(75,7,38,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(76,7,39,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(77,7,35,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(80,9,9,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(81,9,47,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(82,9,48,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(83,9,49,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(87,9,24,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(88,9,26,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(89,9,27,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(90,9,28,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(91,9,32,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(92,9,35,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(93,9,36,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(95,10,9,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(96,10,47,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(97,10,48,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(98,10,49,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(102,10,24,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(103,10,26,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(104,10,27,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(105,10,28,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(106,10,32,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(107,10,35,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(108,10,36,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(110,11,9,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(111,11,47,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(112,11,48,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(113,11,49,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(117,11,24,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(118,11,26,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(119,11,27,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(120,11,28,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(121,11,32,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(122,11,35,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(123,11,36,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(125,11,40,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(126,11,41,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(127,11,42,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(128,11,43,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(129,11,16,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(130,11,17,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(131,12,9,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(132,12,47,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(133,12,48,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(134,12,49,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(138,12,24,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(139,12,26,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(140,12,27,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(141,12,28,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(142,12,32,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(143,12,35,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(144,12,36,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(146,14,9,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(147,14,47,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(148,14,48,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(149,14,49,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(150,14,11,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(151,14,10,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(152,14,12,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(153,14,13,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(154,14,14,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(155,14,16,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(156,14,17,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(157,14,18,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(158,14,15,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(159,14,19,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(160,14,20,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(161,15,9,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(162,15,47,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(163,15,48,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(164,15,49,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(165,15,11,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(166,15,10,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(167,15,12,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(168,15,13,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(169,15,14,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(170,15,16,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(171,15,17,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(172,15,18,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(173,15,15,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(174,15,19,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(175,15,20,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(176,16,9,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(177,16,47,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(178,16,48,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(179,16,49,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(180,16,11,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(181,16,10,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(182,16,12,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(183,16,13,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(184,16,14,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(185,16,16,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(186,16,17,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(187,16,18,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(188,16,15,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(189,16,19,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30'),
(190,16,20,'1.0','2026-01-24 01:30:30','2026-01-24 01:30:30');
/*!40000 ALTER TABLE `lab_software` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laboratoria`
--

DROP TABLE IF EXISTS `laboratoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `laboratoria` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kategori_id` bigint(20) unsigned NOT NULL,
  `ruang` varchar(255) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `pc_siap` int(11) NOT NULL DEFAULT 0,
  `pc_backup` int(11) NOT NULL DEFAULT 0,
  `keterangan` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `operating_start` time NOT NULL DEFAULT '07:00:00',
  `operating_end` time NOT NULL DEFAULT '21:00:00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `laboratoria_kategori_id_foreign` (`kategori_id`),
  CONSTRAINT `laboratoria_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `klasifikasi_labs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratoria`
--

LOCK TABLES `laboratoria` WRITE;
/*!40000 ALTER TABLE `laboratoria` DISABLE KEYS */;
INSERT INTO `laboratoria` VALUES
(3,2,'D2A',41,40,1,NULL,1,'07:00:00','21:00:00','2025-07-21 03:11:12','2025-07-21 03:11:12'),
(4,5,'D2B',42,40,2,NULL,1,'07:00:00','21:00:00','2025-07-21 03:12:04','2025-07-21 03:12:04'),
(5,5,'D2C',42,41,1,NULL,1,'07:00:00','21:00:00','2025-07-21 04:41:42','2025-07-21 04:41:42'),
(6,5,'D2D',42,41,1,NULL,1,'07:00:00','21:00:00','2025-07-21 04:46:16','2025-07-21 04:46:16'),
(7,4,'D2E',42,41,1,NULL,1,'07:00:00','21:00:00','2025-07-21 04:46:40','2025-07-21 04:46:40'),
(9,4,'D2G',42,41,1,NULL,1,'07:00:00','21:00:00','2025-07-21 04:48:24','2025-07-21 04:48:24'),
(10,4,'D2H',42,41,1,NULL,1,'07:00:00','21:00:00','2025-07-21 04:48:45','2025-07-21 04:48:45'),
(11,2,'D2I',42,41,1,NULL,1,'07:00:00','21:00:00','2025-07-21 04:49:28','2025-07-21 04:49:28'),
(12,2,'D2J',42,41,1,NULL,1,'07:00:00','21:00:00','2025-07-21 04:50:47','2025-07-21 04:50:47'),
(13,2,'D2K',42,41,1,NULL,1,'07:00:00','21:00:00','2025-07-21 04:51:08','2025-07-21 04:51:08'),
(14,4,'D3L',42,41,1,NULL,1,'07:00:00','21:00:00','2025-07-21 04:51:41','2025-07-21 04:51:41'),
(15,4,'D3M',42,41,1,NULL,1,'07:00:00','21:00:00','2025-07-21 04:51:54','2025-07-21 04:51:54'),
(16,2,'D3N',42,41,1,NULL,1,'07:00:00','21:00:00','2025-07-21 04:52:19','2025-07-21 04:52:19');
/*!40000 ALTER TABLE `laboratoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lapor_ptpps`
--

DROP TABLE IF EXISTS `lapor_ptpps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `lapor_ptpps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_sop` text NOT NULL,
  `ketidaksesuaian` text NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tgl_kejadian` date NOT NULL,
  `jam_kejadian` time NOT NULL,
  `tgl_laporan` date NOT NULL,
  `jam_laporan` time NOT NULL,
  `hasil_pengamatan` text NOT NULL,
  `tindakan_langsung` text NOT NULL,
  `permintaan_perbaikan` text NOT NULL,
  `nama_pelapor` varchar(255) NOT NULL,
  `bagian_pelapor` varchar(255) NOT NULL,
  `jabatan_pelapor` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lapor_ptpps`
--

LOCK TABLES `lapor_ptpps` WRITE;
/*!40000 ALTER TABLE `lapor_ptpps` DISABLE KEYS */;
INSERT INTO `lapor_ptpps` VALUES
(1,'SOP/2025/7/1','AC Mati ','D3M','2025-07-22','08:07:58','2025-07-22','08:08:02','Kemungkinan Freon Mati','Mengganti Freon','Mengganti Freon','Dimas Daffa','D3M','Laboran','2025-07-21 18:08:05','2025-07-21 18:08:05');
/*!40000 ALTER TABLE `lapor_ptpps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecturers`
--

DROP TABLE IF EXISTS `lecturers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `lecturers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecturers`
--

LOCK TABLES `lecturers` WRITE;
/*!40000 ALTER TABLE `lecturers` DISABLE KEYS */;
INSERT INTO `lecturers` VALUES
(1,'Norenzo, S. Kom','2025-10-16 01:20:10','2025-10-21 19:17:27'),
(2,'DONY, M.KOM','2026-01-17 07:45:28','2026-01-17 07:45:28'),
(3,'NURBAGUS, M.KOM','2026-01-20 00:36:27','2026-01-20 00:36:27');
/*!40000 ALTER TABLE `lecturers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mice`
--

DROP TABLE IF EXISTS `mice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `mice` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_inventaris` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` tinyint(4) NOT NULL,
  `stok` int(10) unsigned NOT NULL DEFAULT 0,
  `full_name` varchar(255) GENERATED ALWAYS AS (concat(`merk`,'-',`tipe`)) VIRTUAL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mice_no_inventaris_unique` (`no_inventaris`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mice`
--

LOCK TABLES `mice` WRITE;
/*!40000 ALTER TABLE `mice` DISABLE KEYS */;
INSERT INTO `mice` VALUES
(1,'LABKOM/MOUSE/001/2025','Logitech','M170 (Wireless)',2025,7,34,'Logitech-M170 (Wireless)',NULL,NULL),
(2,'LABKOM/MOUSE/002/2024','HP','X500 (USB Wired)',2024,9,32,'HP-X500 (USB Wired)',NULL,NULL),
(3,'LABKOM/MOUSE/003/2023','Dell','MS116 (USB Wired)',2023,12,29,'Dell-MS116 (USB Wired)',NULL,NULL),
(4,'LABKOM/MOUSE/004/2025','A4Tech','OP-620D (USB Wired)',2025,6,23,'A4Tech-OP-620D (USB Wired)',NULL,NULL),
(5,'LABKOM/MOUSE/005/2024','Genius','NX-7000 (Wireless)',2024,5,16,'Genius-NX-7000 (Wireless)',NULL,NULL),
(6,'LABKOM/MOUSE/006/2023','Logitech','B100 (USB Wired)',2023,8,29,'Logitech-B100 (USB Wired)',NULL,NULL),
(7,'LABKOM/MOUSE/007/2025','Fantech','X5 Zeus (Gaming USB)',2025,8,9,'Fantech-X5 Zeus (Gaming USB)',NULL,NULL),
(8,'LABKOM/MOUSE/008/2024','Rexus','X1 (Wireless Gaming)',2024,12,11,'Rexus-X1 (Wireless Gaming)',NULL,NULL),
(9,'LABKOM/MOUSE/009/2023','Microsoft','Basic Optical Mouse (USB)',2023,8,15,'Microsoft-Basic Optical Mouse (USB)',NULL,NULL),
(10,'LABKOM/MOUSE/010/2025','Lenovo','300 (Wireless Compact)',2025,10,10,'Lenovo-300 (Wireless Compact)',NULL,NULL);
/*!40000 ALTER TABLE `mice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2025_03_03_015738_create_klasifikasi_labs_table',1),
(5,'2025_03_03_020319_create_laboratoria_table',1),
(6,'2025_03_03_030906_create_motherboards_table',1),
(7,'2025_03_03_033458_create_processors_table',1),
(8,'2025_03_03_034315_create_penyimpanans_table',1),
(9,'2025_03_03_051419_create_v_g_a_s_table',1),
(10,'2025_03_03_055828_create_r_a_m_s_table',1),
(11,'2025_03_04_003043_create_d_v_d_s_table',1),
(12,'2025_03_04_010249_create_keyboards_table',1),
(13,'2025_03_04_023415_create_mice_table',1),
(14,'2025_03_04_035037_create_monitors_table',1),
(15,'2025_03_04_041313_create_headphones_table',1),
(16,'2025_03_04_041314_create_p_s_u_s_table',1),
(17,'2025_03_18_145434_create_notifications_table',1),
(18,'2025_03_19_043513_create_lapor_ptpps_table',1),
(19,'2025_06_23_132526_create_inventories_table',1),
(20,'2025_06_23_132527_create_non_pc_details_table',1),
(21,'2025_06_23_132527_create_pc_details_table',1),
(22,'2025_06_23_132528_create_software_details_table',1),
(23,'2025_06_24_063420_add_license_fields_to_software_details_table',1),
(24,'2025_06_24_064816_add_merk_to_non_pc_details_table',1),
(25,'2025_07_02_031008_create_barang_masuk_table',1),
(26,'2025_07_02_031017_create_barang_keluar_table',1),
(27,'2025_07_07_132941_create_permission_tables',1),
(28,'2025_10_16_075926_create_prodis_table',2),
(29,'2025_10_16_080312_create_lecturers_table',2),
(30,'2025_10_16_080520_create_courses_table',2),
(31,'2025_10_16_080553_create_course_software_table',2),
(32,'2025_10_16_084625_add_software_requirements_to_courses_table',3),
(33,'2025_10_16_094154_create_schedules_table',4),
(34,'2026_01_12_000001_create_time_slots_table',5),
(35,'2026_01_12_000002_create_lab_software_table',5),
(36,'2026_01_12_000003_create_lab_prodi_priority_table',5),
(37,'2026_01_12_000004_enhance_laboratoria_table',5),
(38,'2026_01_12_000005_enhance_courses_table',5),
(39,'2026_01_12_000006_add_time_slot_to_schedules',5),
(40,'2026_01_12_195000_update_time_slots_with_breaks',6),
(41,'2026_01_17_065029_add_jumlah_siswa_and_sesi_to_schedules',7),
(42,'2026_01_17_071054_add_code_to_software_details',8),
(43,'2026_01_17_071055_add_version_to_lab_software',8),
(44,'2026_01_20_140000_make_course_id_nullable_in_schedules',9),
(45,'2026_01_24_154600_remove_semester_from_courses',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES
(1,'App\\Models\\User',1),
(1,'App\\Models\\User',7),
(6,'App\\Models\\User',8),
(7,'App\\Models\\User',8);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monitors`
--

DROP TABLE IF EXISTS `monitors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `monitors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_inventaris` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `resolusi` varchar(255) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` tinyint(4) NOT NULL,
  `stok` int(10) unsigned NOT NULL DEFAULT 0,
  `full_name` varchar(255) GENERATED ALWAYS AS (concat(`merk`,'-',`nama`,'-',`ukuran`,'inch')) VIRTUAL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `monitors_no_inventaris_unique` (`no_inventaris`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monitors`
--

LOCK TABLES `monitors` WRITE;
/*!40000 ALTER TABLE `monitors` DISABLE KEYS */;
INSERT INTO `monitors` VALUES
(1,'LABKOM/MN/001/2025','LG','22MP410-B','1920','21.5','Full HD, IPS, AMD FreeSync',2025,5,13,'LG-22MP410-B-21.5inch',NULL,NULL),
(2,'LABKOM/MN/002/2024','Samsung','S24R350FHE','1920','24','Full HD, IPS, 75Hz',2024,3,11,'Samsung-S24R350FHE-24inch',NULL,NULL),
(3,'LABKOM/MN/003/2023','Acer','K202HQL Abi','1366','19.5','HD+, TN Panel, VGA/HDMI',2023,6,12,'Acer-K202HQL Abi-19.5inch',NULL,NULL),
(4,'LABKOM/MN/004/2025','Dell','E2220H','1920','21.5','Full HD, TN, VGA/DisplayPort',2025,2,14,'Dell-E2220H-21.5inch',NULL,NULL),
(5,'LABKOM/MN/005/2024','HP','V214a','1920','20.7','Full HD, TN, HDMI/VGA',2024,3,11,'HP-V214a-20.7inch',NULL,NULL),
(6,'LABKOM/MN/006/2023','ViewSonic','VA2246M-LED','1920','22','Full HD, LED, DVI/VGA',2023,9,9,'ViewSonic-VA2246M-LED-22inch',NULL,NULL),
(7,'LABKOM/MN/007/2025','BenQ','GW2283','1920','21.5','Full HD, IPS, Eye-care',2025,1,11,'BenQ-GW2283-21.5inch',NULL,NULL),
(8,'LABKOM/MN/008/2024','Philips','221V8A','1920','21.5','Full HD, VA, Adaptive Sync',2024,5,14,'Philips-221V8A-21.5inch',NULL,NULL),
(9,'LABKOM/MN/009/2023','AOC','E970SWN','1366','18.5','HD, LED, VGA',2023,2,12,'AOC-E970SWN-18.5inch',NULL,NULL),
(10,'LABKOM/MN/010/2025','Lenovo','D22e-20','1920','21.45','Full HD, VA, HDMI/VGA',2025,2,10,'Lenovo-D22e-20-21.45inch',NULL,NULL);
/*!40000 ALTER TABLE `monitors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motherboards`
--

DROP TABLE IF EXISTS `motherboards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `motherboards` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_inventaris` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` tinyint(4) NOT NULL,
  `stok` int(10) unsigned NOT NULL DEFAULT 0,
  `full_name` varchar(255) GENERATED ALWAYS AS (concat(`merk`,'-',`tipe`)) VIRTUAL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `motherboards_no_inventaris_unique` (`no_inventaris`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motherboards`
--

LOCK TABLES `motherboards` WRITE;
/*!40000 ALTER TABLE `motherboards` DISABLE KEYS */;
INSERT INTO `motherboards` VALUES
(1,'LABKOM/MB/001/2025','ASUS','PRIME H510M-E',2025,7,9,'ASUS-PRIME H510M-E',NULL,NULL),
(2,'LABKOM/MB/002/2024','MSI','A320M-A PRO MAX',2024,5,11,'MSI-A320M-A PRO MAX',NULL,NULL),
(3,'LABKOM/MB/003/2023','Gigabyte','GA-H410M H V2',2023,7,11,'Gigabyte-GA-H410M H V2',NULL,NULL),
(4,'LABKOM/MB/004/2025','ASRock','B450M Steel Legend',2025,10,10,'ASRock-B450M Steel Legend',NULL,NULL),
(5,'LABKOM/MB/005/2024','Biostar','A520MH',2024,5,11,'Biostar-A520MH',NULL,NULL),
(6,'LABKOM/MB/006/2023','ECS','H310CH5-M2',2023,6,12,'ECS-H310CH5-M2',NULL,NULL),
(7,'LABKOM/MB/007/2025','ASUS','PRIME A320M-K',2025,12,11,'ASUS-PRIME A320M-K',NULL,NULL),
(8,'LABKOM/MB/008/2024','MSI','H510M PRO-E',2024,1,10,'MSI-H510M PRO-E',NULL,NULL),
(9,'LABKOM/MB/009/2023','Gigabyte','B450M DS3H',2023,11,12,'Gigabyte-B450M DS3H',NULL,NULL),
(10,'LABKOM/MB/010/2025','ASRock','H470M-HDV/M.2',2025,2,10,'ASRock-H470M-HDV/M.2',NULL,NULL);
/*!40000 ALTER TABLE `motherboards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `non_pc_details`
--

DROP TABLE IF EXISTS `non_pc_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `non_pc_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `spesifikasi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `non_pc_details`
--

LOCK TABLES `non_pc_details` WRITE;
/*!40000 ALTER TABLE `non_pc_details` DISABLE KEYS */;
INSERT INTO `non_pc_details` VALUES
(1,NULL,'47',NULL,NULL,'2025-07-21 05:19:02','2025-07-21 05:19:02');
/*!40000 ALTER TABLE `non_pc_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `p_s_u_s`
--

DROP TABLE IF EXISTS `p_s_u_s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `p_s_u_s` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_inventaris` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `daya` int(11) NOT NULL,
  `efisiensi` varchar(255) NOT NULL,
  `bulan` tinyint(4) NOT NULL,
  `stok` int(10) unsigned NOT NULL DEFAULT 0,
  `full_name` varchar(255) GENERATED ALWAYS AS (concat(`merk`,'-',`tipe`,'-',`daya`)) VIRTUAL,
  `tahun` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `p_s_u_s_no_inventaris_unique` (`no_inventaris`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `p_s_u_s`
--

LOCK TABLES `p_s_u_s` WRITE;
/*!40000 ALTER TABLE `p_s_u_s` DISABLE KEYS */;
INSERT INTO `p_s_u_s` VALUES
(1,'LABKOM/PSU/001/2025','Corsair','CV450',450,'80+ Bronze',4,7,'Corsair-CV450-450',2025,NULL,NULL),
(2,'LABKOM/PSU/002/2024','Cooler Master','MWE 500 White',500,'80+ White',4,9,'Cooler Master-MWE 500 White-500',2024,NULL,NULL),
(3,'LABKOM/PSU/003/2023','be quiet!','System Power 9 400W',400,'80+ Bronze',9,4,'be quiet!-System Power 9 400W-400',2023,NULL,NULL),
(4,'LABKOM/PSU/004/2025','Antec','Atom V550',550,'80+ (Standard)',6,19,'Antec-Atom V550-550',2025,NULL,NULL),
(5,'LABKOM/PSU/005/2024','FSP','HV PRO 550W',550,'80+ Bronze',5,10,'FSP-HV PRO 550W-550',2024,NULL,NULL),
(6,'LABKOM/PSU/006/2023','Thermaltake','Litepower 450W',450,'80+ (Standard)',11,12,'Thermaltake-Litepower 450W-450',2023,NULL,NULL),
(7,'LABKOM/PSU/007/2025','EVGA','500 W1',500,'80+ White',2,13,'EVGA-500 W1-500',2025,NULL,NULL),
(8,'LABKOM/PSU/008/2024','Seasonic','S12III 500',500,'80+ Bronze',10,9,'Seasonic-S12III 500-500',2024,NULL,NULL),
(9,'LABKOM/PSU/009/2023','Deepcool','DN500',500,'80+ (Standard)',11,17,'Deepcool-DN500-500',2023,NULL,NULL),
(10,'LABKOM/PSU/010/2025','Aerocool','United Power 500W',500,'80+ (Standard)',2,9,'Aerocool-United Power 500W-500',2025,NULL,NULL);
/*!40000 ALTER TABLE `p_s_u_s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pc_details`
--

DROP TABLE IF EXISTS `pc_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pc_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_inventaris` varchar(255) NOT NULL,
  `motherboard_id` bigint(20) unsigned NOT NULL,
  `processor_id` bigint(20) unsigned NOT NULL,
  `penyimpanan_id` bigint(20) unsigned NOT NULL,
  `vga_id` bigint(20) unsigned NOT NULL,
  `ram_id` bigint(20) unsigned NOT NULL,
  `dvd_id` bigint(20) unsigned DEFAULT NULL,
  `keyboard_id` bigint(20) unsigned NOT NULL,
  `mouse_id` bigint(20) unsigned NOT NULL,
  `monitor_id` bigint(20) unsigned NOT NULL,
  `headphone_id` bigint(20) unsigned DEFAULT NULL,
  `psu_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pc_details_no_inventaris_unique` (`no_inventaris`),
  KEY `pc_details_motherboard_id_foreign` (`motherboard_id`),
  KEY `pc_details_processor_id_foreign` (`processor_id`),
  KEY `pc_details_penyimpanan_id_foreign` (`penyimpanan_id`),
  KEY `pc_details_vga_id_foreign` (`vga_id`),
  KEY `pc_details_ram_id_foreign` (`ram_id`),
  KEY `pc_details_dvd_id_foreign` (`dvd_id`),
  KEY `pc_details_keyboard_id_foreign` (`keyboard_id`),
  KEY `pc_details_mouse_id_foreign` (`mouse_id`),
  KEY `pc_details_monitor_id_foreign` (`monitor_id`),
  KEY `pc_details_headphone_id_foreign` (`headphone_id`),
  KEY `pc_details_psu_id_foreign` (`psu_id`),
  CONSTRAINT `pc_details_dvd_id_foreign` FOREIGN KEY (`dvd_id`) REFERENCES `d_v_d_s` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pc_details_headphone_id_foreign` FOREIGN KEY (`headphone_id`) REFERENCES `headphones` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pc_details_keyboard_id_foreign` FOREIGN KEY (`keyboard_id`) REFERENCES `keyboards` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pc_details_monitor_id_foreign` FOREIGN KEY (`monitor_id`) REFERENCES `monitors` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pc_details_motherboard_id_foreign` FOREIGN KEY (`motherboard_id`) REFERENCES `motherboards` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pc_details_mouse_id_foreign` FOREIGN KEY (`mouse_id`) REFERENCES `mice` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pc_details_penyimpanan_id_foreign` FOREIGN KEY (`penyimpanan_id`) REFERENCES `penyimpanans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pc_details_processor_id_foreign` FOREIGN KEY (`processor_id`) REFERENCES `processors` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pc_details_psu_id_foreign` FOREIGN KEY (`psu_id`) REFERENCES `p_s_u_s` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pc_details_ram_id_foreign` FOREIGN KEY (`ram_id`) REFERENCES `r_a_m_s` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pc_details_vga_id_foreign` FOREIGN KEY (`vga_id`) REFERENCES `v_g_a_s` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pc_details`
--

LOCK TABLES `pc_details` WRITE;
/*!40000 ALTER TABLE `pc_details` DISABLE KEYS */;
INSERT INTO `pc_details` VALUES
(1,'PCDETAIL/001/2025',4,2,3,3,5,NULL,1,1,1,NULL,4,'2025-07-21 05:15:52','2025-07-21 05:15:52'),
(2,'PCDETAIL/002/2025',1,1,1,1,2,NULL,2,1,1,NULL,1,'2025-07-21 18:38:17','2025-07-21 18:38:17');
/*!40000 ALTER TABLE `pc_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penyimpanans`
--

DROP TABLE IF EXISTS `penyimpanans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `penyimpanans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_inventaris` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `tipe` enum('SSD','HDD') NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `spesifikasi` varchar(255) DEFAULT NULL,
  `bulan` tinyint(4) NOT NULL,
  `stok` int(10) unsigned NOT NULL DEFAULT 0,
  `tahun` year(4) NOT NULL,
  `full_name` varchar(255) GENERATED ALWAYS AS (concat(`tipe`,'-',`merk`,'-',`kapasitas`,'GB')) VIRTUAL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `penyimpanans_no_inventaris_unique` (`no_inventaris`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penyimpanans`
--

LOCK TABLES `penyimpanans` WRITE;
/*!40000 ALTER TABLE `penyimpanans` DISABLE KEYS */;
INSERT INTO `penyimpanans` VALUES
(1,'LABKOM/PM/001/SSD','Kingston','SSD',240,'SATA III, A400 Series',7,22,2025,'SSD-Kingston-240GB',NULL,NULL),
(2,'LABKOM/PM/002/HDD','Seagate','HDD',1000,'SATA 7200RPM, Barracuda',11,16,2024,'HDD-Seagate-1000GB',NULL,NULL),
(3,'LABKOM/PM/003/SSD','Western Digital','SSD',480,'SATA III, Green Series',11,11,2023,'SSD-Western Digital-480GB',NULL,NULL),
(4,'LABKOM/PM/004/HDD','Toshiba','HDD',500,'SATA 7200RPM, P300',11,17,2025,'HDD-Toshiba-500GB',NULL,NULL),
(5,'LABKOM/PM/005/SSD','Crucial','SSD',256,'NVMe Gen3, P2 Series',4,14,2024,'SSD-Crucial-256GB',NULL,NULL),
(6,'LABKOM/PM/006/HDD','Western Digital','HDD',1000,'SATA 5400RPM, Blue Series',8,15,2023,'HDD-Western Digital-1000GB',NULL,NULL),
(7,'LABKOM/PM/007/SSD','ADATA','SSD',512,'SATA III, SU650',10,13,2025,'SSD-ADATA-512GB',NULL,NULL),
(8,'LABKOM/PM/008/HDD','Seagate','HDD',2000,'SATA 5400RPM, SkyHawk Lite (for surveillance, but can be general)',4,7,2024,'HDD-Seagate-2000GB',NULL,NULL),
(9,'LABKOM/PM/009/SSD','V-Gen','SSD',128,'SATA III, Platinum',4,12,2023,'SSD-V-Gen-128GB',NULL,NULL),
(10,'LABKOM/PM/010/HDD','Hitachi/HGST','HDD',500,'SATA 7200RPM, Travelstar (Laptop HDD can be used in Desktops)',10,7,2025,'HDD-Hitachi/HGST-500GB',NULL,NULL);
/*!40000 ALTER TABLE `penyimpanans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=421 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES
(1,'view_barang::keluar','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(2,'view_any_barang::keluar','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(3,'create_barang::keluar','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(4,'update_barang::keluar','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(5,'restore_barang::keluar','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(6,'restore_any_barang::keluar','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(7,'replicate_barang::keluar','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(8,'reorder_barang::keluar','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(9,'delete_barang::keluar','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(10,'delete_any_barang::keluar','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(11,'force_delete_barang::keluar','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(12,'force_delete_any_barang::keluar','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(13,'view_barang::masuk','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(14,'view_any_barang::masuk','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(15,'create_barang::masuk','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(16,'update_barang::masuk','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(17,'restore_barang::masuk','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(18,'restore_any_barang::masuk','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(19,'replicate_barang::masuk','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(20,'reorder_barang::masuk','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(21,'delete_barang::masuk','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(22,'delete_any_barang::masuk','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(23,'force_delete_barang::masuk','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(24,'force_delete_any_barang::masuk','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(25,'view_d::v::d','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(26,'view_any_d::v::d','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(27,'create_d::v::d','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(28,'update_d::v::d','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(29,'restore_d::v::d','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(30,'restore_any_d::v::d','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(31,'replicate_d::v::d','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(32,'reorder_d::v::d','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(33,'delete_d::v::d','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(34,'delete_any_d::v::d','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(35,'force_delete_d::v::d','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(36,'force_delete_any_d::v::d','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(37,'view_headphone','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(38,'view_any_headphone','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(39,'create_headphone','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(40,'update_headphone','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(41,'restore_headphone','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(42,'restore_any_headphone','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(43,'replicate_headphone','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(44,'reorder_headphone','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(45,'delete_headphone','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(46,'delete_any_headphone','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(47,'force_delete_headphone','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(48,'force_delete_any_headphone','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(49,'view_keyboard','web','2025-07-17 22:57:08','2025-07-17 22:57:08'),
(50,'view_any_keyboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(51,'create_keyboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(52,'update_keyboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(53,'restore_keyboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(54,'restore_any_keyboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(55,'replicate_keyboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(56,'reorder_keyboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(57,'delete_keyboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(58,'delete_any_keyboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(59,'force_delete_keyboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(60,'force_delete_any_keyboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(61,'view_klasifikasi::lab','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(62,'view_any_klasifikasi::lab','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(63,'create_klasifikasi::lab','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(64,'update_klasifikasi::lab','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(65,'restore_klasifikasi::lab','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(66,'restore_any_klasifikasi::lab','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(67,'replicate_klasifikasi::lab','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(68,'reorder_klasifikasi::lab','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(69,'delete_klasifikasi::lab','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(70,'delete_any_klasifikasi::lab','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(71,'force_delete_klasifikasi::lab','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(72,'force_delete_any_klasifikasi::lab','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(73,'view_laboratorium','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(74,'view_any_laboratorium','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(75,'create_laboratorium','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(76,'update_laboratorium','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(77,'restore_laboratorium','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(78,'restore_any_laboratorium','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(79,'replicate_laboratorium','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(80,'reorder_laboratorium','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(81,'delete_laboratorium','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(82,'delete_any_laboratorium','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(83,'force_delete_laboratorium','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(84,'force_delete_any_laboratorium','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(85,'view_lapor::ptpp','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(86,'view_any_lapor::ptpp','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(87,'create_lapor::ptpp','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(88,'update_lapor::ptpp','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(89,'restore_lapor::ptpp','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(90,'restore_any_lapor::ptpp','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(91,'replicate_lapor::ptpp','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(92,'reorder_lapor::ptpp','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(93,'delete_lapor::ptpp','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(94,'delete_any_lapor::ptpp','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(95,'force_delete_lapor::ptpp','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(96,'force_delete_any_lapor::ptpp','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(97,'view_monitor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(98,'view_any_monitor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(99,'create_monitor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(100,'update_monitor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(101,'restore_monitor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(102,'restore_any_monitor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(103,'replicate_monitor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(104,'reorder_monitor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(105,'delete_monitor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(106,'delete_any_monitor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(107,'force_delete_monitor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(108,'force_delete_any_monitor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(109,'view_motherboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(110,'view_any_motherboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(111,'create_motherboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(112,'update_motherboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(113,'restore_motherboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(114,'restore_any_motherboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(115,'replicate_motherboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(116,'reorder_motherboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(117,'delete_motherboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(118,'delete_any_motherboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(119,'force_delete_motherboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(120,'force_delete_any_motherboard','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(121,'view_mouse','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(122,'view_any_mouse','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(123,'create_mouse','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(124,'update_mouse','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(125,'restore_mouse','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(126,'restore_any_mouse','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(127,'replicate_mouse','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(128,'reorder_mouse','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(129,'delete_mouse','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(130,'delete_any_mouse','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(131,'force_delete_mouse','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(132,'force_delete_any_mouse','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(133,'view_non::p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(134,'view_any_non::p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(135,'create_non::p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(136,'update_non::p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(137,'restore_non::p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(138,'restore_any_non::p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(139,'replicate_non::p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(140,'reorder_non::p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(141,'delete_non::p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(142,'delete_any_non::p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(143,'force_delete_non::p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(144,'force_delete_any_non::p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(145,'view_p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(146,'view_any_p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(147,'create_p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(148,'update_p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(149,'restore_p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(150,'restore_any_p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(151,'replicate_p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(152,'reorder_p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(153,'delete_p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(154,'delete_any_p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(155,'force_delete_p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(156,'force_delete_any_p::c::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(157,'view_p::s::u','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(158,'view_any_p::s::u','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(159,'create_p::s::u','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(160,'update_p::s::u','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(161,'restore_p::s::u','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(162,'restore_any_p::s::u','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(163,'replicate_p::s::u','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(164,'reorder_p::s::u','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(165,'delete_p::s::u','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(166,'delete_any_p::s::u','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(167,'force_delete_p::s::u','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(168,'force_delete_any_p::s::u','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(169,'view_penyimpanan','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(170,'view_any_penyimpanan','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(171,'create_penyimpanan','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(172,'update_penyimpanan','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(173,'restore_penyimpanan','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(174,'restore_any_penyimpanan','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(175,'replicate_penyimpanan','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(176,'reorder_penyimpanan','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(177,'delete_penyimpanan','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(178,'delete_any_penyimpanan','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(179,'force_delete_penyimpanan','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(180,'force_delete_any_penyimpanan','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(181,'view_processor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(182,'view_any_processor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(183,'create_processor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(184,'update_processor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(185,'restore_processor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(186,'restore_any_processor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(187,'replicate_processor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(188,'reorder_processor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(189,'delete_processor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(190,'delete_any_processor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(191,'force_delete_processor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(192,'force_delete_any_processor','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(193,'view_r::a::m','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(194,'view_any_r::a::m','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(195,'create_r::a::m','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(196,'update_r::a::m','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(197,'restore_r::a::m','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(198,'restore_any_r::a::m','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(199,'replicate_r::a::m','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(200,'reorder_r::a::m','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(201,'delete_r::a::m','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(202,'delete_any_r::a::m','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(203,'force_delete_r::a::m','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(204,'force_delete_any_r::a::m','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(205,'view_role','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(206,'view_any_role','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(207,'create_role','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(208,'update_role','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(209,'delete_role','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(210,'delete_any_role','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(211,'view_software::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(212,'view_any_software::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(213,'create_software::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(214,'update_software::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(215,'restore_software::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(216,'restore_any_software::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(217,'replicate_software::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(218,'reorder_software::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(219,'delete_software::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(220,'delete_any_software::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(221,'force_delete_software::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(222,'force_delete_any_software::inventory','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(223,'view_user','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(224,'view_any_user','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(225,'create_user','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(226,'update_user','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(227,'restore_user','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(228,'restore_any_user','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(229,'replicate_user','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(230,'reorder_user','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(231,'delete_user','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(232,'delete_any_user','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(233,'force_delete_user','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(234,'force_delete_any_user','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(235,'view_v::g::a','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(236,'view_any_v::g::a','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(237,'create_v::g::a','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(238,'update_v::g::a','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(239,'restore_v::g::a','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(240,'restore_any_v::g::a','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(241,'replicate_v::g::a','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(242,'reorder_v::g::a','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(243,'delete_v::g::a','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(244,'delete_any_v::g::a','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(245,'force_delete_v::g::a','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(246,'force_delete_any_v::g::a','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(247,'widget_WelcomeWidget','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(248,'widget_StatsOverviewWidget','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(249,'widget_KalenderAkademikWidget','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(250,'widget_CalendarWidget','web','2025-07-17 22:57:09','2025-07-17 22:57:09'),
(307,'view_course','web','2025-10-16 01:13:01','2025-10-16 01:13:01'),
(308,'view_any_course','web','2025-10-16 01:13:01','2025-10-16 01:13:01'),
(309,'create_course','web','2025-10-16 01:13:01','2025-10-16 01:13:01'),
(310,'update_course','web','2025-10-16 01:13:01','2025-10-16 01:13:01'),
(311,'restore_course','web','2025-10-16 01:13:01','2025-10-16 01:13:01'),
(312,'restore_any_course','web','2025-10-16 01:13:01','2025-10-16 01:13:01'),
(313,'replicate_course','web','2025-10-16 01:13:01','2025-10-16 01:13:01'),
(314,'reorder_course','web','2025-10-16 01:13:01','2025-10-16 01:13:01'),
(315,'delete_course','web','2025-10-16 01:13:01','2025-10-16 01:13:01'),
(316,'delete_any_course','web','2025-10-16 01:13:01','2025-10-16 01:13:01'),
(317,'force_delete_course','web','2025-10-16 01:13:01','2025-10-16 01:13:01'),
(318,'force_delete_any_course','web','2025-10-16 01:13:01','2025-10-16 01:13:01'),
(319,'view_lecturer','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(320,'view_any_lecturer','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(321,'create_lecturer','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(322,'update_lecturer','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(323,'restore_lecturer','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(324,'restore_any_lecturer','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(325,'replicate_lecturer','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(326,'reorder_lecturer','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(327,'delete_lecturer','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(328,'delete_any_lecturer','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(329,'force_delete_lecturer','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(330,'force_delete_any_lecturer','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(331,'view_prodi','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(332,'view_any_prodi','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(333,'create_prodi','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(334,'update_prodi','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(335,'restore_prodi','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(336,'restore_any_prodi','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(337,'replicate_prodi','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(338,'reorder_prodi','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(339,'delete_prodi','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(340,'delete_any_prodi','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(341,'force_delete_prodi','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(342,'force_delete_any_prodi','web','2025-10-16 01:13:02','2025-10-16 01:13:02'),
(343,'view_schedule','web','2025-10-16 02:59:58','2025-10-16 02:59:58'),
(344,'view_any_schedule','web','2025-10-16 02:59:58','2025-10-16 02:59:58'),
(345,'create_schedule','web','2025-10-16 02:59:58','2025-10-16 02:59:58'),
(346,'update_schedule','web','2025-10-16 02:59:58','2025-10-16 02:59:58'),
(347,'restore_schedule','web','2025-10-16 02:59:58','2025-10-16 02:59:58'),
(348,'restore_any_schedule','web','2025-10-16 02:59:58','2025-10-16 02:59:58'),
(349,'replicate_schedule','web','2025-10-16 02:59:58','2025-10-16 02:59:58'),
(350,'reorder_schedule','web','2025-10-16 02:59:58','2025-10-16 02:59:58'),
(351,'delete_schedule','web','2025-10-16 02:59:58','2025-10-16 02:59:58'),
(352,'delete_any_schedule','web','2025-10-16 02:59:58','2025-10-16 02:59:58'),
(353,'force_delete_schedule','web','2025-10-16 02:59:58','2025-10-16 02:59:58'),
(354,'force_delete_any_schedule','web','2025-10-16 02:59:58','2025-10-16 02:59:58'),
(355,'page_ScheduleTimetable','web','2025-10-16 02:59:59','2025-10-16 02:59:59'),
(356,'page_ScheduleWizard','web','2026-01-17 00:19:41','2026-01-17 00:19:41'),
(357,'view_software','web','2026-01-17 00:20:46','2026-01-17 00:20:46'),
(358,'view_any_software','web','2026-01-17 00:20:46','2026-01-17 00:20:46'),
(359,'create_software','web','2026-01-17 00:20:46','2026-01-17 00:20:46'),
(360,'update_software','web','2026-01-17 00:20:46','2026-01-17 00:20:46'),
(361,'restore_software','web','2026-01-17 00:20:46','2026-01-17 00:20:46'),
(362,'restore_any_software','web','2026-01-17 00:20:46','2026-01-17 00:20:46'),
(363,'replicate_software','web','2026-01-17 00:20:46','2026-01-17 00:20:46'),
(364,'reorder_software','web','2026-01-17 00:20:46','2026-01-17 00:20:46'),
(365,'delete_software','web','2026-01-17 00:20:46','2026-01-17 00:20:46'),
(366,'delete_any_software','web','2026-01-17 00:20:46','2026-01-17 00:20:46'),
(367,'force_delete_software','web','2026-01-17 00:20:46','2026-01-17 00:20:46'),
(368,'force_delete_any_software','web','2026-01-17 00:20:46','2026-01-17 00:20:46'),
(369,'lab_d2a_view','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(370,'lab_d2a_manage','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(371,'lab_d2a_edit','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(372,'lab_d2a_delete','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(373,'lab_d2b_view','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(374,'lab_d2b_manage','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(375,'lab_d2b_edit','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(376,'lab_d2b_delete','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(377,'lab_d2c_view','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(378,'lab_d2c_manage','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(379,'lab_d2c_edit','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(380,'lab_d2c_delete','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(381,'lab_d2d_view','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(382,'lab_d2d_manage','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(383,'lab_d2d_edit','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(384,'lab_d2d_delete','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(385,'lab_d2e_view','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(386,'lab_d2e_manage','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(387,'lab_d2e_edit','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(388,'lab_d2e_delete','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(389,'lab_d2g_view','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(390,'lab_d2g_manage','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(391,'lab_d2g_edit','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(392,'lab_d2g_delete','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(393,'lab_d2h_view','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(394,'lab_d2h_manage','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(395,'lab_d2h_edit','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(396,'lab_d2h_delete','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(397,'lab_d2i_view','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(398,'lab_d2i_manage','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(399,'lab_d2i_edit','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(400,'lab_d2i_delete','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(401,'lab_d2j_view','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(402,'lab_d2j_manage','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(403,'lab_d2j_edit','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(404,'lab_d2j_delete','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(405,'lab_d2k_view','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(406,'lab_d2k_manage','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(407,'lab_d2k_edit','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(408,'lab_d2k_delete','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(409,'lab_d3l_view','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(410,'lab_d3l_manage','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(411,'lab_d3l_edit','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(412,'lab_d3l_delete','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(413,'lab_d3m_view','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(414,'lab_d3m_manage','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(415,'lab_d3m_edit','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(416,'lab_d3m_delete','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(417,'lab_d3n_view','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(418,'lab_d3n_manage','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(419,'lab_d3n_edit','web','2026-01-29 07:14:32','2026-01-29 07:14:32'),
(420,'lab_d3n_delete','web','2026-01-29 07:14:32','2026-01-29 07:14:32');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `processors`
--

DROP TABLE IF EXISTS `processors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `processors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_inventaris` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` tinyint(4) NOT NULL,
  `stok` int(10) unsigned NOT NULL DEFAULT 0,
  `full_name` varchar(255) GENERATED ALWAYS AS (concat(`merk`,'-',`tipe`)) VIRTUAL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `processors_no_inventaris_unique` (`no_inventaris`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processors`
--

LOCK TABLES `processors` WRITE;
/*!40000 ALTER TABLE `processors` DISABLE KEYS */;
INSERT INTO `processors` VALUES
(1,'LABKOM/PR/001/2025','Intel','Core i3-10100F',2025,3,5,'Intel-Core i3-10100F',NULL,NULL),
(2,'LABKOM/PR/002/2024','AMD','Ryzen 3 3200G',2024,12,5,'AMD-Ryzen 3 3200G',NULL,NULL),
(3,'LABKOM/PR/003/2023','Intel','Pentium Gold G6400',2023,12,9,'Intel-Pentium Gold G6400',NULL,NULL),
(4,'LABKOM/PR/004/2025','AMD','Athlon 3000G',2025,12,13,'AMD-Athlon 3000G',NULL,NULL),
(5,'LABKOM/PR/005/2024','Intel','Core i5-10400F',2024,8,8,'Intel-Core i5-10400F',NULL,NULL),
(6,'LABKOM/PR/006/2023','AMD','Ryzen 5 3400G',2023,7,10,'AMD-Ryzen 5 3400G',NULL,NULL),
(7,'LABKOM/PR/007/2025','Intel','Celeron G5905',2025,2,23,'Intel-Celeron G5905',NULL,NULL),
(8,'LABKOM/PR/008/2024','AMD','Ryzen 3 4300G',2024,7,7,'AMD-Ryzen 3 4300G',NULL,NULL),
(9,'LABKOM/PR/009/2023','Intel','Core i3-9100F',2023,12,12,'Intel-Core i3-9100F',NULL,NULL),
(10,'LABKOM/PR/010/2025','AMD','Ryzen 5 5500',2025,8,5,'AMD-Ryzen 5 5500',NULL,NULL);
/*!40000 ALTER TABLE `processors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodis`
--

DROP TABLE IF EXISTS `prodis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `prodis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `prodis_name_unique` (`name`),
  UNIQUE KEY `prodis_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodis`
--

LOCK TABLES `prodis` WRITE;
/*!40000 ALTER TABLE `prodis` DISABLE KEYS */;
INSERT INTO `prodis` VALUES
(1,'Teknik Informatika - S1',' A11','2025-10-16 01:20:29','2025-10-16 01:20:29'),
(2,'Ilmu Komunikasi - S1','A15','2026-01-16 23:21:11','2026-01-17 00:38:59'),
(3,'Sistem Informasi - S1','A12','2026-01-24 00:34:37','2026-01-24 00:34:37'),
(4,'DKV - S1','A14','2026-01-24 00:34:55','2026-01-24 00:34:55'),
(5,'FTV -  S1','A16','2026-01-24 00:35:19','2026-01-24 00:35:19'),
(6,'Animasi - S1','A17','2026-01-24 00:35:39','2026-01-24 00:35:52'),
(7,'Teknik Informatika - D3','A22','2026-01-24 00:36:18','2026-01-24 00:36:18');
/*!40000 ALTER TABLE `prodis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_a_m_s`
--

DROP TABLE IF EXISTS `r_a_m_s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `r_a_m_s` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_inventaris` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` tinyint(4) NOT NULL,
  `stok` int(10) unsigned NOT NULL DEFAULT 0,
  `full_name` varchar(255) GENERATED ALWAYS AS (concat(`merk`,'-',`tipe`,'-',`kapasitas`,'GB')) VIRTUAL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `r_a_m_s_no_inventaris_unique` (`no_inventaris`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_a_m_s`
--

LOCK TABLES `r_a_m_s` WRITE;
/*!40000 ALTER TABLE `r_a_m_s` DISABLE KEYS */;
INSERT INTO `r_a_m_s` VALUES
(1,'LABKOM/RAM/001/2025','Kingston','DDR4',8,2025,3,13,'Kingston-DDR4-8GB',NULL,NULL),
(2,'LABKOM/RAM/002/2024','Corsair','DDR4',16,2024,10,9,'Corsair-DDR4-16GB',NULL,NULL),
(3,'LABKOM/RAM/003/2023','Crucial','DDR3',4,2023,10,15,'Crucial-DDR3-4GB',NULL,NULL),
(4,'LABKOM/RAM/004/2025','Samsung','DDR4',8,2025,5,17,'Samsung-DDR4-8GB',NULL,NULL),
(5,'LABKOM/RAM/005/2024','ADATA','DDR4',16,2024,8,16,'ADATA-DDR4-16GB',NULL,NULL),
(6,'LABKOM/RAM/006/2023','Team Group','DDR4',8,2023,5,24,'Team Group-DDR4-8GB',NULL,NULL),
(7,'LABKOM/RAM/007/2025','G.Skill','DDR4',16,2025,9,13,'G.Skill-DDR4-16GB',NULL,NULL),
(8,'LABKOM/RAM/008/2024','Patriot','DDR3',8,2024,4,6,'Patriot-DDR3-8GB',NULL,NULL),
(9,'LABKOM/RAM/009/2023','Apacer','DDR4',4,2023,7,10,'Apacer-DDR4-4GB',NULL,NULL),
(10,'LABKOM/RAM/010/2025','V-Gen','DDR4',8,2025,9,30,'V-Gen-DDR4-8GB',NULL,NULL);
/*!40000 ALTER TABLE `r_a_m_s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES
(1,1),
(1,6),
(1,7),
(2,1),
(2,6),
(2,7),
(3,1),
(3,6),
(3,7),
(4,1),
(4,6),
(4,7),
(5,1),
(5,6),
(5,7),
(6,1),
(6,6),
(6,7),
(7,1),
(7,6),
(7,7),
(8,1),
(8,6),
(8,7),
(9,1),
(9,6),
(9,7),
(10,1),
(10,6),
(10,7),
(11,1),
(11,6),
(11,7),
(12,1),
(12,6),
(12,7),
(13,1),
(13,6),
(13,7),
(14,1),
(14,6),
(14,7),
(15,1),
(15,6),
(15,7),
(16,1),
(16,6),
(16,7),
(17,1),
(17,6),
(17,7),
(18,1),
(18,6),
(18,7),
(19,1),
(19,6),
(19,7),
(20,1),
(20,6),
(20,7),
(21,1),
(21,6),
(21,7),
(22,1),
(22,6),
(22,7),
(23,1),
(23,6),
(23,7),
(24,1),
(24,6),
(24,7),
(25,1),
(26,1),
(27,1),
(28,1),
(29,1),
(30,1),
(31,1),
(32,1),
(33,1),
(34,1),
(35,1),
(36,1),
(37,1),
(38,1),
(39,1),
(40,1),
(41,1),
(42,1),
(43,1),
(44,1),
(45,1),
(46,1),
(47,1),
(48,1),
(49,1),
(50,1),
(51,1),
(52,1),
(53,1),
(54,1),
(55,1),
(56,1),
(57,1),
(58,1),
(59,1),
(60,1),
(61,1),
(62,1),
(63,1),
(64,1),
(65,1),
(66,1),
(67,1),
(68,1),
(69,1),
(70,1),
(71,1),
(72,1),
(73,1),
(74,1),
(75,1),
(76,1),
(77,1),
(78,1),
(79,1),
(80,1),
(81,1),
(82,1),
(83,1),
(84,1),
(85,1),
(85,6),
(85,7),
(86,1),
(86,6),
(86,7),
(87,1),
(87,6),
(87,7),
(88,1),
(88,6),
(88,7),
(89,1),
(89,6),
(89,7),
(90,1),
(90,6),
(90,7),
(91,1),
(91,6),
(91,7),
(92,1),
(92,6),
(92,7),
(93,1),
(93,6),
(93,7),
(94,1),
(94,6),
(94,7),
(95,1),
(95,6),
(95,7),
(96,1),
(96,6),
(96,7),
(97,1),
(98,1),
(99,1),
(100,1),
(101,1),
(102,1),
(103,1),
(104,1),
(105,1),
(106,1),
(107,1),
(108,1),
(109,1),
(110,1),
(111,1),
(112,1),
(113,1),
(114,1),
(115,1),
(116,1),
(117,1),
(118,1),
(119,1),
(120,1),
(121,1),
(122,1),
(123,1),
(124,1),
(125,1),
(126,1),
(127,1),
(128,1),
(129,1),
(130,1),
(131,1),
(132,1),
(133,1),
(133,6),
(133,7),
(134,1),
(134,6),
(134,7),
(135,1),
(135,6),
(135,7),
(136,1),
(136,6),
(136,7),
(137,1),
(137,6),
(137,7),
(138,1),
(138,6),
(138,7),
(139,1),
(139,6),
(139,7),
(140,1),
(140,6),
(140,7),
(141,1),
(141,6),
(141,7),
(142,1),
(142,6),
(142,7),
(143,1),
(143,6),
(143,7),
(144,1),
(144,6),
(144,7),
(145,1),
(145,6),
(145,7),
(146,1),
(146,6),
(146,7),
(147,1),
(147,6),
(147,7),
(148,1),
(148,6),
(148,7),
(149,1),
(149,6),
(149,7),
(150,1),
(150,6),
(150,7),
(151,1),
(151,6),
(151,7),
(152,1),
(152,6),
(152,7),
(153,1),
(153,6),
(153,7),
(154,1),
(154,6),
(154,7),
(155,1),
(155,6),
(155,7),
(156,1),
(156,6),
(156,7),
(157,1),
(158,1),
(159,1),
(160,1),
(161,1),
(162,1),
(163,1),
(164,1),
(165,1),
(166,1),
(167,1),
(168,1),
(169,1),
(170,1),
(171,1),
(172,1),
(173,1),
(174,1),
(175,1),
(176,1),
(177,1),
(178,1),
(179,1),
(180,1),
(181,1),
(182,1),
(183,1),
(184,1),
(185,1),
(186,1),
(187,1),
(188,1),
(189,1),
(190,1),
(191,1),
(192,1),
(193,1),
(194,1),
(195,1),
(196,1),
(197,1),
(198,1),
(199,1),
(200,1),
(201,1),
(202,1),
(203,1),
(204,1),
(205,1),
(206,1),
(207,1),
(208,1),
(209,1),
(210,1),
(211,1),
(211,6),
(211,7),
(212,1),
(212,6),
(212,7),
(213,1),
(213,6),
(213,7),
(214,1),
(214,6),
(214,7),
(215,1),
(215,6),
(215,7),
(216,1),
(216,6),
(216,7),
(217,1),
(217,6),
(217,7),
(218,1),
(218,6),
(218,7),
(219,1),
(219,6),
(219,7),
(220,1),
(220,6),
(220,7),
(221,1),
(221,6),
(221,7),
(222,1),
(222,6),
(222,7),
(223,1),
(224,1),
(225,1),
(226,1),
(227,1),
(228,1),
(229,1),
(230,1),
(231,1),
(232,1),
(233,1),
(234,1),
(235,1),
(236,1),
(237,1),
(238,1),
(239,1),
(240,1),
(241,1),
(242,1),
(243,1),
(244,1),
(245,1),
(246,1),
(247,1),
(247,6),
(247,7),
(248,1),
(248,6),
(248,7),
(249,1),
(249,6),
(249,7),
(250,1),
(250,6),
(250,7),
(307,1),
(308,1),
(309,1),
(310,1),
(311,1),
(312,1),
(313,1),
(314,1),
(315,1),
(316,1),
(317,1),
(318,1),
(319,1),
(320,1),
(321,1),
(322,1),
(323,1),
(324,1),
(325,1),
(326,1),
(327,1),
(328,1),
(329,1),
(330,1),
(331,1),
(332,1),
(333,1),
(334,1),
(335,1),
(336,1),
(337,1),
(338,1),
(339,1),
(340,1),
(341,1),
(342,1),
(343,1),
(344,1),
(345,1),
(346,1),
(347,1),
(348,1),
(349,1),
(350,1),
(351,1),
(352,1),
(353,1),
(354,1),
(355,1),
(356,1),
(357,1),
(358,1),
(359,1),
(360,1),
(361,1),
(362,1),
(363,1),
(364,1),
(365,1),
(366,1),
(367,1),
(368,1),
(369,6),
(370,6),
(371,6),
(372,6),
(373,7),
(374,7),
(375,7),
(376,7);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES
(1,'super_admin','web','2025-07-17 22:56:56','2025-07-17 22:56:56'),
(6,'d2a','web','2026-01-29 07:23:05','2026-01-29 07:23:05'),
(7,'d2b','web','2026-01-29 08:12:54','2026-01-29 08:12:54');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `schedules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) unsigned DEFAULT NULL,
  `lecturer_id` bigint(20) unsigned DEFAULT NULL,
  `laboratorium_id` bigint(20) unsigned NOT NULL,
  `time_slot_id` bigint(20) unsigned DEFAULT NULL,
  `duration_slots` int(11) NOT NULL DEFAULT 1,
  `kelompok` varchar(255) DEFAULT NULL,
  `jumlah_siswa` int(10) unsigned DEFAULT NULL,
  `sesi` enum('pagi','siang','malam') DEFAULT NULL,
  `day` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schedules_course_id_foreign` (`course_id`),
  KEY `schedules_lecturer_id_foreign` (`lecturer_id`),
  KEY `schedules_laboratorium_id_foreign` (`laboratorium_id`),
  KEY `schedules_time_slot_id_foreign` (`time_slot_id`),
  CONSTRAINT `schedules_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `schedules_laboratorium_id_foreign` FOREIGN KEY (`laboratorium_id`) REFERENCES `laboratoria` (`id`) ON DELETE CASCADE,
  CONSTRAINT `schedules_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE SET NULL,
  CONSTRAINT `schedules_time_slot_id_foreign` FOREIGN KEY (`time_slot_id`) REFERENCES `time_slots` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES
('cf5hNSy7VlGffnvSQwjTTaIiXaHV5Y4Q7oVIBTdI',1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:150.0) Gecko/20100101 Firefox/150.0','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiTkEwYUZiWGVyYmtMUUFSaXg1MkVMcmtqRTlOOXpIc01zOUxMc0NEQiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ2OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYWRtaW4vc2NoZWR1bGUtdGltZXRhYmxlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJC9YOXBldklEWU1ZN0RkYTI1LzdjLy5JUkhMdTdhVmQ1QW1rVnlleTVtLnY0dFhSeFpidmVPIjtzOjg6ImZpbGFtZW50IjthOjA6e319',1779625944),
('Y9feHhQtOFtn1r3GdQvHYkFDtNNvvHtoX4cc8NzT',1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:150.0) Gecko/20100101 Firefox/150.0','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVzhEVnhkWll2UDZTQ0pqV3dJT0pyVVE2MmVDMEE0M1FEM3pzWEVidCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ2OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYWRtaW4vc2NoZWR1bGUtdGltZXRhYmxlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJC9YOXBldklEWU1ZN0RkYTI1LzdjLy5JUkhMdTdhVmQ1QW1rVnlleTVtLnY0dFhSeFpidmVPIjt9',1780321684);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `software_details`
--

DROP TABLE IF EXISTS `software_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `software_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `versi` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `jenis_lisensi` varchar(255) DEFAULT NULL,
  `nomor_lisensi` varchar(255) DEFAULT NULL,
  `tanggal_kadaluarsa` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `software_details_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `software_details`
--

LOCK TABLES `software_details` WRITE;
/*!40000 ALTER TABLE `software_details` DISABLE KEYS */;
INSERT INTO `software_details` VALUES
(4,'PREMIERE','Adobe Premiere Pro','44.6',NULL,NULL,NULL,NULL,'2026-01-17 00:33:55','2026-01-17 00:50:32'),
(5,'VIM','NeoVim','33',NULL,NULL,NULL,NULL,'2026-01-17 00:34:20','2026-01-17 00:52:34'),
(8,'Word','Microsoft Word',NULL,NULL,NULL,NULL,NULL,'2026-01-17 07:12:22','2026-01-17 07:12:22'),
(9,'VSCODE','Visual Studio Code',NULL,'Code editor untuk Pemrograman Web, Struktur Data, dll',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(10,'ANDROID_STUDIO','Android Studio',NULL,'IDE untuk Proyek Aplikasi Mobile',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(11,'INTELLIJ','IntelliJ IDEA',NULL,'IDE untuk Pemrograman Berorientasi Objek (Java)',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(12,'XAMPP','XAMPP',NULL,'Apache + MySQL + PHP untuk Pemrograman Web Lanjut',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(13,'NODEJS','Node.js',NULL,'JavaScript runtime untuk Pemrograman Sisi Server',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(14,'LARAGON','Laragon',NULL,'Laravel development environment',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(15,'POSTMAN','Postman',NULL,'API testing untuk Pemrograman Web',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(16,'MYSQL','MySQL Workbench',NULL,'Database management untuk Sistem Basis Data',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(17,'DBEAVER','DBeaver',NULL,'Universal database tool untuk Manajemen Basis Data',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(18,'PHPMYADMIN','phpMyAdmin',NULL,'Web-based MySQL administration',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(19,'UNITY','Unity',NULL,'Game engine untuk Pemrograman Game',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(20,'GODOT','Godot Engine',NULL,'Open source game engine',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(21,'UNREAL','Unreal Engine',NULL,'Game engine untuk Pemrograman Game',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(24,'FIGMA','Figma',NULL,'UI/UX design untuk Desain Web',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(26,'BLENDER','Blender',NULL,'3D modeling/animation untuk Pemodelan 3D, Animasi 3D',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(27,'MAYA','Autodesk Maya',NULL,'3D animation untuk Animasi 3D I, Animasi 3D II',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(28,'3DSMAX','3ds Max',NULL,'3D modeling untuk Pemodelan 3D I',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(29,'ZBRUSH','ZBrush',NULL,'Digital sculpting untuk Pemodelan 3D',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(30,'CINEMA4D','Cinema 4D',NULL,'Motion graphics untuk Grafika Gerak',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(31,'TOONBOOM','Toon Boom Harmony',NULL,'2D animation untuk Animasi 2D I',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(32,'ANIMATE','Adobe Animate',NULL,'2D animation untuk Animasi 2D, Grafis Bergerak',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(33,'CLIPSTUDIO','Clip Studio Paint',NULL,'Digital illustration untuk Ilustrasi',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(34,'PROCREATE','Procreate',NULL,'Digital illustration untuk Ilustrasi',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(35,'AFTEREFFECT','Adobe After Effects',NULL,'Motion graphics untuk Efek Visual 2D, Efek Visual 3D',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(36,'DAVINCI','DaVinci Resolve',NULL,'Video editing & color grading',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(38,'SPINE','Spine',NULL,'2D skeletal animation untuk Rigging 2D',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(39,'DRAGONBONES','DragonBones',NULL,'2D rigging tool untuk Rigging 2D',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(40,'PYTHON','Python',NULL,'Programming language untuk Kecerdasan Artifisial Kreatif',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(41,'JUPYTER','Jupyter Notebook',NULL,'Interactive computing untuk AI/ML',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(42,'COMFYUI','ComfyUI',NULL,'AI image generation untuk Kecerdasan Artifisial Kreatif',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(43,'STABLEDIFF','Stable Diffusion',NULL,'AI image generation',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(44,'FLASH','Adobe Flash/Animate',NULL,'Multimedia authoring untuk Multimedia',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(45,'EXCEL','Microsoft Excel',NULL,'Spreadsheet',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(46,'POWERPOINT','Microsoft PowerPoint',NULL,'Presentation',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(47,'CHROME','Google Chrome',NULL,'Web browser untuk testing web',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(48,'FIREFOX','Mozilla Firefox',NULL,'Web browser untuk development',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25'),
(49,'GIT','Git',NULL,'Version control untuk semua mata kuliah pemrograman',NULL,NULL,NULL,'2026-01-24 00:59:25','2026-01-24 00:59:25');
/*!40000 ALTER TABLE `software_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time_slots`
--

DROP TABLE IF EXISTS `time_slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `time_slots` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `slot_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `time_slots_start_time_end_time_unique` (`start_time`,`end_time`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_slots`
--

LOCK TABLES `time_slots` WRITE;
/*!40000 ALTER TABLE `time_slots` DISABLE KEYS */;
INSERT INTO `time_slots` VALUES
(1,'07:00:00','07:50:00',1,'2026-01-12 05:52:30','2026-01-12 05:52:30'),
(2,'07:50:00','08:40:00',2,'2026-01-12 05:52:30','2026-01-12 05:52:30'),
(3,'08:40:00','09:30:00',3,'2026-01-12 05:52:30','2026-01-12 05:52:30'),
(4,'09:30:00','10:20:00',4,'2026-01-12 05:52:30','2026-01-12 05:52:30'),
(5,'10:20:00','11:10:00',5,'2026-01-12 05:52:30','2026-01-12 05:52:30'),
(6,'11:10:00','12:00:00',6,'2026-01-12 05:52:30','2026-01-12 05:52:30'),
(7,'12:30:00','13:20:00',7,'2026-01-12 05:52:30','2026-01-12 05:52:30'),
(8,'13:20:00','14:10:00',8,'2026-01-12 05:52:30','2026-01-12 05:52:30'),
(9,'14:10:00','15:00:00',9,'2026-01-12 05:52:30','2026-01-12 05:52:30'),
(10,'15:00:00','15:50:00',10,'2026-01-12 05:52:30','2026-01-12 05:52:30'),
(11,'16:20:00','17:10:00',12,'2026-01-12 05:52:30','2026-02-22 06:25:41'),
(12,'17:10:00','18:00:00',13,'2026-01-12 05:52:30','2026-02-22 06:25:41'),
(13,'18:30:00','19:20:00',14,'2026-01-12 05:52:30','2026-02-22 06:25:41'),
(14,'19:20:00','20:10:00',15,'2026-01-12 05:52:30','2026-02-22 06:25:41'),
(15,'20:10:00','21:00:00',16,'2026-01-12 05:52:30','2026-02-22 06:25:41'),
(16,'15:30:00','16:20:00',11,'2026-02-22 06:25:41','2026-02-22 06:25:41');
/*!40000 ALTER TABLE `time_slots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_phone` varchar(255) DEFAULT NULL,
  `npp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_npp_unique` (`npp`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'admin','admin@mail.com','081234567890','A11.2022.14079','$2y$12$/X9pevIDYMY7Dda25/7c/.IRHLu7aVd5AmkVyey5m.v4tXRxZbveO',NULL,NULL,NULL,'Super Admin',NULL,NULL,NULL),
(7,'Super Administrator','superadmin@mail.com','081234567890','A11.2022.2022','$2y$12$GjT7P8KThamRdNGorfkuHeV4aIB65OVal67o2ZKLoeGr.zrxkJ8I6',NULL,'2020-01-01',NULL,'Kepala Laboratorium',NULL,'2026-01-29 00:31:12','2026-01-29 00:31:12'),
(8,'admind2a','admind2a@mail.com','0823213213','A11.2022.14090','$2y$12$lm3k/IAV0LU6esS3wwp6UO5F/dZxi7kU6URJEBRbnLHTNoMq24QnG',NULL,NULL,NULL,NULL,NULL,'2026-01-29 07:24:13','2026-01-29 07:24:13');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `v_g_a_s`
--

DROP TABLE IF EXISTS `v_g_a_s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `v_g_a_s` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_inventaris` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `spesifikasi` varchar(255) DEFAULT NULL,
  `kapasitas` int(11) NOT NULL,
  `bulan` tinyint(4) NOT NULL,
  `stok` int(10) unsigned NOT NULL DEFAULT 0,
  `full_name` varchar(255) GENERATED ALWAYS AS (concat(`merk`,'-',`tipe`,'-',`kapasitas`,'GB')) VIRTUAL,
  `tahun` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `v_g_a_s_no_inventaris_unique` (`no_inventaris`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `v_g_a_s`
--

LOCK TABLES `v_g_a_s` WRITE;
/*!40000 ALTER TABLE `v_g_a_s` DISABLE KEYS */;
INSERT INTO `v_g_a_s` VALUES
(1,'LABKOM/VGA/001/2025','NVIDIA','GeForce GT 1030','GDDR5, 64-bit',2,7,20,'NVIDIA-GeForce GT 1030-2GB',2025,NULL,NULL),
(2,'LABKOM/VGA/002/2024','AMD','Radeon RX 550','GDDR5, 128-bit',4,3,16,'AMD-Radeon RX 550-4GB',2024,NULL,NULL),
(3,'LABKOM/VGA/003/2023','NVIDIA','GeForce GTX 1650','GDDR6, 128-bit',4,11,5,'NVIDIA-GeForce GTX 1650-4GB',2023,NULL,NULL),
(4,'LABKOM/VGA/004/2025','AMD','Radeon RX 570','GDDR5, 256-bit',8,11,8,'AMD-Radeon RX 570-8GB',2025,NULL,NULL),
(5,'LABKOM/VGA/005/2024','NVIDIA','GeForce GTX 1050 Ti','GDDR5, 128-bit',4,4,16,'NVIDIA-GeForce GTX 1050 Ti-4GB',2024,NULL,NULL),
(6,'LABKOM/VGA/006/2023','AMD','Radeon RX 6500 XT','GDDR6, 64-bit',4,10,10,'AMD-Radeon RX 6500 XT-4GB',2023,NULL,NULL),
(7,'LABKOM/VGA/007/2025','Intel','Iris Xe Graphics (Integrated)','Integrated with CPU',0,10,25,'Intel-Iris Xe Graphics (Integrated)-0GB',2025,NULL,NULL),
(8,'LABKOM/VGA/008/2024','NVIDIA','Quadro P400','GDDR5, Workstation Card',2,7,2,'NVIDIA-Quadro P400-2GB',2024,NULL,NULL),
(9,'LABKOM/VGA/009/2023','AMD','Radeon Pro WX 2100','GDDR5, Workstation Card',2,1,4,'AMD-Radeon Pro WX 2100-2GB',2023,NULL,NULL),
(10,'LABKOM/VGA/010/2025','NVIDIA','GeForce GT 710','DDR3, 64-bit, Basic Display',2,5,17,'NVIDIA-GeForce GT 710-2GB',2025,NULL,NULL);
/*!40000 ALTER TABLE `v_g_a_s` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-01 20:48:34
