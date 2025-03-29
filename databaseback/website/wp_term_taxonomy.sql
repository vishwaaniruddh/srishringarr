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
-- Table structure for table `wp_term_taxonomy`
--

DROP TABLE IF EXISTS `wp_term_taxonomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT 0,
  `count` bigint(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_term_taxonomy`
--

LOCK TABLES `wp_term_taxonomy` WRITE;
/*!40000 ALTER TABLE `wp_term_taxonomy` DISABLE KEYS */;
INSERT INTO `wp_term_taxonomy` VALUES
(1,1,'category','',0,1),
(2,2,'category','',0,5),
(4,7,'category','',0,3),
(9,8,'category','',0,6),
(10,10,'category','',0,6),
(13,12,'category','',0,8),
(16,15,'post_tag','',0,1),
(19,19,'post_tag','',0,2),
(20,20,'post_tag','',0,2),
(22,22,'post_tag','',0,0),
(23,23,'post_tag','',0,2),
(27,27,'post_tag','',0,2),
(29,29,'post_tag','',0,2),
(31,31,'post_tag','',0,2),
(35,35,'post_tag','',0,4),
(37,37,'post_tag','',0,5),
(41,39,'post_tag','',0,2),
(43,43,'post_tag','',0,1),
(45,45,'post_tag','',0,2),
(48,47,'post_tag','',0,4),
(50,50,'post_tag','',0,0),
(52,51,'post_tag','',0,4),
(53,53,'post_tag','',0,3),
(55,55,'post_tag','',0,3),
(59,59,'post_tag','',0,2),
(61,61,'post_tag','',0,11),
(63,64,'post_tag','',0,1),
(66,66,'post_tag','',0,5),
(68,68,'post_tag','',0,0),
(69,69,'portfolio_category','',0,12),
(71,72,'portfolio_category','',0,8),
(75,74,'carousels_category','',0,18),
(76,76,'carousels_category','',0,10),
(79,79,'portfolio_category','',0,10),
(82,80,'slides_category','',0,9),
(83,83,'portfolio_category','',0,10),
(84,84,'carousels_category','',0,10),
(85,85,'carousels_category','',0,8),
(87,86,'nav_menu','',0,12),
(90,90,'nav_menu','',0,19),
(92,92,'post_format','',0,4),
(93,93,'post_format','',0,4),
(94,94,'post_format','',0,3),
(95,95,'post_format','',0,2),
(96,97,'carousels_category','',0,0),
(98,96,'carousels_category','',0,6),
(99,99,'nav_menu','',0,8),
(100,100,'post_format','',0,2);
/*!40000 ALTER TABLE `wp_term_taxonomy` ENABLE KEYS */;
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
