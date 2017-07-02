-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: localhost    Database: db_lowker
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
INSERT INTO `admin` VALUES (9,'rakhmat');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER check_role_admin BEFORE INSERT ON admin FOR EACH ROW
	BEGIN
		IF (SELECT login_role FROM login WHERE login_id = NEW.admin_id) != 'Admin' THEN 
			SIGNAL SQLSTATE '45000';
		END IF;
	END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `calon_pekerja`
--

DROP TABLE IF EXISTS `calon_pekerja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calon_pekerja` (
  `calon_pekerja_id` int(11) NOT NULL,
  `calon_pekerja_nama_lengkap` varchar(51) NOT NULL,
  `calon_pekerja_alamat` varchar(101) DEFAULT NULL,
  `kota_id` int(11) DEFAULT NULL,
  `calon_pekerja_jenis_kelamin` enum('L','P') DEFAULT NULL,
  `calon_pekerja_tempat_lahir` varchar(51) DEFAULT NULL,
  `calon_pekerja_tanggal_lahir` date DEFAULT NULL,
  `calon_pekerja_status_pernikahan` enum('Lajang','Menikah','Janda/Duda') DEFAULT NULL,
  `calon_pekerja_email` varchar(51) NOT NULL,
  `calon_pekerja_telepon` varchar(13) DEFAULT NULL,
  `calon_pekerja_pendidikan_terakhir` enum('SD','SMP','SMA','S1','S2') DEFAULT NULL,
  `calon_pekerja_tempat_pendidikan_terakhir` varchar(51) DEFAULT NULL,
  `calon_pekerja_tempat_bekerja_terakhir` varchar(51) DEFAULT NULL,
  `calon_pekerja_pekerjaan_bekerja_terakhir` varchar(51) DEFAULT NULL,
  `calon_pekerja_file_cv` varchar(101) DEFAULT NULL,
  PRIMARY KEY (`calon_pekerja_id`),
  KEY `fk_calon_pekerja_kota` (`kota_id`),
  CONSTRAINT `fk_calon_pekerja_kota` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`kota_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_calon_pekerja_login` FOREIGN KEY (`calon_pekerja_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calon_pekerja`
--

LOCK TABLES `calon_pekerja` WRITE;
/*!40000 ALTER TABLE `calon_pekerja` DISABLE KEYS */;
INSERT INTO `calon_pekerja` VALUES (14,'rakhmat','pangrang',1,'L','bandung','1995-01-01','Lajang','rahmatig4ever@gmail.com','4241622','SD','bandung','-','-',''),(16,'katy','',1,'L','','0000-00-00','Lajang','katy@gmail.com','','SD','','','','');
/*!40000 ALTER TABLE `calon_pekerja` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER check_role_calon_pekerja BEFORE INSERT ON calon_pekerja FOR EACH ROW
	BEGIN
		IF (SELECT login_role FROM login WHERE login_id = NEW.calon_pekerja_id) != 'Calon Pekerja' THEN 
			SIGNAL SQLSTATE '45000';
		END IF;
	END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(21) NOT NULL,
  PRIMARY KEY (`kategori_id`),
  UNIQUE KEY `kategori_nama` (`kategori_nama`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (2,'Desainer'),(1,'Programmer');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kota`
--

DROP TABLE IF EXISTS `kota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kota` (
  `kota_id` int(11) NOT NULL AUTO_INCREMENT,
  `kota_nama` varchar(51) NOT NULL,
  PRIMARY KEY (`kota_id`),
  UNIQUE KEY `kota_nama` (`kota_nama`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kota`
--

LOCK TABLES `kota` WRITE;
/*!40000 ALTER TABLE `kota` DISABLE KEYS */;
INSERT INTO `kota` VALUES (1,'Bandung'),(2,'Jakarta');
/*!40000 ALTER TABLE `kota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lamaran`
--

DROP TABLE IF EXISTS `lamaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lamaran` (
  `lamaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `lowongan_id` int(11) NOT NULL,
  `calon_pekerja_id` int(11) NOT NULL,
  `lamaran_status_lolos` enum('Menunggu','Lolos','Tidak Lolos') NOT NULL,
  PRIMARY KEY (`lamaran_id`),
  UNIQUE KEY `lowongan_id` (`lowongan_id`,`calon_pekerja_id`),
  KEY `calon_pekerja_id` (`calon_pekerja_id`),
  CONSTRAINT `lamaran_ibfk_1` FOREIGN KEY (`calon_pekerja_id`) REFERENCES `calon_pekerja` (`calon_pekerja_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lamaran_ibfk_2` FOREIGN KEY (`lowongan_id`) REFERENCES `lowongan` (`lowongan_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lamaran`
--

LOCK TABLES `lamaran` WRITE;
/*!40000 ALTER TABLE `lamaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `lamaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_username` varchar(26) NOT NULL,
  `login_password` varchar(101) NOT NULL,
  `login_role` enum('Admin','Perusahaan','Calon Pekerja') NOT NULL DEFAULT 'Calon Pekerja',
  PRIMARY KEY (`login_id`),
  UNIQUE KEY `login_username` (`login_username`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (9,'admin','21232f297a57a5a743894a0e4a801fc3','Admin'),(14,'ig4ever','202cb962ac59075b964b07152d234b70','Calon Pekerja'),(16,'katy','202cb962ac59075b964b07152d234b70','Calon Pekerja'),(17,'google123','202cb962ac59075b964b07152d234b70','Perusahaan');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lowongan`
--

DROP TABLE IF EXISTS `lowongan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lowongan` (
  `lowongan_id` int(11) NOT NULL AUTO_INCREMENT,
  `perusahaan_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `lowongan_judul` varchar(51) NOT NULL,
  `lowongan_deskripsi` text NOT NULL,
  `lowongan_tgl_buka` date NOT NULL,
  `lowongan_tgl_tutup` date NOT NULL,
  PRIMARY KEY (`lowongan_id`),
  KEY `fk_lowongan_perusahaan` (`perusahaan_id`),
  KEY `fk_lowongan_kategori` (`kategori_id`),
  CONSTRAINT `fk_lowongan_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_lowongan_perusahaan` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`perusahaan_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lowongan`
--

LOCK TABLES `lowongan` WRITE;
/*!40000 ALTER TABLE `lowongan` DISABLE KEYS */;
/*!40000 ALTER TABLE `lowongan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lowongan_jobdesc`
--

DROP TABLE IF EXISTS `lowongan_jobdesc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lowongan_jobdesc` (
  `lowongan_jobdesc_id` int(11) NOT NULL AUTO_INCREMENT,
  `lowongan_id` int(11) NOT NULL,
  `lowongan_jobdesc_isi` varchar(101) NOT NULL,
  PRIMARY KEY (`lowongan_jobdesc_id`),
  KEY `fk_jobdesc_lowongan` (`lowongan_id`),
  CONSTRAINT `fk_jobdesc_lowongan` FOREIGN KEY (`lowongan_id`) REFERENCES `lowongan` (`lowongan_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lowongan_jobdesc`
--

LOCK TABLES `lowongan_jobdesc` WRITE;
/*!40000 ALTER TABLE `lowongan_jobdesc` DISABLE KEYS */;
/*!40000 ALTER TABLE `lowongan_jobdesc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lowongan_syarat`
--

DROP TABLE IF EXISTS `lowongan_syarat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lowongan_syarat` (
  `lowongan_syarat_id` int(11) NOT NULL AUTO_INCREMENT,
  `lowongan_id` int(11) NOT NULL,
  `lowongan_syarat` varchar(101) NOT NULL,
  PRIMARY KEY (`lowongan_syarat_id`),
  KEY `fk_syarat_lowongan` (`lowongan_id`),
  CONSTRAINT `fk_syarat_lowongan` FOREIGN KEY (`lowongan_id`) REFERENCES `lowongan` (`lowongan_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lowongan_syarat`
--

LOCK TABLES `lowongan_syarat` WRITE;
/*!40000 ALTER TABLE `lowongan_syarat` DISABLE KEYS */;
/*!40000 ALTER TABLE `lowongan_syarat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perusahaan`
--

DROP TABLE IF EXISTS `perusahaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perusahaan` (
  `perusahaan_id` int(11) NOT NULL,
  `perusahaan_nama` varchar(51) NOT NULL,
  `perusahaan_alamat` varchar(101) DEFAULT NULL,
  `kota_id` int(11) DEFAULT NULL,
  `perusahaan_email` varchar(51) NOT NULL,
  `perusahaan_telepon` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`perusahaan_id`),
  UNIQUE KEY `perusahaan_nama` (`perusahaan_nama`),
  KEY `fk_perusahaan_kota` (`kota_id`),
  CONSTRAINT `fk_perusahaan_kota` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`kota_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_perusahaan_login` FOREIGN KEY (`perusahaan_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perusahaan`
--

LOCK TABLES `perusahaan` WRITE;
/*!40000 ALTER TABLE `perusahaan` DISABLE KEYS */;
INSERT INTO `perusahaan` VALUES (17,'Google','',1,'google@gmail.com','');
/*!40000 ALTER TABLE `perusahaan` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER check_role_perusahaan BEFORE INSERT ON perusahaan FOR EACH ROW
	BEGIN
		IF (SELECT login_role FROM login WHERE login_id = NEW.perusahaan_id) != 'Perusahaan' THEN 
			SIGNAL SQLSTATE '45000';
		END IF;
	END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-02 18:48:23
