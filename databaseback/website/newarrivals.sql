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
-- Table structure for table `newarrivals`
--

DROP TABLE IF EXISTS `newarrivals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newarrivals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `rank` int(11) NOT NULL,
  `url_link` text DEFAULT NULL,
  `prod_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=235 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newarrivals`
--

LOCK TABLES `newarrivals` WRITE;
/*!40000 ALTER TABLE `newarrivals` DISABLE KEYS */;
INSERT INTO `newarrivals` VALUES
(18,'newarrivals/1567424720.jpg','Drape Gowns',2,'0',0),
(19,'newarrivals/1567426781.jpg','Unique Jewellery',7,'0',0),
(16,'newarrivals/1567426534.jpg','Pastel Jewellery',5,'0',0),
(229,'newarrivals/1567516086.jpg','Exclusive Bridesmaid Lehengas',8,'0',0),
(230,'newarrivals/1567516284.jpg','Bridesmaid Jewellery',9,'0',0),
(231,'newarrivals/1642063800.jpg','Bridal Nath',10,'http://yosshitaneha.com/list.php?type=1&id=52',0),
(232,'newarrivals/1567518153.jpg','Dangler Earring',11,'0',0),
(135,'newarrivals/1567426472.jpg','Pastel Lehengas',4,'0',0),
(146,'newarrivals/1567426747.jpg','Reception Gowns',6,'0',0),
(155,'newarrivals/1567424748.jpg','Diamond Jewellery',3,'0',0),
(170,'newarrivals/1567424254.jpg','Bridal Hand Lehenga',0,'https://yosshitaneha.com/list.php?type=1&id=80',0),
(175,'newarrivals/1567424368.jpg','Exquisite Bridal Jewellery',1,'https://yosshitaneha.com/list.php?type=1&id=1',0);
/*!40000 ALTER TABLE `newarrivals` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:16:12
