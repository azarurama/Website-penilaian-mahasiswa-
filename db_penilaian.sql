-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Bulan Mei 2023 pada 16.03
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penilaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblmatkul`
--

CREATE TABLE `tblmatkul` (
  `kd_mtk` varchar(5) NOT NULL,
  `sks` varchar(3) NOT NULL,
  `nm_mtk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblmatkul`
--

INSERT INTO `tblmatkul` (`kd_mtk`, `sks`, `nm_mtk`) VALUES
('B003', '3', 'Jarkom'),
('B004', '3', 'Statprob');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblmhs`
--

CREATE TABLE `tblmhs` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblmhs`
--

INSERT INTO `tblmhs` (`nim`, `nama`, `tgllahir`, `alamat`) VALUES
('2111501090', 'Muhammad Zulfa', '2003-01-30', 'Mexico'),
('2111501116', 'Gina Rezi', '2003-05-16', 'Parung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblnilai`
--

CREATE TABLE `tblnilai` (
  `nim` varchar(10) NOT NULL,
  `kd_mtk` varchar(5) NOT NULL,
  `nilai` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblnilai`
--

INSERT INTO `tblnilai` (`nim`, `kd_mtk`, `nilai`) VALUES
('2111500514', 'P006', '90'),
('2123456789', 'P007', '90'),
('2111500529', 'P008', '78');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblmatkul`
--
ALTER TABLE `tblmatkul`
  ADD UNIQUE KEY `nm_mtk` (`kd_mtk`),
  ADD KEY `kd_mtk` (`kd_mtk`);

--
-- Indeks untuk tabel `tblmhs`
--
ALTER TABLE `tblmhs`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tblnilai`
--
ALTER TABLE `tblnilai`
  ADD PRIMARY KEY (`kd_mtk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
