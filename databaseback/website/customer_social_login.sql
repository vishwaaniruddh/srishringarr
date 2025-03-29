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
-- Table structure for table `customer_social_login`
--

DROP TABLE IF EXISTS `customer_social_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_social_login` (
  `login_id` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `site` varchar(10) DEFAULT 'SN',
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_social_login`
--

LOCK TABLES `customer_social_login` WRITE;
/*!40000 ALTER TABLE `customer_social_login` DISABLE KEYS */;
INSERT INTO `customer_social_login` VALUES
('101636521493431329119','prabir.d06@gmail.com','Prabir Dutta','SN'),
('101992139926825124794','riachaurasia21@gmail.com','Ria Chaurasia','SN'),
('103005144308513637597','work.rajeshb@gmail.com','rajesh work','SN'),
('103361578666587807487','koli.pooja4444@gmail.com','Pooja Ramkrishna Koli','SN'),
('104382248405925136894','dhvanijani7@gmail.com','Dhvani Jani','SN'),
('105351067491006100413','vishwaaniruddh@gmail.com','Aniruddh Vishwakarma','SN'),
('105467570009588543915','truptigaikwad11@gmail.com','Trupti Gaikwad','SN'),
('107821229565204542645','smanan1998@gmail.com','Manan Shah','SN'),
('109804218509697016532','daizylilani0811@gmail.com','Daizy Lilani','SN'),
('113973642664806704835','minniebhatt01@gmail.com','minnie bhatt','SN'),
('114954257628815889455','rajputkajol23@gmail.com','Kajol Rajput','SN'),
('116337857961182773780','aayushshariyamtbvlogs@gmail.com','Aayush Shariya Mtb vlogs','SN'),
('117496976497777085907','jkumari64627@gmail.com','Jyoti Kumari','SN');
/*!40000 ALTER TABLE `customer_social_login` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:15:22
