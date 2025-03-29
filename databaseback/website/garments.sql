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
-- Table structure for table `garments`
--

DROP TABLE IF EXISTS `garments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `garments` (
  `garment_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `garments_image` varchar(250) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `Main_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `meta_title` varchar(250) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `url` varchar(500) NOT NULL,
  `yn_url` varchar(100) NOT NULL,
  PRIMARY KEY (`garment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `garments`
--

LOCK TABLES `garments` WRITE;
/*!40000 ALTER TABLE `garments` DISABLE KEYS */;
INSERT INTO `garments` VALUES
(5,'Images/1711100231.jpg','DESIGNER BLOUSES','EXCLUSIVE BLOUSES','2020-02-10 05:00:00',2,35,'Customise/Stitch/Buy Designer Embroidered Blouses-YosshitaNeha ','Designer Blouse, Indian Blouses, Blouse, Saree Blouse, Bridal Blouse, Ready Made Blouse, Hand Embroidered Blouses, Thread Work Blouse, Zardosi Blouse, Printed Blouse, Raw Silk, Cotton Blouse, Buy Blouse Online, Buy Blouse in India','Buy or Stitch custom fitted designer blouses with rich fabrics and hand embroidery exclusively at Yosshita Neha.Bridal Blouse|Cotton Blouse|Embroidered Blouses','0','customise_buy_designer_indian_blouse'),
(8,'Images/1581329541.jpg','KURTIS / Tunics','KURTIS','2020-02-10 05:00:00',2,0,'Customise/Stitch/Buy Indian Designer Kurtis & Tunics','Kurtis for Women, Branded Kurtis, Kurtis, Indian Kurti, Ladies Kurtis India, Readymade Kurtis, Designer Kurtis, Kurti Pattern Online, Online Kurtis, Indian Tunics, Printed Tunic, Buy Kurtis Online, Embroidered Kurtis, Daily Wear Kurtis','Shop from our exclusive range of customisable designer Kurtis for Women. Buy now to get exclusive discounts. Kurtis|Tunics|Kurtas|Long Tops|Indian Women Wear|Daily Wear','0','designer_blouse'),
(10,'3','LEHENGA CHOLI','LEHENGAS','2020-02-10 05:00:00',3,0,'Exclusive Designer Lehengas for Special Occasions | Sri Shringarr','Designer Lehengas, Designer Lehenga Choli, Bridal Lehenga Online, Online Lehenga Choli, Hand Embroidered Lehenga Choli, Wedding Lehenga Choli, Ghagra Choli, Lehenga Online, Lehenga, Bollywood Style Lehenga, Indian Traditional Lehengas','Discover our exclusive collection of designer lehengas at Sri Shringarr, perfect for weddings, festivals, and special events. Each piece is crafted with elegance and tradition in mind, ensuring you stand out on your special day. Explore our range of styles to find your perfect fit and make your occasion unforgettable','lehenga_choli_on_rent','designer_lehenga_choli'),
(27,'Images/1581332811.jpeg','KALAMKARI COLLECTION-ITTAR','','2020-02-10 05:00:00',2,0,'Original Hand Painted Kalamkari Outfits:Only @YosshitaNeha','Kalamkari Products, Buy kalamkari products, Kalamkari outfits, Hand painted kalamkari clothes, Kalamkari kurtis, Ittar, designer kalamkari products, designer kalamkari wear, indian wear, handcraft, Handwork kurtis,Make in India,Indian Handicrafts','Get 100% original Kalamkari Outfits like Kurtis, Tunics, Skirts, Pants, Tops etc. Buy or custom design according to your style and design.','0','original_kalamkari_designer_outfits'),
(28,'3','Indo Western Outfits','','2020-02-10 05:00:00',3,0,'Stunning Indo-Western Lehengas for Rent | Sri Shringarr Fashion','Indo Western Outfits, Indo Western Wear, Women\'s Wear, Sangeet Wear, Indo Western Gowns, Indo Western Lehenga Choli, Lehenga Choli, Crop Top Skirt, Dhoti Style, Draped Gowns, Shararas','Explore the perfect fusion of tradition and modernity with our Indo-Western Lehengas available for rent at Sri Shringarr. From elegant engagements to festive celebrations, find your ideal statement piece in our carefully curated collection. Experience luxury and style, effortlessly','indo_western_lehenga_on_rent','designer_indo_western_lehengas'),
(22,'3','Evening Gowns','','2020-02-10 05:00:00',3,0,'Elegant Evening Gowns for Rent Make Special Occasions Memorable','Indian Gowns, Women Gowns, Drape Gowns, Reception Gowns, Hand Embroidered Gowns, Bridal Gowns, Floral Gowns, Evening Gowns, Designer Gowns, Ball Gown, Barbie Gown, Cinderella Gown, Attached Dupatta Gown, Evening Gown with Dupatta, Indo-Western Gown','Discover our exclusive collection of elegant gowns for rent at Sri Shringarr. Perfect for weddings, galas, and formal events, our gowns promise sophistication and style. Browse our selection to find the perfect piece that makes your special occasion truly unforgettable','gowns_on_rent\n','designer_evening_gowns'),
(29,'3','Trail Gowns / Infinity Gowns','','2020-10-25 04:00:00',3,0,'Stylish Trail Gowns for Rent | Elevate Your Look with Sri Shringarr','','Step into elegance with our stunning collection of trail gowns for rent at Sri Shringarr. Perfect for weddings, red carpets, and gala nights, each gown is designed to make you shine. Explore now and find the statement piece that speaks to your unique style','trail_gown_on_rent','designer_trail_prewedding_gowns');
/*!40000 ALTER TABLE `garments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:15:36
