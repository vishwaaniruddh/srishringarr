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
-- Table structure for table `invoice_tracker`
--

DROP TABLE IF EXISTS `invoice_tracker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice_tracker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) NOT NULL,
  `invoice_type` enum('rent','sell') NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `invoice` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_tracker`
--

LOCK TABLES `invoice_tracker` WRITE;
/*!40000 ALTER TABLE `invoice_tracker` DISABLE KEYS */;
INSERT INTO `invoice_tracker` VALUES
(1,'SAKAR TRADE LINK','rent',1,'SAKAR-24/R-00001','2025-03-15 12:21:15',1,1),
(3,'SAKAR TRADE LINK','rent',2,'SAKAR-24/R-00002','2025-03-15 12:43:57',1,1),
(4,'SAKAR TRADE LINK','rent',1,'SAK-24/R-00001','2025-03-19 13:15:35',1,1),
(5,'SAKAR TRADE LINK','rent',2,'SAK-24/R-00002','2025-03-19 13:25:47',1,1),
(6,'SAKAR TRADE LINK','rent',3,'SAK-24/R-00003','2025-03-19 13:40:06',1,1),
(7,'SAKAR TRADE LINK','rent',4,'SAK-24/R-00004','2025-03-22 08:51:53',1,1),
(9,'SAKAR TRADE LINK','rent',5,'SAK-24/R-00005','2025-03-22 12:40:46',1,1),
(10,'Sri Shringarr','rent',1,'SSFS-24/R-00001','2025-03-22 12:46:31',1,1),
(11,'Sri Shringarr','rent',2,'SSFS-24/R-00002','2025-03-22 12:53:39',1,1),
(13,'SAKAR TRADE LINK','rent',6,'SAK-24/R-00006','2025-03-23 07:48:54',1,1),
(14,'SAKAR TRADE LINK','rent',7,'SAK-24/R-00007','2025-03-23 11:21:08',1,1),
(15,'Sri Shringarr','rent',3,'SSFS-24/R-00003','2025-03-23 13:42:48',1,1),
(16,'SAKAR TRADE LINK','rent',8,'SAK-24/R-00008','2025-03-27 14:35:53',1,1),
(17,'SAKAR TRADE LINK','rent',9,'SAK-24/R-00009','2025-03-28 10:58:43',1,1),
(19,'SAKAR TRADE LINK','rent',10,'SAK-24/R-00010','2025-03-29 08:52:04',1,1);
/*!40000 ALTER TABLE `invoice_tracker` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:12:21
