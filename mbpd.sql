-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2020 at 06:55 PM
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
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`);

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
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

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
