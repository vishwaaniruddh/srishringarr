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
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=266 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES
(252,'','../lookbook/YNL174 - 49000 - RENT - 7500, YNL176 - 43000 - RENT - 6500 (2)1567861344.jpg',2,'2020-02-11 06:31:33',0),
(251,'','../lookbook/YNL171 - 41500 - RENT - 8000 (42)1567861325.jpg',2,'2020-02-11 06:31:33',0),
(250,'','../lookbook/YNL170 - 37000 - RENT - 6000, YNL165 - 15500 - RENT - 5000 (2)1567861299.jpg',2,'2020-02-11 06:31:33',0),
(249,'','../lookbook/YNL158 - 122500 - RENT - 20000, YNL159 - 112500 - RENT - 20000 (14)1567861268.jpg',2,'2020-02-11 06:31:33',0),
(248,'','../lookbook/YNL141 - 53000 - RENT - 10500, YNL190 - 72000 - RENT - 11000 (2)1567861245.jpg',2,'2020-02-11 06:31:33',0),
(247,'','../lookbook/YNG138XL - 51000 - RENT - 8000, YNG129XL - 51000 - RENT - 8000 (2)1567861223.jpg',2,'2020-02-11 06:31:33',0),
(246,'','../lookbook/YNG128XL - 51000 - RENT - 8000, YNG119 - 51000 - RENT - 8000 (2)1567861200.jpg',2,'2020-02-11 06:31:33',0),
(245,'','../lookbook/YNG117 - 51000 - RENT - 8000, YNG115 - 51000 - RENT - 8000 (2)1567861172.jpg',2,'2020-02-11 06:31:33',0),
(244,'','../lookbook/YNG116 - 51000 - RENT - 8000, YNG130XL - 51000 - RENT - 8000 (2)1567861158.jpg',2,'2020-02-11 06:31:33',0),
(243,'','../lookbook/YNG096 - 51000 - RENT - 10000, YNG098 - 59500 - RENT - 10000 (6)1567861127.jpg',2,'2020-02-11 06:31:33',0),
(242,'','../lookbook/YNG094 - 28200 - RENT - 5000, YNG082 - 11500 - RENT - 3000 (2)1567861102.jpg',2,'2020-02-11 06:31:33',0),
(241,'','../lookbook/YNG092 - 28200 - RENT - 5000, YNG080 - 13000 - RENT - 4000 (6)1567861077.jpg',2,'2020-02-11 06:31:33',0),
(240,'','../lookbook/YNL190-72000(1)1567515381.jpg',2,'2020-02-11 06:31:33',0),
(239,'','../lookbook/YNL187-36500(1)1567515372.jpg',2,'2020-02-11 06:31:33',0),
(238,'','../lookbook/YNL185-36500(1)1567515364.jpg',2,'2020-02-11 06:31:33',0),
(237,'','../lookbook/YNL179-35000(1)1567515350.jpg',2,'2020-02-11 06:31:33',0),
(236,'','../lookbook/YNL176-43000(1)1567515340.jpg',2,'2020-02-11 06:31:33',0),
(234,'','../lookbook/YNL171-41500(1)1567515322.jpg',2,'2020-02-11 06:31:33',0),
(235,'','../lookbook/YNL173-72500(1)1567515330.jpg',2,'2020-02-11 06:31:33',0),
(232,'','../lookbook/YNL167-22000(1)1567515304.jpg',2,'2020-02-11 06:31:33',0),
(233,'','../lookbook/YNL170-37000(1)1567515312.jpg',2,'2020-02-11 06:31:33',0),
(231,'','../lookbook/YNL159-112500(1)1567515296.jpg',2,'2020-02-11 06:31:33',0),
(229,'','../lookbook/YNG138XL-49000(1)1567515276.jpg',2,'2020-02-11 06:31:33',0),
(230,'','../lookbook/YNL158-122500(1)1567515289.jpg',2,'2020-02-11 06:31:33',0),
(228,'','../lookbook/YNG137XL-49000(1)1567515253.jpg',2,'2020-02-11 06:31:33',0),
(227,'','../lookbook/YNG135XL-49000(1)1567515243.jpg',2,'2020-02-11 06:31:33',0),
(226,'','../lookbook/YNG134XL-49000(1)1567515234.jpg',2,'2020-02-11 06:31:33',0),
(224,'','../lookbook/YNG130XL-49000(1)1567515215.jpg',2,'2020-02-11 06:31:33',0),
(225,'','../lookbook/YNG133XL-49000(1)1567515223.jpg',2,'2020-02-11 06:31:33',0),
(223,'','../lookbook/YNG128XL-49000(1)1567515206.jpg',2,'2020-02-11 06:31:33',0),
(221,'','../lookbook/YNG120-51000(1)1567515185.jpg',2,'2020-02-11 06:31:33',0),
(222,'','../lookbook/YNG127-42500(1)1567515192.jpg',2,'2020-02-11 06:31:33',0),
(220,'','../lookbook/YNG119-51000 (2) copy1567515172.jpg',2,'2020-02-11 06:31:33',0),
(219,'','../lookbook/YNG115-51000 (1) copy1567515039.jpg',2,'2020-02-11 06:31:33',0),
(217,'','../lookbook/YNG104-25000 (4)1567515014.jpg',2,'2020-02-11 06:31:33',0),
(218,'','../lookbook/YNG108APP-30000(1)1567515028.jpg',2,'2020-02-11 06:31:33',0),
(216,'','../lookbook/YNG096-51000(1)1567515004.jpg',2,'2020-02-11 06:31:33',0),
(215,'','../lookbook/YNG093-11400(1)1567514985.jpg',2,'2020-02-11 06:31:33',0),
(214,'','../lookbook/YNG082-11500(1)1567514974.jpg',2,'2020-02-11 06:31:33',0),
(213,'','../lookbook/YNG080-13000(1)1567514963.jpg',2,'2020-02-11 06:31:33',0),
(211,'','../lookbook/IMG -24441567514950.jpg',2,'2020-02-11 06:31:33',0),
(210,'','../lookbook/IMG -23161567514941.jpg',2,'2020-02-11 06:31:33',0),
(212,'','../lookbook/IMG -25261567514956.jpg',2,'2020-02-11 06:31:33',0),
(209,'','../lookbook/IMG -21831567514930.jpg',2,'2020-02-11 06:31:33',0),
(208,'','../lookbook/IMG -21031567514920.jpg',2,'2020-02-11 06:31:33',0),
(207,'','../lookbook/IMG -20481567514907.jpg',2,'2020-02-11 06:31:33',0),
(205,'','../lookbook/IMG -18481567514892.jpg',2,'2020-02-11 06:31:33',0),
(206,'','../lookbook/IMG -18941567514899.jpg',2,'2020-02-11 06:31:33',0),
(204,'','../lookbook/IMG -17711567514884.jpg',2,'2020-02-11 06:31:33',0),
(203,'','../lookbook/IMG -16521567514877.jpg',2,'2020-02-11 06:31:33',0),
(201,'','../lookbook/IMG -14841567514859.jpg',2,'2020-02-11 06:31:33',0),
(202,'','../lookbook/IMG -15791567514867.jpg',2,'2020-02-11 06:31:33',0),
(200,'','../lookbook/IMG -14461567514846.jpg',2,'2020-02-11 06:31:33',0),
(199,'','../lookbook/IMG -13181567514836.jpg',2,'2020-02-11 06:31:33',0),
(197,'','../lookbook/IMG -11901567514818.jpg',2,'2020-02-11 06:31:33',0),
(198,'','../lookbook/IMG -12291567514828.jpg',2,'2020-02-11 06:31:33',0),
(196,'','../lookbook/IMG -10711567514811.jpg',2,'2020-02-11 06:31:33',0),
(194,'','../lookbook/IMG -09961567514766.jpg',2,'2020-02-11 06:31:33',0),
(189,'','../lookbook/IMG -0136 copy1567514704.jpg',2,'2020-02-11 06:31:33',0),
(190,'','../lookbook/IMG -0293 copy1567514719.jpg',2,'2020-02-11 06:31:33',0),
(191,'','../lookbook/IMG -0466 copy1567514727.jpg',2,'2020-02-11 06:31:33',0),
(192,'','../lookbook/IMG -0515 copy1567514732.jpg',2,'2020-02-11 06:31:33',0),
(193,'','../lookbook/IMG -08571567514752.jpg',2,'2020-02-11 06:31:33',0),
(253,'','../gallery/Yosshita Neha Client Dairies (1)1581517479.jpg',4,'2020-02-12 14:24:39',1),
(254,'','../gallery/Yosshita Neha Client Dairies (15)1581517510.jpg',0,'2020-02-12 14:25:10',1),
(255,'','../gallery/Yosshita Neha Client Dairies (14)1581517525.jpg',0,'2020-02-12 14:25:25',1),
(256,'','../gallery/Yosshita Neha Client Dairies (11)1581517561.jpg',0,'2020-02-12 14:26:01',1),
(257,'','../gallery/Yosshita Neha Client Dairies (10)1581517575.jpg',0,'2020-02-12 14:26:15',1),
(258,'','../gallery/Yosshita Neha Client Dairies (9)1581517589.jpg',0,'2020-02-12 14:26:29',1),
(259,'','../gallery/Yosshita Neha Client Dairies (8)1581517609.jpg',0,'2020-02-12 14:26:49',1),
(260,'','../gallery/Yosshita Neha Client Dairies (7)1581517623.jpg',0,'2020-02-12 14:27:03',1),
(261,'','../gallery/Yosshita Neha Client Dairies (6)1581517638.jpg',0,'2020-02-12 14:27:18',1),
(262,'','../gallery/Yosshita Neha Client Dairies (5)1581517656.jpg',0,'2020-02-12 14:27:36',1),
(263,'','../gallery/Yosshita Neha Client Dairies (4)1581517675.jpg',0,'2020-02-12 14:27:55',1),
(264,'','../gallery/Yosshita Neha Client Dairies (1)1581518234.jpg',0,'2020-02-12 14:37:14',1),
(265,'','../gallery/fafa1600817609.jpg',0,'2020-09-22 23:33:29',1);
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:15:30
