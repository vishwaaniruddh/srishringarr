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
-- Table structure for table `jproduct_images`
--

DROP TABLE IF EXISTS `jproduct_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jproduct_images` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `product_id` int(100) NOT NULL COMMENT 'product auto id',
  `images` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jproduct_images`
--

LOCK TABLES `jproduct_images` WRITE;
/*!40000 ALTER TABLE `jproduct_images` DISABLE KEYS */;
INSERT INTO `jproduct_images` VALUES
(7,1875,'Images/14368658060.jpg'),
(6,1870,'Images/14219159470.jpg'),
(4,0,'Images/14219139720.jpg'),
(5,0,'Images/14219140030.jpg'),
(8,1875,'Images/14368658061.jpg'),
(9,1877,'Images/14368674411.jpg'),
(10,1877,'Images/14368674412.jpg'),
(11,1879,'Images/14368780661.jpg'),
(12,1879,'Images/14368780662.jpg'),
(13,1880,'Images/14371287470.jpg'),
(14,1880,'Images/14371287471.jpg'),
(15,1886,'Images/14371288950.jpg'),
(16,1886,'Images/14371288951.jpg'),
(17,1881,'Images/14371290280.jpg'),
(18,1881,'Images/14371290281.jpg'),
(19,1882,'Images/14371290680.jpg'),
(20,1882,'Images/14371290681.jpg'),
(21,1883,'Images/14371291160.jpg'),
(22,1883,'Images/14371291161.jpg'),
(23,1884,'Images/14371291550.jpg'),
(24,1884,'Images/14371291551.jpg'),
(25,1885,'Images/14371292510.jpg'),
(26,1885,'Images/14371292511.jpg'),
(27,1887,'Images/14371293340.jpg'),
(28,1887,'Images/14371293341.jpg'),
(29,1889,'Images/14371294110.jpg'),
(30,1889,'Images/14371294111.jpg'),
(31,1890,'Images/14371295340.jpg'),
(32,1890,'Images/14371295341.jpg'),
(33,1891,'Images/14371296520.jpg'),
(34,1891,'Images/14371296521.jpg'),
(35,1892,'Images/14371304520.jpg'),
(36,1892,'Images/14371304521.jpg'),
(37,1893,'Images/14371305780.jpg'),
(38,1893,'Images/14371305781.jpg'),
(39,1894,'Images/14371310160.jpg'),
(40,1894,'Images/14371310161.jpg'),
(41,1895,'Images/14371311360.jpg'),
(42,1895,'Images/14371311361.jpg'),
(43,1896,'Images/14371318290.jpg'),
(44,1896,'Images/14371318291.jpg'),
(45,1897,'Images/14371324050.jpg'),
(46,1897,'Images/14371324051.jpg'),
(47,1898,'Images/14371977400.jpg'),
(48,1898,'Images/14371977401.jpg'),
(49,1900,'Images/14371978760.jpg'),
(50,1900,'Images/14371978761.jpg'),
(51,1901,'Images/14371979350.jpg'),
(52,1901,'Images/14371979351.jpg'),
(53,1902,'Images/14371980640.jpg'),
(54,1902,'Images/14371980641.jpg');
/*!40000 ALTER TABLE `jproduct_images` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:15:39
