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
-- Table structure for table `wp_comments`
--

DROP TABLE IF EXISTS `wp_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT 0,
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT 0,
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT 0,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_comments`
--

LOCK TABLES `wp_comments` WRITE;
/*!40000 ALTER TABLE `wp_comments` DISABLE KEYS */;
INSERT INTO `wp_comments` VALUES
(1,1,'Mr WordPress','','https://wordpress.org/','','2015-07-29 12:21:17','2015-07-29 12:21:17','Hi, this is a comment.\nTo delete a comment, just log in and view the post&#039;s comments. There you will have the option to edit or delete them.',0,'1','','',0,0),
(2,10182,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:51:24','2014-10-24 14:51:24','What an awesome post!',0,'1','','',0,0),
(3,10182,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:07:50','2014-10-24 15:07:50','Thank you! I hope you enjoy our blog and that you\'ll continue following us.',0,'1','','',2,0),
(4,10182,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 15:10:10','2014-10-24 15:10:10','Great read, I love your blog.',0,'1','','',0,0),
(5,40419,'Mr WordPress','','https://wordpress.org/','','2014-09-16 16:12:28','2014-09-16 16:12:28','Hi, this is a comment.\nTo delete a comment, just log in and view the post&#039;s comments. There you will have the option to edit or delete them.',0,'1','','',0,0),
(6,40419,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:08:10','2014-10-24 15:08:10','Thank you! I hope you enjoy our blog and that you\'ll continue following us.',0,'1','','',5,0),
(7,40419,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 15:10:34','2014-10-24 15:10:34','Great read, I love your blog.',0,'1','','',0,0),
(8,40420,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:51:14','2014-10-24 14:51:14','What an awesome post!',0,'1','','',0,0),
(9,40420,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:07:40','2014-10-24 15:07:40','Thank you! I hope you enjoy our blog and that you\'ll continue following us.',0,'1','','',8,0),
(10,40420,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 15:09:51','2014-10-24 15:09:51','Great read, I love your blog.',0,'1','','',0,0),
(11,40421,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:51:10','2014-10-24 14:51:10','What an awesome post!',0,'1','','',0,0),
(12,40421,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 14:59:36','2014-10-24 14:59:36','Great read, I love your blog.',0,'1','','',0,0),
(13,40421,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:07:29','2014-10-24 15:07:29','Thank you! I hope you enjoy our blog and that you\'ll continue following us.',0,'1','','',11,0),
(14,40422,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:51:05','2014-10-24 14:51:05','What an awesome post!',0,'1','','',0,0),
(15,40422,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 14:59:20','2014-10-24 14:59:20','Great read, I love your blog.',0,'1','','',0,0),
(16,40422,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:07:14','2014-10-24 15:07:14','Thank you! I hope you enjoy our blog and that you\'ll continue following us.',0,'1','','',14,0),
(17,40423,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:51:01','2014-10-24 14:51:01','What an awesome post!',0,'1','','',0,0),
(18,40423,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 14:59:05','2014-10-24 14:59:05','Great read, I love your blog.',0,'1','','',0,0),
(19,40423,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:06:35','2014-10-24 15:06:35','Thank you! I hope you enjoy our blog and that you\'ll continue following us.',0,'1','','',17,0),
(20,40424,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:50:52','2014-10-24 14:50:52','What an awesome post!',0,'1','','',0,0),
(21,40424,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 14:58:49','2014-10-24 14:58:49','Great read, I love your blog.',0,'1','','',0,0),
(22,40424,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:14:56','2014-10-24 15:14:56','Thank you! I hope you enjoy our blog and that you’ll continue following us.',0,'1','','',20,0),
(23,40425,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:50:47','2014-10-24 14:50:47','What an awesome post!',0,'1','','',0,0),
(24,40425,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 14:58:32','2014-10-24 14:58:32','Great read, I love your blog.',0,'1','','',0,0),
(25,40425,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:14:53','2014-10-24 15:14:53','Thank you! I hope you enjoy our blog and that you’ll continue following us.',0,'1','','',23,0),
(26,40426,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:50:43','2014-10-24 14:50:43','What an awesome post!',0,'1','','',0,0),
(27,40426,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 15:09:28','2014-10-24 15:09:28','Great read, I love your blog.',0,'1','','',0,0),
(28,40426,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:14:46','2014-10-24 15:14:46','Thank you! I hope you enjoy our blog and that you’ll continue following us.',0,'1','','',26,0),
(29,40427,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:50:38','2014-10-24 14:50:38','What an awesome post!',0,'1','','',0,0),
(30,40427,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 14:57:04','2014-10-24 14:57:04','Great read, I love your blog.',0,'1','','',0,0),
(31,40427,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:14:41','2014-10-24 15:14:41','Thank you! I hope you enjoy our blog and that you’ll continue following us.',0,'1','','',29,0),
(32,40428,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:50:21','2014-10-24 14:50:21','What an awesome post!',0,'1','','',0,0),
(33,40428,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 14:56:01','2014-10-24 14:56:01','Great read, I love your blog.',0,'1','','',0,0),
(34,40428,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:14:35','2014-10-24 15:14:35','Thank you! I hope you enjoy our blog and that you’ll continue following us.',0,'1','','',32,0),
(35,40429,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:51:20','2014-10-24 14:51:20','What an awesome post!',0,'1','','',0,0),
(36,40429,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 15:00:08','2014-10-24 15:00:08','Great read, I love your blog.',0,'1','','',0,0),
(37,40429,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:07:45','2014-10-24 15:07:45','Thank you! I hope you enjoy our blog and that you\'ll continue following us.',0,'1','','',35,0),
(38,51078,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:51:24','2014-10-24 14:51:24','What an awesome post!',0,'1','','',0,0),
(39,51078,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:07:50','2014-10-24 15:07:50','Thank you! I hope you enjoy our blog and that you\'ll continue following us.',0,'1','','',38,0),
(40,51078,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 15:10:10','2014-10-24 15:10:10','Great read, I love your blog.',0,'1','','',0,0),
(41,51079,'Mr WordPress','','https://wordpress.org/','','2014-09-16 16:12:28','2014-09-16 16:12:28','Hi, this is a comment.\nTo delete a comment, just log in and view the post&#039;s comments. There you will have the option to edit or delete them.',0,'1','','',0,0),
(42,51079,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:08:10','2014-10-24 15:08:10','Thank you! I hope you enjoy our blog and that you\'ll continue following us.',0,'1','','',41,0),
(43,51079,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 15:10:34','2014-10-24 15:10:34','Great read, I love your blog.',0,'1','','',0,0),
(44,51080,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:51:14','2014-10-24 14:51:14','What an awesome post!',0,'1','','',0,0),
(45,51080,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:07:40','2014-10-24 15:07:40','Thank you! I hope you enjoy our blog and that you\'ll continue following us.',0,'1','','',44,0),
(46,51080,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 15:09:51','2014-10-24 15:09:51','Great read, I love your blog.',0,'1','','',0,0),
(47,51081,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:51:10','2014-10-24 14:51:10','What an awesome post!',0,'1','','',0,0),
(48,51081,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 14:59:36','2014-10-24 14:59:36','Great read, I love your blog.',0,'1','','',0,0),
(49,51081,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:07:29','2014-10-24 15:07:29','Thank you! I hope you enjoy our blog and that you\'ll continue following us.',0,'1','','',47,0),
(50,51082,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:50:52','2014-10-24 14:50:52','What an awesome post!',0,'1','','',0,0),
(51,51082,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 14:58:49','2014-10-24 14:58:49','Great read, I love your blog.',0,'1','','',0,0),
(52,51082,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:14:56','2014-10-24 15:14:56','Thank you! I hope you enjoy our blog and that you’ll continue following us.',0,'1','','',50,0),
(53,51083,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:50:47','2014-10-24 14:50:47','What an awesome post!',0,'1','','',0,0),
(54,51083,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 14:58:32','2014-10-24 14:58:32','Great read, I love your blog.',0,'1','','',0,0),
(55,51083,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:14:53','2014-10-24 15:14:53','Thank you! I hope you enjoy our blog and that you’ll continue following us.',0,'1','','',53,0),
(56,51084,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:51:20','2014-10-24 14:51:20','What an awesome post!',0,'1','','',0,0),
(57,51084,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 15:00:08','2014-10-24 15:00:08','Great read, I love your blog.',0,'1','','',0,0),
(58,51084,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:07:45','2014-10-24 15:07:45','Thank you! I hope you enjoy our blog and that you\'ll continue following us.',0,'1','','',56,0),
(59,51085,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:50:43','2014-10-24 14:50:43','What an awesome post!',0,'1','','',0,0),
(60,51085,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 15:09:28','2014-10-24 15:09:28','Great read, I love your blog.',0,'1','','',0,0),
(61,51085,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:14:46','2014-10-24 15:14:46','Thank you! I hope you enjoy our blog and that you’ll continue following us.',0,'1','','',59,0),
(62,51086,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 14:50:21','2014-10-24 14:50:21','What an awesome post!',0,'1','','',0,0),
(63,51086,'Eleanor Jones','hellohello@hello.com','','217.24.22.143','2014-10-24 14:56:01','2014-10-24 14:56:01','Great read, I love your blog.',0,'1','','',0,0),
(64,51086,'admin','support@themesnoir.com','','217.24.22.143','2014-10-24 15:14:35','2014-10-24 15:14:35','Thank you! I hope you enjoy our blog and that you’ll continue following us.',0,'1','','',62,0);
/*!40000 ALTER TABLE `wp_comments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:16:33
