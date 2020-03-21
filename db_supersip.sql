-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2019 at 06:55 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_supersip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_arsip`
--

CREATE TABLE `tbl_arsip` (
  `id` int(3) NOT NULL,
  `status` int(2) NOT NULL,
  `dr_kpd` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `no_urut` varchar(10) NOT NULL,
  `indeks` varchar(40) NOT NULL,
  `kode_surat` varchar(2) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_simpan` date NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `jenis_surat` varchar(20) NOT NULL,
  `b_s_sr` varchar(10) NOT NULL,
  `no_laci` varchar(10) NOT NULL,
  `sistem_simpan` varchar(20) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `isi_ringkas` varchar(50) NOT NULL,
  `scan_arsip` varchar(100) NOT NULL,
  `arsiparis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_arsip`
--

INSERT INTO `tbl_arsip` (`id`, `status`, `dr_kpd`, `alamat`, `kota`, `no_surat`, `no_urut`, `indeks`, `kode_surat`, `tanggal_surat`, `tanggal_simpan`, `perihal`, `jenis_surat`, `b_s_sr`, `no_laci`, `sistem_simpan`, `unit`, `isi_ringkas`, `scan_arsip`, `arsiparis`) VALUES
(6, 0, 'ASD', 'SAD', 'ASD', 'ASD', 'ASD', 'ASD', 'AS', '2019-05-21', '2019-05-03', 'ASD', 'SAD', 'B', 'O-S', 'SA', 'SA', 'ASD', '6.jpg', 'ASD'),
(7, 1, 'asd', 'sdqw', 'asd', 'sa', 'as', 'asd', 'as', '2019-05-07', '2019-05-03', 'sad', 'sad', 'das', 'O-S', 'sa', 'sda', 'sa', '6.jpg', 'd'),
(8, 1, 'sad', 'sad', 'sad', 'asd', 'asd', 'dsa', 'ds', '2019-05-29', '2019-05-03', 'd', 'd', 'd', 'O-S', 'd', 'd', 'd', '2.jpg', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id` int(3) NOT NULL,
  `nama_peminjam` varchar(20) NOT NULL,
  `indeks` varchar(40) NOT NULL,
  `kode_surat` varchar(2) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `no_laci` varchar(10) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id`, `nama_peminjam`, `indeks`, `kode_surat`, `no_surat`, `no_laci`, `perihal`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(7, 'asd', 'as', 'sa', '123', 'A-G', '', '2019-05-03', '1900-11-30'),
(8, 'ftgh', 'gf', 'gf', 'asd', 'H-N', 'gh', '2019-05-05', '2019-05-22'),
(9, 'hgf', 'gh', 'gh', 'ASD', 'A-G', 'hg', '2019-05-05', '2019-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(4, 'reyhan', 'reyhan'),
(6, 'ade', 'ade');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
