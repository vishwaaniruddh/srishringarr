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
-- Table structure for table `yn_customisedData`
--

DROP TABLE IF EXISTS `yn_customisedData`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yn_customisedData` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `email` varchar(128) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `requirement` varchar(120) NOT NULL,
  `check1` int(10) NOT NULL,
  `check2` int(10) NOT NULL,
  `check3` int(10) NOT NULL,
  `check4` int(10) NOT NULL,
  `check5` int(10) NOT NULL,
  `check6` int(11) NOT NULL,
  `other_specs` varchar(128) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yn_customisedData`
--

LOCK TABLES `yn_customisedData` WRITE;
/*!40000 ALTER TABLE `yn_customisedData` DISABLE KEYS */;
INSERT INTO `yn_customisedData` VALUES
(1,'Rajesh Biswas','hellbinderkumar@gmail.com','9111205672','test',0,1,0,1,1,1,'tewsdttyu','YNG178','2022-01-07','2022-01-07'),
(2,'Rajesh Biswas','hellbinderkumar@gmail.com','9111205672','test',0,0,0,0,1,0,'','YNG178','2022-01-07','2022-01-07'),
(3,'Rajesh Biswas','hellbinderkumar@gmail.com','9111205672','hfhfefehowef',0,0,1,0,0,0,'','YNG178','2022-01-07','2022-01-07'),
(4,'Rajesh Biswas','hellbinderkumar@gmail.com','9111205672','test',1,1,0,1,0,0,'','YNG178','2022-01-07','2022-01-07'),
(5,'Rajesh Biswas','hellbinderkumar@gmail.com','9111205672','arsjydtr',1,1,1,0,1,0,'','YNG178','2022-01-07','2022-01-07'),
(6,'Rajesh Biswas','hellbinderkumar@gmail.com','9111205672','arsjydtr',0,1,1,1,0,0,'','YNG068','2022-01-07','2022-01-07'),
(7,'Rajesh Biswas','hellbinderkumar@gmail.com','9111205672','test',0,0,0,0,1,0,'','YNG178','2022-01-07','2022-01-07'),
(8,'Rajesh Biswas','hellbinderkumar@gmail.com','9111205672','test',0,0,0,0,0,0,'','YNG178','2022-01-07','2022-01-07'),
(9,'Rajesh Biswas','hellbinderkumar@gmail.com','9111205672','test',1,0,0,0,0,0,'','YNG178','2022-01-08','2022-01-08'),
(10,'Rajesh Biswas','hellbinderkumar@gmail.com','9111205672','test',1,1,1,1,1,0,'','YNG178','2022-01-08','2022-01-08'),
(11,'hellbinder kumar','hellbinderkumar@gmail.com','9111205672','hfhfefehowef',0,1,1,1,0,1,'efefef','YNG178','2022-01-08','2022-01-08'),
(12,'Rajesh Biswas','hellbinderkumar@gmail.com','9111205672','test',0,0,0,1,1,1,'ddwdwdwd','YNG178','2022-01-08','2022-01-08'),
(13,'Rajesh Biswas','hellbinderkumar@gmail.com','9111205672','test',1,1,0,1,1,0,'','YNG178','2022-01-08','2022-01-08'),
(14,'Rajesh Biswas','hellbinderkumar@gmail.com','9111205672','hfhfefehowef',0,1,1,0,1,0,'','YNG178','2022-01-08','2022-01-08'),
(15,'Rajesh Biswas','hellbinderkumar@gmail.com','9111205672','test',1,1,0,1,0,1,'test','YNG178','2022-01-08','2022-01-08'),
(16,'Rajesh Biswas','hellbinderkumar@gmail.com','9111205672','test',0,1,1,0,1,0,'','YNG178','2022-01-08','2022-01-08'),
(17,'Rajesh Biswas','hellbinderkumar@gmail.com','9111205672','test',1,1,0,1,0,1,'yesyvduwd','YNG178','2022-01-08','2022-01-08'),
(18,'Rajesh Biswas','hellbinderkumar@gmail.com','9111205672','TEST',1,1,0,1,1,1,'Test','YNG178','2022-01-08','2022-01-08'),
(19,'rajesh','work.rajeshb@gmail.com','877034408','test',1,0,1,0,0,0,'','YNB160ON','2023-01-14','2023-01-14'),
(20,'test','test@gmail.com','1234567890','test',0,1,0,0,0,0,'','YNB160ON','2023-01-14','2023-01-14'),
(21,'test','test@gmail.com','1234567890','test',0,1,0,0,0,0,'','YNB160ON','2023-01-14','2023-01-14'),
(22,'Aniruddh Vishwakarma','vishwaaniruddh@gmail.com','7021889883','Please customise this product as follows',0,0,1,1,1,1,'Same Design but Different Size : 10\r\n Same Design Different Colour : red\r\n Same Design Different Fabric : layla\r\n Same Design Di','YNK083ON','2023-09-09','2023-09-09');
/*!40000 ALTER TABLE `yn_customisedData` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:16:39
