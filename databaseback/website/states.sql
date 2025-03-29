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
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `state_code` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` text NOT NULL,
  PRIMARY KEY (`state_code`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES
(1,'Goa'),
(2,'Gujarat'),
(3,'Maharashtra'),
(4,'Rajasthan'),
(5,'Dadra & Nagar Haveli'),
(6,'Daman & Diu'),
(7,'Haryana'),
(8,'Himachal Pradesh'),
(9,'Jammu & Kashmir'),
(10,'Punjab'),
(11,'Delhi'),
(12,'Chandigarh'),
(13,'Bihar'),
(14,'Uttar Pradesh'),
(15,'Uttaranchal'),
(16,'West Bengal'),
(17,'Chhattisgarh'),
(18,'Jharkhand'),
(19,'Madhya Pradesh'),
(20,'Orissa'),
(21,'Andhra Pradesh'),
(22,'Karnataka'),
(23,'Kerala'),
(24,'Tamil Nadu'),
(25,'Pondicherry'),
(26,'Lakshadweep'),
(27,'Andaman & Nichobar'),
(28,'Arunachal Pradesh'),
(29,'Assam'),
(30,'Manipur'),
(31,'Meghalaya'),
(32,'Mizoram'),
(33,'Nagaland'),
(34,'Sikkim'),
(35,'Tripura'),
(36,'Bagmati\r\n'),
(37,'Bheri\r\n'),
(38,'Dhawalagiri\r\n'),
(39,'Gandaki\r\n'),
(40,'Karnali\r\n'),
(41,'Koshi\r\n'),
(42,'Lumbini\r\n'),
(43,'Mahakali\r\n'),
(44,'Mechi\r\n'),
(45,'Narayani\r\n'),
(46,'Rapti\r\n'),
(47,'Sagarmatha\r\n'),
(48,'Seti\r\n');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:16:25
