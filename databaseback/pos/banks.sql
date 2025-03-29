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
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banks` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(100) DEFAULT NULL,
  `ac_no` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT current_timestamp(),
  `ac_type` varchar(50) DEFAULT NULL,
  `overdraft` int(11) DEFAULT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banks`
--

LOCK TABLES `banks` WRITE;
/*!40000 ALTER TABLE `banks` DISABLE KEYS */;
INSERT INTO `banks` VALUES
(1,'demo bank','','demo','2013-10-22 09:37:28','3',0),
(2,'maindemo','','','2013-10-22 13:54:24','1',0),
(3,'od bank','78945612','airt art','2013-10-28 09:01:42','4',50000),
(4,'daily account','','','2013-11-08 09:53:32','1',0),
(5,'HDFC BANK','02271000102908','VILE PRALE-E','2013-11-12 14:46:15','2',0),
(6,'BHAGWATI PODAR','1','101MAHESHWAR','2014-05-07 13:40:56','3',0),
(7,'Discount','0','0','2014-08-17 18:19:13','3',0),
(8,'YOSHITA/NEHA','','','2014-11-10 12:51:19','1',0),
(9,'BILL BOOK','','','2014-12-27 06:16:20','1',0),
(10,'Rajani poddar','','','2015-02-06 14:24:10','1',0),
(11,'Yoshita','','','2015-02-06 14:25:05','1',0),
(12,'Laxmikant','','','2015-02-10 14:03:34','1',0),
(13,'Tulsi','','','2015-03-13 09:23:36','1',0),
(14,'Sale','','','2015-06-11 10:37:55','1',0),
(15,'Resale','','','2015-07-16 11:51:55','1',0),
(16,'Sri Shringarr Fashion Studio','50200010838727','Vileparle ','2015-08-11 08:45:01','3',0),
(17,'Ahmd Exhibition','','','2015-09-25 09:47:24','1',0),
(18,'Classes','','','2015-10-01 08:52:20','1',0),
(19,'Kunal Staff','','','2015-12-29 11:21:04','1',0),
(20,'Yoshita & Neha Petty cash','','','2016-01-02 11:45:55','1',0),
(21,'Shop Sale','','','2016-01-16 11:25:26','1',0),
(22,'Card swipe','','','2016-02-18 11:46:09','1',0),
(23,'ONLINE','','','2016-02-27 10:28:28','1',0),
(24,'Card swipe Jewellery','','','2016-03-04 08:50:11','1',0),
(25,'Card swipe Garment','','','2016-03-04 08:50:44','1',0),
(26,'Online Jewellery','','','2016-03-04 08:56:07','1',0),
(27,'Online Garment','','','2016-03-04 08:56:48','1',0),
(28,'Locker','','','2019-05-01 10:46:44','1',0),
(29,'Amazon 2020-2021','8727','Vileparle','2021-02-25 13:46:59','3',0),
(30,'Amazon 2021-2022','8727','Vileparle','2021-04-07 07:14:58','3',0),
(31,'Flipkart 2021-2022','8727','Vileparle','2021-04-07 08:54:25','3',0),
(32,'IDFC','10089974726','Vileparle','2022-05-10 10:26:02','3',0),
(33,'ICICI','756305000529','VILEPARLE','2022-11-17 12:24:42','3',0),
(34,'TEST','123456','DEMO','2024-08-17 13:33:56','2',0),
(35,'Sakar ICICI ','642605500161','Vileparle','2024-08-17 14:45:51','3',0),
(36,'Yosshita Stitching','','','2024-08-17 14:46:38','1',0);
/*!40000 ALTER TABLE `banks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:11:21
