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
-- Table structure for table `subcat1`
--

DROP TABLE IF EXISTS `subcat1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcat1` (
  `subcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `maincat_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `desc` varchar(300) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` int(10) NOT NULL,
  `discount` int(11) NOT NULL,
  `url` varchar(500) NOT NULL,
  `yn_url` varchar(100) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  PRIMARY KEY (`subcat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcat1`
--

LOCK TABLES `subcat1` WRITE;
/*!40000 ALTER TABLE `subcat1` DISABLE KEYS */;
INSERT INTO `subcat1` VALUES
(1,1,'Antique','2016-12-23 14:21:02','Some desc','../Images/1712132763.jpg',1,0,'antique_jewellery_on_rent_in_mumbai','antique_necklace_set','Exclusive Antique Jewellery for Rent in Mumbai | Sri Shringarr Treasures','','Discover he timeless elegance of our antique jewellery collection available for rent in Mumbai at Sri Shringarr. From classic pieces to rare finds, elevate your special occasions with our handpicked selection. Experience the charm and heritage of exquisite craftsmanship today.'),
(2,1,'American Diamond','2017-02-07 11:17:50','','Images/1582201948.jpg',1,0,'american_diamond_necklace_on_rent','american_diamond_set','Grand American Diamond Necklaces for Rent | Sri Shringarr Elegance','','Adorn yourself with the sparkle of opulence. Browse our exquisite collection of American Diamond necklaces for rent at Sri Shringarr. Perfect for any glamorous occasion, find the piece that completes your look with sophistication and brilliance.'),
(3,1,'Kundan','2017-02-07 11:18:14','','Images/1582199110.jpg',1,0,'kundan_bridal_set_on_rent','kundan_bridal_set','Exquisite Kundan Bridal Jewelry Sets for Rent | Sri Shringarr Fashion','','Browse our stunning collection of Kundan bridal jewelry sets available for rent at Sri Shringarr. Elevate your wedding look with our exquisite, handcrafted pieces. Click to explore our elegant designs and make your special day unforgettable.'),
(4,1,'Vilandi / Polki','2017-02-07 11:18:28','','Images/1582105200.jpg',1,0,'rent_vilandi_necklace_set','vilandi_polki_necklace_set','Elegant Vilandi Necklace Sets for Rent | Sri Shringarr Collections','','Discover the perfect blend of tradition and style with Sri Shringarr\'s Vilandi necklace sets for rent. Each piece is curated to add a touch of sophistication to your special occasions. Explore our collection now and find your ideal match!'),
(5,1,'Silver','2017-02-07 11:18:39','','',0,0,'','','','',''),
(6,1,'Imitation','2017-02-07 11:18:57','','Images/1581337587.jpg',1,0,'imitation_jewellery_on_rent','imitation_necklace_set','Rent Stunning Imitation Jewellery | Sri Shringarr','','Explore a wide array of exquisite imitation jewellery for rent at Sri Shringarr. Find the perfect piece to complement your special occasion attire without the high cost of ownership'),
(67,22,'BRACELET','2017-05-01 12:10:05','','Images/1582723527.jpg',1,0,'bracelet_on_rent','bracelets','','',''),
(65,20,' Payal / Pag Pan','2017-05-01 12:05:43','','Images/1582723217.jpg',1,0,'rent_bridal_payal','payal_set','','',''),
(52,12,'NATH','2017-04-07 06:22:56','','Images/1582719467.jpg',1,0,'','bridal_nosering_nath','','',''),
(66,21,'BANGLES','2017-05-01 12:09:44','','Images/1582723368.jpg',1,0,'rent_bridal_bangles','bangles_kadas','Elegant Bridal Bangles for Rent | Sri Shringarr Wedding Collection','','Accentuate your bridal look with Sr Shisringarr\'s exquisite collection of bridal bangles available for rent. Our exclusive collection features elegant and traditional designs to complement your wedding attire. Explore our selection today to find the perfect bangles'),
(63,19,'TIKKAS','2017-05-01 11:56:26','','Images/1582727645.jpg',1,0,'rent_mangtikka','designer_mangtikka','','',''),
(59,17,'EARRINGS','2017-04-29 09:58:47','','Images/1582721157.jpg',1,0,'rent_earrings','earrings','Traditional Gold-Polished Earrings for Rent | Sri Shringarr Collection','','Embrace timeless beauty with Sri Shringarr\'s traditional Gold-Polished earrings for rent. Our collection features exquisite designs perfect for weddings, festivities, and special occasions. Find your ideal piece today'),
(57,14,'DAMINI / MATHAPATTI','2017-04-24 06:33:38','','Images/1582721932.jpg',1,0,'rent_mathapatti_on_lehenga','mathapathi_damini','','',''),
(56,15,'KAMAR PATTA','2017-04-19 09:55:46','','Images/1582721831.jpg',1,0,'rent_kamarpatta','designer_kamarpatta','','',''),
(53,11,'BORLAS','2017-04-07 06:24:24','','Images/1582720371.jpg',1,0,'rent_rajasthani_style_borla','rajasthani_borlas','','',''),
(73,27,'HAIR ACCESSORIES','2017-06-16 06:54:25','','Images/1582727214.jpg',1,0,'rent_hair_accessories','hair_accessories','','',''),
(72,26,'MALA','2017-06-14 09:33:07','','Images/1582726974.jpg',1,0,'rent_mala_long_necklace','mala_necklace_set','','',''),
(71,25,'BAJU BANDH','2017-06-10 11:18:59','','',1,0,'baju_bandh','','','',''),
(70,24,'PENDANT SET','2017-06-10 09:42:53','','Images/1582723669.jpg',1,0,'rent_pendant_set','pendant_set','','',''),
(68,1,'South Indian Set','2017-05-11 13:03:03','','Images/1581332378.jpeg',1,0,'south_indian_jewellery_on_rent','south_indian_jewellery','Authentic South Indian Jewellery for Rent | Sri Shringarr Elegance','','Immerse in the tradition with Sri Shringarr\'s South Indian jewellery for rent. Explore our handpicked collection of authentic pieces perfect for weddings and festivities. Rent your favorite design today!'),
(69,23,'HATH PANJA ','2017-05-29 06:20:23','','Images/1582723595.jpg',1,0,'bridal_hathphool_on_rent','hathphool_set','','',''),
(60,18,'RINGS','2017-05-01 11:51:58','','Images/1582721711.jpg',1,0,'','big_finger_rings','','',''),
(74,17,'Diamond','2020-02-10 08:33:16','','Images/1582721357.jpg',1,0,'rent_diamond_earrings','diamond_earrings','Elegant American Diamond Earrings for Rent | Sri Shringarr Fashion Studio','','Browse the sparkle of American Diamond earrings available for rent at Sri Shringarr. Perfect for any occasion, from weddings to galas, our collection combines elegance with sophistication. Find your dazzling pair today.'),
(75,17,'Kundan','2020-02-10 11:04:32','','Images/1582721489.jpg',1,0,'rent_kundan_bridal_earrings','kundan_earrings','Rent Kundan Bridal Earrings | Luxurious Wedding Accessories | Sri Shringarr','','Complete your bridal look with Sri Shringarr\'s luxurious Kundan earrings for rent. Our selection features exquisite designs that blend tradition with elegance, perfect for your special day. Browse now to find the ultimate statement piece for your wedding.'),
(76,17,'Vilandi','2020-02-10 11:04:43','','Images/1582721302.jpg',1,0,'rent_vilandi_earrings','traditional_vilandi_earrings','','',''),
(77,17,'Antique','2020-02-10 11:04:48','','Images/1582720957.jpg',1,0,'antique_earrings_on_rent','antique_designer_earrings','Antique Earrings for Rent | Vintage Charm | Sri Shringarr','','Style your outfit with Sri Shringarr\'s collection of antique earrings available for rent. From timeless elegance to vintage charm, our curated selection is perfect for making a statement at any event. Explore now and find your pair of history-inspired elegance'),
(78,17,'Imitation','2020-07-21 09:28:22','','Images/1606564028.jpg',1,0,'rent_earrings_imitation_jewellery','imitation_earrings','','',''),
(79,17,'Oxidized','2020-07-21 09:46:37','','Images/1606564191.jpg',1,0,'rent_oxidized_earrings','oxidized_earrings','Stunning Oxidized Earrings for Rent | Sri Shringarr Fashion Finds','','Explore Sri Shringarr\'s collection of captivating oxidized earrings for rent, perfect for adding a touch of bohemian chic to any outfit. Whether you\'re attending a wedding or a casual event, our unique selection is designed to make a statement'),
(80,17,'BUGADI','2020-11-28 09:26:09','','Images/1606563806.jpg',1,0,'bugadi_earring_on_rent','bugadi_set','Traditional Bugadi Earrings for Rent | Sri Shringarr Fashion','','Add a touch of Maharashtrian tradition to your look with our exquisite Bugadi earrings for rent at Sri Shringarr. Crafted to perfection, these earrings are the ideal accessory for weddings and cultural celebrations. Explore our collection to find your perfect match'),
(82,29,'BRIDAL JEWELLERY','2023-06-16 11:38:46','','',1,0,'bridal_jewellery','','','','');
/*!40000 ALTER TABLE `subcat1` ENABLE KEYS */;
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
