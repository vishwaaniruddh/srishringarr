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
-- Table structure for table `product_measurements`
--

DROP TABLE IF EXISTS `product_measurements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_measurements` (
  `product_measure_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `measure_id` int(11) NOT NULL,
  `measure_value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`product_measure_id`),
  KEY `measure_id` (`measure_id`),
  CONSTRAINT `product_measurements_ibfk_1` FOREIGN KEY (`measure_id`) REFERENCES `measurements` (`measure_id`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_measurements`
--

LOCK TABLES `product_measurements` WRITE;
/*!40000 ALTER TABLE `product_measurements` DISABLE KEYS */;
INSERT INTO `product_measurements` VALUES
(1,2559,7,'21'),
(2,2559,7,'23'),
(3,2559,7,'23'),
(16,2558,7,'48'),
(17,2558,8,'49'),
(34,1855,8,'44'),
(35,1855,10,'35'),
(36,1855,14,'43'),
(37,1855,15,'40'),
(38,1865,8,'42'),
(39,1865,10,'40'),
(40,1865,14,'54'),
(41,1865,15,'42'),
(54,1848,8,'45'),
(55,1848,10,'37'),
(56,1848,14,'43'),
(57,1848,15,'42'),
(62,1844,8,'42'),
(63,1844,10,'33'),
(64,1844,14,'40'),
(65,1844,15,'43'),
(66,1846,8,'46'),
(67,1846,10,'37'),
(68,1846,14,'43'),
(69,1846,15,'43'),
(70,1851,8,'38'),
(71,1851,10,'35'),
(72,1851,14,'47'),
(73,1851,15,'41'),
(74,2109,8,'38'),
(75,2109,10,'35'),
(76,2109,14,'47'),
(77,2109,15,'41'),
(78,2281,8,'46'),
(79,2281,10,'42'),
(80,2281,14,'48'),
(81,2281,15,'40'),
(90,2121,8,'43'),
(91,2121,10,'40'),
(92,2121,14,'50'),
(93,2121,15,'46'),
(94,2131,8,'17'),
(95,2131,10,'32'),
(96,2131,14,'48'),
(97,2131,15,'42'),
(102,2088,8,'40'),
(103,2088,10,'36'),
(104,2088,14,'50'),
(105,2088,15,'62'),
(106,2093,8,'44'),
(107,2093,10,'40'),
(108,2093,14,'50'),
(109,2093,15,'60'),
(110,1980,8,'42'),
(111,1980,10,'40'),
(112,1980,14,'42'),
(113,1980,15,'62'),
(114,2090,8,'40'),
(115,2090,10,'38'),
(116,2090,14,'46'),
(117,2090,15,'53'),
(122,2094,8,'48'),
(123,2094,10,'44'),
(124,2094,14,'54'),
(125,2094,15,'60'),
(130,2091,8,'38'),
(131,2091,10,'38'),
(132,2091,14,'45'),
(133,2091,15,'60'),
(146,1995,8,'50'),
(147,1995,10,'48'),
(148,1995,14,'52'),
(149,1995,15,'60'),
(150,1998,8,'40'),
(151,1998,10,'32'),
(152,1998,14,'46'),
(153,1998,15,'60'),
(158,2008,8,'40'),
(159,2008,10,'32'),
(160,2008,14,'43'),
(161,2008,15,'65'),
(166,2011,8,'42'),
(167,2011,10,'32'),
(168,2011,14,'40'),
(169,2011,15,'65'),
(170,2012,8,'42'),
(171,2012,10,'34'),
(172,2012,14,'50'),
(173,2012,15,'62'),
(186,2014,8,'40'),
(187,2014,10,'30'),
(188,2014,14,'46'),
(189,2014,15,'65'),
(194,2525,8,'46'),
(195,2525,10,'42'),
(196,2525,14,'44'),
(197,2525,15,'41'),
(198,1862,8,'43'),
(199,1862,10,'42'),
(200,1862,14,'46'),
(201,1862,15,'41');
/*!40000 ALTER TABLE `product_measurements` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:12:54
