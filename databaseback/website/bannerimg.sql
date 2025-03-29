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
-- Table structure for table `bannerimg`
--

DROP TABLE IF EXISTS `bannerimg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bannerimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(200) NOT NULL,
  `bannerfor` int(10) NOT NULL,
  `status` int(11) NOT NULL,
  `visible` int(10) NOT NULL,
  `visibilityOrder` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bannerimg`
--

LOCK TABLES `bannerimg` WRITE;
/*!40000 ALTER TABLE `bannerimg` DISABLE KEYS */;
INSERT INTO `bannerimg` VALUES
(57,'1.png',0,1,0,0),
(56,'6.webp',1,1,0,0),
(55,'5.webp',1,1,0,0),
(54,'4.webp',1,1,0,0),
(41,'Rent Lehengas in Mumbai.jpg',1,1,0,0),
(30,'Rent Bridal Jewellery near me.jpg',1,1,0,0),
(53,'3.webp',1,1,0,0),
(51,'1.webp',1,1,0,0),
(52,'2.webp',1,1,0,0),
(58,'1.webp',2,1,0,0),
(59,'2.webp',2,1,0,0),
(60,'3.webp',2,1,0,0),
(61,'4.webp',2,1,0,0),
(62,'5.webp',2,1,0,0),
(63,'6.webp',2,1,0,0),
(64,'Flyrobe x Sri Shringarr Web Banner (2).jpg',1,1,0,0),
(65,'Flyrobe (M-Site) Banner 2-01 (1).jpg',2,1,0,0);
/*!40000 ALTER TABLE `bannerimg` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:14:16
