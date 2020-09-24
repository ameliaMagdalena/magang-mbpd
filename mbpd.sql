-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 02:03 PM
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
('BANK-2', 'BCA', 'USER-1', '2020-08-30 18:11:42', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('BANK-3', 'OCBC NISP', 'USER-1', '2020-08-30 22:08:53', 'USER-1', '2020-08-30 22:09:12', '', '0000-00-00 00:00:00', 0),
('BANK-4', 'Mandiri', 'USER-1', '2020-09-08 23:36:51', 'USER-1', '2020-09-08 23:36:57', 'USER-1', '2020-09-08 23:37:01', 1);

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
(11, 'Edit Data', 'BANK-4', 'Mandiri', 'USER-1', '2020-09-08 23:36:51', 'USER-1', '2020-09-08 23:36:57', 'USER-1', '2020-09-08 23:37:01', 1);

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
('BPBJ20.0001', 'BPBJ-0001', '2020-09-17', '', 0, 'USER-6', '2020-09-17 22:25:55', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:25:08', 1),
('BPBJ20.0002', 'BPBJ-0002', '2020-09-19', '', 0, 'USER-6', '2020-09-19 20:08:25', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:53:11', 1),
('BPBJ20.0003', 'BPBJ-0003', '2020-09-19', '', 0, 'USER-6', '2020-09-19 22:31:14', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 23:55:37', 1),
('BPBJ20.0004', 'BPBJ-0004', '2020-09-20', '', 0, 'USER-6', '2020-09-20 14:09:54', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 23:55:40', 1),
('BPBJ20.0005', 'BPBJ-0005', '2020-09-21', '', 0, 'USER-6', '2020-09-21 14:13:57', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 23:55:43', 1),
('BPBJ20.0006', 'BPBJ-0006', '2020-09-22', 'bpbjke6', 0, 'USER-6', '2020-09-22 10:58:08', 'USER-6', '2020-09-22 18:26:21', 'USER-6', '2020-09-22 18:28:42', 1),
('BPBJ20.0007', 'BPBJ-0007', '2020-09-22', 'produksi pertama hari ini', 0, 'USER-6', '2020-09-22 18:29:26', 'USER-6', '2020-09-22 18:30:23', 'USER-6', '2020-09-22 18:30:49', 1),
('BPBJ20.0008', 'BPBJ-0008', '2020-09-22', 'bpbj pertama nih', 0, 'USER-6', '2020-09-22 18:31:52', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:53:53', 1),
('BPBJ20.0009', 'BPBJ-0009', '2020-09-22', '', 0, 'USER-6', '2020-09-22 20:09:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('BPBJ20.0010', 'BPBJ-0010', '2020-09-22', 'selesai', 0, 'USER-6', '2020-09-22 20:09:59', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('BPBJ20.0011', 'BPBJ-0011', '2020-09-23', '', 0, 'USER-6', '2020-09-23 12:45:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
(1, 'Insert Data', 'BPBJ20.0001', 'BPBJ-0001', '2020-09-17', '', 0, 'USER-6', '2020-09-17 22:25:55', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(2, 'Insert Data', 'BPBJ20.0002', 'BPBJ-0002', '2020-09-19', '', 0, 'USER-6', '2020-09-19 20:08:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(3, 'Insert Data', 'BPBJ20.0003', 'BPBJ-0003', '2020-09-19', '', 0, 'USER-6', '2020-09-19 22:17:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(4, 'Insert Data', 'BPBJ20.0003', 'BPBJ-0003', '2020-09-19', '', 0, 'USER-6', '2020-09-19 22:31:14', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(5, 'Insert Data', 'BPBJ20.0004', 'BPBJ-0004', '2020-09-20', 'selesai', 0, 'USER-6', '2020-09-20 13:44:59', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(6, 'Insert Data', 'BPBJ20.0004', 'BPBJ-0004', '2020-09-20', '', 0, 'USER-6', '2020-09-20 14:00:09', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(7, 'Insert Data', 'BPBJ20.0004', 'BPBJ-0004', '2020-09-20', '', 0, 'USER-6', '2020-09-20 14:09:54', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(8, 'Insert Data', 'BPBJ20.0005', 'BPBJ-0005', '2020-09-21', '', 0, 'USER-6', '2020-09-21 14:13:57', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(9, 'Insert Data', 'BPBJ20.0006', 'BPBJ-0006', '2020-09-22', '', 0, 'USER-6', '2020-09-22 10:58:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(10, 'Edit Data', 'BPBJ20.0006', 'BPBJ-0006', '2020-09-22', '', 0, 'USER-6', '2020-09-22 10:58:08', 'USER-6', '2020-09-22 18:20:42', '', '0000-00-00 00:00:00', 0),
(11, 'Edit Data', 'BPBJ20.0001', 'BPBJ-0001', '2020-09-17', '', 0, 'USER-6', '2020-09-17 22:25:55', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:25:08', 1),
(12, 'Edit Data', 'BPBJ20.0006', 'BPBJ-0006', '2020-09-22', '', 0, 'USER-6', '2020-09-22 10:58:08', 'USER-6', '2020-09-22 18:25:20', '', '0000-00-00 00:00:00', 0),
(13, 'Edit Data', 'BPBJ20.0006', 'BPBJ-0006', '2020-09-22', 'bpbj ke 6\r\n', 0, 'USER-6', '2020-09-22 10:58:08', 'USER-6', '2020-09-22 18:25:30', '', '0000-00-00 00:00:00', 0),
(14, 'Edit Data', 'BPBJ20.0006', 'BPBJ-0006', '2020-09-22', 'bpbjke6', 0, 'USER-6', '2020-09-22 10:58:08', 'USER-6', '2020-09-22 18:26:21', '', '0000-00-00 00:00:00', 0),
(15, 'Edit Data', 'BPBJ20.0006', 'BPBJ-0006', '2020-09-22', 'bpbjke6', 0, 'USER-6', '2020-09-22 10:58:08', 'USER-6', '2020-09-22 18:26:21', 'USER-6', '2020-09-22 18:28:42', 1),
(16, 'Insert Data', 'BPBJ20.0007', 'BPBJ-0007', '2020-09-22', '', 0, 'USER-6', '2020-09-22 18:29:26', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(17, 'Edit Data', 'BPBJ20.0007', 'BPBJ-0007', '2020-09-22', 'produksi pertama hari ini', 0, 'USER-6', '2020-09-22 18:29:26', 'USER-6', '2020-09-22 18:30:23', '', '0000-00-00 00:00:00', 0),
(18, 'Edit Data', 'BPBJ20.0007', 'BPBJ-0007', '2020-09-22', 'produksi pertama hari ini', 0, 'USER-6', '2020-09-22 18:29:26', 'USER-6', '2020-09-22 18:30:23', 'USER-6', '2020-09-22 18:30:49', 1),
(19, 'Insert Data', 'BPBJ20.0008', 'BPBJ-0008', '2020-09-22', 'bpbj pertama nih', 0, 'USER-6', '2020-09-22 18:31:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(20, 'Edit Data', 'BPBJ20.0002', 'BPBJ-0002', '2020-09-19', '', 0, 'USER-6', '2020-09-19 20:08:25', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:53:11', 1),
(21, 'Edit Data', 'BPBJ20.0008', 'BPBJ-0008', '2020-09-22', 'bpbj pertama nih', 0, 'USER-6', '2020-09-22 18:31:52', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:53:53', 1),
(22, 'Insert Data', 'BPBJ20.0009', 'BPBJ-0009', '2020-09-22', '', 0, 'USER-6', '2020-09-22 20:09:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(23, 'Insert Data', 'BPBJ20.0010', 'BPBJ-0010', '2020-09-22', 'selesai', 0, 'USER-6', '2020-09-22 20:09:59', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(24, 'Edit Data', 'BPBJ20.0003', 'BPBJ-0003', '2020-09-19', '', 0, 'USER-6', '2020-09-19 22:31:14', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 23:55:37', 1),
(25, 'Edit Data', 'BPBJ20.0004', 'BPBJ-0004', '2020-09-20', '', 0, 'USER-6', '2020-09-20 14:09:54', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 23:55:40', 1),
(26, 'Edit Data', 'BPBJ20.0005', 'BPBJ-0005', '2020-09-21', '', 0, 'USER-6', '2020-09-21 14:13:57', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 23:55:43', 1),
(27, 'Insert Data', 'BPBJ20.0011', 'BPBJ-0011', '2020-09-23', '', 0, 'USER-6', '2020-09-23 12:45:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
('CT-2', 'LINE-2', 'PRODUK-1', 100, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-3', 'LINE-3', 'PRODUK-1', 100, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-4', 'LINE-4', 'PRODUK-1', 100, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('CT-5', 'LINE-1', 'PRODUK-2', 200, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
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
(32, 'Edit Data', 'CT-7', 'LINE-4', 'PRODUK-2', 200, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
('DEPT-8', 'xyza', 'USER-1', '2020-09-08 23:46:56', 'USER-1', '2020-09-08 23:47:02', '', '0000-00-00 00:00:00', 0);

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
(7, 'Edit Data', 'DEPT-8', 'xyza', 'USER-1', '2020-09-08 23:46:56', 'USER-1', '2020-09-08 23:47:02', '', '0000-00-00 00:00:00', 0);

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
('DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 0, 0, 0, 'USER-6', '2020-09-17 22:25:55', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:25:08', 1),
('DBPBJ20.000002', 'BPBJ20.0001', 'DETPRO-3', 0, 0, 0, 'USER-6', '2020-09-17 22:25:55', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:25:08', 1),
('DBPBJ20.000003', 'BPBJ20.0002', 'DETPRO-1', 1, 0, 0, 'USER-6', '2020-09-19 20:08:25', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:53:11', 1),
('DBPBJ20.000004', 'BPBJ20.0002', 'DETPRO-3', 1, 0, 0, 'USER-6', '2020-09-19 20:08:25', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:53:11', 1),
('DBPBJ20.000005', 'BPBJ20.0003', 'DETPRO-3', 2, 0, 0, 'USER-6', '2020-09-19 22:31:14', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 23:55:37', 1),
('DBPBJ20.000006', 'BPBJ20.0004', 'DETPRO-1', 3, 0, 0, 'USER-6', '2020-09-20 14:09:54', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 23:55:40', 1),
('DBPBJ20.000007', 'BPBJ20.0005', 'DETPRO-5', 2, 0, 0, 'USER-6', '2020-09-21 14:13:57', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 23:55:43', 1),
('DBPBJ20.000008', 'BPBJ20.0005', 'DETPRO-7', 10, 0, 0, 'USER-6', '2020-09-21 14:13:57', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 23:55:43', 1),
('DBPBJ20.000009', 'BPBJ20.0006', 'DETPRO-1', 0, 0, 0, 'USER-6', '2020-09-22 10:58:08', 'USER-6', '2020-09-22 18:26:21', 'USER-6', '2020-09-22 18:28:42', 1),
('DBPBJ20.000010', 'BPBJ20.0006', 'DETPRO-5', 0, 0, 0, 'USER-6', '2020-09-22 10:58:08', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:20:42', 1),
('DBPBJ20.000011', 'BPBJ20.0007', 'DETPRO-1', 0, 0, 0, 'USER-6', '2020-09-22 18:29:26', 'USER-6', '2020-09-22 18:30:23', 'USER-6', '2020-09-22 18:30:49', 1),
('DBPBJ20.000012', 'BPBJ20.0007', 'DETPRO-5', 0, 0, 0, 'USER-6', '2020-09-22 18:29:26', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:30:23', 1),
('DBPBJ20.000013', 'BPBJ20.0007', 'DETPRO-7', 0, 0, 0, 'USER-6', '2020-09-22 18:29:26', 'USER-6', '2020-09-22 18:30:23', 'USER-6', '2020-09-22 18:30:49', 1),
('DBPBJ20.000014', 'BPBJ20.0008', 'DETPRO-1', 5, 0, 0, 'USER-6', '2020-09-22 18:31:52', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:53:53', 1),
('DBPBJ20.000015', 'BPBJ20.0008', 'DETPRO-5', 5, 0, 0, 'USER-6', '2020-09-22 18:31:52', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:53:53', 1),
('DBPBJ20.000016', 'BPBJ20.0008', 'DETPRO-7', 5, 0, 0, 'USER-6', '2020-09-22 18:31:52', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:53:53', 1),
('DBPBJ20.000017', 'BPBJ20.0009', 'DETPRO-1', 12, 12, 1, 'USER-6', '2020-09-22 20:09:28', 'USER-3', '2020-09-24 15:11:21', '', '0000-00-00 00:00:00', 0),
('DBPBJ20.000018', 'BPBJ20.0010', 'DETPRO-5', 5, 1, 0, 'USER-6', '2020-09-22 20:09:59', 'USER-3', '2020-09-24 15:24:30', '', '0000-00-00 00:00:00', 0),
('DBPBJ20.000019', 'BPBJ20.0010', 'DETPRO-7', 10, 0, 0, 'USER-6', '2020-09-22 20:09:59', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DBPBJ20.000020', 'BPBJ20.0011', 'DETPRO-1', 14, 9, 0, 'USER-6', '2020-09-23 12:45:22', 'USER-3', '2020-09-24 16:25:14', '', '0000-00-00 00:00:00', 0);

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
(2, 'Insert Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 1, 0, 0, 'USER-6', '2020-09-17 22:25:55', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(3, 'Insert Data', 'DBPBJ20.000002', 'BPBJ20.0001', 'DETPRO-3', 3, 0, 0, 'USER-6', '2020-09-17 22:25:55', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(4, 'Insert Data', 'DBPBJ20.000003', 'BPBJ20.0002', 'DETPRO-1', 1, 0, 0, 'USER-6', '2020-09-19 20:08:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(5, 'Insert Data', 'DBPBJ20.000004', 'BPBJ20.0002', 'DETPRO-3', 1, 0, 0, 'USER-6', '2020-09-19 20:08:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(6, 'Insert Data', 'DBPBJ20.000005', 'BPBJ20.0003', 'DETPRO-3', 2, 0, 0, 'USER-6', '2020-09-19 22:17:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(7, 'Insert Data', 'DBPBJ20.000005', 'BPBJ20.0003', 'DETPRO-3', 2, 0, 0, 'USER-6', '2020-09-19 22:31:14', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(8, 'Insert Data', 'DBPBJ20.000006', 'BPBJ20.0004', 'DETPRO-1', 3, 0, 0, 'USER-6', '2020-09-20 13:44:59', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(9, 'Insert Data', 'DBPBJ20.000006', 'BPBJ20.0004', 'DETPRO-1', 3, 0, 0, 'USER-6', '2020-09-20 14:00:09', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(10, 'Insert Data', 'DBPBJ20.000006', 'BPBJ20.0004', 'DETPRO-1', 3, 0, 0, 'USER-6', '2020-09-20 14:09:54', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(11, 'Insert Data', 'DBPBJ20.000007', 'BPBJ20.0005', 'DETPRO-5', 2, 0, 0, 'USER-6', '2020-09-21 14:13:57', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(12, 'Insert Data', 'DBPBJ20.000008', 'BPBJ20.0005', 'DETPRO-7', 10, 0, 0, 'USER-6', '2020-09-21 14:13:57', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(13, 'Insert Data', 'DBPBJ20.000009', 'BPBJ20.0006', 'DETPRO-1', 11, 0, 0, 'USER-6', '2020-09-22 10:58:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(14, 'Insert Data', 'DBPBJ20.000010', 'BPBJ20.0006', 'DETPRO-5', 5, 0, 0, 'USER-6', '2020-09-22 10:58:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(15, 'Edit Data', 'DBPBJ20.000009', 'BPBJ20.0006', 'DETPRO-1', 5, 0, 0, 'USER-6', '2020-09-22 10:58:08', 'USER-6', '2020-09-22 18:20:42', '', '0000-00-00 00:00:00', 0),
(16, 'Edit Data', 'DBPBJ20.000010', 'BPBJ20.0006', 'DETPRO-5', 0, 0, 0, 'USER-6', '2020-09-22 10:58:08', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:20:42', 0),
(17, 'Edit Data', 'DBPBJ20.000001', 'BPBJ20.0001', 'DETPRO-1', 0, 0, 0, 'USER-6', '2020-09-17 22:25:55', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:25:08', 0),
(18, 'Edit Data', 'DBPBJ20.000002', 'BPBJ20.0001', 'DETPRO-3', 0, 0, 0, 'USER-6', '2020-09-17 22:25:55', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:25:08', 0),
(19, 'Edit Data', 'DBPBJ20.000009', 'BPBJ20.0006', 'DETPRO-1', 12, 0, 0, 'USER-6', '2020-09-22 10:58:08', 'USER-6', '2020-09-22 18:25:20', '', '0000-00-00 00:00:00', 0),
(20, 'Edit Data', 'DBPBJ20.000009', 'BPBJ20.0006', 'DETPRO-1', 12, 0, 0, 'USER-6', '2020-09-22 10:58:08', 'USER-6', '2020-09-22 18:25:30', '', '0000-00-00 00:00:00', 0),
(21, 'Edit Data', 'DBPBJ20.000009', 'BPBJ20.0006', 'DETPRO-1', 12, 0, 0, 'USER-6', '2020-09-22 10:58:08', 'USER-6', '2020-09-22 18:26:21', '', '0000-00-00 00:00:00', 0),
(22, 'Edit Data', 'DBPBJ20.000009', 'BPBJ20.0006', 'DETPRO-1', 0, 0, 0, 'USER-6', '2020-09-22 10:58:08', 'USER-6', '2020-09-22 18:26:21', 'USER-6', '2020-09-22 18:28:42', 0),
(23, 'Insert Data', 'DBPBJ20.000011', 'BPBJ20.0007', 'DETPRO-1', 6, 0, 0, 'USER-6', '2020-09-22 18:29:26', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(24, 'Insert Data', 'DBPBJ20.000012', 'BPBJ20.0007', 'DETPRO-5', 5, 0, 0, 'USER-6', '2020-09-22 18:29:26', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(25, 'Insert Data', 'DBPBJ20.000013', 'BPBJ20.0007', 'DETPRO-7', 5, 0, 0, 'USER-6', '2020-09-22 18:29:26', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(26, 'Edit Data', 'DBPBJ20.000011', 'BPBJ20.0007', 'DETPRO-1', 6, 0, 0, 'USER-6', '2020-09-22 18:29:26', 'USER-6', '2020-09-22 18:30:23', '', '0000-00-00 00:00:00', 0),
(27, 'Edit Data', 'DBPBJ20.000012', 'BPBJ20.0007', 'DETPRO-5', 0, 0, 0, 'USER-6', '2020-09-22 18:29:26', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:30:23', 0),
(28, 'Edit Data', 'DBPBJ20.000013', 'BPBJ20.0007', 'DETPRO-7', 10, 0, 0, 'USER-6', '2020-09-22 18:29:26', 'USER-6', '2020-09-22 18:30:23', '', '0000-00-00 00:00:00', 0),
(29, 'Edit Data', 'DBPBJ20.000011', 'BPBJ20.0007', 'DETPRO-1', 0, 0, 0, 'USER-6', '2020-09-22 18:29:26', 'USER-6', '2020-09-22 18:30:23', 'USER-6', '2020-09-22 18:30:49', 0),
(30, 'Edit Data', 'DBPBJ20.000013', 'BPBJ20.0007', 'DETPRO-7', 0, 0, 0, 'USER-6', '2020-09-22 18:29:26', 'USER-6', '2020-09-22 18:30:23', 'USER-6', '2020-09-22 18:30:49', 0),
(31, 'Insert Data', 'DBPBJ20.000014', 'BPBJ20.0008', 'DETPRO-1', 5, 0, 0, 'USER-6', '2020-09-22 18:31:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(32, 'Insert Data', 'DBPBJ20.000015', 'BPBJ20.0008', 'DETPRO-5', 5, 0, 0, 'USER-6', '2020-09-22 18:31:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(33, 'Insert Data', 'DBPBJ20.000016', 'BPBJ20.0008', 'DETPRO-7', 5, 0, 0, 'USER-6', '2020-09-22 18:31:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(34, 'Edit Data', 'DBPBJ20.000003', 'BPBJ20.0002', 'DETPRO-1', 1, 0, 0, 'USER-6', '2020-09-19 20:08:25', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:53:11', 0),
(35, 'Edit Data', 'DBPBJ20.000004', 'BPBJ20.0002', 'DETPRO-3', 1, 0, 0, 'USER-6', '2020-09-19 20:08:25', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:53:11', 0),
(36, 'Edit Data', 'DBPBJ20.000014', 'BPBJ20.0008', 'DETPRO-1', 5, 0, 0, 'USER-6', '2020-09-22 18:31:52', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:53:53', 0),
(37, 'Edit Data', 'DBPBJ20.000015', 'BPBJ20.0008', 'DETPRO-5', 5, 0, 0, 'USER-6', '2020-09-22 18:31:52', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:53:53', 0),
(38, 'Edit Data', 'DBPBJ20.000016', 'BPBJ20.0008', 'DETPRO-7', 5, 0, 0, 'USER-6', '2020-09-22 18:31:52', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 18:53:53', 0),
(39, 'Insert Data', 'DBPBJ20.000017', 'BPBJ20.0009', 'DETPRO-1', 12, 0, 0, 'USER-6', '2020-09-22 20:09:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(40, 'Insert Data', 'DBPBJ20.000018', 'BPBJ20.0010', 'DETPRO-5', 5, 0, 0, 'USER-6', '2020-09-22 20:09:59', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(41, 'Insert Data', 'DBPBJ20.000019', 'BPBJ20.0010', 'DETPRO-7', 10, 0, 0, 'USER-6', '2020-09-22 20:09:59', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(42, 'Edit Data', 'DBPBJ20.000005', 'BPBJ20.0003', 'DETPRO-3', 2, 0, 0, 'USER-6', '2020-09-19 22:31:14', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 23:55:37', 0),
(43, 'Edit Data', 'DBPBJ20.000006', 'BPBJ20.0004', 'DETPRO-1', 3, 0, 0, 'USER-6', '2020-09-20 14:09:54', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 23:55:40', 0),
(44, 'Edit Data', 'DBPBJ20.000007', 'BPBJ20.0005', 'DETPRO-5', 2, 0, 0, 'USER-6', '2020-09-21 14:13:57', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 23:55:43', 0),
(45, 'Edit Data', 'DBPBJ20.000008', 'BPBJ20.0005', 'DETPRO-7', 10, 0, 0, 'USER-6', '2020-09-21 14:13:57', '', '0000-00-00 00:00:00', 'USER-6', '2020-09-22 23:55:43', 0),
(46, 'Insert Data', 'DBPBJ20.000020', 'BPBJ20.0011', 'DETPRO-1', 14, 0, 0, 'USER-6', '2020-09-23 12:45:22', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(47, 'Edit Data', 'DBPBJ20.000017', 'BPBJ20.0009', 'DETPRO-1', 12, 12, 1, 'USER-6', '2020-09-22 20:09:28', 'USER-3', '2020-09-24 15:11:21', '', '0000-00-00 00:00:00', 0),
(48, 'Edit Data', 'DBPBJ20.000020', 'BPBJ20.0011', 'DETPRO-1', 14, 4, 0, 'USER-6', '2020-09-23 12:45:22', 'USER-3', '2020-09-24 15:11:21', '', '0000-00-00 00:00:00', 0),
(49, 'Edit Data', 'DBPBJ20.000020', 'BPBJ20.0011', 'DETPRO-1', 14, 6, 0, 'USER-6', '2020-09-23 12:45:22', 'USER-3', '2020-09-24 15:12:38', '', '0000-00-00 00:00:00', 0),
(50, 'Edit Data', 'DBPBJ20.000018', 'BPBJ20.0010', 'DETPRO-5', 5, 1, 0, 'USER-6', '2020-09-22 20:09:59', 'USER-3', '2020-09-24 15:24:30', '', '0000-00-00 00:00:00', 0),
(51, 'Edit Data', 'DBPBJ20.000020', 'BPBJ20.0011', 'DETPRO-1', 14, 9, 0, 'USER-6', '2020-09-23 12:45:22', 'USER-3', '2020-09-24 16:25:14', '', '0000-00-00 00:00:00', 0);

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
('DISJ20.00000001', 'ISJ20.000001', 'DBPBJ20.000017', 12, 'USER-3', '2020-09-24 15:11:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DISJ20.00000002', 'ISJ20.000001', 'DBPBJ20.000020', 4, 'USER-3', '2020-09-24 15:11:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DISJ20.00000003', 'ISJ20.000002', 'DBPBJ20.000020', 2, 'USER-3', '2020-09-24 15:12:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DISJ20.00000004', 'ISJ20.000003', 'DBPBJ20.000018', 1, 'USER-3', '2020-09-24 15:24:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DISJ20.00000005', 'ISJ20.000004', 'DBPBJ20.000020', 3, 'USER-3', '2020-09-24 16:25:14', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
(9, 'Insert Data', 'DISJ20.00000001', 'ISJ20.000001', 'DBPBJ20.000017', 12, 'USER-3', '2020-09-24 15:11:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(10, 'Insert Data', 'DISJ20.00000002', 'ISJ20.000001', 'DBPBJ20.000020', 4, 'USER-3', '2020-09-24 15:11:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(11, 'Insert Data', 'DISJ20.00000003', 'ISJ20.000002', 'DBPBJ20.000020', 2, 'USER-3', '2020-09-24 15:12:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(12, 'Insert Data', 'DISJ20.00000004', 'ISJ20.000003', 'DBPBJ20.000018', 1, 'USER-3', '2020-09-24 15:24:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(13, 'Insert Data', 'DISJ20.00000005', 'ISJ20.000004', 'DBPBJ20.000020', 3, 'USER-3', '2020-09-24 16:25:14', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_permintaan_material`
--

CREATE TABLE `detail_permintaan_material` (
  `id_detail_permintaan_material` varchar(10) NOT NULL,
  `id_permintaan_material` varchar(10) NOT NULL,
  `id_konsumsi_material` varchar(10) NOT NULL,
  `needs` int(11) NOT NULL,
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
('DETPRO-2', 'PRODUK-1', '', 'WARNA-4', 2, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-3', 'PRODUK-2', '', '', 3, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-4', 'PRODUK-3', 'UKPROD-1', '', 1, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-5', 'PRODUK-3', 'UKPROD-2', '', 1, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-6', 'PRODUK-4', 'UKPROD-4', 'WARNA-2', 0, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DETPRO-7', 'PRODUK-4', 'UKPROD-4', 'WARNA-3', 0, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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

INSERT INTO `detail_produksi_line` (`id_detail_produksi_line`, `id_detail_purchase_order`, `id_produksi_line`, `jumlah_item_perencanaan`, `jumlah_item_aktual`, `waktu_proses_perencanaan`, `waktu_proses_aktual`, `status_aktual`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('DPL2009.00000001', 'DETPO-1', 'PL2009.000001', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000002', 'DETPO-1', 'PL2009.000005', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000003', 'DETPO-1', 'PL2009.000009', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000004', 'DETPO-1', 'PL2009.000013', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000005', 'DETPO-1', 'PL2009.000017', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000006', 'DETPO-1', 'PL2009.000021', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000007', 'DETPO-1', 'PL2009.000025', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000008', 'DETPO-1', 'PL2009.000002', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000009', 'DETPO-1', 'PL2009.000006', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000010', 'DETPO-1', 'PL2009.000010', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000011', 'DETPO-1', 'PL2009.000014', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000012', 'DETPO-1', 'PL2009.000018', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000013', 'DETPO-1', 'PL2009.000022', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000014', 'DETPO-1', 'PL2009.000026', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000015', 'DETPO-1', 'PL2009.000003', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000016', 'DETPO-1', 'PL2009.000007', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000017', 'DETPO-1', 'PL2009.000011', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000018', 'DETPO-1', 'PL2009.000015', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000019', 'DETPO-1', 'PL2009.000019', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000020', 'DETPO-1', 'PL2009.000023', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000021', 'DETPO-1', 'PL2009.000027', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000022', 'DETPO-1', 'PL2009.000004', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000023', 'DETPO-1', 'PL2009.000008', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000024', 'DETPO-1', 'PL2009.000012', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000025', 'DETPO-1', 'PL2009.000016', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000026', 'DETPO-1', 'PL2009.000020', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000027', 'DETPO-1', 'PL2009.000024', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000028', 'DETPO-1', 'PL2009.000028', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000029', 'DETPO-4', 'PL2009.000001', 325, 0, 32500, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000030', 'DETPO-4', 'PL2009.000005', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000031', 'DETPO-4', 'PL2009.000009', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000032', 'DETPO-4', 'PL2009.000013', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000033', 'DETPO-4', 'PL2009.000017', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000034', 'DETPO-4', 'PL2009.000021', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000035', 'DETPO-4', 'PL2009.000025', 0, 0, 0, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000036', 'DETPO-4', 'PL2009.000002', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000037', 'DETPO-4', 'PL2009.000006', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000038', 'DETPO-4', 'PL2009.000010', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000039', 'DETPO-4', 'PL2009.000014', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000040', 'DETPO-4', 'PL2009.000018', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000041', 'DETPO-4', 'PL2009.000022', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000042', 'DETPO-4', 'PL2009.000026', 0, 0, 0, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000043', 'DETPO-4', 'PL2009.000003', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000044', 'DETPO-4', 'PL2009.000007', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000045', 'DETPO-4', 'PL2009.000011', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000046', 'DETPO-4', 'PL2009.000015', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000047', 'DETPO-4', 'PL2009.000019', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000048', 'DETPO-4', 'PL2009.000023', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000049', 'DETPO-4', 'PL2009.000027', 0, 0, 0, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000050', 'DETPO-4', 'PL2009.000004', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000051', 'DETPO-4', 'PL2009.000008', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000052', 'DETPO-4', 'PL2009.000012', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000053', 'DETPO-4', 'PL2009.000016', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000054', 'DETPO-4', 'PL2009.000020', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000055', 'DETPO-4', 'PL2009.000024', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000056', 'DETPO-4', 'PL2009.000028', 0, 0, 0, 0, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('DPL2009.00000057', 'DETPO-1', 'PL2009.000001', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000058', 'DETPO-1', 'PL2009.000005', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000059', 'DETPO-1', 'PL2009.000009', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000060', 'DETPO-1', 'PL2009.000013', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000061', 'DETPO-1', 'PL2009.000017', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000062', 'DETPO-1', 'PL2009.000021', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000063', 'DETPO-1', 'PL2009.000025', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000064', 'DETPO-1', 'PL2009.000002', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000065', 'DETPO-1', 'PL2009.000006', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000066', 'DETPO-1', 'PL2009.000010', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000067', 'DETPO-1', 'PL2009.000014', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000068', 'DETPO-1', 'PL2009.000018', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000069', 'DETPO-1', 'PL2009.000022', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000070', 'DETPO-1', 'PL2009.000026', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000071', 'DETPO-1', 'PL2009.000003', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000072', 'DETPO-1', 'PL2009.000007', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000073', 'DETPO-1', 'PL2009.000011', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000074', 'DETPO-1', 'PL2009.000015', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000075', 'DETPO-1', 'PL2009.000019', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000076', 'DETPO-1', 'PL2009.000023', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000077', 'DETPO-1', 'PL2009.000027', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000078', 'DETPO-1', 'PL2009.000004', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000079', 'DETPO-1', 'PL2009.000008', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000080', 'DETPO-1', 'PL2009.000012', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000081', 'DETPO-1', 'PL2009.000016', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000082', 'DETPO-1', 'PL2009.000020', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000083', 'DETPO-1', 'PL2009.000024', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000084', 'DETPO-1', 'PL2009.000028', 1, 0, 100, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000085', 'DETPO-5', 'PL2009.000001', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000086', 'DETPO-5', 'PL2009.000005', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000087', 'DETPO-5', 'PL2009.000009', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000088', 'DETPO-5', 'PL2009.000013', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000089', 'DETPO-5', 'PL2009.000017', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000090', 'DETPO-5', 'PL2009.000021', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000091', 'DETPO-5', 'PL2009.000025', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000092', 'DETPO-5', 'PL2009.000002', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000093', 'DETPO-5', 'PL2009.000006', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000094', 'DETPO-5', 'PL2009.000010', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000095', 'DETPO-5', 'PL2009.000014', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000096', 'DETPO-5', 'PL2009.000018', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000097', 'DETPO-5', 'PL2009.000022', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000098', 'DETPO-5', 'PL2009.000026', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000099', 'DETPO-5', 'PL2009.000003', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000100', 'DETPO-5', 'PL2009.000007', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000101', 'DETPO-5', 'PL2009.000011', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000102', 'DETPO-5', 'PL2009.000015', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000103', 'DETPO-5', 'PL2009.000019', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000104', 'DETPO-5', 'PL2009.000023', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000105', 'DETPO-5', 'PL2009.000027', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000106', 'DETPO-5', 'PL2009.000004', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000107', 'DETPO-5', 'PL2009.000008', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000108', 'DETPO-5', 'PL2009.000012', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000109', 'DETPO-5', 'PL2009.000016', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000110', 'DETPO-5', 'PL2009.000020', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000111', 'DETPO-5', 'PL2009.000024', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000112', 'DETPO-5', 'PL2009.000028', 2, 0, 200, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000113', 'DETPO-2', 'PL2009.000001', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000114', 'DETPO-2', 'PL2009.000005', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000115', 'DETPO-2', 'PL2009.000009', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000116', 'DETPO-2', 'PL2009.000013', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000117', 'DETPO-2', 'PL2009.000017', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000118', 'DETPO-2', 'PL2009.000021', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000119', 'DETPO-2', 'PL2009.000025', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000120', 'DETPO-2', 'PL2009.000002', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000121', 'DETPO-2', 'PL2009.000006', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000122', 'DETPO-2', 'PL2009.000010', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000123', 'DETPO-2', 'PL2009.000014', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000124', 'DETPO-2', 'PL2009.000018', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000125', 'DETPO-2', 'PL2009.000022', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000126', 'DETPO-2', 'PL2009.000026', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000127', 'DETPO-2', 'PL2009.000004', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000128', 'DETPO-2', 'PL2009.000008', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000129', 'DETPO-2', 'PL2009.000012', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000130', 'DETPO-2', 'PL2009.000016', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000131', 'DETPO-2', 'PL2009.000020', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000132', 'DETPO-2', 'PL2009.000024', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000133', 'DETPO-2', 'PL2009.000028', 3, 0, 600, 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000134', 'DETPO-1', 'PL2009.000057', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000135', 'DETPO-1', 'PL2009.000061', 6, 0, 600, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000136', 'DETPO-1', 'PL2009.000065', 7, 0, 700, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000137', 'DETPO-1', 'PL2009.000069', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000138', 'DETPO-1', 'PL2009.000073', 6, 0, 600, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000139', 'DETPO-1', 'PL2009.000077', 7, 0, 700, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000140', 'DETPO-1', 'PL2009.000081', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000141', 'DETPO-1', 'PL2009.000058', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000142', 'DETPO-1', 'PL2009.000062', 6, 0, 600, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000143', 'DETPO-1', 'PL2009.000066', 7, 0, 700, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000144', 'DETPO-1', 'PL2009.000070', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000145', 'DETPO-1', 'PL2009.000074', 6, 0, 600, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000146', 'DETPO-1', 'PL2009.000078', 7, 0, 700, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000147', 'DETPO-1', 'PL2009.000082', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000148', 'DETPO-1', 'PL2009.000059', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000149', 'DETPO-1', 'PL2009.000063', 6, 0, 600, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000150', 'DETPO-1', 'PL2009.000067', 7, 0, 700, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000151', 'DETPO-1', 'PL2009.000071', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000152', 'DETPO-1', 'PL2009.000075', 6, 0, 600, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000153', 'DETPO-1', 'PL2009.000079', 7, 0, 700, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000154', 'DETPO-1', 'PL2009.000083', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000155', 'DETPO-1', 'PL2009.000060', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000156', 'DETPO-1', 'PL2009.000064', 6, 0, 600, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000157', 'DETPO-1', 'PL2009.000068', 7, 0, 700, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000158', 'DETPO-1', 'PL2009.000072', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000159', 'DETPO-1', 'PL2009.000076', 6, 0, 600, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000160', 'DETPO-1', 'PL2009.000080', 7, 0, 700, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000161', 'DETPO-1', 'PL2009.000084', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000162', 'DETPO-5', 'PL2009.000057', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000163', 'DETPO-5', 'PL2009.000061', 6, 0, 600, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000164', 'DETPO-5', 'PL2009.000065', 7, 0, 700, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000165', 'DETPO-5', 'PL2009.000069', 8, 0, 800, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000166', 'DETPO-5', 'PL2009.000073', 9, 0, 900, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000167', 'DETPO-5', 'PL2009.000077', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000168', 'DETPO-5', 'PL2009.000081', 6, 0, 600, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000169', 'DETPO-5', 'PL2009.000058', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000170', 'DETPO-5', 'PL2009.000062', 6, 0, 600, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000171', 'DETPO-5', 'PL2009.000066', 7, 0, 700, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000172', 'DETPO-5', 'PL2009.000070', 8, 0, 800, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000173', 'DETPO-5', 'PL2009.000074', 9, 0, 900, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000174', 'DETPO-5', 'PL2009.000078', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000175', 'DETPO-5', 'PL2009.000082', 6, 0, 600, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000176', 'DETPO-5', 'PL2009.000059', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000177', 'DETPO-5', 'PL2009.000063', 6, 0, 600, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000178', 'DETPO-5', 'PL2009.000067', 7, 0, 700, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000179', 'DETPO-5', 'PL2009.000071', 8, 0, 800, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000180', 'DETPO-5', 'PL2009.000075', 9, 0, 900, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000181', 'DETPO-5', 'PL2009.000079', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000182', 'DETPO-5', 'PL2009.000083', 6, 0, 600, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000183', 'DETPO-5', 'PL2009.000060', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000184', 'DETPO-5', 'PL2009.000064', 6, 0, 600, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000185', 'DETPO-5', 'PL2009.000068', 7, 0, 700, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000186', 'DETPO-5', 'PL2009.000072', 8, 0, 800, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000187', 'DETPO-5', 'PL2009.000076', 9, 0, 900, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000188', 'DETPO-5', 'PL2009.000080', 5, 0, 500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000189', 'DETPO-5', 'PL2009.000084', 6, 0, 600, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000190', 'DETPO-3', 'PL2009.000059', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000191', 'DETPO-3', 'PL2009.000063', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000192', 'DETPO-3', 'PL2009.000067', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000193', 'DETPO-3', 'PL2009.000071', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000194', 'DETPO-3', 'PL2009.000075', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000195', 'DETPO-3', 'PL2009.000079', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000196', 'DETPO-3', 'PL2009.000083', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000197', 'DETPO-3', 'PL2009.000060', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000198', 'DETPO-3', 'PL2009.000064', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000199', 'DETPO-3', 'PL2009.000068', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000200', 'DETPO-3', 'PL2009.000072', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000201', 'DETPO-3', 'PL2009.000076', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000202', 'DETPO-3', 'PL2009.000080', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000203', 'DETPO-3', 'PL2009.000084', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000204', 'DETPO-3', 'PL2009.000057', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000205', 'DETPO-3', 'PL2009.000061', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000206', 'DETPO-3', 'PL2009.000065', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000207', 'DETPO-3', 'PL2009.000069', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000208', 'DETPO-3', 'PL2009.000073', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000209', 'DETPO-3', 'PL2009.000077', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000210', 'DETPO-3', 'PL2009.000081', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000211', 'DETPO-3', 'PL2009.000058', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000212', 'DETPO-3', 'PL2009.000062', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000213', 'DETPO-3', 'PL2009.000066', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000214', 'DETPO-3', 'PL2009.000070', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000215', 'DETPO-3', 'PL2009.000074', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000216', 'DETPO-3', 'PL2009.000078', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000217', 'DETPO-3', 'PL2009.000082', 5, 0, 1500, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000218', 'DETPO-4', 'PL2009.000057', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000219', 'DETPO-4', 'PL2009.000061', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000220', 'DETPO-4', 'PL2009.000065', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000221', 'DETPO-4', 'PL2009.000069', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000222', 'DETPO-4', 'PL2009.000073', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000223', 'DETPO-4', 'PL2009.000077', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000224', 'DETPO-4', 'PL2009.000081', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000225', 'DETPO-4', 'PL2009.000058', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000226', 'DETPO-4', 'PL2009.000062', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000227', 'DETPO-4', 'PL2009.000066', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000228', 'DETPO-4', 'PL2009.000070', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000229', 'DETPO-4', 'PL2009.000074', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000230', 'DETPO-4', 'PL2009.000078', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000231', 'DETPO-4', 'PL2009.000082', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000232', 'DETPO-4', 'PL2009.000059', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000233', 'DETPO-4', 'PL2009.000063', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000234', 'DETPO-4', 'PL2009.000067', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000235', 'DETPO-4', 'PL2009.000071', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000236', 'DETPO-4', 'PL2009.000075', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000237', 'DETPO-4', 'PL2009.000079', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000238', 'DETPO-4', 'PL2009.000083', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000239', 'DETPO-4', 'PL2009.000060', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000240', 'DETPO-4', 'PL2009.000064', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000241', 'DETPO-4', 'PL2009.000068', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000242', 'DETPO-4', 'PL2009.000072', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000243', 'DETPO-4', 'PL2009.000076', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000244', 'DETPO-4', 'PL2009.000080', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DPL2009.00000245', 'DETPO-4', 'PL2009.000084', 10, 0, 1000, 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
(12, 'Insert Data', 'DETPRO-7', 'PRODUK-4', 'UKPROD-4', 'WARNA-3', 0, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_purchase_order_customer`
--

CREATE TABLE `detail_purchase_order_customer` (
  `id_detail_purchase_order_customer` varchar(10) NOT NULL,
  `id_purchase_order_customer` varchar(10) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_penerimaan` datetime NOT NULL,
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
-- Dumping data for table `detail_surat_perintah_lembur`
--

INSERT INTO `detail_surat_perintah_lembur` (`id_detail_surat_perintah_lembur`, `id_surat_perintah_lembur`, `id_karyawan`, `planning_lembur`, `waktu_in_plan`, `waktu_out_plan`, `keterangan_plan`, `aktual_lembur`, `waktu_in_aktual`, `waktu_out_aktual`, `keterangan_aktual`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('DSPL-1', 'SPL-2', 'KAR-15', 3, '15:00:00', '18:00:00', 'hanya bisa 3 jam', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:47:24', 'USER-9', '2020-09-11 19:17:32', '', '0000-00-00 00:00:00', 0),
('DSPL-10', 'SPL-7', 'KAR-16', 2, '12:00:00', '14:00:00', 'aa', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 18:49:41', '', '0000-00-00 00:00:00', 'USER-9', '2020-09-11 19:06:48', 1),
('DSPL-11', 'SPL-1', 'KAR-15', 1, '16:00:00', '17:00:00', 'keterangannya disini', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 19:51:16', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DSPL-12', 'SPL-1', 'KAR-16', 2, '16:00:00', '18:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 19:51:16', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DSPL-13', 'SPL-9', 'KAR-15', 1, '16:00:00', '17:00:00', '', 1, '16:00:00', '17:00:00', 'sesuai', 'USER-9', '2020-09-11 21:46:35', 'USER-9', '2020-09-12 00:07:53', '', '0000-00-00 00:00:00', 0),
('DSPL-14', 'SPL-9', 'KAR-16', 1, '16:00:00', '17:00:00', '', 1, '16:00:00', '17:00:00', 'sesuai', 'USER-9', '2020-09-11 21:46:35', 'USER-9', '2020-09-12 00:07:53', '', '0000-00-00 00:00:00', 0),
('DSPL-15', 'SPL-10', 'KAR-17', 1, '16:00:00', '17:00:00', '', 2, '16:00:00', '18:00:00', 'Ada kerjaan extra', 'USER-9', '2020-09-11 21:46:57', 'USER-9', '2020-09-12 00:28:01', '', '0000-00-00 00:00:00', 0),
('DSPL-16', 'SPL-11', 'KAR-19', 1, '16:00:00', '17:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-10', '2020-09-11 21:47:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DSPL-17', 'SPL-11', 'KAR-20', 1, '16:00:00', '17:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-10', '2020-09-11 21:47:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DSPL-18', 'SPL-12', 'KAR-21', 1, '16:00:00', '17:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-11', '2020-09-11 21:48:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DSPL-19', 'SPL-12', 'KAR-22', 1, '16:00:00', '17:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-11', '2020-09-11 21:48:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DSPL-2', 'SPL-2', 'KAR-16', 2, '16:00:00', '18:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:47:24', 'USER-9', '2020-09-11 17:59:26', 'USER-9', '2020-09-11 18:09:07', 1),
('DSPL-3', 'SPL-3', 'KAR-23', 3, '16:00:00', '19:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:47:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DSPL-4', 'SPL-3', 'KAR-24', 3, '16:00:00', '19:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:47:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DSPL-5', 'SPL-4', 'KAR-15', 5, '16:00:00', '21:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:50:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DSPL-6', 'SPL-4', 'KAR-16', 5, '16:00:00', '21:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:50:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('DSPL-7', 'SPL-2', 'KAR-23', 4, '15:00:00', '19:00:00', 'bisa full', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 18:09:07', 'USER-9', '2020-09-11 19:17:32', '', '0000-00-00 00:00:00', 0),
('DSPL-8', 'SPL-2', 'KAR-16', 3, '15:00:00', '18:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 18:13:35', 'USER-9', '2020-09-11 19:17:32', '', '0000-00-00 00:00:00', 0),
('DSPL-9', 'SPL-7', 'KAR-15', 2, '12:00:00', '14:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 18:48:09', 'USER-9', '2020-09-11 18:49:41', 'USER-9', '2020-09-11 19:06:48', 1);

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
(5, 'Insert Data', 'DSPL-1', 'SPL-2', 'KAR-15', 1, '16:00:00', '17:00:00', 'hanya bisa 1 jam', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:47:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(6, 'Insert Data', 'DSPL-2', 'SPL-2', 'KAR-16', 2, '16:00:00', '18:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:47:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(7, 'Insert Data', 'DSPL-3', 'SPL-3', 'KAR-23', 3, '16:00:00', '19:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:47:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(8, 'Insert Data', 'DSPL-4', 'SPL-3', 'KAR-24', 3, '16:00:00', '19:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:47:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(9, 'Insert Data', 'DSPL-5', 'SPL-4', 'KAR-15', 5, '16:00:00', '21:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:50:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(10, 'Insert Data', 'DSPL-6', 'SPL-4', 'KAR-16', 5, '16:00:00', '21:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:50:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(11, 'Edit\r\nData', 'DSPL-1', 'SPL-2', 'KAR-15', 1, '16:00:00', '17:00:00', 'hanya bisa 1 jam', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:47:24', 'USER-9', '2020-09-11 17:59:26', '', '0000-00-00 00:00:00', 0),
(12, 'Edit\r\nData', 'DSPL-2', 'SPL-2', 'KAR-16', 2, '16:00:00', '18:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:47:24', 'USER-9', '2020-09-11 17:59:26', '', '0000-00-00 00:00:00', 0),
(13, 'Edit\r\nData', 'DSPL-1', 'SPL-2', 'KAR-15', 3, '15:00:00', '18:00:00', 'hanya bisa 3 jam', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:47:24', 'USER-9', '2020-09-11 18:09:07', '', '0000-00-00 00:00:00', 0),
(14, 'Edit\r\nData', 'DSPL-2', 'SPL-2', 'KAR-16', 2, '16:00:00', '18:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:47:24', 'USER-9', '2020-09-11 17:59:26', 'USER-9', '2020-09-11 18:09:07', 1),
(15, 'Insert Data', 'DSPL-7', 'SPL-2', 'KAR-23', 4, '17:00:00', '21:00:00', 'bisa full', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 18:09:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(16, 'Edit\r\nData', 'DSPL-1', 'SPL-2', 'KAR-15', 3, '15:00:00', '18:00:00', 'hanya bisa 3 jam', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:47:24', 'USER-9', '2020-09-11 18:13:35', '', '0000-00-00 00:00:00', 0),
(17, 'Edit\r\nData', 'DSPL-7', 'SPL-2', 'KAR-23', 4, '15:00:00', '19:00:00', 'bisa full', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 18:09:07', 'USER-9', '2020-09-11 18:13:35', '', '0000-00-00 00:00:00', 0),
(18, 'Insert Data', 'DSPL-8', 'SPL-2', 'KAR-16', 3, '15:00:00', '18:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 18:13:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(19, 'Insert Data', 'DSPL-9', 'SPL-7', 'KAR-15', 2, '12:00:00', '14:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 18:48:09', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(20, 'Edit\r\nData', 'DSPL-9', 'SPL-7', 'KAR-15', 2, '12:00:00', '14:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 18:48:09', 'USER-9', '2020-09-11 18:49:41', '', '0000-00-00 00:00:00', 0),
(21, 'Insert Data', 'DSPL-10', 'SPL-7', 'KAR-16', 2, '12:00:00', '14:00:00', 'aa', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 18:49:41', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(22, 'Edit\r\nData', 'DSPL-10', 'SPL-7', 'KAR-16', 2, '12:00:00', '14:00:00', 'aa', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 18:49:41', '', '0000-00-00 00:00:00', 'USER-9', '2020-09-11 19:06:48', 1),
(23, 'Edit\r\nData', 'DSPL-9', 'SPL-7', 'KAR-15', 2, '12:00:00', '14:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 18:48:09', 'USER-9', '2020-09-11 18:49:41', 'USER-9', '2020-09-11 19:06:48', 1),
(24, 'Edit\r\nData', 'DSPL-1', 'SPL-2', 'KAR-15', 3, '15:00:00', '18:00:00', 'hanya bisa 3 jam', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:47:24', 'USER-9', '2020-09-11 19:16:51', '', '0000-00-00 00:00:00', 0),
(25, 'Edit\r\nData', 'DSPL-7', 'SPL-2', 'KAR-23', 4, '15:00:00', '19:00:00', 'bisa full', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 18:09:07', 'USER-9', '2020-09-11 19:16:51', '', '0000-00-00 00:00:00', 0),
(26, 'Edit\r\nData', 'DSPL-8', 'SPL-2', 'KAR-16', 3, '15:00:00', '18:00:00', 'aa', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 18:13:35', 'USER-9', '2020-09-11 19:16:51', '', '0000-00-00 00:00:00', 0),
(27, 'Edit\r\nData', 'DSPL-1', 'SPL-2', 'KAR-15', 3, '15:00:00', '18:00:00', 'hanya bisa 3 jam', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-10 22:47:24', 'USER-9', '2020-09-11 19:17:32', '', '0000-00-00 00:00:00', 0),
(28, 'Edit\r\nData', 'DSPL-7', 'SPL-2', 'KAR-23', 4, '15:00:00', '19:00:00', 'bisa full', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 18:09:07', 'USER-9', '2020-09-11 19:17:32', '', '0000-00-00 00:00:00', 0),
(29, 'Edit\r\nData', 'DSPL-8', 'SPL-2', 'KAR-16', 3, '15:00:00', '18:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 18:13:35', 'USER-9', '2020-09-11 19:17:32', '', '0000-00-00 00:00:00', 0),
(30, 'Insert Data', 'DSPL-11', 'SPL-1', 'KAR-15', 1, '16:00:00', '17:00:00', 'keterangannya disini', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 19:51:16', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(31, 'Insert Data', 'DSPL-12', 'SPL-1', 'KAR-16', 2, '16:00:00', '18:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 19:51:16', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(32, 'Insert Data', 'DSPL-13', 'SPL-9', 'KAR-15', 1, '16:00:00', '17:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 21:46:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(33, 'Insert Data', 'DSPL-14', 'SPL-9', 'KAR-16', 1, '16:00:00', '17:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 21:46:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(34, 'Insert Data', 'DSPL-15', 'SPL-10', 'KAR-17', 1, '16:00:00', '17:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-9', '2020-09-11 21:46:57', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(35, 'Insert Data', 'DSPL-16', 'SPL-11', 'KAR-19', 1, '16:00:00', '17:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-10', '2020-09-11 21:47:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(36, 'Insert Data', 'DSPL-17', 'SPL-11', 'KAR-20', 1, '16:00:00', '17:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-10', '2020-09-11 21:47:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(37, 'Insert Data', 'DSPL-18', 'SPL-12', 'KAR-21', 1, '16:00:00', '17:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-11', '2020-09-11 21:48:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(38, 'Insert Data', 'DSPL-19', 'SPL-12', 'KAR-22', 1, '16:00:00', '17:00:00', '', 0, '00:00:00', '00:00:00', '', 'USER-11', '2020-09-11 21:48:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(39, 'Edit\r\nData', 'DSPL-13', 'SPL-9', 'KAR-15', 1, '16:00:00', '17:00:00', '', 0, '00:00:00', '00:00:00', 'tidak jadi lembur', 'USER-9', '2020-09-11 21:46:35', 'USER-9', '2020-09-11 23:41:09', '', '0000-00-00 00:00:00', 0),
(40, 'Edit\r\nData', 'DSPL-14', 'SPL-9', 'KAR-16', 1, '16:00:00', '17:00:00', '', 2, '17:00:00', '19:00:00', 'jadinya dua jam', 'USER-9', '2020-09-11 21:46:35', 'USER-9', '2020-09-11 23:41:09', '', '0000-00-00 00:00:00', 0),
(41, 'Edit\r\nData', 'DSPL-13', 'SPL-9', 'KAR-15', 1, '16:00:00', '17:00:00', '', 1, '17:00:00', '18:00:00', 'tidak jadi lembur', 'USER-9', '2020-09-11 21:46:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(42, 'Edit\r\nData', 'DSPL-14', 'SPL-9', 'KAR-16', 1, '16:00:00', '17:00:00', '', 2, '17:00:00', '19:00:00', 'jadinya dua jam', 'USER-9', '2020-09-11 21:46:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(43, 'Edit\r\nData', 'DSPL-13', 'SPL-9', 'KAR-15', 1, '16:00:00', '17:00:00', '', 1, '17:00:00', '18:00:00', 'tidak jadi lembur', 'USER-9', '2020-09-11 21:46:35', 'USER-9', '2020-09-12 00:06:09', '', '0000-00-00 00:00:00', 0),
(44, 'Edit\r\nData', 'DSPL-14', 'SPL-9', 'KAR-16', 1, '16:00:00', '17:00:00', '', 2, '17:00:00', '19:00:00', 'jadinya dua jam', 'USER-9', '2020-09-11 21:46:35', 'USER-9', '2020-09-12 00:06:09', '', '0000-00-00 00:00:00', 0),
(45, 'Edit\r\nData', 'DSPL-13', 'SPL-9', 'KAR-15', 1, '16:00:00', '17:00:00', '', 1, '16:00:00', '17:00:00', 'sesuai', 'USER-9', '2020-09-11 21:46:35', 'USER-9', '2020-09-12 00:07:53', '', '0000-00-00 00:00:00', 0),
(46, 'Edit\r\nData', 'DSPL-14', 'SPL-9', 'KAR-16', 1, '16:00:00', '17:00:00', '', 1, '16:00:00', '17:00:00', 'sesuai', 'USER-9', '2020-09-11 21:46:35', 'USER-9', '2020-09-12 00:07:53', '', '0000-00-00 00:00:00', 0),
(47, 'Edit\r\nData', 'DSPL-15', 'SPL-10', 'KAR-17', 1, '16:00:00', '17:00:00', '', 2, '16:00:00', '18:00:00', 'Ada kerjaan extra', 'USER-9', '2020-09-11 21:46:57', 'USER-9', '2020-09-12 00:28:01', '', '0000-00-00 00:00:00', 0);

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
('ISJ20.000001', 'M2009.0001', 'DETPRO-1', 16, 'USER-3', '2020-09-24 15:11:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('ISJ20.000002', 'M2009.0002', 'DETPRO-1', 2, 'USER-3', '2020-09-24 15:12:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('ISJ20.000003', 'M2009.0003', 'DETPRO-5', 1, 'USER-3', '2020-09-24 15:24:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('ISJ20.000004', 'M2009.0004', 'DETPRO-1', 3, 'USER-3', '2020-09-24 16:25:14', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
(7, 'Insert Data', 'ISJ20.000001', 'M2009.0001', 'DETPRO-1', 16, 'USER-3', '2020-09-24 15:11:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(8, 'Insert Data', 'ISJ20.000002', 'M2009.0002', 'DETPRO-1', 2, 'USER-3', '2020-09-24 15:12:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(9, 'Insert Data', 'ISJ20.000003', 'M2009.0003', 'DETPRO-5', 1, 'USER-3', '2020-09-24 15:24:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(10, 'Insert Data', 'ISJ20.000004', 'M2009.0004', 'DETPRO-1', 3, 'USER-3', '2020-09-24 16:25:14', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
('JBT-14', 'ab', 'USER-1', '2020-09-08 09:30:03', 'USER-1', '2020-09-08 09:34:26', '', '0000-00-00 00:00:00', 0),
('JBT-15', 'cd', 'USER-1', '2020-09-08 09:36:15', 'USER-1', '2020-09-08 09:42:44', '', '0000-00-00 00:00:00', 0),
('JBT-16', 'aa', 'USER-1', '2020-09-09 00:39:19', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
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
(16, 'Insert Data', 'JBTKAR-29', 'KAR-25', 'SJBT-18', 'USER-1', '2020-09-11 15:10:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0');

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
(5, 'Insert\r\nData', 'JBT-16', 'aa', 'USER-1', '2020-09-09 00:39:19', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
(15, 'Insert Data', 'KAR-25', 'Komarudin', 0, 'USER-1', '2020-09-11 15:10:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `konsumsi_material`
--

CREATE TABLE `konsumsi_material` (
  `id_konsumsi_material` varchar(15) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `id_line` varchar(10) NOT NULL,
  `jumlah_material` int(11) NOT NULL,
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

INSERT INTO `konsumsi_material` (`id_konsumsi_material`, `id_produk`, `id_sub_jenis_material`, `id_line`, `jumlah_material`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('KONMAT-1', 'PRODUK-1', 'MAT-1', 'LINE-1', 1, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-10', 'PRODUK-3', 'MAT-3', 'LINE-3', 3, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-11', 'PRODUK-3', 'MAT-6', 'LINE-4', 3, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-12', 'PRODUK-3', 'MAT-7', 'LINE-4', 3, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-13', 'PRODUK-4', 'MAT-1', 'LINE-1', 1, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-14', 'PRODUK-4', 'MAT-5', 'LINE-4', 1, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-15', 'PRODUK-4', 'MAT-7', 'LINE-4', 1, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-2', 'PRODUK-1', 'MAT-3', 'LINE-3', 1, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-3', 'PRODUK-1', 'MAT-5', 'LINE-4', 1, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-4', 'PRODUK-1', 'MAT-7', 'LINE-4', 4, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-5', 'PRODUK-2', 'MAT-2', 'LINE-1', 1, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-6', 'PRODUK-2', 'MAT-4', 'LINE-3', 1, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-7', 'PRODUK-2', 'MAT-6', 'LINE-4', 1, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-8', 'PRODUK-3', 'MAT-1', 'LINE-1', 3, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KONMAT-9', 'PRODUK-3', 'MAT-2', 'LINE-1', 3, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `konsumsi_material`
--
DELIMITER $$
CREATE TRIGGER `edit_konsumsi_material` AFTER UPDATE ON `konsumsi_material` FOR EACH ROW INSERT INTO `konsumsi_material_logs`(`id_konsumsi_material_logs`,`keterangan_log`, `id_konsumsi_material`,`id_produk`, `id_sub_jenis_material`, `id_line`, `jumlah_material`,`user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Edit Data',NEW.id_konsumsi_material,NEW.id_produk,NEW.id_sub_jenis_material,NEW.id_line,NEW.jumlah_material,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_konsumsi_material` AFTER INSERT ON `konsumsi_material` FOR EACH ROW INSERT INTO `konsumsi_material_logs`(`id_konsumsi_material_logs`,`keterangan_log`, `id_konsumsi_material`,`id_produk`, `id_sub_jenis_material`, `id_line`, `jumlah_material`,`user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Insert Data',NEW.id_konsumsi_material,NEW.id_produk,NEW.id_sub_jenis_material,NEW.id_line,NEW.jumlah_material,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
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
  `jumlah_material` int(11) NOT NULL,
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

INSERT INTO `konsumsi_material_logs` (`id_konsumsi_material_logs`, `keterangan_log`, `id_konsumsi_material`, `id_produk`, `id_sub_jenis_material`, `id_line`, `jumlah_material`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
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
(20, 'Insert Data', 'KONMAT-15', 'PRODUK-4', 'MAT-7', 'LINE-4', 1, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
  `kode_material` varchar(10) NOT NULL,
  `nama_material` varchar(30) NOT NULL,
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
  `keterangan_masuk` varchar(100) NOT NULL,
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
  `tanggal_ambil` date NOT NULL,
  `jumlah_material` int(11) NOT NULL,
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
  `keterangan_pengeluaran` varchar(100) NOT NULL,
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
  `id_permintaan_material` varchar(10) NOT NULL,
  `kode_permintaan_material` varchar(30) NOT NULL,
  `id_purchase_order_customer` varchar(10) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `tanggal_permintaan` datetime NOT NULL,
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
('PRODUK-1', 'JENPROD-6', 'Floor Chair Midili', 200000, '001', 0, 'USER-1', '2020-09-07 17:41:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PRODUK-2', 'JENPROD-2', 'Mattress Reguller', 200000, '002', 1, 'USER-1', '2020-09-07 17:58:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PRODUK-3', 'JENPROD-2', 'RUMA EOV- H YL ', 500000, '003', 0, 'USER-1', '2020-09-07 18:07:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PRODUK-4', 'JENPROD-5', 'Karpet Polos', 100000, '004', 0, 'USER-1', '2020-09-07 18:20:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `produk`
--
DELIMITER $$
CREATE TRIGGER `edit_produk` AFTER UPDATE ON `produk` FOR EACH ROW INSERT INTO `produk_logs`(`id_produk_logs`, `keterangan_log`, `id_produk`,`id_jenis_produk`,`nama_produk`,`harga_produk`, `kode_produk`,`keterangan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Edit Data',NEW.id_produk,NEW.id_jenis_produk,NEW.nama_produk,NEW.harga_produk,NEW.kode_produk,NEW.keterangan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_produk` AFTER INSERT ON `produk` FOR EACH ROW INSERT INTO `produk_logs`(`id_produk_logs`, `keterangan_log`, `id_produk`,`id_jenis_produk`,`nama_produk`,`harga_produk`, `kode_produk`,`keterangan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Insert Data',NEW.id_produk,NEW.id_jenis_produk,NEW.nama_produk,NEW.harga_produk,NEW.kode_produk,NEW.keterangan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
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
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `tanggal`, `status_laporan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('P2009.0001', '2020-09-14', 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('P2009.0002', '2020-09-15', 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('P2009.0003', '2020-09-16', 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('P2009.0004', '2020-09-17', 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('P2009.0005', '2020-09-18', 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('P2009.0006', '2020-09-19', 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('P2009.0007', '2020-09-20', 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('P2009.0008', '2020-09-14', 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2009.0009', '2020-09-15', 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2009.0010', '2020-09-16', 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2009.0011', '2020-09-17', 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2009.0012', '2020-09-18', 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2009.0013', '2020-09-19', 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2009.0014', '2020-09-20', 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2009.0015', '2020-09-21', 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2009.0016', '2020-09-22', 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2009.0017', '2020-09-23', 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2009.0018', '2020-09-24', 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2009.0019', '2020-09-25', 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2009.0020', '2020-09-26', 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('P2009.0021', '2020-09-27', 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Triggers `produksi`
--
DELIMITER $$
CREATE TRIGGER `edit_produksi` AFTER UPDATE ON `produksi` FOR EACH ROW INSERT INTO `produksi_logs`(`id_produksi_logs`, `keterangan_log`, `id_produksi`, `tanggal`,`status_laporan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Edit Data',NEW.id_produksi,NEW.tanggal,NEW.status_laporan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_produksi` AFTER INSERT ON `produksi` FOR EACH ROW INSERT INTO `produksi_logs`(`id_produksi_logs`, `keterangan_log`, `id_produksi`, `tanggal`,`status_laporan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES (null,'Insert Data',NEW.id_produksi,NEW.tanggal,NEW.status_laporan,NEW.user_add,NEW.waktu_add,NEW.user_edit,NEW.waktu_edit,NEW.user_delete,NEW.waktu_delete,NEW.status_delete)
$$
DELIMITER ;

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
  `keterangan_laporan` varchar(50) NOT NULL,
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
('PL2009.000001', 'LINE-1', 'P2009.0001', 9, 32600, 0, '100.62', '0.00', '', 2, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000002', 'LINE-2', 'P2009.0001', 9, 300, 0, '0.93', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000003', 'LINE-3', 'P2009.0001', 90, 200, 0, '0.06', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000004', 'LINE-4', 'P2009.0001', 27, 300, 0, '0.31', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000005', 'LINE-1', 'P2009.0002', 9, 200, 0, '0.62', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000006', 'LINE-2', 'P2009.0002', 9, 300, 0, '0.93', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000007', 'LINE-3', 'P2009.0002', 90, 200, 0, '0.06', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000008', 'LINE-4', 'P2009.0002', 27, 300, 0, '0.31', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000009', 'LINE-1', 'P2009.0003', 9, 200, 0, '0.62', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000010', 'LINE-2', 'P2009.0003', 9, 300, 0, '0.93', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000011', 'LINE-3', 'P2009.0003', 90, 200, 0, '0.06', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000012', 'LINE-4', 'P2009.0003', 27, 300, 0, '0.31', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000013', 'LINE-1', 'P2009.0004', 9, 200, 0, '0.62', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000014', 'LINE-2', 'P2009.0004', 9, 300, 0, '0.93', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000015', 'LINE-3', 'P2009.0004', 90, 200, 0, '0.06', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000016', 'LINE-4', 'P2009.0004', 27, 300, 0, '0.31', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000017', 'LINE-1', 'P2009.0005', 9, 200, 0, '0.62', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000018', 'LINE-2', 'P2009.0005', 9, 300, 0, '0.93', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000019', 'LINE-3', 'P2009.0005', 90, 200, 0, '0.06', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000020', 'LINE-4', 'P2009.0005', 27, 300, 0, '0.31', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000021', 'LINE-1', 'P2009.0006', 9, 200, 0, '0.62', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000022', 'LINE-2', 'P2009.0006', 9, 300, 0, '0.93', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000023', 'LINE-3', 'P2009.0006', 90, 200, 0, '0.06', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000024', 'LINE-4', 'P2009.0006', 27, 300, 0, '0.31', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000025', 'LINE-1', 'P2009.0007', 9, 100, 0, '0.31', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000026', 'LINE-2', 'P2009.0007', 9, 200, 0, '0.62', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000027', 'LINE-3', 'P2009.0007', 90, 100, 0, '0.03', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000028', 'LINE-4', 'P2009.0007', 27, 200, 0, '0.21', '0.00', '', 1, 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
('PL2009.000029', 'LINE-1', 'P2009.0008', 9, 900, 0, '2.78', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000030', 'LINE-2', 'P2009.0008', 9, 900, 0, '2.78', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000031', 'LINE-3', 'P2009.0008', 90, 300, 0, '0.09', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000032', 'LINE-4', 'P2009.0008', 27, 900, 0, '0.93', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000033', 'LINE-1', 'P2009.0009', 9, 900, 0, '2.78', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000034', 'LINE-2', 'P2009.0009', 9, 900, 0, '2.78', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000035', 'LINE-3', 'P2009.0009', 90, 300, 0, '0.09', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000036', 'LINE-4', 'P2009.0009', 27, 900, 0, '0.93', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000037', 'LINE-1', 'P2009.0010', 9, 900, 0, '2.78', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000038', 'LINE-2', 'P2009.0010', 9, 900, 0, '2.78', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000039', 'LINE-3', 'P2009.0010', 90, 300, 0, '0.09', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000040', 'LINE-4', 'P2009.0010', 27, 900, 0, '0.93', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000041', 'LINE-1', 'P2009.0011', 9, 900, 0, '2.78', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000042', 'LINE-2', 'P2009.0011', 9, 900, 0, '2.78', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000043', 'LINE-3', 'P2009.0011', 90, 300, 0, '0.09', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000044', 'LINE-4', 'P2009.0011', 27, 900, 0, '0.93', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000045', 'LINE-1', 'P2009.0012', 9, 900, 0, '2.78', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000046', 'LINE-2', 'P2009.0012', 9, 900, 0, '2.78', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000047', 'LINE-3', 'P2009.0012', 90, 300, 0, '0.09', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000048', 'LINE-4', 'P2009.0012', 27, 900, 0, '0.93', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000049', 'LINE-1', 'P2009.0013', 9, 900, 0, '2.78', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000050', 'LINE-2', 'P2009.0013', 9, 900, 0, '2.78', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000051', 'LINE-3', 'P2009.0013', 90, 300, 0, '0.09', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000052', 'LINE-4', 'P2009.0013', 27, 900, 0, '0.93', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000053', 'LINE-1', 'P2009.0014', 9, 900, 0, '2.78', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000054', 'LINE-2', 'P2009.0014', 9, 900, 0, '2.78', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000055', 'LINE-3', 'P2009.0014', 90, 300, 0, '0.09', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000056', 'LINE-4', 'P2009.0014', 27, 900, 0, '0.93', '0.00', '', 1, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000057', 'LINE-1', 'P2009.0015', 9, 3500, 0, '10.80', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000058', 'LINE-2', 'P2009.0015', 9, 3500, 0, '10.80', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000059', 'LINE-3', 'P2009.0015', 90, 3500, 0, '1.08', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000060', 'LINE-4', 'P2009.0015', 27, 3500, 0, '3.60', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000061', 'LINE-1', 'P2009.0016', 9, 3700, 0, '11.42', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000062', 'LINE-2', 'P2009.0016', 9, 3700, 0, '11.42', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000063', 'LINE-3', 'P2009.0016', 90, 3700, 0, '1.14', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000064', 'LINE-4', 'P2009.0016', 27, 3700, 0, '3.81', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000065', 'LINE-1', 'P2009.0017', 9, 3900, 0, '12.04', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000066', 'LINE-2', 'P2009.0017', 9, 3900, 0, '12.04', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000067', 'LINE-3', 'P2009.0017', 90, 3900, 0, '1.20', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000068', 'LINE-4', 'P2009.0017', 27, 3900, 0, '4.01', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000069', 'LINE-1', 'P2009.0018', 9, 3800, 0, '11.73', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000070', 'LINE-2', 'P2009.0018', 9, 3800, 0, '11.73', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000071', 'LINE-3', 'P2009.0018', 90, 3800, 0, '1.17', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000072', 'LINE-4', 'P2009.0018', 27, 3800, 0, '3.91', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000073', 'LINE-1', 'P2009.0019', 9, 4000, 0, '12.35', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000074', 'LINE-2', 'P2009.0019', 9, 4000, 0, '12.35', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000075', 'LINE-3', 'P2009.0019', 90, 4000, 0, '1.23', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000076', 'LINE-4', 'P2009.0019', 27, 4000, 0, '4.12', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000077', 'LINE-1', 'P2009.0020', 9, 3700, 0, '11.42', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000078', 'LINE-2', 'P2009.0020', 9, 3700, 0, '11.42', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000079', 'LINE-3', 'P2009.0020', 90, 3700, 0, '1.14', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000080', 'LINE-4', 'P2009.0020', 27, 3700, 0, '3.81', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000081', 'LINE-1', 'P2009.0021', 9, 3600, 0, '11.11', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000082', 'LINE-2', 'P2009.0021', 9, 3600, 0, '11.11', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000083', 'LINE-3', 'P2009.0021', 90, 3600, 0, '1.11', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('PL2009.000084', 'LINE-4', 'P2009.0021', 27, 3600, 0, '3.70', '0.00', '', 1, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
(398, 'Insert Data', 'P2009.0001', '2020-09-21', 0, 'USER-7', '2020-09-16 14:44:42', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(399, 'Insert Data', 'P2009.0002', '2020-09-22', 0, 'USER-7', '2020-09-16 14:44:42', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(400, 'Insert Data', 'P2009.0003', '2020-09-23', 0, 'USER-7', '2020-09-16 14:44:42', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(401, 'Insert Data', 'P2009.0004', '2020-09-24', 0, 'USER-7', '2020-09-16 14:44:42', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(402, 'Insert Data', 'P2009.0005', '2020-09-25', 0, 'USER-7', '2020-09-16 14:44:42', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(403, 'Insert Data', 'P2009.0006', '2020-09-26', 0, 'USER-7', '2020-09-16 14:44:42', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(404, 'Insert Data', 'P2009.0007', '2020-09-27', 0, 'USER-7', '2020-09-16 14:44:42', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(405, 'Insert Data', 'P2009.0008', '2020-09-28', 0, 'USER-7', '2020-09-16 15:35:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(406, 'Insert Data', 'P2009.0009', '2020-09-29', 0, 'USER-7', '2020-09-16 15:35:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(407, 'Insert Data', 'P2009.0010', '2020-09-30', 0, 'USER-7', '2020-09-16 15:35:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(408, 'Insert Data', 'P2010.0001', '2020-10-01', 0, 'USER-7', '2020-09-16 15:35:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(409, 'Insert Data', 'P2010.0002', '2020-10-02', 0, 'USER-7', '2020-09-16 15:35:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(410, 'Insert Data', 'P2010.0003', '2020-10-03', 0, 'USER-7', '2020-09-16 15:35:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(411, 'Insert Data', 'P2010.0004', '2020-10-04', 0, 'USER-7', '2020-09-16 15:35:07', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(412, 'Insert Data', 'P2010.0005', '2020-10-05', 0, 'USER-7', '2020-09-16 17:50:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(413, 'Insert Data', 'P2010.0006', '2020-10-06', 0, 'USER-7', '2020-09-16 17:50:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(414, 'Insert Data', 'P2010.0007', '2020-10-07', 0, 'USER-7', '2020-09-16 17:50:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(415, 'Insert Data', 'P2010.0008', '2020-10-08', 0, 'USER-7', '2020-09-16 17:50:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(416, 'Insert Data', 'P2010.0009', '2020-10-09', 0, 'USER-7', '2020-09-16 17:50:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(417, 'Insert Data', 'P2010.0010', '2020-10-10', 0, 'USER-7', '2020-09-16 17:50:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(418, 'Insert Data', 'P2010.0011', '2020-10-11', 0, 'USER-7', '2020-09-16 17:50:36', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(419, 'Insert Data', 'P2009.0001', '2020-09-14', 0, 'USER-7', '2020-09-16 18:47:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(420, 'Insert Data', 'P2009.0002', '2020-09-15', 0, 'USER-7', '2020-09-16 18:47:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(421, 'Insert Data', 'P2009.0003', '2020-09-16', 0, 'USER-7', '2020-09-16 18:47:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(422, 'Insert Data', 'P2009.0004', '2020-09-17', 0, 'USER-7', '2020-09-16 18:47:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(423, 'Insert Data', 'P2009.0005', '2020-09-18', 0, 'USER-7', '2020-09-16 18:47:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(424, 'Insert Data', 'P2009.0006', '2020-09-19', 0, 'USER-7', '2020-09-16 18:47:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(425, 'Insert Data', 'P2009.0007', '2020-09-20', 0, 'USER-7', '2020-09-16 18:47:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(426, 'Edit Data', 'P2009.0001', '2020-09-14', 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
(427, 'Edit Data', 'P2009.0002', '2020-09-15', 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
(428, 'Edit Data', 'P2009.0003', '2020-09-16', 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
(429, 'Edit Data', 'P2009.0004', '2020-09-17', 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
(430, 'Edit Data', 'P2009.0005', '2020-09-18', 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
(431, 'Edit Data', 'P2009.0006', '2020-09-19', 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
(432, 'Edit Data', 'P2009.0007', '2020-09-20', 0, 'USER-7', '2020-09-16 18:47:45', 'USER-7', '2020-09-16 19:39:35', '', '0000-00-00 00:00:00', 1),
(433, 'Insert Data', 'P2009.0008', '2020-09-14', 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(434, 'Insert Data', 'P2009.0009', '2020-09-15', 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(435, 'Insert Data', 'P2009.0010', '2020-09-16', 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(436, 'Insert Data', 'P2009.0011', '2020-09-17', 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(437, 'Insert Data', 'P2009.0012', '2020-09-18', 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(438, 'Insert Data', 'P2009.0013', '2020-09-19', 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(439, 'Insert Data', 'P2009.0014', '2020-09-20', 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(440, 'Insert Data', 'P2009.0015', '2020-09-21', 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(441, 'Insert Data', 'P2009.0016', '2020-09-22', 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(442, 'Insert Data', 'P2009.0017', '2020-09-23', 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(443, 'Insert Data', 'P2009.0018', '2020-09-24', 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(444, 'Insert Data', 'P2009.0019', '2020-09-25', 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(445, 'Insert Data', 'P2009.0020', '2020-09-26', 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(446, 'Insert Data', 'P2009.0021', '2020-09-27', 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
  `tanggal_po` datetime NOT NULL,
  `harga_sebelum_pajak` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `total_harga_akhir` int(11) NOT NULL,
  `status_po` int(11) NOT NULL,
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
-- Table structure for table `purchase_order_supplier`
--

CREATE TABLE `purchase_order_supplier` (
  `id_purchase_order_supplier` varchar(10) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `tanggal_po` datetime NOT NULL,
  `harga_sebelum_pajak` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `total_harga_akhir` int(11) NOT NULL,
  `status_po` int(11) NOT NULL,
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
('REK-2', 'BANK-2', '020202', 'PT. Maju Bersama Persada Dayamu', 'Alam Sutera', 'USER-1', '2020-09-08 23:37:34', 'USER-1', '2020-09-08 23:39:26', '', '0000-00-00 00:00:00', 1);

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
(8, 'Edit Data', 'REK-2', 'BANK-2', '020202', 'PT. Maju Bersama Persada Dayamu', 'Alam Sutera', 'USER-1', '2020-09-08 23:37:34', 'USER-1', '2020-09-08 23:39:26', '', '0000-00-00 00:00:00', 1);

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
('SJBT-20', 'JBT-16', 'DEPT-8', 'USER-1', '2020-09-09 01:34:23', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
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
  `jumlah_material` int(11) NOT NULL,
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
('M2009.0001', 'PO-6', '', '2020-09-24', '1', 'Laurencia', 'Gosend', 'pertama                                    ', 0, 'USER-3', '2020-09-24 15:11:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('M2009.0002', 'PO-1', '', '2020-09-24', '111', 'Laurencia', 'Gosend', '111                                    ', 0, 'USER-3', '2020-09-24 15:12:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('M2009.0003', 'PO-3', '', '2020-09-24', 'aa', 'aa', 'aa', 'aa                     ', 0, 'USER-3', '2020-09-24 15:24:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('M2009.0004', 'PO-6', '', '2020-09-24', 'B2001', 'Laurencia', 'Gosend', 'ke 2                                    ', 0, 'USER-3', '2020-09-24 16:25:14', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
(8, 'Insert Data', 'M2009.0001', 'PO-6', '', '2020-09-24', '1', 'Laurencia', 'Gosend', 'pertama                                    ', 0, 'USER-3', '2020-09-24 15:11:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(9, 'Insert Data', 'M2009.0002', 'PO-1', '', '2020-09-24', '111', 'Laurencia', 'Gosend', '111                                    ', 0, 'USER-3', '2020-09-24 15:12:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(10, 'Insert Data', 'M2009.0003', 'PO-3', '', '2020-09-24', 'aa', 'aa', 'aa', 'aa                     ', 0, 'USER-3', '2020-09-24 15:24:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(11, 'Insert Data', 'M2009.0004', 'PO-6', '', '2020-09-24', 'B2001', 'Laurencia', 'Gosend', 'ke 2                                    ', 0, 'USER-3', '2020-09-24 16:25:14', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
('SPL-1', 'LINE-1', '2020-09-19', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-10', 'LINE-2', '2020-09-26', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-11', 'LINE-3', '2020-09-26', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-12', 'LINE-4', '2020-09-26', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-13', 'LINE-1', '2020-09-27', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-14', 'LINE-2', '2020-09-27', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-15', 'LINE-3', '2020-09-27', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-16', 'LINE-4', '2020-09-27', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-2', 'LINE-2', '2020-09-19', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-3', 'LINE-3', '2020-09-19', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-4', 'LINE-4', '2020-09-19', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-5', 'LINE-1', '2020-09-20', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-6', 'LINE-2', '2020-09-20', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-7', 'LINE-3', '2020-09-20', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-8', 'LINE-4', '2020-09-20', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SPL-9', 'LINE-1', '2020-09-26', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
(237, 'Insert Data', 'SPL-1', 'LINE-1', '2020-09-19', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(238, 'Insert Data', 'SPL-2', 'LINE-2', '2020-09-19', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(239, 'Insert Data', 'SPL-3', 'LINE-3', '2020-09-19', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(240, 'Insert Data', 'SPL-4', 'LINE-4', '2020-09-19', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(241, 'Insert Data', 'SPL-5', 'LINE-1', '2020-09-20', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(242, 'Insert Data', 'SPL-6', 'LINE-2', '2020-09-20', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(243, 'Insert Data', 'SPL-7', 'LINE-3', '2020-09-20', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(244, 'Insert Data', 'SPL-8', 'LINE-4', '2020-09-20', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-16 19:48:24', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(245, 'Insert Data', 'SPL-9', 'LINE-1', '2020-09-26', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(246, 'Insert Data', 'SPL-10', 'LINE-2', '2020-09-26', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(247, 'Insert Data', 'SPL-11', 'LINE-3', '2020-09-26', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(248, 'Insert Data', 'SPL-12', 'LINE-4', '2020-09-26', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(249, 'Insert Data', 'SPL-13', 'LINE-1', '2020-09-27', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(250, 'Insert Data', 'SPL-14', 'LINE-2', '2020-09-27', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(251, 'Insert Data', 'SPL-15', 'LINE-3', '2020-09-27', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
(252, 'Insert Data', 'SPL-16', 'LINE-4', '2020-09-27', 'Hari Libur', '', '', 0, 0, 'USER-7', '2020-09-21 13:42:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
('TTPN-10', 'Rabu', 'Hari Produksi', 'USER-1', '2020-09-09 01:49:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('TTPN-11', 'Kamis', 'Hari Produksi', 'USER-1', '2020-09-09 01:49:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('TTPN-12', 'Jumat', 'Hari Produksi', 'USER-1', '2020-09-09 01:49:46', 'USER-1', '2020-09-09 01:58:09', '', '0000-00-00 00:00:00', 0),
('TTPN-13', 'Sabtu', 'Hari Libur', 'USER-1', '2020-09-09 01:49:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('TTPN-14', 'Minggu', 'Hari Libur', 'USER-1', '2020-09-09 01:50:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
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
(18, 'Edit Data', 'TTPN-12', 'Jumat', 'Hari Produksi', 'USER-1', '2020-09-09 01:49:46', 'USER-1', '2020-09-09 01:58:09', '', '0000-00-00 00:00:00', 0);

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
('USER-12', 'KAR-12', 'xxx@gmail.com', '12345678', 'USER-1', '2020-09-08 21:12:17', 'USER-1', '2020-09-09 00:28:15', '', '0000-00-00 00:00:00', 0),
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
(8, 'Edit Data', 'USER-12', 'KAR-12', 'xxx@gmail.com', '12345678', 'USER-1', '2020-09-08 21:12:17', 'USER-1', '2020-09-09 00:28:15', '', '0000-00-00 00:00:00', 0);

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
-- Indexes for table `produk_logs`
--
ALTER TABLE `produk_logs`
  ADD PRIMARY KEY (`id_produk_logs`);

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
-- Indexes for table `spesifikasi_jabatan`
--
ALTER TABLE `spesifikasi_jabatan`
  ADD PRIMARY KEY (`id_spesifikasi_jabatan`);

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
  MODIFY `id_bank_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bpbj_logs`
--
ALTER TABLE `bpbj_logs`
  MODIFY `id_bpbj_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cycle_time_logs`
--
ALTER TABLE `cycle_time_logs`
  MODIFY `id_cycle_time_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `departemen_logs`
--
ALTER TABLE `departemen_logs`
  MODIFY `id_departemen_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_bpbj_logs`
--
ALTER TABLE `detail_bpbj_logs`
  MODIFY `id_detail_bpbj_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `detail_item_surat_jalan_logs`
--
ALTER TABLE `detail_item_surat_jalan_logs`
  MODIFY `id_detail_item_surat_jalan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `detail_produk_logs`
--
ALTER TABLE `detail_produk_logs`
  MODIFY `id_detail_produk_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `detail_surat_perintah_lembur_logs`
--
ALTER TABLE `detail_surat_perintah_lembur_logs`
  MODIFY `id_detail_surat_perintah_lembur_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `invoice_logs`
--
ALTER TABLE `invoice_logs`
  MODIFY `id_invoice_logs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_invoice_logs`
--
ALTER TABLE `item_invoice_logs`
  MODIFY `id_item_invoice_logs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_surat_jalan_logs`
--
ALTER TABLE `item_surat_jalan_logs`
  MODIFY `id_item_surat_jalan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jabatan_karyawan_logs`
--
ALTER TABLE `jabatan_karyawan_logs`
  MODIFY `id_jabatan_karyawan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jabatan_logs`
--
ALTER TABLE `jabatan_logs`
  MODIFY `id_jabatan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_produk_logs`
--
ALTER TABLE `jenis_produk_logs`
  MODIFY `id_jenis_produk_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `karyawan_logs`
--
ALTER TABLE `karyawan_logs`
  MODIFY `id_karyawan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `konsumsi_material_logs`
--
ALTER TABLE `konsumsi_material_logs`
  MODIFY `id_konsumsi_material_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `line_logs`
--
ALTER TABLE `line_logs`
  MODIFY `id_line_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produksi_logs`
--
ALTER TABLE `produksi_logs`
  MODIFY `id_produksi_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=447;

--
-- AUTO_INCREMENT for table `produk_logs`
--
ALTER TABLE `produk_logs`
  MODIFY `id_produk_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rekening_logs`
--
ALTER TABLE `rekening_logs`
  MODIFY `id_rekening_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `surat_jalan_logs`
--
ALTER TABLE `surat_jalan_logs`
  MODIFY `id_surat_jalan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `surat_perintah_lembur_logs`
--
ALTER TABLE `surat_perintah_lembur_logs`
  MODIFY `id_surat_perintah_lembur_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `tetapan_logs`
--
ALTER TABLE `tetapan_logs`
  MODIFY `id_tetapan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ukuran_produk_logs`
--
ALTER TABLE `ukuran_produk_logs`
  MODIFY `id_ukuran_produk_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id_user_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `warna_logs`
--
ALTER TABLE `warna_logs`
  MODIFY `id_warna_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
