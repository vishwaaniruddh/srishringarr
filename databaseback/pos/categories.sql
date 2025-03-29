/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.10-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u464193275_srishringarr
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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(1000) DEFAULT NULL,
  `typ` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES
(3,'Tikkas',1),
(4,'Bajubandh',1),
(5,'HathPunja',1),
(6,'Damini',1),
(7,'HairAccount',1),
(8,'Payal',1),
(9,'Nath',1),
(10,'Broch',1),
(11,'Set',1),
(12,'Pendent',1),
(13,'ONLINE',1),
(14,'Kundan ',1),
(15,'Antique',1),
(16,'Hair',1),
(17,'Ring',1),
(18,'Earring',1),
(19,'Concept shoot',1),
(20,'Malas',1),
(21,'Bangles',1),
(22,'Bracelate',1),
(23,'kamar patta',1),
(24,'Juda',1),
(25,'Lace',1),
(26,'Fabries',2),
(27,'Latkan',2),
(28,'Choti',1),
(29,'Bhoomi',1),
(30,'Lehengas',2),
(31,'Sarees',2),
(32,'Dupatta',2),
(33,'Kurtis',2),
(34,'Patiala',2),
(35,'Anarkali',2),
(36,'Chooda',1),
(37,'VENI',1),
(38,'Switechs',1),
(39,'Flower',1),
(40,'Suit',2),
(41,'Earrchen',1),
(42,'Amboda',1),
(43,'YNL',2),
(44,'YNG',2),
(45,'GOWN',2),
(46,'manufacture',0),
(47,'borla',1),
(48,'sandeep',0),
(49,'kanta',0),
(50,'BLOUSE',2),
(51,'XYZ',2),
(52,'dammy',1),
(53,'Ittar',0),
(54,'APPROVAL',1),
(55,'Mask',1),
(56,'Kamarpatta',1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:11:23
