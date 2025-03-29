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
-- Table structure for table `client_diary`
--

DROP TABLE IF EXISTS `client_diary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_diary` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `isMultiple` int(10) NOT NULL,
  `created_at` date DEFAULT NULL,
  `site` varchar(40) NOT NULL DEFAULT 'SS',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_diary`
--

LOCK TABLES `client_diary` WRITE;
/*!40000 ALTER TABLE `client_diary` DISABLE KEYS */;
INSERT INTO `client_diary` VALUES
(1,'K1635A','K1635A',1,1,'2021-07-12','SS'),
(2,'YNL168','YNL168',1,1,'2021-07-12','SS'),
(3,'Sea Green Trail Gown on Rent ','YNG165',1,1,'2021-07-28','SS'),
(4,'Trail Gown on Rent','YNG170',1,1,'2021-07-28','SS'),
(5,'Red Trail Gown on Rent','YNG107A',1,1,'2021-07-28','SS'),
(6,'','YNG163A',1,1,'2021-07-28','SS'),
(7,'D504ON','D504ON',1,0,'2023-12-14','YN'),
(8,'D504ON','D504ON',1,0,'2023-12-14','YN'),
(9,'Bbb','Bb',1,0,'2023-12-26','YN'),
(10,'Xx','Xx',1,0,'2023-12-26','YN'),
(11,'','YNL163',1,1,'2024-03-24','SS'),
(12,'','YNL294XL',1,1,'2024-03-24','SS'),
(13,'','YNL226XL',1,1,'2024-03-24','SS'),
(14,'','YNL279XL',1,1,'2024-03-24','SS'),
(15,'YNL278XL','YNL278XL',1,1,'2024-03-24','SS'),
(16,'YNL238XL','YNL238XL',1,1,'2024-03-24','SS'),
(17,'YNL235XL ','YNL235XL ',1,1,'2024-03-24','SS'),
(18,'YNL224XL','YNL224XL',1,0,'2024-03-24','SS'),
(19,'YNL160','YNL160',1,0,'2024-03-24','SS'),
(20,'YNL130','YNL130',1,1,'2024-03-24','SS'),
(21,'YNL132 ','YNL132 ',1,1,'2024-03-24','SS'),
(22,'YNG045','YNG045',1,1,'2024-03-24','SS'),
(23,'YNG199','YNG199',1,0,'2024-03-24','SS'),
(24,'YNL314XL','YNL314XL',1,1,'2024-03-24','SS'),
(25,'YNL313XL','YNL313XL',1,0,'2024-03-24','SS'),
(26,'','',1,1,'2024-03-24','SS'),
(27,'YNL314XL','YNL314XL',1,0,'2024-03-24','SS'),
(28,'YNL240XL','YNL240XL',1,1,'2024-03-24','SS'),
(29,'','',1,1,'2024-03-24','SS'),
(30,'YNL224XL','YNL224XL',1,1,'2024-03-24','SS'),
(31,'YNL272XL','YNL272XL',1,1,'2024-03-24','SS'),
(32,'','',1,1,'2024-03-24','SS'),
(33,'','',1,1,'2024-03-24','SS'),
(34,'YNL233XL','YNL233XL',1,1,'2024-03-24','SS'),
(35,'YNG195','YNG195',1,1,'2024-03-24','SS'),
(36,'YNG059','YNG059',1,1,'2024-03-24','SS'),
(37,'YNL238XL','YNL238XL',1,1,'2024-03-24','SS'),
(38,'','',1,1,'2024-03-24','SS'),
(39,'YNL233XL','v',1,1,'2024-03-24','SS'),
(40,'YNL233XL','YNL233XL',1,1,'2024-03-24','SS'),
(41,'','',1,1,'2024-03-24','SS'),
(42,'','',1,1,'2024-03-24','SS'),
(43,'YNL233XL','YNL233XL',1,1,'2024-03-24','SS'),
(44,'','',1,1,'2024-03-24','SS'),
(45,'','',1,1,'2024-03-24','SS'),
(46,'','',1,1,'2024-03-24','SS'),
(47,'','',1,1,'2024-03-24','SS'),
(48,'','',1,0,'2024-03-24','SS'),
(49,'','',1,1,'2024-03-24','SS'),
(50,'','',1,1,'2024-03-24','SS'),
(51,'','',1,1,'2024-03-24','SS'),
(52,'','',1,1,'2024-03-24','SS'),
(53,'','',1,1,'2024-03-24','SS'),
(54,'','',1,1,'2024-03-24','SS'),
(55,'','',1,0,'2024-03-24','SS'),
(56,'','',1,0,'2024-03-24','SS'),
(57,'','',1,1,'2024-03-24','SS'),
(58,'YNG101','YNG101',1,0,'2024-03-24','SS'),
(59,'','',1,1,'2024-03-24','SS'),
(60,'','',1,0,'2024-03-24','SS'),
(61,'','',1,0,'2024-03-24','SS'),
(62,'','',1,0,'2024-03-24','SS'),
(63,'','',1,0,'2024-03-24','SS'),
(64,'','',1,1,'2024-03-24','SS'),
(65,'','',1,1,'2024-03-24','SS'),
(66,'','',1,1,'2024-03-24','SS'),
(67,'','',1,1,'2024-03-24','SS'),
(68,'','',1,1,'2024-03-24','SS'),
(69,'','',1,1,'2024-03-24','SS'),
(70,'','',1,1,'2024-03-24','SS'),
(71,'','',1,1,'2024-03-24','SS'),
(72,'','',1,1,'2024-03-24','SS'),
(73,'','',1,1,'2024-03-24','SS'),
(74,'','',1,1,'2024-03-24','SS'),
(75,'','',1,1,'2024-03-24','SS'),
(76,'','',1,1,'2024-03-24','SS'),
(77,'','',1,1,'2024-03-24','SS'),
(78,'','',1,1,'2024-03-24','SS'),
(79,'','',1,0,'2024-03-24','SS'),
(80,'','',1,1,'2024-03-24','SS'),
(81,'','',1,1,'2024-03-24','SS'),
(82,'','',1,1,'2024-03-24','SS'),
(83,'','',1,0,'2024-03-24','SS'),
(84,'','',1,1,'2024-03-24','SS'),
(85,'','',1,1,'2024-03-24','SS'),
(86,'','',1,0,'2024-03-24','SS'),
(87,'','',1,0,'2024-03-24','SS'),
(88,'','',1,1,'2024-03-24','SS'),
(89,'','',1,1,'2024-03-24','SS'),
(90,'','',1,1,'2024-03-24','SS'),
(91,'','',1,0,'2024-03-24','SS'),
(92,'','',1,0,'2024-03-24','SS'),
(93,'','',1,0,'2024-03-24','SS'),
(94,'','',1,0,'2024-03-27','YN');
/*!40000 ALTER TABLE `client_diary` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:15:15
