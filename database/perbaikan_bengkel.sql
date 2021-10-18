-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2021 at 04:36 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perbaikan_bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` int(11) NOT NULL,
  `pelaporan_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `harga_item` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `internal`
--

CREATE TABLE `internal` (
  `id_internal` int(11) NOT NULL,
  `pengaduan_id` int(11) NOT NULL,
  `disposisi_teknisi` int(11) DEFAULT NULL,
  `tindakan` text,
  `tgl_tindakan` datetime DEFAULT NULL,
  `tgl_pengaduan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_disposisi` datetime NOT NULL,
  `tgl_diagnosa` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `diagnosa_masalah` varchar(125) DEFAULT NULL,
  `total_biaya` decimal(10,0) NOT NULL,
  `file` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `nama_item` varchar(125) NOT NULL,
  `jenis_item` varchar(125) NOT NULL,
  `harga_item` decimal(10,0) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `nama_item`, `jenis_item`, `harga_item`, `created_at`) VALUES
(4, 'Power Supply', 'Hardware', '500000', '2021-10-14 00:00:00'),
(5, 'VGA', 'Hardware', '400000', '2021-10-14 00:00:00'),
(6, 'RAM 2 GB', 'Hardware', '150000', '2021-10-14 00:00:00'),
(7, 'RAM 4 GB', 'Hardware', '300000', '2021-10-14 00:00:00'),
(8, 'RAM 8 GB', 'Hardware', '650000', '2021-10-14 00:00:00'),
(9, 'Harddisk 500 GB', 'Hardware', '1000000', '2021-10-14 00:00:00'),
(10, 'Harddisk 1 TB', 'Hardware', '1550000', '2021-10-14 00:00:00'),
(11, 'SSD 500 GB', 'Hardware', '2000000', '2021-10-14 00:00:00'),
(12, 'Windows XP', 'Software', '1250000', '2021-10-14 00:00:00'),
(13, 'Windows 7', 'Software', '1500000', '2021-10-14 00:00:00'),
(14, 'Hub/Switch', 'Hardware', '2500000', '2021-10-14 00:00:00'),
(15, 'Router Wireless', 'Hardware', '3530000', '2021-10-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_user` varchar(125) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `perangkat_id` int(11) DEFAULT NULL,
  `jenis_perangkat` varchar(125) NOT NULL,
  `nama_perangkat` varchar(125) NOT NULL,
  `no_inventaris` varchar(125) NOT NULL,
  `keluhan` text,
  `status` varchar(50) NOT NULL DEFAULT 'open',
  `keterangan` char(2) NOT NULL DEFAULT 'p',
  `tgl_masuk` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` text NOT NULL,
  `penerima_pengembalian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_pengguna`, `nama_user`, `telepon`, `perangkat_id`, `jenis_perangkat`, `nama_perangkat`, `no_inventaris`, `keluhan`, `status`, `keterangan`, `tgl_masuk`, `note`, `penerima_pengembalian`) VALUES
(112432, 0, 'Suharto', '081377510140', NULL, 'Perangkat Komputer', 'CPU', 'N464371MA3012', 'CPU berjalan lambat dan penyimpanan penuh', 'open', 'tp', '2021-10-14 09:11:14', '', ''),
(112450, 0, 'Nazorri', '081366219018', NULL, '1. Perangkat Komputer 2. Perangkat Printer', '1.CPU 2. Printer', '1. N464371MA3012 2. N92911AM90235', 'CPU tidak bisa hidup dan printer tinta tidak bisa keluar pada saat print', 'open', 'tp', '2021-10-14 09:11:14', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `perangkat`
--

CREATE TABLE `perangkat` (
  `id_perangkat` int(11) NOT NULL,
  `no_inventaris` varchar(125) NOT NULL,
  `nama_perangkat` varchar(125) NOT NULL,
  `jenis_perangkat` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perangkat`
--

INSERT INTO `perangkat` (`id_perangkat`, `no_inventaris`, `nama_perangkat`, `jenis_perangkat`, `created_at`) VALUES
(3, 'N464371MA3012', 'CPU', 'Perangkat Komputer', '2021-10-14 00:00:00'),
(4, 'N902AJ76120981', 'Monitor', 'Perangkat Komputer', '2021-10-14 00:00:00'),
(5, 'N92911AM90235', 'Printer', 'Perangkat Printer', '2021-10-14 00:00:00'),
(6, 'N91900SA20678', 'Jaringan Komputer Lokal (LAN)', 'Perangkat Jaringan', '2021-10-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `role` char(2) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `role`, `is_active`) VALUES
(1, 'admin', '$2y$10$3GoRFQGlEq2l/gzHEPZG2eH/7dsV1nFhU8tfivoP9uhCO1pZAgoVW', 'Admin', 'A', 1),
(2, 'kepala', '$2y$10$.JvGLD1YrC3c1vr4Jkz4OeuXf6RwCeNHZPkug2gujebIDwx5cVmE2', 'Kepala', 'K', 1),
(3, 'superadmin', '$2y$10$MzjFQeJUVc.y6u9o4G49j.7xbiFszkK7BQfNDd5XZURB4qtfScoR6', 'Super Admin', 'SA', 1),
(4, 'dimas.teknisi', '$2y$10$oDr1hjSsG26rGGh5/WgES.kjHe69DCxdk1qAMXXjvos73rK1Dp0Q.', 'Dimas Dwi Kurniawan', 'T', 1),
(5, 'septian.teknisi', '$2y$10$ojSrzOrXWVEFwgo16CNFNuWEE3qZcrTFtPmb8ld182wwqEKWK/2WG', 'Septian Hadinata', 'T', 1),
(6, 'fadhli.teknisi', '$2y$10$ZhLbSs1qNuhngep8wTDFkOf1zzaRUiAloNUGkwBATgCBJnf21oiom', 'Muhammad Fadhli Dzil Ikram Pohan', 'T', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `internal`
--
ALTER TABLE `internal`
  ADD PRIMARY KEY (`id_internal`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `perangkat`
--
ALTER TABLE `perangkat`
  ADD PRIMARY KEY (`id_perangkat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internal`
--
ALTER TABLE `internal`
  MODIFY `id_internal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112451;

--
-- AUTO_INCREMENT for table `perangkat`
--
ALTER TABLE `perangkat`
  MODIFY `id_perangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
