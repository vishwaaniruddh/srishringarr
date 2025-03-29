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
-- Table structure for table `exclusive_collections`
--

DROP TABLE IF EXISTS `exclusive_collections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exclusive_collections` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `image_url` varchar(300) DEFAULT NULL,
  `sku` varchar(20) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `category` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exclusive_collections`
--

LOCK TABLES `exclusive_collections` WRITE;
/*!40000 ALTER TABLE `exclusive_collections` DISABLE KEYS */;
INSERT INTO `exclusive_collections` VALUES
(1,'https://yosshitaneha.com/uploads/2023/11/16992759250.jpg','YNL315XL','apparel_detail.php?id=2557&days=3',1,'Apparel'),
(2,'https://yosshitaneha.com/uploads/2021/12/16407628830.jpg','YNL270AXL','apparel/Rent_Stunning_OffWhite_Lehenga&days=3',1,'Apparel'),
(3,'https://yosshitaneha.com/uploads/2021/05/16216933860.jpg','YNL271XL','apparel/Rent_AweInspiring_Abhinav_Mishra_Inspired_Golden_Lehenga_With_Abla_Work&days=3',1,'Apparel'),
(4,'https://yosshitaneha.com/uploads/2021/12/16397442420.jpg','YNL268XL','apparel/Rent_Light_Pink_Lehenga_With_Benarsi_Bandhani_Dupatta_With_2_Blouse_Options&days=3',1,'Apparel'),
(5,'https://yosshitaneha.com/uploads/2023/11/16992740300.jpg','YNL313XL','apparel_detail.php?id=2555&days=3',1,'Apparel'),
(7,'https://yosshitaneha.com/uploads/2022/01/16419972900.jpg','SET865A','jewel/Rent_American_Diamond_Necklace_Set_76&days=3',1,'Jewel'),
(8,'https://yosshitaneha.com/uploads/2021/08/16300561200.jpg','HA925','jewel/Rent_INDIAN_KUNDAN_HAIR_ACCESSORIES_3&days=3',1,'Jewel'),
(9,'https://yosshitaneha.com/uploads/2021/08/16303233560.jpg','HA923','jewel/Rent_INDIAN_KUNDAN_CHOTI_HAIR_ACCESSORIES_1&days=3',1,'Jewel'),
(10,'https://yosshitaneha.com/uploads/2021/08/16300722870.jpg','N650A','jewel_detail.php?id=9838&days=3',1,'Jewel'),
(11,'https://yosshitaneha.com/uploads/2021/08/16300551080.jpg','N649B','jewel_detail.php?id=9834&days=3',1,'Jewel'),
(12,'https://yosshitaneha.com/uploads/2020/07/15959571710.jpg','N383AON','jewel_detail.php?id=7392&days=3',1,'Jewel'),
(13,'https://yosshitaneha.com/uploads/2021/08/16300731330.jpg','K1770','jewel/Rent_Kundan_Bridal_Set_For_Wedding_44&days=3',1,'Jewel'),
(14,'https://yosshitaneha.com/uploads/2022/11/16692949610.jpg','K1754','jewel/Rent_Kundan_Bridal_Set_For_Wedding_73&days=3',1,'Jewel'),
(15,'https://yosshitaneha.com/uploads/2022/01/16419956800.jpg','K1753','jewel/Rent_Kundan_Bridal_Set_For_Wedding_61&days=3',1,'Jewel'),
(16,'https://yosshitaneha.com/uploads/2022/01/16419951230.jpg','K1752','jewel/Rent_Kundan_Bridal_Set_For_Wedding_72&days=3',1,'Jewel'),
(17,'https://yosshitaneha.com/uploads/2020/09/16014037390.jpg','K1600','jewel/Rent_Kundan_Bridal_Set_For_Wedding_32&days=3',1,'Jewel'),
(18,'https://yosshitaneha.com/uploads/2020/07/15954020940.jpg','YNG107A','apparel/Rent_The_sensuous_red_trail_gown&days=3',1,'Apparel'),
(19,'https://yosshitaneha.com/uploads/2020/07/15954099290.jpg','YNG165','apparel/Rent_The_sea_girl_trail_gown&days=3',1,'Apparel'),
(20,'https://yosshitaneha.com/uploads/2020/07/15954172620.jpg','YNG177','apparel/Rent_The_radiant_yellow_trail_gown&days=3',1,'Apparel'),
(21,'https://yosshitaneha.com/uploads/2021/06/16232374680.jpg','YNG275XL','apparel/Rent_Royal_Green_Gaurav_Gupta_Inspired_Wired_Ball_Gown&days=3',1,'Apparel'),
(22,'https://yosshitaneha.com/uploads/2021/06/16232372680.jpg','YNG273XL','apparel/Rent_Golden_Draped_3D_Embroidered_Ball_Gown&days=3',1,'Apparel'),
(23,'https://yosshitaneha.com/uploads/2021/12/16402678470.jpg','YNL272XL','apparel/Rent_Ravishing_Rose_Quartz_Pink_Hand_Embroidered_Draped_IndoWestern_Ensemble&days=3',1,'Apparel'),
(24,'https://yosshitaneha.com/uploads/2021/05/16216959650.jpg','YNL219XL ','apparel/Rent_Peach_and_turquoise_blue_embroidered_lehenga_set_1&days=3',1,'Apparel'),
(25,'https://yosshitaneha.com/uploads/2021/05/16216963080.jpg','YNL218XL','apparel/Rent_Gorgeous_navy_blue_and_pink_lehenga_set&days=3',1,'Apparel'),
(26,'https://yosshitaneha.com/uploads/2021/04/16175282520.jpg','YNL242','apparel/Rent_PINK_BRIDAL_LEHENGA&days=3',1,'Apparel'),
(27,'https://yosshitaneha.com/uploads/2021/05/16216936290.jpg','YNL238XL','apparel/Rent_Heavenly_cream_embroidered_lehenga_set&days=3',1,'Apparel'),
(28,'https://yosshitaneha.com/uploads/2021/01/16118336000.jpg','YNL237XL','apparel/Rent_Red_And_Peach_Hand_Embroidered_Bridal_Lehenga&days=3',1,'Apparel'),
(29,'https://yosshitaneha.com/uploads/2021/08/16303156520.jpg','SET788A','jewel/Rent_American_Diamond_Necklace_Set_51&days=3',1,'Jewel'),
(30,'https://yosshitaneha.com/uploads/2020/09/16001987620.jpg','K1297ON','jewel/Rent_Fancy_Micro_Gold_Polished_Semi_Precious_Kundan__Coloured_Beads_Necklace_set_K1297ON&days=',1,'Jewel'),
(31,'https://yosshitaneha.com/uploads/2020/09/16000209510.jpg','K1325ON','jewel/Rent_Fancy_Micro_Gold_Polished_Semi_Precious_Kundan_Coloured_Beads__Pearl_Necklace_set_for_wom',1,'Jewel'),
(32,'https://yosshitaneha.com/uploads/2020/09/16001146640.jpg','K1337ON','jewel/Rent_Fancy_Micro_Gold_Polished_Semi_Precious_Kundan__Pearl_Necklace_set_K1337ON&days=3',1,'Jewel'),
(33,'https://yosshitaneha.com/uploads/2020/09/16014076790.jpg','K1636','jewel/Rent_Kundan_Bridal_Set_For_Wedding_8&days=3',1,'Jewel'),
(34,'https://yosshitaneha.com/uploads/2020/09/16001099950.jpg','K1329AON','jewel/Rent_Fancy_Micro_Gold_Polished_Semi_Precious_Stones_Coloured_Beads__Pearl_Necklace_set_K1329AO',1,'Jewel'),
(35,'https://srishringarr.com/yn/uploads/2023/11/16992760740.jpg','YNL316XL','apparel_detail.php?id=2558&days=3',1,'Apparel'),
(36,'https://srishringarr.com/yn/uploads/2023/11/16992759250.jpg','YNL315XL','apparel_detail.php?id=2557&days=3',1,'Apparel'),
(37,'https://yosshitaneha.com/uploads/2021/12/16397339970.jpg','YNG150XL','apparel/Rent_Rose_pink_draped_and_embroidered_gown&days=3',1,'Apparel'),
(38,'https://srishringarr.com/yn/uploads/2020/12/16081034930.jpg','YNL231','apparel/Rent_Red_embroidered_bridal_velvet_lehenga_set&days=3',1,'Apparel'),
(39,'https://srishringarr.com/yn/uploads/2021/02/16145188440.jpg','YNL230','apparel/Rent_Pink_shadow_silk_embroidered_lehenga_set&days=3',1,'Apparel'),
(40,'https://srishringarr.com/yn/uploads/2021/12/16397431830.jpg','YNL228XL','apparel/Rent_Stunning_lavender_lehenga_choli_with_gotta_patti_embroidery&days=3',1,'Apparel');
/*!40000 ALTER TABLE `exclusive_collections` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:15:29
