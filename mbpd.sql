-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2020 at 06:47 AM
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
  `status_delete` int(11) NOT NULL
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
('DEPT-6', 'Finish Good', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
  `status_delete` int(11) NOT NULL
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
('JBT-2', 'Manager', 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-3', 'Admin', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-4', 'PPIC', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-5', 'Operator Gudang', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-6', 'PIC Line Cutting', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-7', 'Staff Line Cutting', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-8', 'Staff Line Bonding', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBT-9', 'Staff Line Sewing', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
('JBTKAR-2', 'KAR-2', 'SJBT-2', 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-3', 'KAR-4', 'SJBT-3', 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-4', 'KAR-3', 'SJBT-4', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-5', 'KAR-5', 'SJBT-5', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-6', 'KAR-6', 'SJBT-6', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-7', 'KAR-2', 'SJBT-7', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-8', 'KAR-7', 'SJBT-8', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('JBTKAR-9', 'KAR-8', 'SJBT-9', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

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
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('KAR-1', 'Andryan Dedy', 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-10', 'pic2', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-11', 'pic3', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-2', 'Julius', 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-3', 'Ita', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-4', 'Admin Produksi', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-5', 'Admin Risdev', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-6', 'Admin Finish Good', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-7', 'Yudi', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-8', 'Operator Gudang', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('KAR-9', 'pic1', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `konsumsi_material`
--

CREATE TABLE `konsumsi_material` (
  `id_konsumsi_material` varchar(10) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `id_sub_jenis_material` varchar(10) NOT NULL,
  `jumlah_material` int(11) NOT NULL,
  `satuan_ukuran` varchar(30) NOT NULL,
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
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(10) NOT NULL,
  `kode_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `keterangan_produk` varchar(50) NOT NULL,
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
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spesifikasi_jabatan`
--

INSERT INTO `spesifikasi_jabatan` (`id_spesifikasi_jabatan`, `id_jabatan`, `id_departemen`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('SJBT-1', 'JBT-1', 'DEPT-1', 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-10', 'JBT-6', 'DEPT-3', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-11', 'JBT-11', 'DEPT-3', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-12', 'JBT-12', 'DEPT-3', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-13', 'JBT-13', 'DEPT-3', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('SJBT-2', 'JBT-2', 'DEPT-1', 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` text NOT NULL,
  `user_add` varchar(10) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` varchar(10) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` varchar(10) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_karyawan`, `email_user`, `password_user`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('USER-1', 'KAR-1', 'direktur@gmail.com', '12345678', 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-10', 'KAR-10', 'pic2@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-11', 'KAR-11', 'pic3@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-2', 'KAR-2', 'julius@gmail.com', '12345678', 'USER-1', '2020-08-29 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-3', 'KAR-3', 'ita@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-4', 'KAR-4', 'produksi@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-5', 'KAR-5', 'risdev@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-6', 'KAR-6', 'finishgood@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-7', 'KAR-7', 'ppic@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-8', 'KAR-8', 'operator@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0),
('USER-9', 'KAR-9', 'pic1@gmail.com', '12345678', 'USER-1', '2020-08-30 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

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
-- Indexes for table `detail_delivery_note`
--
ALTER TABLE `detail_delivery_note`
  ADD PRIMARY KEY (`id_detail_delivery_note`);

--
-- Indexes for table `detail_permintaan_material`
--
ALTER TABLE `detail_permintaan_material`
  ADD PRIMARY KEY (`id_detail_permintaan_material`);

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
-- Indexes for table `jenis_material`
--
ALTER TABLE `jenis_material`
  ADD PRIMARY KEY (`id_jenis_material`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `konsumsi_material`
--
ALTER TABLE `konsumsi_material`
  ADD PRIMARY KEY (`id_konsumsi_material`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indexes for table `spesifikasi_jabatan`
--
ALTER TABLE `spesifikasi_jabatan`
  ADD PRIMARY KEY (`id_spesifikasi_jabatan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
