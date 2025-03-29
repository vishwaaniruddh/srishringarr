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
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategory` (
  `sub_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `categories_id` bigint(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategory`
--

LOCK TABLES `subcategory` WRITE;
/*!40000 ALTER TABLE `subcategory` DISABLE KEYS */;
INSERT INTO `subcategory` VALUES
(52,'KUNDAN SETS',36,'Images/1370328205.jpg','K95A'),
(31,'FASHION BRIDES',56,'',''),
(30,'BRIDE ACCESSORIES',37,'Images/1358945647.jpg',''),
(32,'FASHION BRIDES',57,'Images/1359463193.jpg','good'),
(18,'DIMOND SETS',46,'','DIMONDS SETS'),
(19,'Diamond Anklet',53,'Images/1356166518.jpg','Very Beautiful'),
(44,'IMITATION KUNDAN',36,'Images/1370424486.jpg','IMITATION KUNDAN'),
(28,'LKLJL',41,'',''),
(42,'FASHION EARRINGS',60,'Images/1371190074.jpg','11'),
(51,'IMITATION STONE',36,'Images/1370493600.jpg','IMITATION STONE'),
(50,'DIAMOND SETS',36,'Images/1370501189.jpg','DIAMOND SETS'),
(39,'DIAMOND SETS',54,'Images/1359797633.jpg','1'),
(41,'Panna Ring',59,'Images/1359821814.jpg','Antique'),
(25,'KUNDAN ANTIQUE SETS',54,'Images/1360135095.jpg','Kundan Antique Sets'),
(46,'GOLDEN SETS',36,'Images/1370596037.jpg','GOLDEN SETS'),
(48,'REAL LOOK JEWELLERY',36,'Images/1370596454.jpg','REAL LOOK JEWELLERY'),
(49,'VILANDI SET',36,'Images/1370953502.jpg','VILANDI SET');
/*!40000 ALTER TABLE `subcategory` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:16:26
