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
-- Table structure for table `brand_color`
--

DROP TABLE IF EXISTS `brand_color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand_color`
--

LOCK TABLES `brand_color` WRITE;
/*!40000 ALTER TABLE `brand_color` DISABLE KEYS */;
INSERT INTO `brand_color` VALUES
(1,'Gold',1),
(2,' White',1),
(3,' Red',1),
(4,' Green',1),
(5,'White ',1),
(6,' Rhodolite',1),
(7,'Red ',1),
(8,'Rhodolite ',1),
(9,'',0),
(10,'Green ',1),
(11,'Off White',1),
(12,' Off White',1),
(13,' Pink',1),
(14,' Black',1),
(15,'Light gold',0),
(16,'Purple and red',0),
(17,' black and off-white ',0),
(18,'Fuchsia pink',0),
(19,'Cream',0),
(20,' blue and pink ',0),
(21,'Red and green',0),
(22,'Orange',0),
(23,'Black',0),
(24,'Antique gold ',0),
(25,'Emerald green',0),
(26,'Royal blue',0),
(27,'Mustard',0),
(28,'Maroon',0),
(29,'Blue and gold',0),
(30,'Gold and pink',0),
(31,'Golden',0),
(32,'Off-white',0),
(33,' golden and red',0),
(34,'Turquoise',0),
(35,'Mango yellow',0),
(36,'Beige',0),
(37,'Pink and purple',0),
(38,'Purple and maroon',0),
(39,'Indigo blue',0),
(40,'Blue and peach pink',0),
(41,'Tangerine red',0),
(42,'Coral',0),
(43,'Ecru and turquoise blue',0),
(44,'Pink and yellow',0),
(45,'Midnight blue ',0),
(46,' coral',0),
(47,'Celeste blue and white',0),
(48,'Mexican pink',0),
(49,'Powder blue',0),
(50,'Purple ',0),
(51,' rose pink',0),
(52,' golden',0),
(53,'Candy pink',0),
(54,'Blue ombre',0),
(55,'Chocolate brown',0),
(56,'Navy blue',0),
(57,' coral and brown',0),
(58,' dark grey',0),
(59,' pink and orange',0),
(60,'Azure blue',0),
(61,'Sea green and silver',0),
(62,'Nude and gold',0),
(63,'Mint green',0),
(64,'Blue and red',0),
(65,'Baby pink and off white',0),
(66,'Red and beige',0),
(67,'Sea green',0),
(68,'Nude',0),
(69,'Teal green and golden',0),
(70,'Pink',0),
(71,'Red and blue',0),
(72,'Blue and beige',0),
(73,'Red and golden',0),
(74,'Peach',0),
(75,'Rose gold',0),
(76,'Grey',0),
(77,'Prussian blue',0),
(78,' Blue ',0),
(79,' White.',0),
(80,' topaz',0),
(81,' Topaz Pink ',0),
(82,'  Pink ',0),
(83,'Rhodium Pink',0),
(84,'White Kundan',0),
(85,'Pearl',0),
(86,'Ruby',0),
(87,'Multi Color Kundan',0),
(88,'Green Kundan',0),
(89,'Rhodolite Kundan',0),
(90,'White Pearl',0),
(91,'White Vilandi',0),
(92,'whitevilandiandemeraldgreen',0),
(93,'whitepearl',0),
(94,'rhodiumpink',0),
(95,'Moti',0),
(96,'GreenMoti',0),
(97,'Silver',0),
(98,'Tangerine Pink',0),
(99,'Brown',0),
(100,'Buff',0),
(101,'Lime Green',0),
(102,'Blue',0),
(103,'Baby Pink',0),
(104,'Yellow',0),
(105,'Olive Green',0),
(106,'Indigo',0),
(107,'Pink Purple Brocade',0),
(108,'Multicolor Brocade',0),
(109,'Dark Orange',0),
(110,'Mauve',0),
(111,'Mustard Yellow',0),
(112,'Gold with Coral',0),
(113,'Bottle Green',0),
(114,'Multicolour ',0),
(115,'Dark Gold',0),
(116,'Beige or Golden',0),
(117,'Blue Purple',0),
(118,'Pink Peach',0),
(119,'Creame',0),
(120,'Dark Peach',0),
(124,'^74.125.*.*',0),
(123,'crawler);',0),
(125,'addmin/',0);
/*!40000 ALTER TABLE `brand_color` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:14:55
