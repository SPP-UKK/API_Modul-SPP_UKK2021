-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Mar 2022 pada 16.53
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

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
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `jurusan` varchar(5) NOT NULL,
  `angkatan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `jurusan`, `angkatan`) VALUES
(1, 'XI TKJ 2', 'TKJ', 28),
(2, 'XII RPL 3', 'RPL', 28),
(3, 'X TKJ 5', 'TKJ', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
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
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `id_spp`, `nisn`, `tgl_bayar`, `bulan_spp`, `tahun_spp`, `status_bayar`, `jumlah_bayar`, `kurang_bayar`) VALUES
(13, 1, 3, '0040594843', '2022-03-14', 7, 2021, 'Lunas', 300000, 0),
(14, 1, 3, '0040594843', '2022-03-15', 8, 2021, 'Lunas', 300000, 0),
(15, 1, 3, '0040594843', '2022-03-15', 9, 2021, 'Lunas', 300000, 0),
(16, 1, 3, '0040594843', '2022-03-15', 10, 2021, 'Lunas', 300000, 0),
(17, 1, 3, '0040594843', '2022-03-15', 11, 2021, 'Belum', 50000, 250000),
(18, 1, 3, '0040594843', NULL, 12, 2021, 'Belum', 0, 0),
(19, 1, 3, '0040594843', NULL, 1, 2022, 'Belum', 0, 0),
(20, 1, 3, '0040594843', NULL, 2, 2022, 'Belum', 0, 0),
(21, 1, 3, '0040594843', '2022-03-14', 3, 2022, 'Lunas', 300000, 0),
(22, 1, 3, '0040594843', NULL, 4, 2022, 'Belum', 0, 0),
(23, 1, 3, '0040594843', NULL, 5, 2022, 'Belum', 0, 0),
(24, 1, 3, '0040594843', NULL, 6, 2022, 'Belum', 0, 0),
(25, 2, 3, '0040914785', '2022-03-16', 7, 2021, 'Lunas', 300000, 0),
(26, 2, 3, '0040914785', '2022-03-17', 8, 2021, 'Lunas', 300000, 0),
(27, 2, 3, '0040914785', '2022-03-18', 9, 2021, 'Belum', 50000, 250000),
(28, 2, 3, '0040914785', '2022-03-16', 10, 2021, 'Lunas', 300000, 0),
(29, 2, 3, '0040914785', NULL, 11, 2021, 'Belum', 0, 0),
(30, 2, 3, '0040914785', NULL, 12, 2021, 'Belum', 0, 0),
(31, 2, 3, '0040914785', '2022-03-16', 1, 2022, 'Belum', 50000, 250000),
(32, 2, 3, '0040914785', NULL, 2, 2022, 'Belum', 0, 0),
(33, 2, 3, '0040914785', NULL, 3, 2022, 'Belum', 0, 0),
(34, 2, 3, '0040914785', NULL, 4, 2022, 'Belum', 0, 0),
(35, 2, 3, '0040914785', NULL, 5, 2022, 'Belum', 0, 0),
(36, 2, 3, '0040914785', NULL, 6, 2022, 'Belum', 0, 0),
(37, 2, 3, '0040123456', NULL, 7, 2021, 'Belum', 0, 0),
(38, 2, 3, '0040123456', NULL, 8, 2021, 'Belum', 0, 0),
(39, 2, 3, '0040123456', NULL, 9, 2021, 'Belum', 0, 0),
(40, 2, 3, '0040123456', NULL, 10, 2021, 'Belum', 0, 0),
(41, 2, 3, '0040123456', NULL, 11, 2021, 'Belum', 0, 0),
(42, 2, 3, '0040123456', NULL, 12, 2021, 'Belum', 0, 0),
(43, 2, 3, '0040123456', NULL, 1, 2022, 'Belum', 0, 0),
(44, 2, 3, '0040123456', NULL, 2, 2022, 'Belum', 0, 0),
(45, 2, 3, '0040123456', NULL, 3, 2022, 'Belum', 0, 0),
(46, 2, 3, '0040123456', NULL, 4, 2022, 'Belum', 0, 0),
(47, 2, 3, '0040123456', NULL, 5, 2022, 'Belum', 0, 0),
(48, 2, 3, '0040123456', NULL, 6, 2022, 'Belum', 0, 0),
(49, 1, 3, '0033081823', NULL, 7, 2021, 'Belum', 0, 0),
(50, 1, 3, '0033081823', NULL, 8, 2021, 'Belum', 0, 0),
(51, 1, 3, '0033081823', NULL, 9, 2021, 'Belum', 0, 0),
(52, 1, 3, '0033081823', NULL, 10, 2021, 'Belum', 0, 0),
(53, 1, 3, '0033081823', NULL, 11, 2021, 'Belum', 0, 0),
(54, 1, 3, '0033081823', NULL, 12, 2021, 'Belum', 0, 0),
(55, 1, 3, '0033081823', '2022-03-16', 1, 2022, 'Belum', 50000, 250000),
(56, 1, 3, '0033081823', NULL, 2, 2022, 'Belum', 0, 0),
(57, 1, 3, '0033081823', NULL, 3, 2022, 'Belum', 0, 0),
(58, 1, 3, '0033081823', NULL, 4, 2022, 'Belum', 0, 0),
(59, 1, 3, '0033081823', NULL, 5, 2022, 'Belum', 0, 0),
(60, 1, 3, '0033081823', NULL, 6, 2022, 'Belum', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(34) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('Petugas','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'devon', 'e50da88aa796637e5e634006d6db525e', 'GregoriusDevon', 'Admin'),
(2, 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 'NamanyaPetugas', 'Petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
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
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `password`) VALUES
('0033081823', '12345678', 'Fadlillah Bashir Al Hakim', 2, 'Malang', '089697048302', '7a254065dd0fdaaf9b169de13f25edbf'),
('0040123456', '12345678', 'Ruqul Adam Himawan', 1, 'Blitar', '0859193774917', '1d7c2923c1684726dc23d2901c4d8157'),
('0040594843', '12345678', 'Gregorius Devon Bramantyo', 2, 'Malang', '081336267047', '28b662d883b6d76fd96e4ddc5e9ba780'),
('0040914785', '12345678', 'Christiany Kikyo Gracia Matulessy', 3, 'Blitar', '085806529333', '6b34fe24ac2ff8103f6fce1f0da2ef57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `angkatan` int(2) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`id_spp`, `angkatan`, `tahun`, `nominal`) VALUES
(1, 28, 2022, 500000),
(2, 29, 2021, 600000),
(3, 28, 2022, 300000),
(4, 30, 2019, 600000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD UNIQUE KEY `password` (`password`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1226;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_5` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_6` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
