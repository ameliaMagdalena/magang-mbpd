-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 02:01 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbpd`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` varchar(10) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('BANK-1', 'BCA', 'USER-1', '2020-08-30 18:07:08', 'USER-1', '2020-08-30 18:07:16', 'USER-1', '2020-08-30 18:11:39', 1),
('BANK-2', 'BCAa', 'USER-1', '2020-08-30 18:11:42', 'USER-1', '2020-12-21 12:00:02', '', '0000-00-00 00:00:00', 0),
('BANK-3', 'OCBC NISP', 'USER-1', '2020-08-30 22:08:53', 'USER-1', '2020-08-30 22:09:12', '', '0000-00-00 00:00:00', 0),
('BANK-4', 'Mandiri', 'USER-1', '2020-09-08 23:36:51', 'USER-1', '2020-09-08 23:36:57', 'USER-1', '2020-09-08 23:37:01', 1),
('BANK-5', 'BNI', 'USER-1', '2020-09-24 22:59:36', 'USER-1', '2020-09-24 22:59:44', 'USER-1', '2020-09-24 22:59:48', 1);

--
-- Triggers `bank`
--
DELIMITER $$
CREATE TRIGGER `edit_bank` AFTER UPDATE ON `bank` FOR EACH ROW INSERT INTO `bank_logs`(`id_bank_logs`, `keterangan_log`, `id_bank`, `nama_bank`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Edit Data',NEW.id_bank,NEW.nama_bank,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_bank` AFTER INSERT ON `bank` FOR EACH ROW INSERT INTO `bank_logs`(`id_bank_logs`, `keterangan_log`, `id_bank`, `nama_bank`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Insert Data',NEW.id_bank,NEW.nama_bank,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bank_logs`
--

CREATE TABLE `bank_logs` (
  `id_bank_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_bank` varchar(10) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_logs`
--

INSERT INTO `bank_logs` (`id_bank_logs`, `keterangan_log`, `id_bank`, `nama_bank`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 'Insert Data', 'BANK-1', 'BCA', 'USER-1', '2020-08-30 18:07:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(2, 'Edit Data', 'BANK-1', 'BCAA', 'USER-1', '2020-08-30 18:07:08', 'USER-1', '2020-08-30 18:07:14', '', '0000-00-00 00:00:00', 0),
(3, 'Edit Data', 'BANK-1', 'BCA', 'USER-1', '2020-08-30 18:07:08', 'USER-1', '2020-08-30 18:07:16', '', '0000-00-00 00:00:00', 0),
(4, 'Edit Data', 'BANK-1', 'BCA', 'USER-1', '2020-08-30 18:07:08', 'USER-1', '2020-08-30 18:07:16', 'USER-1', '2020-08-30 18:11:39', 1),
(5, 'Insert Data', 'BANK-2', 'BCA', 'USER-1', '2020-08-30 18:11:42', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(6, 'Insert Data', 'BANK-3', 'OCBS NISP', 'USER-1', '2020-08-30 22:08:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(7, 'Edit Data', 'BANK-3', 'OCBC NISP', 'USER-1', '2020-08-30 22:08:53', 'USER-1', '2020-08-30 22:09:12', '', '0000-00-00 00:00:00', 0),
(8, 'Insert Data', 'BANK-4', 'Mandiri', 'USER-1', '2020-09-08 23:36:51', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(9, 'Edit Data', 'BANK-4', 'Mandiria', 'USER-1', '2020-09-08 23:36:51', 'USER-1', '2020-09-08 23:36:54', '', '0000-00-00 00:00:00', 0),
(10, 'Edit Data', 'BANK-4', 'Mandiri', 'USER-1', '2020-09-08 23:36:51', 'USER-1', '2020-09-08 23:36:57', '', '0000-00-00 00:00:00', 0),
(11, 'Edit Data', 'BANK-4', 'Mandiri', 'USER-1', '2020-09-08 23:36:51', 'USER-1', '2020-09-08 23:36:57', 'USER-1', '2020-09-08 23:37:01', 1),
(12, 'Insert Data', 'BANK-5', 'BNI', 'USER-1', '2020-09-24 22:59:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(13, 'Edit Data', 'BANK-5', 'BNIa', 'USER-1', '2020-09-24 22:59:36', 'USER-1', '2020-09-24 22:59:41', '', '0000-00-00 00:00:00', 0),
(14, 'Edit Data', 'BANK-5', 'BNI', 'USER-1', '2020-09-24 22:59:36', 'USER-1', '2020-09-24 22:59:44', '', '0000-00-00 00:00:00', 0),
(15, 'Edit Data', 'BANK-5', 'BNI', 'USER-1', '2020-09-24 22:59:36', 'USER-1', '2020-09-24 22:59:44', 'USER-1', '2020-09-24 22:59:48', 1),
(16, 'Edit Data', 'BANK-2', 'BCAa', 'USER-1', '2020-08-30 18:11:42', 'USER-1', '2020-12-21 12:00:02', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bpbd`
--

CREATE TABLE `bpbd` (
  `id_bpbd` varchar(15) NOT NULL,
  `id_purchase_order_customer` varchar(10) NOT NULL,
  `no_bpbd` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `plat_no` varchar(30) NOT NULL,
  `driver` varchar(50) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status_bpbd` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bpbj`
--

CREATE TABLE `bpbj` (
  `id_bpbj` varchar(15) NOT NULL,
  `no_bpbj` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status_bpbj` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(10) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `alamat_customer` varchar(100) NOT NULL,
  `no_telp_customer` varchar(20) NOT NULL,
  `email_customer` varchar(50) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat_customer`, `no_telp_customer`, `email_customer`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('CUST-1', 'INOAC', 'Tangerang', '085256789011', 'inoac@gmail.com', 'USER-7', '2020-10-06 02:38:57', 'USER-1', '2020-10-09 02:07:49', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cycle_time`
--

CREATE TABLE `cycle_time` (
  `id_cycle_time` varchar(10) NOT NULL,
  `id_line` varchar(10) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `cycle_time` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cycle_time`
--

INSERT INTO `cycle_time` (`id_cycle_time`, `id_line`, `id_produk`, `cycle_time`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('CT-1', 'LINE-1', 'PRDK-1', 300, 'USER-2', '2020-12-21 18:20:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-10', 'LINE-2', 'PRDK-3', 420, 'USER-2', '2020-12-21 19:42:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-11', 'LINE-4', 'PRDK-3', 360, 'USER-2', '2020-12-21 19:42:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-12', 'LINE-1', 'PRDK-4', 300, 'USER-2', '2020-12-21 19:47:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-13', 'LINE-2', 'PRDK-4', 300, 'USER-2', '2020-12-21 19:47:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-14', 'LINE-4', 'PRDK-4', 300, 'USER-2', '2020-12-21 19:47:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-15', 'LINE-1', 'PRDK-5', 180, 'USER-2', '2020-12-21 19:53:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-16', 'LINE-2', 'PRDK-5', 300, 'USER-2', '2020-12-21 19:53:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-17', 'LINE-3', 'PRDK-5', 300, 'USER-2', '2020-12-21 19:53:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-18', 'LINE-4', 'PRDK-5', 300, 'USER-2', '2020-12-21 19:53:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-2', 'LINE-2', 'PRDK-1', 300, 'USER-2', '2020-12-21 18:20:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-3', 'LINE-3', 'PRDK-1', 300, 'USER-2', '2020-12-21 18:20:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-4', 'LINE-4', 'PRDK-1', 300, 'USER-2', '2020-12-21 18:20:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-5', 'LINE-1', 'PRDK-2', 300, 'USER-2', '2020-12-21 19:24:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-6', 'LINE-2', 'PRDK-2', 300, 'USER-2', '2020-12-21 19:24:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-7', 'LINE-3', 'PRDK-2', 300, 'USER-2', '2020-12-21 19:24:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-8', 'LINE-4', 'PRDK-2', 300, 'USER-2', '2020-12-21 19:24:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-9', 'LINE-1', 'PRDK-3', 360, 'USER-2', '2020-12-21 19:42:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_note`
--

CREATE TABLE `delivery_note` (
  `id_delivery_note` varchar(10) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `tanggal_dn` date NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status_pengesahan` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` varchar(10) NOT NULL,
  `nama_departemen` varchar(30) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `nama_departemen`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('DEPT-1', 'x', 'USER-1', '2020-12-21 12:53:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DEPT-2', 'Management', 'USER-1', '2020-12-21 13:09:02', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DEPT-3', 'Produksi', 'USER-1', '2020-12-21 13:27:02', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DEPT-4', 'Purchasing', 'USER-1', '2020-12-21 13:27:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DEPT-5', 'Finish Good', 'USER-1', '2020-12-21 13:27:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DEPT-6', 'Research & Development', 'USER-1', '2020-12-21 13:27:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DEPT-7', 'Material', 'USER-1', '2020-12-21 13:27:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `departemen`
--
DELIMITER $$
CREATE TRIGGER `edit_departemen` AFTER UPDATE ON `departemen` FOR EACH ROW INSERT INTO `departemen_logs`(`id_departemen_logs`, `keterangan_log`, `id_departemen`, `nama_departemen`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Edit Data',NEW.id_departemen,NEW.nama_departemen,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_departemen` AFTER INSERT ON `departemen` FOR EACH ROW INSERT INTO `departemen_logs`(`id_departemen_logs`, `keterangan_log`, `id_departemen`, `nama_departemen`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Insert Data',NEW.id_departemen,NEW.nama_departemen,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `departemen_logs`
--

CREATE TABLE `departemen_logs` (
  `id_departemen_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_departemen` varchar(10) NOT NULL,
  `nama_departemen` varchar(30) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen_logs`
--

INSERT INTO `departemen_logs` (`id_departemen_logs`, `keterangan_log`, `id_departemen`, `nama_departemen`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(13, 'Insert Data', 'DEPT-2', 'Management', 'USER-1', '2020-12-21 13:09:02', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(14, 'Insert Data', 'DEPT-3', 'Produksi', 'USER-1', '2020-12-21 13:27:02', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(15, 'Insert Data', 'DEPT-4', 'Purchasing', 'USER-1', '2020-12-21 13:27:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(16, 'Insert Data', 'DEPT-5', 'Finish Good', 'USER-1', '2020-12-21 13:27:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(17, 'Insert Data', 'DEPT-6', 'Research & Development', 'USER-1', '2020-12-21 13:27:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(18, 'Insert Data', 'DEPT-7', 'Material', 'USER-1', '2020-12-21 13:27:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_bpbj`
--

CREATE TABLE `detail_bpbj` (
  `id_detail_bpbj` varchar(15) NOT NULL,
  `id_bpbj` varchar(15) NOT NULL,
  `id_detail_produk` varchar(10) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `jumlah_terkirim` int(11) NOT NULL,
  `status_detail_bpbj` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_delivery_note`
--

CREATE TABLE `detail_delivery_note` (
  `id_detail_delivery_note` varchar(10) NOT NULL,
  `id_delivery_note` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `id_detail_purchase_order_supplier` varchar(10) NOT NULL,
  `id_invoice` varchar(10) NOT NULL,
  `jumlah_diminta` int(11) NOT NULL,
  `jumlah_aktual` int(11) NOT NULL,
  `total_harga_aktual` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_item_bpbd`
--

CREATE TABLE `detail_item_bpbd` (
  `id_detail_item_bpbd` varchar(17) NOT NULL,
  `id_item_bpbd` varchar(15) NOT NULL,
  `id_item_surat_jalan` varchar(15) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_item_surat_jalan`
--

CREATE TABLE `detail_item_surat_jalan` (
  `id_detail_item_surat_jalan` varchar(15) NOT NULL,
  `id_item_surat_jalan` varchar(15) NOT NULL,
  `id_detail_bpbj` varchar(15) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_permintaan_material`
--

CREATE TABLE `detail_permintaan_material` (
  `id_detail_permintaan_material` varchar(20) NOT NULL,
  `id_permintaan_material` varchar(20) NOT NULL,
  `id_konsumsi_material` varchar(10) NOT NULL,
  `needs` decimal(11,2) NOT NULL,
  `ketersediaan_supplier` int(11) NOT NULL,
  `status_detail_permintaan_material` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_produk`
--

CREATE TABLE `detail_produk` (
  `id_detail_produk` varchar(15) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `id_ukuran_produk` varchar(10) NOT NULL,
  `id_warna` varchar(10) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `keterangan` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_produk`
--

INSERT INTO `detail_produk` (`id_detail_produk`, `id_produk`, `id_ukuran_produk`, `id_warna`, `kode_produk`, `keterangan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('DETPRO-1', 'PRDK-1', '', '', 'N-AFN00-Z010.0L', 3, 'USER-2', '2020-12-21 18:20:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-2', 'PRDK-2', '', '', 'N-AFN00-Z009.0L', 3, 'USER-2', '2020-12-21 19:24:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-3', 'PRDK-3', '', 'WARNA-1', 'N-BAG02-Z008.0LR', 2, 'USER-2', '2020-12-21 19:42:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-4', 'PRDK-4', 'UKPROD-5', 'WARNA-1', 'N-BOA00-Z005.0L', 0, 'USER-2', '2020-12-21 19:47:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-5', 'PRDK-4', 'UKPROD-5', 'WARNA-2', 'N-BOA00-Z001.0L', 0, 'USER-2', '2020-12-21 19:47:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-6', 'PRDK-4', 'UKPROD-5', 'WARNA-3', 'N-BOA00-Z004.0L', 0, 'USER-2', '2020-12-21 19:47:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-7', 'PRDK-5', 'UKPROD-7', '', 'N-COM00-Z001.0J', 1, 'USER-2', '2020-12-21 19:53:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_produksi_line`
--

CREATE TABLE `detail_produksi_line` (
  `id_detail_produksi_line` varchar(17) NOT NULL,
  `id_detail_purchase_order` varchar(10) NOT NULL,
  `id_produksi_line` varchar(15) NOT NULL,
  `jumlah_item_perencanaan` int(11) NOT NULL,
  `jumlah_item_aktual` int(11) NOT NULL,
  `waktu_proses_perencanaan` int(11) NOT NULL,
  `waktu_proses_aktual` int(11) NOT NULL,
  `keterangan_aktual` varchar(50) NOT NULL,
  `status_perencanaan` int(1) NOT NULL,
  `status_aktual` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_produksi_tertunda`
--

CREATE TABLE `detail_produksi_tertunda` (
  `id_detail_produksi_tertunda` varchar(21) NOT NULL,
  `id_produksi_tertunda` varchar(20) NOT NULL,
  `id_detail_produksi_line` varchar(17) NOT NULL,
  `jumlah_perencanaan` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_purchase_order_customer`
--

CREATE TABLE `detail_purchase_order_customer` (
  `id_detail_purchase_order_customer` varchar(10) NOT NULL,
  `id_purchase_order_customer` varchar(10) NOT NULL,
  `id_detail_produk` varchar(10) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_purchase_order_customer`
--

INSERT INTO `detail_purchase_order_customer` (`id_detail_purchase_order_customer`, `id_purchase_order_customer`, `id_detail_produk`, `jumlah_produk`, `harga_satuan`, `total_harga`, `tanggal_penerimaan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('DPOC-1', 'POC-1', 'DETPRO-1', 500, 116536, 58268000, '2020-12-15', 'USER-1', '2020-12-15 10:11:48', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('DPOC-2', 'POC-1', 'DETPRO-2', 500, 116555, 58277500, '2020-12-22', 'USER-1', '2020-12-15 10:11:48', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('DPOC-3', 'POC-1', 'DETPRO-3', 500, 2090508, 1045254000, '2020-12-22', 'USER-1', '2020-12-15 10:11:48', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('DPOC-4', 'POC-2', 'DETPRO-1', 1000, 116536, 116536000, '2020-12-22', 'USER-1', '2020-12-15 10:12:39', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_purchase_order_supplier`
--

CREATE TABLE `detail_purchase_order_supplier` (
  `id_detail_purchase_order_supplier` varchar(10) NOT NULL,
  `id_purchase_order_supplier` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `jumlah_material` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `status_detail_po` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_purchase_order_supplier`
--

INSERT INTO `detail_purchase_order_supplier` (`id_detail_purchase_order_supplier`, `id_purchase_order_supplier`, `id_sub_jenis_material`, `jumlah_material`, `harga_satuan`, `harga_total`, `status_detail_po`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('DPOS-1', 'POS-1', 'SUBJM-8', 2, 0, 4000, 0, 'USER-1', '2020-10-09 14:30:32', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('DPOS-2', 'POS-1', 'SUBJM-10', 3, 0, 180000, 0, 'USER-1', '2020-10-09 14:30:32', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_supplier`
--

CREATE TABLE `detail_supplier` (
  `id_detail_supplier` varchar(10) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `harga_material` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_supplier`
--

INSERT INTO `detail_supplier` (`id_detail_supplier`, `id_supplier`, `id_sub_jenis_material`, `harga_material`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('DSUP-1', 'SUP-1', 'SUBJM-10', 60000, 'USER-1', '2020-10-09 01:58:37', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('DSUP-2', 'SUP-1', 'SUBJM-8', 2000, 'USER-1', '2020-10-09 02:01:54', '0', '0000-00-00 00:00:00', 'USER-1', '2020-10-09 02:02:18', 0),
('DSUP-3', 'SUP-2', 'SUBJM-4', 3000, 'USER-1', '2020-10-09 02:04:26', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_surat_perintah_lembur`
--

CREATE TABLE `detail_surat_perintah_lembur` (
  `id_detail_surat_perintah_lembur` varchar(15) NOT NULL,
  `id_surat_perintah_lembur` varchar(15) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `planning_lembur` int(2) NOT NULL,
  `waktu_in_plan` time NOT NULL,
  `waktu_out_plan` time NOT NULL,
  `keterangan_plan` varchar(200) NOT NULL,
  `aktual_lembur` int(2) NOT NULL,
  `waktu_in_aktual` time NOT NULL,
  `waktu_out_aktual` time NOT NULL,
  `keterangan_aktual` varchar(200) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` varchar(15) NOT NULL,
  `id_purchase_order_customer` varchar(10) NOT NULL,
  `id_rekening` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `ditujukan_kepada` varchar(100) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `discount_rate` decimal(11,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `ppn_rate` decimal(11,2) NOT NULL,
  `ppn` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status_invoice` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_bpbd`
--

CREATE TABLE `item_bpbd` (
  `id_item_bpbd` varchar(15) NOT NULL,
  `id_bpbd` varchar(15) NOT NULL,
  `id_detail_produk` varchar(10) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_invoice`
--

CREATE TABLE `item_invoice` (
  `id_item_invoice` varchar(15) NOT NULL,
  `id_invoice` varchar(15) NOT NULL,
  `id_detail_produk` varchar(10) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_surat_jalan`
--

CREATE TABLE `item_surat_jalan` (
  `id_item_surat_jalan` varchar(15) NOT NULL,
  `id_surat_jalan` varchar(15) NOT NULL,
  `id_detail_produk` varchar(10) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `status_keluar` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('JBT-1', 'x', 'USER-1', '2020-12-21 12:53:36', 'USER-1', '2020-12-21 13:08:23', '', '0000-00-00 00:00:00', 0),
('JBT-10', 'PPIC', 'USER-1', '2020-12-21 13:53:27', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-11', 'Staff Line Cutting', 'USER-1', '2020-12-21 13:53:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-12', 'Staff Line Bonding', 'USER-1', '2020-12-21 13:53:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-13', 'Staff Line Sewing', 'USER-1', '2020-12-21 13:53:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-14', 'Staff Line Assy', 'USER-1', '2020-12-21 13:53:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-15', 'Engineering', 'USER-1', '2020-12-21 13:53:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-2', 'Direktur', 'USER-1', '2020-12-21 13:48:02', 'USER-1', '2020-12-21 13:51:03', '', '0000-00-00 00:00:00', 0),
('JBT-3', 'Manager', 'USER-1', '2020-12-21 13:49:10', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-4', 'Admin', 'USER-1', '2020-12-21 13:50:51', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-5', 'Operator Gudang', 'USER-1', '2020-12-21 13:51:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-6', 'PIC Line Cutting', 'USER-1', '2020-12-21 13:51:10', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-7', 'PIC Line Bonding', 'USER-1', '2020-12-21 13:51:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-8', 'PIC Line Sewing', 'USER-1', '2020-12-21 13:53:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-9', 'PIC Line Assy', 'USER-1', '2020-12-21 13:53:26', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `jabatan`
--
DELIMITER $$
CREATE TRIGGER `edit_jabatan` AFTER UPDATE ON `jabatan` FOR EACH ROW INSERT INTO `jabatan_logs`(`id_jabatan_logs`,`keterangan_log`, `id_jabatan`, `nama_jabatan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`)VALUES(null,'Edit Data',NEW.id_jabatan,NEW.nama_jabatan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_jabatan` AFTER INSERT ON `jabatan` FOR EACH ROW INSERT INTO `jabatan_logs`(`id_jabatan_logs`, `keterangan_log`, `id_jabatan`, `nama_jabatan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Insert Data',NEW.id_jabatan,NEW.nama_jabatan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_karyawan`
--

CREATE TABLE `jabatan_karyawan` (
  `id_jabatan_karyawan` varchar(10) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `id_spesifikasi_jabatan` varchar(10) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_karyawan`
--

INSERT INTO `jabatan_karyawan` (`id_jabatan_karyawan`, `id_karyawan`, `id_spesifikasi_jabatan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('JBTKAR-1', 'KAR-1', 'SJBT-1', 'USER-1', '2020-12-21 12:54:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-10', 'KAR-9', 'SJBT-7', 'USER-1', '2020-12-21 14:26:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-11', 'KAR-10', 'SJBT-11', 'USER-1', '2020-12-21 14:28:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-12', 'KAR-10', 'SJBT-12', 'USER-1', '2020-12-21 14:28:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-13', 'KAR-11', 'SJBT-13', 'USER-1', '2020-12-21 14:28:39', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-14', 'KAR-12', 'SJBT-14', 'USER-1', '2020-12-21 14:29:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-15', 'KAR-13', 'SJBT-15', 'USER-1', '2020-12-21 14:40:04', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-16', 'KAR-14', 'SJBT-15', 'USER-1', '2020-12-21 14:40:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-17', 'KAR-15', 'SJBT-16', 'USER-1', '2020-12-21 14:41:06', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-18', 'KAR-16', 'SJBT-16', 'USER-1', '2020-12-21 14:41:39', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-19', 'KAR-17', 'SJBT-16', 'USER-1', '2020-12-21 14:42:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-2', 'KAR-2', 'SJBT-2', 'USER-1', '2020-12-21 14:16:06', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-20', 'KAR-18', 'SJBT-16', 'USER-1', '2020-12-21 14:43:04', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-21', 'KAR-19', 'SJBT-17', 'USER-1', '2020-12-21 14:44:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-22', 'KAR-20', 'SJBT-17', 'USER-1', '2020-12-21 14:45:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-23', 'KAR-21', 'SJBT-17', 'USER-1', '2020-12-21 14:45:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-24', 'KAR-22', 'SJBT-17', 'USER-1', '2020-12-21 14:45:48', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-25', 'KAR-23', 'SJBT-17', 'USER-1', '2020-12-21 14:46:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-26', 'KAR-24', 'SJBT-17', 'USER-1', '2020-12-21 14:46:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-27', 'KAR-25', 'SJBT-17', 'USER-1', '2020-12-21 14:47:16', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-28', 'KAR-26', 'SJBT-17', 'USER-1', '2020-12-21 14:47:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-29', 'KAR-27', 'SJBT-17', 'USER-1', '2020-12-21 14:48:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-3', 'KAR-3', 'SJBT-3', 'USER-1', '2020-12-21 14:18:05', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-30', 'KAR-28', 'SJBT-17', 'USER-1', '2020-12-21 14:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-31', 'KAR-29', 'SJBT-17', 'USER-1', '2020-12-21 14:48:51', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-32', 'KAR-30', 'SJBT-17', 'USER-1', '2020-12-21 14:49:54', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-33', 'KAR-31', 'SJBT-17', 'USER-1', '2020-12-21 14:50:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-34', 'KAR-32', 'SJBT-17', 'USER-1', '2020-12-21 14:50:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-35', 'KAR-33', 'SJBT-17', 'USER-1', '2020-12-21 14:51:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-36', 'KAR-34', 'SJBT-17', 'USER-1', '2020-12-21 14:51:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-37', 'KAR-35', 'SJBT-17', 'USER-1', '2020-12-21 14:52:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-38', 'KAR-36', 'SJBT-18', 'USER-1', '2020-12-21 14:52:37', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-39', 'KAR-37', 'SJBT-18', 'USER-1', '2020-12-21 14:53:02', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-4', 'KAR-4', 'SJBT-9', 'USER-1', '2020-12-21 14:19:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-40', 'KAR-38', 'SJBT-18', 'USER-1', '2020-12-21 14:53:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-41', 'KAR-39', 'SJBT-18', 'USER-1', '2020-12-21 14:53:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-42', 'KAR-40', 'SJBT-18', 'USER-1', '2020-12-21 14:54:10', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-43', 'KAR-41', 'SJBT-18', 'USER-1', '2020-12-21 14:54:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-44', 'KAR-42', 'SJBT-18', 'USER-1', '2020-12-21 14:54:59', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-45', 'KAR-43', 'SJBT-18', 'USER-1', '2020-12-21 14:55:27', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-5', 'KAR-5', 'SJBT-5', 'USER-1', '2020-12-21 14:21:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-6', 'KAR-6', 'SJBT-10', 'USER-1', '2020-12-21 14:22:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-7', 'KAR-7', 'SJBT-8', 'USER-1', '2020-12-21 14:23:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-8', 'KAR-3', 'SJBT-6', 'USER-1', '2020-12-21 14:24:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-9', 'KAR-8', 'SJBT-4', 'USER-1', '2020-12-21 14:25:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `jabatan_karyawan`
--
DELIMITER $$
CREATE TRIGGER `edit_jabatan_karyawan` AFTER UPDATE ON `jabatan_karyawan` FOR EACH ROW INSERT INTO `jabatan_karyawan_logs` (`id_jabatan_karyawan_logs`,`keterangan_log`,`id_jabatan_karyawan`,`id_karyawan`,`id_spesifikasi_jabatan`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES (null,'Edit Data',NEW.id_jabatan_karyawan,NEW.id_karyawan,NEW.id_spesifikasi_jabatan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_jabatan_karyawan` AFTER INSERT ON `jabatan_karyawan` FOR EACH ROW INSERT INTO `jabatan_karyawan_logs` (`id_jabatan_karyawan_logs`,`keterangan_log`,`id_jabatan_karyawan`,`id_karyawan`,`id_spesifikasi_jabatan`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES (null,'Insert Data',NEW.id_jabatan_karyawan,NEW.id_karyawan,NEW.id_spesifikasi_jabatan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_karyawan_logs`
--

CREATE TABLE `jabatan_karyawan_logs` (
  `id_jabatan_karyawan_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_jabatan_karyawan` varchar(10) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `id_spesifikasi_jabatan` varchar(10) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_karyawan_logs`
--

INSERT INTO `jabatan_karyawan_logs` (`id_jabatan_karyawan_logs`, `keterangan_log`, `id_jabatan_karyawan`, `id_karyawan`, `id_spesifikasi_jabatan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(33, 'Insert Data', 'JBTKAR-2', 'KAR-2', 'SJBT-2', 'USER-1', '2020-12-21 14:16:06', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(34, 'Insert Data', 'JBTKAR-3', 'KAR-3', 'SJBT-3', 'USER-1', '2020-12-21 14:18:05', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(35, 'Insert Data', 'JBTKAR-4', 'KAR-4', 'SJBT-9', 'USER-1', '2020-12-21 14:19:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(36, 'Insert Data', 'JBTKAR-5', 'KAR-5', 'SJBT-5', 'USER-1', '2020-12-21 14:21:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(37, 'Insert Data', 'JBTKAR-6', 'KAR-6', 'SJBT-10', 'USER-1', '2020-12-21 14:22:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(38, 'Insert Data', 'JBTKAR-7', 'KAR-7', 'SJBT-8', 'USER-1', '2020-12-21 14:23:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(39, 'Insert Data', 'JBTKAR-8', 'KAR-3', 'SJBT-6', 'USER-1', '2020-12-21 14:24:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(40, 'Insert Data', 'JBTKAR-9', 'KAR-8', 'SJBT-4', 'USER-1', '2020-12-21 14:25:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(41, 'Insert Data', 'JBTKAR-10', 'KAR-9', 'SJBT-7', 'USER-1', '2020-12-21 14:26:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(42, 'Insert Data', 'JBTKAR-11', 'KAR-10', 'SJBT-11', 'USER-1', '2020-12-21 14:28:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(43, 'Insert Data', 'JBTKAR-12', 'KAR-10', 'SJBT-12', 'USER-1', '2020-12-21 14:28:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(44, 'Insert Data', 'JBTKAR-13', 'KAR-11', 'SJBT-13', 'USER-1', '2020-12-21 14:28:39', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(45, 'Insert Data', 'JBTKAR-14', 'KAR-12', 'SJBT-14', 'USER-1', '2020-12-21 14:29:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(46, 'Insert Data', 'JBTKAR-15', 'KAR-13', 'SJBT-15', 'USER-1', '2020-12-21 14:40:04', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(47, 'Insert Data', 'JBTKAR-16', 'KAR-14', 'SJBT-15', 'USER-1', '2020-12-21 14:40:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(48, 'Insert Data', 'JBTKAR-17', 'KAR-15', 'SJBT-16', 'USER-1', '2020-12-21 14:41:06', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(49, 'Insert Data', 'JBTKAR-18', 'KAR-16', 'SJBT-16', 'USER-1', '2020-12-21 14:41:39', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(50, 'Insert Data', 'JBTKAR-19', 'KAR-17', 'SJBT-16', 'USER-1', '2020-12-21 14:42:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(51, 'Insert Data', 'JBTKAR-20', 'KAR-18', 'SJBT-16', 'USER-1', '2020-12-21 14:43:04', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(52, 'Insert Data', 'JBTKAR-21', 'KAR-19', 'SJBT-17', 'USER-1', '2020-12-21 14:44:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(53, 'Insert Data', 'JBTKAR-22', 'KAR-20', 'SJBT-17', 'USER-1', '2020-12-21 14:45:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(54, 'Insert Data', 'JBTKAR-23', 'KAR-21', 'SJBT-17', 'USER-1', '2020-12-21 14:45:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(55, 'Insert Data', 'JBTKAR-24', 'KAR-22', 'SJBT-17', 'USER-1', '2020-12-21 14:45:48', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(56, 'Insert Data', 'JBTKAR-25', 'KAR-23', 'SJBT-17', 'USER-1', '2020-12-21 14:46:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(57, 'Insert Data', 'JBTKAR-26', 'KAR-24', 'SJBT-17', 'USER-1', '2020-12-21 14:46:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(58, 'Insert Data', 'JBTKAR-27', 'KAR-25', 'SJBT-17', 'USER-1', '2020-12-21 14:47:16', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(59, 'Insert Data', 'JBTKAR-28', 'KAR-26', 'SJBT-17', 'USER-1', '2020-12-21 14:47:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(60, 'Insert Data', 'JBTKAR-29', 'KAR-27', 'SJBT-17', 'USER-1', '2020-12-21 14:48:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(61, 'Insert Data', 'JBTKAR-30', 'KAR-28', 'SJBT-17', 'USER-1', '2020-12-21 14:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(62, 'Insert Data', 'JBTKAR-31', 'KAR-29', 'SJBT-17', 'USER-1', '2020-12-21 14:48:51', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(63, 'Insert Data', 'JBTKAR-32', 'KAR-30', 'SJBT-17', 'USER-1', '2020-12-21 14:49:54', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(64, 'Insert Data', 'JBTKAR-33', 'KAR-31', 'SJBT-17', 'USER-1', '2020-12-21 14:50:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(65, 'Insert Data', 'JBTKAR-34', 'KAR-32', 'SJBT-17', 'USER-1', '2020-12-21 14:50:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(66, 'Insert Data', 'JBTKAR-35', 'KAR-33', 'SJBT-17', 'USER-1', '2020-12-21 14:51:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(67, 'Insert Data', 'JBTKAR-36', 'KAR-34', 'SJBT-17', 'USER-1', '2020-12-21 14:51:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(68, 'Insert Data', 'JBTKAR-37', 'KAR-35', 'SJBT-17', 'USER-1', '2020-12-21 14:52:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(69, 'Insert Data', 'JBTKAR-38', 'KAR-36', 'SJBT-18', 'USER-1', '2020-12-21 14:52:37', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(70, 'Insert Data', 'JBTKAR-39', 'KAR-37', 'SJBT-18', 'USER-1', '2020-12-21 14:53:02', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(71, 'Insert Data', 'JBTKAR-40', 'KAR-38', 'SJBT-18', 'USER-1', '2020-12-21 14:53:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(72, 'Insert Data', 'JBTKAR-41', 'KAR-39', 'SJBT-18', 'USER-1', '2020-12-21 14:53:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(73, 'Insert Data', 'JBTKAR-42', 'KAR-40', 'SJBT-18', 'USER-1', '2020-12-21 14:54:10', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(74, 'Insert Data', 'JBTKAR-43', 'KAR-41', 'SJBT-18', 'USER-1', '2020-12-21 14:54:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(75, 'Insert Data', 'JBTKAR-44', 'KAR-42', 'SJBT-18', 'USER-1', '2020-12-21 14:54:59', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(76, 'Insert Data', 'JBTKAR-45', 'KAR-43', 'SJBT-18', 'USER-1', '2020-12-21 14:55:27', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_logs`
--

CREATE TABLE `jabatan_logs` (
  `id_jabatan_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_logs`
--

INSERT INTO `jabatan_logs` (`id_jabatan_logs`, `keterangan_log`, `id_jabatan`, `nama_jabatan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(23, 'Edit Data', 'JBT-1', 'x', 'USER-1', '2020-12-21 12:53:36', 'USER-1', '2020-12-21 13:08:23', '', '0000-00-00 00:00:00', 0),
(24, 'Insert Data', 'JBT-2', 'Direktur', 'USER-1', '2020-12-21 13:48:02', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(25, 'Insert Data', 'JBT-3', 'Manager', 'USER-1', '2020-12-21 13:49:10', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(26, 'Insert Data', 'JBT-4', 'Admin', 'USER-1', '2020-12-21 13:50:51', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(27, 'Edit Data', 'JBT-2', 'Direkturr', 'USER-1', '2020-12-21 13:48:02', 'USER-1', '2020-12-21 13:50:58', '', '0000-00-00 00:00:00', 0),
(28, 'Edit Data', 'JBT-2', 'Direktur', 'USER-1', '2020-12-21 13:48:02', 'USER-1', '2020-12-21 13:51:03', '', '0000-00-00 00:00:00', 0),
(29, 'Insert Data', 'JBT-5', 'Operator Gudang', 'USER-1', '2020-12-21 13:51:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(30, 'Insert Data', 'JBT-6', 'PIC Line Cutting', 'USER-1', '2020-12-21 13:51:10', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(31, 'Insert Data', 'JBT-7', 'PIC Line Bonding', 'USER-1', '2020-12-21 13:51:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(32, 'Insert Data', 'JBT-8', 'PIC Line Sewing', 'USER-1', '2020-12-21 13:53:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(33, 'Insert Data', 'JBT-9', 'PIC Line Assy', 'USER-1', '2020-12-21 13:53:26', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(34, 'Insert Data', 'JBT-10', 'PPIC', 'USER-1', '2020-12-21 13:53:27', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(35, 'Insert Data', 'JBT-11', 'Staff Line Cutting', 'USER-1', '2020-12-21 13:53:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(36, 'Insert Data', 'JBT-12', 'Staff Line Bonding', 'USER-1', '2020-12-21 13:53:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(37, 'Insert Data', 'JBT-13', 'Staff Line Sewing', 'USER-1', '2020-12-21 13:53:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(38, 'Insert Data', 'JBT-14', 'Staff Line Assy', 'USER-1', '2020-12-21 13:53:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(39, 'Insert Data', 'JBT-15', 'Engineering', 'USER-1', '2020-12-21 13:53:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_material`
--

CREATE TABLE `jenis_material` (
  `id_jenis_material` varchar(10) NOT NULL,
  `kode_jenis_material` varchar(10) NOT NULL,
  `nama_jenis_material` varchar(30) NOT NULL,
  `sumber_material` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_material`
--

INSERT INTO `jenis_material` (`id_jenis_material`, `kode_jenis_material`, `nama_jenis_material`, `sumber_material`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('JM-1', 'MAT001', 'Foam', 0, 'USER-1', '2020-10-31 21:33:46', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('JM-2', 'MAT002', 'Lem', 0, 'USER-1', '2020-10-31 21:39:08', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('JM-3', 'MAT003', 'Kain', 0, 'USER-1', '2020-10-31 21:42:22', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('JM-4', 'MAT004', 'Frame', 0, 'USER-1', '2020-10-31 21:52:14', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('JM-5', 'MAT005', 'Benang', 0, 'USER-1', '2020-10-31 21:53:57', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('JM-6', 'MAT006', 'Kancing', 0, 'USER-1', '2020-10-31 21:56:35', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('JM-7', 'MAT007', 'Karton', 0, 'USER-1', '2020-10-31 21:58:42', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('JM-8', 'MAT008', 'Lakban', 0, 'USER-1', '2020-10-31 23:43:40', 'USER-1', '2020-10-31 23:43:45', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_material_sementara`
--

CREATE TABLE `jenis_material_sementara` (
  `id_jenis_material` varchar(10) NOT NULL,
  `nama_jenis_material` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_material_sementara`
--

INSERT INTO `jenis_material_sementara` (`id_jenis_material`, `nama_jenis_material`) VALUES
('JENMAT-1', 'Foam'),
('JENMAT-2', 'Rets'),
('JENMAT-3', 'Plastic Pack'),
('JENMAT-4', 'Karton');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id_jenis_produk` varchar(15) NOT NULL,
  `nama_jenis_produk` varchar(50) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_produk`
--

INSERT INTO `jenis_produk` (`id_jenis_produk`, `nama_jenis_produk`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('JENPROD-1', 'Pillow', 'USER-1', '2020-12-14 23:22:42', 'USER-2', '2020-12-21 18:17:08', '', '0000-00-00 00:00:00', 0),
('JENPROD-2', 'Mattress', 'USER-1', '2020-12-14 23:32:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JENPROD-3', 'Sofa', 'USER-1', '2020-12-19 11:54:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JENPROD-4', 'Cover Matt', 'USER-1', '2020-12-19 12:23:16', 'USER-1', '2020-12-19 12:23:33', '', '0000-00-00 00:00:00', 0),
('JENPROD-5', 'Floor Mattress', 'USER-1', '2020-12-19 12:36:04', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `jenis_produk`
--
DELIMITER $$
CREATE TRIGGER `edit_jenis_produk` AFTER UPDATE ON `jenis_produk` FOR EACH ROW INSERT INTO `jenis_produk_logs`(`id_jenis_produk_logs`, `keterangan_log`, `id_jenis_produk`, `nama_jenis_produk`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Edit Data',NEW.id_jenis_produk,NEW.nama_jenis_produk,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_jenis_produk` AFTER INSERT ON `jenis_produk` FOR EACH ROW INSERT INTO `jenis_produk_logs`(`id_jenis_produk_logs`, `keterangan_log`, `id_jenis_produk`, `nama_jenis_produk`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Insert Data',NEW.id_jenis_produk,NEW.nama_jenis_produk,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk_logs`
--

CREATE TABLE `jenis_produk_logs` (
  `id_jenis_produk_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_jenis_produk` varchar(15) NOT NULL,
  `nama_jenis_produk` varchar(50) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_produk_logs`
--

INSERT INTO `jenis_produk_logs` (`id_jenis_produk_logs`, `keterangan_log`, `id_jenis_produk`, `nama_jenis_produk`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(18, 'Insert Data', 'JENPROD-1', 'Pillow', 'USER-1', '2020-12-14 23:22:42', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(19, 'Insert Data', 'JENPROD-2', 'Mattress', 'USER-1', '2020-12-14 23:32:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(20, 'Insert Data', 'JENPROD-3', 'Sofa', 'USER-1', '2020-12-19 11:54:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(21, 'Insert Data', 'JENPROD-4', 'Cover', 'USER-1', '2020-12-19 12:23:16', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(22, 'Edit Data', 'JENPROD-4', 'Cover Mat', 'USER-1', '2020-12-19 12:23:16', 'USER-1', '2020-12-19 12:23:24', '', '0000-00-00 00:00:00', 0),
(23, 'Edit Data', 'JENPROD-4', 'Cover Matt', 'USER-1', '2020-12-19 12:23:16', 'USER-1', '2020-12-19 12:23:33', '', '0000-00-00 00:00:00', 0),
(24, 'Insert Data', 'JENPROD-5', 'Floor Mattress', 'USER-1', '2020-12-19 12:36:04', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(25, 'Edit Data', 'JENPROD-1', 'Pillows', 'USER-1', '2020-12-14 23:22:42', 'USER-1', '2020-12-21 12:15:44', '', '0000-00-00 00:00:00', 0),
(26, 'Edit Data', 'JENPROD-1', 'Pillow', 'USER-1', '2020-12-14 23:22:42', 'USER-2', '2020-12-21 18:17:08', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `keterangan` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `keterangan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('KAR-1', '000', 'x', 1, 'USER-1', '2020-12-21 12:54:50', 'USER-1', '2020-12-21 14:58:40', '', '0000-00-00 00:00:00', 0),
('KAR-10', '119.020.114', 'Sakidi', 1, 'USER-1', '2020-12-21 14:28:03', 'USER-1', '2020-12-21 14:35:27', '', '0000-00-00 00:00:00', 0),
('KAR-11', '119.020.116', 'Dalimin', 1, 'USER-1', '2020-12-21 14:28:39', 'USER-1', '2020-12-21 14:36:26', '', '0000-00-00 00:00:00', 0),
('KAR-12', '119.020.113', 'Ngatimin', 1, 'USER-1', '2020-12-21 14:29:08', 'USER-1', '2020-12-21 14:36:57', '', '0000-00-00 00:00:00', 0),
('KAR-13', '119.020.122', 'Achmad Nushi', 0, 'USER-1', '2020-12-21 14:40:04', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-14', '120.020.132', 'Durojak', 0, 'USER-1', '2020-12-21 14:40:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-15', '117.020.090', 'Sarodi', 0, 'USER-1', '2020-12-21 14:41:06', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-16', '119.020.120', 'Ibnu F', 0, 'USER-1', '2020-12-21 14:41:39', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-17', '119.020.118', 'Firman Am', 0, 'USER-1', '2020-12-21 14:42:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-18', '120.020.134', 'Komarudin', 0, 'USER-1', '2020-12-21 14:43:04', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-19', '115.020.026', 'Ahdi', 0, 'USER-1', '2020-12-21 14:44:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-2', '00', 'Andryan Dedy', 1, 'USER-1', '2020-12-21 14:16:06', 'USER-1', '2020-12-21 14:37:21', '', '0000-00-00 00:00:00', 0),
('KAR-20', '115.020.027', 'Sidik', 0, 'USER-1', '2020-12-21 14:45:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-21', '115.020.028', 'Salim', 0, 'USER-1', '2020-12-21 14:45:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-22', '115.020.030', 'Ade Mulyana', 0, 'USER-1', '2020-12-21 14:45:48', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-23', '116.020.052', 'M.Syaidin', 0, 'USER-1', '2020-12-21 14:46:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-24', '116.020.053', 'Suhendi', 0, 'USER-1', '2020-12-21 14:46:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-25', '117.020.082', 'Sutendar', 0, 'USER-1', '2020-12-21 14:47:16', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-26', '117.020.094', 'Siti Munawaroh', 0, 'USER-1', '2020-12-21 14:47:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-27', '119.020.109', 'Siti Jainah', 0, 'USER-1', '2020-12-21 14:48:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-28', '119.020.125', 'Irpan Kurniawan', 0, 'USER-1', '2020-12-21 14:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-29', '119.020.126', 'Suhardi IPI', 0, 'USER-1', '2020-12-21 14:48:51', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-3', '114.020.005', 'Julius Julianto', 1, 'USER-1', '2020-12-21 14:18:05', 'USER-1', '2020-12-21 14:24:45', '', '0000-00-00 00:00:00', 0),
('KAR-30', '114.020.010', 'Siti Masitoh', 0, 'USER-1', '2020-12-21 14:49:54', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-31', '118.020.101', 'Mulyadi H', 0, 'USER-1', '2020-12-21 14:50:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-32', '119.020.124', 'Memed Hermawan', 0, 'USER-1', '2020-12-21 14:50:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-33', '119.020.129', 'Ahmad Yusup', 0, 'USER-1', '2020-12-21 14:51:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-34', '120.020.130', 'Sandi', 0, 'USER-1', '2020-12-21 14:51:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-35', '114.020.015', 'Junaedi', 0, 'USER-1', '2020-12-21 14:52:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-36', '114.020.016', 'Yuni', 0, 'USER-1', '2020-12-21 14:52:37', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-37', '116.020.033', 'A. Muhatob', 0, 'USER-1', '2020-12-21 14:53:02', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-38', '117.020.075', 'Toni S', 0, 'USER-1', '2020-12-21 14:53:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-39', '117.020.086', 'Yudi Yardi', 0, 'USER-1', '2020-12-21 14:53:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-4', '114.020.006', 'Ita Purnamasari', 1, 'USER-1', '2020-12-21 14:19:03', 'USER-1', '2020-12-21 14:23:48', '', '0000-00-00 00:00:00', 0),
('KAR-40', '117.020.091', 'Yogi', 0, 'USER-1', '2020-12-21 14:54:10', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-41', '119.020.110', 'Firman Arif', 0, 'USER-1', '2020-12-21 14:54:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-42', '119.020.117', 'Dimas S', 0, 'USER-1', '2020-12-21 14:54:59', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-43', '119.020.121', 'Iwan', 0, 'USER-1', '2020-12-21 14:55:27', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-5', '0', 'Admin Produksi', 1, 'USER-1', '2020-12-21 14:21:08', 'USER-1', '2020-12-21 14:37:37', '', '0000-00-00 00:00:00', 0),
('KAR-6', '0000', 'Admin Risdev', 1, 'USER-1', '2020-12-21 14:22:08', 'USER-1', '2020-12-21 14:37:57', '', '0000-00-00 00:00:00', 0),
('KAR-7', '119.020.108', 'Anggi S', 1, 'USER-1', '2020-12-21 14:23:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-8', '114.020.001', 'Yudi Rusdian', 1, 'USER-1', '2020-12-21 14:25:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-9', '114.020.009', 'Nazarudin Aziz', 1, 'USER-1', '2020-12-21 14:26:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `karyawan`
--
DELIMITER $$
CREATE TRIGGER `edit_karyawan` AFTER UPDATE ON `karyawan` FOR EACH ROW INSERT INTO `karyawan_logs`(`id_karyawan_logs`,`keterangan_log`,`id_karyawan`,`nik`,`nama_karyawan`,`keterangan`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES (null,'Edit Data',NEW.id_karyawan,NEW.nik,NEW.nama_karyawan,NEW.keterangan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_karyawan` AFTER INSERT ON `karyawan` FOR EACH ROW INSERT INTO `karyawan_logs`(`id_karyawan_logs`,`keterangan_log`,`id_karyawan`,`nik`,`nama_karyawan`,`keterangan`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES (null,'Insert Data',NEW.id_karyawan,NEW.nik,NEW.nama_karyawan,NEW.keterangan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_logs`
--

CREATE TABLE `karyawan_logs` (
  `id_karyawan_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `keterangan` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan_logs`
--

INSERT INTO `karyawan_logs` (`id_karyawan_logs`, `keterangan_log`, `id_karyawan`, `nik`, `nama_karyawan`, `keterangan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(75, 'Insert Data', 'KAR-2', '000000001', 'Andryan Dedy', 1, 'USER-1', '2020-12-21 14:16:06', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(76, 'Insert Data', 'KAR-3', '114020005', 'Julius Julianto', 1, 'USER-1', '2020-12-21 14:18:05', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(77, 'Insert Data', 'KAR-4', '114020006', 'Ita Purnamasari', 1, 'USER-1', '2020-12-21 14:19:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(78, 'Insert Data', 'KAR-5', '001', 'Admin Produksi', 1, 'USER-1', '2020-12-21 14:21:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(79, 'Insert Data', 'KAR-6', '002', 'Admin Risdev', 1, 'USER-1', '2020-12-21 14:22:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(80, 'Insert Data', 'KAR-7', '119.020.108', 'Anggi S', 1, 'USER-1', '2020-12-21 14:23:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(81, 'Edit Data', 'KAR-2', '000.000.001', 'Andryan Dedy', 1, 'USER-1', '2020-12-21 14:16:06', 'USER-1', '2020-12-21 14:23:32', '', '0000-00-00 00:00:00', 0),
(82, 'Edit Data', 'KAR-3', '114.020.005', 'Julius Julianto', 1, 'USER-1', '2020-12-21 14:18:05', 'USER-1', '2020-12-21 14:23:40', '', '0000-00-00 00:00:00', 0),
(83, 'Edit Data', 'KAR-4', '114.020.006', 'Ita Purnamasari', 1, 'USER-1', '2020-12-21 14:19:03', 'USER-1', '2020-12-21 14:23:48', '', '0000-00-00 00:00:00', 0),
(84, 'Edit Data', 'KAR-5', '000.000.0002', 'Admin Produksi', 1, 'USER-1', '2020-12-21 14:21:08', 'USER-1', '2020-12-21 14:24:01', '', '0000-00-00 00:00:00', 0),
(85, 'Edit Data', 'KAR-6', '000.000.0003', 'Admin Risdev', 1, 'USER-1', '2020-12-21 14:22:08', 'USER-1', '2020-12-21 14:24:10', '', '0000-00-00 00:00:00', 0),
(86, 'Edit Data', 'KAR-3', '114.020.005', 'Julius Julianto', 1, 'USER-1', '2020-12-21 14:18:05', 'USER-1', '2020-12-21 14:24:45', '', '0000-00-00 00:00:00', 0),
(87, 'Insert Data', 'KAR-8', '114.020.001', 'Yudi Rusdian', 1, 'USER-1', '2020-12-21 14:25:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(88, 'Insert Data', 'KAR-9', '114.020.009', 'Nazarudin Aziz', 1, 'USER-1', '2020-12-21 14:26:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(89, 'Insert Data', 'KAR-10', '000.000.0004', 'pic1', 1, 'USER-1', '2020-12-21 14:28:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(90, 'Insert Data', 'KAR-11', '000.000.005', 'PIC2', 1, 'USER-1', '2020-12-21 14:28:39', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(91, 'Insert Data', 'KAR-12', '000.000.006', 'pic3', 1, 'USER-1', '2020-12-21 14:29:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(92, 'Edit Data', 'KAR-5', '000.000.002', 'Admin Produksi', 1, 'USER-1', '2020-12-21 14:21:08', 'USER-1', '2020-12-21 14:29:14', '', '0000-00-00 00:00:00', 0),
(93, 'Edit Data', 'KAR-10', '000.000.004', 'pic1', 1, 'USER-1', '2020-12-21 14:28:03', 'USER-1', '2020-12-21 14:29:18', '', '0000-00-00 00:00:00', 0),
(94, 'Edit Data', 'KAR-6', '000.000.003', 'Admin Risdev', 1, 'USER-1', '2020-12-21 14:22:08', 'USER-1', '2020-12-21 14:29:24', '', '0000-00-00 00:00:00', 0),
(95, 'Edit Data', 'KAR-10', '119.020.114', 'Sakidi', 1, 'USER-1', '2020-12-21 14:28:03', 'USER-1', '2020-12-21 14:35:27', '', '0000-00-00 00:00:00', 0),
(96, 'Edit Data', 'KAR-11', '119.020.116', 'Dalimin', 1, 'USER-1', '2020-12-21 14:28:39', 'USER-1', '2020-12-21 14:36:26', '', '0000-00-00 00:00:00', 0),
(97, 'Edit Data', 'KAR-12', '119.020.113', 'Ngatimin', 1, 'USER-1', '2020-12-21 14:29:08', 'USER-1', '2020-12-21 14:36:57', '', '0000-00-00 00:00:00', 0),
(98, 'Edit Data', 'KAR-2', '0000', 'Andryan Dedy', 1, 'USER-1', '2020-12-21 14:16:06', 'USER-1', '2020-12-21 14:37:09', '', '0000-00-00 00:00:00', 0),
(99, 'Edit Data', 'KAR-2', '00', 'Andryan Dedy', 1, 'USER-1', '2020-12-21 14:16:06', 'USER-1', '2020-12-21 14:37:21', '', '0000-00-00 00:00:00', 0),
(100, 'Edit Data', 'KAR-5', '0', 'Admin Produksi', 1, 'USER-1', '2020-12-21 14:21:08', 'USER-1', '2020-12-21 14:37:37', '', '0000-00-00 00:00:00', 0),
(101, 'Edit Data', 'KAR-6', '000', 'Admin Risdev', 1, 'USER-1', '2020-12-21 14:22:08', 'USER-1', '2020-12-21 14:37:45', '', '0000-00-00 00:00:00', 0),
(102, 'Edit Data', 'KAR-6', '0000', 'Admin Risdev', 1, 'USER-1', '2020-12-21 14:22:08', 'USER-1', '2020-12-21 14:37:57', '', '0000-00-00 00:00:00', 0),
(103, 'Insert Data', 'KAR-13', '119.020.122', 'Achmad Nushi', 0, 'USER-1', '2020-12-21 14:40:04', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(104, 'Insert Data', 'KAR-14', '120.020.132', 'Durojak', 0, 'USER-1', '2020-12-21 14:40:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(105, 'Insert Data', 'KAR-15', '117.020.090', 'Sarodi', 0, 'USER-1', '2020-12-21 14:41:06', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(106, 'Insert Data', 'KAR-16', '119.020.120', 'Ibnu F', 0, 'USER-1', '2020-12-21 14:41:39', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(107, 'Insert Data', 'KAR-17', '119.020.118', 'Firman Am', 0, 'USER-1', '2020-12-21 14:42:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(108, 'Insert Data', 'KAR-18', '120.020.134', 'Komarudin', 0, 'USER-1', '2020-12-21 14:43:04', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(109, 'Insert Data', 'KAR-19', '115.020.026', 'Ahdi', 0, 'USER-1', '2020-12-21 14:44:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(110, 'Insert Data', 'KAR-20', '115.020.027', 'Sidik', 0, 'USER-1', '2020-12-21 14:45:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(111, 'Insert Data', 'KAR-21', '115.020.028', 'Salim', 0, 'USER-1', '2020-12-21 14:45:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(112, 'Insert Data', 'KAR-22', '115.020.030', 'Ade Mulyana', 0, 'USER-1', '2020-12-21 14:45:48', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(113, 'Insert Data', 'KAR-23', '116.020.052', 'M.Syaidin', 0, 'USER-1', '2020-12-21 14:46:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(114, 'Insert Data', 'KAR-24', '116.020.053', 'Suhendi', 0, 'USER-1', '2020-12-21 14:46:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(115, 'Insert Data', 'KAR-25', '117.020.082', 'Sutendar', 0, 'USER-1', '2020-12-21 14:47:16', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(116, 'Insert Data', 'KAR-26', '117.020.094', 'Siti Munawaroh', 0, 'USER-1', '2020-12-21 14:47:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(117, 'Insert Data', 'KAR-27', '119.020.109', 'Siti Jainah', 0, 'USER-1', '2020-12-21 14:48:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(118, 'Insert Data', 'KAR-28', '119.020.125', 'Irpan Kurniawan', 0, 'USER-1', '2020-12-21 14:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(119, 'Insert Data', 'KAR-29', '119.020.126', 'Suhardi IPI', 0, 'USER-1', '2020-12-21 14:48:51', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(120, 'Insert Data', 'KAR-30', '114.020.010', 'Siti Masitoh', 0, 'USER-1', '2020-12-21 14:49:54', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(121, 'Insert Data', 'KAR-31', '118.020.101', 'Mulyadi H', 0, 'USER-1', '2020-12-21 14:50:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(122, 'Insert Data', 'KAR-32', '119.020.124', 'Memed Hermawan', 0, 'USER-1', '2020-12-21 14:50:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(123, 'Insert Data', 'KAR-33', '119.020.129', 'Ahmad Yusup', 0, 'USER-1', '2020-12-21 14:51:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(124, 'Insert Data', 'KAR-34', '120.020.130', 'Sandi', 0, 'USER-1', '2020-12-21 14:51:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(125, 'Insert Data', 'KAR-35', '114.020.015', 'Junaedi', 0, 'USER-1', '2020-12-21 14:52:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(126, 'Insert Data', 'KAR-36', '114.020.016', 'Yuni', 0, 'USER-1', '2020-12-21 14:52:37', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(127, 'Insert Data', 'KAR-37', '116.020.033', 'A. Muhatob', 0, 'USER-1', '2020-12-21 14:53:02', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(128, 'Insert Data', 'KAR-38', '117.020.075', 'Toni S', 0, 'USER-1', '2020-12-21 14:53:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(129, 'Insert Data', 'KAR-39', '117.020.086', 'Yudi Yardi', 0, 'USER-1', '2020-12-21 14:53:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(130, 'Insert Data', 'KAR-40', '117.020.091', 'Yogi', 0, 'USER-1', '2020-12-21 14:54:10', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(131, 'Insert Data', 'KAR-41', '119.020.110', 'Firman Arif', 0, 'USER-1', '2020-12-21 14:54:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(132, 'Insert Data', 'KAR-42', '119.020.117', 'Dimas S', 0, 'USER-1', '2020-12-21 14:54:59', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(133, 'Insert Data', 'KAR-43', '119.020.121', 'Iwan', 0, 'USER-1', '2020-12-21 14:55:27', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(134, 'Edit Data', 'KAR-1', '000', 'Amel', 1, 'USER-1', '2020-12-21 12:54:50', 'USER-1', '2020-12-21 14:57:00', '', '0000-00-00 00:00:00', 0),
(135, 'Edit Data', 'KAR-1', '000', 'x', 1, 'USER-1', '2020-12-21 12:54:50', 'USER-1', '2020-12-21 14:58:40', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `konsumsi_material`
--

CREATE TABLE `konsumsi_material` (
  `id_konsumsi_material` varchar(15) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `id_line` varchar(10) NOT NULL,
  `jumlah_konsumsi` decimal(11,2) NOT NULL,
  `status_konsumsi` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsumsi_material`
--

INSERT INTO `konsumsi_material` (`id_konsumsi_material`, `id_produk`, `id_sub_jenis_material`, `id_line`, `jumlah_konsumsi`, `status_konsumsi`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('KONMAT-1', 'PRDK-1', 'SUBJM-1', 'LINE-1', '1.00', 1, 'USER-2', '2020-12-21 18:20:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-10', 'PRDK-2', 'SUBJM-12', 'LINE-4', '5.00', 1, 'USER-2', '2020-12-21 19:24:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-11', 'PRDK-3', 'SUBJM-2', 'LINE-1', '1.00', 1, 'USER-2', '2020-12-21 19:42:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-12', 'PRDK-3', 'SUBJM-3', 'LINE-2', '10.00', 1, 'USER-2', '2020-12-21 19:42:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-13', 'PRDK-3', 'SUBJM-12', 'LINE-4', '3.00', 1, 'USER-2', '2020-12-21 19:42:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-14', 'PRDK-4', 'SUBJM-1', 'LINE-1', '1.00', 1, 'USER-2', '2020-12-21 19:47:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-15', 'PRDK-4', 'SUBJM-3', 'LINE-2', '5.00', 1, 'USER-2', '2020-12-21 19:47:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-16', 'PRDK-4', 'SUBJM-14', 'LINE-4', '2.00', 1, 'USER-2', '2020-12-21 19:47:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-17', 'PRDK-5', 'SUBJM-1', 'LINE-1', '1.00', 1, 'USER-2', '2020-12-21 19:53:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-18', 'PRDK-5', 'SUBJM-3', 'LINE-2', '10.00', 1, 'USER-2', '2020-12-21 19:53:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-19', 'PRDK-5', 'SUBJM-4', 'LINE-3', '5.00', 0, 'USER-2', '2020-12-21 19:53:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-2', 'PRDK-1', 'SUBJM-3', 'LINE-2', '50.00', 1, 'USER-2', '2020-12-21 18:20:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-20', 'PRDK-5', 'SUBJM-8', 'LINE-3', '5.00', 1, 'USER-2', '2020-12-21 19:53:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-21', 'PRDK-5', 'SUBJM-12', 'LINE-4', '1.00', 1, 'USER-2', '2020-12-21 19:53:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-3', 'PRDK-1', 'SUBJM-4', 'LINE-3', '5.00', 0, 'USER-2', '2020-12-21 18:20:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-4', 'PRDK-1', 'SUBJM-8', 'LINE-3', '5.00', 1, 'USER-2', '2020-12-21 18:20:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-5', 'PRDK-1', 'SUBJM-12', 'LINE-4', '4.00', 1, 'USER-2', '2020-12-21 18:20:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-6', 'PRDK-2', 'SUBJM-1', 'LINE-1', '1.00', 1, 'USER-2', '2020-12-21 19:24:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-7', 'PRDK-2', 'SUBJM-3', 'LINE-2', '10.00', 1, 'USER-2', '2020-12-21 19:24:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-8', 'PRDK-2', 'SUBJM-4', 'LINE-3', '5.00', 0, 'USER-2', '2020-12-21 19:24:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-9', 'PRDK-2', 'SUBJM-8', 'LINE-3', '5.00', 1, 'USER-2', '2020-12-21 19:24:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE `line` (
  `id_line` varchar(10) NOT NULL,
  `nama_line` varchar(20) NOT NULL,
  `urutan_line` int(1) NOT NULL,
  `jumlah_team` int(3) NOT NULL,
  `jumlah_pekerja_per_team` int(3) NOT NULL,
  `total_processing_time` int(5) NOT NULL,
  `satuan_biaya` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line`
--

INSERT INTO `line` (`id_line`, `nama_line`, `urutan_line`, `jumlah_team`, `jumlah_pekerja_per_team`, `total_processing_time`, `satuan_biaya`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('LINE-1', 'Line Cutting', 1, 1, 3, 9, 2000, 'USER-1', '2020-09-07 17:29:04', 'USER-1', '2020-12-21 12:12:11', '', '0000-00-00 00:00:00', 0),
('LINE-2', 'Line Bonding', 2, 1, 5, 9, 1000, 'USER-1', '2020-09-07 17:29:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('LINE-3', 'Line Sewing', 3, 10, 1, 90, 1000, 'USER-1', '2020-09-07 17:29:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('LINE-4', 'Line Assy', 4, 3, 5, 27, 1000, 'USER-1', '2020-09-07 17:29:59', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `line`
--
DELIMITER $$
CREATE TRIGGER `edit_line` AFTER UPDATE ON `line` FOR EACH ROW INSERT INTO `line_logs`(`id_line_logs`,`keterangan_log`, `id_line`, `nama_line`,`urutan_line`,`jumlah_team`, `total_processing_time`, `satuan_biaya`, `jumlah_pekerja_per_team`,`user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Edit Data',NEW.id_line,NEW.nama_line,NEW.urutan_line,NEW.jumlah_team,NEW.total_processing_time,NEW.satuan_biaya,NEW.jumlah_pekerja_per_team,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_line` AFTER INSERT ON `line` FOR EACH ROW INSERT INTO `line_logs`(`id_line_logs`,`keterangan_log`, `id_line`, `nama_line`,`urutan_line`,`jumlah_team`, `total_processing_time`, `satuan_biaya`, `jumlah_pekerja_per_team`,`user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Insert Data',NEW.id_line,NEW.nama_line,NEW.urutan_line,NEW.jumlah_team,NEW.total_processing_time,NEW.satuan_biaya,NEW.jumlah_pekerja_per_team,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `line_logs`
--

CREATE TABLE `line_logs` (
  `id_line_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_line` varchar(10) NOT NULL,
  `nama_line` varchar(20) NOT NULL,
  `urutan_line` int(1) NOT NULL,
  `jumlah_team` int(3) NOT NULL,
  `jumlah_pekerja_per_team` int(3) NOT NULL,
  `total_processing_time` int(5) NOT NULL,
  `satuan_biaya` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line_logs`
--

INSERT INTO `line_logs` (`id_line_logs`, `keterangan_log`, `id_line`, `nama_line`, `urutan_line`, `jumlah_team`, `jumlah_pekerja_per_team`, `total_processing_time`, `satuan_biaya`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(7, 'Insert Data', 'LINE-1', 'Line Cutting', 1, 1, 3, 9, 1000, 'USER-1', '2020-09-07 17:29:04', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(8, 'Insert Data', 'LINE-2', 'Line Bonding', 2, 1, 5, 9, 1000, 'USER-1', '2020-09-07 17:29:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(9, 'Insert Data', 'LINE-3', 'Line Sewing', 3, 10, 1, 90, 1000, 'USER-1', '2020-09-07 17:29:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(10, 'Insert Data', 'LINE-4', 'Line Assy', 4, 3, 5, 27, 1000, 'USER-1', '2020-09-07 17:29:59', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(11, 'Edit Data', 'LINE-1', 'Line Cutting', 1, 1, 3, 9, 2000, 'USER-1', '2020-09-07 17:29:04', 'USER-1', '2020-12-21 12:12:11', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id_material` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `sumber_material` int(11) NOT NULL,
  `status_keluar` int(11) NOT NULL,
  `id_detail_permintaan_material` int(30) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `material_line`
--

CREATE TABLE `material_line` (
  `id_material_line` varchar(30) NOT NULL,
  `id_material` varchar(30) NOT NULL,
  `id_line` varchar(30) NOT NULL,
  `user_add` varchar(30) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(30) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(30) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `material_supplier`
--

CREATE TABLE `material_supplier` (
  `id_material_supplier` varchar(30) NOT NULL,
  `id_material` varchar(30) NOT NULL,
  `id_supplier` varchar(30) NOT NULL,
  `user_add` varchar(30) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(30) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(30) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan_material`
--

CREATE TABLE `pemasukan_material` (
  `id_pemasukan_material` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `keterangan_masuk` int(11) NOT NULL,
  `catatan` varchar(500) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan_material_supplier`
--

CREATE TABLE `pemasukan_material_supplier` (
  `id_pemasukan_material_supplier` varchar(10) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `id_pemasukan_material` varchar(10) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengambilan_material`
--

CREATE TABLE `pengambilan_material` (
  `id_pengambilan_material` varchar(20) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `id_detail_permintaan_material` varchar(20) NOT NULL,
  `id_pengeluaran_material` varchar(20) NOT NULL,
  `tanggal_ambil` date NOT NULL,
  `stok_wip` decimal(11,2) NOT NULL,
  `jumlah_ambil` decimal(11,2) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status_pengambilan` int(1) NOT NULL,
  `status_keluar` int(1) NOT NULL,
  `status_permintaan` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_material`
--

CREATE TABLE `pengeluaran_material` (
  `id_pengeluaran_material` varchar(20) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jumlah_keluar` decimal(11,2) NOT NULL,
  `keterangan_keluar` int(11) NOT NULL,
  `catatan` varchar(500) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran_material`
--

INSERT INTO `pengeluaran_material` (`id_pengeluaran_material`, `id_sub_jenis_material`, `tanggal_keluar`, `jumlah_keluar`, `keterangan_keluar`, `catatan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('KELUAR-1', 'REB70', '2020-12-09', '45.00', 0, '', 'USER-1', '2020-12-09 18:01:20', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('KELUAR-2', 'SUBJM-5', '2020-12-18', '1.00', 0, '', 'USER-1', '2020-12-18 16:22:52', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('KELUAR-3', 'SUBJM-5', '2020-12-18', '1.00', 0, '', 'USER-1', '2020-12-18 16:22:55', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('KELUAR-4', 'SUBJM-5', '2020-12-18', '1.00', 0, '', 'USER-1', '2020-12-18 16:23:01', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('KELUAR-5', 'SUBJM-5', '2020-12-18', '1.00', 0, '', 'USER-1', '2020-12-18 16:23:04', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `perencanaan_cutting`
--

CREATE TABLE `perencanaan_cutting` (
  `id_perencanaan_cutting` varchar(14) NOT NULL,
  `id_detail_produksi_line` varchar(17) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_perencanaan` int(11) NOT NULL,
  `jumlah_aktual` int(11) NOT NULL,
  `status_laporan` int(1) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` date NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_material`
--

CREATE TABLE `permintaan_material` (
  `id_permintaan_material` varchar(20) NOT NULL,
  `id_detail_purchase_order_customer` varchar(10) NOT NULL,
  `id_line` varchar(10) NOT NULL,
  `jumlah_minta` int(11) NOT NULL,
  `tanggal_permintaan` date NOT NULL,
  `tanggal_produksi` date NOT NULL,
  `status_permintaan` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_pembelian`
--

CREATE TABLE `permintaan_pembelian` (
  `id_permintaan_pembelian` varchar(10) NOT NULL,
  `tanggal_permintaan` date NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `jumlah_material` int(11) NOT NULL,
  `satuan_keluar` varchar(30) NOT NULL,
  `status_pembelian` int(11) NOT NULL,
  `keterangan` int(11) NOT NULL,
  `catatan` varchar(500) NOT NULL,
  `id_detail_purchase_order_supplier` varchar(10) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_tambahan`
--

CREATE TABLE `permintaan_tambahan` (
  `id_permintaan_tambahan` varchar(15) NOT NULL,
  `id_detail_permintaan_material` varchar(20) NOT NULL,
  `id_pengambilan_material` varchar(20) NOT NULL,
  `jumlah_tambah` decimal(11,2) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_akses`
--

CREATE TABLE `permohonan_akses` (
  `id_permohonan_akses` varchar(15) NOT NULL,
  `id_data` varchar(20) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `nama_permohonan_akses` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status_permohonan` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `persediaan_line`
--

CREATE TABLE `persediaan_line` (
  `id_persediaan_line` varchar(10) NOT NULL,
  `id_line` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `total_material` decimal(11,2) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `persediaan_line_keluar`
--

CREATE TABLE `persediaan_line_keluar` (
  `id_persediaan_line_keluar` varchar(15) NOT NULL,
  `id_persediaan_line` varchar(10) NOT NULL,
  `id_pengambilan_material` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_material` decimal(11,2) NOT NULL,
  `status` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `persediaan_line_masuk`
--

CREATE TABLE `persediaan_line_masuk` (
  `id_persediaan_line_masuk` varchar(15) NOT NULL,
  `id_persediaan_line` varchar(10) NOT NULL,
  `id_detail_permintaan_material` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_material` decimal(11,2) NOT NULL,
  `status` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perubahan_harga`
--

CREATE TABLE `perubahan_harga` (
  `id_perubahan_harga` varchar(10) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `harga_sebelum` int(11) NOT NULL,
  `harga_sesudah` int(11) NOT NULL,
  `status_persetujuan` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `perubahan_permintaan`
--

CREATE TABLE `perubahan_permintaan` (
  `id_perubahan_permintaan` varchar(15) NOT NULL,
  `id_permintaan_material` varchar(20) NOT NULL,
  `jumlah_minta_lama` int(11) NOT NULL,
  `jumlah_minta_baru` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `status_sebelum` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `planning_material`
--

CREATE TABLE `planning_material` (
  `id_planning_material` varchar(10) NOT NULL,
  `id_detail_permintaan_material` varchar(10) NOT NULL,
  `tanggal_keluar` datetime NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `status_stok` int(11) NOT NULL,
  `status_pengambilan` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(10) NOT NULL,
  `id_jenis_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `keterangan_produksi` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_jenis_produk`, `nama_produk`, `harga_produk`, `keterangan_produksi`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('PRDK-1', 'JENPROD-1', 'A/F BODY PILLOW HARD', 116536, 0, 'USER-2', '2020-12-21 18:20:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PRDK-2', 'JENPROD-1', 'A/F BODY PILLOW SOFT', 116555, 0, 'USER-2', '2020-12-21 19:24:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PRDK-3', 'JENPROD-3', 'Atease Baguette Sofa Havana ', 1283922, 1, 'USER-2', '2020-12-21 19:42:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PRDK-4', 'JENPROD-5', 'Boa Rug Floor Mat145', 315933, 1, 'USER-2', '2020-12-21 19:47:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PRDK-5', 'JENPROD-2', 'Commpact Matress Aoki', 318686, 0, 'USER-2', '2020-12-21 19:53:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `produk`
--
DELIMITER $$
CREATE TRIGGER `edit_produk` AFTER UPDATE ON `produk` FOR EACH ROW INSERT INTO `produk_logs`(`id_produk_logs`,`keterangan_log`,`id_produk`,`id_jenis_produk`,`nama_produk`,`harga_produk`,`keterangan_produksi`,`user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES(null,'Edit Data',NEW.id_produk,NEW.id_jenis_produk,NEW.nama_produk,NEW.harga_produk,NEW.keterangan_produksi,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_produk` AFTER INSERT ON `produk` FOR EACH ROW INSERT INTO `produk_logs`(`id_produk_logs`,`keterangan_log`,`id_produk`,`id_jenis_produk`,`nama_produk`,`harga_produk`,`keterangan_produksi`,`user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES(null,'Insert Data',NEW.id_produk,NEW.id_jenis_produk,NEW.nama_produk,NEW.harga_produk,NEW.keterangan_produksi,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `status_perencanaan` int(1) NOT NULL,
  `status_laporan` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produksi_line`
--

CREATE TABLE `produksi_line` (
  `id_produksi_line` varchar(15) NOT NULL,
  `id_line` varchar(10) NOT NULL,
  `id_produksi` varchar(15) NOT NULL,
  `total_processing_time` int(11) NOT NULL,
  `total_waktu_perencanaan` int(11) NOT NULL,
  `total_waktu_aktual` int(11) NOT NULL,
  `efisiensi_perencanaan` decimal(11,2) NOT NULL,
  `efisiensi_aktual` decimal(11,2) NOT NULL,
  `keterangan_laporan` varchar(500) NOT NULL,
  `status_perencanaan` int(1) NOT NULL,
  `status_laporan` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produksi_logs`
--

CREATE TABLE `produksi_logs` (
  `id_produksi_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_produksi` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `status_laporan` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produksi_tertunda`
--

CREATE TABLE `produksi_tertunda` (
  `id_produksi_tertunda` varchar(20) NOT NULL,
  `id_detail_produksi_line` varchar(17) NOT NULL,
  `jumlah_tertunda` int(11) NOT NULL,
  `jumlah_terencana` int(11) NOT NULL,
  `status_penjadwalan` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk_logs`
--

CREATE TABLE `produk_logs` (
  `id_produk_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `id_jenis_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `keterangan_produksi` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_logs`
--

INSERT INTO `produk_logs` (`id_produk_logs`, `keterangan_log`, `id_produk`, `id_jenis_produk`, `nama_produk`, `harga_produk`, `keterangan_produksi`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 'Insert Data', 'PRDK-1', 'JENPROD-1', 'A/F BODY PILLOW HARD', 116536, 0, 'USER-2', '2020-12-21 18:20:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(2, 'Insert Data', 'PRDK-2', 'JENPROD-1', 'A/F BODY PILLOW SOFT', 116555, 0, 'USER-2', '2020-12-21 19:24:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(3, 'Insert Data', 'PRDK-3', 'JENPROD-3', 'Atease Baguette Sofa Havana ', 1283922, 1, 'USER-2', '2020-12-21 19:42:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(4, 'Insert Data', 'PRDK-4', 'JENPROD-5', 'Boa Rug Floor Mat145', 315933, 1, 'USER-2', '2020-12-21 19:47:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(5, 'Insert Data', 'PRDK-5', 'JENPROD-2', 'Commpact Matress Aoki', 318686, 0, 'USER-2', '2020-12-21 19:53:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_customer`
--

CREATE TABLE `purchase_order_customer` (
  `id_purchase_order_customer` varchar(10) NOT NULL,
  `kode_purchase_order_customer` varchar(30) NOT NULL,
  `id_customer` varchar(10) NOT NULL,
  `tanggal_po` date NOT NULL,
  `harga_sebelum_pajak` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `total_harga_akhir` int(11) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status_po` int(11) NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order_customer`
--

INSERT INTO `purchase_order_customer` (`id_purchase_order_customer`, `kode_purchase_order_customer`, `id_customer`, `tanggal_po`, `harga_sebelum_pajak`, `ppn`, `total_harga_akhir`, `keterangan`, `status_po`, `tanggal_selesai`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('POC-1', 'L2001231', 'CUST-1', '2020-12-15', 1161799500, 116179950, 1277979450, '', 1, '0000-00-00', 'USER-1', '2020-12-15 10:11:48', 'USER-7', '2020-12-19 14:35:17', '0', '0000-00-00 00:00:00', 0),
('POC-2', 'L2001232', 'CUST-1', '2020-12-15', 116536000, 11653600, 128189600, '', 1, '0000-00-00', 'USER-1', '2020-12-15 10:12:39', 'USER-1', '2020-12-18 20:35:53', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_supplier`
--

CREATE TABLE `purchase_order_supplier` (
  `id_purchase_order_supplier` varchar(10) NOT NULL,
  `kode_purchase_order_supplier` varchar(50) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `tanggal_po` date NOT NULL,
  `harga_sebelum_pajak` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `total_harga_akhir` int(11) NOT NULL,
  `status_po` int(11) NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order_supplier`
--

INSERT INTO `purchase_order_supplier` (`id_purchase_order_supplier`, `kode_purchase_order_supplier`, `id_supplier`, `tanggal_po`, `harga_sebelum_pajak`, `ppn`, `total_harga_akhir`, `status_po`, `tanggal_selesai`, `keterangan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('POS-1', '', 'SUP-1', '2020-05-10', 184000, 18400, 202400, 0, '0000-00-00', '', 'USER-1', '2020-10-09 14:30:32', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` varchar(10) NOT NULL,
  `id_bank` varchar(10) NOT NULL,
  `nomor_rekening` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `kantor_cabang` varchar(30) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `id_bank`, `nomor_rekening`, `atas_nama`, `kantor_cabang`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('REK-1', 'BANK-2', '8350060899', 'PT. MAJU BERSAMA PERSADA DAYAMU', 'Daan Mogot', 'USER-1', '2020-08-30 22:12:25', 'USER-1', '2020-12-17 10:21:37', '', '0000-00-00 00:00:00', 0),
('REK-2', 'BANK-2', '020202', 'PT. Maju Bersama Persada Dayamu', 'Alam Sutera', 'USER-1', '2020-09-08 23:37:34', 'USER-1', '2020-09-08 23:39:26', '', '0000-00-00 00:00:00', 1),
('REK-3', 'BANK-3', '566800007270', 'PT. MAJU BERSAMA PERSADA DAYAMU', 'Alam Sutera', 'USER-1', '2020-09-24 23:01:00', 'USER-1', '2020-12-17 10:20:56', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `rekening`
--
DELIMITER $$
CREATE TRIGGER `edit_rekening` AFTER UPDATE ON `rekening` FOR EACH ROW INSERT INTO `rekening_logs`(`id_rekening_logs`,`keterangan_log`,`id_rekening`, 
`id_bank`,`nomor_rekening`,`atas_nama`,`kantor_cabang`,`user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Edit Data',NEW.id_rekening,NEW.id_bank,NEW.nomor_rekening,NEW.atas_nama,NEW.kantor_cabang,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_rekening` AFTER INSERT ON `rekening` FOR EACH ROW INSERT INTO `rekening_logs`(`id_rekening_logs`,`keterangan_log`,`id_rekening`, 
`id_bank`,`nomor_rekening`,`atas_nama`,`kantor_cabang`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Insert Data',NEW.id_rekening,NEW.id_bank,NEW.nomor_rekening,NEW.atas_nama,NEW.kantor_cabang,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rekening_logs`
--

CREATE TABLE `rekening_logs` (
  `id_rekening_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_rekening` varchar(10) NOT NULL,
  `id_bank` varchar(10) NOT NULL,
  `nomor_rekening` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `kantor_cabang` varchar(30) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening_logs`
--

INSERT INTO `rekening_logs` (`id_rekening_logs`, `keterangan_log`, `id_rekening`, `id_bank`, `nomor_rekening`, `atas_nama`, `kantor_cabang`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 'Insert Data', 'REK-1', 'BANK-2', '01', 'PT. Maju Bersama Persada Dayamu', 'Alam Sutera', 'USER-1', '2020-08-30 22:12:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(2, 'Edit Data', 'REK-1', 'BANK-2', '010101', 'PT. Maju Bersama Persada Dayamu', 'Alam Sutera', 'USER-1', '2020-08-30 22:12:25', 'USER-1', '2020-08-30 22:12:48', '', '0000-00-00 00:00:00', 0),
(3, 'Edit Data', 'REK-1', 'BANK-2', '0101011', 'PT. Maju Bersama Persada Dayamu', 'Alam Sutera', 'USER-1', '2020-08-30 22:12:25', 'USER-1', '2020-08-30 22:17:48', '', '0000-00-00 00:00:00', 0),
(4, 'Edit Data', 'REK-1', 'BANK-2', '010101', 'PT. Maju Bersama Persada Dayamu', 'Alam Sutera', 'USER-1', '2020-08-30 22:12:25', 'USER-1', '2020-08-30 22:17:53', '', '0000-00-00 00:00:00', 0),
(5, 'Insert Data', 'REK-2', 'BANK-2', '020202', 'PT. Maju Bersama Persada Dayamu', 'Alam Sutera', 'USER-1', '2020-09-08 23:37:34', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(6, 'Edit Data', 'REK-2', 'BANK-2', '0202021', 'PT. Maju Bersama Persada Dayamu', 'Alam Sutera', 'USER-1', '2020-09-08 23:37:34', 'USER-1', '2020-09-08 23:37:37', '', '0000-00-00 00:00:00', 0),
(7, 'Edit Data', 'REK-2', 'BANK-2', '020202', 'PT. Maju Bersama Persada Dayamu', 'Alam Sutera', 'USER-1', '2020-09-08 23:37:34', 'USER-1', '2020-09-08 23:37:40', '', '0000-00-00 00:00:00', 0),
(8, 'Edit Data', 'REK-2', 'BANK-2', '020202', 'PT. Maju Bersama Persada Dayamu', 'Alam Sutera', 'USER-1', '2020-09-08 23:37:34', 'USER-1', '2020-09-08 23:39:26', '', '0000-00-00 00:00:00', 1),
(9, 'Insert Data', 'REK-3', 'BANK-3', '0010001', 'PT. Maju Bersama Persada Dayamu', 'Alam Sutera', 'USER-1', '2020-09-24 23:01:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(10, 'Edit Data', 'REK-3', 'BANK-3', '566800007270', 'PT. MAJU BERSAMA PERSADA DAYAMU', 'Alam Sutera', 'USER-1', '2020-09-24 23:01:00', 'USER-1', '2020-12-17 10:20:56', '', '0000-00-00 00:00:00', 0),
(11, 'Edit Data', 'REK-1', 'BANK-2', '8350060899', 'PT. MAJU BERSAMA PERSADA DAYAMU', 'Daan Mogot', 'USER-1', '2020-08-30 22:12:25', 'USER-1', '2020-12-17 10:21:37', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `id_sales_order` varchar(10) NOT NULL,
  `tanggal_so` date NOT NULL,
  `tanggal_pengantaran` date NOT NULL,
  `dibuat_oleh` varchar(10) NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `diterima_oleh` varchar(10) NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `id_purchase_order_customer` varchar(10) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`id_sales_order`, `tanggal_so`, `tanggal_pengantaran`, `dibuat_oleh`, `tanggal_dibuat`, `diterima_oleh`, `tanggal_diterima`, `id_purchase_order_customer`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('SO-1', '2020-12-15', '2020-12-22', 'USER-1', '2020-12-15', '', '0000-00-00', 'POC-1', 'USER-1', '2020-12-15 10:11:48', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SO-2', '2020-12-15', '2020-12-22', 'USER-1', '2020-12-15', '', '0000-00-00', 'POC-2', 'USER-1', '2020-12-15 10:12:39', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `spesifikasi_jabatan`
--

CREATE TABLE `spesifikasi_jabatan` (
  `id_spesifikasi_jabatan` varchar(10) NOT NULL,
  `id_jabatan` varchar(10) NOT NULL,
  `id_departemen` varchar(10) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spesifikasi_jabatan`
--

INSERT INTO `spesifikasi_jabatan` (`id_spesifikasi_jabatan`, `id_jabatan`, `id_departemen`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('SJBT-1', 'JBT-1', 'DEPT-1', 'USER-1', '2020-12-21 12:53:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-10', 'JBT-4', 'DEPT-6', 'USER-1', '2020-12-21 14:08:48', 'USER-1', '2020-12-21 14:13:21', '', '0000-00-00 00:00:00', 0),
('SJBT-11', 'JBT-6', 'DEPT-3', 'USER-1', '2020-12-21 14:10:05', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-12', 'JBT-7', 'DEPT-3', 'USER-1', '2020-12-21 14:10:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-13', 'JBT-8', 'DEPT-3', 'USER-1', '2020-12-21 14:10:17', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-14', 'JBT-9', 'DEPT-3', 'USER-1', '2020-12-21 14:10:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-15', 'JBT-11', 'DEPT-3', 'USER-1', '2020-12-21 14:10:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-16', 'JBT-12', 'DEPT-3', 'USER-1', '2020-12-21 14:10:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-17', 'JBT-13', 'DEPT-3', 'USER-1', '2020-12-21 14:10:41', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-18', 'JBT-14', 'DEPT-3', 'USER-1', '2020-12-21 14:10:46', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-2', 'JBT-2', 'DEPT-2', 'USER-1', '2020-12-21 14:03:57', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-3', 'JBT-3', 'DEPT-2', 'USER-1', '2020-12-21 14:07:06', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-4', 'JBT-10', 'DEPT-3', 'USER-1', '2020-12-21 14:07:27', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-5', 'JBT-4', 'DEPT-3', 'USER-1', '2020-12-21 14:07:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-6', 'JBT-10', 'DEPT-7', 'USER-1', '2020-12-21 14:07:57', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-7', 'JBT-5', 'DEPT-7', 'USER-1', '2020-12-21 14:08:10', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-8', 'JBT-4', 'DEPT-5', 'USER-1', '2020-12-21 14:08:27', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-9', 'JBT-4', 'DEPT-4', 'USER-1', '2020-12-21 14:08:42', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `spesifikasi_jabatan`
--
DELIMITER $$
CREATE TRIGGER `edit_spesifikasi_jabatan` AFTER UPDATE ON `spesifikasi_jabatan` FOR EACH ROW INSERT INTO `spesifikasi_jabatan_logs`(`id_spesifikasi_jabatan_logs`, `keterangan_log`, `id_spesifikasi_jabatan`, `id_jabatan`,`id_departemen`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Edit Data',NEW.id_spesifikasi_jabatan,NEW.id_jabatan,NEW.id_departemen,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_spesifikasi_jabatan` AFTER INSERT ON `spesifikasi_jabatan` FOR EACH ROW INSERT INTO `spesifikasi_jabatan_logs`(`id_spesifikasi_jabatan_logs`, `keterangan_log`, `id_spesifikasi_jabatan`, `id_jabatan`,`id_departemen`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Insert Data',NEW.id_spesifikasi_jabatan,NEW.id_jabatan,NEW.id_departemen,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `spesifikasi_jabatan_logs`
--

CREATE TABLE `spesifikasi_jabatan_logs` (
  `id_spesifikasi_jabatan_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_spesifikasi_jabatan` varchar(10) NOT NULL,
  `id_jabatan` varchar(10) NOT NULL,
  `id_departemen` varchar(10) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spesifikasi_jabatan_logs`
--

INSERT INTO `spesifikasi_jabatan_logs` (`id_spesifikasi_jabatan_logs`, `keterangan_log`, `id_spesifikasi_jabatan`, `id_jabatan`, `id_departemen`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 'Insert Data', 'SJBT-2', 'JBT-2', 'DEPT-2', 'USER-1', '2020-12-21 14:03:57', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(2, 'Insert Data', 'SJBT-3', 'JBT-3', 'DEPT-2', 'USER-1', '2020-12-21 14:07:06', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(3, 'Insert Data', 'SJBT-4', 'JBT-10', 'DEPT-3', 'USER-1', '2020-12-21 14:07:27', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(4, 'Insert Data', 'SJBT-5', 'JBT-4', 'DEPT-3', 'USER-1', '2020-12-21 14:07:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(5, 'Insert Data', 'SJBT-6', 'JBT-10', 'DEPT-7', 'USER-1', '2020-12-21 14:07:57', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(6, 'Insert Data', 'SJBT-7', 'JBT-5', 'DEPT-7', 'USER-1', '2020-12-21 14:08:10', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(7, 'Insert Data', 'SJBT-8', 'JBT-4', 'DEPT-5', 'USER-1', '2020-12-21 14:08:27', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(8, 'Insert Data', 'SJBT-9', 'JBT-4', 'DEPT-4', 'USER-1', '2020-12-21 14:08:42', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(9, 'Insert Data', 'SJBT-10', 'JBT-4', 'DEPT-6', 'USER-1', '2020-12-21 14:08:48', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(10, 'Insert Data', 'SJBT-11', 'JBT-6', 'DEPT-3', 'USER-1', '2020-12-21 14:10:05', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(11, 'Insert Data', 'SJBT-12', 'JBT-7', 'DEPT-3', 'USER-1', '2020-12-21 14:10:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(12, 'Insert Data', 'SJBT-13', 'JBT-8', 'DEPT-3', 'USER-1', '2020-12-21 14:10:17', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(13, 'Insert Data', 'SJBT-14', 'JBT-9', 'DEPT-3', 'USER-1', '2020-12-21 14:10:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(14, 'Insert Data', 'SJBT-15', 'JBT-11', 'DEPT-3', 'USER-1', '2020-12-21 14:10:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(15, 'Insert Data', 'SJBT-16', 'JBT-12', 'DEPT-3', 'USER-1', '2020-12-21 14:10:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(16, 'Insert Data', 'SJBT-17', 'JBT-13', 'DEPT-3', 'USER-1', '2020-12-21 14:10:41', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(17, 'Insert Data', 'SJBT-18', 'JBT-14', 'DEPT-3', 'USER-1', '2020-12-21 14:10:46', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(18, 'Edit Data', 'SJBT-10', 'JBT-15', 'DEPT-6', 'USER-1', '2020-12-21 14:08:48', 'USER-1', '2020-12-21 14:13:10', '', '0000-00-00 00:00:00', 0),
(19, 'Edit Data', 'SJBT-10', 'JBT-4', 'DEPT-6', 'USER-1', '2020-12-21 14:08:48', 'USER-1', '2020-12-21 14:13:21', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_customer`
--

CREATE TABLE `sub_customer` (
  `id_sub_customer` varchar(10) NOT NULL,
  `nama_sub_customer` varchar(30) NOT NULL,
  `id_customer` varchar(10) NOT NULL,
  `nama_pic` varchar(30) NOT NULL,
  `no_telp_pic` varchar(20) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_customer`
--

INSERT INTO `sub_customer` (`id_sub_customer`, `nama_sub_customer`, `id_customer`, `nama_pic`, `no_telp_pic`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('SUBCUST-1', 'PT. Techno', 'CUST-1', 'Amelia', '089812345678', 'USER-1', '2020-09-30 22:49:35', 'USER-1', '2020-10-09 02:08:01', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_jenis_material`
--

CREATE TABLE `sub_jenis_material` (
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `kode_sub_jenis_material` varchar(10) NOT NULL,
  `nama_sub_jenis_material` varchar(30) NOT NULL,
  `id_jenis_material` varchar(10) NOT NULL,
  `sumber` int(11) NOT NULL,
  `satuan_ukuran` varchar(30) NOT NULL,
  `satuan_keluar` varchar(30) NOT NULL,
  `ukuran_satuan_keluar` int(11) NOT NULL,
  `min_stok` int(11) NOT NULL,
  `max_stok` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_jenis_material`
--

INSERT INTO `sub_jenis_material` (`id_sub_jenis_material`, `kode_sub_jenis_material`, `nama_sub_jenis_material`, `id_jenis_material`, `sumber`, `satuan_ukuran`, `satuan_keluar`, `ukuran_satuan_keluar`, `min_stok`, `max_stok`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('SUBJM-1', 'F001', 'REB55', 'JM-1', 0, 'pcs', 'pcs', 1, 5, 20, 'USER-1', '2020-10-31 21:38:11', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-10', 'K001', 'Kancing Plastik Warna Putih', 'JM-6', 0, 'pack', 'pcs', 10, 10, 10, 'USER-1', '2020-10-31 21:57:05', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-11', 'K002', 'Kancing Plastik Warna Hitam', 'JM-6', 0, 'pack', 'pcs', 10, 5, 5, 'USER-1', '2020-10-31 21:57:31', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-12', 'K001', 'Karton Protector Aeroflow T.20', 'JM-7', 0, 'pcs', 'pcs', 1, 30, 50, 'USER-1', '2020-10-31 21:59:15', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-13', 'K002', 'Kartu Garansi INOAC', 'JM-7', 0, 'pcs', 'pcs', 1, 50, 100, 'USER-1', '2020-10-31 22:00:11', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-14', 'L001', 'Lakban Naci Tape ', 'JM-8', 0, 'roll', 'mtr', 60, 5, 10, 'USER-1', '2020-10-31 23:45:23', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-15', 'L002', 'Lakban Double Tape Joyko/Kenko', 'JM-8', 0, 'roll', 'mtr', 60, 5, 10, 'USER-1', '2020-10-31 23:46:00', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-2', 'F002', 'REB70', 'JM-1', 0, 'pcs', 'pcs', 1, 5, 10, 'USER-1', '2020-10-31 21:38:29', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-3', 'L001', 'Lem Spray ISAMU 320', 'JM-2', 0, 'blek', 'ml', 100, 2, 5, 'USER-1', '2020-10-31 21:41:40', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-4', 'K001', 'Kain Floral Rose Red', 'JM-3', 0, 'roll', 'mtr', 60, 5, 5, 'USER-1', '2020-10-31 21:46:05', 'USER-1', '2020-12-12 14:22:18', '0', '0000-00-00 00:00:00', 0),
('SUBJM-5', 'K002', 'Kain Pandora Grey', 'JM-3', 0, 'roll', 'mtr', 60, 5, 5, 'USER-1', '2020-10-31 21:47:03', 'USER-1', '2020-12-15 11:33:54', '0', '0000-00-00 00:00:00', 0),
('SUBJM-6', 'F001', 'Frame Armrest Paramont', 'JM-4', 0, 'pcs', 'pcs', 1, 5, 10, 'USER-1', '2020-10-31 21:52:58', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-7', 'F002', 'Frame Floor Chair', 'JM-4', 0, 'pcs', 'pcs', 1, 5, 10, 'USER-1', '2020-10-31 21:53:26', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-8', 'B001', 'Benang 20/3 Point Color 145 Me', 'JM-5', 0, 'roll', 'mtr', 60, 10, 10, 'USER-1', '2020-10-31 21:54:28', 'USER-1', '2020-10-31 23:51:31', '0', '0000-00-00 00:00:00', 0),
('SUBJM-9', 'B002', 'Benang 20/3 Point Color 178 Cr', 'JM-5', 0, 'roll', 'mtr', 60, 5, 10, 'USER-1', '2020-10-31 21:55:06', 'USER-1', '2020-10-31 23:51:41', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(30) NOT NULL,
  `alamat_supplier` varchar(100) NOT NULL,
  `no_telp_supplier` varchar(20) NOT NULL,
  `email_supplier` varchar(50) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `no_telp_supplier`, `email_supplier`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('SUP-1', 'PT. INOAC POLYTECHNO INDONESIA', 'Tangerang', '081234567890', 'inoac@gmail.com', 'USER-1', '2020-10-09 01:49:14', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUP-2', 'PT. MIRA USAHA BAKTI LESTARI', 'Jakarta', '087819274830', 'mirausaha@gmail.com', 'USER-1', '2020-10-09 02:04:13', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `surat_jalan`
--

CREATE TABLE `surat_jalan` (
  `id_surat_jalan` varchar(15) NOT NULL,
  `id_purchase_order_customer` varchar(10) NOT NULL,
  `id_invoice` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `kendaraan` varchar(100) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `keterangan_pengiriman` varchar(100) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status_surat_jalan` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_perintah_lembur`
--

CREATE TABLE `surat_perintah_lembur` (
  `id_surat_perintah_lembur` varchar(15) NOT NULL,
  `id_line` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_lembur` varchar(15) NOT NULL,
  `keterangan_perintah` varchar(500) NOT NULL,
  `keterangan_laporan` varchar(500) NOT NULL,
  `status_spl` int(1) NOT NULL,
  `keterangan_spl` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tetapan`
--

CREATE TABLE `tetapan` (
  `id_tetapan` varchar(10) NOT NULL,
  `nama_tetapan` varchar(50) NOT NULL,
  `isi_tetapan` varchar(300) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tetapan`
--

INSERT INTO `tetapan` (`id_tetapan`, `nama_tetapan`, `isi_tetapan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('TTPN-1', 'Nama Perusahaan', 'PT. Maju Bersama Persada Dayamu', 'USER-1', '2020-08-30 14:00:40', 'USER-1', '2020-08-30 14:01:37', '', '0000-00-00 00:00:00', 0),
('TTPN-10', 'Rabu', 'Hari Produksi', 'USER-1', '2020-09-09 01:49:31', 'USER-1', '2020-09-24 22:58:37', '', '0000-00-00 00:00:00', 0),
('TTPN-11', 'Kamis', 'Hari Produksi', 'USER-1', '2020-09-09 01:49:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('TTPN-12', 'Jumat', 'Hari Produksi', 'USER-1', '2020-09-09 01:49:46', 'USER-1', '2020-09-09 01:58:09', '', '0000-00-00 00:00:00', 0),
('TTPN-13', 'Sabtu', 'Hari Libur', 'USER-1', '2020-09-09 01:49:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('TTPN-14', 'Minggu', 'Hari Libur', 'USER-1', '2020-09-09 01:50:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('TTPN-15', 'Bidang Usaha', 'Furniture and Automotive Part Manufacturer', 'USER-1', '2020-09-28 01:47:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('TTPN-16', 'Kota Perusahaan', 'Tangerang', 'USER-1', '2020-09-28 13:15:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('TTPN-2', 'E-mail Perusahaan', 'finance@mbpindo.com', 'USER-1', '2020-08-30 14:28:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('TTPN-3', 'Alamat Perusahaan', 'Jl. Boulevard blok L 7 nomor 1 H Citra Raya, Cikupa, Tangerang', 'USER-1', '2020-08-30 14:29:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('TTPN-4', 'Phone/Fax', '(021) 5986198', 'USER-1', '2020-08-30 14:29:19', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('TTPN-5', 'Website', 'www.mbpd-indo.com', 'USER-1', '2020-08-30 14:29:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('TTPN-6', 'Processing time', '9', 'USER-1', '2020-08-30 14:29:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('TTPN-7', 'PPN', '10', 'USER-1', '2020-08-30 14:30:02', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('TTPN-8', 'Senin', 'Hari Produksi', 'USER-1', '2020-09-09 01:49:14', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('TTPN-9', 'Selasa', 'Hari Produksi', 'USER-1', '2020-09-09 01:49:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `tetapan`
--
DELIMITER $$
CREATE TRIGGER `edit_tetapan` AFTER UPDATE ON `tetapan` FOR EACH ROW INSERT INTO `tetapan_logs`(`id_tetapan_logs`,`keterangan_log`,`id_tetapan`, `nama_tetapan`, `isi_tetapan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Edit Data',NEW.id_tetapan,NEW.nama_tetapan,NEW.isi_tetapan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_tetapan` AFTER INSERT ON `tetapan` FOR EACH ROW INSERT INTO `tetapan_logs`(`id_tetapan_logs`,`keterangan_log`,`id_tetapan`, `nama_tetapan`, `isi_tetapan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Insert Data',NEW.id_tetapan,NEW.nama_tetapan,NEW.isi_tetapan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tetapan_logs`
--

CREATE TABLE `tetapan_logs` (
  `id_tetapan_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_tetapan` varchar(10) NOT NULL,
  `nama_tetapan` varchar(50) NOT NULL,
  `isi_tetapan` varchar(300) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tetapan_logs`
--

INSERT INTO `tetapan_logs` (`id_tetapan_logs`, `keterangan_log`, `id_tetapan`, `nama_tetapan`, `isi_tetapan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 'Insert Data', 'TTPN-1', 'Nama Perusahaan', 'PT. Maju Bersama Persada Dayamu', 'USER-1', '2020-08-30 14:00:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(2, 'Edit Data', 'TTPN-1', 'Nama Perusahaan', 'PT. Maju Bersama Persada Dayamu 1', 'USER-1', '2020-08-30 14:00:40', 'USER-1', '2020-08-30 14:01:33', '', '0000-00-00 00:00:00', 0),
(3, 'Edit Data', 'TTPN-1', 'Nama Perusahaan', 'PT. Maju Bersama Persada Dayamu', 'USER-1', '2020-08-30 14:00:40', 'USER-1', '2020-08-30 14:01:37', '', '0000-00-00 00:00:00', 0),
(4, 'Insert Data', 'TTPN-2', 'E-mail Perusahaan', 'finance@mbpindo.com', 'USER-1', '2020-08-30 14:28:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(5, 'Insert Data', 'TTPN-3', 'Alamat Perusahaan', 'Jl. Boulevard blok L 7 nomor 1 H Citra Raya, Cikupa, Tangerang', 'USER-1', '2020-08-30 14:29:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(6, 'Insert Data', 'TTPN-4', 'Phone/Fax', '(021) 5986198', 'USER-1', '2020-08-30 14:29:19', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(7, 'Insert Data', 'TTPN-5', 'Website', 'www.mbpd-indo.com', 'USER-1', '2020-08-30 14:29:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(8, 'Insert Data', 'TTPN-6', 'Processing time', '9', 'USER-1', '2020-08-30 14:29:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(9, 'Insert Data', 'TTPN-7', 'PPN', '10', 'USER-1', '2020-08-30 14:30:02', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(10, 'Insert Data', 'TTPN-8', 'Senin', 'Hari Produksi', 'USER-1', '2020-09-09 01:49:14', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(11, 'Insert Data', 'TTPN-9', 'Selasa', 'Hari Produksi', 'USER-1', '2020-09-09 01:49:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(12, 'Insert Data', 'TTPN-10', 'Rabu', 'Hari Produksi', 'USER-1', '2020-09-09 01:49:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(13, 'Insert Data', 'TTPN-11', 'Kamis', 'Hari Produksi', 'USER-1', '2020-09-09 01:49:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(14, 'Insert Data', 'TTPN-12', 'Jumat', 'Hari Produksi', 'USER-1', '2020-09-09 01:49:46', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(15, 'Insert Data', 'TTPN-13', 'Sabtu', 'Hari Libur', 'USER-1', '2020-09-09 01:49:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(16, 'Insert Data', 'TTPN-14', 'Minggu', 'Hari Libur', 'USER-1', '2020-09-09 01:50:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(17, 'Edit Data', 'TTPN-12', 'Jumat', 'Hari Libur', 'USER-1', '2020-09-09 01:49:46', 'USER-1', '2020-09-09 01:58:05', '', '0000-00-00 00:00:00', 0),
(18, 'Edit Data', 'TTPN-12', 'Jumat', 'Hari Produksi', 'USER-1', '2020-09-09 01:49:46', 'USER-1', '2020-09-09 01:58:09', '', '0000-00-00 00:00:00', 0),
(19, 'Edit Data', 'TTPN-10', 'Rabu', 'Hari Libur', 'USER-1', '2020-09-09 01:49:31', 'USER-1', '2020-09-24 22:58:31', '', '0000-00-00 00:00:00', 0),
(20, 'Edit Data', 'TTPN-10', 'Rabu', 'Hari Produksi', 'USER-1', '2020-09-09 01:49:31', 'USER-1', '2020-09-24 22:58:37', '', '0000-00-00 00:00:00', 0),
(21, 'Insert Data', 'TTPN-15', 'Bidang Usaha', 'Furniture and Automotive Part Manufacturer', 'USER-1', '2020-09-28 01:47:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(22, 'Insert Data', 'TTPN-16', 'Kota Perusahaan', 'Tangerang', 'USER-1', '2020-09-28 13:15:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ukuran_produk`
--

CREATE TABLE `ukuran_produk` (
  `id_ukuran_produk` varchar(10) NOT NULL,
  `id_jenis_produk` varchar(15) NOT NULL,
  `ukuran_produk` varchar(30) NOT NULL,
  `satuan_ukuran` varchar(30) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran_produk`
--

INSERT INTO `ukuran_produk` (`id_ukuran_produk`, `id_jenis_produk`, `ukuran_produk`, `satuan_ukuran`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('UKPROD-1', 'JENPROD-4', '120', 'cm', 'USER-1', '2020-12-19 12:24:02', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('UKPROD-2', 'JENPROD-4', '160', 'cm', 'USER-1', '2020-12-19 12:24:16', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('UKPROD-3', 'JENPROD-4', '180', 'cm', 'USER-1', '2020-12-19 12:24:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('UKPROD-4', 'JENPROD-2', '1800x800x100', 'mm3', 'USER-1', '2020-12-19 12:31:35', 'USER-2', '2020-12-21 19:50:02', '', '0000-00-00 00:00:00', 0),
('UKPROD-5', 'JENPROD-5', '2000x1450', 'mm2', 'USER-1', '2020-12-19 12:36:36', 'USER-2', '2020-12-21 19:50:14', '', '0000-00-00 00:00:00', 0),
('UKPROD-6', 'JENPROD-2', '2000x900x80', 'mm3', 'USER-2', '2020-12-21 19:04:48', 'USER-2', '2020-12-21 19:50:05', '', '0000-00-00 00:00:00', 0),
('UKPROD-7', 'JENPROD-2', '1000x1900x60', 'mm3', 'USER-2', '2020-12-21 19:49:39', 'USER-2', '2020-12-21 19:50:09', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `ukuran_produk`
--
DELIMITER $$
CREATE TRIGGER `edit_ukuran_produk` AFTER UPDATE ON `ukuran_produk` FOR EACH ROW INSERT INTO `ukuran_produk_logs`(`id_ukuran_produk_logs`,`keterangan_log`,`id_ukuran_produk`,`id_jenis_produk`,`ukuran_produk`,`satuan_ukuran`,`user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Edit Data',NEW.id_ukuran_produk,NEW.id_jenis_produk,NEW.ukuran_produk,NEW.satuan_ukuran,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_ukuran_produk` AFTER INSERT ON `ukuran_produk` FOR EACH ROW INSERT INTO `ukuran_produk_logs`(`id_ukuran_produk_logs`,`keterangan_log`,`id_ukuran_produk`,`id_jenis_produk`,`ukuran_produk`,`satuan_ukuran`,`user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Insert Data',NEW.id_ukuran_produk,NEW.id_jenis_produk,NEW.ukuran_produk,NEW.satuan_ukuran,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ukuran_produk_logs`
--

CREATE TABLE `ukuran_produk_logs` (
  `id_ukuran_produk_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_ukuran_produk` varchar(10) NOT NULL,
  `id_jenis_produk` varchar(15) NOT NULL,
  `ukuran_produk` varchar(30) NOT NULL,
  `satuan_ukuran` varchar(30) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran_produk_logs`
--

INSERT INTO `ukuran_produk_logs` (`id_ukuran_produk_logs`, `keterangan_log`, `id_ukuran_produk`, `id_jenis_produk`, `ukuran_produk`, `satuan_ukuran`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 'Insert Data', 'UKPROD-1', 'JENPROD-4', '120', 'cm', 'USER-1', '2020-12-19 12:24:02', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(2, 'Insert Data', 'UKPROD-2', 'JENPROD-4', '160', 'cm', 'USER-1', '2020-12-19 12:24:16', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(3, 'Insert Data', 'UKPROD-3', 'JENPROD-4', '180', 'cm', 'USER-1', '2020-12-19 12:24:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(4, 'Insert Data', 'UKPROD-4', 'JENPROD-2', '1800x800x100', 'cm3', 'USER-1', '2020-12-19 12:31:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(5, 'Insert Data', 'UKPROD-5', 'JENPROD-5', '2000x1450', 'cm2', 'USER-1', '2020-12-19 12:36:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(6, 'Edit Data', 'UKPROD-4', 'JENPROD-2', '1800x800x100', 'cm31', 'USER-1', '2020-12-19 12:31:35', 'USER-1', '2020-12-21 12:17:18', '', '0000-00-00 00:00:00', 0),
(7, 'Edit Data', 'UKPROD-4', 'JENPROD-2', '1800x800x100', 'cm3', 'USER-1', '2020-12-19 12:31:35', 'USER-1', '2020-12-21 12:17:22', '', '0000-00-00 00:00:00', 0),
(8, 'Insert Data', 'UKPROD-6', 'JENPROD-2', '2000x900x80', 'cm3', 'USER-2', '2020-12-21 19:04:48', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(9, 'Insert Data', 'UKPROD-7', 'JENPROD-2', '1000x1900x60', 'mm3', 'USER-2', '2020-12-21 19:49:39', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(10, 'Edit Data', 'UKPROD-7', 'JENPROD-2', '1000x1900x60', 'cm3', 'USER-2', '2020-12-21 19:49:39', 'USER-2', '2020-12-21 19:49:54', '', '0000-00-00 00:00:00', 0),
(11, 'Edit Data', 'UKPROD-4', 'JENPROD-2', '1800x800x100', 'mm3', 'USER-1', '2020-12-19 12:31:35', 'USER-2', '2020-12-21 19:50:02', '', '0000-00-00 00:00:00', 0),
(12, 'Edit Data', 'UKPROD-6', 'JENPROD-2', '2000x900x80', 'mm3', 'USER-2', '2020-12-21 19:04:48', 'USER-2', '2020-12-21 19:50:05', '', '0000-00-00 00:00:00', 0),
(13, 'Edit Data', 'UKPROD-7', 'JENPROD-2', '1000x1900x60', 'mm3', 'USER-2', '2020-12-21 19:49:39', 'USER-2', '2020-12-21 19:50:09', '', '0000-00-00 00:00:00', 0),
(14, 'Edit Data', 'UKPROD-5', 'JENPROD-5', '2000x1450', 'mm2', 'USER-1', '2020-12-19 12:36:36', 'USER-2', '2020-12-21 19:50:14', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `status_user` int(1) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_karyawan`, `email_user`, `password_user`, `status_user`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('USER-1', 'KAR-1', 'amkaheja@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 'USER-1', '2020-12-21 12:54:50', 'USER-1', '2020-12-21 14:59:13', '', '0000-00-00 00:00:00', 0),
('USER-10', 'KAR-10', 'pic1@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 'USER-1', '2020-12-21 14:28:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-11', 'KAR-11', 'pic2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 'USER-1', '2020-12-21 14:28:39', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-12', 'KAR-12', 'pic3@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 'USER-1', '2020-12-21 14:29:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-2', 'KAR-2', 'direktur@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 'USER-1', '2020-12-21 14:16:06', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-3', 'KAR-3', 'juliusjulianto91@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 'USER-1', '2020-12-21 14:18:05', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-4', 'KAR-4', 'finance@mbpindo.com', '25d55ad283aa400af464c76d713c07ad', 0, 'USER-1', '2020-12-21 14:19:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-5', 'KAR-5', 'produksi@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 'USER-1', '2020-12-21 14:21:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-6', 'KAR-6', 'risdev@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 'USER-1', '2020-12-21 14:22:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-7', 'KAR-7', 'w.hfinishgoodmbp@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 'USER-1', '2020-12-21 14:23:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-8', 'KAR-8', 'ppicmbp@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 'USER-1', '2020-12-21 14:25:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-9', 'KAR-9', 'w.hmaterialmbp@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 'USER-1', '2020-12-21 14:26:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `edit_user` AFTER UPDATE ON `user` FOR EACH ROW INSERT INTO `user_logs` (`id_user_logs`,`keterangan_log`,`id_user`,`id_karyawan`,`email_user`,`password_user`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES (null,'Edit Data',NEW.id_user,NEW.id_karyawan,NEW.email_user,NEW.password_user,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_user` AFTER INSERT ON `user` FOR EACH ROW INSERT INTO `user_logs` (`id_user_logs`,`keterangan_log`,`id_user`,`id_karyawan`,`email_user`,`password_user`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES (null,'Insert Data',NEW.id_user,NEW.id_karyawan,NEW.email_user,NEW.password_user,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id_user_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id_user_logs`, `keterangan_log`, `id_user`, `id_karyawan`, `email_user`, `password_user`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(24, 'Insert Data', 'USER-2', 'KAR-2', 'direktur@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'USER-1', '2020-12-21 14:16:06', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(25, 'Insert Data', 'USER-3', 'KAR-3', 'juliusjulianto91@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'USER-1', '2020-12-21 14:18:05', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(26, 'Insert Data', 'USER-4', 'KAR-4', 'finance@mbpindo.com', '25d55ad283aa400af464c76d713c07ad', 'USER-1', '2020-12-21 14:19:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(27, 'Insert Data', 'USER-5', 'KAR-5', 'produksi@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'USER-1', '2020-12-21 14:21:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(28, 'Insert Data', 'USER-6', 'KAR-6', 'risdev@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'USER-1', '2020-12-21 14:22:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(29, 'Insert Data', 'USER-7', 'KAR-7', 'w.hfinishgoodmbp@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'USER-1', '2020-12-21 14:23:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(30, 'Insert Data', 'USER-8', 'KAR-8', 'ppicmbp@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'USER-1', '2020-12-21 14:25:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(31, 'Insert Data', 'USER-9', 'KAR-9', 'w.hmaterialmbp@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'USER-1', '2020-12-21 14:26:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(32, 'Insert Data', 'USER-10', 'KAR-10', 'pic1@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'USER-1', '2020-12-21 14:28:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(33, 'Insert Data', 'USER-11', 'KAR-11', 'pic2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'USER-1', '2020-12-21 14:28:39', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(34, 'Insert Data', 'USER-12', 'KAR-12', 'pic3@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'USER-1', '2020-12-21 14:29:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(35, 'Edit Data', 'USER-1', 'KAR-1', 'amkaheja@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'USER-1', '2020-12-21 12:54:50', 'USER-1', '2020-12-21 14:59:13', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `id_warna` varchar(10) NOT NULL,
  `nama_warna` varchar(30) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`id_warna`, `nama_warna`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('WARNA-1', 'BLACK', 'USER-1', '2020-12-19 11:55:26', 'USER-2', '2020-12-21 19:50:28', '', '0000-00-00 00:00:00', 0),
('WARNA-2', 'BROWN', 'USER-1', '2020-12-19 11:55:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('WARNA-3', 'GREY', 'USER-1', '2020-12-19 11:55:42', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('WARNA-4', 'LIME GREEN', 'USER-1', '2020-12-19 11:55:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('WARNA-5', 'RED', 'USER-1', '2020-12-19 11:56:05', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('WARNA-6', 'TOSCA', 'USER-1', '2020-12-19 11:56:09', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `warna`
--
DELIMITER $$
CREATE TRIGGER `edit_warna` AFTER UPDATE ON `warna` FOR EACH ROW INSERT INTO `warna_logs`(`id_warna_logs`, `keterangan_log`, `id_warna`, `nama_warna`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Edit Data',NEW.id_warna,NEW.nama_warna,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_warna` AFTER INSERT ON `warna` FOR EACH ROW INSERT INTO `warna_logs`(`id_warna_logs`, `keterangan_log`, `id_warna`, `nama_warna`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Insert Data',NEW.id_warna,NEW.nama_warna,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `warna_logs`
--

CREATE TABLE `warna_logs` (
  `id_warna_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_warna` varchar(10) NOT NULL,
  `nama_warna` varchar(30) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna_logs`
--

INSERT INTO `warna_logs` (`id_warna_logs`, `keterangan_log`, `id_warna`, `nama_warna`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 'Insert Data', 'WARNA-1', 'BLACK', 'USER-1', '2020-12-19 11:55:26', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(2, 'Insert Data', 'WARNA-2', 'BROWN', 'USER-1', '2020-12-19 11:55:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(3, 'Insert Data', 'WARNA-3', 'GREY', 'USER-1', '2020-12-19 11:55:42', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(4, 'Insert Data', 'WARNA-4', 'LIME GREEN', 'USER-1', '2020-12-19 11:55:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(5, 'Insert Data', 'WARNA-5', 'RED', 'USER-1', '2020-12-19 11:56:05', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(6, 'Insert Data', 'WARNA-6', 'TOSCA', 'USER-1', '2020-12-19 11:56:09', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(7, 'Edit Data', 'WARNA-1', 'BLACKa', 'USER-1', '2020-12-19 11:55:26', 'USER-1', '2020-12-21 12:19:28', '', '0000-00-00 00:00:00', 0),
(8, 'Edit Data', 'WARNA-1', 'BLACK', 'USER-1', '2020-12-19 11:55:26', 'USER-2', '2020-12-21 19:50:28', '', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `bank_logs`
--
ALTER TABLE `bank_logs`
  ADD PRIMARY KEY (`id_bank_logs`);

--
-- Indexes for table `bpbd`
--
ALTER TABLE `bpbd`
  ADD PRIMARY KEY (`id_bpbd`);

--
-- Indexes for table `bpbj`
--
ALTER TABLE `bpbj`
  ADD PRIMARY KEY (`id_bpbj`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `cycle_time`
--
ALTER TABLE `cycle_time`
  ADD PRIMARY KEY (`id_cycle_time`);

--
-- Indexes for table `delivery_note`
--
ALTER TABLE `delivery_note`
  ADD PRIMARY KEY (`id_delivery_note`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `departemen_logs`
--
ALTER TABLE `departemen_logs`
  ADD PRIMARY KEY (`id_departemen_logs`);

--
-- Indexes for table `detail_bpbj`
--
ALTER TABLE `detail_bpbj`
  ADD PRIMARY KEY (`id_detail_bpbj`);

--
-- Indexes for table `detail_delivery_note`
--
ALTER TABLE `detail_delivery_note`
  ADD PRIMARY KEY (`id_detail_delivery_note`);

--
-- Indexes for table `detail_item_bpbd`
--
ALTER TABLE `detail_item_bpbd`
  ADD PRIMARY KEY (`id_detail_item_bpbd`);

--
-- Indexes for table `detail_item_surat_jalan`
--
ALTER TABLE `detail_item_surat_jalan`
  ADD PRIMARY KEY (`id_detail_item_surat_jalan`);

--
-- Indexes for table `detail_permintaan_material`
--
ALTER TABLE `detail_permintaan_material`
  ADD PRIMARY KEY (`id_detail_permintaan_material`);

--
-- Indexes for table `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD PRIMARY KEY (`id_detail_produk`);

--
-- Indexes for table `detail_produksi_line`
--
ALTER TABLE `detail_produksi_line`
  ADD PRIMARY KEY (`id_detail_produksi_line`);

--
-- Indexes for table `detail_produksi_tertunda`
--
ALTER TABLE `detail_produksi_tertunda`
  ADD PRIMARY KEY (`id_detail_produksi_tertunda`);

--
-- Indexes for table `detail_purchase_order_customer`
--
ALTER TABLE `detail_purchase_order_customer`
  ADD PRIMARY KEY (`id_detail_purchase_order_customer`);

--
-- Indexes for table `detail_purchase_order_supplier`
--
ALTER TABLE `detail_purchase_order_supplier`
  ADD PRIMARY KEY (`id_detail_purchase_order_supplier`);

--
-- Indexes for table `detail_supplier`
--
ALTER TABLE `detail_supplier`
  ADD PRIMARY KEY (`id_detail_supplier`);

--
-- Indexes for table `detail_surat_perintah_lembur`
--
ALTER TABLE `detail_surat_perintah_lembur`
  ADD PRIMARY KEY (`id_detail_surat_perintah_lembur`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `item_bpbd`
--
ALTER TABLE `item_bpbd`
  ADD PRIMARY KEY (`id_item_bpbd`);

--
-- Indexes for table `item_invoice`
--
ALTER TABLE `item_invoice`
  ADD PRIMARY KEY (`id_item_invoice`);

--
-- Indexes for table `item_surat_jalan`
--
ALTER TABLE `item_surat_jalan`
  ADD PRIMARY KEY (`id_item_surat_jalan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jabatan_karyawan`
--
ALTER TABLE `jabatan_karyawan`
  ADD PRIMARY KEY (`id_jabatan_karyawan`);

--
-- Indexes for table `jabatan_karyawan_logs`
--
ALTER TABLE `jabatan_karyawan_logs`
  ADD PRIMARY KEY (`id_jabatan_karyawan_logs`);

--
-- Indexes for table `jabatan_logs`
--
ALTER TABLE `jabatan_logs`
  ADD PRIMARY KEY (`id_jabatan_logs`);

--
-- Indexes for table `jenis_material`
--
ALTER TABLE `jenis_material`
  ADD PRIMARY KEY (`id_jenis_material`);

--
-- Indexes for table `jenis_material_sementara`
--
ALTER TABLE `jenis_material_sementara`
  ADD PRIMARY KEY (`id_jenis_material`);

--
-- Indexes for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id_jenis_produk`);

--
-- Indexes for table `jenis_produk_logs`
--
ALTER TABLE `jenis_produk_logs`
  ADD PRIMARY KEY (`id_jenis_produk_logs`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `karyawan_logs`
--
ALTER TABLE `karyawan_logs`
  ADD PRIMARY KEY (`id_karyawan_logs`);

--
-- Indexes for table `konsumsi_material`
--
ALTER TABLE `konsumsi_material`
  ADD PRIMARY KEY (`id_konsumsi_material`);

--
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`id_line`);

--
-- Indexes for table `line_logs`
--
ALTER TABLE `line_logs`
  ADD PRIMARY KEY (`id_line_logs`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indexes for table `material_line`
--
ALTER TABLE `material_line`
  ADD PRIMARY KEY (`id_material_line`);

--
-- Indexes for table `material_supplier`
--
ALTER TABLE `material_supplier`
  ADD PRIMARY KEY (`id_material_supplier`);

--
-- Indexes for table `pemasukan_material`
--
ALTER TABLE `pemasukan_material`
  ADD PRIMARY KEY (`id_pemasukan_material`);

--
-- Indexes for table `pemasukan_material_supplier`
--
ALTER TABLE `pemasukan_material_supplier`
  ADD PRIMARY KEY (`id_pemasukan_material_supplier`);

--
-- Indexes for table `pengambilan_material`
--
ALTER TABLE `pengambilan_material`
  ADD PRIMARY KEY (`id_pengambilan_material`);

--
-- Indexes for table `pengeluaran_material`
--
ALTER TABLE `pengeluaran_material`
  ADD PRIMARY KEY (`id_pengeluaran_material`);

--
-- Indexes for table `perencanaan_cutting`
--
ALTER TABLE `perencanaan_cutting`
  ADD PRIMARY KEY (`id_perencanaan_cutting`);

--
-- Indexes for table `permintaan_material`
--
ALTER TABLE `permintaan_material`
  ADD PRIMARY KEY (`id_permintaan_material`);

--
-- Indexes for table `permintaan_pembelian`
--
ALTER TABLE `permintaan_pembelian`
  ADD PRIMARY KEY (`id_permintaan_pembelian`);

--
-- Indexes for table `permintaan_tambahan`
--
ALTER TABLE `permintaan_tambahan`
  ADD PRIMARY KEY (`id_permintaan_tambahan`);

--
-- Indexes for table `permohonan_akses`
--
ALTER TABLE `permohonan_akses`
  ADD PRIMARY KEY (`id_permohonan_akses`);

--
-- Indexes for table `persediaan_line`
--
ALTER TABLE `persediaan_line`
  ADD PRIMARY KEY (`id_persediaan_line`);

--
-- Indexes for table `persediaan_line_keluar`
--
ALTER TABLE `persediaan_line_keluar`
  ADD PRIMARY KEY (`id_persediaan_line_keluar`);

--
-- Indexes for table `persediaan_line_masuk`
--
ALTER TABLE `persediaan_line_masuk`
  ADD PRIMARY KEY (`id_persediaan_line_masuk`);

--
-- Indexes for table `perubahan_harga`
--
ALTER TABLE `perubahan_harga`
  ADD PRIMARY KEY (`id_perubahan_harga`);

--
-- Indexes for table `perubahan_permintaan`
--
ALTER TABLE `perubahan_permintaan`
  ADD PRIMARY KEY (`id_perubahan_permintaan`);

--
-- Indexes for table `planning_material`
--
ALTER TABLE `planning_material`
  ADD PRIMARY KEY (`id_planning_material`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indexes for table `produksi_line`
--
ALTER TABLE `produksi_line`
  ADD PRIMARY KEY (`id_produksi_line`);

--
-- Indexes for table `produksi_logs`
--
ALTER TABLE `produksi_logs`
  ADD PRIMARY KEY (`id_produksi_logs`);

--
-- Indexes for table `produksi_tertunda`
--
ALTER TABLE `produksi_tertunda`
  ADD PRIMARY KEY (`id_produksi_tertunda`);

--
-- Indexes for table `produk_logs`
--
ALTER TABLE `produk_logs`
  ADD PRIMARY KEY (`id_produk_logs`);

--
-- Indexes for table `purchase_order_customer`
--
ALTER TABLE `purchase_order_customer`
  ADD PRIMARY KEY (`id_purchase_order_customer`);

--
-- Indexes for table `purchase_order_supplier`
--
ALTER TABLE `purchase_order_supplier`
  ADD PRIMARY KEY (`id_purchase_order_supplier`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `rekening_logs`
--
ALTER TABLE `rekening_logs`
  ADD PRIMARY KEY (`id_rekening_logs`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id_sales_order`);

--
-- Indexes for table `spesifikasi_jabatan`
--
ALTER TABLE `spesifikasi_jabatan`
  ADD PRIMARY KEY (`id_spesifikasi_jabatan`);

--
-- Indexes for table `spesifikasi_jabatan_logs`
--
ALTER TABLE `spesifikasi_jabatan_logs`
  ADD PRIMARY KEY (`id_spesifikasi_jabatan_logs`);

--
-- Indexes for table `sub_customer`
--
ALTER TABLE `sub_customer`
  ADD PRIMARY KEY (`id_sub_customer`);

--
-- Indexes for table `sub_jenis_material`
--
ALTER TABLE `sub_jenis_material`
  ADD PRIMARY KEY (`id_sub_jenis_material`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  ADD PRIMARY KEY (`id_surat_jalan`);

--
-- Indexes for table `surat_perintah_lembur`
--
ALTER TABLE `surat_perintah_lembur`
  ADD PRIMARY KEY (`id_surat_perintah_lembur`);

--
-- Indexes for table `tetapan`
--
ALTER TABLE `tetapan`
  ADD PRIMARY KEY (`id_tetapan`);

--
-- Indexes for table `tetapan_logs`
--
ALTER TABLE `tetapan_logs`
  ADD PRIMARY KEY (`id_tetapan_logs`);

--
-- Indexes for table `ukuran_produk`
--
ALTER TABLE `ukuran_produk`
  ADD PRIMARY KEY (`id_ukuran_produk`);

--
-- Indexes for table `ukuran_produk_logs`
--
ALTER TABLE `ukuran_produk_logs`
  ADD PRIMARY KEY (`id_ukuran_produk_logs`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id_user_logs`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- Indexes for table `warna_logs`
--
ALTER TABLE `warna_logs`
  ADD PRIMARY KEY (`id_warna_logs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_logs`
--
ALTER TABLE `bank_logs`
  MODIFY `id_bank_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `departemen_logs`
--
ALTER TABLE `departemen_logs`
  MODIFY `id_departemen_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jabatan_karyawan_logs`
--
ALTER TABLE `jabatan_karyawan_logs`
  MODIFY `id_jabatan_karyawan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `jabatan_logs`
--
ALTER TABLE `jabatan_logs`
  MODIFY `id_jabatan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `jenis_produk_logs`
--
ALTER TABLE `jenis_produk_logs`
  MODIFY `id_jenis_produk_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `karyawan_logs`
--
ALTER TABLE `karyawan_logs`
  MODIFY `id_karyawan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `line_logs`
--
ALTER TABLE `line_logs`
  MODIFY `id_line_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produksi_logs`
--
ALTER TABLE `produksi_logs`
  MODIFY `id_produksi_logs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk_logs`
--
ALTER TABLE `produk_logs`
  MODIFY `id_produk_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rekening_logs`
--
ALTER TABLE `rekening_logs`
  MODIFY `id_rekening_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `spesifikasi_jabatan_logs`
--
ALTER TABLE `spesifikasi_jabatan_logs`
  MODIFY `id_spesifikasi_jabatan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tetapan_logs`
--
ALTER TABLE `tetapan_logs`
  MODIFY `id_tetapan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ukuran_produk_logs`
--
ALTER TABLE `ukuran_produk_logs`
  MODIFY `id_ukuran_produk_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id_user_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `warna_logs`
--
ALTER TABLE `warna_logs`
  MODIFY `id_warna_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
