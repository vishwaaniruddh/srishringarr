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
-- Table structure for table `sub_menu`
--

DROP TABLE IF EXISTS `sub_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_menu` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `main_menu` int(10) DEFAULT NULL,
  `sub_menu` varchar(60) DEFAULT NULL,
  `page` varchar(500) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `folder` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page` (`page`),
  UNIQUE KEY `sub_menu` (`sub_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_menu`
--

LOCK TABLES `sub_menu` WRITE;
/*!40000 ALTER TABLE `sub_menu` DISABLE KEYS */;
INSERT INTO `sub_menu` VALUES
(1,4,'Add New User','adduser.php',1,''),
(2,4,'View User','viewuser.php',1,''),
(3,5,'Approval','approval.php',1,'reports'),
(4,5,'Approval Return','app_return.php',1,'reports'),
(5,5,'Approval Return Report','approval_return_report.php',1,'reports'),
(6,5,'Consolidate Sales Report (Customer Wise)','custsales_report.php',1,'reports'),
(7,5,'Consolidate Sales Report (Item Wise)','item_sales_report.php',1,'reports'),
(8,5,'Consolidate Sales Report (Category Wise)','catagorysales_report.php',1,'reports'),
(9,5,'Consolidate Rent Report (Customer Wise)','custrent_report1.php',1,'reports'),
(10,5,'Consolidate Rent Report (Item Wise)','item_rent_report.php',1,'reports'),
(11,5,'Consolidate Rent Report (Category Wise)','catagoryrent_report.php',1,'reports'),
(12,5,'Rent','rent.php',1,'reports'),
(13,5,'Rent Return','rent_return_new.php',1,'reports'),
(14,5,'Booking Status','bookingreport.php',1,'reports'),
(15,5,'Scheme','rent1.php',1,'reports'),
(16,5,'Scheme Return','rent_return1.php',1,'reports'),
(17,5,'Approval Reports','appReport.php',1,'reports'),
(18,5,'Sales Report','saleReport.php',1,'reports'),
(19,5,'Rent Reports','rentReport.php',1,'reports'),
(20,5,'Stock Report','stock.php',1,'reports'),
(21,5,'Commission Reports','commReport.php',1,'reports'),
(22,5,'Customer Balance Amount Reports','balance_amount.php',1,'reports'),
(23,5,'Customer Rent Balance Amount Reports','rent_amount.php',1,'reports'),
(24,6,'Supplier\'s Bill Entry','purchase_entry.php',1,'purchase'),
(25,6,'View Supplier\'s Bill','view_bills.php',1,'purchase'),
(26,6,'View Supplier\'s Payments','view_payments.php',1,'purchase'),
(27,6,'Add Supplier','add_supplier.php',1,'purchase'),
(28,6,'View Supplier\'s','view_supplier.php',1,'purchase'),
(29,7,'Bank Transactions','bank_entry.php',1,'purchase'),
(30,7,'Bank Report','bank_report.php',1,'purchase'),
(31,7,'Reconcile Bank Transactions','bank_concile.php',1,'purchase'),
(32,8,'Sales','approvalnew.php',1,'reports'),
(33,8,'GST Sales','approvalnew1.php',1,'reports'),
(34,8,'GST Rent ','rentnew.php',1,'reports'),
(35,9,'Itemcode Details','itemcode_details.php',1,''),
(36,1,'Dashboard','index.php',1,''),
(37,1,'Customer List','custLst.php',1,'reports'),
(38,1,'SKU Price','sku-price.php',1,''),
(39,5,'Fyrobe Rent','flyrobe.php',1,'reports'),
(40,5,'PDF MAKER','pdfmaker.php',1,'reports'),
(41,10,'Measurements Type','measurementsType.php',1,'measurements'),
(42,10,'Set Measurements ','measurementCategory.php',1,'measurements'),
(43,11,'View Pre Rented','viewprerentedprice.php',1,'reports'),
(44,11,'Edit Rent Bill','editRentBill.php',1,'reports'),
(45,11,'GST Rent Data','ssfs_format_rent_view.php',1,''),
(46,11,'SS - GST Sales Data','ssfs_format_sales_view.php',1,''),
(47,11,'SSFS Rent','commission.php',1,'reports');
/*!40000 ALTER TABLE `sub_menu` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:12:58
