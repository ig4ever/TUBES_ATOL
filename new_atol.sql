-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2017 at 12:34 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_atol`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(51) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_usaha`
--

CREATE TABLE `data_usaha` (
  `id_usaha` varchar(20) NOT NULL,
  `id_login` int(11) NOT NULL,
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
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `Idkec` varchar(20) NOT NULL,
  `NamaKec` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `idkel` varchar(20) NOT NULL,
  `idKec` varchar(20) NOT NULL,
  `Namakec` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `No_Ktp` varchar(20) NOT NULL,
  `Password` varchar(101) NOT NULL,
  `login_role` enum('Admin','Pemilik Usaha') NOT NULL DEFAULT 'Pemilik Usaha'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `No_Ktp`, `Password`, `login_role`) VALUES
(51, '1214901750', '202cb962ac59075b964b07152d234b70', 'Pemilik Usaha'),
(52, '124551235236', '202cb962ac59075b964b07152d234b70', 'Pemilik Usaha');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_usaha`
--

CREATE TABLE `pemilik_usaha` (
  `pemilik_usaha_id` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Tempat_Lahir` varchar(20) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `No_Telp` varchar(14) NOT NULL,
  `Keterangan` varchar(20) NOT NULL,
  `Photo_Ktp` varchar(50) NOT NULL,
  `aktifasi` enum('Y','T') NOT NULL,
  `kode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilik_usaha`
--

INSERT INTO `pemilik_usaha` (`pemilik_usaha_id`, `Nama`, `Email`, `Alamat`, `Tempat_Lahir`, `Tanggal_Lahir`, `No_Telp`, `Keterangan`, `Photo_Ktp`, `aktifasi`, `kode`) VALUES
(51, 'Rakhmat', 'rahmatig4ever@gmail.', 'Jalan Pangarang Bawah IV, Cikawao, Bandung City, West Java, Indonesia', 'bandung', '2017-07-02', '', '', '', 'Y', '4e25c0c0adfa1d7795a6169722c7744c'),
(52, 'Budi', 'rahmatig4ever@gmail.', 'Pangarengan, Subang Regency, West Java, Indonesia', 'bandung', '2017-07-11', '', '', '', 'Y', '28fa4a4d2cc690b0df818d549ba281a7');

-- --------------------------------------------------------

--
-- Table structure for table `sektor_usaha`
--

CREATE TABLE `sektor_usaha` (
  `id_Sektor` varchar(20) NOT NULL,
  `NamaSektor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skala_usaha`
--

CREATE TABLE `skala_usaha` (
  `id_skala` varchar(20) NOT NULL,
  `NamaSkala` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_nama` (`admin_nama`);

--
-- Indexes for table `data_usaha`
--
ALTER TABLE `data_usaha`
  ADD PRIMARY KEY (`id_usaha`),
  ADD KEY `fk_pemilik_usaha_data` (`id_login`),
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
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD UNIQUE KEY `No_Ktp` (`No_Ktp`);

--
-- Indexes for table `pemilik_usaha`
--
ALTER TABLE `pemilik_usaha`
  ADD PRIMARY KEY (`pemilik_usaha_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_login` FOREIGN KEY (`admin_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_usaha`
--
ALTER TABLE `data_usaha`
  ADD CONSTRAINT `data_usaha_ibfk_2` FOREIGN KEY (`Kecamatan`) REFERENCES `kecamatan` (`Idkec`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_usaha_ibfk_3` FOREIGN KEY (`Kelurahan`) REFERENCES `kelurahan` (`idkel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_usaha_ibfk_4` FOREIGN KEY (`Skala_Usaha`) REFERENCES `skala_usaha` (`id_skala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_usaha_ibfk_5` FOREIGN KEY (`Sektor_Usaha`) REFERENCES `sektor_usaha` (`id_Sektor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pemilik_usaha_data` FOREIGN KEY (`id_login`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`idKec`) REFERENCES `kecamatan` (`Idkec`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemilik_usaha`
--
ALTER TABLE `pemilik_usaha`
  ADD CONSTRAINT `fk_pemilik_usaha` FOREIGN KEY (`pemilik_usaha_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
