-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for api_barang
DROP DATABASE IF EXISTS `api_barang`;
CREATE DATABASE IF NOT EXISTS `api_barang` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `api_barang`;

-- Dumping structure for table api_barang.barang
DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) NOT NULL DEFAULT '',
  `harga` int(11) NOT NULL DEFAULT '0',
  `kategori` varchar(50) NOT NULL DEFAULT '0',
  `status` enum('bisa dijual','tidak bisa dijual') NOT NULL DEFAULT 'bisa dijual',
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

-- Dumping data for table api_barang.barang: ~0 rows (approximately)
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`id_produk`, `nama_produk`, `harga`, `kategori`, `status`) VALUES
	(6, 'ALCOHOL GEL POLISH CLEANSER GP-CLN01', 12500, 'L QUEENLY', 'bisa dijual'),
	(9, 'ALUMUNIUM FOIL ALL IN ONE BULAT 23mm IM', 1000, 'L MTH AKSESORIS (IM)', 'bisa dijual'),
	(11, 'ALUMUNIUM FOIL ALL IN ONE BULAT 30mm IM', 1000, 'L MTH AKSESORIS (IM)', 'bisa dijual'),
	(12, 'ALUMUNIUM FOIL ALL IN ONE SHEET 250mm IM', 12500, 'L MTH AKSESORIS (IM)', 'tidak bisa dijual'),
	(15, 'ALUMUNIUM FOIL HDPE/PE BULAT 23mm IM', 12500, 'L MTH AKSESORIS (IM)', 'bisa dijual'),
	(17, 'ALUMUNIUM FOIL HDPE/PE BULAT 30mm IM', 1000, 'L MTH AKSESORIS (IM)', 'bisa dijual'),
	(18, 'ALUMUNIUM FOIL HDPE/PE SHEET 250mm IM', 13000, 'L MTH AKSESORIS (IM)', 'tidak bisa dijual'),
	(19, 'ALUMUNIUM FOIL PET SHEET 250mm IM', 1000, 'L MTH AKSESORIS (IM)', 'tidak bisa dijual'),
	(22, 'ARM PENDEK MODEL U', 13000, 'L MTH AKSESORIS (IM)', 'bisa dijual'),
	(23, 'ARM SUPPORT KECIL', 13000, 'L MTH TABUNG (LK)', 'tidak bisa dijual'),
	(24, 'ARM SUPPORT KOTAK PUTIH', 13000, 'L MTH AKSESORIS (IM)', 'tidak bisa dijual'),
	(26, 'ARM SUPPORT PENDEK POLOS', 13000, 'L MTH TABUNG (LK)', 'bisa dijual'),
	(27, 'ARM SUPPORT S IM', 1000, 'L MTH AKSESORIS (IM)', 'tidak bisa dijual'),
	(28, 'ARM SUPPORT T (IMPORT)', 13000, 'L MTH AKSESORIS (IM)', 'bisa dijual'),
	(29, 'ARM SUPPORT T - MODEL 1 ( LOKAL )', 10000, 'L MTH TABUNG (LK)', 'bisa dijual'),
	(50, 'BLACK LASER TONER FP-T3 (100gr)', 13000, 'L MTH AKSESORIS (IM)', 'tidak bisa dijual'),
	(56, 'BODY PRINTER CANON IP2770', 500, 'SP MTH SPAREPART (LK)', 'bisa dijual'),
	(58, 'BODY PRINTER T13X', 15000, 'SP MTH SPAREPART (LK)', 'bisa dijual'),
	(59, 'BOTOL 1000ML BLUE KHUSUS UNTUK EPSON R1800/R800 - 4180 IM (T054920)', 10000, 'CI MTH TINTA LAIN (IM)', 'bisa dijual'),
	(60, 'BOTOL 1000ML CYAN KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4120 IM (T054220)', 10000, 'CI MTH TINTA LAIN (IM)', 'tidak bisa dijual'),
	(61, 'BOTOL 1000ML GLOSS OPTIMIZER KHUSUS UNTUK EPSON R1800/R800/R1900/R2000/IX7000/MG6170 - 4100 IM (T054020)', 1500, 'CI MTH TINTA LAIN (IM)', 'bisa dijual'),
	(62, 'BOTOL 1000ML L.LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0599 IM', 1500, 'CI MTH TINTA LAIN (IM)', 'tidak bisa dijual'),
	(63, 'BOTOL 1000ML LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0597 IM', 1500, 'CI MTH TINTA LAIN (IM)', 'tidak bisa dijual'),
	(64, 'BOTOL 1000ML MAGENTA KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4140 IM (T054320)', 1000, 'CI MTH TINTA LAIN (IM)', 'bisa dijual'),
	(65, 'BOTOL 1000ML MATTE BLACK KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 3503 IM (T054820)', 1500, 'CI MTH TINTA LAIN (IM)', 'tidak bisa dijual'),
	(66, 'BOTOL 1000ML ORANGE KHUSUS UNTUK EPSON R1900/R2000 IM - 4190 (T087920)', 1500, 'CI MTH TINTA LAIN (IM)', 'bisa dijual'),
	(67, 'BOTOL 1000ML RED KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4170 IM (T054720)', 1000, 'CI MTH TINTA LAIN (IM)', 'tidak bisa dijual'),
	(68, 'BOTOL 1000ML YELLOW KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4160 IM (T054420)', 1500, 'CI MTH TINTA LAIN (IM)', 'tidak bisa dijual'),
	(70, 'BOTOL KOTAK 100ML LK', 1000, 'L MTH AKSESORIS (LK)', 'bisa dijual'),
	(72, 'BOTOL 10ML IM', 1000, 'S MTH STEMPEL (IM)', 'tidak bisa dijual');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
