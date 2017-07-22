-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_lowker
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (21,'Admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `calon_pekerja`
--

LOCK TABLES `calon_pekerja` WRITE;
/*!40000 ALTER TABLE `calon_pekerja` DISABLE KEYS */;
INSERT INTO `calon_pekerja` VALUES (19,'Rakhmat Sabarudin','Jl. Asia Afrika',1,'L','Bandung','2017-01-31','Lajang','rakhmat@gmail.com','088888888','SD','SMA 77 Bandung','-','-','rakhmatsabarudin20170109042159.png'),(22,'Firman Nizammudin F','Jl. Antapani',1,'L','Bandung','2017-01-12','Lajang','firmannizammudin@gmail.com','087821996016','SMA','SMKN 4 Bandung','Perusahaan XYZ','Android Developer','firmannizammudinfakhrul20170108165949.jpg'),(28,'Evan Gilang','Cileunyi',1,'L','Bandung','1996-01-04','Lajang','evan@gmail.com','088888','SMA','Al-Masoem','-','-','');
/*!40000 ALTER TABLE `calon_pekerja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (8,'Marketing'),(6,'Pertambangan'),(4,'Teknologi Informasi');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `kota`
--

LOCK TABLES `kota` WRITE;
/*!40000 ALTER TABLE `kota` DISABLE KEYS */;
INSERT INTO `kota` VALUES (1,'Bandung'),(4,'DKI Jakarta'),(5,'Surabaya');
/*!40000 ALTER TABLE `kota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `lamaran`
--

LOCK TABLES `lamaran` WRITE;
/*!40000 ALTER TABLE `lamaran` DISABLE KEYS */;
INSERT INTO `lamaran` VALUES (8,6,19,'Tidak Lolos'),(13,6,20,'Lolos'),(14,13,22,'Menunggu'),(15,10,22,'Menunggu'),(16,13,28,'Menunggu'),(17,14,19,'Menunggu');
/*!40000 ALTER TABLE `lamaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (19,'rakhmat','dc5e1940657c054009d83261b4e5ab86','Calon Pekerja'),(20,'googlehq','967b25aaaa3cc005258c6692cf788306','Perusahaan'),(21,'admin','21232f297a57a5a743894a0e4a801fc3','Admin'),(22,'firmannf','68beb1b04725ba41ede11bfc15509ee2','Calon Pekerja'),(25,'ms','ee33e909372d935d190f4fcb2a92d542','Perusahaan'),(27,'fb','35ce1d4eb0f666cd136987d34f64aedc','Perusahaan'),(28,'evan','98cc7d37dc7b90c14a59ef0c5caa8995','Calon Pekerja');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `lowongan`
--

LOCK TABLES `lowongan` WRITE;
/*!40000 ALTER TABLE `lowongan` DISABLE KEYS */;
INSERT INTO `lowongan` VALUES (6,20,4,'Looking for Android Dev','for real we\'re looking for android developer','2017-01-02','2017-01-17'),(10,25,4,'Mencari Programmer .NET','Mencari programmer .net yang sangat berpengalaman','2017-01-08','2017-01-26'),(13,20,4,'Mencari Programmer C++','Mencari programmer C++ yang sangat mantap sekali','2017-01-08','2017-01-31'),(14,20,8,'Di Cari Desainer Berbakat','lorem ipsum','2017-01-09','2017-01-09');
/*!40000 ALTER TABLE `lowongan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `lowongan_jobdesc`
--

LOCK TABLES `lowongan_jobdesc` WRITE;
/*!40000 ALTER TABLE `lowongan_jobdesc` DISABLE KEYS */;
INSERT INTO `lowongan_jobdesc` VALUES (6,6,'Just do the code'),(8,10,'Melacak, kompilasi, dan menganalisis data penggunaan situs web perusahaan'),(9,10,'Mengembangkan atau gaya dokumen pedoman untuk konten situs web'),(12,13,'Membuat algoritma AI dengan bahasa C++'),(13,14,'lorem ipsum');
/*!40000 ALTER TABLE `lowongan_jobdesc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `lowongan_syarat`
--

LOCK TABLES `lowongan_syarat` WRITE;
/*!40000 ALTER TABLE `lowongan_syarat` DISABLE KEYS */;
INSERT INTO `lowongan_syarat` VALUES (67,6,'OOP Expert'),(68,6,'Java Expert'),(71,10,'Bisa C#'),(73,10,'Bisa SQL Server'),(76,13,'Bisa C++'),(77,13,'Bisa OOP'),(78,14,'bisa menggambar');
/*!40000 ALTER TABLE `lowongan_syarat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pemilikusaha`
--

LOCK TABLES `pemilikusaha` WRITE;
/*!40000 ALTER TABLE `pemilikusaha` DISABLE KEYS */;
INSERT INTO `pemilikusaha` VALUES (20,'Google HQ','Antapani',1,'google@gmail.com','0222222'),(25,'Microsoft','Jl. Dipatiukur JKT',4,'ms@outlook.com','021222222'),(27,'Facebook','',5,'','');
/*!40000 ALTER TABLE `perusahaan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-20 18:10:52
