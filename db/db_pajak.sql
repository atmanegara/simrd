-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.3.9-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6337
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_bpprd
CREATE DATABASE IF NOT EXISTS `db_bpprd` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_bpprd`;

-- Dumping structure for table db_bpprd.dtl_pemohon_reklame
CREATE TABLE IF NOT EXISTS `dtl_pemohon_reklame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nokartu` char(50) DEFAULT NULL,
  `id_detail_pemohon` int(11) DEFAULT NULL,
  `ukuran1` int(11) DEFAULT NULL,
  `satuan1` char(50) DEFAULT NULL,
  `ukuran2` int(11) DEFAULT NULL,
  `satuan2` char(50) DEFAULT NULL,
  `sisi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nokartu` (`nokartu`),
  KEY `id_detail_pemohon` (`id_detail_pemohon`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_bpprd.dtl_pemohon_reklame: ~0 rows (approximately)
/*!40000 ALTER TABLE `dtl_pemohon_reklame` DISABLE KEYS */;
/*!40000 ALTER TABLE `dtl_pemohon_reklame` ENABLE KEYS */;

-- Dumping structure for table db_bpprd.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_bpprd.migration: ~2 rows (approximately)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1500331773),
	('m130524_201442_init', 1500331776);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- Dumping structure for table db_bpprd.tbl_biaya
CREATE TABLE IF NOT EXISTS `tbl_biaya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_detail_pemohon` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_bpprd.tbl_biaya: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_biaya` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_biaya` ENABLE KEYS */;

-- Dumping structure for table db_bpprd.tbl_detail_kawasan
CREATE TABLE IF NOT EXISTS `tbl_detail_kawasan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kawasan` int(11) DEFAULT NULL,
  `nama_jalan` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Dumping data for table db_bpprd.tbl_detail_kawasan: ~31 rows (approximately)
/*!40000 ALTER TABLE `tbl_detail_kawasan` DISABLE KEYS */;
INSERT INTO `tbl_detail_kawasan` (`id`, `id_kawasan`, `nama_jalan`) VALUES
	(1, 1, 'Jalan  A.Yani (Kawasan Terminal dan Pasar Pt.Hambawang  s/d Simpang 3 Burung Anggang)'),
	(2, 1, 'Jalan lingkar (Simpang 3 Walangsi s/d Simpang 3 Kapar)  '),
	(3, 1, 'Jalan Murakata '),
	(4, 1, 'Jalan H.M.Syarkawi'),
	(5, 1, 'Jalan Pangeran Antasari'),
	(6, 1, 'Jalan  H. Abdul Muis Ridhani s/d Simpang 3 Kapar'),
	(7, 1, 'Jalan  Keramat Manjang dan Putera Harapan'),
	(8, 1, 'Jalan  Ir.PHM. Noor (Simpang 3 Telaga Air Mata menuju ke muka Kantor POS )'),
	(9, 1, 'Jalan  Ir.PHM. Noor (Simpang 3 jalan  H.Damanhuri/Mesjid Agung, jalan Bintara  menuju Simpang 3 Sungai Tabuk)'),
	(10, 1, 'Sepanjang jalan Kampung Melayu dan jalan Surapati'),
	(11, 1, 'Jalan  B.H.Hasan Baseri (Depan Ex Bioskop Juwita  s/d Simpang 3 Burung Anggang)'),
	(12, 1, 'Seputar kawasan Pertokoan Murakata dan Plaza Murakata'),
	(13, 1, 'Kawasan Pasar Karamat ( Pintu Masuk Terminal s/d Bundaran/Muka Bank Danamon)'),
	(14, 1, 'Kawasan Pasar Karamat ( Pintu Keluar Terminal/Muka SPBU)'),
	(15, 2, 'Jalan  Pasar I'),
	(16, 2, 'Jalan  Pasar II'),
	(17, 2, 'Jalan  Pasar III'),
	(18, 2, 'Jalan  Bhima'),
	(19, 2, 'Jalan  Kemasan'),
	(20, 2, 'Jalan Ulama'),
	(21, 2, 'Jalan  Sarigading'),
	(22, 2, 'Jalan  Telaga Padawangan'),
	(23, 3, 'Jalan  SMP'),
	(24, 3, 'Jalan  Muallimin'),
	(25, 3, 'Jalan  M.Ramli'),
	(26, 3, 'Jalan  Tri Kesuma'),
	(27, 3, 'Jalan  Hevia'),
	(28, 3, 'Jalan  Sibli Imansyah'),
	(29, 3, 'Jalan  Hevea Baru s/d Lapangan Pelajar'),
	(30, 3, 'Jalan Perintis Kemerdekaan (Jembatan Shulaha s/d Simpang 3 Aluan Desa Benawa Tengah)'),
	(31, 4, 'Dalam wilayah kecamatan, diluar kawasan I, II dan III');
/*!40000 ALTER TABLE `tbl_detail_kawasan` ENABLE KEYS */;

-- Dumping structure for table db_bpprd.tbl_detail_pemohon
CREATE TABLE IF NOT EXISTS `tbl_detail_pemohon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemohon` int(11) DEFAULT 0,
  `id_reklame` int(11) DEFAULT 0,
  `nokartu` char(50) DEFAULT NULL,
  `ukuran1` float DEFAULT 0,
  `satuan1` varchar(50) DEFAULT '0',
  `ukuran2` float DEFAULT 0,
  `satuan2` varchar(50) DEFAULT '0',
  `banyak` int(11) DEFAULT 0,
  `waktu_mulai` date DEFAULT NULL,
  `waktu_akhir` date DEFAULT NULL,
  `lokasi` varchar(350) DEFAULT '0',
  `teks` varchar(350) DEFAULT '0',
  `path_gambar` varchar(350) DEFAULT '0',
  `status` int(11) DEFAULT 0,
  `sisi` double DEFAULT 0,
  `status_reklame` varchar(50) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_reklame` (`id_reklame`),
  KEY `nokartu` (`nokartu`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table db_bpprd.tbl_detail_pemohon: ~7 rows (approximately)
/*!40000 ALTER TABLE `tbl_detail_pemohon` DISABLE KEYS */;
INSERT INTO `tbl_detail_pemohon` (`id`, `id_pemohon`, `id_reklame`, `nokartu`, `ukuran1`, `satuan1`, `ukuran2`, `satuan2`, `banyak`, `waktu_mulai`, `waktu_akhir`, `lokasi`, `teks`, `path_gambar`, `status`, `sisi`, `status_reklame`, `tahun`) VALUES
	(6, 10, 1, NULL, 12, 'as', 12, 's', 12, NULL, NULL, '0', '12', 'module_table_bottom.png', 1, 12, NULL, 2017),
	(7, 10, 1, NULL, 12, 'asd', 12, 'sad', 12, NULL, NULL, '0', '12', 'module_table_top.png', 0, 12, NULL, 2017),
	(8, 10, 1, NULL, NULL, '', NULL, '', NULL, NULL, NULL, '0', '', 'module_table_bottom.png', 0, NULL, NULL, 2017),
	(9, 13, 1, NULL, 12, 'ad', 12, 'ad', 12, NULL, NULL, '0', 'fefe', 'module_table_bottom.png', 0, 12, NULL, 2017),
	(10, 15, 2, NULL, 12, 'm', 12, 'm', 12, '2017-07-11', '2017-07-02', 'adsad', 'sad', 'module_table_bottom.png', 0, 12, NULL, NULL),
	(12, 17, 3, NULL, 12, 'm', 12, 'm', 12, '2017-07-04', '2017-07-11', 'asda', '1212', 'xampp-windows-start.jpg', 1, 12, NULL, NULL),
	(13, 10, 1, NULL, 1, 'cm', 2, 'buah', 2, NULL, NULL, '0', 'asd', 'kay-vogelgesang.jpg', 0, 12, NULL, NULL);
/*!40000 ALTER TABLE `tbl_detail_pemohon` ENABLE KEYS */;

-- Dumping structure for table db_bpprd.tbl_dinas
CREATE TABLE IF NOT EXISTS `tbl_dinas` (
  `id` char(160) DEFAULT NULL,
  `kode_dinas` char(160) DEFAULT NULL,
  `nama_dinas` char(160) DEFAULT NULL,
  `alamat_dinas` char(160) DEFAULT NULL,
  `prov_dinas` char(160) DEFAULT NULL,
  `kab_dinas` char(160) DEFAULT NULL,
  `notlp_dinas` char(160) DEFAULT NULL,
  `email_dinas` char(160) DEFAULT NULL,
  `nmkepala_dinas` char(160) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table db_bpprd.tbl_dinas: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_dinas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_dinas` ENABLE KEYS */;

-- Dumping structure for table db_bpprd.tbl_hak_akses
CREATE TABLE IF NOT EXISTS `tbl_hak_akses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `akses` varchar(25) NOT NULL,
  `desc` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Dumping data for table db_bpprd.tbl_hak_akses: 5 rows
/*!40000 ALTER TABLE `tbl_hak_akses` DISABLE KEYS */;
INSERT INTO `tbl_hak_akses` (`id`, `akses`, `desc`) VALUES
	(1, 'admin_ptsp', 'Admin PTSP, input data pemohon'),
	(2, 'admin_bpprd', 'Admin BPPRD, cetak data pemohon dan biaya'),
	(20, 'superadmin', 'Super Admin'),
	(3, 'validasi_ptsp', '-'),
	(4, 'pemohon', '-');
/*!40000 ALTER TABLE `tbl_hak_akses` ENABLE KEYS */;

-- Dumping structure for table db_bpprd.tbl_jenis_reklame
CREATE TABLE IF NOT EXISTS `tbl_jenis_reklame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(250) DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table db_bpprd.tbl_jenis_reklame: ~14 rows (approximately)
/*!40000 ALTER TABLE `tbl_jenis_reklame` DISABLE KEYS */;
INSERT INTO `tbl_jenis_reklame` (`id`, `jenis`, `keterangan`) VALUES
	(1, 'Billboard', NULL),
	(2, 'Baliho', NULL),
	(3, 'Neon Box / Sign', NULL),
	(4, 'Bando', NULL),
	(5, 'Megatron', NULL),
	(6, 'Videotron/L E D', NULL),
	(7, 'Reklame Kain (Spanduk/Umbul-umbul/Banner) ', NULL),
	(8, 'Reklame Slide/film', NULL),
	(9, 'Reklame Suara', NULL),
	(10, 'Reklame Selebaran', NULL),
	(11, 'Reklame Melekat (Stiker)', NULL),
	(12, 'Reklame Berjalan', NULL),
	(13, 'Reklame Udara/Balon', NULL),
	(14, 'Reklame Peragaan', NULL);
/*!40000 ALTER TABLE `tbl_jenis_reklame` ENABLE KEYS */;

-- Dumping structure for table db_bpprd.tbl_kawasan
CREATE TABLE IF NOT EXISTS `tbl_kawasan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `keterangan` varchar(50) NOT NULL DEFAULT '0',
  `persen` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_bpprd.tbl_kawasan: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_kawasan` DISABLE KEYS */;
INSERT INTO `tbl_kawasan` (`id`, `nama`, `keterangan`, `persen`) VALUES
	(1, 'KAWASAN I', '-', 50),
	(2, 'KAWASAN II', '-', 35),
	(3, 'KAWASAN III', '-', 25),
	(4, 'KAWASAN IV', '-', 15);
/*!40000 ALTER TABLE `tbl_kawasan` ENABLE KEYS */;

-- Dumping structure for table db_bpprd.tbl_log
CREATE TABLE IF NOT EXISTS `tbl_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `activity` varchar(250) NOT NULL,
  `keterangan` varchar(350) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_bpprd.tbl_log: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_log` ENABLE KEYS */;

-- Dumping structure for table db_bpprd.tbl_pemohon
CREATE TABLE IF NOT EXISTS `tbl_pemohon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik_npwp` varchar(50) DEFAULT NULL,
  `nama` varchar(70) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `alamat` varchar(350) DEFAULT NULL,
  `nope` varchar(350) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nik_npwp` (`nik_npwp`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table db_bpprd.tbl_pemohon: ~7 rows (approximately)
/*!40000 ALTER TABLE `tbl_pemohon` DISABLE KEYS */;
INSERT INTO `tbl_pemohon` (`id`, `nik_npwp`, `nama`, `jabatan`, `alamat`, `nope`, `id_user`) VALUES
	(6, NULL, NULL, NULL, NULL, NULL, NULL),
	(10, '00001', 'asda', 'pribadi', 'Palsu', NULL, 1),
	(13, '111', 'cibu', '-', 'jybar', NULL, 2),
	(14, '10000', 'jiji', '-', 'alamat', NULL, NULL),
	(15, '1212asda', 'asd', '-', 'ad', NULL, NULL),
	(16, '1212', 'asd', 'ad', 'sdadsa', NULL, NULL),
	(17, '1234', 'koko', '-', 'alamat', NULL, NULL);
/*!40000 ALTER TABLE `tbl_pemohon` ENABLE KEYS */;

-- Dumping structure for table db_bpprd.tbl_pengguna
CREATE TABLE IF NOT EXISTS `tbl_pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `id_hak_akses` int(10) NOT NULL DEFAULT 0,
  `modified` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `notelp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_username` (`username`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=193 DEFAULT CHARSET=latin1;

-- Dumping data for table db_bpprd.tbl_pengguna: 1 rows
/*!40000 ALTER TABLE `tbl_pengguna` DISABLE KEYS */;
INSERT INTO `tbl_pengguna` (`id`, `nama`, `email`, `username`, `password`, `id_hak_akses`, `modified`, `created`, `foto`, `notelp`) VALUES
	(192, 'Yusof Zaky', 'zakyyusof@gmail.com', 'zaky', '1234', 1, '2017-06-14 12:50:34', '2017-06-14 12:50:36', NULL, NULL);
/*!40000 ALTER TABLE `tbl_pengguna` ENABLE KEYS */;

-- Dumping structure for table db_bpprd.tbl_registrasi
CREATE TABLE IF NOT EXISTS `tbl_registrasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_detail_pemohon` int(11) DEFAULT NULL,
  `nokartu` char(50) DEFAULT NULL,
  `tglreg` date DEFAULT NULL,
  `cara` int(1) DEFAULT NULL COMMENT '1=Online,2=Manual',
  PRIMARY KEY (`id`),
  KEY `id_pemohon` (`id_detail_pemohon`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_bpprd.tbl_registrasi: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_registrasi` DISABLE KEYS */;
INSERT INTO `tbl_registrasi` (`id`, `id_detail_pemohon`, `nokartu`, `tglreg`, `cara`) VALUES
	(1, 11, 'RKL19072017060724834', '0000-00-00', 2),
	(2, NULL, 'RKL19072017080703538', '1970-08-09', 2),
	(3, 12, 'RKL19072017080707962', '1970-08-09', 2),
	(4, 13, 'RKL20072017040703606', '0000-00-00', 1);
/*!40000 ALTER TABLE `tbl_registrasi` ENABLE KEYS */;

-- Dumping structure for table db_bpprd.tbl_sewa
CREATE TABLE IF NOT EXISTS `tbl_sewa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis_reklame` int(11) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `harga_dasar` int(11) DEFAULT NULL,
  `masa_pajak` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table db_bpprd.tbl_sewa: ~20 rows (approximately)
/*!40000 ALTER TABLE `tbl_sewa` DISABLE KEYS */;
INSERT INTO `tbl_sewa` (`id`, `id_jenis_reklame`, `satuan`, `harga_dasar`, `masa_pajak`) VALUES
	(1, 1, 'M2', 165000, 's/d 3 bulan'),
	(2, 1, 'M2', 275000, 'lebih 3 bulan s/d 6 bulan'),
	(3, 1, 'M2', 440000, 'lebih 6 bulan s/d 12 bulan'),
	(4, 2, 'M2', 165000, 's/d 3 bulan'),
	(5, 2, 'M2', 275000, 'lebih 3 bulan s/d 6 bulan'),
	(6, 2, 'M2', 440000, 'lebih 6 bulan s/d 12 bulan'),
	(7, 3, 'M2', 165000, 's/d 3 bulan'),
	(8, 3, 'M2', 275000, 'lebih 3 bulan s/d 6 bulan'),
	(9, 3, 'M2', 440000, 'lebih 6 bulan s/d 12 bulan'),
	(10, 4, 'M2', 500000, '1 Tahun'),
	(11, 5, 'M2', 1875000, '1 Tahun'),
	(12, 6, 'M2', 2625000, '1 Tahun'),
	(13, 7, 'M2', 2500, 'Per hari '),
	(14, 8, 'Per buah', 4000, 'Per Menit'),
	(15, 9, 'Per buah', 2500, 'Per Menit'),
	(16, 10, 'Per 100 Lembar', 40000, '1 Kali'),
	(17, 11, 'Per 100 Lembar', 48000, '1 Kali'),
	(18, 12, 'Per buah', 112500, '1 Hari'),
	(19, 13, 'Per buah', 375000, ' 1 Bulan'),
	(20, 14, 'Per buah', 75000, 'Per hari ');
/*!40000 ALTER TABLE `tbl_sewa` ENABLE KEYS */;

-- Dumping structure for table db_bpprd.tbl_skpd
CREATE TABLE IF NOT EXISTS `tbl_skpd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_detail_pemohon` int(11) DEFAULT NULL,
  `id_kawasan` int(11) DEFAULT NULL,
  `id_sewa` int(11) DEFAULT NULL,
  `npwp_d` varchar(50) DEFAULT NULL,
  `bunga` int(11) DEFAULT NULL,
  `kenaikan` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `sisi` int(11) DEFAULT NULL,
  `kali` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_bpprd.tbl_skpd: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_skpd` DISABLE KEYS */;
INSERT INTO `tbl_skpd` (`id`, `id_detail_pemohon`, `id_kawasan`, `id_sewa`, `npwp_d`, `bunga`, `kenaikan`, `subtotal`, `no_urut`, `sisi`, `kali`) VALUES
	(1, 1, 1, 1, 'p.63.07.41104.00099', 0, 0, 0, 1, 1, NULL),
	(2, 12, 1, 7, NULL, NULL, NULL, 1710720000, NULL, NULL, NULL);
/*!40000 ALTER TABLE `tbl_skpd` ENABLE KEYS */;

-- Dumping structure for table db_bpprd.tbl_status
CREATE TABLE IF NOT EXISTS `tbl_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_bpprd.tbl_status: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_status` DISABLE KEYS */;
INSERT INTO `tbl_status` (`id`, `status`, `keterangan`) VALUES
	(1, 'pending', 'Proses ditolak oleh verifikator (Kelengkapan belum lengkap atau tidak diperbolehkan)'),
	(2, 'proses', 'Proses sedang berada di pihak BPPRD, menunggu kuitansi keluar'),
	(3, 'selesai', 'Proses sudah selesai'),
	(4, 'menunggu', 'Proses sedang menunggu verifikasi');
/*!40000 ALTER TABLE `tbl_status` ENABLE KEYS */;

-- Dumping structure for table db_bpprd.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `role` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_bpprd.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'atmanegara', 'HAWD9a5WmxKri_bqfItWFjJxvdQF3DZV', '$2y$13$U4C1feNDNNK7UUjWrQM6l.2dq5GVVEvrZRY33X68rHmt4OqmP53XK', 'fFFdOJogEPfPgvC-Q1zINb4uaj0ce8xv_1500331969', 'atmanegara1989@gmail.com', 10, 10, 1500331876, 1500331969),
	(2, 'cibuhabu', '9xcPEY5zycyMsgJc5rRpCc4IFu_r_6r3', '$2y$13$31kyBIy93lrXISk2kVIua.1colBwIe7DsJ4B6DvEvJ9cT2WHg47S6', NULL, 'atmanegara1989@ccc.bb', 10, 10, 1500470540, 1500470540);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
