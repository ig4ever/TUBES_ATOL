-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 Jul 2017 pada 14.22
-- Versi Server: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atol_tubes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_usaha`
--

CREATE TABLE `data_usaha` (
  `id_usaha` varchar(20) NOT NULL,
  `no_Ktp` varchar(20) NOT NULL,
  `Nama_Usaha` varchar(30) NOT NULL,
  `Produk_Usaha` varchar(50) NOT NULL,
  `Produk_Utama` varchar(40) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Kecamatan` varchar(20) NOT NULL,
  `Kelurahan` varchar(20) NOT NULL,
  `Telp` varchar(14) NOT NULL,
  `Latitude` varchar(20) NOT NULL,
  `Longitude` varchar(20) NOT NULL,
  `Skala_Usaha` varchar(20) NOT NULL,
  `Sektor_Usaha` varchar(20) NOT NULL,
  `gambar1` varchar(20) NOT NULL,
  `gambar2` varchar(20) NOT NULL,
  `gambar3` varchar(20) NOT NULL,
  `gambar4` varchar(20) NOT NULL,
  `gambar5` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `Idkec` varchar(20) NOT NULL,
  `NamaKec` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `idkel` varchar(20) NOT NULL,
  `idKec` varchar(20) NOT NULL,
  `Namakec` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik_usaha`
--

CREATE TABLE `pemilik_usaha` (
  `No_Ktp` varchar(20) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Tempat_Lahir` varchar(20) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `No_Telp` varchar(14) NOT NULL,
  `Keterangan` varchar(20) NOT NULL,
  `Photo_Ktp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sektor_usaha`
--

CREATE TABLE `sektor_usaha` (
  `id_Sektor` varchar(20) NOT NULL,
  `NamaSektor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skala_usaha`
--

CREATE TABLE `skala_usaha` (
  `id_skala` varchar(20) NOT NULL,
  `NamaSkala` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_usaha`
--
ALTER TABLE `data_usaha`
  ADD PRIMARY KEY (`id_usaha`),
  ADD KEY `no_Ktp` (`no_Ktp`),
  ADD KEY `Kecamatan` (`Kecamatan`),
  ADD KEY `Kelurahan` (`Kelurahan`),
  ADD KEY `Skala_Usaha` (`Skala_Usaha`),
  ADD KEY `Sektor_Usaha` (`Sektor_Usaha`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`Idkec`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`idkel`),
  ADD KEY `idKec` (`idKec`);

--
-- Indexes for table `pemilik_usaha`
--
ALTER TABLE `pemilik_usaha`
  ADD PRIMARY KEY (`No_Ktp`);

--
-- Indexes for table `sektor_usaha`
--
ALTER TABLE `sektor_usaha`
  ADD PRIMARY KEY (`id_Sektor`);

--
-- Indexes for table `skala_usaha`
--
ALTER TABLE `skala_usaha`
  ADD PRIMARY KEY (`id_skala`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_usaha`
--
ALTER TABLE `data_usaha`
  ADD CONSTRAINT `data_usaha_ibfk_1` FOREIGN KEY (`no_Ktp`) REFERENCES `pemilik_usaha` (`No_Ktp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_usaha_ibfk_2` FOREIGN KEY (`Kecamatan`) REFERENCES `kecamatan` (`Idkec`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_usaha_ibfk_3` FOREIGN KEY (`Kelurahan`) REFERENCES `kelurahan` (`idkel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_usaha_ibfk_4` FOREIGN KEY (`Skala_Usaha`) REFERENCES `skala_usaha` (`id_skala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_usaha_ibfk_5` FOREIGN KEY (`Sektor_Usaha`) REFERENCES `sektor_usaha` (`id_Sektor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`idKec`) REFERENCES `kecamatan` (`Idkec`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
