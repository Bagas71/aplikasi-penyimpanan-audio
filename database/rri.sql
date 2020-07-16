-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2020 pada 03.54
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_inputan`
--

CREATE TABLE `data_inputan` (
  `id` int(11) NOT NULL,
  `nama_perekam` varchar(50) DEFAULT NULL,
  `nama_rekaman` varchar(100) DEFAULT NULL,
  `jenis_rekaman` varchar(50) NOT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `suara` varchar(200) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_inputan`
--

INSERT INTO `data_inputan` (`id`, `nama_perekam`, `nama_rekaman`, `jenis_rekaman`, `keterangan`, `suara`, `tanggal`) VALUES
(55, 'Bagas Trihambodo', 'enak', 'PRO1', 'asefggggggsadsdadsda', '5d7e6ef9b1d1d.mpeg', '2019-09-16'),
(60, 'fikri abdillah', 'enak', 'PRO2', 'coba', '5d7f349074d72.mpeg', '2019-09-16'),
(61, 'asd', 'asd', 'PRO1', 'fgfh', 'LEMBAR KONSULTASI PEMBIMBING KKLP.docx', '2020-02-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(3, 'admin', '$2y$10$oTfBGxxCOSamwYga.lBdqOLT1kf4LUVWGtquNcu62iGSrVDnjbEzO'),
(4, 'bagas', '$2y$10$4Q0nAN4GlTWrp/xzglPFPuJsdwdCqVf9ZX3C.KGaNfDHXVpVubzci');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_inputan`
--
ALTER TABLE `data_inputan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_inputan`
--
ALTER TABLE `data_inputan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
