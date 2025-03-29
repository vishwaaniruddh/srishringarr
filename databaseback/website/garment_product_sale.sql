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
-- Table structure for table `garment_product_sale`
--

DROP TABLE IF EXISTS `garment_product_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `garment_product_sale` (
  `gproduct_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `gproduct_image` varchar(200) NOT NULL,
  `gproduct_code` varchar(50) NOT NULL,
  `gproduct_name` varchar(100) NOT NULL,
  `gproduct_desc` varchar(250) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `garment_id` bigint(11) NOT NULL,
  `product_for` varchar(100) NOT NULL,
  `sales_price` varchar(25) NOT NULL,
  `rent_price` varchar(25) NOT NULL,
  `itemid` varchar(50) NOT NULL,
  PRIMARY KEY (`gproduct_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `garment_product_sale`
--

LOCK TABLES `garment_product_sale` WRITE;
/*!40000 ALTER TABLE `garment_product_sale` DISABLE KEYS */;
INSERT INTO `garment_product_sale` VALUES
(1,'Images/1416379808.jpg','YNG006','GOWN','1','2014-11-10 09:51:43',1,'1','','',''),
(2,'Images/1416381559.jpg','YNG007','','','2014-11-19 07:19:19',1,'1','','',''),
(3,'Images/1416381587.jpg','YNG008','','','2014-11-19 07:19:47',1,'1','','',''),
(4,'Images/1416381619.jpg','YNG010','','','2014-11-19 07:20:21',1,'1','','',''),
(6,'Images/1416381697.jpg','YNG011','','','2014-11-19 07:21:37',1,'1','','',''),
(7,'Images/1416381737.jpg','YNG012','','','2014-11-19 07:22:17',1,'1','','',''),
(8,'Images/1416381972.jpg','YNG013','','','2014-11-19 07:26:12',1,'1','','',''),
(9,'Images/1416382108.jpg','YNG014','','','2014-11-19 07:28:29',1,'1','','','');
/*!40000 ALTER TABLE `garment_product_sale` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:15:34
