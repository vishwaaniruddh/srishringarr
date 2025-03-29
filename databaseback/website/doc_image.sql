/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.10-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u464193275_srishrinjewels
-- ------------------------------------------------------
-- Server version	10.11.10

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `doc_image`
--

DROP TABLE IF EXISTS `doc_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doc_image` (
  `sr_no` int(10) NOT NULL AUTO_INCREMENT,
  `doc_img` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doc_image`
--

LOCK TABLES `doc_image` WRITE;
/*!40000 ALTER TABLE `doc_image` DISABLE KEYS */;
INSERT INTO `doc_image` VALUES
(1,'cat1/1396434388.jpg','testing'),
(2,'cat2/1396434423.jpg','test'),
(4,'cat1/1396437198.jpg','dasds'),
(5,'cat1/1396444183.jpg',''),
(6,'cat2/1396444386.jpg',''),
(7,'cat5/1396513097.jpg','testing'),
(8,'cat1/1396614323.jpeg','SET123'),
(9,'keval/1396703873.jpg','testing'),
(10,'keval/1396704073.jpg','testing'),
(11,'keval/1396704443.jpg','testing'),
(12,'keval/1396704668.jpg','testing'),
(13,'sarmicro/1396704750.jpg','sartest'),
(14,'Tejasvi Thorat/1396866329.jpg','123'),
(15,'Bhaven Bhai/1396866619.jpeg','18wt.344 grm '),
(16,'keval/jani/1399985103.jpg','test'),
(17,'jeweller/keval/1399988785.jpg','trfghg');
/*!40000 ALTER TABLE `doc_image` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:15:26
