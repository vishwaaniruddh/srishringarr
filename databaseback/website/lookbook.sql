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
-- Table structure for table `lookbook`
--

DROP TABLE IF EXISTS `lookbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lookbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=253 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lookbook`
--

LOCK TABLES `lookbook` WRITE;
/*!40000 ALTER TABLE `lookbook` DISABLE KEYS */;
INSERT INTO `lookbook` VALUES
(252,'../lookbook/YNL174 - 49000 - RENT - 7500, YNL176 - 43000 - RENT - 6500 (2)1567861344.jpg'),
(251,'../lookbook/YNL171 - 41500 - RENT - 8000 (42)1567861325.jpg'),
(250,'../lookbook/YNL170 - 37000 - RENT - 6000, YNL165 - 15500 - RENT - 5000 (2)1567861299.jpg'),
(249,'../lookbook/YNL158 - 122500 - RENT - 20000, YNL159 - 112500 - RENT - 20000 (14)1567861268.jpg'),
(248,'../lookbook/YNL141 - 53000 - RENT - 10500, YNL190 - 72000 - RENT - 11000 (2)1567861245.jpg'),
(247,'../lookbook/YNG138XL - 51000 - RENT - 8000, YNG129XL - 51000 - RENT - 8000 (2)1567861223.jpg'),
(246,'../lookbook/YNG128XL - 51000 - RENT - 8000, YNG119 - 51000 - RENT - 8000 (2)1567861200.jpg'),
(245,'../lookbook/YNG117 - 51000 - RENT - 8000, YNG115 - 51000 - RENT - 8000 (2)1567861172.jpg'),
(244,'../lookbook/YNG116 - 51000 - RENT - 8000, YNG130XL - 51000 - RENT - 8000 (2)1567861158.jpg'),
(243,'../lookbook/YNG096 - 51000 - RENT - 10000, YNG098 - 59500 - RENT - 10000 (6)1567861127.jpg'),
(242,'../lookbook/YNG094 - 28200 - RENT - 5000, YNG082 - 11500 - RENT - 3000 (2)1567861102.jpg'),
(241,'../lookbook/YNG092 - 28200 - RENT - 5000, YNG080 - 13000 - RENT - 4000 (6)1567861077.jpg'),
(240,'../lookbook/YNL190-72000(1)1567515381.jpg'),
(239,'../lookbook/YNL187-36500(1)1567515372.jpg'),
(238,'../lookbook/YNL185-36500(1)1567515364.jpg'),
(237,'../lookbook/YNL179-35000(1)1567515350.jpg'),
(236,'../lookbook/YNL176-43000(1)1567515340.jpg'),
(234,'../lookbook/YNL171-41500(1)1567515322.jpg'),
(235,'../lookbook/YNL173-72500(1)1567515330.jpg'),
(232,'../lookbook/YNL167-22000(1)1567515304.jpg'),
(233,'../lookbook/YNL170-37000(1)1567515312.jpg'),
(231,'../lookbook/YNL159-112500(1)1567515296.jpg'),
(229,'../lookbook/YNG138XL-49000(1)1567515276.jpg'),
(230,'../lookbook/YNL158-122500(1)1567515289.jpg'),
(228,'../lookbook/YNG137XL-49000(1)1567515253.jpg'),
(227,'../lookbook/YNG135XL-49000(1)1567515243.jpg'),
(226,'../lookbook/YNG134XL-49000(1)1567515234.jpg'),
(224,'../lookbook/YNG130XL-49000(1)1567515215.jpg'),
(225,'../lookbook/YNG133XL-49000(1)1567515223.jpg'),
(223,'../lookbook/YNG128XL-49000(1)1567515206.jpg'),
(221,'../lookbook/YNG120-51000(1)1567515185.jpg'),
(222,'../lookbook/YNG127-42500(1)1567515192.jpg'),
(220,'../lookbook/YNG119-51000 (2) copy1567515172.jpg'),
(219,'../lookbook/YNG115-51000 (1) copy1567515039.jpg'),
(217,'../lookbook/YNG104-25000 (4)1567515014.jpg'),
(218,'../lookbook/YNG108APP-30000(1)1567515028.jpg'),
(216,'../lookbook/YNG096-51000(1)1567515004.jpg'),
(215,'../lookbook/YNG093-11400(1)1567514985.jpg'),
(214,'../lookbook/YNG082-11500(1)1567514974.jpg'),
(213,'../lookbook/YNG080-13000(1)1567514963.jpg'),
(211,'../lookbook/IMG -24441567514950.jpg'),
(210,'../lookbook/IMG -23161567514941.jpg'),
(212,'../lookbook/IMG -25261567514956.jpg'),
(209,'../lookbook/IMG -21831567514930.jpg'),
(208,'../lookbook/IMG -21031567514920.jpg'),
(207,'../lookbook/IMG -20481567514907.jpg'),
(205,'../lookbook/IMG -18481567514892.jpg'),
(206,'../lookbook/IMG -18941567514899.jpg'),
(204,'../lookbook/IMG -17711567514884.jpg'),
(203,'../lookbook/IMG -16521567514877.jpg'),
(201,'../lookbook/IMG -14841567514859.jpg'),
(202,'../lookbook/IMG -15791567514867.jpg'),
(200,'../lookbook/IMG -14461567514846.jpg'),
(199,'../lookbook/IMG -13181567514836.jpg'),
(197,'../lookbook/IMG -11901567514818.jpg'),
(198,'../lookbook/IMG -12291567514828.jpg'),
(196,'../lookbook/IMG -10711567514811.jpg'),
(194,'../lookbook/IMG -09961567514766.jpg'),
(189,'../lookbook/IMG -0136 copy1567514704.jpg'),
(190,'../lookbook/IMG -0293 copy1567514719.jpg'),
(191,'../lookbook/IMG -0466 copy1567514727.jpg'),
(192,'../lookbook/IMG -0515 copy1567514732.jpg'),
(193,'../lookbook/IMG -08571567514752.jpg');
/*!40000 ALTER TABLE `lookbook` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:15:43
