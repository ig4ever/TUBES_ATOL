-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: localhost    Database: new_atol
-- ------------------------------------------------------
-- Server version	5.6.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(51) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_nama` (`admin_nama`),
  CONSTRAINT `fk_admin_login` FOREIGN KEY (`admin_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (53,'admin'),(76,'Rakhmat');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_usaha`
--

DROP TABLE IF EXISTS `data_usaha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_usaha` (
  `id_usaha` int(20) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) NOT NULL,
  `Nama_Usaha` varchar(30) NOT NULL,
  `Produk_Usaha` varchar(50) NOT NULL,
  `Produk_Utama` varchar(40) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Kecamatan` int(20) NOT NULL,
  `Kelurahan` int(20) NOT NULL,
  `Telp` varchar(14) NOT NULL,
  `Latitude` varchar(20) NOT NULL,
  `Longitude` varchar(20) NOT NULL,
  `Skala_Usaha` int(20) NOT NULL,
  `Sektor_Usaha` int(20) NOT NULL,
  `gambar1` varchar(20) NOT NULL,
  `gambar2` varchar(20) NOT NULL,
  `gambar3` varchar(20) NOT NULL,
  `gambar4` varchar(20) NOT NULL,
  `gambar5` varchar(20) NOT NULL,
  PRIMARY KEY (`id_usaha`),
  KEY `fk_pemilik_usaha_data` (`id_login`),
  KEY `Kecamatan` (`Kecamatan`),
  KEY `Kelurahan` (`Kelurahan`),
  KEY `Skala_Usaha` (`Skala_Usaha`),
  KEY `Sektor_Usaha` (`Sektor_Usaha`),
  CONSTRAINT `data_usaha_ibfk_2` FOREIGN KEY (`Kecamatan`) REFERENCES `kecamatan` (`Idkec`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `data_usaha_ibfk_3` FOREIGN KEY (`Kelurahan`) REFERENCES `kelurahan` (`idkel`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `data_usaha_ibfk_4` FOREIGN KEY (`Skala_Usaha`) REFERENCES `skala_usaha` (`id_skala`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `data_usaha_ibfk_5` FOREIGN KEY (`Sektor_Usaha`) REFERENCES `sektor_usaha` (`id_Sektor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pemilik_usaha_data` FOREIGN KEY (`id_login`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_usaha`
--

LOCK TABLES `data_usaha` WRITE;
/*!40000 ALTER TABLE `data_usaha` DISABLE KEYS */;
INSERT INTO `data_usaha` VALUES (50,54,'Game Company','Games','Tapto','dipatiukur',1,1,'2232','-6.8911142','107.61718169999995',4,4,'','','','',''),(51,54,'Ternak Lele','Lele','Lele','pangarang',1,1,'24242414','-6.924212','107.61034399999994',3,3,'','','','','');
/*!40000 ALTER TABLE `data_usaha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kecamatan`
--

DROP TABLE IF EXISTS `kecamatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kecamatan` (
  `Idkec` int(20) NOT NULL AUTO_INCREMENT,
  `NamaKec` varchar(50) NOT NULL,
  PRIMARY KEY (`Idkec`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kecamatan`
--

LOCK TABLES `kecamatan` WRITE;
/*!40000 ALTER TABLE `kecamatan` DISABLE KEYS */;
INSERT INTO `kecamatan` VALUES (1,'Lengkong'),(3,'Antapani'),(4,'Arcamanik'),(5,'Astanaanyar'),(6,'Babakan Ciparay'),(7,'Bandung Kidul');
/*!40000 ALTER TABLE `kecamatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelurahan`
--

DROP TABLE IF EXISTS `kelurahan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kelurahan` (
  `idkel` int(20) NOT NULL AUTO_INCREMENT,
  `idKec` int(20) NOT NULL,
  `Namakel` varchar(50) NOT NULL,
  PRIMARY KEY (`idkel`),
  KEY `idKec` (`idKec`),
  CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`idKec`) REFERENCES `kecamatan` (`Idkec`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelurahan`
--

LOCK TABLES `kelurahan` WRITE;
/*!40000 ALTER TABLE `kelurahan` DISABLE KEYS */;
INSERT INTO `kelurahan` VALUES (1,1,'Cikawao'),(4,3,'Antapani Kidul'),(5,3,'Antapani Kulon'),(6,4,'Cisaranten Endah'),(7,4,'Cisaranten Kulon'),(8,5,'Cibadak'),(9,5,'Karanganyar'),(10,6,'Babakan Ciparay'),(11,6,'Babakan'),(12,7,'Batununggal'),(13,7,'Mengger');
/*!40000 ALTER TABLE `kelurahan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `No_Ktp` varchar(20) NOT NULL,
  `Password` varchar(101) NOT NULL,
  `login_role` enum('Admin','Pemilik Usaha') NOT NULL DEFAULT 'Pemilik Usaha',
  PRIMARY KEY (`login_id`),
  UNIQUE KEY `No_Ktp` (`No_Ktp`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (53,'8758658','21232f297a57a5a743894a0e4a801fc3','Admin'),(54,'123123123','202cb962ac59075b964b07152d234b70','Pemilik Usaha'),(75,'107208205197509124','202cb962ac59075b964b07152d234b70','Pemilik Usaha'),(76,'4241522','202cb962ac59075b964b07152d234b70','Admin'),(77,'89729347851293469','202cb962ac59075b964b07152d234b70','Pemilik Usaha');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pemilik_usaha`
--

DROP TABLE IF EXISTS `pemilik_usaha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `kode` varchar(100) NOT NULL,
  PRIMARY KEY (`pemilik_usaha_id`),
  CONSTRAINT `fk_pemilik_usaha` FOREIGN KEY (`pemilik_usaha_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pemilik_usaha`
--

LOCK TABLES `pemilik_usaha` WRITE;
/*!40000 ALTER TABLE `pemilik_usaha` DISABLE KEYS */;
INSERT INTO `pemilik_usaha` VALUES (54,'Rakhmat Sabarudin','rahmatig4ever@gmail.com','Jalan Pangarang Bawah IV, Cikawao, Bandung City, West Java, Indonesia','Bandung','1995-01-01','4241622','Programmer','rakhmatsabarudin20170718012613.png','Aktif','5c2e471c3a26e511dcaca5f2c0c0f5da'),(75,'Joko Purwanto','rahmatig4ever@gmail.com','Pangalengan, Bandung, West Java, Indonesia','Jakarta','1997-01-01','4245155','IOT','jokopurwanto20170718104201.png','Belum Aktif','9aac807bc7134ac90b546615e5bb55f8'),(77,'Budi','rahmatig4ever@gmail.com','Jalan Pangarang Bawah IV, Cikawao, Bandung City, West Java, Indonesia','bandung','1998-01-01','235235','rarasfgas','budi20170723084209.jpg','Aktif','e72c7daf862bba50464fb21f51d15c7f');
/*!40000 ALTER TABLE `pemilik_usaha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sektor_usaha`
--

DROP TABLE IF EXISTS `sektor_usaha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sektor_usaha` (
  `id_Sektor` int(20) NOT NULL AUTO_INCREMENT,
  `NamaSektor` varchar(20) NOT NULL,
  PRIMARY KEY (`id_Sektor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sektor_usaha`
--

LOCK TABLES `sektor_usaha` WRITE;
/*!40000 ALTER TABLE `sektor_usaha` DISABLE KEYS */;
INSERT INTO `sektor_usaha` VALUES (1,'Kecil'),(3,'Menengah'),(4,'Besar');
/*!40000 ALTER TABLE `sektor_usaha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skala_usaha`
--

DROP TABLE IF EXISTS `skala_usaha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skala_usaha` (
  `id_skala` int(20) NOT NULL AUTO_INCREMENT,
  `NamaSkala` varchar(20) NOT NULL,
  PRIMARY KEY (`id_skala`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skala_usaha`
--

LOCK TABLES `skala_usaha` WRITE;
/*!40000 ALTER TABLE `skala_usaha` DISABLE KEYS */;
INSERT INTO `skala_usaha` VALUES (2,'Kecil'),(3,'Menengah'),(4,'Besar');
/*!40000 ALTER TABLE `skala_usaha` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-23 22:06:20
