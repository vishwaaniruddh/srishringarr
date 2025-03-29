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
-- Table structure for table `phppos_suppliers`
--

DROP TABLE IF EXISTS `phppos_suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phppos_suppliers` (
  `person_id` int(10) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`person_id`),
  KEY `person_id` (`person_id`),
  CONSTRAINT `phppos_suppliers_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `phppos_people` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phppos_suppliers`
--

LOCK TABLES `phppos_suppliers` WRITE;
/*!40000 ALTER TABLE `phppos_suppliers` DISABLE KEYS */;
INSERT INTO `phppos_suppliers` VALUES
(1,'Prakesh Bhai','PB'),
(2,'Sia','S'),
(3,'Bhavin Bhai','BH'),
(4,'Lalitji',''),
(5,'sachin',''),
(6,'Saachi','SA'),
(7,'Prakesh','PR'),
(8,'Omji',''),
(9,'Jitu ','JI'),
(10,'Ijmima','I'),
(11,'Babita','BA'),
(12,'Yogesh',''),
(13,'Ijmima mall','IJ'),
(14,'Bablu','BL'),
(15,'jayant bhai',''),
(16,'Varidrabhai',''),
(17,'Sarainbhai',''),
(18,'Malad',''),
(25,'Art India',''),
(29,'Kanta','K'),
(34,'Sagar','sg'),
(45,'Rajanu','8727'),
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
(689,'sar microsystems',''),
(695,'Aslam Bhai','AD'),
(696,'MINTU','MI'),
(726,'K PRAFUL','KPM'),
(770,'RAVI GALA ','RG'),
(807,'PRAFUL & BHAVIN','B & P'),
(950,'pramod bhai','po'),
(957,'MANUFACTUR','MA'),
(958,'ANISH','AN'),
(959,'kev',''),
(961,'CHHOGRAM BHAI','CH'),
(964,'Tulishi MADAM','TU'),
(971,'Resale','RR'),
(974,'Yosshia & Neha','YN'),
(1039,'D.C','DC'),
(1153,'SANDEEP BHAI','SB'),
(1316,'Anil','A'),
(1351,'Sangita ','SGT'),
(1429,'NEW SANGEETA','NS'),
(1443,'Pavan surat',''),
(1693,'Meet Bindi','MB'),
(2209,'Amit',''),
(2235,'Dilip Enterprises',''),
(2331,'Nilesh Bill','ni'),
(2336,'Parag Gandhi','pg'),
(2485,'Online ','ON'),
(2528,'DEEPAK ','DE'),
(2533,'Jyoti',''),
(2783,'Lucky','LKY'),
(3085,'Ronak','ak'),
(3086,'Jash',''),
(3143,'Pintubhai',''),
(3235,'Manisha ','MM'),
(3285,'Wrong Product','WP'),
(3590,'Siyona',''),
(3629,'Vijay Bhai',''),
(4474,'Shaalini ',''),
(4475,'Padmini Naveen',''),
(4476,'P.R . Akshaya',''),
(4500,'Sujita',''),
(4568,'SM Creation',''),
(4634,'Annapurna',''),
(4696,'Kapoor Designer Exports Pvt Ltd',''),
(4697,'Zoom Fabrics Pvt Ltd',''),
(4811,'Vaishali Creation Dahisar (E)',''),
(6518,'Shubham Jaipur','SH'),
(6525,'Vasansi Jaipur',''),
(6590,'Ashak Collection',''),
(8461,'Bhama Designs Pvt.Ltd',''),
(9290,'Nandini west Goregaon (EAST)',''),
(15493,'Nitin Karigar',''),
(15494,'Nishar Bhavin karigar',''),
(15572,'Mahi Jewellers',''),
(15620,'Fashion Queen',''),
(15728,'Radha Rani Collection',''),
(15749,'Dressing Trendz Pvt Ltd',''),
(15916,'Padmavati Jewellers',''),
(16045,'Koushik Designers',''),
(16059,'Mohammad Karigar',''),
(16060,'Arihant Vinay Karigar',''),
(16122,'Hoshiyar Singh Suresh Chandra Sarees Pvt Ltd',''),
(16134,'Arham Group',''),
(16241,'Ravi Gedia',''),
(16246,'Sizzle ',''),
(16249,'Mukhtar Sarees',''),
(16296,'Kaanish Kouture',''),
(16444,'Ajita',''),
(16445,'Aashna Designs Pvt Ltd',''),
(16498,'Shruti Embroidery Pvt Ltd',''),
(16499,'Chunri Collections (P) Ltd',''),
(16528,'Sthirlakshmi Tradecom Pvt Ltd',''),
(16681,'Onaya Fashions Pvt Ltd',''),
(17482,'ZEVRAAT','Z'),
(17548,'Studio Dream Collection',''),
(17549,'Sapna Design Studio',''),
(17649,'Shree Laxmi creations',''),
(17755,'Meera Adukia Kalpana',''),
(17906,'Haroon  Sayyed Tailor',''),
(18023,'Jewel Studio',''),
(18065,'Shree Saree Kunj Pvt Ltd',''),
(18198,'Park Variety Stores',''),
(18199,'Inchh Tape',''),
(18224,'Rajat karigar (shri jain)',''),
(18310,'Bhavarbhai',''),
(18331,'Motilal Co Jewellers','MCJ'),
(18387,'Sangita Creation','SC'),
(18444,'Tulsi Enterprises','TE'),
(18478,'Shree Saree Kunj Pvt Ltd','SSK'),
(69724,'Shree Yamuna Creation','SYC'),
(69728,'VrajGopi Creation','VC'),
(69807,'Omkar Fabrics ANX','OFA'),
(69816,'Online wrong product return','OWPR'),
(69890,'Designer Sunil Lulla','DSL'),
(80293,'Pink Peacock','PP'),
(132661,'Khushbu Jewellers','KJ'),
(143572,'Ambika Jewellers','AJ'),
(198327,'Shiva Jewellers','SJ'),
(198397,'G Square Fashion','GSF'),
(198399,'Goyam','G'),
(198414,'Sang Creation','SC'),
(198415,'Devanshi Creations','DC'),
(198423,'Shree Radha Studio','SRS'),
(198443,'H.V Raj Sarees (P) Ltd','HV'),
(198454,'Shubham Fashion House','SFH'),
(242686,'V.R.Jain Jewellers','V'),
(242687,'Ashapura Bangles','A'),
(242875,'Flyrobe','0'),
(242960,'Aark World Pvt.Ltd','Flyrobe'),
(242962,'Eagle Jewellers','Eagle'),
(242966,'PANAMA GARMENTS','0000'),
(242980,'Sona Creation','Sona'),
(242981,'Shringar Fashion Jewellery Pvt Ltd','Shringar'),
(242983,'Babu Traders','Babu'),
(242984,'Gilas Jewellery','Gilas'),
(242989,'Shree Vandana Art Jewellers','Vandana'),
(242995,'Mehta Creation','Mehta'),
(243004,'Sandeep Gold Covering','Sandeep'),
(243008,'Rangeela Art Jewellery','Rangeela '),
(243013,'VC Sarees Private Limited','VC'),
(243039,'Bhuleshwar','Bhuleshwar'),
(243040,'Bhuleshwar','Bhu'),
(243046,'Ghoomar Art Jewellery','Ghoom'),
(243071,'Jhanak Designer Studio Pvt.Ltd','Jhanak'),
(243374,'Mahavir Creative','0');
/*!40000 ALTER TABLE `phppos_suppliers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:12:53
