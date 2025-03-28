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
-- Table structure for table `garment_product_old`
--

DROP TABLE IF EXISTS `garment_product_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `garment_product_old` (
  `gproduct_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `gproduct_image` varchar(200) NOT NULL,
  `gproduct_code` varchar(50) NOT NULL,
  `gproduct_name` varchar(100) NOT NULL,
  `gproduct_desc` varchar(250) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `garment_id` bigint(11) NOT NULL,
  `product_for` varchar(100) NOT NULL,
  `sales_price` varchar(25) NOT NULL,
  `rent_price` varchar(25) NOT NULL,
  `itemid` varchar(50) NOT NULL,
  PRIMARY KEY (`gproduct_id`)
) ENGINE=MyISAM AUTO_INCREMENT=482 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `garment_product_old`
--

LOCK TABLES `garment_product_old` WRITE;
/*!40000 ALTER TABLE `garment_product_old` DISABLE KEYS */;
INSERT INTO `garment_product_old` VALUES
(228,'Images/1382616848.jpg','9231','9231','Bridal Dupattas','2013-10-24 12:14:08',0,'19','','',''),
(7,'Images/1385197662.jpg','1','EXCLUSIVE BLOUSES','EXCLUSIVE BLOUSES1','2013-02-07 05:19:51',5,'3','','',''),
(8,'Images/1385197749.jpg','2','EXCLUSIVE BLOUSES','EXCLUSIVE BLOUSES2','2013-02-07 05:20:58',5,'3','','',''),
(9,'Images/1385197829.jpg','3','EXCLUSIVE BLOUSES','EXCLUSIVE BLOUSES 3','2013-02-07 05:21:21',5,'3','','',''),
(10,'Images/1385197946.jpg','4','EXCLUSIVE BLOUSES','EXCLUSIVE BLOUSES 4','2013-02-07 05:22:29',5,'3','','',''),
(11,'Images/1385197997.jpg','5','EXCLUSIVE BLOUSES','EXCLUSIVE BLOUSES 5','2013-02-07 05:23:00',5,'3','','',''),
(12,'Images/1385198072.jpg','6','EXCLUSIVE BLOUSES','EXCLUSIVE BLOUSES 6','2013-02-07 05:29:27',5,'3','','',''),
(13,'Images/1385198232.jpg','7','EXCLUSIVE BLOUSES','EXCLUSIVE BLOUSES 7','2013-02-07 05:37:39',5,'3','','',''),
(14,'Images/1385198290.jpg','8','EXCLUSIVE BLOUSES','EXCLUSIVE BLOUSES 8','2013-02-07 05:43:58',5,'3','','',''),
(15,'Images/1385204906.jpg','9','EXCLUSIVE BLOUSES','EXCLUSIVE BLOUSES9','2013-02-07 05:44:43',5,'3','','',''),
(16,'Images/1385205313.jpg','10','EXCLUSIVE BLOUSES','EXCLUSIVE BLOUSES 10','2013-02-07 07:35:25',5,'3','','',''),
(17,'Images/1385205638.jpg','11','EXCLUSIVE BLOUSES ','EXCLUSIVE BLOUSES 11','2013-02-07 07:35:55',5,'3','','',''),
(18,'Images/1385205699.jpg','12','EXCLUSIVE BLOUSES ','EXCLUSIVE BLOUSES 12','2013-02-07 07:36:46',5,'3','','',''),
(19,'Images/1385205771.jpg','13','EXCLUSIVE BLOUSES',' EXCLUSIVE BLOUSES 13','2013-02-07 07:37:30',5,'3','','',''),
(20,'Images/1385205833.jpg','14','EXCLUSIVE BLOUSES ','EXCLUSIVE BLOUSES 14','2013-02-07 07:38:24',5,'3','','',''),
(21,'Images/1385205895.jpg','15','EXCLUSIVE BLOUSES','EXCLUSIVE BLOUSES 15','2013-02-07 07:38:58',5,'3','','',''),
(22,'Images/1385205973.jpg','16','EXCLUSIVE BLOUSES','EXCLUSIVE BLOUSES 16','2013-02-07 07:39:30',5,'3','','',''),
(23,'Images/1385206029.jpg','17','EXCLUSIVE BLOUSES','EXCLUSIVE BLOUSES 17','2013-02-07 07:40:13',5,'3','','',''),
(24,'Images/1385206082.jpg','18','EXCLUSIVE BLOUSES','EXCLUSIVE BLOUSES 18','2013-02-07 07:40:44',5,'3','','',''),
(25,'Images/1385206139.jpg','19','EXCLUSIVE BLOUSES','EXCLUSIVE BLOUSES 19','2013-02-07 07:47:18',5,'3','','',''),
(26,'Images/1385206204.jpg','20','EXCLUSIVE BLOUSES','EXCLUSIVE BLOUSES 20','2013-02-07 07:48:07',5,'3','','',''),
(27,'Images/1385206265.jpg','21','EXCLUSIVE BLOUSES','EXCLUSIVE BLOUSES 21','2013-02-07 07:48:38',5,'3','','',''),
(28,'Images/1385206345.jpg','22','EXCLUSIVE BLOUSES ','EXCLUSIVE BLOUSES 22','2013-02-07 07:51:55',5,'3','','',''),
(29,'Images/1385206413.jpg','23','EXCLUSIVE BLOUSES','EXCLUSIVE BLOUSES 23','2013-02-07 07:53:57',5,'3','','',''),
(30,'Images/1385206487.jpg','24','EXCLUSIVE BLOUSES ','EXCLUSIVE BLOUSES 24','2013-02-07 09:43:04',5,'3','','',''),
(31,'Images/1360232802.jpg','01','DRESSES','DRESSES 01','2013-02-07 10:04:05',6,'','','',''),
(32,'Images/1360231493.jpg','02','DRESSES','DRESSES 02','2013-02-07 10:04:53',6,'','','',''),
(33,'Images/1360231539.jpg','03','DRESSES','DRESSES 03','2013-02-07 10:05:39',6,'','','',''),
(34,'Images/1360231760.jpg','04','DRESSES','DRESSES 04','2013-02-07 10:09:20',6,'','','',''),
(35,'Images/1360231800.jpg','05','DRESSES','DRESSES 05','2013-02-07 10:10:00',6,'','','',''),
(36,'Images/1360231851.jpg','06','DRESSES','DRESSES 06','2013-02-07 10:10:51',6,'','','',''),
(38,'Images/1360231961.jpg','07','DRESSES','DRESSES 07','2013-02-07 10:12:41',6,'','','',''),
(39,'Images/1360232019.jpg','08','DRESSES','DRESSES 08','2013-02-07 10:13:39',6,'','','',''),
(40,'Images/1360232053.jpg','09','DRESSES','DRESSES 09','2013-02-07 10:14:13',6,'','','',''),
(41,'Images/1360232083.jpg','10','DRESSES','DRESSES 10','2013-02-07 10:14:43',6,'','','',''),
(43,'Images/1360232660.jpg','11','DRESSES','DRESSES 11','2013-02-07 10:24:20',6,'','','',''),
(44,'Images/1360232906.jpg','12','DRESSES','DRESSES 12','2013-02-07 10:28:26',6,'','','',''),
(45,'Images/1360232949.jpg','13','DRESSES','DRESSES 13','2013-02-07 10:29:09',6,'','','',''),
(46,'Images/1360232985.jpg','14','DRESSES','DRESSES 14','2013-02-07 10:29:45',6,'','','',''),
(47,'Images/1360235533.jpg','01','DRESSES','DRESSES 01','2013-02-07 11:12:13',7,'','','',''),
(48,'Images/1360235570.jpg','02','DRESSES','DRESSES 02','2013-02-07 11:12:50',7,'','','',''),
(49,'Images/1360235811.jpg','01','KURTIS','KURTIS 01','2013-02-07 11:16:51',8,'4','','',''),
(50,'Images/1360235839.jpg','02','KURTIS','KURTIS 02','2013-02-07 11:17:19',8,'5','','',''),
(51,'Images/1360235879.jpg','03','KURTIS','KURTIS 03','2013-02-07 11:17:59',8,'5','','',''),
(52,'Images/1360235974.jpg','04','KURTIS','KURTIS 04','2013-02-07 11:19:34',8,'5','','',''),
(53,'Images/1360236046.jpg','05','KURTIS','KURTIS 05','2013-02-07 11:20:46',15,'16','','',''),
(54,'Images/1360236084.jpg','06','KURTIS','KURTIS 06','2013-02-07 11:21:24',8,'5','','',''),
(55,'Images/1360236111.jpg','07','KURTIS','KURTIS 07','2013-02-07 11:21:51',8,'5','','',''),
(56,'Images/1360236161.jpg','08','KURTIS','KURTIS 08','2013-02-07 11:22:41',8,'5','','',''),
(57,'Images/1360236201.jpg','09','KURTIS','KURTIS 09','2013-02-07 11:23:21',8,'5','','',''),
(58,'Images/1360236244.jpg','10','KURTIS','KURTIS 10','2013-02-07 11:24:04',8,'5','','',''),
(59,'Images/1360236331.jpg','11','KURTIS','KURTIS 11','2013-02-07 11:25:31',15,'16','','',''),
(60,'Images/1360236381.jpg','12','KURTIS','KURTIS 12','2013-02-07 11:26:21',15,'16','','',''),
(61,'Images/1360236418.jpg','13','KURTIS ','KURTIS 13','2013-02-07 11:26:58',8,'5','','',''),
(62,'Images/1360236462.jpg','14','KURTIS ','KURTIS 14','2013-02-07 11:27:42',8,'5','','',''),
(63,'Images/1360236485.jpg','15','KURTIS ','KURTIS 15','2013-02-07 11:28:05',15,'16','','',''),
(64,'Images/1360236508.jpg','16','KURTIS ','KURTIS 16','2013-02-07 11:28:28',8,'5','','',''),
(394,'Images/1400502288.jpg','SD101','','','2014-05-19 12:24:49',17,'19','','',''),
(393,'Images/1400502244.jpg','SD60','','','2014-05-19 12:24:06',17,'19','','',''),
(392,'Images/1396857741.jpg','SD125','','','2014-04-07 08:02:22',17,'19','','',''),
(325,'Images/1393833342.jpg','SSL36','','','2014-03-03 07:55:43',10,'8','','',''),
(328,'Images/1393851252.jpg','SML16RITU','','','2014-03-03 12:54:12',10,'8','','',''),
(391,'Images/1396857705.jpg','SD123','','','2014-04-07 08:01:46',17,'19','','',''),
(422,'Images/1413183383.jpg','SSL43','','','2014-10-13 06:56:26',10,'8','','',''),
(421,'Images/1413183259.jpg','SSL42','','','2014-10-13 06:54:22',10,'8','','',''),
(420,'Images/1413182374.jpg','SSL41','','','2014-10-13 06:39:36',10,'8','','',''),
(390,'Images/1396857664.jpg','SD122','','','2014-04-07 08:01:05',17,'19','','',''),
(294,'Images/1393659407.jpg','SML14BLUE','','','2014-03-01 07:36:47',10,'8','','',''),
(419,'Images/1413182185.jpg','SSL40','','','2014-10-13 06:36:29',10,'8','','',''),
(418,'Images/1413181809.jpg','SSL38','','','2014-10-13 06:30:14',10,'8','','',''),
(417,'Images/1413181614.jpg','SSL35','','','2014-10-13 06:26:57',10,'8','','',''),
(298,'Images/1393659573.jpg','SCL10','','','2014-03-01 07:39:33',10,'8','','',''),
(299,'Images/1393659602.jpg','SCL11','','','2014-03-01 07:40:02',10,'8','','',''),
(300,'Images/1393659716.jpg','SCL12','','','2014-03-01 07:41:56',10,'8','','',''),
(301,'Images/1393659744.jpg','SML13','','','2014-03-01 07:42:24',10,'8','','',''),
(429,'Images/1416379891.jpg','YNG006','','','2014-11-19 06:51:32',22,'24','','',''),
(430,'Images/1416380619.jpg','YNG007','','','2014-11-19 07:03:39',22,'24','','',''),
(243,'Images/1385809129.jpg','','','','2013-11-30 10:58:49',18,'22','','',''),
(428,'Images/1413185120.jpg','SSL34','','','2014-10-13 07:25:20',10,'8','','',''),
(321,'Images/1393832782.jpg','SSL28BROWN','','','2014-03-03 07:46:22',10,'8','','',''),
(323,'Images/1393833045.jpg','SSL33GREEN','','','2014-03-03 07:50:46',10,'8','','',''),
(322,'Images/1393832921.jpg','SSL29COLOUR','','','2014-03-03 07:48:42',10,'8','','',''),
(318,'Images/1393832451.jpg','SSL26BROWN','','','2014-03-03 07:40:51',10,'8','','',''),
(319,'Images/1393832516.jpg','SSL27BLUE','','','2014-03-03 07:41:56',10,'8','','',''),
(316,'Images/1393832366.jpg','SSL25VELVET','','','2014-03-03 07:39:26',10,'8','','',''),
(95,'Images/1360301953.jpg','01',' DRESSES',' DRESSES 01','2013-02-08 05:39:13',12,'','','',''),
(96,'Images/1360302025.jpg','02',' DRESSES',' DRESSES 02','2013-02-08 05:40:25',12,'','','',''),
(97,'Images/1360302814.jpg','03',' DRESSES',' DRESSES 03','2013-02-08 05:53:34',12,'','','',''),
(98,'Images/1360302840.jpg','04',' DRESSES',' DRESSES 04','2013-02-08 05:54:00',12,'','','',''),
(99,'Images/1360302866.jpg','05',' DRESSES',' DRESSES 05','2013-02-08 05:54:26',12,'','','',''),
(100,'Images/1360302888.jpg','06',' DRESSES',' DRESSES 06','2013-02-08 05:54:48',12,'','','',''),
(101,'Images/1360302909.jpg','07',' DRESSES',' DRESSES 07','2013-02-08 05:55:09',12,'','','',''),
(102,'Images/1360302936.jpg','08',' DRESSES',' DRESSES 08','2013-02-08 05:55:36',12,'','','',''),
(103,'Images/1360302959.jpg','09',' DRESSES',' DRESSES 09','2013-02-08 05:55:59',12,'','','',''),
(104,'Images/1360302979.jpg','10',' DRESSES',' DRESSES 10','2013-02-08 05:56:19',12,'','','',''),
(105,'Images/1360314069.jpg','01','DRESSES','DRESSES 01','2013-02-08 09:01:09',13,'13','','',''),
(362,'Images/1394795914.jpg','SSL35','','','2014-03-14 11:18:36',19,'23','','',''),
(107,'Images/1360314245.jpg','03','DRESSES','DRESSES 03','2013-02-08 09:04:05',10,'7','','',''),
(108,'Images/1360314282.jpg','04','DRESSES','DRESSES 04','2013-02-08 09:04:42',14,'15','','',''),
(109,'Images/1360314310.jpg','05','DRESSES','DRESSES 05','2013-02-08 09:05:10',13,'13','','',''),
(110,'Images/1360314340.jpg','06','DRESSES','DRESSES 06','2013-02-08 09:05:40',10,'7','','',''),
(111,'Images/1360314364.jpg','07','DRESSES','DRESSES 07','2013-02-08 09:06:04',13,'13','','',''),
(112,'Images/1360314386.jpg','08','DRESSES','DRESSES 08','2013-02-08 09:06:26',13,'13','','',''),
(113,'Images/1360314411.jpg','09','DRESSES','DRESSES 09','2013-02-08 09:06:51',13,'13','','',''),
(114,'Images/1360314452.jpg','10','DRESSES','DRESSES 10','2013-02-08 09:07:32',13,'13','','',''),
(115,'Images/1361528909.jpg','17','KURTIS','KURTIS 17','2013-02-22 10:28:29',8,'5','','',''),
(116,'Images/1361528943.jpg','18','KURTIS','KURTIS 18','2013-02-22 10:29:03',8,'5','','',''),
(118,'Images/1361529104.jpg','19','KURTIS ','KURTIS 19','2013-02-22 10:31:44',8,'5','','',''),
(119,'Images/1361529144.jpg','10','KURTIS','KURTIS SK 10','2013-02-22 10:32:24',8,'4','','',''),
(120,'Images/1361529241.jpg','11','KURTIS','KURTIS SK-11','2013-02-22 10:34:01',8,'4','','',''),
(121,'Images/1361529300.jpg','14','KURTIS','KURTIS SK 14','2013-02-22 10:35:00',8,'4','','',''),
(122,'Images/1361529333.jpg','15','KURTIS','KURTIS SK 15','2013-02-22 10:35:33',8,'4','','',''),
(123,'Images/1361529401.jpg','SK 18','KURTIS','KURTIS SK 18','2013-02-22 10:36:41',8,'4','','',''),
(124,'Images/1361529453.jpg','24','KURTIS ','KURTIS SK 24','2013-02-22 10:37:33',8,'4','','',''),
(125,'Images/1361529498.jpg','SK 26','KURTIS','KURTIS SK 26','2013-02-22 10:38:18',8,'4','','',''),
(126,'Images/1361529550.jpg','SK 31','KURTIS ','KURTIS 31','2013-02-22 10:39:10',8,'4','','',''),
(127,'Images/1361529588.jpg','32','KURTIS ','KURTIS 32','2013-02-22 10:39:48',8,'4','','',''),
(128,'Images/1361539090.jpg','SK-33','KURTIS','KURTI 33','2013-02-22 13:18:10',8,'4','','',''),
(129,'Images/1361539122.jpg','34','KURTI ','KURTI 34','2013-02-22 13:18:42',8,'4','','',''),
(130,'Images/1361539151.jpg','35','KURTI ','KURTI 35','2013-02-22 13:19:11',8,'4','','',''),
(131,'Images/1361539177.jpg','36','KURTI ','KURTI  36','2013-02-22 13:19:37',8,'4','','',''),
(132,'Images/1361539208.jpg','40','KURTI ','KURTI 40','2013-02-22 13:20:09',8,'4','','',''),
(133,'Images/1361539236.jpg','42','KURTI ','KURTI  42','2013-02-22 13:20:36',8,'4','','',''),
(134,'Images/1361539272.jpg','43','KURTI  ','KURTI 43','2013-02-22 13:21:12',8,'4','','',''),
(135,'Images/1361539314.jpg','44','KURTI ','KURTI 44','2013-02-22 13:21:54',8,'4','','',''),
(136,'Images/1361539347.jpg','45','KURTI ','KURTI 45','2013-02-22 13:22:27',8,'4','','',''),
(137,'Images/1361612989.jpg','11','DRESSES','DRESSES 11','2013-02-23 09:49:50',8,'4','','',''),
(138,'Images/1361613597.jpg','01','ANARKALI','ANARKALI 01','2013-02-23 09:59:57',14,'14','','','JU12'),
(139,'Images/1361613634.jpg','02','ANARKALI','ANARKALI 02','2013-02-23 10:00:34',14,'15','','',''),
(140,'Images/1361613669.jpg','03','ANARKALI','ANARKALI 03','2013-02-23 10:01:09',14,'15','','',''),
(141,'Images/1361613807.jpg','01','OLD TO NEW','OLD TO NEW 01','2013-02-23 10:03:27',15,'16','','',''),
(142,'Images/1361613835.jpg','02','OLD TO NEW','OLD TO NEW 02','2013-02-23 10:03:55',15,'16','','',''),
(143,'Images/1361613867.jpg','03','OLD TO NEW','OLD TO NEW 03','2013-02-23 10:04:27',15,'16','','',''),
(144,'Images/1361613894.jpg','04','OLD TO NEW','OLD TO NEW 04','2013-02-23 10:04:54',15,'16','','',''),
(145,'Images/1361613929.jpg','05','OLD TO NEW','OLD TO NEW 05','2013-02-23 10:05:29',15,'16','','',''),
(146,'Images/1361613961.jpg','06','OLD TO NEW','OLD TO NEW 06','2013-02-23 10:06:01',15,'16','','',''),
(147,'Images/1361614008.jpg','07','OLD TO NEW','OLD TO NEW 07','2013-02-23 10:06:48',15,'16','','',''),
(148,'Images/1361614036.jpg','08','OLD TO NEW','OLD TO NEW 08','2013-02-23 10:07:16',15,'16','','',''),
(149,'Images/1361614074.jpg','09','OLD TO NEW','OLD TO NEW 09','2013-02-23 10:07:54',15,'16','','',''),
(150,'Images/1361614828.jpg','10','OLD TO NEW','OLD TO NEW 10','2013-02-23 10:20:28',15,'16','','',''),
(151,'Images/1385206790.jpg','25',' BLOUSES',' BLOUSES 25','2013-02-25 05:14:39',5,'3','','',''),
(152,'Images/1361769353.jpg','26',' BLOUSES',' BLOUSES 26....','2013-02-25 05:15:53',5,'2','','',''),
(153,'Images/1385206734.jpg','27',' BLOUSES',' BLOUSES 27','2013-02-25 05:16:36',5,'3','','',''),
(154,'Images/1385207925.jpg','28',' BLOUSES',' BLOUSES 28','2013-02-25 05:18:44',5,'3','','',''),
(155,'Images/1361769722.jpg','20','DRESSES','DRESSES 20','2013-02-25 05:22:02',8,'4','','',''),
(157,'Images/1361770044.jpg','04','SAREES','SAREES 04','2013-02-25 05:27:25',11,'10','','',''),
(158,'Images/1362208880.jpg','21','KURTIS','KURTIS 21','2013-03-02 07:21:20',14,'15','','',''),
(159,'Images/1362209524.jpg','22','KURTIS','kurtis 22','2013-03-02 07:32:04',8,'5','','',''),
(468,'Images/1418209088.jpg','YNL010','','','2014-12-10 10:58:09',20,'25','','',''),
(161,'Images/1385208779.jpg','29','29','BOLUSE','2013-06-13 05:14:31',5,'3','','',''),
(162,'Images/1385208861.jpg','30','30','BOLUSE','2013-06-13 05:16:05',5,'3','','',''),
(163,'Images/1385208932.jpg','31','31','BOLUSE','2013-06-13 05:16:37',5,'3','','',''),
(164,'Images/1385208992.jpg','32','32','BOLUSE','2013-06-13 05:17:17',5,'3','','',''),
(165,'Images/1385209085.jpg','33','33','BOLUSE','2013-06-13 05:17:57',5,'3','','',''),
(315,'Images/1393832289.jpg','SSL23WHITE','','','2014-03-03 07:38:09',10,'8','','',''),
(314,'Images/1393832186.jpg','SSL22LEMON','','','2014-03-03 07:36:26',10,'8','','',''),
(313,'Images/1393831015.jpg','SSL7','','','2014-03-03 07:16:55',10,'8','','',''),
(312,'Images/1393830966.jpg','SSL6','','','2014-03-03 07:16:07',10,'8','','',''),
(311,'Images/1393830937.jpg','SSL5','','','2014-03-03 07:15:37',10,'8','','',''),
(310,'Images/1393830895.jpg','SSL4','','','2014-03-03 07:14:55',10,'8','','',''),
(309,'Images/1393830843.jpg','SSL3','','','2014-03-03 07:14:03',10,'8','','',''),
(303,'Images/1393659835.jpg','SML17PANE','','','2014-03-01 07:43:55',10,'8','','',''),
(174,'Images/1371733271.jpg','37','37','37','2013-06-20 13:01:11',10,'7','','',''),
(307,'Images/1393660101.jpg','SSL41','','','2014-03-01 07:48:21',10,'8','','',''),
(349,'Images/1394516927.jpg','SS14','','','2014-03-11 05:48:49',11,'11','','',''),
(415,'Images/1413178953.jpg','SS1','','','2014-10-13 05:42:33',11,'11','','',''),
(179,'Images/1371733589.jpg','07','07','07','2013-06-20 13:06:29',11,'11','','',''),
(180,'Images/1371733621.jpg','08','08','08','2013-06-20 13:07:01',11,'11','','',''),
(181,'Images/1371733650.jpg','09','09','09','2013-06-20 13:07:30',11,'11','','',''),
(182,'Images/1371733680.jpg','10','10','10','2013-06-20 13:08:00',11,'11','','',''),
(305,'Images/1393659906.jpg','SSL8','','','2014-03-01 07:45:06',10,'8','','',''),
(187,'Images/1372662893.jpg','12','12','12','2013-07-01 07:14:53',13,'13','','',''),
(188,'Images/1372662923.jpg','13','13','13','2013-07-01 07:15:23',13,'13','','',''),
(189,'Images/1372663223.jpg','04','04','04','2013-07-01 07:20:23',14,'14','','',''),
(190,'Images/1372663269.jpg','05','05','05','2013-07-01 07:21:09',14,'14','','',''),
(191,'Images/1372663293.jpg','06','06','06','2013-07-01 07:21:33',14,'14','','',''),
(192,'Images/1372663321.jpg','07','07','07','2013-07-01 07:22:01',15,'16','','',''),
(193,'Images/1372663374.jpg','08','08','08','2013-07-01 07:22:54',15,'16','','',''),
(194,'Images/1372663402.jpg','09','09','09','2013-07-01 07:23:22',14,'14','','',''),
(195,'Images/1372663423.jpg','10','10','10','2013-07-01 07:23:43',14,'14','','',''),
(196,'Images/1372663451.jpg','11','11','11','2013-07-01 07:24:11',14,'14','','',''),
(197,'Images/1372663470.jpg','12','12','12','2013-07-01 07:24:30',14,'','','',''),
(198,'Images/1372663522.jpg','13','13','13','2013-07-01 07:25:22',14,'','','',''),
(199,'Images/1372663553.jpg','14','14','14','2013-07-01 07:25:53',14,'','','',''),
(200,'Images/1372663578.jpg','15','15','15','2013-07-01 07:26:18',14,'15','','',''),
(201,'Images/1372663608.jpg','16','16','16','2013-07-01 07:26:48',14,'15','','',''),
(304,'Images/1393659865.jpg','SML21MIRR','','','2014-03-01 07:44:25',10,'8','','',''),
(219,'Images/1381296126.jpg','17','17','17','2013-10-09 05:22:06',11,'10','','',''),
(209,'Images/1381294759.jpg','35','35','35','2013-10-09 04:59:19',5,'2','','',''),
(208,'Images/1381294730.jpg','34','34','34','2013-10-09 04:58:50',5,'2','','',''),
(233,'Images/1382617950.jpg','9762','9762','Bridal Dupattas','2013-10-24 12:32:31',0,'19','','',''),
(232,'Images/1382617824.jpg','9753','9753','Bridal Dupattas','2013-10-24 12:30:24',0,'19','','',''),
(231,'Images/1382617685.jpg','9401','9401','Bridal Dupattas','2013-10-24 12:28:05',0,'19','','',''),
(230,'Images/1382617317.jpg','9367','9367','Bridal Dupattas','2013-10-24 12:21:57',0,'19','','',''),
(229,'Images/1382617143.jpg','9227','9227','Bridal Dupattas','2013-10-24 12:19:03',0,'19','','',''),
(221,'Images/1381296175.jpg','19','19','19','2013-10-09 05:22:55',11,'10','','',''),
(211,'Images/1381294845.jpg','36','36','36','2013-10-09 05:00:45',5,'2','','',''),
(220,'Images/1381296151.jpg','18','18','18','2013-10-09 05:22:31',11,'10','','',''),
(218,'Images/1381296030.jpg','16','16','16','2013-10-09 05:20:30',11,'10','','',''),
(227,'Images/1382615911.jpg','9227','9227','9227','2013-10-24 11:56:35',17,'19','','',''),
(222,'Images/1381296206.jpg','20','20','20','2013-10-09 05:23:26',11,'10','','',''),
(217,'Images/1381295835.jpg','15','15','15','2013-10-09 05:17:15',11,'10','','',''),
(216,'Images/1381295792.jpg','03','03','03','2013-10-09 05:16:32',11,'10','','',''),
(215,'Images/1381294976.jpg','40','40','40','2013-10-09 05:02:56',5,'2','','',''),
(214,'Images/1381294944.jpg','39','39','39','2013-10-09 05:02:24',5,'2','','',''),
(213,'Images/1381294913.jpg','38','38','38','2013-10-09 05:01:53',5,'2','','',''),
(212,'Images/1381294881.jpg','37','37','37','2013-10-09 05:01:21',5,'2','','',''),
(283,'Images/1391759773.jpg','07','','','2014-02-07 07:56:13',13,'13','','',''),
(234,'Images/1382683698.jpg','7631','BRIDAL DUPATTAS','','2013-10-25 06:48:18',17,'19','','',''),
(235,'Images/1382683828.jpg','9231','BRIDAL DUPATTAS','','2013-10-25 06:50:28',17,'19','','',''),
(236,'Images/1382683964.jpg','9367','BRIDAL DUPATTAS','','2013-10-25 06:52:44',17,'19','','',''),
(237,'Images/1382684042.jpg','9401','BRIDAL DUPATTAS','','2013-10-25 06:54:02',17,'19','','',''),
(238,'Images/1382684120.jpg','9753','BRIDAL DUPATTAS','','2013-10-25 06:55:21',17,'19','','',''),
(239,'Images/1382684247.jpg','9762','BRIDAL DUPATTAS','','2013-10-25 06:57:27',17,'19','','',''),
(244,'Images/1391056723.jpg','','','','2014-01-30 04:38:43',5,'3','','',''),
(245,'Images/1391056767.jpg','','','','2014-01-30 04:39:27',5,'3','','',''),
(247,'Images/1391060939.jpg','','','','2014-01-30 05:48:59',5,'3','','',''),
(248,'Images/1391060975.jpg','','','','2014-01-30 05:49:35',5,'3','','',''),
(249,'Images/1391061076.jpg','','','','2014-01-30 05:51:16',5,'3','','',''),
(250,'Images/1391061146.jpg','','','','2014-01-30 05:52:26',5,'3','','',''),
(251,'Images/1391061226.jpg','','','','2014-01-30 05:53:46',5,'3','','',''),
(252,'Images/1391061280.jpg','','','','2014-01-30 05:54:40',5,'3','','',''),
(253,'Images/1391061333.jpg','','','','2014-01-30 05:55:33',5,'3','','',''),
(254,'Images/1391061470.jpg','','','','2014-01-30 05:57:50',5,'3','','',''),
(255,'Images/1391061520.jpg','','','','2014-01-30 05:58:40',5,'3','','',''),
(256,'Images/1391067402.jpg','','','','2014-01-30 07:36:42',5,'3','','',''),
(257,'Images/1391067458.jpg','','','','2014-01-30 07:37:38',5,'3','','',''),
(258,'Images/1391750506.jpg','47','','','2014-02-07 05:21:46',5,'3','','',''),
(259,'Images/1391750547.jpg','','','','2014-02-07 05:22:27',5,'3','','',''),
(260,'Images/1391750604.jpg','','','','2014-02-07 05:23:24',5,'3','','',''),
(261,'Images/1391750665.jpg','50','','','2014-02-07 05:24:25',5,'3','','',''),
(262,'Images/1391750708.jpg','51','','','2014-02-07 05:25:08',5,'3','','',''),
(263,'Images/1391750750.jpg','52','','','2014-02-07 05:25:50',5,'3','','',''),
(264,'Images/1391750803.jpg','53','','','2014-02-07 05:26:43',5,'3','','',''),
(265,'Images/1391750846.jpg','54','','','2014-02-07 05:27:26',5,'3','','',''),
(271,'Images/1391752233.jpg','02','','','2014-02-07 05:50:33',10,'7','','',''),
(272,'Images/1391752264.jpg','41','','','2014-02-07 05:51:04',10,'7','','',''),
(274,'Images/1391755767.jpg','07','','','2014-02-07 06:49:27',13,'13','','',''),
(275,'Images/1391758657.jpg','12','','','2014-02-07 07:37:37',14,'14','','',''),
(276,'Images/1391758693.jpg','13','','','2014-02-07 07:38:13',14,'14','','',''),
(277,'Images/1391758725.jpg','14','','','2014-02-07 07:38:45',14,'14','','',''),
(278,'Images/1391758785.jpg','15','','','2014-02-07 07:39:45',14,'14','','',''),
(279,'Images/1391758821.jpg','16','','','2014-02-07 07:40:21',14,'14','','',''),
(281,'Images/1391758903.jpg','17','','','2014-02-07 07:41:43',14,'14','','',''),
(282,'Images/1391758925.jpg','18','','','2014-02-07 07:42:05',14,'14','','',''),
(284,'Images/1391759863.jpg','08','','','2014-02-07 07:57:43',13,'13','','',''),
(285,'Images/1391759888.jpg','09','','','2014-02-07 07:58:08',13,'13','','',''),
(286,'Images/1391759932.jpg','10','','','2014-02-07 07:58:52',13,'13','','',''),
(287,'Images/1391769462.jpg','17','','','2014-02-07 10:37:43',14,'15','','',''),
(288,'Images/1391769551.jpg','18','','','2014-02-07 10:39:11',14,'15','','',''),
(416,'Images/1413179001.jpg','SS9','','','2014-10-13 05:43:21',11,'11','','',''),
(389,'Images/1396857626.jpg','SD121','','','2014-04-07 08:00:27',17,'19','','',''),
(361,'Images/1394542102.jpg','SSL51','','','2014-03-11 12:48:24',19,'23','','',''),
(359,'Images/1394541721.jpg','SSL48','','','2014-03-11 12:42:04',19,'23','','',''),
(360,'Images/1394541843.jpg','SSL49','','','2014-03-11 12:44:05',19,'23','','',''),
(388,'Images/1396857580.jpg','SD120','','','2014-04-07 07:59:41',17,'19','','',''),
(358,'Images/1394541529.jpg','SSL47','','','2014-03-11 12:38:52',19,'23','','',''),
(354,'Images/1394540468.jpg','SSL41','','','2014-03-11 12:21:10',19,'23','','',''),
(355,'Images/1394540591.jpg','SSL42','','','2014-03-11 12:23:13',19,'23','','',''),
(352,'Images/1394536129.jpg','SSL38','','','2014-03-11 11:08:51',19,'23','','',''),
(353,'Images/1394540314.jpg','SSL40','','','2014-03-11 12:18:37',19,'23','','',''),
(356,'Images/1394540692.jpg','SSL43','','','2014-03-11 12:24:54',19,'23','','',''),
(357,'Images/1394540788.jpg','SSL45','','','2014-03-11 12:26:30',19,'23','','',''),
(387,'Images/1396857549.jpg','SD119','','','2014-04-07 07:59:10',17,'19','','',''),
(386,'Images/1396857523.jpg','SD118','','','2014-04-07 07:58:44',17,'19','','',''),
(385,'Images/1396857408.jpg','SD117','','','2014-04-07 07:56:48',17,'19','','',''),
(384,'Images/1396857371.jpg','SD116','','','2014-04-07 07:56:12',17,'19','','',''),
(383,'Images/1396857339.jpg','SD115','','','2014-04-07 07:55:40',17,'19','','',''),
(408,'Images/1400579883.jpg','SD124','','','2014-05-20 09:58:03',17,'19','','',''),
(381,'Images/1396857201.jpg','SD113','','','2014-04-07 07:53:22',17,'19','','',''),
(380,'Images/1396857171.jpg','SD110','','','2014-04-07 07:52:51',17,'19','','',''),
(395,'Images/1400502331.jpg','SD102','','','2014-05-19 12:25:32',17,'19','','',''),
(396,'Images/1400502366.jpg','SD103','','','2014-05-19 12:26:07',17,'19','','',''),
(397,'Images/1400502396.jpg','SD104','','','2014-05-19 12:26:37',17,'19','','',''),
(398,'Images/1400502429.jpg','SD106','','','2014-05-19 12:27:10',17,'19','','',''),
(399,'Images/1400502465.jpg','SD107','','','2014-05-19 12:27:46',17,'19','','',''),
(401,'Images/1400502585.jpg','SD108','','','2014-05-19 12:29:45',17,'19','','',''),
(409,'Images/1400579933.jpg','SD130','','','2014-05-20 09:58:53',17,'19','','',''),
(403,'Images/1400502776.jpg','SD131','','','2014-05-19 12:32:57',17,'19','','',''),
(410,'Images/1400580034.jpg','SD114','','','2014-05-20 10:00:35',17,'19','','',''),
(411,'Images/1400582370.jpg','SD128','','','2014-05-20 10:39:30',17,'19','','',''),
(413,'Images/1400584438.jpg','SD129','','','2014-05-20 11:13:59',17,'19','','',''),
(423,'Images/1413183545.jpg','SSL45','','','2014-10-13 06:59:07',10,'8','','',''),
(424,'Images/1413183643.jpg','SSL47','','','2014-10-13 07:00:47',10,'8','','',''),
(425,'Images/1413183857.jpg','SSL48','','','2014-10-13 07:04:19',10,'8','','',''),
(426,'Images/1413184015.jpg','SSL49','','','2014-10-13 07:06:58',10,'8','','',''),
(427,'Images/1413184298.jpg','SSL51','','','2014-10-13 07:11:40',10,'8','','',''),
(431,'Images/1416380648.jpg','YNG008','','','2014-11-19 07:04:09',22,'24','','',''),
(432,'Images/1416380686.jpg','YNG010','','','2014-11-19 07:04:47',22,'24','','',''),
(433,'Images/1416380785.jpg','YNG011','','','2014-11-19 07:06:26',22,'24','','',''),
(434,'Images/1416380820.jpg','YNG012','','','2014-11-19 07:07:00',22,'24','','',''),
(435,'Images/1416380845.jpg','YNG013','','','2014-11-19 07:07:26',22,'24','','',''),
(436,'Images/1416380880.jpg','YNG014','','','2014-11-19 07:08:01',22,'24','','',''),
(437,'Images/1417174824.jpg','55','','','2014-11-28 11:40:24',5,'3','','',''),
(439,'Images/1417174900.jpg','56','','','2014-11-28 11:41:40',5,'3','','',''),
(440,'Images/1417174941.jpg','57','','','2014-11-28 11:42:21',5,'3','','',''),
(441,'Images/1417175007.jpg','58','','','2014-11-28 11:43:27',5,'3','','',''),
(442,'Images/1418110724.jpg','59','','','2014-11-28 11:44:09',5,'3','','',''),
(443,'Images/1417175115.jpg','60','','','2014-11-28 11:45:15',5,'3','','',''),
(444,'Images/1417175167.jpg','61','','','2014-11-28 11:46:08',5,'3','','',''),
(445,'Images/1417175233.jpg','62','','','2014-11-28 11:47:14',5,'3','','',''),
(446,'Images/1417175292.jpg','63','','','2014-11-28 11:48:13',5,'3','','',''),
(447,'Images/1417687018.jpg','64','','','2014-12-04 09:56:58',5,'3','','',''),
(448,'Images/1417687155.jpg','65','','','2014-12-04 09:59:16',5,'3','','',''),
(449,'Images/1417687270.jpg','66','','','2014-12-04 10:01:11',5,'3','','',''),
(450,'Images/1417688559.jpg','67','','','2014-12-04 10:22:39',5,'3','','',''),
(451,'Images/1417688694.jpg','68','','','2014-12-04 10:24:55',5,'3','','',''),
(452,'Images/1417688779.jpg','69','','','2014-12-04 10:26:20',5,'3','','',''),
(453,'Images/1417688877.jpg','70','','','2014-12-04 10:27:59',5,'3','','',''),
(455,'Images/1418197402.jpg','YNL009','','','2014-12-10 07:43:23',20,'25','','',''),
(456,'Images/1418197502.jpg','YNL001','','','2014-12-10 07:45:02',20,'25','','',''),
(457,'Images/1418198413.jpg','YNL002','','','2014-12-10 08:00:14',20,'25','','',''),
(458,'Images/1418198471.jpg','YNL004','','','2014-12-10 08:01:11',20,'25','','',''),
(459,'Images/1418198514.jpg','YNL005','','','2014-12-10 08:01:54',20,'25','','',''),
(460,'Images/1418198572.jpg','YNL006','','','2014-12-10 08:02:53',20,'25','','',''),
(461,'Images/1418198614.jpg','YNL007','','','2014-12-10 08:03:35',20,'25','','',''),
(462,'Images/1418198665.jpg','YNL008','','','2014-12-10 08:04:26',20,'25','','',''),
(464,'Images/1418204334.jpg','YNL011','','','2014-12-10 09:38:55',20,'25','','',''),
(465,'Images/1418204892.jpg','YNL012','','','2014-12-10 09:48:12',20,'25','','',''),
(466,'Images/1418205014.jpg','YNL014','','','2014-12-10 09:50:14',20,'25','','',''),
(467,'Images/1418208020.jpg','YNL013','','','2014-12-10 10:40:21',20,'25','','',''),
(469,'Images/1418215446.jpg','YNL009','','','2014-12-10 12:44:07',10,'8','','',''),
(470,'Images/1418215498.jpg','YNL010','','','2014-12-10 12:44:59',10,'8','','',''),
(471,'Images/1418289215.jpg','YNL001','','','2014-12-11 09:13:35',10,'8','','',''),
(472,'Images/1418289265.jpg','YNL002','','','2014-12-11 09:14:26',10,'8','','',''),
(473,'Images/1418289305.jpg','YNL004','','','2014-12-11 09:15:05',10,'8','','',''),
(474,'Images/1418289349.jpg','YNL005','','','2014-12-11 09:15:49',10,'8','','',''),
(475,'Images/1418289394.jpg','YNL006','','','2014-12-11 09:16:34',10,'8','','',''),
(476,'Images/1418289449.jpg','YNL007','','','2014-12-11 09:17:29',10,'8','','',''),
(477,'Images/1418289491.jpg','YNL008','','','2014-12-11 09:18:12',10,'8','','',''),
(478,'Images/1418289699.jpg','YNL011','','','2014-12-11 09:21:40',10,'8','','',''),
(479,'Images/1418289768.jpg','YNL012','','','2014-12-11 09:22:49',10,'8','','',''),
(480,'Images/1418289841.jpg','YNL013','','','2014-12-11 09:24:01',10,'8','','',''),
(481,'Images/1418289884.jpg','YNL014','','','2014-12-11 09:24:44',10,'8','','','');
/*!40000 ALTER TABLE `garment_product_old` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:15:34
