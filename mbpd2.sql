-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 04:25 PM
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
  `nama_bank` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`) VALUES
('BANK-1', 'BCA'),
('BANK-2', 'BCA'),
('BANK-3', 'OCBC NISP'),
('BANK-4', 'Mandiri'),
('BANK-5', 'BNI'),
('BANK-6', 'CIMB NIAGA'),
('BANK-7', 'BNI'),
('BANK-8', 'Mandiri');

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
  `nama_bank` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_logs`
--

INSERT INTO `bank_logs` (`id_bank_logs`, `keterangan_log`, `id_bank`, `nama_bank`) VALUES
(1, 'Insert Data', 'BANK-1', 'BCA'),
(2, 'Edit Data', 'BANK-1', 'BCAA'),
(3, 'Edit Data', 'BANK-1', 'BCA'),
(4, 'Edit Data', 'BANK-1', 'BCA'),
(5, 'Insert Data', 'BANK-2', 'BCA'),
(6, 'Insert Data', 'BANK-3', 'OCBS NISP'),
(7, 'Edit Data', 'BANK-3', 'OCBC NISP'),
(8, 'Insert Data', 'BANK-4', 'Mandiri'),
(9, 'Edit Data', 'BANK-4', 'Mandiria'),
(10, 'Edit Data', 'BANK-4', 'Mandiri'),
(11, 'Edit Data', 'BANK-4', 'Mandiri'),
(12, 'Insert Data', 'BANK-5', 'BNI'),
(13, 'Edit Data', 'BANK-5', 'BNIa'),
(14, 'Edit Data', 'BANK-5', 'BNI'),
(15, 'Edit Data', 'BANK-5', 'BNI'),
(16, 'Edit Data', 'BANK-2', 'BCAa'),
(17, 'Edit Data', 'BANK-2', 'BCA'),
(18, 'Insert Data', 'BANK-6', 'CIMB NIAGA'),
(19, 'Insert Data', 'BANK-7', 'BNI'),
(20, 'Insert Data', 'BANK-8', 'Mandiri');

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
  `keterangan` varchar(500) DEFAULT NULL,
  `status_bpbd` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bpbj`
--

CREATE TABLE `bpbj` (
  `id_bpbj` varchar(15) NOT NULL,
  `no_bpbj` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `status_bpbj` int(1) NOT NULL
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
  `email_customer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat_customer`, `no_telp_customer`, `email_customer`) VALUES
('CUST-1', 'INOAC', 'Tangerang', '085256789011', 'inoac@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cycle_time`
--

CREATE TABLE `cycle_time` (
  `id_cycle_time` varchar(10) NOT NULL,
  `id_line` varchar(10) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `cycle_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cycle_time`
--

INSERT INTO `cycle_time` (`id_cycle_time`, `id_line`, `id_produk`, `cycle_time`) VALUES
('CT-1', 'LINE-1', 'PRDK-1', 120),
('CT-10', 'LINE-2', 'PRDK-3', 360),
('CT-11', 'LINE-4', 'PRDK-3', 300),
('CT-12', 'LINE-1', 'PRDK-4', 180),
('CT-13', 'LINE-2', 'PRDK-4', 240),
('CT-14', 'LINE-4', 'PRDK-4', 240),
('CT-15', 'LINE-1', 'PRDK-5', 300),
('CT-16', 'LINE-2', 'PRDK-5', 300),
('CT-17', 'LINE-4', 'PRDK-5', 300),
('CT-2', 'LINE-2', 'PRDK-1', 120),
('CT-3', 'LINE-3', 'PRDK-1', 240),
('CT-4', 'LINE-4', 'PRDK-1', 240),
('CT-5', 'LINE-1', 'PRDK-2', 120),
('CT-6', 'LINE-2', 'PRDK-2', 120),
('CT-7', 'LINE-3', 'PRDK-2', 240),
('CT-8', 'LINE-4', 'PRDK-2', 240),
('CT-9', 'LINE-1', 'PRDK-3', 240);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_note`
--

CREATE TABLE `delivery_note` (
  `id_delivery_note` varchar(10) NOT NULL,
  `kode_delivery_note` varchar(20) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `tanggal_dn` date NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `status_pengesahan` int(11) NOT NULL,
  `dibuat_oleh` varchar(10) NOT NULL,
  `disetujui_oleh` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` varchar(10) NOT NULL,
  `nama_departemen` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `nama_departemen`) VALUES
('DEPT-1', 'x'),
('DEPT-10', 'Material'),
('DEPT-11', 'Material'),
('DEPT-12', 'Qualitys'),
('DEPT-13', 'Quality'),
('DEPT-2', 'Management'),
('DEPT-3', 'Produksi'),
('DEPT-4', 'Purchasing'),
('DEPT-5', 'Finish Good'),
('DEPT-6', 'Research & Development'),
('DEPT-7', 'Material'),
('DEPT-8', 'Quality'),
('DEPT-9', 'Quality');

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
  `nama_departemen` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen_logs`
--

INSERT INTO `departemen_logs` (`id_departemen_logs`, `keterangan_log`, `id_departemen`, `nama_departemen`) VALUES
(13, 'Insert Data', 'DEPT-2', 'Management'),
(14, 'Insert Data', 'DEPT-3', 'Produksi'),
(15, 'Insert Data', 'DEPT-4', 'Purchasing'),
(16, 'Insert Data', 'DEPT-5', 'Finish Good'),
(17, 'Insert Data', 'DEPT-6', 'Research & Development'),
(18, 'Insert Data', 'DEPT-7', 'Material'),
(19, 'Insert Data', 'DEPT-8', 'Quality'),
(20, 'Edit Data', 'DEPT-8', 'Quality'),
(21, 'Insert Data', 'DEPT-9', 'Quality'),
(22, 'Edit Data', 'DEPT-9', 'Quality'),
(23, 'Edit Data', 'DEPT-7', 'Material'),
(24, 'Insert Data', 'DEPT-10', 'Material'),
(25, 'Edit Data', 'DEPT-10', 'Material'),
(26, 'Insert Data', 'DEPT-11', 'Material'),
(27, 'Insert Data', 'DEPT-12', 'Quality'),
(28, 'Edit Data', 'DEPT-12', 'Qualitys'),
(29, 'Edit Data', 'DEPT-12', 'Qualitys'),
(30, 'Insert Data', 'DEPT-13', 'Quality');

-- --------------------------------------------------------

--
-- Table structure for table `detail_bpbj`
--

CREATE TABLE `detail_bpbj` (
  `id_detail_bpbj` varchar(15) NOT NULL,
  `id_bpbj` varchar(15) NOT NULL,
  `id_detail_produk` varchar(10) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `jumlah_terkirim` int(11) DEFAULT NULL,
  `status_detail_bpbj` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_delivery_note`
--

CREATE TABLE `detail_delivery_note` (
  `id_detail_delivery_note` varchar(10) NOT NULL,
  `id_delivery_note` varchar(10) NOT NULL,
  `id_detail_purchase_order_supplier` varchar(10) NOT NULL,
  `id_invoice` varchar(10) DEFAULT NULL,
  `jumlah_diminta` int(11) NOT NULL,
  `jumlah_aktual` int(11) DEFAULT NULL,
  `total_harga_aktual` int(11) DEFAULT NULL,
  `remark` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_item_bpbd`
--

CREATE TABLE `detail_item_bpbd` (
  `id_detail_item_bpbd` varchar(17) NOT NULL,
  `id_item_bpbd` varchar(15) NOT NULL,
  `id_item_surat_jalan` varchar(15) NOT NULL,
  `jumlah_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_item_surat_jalan`
--

CREATE TABLE `detail_item_surat_jalan` (
  `id_detail_item_surat_jalan` varchar(15) NOT NULL,
  `id_item_surat_jalan` varchar(15) NOT NULL,
  `id_detail_bpbj` varchar(15) NOT NULL,
  `jumlah_produk` int(11) NOT NULL
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
  `status_detail_permintaan_material` int(1) NOT NULL
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
  `keterangan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_produk`
--

INSERT INTO `detail_produk` (`id_detail_produk`, `id_produk`, `id_ukuran_produk`, `id_warna`, `kode_produk`, `keterangan`) VALUES
('DETPRO-1', 'PRDK-1', '', '', 'N-AFN00-Z010.0L', 3),
('DETPRO-2', 'PRDK-2', '', '', 'N-AFN00-Z009.0L', 3),
('DETPRO-3', 'PRDK-3', '', 'WARNA-1', 'N-BAG02-Z008.0LR', 2),
('DETPRO-4', 'PRDK-4', 'UKPROD-5', 'WARNA-1', 'N-BOA00-Z005.0L', 0),
('DETPRO-5', 'PRDK-4', 'UKPROD-5', 'WARNA-2', 'N-BOA00-Z001.0L', 0),
('DETPRO-6', 'PRDK-4', 'UKPROD-5', 'WARNA-3', 'N-BOA00-Z004.0L', 0),
('DETPRO-7', 'PRDK-5', '', 'WARNA-1', 'N-SOF01.001', 2),
('DETPRO-8', 'PRDK-5', '', 'WARNA-2', 'N-SOF01.002', 2),
('DETPRO-9', 'PRDK-5', '', 'WARNA-5', 'N-SOF01.003', 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_produksi_line`
--

CREATE TABLE `detail_produksi_line` (
  `id_detail_produksi_line` varchar(17) NOT NULL,
  `id_detail_purchase_order` varchar(10) NOT NULL,
  `id_produksi_line` varchar(15) NOT NULL,
  `jumlah_item_perencanaan` int(11) NOT NULL,
  `jumlah_item_aktual` int(11) DEFAULT NULL,
  `waktu_proses_perencanaan` int(11) NOT NULL,
  `waktu_proses_aktual` int(11) DEFAULT NULL,
  `keterangan_aktual` varchar(50) DEFAULT NULL,
  `status_perencanaan` int(1) NOT NULL,
  `status_aktual` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_produksi_tertunda`
--

CREATE TABLE `detail_produksi_tertunda` (
  `id_detail_produksi_tertunda` varchar(21) NOT NULL,
  `id_produksi_tertunda` varchar(20) NOT NULL,
  `id_detail_produksi_line` varchar(17) NOT NULL,
  `jumlah_perencanaan` int(11) NOT NULL
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
  `harga_satuan` decimal(11,2) NOT NULL,
  `total_harga` decimal(11,2) NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `remark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_purchase_order_customer`
--

INSERT INTO `detail_purchase_order_customer` (`id_detail_purchase_order_customer`, `id_purchase_order_customer`, `id_detail_produk`, `jumlah_produk`, `harga_satuan`, `total_harga`, `tanggal_penerimaan`, `remark`) VALUES
('DPOC-1', 'POC-1', 'DETPRO-2', 150, '116555.00', '17483250.00', '2021-01-09', ''),
('DPOC-2', 'POC-1', 'DETPRO-6', 300, '315933.00', '94779900.00', '2021-01-07', 'tes'),
('DPOC-3', 'POC-2', 'DETPRO-1', 200, '116536.00', '23307200.00', '2021-01-15', ''),
('DPOC-4', 'POC-2', 'DETPRO-2', 200, '116555.00', '23311000.00', '2021-01-15', ''),
('DPOC-5', 'POC-2', 'DETPRO-3', 10, '1283922.00', '12839220.00', '2021-01-15', '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_purchase_order_supplier`
--

CREATE TABLE `detail_purchase_order_supplier` (
  `id_detail_purchase_order_supplier` varchar(10) NOT NULL,
  `id_purchase_order_supplier` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `jumlah_material` int(11) NOT NULL,
  `harga_satuan` decimal(11,2) NOT NULL,
  `harga_total` decimal(11,2) NOT NULL,
  `status_detail_po` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_purchase_order_supplier`
--

INSERT INTO `detail_purchase_order_supplier` (`id_detail_purchase_order_supplier`, `id_purchase_order_supplier`, `id_sub_jenis_material`, `jumlah_material`, `harga_satuan`, `harga_total`, `status_detail_po`) VALUES
('DPOS-1', 'POS-1', 'SUBJM-4', 15, '3000.00', '45000.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_supplier`
--

CREATE TABLE `detail_supplier` (
  `id_detail_supplier` varchar(10) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `harga_material` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_supplier`
--

INSERT INTO `detail_supplier` (`id_detail_supplier`, `id_supplier`, `id_sub_jenis_material`, `harga_material`) VALUES
('DSUP-1', 'SUP-1', 'SUBJM-10', 60000),
('DSUP-2', 'SUP-1', 'SUBJM-8', 2000),
('DSUP-3', 'SUP-2', 'SUBJM-4', 3000);

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
  `keterangan_plan` varchar(200) DEFAULT NULL,
  `aktual_lembur` int(2) DEFAULT NULL,
  `waktu_in_aktual` time DEFAULT NULL,
  `waktu_out_aktual` time DEFAULT NULL,
  `keterangan_aktual` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_surat_perintah_lembur`
--

INSERT INTO `detail_surat_perintah_lembur` (`id_detail_surat_perintah_lembur`, `id_surat_perintah_lembur`, `id_karyawan`, `planning_lembur`, `waktu_in_plan`, `waktu_out_plan`, `keterangan_plan`, `aktual_lembur`, `waktu_in_aktual`, `waktu_out_aktual`, `keterangan_aktual`) VALUES
('DSPL-1', 'SPL-1', 'KAR-13', 1, '15:01:00', '16:01:00', '', NULL, NULL, NULL, NULL),
('DSPL-2', 'SPL-1', 'KAR-14', 1, '16:30:00', '17:30:00', '', 2, '16:00:00', '18:00:00', 'mulai lebih dulu'),
('DSPL-3', 'SPL-1', 'KAR-45', 1, '16:00:00', '17:00:00', '', 2, '16:00:00', '18:00:00', 'lembur dua jam');

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
  `discount_rate` decimal(11,2) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `ppn_rate` decimal(11,2) NOT NULL,
  `ppn` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `status_invoice` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_in`
--

CREATE TABLE `invoice_in` (
  `id_invoice_in` varchar(10) NOT NULL,
  `nomor_invoice_in` varchar(30) NOT NULL,
  `id_purchase_order_supplier` varchar(30) NOT NULL,
  `nomor_fp` varchar(30) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tanggal_terima_invoice` date NOT NULL,
  `tanggal_pelunasan` date DEFAULT NULL,
  `status_lunas` int(1) NOT NULL,
  `pajak` varchar(50) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `item_bpbd`
--

CREATE TABLE `item_bpbd` (
  `id_item_bpbd` varchar(15) NOT NULL,
  `id_bpbd` varchar(15) NOT NULL,
  `id_detail_produk` varchar(10) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
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
  `total_price` int(11) NOT NULL
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
  `jumlah_keluar` int(11) DEFAULT NULL,
  `status_keluar` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
('JBT-1', 'x'),
('JBT-10', 'PPIC'),
('JBT-11', 'Staff Line Cutting'),
('JBT-12', 'Staff Line Bonding'),
('JBT-13', 'Staff Line Sewing'),
('JBT-14', 'Staff Line Assy'),
('JBT-15', 'Engineering'),
('JBT-16', 'Engineering'),
('JBT-17', 'Operator Gudang'),
('JBT-18', 'Operator Gudang'),
('JBT-19', 'Engineering'),
('JBT-2', 'Direktur'),
('JBT-20', 'Operator Gudang'),
('JBT-21', 'Engineerings'),
('JBT-3', 'Manager'),
('JBT-4', 'Admin'),
('JBT-5', 'Operator Gudang'),
('JBT-6', 'PIC Line Cutting'),
('JBT-7', 'PIC Line Bonding'),
('JBT-8', 'PIC Line Sewing'),
('JBT-9', 'PIC Line Assy');

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
  `id_spesifikasi_jabatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_karyawan`
--

INSERT INTO `jabatan_karyawan` (`id_jabatan_karyawan`, `id_karyawan`, `id_spesifikasi_jabatan`) VALUES
('JBTKAR-1', 'KAR-1', 'SJBT-1'),
('JBTKAR-10', 'KAR-9', 'SJBT-7'),
('JBTKAR-11', 'KAR-10', 'SJBT-11'),
('JBTKAR-12', 'KAR-10', 'SJBT-12'),
('JBTKAR-13', 'KAR-11', 'SJBT-13'),
('JBTKAR-14', 'KAR-12', 'SJBT-14'),
('JBTKAR-15', 'KAR-13', 'SJBT-15'),
('JBTKAR-16', 'KAR-14', 'SJBT-15'),
('JBTKAR-17', 'KAR-15', 'SJBT-16'),
('JBTKAR-18', 'KAR-16', 'SJBT-16'),
('JBTKAR-19', 'KAR-17', 'SJBT-16'),
('JBTKAR-2', 'KAR-2', 'SJBT-2'),
('JBTKAR-20', 'KAR-18', 'SJBT-16'),
('JBTKAR-21', 'KAR-19', 'SJBT-17'),
('JBTKAR-22', 'KAR-20', 'SJBT-17'),
('JBTKAR-23', 'KAR-21', 'SJBT-17'),
('JBTKAR-24', 'KAR-22', 'SJBT-17'),
('JBTKAR-25', 'KAR-23', 'SJBT-17'),
('JBTKAR-26', 'KAR-24', 'SJBT-17'),
('JBTKAR-27', 'KAR-25', 'SJBT-17'),
('JBTKAR-28', 'KAR-26', 'SJBT-17'),
('JBTKAR-29', 'KAR-27', 'SJBT-17'),
('JBTKAR-3', 'KAR-3', 'SJBT-3'),
('JBTKAR-30', 'KAR-28', 'SJBT-17'),
('JBTKAR-31', 'KAR-29', 'SJBT-17'),
('JBTKAR-32', 'KAR-30', 'SJBT-17'),
('JBTKAR-33', 'KAR-31', 'SJBT-17'),
('JBTKAR-34', 'KAR-32', 'SJBT-17'),
('JBTKAR-35', 'KAR-33', 'SJBT-17'),
('JBTKAR-36', 'KAR-34', 'SJBT-17'),
('JBTKAR-37', 'KAR-35', 'SJBT-17'),
('JBTKAR-38', 'KAR-36', 'SJBT-18'),
('JBTKAR-39', 'KAR-37', 'SJBT-18'),
('JBTKAR-4', 'KAR-4', 'SJBT-9'),
('JBTKAR-40', 'KAR-38', 'SJBT-18'),
('JBTKAR-41', 'KAR-39', 'SJBT-18'),
('JBTKAR-42', 'KAR-40', 'SJBT-18'),
('JBTKAR-43', 'KAR-41', 'SJBT-18'),
('JBTKAR-44', 'KAR-42', 'SJBT-18'),
('JBTKAR-45', 'KAR-43', 'SJBT-18'),
('JBTKAR-46', 'KAR-44', 'SJBT-15'),
('JBTKAR-47', 'KAR-45', 'SJBT-15'),
('JBTKAR-48', 'KAR-46', 'SJBT-11'),
('JBTKAR-49', 'KAR-46', 'SJBT-18'),
('JBTKAR-5', 'KAR-5', 'SJBT-5'),
('JBTKAR-6', 'KAR-6', 'SJBT-10'),
('JBTKAR-7', 'KAR-7', 'SJBT-8'),
('JBTKAR-8', 'KAR-3', 'SJBT-6'),
('JBTKAR-9', 'KAR-8', 'SJBT-4');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_logs`
--

CREATE TABLE `jabatan_logs` (
  `id_jabatan_logs` int(11) NOT NULL,
  `keterangan_log` varchar(15) NOT NULL,
  `id_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_logs`
--

INSERT INTO `jabatan_logs` (`id_jabatan_logs`, `keterangan_log`, `id_jabatan`, `nama_jabatan`) VALUES
(23, 'Edit Data', 'JBT-1', 'x'),
(24, 'Insert Data', 'JBT-2', 'Direktur'),
(25, 'Insert Data', 'JBT-3', 'Manager'),
(26, 'Insert Data', 'JBT-4', 'Admin'),
(27, 'Edit Data', 'JBT-2', 'Direkturr'),
(28, 'Edit Data', 'JBT-2', 'Direktur'),
(29, 'Insert Data', 'JBT-5', 'Operator Gudang'),
(30, 'Insert Data', 'JBT-6', 'PIC Line Cutting'),
(31, 'Insert Data', 'JBT-7', 'PIC Line Bonding'),
(32, 'Insert Data', 'JBT-8', 'PIC Line Sewing'),
(33, 'Insert Data', 'JBT-9', 'PIC Line Assy'),
(34, 'Insert Data', 'JBT-10', 'PPIC'),
(35, 'Insert Data', 'JBT-11', 'Staff Line Cutting'),
(36, 'Insert Data', 'JBT-12', 'Staff Line Bonding'),
(37, 'Insert Data', 'JBT-13', 'Staff Line Sewing'),
(38, 'Insert Data', 'JBT-14', 'Staff Line Assy'),
(39, 'Insert Data', 'JBT-15', 'Engineering'),
(40, 'Edit Data', 'JBT-15', 'Engineering'),
(41, 'Insert Data', 'JBT-16', 'Engineering'),
(42, 'Edit Data', 'JBT-16', 'Engineering'),
(43, 'Edit Data', 'JBT-5', 'Operator Gudang'),
(44, 'Insert Data', 'JBT-17', 'Operator Gudang'),
(45, 'Edit Data', 'JBT-17', 'Operator Gudang'),
(46, 'Insert Data', 'JBT-18', 'Operator Gudang'),
(47, 'Insert Data', 'JBT-19', 'Engineering'),
(48, 'Edit Data', 'JBT-19', 'Engineering'),
(49, 'Edit Data', 'JBT-18', 'Operator Gudang'),
(50, 'Insert Data', 'JBT-20', 'Operator Gudang'),
(51, 'Insert Data', 'JBT-21', 'Engineering'),
(52, 'Edit Data', 'JBT-21', 'Engineerings'),
(53, 'Edit Data', 'JBT-21', 'Engineerings');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_material`
--

CREATE TABLE `jenis_material` (
  `id_jenis_material` varchar(10) NOT NULL,
  `kode_jenis_material` varchar(10) NOT NULL,
  `nama_jenis_material` varchar(30) NOT NULL,
  `sumber_material` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_material`
--

INSERT INTO `jenis_material` (`id_jenis_material`, `kode_jenis_material`, `nama_jenis_material`, `sumber_material`) VALUES
('JM-1', 'MAT001', 'Foam', 0),
('JM-2', 'MAT002', 'Lem', 0),
('JM-3', 'MAT003', 'Kain', 0),
('JM-4', 'MAT004', 'Frame', 0),
('JM-5', 'MAT005', 'Benang', 0),
('JM-6', 'MAT006', 'Kancing', 0),
('JM-7', 'MAT007', 'Karton', 0),
('JM-8', 'MAT008', 'Lakban', 0),
('JM-9', 'KG001', 'Kartu Garansi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id_jenis_produk` varchar(15) NOT NULL,
  `nama_jenis_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_produk`
--

INSERT INTO `jenis_produk` (`id_jenis_produk`, `nama_jenis_produk`) VALUES
('JENPROD-1', 'Pillow'),
('JENPROD-2', 'Mattress'),
('JENPROD-3', 'Sofa'),
('JENPROD-4', 'Cover Matt'),
('JENPROD-5', 'Floor Mattress');

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
  `nama_jenis_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_produk_logs`
--

INSERT INTO `jenis_produk_logs` (`id_jenis_produk_logs`, `keterangan_log`, `id_jenis_produk`, `nama_jenis_produk`) VALUES
(18, 'Insert Data', 'JENPROD-1', 'Pillow'),
(19, 'Insert Data', 'JENPROD-2', 'Mattress'),
(20, 'Insert Data', 'JENPROD-3', 'Sofa'),
(21, 'Insert Data', 'JENPROD-4', 'Cover'),
(22, 'Edit Data', 'JENPROD-4', 'Cover Mat'),
(23, 'Edit Data', 'JENPROD-4', 'Cover Matt'),
(24, 'Insert Data', 'JENPROD-5', 'Floor Mattress'),
(25, 'Edit Data', 'JENPROD-1', 'Pillows'),
(26, 'Edit Data', 'JENPROD-1', 'Pillow');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `keterangan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `keterangan`) VALUES
('KAR-1', '000', 'x', 1),
('KAR-10', '119.020.114', 'Sakidi', 1),
('KAR-11', '119.020.116', 'Dalimin', 1),
('KAR-12', '119.020.113', 'Ngatimin', 1),
('KAR-13', '119.020.122', 'Achmad Nushi', 0),
('KAR-14', '120.020.132', 'Durojak', 0),
('KAR-15', '117.020.090', 'Sarodi', 0),
('KAR-16', '119.020.120', 'Ibnu F', 0),
('KAR-17', '119.020.118', 'Firman Am', 0),
('KAR-18', '120.020.134', 'Komarudin', 0),
('KAR-19', '115.020.026', 'Ahdi', 0),
('KAR-2', '00', 'Andryan Dedy', 1),
('KAR-20', '115.020.027', 'Sidik', 0),
('KAR-21', '115.020.028', 'Salim', 0),
('KAR-22', '115.020.030', 'Ade Mulyana', 0),
('KAR-23', '116.020.052', 'M.Syaidin', 0),
('KAR-24', '116.020.053', 'Suhendi', 0),
('KAR-25', '117.020.082', 'Sutendar', 0),
('KAR-26', '117.020.094', 'Siti Munawaroh', 0),
('KAR-27', '119.020.109', 'Siti Jainah', 0),
('KAR-28', '119.020.125', 'Irpan Kurniawan', 0),
('KAR-29', '119.020.126', 'Suhardi IPI', 0),
('KAR-3', '114.020.005', 'Julius Julianto', 1),
('KAR-30', '114.020.010', 'Siti Masitoh', 0),
('KAR-31', '118.020.101', 'Mulyadi H', 0),
('KAR-32', '119.020.124', 'Memed Hermawan', 0),
('KAR-33', '119.020.129', 'Ahmad Yusup', 0),
('KAR-34', '120.020.130', 'Sandi', 0),
('KAR-35', '114.020.015', 'Junaedi', 0),
('KAR-36', '114.020.016', 'Yuni', 0),
('KAR-37', '116.020.033', 'A. Muhatob', 0),
('KAR-38', '117.020.075', 'Toni S', 0),
('KAR-39', '117.020.086', 'Yudi Yardi', 0),
('KAR-4', '114.020.006', 'Ita Purnamasari', 1),
('KAR-40', '117.020.091', 'Yogi', 0),
('KAR-41', '119.020.110', 'Firman Arif', 0),
('KAR-42', '119.020.117', 'Dimas S', 0),
('KAR-43', '119.020.121', 'Iwan', 0),
('KAR-44', '000.000.000', 'udin', 0),
('KAR-45', '0010010001', 'Anto', 0),
('KAR-46', '119.001.0022', 'Tara', 0),
('KAR-5', '0', 'Admin Produksi', 1),
('KAR-6', '0000', 'Admin Risdev', 1),
('KAR-7', '119.020.108', 'Anggi S', 1),
('KAR-8', '114.020.001', 'Yudi Rusdian', 1),
('KAR-9', '114.020.009', 'Nazarudin Aziz', 1);

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
  `keterangan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan_logs`
--

INSERT INTO `karyawan_logs` (`id_karyawan_logs`, `keterangan_log`, `id_karyawan`, `nik`, `nama_karyawan`, `keterangan`) VALUES
(75, 'Insert Data', 'KAR-2', '000000001', 'Andryan Dedy', 1),
(76, 'Insert Data', 'KAR-3', '114020005', 'Julius Julianto', 1),
(77, 'Insert Data', 'KAR-4', '114020006', 'Ita Purnamasari', 1),
(78, 'Insert Data', 'KAR-5', '001', 'Admin Produksi', 1),
(79, 'Insert Data', 'KAR-6', '002', 'Admin Risdev', 1),
(80, 'Insert Data', 'KAR-7', '119.020.108', 'Anggi S', 1),
(81, 'Edit Data', 'KAR-2', '000.000.001', 'Andryan Dedy', 1),
(82, 'Edit Data', 'KAR-3', '114.020.005', 'Julius Julianto', 1),
(83, 'Edit Data', 'KAR-4', '114.020.006', 'Ita Purnamasari', 1),
(84, 'Edit Data', 'KAR-5', '000.000.0002', 'Admin Produksi', 1),
(85, 'Edit Data', 'KAR-6', '000.000.0003', 'Admin Risdev', 1),
(86, 'Edit Data', 'KAR-3', '114.020.005', 'Julius Julianto', 1),
(87, 'Insert Data', 'KAR-8', '114.020.001', 'Yudi Rusdian', 1),
(88, 'Insert Data', 'KAR-9', '114.020.009', 'Nazarudin Aziz', 1),
(89, 'Insert Data', 'KAR-10', '000.000.0004', 'pic1', 1),
(90, 'Insert Data', 'KAR-11', '000.000.005', 'PIC2', 1),
(91, 'Insert Data', 'KAR-12', '000.000.006', 'pic3', 1),
(92, 'Edit Data', 'KAR-5', '000.000.002', 'Admin Produksi', 1),
(93, 'Edit Data', 'KAR-10', '000.000.004', 'pic1', 1),
(94, 'Edit Data', 'KAR-6', '000.000.003', 'Admin Risdev', 1),
(95, 'Edit Data', 'KAR-10', '119.020.114', 'Sakidi', 1),
(96, 'Edit Data', 'KAR-11', '119.020.116', 'Dalimin', 1),
(97, 'Edit Data', 'KAR-12', '119.020.113', 'Ngatimin', 1),
(98, 'Edit Data', 'KAR-2', '0000', 'Andryan Dedy', 1),
(99, 'Edit Data', 'KAR-2', '00', 'Andryan Dedy', 1),
(100, 'Edit Data', 'KAR-5', '0', 'Admin Produksi', 1),
(101, 'Edit Data', 'KAR-6', '000', 'Admin Risdev', 1),
(102, 'Edit Data', 'KAR-6', '0000', 'Admin Risdev', 1),
(103, 'Insert Data', 'KAR-13', '119.020.122', 'Achmad Nushi', 0),
(104, 'Insert Data', 'KAR-14', '120.020.132', 'Durojak', 0),
(105, 'Insert Data', 'KAR-15', '117.020.090', 'Sarodi', 0),
(106, 'Insert Data', 'KAR-16', '119.020.120', 'Ibnu F', 0),
(107, 'Insert Data', 'KAR-17', '119.020.118', 'Firman Am', 0),
(108, 'Insert Data', 'KAR-18', '120.020.134', 'Komarudin', 0),
(109, 'Insert Data', 'KAR-19', '115.020.026', 'Ahdi', 0),
(110, 'Insert Data', 'KAR-20', '115.020.027', 'Sidik', 0),
(111, 'Insert Data', 'KAR-21', '115.020.028', 'Salim', 0),
(112, 'Insert Data', 'KAR-22', '115.020.030', 'Ade Mulyana', 0),
(113, 'Insert Data', 'KAR-23', '116.020.052', 'M.Syaidin', 0),
(114, 'Insert Data', 'KAR-24', '116.020.053', 'Suhendi', 0),
(115, 'Insert Data', 'KAR-25', '117.020.082', 'Sutendar', 0),
(116, 'Insert Data', 'KAR-26', '117.020.094', 'Siti Munawaroh', 0),
(117, 'Insert Data', 'KAR-27', '119.020.109', 'Siti Jainah', 0),
(118, 'Insert Data', 'KAR-28', '119.020.125', 'Irpan Kurniawan', 0),
(119, 'Insert Data', 'KAR-29', '119.020.126', 'Suhardi IPI', 0),
(120, 'Insert Data', 'KAR-30', '114.020.010', 'Siti Masitoh', 0),
(121, 'Insert Data', 'KAR-31', '118.020.101', 'Mulyadi H', 0),
(122, 'Insert Data', 'KAR-32', '119.020.124', 'Memed Hermawan', 0),
(123, 'Insert Data', 'KAR-33', '119.020.129', 'Ahmad Yusup', 0),
(124, 'Insert Data', 'KAR-34', '120.020.130', 'Sandi', 0),
(125, 'Insert Data', 'KAR-35', '114.020.015', 'Junaedi', 0),
(126, 'Insert Data', 'KAR-36', '114.020.016', 'Yuni', 0),
(127, 'Insert Data', 'KAR-37', '116.020.033', 'A. Muhatob', 0),
(128, 'Insert Data', 'KAR-38', '117.020.075', 'Toni S', 0),
(129, 'Insert Data', 'KAR-39', '117.020.086', 'Yudi Yardi', 0),
(130, 'Insert Data', 'KAR-40', '117.020.091', 'Yogi', 0),
(131, 'Insert Data', 'KAR-41', '119.020.110', 'Firman Arif', 0),
(132, 'Insert Data', 'KAR-42', '119.020.117', 'Dimas S', 0),
(133, 'Insert Data', 'KAR-43', '119.020.121', 'Iwan', 0),
(134, 'Edit Data', 'KAR-1', '000', 'Amel', 1),
(135, 'Edit Data', 'KAR-1', '000', 'x', 1),
(136, 'Insert Data', 'KAR-44', '000.000.000', 'udin', 0),
(137, 'Insert Data', 'KAR-45', '0010010001', 'Anto', 0),
(138, 'Insert Data', 'KAR-46', '119.001.0002', 'Tata', 1),
(139, 'Edit Data', 'KAR-46', '119.001.0022', 'Tara', 0),
(140, 'Edit Data', 'KAR-46', '119.001.0022', 'Tara', 0);

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
  `status_konsumsi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsumsi_material`
--

INSERT INTO `konsumsi_material` (`id_konsumsi_material`, `id_produk`, `id_sub_jenis_material`, `id_line`, `jumlah_konsumsi`, `status_konsumsi`) VALUES
('KONMAT-1', 'PRDK-1', 'SUBJM-1', 'LINE-1', '1.00', 1),
('KONMAT-10', 'PRDK-2', 'SUBJM-15', 'LINE-4', '1.20', 1),
('KONMAT-11', 'PRDK-3', 'SUBJM-1', 'LINE-1', '1.00', 1),
('KONMAT-12', 'PRDK-3', 'SUBJM-2', 'LINE-1', '1.00', 1),
('KONMAT-13', 'PRDK-3', 'SUBJM-3', 'LINE-2', '10.00', 1),
('KONMAT-14', 'PRDK-3', 'SUBJM-12', 'LINE-4', '1.00', 1),
('KONMAT-15', 'PRDK-3', 'SUBJM-15', 'LINE-4', '1.00', 1),
('KONMAT-16', 'PRDK-4', 'SUBJM-1', 'LINE-1', '1.00', 1),
('KONMAT-17', 'PRDK-4', 'SUBJM-3', 'LINE-2', '10.00', 1),
('KONMAT-18', 'PRDK-4', 'SUBJM-12', 'LINE-4', '3.00', 1),
('KONMAT-19', 'PRDK-4', 'SUBJM-14', 'LINE-4', '1.00', 1),
('KONMAT-2', 'PRDK-1', 'SUBJM-3', 'LINE-2', '10.00', 1),
('KONMAT-20', 'PRDK-5', 'SUBJM-1', 'LINE-1', '1.00', 1),
('KONMAT-21', 'PRDK-5', 'SUBJM-3', 'LINE-2', '10.00', 1),
('KONMAT-22', 'PRDK-5', 'SUBJM-12', 'LINE-4', '2.00', 1),
('KONMAT-23', 'PRDK-5', 'SUBJM-14', 'LINE-4', '2.00', 1),
('KONMAT-3', 'PRDK-1', 'SUBJM-4', 'LINE-3', '1.50', 0),
('KONMAT-4', 'PRDK-1', 'SUBJM-8', 'LINE-3', '2.00', 1),
('KONMAT-5', 'PRDK-1', 'SUBJM-15', 'LINE-4', '1.00', 1),
('KONMAT-6', 'PRDK-2', 'SUBJM-2', 'LINE-1', '1.00', 1),
('KONMAT-7', 'PRDK-2', 'SUBJM-3', 'LINE-2', '10.00', 1),
('KONMAT-8', 'PRDK-2', 'SUBJM-4', 'LINE-3', '1.50', 0),
('KONMAT-9', 'PRDK-2', 'SUBJM-8', 'LINE-3', '2.00', 1);

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
  `satuan_biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line`
--

INSERT INTO `line` (`id_line`, `nama_line`, `urutan_line`, `jumlah_team`, `jumlah_pekerja_per_team`, `total_processing_time`, `satuan_biaya`) VALUES
('LINE-1', 'Line Cutting', 1, 1, 3, 9, 2000),
('LINE-2', 'Line Bonding', 2, 1, 5, 9, 1000),
('LINE-3', 'Line Sewing', 3, 10, 1, 90, 1000),
('LINE-4', 'Line Assy', 4, 3, 5, 27, 1000);

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
  `satuan_biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line_logs`
--

INSERT INTO `line_logs` (`id_line_logs`, `keterangan_log`, `id_line`, `nama_line`, `urutan_line`, `jumlah_team`, `jumlah_pekerja_per_team`, `total_processing_time`, `satuan_biaya`) VALUES
(7, 'Insert Data', 'LINE-1', 'Line Cutting', 1, 1, 3, 9, 1000),
(8, 'Insert Data', 'LINE-2', 'Line Bonding', 2, 1, 5, 9, 1000),
(9, 'Insert Data', 'LINE-3', 'Line Sewing', 3, 10, 1, 90, 1000),
(10, 'Insert Data', 'LINE-4', 'Line Assy', 4, 3, 5, 27, 1000),
(11, 'Edit Data', 'LINE-1', 'Line Cutting', 1, 1, 3, 9, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id_material` varchar(10) NOT NULL,
  `sumber_material` int(11) NOT NULL,
  `status_keluar` int(11) NOT NULL,
  `id_pemasukan_material` varchar(30) NOT NULL,
  `id_detail_permintaan_material` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `material_line`
--

CREATE TABLE `material_line` (
  `id_material_line` varchar(30) NOT NULL,
  `id_material` varchar(30) NOT NULL,
  `id_line` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `material_supplier`
--

CREATE TABLE `material_supplier` (
  `id_material_supplier` varchar(30) NOT NULL,
  `id_material` varchar(30) NOT NULL,
  `id_detail_delivery_note` varchar(30) NOT NULL
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
  `keterangan_lain` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengambilan_material`
--

CREATE TABLE `pengambilan_material` (
  `id_pengambilan_material` varchar(20) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `id_detail_permintaan_material` varchar(20) NOT NULL,
  `id_pengeluaran_material` varchar(20) DEFAULT NULL,
  `tanggal_ambil` date NOT NULL,
  `stok_wip` decimal(11,2) NOT NULL,
  `jumlah_ambil` decimal(11,2) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `status_pengambilan` int(1) NOT NULL,
  `status_keluar` int(1) NOT NULL,
  `status_permintaan` int(1) NOT NULL
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
  `keterangan_keluar` int(11) DEFAULT NULL,
  `keterangan_lain` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `perencanaan_cutting`
--

CREATE TABLE `perencanaan_cutting` (
  `id_perencanaan_cutting` varchar(14) NOT NULL,
  `id_detail_produksi_line` varchar(17) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_perencanaan` int(11) NOT NULL,
  `jumlah_aktual` int(11) DEFAULT NULL,
  `status_laporan` int(1) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
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
  `status_permintaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_pembelian`
--

CREATE TABLE `permintaan_pembelian` (
  `id_permintaan_pembelian` varchar(10) NOT NULL,
  `tanggal_permintaan` date NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `satuan_keluar` varchar(30) NOT NULL,
  `status_pembelian` int(11) NOT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `keterangan_batal` varchar(500) DEFAULT NULL,
  `id_detail_purchase_order_supplier` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_tambahan`
--

CREATE TABLE `permintaan_tambahan` (
  `id_permintaan_tambahan` varchar(15) NOT NULL,
  `id_detail_permintaan_material` varchar(20) NOT NULL,
  `id_pengambilan_material` varchar(20) DEFAULT NULL,
  `jumlah_tambah` decimal(11,2) NOT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `status` int(1) NOT NULL
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
  `keterangan` varchar(500) DEFAULT NULL,
  `status_permohonan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `persediaan_line`
--

CREATE TABLE `persediaan_line` (
  `id_persediaan_line` varchar(10) NOT NULL,
  `id_line` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `total_material` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `persediaan_line_keluar`
--

CREATE TABLE `persediaan_line_keluar` (
  `id_persediaan_line_keluar` varchar(15) NOT NULL,
  `id_persediaan_line` varchar(10) NOT NULL,
  `id_pengambilan_material` varchar(20) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jumlah_material` decimal(11,2) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `persediaan_line_masuk`
--

CREATE TABLE `persediaan_line_masuk` (
  `id_persediaan_line_masuk` varchar(15) NOT NULL,
  `id_persediaan_line` varchar(10) NOT NULL,
  `id_detail_permintaan_material` varchar(20) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jumlah_material` decimal(11,2) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perubahan_harga`
--

CREATE TABLE `perubahan_harga` (
  `id_perubahan_harga` varchar(10) NOT NULL,
  `id_detail_supplier` varchar(10) NOT NULL,
  `harga_sebelum` int(11) NOT NULL,
  `harga_sesudah` int(11) NOT NULL,
  `status_persetujuan` int(11) NOT NULL,
  `keterangan` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perubahan_harga`
--

INSERT INTO `perubahan_harga` (`id_perubahan_harga`, `id_detail_supplier`, `harga_sebelum`, `harga_sesudah`, `status_persetujuan`, `keterangan`) VALUES
('UBAH-1', 'DSUP-1', 60000, 75000, 0, NULL),
('UBAH-2', 'DSUP-2', 2000, 5000, 2, NULL);

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
  `status_sebelum` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(10) NOT NULL,
  `id_jenis_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `keterangan_produksi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_jenis_produk`, `nama_produk`, `harga_produk`, `keterangan_produksi`) VALUES
('PRDK-1', 'JENPROD-1', 'A/F Body Pillow Hard', 116536, 0),
('PRDK-2', 'JENPROD-1', 'A/F Body Pillow Soft', 116555, 0),
('PRDK-3', 'JENPROD-3', 'Atease Baguette Sofa Havana ', 1283922, 1),
('PRDK-4', 'JENPROD-5', 'Boa Rug Floor Mat145', 315933, 1),
('PRDK-5', 'JENPROD-3', 'Sofa Amiras', 566000, 1);

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
  `status_laporan` int(1) NOT NULL
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
  `total_waktu_aktual` int(11) DEFAULT NULL,
  `efisiensi_perencanaan` decimal(11,2) NOT NULL,
  `efisiensi_aktual` decimal(11,2) DEFAULT NULL,
  `keterangan_laporan` varchar(500) DEFAULT NULL,
  `status_perencanaan` int(1) NOT NULL,
  `status_laporan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produksi_tertunda`
--

CREATE TABLE `produksi_tertunda` (
  `id_produksi_tertunda` varchar(20) NOT NULL,
  `id_detail_produksi_line` varchar(17) NOT NULL,
  `jumlah_tertunda` int(11) NOT NULL,
  `jumlah_terencana` int(11) DEFAULT NULL,
  `status_penjadwalan` int(1) NOT NULL
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
  `keterangan_produksi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_logs`
--

INSERT INTO `produk_logs` (`id_produk_logs`, `keterangan_log`, `id_produk`, `id_jenis_produk`, `nama_produk`, `harga_produk`, `keterangan_produksi`) VALUES
(6, 'Insert Data', 'PRDK-1', 'JENPROD-1', 'A/F Body Pillow Hard', 116536, 0),
(7, 'Insert Data', 'PRDK-2', 'JENPROD-1', 'A/F Body Pillow Soft', 116555, 0),
(8, 'Insert Data', 'PRDK-3', 'JENPROD-3', 'Atease Baguette Sofa Havana ', 1283922, 1),
(9, 'Insert Data', 'PRDK-4', 'JENPROD-5', 'Boa Rug Floor Mat145', 315933, 1),
(10, 'Edit Data', 'PRDK-1', 'JENPROD-1', 'A/F Body Pillow Hards', 116536, 0),
(11, 'Edit Data', 'PRDK-1', 'JENPROD-1', 'A/F Body Pillow Hard', 216536, 0),
(12, 'Edit Data', 'PRDK-1', 'JENPROD-1', 'A/F Body Pillow Hard', 116536, 0),
(13, 'Insert Data', 'PRDK-5', 'JENPROD-3', 'Sofa Amira', 560000, 1),
(14, 'Edit Data', 'PRDK-5', 'JENPROD-3', 'Sofa Amiras', 566000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_customer`
--

CREATE TABLE `purchase_order_customer` (
  `id_purchase_order_customer` varchar(10) NOT NULL,
  `kode_purchase_order_customer` varchar(30) NOT NULL,
  `id_customer` varchar(10) NOT NULL,
  `tanggal_po` date NOT NULL,
  `harga_sebelum_pajak` decimal(11,2) NOT NULL,
  `ppn` decimal(11,2) NOT NULL,
  `total_harga_akhir` decimal(11,2) NOT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `status_po` int(11) NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `keterangan_batal` varchar(500) DEFAULT NULL COMMENT 'khusus jika ada pembatalan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order_customer`
--

INSERT INTO `purchase_order_customer` (`id_purchase_order_customer`, `kode_purchase_order_customer`, `id_customer`, `tanggal_po`, `harga_sebelum_pajak`, `ppn`, `total_harga_akhir`, `keterangan`, `status_po`, `tanggal_selesai`, `keterangan_batal`) VALUES
('POC-1', 'PO/INOAC/001', 'CUST-1', '2021-01-01', '112263150.00', '11226315.00', '123489465.00', '', 1, NULL, NULL),
('POC-2', 'L2101002', 'CUST-1', '2021-01-08', '59457420.00', '5945742.00', '65403162.00', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_supplier`
--

CREATE TABLE `purchase_order_supplier` (
  `id_purchase_order_supplier` varchar(10) NOT NULL,
  `kode_purchase_order_supplier` varchar(50) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `tanggal_po` date NOT NULL,
  `harga_sebelum_pajak` decimal(11,2) NOT NULL,
  `ppn` decimal(11,2) NOT NULL,
  `total_harga_akhir` decimal(11,2) NOT NULL,
  `status_po` int(11) NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order_supplier`
--

INSERT INTO `purchase_order_supplier` (`id_purchase_order_supplier`, `kode_purchase_order_supplier`, `id_supplier`, `tanggal_po`, `harga_sebelum_pajak`, `ppn`, `total_harga_akhir`, `status_po`, `tanggal_selesai`, `keterangan`) VALUES
('POS-1', 'MBP/PO/I/2021/1', 'SUP-2', '2021-01-03', '45000.00', '4500.00', '49500.00', 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` varchar(10) NOT NULL,
  `id_bank` varchar(10) NOT NULL,
  `nomor_rekening` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `kantor_cabang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `id_bank`, `nomor_rekening`, `atas_nama`, `kantor_cabang`) VALUES
('REK-1', 'BANK-2', '8350060899', 'PT. Maju Bersama Persada Dayamu', 'Daan Mogot'),
('REK-2', 'BANK-3', '566800007270', 'PT. Maju Bersama Persada Dayamu', 'Alam Sutera');

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
  `kantor_cabang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening_logs`
--

INSERT INTO `rekening_logs` (`id_rekening_logs`, `keterangan_log`, `id_rekening`, `id_bank`, `nomor_rekening`, `atas_nama`, `kantor_cabang`) VALUES
(12, 'Insert Data', 'REK-1', 'BANK-2', '8350060899', 'PT. Maju Bersama Persada Dayamu', 'Daan Mogot'),
(13, 'Insert Data', 'REK-2', 'BANK-3', '566800007270', 'PT. Maju Bersama Persada Dayamu', 'Alam Sutera');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `id_sales_order` varchar(10) NOT NULL,
  `kode_so` varchar(20) NOT NULL,
  `tanggal_so` date NOT NULL,
  `tanggal_pengantaran` date NOT NULL,
  `dibuat_oleh` varchar(10) NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `diterima_oleh` varchar(10) DEFAULT NULL,
  `tanggal_diterima` date DEFAULT NULL,
  `status_so` int(11) NOT NULL,
  `id_purchase_order_customer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`id_sales_order`, `kode_so`, `tanggal_so`, `tanggal_pengantaran`, `dibuat_oleh`, `tanggal_dibuat`, `diterima_oleh`, `tanggal_diterima`, `status_so`, `id_purchase_order_customer`) VALUES
('SO-1', 'MBP/SO/XII/2020/1', '2020-12-30', '2020-12-31', 'USER-2', '2020-12-30', NULL, NULL, 0, 'POC-1'),
('SO-2', 'MBP/SO/I/2021/1', '2021-01-08', '2021-01-08', 'USER-2', '2021-01-08', NULL, NULL, 0, 'POC-2');

-- --------------------------------------------------------

--
-- Table structure for table `spesifikasi_jabatan`
--

CREATE TABLE `spesifikasi_jabatan` (
  `id_spesifikasi_jabatan` varchar(10) NOT NULL,
  `id_jabatan` varchar(10) NOT NULL,
  `id_departemen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spesifikasi_jabatan`
--

INSERT INTO `spesifikasi_jabatan` (`id_spesifikasi_jabatan`, `id_jabatan`, `id_departemen`) VALUES
('SJBT-1', 'JBT-1', 'DEPT-1'),
('SJBT-10', 'JBT-4', 'DEPT-6'),
('SJBT-11', 'JBT-6', 'DEPT-3'),
('SJBT-12', 'JBT-7', 'DEPT-3'),
('SJBT-13', 'JBT-8', 'DEPT-3'),
('SJBT-14', 'JBT-9', 'DEPT-3'),
('SJBT-15', 'JBT-11', 'DEPT-3'),
('SJBT-16', 'JBT-12', 'DEPT-3'),
('SJBT-17', 'JBT-13', 'DEPT-3'),
('SJBT-18', 'JBT-14', 'DEPT-3'),
('SJBT-19', 'JBT-9', 'DEPT-11'),
('SJBT-2', 'JBT-2', 'DEPT-2'),
('SJBT-20', 'JBT-4', 'DEPT-11'),
('SJBT-21', 'JBT-14', 'DEPT-11'),
('SJBT-22', 'JBT-9', 'DEPT-11'),
('SJBT-23', 'JBT-4', 'DEPT-11'),
('SJBT-24', 'JBT-4', 'DEPT-11'),
('SJBT-25', 'JBT-14', 'DEPT-11'),
('SJBT-26', 'JBT-9', 'DEPT-11'),
('SJBT-27', 'JBT-14', 'DEPT-11'),
('SJBT-3', 'JBT-3', 'DEPT-2'),
('SJBT-4', 'JBT-10', 'DEPT-3'),
('SJBT-5', 'JBT-4', 'DEPT-3'),
('SJBT-6', 'JBT-10', 'DEPT-7'),
('SJBT-7', 'JBT-5', 'DEPT-7'),
('SJBT-8', 'JBT-4', 'DEPT-5'),
('SJBT-9', 'JBT-4', 'DEPT-4');

-- --------------------------------------------------------

--
-- Table structure for table `sub_customer`
--

CREATE TABLE `sub_customer` (
  `id_sub_customer` varchar(10) NOT NULL,
  `nama_sub_customer` varchar(30) NOT NULL,
  `id_customer` varchar(10) NOT NULL,
  `nama_pic` varchar(30) NOT NULL,
  `no_telp_pic` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_customer`
--

INSERT INTO `sub_customer` (`id_sub_customer`, `nama_sub_customer`, `id_customer`, `nama_pic`, `no_telp_pic`) VALUES
('SUBCUST-1', 'PT. Techno', 'CUST-1', 'Amelia', '089812345678');

-- --------------------------------------------------------

--
-- Table structure for table `sub_jenis_material`
--

CREATE TABLE `sub_jenis_material` (
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `kode_sub_jenis_material` varchar(20) NOT NULL,
  `nama_sub_jenis_material` varchar(30) NOT NULL,
  `id_jenis_material` varchar(10) NOT NULL,
  `sumber` int(11) NOT NULL,
  `satuan_ukuran` varchar(30) NOT NULL,
  `satuan_keluar` varchar(30) NOT NULL,
  `ukuran_satuan_keluar` int(11) NOT NULL,
  `min_stok` int(11) DEFAULT NULL,
  `max_stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_jenis_material`
--

INSERT INTO `sub_jenis_material` (`id_sub_jenis_material`, `kode_sub_jenis_material`, `nama_sub_jenis_material`, `id_jenis_material`, `sumber`, `satuan_ukuran`, `satuan_keluar`, `ukuran_satuan_keluar`, `min_stok`, `max_stok`) VALUES
('SUBJM-1', 'F001', 'REB55', 'JM-1', 0, 'pcs', 'pcs', 1, 5, 20),
('SUBJM-10', 'K001', 'Kancing Plastik Warna Putih', 'JM-6', 0, 'pack', 'pcs', 10, 10, 10),
('SUBJM-11', 'K002', 'Kancing Plastik Warna Hitam', 'JM-6', 0, 'pack', 'pcs', 10, 5, 5),
('SUBJM-12', 'K001', 'Karton Protector Aeroflow T.20', 'JM-7', 0, 'pcs', 'pcs', 1, 30, 50),
('SUBJM-13', 'K002', 'Kartu Garansi INOAC', 'JM-7', 0, 'pcs', 'pcs', 1, 50, 100),
('SUBJM-14', 'L001', 'Lakban Naci Tape ', 'JM-8', 0, 'roll', 'mtr', 60, 5, 10),
('SUBJM-15', 'L002', 'Lakban Double Tape Joyko/Kenko', 'JM-8', 0, 'roll', 'mtr', 60, 5, 10),
('SUBJM-16', 'KG0001', 'Kartu Garansi INOAC', 'JM-9', 0, 'pcs', 'pcs', 1, 100, 200),
('SUBJM-2', 'F002', 'REB70', 'JM-1', 0, 'pcs', 'pcs', 1, 5, 10),
('SUBJM-3', 'L001', 'Lem Spray ISAMU 320', 'JM-2', 0, 'blek', 'ml', 100, 2, 5),
('SUBJM-4', 'K001', 'Kain Floral Rose Red', 'JM-3', 0, 'roll', 'mtr', 60, 5, 5),
('SUBJM-5', 'K002', 'Kain Pandora Grey', 'JM-3', 0, 'roll', 'mtr', 60, 5, 5),
('SUBJM-6', 'F001', 'Frame Armrest Paramont', 'JM-4', 0, 'pcs', 'pcs', 1, 5, 10),
('SUBJM-7', 'F002', 'Frame Floor Chair', 'JM-4', 0, 'pcs', 'pcs', 1, 5, 10),
('SUBJM-8', 'B001', 'Benang 20/3 Point Color 145 Me', 'JM-5', 0, 'roll', 'mtr', 60, 10, 10),
('SUBJM-9', 'B002', 'Benang 20/3 Point Color 178 Cr', 'JM-5', 0, 'roll', 'mtr', 60, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(30) NOT NULL,
  `alamat_supplier` varchar(100) NOT NULL,
  `no_telp_supplier` varchar(20) NOT NULL,
  `email_supplier` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `no_telp_supplier`, `email_supplier`) VALUES
('SUP-1', 'PT. INOAC POLYTECHNO INDONESIA', 'Tangerang', '081234567890', 'inoac@gmail.com'),
('SUP-2', 'PT. MITRA USAHA BAKTI LESTARI', 'Jakarta', '087819274830', 'mirausaha@gmail.com'),
('SUP-3', 'coba', 'coba', '9999', 'coba@gmail.com'),
('SUP-4', 'PT SINAR CONTINENTAL', 'BANDUNG', '081288981212', 'WILSON@PT-SINAR.COM');

-- --------------------------------------------------------

--
-- Table structure for table `surat_jalan`
--

CREATE TABLE `surat_jalan` (
  `id_surat_jalan` varchar(15) NOT NULL,
  `id_purchase_order_customer` varchar(10) NOT NULL,
  `id_invoice` varchar(15) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `kendaraan` varchar(100) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `keterangan_pengiriman` varchar(100) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `status_surat_jalan` int(1) NOT NULL
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
  `keterangan_perintah` varchar(500) DEFAULT NULL,
  `keterangan_laporan` varchar(500) DEFAULT NULL,
  `status_spl` int(1) NOT NULL,
  `keterangan_spl` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tetapan`
--

CREATE TABLE `tetapan` (
  `id_tetapan` varchar(10) NOT NULL,
  `nama_tetapan` varchar(50) NOT NULL,
  `isi_tetapan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tetapan`
--

INSERT INTO `tetapan` (`id_tetapan`, `nama_tetapan`, `isi_tetapan`) VALUES
('TTPN-1', 'xx', 'xx'),
('TTPN-10', 'Rabu', 'Hari Produksi'),
('TTPN-11', 'Kamis', 'Hari Produksi'),
('TTPN-12', 'Jumat', 'Hari Produksi'),
('TTPN-13', 'Sabtu', 'Hari Libur'),
('TTPN-14', 'Minggu', 'Hari Libur'),
('TTPN-15', 'Bidang Usaha', 'Furniture and Automotive Part Manufacturer'),
('TTPN-16', 'Kota Perusahaan', 'Tangerang'),
('TTPN-17', 'Jumlah Kantor Cabang', '3'),
('TTPN-18', 'Nama Perusahaan', 'PT. Maju Bersama Persada Dayamu'),
('TTPN-19', 'Jam Masuk Kerja', '09:00'),
('TTPN-2', 'E-mail Perusahaan', 'finance@mbpindo.com'),
('TTPN-3', 'Alamat Perusahaan', 'Jl. Boulevard blok L 7 nomor 1 H Citra Raya, Cikupa, Tangerang'),
('TTPN-4', 'Phone/Fax', '(021) 5986198'),
('TTPN-5', 'Website', 'www.mbpd-indo.com'),
('TTPN-6', 'Processing time', '9'),
('TTPN-7', 'PPN', '10'),
('TTPN-8', 'Senin', 'Hari Produksi'),
('TTPN-9', 'Selasa', 'Hari Produksi');

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
  `isi_tetapan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tetapan_logs`
--

INSERT INTO `tetapan_logs` (`id_tetapan_logs`, `keterangan_log`, `id_tetapan`, `nama_tetapan`, `isi_tetapan`) VALUES
(1, 'Insert Data', 'TTPN-1', 'Nama Perusahaan', 'PT. Maju Bersama Persada Dayamu'),
(2, 'Edit Data', 'TTPN-1', 'Nama Perusahaan', 'PT. Maju Bersama Persada Dayamu 1'),
(3, 'Edit Data', 'TTPN-1', 'Nama Perusahaan', 'PT. Maju Bersama Persada Dayamu'),
(4, 'Insert Data', 'TTPN-2', 'E-mail Perusahaan', 'finance@mbpindo.com'),
(5, 'Insert Data', 'TTPN-3', 'Alamat Perusahaan', 'Jl. Boulevard blok L 7 nomor 1 H Citra Raya, Cikupa, Tangerang'),
(6, 'Insert Data', 'TTPN-4', 'Phone/Fax', '(021) 5986198'),
(7, 'Insert Data', 'TTPN-5', 'Website', 'www.mbpd-indo.com'),
(8, 'Insert Data', 'TTPN-6', 'Processing time', '9'),
(9, 'Insert Data', 'TTPN-7', 'PPN', '10'),
(10, 'Insert Data', 'TTPN-8', 'Senin', 'Hari Produksi'),
(11, 'Insert Data', 'TTPN-9', 'Selasa', 'Hari Produksi'),
(12, 'Insert Data', 'TTPN-10', 'Rabu', 'Hari Produksi'),
(13, 'Insert Data', 'TTPN-11', 'Kamis', 'Hari Produksi'),
(14, 'Insert Data', 'TTPN-12', 'Jumat', 'Hari Produksi'),
(15, 'Insert Data', 'TTPN-13', 'Sabtu', 'Hari Libur'),
(16, 'Insert Data', 'TTPN-14', 'Minggu', 'Hari Libur'),
(17, 'Edit Data', 'TTPN-12', 'Jumat', 'Hari Libur'),
(18, 'Edit Data', 'TTPN-12', 'Jumat', 'Hari Produksi'),
(19, 'Edit Data', 'TTPN-10', 'Rabu', 'Hari Libur'),
(20, 'Edit Data', 'TTPN-10', 'Rabu', 'Hari Produksi'),
(21, 'Insert Data', 'TTPN-15', 'Bidang Usaha', 'Furniture and Automotive Part Manufacturer'),
(22, 'Insert Data', 'TTPN-16', 'Kota Perusahaan', 'Tangerang'),
(23, 'Insert Data', 'TTPN-17', 'Jumlah Kantor Cabang', '2'),
(24, 'Edit Data', 'TTPN-17', 'Jumlah Kantor Cabang', '3'),
(25, 'Edit Data', 'TTPN-1', 'Nama Perusahaan', 'PT. Maju Bersama Persada Dayamu'),
(26, 'Insert Data', 'TTPN-1', 'Nama Perusahaan', 'PT. Maju Bersama Persada Dayamu'),
(27, 'Insert Data', 'TTPN-1', 'xx', 'xx'),
(28, 'Insert Data', 'TTPN-18', 'Nama Perusahaan', 'PT. Maju Bersama Persada Dayamu'),
(29, 'Insert Data', 'TTPN-19', 'Jam Masuk Kerja', '08:00'),
(30, 'Edit Data', 'TTPN-19', 'Jam Masuk Kerja', '09:00');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran_produk`
--

CREATE TABLE `ukuran_produk` (
  `id_ukuran_produk` varchar(10) NOT NULL,
  `id_jenis_produk` varchar(15) NOT NULL,
  `ukuran_produk` varchar(30) NOT NULL,
  `satuan_ukuran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran_produk`
--

INSERT INTO `ukuran_produk` (`id_ukuran_produk`, `id_jenis_produk`, `ukuran_produk`, `satuan_ukuran`) VALUES
('UKPROD-1', 'JENPROD-4', '120', 'cm'),
('UKPROD-2', 'JENPROD-4', '160', 'cm'),
('UKPROD-3', 'JENPROD-4', '180', 'cm'),
('UKPROD-4', 'JENPROD-2', '1800x800x100', 'mm3'),
('UKPROD-5', 'JENPROD-5', '2000x1450', 'mm2'),
('UKPROD-6', 'JENPROD-2', '2000x900x80', 'mm3'),
('UKPROD-7', 'JENPROD-2', '1000x1900x60', 'mm3');

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
  `satuan_ukuran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran_produk_logs`
--

INSERT INTO `ukuran_produk_logs` (`id_ukuran_produk_logs`, `keterangan_log`, `id_ukuran_produk`, `id_jenis_produk`, `ukuran_produk`, `satuan_ukuran`) VALUES
(1, 'Insert Data', 'UKPROD-1', 'JENPROD-4', '120', 'cm'),
(2, 'Insert Data', 'UKPROD-2', 'JENPROD-4', '160', 'cm'),
(3, 'Insert Data', 'UKPROD-3', 'JENPROD-4', '180', 'cm'),
(4, 'Insert Data', 'UKPROD-4', 'JENPROD-2', '1800x800x100', 'cm3'),
(5, 'Insert Data', 'UKPROD-5', 'JENPROD-5', '2000x1450', 'cm2'),
(6, 'Edit Data', 'UKPROD-4', 'JENPROD-2', '1800x800x100', 'cm31'),
(7, 'Edit Data', 'UKPROD-4', 'JENPROD-2', '1800x800x100', 'cm3'),
(8, 'Insert Data', 'UKPROD-6', 'JENPROD-2', '2000x900x80', 'cm3'),
(9, 'Insert Data', 'UKPROD-7', 'JENPROD-2', '1000x1900x60', 'mm3'),
(10, 'Edit Data', 'UKPROD-7', 'JENPROD-2', '1000x1900x60', 'cm3'),
(11, 'Edit Data', 'UKPROD-4', 'JENPROD-2', '1800x800x100', 'mm3'),
(12, 'Edit Data', 'UKPROD-6', 'JENPROD-2', '2000x900x80', 'mm3'),
(13, 'Edit Data', 'UKPROD-7', 'JENPROD-2', '1000x1900x60', 'mm3'),
(14, 'Edit Data', 'UKPROD-5', 'JENPROD-5', '2000x1450', 'mm2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `status_user` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_karyawan`, `email_user`, `password_user`, `status_user`) VALUES
('USER-1', 'KAR-1', 'amkaheja@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0),
('USER-10', 'KAR-10', 'pic1@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0),
('USER-11', 'KAR-11', 'pic2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0),
('USER-12', 'KAR-12', 'pic3@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0),
('USER-13', 'KAR-46', 'pictata@gmail.com', '25f9e794323b453885f5181f1b624d0b', 0),
('USER-2', 'KAR-2', 'direktur@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0),
('USER-3', 'KAR-3', 'juliusjulianto91@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0),
('USER-4', 'KAR-4', 'finance@mbpindo.com', '25d55ad283aa400af464c76d713c07ad', 0),
('USER-5', 'KAR-5', 'produksi@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0),
('USER-6', 'KAR-6', 'risdev@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0),
('USER-7', 'KAR-7', 'w.hfinishgoodmbp@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0),
('USER-8', 'KAR-8', 'ppicmbp@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0),
('USER-9', 'KAR-9', 'w.hmaterialmbp@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0);

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
  `password_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id_user_logs`, `keterangan_log`, `id_user`, `id_karyawan`, `email_user`, `password_user`) VALUES
(24, 'Insert Data', 'USER-2', 'KAR-2', 'direktur@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(25, 'Insert Data', 'USER-3', 'KAR-3', 'juliusjulianto91@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(26, 'Insert Data', 'USER-4', 'KAR-4', 'finance@mbpindo.com', '25d55ad283aa400af464c76d713c07ad'),
(27, 'Insert Data', 'USER-5', 'KAR-5', 'produksi@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(28, 'Insert Data', 'USER-6', 'KAR-6', 'risdev@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(29, 'Insert Data', 'USER-7', 'KAR-7', 'w.hfinishgoodmbp@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(30, 'Insert Data', 'USER-8', 'KAR-8', 'ppicmbp@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(31, 'Insert Data', 'USER-9', 'KAR-9', 'w.hmaterialmbp@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(32, 'Insert Data', 'USER-10', 'KAR-10', 'pic1@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(33, 'Insert Data', 'USER-11', 'KAR-11', 'pic2@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(34, 'Insert Data', 'USER-12', 'KAR-12', 'pic3@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(35, 'Edit Data', 'USER-1', 'KAR-1', 'amkaheja@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(36, 'Edit Data', 'USER-2', 'KAR-2', 'direktur@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(37, 'Edit Data', 'USER-2', 'KAR-2', 'direktur@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(38, 'Edit Data', 'USER-2', 'KAR-2', 'direktur@gmail.com', 'defac44447b57f152d14f30cea7a73cb'),
(39, 'Edit Data', 'USER-2', 'KAR-2', 'direktur@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(40, 'Edit Data', 'USER-10', 'KAR-10', 'pic1@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(41, 'Edit Data', 'USER-10', 'KAR-10', 'pic1@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(42, 'Edit Data', 'USER-10', 'KAR-10', 'pic1@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(43, 'Edit Data', 'USER-10', 'KAR-10', 'pic1@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(44, 'Edit Data', 'USER-10', 'KAR-10', 'pic12@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(45, 'Edit Data', 'USER-10', 'KAR-10', 'pic12@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(46, 'Edit Data', 'USER-10', 'KAR-10', 'pic12@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(47, 'Edit Data', 'USER-11', 'KAR-11', 'pic23@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(48, 'Edit Data', 'USER-10', 'KAR-10', 'pic12@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(49, 'Edit Data', 'USER-10', 'KAR-10', 'pic12@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(50, 'Edit Data', 'USER-11', 'KAR-11', 'pic231@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(51, 'Insert Data', 'USER-13', 'KAR-46', 'pictata@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(52, 'Edit Data', 'USER-10', 'KAR-10', 'pic1@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(53, 'Edit Data', 'USER-11', 'KAR-11', 'pic2@gmail.com', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `id_warna` varchar(10) NOT NULL,
  `nama_warna` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`id_warna`, `nama_warna`) VALUES
('WARNA-1', 'Black'),
('WARNA-2', 'Brown'),
('WARNA-3', 'Grey'),
('WARNA-4', 'Lime Green'),
('WARNA-5', 'Red'),
('WARNA-6', 'Tosca');

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
  `nama_warna` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna_logs`
--

INSERT INTO `warna_logs` (`id_warna_logs`, `keterangan_log`, `id_warna`, `nama_warna`) VALUES
(1, 'Insert Data', 'WARNA-1', 'BLACK'),
(2, 'Insert Data', 'WARNA-2', 'BROWN'),
(3, 'Insert Data', 'WARNA-3', 'GREY'),
(4, 'Insert Data', 'WARNA-4', 'LIME GREEN'),
(5, 'Insert Data', 'WARNA-5', 'RED'),
(6, 'Insert Data', 'WARNA-6', 'TOSCA'),
(7, 'Edit Data', 'WARNA-1', 'BLACKa'),
(8, 'Edit Data', 'WARNA-1', 'BLACK'),
(9, 'Edit Data', 'WARNA-1', 'Black'),
(10, 'Edit Data', 'WARNA-2', 'Brown'),
(11, 'Edit Data', 'WARNA-3', 'Grey'),
(12, 'Edit Data', 'WARNA-5', 'Red'),
(13, 'Edit Data', 'WARNA-6', 'Tosca'),
(14, 'Edit Data', 'WARNA-4', 'Lime Green');

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
-- Indexes for table `invoice_in`
--
ALTER TABLE `invoice_in`
  ADD PRIMARY KEY (`id_invoice_in`);

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
  MODIFY `id_bank_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `departemen_logs`
--
ALTER TABLE `departemen_logs`
  MODIFY `id_departemen_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `jabatan_logs`
--
ALTER TABLE `jabatan_logs`
  MODIFY `id_jabatan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `jenis_produk_logs`
--
ALTER TABLE `jenis_produk_logs`
  MODIFY `id_jenis_produk_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `karyawan_logs`
--
ALTER TABLE `karyawan_logs`
  MODIFY `id_karyawan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `line_logs`
--
ALTER TABLE `line_logs`
  MODIFY `id_line_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produk_logs`
--
ALTER TABLE `produk_logs`
  MODIFY `id_produk_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rekening_logs`
--
ALTER TABLE `rekening_logs`
  MODIFY `id_rekening_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tetapan_logs`
--
ALTER TABLE `tetapan_logs`
  MODIFY `id_tetapan_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ukuran_produk_logs`
--
ALTER TABLE `ukuran_produk_logs`
  MODIFY `id_ukuran_produk_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id_user_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `warna_logs`
--
ALTER TABLE `warna_logs`
  MODIFY `id_warna_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
