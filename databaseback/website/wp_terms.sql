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
-- Table structure for table `wp_terms`
--

DROP TABLE IF EXISTS `wp_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_terms`
--

LOCK TABLES `wp_terms` WRITE;
/*!40000 ALTER TABLE `wp_terms` DISABLE KEYS */;
INSERT INTO `wp_terms` VALUES
(1,'Uncategorized','uncategorized',0),
(2,'Artists','artists',0),
(7,'Concerts','concerts',0),
(8,'Events','events',0),
(10,'New Album','new-album',0),
(12,'Singles','singles',0),
(15,'adventure','adventure',0),
(19,'albert einstein','albert-einstein',0),
(20,'billy ray','billy-ray',0),
(22,'billy ray','billy-ray-2',0),
(23,'creativity','creativity',0),
(27,'explore','explore',0),
(29,'family','family',0),
(31,'hotels','hotels',0),
(35,'ideas','ideas',0),
(37,'interview','interview',0),
(39,'jazz','jazz',0),
(43,'letters','letters',0),
(45,'lifestyle','lifestyle-2',0),
(47,'mix','mix',0),
(50,'mix','mix-2',0),
(51,'music','music',0),
(53,'people','people',0),
(55,'photography','photography-2',0),
(59,'pj harvey','pj-harvey',0),
(61,'travel','travel-2',0),
(64,'wilderness','wilderness',0),
(66,'world','world',0),
(68,'world','world-2',0),
(69,'Art','art',0),
(72,'Business','business',0),
(74,'Client Carousel','client-carousel',0),
(76,'Client Carousel 2','client-carousel-2',0),
(79,'Fashion','design',0),
(80,'Home Slider','home-slider',0),
(83,'Photography','photography',0),
(84,'White Carousel','white-carousel',0),
(85,'White Carousel 2','white-carousel-2',0),
(86,'footer_menu','footer_menu',0),
(90,'top_menu','top_menu',0),
(92,'Link','post-format-link',0),
(93,'Video','post-format-video',0),
(94,'Quote','post-format-quote',0),
(95,'Gallery','post-format-gallery',0),
(96,'carousel 2','carousel-2',0),
(97,'carousel 2','carousel-2',0),
(99,'footer_menu2','footer_menu2',0),
(100,'Audio','post-format-audio',0);
/*!40000 ALTER TABLE `wp_terms` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:16:36
