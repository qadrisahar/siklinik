-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 09, 2020 at 03:14 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `alkes`
--

CREATE TABLE `alkes` (
  `id_alkes` varchar(30) NOT NULL,
  `id_kategori` varchar(30) NOT NULL,
  `id_satuan` varchar(30) NOT NULL,
  `isi` smallint(6) NOT NULL,
  `id_unit` varchar(30) NOT NULL,
  `kode_alkes` varchar(20) NOT NULL,
  `nama_alkes` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alkes`
--

INSERT INTO `alkes` (`id_alkes`, `id_kategori`, `id_satuan`, `isi`, `id_unit`, `kode_alkes`, `nama_alkes`, `harga_beli`, `harga_jual`, `w_insert`, `w_update`, `updated_by`) VALUES
('OB-5f2ff08f5bd5d', 'KT-5f2ff0276cae1', 'Buah', 5, 'unit', '1', 'Jarum', 10000, 12000, '2020-08-09 20:48:15', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('OB-5f2ff46d4eedb', 'KT-5f2ff0276cae1', 'Buah', 8, 'unit', '1234', '8', 10000, 13000, '2020-08-09 21:04:45', '2020-08-09 21:04:58', 'UR-5f0ad99e7c4fd');

--
-- Triggers `alkes`
--
DELIMITER $$
CREATE TRIGGER `insert_data_stok_alkes` AFTER INSERT ON `alkes` FOR EACH ROW BEGIN
  INSERT IGNORE INTO stok_alkes(kode_alkes,stok) VALUES(NEW.kode_alkes,'0');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_data_stok_alkes` AFTER UPDATE ON `alkes` FOR EACH ROW BEGIN
  INSERT IGNORE INTO stok_alkes(kode_alkes,stok) VALUES(NEW.kode_alkes,'0');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id` varchar(30) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `id_provinsi` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id`, `nama`, `id_provinsi`) VALUES
('identitas', 'Mysmartteam', '71');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_alkes`
--

CREATE TABLE `kategori_alkes` (
  `id_kategori` varchar(30) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_alkes`
--

INSERT INTO `kategori_alkes` (`id_kategori`, `kategori`, `w_insert`, `w_update`, `updated_by`) VALUES
('KT-5f2ff0276cae1', 'Alat', '2020-08-09 20:46:31', '2020-08-09 12:46:31', 'UR-5f0ad99e7c4fd');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_obat`
--

CREATE TABLE `kategori_obat` (
  `id_kategori` varchar(30) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_obat`
--

INSERT INTO `kategori_obat` (`id_kategori`, `kategori`, `w_insert`, `w_update`, `updated_by`) VALUES
('KT-5f0c70119781d', 'Flu & Batuk', '2020-07-13 22:30:41', '2020-07-13 14:30:41', 'UR-5f0ad99e7c4fd'),
('KT-5f0c7085e9695', 'Demam Berdarah', '2020-07-13 22:32:37', '2020-07-13 14:32:37', 'UR-5f0ad99e7c4fd'),
('KT-5f10ea8a21681', 'Sakit Kepala', '2020-07-17 08:02:18', '2020-07-17 00:02:18', 'UR-5f0ad99e7c4fd'),
('KT-5f10ea902f589', 'Demam', '2020-07-17 08:02:24', '2020-07-17 00:02:24', 'UR-5f0ad99e7c4fd'),
('KT-5f10eaaac2dfe', 'Batuk Berdahak', '2020-07-17 08:02:50', '2020-07-17 00:02:50', 'UR-5f0ad99e7c4fd');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` varchar(50) NOT NULL,
  `layanan` varchar(50) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `layanan`, `w_insert`, `w_update`, `updated_by`) VALUES
('imunisasi', 'Imunisasi bede', '2020-07-30 22:48:26', '2020-07-31 22:14:03', 'UR-5f0ad99e7c4fd'),
('umum', 'Umum', '2020-07-30 22:48:19', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd');

-- --------------------------------------------------------

--
-- Table structure for table `layanan_imunisasi_bayi`
--

CREATE TABLE `layanan_imunisasi_bayi` (
  `no_registrasi` varchar(30) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL,
  `makan` enum('YA','TIDAK') DEFAULT NULL,
  `kuese` varchar(34) DEFAULT NULL,
  `tess` enum('MAKAN','KUE') DEFAULT NULL,
  `eeee` enum('IIII','HDHJSF') DEFAULT NULL,
  `uyi` varchar(50) DEFAULT NULL,
  `bbjb` varchar(78) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `layanan_imunisasi_bayi`
--

INSERT INTO `layanan_imunisasi_bayi` (`no_registrasi`, `w_insert`, `w_update`, `updated_by`, `makan`, `kuese`, `tess`, `eeee`, `uyi`, `bbjb`) VALUES
('REG-20200719-001', '2020-08-04 22:25:48', '2020-08-04 22:46:54', 'UR-5f0ad99e7c4fd', 'TIDAK', 'qqqq', 'MAKAN', 'HDHJSF', 'dfsfdfdsdfsfdsdf', 'dssfdsdf');

-- --------------------------------------------------------

--
-- Table structure for table `layanan_imunisasi_data-obsertik`
--

CREATE TABLE `layanan_imunisasi_data-obsertik` (
  `no_registrasi` varchar(30) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL,
  `xhhhh` varchar(100) DEFAULT NULL,
  `pilih` enum('MAKAN','MINUM') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `layanan_imunisasi_data-obsertik`
--

INSERT INTO `layanan_imunisasi_data-obsertik` (`no_registrasi`, `w_insert`, `w_update`, `updated_by`, `xhhhh`, `pilih`) VALUES
('REG-20200719-001', '2020-08-04 22:26:57', '2020-08-04 22:47:06', 'UR-5f0ad99e7c4fd', 'sdsfsdfsfd', 'MAKAN');

-- --------------------------------------------------------

--
-- Table structure for table `layanan_lainlain`
--

CREATE TABLE `layanan_lainlain` (
  `id` varchar(30) NOT NULL,
  `no_registrasi` varchar(30) NOT NULL,
  `lainlain` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan_lainlain`
--

INSERT INTO `layanan_lainlain` (`id`, `no_registrasi`, `lainlain`, `total`, `w_insert`, `w_update`, `updated_by`) VALUES
('ID-5f2f834088290', 'REG-20200724-004', 'kyiuyiuy', 7687, '2020-08-09 13:01:52', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd');

-- --------------------------------------------------------

--
-- Table structure for table `layanan_log_exc`
--

CREATE TABLE `layanan_log_exc` (
  `id` int(11) NOT NULL,
  `aksi` varchar(100) NOT NULL,
  `updated_by` varchar(30) NOT NULL,
  `w_insert` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `layanan_log_exc`
--

INSERT INTO `layanan_log_exc` (`id`, `aksi`, `updated_by`, `w_insert`) VALUES
(1, 'Update layanan uuuu menjadi uuuu', 'UR-5f0ad99e7c4fd', '2020-07-30 23:11:12'),
(2, 'Hapus Layanan uuuu', 'UR-5f0ad99e7c4fd', '2020-07-30 23:11:37'),
(3, 'Tambah Layanan hgghg', 'UR-5f0ad99e7c4fd', '2020-07-30 23:11:51'),
(4, 'Hapus Layanan hgghg', 'UR-5f0ad99e7c4fd', '2020-07-30 23:12:02'),
(5, 'Tambah layanan data layanan_umum_uuuuu', 'UR-5f0ad99e7c4fd', '2020-07-31 00:51:39'),
(6, 'Update layanan data layanan_umum_uuuuu menjadi lay', 'UR-5f0ad99e7c4fd', '2020-07-31 00:51:59'),
(7, 'Update layanan data layanan_umum_uuuuu uuuuu menjadi layanan_umum_uuuuu hhh', 'UR-5f0ad99e7c4fd', '2020-07-31 00:53:07'),
(8, 'Update layanan data layanan_umum_uuuuu hhh menjadi layanan_umum_uuuuu-hhh', 'UR-5f0ad99e7c4fd', '2020-07-31 00:55:27'),
(9, 'Update layanan data layanan_umum_uuuuu-hhh menjadi layanan_umum_makanan-jadi', 'UR-5f0ad99e7c4fd', '2020-07-31 00:58:16'),
(10, 'Hapus layanan data layanan_umum_makanan-jadi', 'UR-5f0ad99e7c4fd', '2020-07-31 00:59:05'),
(11, 'Tambah layanan data layanan_imunisasi_bayi', 'UR-5f0ad99e7c4fd', '2020-07-31 14:18:59'),
(12, 'Update layanan imunisasi menjadi Imunisasi bede', 'UR-5f0ad99e7c4fd', '2020-07-31 22:14:03'),
(13, 'Tambah layanan data detail tes, Tabel layanan_imunisasi_bayi', 'UR-5f0ad99e7c4fd', '2020-07-31 22:36:39'),
(14, 'Update layanan data detail tes, Tabel layanan_imunisasi_bayi', 'UR-5f0ad99e7c4fd', '2020-07-31 22:36:46'),
(15, 'Hapus layanan data detail tes, Tabel layanan_imunisasi_bayi', 'UR-5f0ad99e7c4fd', '2020-07-31 22:36:50'),
(16, 'Tambah layanan data layanan_imunisasi_data-obsertik', 'UR-5f0ad99e7c4fd', '2020-08-03 23:20:06'),
(17, 'Update layanan data layanan_imunisasi_data-obsertik menjadi layanan_imunisasi_data-bayi', 'UR-5f0ad99e7c4fd', '2020-08-03 23:29:56'),
(18, 'Update layanan data layanan_imunisasi_data-bayi menjadi layanan_imunisasi_data-obsertik', 'UR-5f0ad99e7c4fd', '2020-08-03 23:30:21'),
(19, 'Tambah layanan data detail xhhhh, Tabel layanan_imunisasi_data-obsertik', 'UR-5f0ad99e7c4fd', '2020-08-04 09:58:26'),
(20, 'Tambah layanan data detail pilih_mki, Tabel layanan_imunisasi_data-obsertik', 'UR-5f0ad99e7c4fd', '2020-08-04 09:58:42'),
(21, 'Tambah layanan data layanan__', 'UR-5f0ad99e7c4fd', '2020-08-04 22:08:21'),
(22, 'Tambah layanan data layanan__', 'UR-5f0ad99e7c4fd', '2020-08-04 22:08:27'),
(23, 'Tambah layanan data layanan__', 'UR-5f0ad99e7c4fd', '2020-08-04 22:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `layanan_obat`
--

CREATE TABLE `layanan_obat` (
  `id` varchar(30) NOT NULL,
  `no_registrasi` varchar(30) NOT NULL,
  `kode_obat` varchar(30) NOT NULL,
  `jumlah` int(8) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan_obat`
--

INSERT INTO `layanan_obat` (`id`, `no_registrasi`, `kode_obat`, `jumlah`, `harga_jual`, `total`, `keterangan`, `w_insert`, `w_update`, `updated_by`) VALUES
('ID-5f2f525348b05', 'REG-20200724-004', 'PRC001', 1, 10000, 10000, 'sdfs', '2020-08-09 09:33:07', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd');

--
-- Triggers `layanan_obat`
--
DELIMITER $$
CREATE TRIGGER `lo_delete` BEFORE DELETE ON `layanan_obat` FOR EACH ROW BEGIN
   UPDATE stok SET stok=stok+OLD.jumlah WHERE kode_obat=OLD.kode_obat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `lo_insert` AFTER INSERT ON `layanan_obat` FOR EACH ROW BEGIN
  UPDATE stok SET stok=stok-NEW.jumlah WHERE kode_obat=NEW.kode_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `layanan_tindakan_khusus`
--

CREATE TABLE `layanan_tindakan_khusus` (
  `id` varchar(30) NOT NULL,
  `no_registrasi` varchar(30) NOT NULL,
  `tindakan_khusus` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan_tindakan_khusus`
--

INSERT INTO `layanan_tindakan_khusus` (`id`, `no_registrasi`, `tindakan_khusus`, `total`, `w_insert`, `w_update`, `updated_by`) VALUES
('ID-5f2f835e138ed', 'REG-20200724-004', 'yiyiu', 10000, '2020-08-09 13:02:22', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd');

-- --------------------------------------------------------

--
-- Table structure for table `layanan_umum_makanuuu`
--

CREATE TABLE `layanan_umum_makanuuu` (
  `no_registrasi` varchar(30) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `layanan_umum_tes`
--

CREATE TABLE `layanan_umum_tes` (
  `no_registrasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `layanan_umum_tes2`
--

CREATE TABLE `layanan_umum_tes2` (
  `no_registrasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` varchar(30) NOT NULL,
  `id_kategori` varchar(30) NOT NULL,
  `id_satuan` varchar(30) NOT NULL,
  `isi` smallint(6) NOT NULL,
  `id_unit` varchar(30) NOT NULL,
  `kode_obat` varchar(20) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `id_kategori`, `id_satuan`, `isi`, `id_unit`, `kode_obat`, `nama_obat`, `harga_beli`, `harga_jual`, `w_insert`, `w_update`, `updated_by`) VALUES
('OB-5f1d0cb202ec7', 'KT-5f0c70119781d', 'PCS', 12, 'Box', 'BRX001', 'Bodrex', 12000, 13000, '2020-07-26 12:55:14', '2020-08-06 07:57:13', 'UR-5f0ad99e7c4fd'),
('OB-5f1d0ccf61ae1', 'KT-5f10ea8a21681', 'Tablet', 1, 'Box', 'PRC001', 'Paracetamol', 0, 10000, '2020-07-26 12:55:43', '2020-08-07 00:14:02', 'UR-5f0ad99e7c4fd'),
('OB-5f297deeda5c4', 'KT-5f0c7085e9695', 'PCS', 1, 'Botol', 'sdfs', 'BRX001', 0, 0, '2020-08-04 23:25:34', '2020-08-06 07:57:18', 'UR-5f0ad99e7c4fd'),
('OB-5f2b47777d2ec', 'KT-5f0c7085e9695', 'Tablet', 1, 'Botol', 'hh', 'h', 0, 0, '2020-08-06 07:57:43', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('OB-5f2c1a65b4367', 'KT-5f10ea8a21681', 'Tablet', 10, 'Box', 't', 't', 2000, 300000, '2020-08-06 22:57:41', '2020-08-07 00:13:33', 'UR-5f0ad99e7c4fd'),
('OB-5f2e54ea10e47', 'KT-5f0c7085e9695', 'Tablet', 6, 'Box', 'BRX0012', '4546dfgd', 66, 6, '2020-08-08 15:31:54', '2020-08-08 15:32:11', 'UR-5f0ad99e7c4fd');

--
-- Triggers `obat`
--
DELIMITER $$
CREATE TRIGGER `insert_data_stok` AFTER INSERT ON `obat` FOR EACH ROW BEGIN
  INSERT IGNORE INTO stok(kode_obat,stok) VALUES(NEW.kode_obat,'0');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_data_stok` AFTER UPDATE ON `obat` FOR EACH ROW BEGIN
  INSERT IGNORE INTO stok(kode_obat,stok) VALUES(NEW.kode_obat,'0');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(30) NOT NULL,
  `no_jkn` varchar(20) DEFAULT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tempat_lahir` varchar(60) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` char(2) NOT NULL,
  `kontak` varchar(16) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `kontak_2` varchar(16) NOT NULL,
  `id_pekerjaan` varchar(30) DEFAULT NULL,
  `id_pendidikan` varchar(30) DEFAULT NULL,
  `alamat` varchar(200) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime DEFAULT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `no_jkn`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `kontak`, `email`, `kontak_2`, `id_pekerjaan`, `id_pendidikan`, `alamat`, `keterangan`, `w_insert`, `w_update`, `updated_by`) VALUES
('P-20200718-001', '88', '9', '8', '8', '2020-07-18', 'L', '8', '', '8', NULL, NULL, '8', '8', '2020-07-18 15:15:12', NULL, 'UR-5f0ad99e7c4fd'),
('P-20200718-002', '7', '7', '7', '7', '2020-07-18', 'L', '77', 'mushafsyafar@gmail.com', '7', NULL, NULL, '7', '7', '2020-07-18 15:20:24', NULL, 'UR-5f0ad99e7c4fd'),
('P-20200718-003', '7', '7', '7', '7', '2020-07-18', 'L', '77', 'mushafsyafar@gmail.com', '7', NULL, NULL, '7', '7', '2020-07-18 15:20:27', NULL, 'UR-5f0ad99e7c4fd'),
('P-20200718-004', '7', '7', '7', '7', '2020-07-18', 'L', '77', 'mushafsyafar@gmail.com', '7', 'JB-5f07b368ec809', 'PND-5f1299c8793fe', '7', '7', '2020-07-18 15:22:09', NULL, 'UR-5f0ad99e7c4fd'),
('P-20200721-001', '8', '8', '8', '8', '2020-07-01', 'L', '88', '', '8', '', '', '8', '8', '2020-07-21 22:33:44', NULL, 'UR-5f0ad99e7c4fd'),
('P-20200721-002', '456', '098', 'jg78', 'jg', '2020-07-17', 'L', '7', '', '6', '', '', '6', 'r7', '2020-07-21 22:37:10', NULL, 'UR-5f0ad99e7c4fd'),
('P-20200722-001', '1', '1111', 'Muh. Qadri', '111', '2020-06-30', 'P', '08181881', 'magfirah@gmail.com', '0181818181', 'JB-5f07b3716d853', 'PND-5f1299cf0c85d', 'Makassar', '', '2020-07-22 21:42:01', NULL, 'UR-5f0ad99e7c4fd'),
('P-20200722-002', '818191', '019181', 'Monkey D Luffy', 'makassar', '2020-06-30', 'L', '01818181881', 'luffy@gmail.com', '018181881', 'JB-5f07b368ec809', 'PND-5f1299d6c5ee2', 'Makassar', '', '2020-07-22 21:56:19', NULL, 'UR-5f0ad99e7c4fd');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` varchar(30) NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `pekerjaan`, `deskripsi`, `w_insert`, `w_update`, `updated_by`) VALUES
('JB-5f07b368ec809', 'Ibu Rumah Tangga', 'Beasiswa', '2020-07-10 08:16:40', '2020-07-18 14:43:18', 'UR-5f0ad99e7c4fd'),
('JB-5f07b3716d853', 'Karyawan Swasta', 'Sembako', '2020-07-10 08:16:49', '2020-07-18 14:43:31', 'UR-5f0ad99e7c4fd'),
('PKR-5f129a1a3580d', 'PNS', NULL, '2020-07-18 14:43:38', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` varchar(30) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `pendidikan`, `deskripsi`, `w_insert`, `w_update`, `updated_by`) VALUES
('PND-5f1299c8793fe', 'Tamat SD', NULL, '2020-07-18 14:42:16', '2020-07-18 14:42:39', 'UR-5f0ad99e7c4fd'),
('PND-5f1299cf0c85d', 'Tamat SMP', NULL, '2020-07-18 14:42:23', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('PND-5f1299d6c5ee2', 'Tamat SMA', NULL, '2020-07-18 14:42:30', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama`) VALUES
('11', 'ACEH'),
('12', 'SUMATERA UTARA'),
('13', 'SUMATERA BARAT'),
('14', 'RIAU'),
('15', 'JAMBI'),
('16', 'SUMATERA SELATAN'),
('17', 'BENGKULU'),
('18', 'LAMPUNG'),
('19', 'KEPULAUAN BANGKA BELITUNG'),
('21', 'KEPULAUAN RIAU'),
('31', 'DKI JAKARTA'),
('32', 'JAWA BARAT'),
('33', 'JAWA TENGAH'),
('34', 'DI YOGYAKARTA'),
('35', 'JAWA TIMUR'),
('36', 'BANTEN'),
('51', 'BALI'),
('52', 'NUSA TENGGARA BARAT'),
('53', 'NUSA TENGGARA TIMUR'),
('61', 'KALIMANTAN BARAT'),
('62', 'KALIMANTAN TENGAH'),
('63', 'KALIMANTAN SELATAN'),
('64', 'KALIMANTAN TIMUR'),
('65', 'KALIMANTAN UTARA'),
('71', 'SULAWESI UTARA'),
('72', 'SULAWESI TENGAH'),
('73', 'SULAWESI SELATAN'),
('74', 'SULAWESI TENGGARA'),
('75', 'GORONTALO'),
('76', 'SULAWESI BARAT'),
('81', 'MALUKU'),
('82', 'MALUKU UTARA'),
('91', 'PAPUA BARAT'),
('94', 'PAPUA');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `no_registrasi` varchar(30) NOT NULL,
  `id_layanan` varchar(30) NOT NULL,
  `id_pasien` varchar(30) NOT NULL,
  `no_antrian` varchar(3) DEFAULT NULL,
  `cancel` enum('n','y') NOT NULL,
  `eksekusi` enum('n','y') NOT NULL,
  `bayar` enum('n','y') NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`no_registrasi`, `id_layanan`, `id_pasien`, `no_antrian`, `cancel`, `eksekusi`, `bayar`, `w_insert`, `w_update`, `updated_by`) VALUES
('REG-20200719-001', 'imunisasi', 'P-20200718-004', NULL, 'n', 'y', 'n', '2020-07-19 21:42:34', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200719-002', 'imunisasi', 'P-20200718-001', NULL, 'n', 'n', 'n', '2020-07-19 22:39:02', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200721-001', 'imunisasi', 'P-20200718-004', '001', 'n', 'n', 'n', '2020-07-21 22:08:40', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200721-002', 'imunisasi', 'P-20200718-001', '002', 'n', 'n', 'n', '2020-07-21 22:08:53', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200721-003', 'imunisasi', 'P-20200721-002', '003', 'n', 'n', 'n', '2020-07-21 22:38:44', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200722-001', 'imunisasi', 'P-20200721-001', '001', 'n', 'n', 'n', '2020-07-22 21:42:27', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200722-002', 'imunisasi', 'P-20200721-001', '002', 'n', 'n', 'n', '2020-07-22 21:43:00', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200722-003', 'imunisasi', 'P-20200722-002', '003', 'n', 'n', 'n', '2020-07-22 21:56:30', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200722-004', 'imunisasi', 'P-20200722-002', '004', 'n', 'n', 'n', '2020-07-22 21:58:26', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200722-005', 'imunisasi', 'P-20200721-002', '005', 'n', 'n', 'n', '2020-07-22 22:09:18', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200722-006', 'imunisasi', 'P-20200722-001', '006', 'n', 'n', 'n', '2020-07-22 22:09:55', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200722-007', 'imunisasi', 'P-20200718-001', '007', 'n', 'n', 'n', '2020-07-22 22:10:45', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200722-008', 'imunisasi', 'P-20200718-004', '008', 'y', 'n', 'n', '2020-07-22 22:12:34', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200723-001', 'imunisasi', 'P-20200722-002', '001', 'y', 'n', 'n', '2020-07-23 00:09:26', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200723-002', 'imunisasi', 'P-20200722-001', '002', 'n', 'n', 'n', '2020-07-23 05:51:26', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200723-003', 'imunisasi', 'P-20200718-002', '003', 'y', 'n', 'n', '2020-07-23 05:52:06', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200723-004', 'imunisasi', 'P-20200718-003', '004', 'y', 'n', 'n', '2020-07-23 15:24:01', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200723-005', 'imunisasi', 'P-20200721-001', '005', 'n', 'n', 'n', '2020-07-23 22:19:02', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200724-001', 'imunisasi', 'P-20200722-001', '001', 'n', 'n', 'n', '2020-07-24 05:49:08', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200724-002', 'imunisasi', 'P-20200722-001', '002', 'n', 'n', 'n', '2020-07-24 05:49:21', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200724-003', 'imunisasi', 'P-20200722-002', '003', 'n', 'n', 'n', '2020-07-24 05:49:32', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200724-004', 'imunisasi', 'P-20200718-004', '004', 'n', 'n', 'n', '2020-07-24 05:49:43', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200724-005', 'imunisasi', 'P-20200721-002', '005', 'n', 'n', 'n', '2020-07-24 07:25:29', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200724-006', 'imunisasi', 'P-20200721-001', '006', 'n', 'n', 'n', '2020-07-24 07:40:43', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200724-007', 'imunisasi', 'P-20200718-001', '007', 'n', 'n', 'n', '2020-07-24 07:41:43', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200724-008', 'imunisasi', 'P-20200721-002', '008', 'n', 'n', 'n', '2020-07-24 07:51:54', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200724-009', 'imunisasi', 'P-20200722-001', '009', 'n', 'n', 'n', '2020-07-24 07:52:31', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200724-010', 'imunisasi', 'P-20200718-002', '010', 'n', 'n', 'n', '2020-07-24 07:54:17', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200724-011', 'imunisasi', 'P-20200721-002', '011', 'n', 'n', 'n', '2020-07-24 07:57:15', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200724-012', 'imunisasi', 'P-20200722-002', '012', 'n', 'n', 'n', '2020-07-24 07:59:11', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('REG-20200724-013', 'imunisasi', 'P-20200718-001', '013', 'n', 'n', 'n', '2020-07-24 08:08:11', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` varchar(30) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `satuan`, `w_insert`, `w_update`, `updated_by`) VALUES
('PCS', 'PCS', '2020-07-14 15:34:49', '2020-07-14 15:34:55', 'UR-5f0ad99e7c4fd'),
('Tablet', 'Tablet', '2020-07-14 15:35:04', '2020-07-25 13:57:00', 'UR-5f0ad99e7c4fd');

-- --------------------------------------------------------

--
-- Table structure for table `satuan_alkes`
--

CREATE TABLE `satuan_alkes` (
  `id_satuan` varchar(30) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `updated_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan_alkes`
--

INSERT INTO `satuan_alkes` (`id_satuan`, `satuan`, `w_insert`, `w_update`, `updated_by`) VALUES
('Buah', 'Buah', '2020-08-09 20:47:40', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` varchar(10) NOT NULL,
  `calon` varchar(60) DEFAULT NULL,
  `wakil` varchar(60) DEFAULT NULL,
  `tgl_pemilu` date DEFAULT NULL,
  `pemilih` int(11) NOT NULL,
  `provinsi` char(3) NOT NULL,
  `kabupaten` char(3) NOT NULL,
  `kecamatan` char(3) NOT NULL,
  `desa` char(3) NOT NULL,
  `w_update` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `calon`, `wakil`, `tgl_pemilu`, `pemilih`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `w_update`, `updated_by`) VALUES
('setting', 'Adam Tanniewa', 'Mushaf', '2020-12-12', 1500000, '70', '70', '70', '70', '2020-07-05 17:44:53', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `kode_obat` varchar(20) NOT NULL,
  `stok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`kode_obat`, `stok`) VALUES
('BRX001', 120),
('BRX0012', 0),
('PRC001', 163),
('t', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stok_alkes`
--

CREATE TABLE `stok_alkes` (
  `kode_alkes` varchar(20) NOT NULL,
  `stok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_alkes`
--

INSERT INTO `stok_alkes` (`kode_alkes`, `stok`) VALUES
('1', 5),
('1234', 10);

-- --------------------------------------------------------

--
-- Table structure for table `stok_awal`
--

CREATE TABLE `stok_awal` (
  `id_stok_awal` varchar(100) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `harga_beli` varchar(225) NOT NULL,
  `harga_jual` varchar(225) NOT NULL,
  `order_date` datetime NOT NULL,
  `expired_date` datetime NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stok_keluar`
--

CREATE TABLE `stok_keluar` (
  `id_stok_keluar` varchar(30) NOT NULL,
  `kode_obat` varchar(30) NOT NULL,
  `jumlah` int(13) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `w_insert` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_keluar`
--

INSERT INTO `stok_keluar` (`id_stok_keluar`, `kode_obat`, `jumlah`, `keterangan`, `w_insert`, `updated_by`) VALUES
('ST-5f2e41c4005eb', 't', 10, 'karenaaaa', '2020-08-08 14:10:12', 'UR-5f0ad99e7c4fd'),
('ST-5f2ff512d8fbc', 'BRX001', 2, 'iiiii', '2020-08-09 21:07:30', 'UR-5f0ad99e7c4fd'),
('ST-5f2ff6909d032', 'BRX001', 5, 'ndk tau', '2020-08-09 21:13:52', 'UR-5f0ad99e7c4fd');

--
-- Triggers `stok_keluar`
--
DELIMITER $$
CREATE TRIGGER `stok_keluar_ai` AFTER INSERT ON `stok_keluar` FOR EACH ROW BEGIN
  UPDATE stok SET stok=stok-NEW.jumlah WHERE kode_obat=NEW.kode_obat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_keluar_bd` BEFORE DELETE ON `stok_keluar` FOR EACH ROW BEGIN
   UPDATE stok SET stok=stok+OLD.jumlah WHERE kode_obat=OLD.kode_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stok_keluar_alkes`
--

CREATE TABLE `stok_keluar_alkes` (
  `id_stok_keluar` varchar(30) NOT NULL,
  `kode_alkes` varchar(30) NOT NULL,
  `jumlah` int(13) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `w_insert` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_keluar_alkes`
--

INSERT INTO `stok_keluar_alkes` (`id_stok_keluar`, `kode_alkes`, `jumlah`, `keterangan`, `w_insert`, `updated_by`) VALUES
('ST-5f2ff40c3ca9a', '1', 5, 'tidak tau', '2020-08-09 21:03:08', 'UR-5f0ad99e7c4fd'),
('ST-5f2ff4c6ea1a3', '1234', 2, 'rusakii', '2020-08-09 21:06:14', 'UR-5f0ad99e7c4fd');

--
-- Triggers `stok_keluar_alkes`
--
DELIMITER $$
CREATE TRIGGER `stok_keluar_aa` AFTER INSERT ON `stok_keluar_alkes` FOR EACH ROW BEGIN
  UPDATE stok_alkes SET stok=stok-NEW.jumlah WHERE kode_alkes=NEW.kode_alkes;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_keluar_bb` BEFORE DELETE ON `stok_keluar_alkes` FOR EACH ROW BEGIN
   UPDATE stok_alkes SET stok=stok+OLD.jumlah WHERE kode_alkes=OLD.kode_alkes;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stok_masuk`
--

CREATE TABLE `stok_masuk` (
  `id_stok_masuk` varchar(30) NOT NULL,
  `kode_obat` varchar(30) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `expired_date` datetime NOT NULL,
  `jumlah` int(13) NOT NULL,
  `w_insert` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_masuk`
--

INSERT INTO `stok_masuk` (`id_stok_masuk`, `kode_obat`, `harga_beli`, `harga_jual`, `order_date`, `expired_date`, `jumlah`, `w_insert`, `updated_by`) VALUES
('ST-5f1d0e4377521', 'BRX001', 2000, 6000, '2020-07-23 00:00:00', '2020-07-15 00:00:00', 100, '2020-07-26 13:01:55', 'UR-5f0ad99e7c4fd'),
('ST-5f1d0e5886722', 'PRC001', 3000, 6000, '2020-07-15 00:00:00', '2020-07-31 00:00:00', 20, '2020-07-26 13:02:16', 'UR-5f0ad99e7c4fd'),
('ST-5f1d0ec949603', 'BRX001', 3000, 5000, '2020-07-14 00:00:00', '2020-07-13 00:00:00', 20, '2020-07-26 13:04:09', 'UR-5f0ad99e7c4fd'),
('ST-5f2c22e586fec', 'PRC001', 20, 30, '2020-08-05 00:00:00', '2020-08-06 00:00:00', 12, '2020-08-06 23:33:57', 'UR-5f0ad99e7c4fd'),
('ST-5f2c285474198', 't', 1, 200, '2020-08-06 00:00:00', '2020-08-06 00:00:00', 20, '2020-08-06 23:57:08', 'UR-5f0ad99e7c4fd'),
('ST-5f2c28b65b9f2', 't', 1000, 200000, '2020-08-06 00:00:00', '2020-08-06 00:00:00', 20, '2020-08-06 23:58:46', 'UR-5f0ad99e7c4fd'),
('ST-5f2c2acf04006', 't', 2000, 300000, '2020-08-07 00:00:00', '2020-08-07 00:00:00', 30, '2020-08-07 00:07:43', 'UR-5f0ad99e7c4fd'),
('ST-5f2fd968e0881', 'PRC001', 23, 10000, '2020-07-30 00:00:00', '2020-08-07 00:00:00', 120, '2020-08-09 19:09:28', 'UR-5f0ad99e7c4fd'),
('ST-5f2fe71e43afe', 'PRC001', 0, 10000, '2020-08-19 00:00:00', '2020-08-12 00:00:00', 10, '2020-08-09 20:07:58', 'UR-5f0ad99e7c4fd'),
('ST-5f2ff669d1cb1', 'BRX001', 12000, 13000, '2020-07-31 00:00:00', '2020-07-30 00:00:00', 2, '2020-08-09 21:13:13', 'UR-5f0ad99e7c4fd');

--
-- Triggers `stok_masuk`
--
DELIMITER $$
CREATE TRIGGER `stok_masuk_ai` AFTER INSERT ON `stok_masuk` FOR EACH ROW BEGIN
  UPDATE stok SET stok=stok+NEW.jumlah WHERE kode_obat=NEW.kode_obat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_masuk_bd` BEFORE DELETE ON `stok_masuk` FOR EACH ROW BEGIN
   UPDATE stok SET stok=stok-OLD.jumlah WHERE kode_obat=OLD.kode_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stok_masuk_alkes`
--

CREATE TABLE `stok_masuk_alkes` (
  `id_stok_masuk` varchar(30) NOT NULL,
  `kode_alkes` varchar(30) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `expired_date` datetime NOT NULL,
  `jumlah` int(13) NOT NULL,
  `w_insert` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_masuk_alkes`
--

INSERT INTO `stok_masuk_alkes` (`id_stok_masuk`, `kode_alkes`, `harga_beli`, `harga_jual`, `order_date`, `expired_date`, `jumlah`, `w_insert`, `updated_by`) VALUES
('ST-5f2ff0ad12e05', '1', 10000, 12000, '2020-08-06 00:00:00', '2020-08-20 00:00:00', 10, '2020-08-09 20:48:45', 'UR-5f0ad99e7c4fd'),
('ST-5f2ff4a2214e1', '1234', 10000, 13000, '2020-08-09 00:00:00', '2020-08-09 00:00:00', 12, '2020-08-09 21:05:38', 'UR-5f0ad99e7c4fd');

--
-- Triggers `stok_masuk_alkes`
--
DELIMITER $$
CREATE TRIGGER `stok_masuk_aa` AFTER INSERT ON `stok_masuk_alkes` FOR EACH ROW BEGIN
  UPDATE stok_alkes SET stok=stok+NEW.jumlah WHERE kode_alkes=NEW.kode_alkes;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_masuk_bb` BEFORE DELETE ON `stok_masuk_alkes` FOR EACH ROW BEGIN
   UPDATE stok_alkes SET stok=stok-OLD.jumlah WHERE kode_alkes=OLD.kode_alkes;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id_unit` varchar(30) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id_unit`, `unit`, `w_insert`, `w_update`, `updated_by`) VALUES
('Botol', 'Botol', '2020-07-26 12:52:26', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd'),
('Box', 'Box', '2020-07-26 12:52:21', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd');

-- --------------------------------------------------------

--
-- Table structure for table `unit_alkes`
--

CREATE TABLE `unit_alkes` (
  `id_unit` varchar(30) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_alkes`
--

INSERT INTO `unit_alkes` (`id_unit`, `unit`, `w_insert`, `w_update`, `updated_by`) VALUES
('unit', 'unit', '2020-08-09 20:47:49', '0000-00-00 00:00:00', 'UR-5f0ad99e7c4fd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(30) NOT NULL,
  `level` enum('ad','kb','kc','ds','mn') NOT NULL,
  `cover` char(10) NOT NULL,
  `id_provinsi` char(2) DEFAULT NULL,
  `id_kabupaten` char(4) DEFAULT NULL,
  `id_kecamatan` char(7) DEFAULT NULL,
  `id_desa` char(10) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `kontak` varchar(13) DEFAULT NULL,
  `photo` varchar(60) DEFAULT NULL,
  `w_insert` datetime DEFAULT NULL,
  `w_update` datetime DEFAULT NULL,
  `updated_by` varchar(10) NOT NULL,
  `aktif` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `level`, `cover`, `id_provinsi`, `id_kabupaten`, `id_kecamatan`, `id_desa`, `username`, `password`, `nama_lengkap`, `alamat`, `email`, `nik`, `kontak`, `photo`, `w_insert`, `w_update`, `updated_by`, `aktif`) VALUES
('a', 'ad', '', '71', NULL, NULL, NULL, 'a', '0cc175b9c0f1b6a831c399e269772661', 'Administrator', 'Jl. Administrator', 'mushafsyafar@gmail.com', '11111', NULL, NULL, NULL, NULL, '', '1'),
('UR-5ef29acb8ced2', 'ad', '', '71', NULL, NULL, NULL, 'x', '9dd4e461268c8034f5c8564e155c67a6', 'x', 'x', 'x@gmail.com', '12232323', '086555444333', NULL, '2020-06-24 08:14:03', NULL, 'a', '1'),
('UR-5f0ad99e7c4fd', 'mn', '', '71', NULL, NULL, NULL, 'manager', '1d0258c2440a8d19e716292b231e3190', 'Muh. Qadri', 'Makassar', 'qadrysahar@gmail.com', '12345', '085123415762', NULL, '2020-07-12 17:36:30', NULL, 'a', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alkes`
--
ALTER TABLE `alkes`
  ADD PRIMARY KEY (`id_alkes`),
  ADD UNIQUE KEY `id_obat` (`id_alkes`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_alkes`
--
ALTER TABLE `kategori_alkes`
  ADD UNIQUE KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori_obat`
--
ALTER TABLE `kategori_obat`
  ADD UNIQUE KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD UNIQUE KEY `id_layanan` (`id_layanan`);

--
-- Indexes for table `layanan_imunisasi_bayi`
--
ALTER TABLE `layanan_imunisasi_bayi`
  ADD PRIMARY KEY (`no_registrasi`);

--
-- Indexes for table `layanan_imunisasi_data-obsertik`
--
ALTER TABLE `layanan_imunisasi_data-obsertik`
  ADD PRIMARY KEY (`no_registrasi`);

--
-- Indexes for table `layanan_lainlain`
--
ALTER TABLE `layanan_lainlain`
  ADD UNIQUE KEY `id_layanan` (`id`);

--
-- Indexes for table `layanan_log_exc`
--
ALTER TABLE `layanan_log_exc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan_obat`
--
ALTER TABLE `layanan_obat`
  ADD UNIQUE KEY `id_layanan` (`id`);

--
-- Indexes for table `layanan_tindakan_khusus`
--
ALTER TABLE `layanan_tindakan_khusus`
  ADD UNIQUE KEY `id_layanan` (`id`);

--
-- Indexes for table `layanan_umum_makanuuu`
--
ALTER TABLE `layanan_umum_makanuuu`
  ADD PRIMARY KEY (`no_registrasi`);

--
-- Indexes for table `layanan_umum_tes`
--
ALTER TABLE `layanan_umum_tes`
  ADD PRIMARY KEY (`no_registrasi`);

--
-- Indexes for table `layanan_umum_tes2`
--
ALTER TABLE `layanan_umum_tes2`
  ADD PRIMARY KEY (`no_registrasi`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD UNIQUE KEY `id_obat` (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`),
  ADD KEY `id_satuan` (`id_pekerjaan`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD KEY `id_satuan` (`id_pendidikan`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`no_registrasi`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- Indexes for table `satuan_alkes`
--
ALTER TABLE `satuan_alkes`
  ADD PRIMARY KEY (`id_satuan`),
  ADD UNIQUE KEY `id_satuan` (`id_satuan`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `stok_alkes`
--
ALTER TABLE `stok_alkes`
  ADD PRIMARY KEY (`kode_alkes`);

--
-- Indexes for table `stok_awal`
--
ALTER TABLE `stok_awal`
  ADD UNIQUE KEY `id_stok_awal` (`id_stok_awal`);

--
-- Indexes for table `stok_keluar`
--
ALTER TABLE `stok_keluar`
  ADD PRIMARY KEY (`id_stok_keluar`),
  ADD UNIQUE KEY `id_stok_masuk` (`id_stok_keluar`);

--
-- Indexes for table `stok_keluar_alkes`
--
ALTER TABLE `stok_keluar_alkes`
  ADD PRIMARY KEY (`id_stok_keluar`),
  ADD UNIQUE KEY `id_stok_masuk` (`id_stok_keluar`);

--
-- Indexes for table `stok_masuk`
--
ALTER TABLE `stok_masuk`
  ADD UNIQUE KEY `id_stok_masuk` (`id_stok_masuk`);

--
-- Indexes for table `stok_masuk_alkes`
--
ALTER TABLE `stok_masuk_alkes`
  ADD UNIQUE KEY `id_stok_masuk` (`id_stok_masuk`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD UNIQUE KEY `id_unit` (`id_unit`);

--
-- Indexes for table `unit_alkes`
--
ALTER TABLE `unit_alkes`
  ADD UNIQUE KEY `id_unit` (`id_unit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `username` (`username`),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `layanan_log_exc`
--
ALTER TABLE `layanan_log_exc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
