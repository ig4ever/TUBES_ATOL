-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2017 at 07:44 AM
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`) VALUES
(53, 'admin');

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

--
-- Dumping data for table `data_usaha`
--

INSERT INTO `data_usaha` (`id_usaha`, `id_login`, `Nama_Usaha`, `Produk_Usaha`, `Produk_Utama`, `Alamat`, `Kecamatan`, `Kelurahan`, `Telp`, `Latitude`, `Longitude`, `Skala_Usaha`, `Sektor_Usaha`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`) VALUES
('1', 75, 'narkoba', 'dji sam soe', 'mie ketrek', 'bandung', '1', '1', '35355', '35245', '23523', '1', '1', 'aasd', 'asdas', 'asdasd', 'asdad', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `Idkec` varchar(20) NOT NULL,
  `NamaKec` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`Idkec`, `NamaKec`) VALUES
('1', 'lengkong');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `idkel` varchar(20) NOT NULL,
  `idKec` varchar(20) NOT NULL,
  `Namakel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`idkel`, `idKec`, `Namakel`) VALUES
('1', '1', 'cikawao');

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
(53, '8758658', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(54, '123123123', '202cb962ac59075b964b07152d234b70', 'Pemilik Usaha'),
(75, '107208205197509124', '202cb962ac59075b964b07152d234b70', 'Pemilik Usaha');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_usaha`
--

CREATE TABLE `pemilik_usaha` (
  `pemilik_usaha_id` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Tempat_Lahir` varchar(20) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `No_Telp` varchar(14) NOT NULL,
  `Keterangan` varchar(20) NOT NULL,
  `Photo_Ktp` varchar(101) NOT NULL,
  `aktifasi` enum('Aktif','Belum Aktif') NOT NULL,
  `kode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilik_usaha`
--

INSERT INTO `pemilik_usaha` (`pemilik_usaha_id`, `Nama`, `Email`, `Alamat`, `Tempat_Lahir`, `Tanggal_Lahir`, `No_Telp`, `Keterangan`, `Photo_Ktp`, `aktifasi`, `kode`) VALUES
(54, 'Rakhmat Sabarudin', 'rahmatig4ever@gmail.com', 'Jalan Pangarang Bawah IV, Cikawao, Bandung City, West Java, Indonesia', 'Band', '1995-01-01', '4241622', 'Programmer', 'rakhmatsabarudin20170718012613.png', 'Aktif', 'eeca7903bc07df7517ba0b9bbd844260'),
(75, 'Joko Purwanto', 'rahmatig4ever@gmail.com', 'Pangalengan, Bandung, West Java, Indonesia', 'Jakarta', '1997-01-01', '4245155', 'IOT', 'jokopurwanto20170718104201.png', 'Belum Aktif', '9aac807bc7134ac90b546615e5bb55f8');

-- --------------------------------------------------------

--
-- Table structure for table `sektor_usaha`
--

CREATE TABLE `sektor_usaha` (
  `id_Sektor` varchar(20) NOT NULL,
  `NamaSektor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sektor_usaha`
--

INSERT INTO `sektor_usaha` (`id_Sektor`, `NamaSektor`) VALUES
('1', 'besar');

-- --------------------------------------------------------

--
-- Table structure for table `skala_usaha`
--

CREATE TABLE `skala_usaha` (
  `id_skala` varchar(20) NOT NULL,
  `NamaSkala` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skala_usaha`
--

INSERT INTO `skala_usaha` (`id_skala`, `NamaSkala`) VALUES
('1', 'kexc');

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
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
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
