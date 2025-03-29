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
-- Table structure for table `customer_login`
--

DROP TABLE IF EXISTS `customer_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_login` (
  `login_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `site` varchar(10) DEFAULT 'SN',
  `special_access` int(12) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_login`
--

LOCK TABLES `customer_login` WRITE;
/*!40000 ALTER TABLE `customer_login` DISABLE KEYS */;
INSERT INTO `customer_login` VALUES
(4228,'abc@gmail.com','123','SN',0),
(4325,'abh2v@gmaIL.COMasd','123','SN',0),
(4329,'keww1223@gmail.com','123456','SN',0),
(4330,'rajanipodar@gmail.com','1234','SN',1),
(4399,'b@gmail.com','1234','SN',0),
(4402,'d@gmail.com','123','SN',0),
(4405,'ab@gmail.com','123','SN',0),
(4575,'abr@gmail.com','1234','SN',0),
(4724,'charmishah526@gmail.com','9619727217','SN',0),
(4918,'aksmi4@gmail.com','ajay@123','SN',0),
(5001,'priyav2004@gmail.com','priyanka','SN',0),
(5095,'kvaljani@gmail.com','ilovecricket123*','SN',0),
(5102,'rahull.1612@gmail.com','927438','SN',0),
(5166,'ab@gmaol.cm','1345','SN',0),
(5180,'yosshita.neha@gmail.com','yosshita1989','SN',0),
(5201,'radha.v94@gmail.com','362157','SN',0),
(5781,'ankitajaiswal8927@gmail.com','ankita','SN',0),
(5985,'Suvadra.khuntia@gmail.com','suvadra55','SN',0),
(9872,'poojasuman27oct@gmail.com','satyam','SN',0),
(9961,'sm6141@gmail.com','ssmarketting@143','SN',0),
(10419,'kpcmr030@gmail.com','Chennai@53','SN',0),
(12965,'ankitanegi12sep@gmail.com','Omsaiblessmydadu1','SN',0),
(13669,'puja.sidh@gmail.com','8february1987','SN',0),
(14404,'madhuri.mavilla@gmail.com','madhuri@123','SN',0),
(15213,'punit.bhuwania@gmail.com','Chunmun1980','SN',0),
(15592,'jrclapes@protonmail.ch','lokk938ass1','SN',0),
(16005,'allamrajusunaina@gmail.com','Piggy19Knows','SN',0),
(16359,'bhagatritu1@gmail.com','shadi','SN',0),
(16568,'anu.raadhu@gmail.com','BuyStuff','SN',0),
(18636,'kalyani1520@gmail.com','kalyani15','SN',0),
(20058,'dsad@fds.com','qwerty','SN',0),
(20117,'satyendra1111@rediffmail.com','123456','SN',0),
(20130,'developer.ruchi@gmail.com','974886','SN',0),
(20200,'rahulsbdit2019@gmail.com','123456','SN',0),
(20202,'tejals676@gmail.com','123456','SN',0),
(20210,'yosshita.neha@gmai.com','yosshita.neha1989','SN',0),
(20241,'lanwan151@gmai.com','123456','SN',0),
(20279,'ruchi@example.com','123','SN',0),
(20631,'yadavishalyadav629@gmail.com','9619168488','SN',0),
(20650,'Vikas786@gmail.com','9619168488','SN',0),
(21300,'mehulmaru1442000@gmail.com','mehulmaru1442000','SN',0),
(21367,'ypodar@gmail.com','ypodar','SN',0),
(21592,'akhanna1973@mail.com','abhinavkhanna','SN',0),
(21601,'akhanna1973@gmail.com','abhinav','SN',0),
(41985,'anglegosar@gmail.com','jinalmakeover','SN',0),
(44729,'srushtipawar1404@gmail.com','pooja123','SN',0),
(44736,'dipishapawar@gmail.com','dipu@123','SN',0),
(45686,'poojahdalvi@gmail.com','pooja','SN',0),
(53897,'khushboovaja91@gmail.com','123456sw','SN',0),
(65739,'jyotiparmar730@gmail.com','jyoti123','SN',0),
(69017,'mansi.pimple1994@gmail.com','Mansi@25','SN',0),
(69305,'anjujaiswal315@gmail.com','anjali1006','SN',0),
(77668,'lanwan151@gmail.com','12345','SN',0),
(77733,'priti.maurya.9876@gmail.com','priti2910','SN',0),
(77902,'arti.nitjsr@gmail.com','Welcome@123','SN',0),
(78092,'swetastar007@gmail.com','sweta@1994','SN',0),
(78693,'alokrungta@yahoo.com','Log@srishringarr73','SN',0),
(78927,'vishwaaniruddh@gmail.com','qwerty121','SN',0),
(79751,'kolhe.ritul@gmail.com','Ritul@2000','SN',0),
(80185,'akruti.manjrekar96@gmail.com','9768848463','SN',0),
(81370,'aniruddhvishwa@gmail.com','root','SN',0),
(83448,'akruti.manjrekar96@gmail.com','9768848463','YN',0),
(84013,'pmaharana1994@gmail.com','priy@1204','SN',0),
(85926,'lata.sa.um@gmail.com','sachin142008','SN',0),
(89302,'manashvis2@gmail.com','manashvi97','SN',0),
(89823,'banu.noor454@gmail.com','11721A0454','SN',0),
(91687,'magnanimous.aish@gmail.com','s@r$3577#','SN',0),
(94416,'dipraj101@gmail.com','root','SN',0),
(97088,'hellbinderkumar@gmail.com','12345','SN',0),
(97104,'pratimabiswas657@gmail.com','123','SN',0),
(97145,'rajeshrungta719@gmail.com','123','SN',0),
(98790,'singhkajal418@gmail.com','kaju2373','SN',0),
(101902,'shifaumrani10@gmail.com','umrani10','SN',0),
(104165,'hellbinderkumar@gmail.com','12345','YN',0),
(114077,'gaurangisingh789@gmail.com','8QK2FpW7pJvhakr','SN',0),
(120060,'paridhijalan304@gmail.com','gunja1901','SN',0),
(127576,'nishushah08@gmail.com','Akshay4886','SN',0),
(130305,'karimpirani21@gmail.com','karim21@','SN',0),
(130518,'aishu8077@gmail.com','Anu','SN',0),
(130771,'asharanisagar@gmail.com','Sagar@2002','SN',0),
(130822,'vidyashirsat@gmail.com','vidya9vidya9','SN',0),
(130981,'guneet1205@gmail.com','arshiya','SN',0),
(131550,'parastejani7@gmail.com','TaParas@2015','SN',0),
(131739,'gaurihl@gmail.com','ghl261093$$$','SN',0),
(131928,'sangeeta_p30@rediffmail.com','Sri@30','SN',0),
(131972,'drishiaggarwal490@gmail.com','.jaimaaa1','SN',0),
(132607,'rahul.agarwal.samurai@gmail.com','rahuleglewedding','SN',0),
(132981,'tejashreekendre@gmail.com','Teju.1811','SN',0),
(133782,'shrutikanoria89@gmail.com','Shriti@1','SN',0),
(139501,'divyavimal86@gmail.com','bharti@123','SN',0),
(140230,'manisha.surekha@gmail.com','1134','SN',0),
(141899,'poojashah99300@gmail.com','poojashah','SN',0),
(143103,'gouri005@gmail.com','rentdress7','SN',0),
(143827,'shivi97kr@gmail.com','krishnaji','SN',0),
(144351,'varshalipawar7@gmail.com','123456','SN',0),
(144984,'vobbalareddyanusha@gmail.com','Anusha31395$','YN',0),
(146123,'shrivastavamuskan322@gmail.com','mummy@12345','SN',0),
(148254,'renumehta31105@gmail.com','renuraj143','SN',0),
(149064,'riddhi.m21@gmail.com','Ridz@211294','SN',0),
(152402,'ladakal3kc6+1203@inbox.ru','Mike Oreon https://ijrfpioqqerjw.com 123','YN',0),
(153900,'pallavivora65@gmail.com','PALLU','SN',0),
(170097,'govjobalerts.in@gmail.com','Piyu@0110','YN',0),
(175673,'shrushti.mehta024@gmail.com','2299@abcd','YN',0),
(176977,'sahaanish40@gmail.com','Password@25','YN',0),
(187010,'facwq@gmail.com','cghsdddgnm','YN',0),
(189076,'geetsing@yahoo.co.in','12345678','YN',0),
(193203,'farhanasattar3@yahoo.com','nath','YN',0),
(198295,'ypodar@gmail.com','ypodar','YN',0),
(198325,'vishwaaniruddh@gmail.com','qwerty121','YN',0),
(200447,'gaurvibishnoi1607@gmail.com','Gaurvi@1234','YN',0),
(229775,'vishwaprewed@gmail.comtest','12345qwerty','SN',0),
(234701,'edititmedia@gmail.com','9768848463','YN',0),
(235325,'facebookleads2809@gmail.com','ypodar','YN',0),
(235356,'shivanirungta2012@gmail.com','ypodar','YN',0),
(235565,'vishwaprewed@gmail.com','qwerty121','SN',0),
(235593,'littlechinx2001@gmail.com','ypodar','SN',0),
(237665,'maladeep17@gmail.com','July@2023','SN',0),
(238868,'edititmedianetwork@gmail.com','9768838463','YN',0),
(238888,'edititmedia@gmail.com','9768848463','SN',0),
(242456,'ritvikvishwakarma80@gmail.com','qwerty121','YN',0),
(243621,'archanamkamble11@gmail.com','Archu@1234','SN',0),
(245454,'chinchalikarmanasi@gmail.com','manasic94','SN',0),
(246471,'aafreena540@gmail.com','Afreen@1995','SN',0),
(250526,'ptejal5@gmail.com','Sagjal2317','SN',0),
(255628,'mbnaviwala@gmail.com','mehju123','SN',0),
(268305,'facebookleads2809@gmail.com','facebookleads2809@gmail.com','SN',0),
(268311,'sakartradelink@gmail.com','sakartradelink@gmail.com','SN',0),
(269114,'maks9in@gmail.com','maks9in@gmail.com','SN',0),
(269121,'ankitaladva6@gmail.com','Wedding@123','SN',0),
(269378,'shweta4592mis@gmail.com','shweta4592mis@gmail.com','SN',0),
(274091,'manojkumarem@gmail.com','Google321@#','SN',0),
(274428,'vishwaaniruddh@gmail.com','Google321@#','SN',0),
(275046,'prabir.d06@gmail.com','Google321@#','SN',0),
(284080,'truptigaikwad11@gmail.com','Google321@#','SN',0),
(284101,'dhvanijani7@gmail.com','Google321@#','SN',0),
(284403,'work.rajeshb@gmail.com','Google321@#','SN',0),
(284414,'biswasrajesh@myyahoo.com','123456789','SN',0),
(284479,'dhvanijani@ymail.com','Dhvani@91','SN',0),
(284605,'sarsoftwaresolutions@gmail.com','Dhvani91','SN',0),
(284610,'yagneshpurohit88@gmail.com','Dhvan@91','SN',0),
(286256,'meghamakeover7@gmail.com','123456','SN',0),
(289134,'gnitesh143@gmail.com','sedMyq-mawxin-1dahri','SN',0),
(289732,'mam4ta@gmail.com','@Mishra#Mamta04','SN',0),
(291918,'ovi.crypto2023@gmail.com','ovicrypto2023@gmail.com','SN',0),
(292322,'sanamika126@gmail.com','9930024499','SN',0),
(296906,'gaonkar.pooja12356@gmail.com','Poojag','SN',0),
(298419,'praptisarkar96@gmail.com','Rpqs@2024','SN',0),
(308213,'priyamhatre0129@gmail.com','priya','SN',0),
(308584,'riachaurasia21@gmail.com','riaprashant8913','SN',0),
(309202,'riachaurasia21@gmail.com','Google321@#','SN',0),
(311110,'smanan1998@gmail.com','Google321@#','SN',0),
(311300,'gkhushboo1709@gmail.com','khush1709','SN',0),
(311307,'justvin_18@hotmail.com','Vibha@99','SN',0),
(311346,'kananshah28@gmail.com','Kanan28 happ#','SN',0),
(311746,'ansarigulafsha165@gmail.com','sohailking','SN',0),
(317389,'minniebhatt01@gmail.com','friends.01','SN',0),
(317390,'minniebhatt01@gmail.com','Google321@#','SN',0),
(320027,'bharatipawar1501@gmail.com','Jadu@2615','SN',0),
(321160,'iamvikask1981@gmail.com','Vk@9470429285','SN',0),
(324892,'kausarkhan13041976@gmail.com','areenamoti123','SN',0),
(327946,'seenu.varghese@gmail.com','24frames','SN',0),
(329579,'koli.pooja4444@gmail.com','Pooja@1997#','SN',0),
(329581,'koli.pooja4444@gmail.com','Google321@#','SN',0),
(331121,'khatoonrezwana63@gmail.com','Aliza1111','SN',0),
(334278,'daizylilani0811@gmail.com','Google321@#','SN',0),
(334879,'rajputkajol23@gmail.com','Kajol@123','SN',0),
(334882,'rajputkajol23@gmail.com','Google321@#','SN',0),
(336496,'priyakarotra45@gmail.com','hello','SN',0),
(340202,'vaishnavipathak0917@gmail.com','Nidhi@6776','SN',0),
(378223,'aayushshariyamtbvlogs@gmail.com','Google321@#','SN',0),
(545582,'jkumari64627@gmail.com','Google321@#','SN',0);
/*!40000 ALTER TABLE `customer_login` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-29  9:15:21
