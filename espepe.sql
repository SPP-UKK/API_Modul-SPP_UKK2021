-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 06:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `espepe`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `jurusan` varchar(5) NOT NULL,
  `angkatan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `jurusan`, `angkatan`) VALUES
(1, 'XI TKJ 2', 'TKJ', 28),
(2, 'XII RPL 3', 'RPL', 28),
(3, 'X TKJ 5', 'TKJ', 30);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `nisn` char(10) NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `bulan_spp` int(2) NOT NULL,
  `tahun_spp` int(4) NOT NULL,
  `status_bayar` varchar(5) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `kurang_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `id_spp`, `nisn`, `tgl_bayar`, `bulan_spp`, `tahun_spp`, `status_bayar`, `jumlah_bayar`, `kurang_bayar`) VALUES
(1, 9, 3, '0040594843', '2022-02-09', 7, 2021, 'Lunas', 300000, 0),
(2, 9, 3, '0040594843', '2022-02-08', 8, 2021, 'Belum', 50000, 250000),
(3, 9, 3, '0040594843', NULL, 9, 2021, 'Belum', 0, 0),
(4, 9, 3, '0040594843', NULL, 10, 2021, 'Belum', 0, 0),
(5, 9, 3, '0040594843', NULL, 11, 2021, 'Belum', 0, 0),
(6, 9, 3, '0040594843', NULL, 12, 2021, 'Belum', 0, 0),
(7, 9, 3, '0040594843', '2022-02-09', 1, 2022, 'Lunas', 300000, 0),
(8, 9, 3, '0040594843', '2022-02-09', 2, 2022, 'Lunas', 300000, 0),
(9, 9, 3, '0040594843', NULL, 3, 2022, 'Belum', 0, 0),
(10, 9, 3, '0040594843', NULL, 4, 2022, 'Belum', 0, 0),
(11, 9, 3, '0040594843', NULL, 5, 2022, 'Belum', 0, 0),
(12, 9, 3, '0040594843', NULL, 6, 2022, 'Belum', 0, 0),
(13, 9, 3, '0040594844', '2022-02-08', 7, 2021, 'Lunas', 300000, 0),
(14, 9, 3, '0040594844', '2022-02-08', 8, 2021, 'Belum', 0, 0),
(15, 9, 3, '0040594844', NULL, 9, 2021, 'Belum', 0, 0),
(16, 9, 3, '0040594844', NULL, 10, 2021, 'Belum', 0, 0),
(17, 9, 3, '0040594844', NULL, 11, 2021, 'Belum', 0, 0),
(18, 9, 3, '0040594844', NULL, 12, 2021, 'Belum', 0, 0),
(19, 9, 3, '0040594844', NULL, 1, 2022, 'Belum', 0, 0),
(20, 9, 3, '0040594844', NULL, 2, 2022, 'Belum', 0, 0),
(21, 9, 3, '0040594844', NULL, 3, 2022, 'Belum', 0, 0),
(22, 9, 3, '0040594844', NULL, 4, 2022, 'Belum', 0, 0),
(23, 9, 3, '0040594844', NULL, 5, 2022, 'Belum', 0, 0),
(24, 9, 3, '0040594844', NULL, 6, 2022, 'Belum', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(34) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('petugas','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'devon', 'e50da88aa796637e5e634006d6db525e', 'GregoriusDevon', 'admin'),
(2, 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 'NamanyaSapa', 'petugas'),
(9, 'bashir', '7a254065dd0fdaaf9b169de13f25edbf', 'FadlillahBashir', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(10) NOT NULL,
  `nis` char(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `password` varchar(34) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `password`) VALUES
('0040594843', '12345678', 'Gregorius Devon Bramantyo', 2, 'Malang', '081336267047', '28b662d883b6d76fd96e4ddc5e9ba780'),
('0040594844', '12345678', 'Adam Himawan', 2, 'Malang', '081336267047', '8b8be2799a2796a36a02004608426bdb');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `angkatan` int(2) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `angkatan`, `tahun`, `nominal`) VALUES
(1, 28, 2021, 500000),
(2, 29, 2021, 600000),
(3, 28, 2022, 300000),
(4, 30, 2019, 700000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD UNIQUE KEY `password` (`password`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1225;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_5` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_6` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
