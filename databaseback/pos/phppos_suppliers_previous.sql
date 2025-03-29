/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.10-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u464193275_srishringarr
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
-- Table structure for table `phppos_suppliers_previous`
--

DROP TABLE IF EXISTS `phppos_suppliers_previous`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phppos_suppliers_previous` (
  `person_id` int(10) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  UNIQUE KEY `account_number` (`account_number`),
  KEY `person_id` (`person_id`),
  CONSTRAINT `phppos_suppliers_previous_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `phppos_people` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phppos_suppliers_previous`
--

LOCK TABLES `phppos_suppliers_previous` WRITE;
/*!40000 ALTER TABLE `phppos_suppliers_previous` DISABLE KEYS */;
INSERT INTO `phppos_suppliers_previous` VALUES
(1,'Prakesh Bhai','PB'),
(2,'Sia','S'),
(3,'Bhavin Bhai','BH'),
(4,'Lalitji',NULL),
(5,'sachin',NULL),
(6,'Saachi','SA'),
(7,'Prakesh','PR'),
(8,'Omji',NULL),
(9,'Jitu ','JI'),
(10,'Ijmima','I'),
(11,'Babita','BA'),
(12,'Yogesh',NULL),
(13,'Ijmima mall','IJ'),
(14,'Bablu','BL'),
(15,'jayant bhai',NULL),
(16,'Varidrabhai',NULL),
(17,'Sarainbhai',NULL),
(18,'Malad',NULL),
(25,'Art India',NULL),
(29,'Kanta','K'),
(34,'Sagar','sg'),
(48,'N','NB'),
(60,'Vanita','va'),
(86,'Tulsi Lace','TL'),
(87,'Faakkhir Stores','FS'),
(88,'Pooja','pj'),
(90,'F Studio Fashion Pvt Ltd','FSF'),
(102,'Kalpana','KS'),
(103,'Sri Shringarr','SS'),
(104,'Roop Darshan','RD'),
(105,'Aunty Surat','AS'),
(106,'Bharti Aunty','BHA'),
(107,'Calcutta','CC'),
(108,'Bhumika Creation','BC'),
(113,'SILVER PLAZA','SP'),
(147,'Sheh-Milan','SM'),
(148,'K.P. Arcade','KP'),
(325,'S','SI'),
(331,'ASHA BHATT','AB'),
(336,'Pavan','PV'),
(353,'SACHIN','SSU'),
(372,'Rahul & Praful','RP'),
(378,'KAARYA ETHNIC COLTHING ','HAR'),
(415,'Ganpat Bahi','GB'),
(539,'Shreeji Creation','SCS'),
(546,'MAHENDRA SWITCHES','M'),
(549,'GHUNGHAT','GS'),
(562,'RAHUL','R'),
(576,'KOLLAM SUPREME','KB'),
(579,'SATAYAM','ST'),
(609,'Mahesh Thakkar','MT'),
(689,'sar microsystems',NULL),
(695,'Aslam Bhai','AD'),
(696,'MINTU','MI'),
(726,'K PRAFUL','KPM'),
(770,'RAVI GALA ','RG'),
(807,'PRAFUL & BHAVIN','B & P'),
(950,'pramod bhai','po'),
(957,'MANUFACTUR','MA'),
(958,'ANISH','AN'),
(959,'kev',NULL),
(961,'CHHOGRAM BHAI','CH'),
(964,'Tulishi MADAM','TU'),
(971,'Resale','RR'),
(974,'Yosshia & Neha','YN'),
(1039,'D.C','DC'),
(1153,'SANDEEP BHAI','SB'),
(1316,'Anil','A'),
(1351,'Sangita ','SGT'),
(1429,'NEW SANGEETA','NS'),
(1443,'Pavan surat',NULL),
(1693,'Meet Bindi','MB'),
(2209,'Amit',NULL),
(2235,'Dilip Enterprises',NULL),
(2331,'Nilesh Bill','ni'),
(2336,'Parag Gandhi','pg'),
(2485,'Online ','ON'),
(2528,'DEEPAK ','DE'),
(2533,'Jyoti',NULL),
(2783,'Lucky','LKY'),
(3085,'Ronak','ak'),
(3086,'Jash',NULL),
(3143,'Pintubhai',NULL),
(3235,'Manisha ','MM'),
(3285,'Wrong Product','WP'),
(3590,'Siyona',NULL),
(3629,'Vijay Bhai',NULL),
(4474,'Shaalini ',NULL),
(4475,'Padmini Naveen',NULL),
(4476,'P.R . Akshaya',NULL),
(4500,'Sujita',NULL),
(4568,'SM Creation',NULL),
(4634,'Annapurna',NULL),
(4696,'Kapoor Designer Exports Pvt Ltd',NULL),
(4697,'Zoom Fabrics Pvt Ltd',NULL),
(4811,'Vaishali Creation Dahisar (E)',NULL),
(6518,'Shubham Jaipur','SH'),
(6525,'Vasansi Jaipur',NULL),
(6590,'Ashak Collection',NULL),
(8461,'Bhama Designs Pvt.Ltd',NULL),
(9290,'Nandini west Goregaon (EAST)',NULL),
(15493,'Nitin Karigar',NULL),
(15494,'Nishar Bhavin karigar',NULL),
(15572,'Mahi Jewellers',NULL),
(15620,'Fashion Queen',NULL),
(15728,'Radha Rani Collection',NULL),
(15749,'Dressing Trendz Pvt Ltd',NULL),
(15916,'Padmavati Jewellers',NULL),
(16045,'Koushik Designers',NULL),
(16059,'Mohammad Karigar',NULL),
(16060,'Arihant Vinay Karigar',NULL),
(16122,'Hoshiyar Singh Suresh Chandra Sarees Pvt Ltd',NULL),
(16134,'Arham Group',NULL),
(16241,'Ravi Gedia',NULL),
(16246,'Sizzle ',NULL),
(16249,'Mukhtar Sarees',NULL),
(16296,'Kaanish Kouture',NULL),
(16444,'Ajita',NULL),
(16445,'Aashna Designs Pvt Ltd',NULL),
(16498,'Shruti Embroidery Pvt Ltd',NULL),
(16499,'Chunri Collections (P) Ltd',NULL),
(16528,'Sthirlakshmi Tradecom Pvt Ltd',NULL),
(16681,'Onaya Fashions Pvt Ltd',NULL),
(17482,'ZEVRAAT','Z'),
(17548,'Studio Dream Collection',NULL),
(17549,'Sapna Design Studio',NULL),
(17649,'Shree Laxmi creations',NULL),
(17755,'Meera Adukia Kalpana',NULL),
(17906,'Haroon  Sayyed Tailor',NULL),
(18023,'Jewel Studio',NULL),
(18065,'Shree Saree Kunj Pvt Ltd',NULL),
(18198,'Park Variety Stores',NULL),
(18199,'Inchh Tape',NULL),
(18224,'Rajat karigar (shri jain)',NULL),
(18310,'Bhavarbhai',NULL),
(18331,'Motilal Co Jewellers',NULL),
(18387,'Sangita Creation',NULL),
(18444,'Tulsi Enterprises',NULL),
(18478,'Shree Saree Kunj Pvt Ltd',NULL),
(69724,'Shree Yamuna Creation',NULL),
(69728,'VrajGopi Creation',NULL),
(69807,'Omkar Fabrics ANX',NULL),
(69816,'Online wrong product return',NULL),
(69890,'Designer Sunil Lulla',NULL),
(80293,'Pink Peacock',NULL),
(132661,'Khushbu Jewellers',NULL),
(45,'Rajanu','8727'),
(143572,'Ambika Jewellers','0000'),
(198327,'Shiva Jewellers','Delhi'),
(198397,'G Square Fashion','Dadar'),
(198399,'Goyam','9892562732'),
(198414,'Sang Creation','5645104458'),
(198415,'Devanshi Creations','920020066679371'),
(198423,'Shree Radha Studio','50200039055416'),
(198443,'H.V Raj Sarees (P) Ltd','Current'),
(198454,'Shubham Fashion House',NULL);
/*!40000 ALTER TABLE `phppos_suppliers_previous` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:12:54
