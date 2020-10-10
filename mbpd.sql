-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2020 at 02:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

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
('BANK-2', 'BCA', 'USER-1', '2020-08-30 18:11:42', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
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
(15, 'Edit Data', 'BANK-5', 'BNI', 'USER-1', '2020-09-24 22:59:36', 'USER-1', '2020-09-24 22:59:44', 'USER-1', '2020-09-24 22:59:48', 1);

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

--
-- Dumping data for table `bpbj`
--

INSERT INTO `bpbj` (`id_bpbj`, `no_bpbj`, `tanggal`, `keterangan`, `status_bpbj`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('BPBJ20.0001', 'BPBJ-0001', '2020-09-29', '', 1, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:52:22', '', '0000-00-00 00:00:00', 0),
('BPBJ20.0002', 'BPBJ-0002', '2020-09-29', '', 0, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:53:43', '', '0000-00-00 00:00:00', 0),
('BPBJ20.0003', 'BPBJ-0003', '2020-09-29', '', 2, 'USER-6', '2020-09-29 22:23:50', 'USER-3', '2020-09-29 23:51:22', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `bpbj`
--
DELIMITER $$
CREATE TRIGGER `edit_bpbj` AFTER UPDATE ON `bpbj` FOR EACH ROW INSERT INTO bpbj_logs (`id_bpbj_logs`,`keterangan_log`,`id_bpbj`,`no_bpbj`,`tanggal`,`keterangan`,`status_bpbj`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES (null,'Edit Data',NEW.id_bpbj,NEW.no_bpbj,NEW.tanggal,NEW.keterangan,NEW.status_bpbj,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_bpbj` AFTER INSERT ON `bpbj` FOR EACH ROW INSERT INTO bpbj_logs (`id_bpbj_logs`,`keterangan_log`,`id_bpbj`,`no_bpbj`,`tanggal`,`keterangan`,`status_bpbj`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES (null,'Insert Data',NEW.id_bpbj,NEW.no_bpbj,NEW.tanggal,NEW.keterangan,NEW.status_bpbj,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bpbj_logs`
--

CREATE TABLE `bpbj_logs` (
  `id_bpbj_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
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

--
-- Dumping data for table `bpbj_logs`
--

INSERT INTO `bpbj_logs` (`id_bpbj_logs`, `keterangan_log`, `id_bpbj`, `no_bpbj`, `tanggal`, `keterangan`, `status_bpbj`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(8, 'Insert Data', 'BPBJ20.0001', 'BPBJ-0001', '2020-09-29', '', 0, 'USER-6', '2020-09-29 22:23:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(9, 'Insert Data', 'BPBJ20.0002', 'BPBJ-0002', '2020-09-29', '', 0, 'USER-6', '2020-09-29 22:23:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(10, 'Insert Data', 'BPBJ20.0003', 'BPBJ-0003', '2020-09-29', '', 0, 'USER-6', '2020-09-29 22:23:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(11, 'Edit Data', 'BPBJ20.0001', 'BPBJ-0001', '2020-09-29', '', 2, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:18:37', '', '0000-00-00 00:00:00', 0),
(12, 'Edit Data', 'BPBJ20.0002', 'BPBJ-0002', '2020-09-29', '', 1, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:21:08', '', '0000-00-00 00:00:00', 0),
(13, 'Edit Data', 'BPBJ20.0001', 'BPBJ-0001', '2020-09-29', '', 1, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:26:50', '', '0000-00-00 00:00:00', 0),
(14, 'Edit Data', 'BPBJ20.0002', 'BPBJ-0002', '2020-09-29', '', 2, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:27:22', '', '0000-00-00 00:00:00', 0),
(15, 'Edit Data', 'BPBJ20.0002', 'BPBJ-0002', '2020-09-29', '', 0, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:29:49', '', '0000-00-00 00:00:00', 0),
(16, 'Edit Data', 'BPBJ20.0001', 'BPBJ-0001', '2020-09-29', '', 1, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:30:06', '', '0000-00-00 00:00:00', 0),
(17, 'Edit Data', 'BPBJ20.0002', 'BPBJ-0002', '2020-09-29', '', 1, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:30:06', '', '0000-00-00 00:00:00', 0),
(18, 'Edit Data', 'BPBJ20.0001', 'BPBJ-0001', '2020-09-29', '', 1, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:30:44', '', '0000-00-00 00:00:00', 0),
(19, 'Edit Data', 'BPBJ20.0001', 'BPBJ-0001', '2020-09-29', '', 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:30:52', '', '0000-00-00 00:00:00', 0),
(20, 'Edit Data', 'BPBJ20.0001', 'BPBJ-0001', '2020-09-29', '', 1, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:31:49', '', '0000-00-00 00:00:00', 0),
(21, 'Edit Data', 'BPBJ20.0001', 'BPBJ-0001', '2020-09-29', '', 2, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:33:26', '', '0000-00-00 00:00:00', 0),
(22, 'Edit Data', 'BPBJ20.0001', 'BPBJ-0001', '2020-09-29', '', 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:33:26', '', '0000-00-00 00:00:00', 0),
(23, 'Edit Data', 'BPBJ20.0002', 'BPBJ-0002', '2020-09-29', '', 0, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:30:06', '', '0000-00-00 00:00:00', 0),
(24, 'Edit Data', 'BPBJ20.0001', 'BPBJ-0001', '2020-09-29', '', 1, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:43:52', '', '0000-00-00 00:00:00', 0),
(25, 'Edit Data', 'BPBJ20.0001', 'BPBJ-0001', '2020-09-29', '', 1, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:46:20', '', '0000-00-00 00:00:00', 0),
(26, 'Edit Data', 'BPBJ20.0001', 'BPBJ-0001', '2020-09-29', '', 1, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:50:11', '', '0000-00-00 00:00:00', 0),
(27, 'Edit Data', 'BPBJ20.0001', 'BPBJ-0001', '2020-09-29', '', 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:50:20', '', '0000-00-00 00:00:00', 0),
(28, 'Edit Data', 'BPBJ20.0001', 'BPBJ-0001', '2020-09-29', '', 1, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:50:50', '', '0000-00-00 00:00:00', 0),
(29, 'Edit Data', 'BPBJ20.0002', 'BPBJ-0002', '2020-09-29', '', 1, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:50:50', '', '0000-00-00 00:00:00', 0),
(30, 'Edit Data', 'BPBJ20.0003', 'BPBJ-0003', '2020-09-29', '', 2, 'USER-6', '2020-09-29 22:23:50', 'USER-3', '2020-09-29 23:51:22', '', '0000-00-00 00:00:00', 0),
(31, 'Edit Data', 'BPBJ20.0001', 'BPBJ-0001', '2020-09-29', '', 1, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:52:22', '', '0000-00-00 00:00:00', 0),
(32, 'Edit Data', 'BPBJ20.0002', 'BPBJ-0002', '2020-09-29', '', 0, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:53:43', '', '0000-00-00 00:00:00', 0);

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
('CT-1', 'LINE-1', 'PRODUK-1', 100, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-10', 'LINE-3', 'PRODUK-3', 300, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-11', 'LINE-4', 'PRODUK-3', 300, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-12', 'LINE-1', 'PRODUK-4', 100, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-13', 'LINE-2', 'PRODUK-4', 100, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-14', 'LINE-3', 'PRODUK-4', 100, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-15', 'LINE-4', 'PRODUK-4', 100, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-16', 'LINE-1', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-17', 'LINE-2', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-18', 'LINE-3', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-19', 'LINE-4', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-2', 'LINE-2', 'PRODUK-1', 100, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-20', 'LINE-1', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:20:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-21', 'LINE-2', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:20:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-22', 'LINE-3', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:20:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-23', 'LINE-4', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:20:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-24', 'LINE-1', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-25', 'LINE-2', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-26', 'LINE-3', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-27', 'LINE-4', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-28', 'LINE-1', 'PRODUK-6', 120, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-29', 'LINE-2', 'PRODUK-6', 120, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-3', 'LINE-3', 'PRODUK-1', 100, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-30', 'LINE-3', 'PRODUK-6', 120, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-31', 'LINE-4', 'PRODUK-6', 120, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-32', 'LINE-1', 'PRODUK-7', 100, 'USER-1', '2020-10-05 23:22:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-33', 'LINE-2', 'PRODUK-7', 100, 'USER-1', '2020-10-05 23:22:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-34', 'LINE-3', 'PRODUK-7', 100, 'USER-1', '2020-10-05 23:22:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-35', 'LINE-4', 'PRODUK-7', 100, 'USER-1', '2020-10-05 23:22:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-36', 'LINE-1', 'PRODUK-8', 100, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-37', 'LINE-2', 'PRODUK-8', 110, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-38', 'LINE-3', 'PRODUK-8', 120, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-39', 'LINE-4', 'PRODUK-8', 130, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-4', 'LINE-4', 'PRODUK-1', 100, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-40', 'LINE-1', 'PRODUK-9', 100, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-41', 'LINE-2', 'PRODUK-9', 100, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-42', 'LINE-3', 'PRODUK-9', 100, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-43', 'LINE-4', 'PRODUK-9', 100, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-44', 'LINE-1', 'PRODUK-10', 100, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-45', 'LINE-2', 'PRODUK-10', 100, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-46', 'LINE-3', 'PRODUK-10', 100, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-47', 'LINE-4', 'PRODUK-10', 100, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-48', 'LINE-1', 'PRODUK-11', 100, 'USER-1', '2020-10-05 23:56:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-49', 'LINE-2', 'PRODUK-11', 100, 'USER-1', '2020-10-05 23:56:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-5', 'LINE-1', 'PRODUK-2', 200, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-50', 'LINE-3', 'PRODUK-11', 100, 'USER-1', '2020-10-05 23:56:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-51', 'LINE-4', 'PRODUK-11', 100, 'USER-1', '2020-10-05 23:56:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-52', 'LINE-1', 'PRODUK-12', 100, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-53', 'LINE-2', 'PRODUK-12', 100, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-54', 'LINE-4', 'PRODUK-12', 100, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-6', 'LINE-2', 'PRODUK-2', 200, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-7', 'LINE-4', 'PRODUK-2', 200, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-8', 'LINE-1', 'PRODUK-3', 300, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-9', 'LINE-2', 'PRODUK-3', 300, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `cycle_time`
--
DELIMITER $$
CREATE TRIGGER `edit_cycle_time` AFTER UPDATE ON `cycle_time` FOR EACH ROW INSERT INTO `cycle_time_logs`(`id_cycle_time_logs`, `keterangan_log`, `id_cycle_time`, `id_line`, `id_produk`, `cycle_time`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Edit Data',NEW.id_cycle_time,NEW.id_line,NEW.id_produk,NEW.cycle_time,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_cycle_time` AFTER INSERT ON `cycle_time` FOR EACH ROW INSERT INTO `cycle_time_logs`(`id_cycle_time_logs`, `keterangan_log`, `id_cycle_time`, `id_line`, `id_produk`, `cycle_time`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Insert Data',NEW.id_cycle_time,NEW.id_line,NEW.id_produk,NEW.cycle_time,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cycle_time_logs`
--

CREATE TABLE `cycle_time_logs` (
  `id_cycle_time_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
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
-- Dumping data for table `cycle_time_logs`
--

INSERT INTO `cycle_time_logs` (`id_cycle_time_logs`, `keterangan_log`, `id_cycle_time`, `id_line`, `id_produk`, `cycle_time`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(12, 'Insert Data', 'CT-1', 'LINE-1', 'PRODUK-1', 100, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(13, 'Insert Data', 'CT-2', 'LINE-2', 'PRODUK-1', 100, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(14, 'Insert Data', 'CT-3', 'LINE-3', 'PRODUK-1', 100, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(15, 'Insert Data', 'CT-4', 'LINE-4', 'PRODUK-1', 100, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(16, 'Insert Data', 'CT-5', 'LINE-1', 'PRODUK-2', 200, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(17, 'Insert Data', 'CT-6', 'LINE-2', 'PRODUK-2', 200, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(18, 'Insert Data', 'CT-7', 'LINE-4', 'PRODUK-2', 200, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(19, 'Insert Data', 'CT-8', 'LINE-1', 'PRODUK-3', 300, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(20, 'Insert Data', 'CT-9', 'LINE-2', 'PRODUK-3', 300, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(21, 'Insert Data', 'CT-10', 'LINE-3', 'PRODUK-3', 300, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(22, 'Insert Data', 'CT-11', 'LINE-4', 'PRODUK-3', 300, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(23, 'Insert Data', 'CT-12', 'LINE-1', 'PRODUK-4', 100, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(24, 'Insert Data', 'CT-13', 'LINE-2', 'PRODUK-4', 100, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(25, 'Insert Data', 'CT-14', 'LINE-3', 'PRODUK-4', 100, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(26, 'Insert Data', 'CT-15', 'LINE-4', 'PRODUK-4', 100, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(27, 'Edit Data', 'CT-4', 'LINE-4', 'PRODUK-1', 100, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(28, 'Edit Data', 'CT-7', 'LINE-4', 'PRODUK-2', 200, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(29, 'Edit Data', 'CT-11', 'LINE-4', 'PRODUK-3', 300, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(30, 'Edit Data', 'CT-15', 'LINE-4', 'PRODUK-4', 100, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(31, 'Edit Data', 'CT-7', 'LINE-3', 'PRODUK-2', 200, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(32, 'Edit Data', 'CT-7', 'LINE-4', 'PRODUK-2', 200, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(33, 'Insert Data', 'CT-16', 'LINE-1', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(34, 'Insert Data', 'CT-17', 'LINE-2', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(35, 'Insert Data', 'CT-18', 'LINE-3', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(36, 'Insert Data', 'CT-19', 'LINE-4', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(37, 'Insert Data', 'CT-20', 'LINE-1', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:20:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(38, 'Insert Data', 'CT-21', 'LINE-2', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:20:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(39, 'Insert Data', 'CT-22', 'LINE-3', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:20:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(40, 'Insert Data', 'CT-23', 'LINE-4', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:20:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(41, 'Insert Data', 'CT-24', 'LINE-1', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(42, 'Insert Data', 'CT-25', 'LINE-2', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(43, 'Insert Data', 'CT-26', 'LINE-3', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(44, 'Insert Data', 'CT-27', 'LINE-4', 'PRODUK-5', 120, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(45, 'Insert Data', 'CT-28', 'LINE-1', 'PRODUK-6', 120, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(46, 'Insert Data', 'CT-29', 'LINE-2', 'PRODUK-6', 120, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(47, 'Insert Data', 'CT-30', 'LINE-3', 'PRODUK-6', 120, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(48, 'Insert Data', 'CT-31', 'LINE-4', 'PRODUK-6', 120, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(49, 'Insert Data', 'CT-32', 'LINE-1', 'PRODUK-7', 100, 'USER-1', '2020-10-05 23:22:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(50, 'Insert Data', 'CT-33', 'LINE-2', 'PRODUK-7', 100, 'USER-1', '2020-10-05 23:22:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(51, 'Insert Data', 'CT-34', 'LINE-3', 'PRODUK-7', 100, 'USER-1', '2020-10-05 23:22:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(52, 'Insert Data', 'CT-35', 'LINE-4', 'PRODUK-7', 100, 'USER-1', '2020-10-05 23:22:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(53, 'Insert Data', 'CT-36', 'LINE-1', 'PRODUK-8', 100, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(54, 'Insert Data', 'CT-37', 'LINE-2', 'PRODUK-8', 110, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(55, 'Insert Data', 'CT-38', 'LINE-3', 'PRODUK-8', 120, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(56, 'Insert Data', 'CT-39', 'LINE-4', 'PRODUK-8', 130, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(57, 'Insert Data', 'CT-40', 'LINE-1', 'PRODUK-9', 100, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(58, 'Insert Data', 'CT-41', 'LINE-2', 'PRODUK-9', 100, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(59, 'Insert Data', 'CT-42', 'LINE-3', 'PRODUK-9', 100, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(60, 'Insert Data', 'CT-43', 'LINE-4', 'PRODUK-9', 100, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(61, 'Insert Data', 'CT-44', 'LINE-1', 'PRODUK-10', 100, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(62, 'Insert Data', 'CT-45', 'LINE-2', 'PRODUK-10', 100, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(63, 'Insert Data', 'CT-46', 'LINE-3', 'PRODUK-10', 100, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(64, 'Insert Data', 'CT-47', 'LINE-4', 'PRODUK-10', 100, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(65, 'Insert Data', 'CT-48', 'LINE-1', 'PRODUK-11', 100, 'USER-1', '2020-10-05 23:56:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(66, 'Insert Data', 'CT-49', 'LINE-2', 'PRODUK-11', 100, 'USER-1', '2020-10-05 23:56:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(67, 'Insert Data', 'CT-50', 'LINE-3', 'PRODUK-11', 100, 'USER-1', '2020-10-05 23:56:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(68, 'Insert Data', 'CT-51', 'LINE-4', 'PRODUK-11', 100, 'USER-1', '2020-10-05 23:56:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(69, 'Insert Data', 'CT-52', 'LINE-1', 'PRODUK-12', 100, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(70, 'Insert Data', 'CT-53', 'LINE-2', 'PRODUK-12', 100, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(71, 'Insert Data', 'CT-54', 'LINE-4', 'PRODUK-12', 100, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_note`
--

CREATE TABLE `delivery_note` (
  `id_delivery_note` varchar(10) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `tanggal_dn` datetime NOT NULL,
  `tanggal_penerimaan` datetime NOT NULL,
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
('DEPT-1', 'Management', 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DEPT-2', 'Material', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DEPT-3', 'Produksi', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DEPT-4', 'Purchasing', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DEPT-5', 'Research & Development', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DEPT-6', 'Finish Good', 'USER-1', '2020-08-30 00:00:00', 'USER-1', '2020-09-08 00:11:13', '', '0000-00-00 00:00:00', 0),
('DEPT-7', 'xy', 'USER-1', '2020-09-08 09:15:56', 'USER-1', '2020-09-08 09:27:01', 'USER-1', '2020-09-08 23:30:23', 1),
('DEPT-8', 'xyza', 'USER-1', '2020-09-08 23:46:56', 'USER-1', '2020-09-08 23:47:02', '', '0000-00-00 00:00:00', 0),
('DEPT-9', 'aaa', 'USER-1', '2020-09-24 22:47:20', 'USER-1', '2020-09-24 22:47:23', 'USER-1', '2020-09-24 22:47:27', 1);

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
(1, 'Edit Data', 'DEPT-6', 'Finish Goods', 'USER-1', '2020-08-30 00:00:00', 'USER-1', '2020-09-08 00:11:10', '', '0000-00-00 00:00:00', 0),
(2, 'Edit Data', 'DEPT-6', 'Finish Good', 'USER-1', '2020-08-30 00:00:00', 'USER-1', '2020-09-08 00:11:13', '', '0000-00-00 00:00:00', 0),
(3, 'Insert Data', 'DEPT-7', 'x', 'USER-1', '2020-09-08 09:15:56', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(4, 'Edit Data', 'DEPT-7', 'xy', 'USER-1', '2020-09-08 09:15:56', 'USER-1', '2020-09-08 09:27:01', '', '0000-00-00 00:00:00', 0),
(5, 'Edit Data', 'DEPT-7', 'xy', 'USER-1', '2020-09-08 09:15:56', 'USER-1', '2020-09-08 09:27:01', 'USER-1', '2020-09-08 23:30:23', 1),
(6, 'Insert Data', 'DEPT-8', 'xyz', 'USER-1', '2020-09-08 23:46:56', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(7, 'Edit Data', 'DEPT-8', 'xyza', 'USER-1', '2020-09-08 23:46:56', 'USER-1', '2020-09-08 23:47:02', '', '0000-00-00 00:00:00', 0),
(8, 'Insert Data', 'DEPT-9', 'a', 'USER-1', '2020-09-24 22:47:20', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(9, 'Edit Data', 'DEPT-9', 'aaa', 'USER-1', '2020-09-24 22:47:20', 'USER-1', '2020-09-24 22:47:23', '', '0000-00-00 00:00:00', 0),
(10, 'Edit Data', 'DEPT-9', 'aaa', 'USER-1', '2020-09-24 22:47:20', 'USER-1', '2020-09-24 22:47:23', 'USER-1', '2020-09-24 22:47:27', 1);

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

--
-- Dumping data for table `detail_bpbj`
--

INSERT INTO `detail_bpbj` (`id_detail_bpbj`, `id_bpbj`, `id_detail_produk`, `jumlah_produk`, `jumlah_terkirim`, `status_detail_bpbj`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 20, 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:52:22', '', '0000-00-00 00:00:00', 0),
('DBPBJ20.000002', 'BPBJ20.0002', 'DETPRO-2', 25, 0, 0, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:53:43', '', '0000-00-00 00:00:00', 0),
('DBPBJ20.000003', 'BPBJ20.0003', 'DETPRO-7', 100, 100, 1, 'USER-6', '2020-09-29 22:23:50', 'USER-3', '2020-09-29 23:51:22', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `detail_bpbj`
--
DELIMITER $$
CREATE TRIGGER `edit_detail_bpbj` AFTER UPDATE ON `detail_bpbj` FOR EACH ROW INSERT INTO detail_bpbj_logs (`id_detail_bpbj_logs`,`keterangan_log`,`id_detail_bpbj`,`id_bpbj`,`id_detail_produk`,`jumlah_produk`,`jumlah_terkirim`,`status_detail_bpbj`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`) VALUES(null,'Edit Data',NEW.id_detail_bpbj,NEW.id_bpbj,NEW.id_detail_produk,NEW.jumlah_produk,NEW.jumlah_terkirim,NEW.status_detail_bpbj,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_detail_bpbj` AFTER INSERT ON `detail_bpbj` FOR EACH ROW INSERT INTO detail_bpbj_logs (`id_detail_bpbj_logs`,`keterangan_log`,`id_detail_bpbj`,`id_bpbj`,`id_detail_produk`,`jumlah_produk`,`jumlah_terkirim`,`status_detail_bpbj`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`) VALUES(null,'Insert Data',NEW.id_detail_bpbj,NEW.id_bpbj,NEW.id_detail_produk,NEW.jumlah_produk,NEW.jumlah_terkirim,NEW.status_detail_bpbj,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_bpbj_logs`
--

CREATE TABLE `detail_bpbj_logs` (
  `id_detail_bpbj_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
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

--
-- Dumping data for table `detail_bpbj_logs`
--

INSERT INTO `detail_bpbj_logs` (`id_detail_bpbj_logs`, `keterangan_log`, `id_detail_bpbj`, `id_bpbj`, `id_detail_produk`, `jumlah_produk`, `jumlah_terkirim`, `status_detail_bpbj`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(54, 'Insert Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 0, 0, 'USER-6', '2020-09-29 22:23:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(55, 'Insert Data', 'DBPBJ20.000002', 'BPBJ20.0002', 'DETPRO-2', 25, 0, 0, 'USER-6', '2020-09-29 22:23:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(56, 'Insert Data', 'DBPBJ20.000003', 'BPBJ20.0003', 'DETPRO-7', 100, 0, 0, 'USER-6', '2020-09-29 22:23:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(57, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 5, 0, 'USER-6', '2020-09-29 22:23:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(58, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 5, 1, 'USER-6', '2020-09-29 22:23:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(59, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 0, 1, 'USER-6', '2020-09-29 22:23:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(60, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 0, 0, 'USER-6', '2020-09-29 22:23:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(61, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 0, 1, 'USER-6', '2020-09-29 22:23:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(62, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 0, 0, 'USER-6', '2020-09-29 22:23:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(63, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 0, 1, 'USER-6', '2020-09-29 22:23:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(64, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 0, 0, 'USER-6', '2020-09-29 22:23:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(65, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 25, 1, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:18:37', '', '0000-00-00 00:00:00', 0),
(66, 'Edit Data', 'DBPBJ20.000002', 'BPBJ20.0002', 'DETPRO-2', 25, 5, 0, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:19:22', '', '0000-00-00 00:00:00', 0),
(67, 'Edit Data', 'DBPBJ20.000002', 'BPBJ20.0002', 'DETPRO-2', 25, 0, 0, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:19:38', '', '0000-00-00 00:00:00', 0),
(68, 'Edit Data', 'DBPBJ20.000002', 'BPBJ20.0002', 'DETPRO-2', 25, 5, 0, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:21:08', '', '0000-00-00 00:00:00', 0),
(69, 'Edit Data', 'DBPBJ20.000002', 'BPBJ20.0002', 'DETPRO-2', 25, 0, 0, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:26:06', '', '0000-00-00 00:00:00', 0),
(70, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 20, 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:26:19', '', '0000-00-00 00:00:00', 0),
(71, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 22, 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:26:50', '', '0000-00-00 00:00:00', 0),
(72, 'Edit Data', 'DBPBJ20.000002', 'BPBJ20.0002', 'DETPRO-2', 25, 25, 1, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:27:22', '', '0000-00-00 00:00:00', 0),
(73, 'Edit Data', 'DBPBJ20.000002', 'BPBJ20.0002', 'DETPRO-2', 25, 0, 0, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:29:49', '', '0000-00-00 00:00:00', 0),
(74, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 20, 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:30:06', '', '0000-00-00 00:00:00', 0),
(75, 'Edit Data', 'DBPBJ20.000002', 'BPBJ20.0002', 'DETPRO-2', 25, 10, 0, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:30:06', '', '0000-00-00 00:00:00', 0),
(76, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 0, 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:30:26', '', '0000-00-00 00:00:00', 0),
(77, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 2, 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:30:44', '', '0000-00-00 00:00:00', 0),
(78, 'Edit Data', 'DBPBJ20.000002', 'BPBJ20.0002', 'DETPRO-2', 25, 18, 0, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:30:44', '', '0000-00-00 00:00:00', 0),
(79, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 0, 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:30:52', '', '0000-00-00 00:00:00', 0),
(80, 'Edit Data', 'DBPBJ20.000002', 'BPBJ20.0002', 'DETPRO-2', 25, 25, 1, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:30:52', '', '0000-00-00 00:00:00', 0),
(81, 'Edit Data', 'DBPBJ20.000002', 'BPBJ20.0002', 'DETPRO-2', 25, 15, 0, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:31:19', '', '0000-00-00 00:00:00', 0),
(82, 'Edit Data', 'DBPBJ20.000002', 'BPBJ20.0002', 'DETPRO-2', 25, 7, 0, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:31:19', '', '0000-00-00 00:00:00', 0),
(83, 'Edit Data', 'DBPBJ20.000002', 'BPBJ20.0002', 'DETPRO-2', 25, 0, 0, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:31:19', '', '0000-00-00 00:00:00', 0),
(84, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 10, 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:31:49', '', '0000-00-00 00:00:00', 0),
(85, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 25, 1, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:33:26', '', '0000-00-00 00:00:00', 0),
(86, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 15, 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:40:45', '', '0000-00-00 00:00:00', 0),
(87, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 0, 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:40:45', '', '0000-00-00 00:00:00', 0),
(88, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 5, 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:43:52', '', '0000-00-00 00:00:00', 0),
(89, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 0, 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:44:24', '', '0000-00-00 00:00:00', 0),
(90, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 5, 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:46:20', '', '0000-00-00 00:00:00', 0),
(91, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 0, 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:46:28', '', '0000-00-00 00:00:00', 0),
(92, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 5, 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:50:11', '', '0000-00-00 00:00:00', 0),
(93, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 0, 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:50:20', '', '0000-00-00 00:00:00', 0),
(94, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 10, 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:50:50', '', '0000-00-00 00:00:00', 0),
(95, 'Edit Data', 'DBPBJ20.000002', 'BPBJ20.0002', 'DETPRO-2', 25, 10, 0, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:50:50', '', '0000-00-00 00:00:00', 0),
(96, 'Edit Data', 'DBPBJ20.000003', 'BPBJ20.0003', 'DETPRO-7', 100, 100, 1, 'USER-6', '2020-09-29 22:23:50', 'USER-3', '2020-09-29 23:51:22', '', '0000-00-00 00:00:00', 0),
(97, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 25, 20, 0, 'USER-6', '2020-09-29 22:23:35', 'USER-3', '2020-09-29 23:52:22', '', '0000-00-00 00:00:00', 0),
(98, 'Edit Data', 'DBPBJ20.000002', 'BPBJ20.0002', 'DETPRO-2', 25, 0, 0, 'USER-6', '2020-09-29 22:23:43', 'USER-3', '2020-09-29 23:53:43', '', '0000-00-00 00:00:00', 0);

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

--
-- Dumping data for table `detail_item_surat_jalan`
--

INSERT INTO `detail_item_surat_jalan` (`id_detail_item_surat_jalan`, `id_item_surat_jalan`, `id_detail_bpbj`, `jumlah_produk`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('DISJ20.00000001', 'ISJ20.000001', 'DBPBJ20.000001', 20, 'USER-3', '2020-09-29 23:18:37', 'USER-3', '2020-09-29 23:26:19', 'USER-3', '2020-09-29 23:30:26', 1),
('DISJ20.00000002', 'ISJ20.000002', 'DBPBJ20.000002', 5, 'USER-3', '2020-09-29 23:19:22', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:19:38', 1),
('DISJ20.00000003', 'ISJ20.000003', 'DBPBJ20.000002', 5, 'USER-3', '2020-09-29 23:21:08', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:26:06', 1),
('DISJ20.00000004', 'ISJ20.000004', 'DBPBJ20.000001', 2, 'USER-3', '2020-09-29 23:26:50', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:30:06', 1),
('DISJ20.00000005', 'ISJ20.000005', 'DBPBJ20.000002', 25, 'USER-3', '2020-09-29 23:27:22', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:29:49', 1),
('DISJ20.00000006', 'ISJ20.000006', 'DBPBJ20.000002', 10, 'USER-3', '2020-09-29 23:30:06', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:31:19', 1),
('DISJ20.00000007', 'ISJ20.000007', 'DBPBJ20.000001', 2, 'USER-3', '2020-09-29 23:30:44', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:30:52', 1),
('DISJ20.00000008', 'ISJ20.000006', 'DBPBJ20.000002', 8, 'USER-3', '2020-09-29 23:30:44', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:31:19', 1),
('DISJ20.00000009', 'ISJ20.000006', 'DBPBJ20.000002', 7, 'USER-3', '2020-09-29 23:30:52', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:31:19', 1),
('DISJ20.00000010', 'ISJ20.000008', 'DBPBJ20.000001', 10, 'USER-3', '2020-09-29 23:31:49', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:40:45', 1),
('DISJ20.00000011', 'ISJ20.000008', 'DBPBJ20.000001', 15, 'USER-3', '2020-09-29 23:33:26', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:40:45', 1),
('DISJ20.00000012', 'ISJ20.000009', 'DBPBJ20.000001', 5, 'USER-3', '2020-09-29 23:43:52', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:44:24', 1),
('DISJ20.00000013', 'ISJ20.000010', 'DBPBJ20.000001', 5, 'USER-3', '2020-09-29 23:46:20', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:46:28', 1),
('DISJ20.00000014', 'ISJ20.000011', 'DBPBJ20.000001', 5, 'USER-3', '2020-09-29 23:50:11', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:50:20', 1),
('DISJ20.00000015', 'ISJ20.000012', 'DBPBJ20.000001', 10, 'USER-3', '2020-09-29 23:50:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DISJ20.00000016', 'ISJ20.000013', 'DBPBJ20.000002', 10, 'USER-3', '2020-09-29 23:50:50', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:53:43', 1),
('DISJ20.00000017', 'ISJ20.000014', 'DBPBJ20.000003', 100, 'USER-3', '2020-09-29 23:51:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DISJ20.00000018', 'ISJ20.000015', 'DBPBJ20.000001', 10, 'USER-3', '2020-09-29 23:52:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `detail_item_surat_jalan`
--
DELIMITER $$
CREATE TRIGGER `edit_detail_item_surat_jalan` AFTER UPDATE ON `detail_item_surat_jalan` FOR EACH ROW INSERT INTO detail_item_surat_jalan_logs(`id_detail_item_surat_jalan_logs`,`keterangan_log`,`id_detail_item_surat_jalan`,`id_item_surat_jalan`,`id_detail_bpbj`,`jumlah_produk`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`)  VALUES(null,'Edit Data',NEW.id_detail_item_surat_jalan,NEW.id_item_surat_jalan,NEW.id_detail_bpbj,NEW.jumlah_produk,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_detail_item_surat_jalan` AFTER INSERT ON `detail_item_surat_jalan` FOR EACH ROW INSERT INTO detail_item_surat_jalan_logs(`id_detail_item_surat_jalan_logs`,`keterangan_log`,`id_detail_item_surat_jalan`,`id_item_surat_jalan`,`id_detail_bpbj`,`jumlah_produk`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`)  VALUES(null,'Insert Data',NEW.id_detail_item_surat_jalan,NEW.id_item_surat_jalan,NEW.id_detail_bpbj,NEW.jumlah_produk,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_item_surat_jalan_logs`
--

CREATE TABLE `detail_item_surat_jalan_logs` (
  `id_detail_item_surat_jalan_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
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

--
-- Dumping data for table `detail_item_surat_jalan_logs`
--

INSERT INTO `detail_item_surat_jalan_logs` (`id_detail_item_surat_jalan_logs`, `keterangan_log`, `id_detail_item_surat_jalan`, `id_item_surat_jalan`, `id_detail_bpbj`, `jumlah_produk`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(31, 'Insert Data', 'DISJ20.00000001', 'ISJ20.000001', 'DBPBJ20.000001', 25, 'USER-3', '2020-09-29 23:18:37', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(32, 'Insert Data', 'DISJ20.00000002', 'ISJ20.000002', 'DBPBJ20.000002', 5, 'USER-3', '2020-09-29 23:19:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(33, 'Edit Data', 'DISJ20.00000002', 'ISJ20.000002', 'DBPBJ20.000002', 5, 'USER-3', '2020-09-29 23:19:22', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:19:38', 1),
(34, 'Insert Data', 'DISJ20.00000003', 'ISJ20.000003', 'DBPBJ20.000002', 5, 'USER-3', '2020-09-29 23:21:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(35, 'Edit Data', 'DISJ20.00000003', 'ISJ20.000003', 'DBPBJ20.000002', 5, 'USER-3', '2020-09-29 23:21:08', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:26:06', 1),
(36, 'Edit Data', 'DISJ20.00000001', 'ISJ20.000001', 'DBPBJ20.000001', 20, 'USER-3', '2020-09-29 23:18:37', 'USER-3', '2020-09-29 23:26:19', '', '0000-00-00 00:00:00', 0),
(37, 'Insert Data', 'DISJ20.00000004', 'ISJ20.000004', 'DBPBJ20.000001', 2, 'USER-3', '2020-09-29 23:26:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(38, 'Insert Data', 'DISJ20.00000005', 'ISJ20.000005', 'DBPBJ20.000002', 25, 'USER-3', '2020-09-29 23:27:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(39, 'Edit Data', 'DISJ20.00000005', 'ISJ20.000005', 'DBPBJ20.000002', 25, 'USER-3', '2020-09-29 23:27:22', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:29:49', 1),
(40, 'Edit Data', 'DISJ20.00000004', 'ISJ20.000004', 'DBPBJ20.000001', 2, 'USER-3', '2020-09-29 23:26:50', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:30:06', 1),
(41, 'Insert Data', 'DISJ20.00000006', 'ISJ20.000006', 'DBPBJ20.000002', 10, 'USER-3', '2020-09-29 23:30:06', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(42, 'Edit Data', 'DISJ20.00000001', 'ISJ20.000001', 'DBPBJ20.000001', 20, 'USER-3', '2020-09-29 23:18:37', 'USER-3', '2020-09-29 23:26:19', 'USER-3', '2020-09-29 23:30:26', 1),
(43, 'Insert Data', 'DISJ20.00000007', 'ISJ20.000007', 'DBPBJ20.000001', 2, 'USER-3', '2020-09-29 23:30:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(44, 'Insert Data', 'DISJ20.00000008', 'ISJ20.000006', 'DBPBJ20.000002', 8, 'USER-3', '2020-09-29 23:30:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(45, 'Edit Data', 'DISJ20.00000007', 'ISJ20.000007', 'DBPBJ20.000001', 2, 'USER-3', '2020-09-29 23:30:44', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:30:52', 1),
(46, 'Insert Data', 'DISJ20.00000009', 'ISJ20.000006', 'DBPBJ20.000002', 7, 'USER-3', '2020-09-29 23:30:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(47, 'Edit Data', 'DISJ20.00000006', 'ISJ20.000006', 'DBPBJ20.000002', 10, 'USER-3', '2020-09-29 23:30:06', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:31:19', 1),
(48, 'Edit Data', 'DISJ20.00000008', 'ISJ20.000006', 'DBPBJ20.000002', 8, 'USER-3', '2020-09-29 23:30:44', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:31:19', 1),
(49, 'Edit Data', 'DISJ20.00000009', 'ISJ20.000006', 'DBPBJ20.000002', 7, 'USER-3', '2020-09-29 23:30:52', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:31:19', 1),
(50, 'Insert Data', 'DISJ20.00000010', 'ISJ20.000008', 'DBPBJ20.000001', 10, 'USER-3', '2020-09-29 23:31:49', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(51, 'Insert Data', 'DISJ20.00000011', 'ISJ20.000008', 'DBPBJ20.000001', 15, 'USER-3', '2020-09-29 23:33:26', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(52, 'Edit Data', 'DISJ20.00000010', 'ISJ20.000008', 'DBPBJ20.000001', 10, 'USER-3', '2020-09-29 23:31:49', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:40:45', 1),
(53, 'Edit Data', 'DISJ20.00000011', 'ISJ20.000008', 'DBPBJ20.000001', 15, 'USER-3', '2020-09-29 23:33:26', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:40:45', 1),
(54, 'Insert Data', 'DISJ20.00000012', 'ISJ20.000009', 'DBPBJ20.000001', 5, 'USER-3', '2020-09-29 23:43:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(55, 'Edit Data', 'DISJ20.00000012', 'ISJ20.000009', 'DBPBJ20.000001', 5, 'USER-3', '2020-09-29 23:43:52', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:44:24', 1),
(56, 'Insert Data', 'DISJ20.00000013', 'ISJ20.000010', 'DBPBJ20.000001', 5, 'USER-3', '2020-09-29 23:46:20', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(57, 'Edit Data', 'DISJ20.00000013', 'ISJ20.000010', 'DBPBJ20.000001', 5, 'USER-3', '2020-09-29 23:46:20', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:46:28', 1),
(58, 'Insert Data', 'DISJ20.00000014', 'ISJ20.000011', 'DBPBJ20.000001', 5, 'USER-3', '2020-09-29 23:50:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(59, 'Edit Data', 'DISJ20.00000014', 'ISJ20.000011', 'DBPBJ20.000001', 5, 'USER-3', '2020-09-29 23:50:11', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:50:20', 1),
(60, 'Insert Data', 'DISJ20.00000015', 'ISJ20.000012', 'DBPBJ20.000001', 10, 'USER-3', '2020-09-29 23:50:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(61, 'Insert Data', 'DISJ20.00000016', 'ISJ20.000013', 'DBPBJ20.000002', 10, 'USER-3', '2020-09-29 23:50:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(62, 'Insert Data', 'DISJ20.00000017', 'ISJ20.000014', 'DBPBJ20.000003', 100, 'USER-3', '2020-09-29 23:51:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(63, 'Insert Data', 'DISJ20.00000018', 'ISJ20.000015', 'DBPBJ20.000001', 10, 'USER-3', '2020-09-29 23:52:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(64, 'Edit Data', 'DISJ20.00000016', 'ISJ20.000013', 'DBPBJ20.000002', 10, 'USER-3', '2020-09-29 23:50:50', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:53:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_permintaan_material`
--

CREATE TABLE `detail_permintaan_material` (
  `id_detail_permintaan_material` varchar(20) NOT NULL,
  `id_permintaan_material` varchar(20) NOT NULL,
  `id_konsumsi_material` varchar(10) NOT NULL,
  `needs` int(11) NOT NULL,
  `ketersediaan_supplier` int(11) NOT NULL,
  `status_pengambilan` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_permintaan_material`
--

INSERT INTO `detail_permintaan_material` (`id_detail_permintaan_material`, `id_permintaan_material`, `id_konsumsi_material`, `needs`, `ketersediaan_supplier`, `status_pengambilan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('DETPERMAT2010.000001', 'PERMAT2010.00001', 'KONMAT-42', 10, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000002', 'PERMAT2010.00002', 'KONMAT-42', 10, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000003', 'PERMAT2010.00003', 'KONMAT-42', 10, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000004', 'PERMAT2010.00004', 'KONMAT-43', 10, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000005', 'PERMAT2010.00005', 'KONMAT-43', 10, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000006', 'PERMAT2010.00006', 'KONMAT-43', 10, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000007', 'PERMAT2010.00007', 'KONMAT-44', 10, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000008', 'PERMAT2010.00008', 'KONMAT-44', 10, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000009', 'PERMAT2010.00009', 'KONMAT-44', 10, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000010', 'PERMAT2010.00010', 'KONMAT-45', 10, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000011', 'PERMAT2010.00010', 'KONMAT-46', 10, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000012', 'PERMAT2010.00011', 'KONMAT-45', 10, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000013', 'PERMAT2010.00011', 'KONMAT-46', 10, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000014', 'PERMAT2010.00012', 'KONMAT-45', 10, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000015', 'PERMAT2010.00012', 'KONMAT-46', 10, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000016', 'PERMAT2010.00013', 'KONMAT-47', 20, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000017', 'PERMAT2010.00014', 'KONMAT-47', 20, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000018', 'PERMAT2010.00015', 'KONMAT-47', 20, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000019', 'PERMAT2010.00019', 'KONMAT-48', 20, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000020', 'PERMAT2010.00020', 'KONMAT-48', 20, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000021', 'PERMAT2010.00021', 'KONMAT-48', 20, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000022', 'PERMAT2010.00022', 'KONMAT-49', 20, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000023', 'PERMAT2010.00023', 'KONMAT-49', 20, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000024', 'PERMAT2010.00024', 'KONMAT-49', 20, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000025', 'PERMAT2010.00025', 'KONMAT-50', 30, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000026', 'PERMAT2010.00026', 'KONMAT-50', 30, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000027', 'PERMAT2010.00027', 'KONMAT-50', 30, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000028', 'PERMAT2010.00031', 'KONMAT-51', 60, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000029', 'PERMAT2010.00032', 'KONMAT-51', 60, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000030', 'PERMAT2010.00033', 'KONMAT-51', 60, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000031', 'PERMAT2010.00034', 'KONMAT-52', 30, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000032', 'PERMAT2010.00035', 'KONMAT-52', 30, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000033', 'PERMAT2010.00036', 'KONMAT-52', 30, 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPERMAT2010.000034', 'PERMAT2010.00037', 'KONMAT-42', 10, 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_produk`
--

CREATE TABLE `detail_produk` (
  `id_detail_produk` varchar(10) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `id_ukuran_produk` varchar(10) NOT NULL,
  `id_warna` varchar(10) NOT NULL,
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

INSERT INTO `detail_produk` (`id_detail_produk`, `id_produk`, `id_ukuran_produk`, `id_warna`, `keterangan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('DETPRO-1', 'PRODUK-1', '', 'WARNA-3', 2, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-10', 'PRODUK-6', '', '', 3, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-11', 'PRODUK-7', 'UKPROD-1', 'WARNA-2', 0, 'USER-1', '2020-10-05 23:22:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-12', 'PRODUK-7', 'UKPROD-2', 'WARNA-3', 0, 'USER-1', '2020-10-05 23:22:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-13', 'PRODUK-7', 'UKPROD-5', 'WARNA-6', 0, 'USER-1', '2020-10-05 23:22:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-14', 'PRODUK-8', 'UKPROD-1', 'WARNA-2', 0, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-15', 'PRODUK-8', 'UKPROD-2', 'WARNA-3', 0, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-16', 'PRODUK-9', '', 'WARNA-2', 2, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-17', 'PRODUK-9', '', 'WARNA-3', 2, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-18', 'PRODUK-10', 'UKPROD-4', 'WARNA-2', 0, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-19', 'PRODUK-10', 'UKPROD-4', 'WARNA-3', 0, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-2', 'PRODUK-1', '', 'WARNA-4', 2, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-20', 'PRODUK-11', '', '', 3, 'USER-1', '2020-10-05 23:56:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-21', 'PRODUK-12', 'UKPROD-1', '', 1, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-22', 'PRODUK-12', 'UKPROD-2', '', 1, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-3', 'PRODUK-2', '', '', 3, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-4', 'PRODUK-3', 'UKPROD-1', '', 1, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-5', 'PRODUK-3', 'UKPROD-2', '', 1, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-6', 'PRODUK-4', 'UKPROD-4', 'WARNA-2', 0, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-7', 'PRODUK-4', 'UKPROD-4', 'WARNA-3', 0, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-8', 'PRODUK-5', '', '', 3, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-9', 'PRODUK-5', '', '', 3, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `detail_produk`
--
DELIMITER $$
CREATE TRIGGER `edit_detail_produk` AFTER UPDATE ON `detail_produk` FOR EACH ROW INSERT INTO `detail_produk_logs`(`id_detail_produk_logs`, `keterangan_log`, `id_detail_produk`,`id_produk`, `id_ukuran_produk`,`id_warna`,`keterangan`,`user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Edit Data',NEW.id_detail_produk,NEW.id_produk,NEW.id_ukuran_produk,NEW.id_warna,NEW.keterangan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_detail_produk` AFTER INSERT ON `detail_produk` FOR EACH ROW INSERT INTO `detail_produk_logs`(`id_detail_produk_logs`, `keterangan_log`, `id_detail_produk`,`id_produk`, `id_ukuran_produk`,`id_warna`,`keterangan`,`user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Insert Data',NEW.id_detail_produk,NEW.id_produk,NEW.id_ukuran_produk,NEW.id_warna,NEW.keterangan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

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

--
-- Dumping data for table `detail_produksi_line`
--

INSERT INTO `detail_produksi_line` (`id_detail_produksi_line`, `id_detail_purchase_order`, `id_produksi_line`, `jumlah_item_perencanaan`, `jumlah_item_aktual`, `waktu_proses_perencanaan`, `waktu_proses_aktual`, `keterangan_aktual`, `status_perencanaan`, `status_aktual`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('DPL2010.00000001', 'DPOC-5', 'PL2010.000001', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000002', 'DPOC-5', 'PL2010.000005', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000003', 'DPOC-5', 'PL2010.000009', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000004', 'DPOC-5', 'PL2010.000013', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000005', 'DPOC-5', 'PL2010.000017', 10, 0, 1000, 0, '', 0, 3, 'USER-7', '2020-10-09 19:47:25', 'USER-4', '2020-10-10 01:29:54', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000006', 'DPOC-5', 'PL2010.000021', 10, 5, 1000, 500, '', 0, 2, 'USER-7', '2020-10-09 19:47:25', 'USER-4', '2020-10-10 14:27:23', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000007', 'DPOC-5', 'PL2010.000025', 10, 0, 1000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000008', 'DPOC-5', 'PL2010.000002', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000009', 'DPOC-5', 'PL2010.000006', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000010', 'DPOC-5', 'PL2010.000010', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000011', 'DPOC-5', 'PL2010.000014', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000012', 'DPOC-5', 'PL2010.000018', 10, 10, 1000, 1000, '', 0, 1, 'USER-7', '2020-10-09 19:47:25', 'USER-4', '2020-10-10 12:12:34', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000013', 'DPOC-5', 'PL2010.000022', 10, 0, 1000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000014', 'DPOC-5', 'PL2010.000026', 10, 0, 1000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000015', 'DPOC-5', 'PL2010.000003', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000016', 'DPOC-5', 'PL2010.000007', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000017', 'DPOC-5', 'PL2010.000011', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000018', 'DPOC-5', 'PL2010.000015', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000019', 'DPOC-5', 'PL2010.000019', 10, 0, 1000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000020', 'DPOC-5', 'PL2010.000023', 10, 0, 1000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000021', 'DPOC-5', 'PL2010.000027', 10, 0, 1000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000022', 'DPOC-5', 'PL2010.000004', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000023', 'DPOC-5', 'PL2010.000008', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000024', 'DPOC-5', 'PL2010.000012', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000025', 'DPOC-5', 'PL2010.000016', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000026', 'DPOC-5', 'PL2010.000020', 10, 0, 1000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000027', 'DPOC-5', 'PL2010.000024', 10, 0, 1000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000028', 'DPOC-5', 'PL2010.000028', 10, 0, 1000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000029', 'DPOC-6', 'PL2010.000001', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000030', 'DPOC-6', 'PL2010.000005', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000031', 'DPOC-6', 'PL2010.000009', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000032', 'DPOC-6', 'PL2010.000013', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000033', 'DPOC-6', 'PL2010.000017', 20, 20, 2000, 2000, '', 0, 1, 'USER-7', '2020-10-09 19:47:25', 'USER-4', '2020-10-10 01:29:54', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000034', 'DPOC-6', 'PL2010.000021', 20, 17, 2000, 1700, '', 0, 2, 'USER-7', '2020-10-09 19:47:25', 'USER-4', '2020-10-10 14:27:23', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000035', 'DPOC-6', 'PL2010.000025', 20, 0, 2000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000036', 'DPOC-6', 'PL2010.000002', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000037', 'DPOC-6', 'PL2010.000006', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000038', 'DPOC-6', 'PL2010.000010', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000039', 'DPOC-6', 'PL2010.000014', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000040', 'DPOC-6', 'PL2010.000018', 20, 10, 2000, 1000, '', 0, 2, 'USER-7', '2020-10-09 19:47:25', 'USER-4', '2020-10-10 12:12:34', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000041', 'DPOC-6', 'PL2010.000022', 20, 0, 2000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000042', 'DPOC-6', 'PL2010.000026', 20, 0, 2000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000043', 'DPOC-6', 'PL2010.000003', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000044', 'DPOC-6', 'PL2010.000007', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000045', 'DPOC-6', 'PL2010.000011', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000046', 'DPOC-6', 'PL2010.000015', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000047', 'DPOC-6', 'PL2010.000019', 20, 0, 2000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000048', 'DPOC-6', 'PL2010.000023', 20, 0, 2000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000049', 'DPOC-6', 'PL2010.000027', 20, 0, 2000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000050', 'DPOC-6', 'PL2010.000004', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000051', 'DPOC-6', 'PL2010.000008', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000052', 'DPOC-6', 'PL2010.000012', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000053', 'DPOC-6', 'PL2010.000016', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000054', 'DPOC-6', 'PL2010.000020', 20, 0, 2000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000055', 'DPOC-6', 'PL2010.000024', 20, 0, 2000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000056', 'DPOC-6', 'PL2010.000028', 20, 0, 2000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000057', 'DPOC-7', 'PL2010.000001', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000058', 'DPOC-7', 'PL2010.000005', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000059', 'DPOC-7', 'PL2010.000009', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000060', 'DPOC-7', 'PL2010.000013', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000061', 'DPOC-7', 'PL2010.000017', 30, 15, 3000, 1500, '', 0, 2, 'USER-7', '2020-10-09 19:47:25', 'USER-4', '2020-10-10 01:29:54', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000062', 'DPOC-7', 'PL2010.000021', 30, 0, 3000, 0, '', 0, 3, 'USER-7', '2020-10-09 19:47:25', 'USER-4', '2020-10-10 14:27:23', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000063', 'DPOC-7', 'PL2010.000025', 30, 0, 3000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000064', 'DPOC-7', 'PL2010.000002', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000065', 'DPOC-7', 'PL2010.000006', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000066', 'DPOC-7', 'PL2010.000010', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000067', 'DPOC-7', 'PL2010.000014', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000068', 'DPOC-7', 'PL2010.000018', 30, 10, 3000, 1000, '', 0, 2, 'USER-7', '2020-10-09 19:47:25', 'USER-4', '2020-10-10 12:12:34', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000069', 'DPOC-7', 'PL2010.000022', 30, 0, 3000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000070', 'DPOC-7', 'PL2010.000026', 30, 0, 3000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000071', 'DPOC-7', 'PL2010.000003', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000072', 'DPOC-7', 'PL2010.000007', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000073', 'DPOC-7', 'PL2010.000011', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000074', 'DPOC-7', 'PL2010.000015', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000075', 'DPOC-7', 'PL2010.000019', 30, 0, 3000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000076', 'DPOC-7', 'PL2010.000023', 30, 0, 3000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000077', 'DPOC-7', 'PL2010.000027', 30, 0, 3000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000078', 'DPOC-7', 'PL2010.000004', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000079', 'DPOC-7', 'PL2010.000008', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000080', 'DPOC-7', 'PL2010.000012', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000081', 'DPOC-7', 'PL2010.000016', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000082', 'DPOC-7', 'PL2010.000020', 30, 0, 3000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000083', 'DPOC-7', 'PL2010.000024', 30, 0, 3000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000084', 'DPOC-7', 'PL2010.000028', 30, 0, 3000, 0, '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000085', 'DPOC-5', 'PL2010.000029', 10, 0, 1000, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000086', 'DPOC-5', 'PL2010.000033', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000087', 'DPOC-5', 'PL2010.000037', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000088', 'DPOC-5', 'PL2010.000041', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000089', 'DPOC-5', 'PL2010.000045', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000090', 'DPOC-5', 'PL2010.000049', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000091', 'DPOC-5', 'PL2010.000030', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000092', 'DPOC-5', 'PL2010.000034', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000093', 'DPOC-5', 'PL2010.000038', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000094', 'DPOC-5', 'PL2010.000042', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000095', 'DPOC-5', 'PL2010.000046', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000096', 'DPOC-5', 'PL2010.000050', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000097', 'DPOC-5', 'PL2010.000031', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000098', 'DPOC-5', 'PL2010.000035', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000099', 'DPOC-5', 'PL2010.000039', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000100', 'DPOC-5', 'PL2010.000043', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000101', 'DPOC-5', 'PL2010.000047', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000102', 'DPOC-5', 'PL2010.000051', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000103', 'DPOC-5', 'PL2010.000032', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000104', 'DPOC-5', 'PL2010.000036', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000105', 'DPOC-5', 'PL2010.000040', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000106', 'DPOC-5', 'PL2010.000044', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000107', 'DPOC-5', 'PL2010.000048', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2010.00000108', 'DPOC-5', 'PL2010.000052', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2011.00000001', 'DPOC-5', 'PL2011.000001', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2011.00000002', 'DPOC-5', 'PL2011.000002', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2011.00000003', 'DPOC-5', 'PL2011.000003', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2011.00000004', 'DPOC-5', 'PL2011.000004', 0, 0, 0, 0, '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_produk_logs`
--

CREATE TABLE `detail_produk_logs` (
  `id_detail_produk_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_detail_produk` varchar(10) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `id_ukuran_produk` varchar(10) NOT NULL,
  `id_warna` varchar(10) NOT NULL,
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
-- Dumping data for table `detail_produk_logs`
--

INSERT INTO `detail_produk_logs` (`id_detail_produk_logs`, `keterangan_log`, `id_detail_produk`, `id_produk`, `id_ukuran_produk`, `id_warna`, `keterangan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(6, 'Insert Data', 'DETPRO-1', 'PRODUK-1', '', 'WARNA-3', 2, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(7, 'Insert Data', 'DETPRO-2', 'PRODUK-1', '', 'WARNA-4', 2, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(8, 'Insert Data', 'DETPRO-3', 'PRODUK-2', '', '', 3, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(9, 'Insert Data', 'DETPRO-4', 'PRODUK-3', 'UKPROD-1', '', 1, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(10, 'Insert Data', 'DETPRO-5', 'PRODUK-3', 'UKPROD-2', '', 1, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(11, 'Insert Data', 'DETPRO-6', 'PRODUK-4', 'UKPROD-4', 'WARNA-2', 0, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(12, 'Insert Data', 'DETPRO-7', 'PRODUK-4', 'UKPROD-4', 'WARNA-3', 0, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(13, 'Insert Data', 'DETPRO-8', 'PRODUK-5', '', '', 3, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(14, 'Insert Data', 'DETPRO-9', 'PRODUK-5', '', '', 3, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(15, 'Insert Data', 'DETPRO-10', 'PRODUK-6', '', '', 3, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(16, 'Insert Data', 'DETPRO-11', 'PRODUK-7', 'UKPROD-1', 'WARNA-2', 0, 'USER-1', '2020-10-05 23:22:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(17, 'Insert Data', 'DETPRO-12', 'PRODUK-7', 'UKPROD-2', 'WARNA-3', 0, 'USER-1', '2020-10-05 23:22:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(18, 'Insert Data', 'DETPRO-13', 'PRODUK-7', 'UKPROD-5', 'WARNA-6', 0, 'USER-1', '2020-10-05 23:22:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(19, 'Insert Data', 'DETPRO-14', 'PRODUK-8', 'UKPROD-1', 'WARNA-2', 0, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(20, 'Insert Data', 'DETPRO-15', 'PRODUK-8', 'UKPROD-2', 'WARNA-3', 0, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(21, 'Insert Data', 'DETPRO-16', 'PRODUK-9', '', 'WARNA-2', 2, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(22, 'Insert Data', 'DETPRO-17', 'PRODUK-9', '', 'WARNA-3', 2, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(23, 'Insert Data', 'DETPRO-18', 'PRODUK-10', 'UKPROD-4', 'WARNA-2', 0, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(24, 'Insert Data', 'DETPRO-19', 'PRODUK-10', 'UKPROD-4', 'WARNA-3', 0, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(25, 'Insert Data', 'DETPRO-20', 'PRODUK-11', '', '', 3, 'USER-1', '2020-10-05 23:56:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(26, 'Insert Data', 'DETPRO-21', 'PRODUK-12', 'UKPROD-1', '', 1, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(27, 'Insert Data', 'DETPRO-22', 'PRODUK-12', 'UKPROD-2', '', 1, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
('DPOC-1', 'POC-1', 'DETPRO-21', 1, 100000, 0, '2020-10-28', 'USER-1', '2020-10-06 19:47:03', '0', '0000-00-00 00:00:00', 'USER-1', '2020-10-06 22:05:31', 1),
('DPOC-2', 'POC-1', 'DETPRO-17', 2, 300000, 0, '2020-10-30', 'USER-1', '2020-10-06 19:47:03', '0', '0000-00-00 00:00:00', 'USER-1', '2020-10-06 22:05:31', 1),
('DPOC-3', 'POC-2', 'DETPRO-17', 2, 300000, 0, '2020-10-14', 'USER-1', '2020-10-09 14:40:29', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('DPOC-4', 'POC-2', 'DETPRO-16', 1, 300000, 0, '2020-10-15', 'USER-1', '2020-10-09 14:40:29', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('DPOC-5', 'POC-3', 'DETPRO-16', 100, 300000, 30000000, '2020-10-16', 'USER-7', '2020-10-09 19:38:09', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('DPOC-6', 'POC-3', 'DETPRO-18', 100, 100000, 10000000, '2020-10-16', 'USER-7', '2020-10-09 19:38:09', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('DPOC-7', 'POC-3', 'DETPRO-20', 100, 100000, 10000000, '2020-10-16', 'USER-7', '2020-10-09 19:38:09', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_purchase_order_supplier`
--

CREATE TABLE `detail_purchase_order_supplier` (
  `id_detail_purchase_order_supplier` varchar(10) NOT NULL,
  `id_purchase_order_supplier` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `jumlah_material` int(11) NOT NULL,
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

INSERT INTO `detail_purchase_order_supplier` (`id_detail_purchase_order_supplier`, `id_purchase_order_supplier`, `id_sub_jenis_material`, `jumlah_material`, `harga_total`, `status_detail_po`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('DPOS-1', 'POS-1', 'SUBJM-8', 2, 4000, 0, 'USER-1', '2020-10-09 14:30:32', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('DPOS-2', 'POS-1', 'SUBJM-10', 3, 180000, 0, 'USER-1', '2020-10-09 14:30:32', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

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

--
-- Triggers `detail_surat_perintah_lembur`
--
DELIMITER $$
CREATE TRIGGER `edit_dspl` AFTER UPDATE ON `detail_surat_perintah_lembur` FOR EACH ROW INSERT INTO detail_surat_perintah_lembur_logs(`id_detail_surat_perintah_lembur_logs`,`keterangan_log`,`id_detail_surat_perintah_lembur`,`id_surat_perintah_lembur`,`id_karyawan`,`planning_lembur`,`waktu_in_plan`,`waktu_out_plan`,`keterangan_plan`,`aktual_lembur`,`waktu_in_aktual`,`waktu_out_aktual`,`keterangan_aktual`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES (null,'Edit\r\nData',NEW.id_detail_surat_perintah_lembur,NEW.id_surat_perintah_lembur,NEW.id_karyawan,NEW.planning_lembur,NEW.waktu_in_plan,NEW.waktu_out_plan,NEW.keterangan_plan,NEW.aktual_lembur,NEW.waktu_in_aktual,NEW.waktu_out_aktual,NEW.keterangan_aktual,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_dspl` AFTER INSERT ON `detail_surat_perintah_lembur` FOR EACH ROW INSERT INTO detail_surat_perintah_lembur_logs(`id_detail_surat_perintah_lembur_logs`,`keterangan_log`,`id_detail_surat_perintah_lembur`,`id_surat_perintah_lembur`,`id_karyawan`,`planning_lembur`,`waktu_in_plan`,`waktu_out_plan`,`keterangan_plan`,`aktual_lembur`,`waktu_in_aktual`,`waktu_out_aktual`,`keterangan_aktual`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES (null,'Insert Data',NEW.id_detail_surat_perintah_lembur,NEW.id_surat_perintah_lembur,NEW.id_karyawan,NEW.planning_lembur,NEW.waktu_in_plan,NEW.waktu_out_plan,NEW.keterangan_plan,NEW.aktual_lembur,NEW.waktu_in_aktual,NEW.waktu_out_aktual,NEW.keterangan_aktual,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_surat_perintah_lembur_logs`
--

CREATE TABLE `detail_surat_perintah_lembur_logs` (
  `id_detail_surat_perintah_lembur_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
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

--
-- Dumping data for table `detail_surat_perintah_lembur_logs`
--

INSERT INTO `detail_surat_perintah_lembur_logs` (`id_detail_surat_perintah_lembur_logs`, `keterangan_log`, `id_detail_surat_perintah_lembur`, `id_surat_perintah_lembur`, `id_karyawan`, `planning_lembur`, `waktu_in_plan`, `waktu_out_plan`, `keterangan_plan`, `aktual_lembur`, `waktu_in_aktual`, `waktu_out_aktual`, `keterangan_aktual`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 'Insert Data', 'DSPL-1', 'SPL-1', 'KAR-15', 2, '16:00:00', '18:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-28 21:24:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(2, 'Insert Data', 'DSPL-2', 'SPL-1', 'KAR-16', 2, '16:30:00', '18:30:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-28 21:24:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(3, 'Insert Data', 'DSPL-3', 'SPL-2', 'KAR-17', 5, '16:00:00', '21:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-28 21:25:05', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(4, 'Insert Data', 'DSPL-4', 'SPL-2', 'KAR-18', 5, '16:00:00', '21:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-28 21:25:05', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(5, 'Insert Data', 'DSPL-5', 'SPL-3', 'KAR-15', 1, '16:00:00', '17:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-28 21:48:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(6, 'Insert Data', 'DSPL-6', 'SPL-3', 'KAR-24', 2, '16:00:00', '18:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-28 21:48:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(7, 'Insert Data', 'DSPL-7', 'SPL-3', 'KAR-25', 3, '16:00:00', '19:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-28 21:48:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(8, 'Insert Data', 'DSPL-8', 'SPL-4', 'KAR-18', 3, '16:00:00', '19:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-28 21:49:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(9, 'Edit\r\nData', 'DSPL-1', 'SPL-1', 'KAR-15', 2, '16:00:00', '18:00:00', '', 3, '16:00:00', '19:00:00', 'Lebih 1 jam', 'USER-9', '2020-09-28 21:24:00', 'USER-9', '2020-09-29 07:22:27', '', '0000-00-00 00:00:00', 0),
(10, 'Edit\r\nData', 'DSPL-2', 'SPL-1', 'KAR-16', 2, '16:30:00', '18:30:00', '', 3, '16:00:00', '19:00:00', 'Lebih 1 jam', 'USER-9', '2020-09-28 21:24:00', 'USER-9', '2020-09-29 07:22:27', '', '0000-00-00 00:00:00', 0),
(11, 'Edit\r\nData', 'DSPL-1', 'SPL-1', 'KAR-15', 2, '16:00:00', '18:00:00', '', 2, '16:00:00', '18:00:00', 'Lebih 1 jam', 'USER-9', '2020-09-28 21:24:00', 'USER-9', '2020-09-29 07:29:12', '', '0000-00-00 00:00:00', 0),
(12, 'Edit\r\nData', 'DSPL-2', 'SPL-1', 'KAR-16', 2, '16:30:00', '18:30:00', '', 3, '16:00:00', '19:00:00', 'Lebih 1 jam', 'USER-9', '2020-09-28 21:24:00', 'USER-9', '2020-09-29 07:29:12', '', '0000-00-00 00:00:00', 0),
(13, 'Edit\r\nData', 'DSPL-3', 'SPL-2', 'KAR-17', 5, '16:00:00', '21:00:00', '', 5, '16:00:00', '21:00:00', 'Sesuai', 'USER-9', '2020-09-28 21:25:05', 'USER-9', '2020-09-29 07:30:23', '', '0000-00-00 00:00:00', 0),
(14, 'Edit\r\nData', 'DSPL-4', 'SPL-2', 'KAR-18', 5, '16:00:00', '21:00:00', '', 4, '16:00:00', '20:00:00', 'Harus pulang cepat jadi -1jam', 'USER-9', '2020-09-28 21:25:05', 'USER-9', '2020-09-29 07:30:23', '', '0000-00-00 00:00:00', 0),
(15, 'Insert Data', 'DSPL-9', 'SPL-5', 'KAR-19', 2, '16:00:00', '18:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-10', '2020-09-30 16:26:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dpos`
--

CREATE TABLE `dpos` (
  `id_detail_PO` varchar(10) NOT NULL,
  `id_PO` varchar(10) NOT NULL,
  `id_detail_produk` varchar(10) NOT NULL,
  `jumlah_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dpos`
--

INSERT INTO `dpos` (`id_detail_PO`, `id_PO`, `id_detail_produk`, `jumlah_produk`) VALUES
('DETPO-1', 'PO-1', 'DETPRO-1', 50),
('DETPO-2', 'PO-2', 'DETPRO-3', 50),
('DETPO-3', 'PO-3', 'DETPRO-5', 100),
('DETPO-4', 'PO-4', 'DETPRO-7', 500),
('DETPO-5', 'PO-5', 'DETPRO-1', 100),
('DETPO-6', 'PO-6', 'DETPRO-1', 300),
('DETPO-7', 'PO-6', 'DETPRO-2', 300);

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

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `id_purchase_order_customer`, `id_rekening`, `tanggal`, `ditujukan_kepada`, `sub_total`, `discount_rate`, `discount`, `ppn_rate`, `ppn`, `total`, `keterangan`, `status_invoice`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('MI2009.001', 'PO-4', 'REK-3', '2020-09-29', 'Accounting Department', 1000000, '0.00', 0, '10.00', 100000, 1100000, '                            ', 1, 'USER-3', '2020-09-29 23:51:59', 'USER-3', '2020-09-29 23:52:49', '', '0000-00-00 00:00:00', 0),
('MI2009.002', 'PO-5', 'REK-3', '2020-09-29', 'Direktur Inoac', 100000, '0.00', 0, '10.00', 10000, 110000, '                            ', 0, 'USER-3', '2020-09-29 23:52:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `invoice`
--
DELIMITER $$
CREATE TRIGGER `edit_invoice` AFTER UPDATE ON `invoice` FOR EACH ROW INSERT INTO invoice_logs(`id_invoice_logs`,`keterangan_log`,`id_invoice`,`id_purchase_order_customer`,`id_rekening`,`tanggal`,`ditujukan_kepada`,`sub_total`,`discount_rate`,`discount`,`ppn_rate`,`ppn`,`total`,`keterangan`,`status_invoice`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES(null,'Edit Data',NEW.id_invoice,NEW.id_purchase_order_customer,NEW.id_rekening,NEW.tanggal,NEW.ditujukan_kepada,NEW.sub_total,NEW.discount_rate,NEW.discount,NEW.ppn_rate,NEW.ppn,NEW.total,NEW.keterangan,NEW.status_invoice,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_invoice` AFTER INSERT ON `invoice` FOR EACH ROW INSERT INTO invoice_logs(`id_invoice_logs`,`keterangan_log`,`id_invoice`,`id_purchase_order_customer`,`id_rekening`,`tanggal`,`ditujukan_kepada`,`sub_total`,`discount_rate`,`discount`,`ppn_rate`,`ppn`,`total`,`keterangan`,`status_invoice`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES(null,'Insert Data',NEW.id_invoice,NEW.id_purchase_order_customer,NEW.id_rekening,NEW.tanggal,NEW.ditujukan_kepada,NEW.sub_total,NEW.discount_rate,NEW.discount,NEW.ppn_rate,NEW.ppn,NEW.total,NEW.keterangan,NEW.status_invoice,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_logs`
--

CREATE TABLE `invoice_logs` (
  `id_invoice_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
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

--
-- Dumping data for table `invoice_logs`
--

INSERT INTO `invoice_logs` (`id_invoice_logs`, `keterangan_log`, `id_invoice`, `id_purchase_order_customer`, `id_rekening`, `tanggal`, `ditujukan_kepada`, `sub_total`, `discount_rate`, `discount`, `ppn_rate`, `ppn`, `total`, `keterangan`, `status_invoice`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(37, 'Insert Data', 'MI2009.001', 'PO-4', 'REK-3', '2020-09-29', 'Accounting Department', 1000000, '0.00', 0, '10.00', 100000, 1100000, '                            ', 0, 'USER-3', '2020-09-29 23:51:59', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(38, 'Insert Data', 'MI2009.002', 'PO-5', 'REK-3', '2020-09-29', 'Direktur Inoac', 100000, '0.00', 0, '10.00', 10000, 110000, '                            ', 0, 'USER-3', '2020-09-29 23:52:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(39, 'Edit Data', 'MI2009.001', 'PO-4', 'REK-3', '2020-09-29', 'Accounting Department', 1000000, '0.00', 0, '10.00', 100000, 1100000, '                            ', 1, 'USER-3', '2020-09-29 23:51:59', 'USER-3', '2020-09-29 23:52:49', '', '0000-00-00 00:00:00', 0);

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

--
-- Dumping data for table `item_invoice`
--

INSERT INTO `item_invoice` (`id_item_invoice`, `id_invoice`, `id_detail_produk`, `jumlah_produk`, `price`, `total_price`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('MII20.000001', 'MI2009.001', 'DETPRO-7', 100, 10000, 1000000, 'USER-3', '2020-09-29 23:51:59', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('MII20.000002', 'MI2009.002', 'DETPRO-1', 10, 10000, 100000, 'USER-3', '2020-09-29 23:52:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `item_invoice`
--
DELIMITER $$
CREATE TRIGGER `edit_item_invoice` AFTER UPDATE ON `item_invoice` FOR EACH ROW INSERT INTO item_invoice_logs(`id_item_invoice_logs`,`keterangan_log`,`id_item_invoice`,`id_invoice`,`id_detail_produk`,`jumlah_produk`,`price`,`total_price`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES(null,'Edit Data',NEW.id_item_invoice,NEW.id_invoice,NEW.id_detail_produk,NEW.jumlah_produk,NEW.price,NEW.total_price,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_item_invoice` AFTER INSERT ON `item_invoice` FOR EACH ROW INSERT INTO item_invoice_logs(`id_item_invoice_logs`,`keterangan_log`,`id_item_invoice`,`id_invoice`,`id_detail_produk`,`jumlah_produk`,`price`,`total_price`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES(null,'Insert Data',NEW.id_item_invoice,NEW.id_invoice,NEW.id_detail_produk,NEW.jumlah_produk,NEW.price,NEW.total_price,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `item_invoice_logs`
--

CREATE TABLE `item_invoice_logs` (
  `id_item_invoice_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
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

--
-- Dumping data for table `item_invoice_logs`
--

INSERT INTO `item_invoice_logs` (`id_item_invoice_logs`, `keterangan_log`, `id_item_invoice`, `id_invoice`, `id_detail_produk`, `jumlah_produk`, `price`, `total_price`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(27, 'Insert Data', 'MII20.000001', 'MI2009.001', 'DETPRO-7', 100, 10000, 1000000, 'USER-3', '2020-09-29 23:51:59', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(28, 'Insert Data', 'MII20.000002', 'MI2009.002', 'DETPRO-1', 10, 10000, 100000, 'USER-3', '2020-09-29 23:52:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_surat_jalan`
--

CREATE TABLE `item_surat_jalan` (
  `id_item_surat_jalan` varchar(15) NOT NULL,
  `id_surat_jalan` varchar(15) NOT NULL,
  `id_detail_produk` varchar(10) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_surat_jalan`
--

INSERT INTO `item_surat_jalan` (`id_item_surat_jalan`, `id_surat_jalan`, `id_detail_produk`, `jumlah_produk`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('ISJ20.000001', 'M2009.0001', 'DETPRO-1', 20, 'USER-3', '2020-09-29 23:18:37', 'USER-3', '2020-09-29 23:26:19', 'USER-3', '2020-09-29 23:30:26', 1),
('ISJ20.000002', 'M2009.0001', 'DETPRO-2', 5, 'USER-3', '2020-09-29 23:19:22', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:19:38', 1),
('ISJ20.000003', 'M2009.0002', 'DETPRO-2', 5, 'USER-3', '2020-09-29 23:21:08', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:26:06', 1),
('ISJ20.000004', 'M2009.0003', 'DETPRO-1', 2, 'USER-3', '2020-09-29 23:26:50', 'USER-3', '2020-09-29 23:29:49', 'USER-3', '2020-09-29 23:30:06', 1),
('ISJ20.000005', 'M2009.0003', 'DETPRO-2', 25, 'USER-3', '2020-09-29 23:27:22', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:29:49', 1),
('ISJ20.000006', 'M2009.0003', 'DETPRO-2', 10, 'USER-3', '2020-09-29 23:30:06', 'USER-3', '2020-09-29 23:30:52', 'USER-3', '2020-09-29 23:31:19', 1),
('ISJ20.000007', 'M2009.0003', 'DETPRO-1', 2, 'USER-3', '2020-09-29 23:30:44', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:30:52', 1),
('ISJ20.000008', 'M2009.0004', 'DETPRO-1', 25, 'USER-3', '2020-09-29 23:31:49', 'USER-3', '2020-09-29 23:33:26', 'USER-3', '2020-09-29 23:40:45', 1),
('ISJ20.000009', 'M2009.0005', 'DETPRO-1', 5, 'USER-3', '2020-09-29 23:43:52', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:44:24', 1),
('ISJ20.000010', 'M2009.0006', 'DETPRO-1', 5, 'USER-3', '2020-09-29 23:46:20', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:46:28', 1),
('ISJ20.000011', 'M2009.0007', 'DETPRO-1', 5, 'USER-3', '2020-09-29 23:50:11', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:50:20', 1),
('ISJ20.000012', 'M2009.0008', 'DETPRO-1', 10, 'USER-3', '2020-09-29 23:50:50', 'USER-3', '2020-09-29 23:53:43', '', '0000-00-00 00:00:00', 0),
('ISJ20.000013', 'M2009.0008', 'DETPRO-2', 10, 'USER-3', '2020-09-29 23:50:50', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:53:43', 1),
('ISJ20.000014', 'M2009.0009', 'DETPRO-7', 100, 'USER-3', '2020-09-29 23:51:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('ISJ20.000015', 'M2009.0010', 'DETPRO-1', 10, 'USER-3', '2020-09-29 23:52:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `item_surat_jalan`
--
DELIMITER $$
CREATE TRIGGER `edit_item_surat_jalan` AFTER UPDATE ON `item_surat_jalan` FOR EACH ROW INSERT INTO item_surat_jalan_logs(`id_item_surat_jalan_logs`,`keterangan_log`,`id_item_surat_jalan`,`id_surat_jalan`,`id_detail_produk`,`jumlah_produk`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES(null,'Edit Data',NEW.id_item_surat_jalan,NEW.id_surat_jalan,NEW.id_detail_produk,NEW.jumlah_produk,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_item_surat_jalan` AFTER INSERT ON `item_surat_jalan` FOR EACH ROW INSERT INTO item_surat_jalan_logs(`id_item_surat_jalan_logs`,`keterangan_log`,`id_item_surat_jalan`,`id_surat_jalan`,`id_detail_produk`,`jumlah_produk`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES(null,'Insert Data',NEW.id_item_surat_jalan,NEW.id_surat_jalan,NEW.id_detail_produk,NEW.jumlah_produk,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `item_surat_jalan_logs`
--

CREATE TABLE `item_surat_jalan_logs` (
  `id_item_surat_jalan_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_item_surat_jalan` varchar(15) NOT NULL,
  `id_surat_jalan` varchar(15) NOT NULL,
  `id_detail_produk` varchar(10) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_surat_jalan_logs`
--

INSERT INTO `item_surat_jalan_logs` (`id_item_surat_jalan_logs`, `keterangan_log`, `id_item_surat_jalan`, `id_surat_jalan`, `id_detail_produk`, `jumlah_produk`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(23, 'Insert Data', 'ISJ20.000001', 'M2009.0001', 'DETPRO-1', 25, 'USER-3', '2020-09-29 23:18:37', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(24, 'Edit Data', 'ISJ20.000001', 'M2009.0001', 'DETPRO-1', 25, 'USER-3', '2020-09-29 23:18:37', 'USER-3', '2020-09-29 23:19:22', '', '0000-00-00 00:00:00', 0),
(25, 'Insert Data', 'ISJ20.000002', 'M2009.0001', 'DETPRO-2', 5, 'USER-3', '2020-09-29 23:19:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(26, 'Edit Data', 'ISJ20.000001', 'M2009.0001', 'DETPRO-1', 25, 'USER-3', '2020-09-29 23:18:37', 'USER-3', '2020-09-29 23:19:38', '', '0000-00-00 00:00:00', 0),
(27, 'Edit Data', 'ISJ20.000002', 'M2009.0001', 'DETPRO-2', 5, 'USER-3', '2020-09-29 23:19:22', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:19:38', 1),
(28, 'Insert Data', 'ISJ20.000003', 'M2009.0002', 'DETPRO-2', 5, 'USER-3', '2020-09-29 23:21:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(29, 'Edit Data', 'ISJ20.000003', 'M2009.0002', 'DETPRO-2', 5, 'USER-3', '2020-09-29 23:21:08', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:26:06', 1),
(30, 'Edit Data', 'ISJ20.000001', 'M2009.0001', 'DETPRO-1', 20, 'USER-3', '2020-09-29 23:18:37', 'USER-3', '2020-09-29 23:26:19', '', '0000-00-00 00:00:00', 0),
(31, 'Insert Data', 'ISJ20.000004', 'M2009.0003', 'DETPRO-1', 2, 'USER-3', '2020-09-29 23:26:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(32, 'Edit Data', 'ISJ20.000004', 'M2009.0003', 'DETPRO-1', 2, 'USER-3', '2020-09-29 23:26:50', 'USER-3', '2020-09-29 23:27:22', '', '0000-00-00 00:00:00', 0),
(33, 'Insert Data', 'ISJ20.000005', 'M2009.0003', 'DETPRO-2', 25, 'USER-3', '2020-09-29 23:27:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(34, 'Edit Data', 'ISJ20.000004', 'M2009.0003', 'DETPRO-1', 2, 'USER-3', '2020-09-29 23:26:50', 'USER-3', '2020-09-29 23:29:49', '', '0000-00-00 00:00:00', 0),
(35, 'Edit Data', 'ISJ20.000005', 'M2009.0003', 'DETPRO-2', 25, 'USER-3', '2020-09-29 23:27:22', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:29:49', 1),
(36, 'Edit Data', 'ISJ20.000004', 'M2009.0003', 'DETPRO-1', 2, 'USER-3', '2020-09-29 23:26:50', 'USER-3', '2020-09-29 23:29:49', 'USER-3', '2020-09-29 23:30:06', 1),
(37, 'Insert Data', 'ISJ20.000006', 'M2009.0003', 'DETPRO-2', 10, 'USER-3', '2020-09-29 23:30:06', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(38, 'Edit Data', 'ISJ20.000001', 'M2009.0001', 'DETPRO-1', 20, 'USER-3', '2020-09-29 23:18:37', 'USER-3', '2020-09-29 23:26:19', 'USER-3', '2020-09-29 23:30:26', 1),
(39, 'Insert Data', 'ISJ20.000007', 'M2009.0003', 'DETPRO-1', 2, 'USER-3', '2020-09-29 23:30:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(40, 'Edit Data', 'ISJ20.000006', 'M2009.0003', 'DETPRO-2', 10, 'USER-3', '2020-09-29 23:30:06', 'USER-3', '2020-09-29 23:30:44', '', '0000-00-00 00:00:00', 0),
(41, 'Edit Data', 'ISJ20.000007', 'M2009.0003', 'DETPRO-1', 2, 'USER-3', '2020-09-29 23:30:44', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:30:52', 1),
(42, 'Edit Data', 'ISJ20.000006', 'M2009.0003', 'DETPRO-2', 10, 'USER-3', '2020-09-29 23:30:06', 'USER-3', '2020-09-29 23:30:52', '', '0000-00-00 00:00:00', 0),
(43, 'Edit Data', 'ISJ20.000006', 'M2009.0003', 'DETPRO-2', 10, 'USER-3', '2020-09-29 23:30:06', 'USER-3', '2020-09-29 23:30:52', 'USER-3', '2020-09-29 23:31:19', 1),
(44, 'Insert Data', 'ISJ20.000008', 'M2009.0004', 'DETPRO-1', 10, 'USER-3', '2020-09-29 23:31:49', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(45, 'Edit Data', 'ISJ20.000008', 'M2009.0004', 'DETPRO-1', 25, 'USER-3', '2020-09-29 23:31:49', 'USER-3', '2020-09-29 23:33:26', '', '0000-00-00 00:00:00', 0),
(46, 'Edit Data', 'ISJ20.000008', 'M2009.0004', 'DETPRO-1', 25, 'USER-3', '2020-09-29 23:31:49', 'USER-3', '2020-09-29 23:33:26', 'USER-3', '2020-09-29 23:40:45', 1),
(47, 'Insert Data', 'ISJ20.000009', 'M2009.0005', 'DETPRO-1', 5, 'USER-3', '2020-09-29 23:43:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(48, 'Edit Data', 'ISJ20.000009', 'M2009.0005', 'DETPRO-1', 5, 'USER-3', '2020-09-29 23:43:52', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:44:24', 1),
(49, 'Insert Data', 'ISJ20.000010', 'M2009.0006', 'DETPRO-1', 5, 'USER-3', '2020-09-29 23:46:20', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(50, 'Edit Data', 'ISJ20.000010', 'M2009.0006', 'DETPRO-1', 5, 'USER-3', '2020-09-29 23:46:20', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:46:28', 1),
(51, 'Insert Data', 'ISJ20.000011', 'M2009.0007', 'DETPRO-1', 5, 'USER-3', '2020-09-29 23:50:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(52, 'Edit Data', 'ISJ20.000011', 'M2009.0007', 'DETPRO-1', 5, 'USER-3', '2020-09-29 23:50:11', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:50:20', 1),
(53, 'Insert Data', 'ISJ20.000012', 'M2009.0008', 'DETPRO-1', 10, 'USER-3', '2020-09-29 23:50:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(54, 'Insert Data', 'ISJ20.000013', 'M2009.0008', 'DETPRO-2', 10, 'USER-3', '2020-09-29 23:50:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(55, 'Insert Data', 'ISJ20.000014', 'M2009.0009', 'DETPRO-7', 100, 'USER-3', '2020-09-29 23:51:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(56, 'Insert Data', 'ISJ20.000015', 'M2009.0010', 'DETPRO-1', 10, 'USER-3', '2020-09-29 23:52:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(57, 'Edit Data', 'ISJ20.000012', 'M2009.0008', 'DETPRO-1', 10, 'USER-3', '2020-09-29 23:50:50', 'USER-3', '2020-09-29 23:53:43', '', '0000-00-00 00:00:00', 0),
(58, 'Edit Data', 'ISJ20.000013', 'M2009.0008', 'DETPRO-2', 10, 'USER-3', '2020-09-29 23:50:50', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:53:43', 1);

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
('JBT-1', 'Direktur', 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-10', 'Staff Line Assy', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-11', 'PIC Line Bonding', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-12', 'PIC Line Sewing', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-13', 'PIC Line Assy', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-14', 'ab', 'USER-1', '2020-09-08 09:30:03', 'USER-1', '2020-09-08 09:34:26', 'USER-1', '2020-09-24 22:48:24', 1),
('JBT-15', 'cd', 'USER-1', '2020-09-08 09:36:15', 'USER-1', '2020-09-08 09:42:44', 'USER-1', '2020-09-24 22:48:27', 1),
('JBT-16', 'aa', 'USER-1', '2020-09-09 00:39:19', '', '0000-00-00 00:00:00', 'USER-1', '2020-09-24 22:48:22', 1),
('JBT-17', 'aaa', 'USER-1', '2020-09-24 22:48:08', 'USER-1', '2020-09-24 22:48:12', 'USER-1', '2020-09-24 22:48:20', 1),
('JBT-2', 'Manager', 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-3', 'Admin', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-4', 'PPIC', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-5', 'Operator Gudang', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-6', 'PIC Line Cutting', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-7', 'Staff Line Cutting', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-8', 'Staff Line Bonding', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-9', 'Staff Line Sewing', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `jabatan`
--
DELIMITER $$
CREATE TRIGGER `edit_jabatan` AFTER UPDATE ON `jabatan` FOR EACH ROW INSERT INTO `jabatan_logs`(`id_jabatan_logs`,`keterangan_log`, `id_jabatan`, `nama_jabatan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`)VALUES(null,'Edit Data',NEW.id_jabatan,NEW.nama_jabatan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_jabatan` AFTER INSERT ON `jabatan` FOR EACH ROW INSERT INTO `jabatan_logs`(`id_jabatan_logs`, `keterangan_log`, `id_jabatan`, `nama_jabatan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Insert\r\nData',NEW.id_jabatan,NEW.nama_jabatan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
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
('JBTKAR-1', 'KAR-1', 'SJBT-1', 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-10', 'KAR-9', 'SJBT-10', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-11', 'KAR-9', 'SJBT-11', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-12', 'KAR-10', 'SJBT-12', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-13', 'KAR-11', 'SJBT-13', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-14', 'KAR-12', 'SJBT-6', 'USER-1', '2020-09-08 21:12:17', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-15', 'KAR-12', 'SJBT-8', 'USER-1', '2020-09-08 21:12:17', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-16', 'KAR-13', 'SJBT-15', 'USER-1', '2020-09-08 21:23:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-17', 'KAR-13', 'SJBT-17', 'USER-1', '2020-09-08 21:23:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-18', 'KAR-14', 'SJBT-6', 'USER-1', '2020-09-08 22:27:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-19', 'KAR-15', 'SJBT-18', 'USER-1', '2020-09-09 01:15:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-2', 'KAR-2', 'SJBT-2', 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-20', 'KAR-16', 'SJBT-18', 'USER-1', '2020-09-09 01:16:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-21', 'KAR-17', 'SJBT-15', 'USER-1', '2020-09-09 01:17:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-22', 'KAR-18', 'SJBT-15', 'USER-1', '2020-09-09 01:17:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-23', 'KAR-19', 'SJBT-16', 'USER-1', '2020-09-09 01:19:46', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-24', 'KAR-20', 'SJBT-16', 'USER-1', '2020-09-09 01:20:10', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-25', 'KAR-21', 'SJBT-17', 'USER-1', '2020-09-09 01:21:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-26', 'KAR-22', 'SJBT-17', 'USER-1', '2020-09-09 01:21:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-27', 'KAR-23', 'SJBT-18', 'USER-1', '2020-09-09 23:10:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-28', 'KAR-24', 'SJBT-18', 'USER-1', '2020-09-09 23:12:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-29', 'KAR-25', 'SJBT-18', 'USER-1', '2020-09-11 15:10:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-3', 'KAR-4', 'SJBT-3', 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-30', 'KAR-26', 'SJBT-18', 'USER-1', '2020-09-24 22:57:05', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-4', 'KAR-3', 'SJBT-4', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-5', 'KAR-5', 'SJBT-5', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-6', 'KAR-6', 'SJBT-6', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-7', 'KAR-2', 'SJBT-7', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-8', 'KAR-7', 'SJBT-8', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-9', 'KAR-8', 'SJBT-9', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
(1, 'Insert Data', 'JBTKAR-14', 'KAR-12', 'SJBT-6', 'USER-1', '2020-09-08 21:12:17', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(2, 'Insert Data', 'JBTKAR-15', 'KAR-12', 'SJBT-8', 'USER-1', '2020-09-08 21:12:17', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(3, 'Insert Data', 'JBTKAR-16', 'KAR-13', 'SJBT-15', 'USER-1', '2020-09-08 21:23:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(4, 'Insert Data', 'JBTKAR-17', 'KAR-13', 'SJBT-17', 'USER-1', '2020-09-08 21:23:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(5, 'Insert Data', 'JBTKAR-18', 'KAR-14', 'SJBT-6', 'USER-1', '2020-09-08 22:27:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(6, 'Insert Data', 'JBTKAR-19', 'KAR-15', 'SJBT-18', 'USER-1', '2020-09-09 01:15:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(7, 'Insert Data', 'JBTKAR-20', 'KAR-16', 'SJBT-18', 'USER-1', '2020-09-09 01:16:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(8, 'Insert Data', 'JBTKAR-21', 'KAR-17', 'SJBT-15', 'USER-1', '2020-09-09 01:17:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(9, 'Insert Data', 'JBTKAR-22', 'KAR-18', 'SJBT-15', 'USER-1', '2020-09-09 01:17:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(10, 'Insert Data', 'JBTKAR-23', 'KAR-19', 'SJBT-16', 'USER-1', '2020-09-09 01:19:46', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(11, 'Insert Data', 'JBTKAR-24', 'KAR-20', 'SJBT-16', 'USER-1', '2020-09-09 01:20:10', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(12, 'Insert Data', 'JBTKAR-25', 'KAR-21', 'SJBT-17', 'USER-1', '2020-09-09 01:21:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(13, 'Insert Data', 'JBTKAR-26', 'KAR-22', 'SJBT-17', 'USER-1', '2020-09-09 01:21:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(14, 'Insert Data', 'JBTKAR-27', 'KAR-23', 'SJBT-18', 'USER-1', '2020-09-09 23:10:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(15, 'Insert Data', 'JBTKAR-28', 'KAR-24', 'SJBT-18', 'USER-1', '2020-09-09 23:12:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(16, 'Insert Data', 'JBTKAR-29', 'KAR-25', 'SJBT-18', 'USER-1', '2020-09-11 15:10:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0'),
(17, 'Insert Data', 'JBTKAR-30', 'KAR-26', 'SJBT-18', 'USER-1', '2020-09-24 22:57:05', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0');

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
(1, 'Insert\r\nData', 'JBT-14', 'a', 'USER-1', '2020-09-08 09:30:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(2, 'Edit Data', 'JBT-14', 'ab', 'USER-1', '2020-09-08 09:30:03', 'USER-1', '2020-09-08 09:34:26', '', '0000-00-00 00:00:00', 0),
(3, 'Insert\r\nData', 'JBT-15', 'c', 'USER-1', '2020-09-08 09:36:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(4, 'Edit Data', 'JBT-15', 'cd', 'USER-1', '2020-09-08 09:36:15', 'USER-1', '2020-09-08 09:42:44', '', '0000-00-00 00:00:00', 0),
(5, 'Insert\r\nData', 'JBT-16', 'aa', 'USER-1', '2020-09-09 00:39:19', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(6, 'Insert\r\nData', 'JBT-17', 'a', 'USER-1', '2020-09-24 22:48:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(7, 'Edit Data', 'JBT-17', 'aaa', 'USER-1', '2020-09-24 22:48:08', 'USER-1', '2020-09-24 22:48:12', '', '0000-00-00 00:00:00', 0),
(8, 'Edit Data', 'JBT-17', 'aaa', 'USER-1', '2020-09-24 22:48:08', 'USER-1', '2020-09-24 22:48:12', 'USER-1', '2020-09-24 22:48:20', 1),
(9, 'Edit Data', 'JBT-16', 'aa', 'USER-1', '2020-09-09 00:39:19', '', '0000-00-00 00:00:00', 'USER-1', '2020-09-24 22:48:22', 1),
(10, 'Edit Data', 'JBT-14', 'ab', 'USER-1', '2020-09-08 09:30:03', 'USER-1', '2020-09-08 09:34:26', 'USER-1', '2020-09-24 22:48:24', 1),
(11, 'Edit Data', 'JBT-15', 'cd', 'USER-1', '2020-09-08 09:36:15', 'USER-1', '2020-09-08 09:42:44', 'USER-1', '2020-09-24 22:48:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_material`
--

CREATE TABLE `jenis_material` (
  `id_jenis_material` varchar(10) NOT NULL,
  `kode_jenis_material` varchar(10) NOT NULL,
  `nama_jenis_material` varchar(30) NOT NULL,
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

INSERT INTO `jenis_material` (`id_jenis_material`, `kode_jenis_material`, `nama_jenis_material`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('JM-1', 'FOAM00', 'Foam', 'USER-1', '2020-10-01 10:58:08', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('JM-2', 'LEM00', 'Lem', 'USER-1', '2020-10-05 23:00:51', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('JM-3', 'RETS00', 'Rets', 'USER-1', '2020-10-05 23:01:02', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('JM-4', 'PLASTIC00', 'Plastic Pack', 'USER-1', '2020-10-05 23:01:18', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('JM-5', 'KARTON00', 'Karton ', 'USER-1', '2020-10-05 23:01:33', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('JM-6', 'KARTON00', 'Karton', 'USER-1', '2020-10-05 23:07:04', '0', '0000-00-00 00:00:00', 'USER-1', '2020-10-05 23:07:09', 1),
('JM-7', 'BA001', 'Baut', 'USER-1', '2020-10-09 01:51:00', 'USER-1', '2020-10-09 02:10:34', '0', '0000-00-00 00:00:00', 0);

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
('JENPROD-1', 'Mattress', 'USER-1', '2020-08-30 22:46:04', 'USER-1', '2020-08-30 22:46:12', 'USER-1', '2020-08-30 22:46:14', 1),
('JENPROD-2', 'Mattress', 'USER-1', '2020-08-30 22:46:17', 'USER-1', '2020-08-30 22:46:21', '', '0000-00-00 00:00:00', 0),
('JENPROD-3', 'Sofa', 'USER-1', '2020-08-31 14:09:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JENPROD-4', 'Bantal', 'USER-1', '2020-08-31 14:09:34', '', '0000-00-00 00:00:00', 'USER-1', '2020-09-08 23:41:48', 1),
('JENPROD-5', 'Karpet', 'USER-1', '2020-08-31 14:09:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JENPROD-6', 'Floor Chair', 'USER-1', '2020-09-07 17:23:24', 'USER-1', '2020-09-07 17:23:40', '', '0000-00-00 00:00:00', 0),
('JENPROD-7', 'Bantal', 'USER-1', '2020-09-08 23:41:52', 'USER-1', '2020-09-08 23:41:59', '', '0000-00-00 00:00:00', 0);

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
(1, 'Insert Data', 'JENPROD-1', 'Mattress', 'USER-1', '2020-08-30 22:46:04', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(2, 'Edit Data', 'JENPROD-1', 'Mattressa', 'USER-1', '2020-08-30 22:46:04', 'USER-1', '2020-08-30 22:46:09', '', '0000-00-00 00:00:00', 0),
(3, 'Edit Data', 'JENPROD-1', 'Mattress', 'USER-1', '2020-08-30 22:46:04', 'USER-1', '2020-08-30 22:46:12', '', '0000-00-00 00:00:00', 0),
(4, 'Edit Data', 'JENPROD-1', 'Mattress', 'USER-1', '2020-08-30 22:46:04', 'USER-1', '2020-08-30 22:46:12', 'USER-1', '2020-08-30 22:46:14', 1),
(5, 'Insert Data', 'JENPROD-2', 'Mattress', 'USER-1', '2020-08-30 22:46:17', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(6, 'Edit Data', 'JENPROD-2', 'Mattressa', 'USER-1', '2020-08-30 22:46:17', 'USER-1', '2020-08-30 22:46:19', '', '0000-00-00 00:00:00', 0),
(7, 'Edit Data', 'JENPROD-2', 'Mattress', 'USER-1', '2020-08-30 22:46:17', 'USER-1', '2020-08-30 22:46:21', '', '0000-00-00 00:00:00', 0),
(8, 'Insert Data', 'JENPROD-3', 'Sofa', 'USER-1', '2020-08-31 14:09:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(9, 'Insert Data', 'JENPROD-4', 'Bantal', 'USER-1', '2020-08-31 14:09:34', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(10, 'Insert Data', 'JENPROD-5', 'Karpet', 'USER-1', '2020-08-31 14:09:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(11, 'Insert Data', 'JENPROD-6', 'Kursi', 'USER-1', '2020-09-07 17:23:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(12, 'Edit Data', 'JENPROD-6', 'Floor Chair', 'USER-1', '2020-09-07 17:23:24', 'USER-1', '2020-09-07 17:23:40', '', '0000-00-00 00:00:00', 0),
(13, 'Edit Data', 'JENPROD-4', 'Bantal', 'USER-1', '2020-08-31 14:09:34', '', '0000-00-00 00:00:00', 'USER-1', '2020-09-08 23:41:48', 1),
(14, 'Insert Data', 'JENPROD-7', 'Bantal', 'USER-1', '2020-09-08 23:41:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(15, 'Edit Data', 'JENPROD-7', 'Bantala', 'USER-1', '2020-09-08 23:41:52', 'USER-1', '2020-09-08 23:41:56', '', '0000-00-00 00:00:00', 0),
(16, 'Edit Data', 'JENPROD-7', 'Bantal', 'USER-1', '2020-09-08 23:41:52', 'USER-1', '2020-09-08 23:41:59', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
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

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `keterangan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('KAR-1', 'Andryan Dedy', 0, 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-10', 'pic2', 0, 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-11', 'pic3', 0, 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-12', 'xxx', 1, 'USER-1', '2020-09-08 21:12:17', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-13', 'yyy', 0, 'USER-1', '2020-09-08 21:23:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-14', 'zzz', 1, 'USER-1', '2020-09-08 22:27:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-15', 'Dwi', 0, 'USER-1', '2020-09-09 01:15:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-16', 'Maryadi', 0, 'USER-1', '2020-09-09 01:16:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-17', 'Sarodi', 0, 'USER-1', '2020-09-09 01:17:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-18', 'Andi', 0, 'USER-1', '2020-09-09 01:17:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-19', 'Firman', 0, 'USER-1', '2020-09-09 01:19:46', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-2', 'Julius', 0, 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-20', 'Iwan', 0, 'USER-1', '2020-09-09 01:20:10', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-21', 'Ahdi', 0, 'USER-1', '2020-09-09 01:21:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-22', 'Salim', 0, 'USER-1', '2020-09-09 01:21:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-23', 'Ibnul', 0, 'USER-1', '2020-09-09 23:10:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-24', 'Durojak', 0, 'USER-1', '2020-09-09 23:12:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-25', 'Komarudin', 0, 'USER-1', '2020-09-11 15:10:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-26', 'Dwia', 0, 'USER-1', '2020-09-24 22:57:05', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-3', 'Ita', 0, 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-4', 'Admin Produksi', 0, 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-5', 'Admin Risdev', 0, 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-6', 'Admin Finish Good', 0, 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-7', 'Yudi', 0, 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-8', 'Operator Gudang', 0, 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-9', 'pic1', 0, 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `karyawan`
--
DELIMITER $$
CREATE TRIGGER `edit_karyawan` AFTER UPDATE ON `karyawan` FOR EACH ROW INSERT INTO `karyawan_logs`(`id_karyawan_logs`,`keterangan_log`,`id_karyawan`,`nama_karyawan`,`keterangan`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES (null,'Edit Data',NEW.id_karyawan,NEW.nama_karyawan,NEW.keterangan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_karyawan` AFTER INSERT ON `karyawan` FOR EACH ROW INSERT INTO `karyawan_logs`(`id_karyawan_logs`,`keterangan_log`,`id_karyawan`,`nama_karyawan`,`keterangan`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES (null,'Insert Data',NEW.id_karyawan,NEW.nama_karyawan,NEW.keterangan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
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

INSERT INTO `karyawan_logs` (`id_karyawan_logs`, `keterangan_log`, `id_karyawan`, `nama_karyawan`, `keterangan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(2, 'Insert Data', 'KAR-12', 'xxx', 1, 'USER-1', '2020-09-08 21:12:17', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(3, 'Insert Data', 'KAR-13', 'yyy', 0, 'USER-1', '2020-09-08 21:23:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(4, 'Insert Data', 'KAR-14', 'zzz', 1, 'USER-1', '2020-09-08 22:27:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(5, 'Insert Data', 'KAR-15', 'Dwi', 0, 'USER-1', '2020-09-09 01:15:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(6, 'Insert Data', 'KAR-16', 'Maryadi', 0, 'USER-1', '2020-09-09 01:16:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(7, 'Insert Data', 'KAR-17', 'Sarodi', 0, 'USER-1', '2020-09-09 01:17:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(8, 'Insert Data', 'KAR-18', 'Andi', 0, 'USER-1', '2020-09-09 01:17:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(9, 'Insert Data', 'KAR-19', 'Firman', 0, 'USER-1', '2020-09-09 01:19:46', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(10, 'Insert Data', 'KAR-20', 'Iwan', 0, 'USER-1', '2020-09-09 01:20:10', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(11, 'Insert Data', 'KAR-21', 'Ahdi', 0, 'USER-1', '2020-09-09 01:21:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(12, 'Insert Data', 'KAR-22', 'Salim', 0, 'USER-1', '2020-09-09 01:21:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(13, 'Insert Data', 'KAR-23', 'Ibnul', 0, 'USER-1', '2020-09-09 23:10:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(14, 'Insert Data', 'KAR-24', 'Durojak', 0, 'USER-1', '2020-09-09 23:12:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(15, 'Insert Data', 'KAR-25', 'Komarudin', 0, 'USER-1', '2020-09-11 15:10:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(16, 'Insert Data', 'KAR-26', 'Dwia', 0, 'USER-1', '2020-09-24 22:57:05', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `konsumsi_material`
--

CREATE TABLE `konsumsi_material` (
  `id_konsumsi_material` varchar(15) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `id_line` varchar(10) NOT NULL,
  `jumlah_konsumsi` int(11) NOT NULL,
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

INSERT INTO `konsumsi_material` (`id_konsumsi_material`, `id_produk`, `id_sub_jenis_material`, `id_line`, `jumlah_konsumsi`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('KONMAT-1', 'PRODUK-1', 'MAT-1', 'LINE-1', 1, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-10', 'PRODUK-3', 'MAT-3', 'LINE-3', 3, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-11', 'PRODUK-3', 'MAT-6', 'LINE-4', 3, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-12', 'PRODUK-3', 'MAT-7', 'LINE-4', 3, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-13', 'PRODUK-4', 'MAT-1', 'LINE-1', 1, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-14', 'PRODUK-4', 'MAT-5', 'LINE-4', 1, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-15', 'PRODUK-4', 'MAT-7', 'LINE-4', 1, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-16', 'PRODUK-5', 'MAT-1', 'LINE-1', 2, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-17', 'PRODUK-5', 'MAT-2', 'LINE-1', 2, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-18', 'PRODUK-5', 'MAT-2', 'LINE-2', 1, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-19', 'PRODUK-5', 'MAT-3', 'LINE-3', 2, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-2', 'PRODUK-1', 'MAT-3', 'LINE-3', 1, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-20', 'PRODUK-5', 'MAT-7', 'LINE-4', 4, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-21', 'PRODUK-5', 'MAT-1', 'LINE-1', 2, 'USER-1', '2020-10-04 23:20:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-22', 'PRODUK-5', 'MAT-2', 'LINE-1', 2, 'USER-1', '2020-10-04 23:20:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-23', 'PRODUK-5', 'MAT-2', 'LINE-2', 1, 'USER-1', '2020-10-04 23:20:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-24', 'PRODUK-5', 'MAT-3', 'LINE-3', 2, 'USER-1', '2020-10-04 23:20:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-25', 'PRODUK-5', 'MAT-7', 'LINE-4', 4, 'USER-1', '2020-10-04 23:20:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-26', 'PRODUK-5', 'MAT-1', 'LINE-1', 2, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-27', 'PRODUK-5', 'MAT-2', 'LINE-1', 2, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-28', 'PRODUK-5', 'MAT-2', 'LINE-2', 1, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-29', 'PRODUK-5', 'MAT-3', 'LINE-3', 2, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-3', 'PRODUK-1', 'MAT-5', 'LINE-4', 1, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-30', 'PRODUK-5', 'MAT-7', 'LINE-4', 4, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-31', 'PRODUK-6', 'MAT-1', 'LINE-1', 2, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-32', 'PRODUK-6', 'MAT-2', 'LINE-1', 2, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-33', 'PRODUK-6', 'MAT-2', 'LINE-2', 1, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-34', 'PRODUK-6', 'MAT-3', 'LINE-3', 2, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-35', 'PRODUK-6', 'MAT-7', 'LINE-4', 4, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-36', 'PRODUK-8', 'SUBJM-1', 'LINE-1', 1, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-37', 'PRODUK-8', 'SUBJM-2', 'LINE-1', 1, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-38', 'PRODUK-8', 'SUBJM-3', 'LINE-2', 2, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-39', 'PRODUK-8', 'SUBJM-4', 'LINE-3', 1, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-4', 'PRODUK-1', 'MAT-7', 'LINE-4', 4, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-40', 'PRODUK-8', 'SUBJM-6', 'LINE-4', 2, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-41', 'PRODUK-8', 'SUBJM-8', 'LINE-4', 5, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-42', 'PRODUK-9', 'SUBJM-1', 'LINE-1', 1, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-43', 'PRODUK-9', 'SUBJM-3', 'LINE-2', 1, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-44', 'PRODUK-9', 'SUBJM-5', 'LINE-3', 1, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-45', 'PRODUK-9', 'SUBJM-6', 'LINE-4', 1, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-46', 'PRODUK-9', 'SUBJM-9', 'LINE-4', 1, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-47', 'PRODUK-10', 'SUBJM-1', 'LINE-1', 1, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-48', 'PRODUK-10', 'SUBJM-4', 'LINE-3', 1, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-49', 'PRODUK-10', 'SUBJM-6', 'LINE-4', 1, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-5', 'PRODUK-2', 'MAT-2', 'LINE-1', 1, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-50', 'PRODUK-11', 'SUBJM-2', 'LINE-1', 1, 'USER-1', '2020-10-05 23:56:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-51', 'PRODUK-11', 'SUBJM-5', 'LINE-3', 2, 'USER-1', '2020-10-05 23:56:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-52', 'PRODUK-11', 'SUBJM-6', 'LINE-4', 1, 'USER-1', '2020-10-05 23:56:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-53', 'PRODUK-12', 'SUBJM-1', 'LINE-1', 1, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-54', 'PRODUK-12', 'SUBJM-2', 'LINE-1', 2, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-55', 'PRODUK-12', 'SUBJM-3', 'LINE-2', 1, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-56', 'PRODUK-12', 'SUBJM-6', 'LINE-4', 2, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-6', 'PRODUK-2', 'MAT-4', 'LINE-3', 1, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-7', 'PRODUK-2', 'MAT-6', 'LINE-4', 1, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-8', 'PRODUK-3', 'MAT-1', 'LINE-1', 3, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-9', 'PRODUK-3', 'MAT-2', 'LINE-1', 3, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `konsumsi_material`
--
DELIMITER $$
CREATE TRIGGER `edit_konsumsi_material` AFTER UPDATE ON `konsumsi_material` FOR EACH ROW INSERT INTO `konsumsi_material_logs`(`id_konsumsi_material_logs`,`keterangan_log`, `id_konsumsi_material`,`id_produk`, `id_sub_jenis_material`, `id_line`, `jumlah_konsumsi`,`user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Edit Data',NEW.id_konsumsi_material,NEW.id_produk,NEW.id_sub_jenis_material,NEW.id_line,NEW.jumlah_konsumsi,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_konsumsi_material` AFTER INSERT ON `konsumsi_material` FOR EACH ROW INSERT INTO `konsumsi_material_logs`(`id_konsumsi_material_logs`,`keterangan_log`, `id_konsumsi_material`,`id_produk`, `id_sub_jenis_material`, `id_line`, `jumlah_konsumsi`,`user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Insert Data',NEW.id_konsumsi_material,NEW.id_produk,NEW.id_sub_jenis_material,NEW.id_line,NEW.jumlah_konsumsi,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `konsumsi_material_logs`
--

CREATE TABLE `konsumsi_material_logs` (
  `id_konsumsi_material_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_konsumsi_material` varchar(15) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `id_line` varchar(10) NOT NULL,
  `jumlah_konsumsi` int(11) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumsi_material_logs`
--

INSERT INTO `konsumsi_material_logs` (`id_konsumsi_material_logs`, `keterangan_log`, `id_konsumsi_material`, `id_produk`, `id_sub_jenis_material`, `id_line`, `jumlah_konsumsi`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(6, 'Insert Data', 'KONMAT-1', 'PRODUK-1', 'MAT-1', 'LINE-1', 1, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(7, 'Insert Data', 'KONMAT-2', 'PRODUK-1', 'MAT-3', 'LINE-3', 1, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(8, 'Insert Data', 'KONMAT-3', 'PRODUK-1', 'MAT-5', 'LINE-4', 1, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(9, 'Insert Data', 'KONMAT-4', 'PRODUK-1', 'MAT-7', 'LINE-4', 4, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(10, 'Insert Data', 'KONMAT-5', 'PRODUK-2', 'MAT-2', 'LINE-1', 1, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(11, 'Insert Data', 'KONMAT-6', 'PRODUK-2', 'MAT-4', 'LINE-3', 1, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(12, 'Insert Data', 'KONMAT-7', 'PRODUK-2', 'MAT-6', 'LINE-4', 1, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(13, 'Insert Data', 'KONMAT-8', 'PRODUK-3', 'MAT-1', 'LINE-1', 3, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(14, 'Insert Data', 'KONMAT-9', 'PRODUK-3', 'MAT-2', 'LINE-1', 3, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(15, 'Insert Data', 'KONMAT-10', 'PRODUK-3', 'MAT-3', 'LINE-3', 3, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(16, 'Insert Data', 'KONMAT-11', 'PRODUK-3', 'MAT-6', 'LINE-4', 3, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(17, 'Insert Data', 'KONMAT-12', 'PRODUK-3', 'MAT-7', 'LINE-4', 3, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(18, 'Insert Data', 'KONMAT-13', 'PRODUK-4', 'MAT-1', 'LINE-1', 1, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(19, 'Insert Data', 'KONMAT-14', 'PRODUK-4', 'MAT-5', 'LINE-4', 1, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(20, 'Insert Data', 'KONMAT-15', 'PRODUK-4', 'MAT-7', 'LINE-4', 1, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(21, 'Insert Data', 'KONMAT-16', 'PRODUK-5', 'MAT-1', 'LINE-1', 2, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(22, 'Insert Data', 'KONMAT-17', 'PRODUK-5', 'MAT-2', 'LINE-1', 2, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(23, 'Insert Data', 'KONMAT-18', 'PRODUK-5', 'MAT-2', 'LINE-2', 1, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(24, 'Insert Data', 'KONMAT-19', 'PRODUK-5', 'MAT-3', 'LINE-3', 2, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(25, 'Insert Data', 'KONMAT-20', 'PRODUK-5', 'MAT-7', 'LINE-4', 4, 'USER-1', '2020-10-04 23:19:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(26, 'Insert Data', 'KONMAT-21', 'PRODUK-5', 'MAT-1', 'LINE-1', 2, 'USER-1', '2020-10-04 23:20:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(27, 'Insert Data', 'KONMAT-22', 'PRODUK-5', 'MAT-2', 'LINE-1', 2, 'USER-1', '2020-10-04 23:20:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(28, 'Insert Data', 'KONMAT-23', 'PRODUK-5', 'MAT-2', 'LINE-2', 1, 'USER-1', '2020-10-04 23:20:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(29, 'Insert Data', 'KONMAT-24', 'PRODUK-5', 'MAT-3', 'LINE-3', 2, 'USER-1', '2020-10-04 23:20:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(30, 'Insert Data', 'KONMAT-25', 'PRODUK-5', 'MAT-7', 'LINE-4', 4, 'USER-1', '2020-10-04 23:20:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(31, 'Insert Data', 'KONMAT-26', 'PRODUK-5', 'MAT-1', 'LINE-1', 2, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(32, 'Insert Data', 'KONMAT-27', 'PRODUK-5', 'MAT-2', 'LINE-1', 2, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(33, 'Insert Data', 'KONMAT-28', 'PRODUK-5', 'MAT-2', 'LINE-2', 1, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(34, 'Insert Data', 'KONMAT-29', 'PRODUK-5', 'MAT-3', 'LINE-3', 2, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(35, 'Insert Data', 'KONMAT-30', 'PRODUK-5', 'MAT-7', 'LINE-4', 4, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(36, 'Insert Data', 'KONMAT-31', 'PRODUK-6', 'MAT-1', 'LINE-1', 2, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(37, 'Insert Data', 'KONMAT-32', 'PRODUK-6', 'MAT-2', 'LINE-1', 2, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(38, 'Insert Data', 'KONMAT-33', 'PRODUK-6', 'MAT-2', 'LINE-2', 1, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(39, 'Insert Data', 'KONMAT-34', 'PRODUK-6', 'MAT-3', 'LINE-3', 2, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(40, 'Insert Data', 'KONMAT-35', 'PRODUK-6', 'MAT-7', 'LINE-4', 4, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(41, 'Insert Data', 'KONMAT-36', 'PRODUK-8', 'SUBJM-1', 'LINE-1', 1, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(42, 'Insert Data', 'KONMAT-37', 'PRODUK-8', 'SUBJM-2', 'LINE-1', 1, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(43, 'Insert Data', 'KONMAT-38', 'PRODUK-8', 'SUBJM-3', 'LINE-2', 2, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(44, 'Insert Data', 'KONMAT-39', 'PRODUK-8', 'SUBJM-4', 'LINE-3', 1, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(45, 'Insert Data', 'KONMAT-40', 'PRODUK-8', 'SUBJM-6', 'LINE-4', 2, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(46, 'Insert Data', 'KONMAT-41', 'PRODUK-8', 'SUBJM-8', 'LINE-4', 5, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(47, 'Insert Data', 'KONMAT-42', 'PRODUK-9', 'SUBJM-1', 'LINE-1', 1, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(48, 'Insert Data', 'KONMAT-43', 'PRODUK-9', 'SUBJM-3', 'LINE-2', 1, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(49, 'Insert Data', 'KONMAT-44', 'PRODUK-9', 'SUBJM-5', 'LINE-3', 1, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(50, 'Insert Data', 'KONMAT-45', 'PRODUK-9', 'SUBJM-6', 'LINE-4', 1, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(51, 'Insert Data', 'KONMAT-46', 'PRODUK-9', 'SUBJM-9', 'LINE-4', 1, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(52, 'Insert Data', 'KONMAT-47', 'PRODUK-10', 'SUBJM-1', 'LINE-1', 1, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(53, 'Insert Data', 'KONMAT-48', 'PRODUK-10', 'SUBJM-4', 'LINE-3', 1, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(54, 'Insert Data', 'KONMAT-49', 'PRODUK-10', 'SUBJM-6', 'LINE-4', 1, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(55, 'Insert Data', 'KONMAT-50', 'PRODUK-11', 'SUBJM-2', 'LINE-1', 1, 'USER-1', '2020-10-05 23:56:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(56, 'Insert Data', 'KONMAT-51', 'PRODUK-11', 'SUBJM-5', 'LINE-3', 2, 'USER-1', '2020-10-05 23:56:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(57, 'Insert Data', 'KONMAT-52', 'PRODUK-11', 'SUBJM-6', 'LINE-4', 1, 'USER-1', '2020-10-05 23:56:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(58, 'Insert Data', 'KONMAT-53', 'PRODUK-12', 'SUBJM-1', 'LINE-1', 1, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(59, 'Insert Data', 'KONMAT-54', 'PRODUK-12', 'SUBJM-2', 'LINE-1', 2, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(60, 'Insert Data', 'KONMAT-55', 'PRODUK-12', 'SUBJM-3', 'LINE-2', 1, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(61, 'Insert Data', 'KONMAT-56', 'PRODUK-12', 'SUBJM-6', 'LINE-4', 2, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
('LINE-1', 'Line Cutting', 1, 1, 3, 9, 1000, 'USER-1', '2020-09-07 17:29:04', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
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
(10, 'Insert Data', 'LINE-4', 'Line Assy', 4, 3, 5, 27, 1000, 'USER-1', '2020-09-07 17:29:59', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id_material` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `id_invoice` varchar(10) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `status_keluar` int(11) NOT NULL,
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
-- Table structure for table `material_sementara`
--

CREATE TABLE `material_sementara` (
  `id_material` varchar(10) NOT NULL,
  `id_jenis_material` varchar(10) NOT NULL,
  `kode_material` varchar(30) NOT NULL,
  `nama_material` varchar(50) NOT NULL,
  `satuan_ukuran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_sementara`
--

INSERT INTO `material_sementara` (`id_material`, `id_jenis_material`, `kode_material`, `nama_material`, `satuan_ukuran`) VALUES
('MAT-1', 'JENMAT-1', '001', 'REB 55', 'm3'),
('MAT-2', 'JENMAT-1', '002', 'REB 70', 'm3'),
('MAT-3', 'JENMAT-2', '003', 'Rets Hitam', 'pcs'),
('MAT-4', 'JENMAT-2', '004', 'Rets Putih', 'pcs'),
('MAT-5', 'JENMAT-3', '005', 'Plastic Pack 1', 'pcs'),
('MAT-6', 'JENMAT-3', '006', 'Plastic Pack 2', 'pcs'),
('MAT-7', 'JENMAT-4', '007', 'Karton 1', 'pcs'),
('MAT-8', 'JENMAT-5', '008', 'Karton 2', 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan_material`
--

CREATE TABLE `pemasukan_material` (
  `id_pemasukan_material` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
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
  `id_pengambilan_material` varchar(10) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `id_detail_permintaan_material` varchar(10) NOT NULL,
  `id_pengeluaran_material` varchar(10) NOT NULL,
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
  `id_pengeluaran_material` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `tanggal_keluar` datetime NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_material`
--

CREATE TABLE `permintaan_material` (
  `id_permintaan_material` varchar(20) NOT NULL,
  `kode_permintaan_material` varchar(30) NOT NULL,
  `id_detail_purchase_order_customer` varchar(10) NOT NULL,
  `id_line` varchar(10) NOT NULL,
  `jumlah_minta` int(11) NOT NULL,
  `tanggal_permintaan` datetime NOT NULL,
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

--
-- Dumping data for table `permintaan_material`
--

INSERT INTO `permintaan_material` (`id_permintaan_material`, `kode_permintaan_material`, `id_detail_purchase_order_customer`, `id_line`, `jumlah_minta`, `tanggal_permintaan`, `tanggal_produksi`, `status_permintaan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('PERMAT2010.00001', '', 'DPOC-5', 'LINE-1', 10, '2020-10-09 00:00:00', '2020-10-09', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00002', '', 'DPOC-5', 'LINE-1', 10, '2020-10-09 00:00:00', '2020-10-10', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00003', '', 'DPOC-5', 'LINE-1', 10, '2020-10-09 00:00:00', '2020-10-11', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00004', '', 'DPOC-5', 'LINE-2', 10, '2020-10-09 00:00:00', '2020-10-09', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00005', '', 'DPOC-5', 'LINE-2', 10, '2020-10-09 00:00:00', '2020-10-10', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00006', '', 'DPOC-5', 'LINE-2', 10, '2020-10-09 00:00:00', '2020-10-11', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00007', '', 'DPOC-5', 'LINE-3', 10, '2020-10-09 00:00:00', '2020-10-09', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00008', '', 'DPOC-5', 'LINE-3', 10, '2020-10-09 00:00:00', '2020-10-10', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00009', '', 'DPOC-5', 'LINE-3', 10, '2020-10-09 00:00:00', '2020-10-11', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00010', '', 'DPOC-5', 'LINE-4', 10, '2020-10-09 00:00:00', '2020-10-09', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00011', '', 'DPOC-5', 'LINE-4', 10, '2020-10-09 00:00:00', '2020-10-10', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00012', '', 'DPOC-5', 'LINE-4', 10, '2020-10-09 00:00:00', '2020-10-11', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00013', '', 'DPOC-6', 'LINE-1', 20, '2020-10-09 00:00:00', '2020-10-09', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00014', '', 'DPOC-6', 'LINE-1', 20, '2020-10-09 00:00:00', '2020-10-10', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00015', '', 'DPOC-6', 'LINE-1', 20, '2020-10-09 00:00:00', '2020-10-11', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00016', '', 'DPOC-6', 'LINE-2', 20, '2020-10-09 00:00:00', '2020-10-09', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00017', '', 'DPOC-6', 'LINE-2', 20, '2020-10-09 00:00:00', '2020-10-10', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00018', '', 'DPOC-6', 'LINE-2', 20, '2020-10-09 00:00:00', '2020-10-11', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00019', '', 'DPOC-6', 'LINE-3', 20, '2020-10-09 00:00:00', '2020-10-09', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00020', '', 'DPOC-6', 'LINE-3', 20, '2020-10-09 00:00:00', '2020-10-10', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00021', '', 'DPOC-6', 'LINE-3', 20, '2020-10-09 00:00:00', '2020-10-11', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00022', '', 'DPOC-6', 'LINE-4', 20, '2020-10-09 00:00:00', '2020-10-09', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00023', '', 'DPOC-6', 'LINE-4', 20, '2020-10-09 00:00:00', '2020-10-10', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00024', '', 'DPOC-6', 'LINE-4', 20, '2020-10-09 00:00:00', '2020-10-11', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00025', '', 'DPOC-7', 'LINE-1', 30, '2020-10-09 00:00:00', '2020-10-09', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00026', '', 'DPOC-7', 'LINE-1', 30, '2020-10-09 00:00:00', '2020-10-10', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00027', '', 'DPOC-7', 'LINE-1', 30, '2020-10-09 00:00:00', '2020-10-11', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00028', '', 'DPOC-7', 'LINE-2', 30, '2020-10-09 00:00:00', '2020-10-09', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00029', '', 'DPOC-7', 'LINE-2', 30, '2020-10-09 00:00:00', '2020-10-10', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00030', '', 'DPOC-7', 'LINE-2', 30, '2020-10-09 00:00:00', '2020-10-11', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00031', '', 'DPOC-7', 'LINE-3', 30, '2020-10-09 00:00:00', '2020-10-09', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00032', '', 'DPOC-7', 'LINE-3', 30, '2020-10-09 00:00:00', '2020-10-10', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00033', '', 'DPOC-7', 'LINE-3', 30, '2020-10-09 00:00:00', '2020-10-11', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00034', '', 'DPOC-7', 'LINE-4', 30, '2020-10-09 00:00:00', '2020-10-09', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00035', '', 'DPOC-7', 'LINE-4', 30, '2020-10-09 00:00:00', '2020-10-10', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00036', '', 'DPOC-7', 'LINE-4', 30, '2020-10-09 00:00:00', '2020-10-11', 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PERMAT2010.00037', '', 'DPOC-5', 'LINE-1', 10, '2020-10-10 00:00:00', '2020-10-26', 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_pembelian`
--

CREATE TABLE `permintaan_pembelian` (
  `id_permintaan_pembelian` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `jumlah_material` int(11) NOT NULL,
  `status_pembelian` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
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

--
-- Dumping data for table `permohonan_akses`
--

INSERT INTO `permohonan_akses` (`id_permohonan_akses`, `id_data`, `id_user`, `nama_permohonan_akses`, `tanggal`, `keterangan`, `status_permohonan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('PERAKS20.00001', 'P2009.0002', 'USER-4', 'Edit Hasil Produksi', '2020-10-02', 'Terjadi salah input jumlah item produksi                                ', 3, 'USER-4', '2020-10-02 00:13:54', 'USER-4', '2020-10-02 16:45:16', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00002', 'P2009.0003', 'USER-4', 'Edit Hasil Produksi', '2020-10-02', 'Salah input                                ', 2, 'USER-4', '2020-10-02 00:36:32', 'USER-2', '2020-10-02 01:37:13', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00003', 'P2010.0002', 'USER-4', 'Edit Hasil Produksi', '2020-10-02', 'Salah                                ', 0, 'USER-4', '2020-10-02 14:30:33', 'USER-4', '2020-10-02 17:11:20', '', '0000-00-00 00:00:00', 1),
('PERAKS20.00004', 'P2010.0002', 'USER-4', 'Edit Hasil Produksi', '2020-10-02', 'Tes                                ', 3, 'USER-4', '2020-10-02 17:11:32', 'USER-4', '2020-10-02 17:13:10', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00005', 'P2010.0001', 'USER-4', 'Edit Hasil Produksi', '2020-10-02', 'tes2\r\n                                ', 3, 'USER-4', '2020-10-02 17:12:30', 'USER-4', '2020-10-03 12:36:04', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00006', 'P2009.0003', 'USER-4', 'Edit Hasil Produksi', '2020-10-02', 'Salah input\r\n                                ', 0, 'USER-4', '2020-10-02 17:13:21', 'USER-4', '2020-10-02 21:35:57', '', '0000-00-00 00:00:00', 1),
('PERAKS20.00007', 'P2009.0001', 'USER-4', 'Edit Hasil Produksi', '2020-10-02', 'Akses untuk edit jumlah                                ', 3, 'USER-4', '2020-10-02 22:03:16', 'USER-4', '2020-10-02 22:25:43', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00008', 'P2009.0002', 'USER-4', 'Edit Hasil Produksi', '2020-10-02', 'aKSES                                ', 3, 'USER-4', '2020-10-02 22:08:59', 'USER-4', '2020-10-02 23:14:06', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00009', 'P2009.0003', 'USER-4', 'Edit Hasil Produksi', '2020-10-02', 'Akses                                ', 0, 'USER-4', '2020-10-02 23:26:07', 'USER-4', '2020-10-02 23:47:06', '', '0000-00-00 00:00:00', 1),
('PERAKS20.00010', 'P2009.0003', 'USER-4', 'Edit Hasil Produksi', '2020-10-03', '                                ', 0, 'USER-4', '2020-10-03 00:03:30', 'USER-4', '2020-10-03 00:04:48', '', '0000-00-00 00:00:00', 1),
('PERAKS20.00011', 'P2009.0003', 'USER-4', 'Edit Hasil Produksi', '2020-10-03', '                                ', 0, 'USER-4', '2020-10-03 00:04:55', 'USER-4', '2020-10-03 00:05:21', '', '0000-00-00 00:00:00', 1),
('PERAKS20.00012', 'P2009.0003', 'USER-4', 'Edit Hasil Produksi', '2020-10-03', 'Permintaan akses salah input jumlah hasil produksi line cutting\r\n', 3, 'USER-4', '2020-10-03 00:06:29', 'USER-4', '2020-10-03 12:37:35', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00013', 'P2010.0001', 'USER-4', 'Edit Hasil Produksi', '2020-10-03', 'Salah input', 2, 'USER-4', '2020-10-03 12:41:17', 'USER-2', '2020-10-03 12:41:29', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00014', 'P2010.0001', 'USER-4', 'Edit Hasil Produksi', '2020-10-03', 'Slaah', 3, 'USER-4', '2020-10-03 12:42:05', 'USER-4', '2020-10-03 12:42:54', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00015', 'P2010.0001', 'USER-4', 'Edit Hasil Produksi', '2020-10-03', 'tes', 3, 'USER-4', '2020-10-03 12:43:12', 'USER-4', '2020-10-03 16:42:54', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00016', 'P2010.0002', 'USER-4', 'Edit Hasil Produksi', '2020-10-03', 'edit\r\n', 3, 'USER-4', '2020-10-03 16:43:09', 'USER-4', '2020-10-03 22:21:14', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00017', 'P2009.0003', 'USER-4', 'Edit Hasil Produksi', '2020-10-03', 'edd', 3, 'USER-4', '2020-10-03 16:43:45', 'USER-4', '2020-10-03 16:44:17', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00018', 'P2009.0003', 'USER-4', 'Edit Hasil Produksi', '2020-10-03', '..', 3, 'USER-4', '2020-10-03 18:01:25', 'USER-4', '2020-10-03 19:10:13', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00019', 'P2010.0001', 'USER-4', 'Edit Hasil Produksi', '2020-10-03', '....', 3, 'USER-4', '2020-10-03 18:01:31', 'USER-4', '2020-10-03 19:06:05', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00020', 'P2009.0003', 'USER-4', 'Edit Hasil Produksi', '2020-10-03', 'tess', 1, 'USER-4', '2020-10-03 19:10:29', 'USER-2', '2020-10-03 19:10:41', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00021', 'P2010.0003', 'USER-4', 'Edit Hasil Produksi', '2020-10-03', 'editt', 3, 'USER-4', '2020-10-03 22:17:27', 'USER-4', '2020-10-03 22:23:08', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00022', 'P2010.0002', 'USER-4', 'Edit Hasil Produksi', '2020-10-03', 'editt', 3, 'USER-4', '2020-10-03 22:21:33', 'USER-4', '2020-10-03 22:22:17', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00023', 'P2010.0003', 'USER-4', 'Edit Hasil Produksi', '2020-10-03', 'Terjadi kesalahan input jumlah harusnya hanya 49pcs produk A.', 0, 'USER-4', '2020-10-03 22:25:37', 'USER-4', '2020-10-03 22:27:47', '', '0000-00-00 00:00:00', 1),
('PERAKS20.00024', 'P2010.0003', 'USER-4', 'Edit Hasil Produksi', '2020-10-03', 'Salah input', 3, 'USER-4', '2020-10-03 22:28:45', 'USER-4', '2020-10-03 22:30:53', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00025', 'P2009.0003', 'USER-6', 'Edit Hasil Produksi', '2020-10-04', 'editt', 1, 'USER-6', '2020-10-04 12:01:40', 'USER-2', '2020-10-04 12:01:58', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00026', 'P2009.0002', 'USER-4', 'Edit Hasil Produksi', '2020-10-04', 'Salah input jumlah.', 3, 'USER-4', '2020-10-04 12:48:39', 'USER-4', '2020-10-04 12:52:47', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00027', 'P2010.0001', 'USER-4', 'Edit Hasil Produksi', '2020-10-04', 'Lupa menambahkan keterangan.', 1, 'USER-4', '2020-10-04 13:16:50', 'USER-2', '2020-10-04 13:25:49', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00028', 'P2010.0001', 'USER-6', 'Edit Hasil Produksi', '2020-10-04', 'Lupa isi keterangan', 2, 'USER-6', '2020-10-04 13:31:46', 'USER-2', '2020-10-04 13:32:49', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00029', 'P2010.0001', 'USER-6', 'Edit Hasil Produksi', '2020-10-04', 'lupa', 2, 'USER-6', '2020-10-04 13:36:05', 'USER-2', '2020-10-10 12:17:38', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00030', 'P2010.0005', 'USER-4', 'Edit Hasil Produksi', '2020-10-10', 'Salah input', 1, 'USER-4', '2020-10-10 12:16:38', 'USER-2', '2020-10-10 12:17:50', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00031', 'P2010.0006', 'USER-4', 'Edit Hasil Produksi', '2020-10-10', 'Salah input lagi', 3, 'USER-4', '2020-10-10 12:16:48', 'USER-4', '2020-10-10 14:23:27', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00032', 'P2010.0006', 'USER-4', 'Edit Hasil Produksi', '2020-10-10', '.', 3, 'USER-4', '2020-10-10 14:24:02', 'USER-4', '2020-10-10 14:25:43', '', '0000-00-00 00:00:00', 0),
('PERAKS20.00033', 'P2010.0006', 'USER-4', 'Edit Hasil Produksi', '2020-10-10', '..', 3, 'USER-4', '2020-10-10 14:26:37', 'USER-4', '2020-10-10 14:27:23', '', '0000-00-00 00:00:00', 0);

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
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id_PO` varchar(10) NOT NULL,
  `tanggal_PO` date NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `status_PO` int(11) NOT NULL,
  `id_customer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`id_PO`, `tanggal_PO`, `tanggal_penerimaan`, `status_PO`, `id_customer`) VALUES
('PO-1', '2020-09-07', '2020-09-12', 0, 'CUST-1'),
('PO-2', '2020-09-07', '2020-09-19', 0, 'CUST-2'),
('PO-3', '2020-09-07', '2020-09-17', 0, 'CUST-1'),
('PO-4', '2020-09-07', '2020-09-21', 0, 'CUST-1'),
('PO-5', '2020-09-16', '2020-09-28', 0, 'CUST-1'),
('PO-6', '2020-09-22', '2020-10-05', 0, 'CUST-1');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(10) NOT NULL,
  `id_jenis_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
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

INSERT INTO `produk` (`id_produk`, `id_jenis_produk`, `nama_produk`, `harga_produk`, `kode_produk`, `keterangan_produksi`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('PRODUK-1', 'JENPROD-6', 'Floor Chair Midili', 200000, '001', 0, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', 'USER-1', '2020-10-05 23:19:45', 1),
('PRODUK-10', 'JENPROD-5', 'Karpet Polos', 100000, 'K001', 0, 'USER-1', '2020-10-05 23:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PRODUK-11', 'JENPROD-7', 'Bantal Dackron Ligna', 100000, 'B001', 0, 'USER-1', '2020-10-05 23:56:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PRODUK-12', 'JENPROD-2', 'Momiji Matress', 100000, 'MATTRESS2', 1, 'USER-1', '2020-10-06 00:00:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PRODUK-2', 'JENPROD-2', 'Mattress Reguller', 200000, '002', 1, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', 'USER-1', '2020-10-05 23:19:48', 1),
('PRODUK-3', 'JENPROD-2', 'RUMA EOV- H YL ', 500000, '003', 0, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', 'USER-1', '2020-10-05 23:19:50', 1),
('PRODUK-4', 'JENPROD-5', 'Karpet Polos', 100000, '004', 0, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', 'USER-1', '2020-10-05 23:19:52', 1),
('PRODUK-5', 'JENPROD-2', 'Mattress Compact', 200000, '005', 0, 'USER-1', '2020-10-04 23:21:22', '', '0000-00-00 00:00:00', 'USER-1', '2020-10-04 23:21:36', 1),
('PRODUK-6', 'JENPROD-2', 'Mattress Compact', 200000, '005', 0, 'USER-1', '2020-10-04 23:22:50', '', '0000-00-00 00:00:00', 'USER-1', '2020-10-05 23:19:54', 1),
('PRODUK-7', 'JENPROD-2', 'Mattress Compact', 100000, 'MATTRESS1', 0, 'USER-1', '2020-10-05 23:22:33', '', '0000-00-00 00:00:00', 'USER-1', '2020-10-05 23:23:51', 1),
('PRODUK-8', 'JENPROD-2', 'Mattress Compact', 300000, 'MATTRESS1', 0, 'USER-1', '2020-10-05 23:28:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PRODUK-9', 'JENPROD-6', 'Floor Chair Midili', 300000, 'FC001', 0, 'USER-1', '2020-10-05 23:48:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `tanggal`, `status_perencanaan`, `status_laporan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('P2010.0001', '2020-10-05', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2010.0002', '2020-10-06', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2010.0003', '2020-10-07', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2010.0004', '2020-10-08', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2010.0005', '2020-10-09', 1, 1, 'USER-7', '2020-10-09 19:47:25', 'USER-4', '2020-10-10 12:12:34', '', '0000-00-00 00:00:00', 0),
('P2010.0006', '2020-10-10', 1, 1, 'USER-7', '2020-10-09 19:47:25', 'USER-4', '2020-10-10 14:27:23', '', '0000-00-00 00:00:00', 0),
('P2010.0007', '2020-10-11', 1, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2010.0008', '2020-10-26', 1, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2010.0009', '2020-10-27', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2010.0010', '2020-10-28', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2010.0011', '2020-10-29', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2010.0012', '2020-10-30', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2010.0013', '2020-10-31', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2011.0001', '2020-11-01', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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

--
-- Dumping data for table `produksi_line`
--

INSERT INTO `produksi_line` (`id_produksi_line`, `id_line`, `id_produksi`, `total_processing_time`, `total_waktu_perencanaan`, `total_waktu_aktual`, `efisiensi_perencanaan`, `efisiensi_aktual`, `keterangan_laporan`, `status_perencanaan`, `status_laporan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('PL2010.000001', 'LINE-1', 'P2010.0001', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000002', 'LINE-2', 'P2010.0001', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000003', 'LINE-3', 'P2010.0001', 90, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000004', 'LINE-4', 'P2010.0001', 27, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000005', 'LINE-1', 'P2010.0002', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000006', 'LINE-2', 'P2010.0002', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000007', 'LINE-3', 'P2010.0002', 90, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000008', 'LINE-4', 'P2010.0002', 27, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000009', 'LINE-1', 'P2010.0003', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000010', 'LINE-2', 'P2010.0003', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000011', 'LINE-3', 'P2010.0003', 90, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000012', 'LINE-4', 'P2010.0003', 27, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000013', 'LINE-1', 'P2010.0004', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000014', 'LINE-2', 'P2010.0004', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000015', 'LINE-3', 'P2010.0004', 90, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000016', 'LINE-4', 'P2010.0004', 27, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000017', 'LINE-1', 'P2010.0005', 9, 6000, 3500, '18.52', '10.80', '                                ', 1, 1, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000018', 'LINE-2', 'P2010.0005', 9, 6000, 3000, '18.52', '9.26', '                                ', 1, 1, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000019', 'LINE-3', 'P2010.0005', 90, 6000, 0, '1.85', '0.00', '', 1, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000020', 'LINE-4', 'P2010.0005', 27, 6000, 0, '6.17', '0.00', '', 1, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000021', 'LINE-1', 'P2010.0006', 9, 6000, 2200, '18.52', '6.79', '                                ', 1, 1, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000022', 'LINE-2', 'P2010.0006', 9, 6000, 0, '18.52', '0.00', '', 1, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000023', 'LINE-3', 'P2010.0006', 90, 6000, 0, '1.85', '0.00', '', 1, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000024', 'LINE-4', 'P2010.0006', 27, 6000, 0, '6.17', '0.00', '', 1, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000025', 'LINE-1', 'P2010.0007', 9, 6000, 0, '18.52', '0.00', '', 1, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000026', 'LINE-2', 'P2010.0007', 9, 6000, 0, '18.52', '0.00', '', 1, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000027', 'LINE-3', 'P2010.0007', 90, 6000, 0, '1.85', '0.00', '', 1, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000028', 'LINE-4', 'P2010.0007', 27, 6000, 0, '6.17', '0.00', '', 1, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000029', 'LINE-1', 'P2010.0008', 9, 1000, 0, '3.09', '0.00', '', 1, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000030', 'LINE-2', 'P2010.0008', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000031', 'LINE-3', 'P2010.0008', 90, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000032', 'LINE-4', 'P2010.0008', 27, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000033', 'LINE-1', 'P2010.0009', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000034', 'LINE-2', 'P2010.0009', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000035', 'LINE-3', 'P2010.0009', 90, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000036', 'LINE-4', 'P2010.0009', 27, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000037', 'LINE-1', 'P2010.0010', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000038', 'LINE-2', 'P2010.0010', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000039', 'LINE-3', 'P2010.0010', 90, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000040', 'LINE-4', 'P2010.0010', 27, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000041', 'LINE-1', 'P2010.0011', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000042', 'LINE-2', 'P2010.0011', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000043', 'LINE-3', 'P2010.0011', 90, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000044', 'LINE-4', 'P2010.0011', 27, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000045', 'LINE-1', 'P2010.0012', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000046', 'LINE-2', 'P2010.0012', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000047', 'LINE-3', 'P2010.0012', 90, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000048', 'LINE-4', 'P2010.0012', 27, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000049', 'LINE-1', 'P2010.0013', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000050', 'LINE-2', 'P2010.0013', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000051', 'LINE-3', 'P2010.0013', 90, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2010.000052', 'LINE-4', 'P2010.0013', 27, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2011.000001', 'LINE-1', 'P2011.0001', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2011.000002', 'LINE-2', 'P2011.0001', 9, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2011.000003', 'LINE-3', 'P2011.0001', 90, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2011.000004', 'LINE-4', 'P2011.0001', 27, 0, 0, '0.00', '0.00', '', 0, 0, 'USER-7', '2020-10-10 18:37:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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

--
-- Dumping data for table `produksi_logs`
--

INSERT INTO `produksi_logs` (`id_produksi_logs`, `keterangan_log`, `id_produksi`, `tanggal`, `status_laporan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(489, 'Insert Data', 'P2009.0001', '2020-09-28', 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(490, 'Insert Data', 'P2009.0002', '2020-09-29', 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(491, 'Insert Data', 'P2009.0003', '2020-09-30', 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(492, 'Insert Data', 'P2010.0001', '2020-10-01', 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(493, 'Insert Data', 'P2010.0002', '2020-10-02', 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(494, 'Insert Data', 'P2010.0003', '2020-10-03', 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(495, 'Insert Data', 'P2010.0004', '2020-10-04', 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(496, 'Insert Data', 'P2010.0005', '2020-10-05', 0, 'USER-7', '2020-10-01 16:50:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(497, 'Insert Data', 'P2010.0006', '2020-10-06', 0, 'USER-7', '2020-10-01 16:50:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(498, 'Insert Data', 'P2010.0007', '2020-10-07', 0, 'USER-7', '2020-10-01 16:50:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(499, 'Insert Data', 'P2010.0008', '2020-10-08', 0, 'USER-7', '2020-10-01 16:50:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(500, 'Insert Data', 'P2010.0009', '2020-10-09', 0, 'USER-7', '2020-10-01 16:50:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(501, 'Insert Data', 'P2010.0010', '2020-10-10', 0, 'USER-7', '2020-10-01 16:50:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(502, 'Insert Data', 'P2010.0011', '2020-10-11', 0, 'USER-7', '2020-10-01 16:50:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(503, 'Edit Data', 'P2009.0001', '2020-09-28', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-01 17:04:22', '', '0000-00-00 00:00:00', 0),
(504, 'Edit Data', 'P2009.0002', '2020-09-29', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-6', '2020-10-01 20:11:12', '', '0000-00-00 00:00:00', 0),
(505, 'Edit Data', 'P2009.0001', '2020-09-28', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-01 20:32:10', '', '0000-00-00 00:00:00', 0),
(506, 'Edit Data', 'P2009.0001', '2020-09-28', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-01 20:33:28', '', '0000-00-00 00:00:00', 0),
(507, 'Edit Data', 'P2009.0001', '2020-09-28', 2, 'USER-7', '2020-09-28 20:53:15', 'USER-6', '2020-10-01 20:34:33', '', '0000-00-00 00:00:00', 0),
(508, 'Edit Data', 'P2009.0002', '2020-09-29', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-01 21:52:05', '', '0000-00-00 00:00:00', 0),
(509, 'Edit Data', 'P2009.0003', '2020-09-30', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-01 22:12:27', '', '0000-00-00 00:00:00', 0),
(510, 'Edit Data', 'P2009.0003', '2020-09-30', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-01 22:14:31', '', '0000-00-00 00:00:00', 0),
(511, 'Edit Data', 'P2009.0003', '2020-09-30', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-01 22:37:31', '', '0000-00-00 00:00:00', 0),
(512, 'Edit Data', 'P2009.0003', '2020-09-30', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-01 22:37:46', '', '0000-00-00 00:00:00', 0),
(513, 'Edit Data', 'P2009.0003', '2020-09-30', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-01 22:39:22', '', '0000-00-00 00:00:00', 0),
(514, 'Edit Data', 'P2010.0001', '2020-10-01', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-02 00:35:26', '', '0000-00-00 00:00:00', 0),
(515, 'Edit Data', 'P2010.0002', '2020-10-02', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-02 14:30:05', '', '0000-00-00 00:00:00', 0),
(516, 'Edit Data', 'P2009.0002', '2020-09-29', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-02 16:42:45', '', '0000-00-00 00:00:00', 0),
(517, 'Edit Data', 'P2009.0002', '2020-09-29', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-02 16:43:21', '', '0000-00-00 00:00:00', 0),
(518, 'Edit Data', 'P2009.0002', '2020-09-29', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-02 16:43:48', '', '0000-00-00 00:00:00', 0),
(519, 'Edit Data', 'P2009.0002', '2020-09-29', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-02 16:43:59', '', '0000-00-00 00:00:00', 0),
(520, 'Edit Data', 'P2009.0002', '2020-09-29', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-02 16:45:00', '', '0000-00-00 00:00:00', 0),
(521, 'Edit Data', 'P2009.0002', '2020-09-29', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-02 16:45:16', '', '0000-00-00 00:00:00', 0),
(522, 'Edit Data', 'P2010.0002', '2020-10-02', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-02 17:13:10', '', '0000-00-00 00:00:00', 0),
(523, 'Edit Data', 'P2009.0001', '2020-09-28', 2, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-02 22:25:43', '', '0000-00-00 00:00:00', 0),
(524, 'Edit Data', 'P2009.0001', '2020-09-28', 3, 'USER-7', '2020-09-28 20:53:15', 'USER-7', '2020-10-02 23:10:27', '', '0000-00-00 00:00:00', 0),
(525, 'Edit Data', 'P2009.0002', '2020-09-29', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-02 23:14:06', '', '0000-00-00 00:00:00', 0),
(526, 'Edit Data', 'P2009.0002', '2020-09-29', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-02 23:26:49', '', '0000-00-00 00:00:00', 0),
(527, 'Edit Data', 'P2009.0002', '2020-09-29', 2, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-02 23:27:36', '', '0000-00-00 00:00:00', 0),
(528, 'Edit Data', 'P2010.0001', '2020-10-01', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-03 01:03:03', '', '0000-00-00 00:00:00', 0),
(529, 'Edit Data', 'P2010.0001', '2020-10-01', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-03 12:36:04', '', '0000-00-00 00:00:00', 0),
(530, 'Edit Data', 'P2009.0003', '2020-09-30', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-03 12:37:35', '', '0000-00-00 00:00:00', 0),
(531, 'Edit Data', 'P2010.0001', '2020-10-01', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-03 12:42:54', '', '0000-00-00 00:00:00', 0),
(532, 'Edit Data', 'P2010.0001', '2020-10-01', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-03 16:42:54', '', '0000-00-00 00:00:00', 0),
(533, 'Edit Data', 'P2009.0003', '2020-09-30', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-03 16:44:17', '', '0000-00-00 00:00:00', 0),
(534, 'Edit Data', 'P2010.0001', '2020-10-01', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-03 19:06:05', '', '0000-00-00 00:00:00', 0),
(535, 'Edit Data', 'P2009.0003', '2020-09-30', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-03 19:10:13', '', '0000-00-00 00:00:00', 0),
(536, 'Edit Data', 'P2009.0003', '2020-09-30', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-03 19:20:22', '', '0000-00-00 00:00:00', 0),
(537, 'Edit Data', 'P2010.0005', '2020-10-05', 0, 'USER-7', '2020-10-01 16:50:29', 'USER-7', '2020-10-03 19:23:24', '', '0000-00-00 00:00:00', 1),
(538, 'Edit Data', 'P2010.0006', '2020-10-06', 0, 'USER-7', '2020-10-01 16:50:29', 'USER-7', '2020-10-03 19:23:24', '', '0000-00-00 00:00:00', 1),
(539, 'Edit Data', 'P2010.0007', '2020-10-07', 0, 'USER-7', '2020-10-01 16:50:29', 'USER-7', '2020-10-03 19:23:24', '', '0000-00-00 00:00:00', 1),
(540, 'Edit Data', 'P2010.0008', '2020-10-08', 0, 'USER-7', '2020-10-01 16:50:29', 'USER-7', '2020-10-03 19:23:24', '', '0000-00-00 00:00:00', 1),
(541, 'Edit Data', 'P2010.0009', '2020-10-09', 0, 'USER-7', '2020-10-01 16:50:29', 'USER-7', '2020-10-03 19:23:24', '', '0000-00-00 00:00:00', 1),
(542, 'Edit Data', 'P2010.0010', '2020-10-10', 0, 'USER-7', '2020-10-01 16:50:29', 'USER-7', '2020-10-03 19:23:24', '', '0000-00-00 00:00:00', 1),
(543, 'Edit Data', 'P2010.0011', '2020-10-11', 0, 'USER-7', '2020-10-01 16:50:29', 'USER-7', '2020-10-03 19:23:24', '', '0000-00-00 00:00:00', 1),
(544, 'Edit Data', 'P2010.0003', '2020-10-03', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-03 22:12:33', '', '0000-00-00 00:00:00', 0),
(545, 'Edit Data', 'P2010.0002', '2020-10-02', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-03 22:19:41', '', '0000-00-00 00:00:00', 0),
(546, 'Edit Data', 'P2010.0002', '2020-10-02', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-03 22:21:14', '', '0000-00-00 00:00:00', 0),
(547, 'Edit Data', 'P2010.0002', '2020-10-02', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-03 22:22:17', '', '0000-00-00 00:00:00', 0),
(548, 'Edit Data', 'P2010.0003', '2020-10-03', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-03 22:23:08', '', '0000-00-00 00:00:00', 0),
(549, 'Edit Data', 'P2010.0003', '2020-10-03', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-03 22:30:53', '', '0000-00-00 00:00:00', 0),
(550, 'Edit Data', 'P2009.0002', '2020-09-29', 2, 'USER-7', '2020-09-28 20:53:15', 'USER-4', '2020-10-04 12:52:47', '', '0000-00-00 00:00:00', 0),
(551, 'Edit Data', 'P2009.0003', '2020-09-30', 2, 'USER-7', '2020-09-28 20:53:15', 'USER-6', '2020-10-04 13:26:49', '', '0000-00-00 00:00:00', 0),
(552, 'Edit Data', 'P2010.0001', '2020-10-01', 1, 'USER-7', '2020-09-28 20:53:15', 'USER-6', '2020-10-04 13:30:47', '', '0000-00-00 00:00:00', 0);

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

--
-- Dumping data for table `produksi_tertunda`
--

INSERT INTO `produksi_tertunda` (`id_produksi_tertunda`, `id_detail_produksi_line`, `jumlah_tertunda`, `jumlah_terencana`, `status_penjadwalan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('PRODTUN2010.00000002', 'DPL2010.00000005', 10, 0, 0, 'USER-4', '2020-10-10 01:29:54', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PRODTUN2010.00000003', 'DPL2010.00000061', 15, 0, 0, 'USER-4', '2020-10-10 01:29:54', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PRODTUN2010.00000004', 'DPL2010.00000040', 10, 0, 0, 'USER-4', '2020-10-10 12:12:34', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PRODTUN2010.00000005', 'DPL2010.00000068', 20, 0, 0, 'USER-4', '2020-10-10 12:12:34', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PRODTUN2010.00000006', 'DPL2010.00000034', 20, 0, 0, 'USER-4', '2020-10-10 12:16:08', '', '0000-00-00 00:00:00', 'USER-4', '2020-10-10 14:23:27', 1),
('PRODTUN2010.00000007', 'DPL2010.00000062', 0, 0, 0, 'USER-4', '2020-10-10 12:16:08', 'USER-4', '2020-10-10 14:27:23', '', '0000-00-00 00:00:00', 0),
('PRODTUN2010.00000008', 'DPL2010.00000006', 5, 0, 0, 'USER-4', '2020-10-10 14:25:43', 'USER-4', '2020-10-10 14:27:23', '', '0000-00-00 00:00:00', 0),
('PRODTUN2010.00000009', 'DPL2010.00000034', 17, 0, 0, 'USER-4', '2020-10-10 14:25:43', 'USER-4', '2020-10-10 14:27:23', '', '0000-00-00 00:00:00', 0);

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
  `kode_produk` varchar(50) NOT NULL,
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

INSERT INTO `produk_logs` (`id_produk_logs`, `keterangan_log`, `id_produk`, `id_jenis_produk`, `nama_produk`, `harga_produk`, `kode_produk`, `keterangan_produksi`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(3, 'Insert Data', 'PRODUK-1', 'JENPROD-6', 'Floor Chair Midili', 200000, '001', 0, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(4, 'Insert Data', 'PRODUK-2', 'JENPROD-2', 'Mattress Reguller', 200000, '002', 1, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(5, 'Insert Data', 'PRODUK-3', 'JENPROD-2', 'RUMA EOV- H YL ', 500000, '003', 0, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(6, 'Insert Data', 'PRODUK-4', 'JENPROD-5', 'Karpet Polos', 100000, '004', 0, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_customer`
--

CREATE TABLE `purchase_order_customer` (
  `id_purchase_order_customer` varchar(10) NOT NULL,
  `kode_purchase_order_customer` varchar(30) NOT NULL,
  `kode_so` varchar(30) NOT NULL,
  `id_customer` varchar(10) NOT NULL,
  `tanggal_po` date NOT NULL,
  `harga_sebelum_pajak` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `total_harga_akhir` int(11) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status_po` int(11) NOT NULL,
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

INSERT INTO `purchase_order_customer` (`id_purchase_order_customer`, `kode_purchase_order_customer`, `kode_so`, `id_customer`, `tanggal_po`, `harga_sebelum_pajak`, `ppn`, `total_harga_akhir`, `keterangan`, `status_po`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('POC-1', 'aaa/014/p', 'soc/003/30/9/20', 'CUST-1', '2020-10-16', 700000, 70000, 770000, '', 3, 'USER-1', '2020-10-06 22:04:15', 'USER-1', '0000-00-00 00:00:00', 'USER-1', '2020-10-06 22:05:31', 1),
('POC-2', 'INC/20/5/001', 'MBP/SO/20/10/002', 'CUST-1', '2020-10-08', 900000, 90000, 990000, '', 0, 'USER-1', '2020-10-09 14:40:29', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('POC-3', 'L2001231', 'SO001', 'CUST-1', '2020-10-09', 50000000, 5000000, 55000000, '', 2, 'USER-7', '2020-10-09 19:38:23', 'USER-7', '2020-10-10 18:37:21', '0', '0000-00-00 00:00:00', 0);

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

INSERT INTO `purchase_order_supplier` (`id_purchase_order_supplier`, `kode_purchase_order_supplier`, `id_supplier`, `tanggal_po`, `harga_sebelum_pajak`, `ppn`, `total_harga_akhir`, `status_po`, `keterangan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('POS-1', '', 'SUP-1', '2020-05-10', 184000, 18400, 202400, 0, '', 'USER-1', '2020-10-09 14:30:32', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

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
('REK-1', 'BANK-2', '010101', 'PT. Maju Bersama Persada Dayamu', 'Alam Sutera', 'USER-1', '2020-08-30 22:12:25', 'USER-1', '2020-08-30 22:17:53', '', '0000-00-00 00:00:00', 0),
('REK-2', 'BANK-2', '020202', 'PT. Maju Bersama Persada Dayamu', 'Alam Sutera', 'USER-1', '2020-09-08 23:37:34', 'USER-1', '2020-09-08 23:39:26', '', '0000-00-00 00:00:00', 1),
('REK-3', 'BANK-3', '0010001', 'PT. Maju Bersama Persada Dayamu', 'Alam Sutera', 'USER-1', '2020-09-24 23:01:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
(9, 'Insert Data', 'REK-3', 'BANK-3', '0010001', 'PT. Maju Bersama Persada Dayamu', 'Alam Sutera', 'USER-1', '2020-09-24 23:01:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `id_sales_order` varchar(10) NOT NULL,
  `kode_sales_order` varchar(10) NOT NULL,
  `tanggal_so` date NOT NULL,
  `tanggal_pengantaran` date NOT NULL,
  `dibuat_oleh` varchar(10) NOT NULL,
  `diterima_oleh` varchar(10) NOT NULL,
  `id_purchase_order_customer` varchar(10) NOT NULL,
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
('SJBT-1', 'JBT-1', 'DEPT-1', 'USER-1', '2020-08-29 00:00:00', 'USER-1', '2020-09-09 01:23:49', '', '0000-00-00 00:00:00', 0),
('SJBT-10', 'JBT-6', 'DEPT-3', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-11', 'JBT-11', 'DEPT-3', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-12', 'JBT-12', 'DEPT-3', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-13', 'JBT-13', 'DEPT-3', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-14', 'JBT-7', 'DEPT-3', 'USER-1', '2020-09-08 00:13:23', '', '0000-00-00 00:00:00', 'USER-1', '2020-09-08 00:36:09', 1),
('SJBT-15', 'JBT-8', 'DEPT-3', 'USER-1', '2020-09-08 00:14:20', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-16', 'JBT-9', 'DEPT-3', 'USER-1', '2020-09-08 00:14:27', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-17', 'JBT-10', 'DEPT-3', 'USER-1', '2020-09-08 00:14:34', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-18', 'JBT-7', 'DEPT-3', 'USER-1', '2020-09-08 00:36:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-19', 'JBT-16', 'DEPT-8', 'USER-1', '2020-09-09 01:25:01', '', '0000-00-00 00:00:00', 'USER-1', '2020-09-09 01:25:04', 1),
('SJBT-2', 'JBT-2', 'DEPT-1', 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-20', 'JBT-16', 'DEPT-8', 'USER-1', '2020-09-09 01:34:23', '', '0000-00-00 00:00:00', 'USER-1', '2020-09-24 22:49:22', 1),
('SJBT-21', 'JBT-4', 'DEPT-1', 'USER-1', '2020-09-24 22:50:52', 'USER-1', '2020-09-24 22:51:02', 'USER-1', '2020-09-24 22:51:10', 1),
('SJBT-3', 'JBT-3', 'DEPT-3', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-4', 'JBT-3', 'DEPT-4', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-5', 'JBT-3', 'DEPT-5', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-6', 'JBT-3', 'DEPT-6', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-7', 'JBT-4', 'DEPT-2', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-8', 'JBT-4', 'DEPT-3', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-9', 'JBT-5', 'DEPT-2', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
  `satuan_ukuran` varchar(30) NOT NULL,
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

INSERT INTO `sub_jenis_material` (`id_sub_jenis_material`, `kode_sub_jenis_material`, `nama_sub_jenis_material`, `id_jenis_material`, `satuan_ukuran`, `min_stok`, `max_stok`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('SUBJM-1', 'F001', 'REB55', 'JM-1', 'm3', 10, 20, 'USER-1', '2020-10-05 23:02:35', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-10', 'BAJCBC001', 'JCBC M 6x20 MM 20Cm', 'JM-7', 'Pcs ', 10, 50, 'USER-1', '2020-10-09 01:52:06', 'USER-1', '2020-10-09 01:53:30', '0', '0000-00-00 00:00:00', 0),
('SUBJM-11', 'BAJCBC002', 'JCBC M 6x50 MM 50Cm', 'JM-7', 'Pcs', 15, 60, 'USER-1', '2020-10-09 01:55:27', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-2', 'F002', 'REB70', 'JM-1', 'm3', 10, 20, 'USER-1', '2020-10-05 23:03:04', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-3', 'L001', 'Lem Spray', 'JM-2', 'blek', 5, 10, 'USER-1', '2020-10-05 23:04:24', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-4', 'R001', 'Rets Hitam', 'JM-3', 'pcs', 10, 20, 'USER-1', '2020-10-05 23:05:24', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-5', 'R002', 'Rets Putih', 'JM-3', 'pcs', 10, 20, 'USER-1', '2020-10-05 23:05:44', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-6', 'P001', 'Plastic Medium', 'JM-4', 'pcs ', 0, 0, 'USER-1', '2020-10-05 23:06:17', 'USER-1', '2020-10-05 23:06:40', '0', '0000-00-00 00:00:00', 0),
('SUBJM-7', 'P002', 'Plastic Large', 'JM-4', 'pcs', 10, 20, 'USER-1', '2020-10-05 23:06:32', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-8', 'K001', 'Karton Tebal 1mm', 'JM-5', 'pcs', 10, 20, 'USER-1', '2020-10-05 23:07:39', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0),
('SUBJM-9', 'K002', 'Karton Tebal 2mm', 'JM-5', 'pcs', 10, 20, 'USER-1', '2020-10-05 23:07:57', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 0);

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

--
-- Dumping data for table `surat_jalan`
--

INSERT INTO `surat_jalan` (`id_surat_jalan`, `id_purchase_order_customer`, `id_invoice`, `tanggal`, `kendaraan`, `nama_pengirim`, `keterangan_pengiriman`, `keterangan`, `status_surat_jalan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('M2009.0001', 'PO-6', '', '2020-09-29', 'B2001', 'Laurencia', 'Gosend', '1111                                    ', 0, 'USER-3', '2020-09-29 23:18:37', 'USER-3', '2020-09-29 23:26:19', 'USER-3', '2020-09-29 23:30:26', 1),
('M2009.0002', 'PO-6', '', '2020-09-29', 'B2001', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:21:08', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:26:06', 1),
('M2009.0003', 'PO-6', '', '2020-09-29', '1', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:26:50', 'USER-3', '2020-09-29 23:30:52', 'USER-3', '2020-09-29 23:31:19', 1),
('M2009.0004', 'PO-6', '', '2020-09-29', 'B2001', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:31:49', 'USER-3', '2020-09-29 23:33:26', 'USER-3', '2020-09-29 23:40:45', 1),
('M2009.0005', 'PO-6', '', '2020-09-29', '1', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:43:52', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:44:24', 1),
('M2009.0006', 'PO-6', '', '2020-09-29', '1', 'pppp', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:46:20', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:49:35', 1),
('M2009.0007', 'PO-6', '', '2020-09-29', '1', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:50:11', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:50:20', 1),
('M2009.0008', 'PO-6', '', '2020-09-29', 'B2001', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:50:50', 'USER-3', '2020-09-29 23:53:43', '', '0000-00-00 00:00:00', 0),
('M2009.0009', 'PO-4', 'MI2009.001', '2020-09-29', 'B20001', 'Laurencia', 'Gosend', '                                    ', 1, 'USER-3', '2020-09-29 23:51:22', 'USER-3', '2020-09-29 23:51:59', '', '0000-00-00 00:00:00', 0),
('M2009.0010', 'PO-5', 'MI2009.002', '2020-09-29', 'B2001', 'Laurencia', 'Jasa Kirim Gosend', '                                    ', 1, 'USER-3', '2020-09-29 23:52:22', 'USER-3', '2020-09-29 23:52:44', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `surat_jalan`
--
DELIMITER $$
CREATE TRIGGER `edit_surat_jalan` AFTER UPDATE ON `surat_jalan` FOR EACH ROW INSERT INTO surat_jalan_logs (`id_surat_jalan_logs`,`keterangan_log`,`id_surat_jalan`,`id_purchase_order_customer`,`id_invoice`,`tanggal`,`kendaraan`,`nama_pengirim`,`keterangan_pengiriman`,`keterangan`,`status_surat_jalan`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES(null,'Edit Data',NEW.id_surat_jalan,NEW.id_purchase_order_customer,NEW.id_invoice,NEW.tanggal,NEW.kendaraan,NEW.nama_pengirim,NEW.keterangan_pengiriman,NEW.keterangan,NEW.status_surat_jalan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_surat_jalan` AFTER INSERT ON `surat_jalan` FOR EACH ROW INSERT INTO surat_jalan_logs (`id_surat_jalan_logs`,`keterangan_log`,`id_surat_jalan`,`id_purchase_order_customer`,`id_invoice`,`tanggal`,`kendaraan`,`nama_pengirim`,`keterangan_pengiriman`,`keterangan`,`status_surat_jalan`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES(null,'Insert Data',NEW.id_surat_jalan,NEW.id_purchase_order_customer,NEW.id_invoice,NEW.tanggal,NEW.kendaraan,NEW.nama_pengirim,NEW.keterangan_pengiriman,NEW.keterangan,NEW.status_surat_jalan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `surat_jalan_logs`
--

CREATE TABLE `surat_jalan_logs` (
  `id_surat_jalan_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
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

--
-- Dumping data for table `surat_jalan_logs`
--

INSERT INTO `surat_jalan_logs` (`id_surat_jalan_logs`, `keterangan_log`, `id_surat_jalan`, `id_purchase_order_customer`, `id_invoice`, `tanggal`, `kendaraan`, `nama_pengirim`, `keterangan_pengiriman`, `keterangan`, `status_surat_jalan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(102, 'Insert Data', 'M2009.0001', 'PO-6', '', '2020-09-29', 'B2001', 'Laurencia', 'Gosend', '1111                                    ', 0, 'USER-3', '2020-09-29 23:18:37', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(103, 'Edit Data', 'M2009.0001', 'PO-6', '', '2020-09-29', 'B2001', 'Laurencia', 'Gosend', '1111                                    ', 0, 'USER-3', '2020-09-29 23:18:37', 'USER-3', '2020-09-29 23:19:22', '', '0000-00-00 00:00:00', 0),
(104, 'Edit Data', 'M2009.0001', 'PO-6', '', '2020-09-29', 'B2001', 'Laurencia', 'Gosend', '1111                                    ', 0, 'USER-3', '2020-09-29 23:18:37', 'USER-3', '2020-09-29 23:19:38', '', '0000-00-00 00:00:00', 0),
(105, 'Insert Data', 'M2009.0002', 'PO-6', '', '2020-09-29', 'B2001', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:21:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(106, 'Edit Data', 'M2009.0002', 'PO-6', '', '2020-09-29', 'B2001', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:21:08', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:26:06', 1),
(107, 'Edit Data', 'M2009.0001', 'PO-6', '', '2020-09-29', 'B2001', 'Laurencia', 'Gosend', '1111                                    ', 0, 'USER-3', '2020-09-29 23:18:37', 'USER-3', '2020-09-29 23:26:19', '', '0000-00-00 00:00:00', 0),
(108, 'Insert Data', 'M2009.0003', 'PO-6', '', '2020-09-29', '1', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:26:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(109, 'Edit Data', 'M2009.0003', 'PO-6', '', '2020-09-29', '1', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:26:50', 'USER-3', '2020-09-29 23:27:22', '', '0000-00-00 00:00:00', 0),
(110, 'Edit Data', 'M2009.0003', 'PO-6', '', '2020-09-29', '1', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:26:50', 'USER-3', '2020-09-29 23:29:49', '', '0000-00-00 00:00:00', 0),
(111, 'Edit Data', 'M2009.0003', 'PO-6', '', '2020-09-29', '1', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:26:50', 'USER-3', '2020-09-29 23:30:06', '', '0000-00-00 00:00:00', 0),
(112, 'Edit Data', 'M2009.0001', 'PO-6', '', '2020-09-29', 'B2001', 'Laurencia', 'Gosend', '1111                                    ', 0, 'USER-3', '2020-09-29 23:18:37', 'USER-3', '2020-09-29 23:26:19', 'USER-3', '2020-09-29 23:30:26', 1),
(113, 'Edit Data', 'M2009.0003', 'PO-6', '', '2020-09-29', '1', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:26:50', 'USER-3', '2020-09-29 23:30:44', '', '0000-00-00 00:00:00', 0),
(114, 'Edit Data', 'M2009.0003', 'PO-6', '', '2020-09-29', '1', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:26:50', 'USER-3', '2020-09-29 23:30:52', '', '0000-00-00 00:00:00', 0),
(115, 'Edit Data', 'M2009.0003', 'PO-6', '', '2020-09-29', '1', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:26:50', 'USER-3', '2020-09-29 23:30:52', 'USER-3', '2020-09-29 23:31:19', 1),
(116, 'Insert Data', 'M2009.0004', 'PO-6', '', '2020-09-29', 'B2001', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:31:49', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(117, 'Edit Data', 'M2009.0004', 'PO-6', '', '2020-09-29', 'B2001', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:31:49', 'USER-3', '2020-09-29 23:33:26', '', '0000-00-00 00:00:00', 0),
(118, 'Edit Data', 'M2009.0004', 'PO-6', '', '2020-09-29', 'B2001', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:31:49', 'USER-3', '2020-09-29 23:33:26', 'USER-3', '2020-09-29 23:40:45', 1),
(119, 'Insert Data', 'M2009.0005', 'PO-6', '', '2020-09-29', '1', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:43:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(120, 'Edit Data', 'M2009.0005', 'PO-6', '', '2020-09-29', '1', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:43:52', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:44:24', 1),
(121, 'Insert Data', 'M2009.0006', 'PO-6', '', '2020-09-29', '1', 'pppp', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:46:20', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(122, 'Edit Data', 'M2009.0006', 'PO-6', '', '2020-09-29', '1', 'pppp', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:46:20', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:46:28', 1),
(123, 'Edit Data', 'M2009.0006', 'PO-6', '', '2020-09-29', '1', 'pppp', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:46:20', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:49:35', 1),
(124, 'Insert Data', 'M2009.0007', 'PO-6', '', '2020-09-29', '1', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:50:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(125, 'Edit Data', 'M2009.0007', 'PO-6', '', '2020-09-29', '1', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:50:11', '', '0000-00-00 00:00:00', 'USER-3', '2020-09-29 23:50:20', 1),
(126, 'Insert Data', 'M2009.0008', 'PO-6', '', '2020-09-29', 'B2001', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:50:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(127, 'Insert Data', 'M2009.0009', 'PO-4', '', '2020-09-29', 'B20001', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:51:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(128, 'Edit Data', 'M2009.0009', 'PO-4', 'MI2009.001', '2020-09-29', 'B20001', 'Laurencia', 'Gosend', '                                    ', 1, 'USER-3', '2020-09-29 23:51:22', 'USER-3', '2020-09-29 23:51:59', '', '0000-00-00 00:00:00', 0),
(129, 'Insert Data', 'M2009.0010', 'PO-5', '', '2020-09-29', 'B2001', 'Laurencia', 'Jasa Kirim Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:52:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(130, 'Edit Data', 'M2009.0010', 'PO-5', 'MI2009.002', '2020-09-29', 'B2001', 'Laurencia', 'Jasa Kirim Gosend', '                                    ', 1, 'USER-3', '2020-09-29 23:52:22', 'USER-3', '2020-09-29 23:52:44', '', '0000-00-00 00:00:00', 0),
(131, 'Edit Data', 'M2009.0008', 'PO-6', '', '2020-09-29', 'B2001', 'Laurencia', 'Gosend', '                                    ', 0, 'USER-3', '2020-09-29 23:50:50', 'USER-3', '2020-09-29 23:53:43', '', '0000-00-00 00:00:00', 0);

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

--
-- Dumping data for table `surat_perintah_lembur`
--

INSERT INTO `surat_perintah_lembur` (`id_surat_perintah_lembur`, `id_line`, `tanggal`, `waktu_lembur`, `keterangan_perintah`, `keterangan_laporan`, `status_spl`, `keterangan_spl`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('SPL-1', 'LINE-1', '2020-10-10', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-2', 'LINE-2', '2020-10-10', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-3', 'LINE-3', '2020-10-10', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-4', 'LINE-4', '2020-10-10', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-5', 'LINE-1', '2020-10-11', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-6', 'LINE-2', '2020-10-11', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-7', 'LINE-3', '2020-10-11', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-8', 'LINE-4', '2020-10-11', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `surat_perintah_lembur`
--
DELIMITER $$
CREATE TRIGGER `edit_spl` AFTER UPDATE ON `surat_perintah_lembur` FOR EACH ROW INSERT INTO `surat_perintah_lembur_logs` (`id_surat_perintah_lembur_logs`,`keterangan_log`,`id_surat_perintah_lembur`,`id_line`,`tanggal`,`waktu_lembur`,`keterangan_perintah`,`keterangan_laporan`,`status_spl`,`keterangan_spl`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES(null,'Edit Data',NEW.id_surat_perintah_lembur,NEW.id_line,NEW.tanggal,NEW.waktu_lembur,NEW.keterangan_perintah,NEW.keterangan_laporan,NEW.status_spl,NEW.keterangan_spl,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_spl` AFTER INSERT ON `surat_perintah_lembur` FOR EACH ROW INSERT INTO `surat_perintah_lembur_logs` (`id_surat_perintah_lembur_logs`,`keterangan_log`,`id_surat_perintah_lembur`,`id_line`,`tanggal`,`waktu_lembur`,`keterangan_perintah`,`keterangan_laporan`,`status_spl`,`keterangan_spl`,`user_add`,`waktu_add`,`user_edit`,`waktu_edit`,`user_delete`,`waktu_delete`,`status_delete`) VALUES(null,'Insert Data',NEW.id_surat_perintah_lembur,NEW.id_line,NEW.tanggal,NEW.waktu_lembur,NEW.keterangan_perintah,NEW.keterangan_laporan,NEW.status_spl,NEW.keterangan_spl,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `surat_perintah_lembur_logs`
--

CREATE TABLE `surat_perintah_lembur_logs` (
  `id_surat_perintah_lembur_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
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

--
-- Dumping data for table `surat_perintah_lembur_logs`
--

INSERT INTO `surat_perintah_lembur_logs` (`id_surat_perintah_lembur_logs`, `keterangan_log`, `id_surat_perintah_lembur`, `id_line`, `tanggal`, `waktu_lembur`, `keterangan_perintah`, `keterangan_laporan`, `status_spl`, `keterangan_spl`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(263, 'Insert Data', 'SPL-1', 'LINE-1', '2020-09-29', 'Hari Produksi', '', '', 0, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(264, 'Insert Data', 'SPL-2', 'LINE-2', '2020-09-29', 'Hari Produksi', '', '', 0, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(265, 'Insert Data', 'SPL-3', 'LINE-1', '2020-10-03', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(266, 'Insert Data', 'SPL-4', 'LINE-2', '2020-10-03', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(267, 'Insert Data', 'SPL-5', 'LINE-3', '2020-10-03', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(268, 'Insert Data', 'SPL-6', 'LINE-4', '2020-10-03', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(269, 'Edit Data', 'SPL-1', 'LINE-1', '2020-09-29', 'Hari Produksi', '', '', 1, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(270, 'Edit Data', 'SPL-1', 'LINE-1', '2020-09-29', 'Hari Produksi', '', '', 2, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(271, 'Edit Data', 'SPL-1', 'LINE-1', '2020-09-29', 'Hari Produksi', '', '', 3, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(272, 'Edit Data', 'SPL-2', 'LINE-2', '2020-09-29', 'Hari Produksi', '', '', 1, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(273, 'Edit Data', 'SPL-2', 'LINE-2', '2020-09-29', 'Hari Produksi', '', '', 2, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(274, 'Edit Data', 'SPL-2', 'LINE-2', '2020-09-29', 'Hari Produksi', '', '', 3, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(275, 'Edit Data', 'SPL-3', 'LINE-1', '2020-10-03', 'Hari Libur', '', '', 1, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(276, 'Edit Data', 'SPL-3', 'LINE-1', '2020-10-03', 'Hari Libur', '', '', 2, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(277, 'Edit Data', 'SPL-4', 'LINE-2', '2020-10-03', 'Hari Libur', '', '', 1, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(278, 'Edit Data', 'SPL-3', 'LINE-1', '2020-10-03', 'Hari Libur', '', '', 3, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(279, 'Edit Data', 'SPL-4', 'LINE-2', '2020-10-03', 'Hari Libur', '', '', 2, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(280, 'Edit Data', 'SPL-4', 'LINE-2', '2020-10-03', 'Hari Libur', '', '', 3, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(281, 'Edit Data', 'SPL-1', 'LINE-1', '2020-09-29', 'Hari Produksi', '', 'Dibutuhkan tambahan 1 jam dikarenakan ada task yang tertunda', 4, 0, 'USER-7', '2020-09-28 20:53:15', 'USER-9', '2020-09-29 07:22:27', '', '0000-00-00 00:00:00', 0),
(282, 'Edit Data', 'SPL-1', 'LINE-1', '2020-09-29', 'Hari Produksi', '', 'Dibutuhkan tambahan 1 jam dikarenakan ada task yang tertunda', 4, 0, 'USER-7', '2020-09-28 20:53:15', 'USER-9', '2020-09-29 07:29:12', '', '0000-00-00 00:00:00', 0),
(283, 'Edit Data', 'SPL-2', 'LINE-2', '2020-09-29', 'Hari Produksi', '', 'Berjalan lancar', 4, 0, 'USER-7', '2020-09-28 20:53:15', 'USER-9', '2020-09-29 07:30:23', '', '0000-00-00 00:00:00', 0),
(284, 'Edit Data', 'SPL-1', 'LINE-1', '2020-09-29', 'Hari Produksi', '', 'Dibutuhkan tambahan 1 jam dikarenakan ada task yang tertunda', 5, 0, 'USER-7', '2020-09-28 20:53:15', 'USER-7', '2020-09-29 07:31:08', '', '0000-00-00 00:00:00', 0),
(285, 'Insert Data', 'SPL-7', 'LINE-3', '2020-09-29', 'Hari Produksi', 'Coba batal', '', 0, 1, 'USER-7', '2020-09-29 08:01:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(286, 'Edit Data', 'SPL-7', 'LINE-3', '2020-09-29', 'Hari Produksi', 'Coba batal', '', 6, 1, 'USER-7', '2020-09-29 08:01:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(287, 'Edit Data', 'SPL-5', 'LINE-3', '2020-10-03', 'Hari Libur', '', '', 1, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(288, 'Insert Data', 'SPL-8', 'LINE-1', '2020-10-10', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-01 16:50:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(289, 'Insert Data', 'SPL-9', 'LINE-2', '2020-10-10', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-01 16:50:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(290, 'Insert Data', 'SPL-10', 'LINE-4', '2020-10-10', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-01 16:50:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(291, 'Edit Data', 'SPL-6', 'LINE-4', '2020-10-03', 'Hari Libur', '', '', 6, 0, 'USER-7', '2020-09-28 20:53:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(292, 'Insert Data', 'SPL-11', 'LINE-3', '2020-10-10', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:40:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(293, 'Insert Data', 'SPL-12', 'LINE-1', '2020-10-11', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:40:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(294, 'Insert Data', 'SPL-13', 'LINE-2', '2020-10-11', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:40:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(295, 'Insert Data', 'SPL-14', 'LINE-3', '2020-10-11', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:40:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(296, 'Insert Data', 'SPL-15', 'LINE-4', '2020-10-11', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:40:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(297, 'Insert Data', 'SPL-1', 'LINE-1', '2020-10-10', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(298, 'Insert Data', 'SPL-2', 'LINE-2', '2020-10-10', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(299, 'Insert Data', 'SPL-3', 'LINE-3', '2020-10-10', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(300, 'Insert Data', 'SPL-4', 'LINE-4', '2020-10-10', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(301, 'Insert Data', 'SPL-5', 'LINE-1', '2020-10-11', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(302, 'Insert Data', 'SPL-6', 'LINE-2', '2020-10-11', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(303, 'Insert Data', 'SPL-7', 'LINE-3', '2020-10-11', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(304, 'Insert Data', 'SPL-8', 'LINE-4', '2020-10-11', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-10-09 19:47:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
('UKPROD-1', 'JENPROD-2', '200x180x20', 'cm3', 'USER-1', '2020-09-03 02:19:25', 'USER-1', '2020-09-03 10:30:44', '', '0000-00-00 00:00:00', 0),
('UKPROD-2', 'JENPROD-2', '200x160x20', 'cm3', 'USER-1', '2020-09-03 09:38:33', 'USER-1', '2020-09-03 10:14:19', '', '0000-00-00 00:00:00', 0),
('UKPROD-3', 'JENPROD-5', '150x100x2', 'cm3', 'USER-1', '2020-09-03 09:40:54', 'USER-1', '2020-09-03 10:13:45', 'USER-1', '2020-09-03 10:19:17', 1),
('UKPROD-4', 'JENPROD-5', '150x100x2', 'cm3', 'USER-1', '2020-09-03 10:19:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('UKPROD-5', 'JENPROD-2', '200x150x20', 'cm3', 'USER-1', '2020-09-03 10:37:00', 'USER-1', '2020-09-03 10:39:16', '', '0000-00-00 00:00:00', 0),
('UKPROD-6', 'JENPROD-2', '200x120x20', 'cm2', 'USER-1', '2020-09-03 22:17:42', 'USER-1', '2020-09-03 22:18:36', '', '0000-00-00 00:00:00', 0);

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
(1, 'Insert Data', 'UKPROD-1', 'JENPROD-2', '180x200', 'm3', 'USER-1', '2020-09-03 02:19:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(2, 'Insert Data', 'UKPROD-2', 'JENPROD-2', '160x200', 'm2', 'USER-1', '2020-09-03 09:38:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(3, 'Insert Data', 'UKPROD-3', 'JENPROD-5', '180x200', 'm2', 'USER-1', '2020-09-03 09:40:54', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(4, 'Edit Data', 'UKPROD-1', 'JENPROD-2', '180x2000', 'm3', 'USER-1', '2020-09-03 02:19:25', 'USER-1', '2020-09-03 10:11:37', '', '0000-00-00 00:00:00', 0),
(5, 'Edit Data', 'UKPROD-1', 'JENPROD-2', '180x200', 'm3', 'USER-1', '2020-09-03 02:19:25', 'USER-1', '2020-09-03 10:11:42', '', '0000-00-00 00:00:00', 0),
(6, 'Edit Data', 'UKPROD-1', 'JENPROD-2', '180x200', 'm2', 'USER-1', '2020-09-03 02:19:25', 'USER-1', '2020-09-03 10:11:46', '', '0000-00-00 00:00:00', 0),
(7, 'Edit Data', 'UKPROD-1', 'JENPROD-2', '200x180x20', 'm3', 'USER-1', '2020-09-03 02:19:25', 'USER-1', '2020-09-03 10:12:30', '', '0000-00-00 00:00:00', 0),
(8, 'Edit Data', 'UKPROD-2', 'JENPROD-2', '200x160x20', 'm2', 'USER-1', '2020-09-03 09:38:33', 'USER-1', '2020-09-03 10:12:43', '', '0000-00-00 00:00:00', 0),
(9, 'Edit Data', 'UKPROD-2', 'JENPROD-2', '200x160x20', 'm3', 'USER-1', '2020-09-03 09:38:33', 'USER-1', '2020-09-03 10:12:47', '', '0000-00-00 00:00:00', 0),
(10, 'Edit Data', 'UKPROD-3', 'JENPROD-5', '150x100x2', 'cm2', 'USER-1', '2020-09-03 09:40:54', 'USER-1', '2020-09-03 10:13:30', '', '0000-00-00 00:00:00', 0),
(11, 'Edit Data', 'UKPROD-3', 'JENPROD-5', '150x100x2', 'cm3', 'USER-1', '2020-09-03 09:40:54', 'USER-1', '2020-09-03 10:13:34', '', '0000-00-00 00:00:00', 0),
(12, 'Edit Data', 'UKPROD-3', 'JENPROD-5', '150x100x2', 'cm3', 'USER-1', '2020-09-03 09:40:54', 'USER-1', '2020-09-03 10:13:45', '', '0000-00-00 00:00:00', 0),
(13, 'Edit Data', 'UKPROD-1', 'JENPROD-2', '200x180x20', 'cm3', 'USER-1', '2020-09-03 02:19:25', 'USER-1', '2020-09-03 10:14:16', '', '0000-00-00 00:00:00', 0),
(14, 'Edit Data', 'UKPROD-2', 'JENPROD-2', '200x160x20', 'cm3', 'USER-1', '2020-09-03 09:38:33', 'USER-1', '2020-09-03 10:14:19', '', '0000-00-00 00:00:00', 0),
(15, 'Edit Data', 'UKPROD-3', 'JENPROD-5', '150x100x2', 'cm3', 'USER-1', '2020-09-03 09:40:54', 'USER-1', '2020-09-03 10:13:45', 'USER-1', '2020-09-03 10:19:17', 1),
(16, 'Insert Data', 'UKPROD-4', 'JENPROD-5', '150x100x2', 'cm3', 'USER-1', '2020-09-03 10:19:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(17, 'Edit Data', 'UKPROD-1', 'JENPROD-3', '200x180x20', 'cm3', 'USER-1', '2020-09-03 02:19:25', 'USER-1', '2020-09-03 10:30:36', '', '0000-00-00 00:00:00', 0),
(18, 'Edit Data', 'UKPROD-1', 'JENPROD-2', '200x180x20', 'cm3', 'USER-1', '2020-09-03 02:19:25', 'USER-1', '2020-09-03 10:30:44', '', '0000-00-00 00:00:00', 0),
(19, 'Insert Data', 'UKPROD-5', 'JENPROD-2', '200x150x20', 'cm3', 'USER-1', '2020-09-03 10:37:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(20, 'Edit Data', 'UKPROD-5', 'JENPROD-2', '200x160x20', 'cm3', 'USER-1', '2020-09-03 10:37:00', 'USER-1', '2020-09-03 10:37:08', '', '0000-00-00 00:00:00', 0),
(21, 'Edit Data', 'UKPROD-5', 'JENPROD-2', '200x150x20', 'cm3', 'USER-1', '2020-09-03 10:37:00', 'USER-1', '2020-09-03 10:37:52', '', '0000-00-00 00:00:00', 0),
(22, 'Edit Data', 'UKPROD-5', 'JENPROD-2', '200x160x20', 'cm3', 'USER-1', '2020-09-03 10:37:00', 'USER-1', '2020-09-03 10:37:57', '', '0000-00-00 00:00:00', 0),
(23, 'Edit Data', 'UKPROD-5', 'JENPROD-2', '200x150x20', 'cm3', 'USER-1', '2020-09-03 10:37:00', 'USER-1', '2020-09-03 10:38:50', '', '0000-00-00 00:00:00', 0),
(24, 'Edit Data', 'UKPROD-5', 'JENPROD-2', '200x160x20', 'cm3', 'USER-1', '2020-09-03 10:37:00', 'USER-1', '2020-09-03 10:38:55', '', '0000-00-00 00:00:00', 0),
(25, 'Edit Data', 'UKPROD-5', 'JENPROD-2', '200x150x20', 'cm3', 'USER-1', '2020-09-03 10:37:00', 'USER-1', '2020-09-03 10:39:02', '', '0000-00-00 00:00:00', 0),
(26, 'Edit Data', 'UKPROD-5', 'JENPROD-2', '200x160x20', 'cm3', 'USER-1', '2020-09-03 10:37:00', 'USER-1', '2020-09-03 10:39:11', '', '0000-00-00 00:00:00', 0),
(27, 'Edit Data', 'UKPROD-5', 'JENPROD-2', '200x150x20', 'cm3', 'USER-1', '2020-09-03 10:37:00', 'USER-1', '2020-09-03 10:39:16', '', '0000-00-00 00:00:00', 0),
(28, 'Insert Data', 'UKPROD-6', 'JENPROD-2', '200x120x20', 'cm3', 'USER-1', '2020-09-03 22:17:42', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(29, 'Edit Data', 'UKPROD-6', 'JENPROD-2', '200x120x20', 'cm2', 'USER-1', '2020-09-03 22:17:42', 'USER-1', '2020-09-03 22:18:36', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_karyawan`, `email_user`, `password_user`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('USER-1', 'KAR-1', 'direktur@gmail.com', '12345678', 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-10', 'KAR-10', 'pic2@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', 'USER-1', '2020-09-08 23:24:02', '', '0000-00-00 00:00:00', 0),
('USER-11', 'KAR-11', 'pic3@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-12', 'KAR-12', 'xxx@gmail.com', '123456781', 'USER-1', '2020-09-08 21:12:17', 'USER-1', '2020-09-24 22:45:00', '', '0000-00-00 00:00:00', 0),
('USER-13', 'KAR-14', 'zzz@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'USER-1', '2020-09-08 22:27:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-2', 'KAR-2', 'julius@gmail.com', '12345678', 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-3', 'KAR-3', 'ita@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-4', 'KAR-4', 'produksi@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-5', 'KAR-5', 'risdev@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-6', 'KAR-6', 'finishgood@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-7', 'KAR-7', 'ppic@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-8', 'KAR-8', 'operator@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-9', 'KAR-9', 'pic1@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
(1, 'Insert Data', 'USER-12', 'KAR-12', 'xxx@gmail.com', '12345678', 'USER-1', '2020-09-08 21:12:17', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(2, 'Insert Data', 'USER-13', 'KAR-14', 'zzz@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'USER-1', '2020-09-08 22:27:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(3, 'Edit Data', 'USER-10', 'KAR-10', 'pic21@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', 'USER-1', '2020-09-08 23:23:56', '', '0000-00-00 00:00:00', 0),
(4, 'Edit Data', 'USER-10', 'KAR-10', 'pic2@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', 'USER-1', '2020-09-08 23:24:02', '', '0000-00-00 00:00:00', 0),
(5, 'Edit Data', 'USER-12', 'KAR-12', 'xxx1@gmail.com', '12345678', 'USER-1', '2020-09-08 21:12:17', 'USER-1', '2020-09-09 00:03:19', '', '0000-00-00 00:00:00', 0),
(6, 'Edit Data', 'USER-12', 'KAR-12', 'xxx@gmail.com', '12345678', 'USER-1', '2020-09-08 21:12:17', 'USER-1', '2020-09-09 00:03:26', '', '0000-00-00 00:00:00', 0),
(7, 'Edit Data', 'USER-12', 'KAR-12', 'xxx@gmail.com', '1234567819', 'USER-1', '2020-09-08 21:12:17', 'USER-1', '2020-09-09 00:27:12', '', '0000-00-00 00:00:00', 0),
(8, 'Edit Data', 'USER-12', 'KAR-12', 'xxx@gmail.com', '12345678', 'USER-1', '2020-09-08 21:12:17', 'USER-1', '2020-09-09 00:28:15', '', '0000-00-00 00:00:00', 0),
(9, 'Edit Data', 'USER-12', 'KAR-12', 'xxx@gmail.com', '123456781', 'USER-1', '2020-09-08 21:12:17', 'USER-1', '2020-09-24 22:45:00', '', '0000-00-00 00:00:00', 0);

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
('WARNA-1', 'Hitam', 'USER-1', '2020-08-30 22:43:28', 'USER-1', '2020-08-30 22:43:35', 'USER-1', '2020-08-30 22:45:47', 1),
('WARNA-2', 'Black', 'USER-1', '2020-08-30 22:45:51', 'USER-1', '2020-09-07 17:24:26', '', '0000-00-00 00:00:00', 0),
('WARNA-3', 'Brown', 'USER-1', '2020-08-30 22:45:54', 'USER-1', '2020-09-07 17:24:20', '', '0000-00-00 00:00:00', 0),
('WARNA-4', 'Red', 'USER-1', '2020-09-04 18:14:15', 'USER-1', '2020-09-07 17:24:30', '', '0000-00-00 00:00:00', 0),
('WARNA-5', 'White', 'USER-1', '2020-09-04 18:14:20', 'USER-1', '2020-09-07 17:24:38', '', '0000-00-00 00:00:00', 0),
('WARNA-6', 'Cream', 'USER-1', '2020-09-04 18:14:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
(1, 'Insert Data', 'WARNA-1', 'Hitam', 'USER-1', '2020-08-30 22:43:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(2, 'Edit Data', 'WARNA-1', 'Hitama', 'USER-1', '2020-08-30 22:43:28', 'USER-1', '2020-08-30 22:43:32', '', '0000-00-00 00:00:00', 0),
(3, 'Edit Data', 'WARNA-1', 'Hitam', 'USER-1', '2020-08-30 22:43:28', 'USER-1', '2020-08-30 22:43:35', '', '0000-00-00 00:00:00', 0),
(4, 'Edit Data', 'WARNA-1', 'Hitam', 'USER-1', '2020-08-30 22:43:28', 'USER-1', '2020-08-30 22:43:35', 'USER-1', '2020-08-30 22:45:47', 1),
(5, 'Insert Data', 'WARNA-2', 'Hitam', 'USER-1', '2020-08-30 22:45:51', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(6, 'Insert Data', 'WARNA-3', 'Coklat', 'USER-1', '2020-08-30 22:45:54', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(7, 'Insert Data', 'WARNA-4', 'Merah', 'USER-1', '2020-09-04 18:14:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(8, 'Insert Data', 'WARNA-5', 'Putih', 'USER-1', '2020-09-04 18:14:20', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(9, 'Insert Data', 'WARNA-6', 'Cream', 'USER-1', '2020-09-04 18:14:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(10, 'Edit Data', 'WARNA-3', 'Brown', 'USER-1', '2020-08-30 22:45:54', 'USER-1', '2020-09-07 17:24:20', '', '0000-00-00 00:00:00', 0),
(11, 'Edit Data', 'WARNA-2', 'Black', 'USER-1', '2020-08-30 22:45:51', 'USER-1', '2020-09-07 17:24:26', '', '0000-00-00 00:00:00', 0),
(12, 'Edit Data', 'WARNA-4', 'Red', 'USER-1', '2020-09-04 18:14:15', 'USER-1', '2020-09-07 17:24:30', '', '0000-00-00 00:00:00', 0),
(13, 'Edit Data', 'WARNA-5', 'White', 'USER-1', '2020-09-04 18:14:20', 'USER-1', '2020-09-07 17:24:38', '', '0000-00-00 00:00:00', 0);

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
-- Indexes for table `bpbj`
--
ALTER TABLE `bpbj`
  ADD PRIMARY KEY (`id_bpbj`);

--
-- Indexes for table `bpbj_logs`
--
ALTER TABLE `bpbj_logs`
  ADD PRIMARY KEY (`id_bpbj_logs`);

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
-- Indexes for table `cycle_time_logs`
--
ALTER TABLE `cycle_time_logs`
  ADD PRIMARY KEY (`id_cycle_time_logs`);

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
-- Indexes for table `detail_bpbj_logs`
--
ALTER TABLE `detail_bpbj_logs`
  ADD PRIMARY KEY (`id_detail_bpbj_logs`);

--
-- Indexes for table `detail_delivery_note`
--
ALTER TABLE `detail_delivery_note`
  ADD PRIMARY KEY (`id_detail_delivery_note`);

--
-- Indexes for table `detail_item_surat_jalan`
--
ALTER TABLE `detail_item_surat_jalan`
  ADD PRIMARY KEY (`id_detail_item_surat_jalan`);

--
-- Indexes for table `detail_item_surat_jalan_logs`
--
ALTER TABLE `detail_item_surat_jalan_logs`
  ADD PRIMARY KEY (`id_detail_item_surat_jalan_logs`);

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
-- Indexes for table `detail_produk_logs`
--
ALTER TABLE `detail_produk_logs`
  ADD PRIMARY KEY (`id_detail_produk_logs`);

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
-- Indexes for table `detail_surat_perintah_lembur_logs`
--
ALTER TABLE `detail_surat_perintah_lembur_logs`
  ADD PRIMARY KEY (`id_detail_surat_perintah_lembur_logs`);

--
-- Indexes for table `dpos`
--
ALTER TABLE `dpos`
  ADD PRIMARY KEY (`id_detail_PO`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `invoice_logs`
--
ALTER TABLE `invoice_logs`
  ADD PRIMARY KEY (`id_invoice_logs`);

--
-- Indexes for table `item_invoice`
--
ALTER TABLE `item_invoice`
  ADD PRIMARY KEY (`id_item_invoice`);

--
-- Indexes for table `item_invoice_logs`
--
ALTER TABLE `item_invoice_logs`
  ADD PRIMARY KEY (`id_item_invoice_logs`);

--
-- Indexes for table `item_surat_jalan`
--
ALTER TABLE `item_surat_jalan`
  ADD PRIMARY KEY (`id_item_surat_jalan`);

--
-- Indexes for table `item_surat_jalan_logs`
--
ALTER TABLE `item_surat_jalan_logs`
  ADD PRIMARY KEY (`id_item_surat_jalan_logs`);

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
-- Indexes for table `konsumsi_material_logs`
--
ALTER TABLE `konsumsi_material_logs`
  ADD PRIMARY KEY (`id_konsumsi_material_logs`);

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
-- Indexes for table `material_sementara`
--
ALTER TABLE `material_sementara`
  ADD PRIMARY KEY (`id_material`);

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
-- Indexes for table `permohonan_akses`
--
ALTER TABLE `permohonan_akses`
  ADD PRIMARY KEY (`id_permohonan_akses`);

--
-- Indexes for table `perubahan_harga`
--
ALTER TABLE `perubahan_harga`
  ADD PRIMARY KEY (`id_perubahan_harga`);

--
-- Indexes for table `planning_material`
--
ALTER TABLE `planning_material`
  ADD PRIMARY KEY (`id_planning_material`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id_PO`);

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
-- Indexes for table `surat_jalan_logs`
--
ALTER TABLE `surat_jalan_logs`
  ADD PRIMARY KEY (`id_surat_jalan_logs`);

--
-- Indexes for table `surat_perintah_lembur`
--
ALTER TABLE `surat_perintah_lembur`
  ADD PRIMARY KEY (`id_surat_perintah_lembur`);

--
-- Indexes for table `surat_perintah_lembur_logs`
--
ALTER TABLE `surat_perintah_lembur_logs`
  ADD PRIMARY KEY (`id_surat_perintah_lembur_logs`);

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
  MODIFY `id_bank_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bpbj_logs`
--
ALTER TABLE `bpbj_logs`
  MODIFY `id_bpbj_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cycle_time_logs`
--
ALTER TABLE `cycle_time_logs`
  MODIFY `id_cycle_time_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `departemen_logs`
--
ALTER TABLE `departemen_logs`
  MODIFY `id_departemen_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_bpbj_logs`
--
ALTER TABLE `detail_bpbj_logs`
  MODIFY `id_detail_bpbj_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `detail_item_surat_jalan_logs`
--
ALTER TABLE `detail_item_surat_jalan_logs`
  MODIFY `id_detail_item_surat_jalan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `detail_produk_logs`
--
ALTER TABLE `detail_produk_logs`
  MODIFY `id_detail_produk_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `detail_surat_perintah_lembur_logs`
--
ALTER TABLE `detail_surat_perintah_lembur_logs`
  MODIFY `id_detail_surat_perintah_lembur_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `invoice_logs`
--
ALTER TABLE `invoice_logs`
  MODIFY `id_invoice_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `item_invoice_logs`
--
ALTER TABLE `item_invoice_logs`
  MODIFY `id_item_invoice_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `item_surat_jalan_logs`
--
ALTER TABLE `item_surat_jalan_logs`
  MODIFY `id_item_surat_jalan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `jabatan_karyawan_logs`
--
ALTER TABLE `jabatan_karyawan_logs`
  MODIFY `id_jabatan_karyawan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jabatan_logs`
--
ALTER TABLE `jabatan_logs`
  MODIFY `id_jabatan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jenis_produk_logs`
--
ALTER TABLE `jenis_produk_logs`
  MODIFY `id_jenis_produk_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `karyawan_logs`
--
ALTER TABLE `karyawan_logs`
  MODIFY `id_karyawan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `konsumsi_material_logs`
--
ALTER TABLE `konsumsi_material_logs`
  MODIFY `id_konsumsi_material_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `line_logs`
--
ALTER TABLE `line_logs`
  MODIFY `id_line_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produksi_logs`
--
ALTER TABLE `produksi_logs`
  MODIFY `id_produksi_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=553;

--
-- AUTO_INCREMENT for table `produk_logs`
--
ALTER TABLE `produk_logs`
  MODIFY `id_produk_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rekening_logs`
--
ALTER TABLE `rekening_logs`
  MODIFY `id_rekening_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `surat_jalan_logs`
--
ALTER TABLE `surat_jalan_logs`
  MODIFY `id_surat_jalan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `surat_perintah_lembur_logs`
--
ALTER TABLE `surat_perintah_lembur_logs`
  MODIFY `id_surat_perintah_lembur_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT for table `tetapan_logs`
--
ALTER TABLE `tetapan_logs`
  MODIFY `id_tetapan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ukuran_produk_logs`
--
ALTER TABLE `ukuran_produk_logs`
  MODIFY `id_ukuran_produk_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id_user_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `warna_logs`
--
ALTER TABLE `warna_logs`
  MODIFY `id_warna_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
