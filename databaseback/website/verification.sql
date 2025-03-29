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
-- Table structure for table `verification`
--

DROP TABLE IF EXISTS `verification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `verification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `code` varchar(20) NOT NULL,
  `reg_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verification`
--

LOCK TABLES `verification` WRITE;
/*!40000 ALTER TABLE `verification` DISABLE KEYS */;
INSERT INTO `verification` VALUES
(5,'rahull.1612@gmail.com','16xv7j8',4155),
(6,'keww1223@gmail.com','rtqqzxy',4329),
(7,'d@gmail.com','evkjw4f',4402),
(9,'ab@gmail.com','3qe6nh3',4405),
(10,'satyendra1111@gmail.com','zi2haap',0),
(11,'abr@gmail.com','b5j929j',4575),
(12,'ab@gm.c','1pbevx1',0),
(14,'charmishah526@gmail.com','fgzop5z',4724),
(15,'aksmi4@gmail.com','tuoct2y',4918),
(16,'priyav2004@gmail.com','ib43it4',5001),
(21,'kvaljani@gmail.com','wejkw68',5095),
(22,'ab@gmaol.cm','1zxxy7c',5166),
(23,'yosshita.neha@gmail.com','i182zta',5180),
(24,'radha.v94@gmail.com','9khwfkz',5201),
(25,'ankitajaiswal8927@gmail.com','3aa782t',5781),
(26,'Suvadra.khuntia@gmail.com','dq69ez1',5985),
(27,'poojasuman27oct@gmail.com','6pzb8xt',9872),
(28,'sm6141@gmail.com','0dje208',9961),
(29,'kpcmr030@gmail.com','3zvlqri',10419),
(30,'ankitanegi12sep@gmail.com','3xk7l2z',12965),
(31,'puja.sidh@gmail.com','6vfussj',13669),
(32,'madhuri.mavilla@gmail.com','oxfnv96',14404),
(33,'punit.bhuwania@gmail.com','rof0e8o',15213),
(34,'jrclapes@protonmail.ch','g7yvpme',15592),
(35,'allamrajusunaina@gmail.com','0gh4txm',16005),
(36,'bhagatritu1@gmail.com','moko8qf',16359),
(37,'anu.raadhu@gmail.com','nc111af',16568),
(38,'kalyani1520@gmail.com','sdwj10x',18636),
(39,'rahuldp.79@gmail.com','p3ogz1v',20039),
(42,'aniruddhvishwa@gmail.com','ovdzc34',20094),
(43,'rahulsbdit2019@gmail.com','63pq0q3',20103),
(44,'satyendra1111@rediffmail.com','whgi8tj',20117),
(46,'tejals676@gmail.com','i7pyx89',20202),
(47,'yosshita.neha@gmai.com','1v6jdrc',20210),
(48,'lanwan151@gmai.com','8e7k2wi',20241),
(49,'ruchi@example.com','7lqsvw4',20279),
(50,'akruti.manjrekar96@gmail.com','1m07xly',20314),
(51,'yadavishalyadav629@gmail.com','k01tfp6',20631),
(52,'Vikas786@gmail.com','gkkpevm',20650),
(53,'mehulmaru1442000@gmail.com','ug6ywqg',21300),
(54,'ypodar@gmail.com','p5nkt4k',21367),
(55,'akhanna1973@mail.com','a8dsrv9',21592),
(56,'akhanna1973@gmail.com','xyd1m1t',21601),
(57,'anglegosar@gmail.com','0il5y8n',41985),
(58,'srushtipawar1404@gmail.com','zj2aepy',44729),
(59,'dipishapawar@gmail.com','brwsgo1',44736),
(60,'poojahdalvi@gmail.com','n7yoy8v',45686),
(61,'khushboovaja91@gmail.com','f59qxrv',53897),
(62,'jyotiparmar730@gmail.com','p8ttela',65739),
(63,'mansi.pimple1994@gmail.com','265vvhz',69017),
(64,'vishwaaniruddh@gmail.com','i4y0kxt',69103),
(65,'anjujaiswal315@gmail.com','nz02qtv',69305),
(66,'','',77666),
(67,'','',77668),
(68,'','',77668),
(69,'','',77668);
/*!40000 ALTER TABLE `verification` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:16:30
