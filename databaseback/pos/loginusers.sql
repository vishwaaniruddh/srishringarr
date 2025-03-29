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
-- Table structure for table `loginusers`
--

DROP TABLE IF EXISTS `loginusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loginusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pwd` varchar(15) NOT NULL,
  `permission` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `level` varchar(191) NOT NULL,
  `cust_id` text NOT NULL,
  `currentstatus` int(11) NOT NULL DEFAULT 0 COMMENT '0-logout,1-login',
  `alerts` int(11) NOT NULL DEFAULT 0,
  `branch` varchar(200) NOT NULL,
  `zone` varchar(200) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `token` text DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_status` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loginusers`
--

LOCK TABLES `loginusers` WRITE;
/*!40000 ALTER TABLE `loginusers` DISABLE KEYS */;
INSERT INTO `loginusers` VALUES
(4,'Nipa','nipa.com@gmail.com','2207','36,37,38,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,39,24,25,26,27,28,29,30,31,32,33,34,35,43,44,45,46,47','NA','NA','',0,0,'','','nipa.com@gmail.com','9920796267','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYmYiOjE3NDMyMjk5MzgsImV4cCI6MTc0MzIyOTk4OCwiZGF0YSI6eyJpZCI6IjQiLCJmdWxsbmFtZSI6Ik5pcGEiLCJlbWFpbCI6Ik5pcGEifX0.x5AGxMHdDeAyj-whjdNTWkdR6E1tmeCoyZuBFnAlXaU','2025-03-29 12:02:08',1),
(3,'Aniruddh','aniruddh@gmail.com','AVav@@2024','36,37,38,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,39,40,24,25,26,27,28,29,30,31,32,33,34,35,41,42,43,44,45,46,47','NA','NA','',0,0,'','','vishwaaniruddh@gmail.com','7021889883','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYmYiOjE3NDMxODgxMzgsImV4cCI6MTc0MzE4ODE4OCwiZGF0YSI6eyJpZCI6IjMiLCJmdWxsbmFtZSI6IkFuaXJ1ZGRoIiwiZW1haWwiOiJBbmlydWRkaCJ9fQ.ycuS15AYCsLcqm_q6lo9rhealxixixjrTsgEPdCo3u4','2025-03-29 00:25:28',1),
(5,'Dhvani Jani','dhvani@gmail.com','dhvani@123','NA','Na','NA','',0,0,'','','dhvani@gmail.com','9819535416','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYmYiOjE3MjE4OTM5MDAsImV4cCI6MTcyMTg5Mzk1MCwiZGF0YSI6eyJpZCI6IjUiLCJmdWxsbmFtZSI6IkRodmFuaSBKYW5pIiwiZW1haWwiOiJEaHZhbmkgSmFuaSJ9fQ.l0H5Cbh7YtOwirfOFX4Nxw-G-HbXuFWg6BzRRnll5iQ','2024-07-25 13:21:30',1),
(6,'Ragini ','khandelwalragini4@gmail.com','Ragini@2025','36,38,12,13,14,19,20,39,40,43','Na','NA','',0,0,'','','khandelwalragini4@gmail.com','9322761833','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYmYiOjE3NDMxNzI2NTYsImV4cCI6MTc0MzE3MjcwNiwiZGF0YSI6eyJpZCI6IjYiLCJmdWxsbmFtZSI6IlJhZ2luaSAiLCJlbWFpbCI6IlJhZ2luaSAifX0.0AnS4HTM1hxS4F9aZY3HTZpn7IeaoFjAy_Xx7bx7990','2025-03-28 20:07:26',1),
(7,'Rajani Poddar','2891964','2891964','36,37,38,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,39,40,24,25,26,27,28,29,30,31,32,33,34,35,41,42,43,44,45,46,47','NA','NA','',0,0,'','','rajanipodar@gmail.com','9619475711','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYmYiOjE3NDMxNzM3NzMsImV4cCI6MTc0MzE3MzgyMywiZGF0YSI6eyJpZCI6IjciLCJmdWxsbmFtZSI6IlJhamFuaSBQb2RkYXIiLCJlbWFpbCI6IlJhamFuaSBQb2RkYXIifX0.r2eCvZ_I4-t6ysnooX580oioZr5TOCyKlkK33bTNsVk','2025-03-28 20:26:03',1),
(8,'Rajesh Biswas','admin@gmail.com','12345','ALL','NA','NA','',0,0,'','','work.rajeshb@gmail.com','8770034408','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYmYiOjE3Mzg0Nzk1NDMsImV4cCI6MTczODQ3OTU5MywiZGF0YSI6eyJpZCI6IjgiLCJmdWxsbmFtZSI6IlJhamVzaCBCaXN3YXMiLCJlbWFpbCI6IlJhamVzaCBCaXN3YXMifX0.p88gjtxml98ec89vir1xhYL-Ynr9y6xeIMBdm_o60gI','2025-02-02 12:28:53',1),
(9,'Flyrobe Ajay','Flyrobe Ajay','2507','39','Retail Head','Retail Head','',0,0,'','','ajay.kumar@flyrobe.com','9650056080','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYmYiOjE3NDA5Njc1MDUsImV4cCI6MTc0MDk2NzU1NSwiZGF0YSI6eyJpZCI6IjkiLCJmdWxsbmFtZSI6IkZseXJvYmUgQWpheSIsImVtYWlsIjoiRmx5cm9iZSBBamF5In19.hIIneVxb217VKyOzOzV_c6TBar2gf0h6vMwdNIAjoDs','2025-03-03 07:34:55',1),
(10,'Bhagwati Podar','9324244224','9324244224','39','NA','NA','',0,0,'','','sakartradelink@gmail.com','9324244224','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYmYiOjE3NDI4MjYyOTAsImV4cCI6MTc0MjgyNjM0MCwiZGF0YSI6eyJpZCI6IjEwIiwiZnVsbG5hbWUiOiJCaGFnd2F0aSBQb2RhciIsImVtYWlsIjoiQmhhZ3dhdGkgUG9kYXIifX0.cnOHEZq7ftNxSs7ZGF6f6nR_80RGXUcR6QMoXCFX_lY','2025-03-24 19:54:40',1),
(11,'Laxmikant','Laxmikant','101','18,19,45,46','Account','Account','',0,0,'','','sakartradelink@gmail.com','9320735550','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYmYiOjE3NDI4MjUwMzEsImV4cCI6MTc0MjgyNTA4MSwiZGF0YSI6eyJpZCI6IjExIiwiZnVsbG5hbWUiOiJMYXhtaWthbnQiLCJlbWFpbCI6IkxheG1pa2FudCJ9fQ.X1COesJxTxCnZaLlieZwJWPLY7UhdNvqy7VGFwwgwf4','2025-03-24 19:33:41',1);
/*!40000 ALTER TABLE `loginusers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:12:23
