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
-- Table structure for table `phppos_items_taxes_test`
--

DROP TABLE IF EXISTS `phppos_items_taxes_test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phppos_items_taxes_test` (
  `item_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `percent` double(15,2) NOT NULL,
  PRIMARY KEY (`item_id`,`name`,`percent`),
  CONSTRAINT `phppos_items_taxes_test_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `phppos_itemsbackup` (`item_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phppos_items_taxes_test`
--

LOCK TABLES `phppos_items_taxes_test` WRITE;
/*!40000 ALTER TABLE `phppos_items_taxes_test` DISABLE KEYS */;
INSERT INTO `phppos_items_taxes_test` VALUES
(7071,'Sales Tax',10.00),
(7071,'Sales Tax 2',0.00),
(7235,'Sales Tax',0.00),
(7235,'Sales Tax 2',0.00),
(7236,'Sales Tax',0.00),
(7236,'Sales Tax 2',0.00),
(7237,'Sales Tax',0.00),
(7237,'Sales Tax 2',0.00),
(7238,'Sales Tax',0.00),
(7238,'Sales Tax 2',0.00),
(7241,'Sales Tax',0.00),
(7241,'Sales Tax 2',0.00),
(7357,'Sales Tax 2',0.00),
(7846,'Sales Tax',0.00),
(7846,'Sales Tax 2',0.00),
(7895,'Sales Tax',0.00),
(7895,'Sales Tax 2',0.00),
(8053,'Sales Tax 2',0.00),
(8102,'0',0.00),
(8102,'Sales Tax',0.00),
(8316,'Sales Tax',0.00),
(8316,'Sales Tax 2',0.00),
(8317,'Sales Tax',10.00),
(8317,'Sales Tax 2',0.00),
(8548,'Sales Tax',10.00),
(8548,'Sales Tax 2',0.00);
/*!40000 ALTER TABLE `phppos_items_taxes_test` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:12:35
