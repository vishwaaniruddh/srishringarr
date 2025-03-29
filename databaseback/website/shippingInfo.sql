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
-- Table structure for table `shippingInfo`
--

DROP TABLE IF EXISTS `shippingInfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shippingInfo` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `userid` int(10) DEFAULT NULL,
  `person_name` varchar(50) DEFAULT NULL,
  `person_contact` varchar(20) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `landmark` varchar(100) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `type` int(10) NOT NULL COMMENT '0 for delivery address && 1 for pickup address',
  `status` tinyint(1) DEFAULT NULL,
  `site` varchar(20) NOT NULL DEFAULT 'SN',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=160 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shippingInfo`
--

LOCK TABLES `shippingInfo` WRITE;
/*!40000 ALTER TABLE `shippingInfo` DISABLE KEYS */;
INSERT INTO `shippingInfo` VALUES
(1,79957,'Rahul ','9819579678','D.4.30','Jafri','Mumbai','maharastra','India','',0,1,'SN','2021-05-03 07:19:29',79957),
(2,79957,'Swapnil Vishwakarma','7021889883','Some where newr mumbai','kuch bhi ho sakta gau','Mumbai','Maharashtra','india','400043',0,1,'SN','2021-05-03 07:25:24',79957),
(3,79957,'Rahul ','7021889883','D.4.30','','siddhi nagar','Maharashtra','India','400043',1,1,'SN','2021-05-03 07:37:37',79957),
(4,79957,'Akhilesh Vishwakarma','8825077502','siddhi nagar','siddhi nagar','Mumbai','Maharashtra','India','400012',1,1,'SN','2021-05-03 07:45:54',79957),
(5,78927,'Aniruddh Vishwakamraaaaa','7021889883','siddhi nagar','siddhi nagar','Panaji','Goa','India','400012',0,1,'SN','2021-05-03 08:57:46',78927),
(6,78927,'Aniruddh Vishwakamra','7021889883','siddhi nagar','siddhi nagar','Mumbai','Goa','India','400012',1,1,'SN','2021-05-03 09:09:30',78927),
(7,78927,'vikas pal','745856585','Some where newr mumbai','bridge','Mumbai','Maharashtra','India','400043',0,1,'SN','2021-05-04 04:24:20',78927),
(8,80185,'Akruti Manjrekar','8097163603','17/132, Malad','Malad','Mumbai','Maharashtra','India','400095',0,1,'SN','2021-05-04 04:41:38',80185),
(9,80185,'Akruti Manjrekar','8097163603','17/132, Malad','Malad','Mumbai','Maharashtra','India','400095',1,1,'SN','2021-05-04 04:42:09',80185),
(10,81370,'Aniruddh Vishwakamra','7021889883','d.4.30 Rafi Nagar Shivaji Nagar Gov','siddhi nagar','mumbai','MAHARASHTRA','India','400043',0,1,'SN','2021-05-19 07:31:07',81370),
(11,81370,'Aniruddh Vishwakamra','7021889883','d.4.30 Rafi Nagar Shivaji Nagar Gov','siddhi nagar','mumbai','MAHARASHTRA','India','400043',0,1,'YN','0000-00-00 00:00:00',81370),
(12,81370,'Akhilesh Vishwakarma','9819579678','d.4.30 Rafi Nagar Shivaji Nagar Gov','kuch bhi ho sakta gau','mumbai','MAHARASHTRA','India','400043',0,1,'YN','2021-05-19 03:01:39',81370),
(13,0,'Rahul ','7021889883','d.4.30 Rafi Nagar Shivaji Nagar Gov','kuch bhi ho sakta gau','mumbai','MAHARASHTRA','India','400043',0,1,'YN','2021-05-24 01:55:11',0),
(14,81370,'sa','7021889883','d.4.30 Rafi Nagar Shivaji Nagar Gov','Jafri','mumbai','MAHARASHTRA','India','400043',0,1,'YN','2021-05-24 01:58:43',81370),
(15,81370,'Aniruddh Vishwakamra','7021889883','d.4.30 Rafi Nagar Shivaji Nagar Gov','siddhi nagar','mumbai','MAHARASHTRA','India','400043',1,1,'SN','2021-05-25 12:24:32',81370),
(16,83295,'Aniruddh Vishwakamra','7021889883','d.4.30 Rafi Nagar Shivaji Nagar Gov','kuch bhi ho sakta gau','siddhi nagar','Maharashtra','India','400043',0,1,'YN','2021-05-25 02:03:28',83295),
(17,83448,'Akruti Manjrekar','8097163603','17/132, Malad','Malad','Mumbai','Maharashtra','India','400095',0,1,'YN','2021-05-27 09:59:48',83448),
(18,91687,'Aishwarya Soni','+919730446221','A/104, Shree Yashwant Empire, Yashwant Viva Township, Off Nallasopara Vasai Link Road, Near DMart, Vasai East','Near DMart','Thane','Maharashtra','India','401208',0,1,'SN','2021-08-17 12:38:32',91687),
(19,91687,'Aishwarya Soni','+919730446221','A/104, Shree Yashwant Empire, Yashwant Viva Township, Off Nallasopara Vasai Link Road, Near DMart, Vasai East','Near DMart','Thane','Maharashtra','India','401208',1,1,'SN','2021-08-17 12:38:58',91687),
(20,93810,'Aniruddh Vishwakamra','7021889883','D.4.30','siddhi nagar','Mumbai','Maharashtra','India','400043',0,1,'SN','2021-09-04 08:24:51',93810),
(21,93810,'Rahul ','7021889883','D.4.30','Jafri','Mumbai','Maharashtra','India','400043',1,1,'SN','2021-09-04 08:25:13',93810),
(22,93810,'Rahul ','7021889883','D.4.30','Jafri','Mumbai','Maharashtra','India','400043',1,1,'SN','2021-09-04 08:25:13',93810),
(23,97088,'hellbinder','6785264922','bhilai','bhilai gate','Bhilai','Chhattisgarh','India','490025',0,1,'SN','2021-09-21 06:57:19',97088),
(24,97088,'hellbinder','06785264922','bhilai','bhilai gate','Bhilai','Chhattisgarh','India','490025',1,1,'SN','2021-09-21 06:57:49',97088),
(25,94416,'Aniruddh Vishwakamra','07021889883','D.4.30','siddhi nagar','Mumbai','Maharashtra','India','400043',1,1,'SN','2021-09-29 06:00:37',94416),
(26,94416,'Rahul ','07021889883','D.4.30','Jafri School','Mumbai','Maharashtra','India','400043',0,1,'SN','2021-09-29 06:01:03',94416),
(27,0,'dsd`ewe`','ug','gjg','jhg','jgj','gj','gj','gjgjg',1,1,'SN','2021-10-12 01:35:58',0),
(28,130771,'Asha Rani','8900319225','Anand Bhawan,Chopasni Road','opposite Filter House','Jodhpur','Rajasthan','India','342008',0,1,'SN','2021-11-20 06:30:20',130771),
(29,130771,'Asha','Rani','Room No-152,B2 Hostel, Indian Institute of Technology , Jodhpur ','NH 65 ,Nagaur Road','Jodhpur','Rajasthan','India','342037',1,1,'SN','2021-11-20 06:31:09',130771),
(30,130771,'Asha Rani','8900319225','Room No-152,B2 Hostel, Indian Institute of Technology , Jodhpur ',' NH 65 ,Nagaur Road','Jodhpur','Rajasthan','India','342037',1,1,'SN','2021-11-20 06:31:54',130771),
(31,21367,'Yosshita Poddar Saraogi ','09321864422','Yosshita Poddar Saraogi  102 Bharat Apt,  Next to BMW and Jeep Showroom,  Juhu Lane,  C. D. Barfiwala Marg,  Andheri (West),  Mumbai-400058. Ph. 9321864422','Next to BMW and Jeep Showroom','Mumbai','Maharashtra','India','400058',0,1,'SN','2021-11-25 04:06:02',21367),
(32,21367,'Yosshita Poddar Saraogi ','09321864422','Yosshita Poddar Saraogi  102 Bharat Apt,  Next to BMW and Jeep Showroom,  Juhu Lane,  C. D. Barfiwala Marg,  Andheri (West),  Mumbai-400058. Ph. 9321864422','Next to BMW and Jeep Showroom','Mumbai','Maharashtra','India','400058',0,1,'SN','2021-11-25 04:06:26',21367),
(33,21367,'Yosshita Poddar Saraogi ','09321864422','Yosshita Poddar Saraogi  102 Bharat Apt,  Next to BMW and Jeep Showroom,  Juhu Lane,  C. D. Barfiwala Marg,  Andheri (West),  Mumbai-400058. Ph. 9321864422','Next to BMW and Jeep Showroom','Mumbai','Maharashtra','India','400058',0,1,'SN','2021-11-25 04:07:15',21367),
(34,21367,'Yosshita Poddar Saraogi ','09321864422','Yosshita Poddar Saraogi  102 Bharat Apt,  Next to BMW and Jeep Showroom,  Juhu Lane,  C. D. Barfiwala Marg,  Andheri (West),  Mumbai-400058. Ph. 9321864422','Next to BMW and Jeep Showroom','Mumbai','Maharashtra','India','400058',1,1,'SN','2021-11-25 04:07:50',21367),
(35,132607,'Rahul','+12174193703','Sri Shringarr Fashion Studio,Shyamkamal Building B/1, Office No.104,1 st Floor, Agarwal Market, Opposite Railway Station,Vile Parle (East)','Opposite Railway Station','Mumbai','Maharashtra','India',' 400057',1,1,'SN','2021-11-28 12:53:21',132607),
(36,132607,'Rahul ','+12174193703','Sri Shringarr Fashion Studio,Shyamkamal Building B/1, Office No.104,1 st Floor, Agarwal Market, Opposite Railway Station,Vile Parle (East)','station','Mumbai','Maharashtra','India','400057',0,1,'SN','2021-11-28 01:01:55',132607),
(37,104165,'Rajesh','8770034408','bhilai','Bhilai','Bhilai','Chhattisgarh','India','490025',0,1,'YN','2021-12-15 05:54:41',104165),
(38,143103,'Gurpreet kaur','9999166194','56/10-11 Ashok nagar','Swasthik hospital ','New Delhi ','Delhi ','India','110018',0,1,'SN','2021-12-27 09:05:33',143103),
(39,143103,'Gurpreet kaur','9999166194','56/10-11 Ashok nagar','Swasthik hospital ','New Delhi ','Delhi ','India ','110018',0,1,'SN','2021-12-27 09:06:23',143103),
(40,143103,'Gurpreet kaur','9999166194','56/10-11 Ashok nagar','Swasthik hospital ','New Delhi ','Delhi','India','110018',1,1,'SN','2021-12-27 09:10:15',143103),
(41,144984,'Anusha','9542971606','10-155/11, flat no S1(block 2), Sri Siva Gayatri Nagar 3rd Street,papayyarajupalem','Near Car wash','Visakhapatnam','Andhra Pradesh','India','530051',0,1,'YN','2022-01-05 02:16:38',144984),
(42,144984,'Anusha','9542971606','10-155/11, Simhadri Residency flat no S1(block2), Sri Siva Gayatri nagara 3rd Street, papayyarajupalem','Near Car Wash','Visakhapatnam','Andhra Pradesh','India','530051',0,1,'YN','2022-01-05 02:18:43',144984),
(43,170097,'Abc','Kwuwjwkwk','Flat no 104 white leaf cooperative society opposite to madhupushpa','Near dutta mandir','PUNE','Priyanka Thombre','India','411057',0,1,'YN','2022-06-15 11:44:06',170097),
(44,175673,'Shrushti ','9409644218','Closed Street no 5 hansarajnagar, Vivek, Near Railway station, Hanuman Temple','Hanuman Temple ','Rajkot ','Gujarat ','INDIA ','360001',0,1,'YN','2022-07-13 02:53:19',175673),
(45,193203,'Syed Manjer Arfin Tapu ','+919831627980','45/1 B, Bright Street Park Circus P.S. - Karaya P.O. - Circus Avenue ','Bright Street','Kolkata ','West Bengal ','India','700017',0,1,'YN','2022-11-13 05:49:59',193203),
(46,198295,'yosshita','9321864422','Vile parle east','near deenanath mangeshkar hall','Mumbai','Maharashtra','India','400057',0,1,'YN','2022-12-22 12:53:49',198295),
(47,198325,'Aniruddh Vishwakarma','07021889883','Jafri school','Jafri school','1','3','IN','400043',0,1,'YN','0000-00-00 00:00:00',198325),
(48,198325,'Aniruddh Vishwakarma','07021889883','Jafri school','Jafri school','1','3','IN','400043',0,1,'YN','0000-00-00 00:00:00',198325),
(49,198325,'Aniruddh Vishwakarma','07021889883','Jafri school','Jafri school','1','3','IN','400043',0,1,'YN','0000-00-00 00:00:00',198325),
(50,0,' ','','','','','','','',0,1,'YN','2023-01-07 04:37:43',0),
(51,200447,'Achint bishnoi','73339738707','Sk gift corner shop , street no 1 , chowk 11','Sk gift shop','Abohar','Punjab ','India','152116',0,1,'YN','2023-01-08 03:44:33',200447),
(52,0,' ','','','','','','','',0,1,'YN','2023-01-22 02:56:41',0),
(53,0,' ','','','','','','','',0,1,'YN','2023-01-29 08:23:35',0),
(54,0,' ','','','','','','','',0,1,'YN','2023-02-10 03:13:26',0),
(55,0,' ','','','','','','','',0,1,'YN','2023-02-17 02:54:22',0),
(56,0,' ','','','','','','','',0,1,'YN','2023-02-20 12:49:29',0),
(57,0,' ','','','','','','','',0,1,'YN','2023-03-03 08:40:54',0),
(58,0,' ','','','','','','','',0,1,'YN','2023-03-05 05:53:15',0),
(59,0,' ','','','','','','','',0,1,'YN','2023-03-13 03:07:02',0),
(60,0,' ','','','','','','','',0,1,'YN','2023-03-14 06:49:37',0),
(61,0,' ','','','','','','','',0,1,'YN','2023-03-24 09:35:21',0),
(62,0,' ','','','','','','','',0,1,'YN','2023-04-01 01:44:44',0),
(63,0,' ','','','','','','','',0,1,'YN','2023-04-06 06:37:28',0),
(64,0,' ','','','','','','','',0,1,'YN','2023-04-12 02:39:59',0),
(65,0,' ','','','','','','','',0,1,'YN','2023-04-18 05:24:51',0),
(66,0,' ','','','','','','','',0,1,'YN','2023-04-24 07:09:23',0),
(67,0,' ','','','','','','','',0,1,'YN','2023-05-04 01:07:38',0),
(68,0,' ','','','','','','','',0,1,'YN','2023-05-05 10:41:53',0),
(69,0,' ','','','','','','','',0,1,'YN','2023-05-23 04:00:46',0),
(70,0,' ','','','','','','','',0,1,'YN','2023-05-28 10:19:41',0),
(71,0,' ','','','','','','','',0,1,'YN','2023-05-28 10:19:43',0),
(72,0,' ','','','','','','','',0,1,'YN','2023-05-29 10:09:03',0),
(73,0,' ','','','','','','','',0,1,'YN','2023-06-06 05:13:56',0),
(74,0,' ','','','','','','','',0,1,'YN','2023-06-07 07:25:55',0),
(75,0,' ','','','','','','','',0,1,'YN','2023-06-14 09:35:28',0),
(76,0,' ','','','','','','','',0,1,'YN','2023-06-18 06:07:33',0),
(77,0,' ','','','','','','','',0,1,'YN','2023-06-20 10:10:08',0),
(78,0,' ','','','','','','','',0,1,'YN','2023-06-25 12:19:32',0),
(79,0,' ','','','','','','','',0,1,'YN','2023-07-02 09:41:58',0),
(80,0,' ','','','','','','','',0,1,'YN','2023-07-08 04:14:28',0),
(81,0,' ','','','','','','','',0,1,'YN','2023-07-17 12:27:17',0),
(82,0,' ','','','','','','','',0,1,'YN','2023-07-22 07:59:08',0),
(83,0,' ','','','','','','','',0,1,'YN','2023-07-28 11:51:31',0),
(84,0,' ','','','','','','','',0,1,'YN','2023-07-29 07:15:42',0),
(85,234701,'Akruti','8928186862','17/132, Near Shiv Mandir, Malad West, Mumbai - 400095','Malad','Mumbai','Maharashtra','India','400065',0,1,'YN','2023-08-02 09:28:00',234701),
(86,0,' ','','','','','','','',0,1,'YN','2023-08-03 06:21:51',0),
(87,0,' ','','','','','','','',0,1,'YN','2023-08-04 04:27:49',0),
(88,235325,'Abhishek  Saraogi','7506628663','123','123','1','3','IN','400058',0,1,'YN','2023-08-04 01:40:06',235325),
(89,198325,'Aniruddh Vishwakarma','07021889883','','','1','3','IN','0',0,1,'YN','2023-08-04 01:44:05',198325),
(90,198325,'Aniruddh Vishwakarma','07021889883','sdklfhksdf hfyds fsfsdfksdf sdfdksfsdkyfsdfsdkf','akfsdfydkyfidy, vdfklgdff','306','1','IN','3485734',0,1,'YN','2023-08-04 01:52:37',198325),
(91,198325,'Aniruddh Vishwakarma','07021889883','Something','dskh','1','3','IN','400056',0,1,'YN','2023-08-04 01:55:09',198325),
(92,235356,'Shivani Rungta','7620188365','1','2','101','3','IN','012131',0,1,'YN','2023-08-04 03:10:49',235356),
(93,0,' ','','','','','','','',0,1,'YN','2023-08-09 10:24:13',0),
(94,0,' ','','','','','','','',0,1,'YN','2023-08-10 01:42:36',0),
(95,238868,'Purvi Manjrekar','+91 79-77656224','17/132, Near Shiv Mandir','Malad West','Mumbai','Maharashtra ','India','400095',0,1,'YN','2023-08-18 11:20:07',238868),
(96,238888,'Karan Ahire','9029836501','Sunrays Shopping Center','Charkop','Mumbai','Maharashtra ','India','400067',0,1,'SN','2023-08-18 05:39:45',238888),
(97,238888,'Karan ahire','9029836501','Sunrays shopping center','Charkop','Mumbai','Maharashtra ','India','400067',0,1,'SN','2023-08-18 05:40:38',238888),
(98,238888,'Karan Ahire','9029836501','Sunrays shopping center','Charkop','Mumbai','Maharashtra ','India','400067',0,1,'SN','2023-08-18 05:41:29',238888),
(99,238888,'Karan','9029836501','Sunrays ','Charkop','Mumbai ','Maharashtra ','India','400067',0,1,'SN','2023-08-18 05:43:53',238888),
(100,0,' ','','','','','','','',0,1,'YN','2023-08-20 10:43:44',0),
(101,0,' ','','','','','','','',0,1,'YN','2023-08-21 05:27:48',0),
(102,238888,'Akruti','A','SOmething','Station','mumbai','Maharashtra','India','400089',1,1,'SN','2023-08-26 07:32:21',238888),
(103,238888,'Aniruddh','A','B','C','F','J','O','49494483',1,1,'SN','2023-08-26 07:33:56',238888),
(104,0,' ','','','','','','','',0,1,'YN','2023-08-27 06:13:04',0),
(105,0,' ','','','','','','','',0,1,'YN','2023-08-27 10:59:58',0),
(106,242456,'Ritvik Vishwakarma','7021889883','Mumbai','School','Mumbai','Maharashtra','India','400078',0,1,'YN','2023-09-02 12:55:55',242456),
(107,0,' ','','','','','','','',0,1,'YN','2023-09-02 09:27:25',0),
(108,0,' ','','','','','','','',0,1,'YN','2023-09-07 03:44:35',0),
(109,0,' ','','','','','','','',0,1,'YN','2023-09-08 01:26:22',0),
(110,0,' ','','','','','','','',0,1,'YN','2023-09-14 09:43:29',0),
(111,0,' ','','','','','','','',0,1,'YN','2023-09-21 06:57:23',0),
(112,0,' ','','','','','','','',0,1,'YN','2023-09-28 12:41:00',0),
(113,0,' ','','','','','','','',0,1,'YN','2023-10-03 05:48:58',0),
(114,0,' ','','','','','','','',0,1,'YN','2023-10-08 11:35:03',0),
(115,0,' ','','','','','','','',0,1,'YN','2023-10-15 04:14:04',0),
(116,0,' ','','','','','','','',0,1,'YN','2023-10-17 02:05:22',0),
(117,0,' ','','','','','','','',0,1,'YN','2023-10-24 12:38:23',0),
(118,0,' ','','','','','','','',0,1,'YN','2023-10-29 08:11:56',0),
(119,0,' ','','','','','','','',0,1,'YN','2023-11-02 10:28:34',0),
(120,0,' ','','','','','','','',0,1,'YN','2023-11-02 10:28:35',0),
(121,0,' ','','','','','','','',0,1,'YN','2023-11-03 08:30:03',0),
(122,0,' ','','','','','','','',0,1,'YN','2023-11-06 05:09:37',0),
(123,0,' ','','','','','','','',0,1,'YN','2023-11-08 08:51:42',0),
(124,0,' ','','','','','','','',0,1,'YN','2023-11-14 11:22:14',0),
(125,0,' ','','','','','','','',0,1,'YN','2023-11-16 11:45:45',0),
(126,0,' ','','','','','','','',0,1,'YN','2023-11-24 06:32:20',0),
(127,0,' ','','','','','','','',0,1,'YN','2023-11-24 10:05:29',0),
(128,0,' ','','','','','','','',0,1,'YN','2023-11-27 12:29:30',0),
(129,0,' ','','','','','','','',0,1,'YN','2023-12-02 01:30:06',0),
(130,0,' ','','','','','','','',0,1,'YN','2023-12-10 01:32:05',0),
(131,0,' ','','','','','','','',0,1,'YN','2023-12-22 08:48:32',0),
(132,0,' ','','','','','','','',0,1,'YN','2023-12-28 01:46:31',0),
(133,235565,'Aniruddh','7021889883','Mumbai','Mumbai','7021889883','Maharashtra','India','400043',0,1,'SN','2023-12-29 04:06:54',235565),
(134,0,' ','','','','','','','',0,1,'YN','2024-01-04 04:55:00',0),
(135,0,' ','','','','','','','',0,1,'YN','2024-01-10 06:36:21',0),
(136,0,' ','','','','','','','',0,1,'YN','2024-01-30 05:04:36',0),
(137,269378,'Shweta Mishra ','7875045562','Vrindavan complex, Eden rose, b-wing,room no 15 ','Opposite of J.B.Ludhani high school, behind Evershine hospital ','Evershine city(Vasai','Maharashtra ','India','401208',0,1,'SN','2024-02-04 11:50:11',269378),
(138,269378,'Shweta Mishra ','7875045562','Vrindavan complex, Eden rose, b-wing,room no 15 ','Opposite of J.B.Ludhani high school, behind Evershine hospital ','Evershine city(Vasai','Maharashtra ','India','401208',1,1,'SN','2024-02-04 11:50:54',269378),
(139,0,' ','','','','','','','',0,1,'YN','2024-02-05 05:36:27',0),
(140,0,' ','','','','','','','',0,1,'YN','2024-02-12 01:48:33',0),
(141,0,' ','','','','','','','',0,1,'YN','2024-02-12 04:22:16',0),
(142,0,' ','','','','','','','',0,1,'YN','2024-02-18 09:09:37',0),
(143,0,' ','','','','','','','',0,1,'YN','2024-02-20 08:30:02',0),
(144,0,' ','','','','','','','',0,1,'YN','2024-03-16 08:27:34',0),
(145,0,' ','','','','','','','',0,1,'YN','2024-03-19 11:10:51',0),
(146,0,' ','','','','','','','',0,1,'YN','2024-03-22 10:26:19',0),
(147,0,' ','','','','','','','',0,1,'YN','2024-03-25 12:41:18',0),
(148,284081,'Trupti Gaikwad','9619240524','Goregon west','Goregoan wet traffic police station','Mumbai','Maharashtra','India','400104',0,1,'SN','2024-05-27 04:30:27',284081),
(149,284081,'Trupti Gaikwad','9619240524','Goregon west','Goregoan wet traffic police station','Mumbai','Maharashtra','India','400104',1,1,'SN','2024-05-27 04:31:18',284081),
(150,284081,'Trupti Gaikwad','9619240524','Goregon west','Goregoan wet traffic police station','Mumbai','Maharashtra','India','400104',1,1,'SN','2024-05-27 04:31:36',284081),
(151,284081,'Trupti Gaikwad','9619240524','Goregon west','Goregoan wet traffic police station','Mumbai','Maharashtra','India','400104',1,1,'SN','2024-05-27 04:32:12',284081),
(152,284163,'Dhvani','9819535416','Borivali','b','mumbai','maharashtra','india','400000',0,1,'SN','2024-05-28 01:12:24',284163),
(153,284163,'Dhvani','9819535416','Borivali','b','mumbai','maharashtra','India','400000',1,1,'SN','2024-05-28 01:13:59',284163),
(154,284163,'Dhvani','9819535416','Borivali','B','mumbai','maharashtra','India','400000',0,1,'YN','2024-05-28 07:56:32',284163),
(155,284163,'Dhvani','9819535416','Dahisar','Near dahisar station','Mumbai','maharashtra','India','400034',0,1,'SN','2024-05-28 04:00:15',284163),
(156,284163,'Dhvani','9819535416','Dahisar','Near dahisar station','mumbai','maharashtra','India','400034',0,1,'YN','2024-05-28 10:33:40',284163),
(157,284963,'Dhvani','9819535416','Borivali','Near borivali station','mumbai','maharashtra','India','400092',0,1,'SN','2024-06-05 05:02:11',284963),
(158,891592,'Aniruddh','7021889883','Sadguru tower , diva east','Bharat bank','Thane ','Maharastra','India','400043',0,1,'SN','2025-03-22 04:56:46',891592),
(159,891592,'Rahul Vishwaarma','987642123','D430 Rafi nagar','Jafri School','Mumbai','Maharashtra','India','400612',1,1,'SN','2025-03-22 04:58:31',891592);
/*!40000 ALTER TABLE `shippingInfo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:16:25
