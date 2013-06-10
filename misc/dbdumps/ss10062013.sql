-- MySQL dump 10.13  Distrib 5.5.29, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: skillseeker
-- ------------------------------------------------------
-- Server version	5.5.29-0ubuntu0.12.04.1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `skillseeker`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `skillseeker` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `skillseeker`;

--
-- Table structure for table `admin_result_display_type`
--

DROP TABLE IF EXISTS `admin_result_display_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_result_display_type` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `created_on` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_result_display_type`
--

LOCK TABLES `admin_result_display_type` WRITE;
/*!40000 ALTER TABLE `admin_result_display_type` DISABLE KEYS */;
INSERT INTO `admin_result_display_type` VALUES (1,' Off','1','2013-05-08 18:03:41','2013-05-08 12:33:41'),(2,' Email score only','1','2013-05-08 18:03:41','2013-05-08 12:33:41'),(3,'Email score, and incorrectly answered questions on','1','2013-05-08 18:03:41','2013-05-08 12:33:41'),(4,'Email score, and all answered questions','1','2013-05-08 18:03:42','2013-05-08 12:33:42');
/*!40000 ALTER TABLE `admin_result_display_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assign_details`
--

DROP TABLE IF EXISTS `assign_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assign_details` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `link` varchar(200) NOT NULL,
  `email_address` varchar(60) NOT NULL,
  `status` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `created_on` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assign_details`
--

LOCK TABLES `assign_details` WRITE;
/*!40000 ALTER TABLE `assign_details` DISABLE KEYS */;
INSERT INTO `assign_details` VALUES (3,' http://www.skillseeker.com/online-test/start/?id=1&time=132568852','mohit.gupta@osscube.com','1','2013-05-10 04:27:11','0000-00-00 00:00:00'),(4,' http://www.skillseeker.com/online-test/start/?id=1&time=132568852','mohit@osscube.com','1','2013-05-10 04:51:26','0000-00-00 00:00:00'),(5,'http://www.skillseeker.com/online-test/start/?id=1&time=132568852','test@1234.com','1',NULL,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `assign_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_id` bigint(11) unsigned NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `category_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'javascript',1,'0000-00-00 00:00:00','2013-05-11 13:56:17','1'),(2,'php',1,'0000-00-00 00:00:00','2013-05-11 13:56:17','1'),(4,'JQuery',1,NULL,'2013-05-11 13:59:44','1');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Aruba','2013-05-05 20:29:01'),(2,'Afghanistan','2013-05-05 20:29:01'),(3,'Angola','2013-05-05 20:29:01'),(4,'Anguilla','2013-05-05 20:29:01'),(5,'Albania','2013-05-05 20:29:01'),(6,'Andorra','2013-05-05 20:29:01'),(7,'Netherlands Antilles','2013-05-05 20:29:01'),(8,'United Arab Emirates','2013-05-05 20:29:01'),(9,'Argentina','2013-05-05 20:29:01'),(10,'Armenia','2013-05-05 20:29:01'),(11,'American Samoa','2013-05-05 20:29:01'),(12,'Antarctica','2013-05-05 20:29:01'),(13,'French Southern territories','2013-05-05 20:29:01'),(14,'Antigua and Barbuda','2013-05-05 20:29:01'),(15,'Australia','2013-05-05 20:29:01'),(16,'Austria','2013-05-05 20:29:01'),(17,'Azerbaijan','2013-05-05 20:29:01'),(18,'Burundi','2013-05-05 20:29:01'),(19,'Belgium','2013-05-05 20:29:01'),(20,'Benin','2013-05-05 20:29:01'),(21,'Burkina Faso','2013-05-05 20:29:01'),(22,'Bangladesh','2013-05-05 20:29:01'),(23,'Bulgaria','2013-05-05 20:29:01'),(24,'Bahrain','2013-05-05 20:29:01'),(25,'Bahamas','2013-05-05 20:29:01'),(26,'Bosnia and Herzegovina','2013-05-05 20:29:01'),(27,'Belarus','2013-05-05 20:29:01'),(28,'Belize','2013-05-05 20:29:01'),(29,'Bermuda','2013-05-05 20:29:01'),(30,'Bolivia','2013-05-05 20:29:01'),(31,'Brazil','2013-05-05 20:29:01'),(32,'Barbados','2013-05-05 20:29:01'),(33,'Brunei','2013-05-05 20:29:01'),(34,'Bhutan','2013-05-05 20:29:01'),(35,'Bouvet Island','2013-05-05 20:29:01'),(36,'Botswana','2013-05-05 20:29:01'),(37,'Central African Republic','2013-05-05 20:29:01'),(38,'Canada','2013-05-05 20:29:01'),(39,'Cocos (Keeling) Islands','2013-05-05 20:29:01'),(40,'Switzerland','2013-05-05 20:29:01'),(41,'Chile','2013-05-05 20:29:01'),(42,'China','2013-05-05 20:29:01'),(43,'Côte d’Ivoire','2013-05-05 20:29:01'),(44,'Cameroon','2013-05-05 20:29:01'),(45,'Congo, The Democratic Republic of the','2013-05-05 20:29:01'),(46,'Congo','2013-05-05 20:29:01'),(47,'Cook Islands','2013-05-05 20:29:01'),(48,'Colombia','2013-05-05 20:29:01'),(49,'Comoros','2013-05-05 20:29:01'),(50,'Cape Verde','2013-05-05 20:29:01'),(51,'Costa Rica','2013-05-05 20:29:01'),(52,'Cuba','2013-05-05 20:29:01'),(53,'Christmas Island','2013-05-05 20:29:01'),(54,'Cayman Islands','2013-05-05 20:29:01'),(55,'Cyprus','2013-05-05 20:29:01'),(56,'Czech Republic','2013-05-05 20:29:01'),(57,'Germany','2013-05-05 20:29:01'),(58,'Djibouti','2013-05-05 20:29:01'),(59,'Dominica','2013-05-05 20:29:01'),(60,'Denmark','2013-05-05 20:29:01'),(61,'Dominican Republic','2013-05-05 20:29:01'),(62,'Algeria','2013-05-05 20:29:01'),(63,'Ecuador','2013-05-05 20:29:01'),(64,'Egypt','2013-05-05 20:29:01'),(65,'Eritrea','2013-05-05 20:29:01'),(66,'Western Sahara','2013-05-05 20:29:01'),(67,'Spain','2013-05-05 20:29:01'),(68,'Estonia','2013-05-05 20:29:01'),(69,'Ethiopia','2013-05-05 20:29:01'),(70,'Finland','2013-05-05 20:29:01'),(71,'Fiji Islands','2013-05-05 20:29:01'),(72,'Falkland Islands','2013-05-05 20:29:01'),(73,'France','2013-05-05 20:29:01'),(74,'Faroe Islands','2013-05-05 20:29:01'),(75,'Micronesia, Federated States of','2013-05-05 20:29:01'),(76,'Gabon','2013-05-05 20:29:01'),(77,'United Kingdom','2013-05-05 20:29:01'),(78,'Georgia','2013-05-05 20:29:01'),(79,'Ghana','2013-05-05 20:29:01'),(80,'Gibraltar','2013-05-05 20:29:01'),(81,'Guinea','2013-05-05 20:29:01'),(82,'Guadeloupe','2013-05-05 20:29:01'),(83,'Gambia','2013-05-05 20:29:01'),(84,'Guinea-Bissau','2013-05-05 20:29:01'),(85,'Equatorial Guinea','2013-05-05 20:29:01'),(86,'Greece','2013-05-05 20:29:01'),(87,'Grenada','2013-05-05 20:29:01'),(88,'Greenland','2013-05-05 20:29:01'),(89,'Guatemala','2013-05-05 20:29:01'),(90,'French Guiana','2013-05-05 20:29:01'),(91,'Guam','2013-05-05 20:29:01'),(92,'Guyana','2013-05-05 20:29:01'),(93,'Hong Kong','2013-05-05 20:29:01'),(94,'Heard Island and McDonald Islands','2013-05-05 20:29:01'),(95,'Honduras','2013-05-05 20:29:01'),(96,'Croatia','2013-05-05 20:29:01'),(97,'Haiti','2013-05-05 20:29:01'),(98,'Hungary','2013-05-05 20:29:01'),(99,'Indonesia','2013-05-05 20:29:01'),(100,'India','2013-05-05 20:29:01'),(101,'British Indian Ocean Territory','2013-05-05 20:29:01'),(102,'Ireland','2013-05-05 20:29:01'),(103,'Iran','2013-05-05 20:29:01'),(104,'Iraq','2013-05-05 20:29:01'),(105,'Iceland','2013-05-05 20:29:01'),(106,'Israel','2013-05-05 20:29:01'),(107,'Italy','2013-05-05 20:29:01'),(108,'Jamaica','2013-05-05 20:29:01'),(109,'Jordan','2013-05-05 20:29:01'),(110,'Japan','2013-05-05 20:29:01'),(111,'Kazakstan','2013-05-05 20:29:01'),(112,'Kenya','2013-05-05 20:29:01'),(113,'Kyrgyzstan','2013-05-05 20:29:01'),(114,'Cambodia','2013-05-05 20:29:01'),(115,'Kiribati','2013-05-05 20:29:01'),(116,'Saint Kitts and Nevis','2013-05-05 20:29:01'),(117,'South Korea','2013-05-05 20:29:01'),(118,'Kuwait','2013-05-05 20:29:01'),(119,'Laos','2013-05-05 20:29:01'),(120,'Lebanon','2013-05-05 20:29:01'),(121,'Liberia','2013-05-05 20:29:01'),(122,'Libyan Arab Jamahiriya','2013-05-05 20:29:01'),(123,'Saint Lucia','2013-05-05 20:29:01'),(124,'Liechtenstein','2013-05-05 20:29:01'),(125,'Sri Lanka','2013-05-05 20:29:01'),(126,'Lesotho','2013-05-05 20:29:01'),(127,'Lithuania','2013-05-05 20:29:01'),(128,'Luxembourg','2013-05-05 20:29:01'),(129,'Latvia','2013-05-05 20:29:01'),(130,'Macao','2013-05-05 20:29:01'),(131,'Morocco','2013-05-05 20:29:01'),(132,'Monaco','2013-05-05 20:29:01'),(133,'Moldova','2013-05-05 20:29:01'),(134,'Madagascar','2013-05-05 20:29:01'),(135,'Maldives','2013-05-05 20:29:01'),(136,'Mexico','2013-05-05 20:29:01'),(137,'Marshall Islands','2013-05-05 20:29:01'),(138,'Macedonia','2013-05-05 20:29:01'),(139,'Mali','2013-05-05 20:29:01'),(140,'Malta','2013-05-05 20:29:01'),(141,'Myanmar','2013-05-05 20:29:01'),(142,'Mongolia','2013-05-05 20:29:01'),(143,'Northern Mariana Islands','2013-05-05 20:29:01'),(144,'Mozambique','2013-05-05 20:29:01'),(145,'Mauritania','2013-05-05 20:29:01'),(146,'Montserrat','2013-05-05 20:29:01'),(147,'Martinique','2013-05-05 20:29:01'),(148,'Mauritius','2013-05-05 20:29:01'),(149,'Malawi','2013-05-05 20:29:01'),(150,'Malaysia','2013-05-05 20:29:01'),(151,'Mayotte','2013-05-05 20:29:01'),(152,'Namibia','2013-05-05 20:29:01'),(153,'New Caledonia','2013-05-05 20:29:01'),(154,'Niger','2013-05-05 20:29:01'),(155,'Norfolk Island','2013-05-05 20:29:01'),(156,'Nigeria','2013-05-05 20:29:01'),(157,'Nicaragua','2013-05-05 20:29:01'),(158,'Niue','2013-05-05 20:29:01'),(159,'Netherlands','2013-05-05 20:29:01'),(160,'Norway','2013-05-05 20:29:01'),(161,'Nepal','2013-05-05 20:29:01'),(162,'Nauru','2013-05-05 20:29:01'),(163,'New Zealand','2013-05-05 20:29:01'),(164,'Oman','2013-05-05 20:29:01'),(165,'Pakistan','2013-05-05 20:29:01'),(166,'Panama','2013-05-05 20:29:01'),(167,'Pitcairn','2013-05-05 20:29:01'),(168,'Peru','2013-05-05 20:29:01'),(169,'Philippines','2013-05-05 20:29:01'),(170,'Palau','2013-05-05 20:29:01'),(171,'Papua New Guinea','2013-05-05 20:29:01'),(172,'Poland','2013-05-05 20:29:01'),(173,'Puerto Rico','2013-05-05 20:29:01'),(174,'North Korea','2013-05-05 20:29:01'),(175,'Portugal','2013-05-05 20:29:01'),(176,'Paraguay','2013-05-05 20:29:01'),(177,'Palestine','2013-05-05 20:29:01'),(178,'French Polynesia','2013-05-05 20:29:01'),(179,'Qatar','2013-05-05 20:29:01'),(180,'Réunion','2013-05-05 20:29:01'),(181,'Romania','2013-05-05 20:29:01'),(182,'Russian Federation','2013-05-05 20:29:01'),(183,'Rwanda','2013-05-05 20:29:01'),(184,'Saudi Arabia','2013-05-05 20:29:01'),(185,'Sudan','2013-05-05 20:29:01'),(186,'Senegal','2013-05-05 20:29:01'),(187,'Singapore','2013-05-05 20:29:01'),(188,'South Georgia and the South Sandwich Islands','2013-05-05 20:29:01'),(189,'Saint Helena','2013-05-05 20:29:01'),(190,'Svalbard and Jan Mayen','2013-05-05 20:29:01'),(191,'Solomon Islands','2013-05-05 20:29:01'),(192,'Sierra Leone','2013-05-05 20:29:01'),(193,'El Salvador','2013-05-05 20:29:01'),(194,'San Marino','2013-05-05 20:29:01'),(195,'Somalia','2013-05-05 20:29:01'),(196,'Saint Pierre and Miquelon','2013-05-05 20:29:01'),(197,'Sao Tome and Principe','2013-05-05 20:29:01'),(198,'Suriname','2013-05-05 20:29:01'),(199,'Slovakia','2013-05-05 20:29:01'),(200,'Slovenia','2013-05-05 20:29:01'),(201,'Sweden','2013-05-05 20:29:01'),(202,'Swaziland','2013-05-05 20:29:01'),(203,'Seychelles','2013-05-05 20:29:01'),(204,'Syria','2013-05-05 20:29:01'),(205,'Turks and Caicos Islands','2013-05-05 20:29:01'),(206,'Chad','2013-05-05 20:29:01'),(207,'Togo','2013-05-05 20:29:01'),(208,'Thailand','2013-05-05 20:29:01'),(209,'Tajikistan','2013-05-05 20:29:01'),(210,'Tokelau','2013-05-05 20:29:01'),(211,'Turkmenistan','2013-05-05 20:29:01'),(212,'East Timor','2013-05-05 20:29:01'),(213,'Tonga','2013-05-05 20:29:01'),(214,'Trinidad and Tobago','2013-05-05 20:29:01'),(215,'Tunisia','2013-05-05 20:29:01'),(216,'Turkey','2013-05-05 20:29:01'),(217,'Tuvalu','2013-05-05 20:29:01'),(218,'Taiwan','2013-05-05 20:29:01'),(219,'Tanzania','2013-05-05 20:29:01'),(220,'Uganda','2013-05-05 20:29:01'),(221,'Ukraine','2013-05-05 20:29:01'),(222,'United States Minor Outlying Islands','2013-05-05 20:29:01'),(223,'Uruguay','2013-05-05 20:29:01'),(224,'United States','2013-05-05 20:29:01'),(225,'Uzbekistan','2013-05-05 20:29:01'),(226,'Holy See (Vatican City State)','2013-05-05 20:29:01'),(227,'Saint Vincent and the Grenadines','2013-05-05 20:29:01'),(228,'Venezuela','2013-05-05 20:29:01'),(229,'Virgin Islands, British','2013-05-05 20:29:01'),(230,'Virgin Islands, U.S.','2013-05-05 20:29:01'),(231,'Vietnam','2013-05-05 20:29:01'),(232,'Vanuatu','2013-05-05 20:29:01'),(233,'Wallis and Futuna','2013-05-05 20:29:01'),(234,'Samoa','2013-05-05 20:29:01'),(235,'Yemen','2013-05-05 20:29:01'),(236,'Yugoslavia','2013-05-05 20:29:01'),(237,'South Africa','2013-05-05 20:29:01'),(238,'Zambia','2013-05-05 20:29:01'),(239,'Zimbabwe','2013-05-05 20:29:01');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_category`
--

DROP TABLE IF EXISTS `faq_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq_category` (
  `id` smallint(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_category`
--

LOCK TABLES `faq_category` WRITE;
/*!40000 ALTER TABLE `faq_category` DISABLE KEYS */;
INSERT INTO `faq_category` VALUES (1,'faq','2013-05-13 08:55:04'),(2,'getting started','2013-05-13 08:55:04'),(3,'create/edit','2013-05-13 08:55:04'),(4,'assign tests','2013-05-13 08:55:04'),(5,'results','2013-05-13 08:55:04'),(6,'users','2013-05-13 08:55:04'),(7,'contact us','2013-05-13 08:55:05');
/*!40000 ALTER TABLE `faq_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faqs` (
  `id` smallint(2) NOT NULL AUTO_INCREMENT,
  `faq_category` smallint(2) DEFAULT NULL,
  `faq_question` text,
  `faq_answer` text,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `faq_category` (`faq_category`),
  CONSTRAINT `faqs_ibfk_1` FOREIGN KEY (`faq_category`) REFERENCES `faq_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,1,'What is skillseeker?','skillseeker is a professional, easy-to-use online testing system, that allows you to create your own tests, in minutes.Whether you\'re testing 5 or 5000 users, skillseeker will save you those long, painful hours of creating, distributing and grading tests.You\'ll never need to re-enter questions or tests, and results are calculated instantly and accurately.\nStep 1: Create your tests\nStep 2: Assign your tests using public or private options\nStep 3: Analyze results\nIt\'s that easy.From creating a controlled \'user login\' environment, to adding tests directly to your website, skillseeker has all your bases covered.And because skillseeker is online, there\'s no software installations for you or your users, so tests can be taken instantly, 24/7.Be confident knowing the tests you create, will have the professional look you require.Register free today, and enjoy the future of online testing with skillseeker.','2013-05-13 09:15:11'),(2,1,'How do I create an account and can I have a free trial?','You can register for free with skillseeker and you’ll be able to use the system for free for 30 days. This way you can trial the system and clarify any questions you may have before making any commitments.','2013-05-13 09:15:13'),(3,1,'How do I edit the country that is associated with my account?','Go to My account.\n    Scroll down to \'Edit and view my details\' and expand this section.\n    Select the button \'Edit my details\'.\n    Use the Country drop-down list to make your required selection.\n    Enter your password in the field \'Current login password\'.\n    Select the \'Update\' button.\n    Check for a \'Success\' message and then scroll down to your details to verify the change has taken place.','2013-05-13 09:15:22'),(4,1,'How do I add extra email addresses for results to be emailed to?','Go to the My account page and scroll down to Verify extra email addresses.\n    Select View to expand this section. Note: You can also delete extra email addresses from this section of the My account page.\n    Select Add new email addresses.\n    Enter email address as per instructions and then select Send verification email.\n    Instruct the owner of the email address that they need to verify their email address. Simply click on the link displayed in the email that is sent from skillseeker.\n    Now when you assign your test via Direct link the extra email addresses (once verified) will be available for results to be sent to.\n    If the owner of the extra email address does not receive a verification email: Please check your spam/junk folder, then check with your email/IT administrator to check if they block emails from the domain skillseeker.com. In most cases adding skillseeker.com to a \'trusted\' list can resolve the problem.','2013-05-13 09:15:22'),(5,1,'Does skillseeker store my credit card details?','skillseeker does not store or process any credit card information. All transactions are processed via the highly secure WorldPay.com or PayPal.com websites.','2013-05-13 09:15:38'),(6,1,'Is my data in skillseeker kept private?','Yes, at skillseeker we take your data and privacy seriously. All data you add to skillseeker is private to your account only. You can also remove your data from skillseeker at any time.','2013-05-13 09:15:38'),(7,2,'Start testing in 3 easy steps','Step 1: Create\nStart by creating your tests, questions, categories and more under the Tests section.\n\nStep 2: Assign\nChoose to Assign (distribute) your tests via Registered user groups (where users log in via the skillseeker website) or via Direct links for non-registered users under the Assign section.\n\nStep 3: Results\nAnalyze results under the Results section instantly.\n\nNote: Manage users under the Users section.','2013-05-13 09:15:39'),(8,2,'Register for free','You can register for free with skillseeker.Simply follow these steps:\n1. Select the Register free button in the right hand panel.\n2. Choose which option is right for you - Test taker, Business administrator or Education administrator.\n3. Complete the short online form.\n\nYou can start testing immediately!\n\nTip: Don\'t forget to verify your email address so that results and other notifications can be sent to you.','2013-05-13 09:15:40'),(9,3,'getting started','skillseeker provides the ability for you to create your own tests, online. You can create as many questions and tests as you like in your skillseeker account. Each question you create is added to your Question bank and can be used in any of your tests.\n\nOnce your test has been created don\'t forget you need to Assign (distribute) it. This will allow your test takers to access the test. See the Assign section of our FAQ/Help section for more details.To create a new test:\nGo to Tests / My tests and select the Add new test link in the right hand panel.\n    Add a test name and category (categories are used to organize your tests and questions).\n    Now you can add existing questions from your Question bank by using the \'Add existing questions\' link or you can create new questions by using the \'Add new questions\' links. Any new questions you add here will also be added to your Question bank. Alternatively you can add Random question settings to have questions selected at random from your Question bank.\n    Once you have finished creating your test, you can assign it to a Registered user group or create a direct link to or embed it to your own web site via the Assign section.\n\nNote: To edit an existing test select the Manage test link under Tests / My tests.','2013-05-13 09:16:01'),(10,3,'How do I create and edit my online tests?','Create and edit tests under Tests / My tests.\n\nTo create a new test:\n\n    Go to Tests / My tests and select the Add new test link in the right hand panel.\n    Add a test name and category (categories are used to organize your tests and questions).\n    Now you can add existing questions from your Question bank by using the \'Add existing questions\' link or you can create new questions by using the \'Add new questions\' links. Any new questions you add here will also be added to your Question bank. Alternatively you can add Random question settings to have questions selected at random from your Question bank.\n    Once you have finished creating your test, you can assign it to a Registered user group or create a direct link to or embed it to your own web site via the Assign section.\n\nNote: To edit an existing test select the Manage test link under Tests / My tests.','2013-05-13 09:16:01'),(11,3,'How quickly can I setup an online test?','You can get started with skillseeker very quickly. All you need to do is:\n1. Create your questions and tests\n2. Assign (distribute) your test\n3. Analyze the results\n\nIt\'s really that easy. If you have a large number of questions you can use the import function. You can define a number of different settings so that the test is configured exactly how you want it. And you can either register your users, let them register themselves, or assign (distribute) the test via direct link to groups of non-registered users.','2013-05-13 09:16:01'),(12,3,'How do I delete a test?','Deleting a test is permanent. If the test is currently assigned to any group (either Registered user group or Direct link group), it will not be deleted. First remove the test from your groups via the Assign section, then you can delete the test.\n\nTo unassign a test from a group:\n\n    Go to Assign, find the group/test and select Edit.\n    For a Registered user group select the Unassign test button from the right hand panel. For Direct link groups select Delete group from right hand panel.\n\nTo delete the test:\n\n    Go to Tests and select Manage test.\n    Select Delete test from the right hand panel under Test tools.\n    Select Delete this test.\n\nNote: This action is permanent and cannot be undone.','2013-05-13 09:16:02'),(13,3,'How do I create and edit questions?','Create and edit questions under Tests / Question bank.\n\nTo create a question:\n\n    Select one of the Add new question links in the right hand panel.\n    Complete the question and answer fields as required.\n    Provide the score and any other required information.\n    Save the question - it is now available in your Question bank and can be used across any of your tests.\n\nTo edit an existing question use the filters in the main content area under Tests / Question bank to find the question and then select the Edit question link.\n\nTo import questions from a .txt file select the Import questions link in the right hand panel under Tests / Question bank.','2013-05-13 09:16:24'),(14,4,'Assigning (distributing) tests: Getting started','Once you have created a test (under the Tests section) you need to Assign (distribute) it in order to provide access to your test takers (users).\n\nTests can be assigned via Registered user groups or Direct link (for non-registered users). Registered user groups and Access lists (used to restrict access for tests assigned via Direct link) can be managed in the Users section.\n\nWhen you Assign a test there a number of custom settings that can be defined to meet your requirements. These include: time limits, number of attempts allowed, how many questions will be displayed per page, what feedback (if any) will be shown to users, and many more.\n\nTo assign a test go to the Assign section and select the link from the right hand panel.\n\nTo edit the assign-settings for a test that has already been assigned go to the Assign section, find the group/test and select the \'Edit\' link.','2013-05-13 09:16:25'),(15,5,'How do I view my users results?','View and analyze results under the Results section.\n\nResults can be viewed by group, test, category or user. Export results reports to Excel (TM) where you can sort and filter as required.\n\nDetailed results\n\n    Go to Results / By test and select View results.\n    Find the group you\'d like to view and select View results.\n    Scroll down the right hand panel and select the link \'Export test scores & selected answers\'.\n\nOverall score only\n\n    As above, but select the link \'Export test scores\'. - Or -\n    Go to Results / Export. Make your group / test selection and select the button \'export group results\'.','2013-05-13 09:16:25'),(16,6,'Can users be registered or unregistered to take skillseeker web-based tests?','skillseeker web-based tests can be made available to both registered and unregistered users. It\'s all down to how you Assign your test.\n\nAssigning tests to a Registered user group: This means your registered users will be able to log into skillseeker and take tests as well as review their results at any time.\n\nAssigning tests via Direct link / Embed code: This means that you can send a direct link (URL) to anyone and/or embed code within your website to have the test appear within one of your website pages. This makes the test available to non-registered users. You can provide public or private access to these links.\n\nTo learn more about how to assign your tests, please watch our video demonstration: How to assign a test.','2013-05-13 09:16:25'),(17,6,'How many users can take my tests?','Tests that have been assigned via Direct link are for non-registered users. (You can implement public or private options for tests that have been assigned via Direct link.)\n\nThere is no limit to the number of users who can take tests assigned via Direct link.\nRemember: If you wish to save results you will need to ensure you have sufficient credits available.\n\nTests can also be assigned to Registered user groups. Each skillseeker account has a limit of 1000 registered users.\nRemember: If you need to test more than 1000 users simply assign your test via Direct link.','2013-05-13 09:16:25'),(18,6,'Do my users need their own email addresses?','Users can take your online quizzes without registering an email address.','2013-05-13 09:16:58'),(19,7,'How do I contact someone at skillseeker?','You can send a message to one of our helpful team members by using the Contact us form.\n\nPlease send a detailed message and include as much information as you can to help our team answer your question.','2013-05-13 09:17:19');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multi_register_control`
--

DROP TABLE IF EXISTS `multi_register_control`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multi_register_control` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(20) DEFAULT NULL,
  `ip_register_counter` int(2) DEFAULT NULL,
  `first_register_time` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multi_register_control`
--

LOCK TABLES `multi_register_control` WRITE;
/*!40000 ALTER TABLE `multi_register_control` DISABLE KEYS */;
/*!40000 ALTER TABLE `multi_register_control` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `options` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `question_id` bigint(11) unsigned DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `created_on` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `options_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question_bank` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` VALUES (1,'PHP: Hypertext Preprocessor',31,'1','2013-05-24 04:33:58','2013-05-24 11:03:58'),(2,'Personal Hypertext Processor',31,'1','2013-05-24 04:33:58','2013-05-24 11:03:58'),(3,'Personal Home Page',31,'1','2013-05-24 04:33:58','2013-05-24 11:03:58'),(4,'Private Home Page',31,'1','2013-05-24 04:33:58','2013-05-24 11:03:58'),(5,'php processor',31,'1','2013-05-24 04:33:58','2013-05-24 11:03:58'),(6,'&quot;Hello World&quot;;',32,'1','2013-05-24 04:33:58','2013-05-24 11:03:58'),(7,'Document.Write(&quot;Hello World&quot;);',32,'1','2013-05-24 04:33:58','2013-05-24 11:03:58'),(8,'echo &quot;Hello World&quot;;',32,'1','2013-05-24 04:33:58','2013-05-24 11:03:58'),(9,'print(&acirc;€œhello world&acirc;€)',32,'1','2013-05-24 04:33:58','2013-05-24 11:03:58'),(10,'Echo &acirc;€œhello world&acirc;€',32,'1','2013-05-24 04:33:58','2013-05-24 11:03:58'),(11,'PHP: Hypertext Preprocessor',33,'1','2013-05-24 04:33:58','2013-05-24 11:03:58'),(12,'Personal Hypertext Processor',33,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(13,'Personal Home Page',33,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(14,'Private Home Page',33,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(15,'php processor',33,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(16,'&quot;Hello World&quot;;',34,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(17,'Document.Write(&quot;Hello World&quot;);',34,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(18,'echo &quot;Hello World&quot;;',34,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(19,'print(&acirc;€œhello world&acirc;€)',34,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(20,'Echo &acirc;€œhello world&acirc;€',34,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(21,'&quot;Hello World&quot;;',35,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(22,'Document.Write(&quot;Hello World&quot;);',35,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(23,'echo &quot;Hello World&quot;;',35,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(24,'print(&acirc;€œhello world&acirc;€)',35,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(25,'Echo &acirc;€œhello world&acirc;€',35,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(26,'PHP: Hypertext Preprocessor',36,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(27,'Personal Hypertext Processor',36,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(28,'Personal Home Page',36,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(29,'Private Home Page',36,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(30,'php processor',36,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(31,'&quot;Hello World&quot;;',37,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(32,'Document.Write(&quot;Hello World&quot;);',37,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(33,'echo &quot;Hello World&quot;;',37,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(34,'print(&acirc;€œhello world&acirc;€)',37,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(35,'Echo &acirc;€œhello world&acirc;€',37,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(36,'PHP: Hypertext Preprocessor',38,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(37,'Personal Hypertext Processor',38,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(38,'Personal Home Page',38,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(39,'Private Home Page',38,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(40,'php processor',38,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(41,'PHP: Hypertext Preprocessor',39,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(42,'Personal Hypertext Processor',39,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(43,'Personal Home Page',39,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(44,'Private Home Page',39,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(45,'php processor',39,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(46,'&quot;Hello World&quot;;',40,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(47,'Document.Write(&quot;Hello World&quot;);',40,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(48,'echo &quot;Hello World&quot;;',40,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(49,'print(&acirc;€œhello world&acirc;€)',40,'1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(50,'Echo &acirc;€œhello world&acirc;€',40,'1','2013-05-24 04:33:59','2013-05-24 11:03:59');
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_bank`
--

DROP TABLE IF EXISTS `question_bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_bank` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(8) unsigned DEFAULT NULL,
  `question_name` text,
  `answer` text,
  `points` float unsigned DEFAULT '0',
  `question_type` enum('1','2','3','4') NOT NULL COMMENT '1-True/false,2-objective',
  `status` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `created_on` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `question_bank_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_bank`
--

LOCK TABLES `question_bank` WRITE;
/*!40000 ALTER TABLE `question_bank` DISABLE KEYS */;
INSERT INTO `question_bank` VALUES (31,1,'What does PHP stand for?','PHP: Hypertext Preprocessor',0,'2','1','2013-05-24 04:33:58','2013-05-24 11:03:58'),(32,1,'How do you write &quot;Hello World&quot; in PHP','echo &quot;Hello World&quot;;',0,'2','1','2013-05-24 04:33:58','2013-05-24 11:03:58'),(33,1,'What PHP stand for?','PHP: Hypertext Preprocessor',0,'2','1','2013-05-24 04:33:58','2013-05-24 11:03:58'),(34,1,'How you write &quot;Hello World&quot; in PHP','echo &quot;Hello World&quot;;',0,'2','1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(35,1,'How write &quot;Hello World&quot; in PHP','echo &quot;Hello World&quot;;',0,'2','1','2013-05-24 04:33:59','2013-05-24 11:03:59'),(36,2,'What does PHP stand?','PHP: Hypertext Preprocessor',0,'2','1','2013-05-24 04:33:59','2013-05-24 11:05:36'),(37,2,'How do you write &quot;Hello&quot; in PHP','echo &quot;Hello World&quot;;',0,'2','1','2013-05-24 04:33:59','2013-05-24 11:05:36'),(38,2,'d for?','PHP: Hypertext Preprocessor',0,'2','1','2013-05-24 04:33:59','2013-05-24 11:05:36'),(39,2,'What for?','PHP: Hypertext Preprocessor',0,'2','1','2013-05-24 04:33:59','2013-05-24 11:05:36'),(40,2,'write &quot;Hello World&quot; in PHP','echo &quot;Hello World&quot;;',0,'2','1','2013-05-24 04:33:59','2013-05-24 11:05:36');
/*!40000 ALTER TABLE `question_bank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category_id` int(8) unsigned DEFAULT NULL,
  `user_id` bigint(11) unsigned NOT NULL,
  `no_of_questions` int(5) unsigned DEFAULT '0',
  `status` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `created_on` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `test_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `test_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES (1,'logical',2,1,8,'1','2013-05-10 16:22:56','2013-05-11 12:31:28'),(2,'java',1,1,4,'1',NULL,'2013-05-24 10:56:57');
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_details`
--

DROP TABLE IF EXISTS `test_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_details` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `test_id` bigint(11) unsigned NOT NULL,
  `test_start_time` datetime DEFAULT NULL,
  `test_duration` int(5) unsigned DEFAULT '0' COMMENT 'Total Time for test in Minutes/Seconds',
  `emails` text,
  `instructions` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `passing_marks` int(3) unsigned DEFAULT '0',
  `per_page_question` int(3) unsigned DEFAULT '0',
  `test_link` text,
  `certificate` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `link_expire_time` datetime DEFAULT NULL COMMENT 'The time of link after start time it will be disabled',
  `question_order` enum('R','S') DEFAULT 'S' COMMENT 'R - Random, S - Sequential',
  `go_back` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `user_result_type_id` int(2) unsigned DEFAULT NULL,
  `admin_result_type_id` int(2) unsigned DEFAULT NULL,
  `email_check` enum('0','1') DEFAULT '0' COMMENT '0 - No, 1 - Yes',
  `test_user_emails` text COMMENT 'Comma seprated list of test taker emailids',
  `status` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `created_on` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  KEY `user_result_type_id` (`user_result_type_id`),
  KEY `admin_result_type_id` (`admin_result_type_id`),
  CONSTRAINT `test_details_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`),
  CONSTRAINT `test_details_ibfk_2` FOREIGN KEY (`user_result_type_id`) REFERENCES `user_result_display_type` (`id`),
  CONSTRAINT `test_details_ibfk_3` FOREIGN KEY (`user_result_type_id`) REFERENCES `admin_result_display_type` (`id`),
  CONSTRAINT `test_details_ibfk_4` FOREIGN KEY (`admin_result_type_id`) REFERENCES `admin_result_display_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_details`
--

LOCK TABLES `test_details` WRITE;
/*!40000 ALTER TABLE `test_details` DISABLE KEYS */;
INSERT INTO `test_details` VALUES (1,1,NULL,1,NULL,'1',0,3,'http://www.skillseeker.com/online-test/start/?id=1&time=132568852','1',NULL,'S','1',1,1,'0',NULL,'1',NULL,'2013-06-10 03:30:23'),(3,2,'2013-05-24 12:00:00',60,'avni.jain@osscube.com','1',50,1,'http://www.skillseeker.com/online-test/start/?id=xIF0j_8-521SRcE3nuCOqauPjj02dzvuID3gH-Q7raE&time=8vxeLoV5vwiIKGa-bo2Ec9rBsvaCTBsGfOf4H08rqBk','1','2013-05-24 12:10:00','R','1',4,3,'1',NULL,'','2013-05-24 04:28:05','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `test_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_question_category`
--

DROP TABLE IF EXISTS `test_question_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_question_category` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `test_id` bigint(11) unsigned NOT NULL,
  `category_id` int(8) unsigned DEFAULT NULL,
  `no_of_questions` bigint(3) unsigned DEFAULT '1',
  `status` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `created_on` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `test_question_category_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`),
  CONSTRAINT `test_question_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_question_category`
--

LOCK TABLES `test_question_category` WRITE;
/*!40000 ALTER TABLE `test_question_category` DISABLE KEYS */;
INSERT INTO `test_question_category` VALUES (1,1,1,3,'1',NULL,'2013-05-11 11:54:15'),(2,1,2,5,'1',NULL,'2013-05-11 11:54:15'),(3,2,2,4,'1',NULL,'2013-05-24 10:56:57');
/*!40000 ALTER TABLE `test_question_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timezone`
--

DROP TABLE IF EXISTS `timezone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timezone` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `time_zone` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timezone`
--

LOCK TABLES `timezone` WRITE;
/*!40000 ALTER TABLE `timezone` DISABLE KEYS */;
INSERT INTO `timezone` VALUES (1,'(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi','2013-05-05 20:30:24');
/*!40000 ALTER TABLE `timezone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_result_display_type`
--

DROP TABLE IF EXISTS `user_result_display_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_result_display_type` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `created_on` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_result_display_type`
--

LOCK TABLES `user_result_display_type` WRITE;
/*!40000 ALTER TABLE `user_result_display_type` DISABLE KEYS */;
INSERT INTO `user_result_display_type` VALUES (1,'No score, questions or feedback','1','2013-05-08 18:03:34','2013-05-08 12:33:34'),(2,'Score only','1','2013-05-08 18:03:34','2013-05-08 12:33:34'),(3,'Score, questions and chosen answers','1','2013-05-08 18:03:34','2013-05-08 12:33:34'),(4,'Score, questions, chosen answers and show correct ','1','2013-05-08 18:03:35','2013-05-08 12:33:35');
/*!40000 ALTER TABLE `user_result_display_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_test_result`
--

DROP TABLE IF EXISTS `user_test_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_test_result` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `test_id` bigint(11) unsigned NOT NULL,
  `questions` text NOT NULL,
  `answers` text,
  `correct_answers` text NOT NULL,
  `user_correct_question` text,
  `user_correct_answers` text,
  `user_incorrect_question` text,
  `user_incorrect_answers` text,
  `marks` int(4) unsigned DEFAULT '0',
  `total_marks` int(4) unsigned DEFAULT '0',
  `elapsed_time` int(11) unsigned DEFAULT '0',
  `status` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `created_on` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  CONSTRAINT `user_test_result_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test_details` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_test_result`
--

LOCK TABLES `user_test_result` WRITE;
/*!40000 ALTER TABLE `user_test_result` DISABLE KEYS */;
INSERT INTO `user_test_result` VALUES (1,'asdfsd','fadsfsad','fsdaf@asdfsad.com',1,'33,31,34,39,36,37,38,40','Personal Hypertext Processor,Personal Home Page,NULL,NULL,NULL,Echo &acirc;€œhello world&acirc;€,NULL,&quot;Hello World&quot;;','PHP: Hypertext Preprocessor,PHP: Hypertext Preprocessor,echo &quot;Hello World&quot;;,PHP: Hypertext Preprocessor,PHP: Hypertext Preprocessor,echo &quot;Hello World&quot;;,PHP: Hypertext Preprocessor,echo &quot;Hello World&quot;;',NULL,NULL,NULL,NULL,0,0,0,'1','2013-06-10 09:06:45','2013-06-10 04:03:38');
/*!40000 ALTER TABLE `user_test_result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `user_test_result_v1`
--

DROP TABLE IF EXISTS `user_test_result_v1`;
/*!50001 DROP VIEW IF EXISTS `user_test_result_v1`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `user_test_result_v1` (
  `email_address` tinyint NOT NULL,
  `test_id` tinyint NOT NULL,
  `user_correct_answers` tinyint NOT NULL,
  `user_correct_question` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `user_test_result_v2`
--

DROP TABLE IF EXISTS `user_test_result_v2`;
/*!50001 DROP VIEW IF EXISTS `user_test_result_v2`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `user_test_result_v2` (
  `email_address` tinyint NOT NULL,
  `test_id` tinyint NOT NULL,
  `user_incorrect_answers` tinyint NOT NULL,
  `user_incorrect_question` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `user_test_result_v3`
--

DROP TABLE IF EXISTS `user_test_result_v3`;
/*!50001 DROP VIEW IF EXISTS `user_test_result_v3`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `user_test_result_v3` (
  `email_address` tinyint NOT NULL,
  `test_id` tinyint NOT NULL,
  `questions` tinyint NOT NULL,
  `answers` tinyint NOT NULL,
  `correct_answers` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email_address` varchar(60) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `time_zone_id` int(3) unsigned DEFAULT NULL,
  `country_id` int(3) unsigned DEFAULT NULL,
  `user_type` enum('Admin','TestTaker','TestMaker') NOT NULL COMMENT 'Admin - All Priveleges, TestTaker - Who can take test only, TestMaker - User can create, assign test',
  `status` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `created_on` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `country_id` (`country_id`),
  KEY `time_zone_id` (`time_zone_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`time_zone_id`) REFERENCES `timezone` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test','user','test@osscube.com','test1','827ccb0eea8a706c4c34a16891f84e7b',1,1,'TestTaker','','2013-05-08 18:01:57','2013-05-13 04:42:19'),(2,'Admin','Admin','admin@skillseeker.com','admin','827ccb0eea8a706c4c34a16891f84e7b',1,1,'Admin','1','2013-05-13 10:14:17','2013-05-13 04:44:17'),(3,'test2','test2','test2@skillseeker.com','testmaker','827ccb0eea8a706c4c34a16891f84e7b',1,1,'TestMaker','1','2013-05-13 10:17:52','2013-05-13 04:47:52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `skillseeker`
--

USE `skillseeker`;

--
-- Final view structure for view `user_test_result_v1`
--

/*!50001 DROP TABLE IF EXISTS `user_test_result_v1`*/;
/*!50001 DROP VIEW IF EXISTS `user_test_result_v1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `user_test_result_v1` AS select `user_test_result`.`email_address` AS `email_address`,`user_test_result`.`test_id` AS `test_id`,`user_test_result`.`user_correct_answers` AS `user_correct_answers`,`user_test_result`.`user_correct_question` AS `user_correct_question` from `user_test_result` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `user_test_result_v2`
--

/*!50001 DROP TABLE IF EXISTS `user_test_result_v2`*/;
/*!50001 DROP VIEW IF EXISTS `user_test_result_v2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `user_test_result_v2` AS select `user_test_result`.`email_address` AS `email_address`,`user_test_result`.`test_id` AS `test_id`,`user_test_result`.`user_incorrect_answers` AS `user_incorrect_answers`,`user_test_result`.`user_incorrect_question` AS `user_incorrect_question` from `user_test_result` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `user_test_result_v3`
--

/*!50001 DROP TABLE IF EXISTS `user_test_result_v3`*/;
/*!50001 DROP VIEW IF EXISTS `user_test_result_v3`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `user_test_result_v3` AS select `user_test_result`.`email_address` AS `email_address`,`user_test_result`.`test_id` AS `test_id`,`user_test_result`.`questions` AS `questions`,`user_test_result`.`answers` AS `answers`,`user_test_result`.`correct_answers` AS `correct_answers` from `user_test_result` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-06-10  9:36:21
