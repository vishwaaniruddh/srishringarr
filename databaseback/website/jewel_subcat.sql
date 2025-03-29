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
-- Table structure for table `jewel_subcat`
--

DROP TABLE IF EXISTS `jewel_subcat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jewel_subcat` (
  `subcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `mcat_id` int(10) NOT NULL,
  `categories_name` varchar(100) NOT NULL,
  `desc` varchar(300) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(250) NOT NULL,
  `discount` int(11) NOT NULL,
  `meta_title` varchar(250) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  PRIMARY KEY (`subcat_id`),
  KEY `idx_categories_parent_id` (`categories_name`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jewel_subcat`
--

LOCK TABLES `jewel_subcat` WRITE;
/*!40000 ALTER TABLE `jewel_subcat` DISABLE KEYS */;
INSERT INTO `jewel_subcat` VALUES
(1,3,'Necklace Sets','','2016-12-23 14:19:50','Images/16380898420.jpg',70,'Buy Best Designer Semi Precious Art Jewelry from India','Necklace Sets, Bridal Sets, Choker Sets, Indian Traditional Jewelry, Green Kundan Set, Sabyasachi Style Jewelry, Padmavat Set, Deepika Wedding Jewelry, Meenakari Necklace Set, Long Set, CZ Jewelry, American Diamond, Necklace Set with Earring/Tikka, Bridal Jewelry','Buy from one of the widest collections of Art Jewellery in India. YosshitaNeha specializes in Bridal Sets, Kundan Sets, Meenakari Jewelry, CZ/American Diamond, Temple Jewelry, Vilandi, Polki Set '),
(14,3,'DAMINI / MATHAPATTI','','2017-04-08 05:58:30','Images/1580732843.jpg',70,'Rent Stunning Mathapatti for Lehengas | Sri Shringarr Adornments','','Rent mathapatti that match your lehenga to enhance your look from the exquisite collection of mathapatti at Sri Shringarr. Find the perfect headpiece from traditional to contemporary designs to complete your wedding or festive attire. Browse now to discover your crowning glory'),
(12,2,'Nath','','2017-04-06 17:06:50','Images/1580735127.jpg',70,'','',''),
(11,3,'BORLAS','','2017-04-06 17:06:38','Images/1580732934.jpg',70,'Rent Rajasthani Style Borla Online | Sri Shringarr Traditional Elegance','','Step into the regal beauty of Rajasthan with our exclusive Rajasthani style Borla for rent at Sri Shringarr. These traditional headpieces are perfect for weddings and cultural events and add a royal touch to any ensemble. Browse our collection to find the ideal Borla for your next special occasion'),
(17,3,'Earrings','','2017-04-29 09:58:09','Images/1582202254.jpg',70,'','',''),
(18,2,'RINGS','','2017-05-01 11:51:12','Images/1582727722.jpg',70,'','',''),
(15,3,'KAMAR PATTA','','2017-04-19 09:55:23','Images/1580733493.jpg',70,'Rent Traditional Kamarpatta | Kamarbandh | Sri Shringarr Cultural Attire','','Enhance your traditional look with Sri Shringarr\'s Kamarpatta/Kamar Bandh collection for rent. Perfect for weddings and cultural events, our Kamarpattas add elegance and authenticity to any outfit. Browse our selection today to find the ideal piece for your special occasion.'),
(19,3,'TIKKA','','2017-05-01 11:52:59','Images/1582727549.jpg',70,'Elegant Mangtikka for Rent | Sri Shringarr Bridal Accessories','','Adorn your bridal look with Sri Shringarr\'s exquisite Mangtikka collection available for rent. From traditional to contemporary designs, find the perfect piece to enhance your beauty on your wedding day. Explore our selection now and add a touch of elegance to your ensemble'),
(20,3,'PAYAL / PAG PAN','','2017-05-01 12:01:42','Images/1580733786.jpg',70,'Bridal Payal for Rent | Sri Shringarr Traditional Foot Jewellery','','Step into elegance with Sri Shringarr\'s collection of Bridal Payal available for rent. Our carefully curated selection embodies tradition and beauty, perfect for completing your wedding attire. Discover the charm of our designs and find the perfect Payal to grace your special day'),
(21,3,'BANGLES','','2017-05-01 12:02:44','Images/1580733807.jpg',70,'','',''),
(22,3,'BRACELET','','2017-05-01 12:03:01','Images/1580733829.jpg',70,'Stylish Bracelets for Rent | Sri Shringarr Fashion Jewellery','','Find your perfect accessory with Sri Shringarr\'s collection of elegant bracelets for rent. From sophisticated designs for formal events to charming pieces for casual outings, our selection has something for every occasion. Explore our stock now.'),
(23,3,'HATH PHOOL','','2017-05-29 06:20:07','Images/1580732784.jpg',70,'Bridal Hathphool for Rent | Sri Shringarr Hand Jewellery Collection','','Grace your hands with the elegance of Bridal Hathphool from Sri Shringarr\'s exclusive collection available for rent. Perfect for weddings and special occasions. Explore our selection to find the perfect piece for you.'),
(24,3,'PENDANT SET','','2017-06-10 09:42:24','Images/1580731906.jpg',70,'Beautiful Pendant Sets for Rent | Sri Shringarr Exclusive Collection','','Discover the perfect pendant set for your next special occasion with Sri Shringarr. Our rental collection features luxurious and stylish designs to complement any outfit. Ideal for weddings, parties, and events. Browse now to find your statement piece'),
(25,3,'BAJU BANDH','','2017-06-10 11:18:29','Images/1580731473.jpg',70,'Traditional Baju Bandh for Rent | Sri Shringarr Armlet Collection','','Adorn your arms with the elegance of traditional Baju Bandh from Sri Shringarr. Our exquisite collection, available for rent, adds a royal touch to any ethnic attire. Perfect for weddings and cultural festivities. Explore our designs now'),
(26,3,'MALA','','2017-06-14 09:32:43','Images/1582727810.jpg',70,'Stylish Long Mala for Rent | Sri Shringarr Jewellery','','Adorn your sarees with Sri Shringarr\'s Mala collection, available for rent. Our selection is perfect for any occasion that calls for a touch of elegance. Discover your ideal piece '),
(27,3,'HAIR ACCESSORIES','','2017-06-16 06:53:36','Images/1580731435.jpg',70,'Stunning Hair Accessories for Rent | Sri Shringarr Beauty Enhancements','','Transform your hairstyle with Sri Shringarr\'s collection of elegant hair accessories available for rent. From sparkling chotis to stylish brooches, find the perfect piece to elevate your look for weddings, parties, and special occasions. Explore our selection '),
(29,3,'BRIDAL JEWELLERY','','2023-06-16 11:37:42','Images/16884698920.jpg',70,'Exquisite Bridal Jewellery for Rent | Sri Shringarr Wedding Collection','','Find your dream bridal jewellery at Sri Shringarr. Our rental collection features stunning pieces designed to complement your wedding attire perfectly. From elegant necklaces to dazzling bangles, explore our selection to make your special day even more memorable');
/*!40000 ALTER TABLE `jewel_subcat` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:15:38
