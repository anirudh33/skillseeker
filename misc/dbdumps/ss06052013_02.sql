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
  UNIQUE KEY `category_idx` (`name`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `category_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'sf',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',''),(2,'php',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','');
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `country_idx` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Aruba','2013-05-06 07:29:01'),(2,'Afghanistan','2013-05-06 07:29:01'),(3,'Angola','2013-05-06 07:29:01'),(4,'Anguilla','2013-05-06 07:29:01'),(5,'Albania','2013-05-06 07:29:01'),(6,'Andorra','2013-05-06 07:29:01'),(7,'Netherlands Antilles','2013-05-06 07:29:01'),(8,'United Arab Emirates','2013-05-06 07:29:01'),(9,'Argentina','2013-05-06 07:29:01'),(10,'Armenia','2013-05-06 07:29:01'),(11,'American Samoa','2013-05-06 07:29:01'),(12,'Antarctica','2013-05-06 07:29:01'),(13,'French Southern territories','2013-05-06 07:29:01'),(14,'Antigua and Barbuda','2013-05-06 07:29:01'),(15,'Australia','2013-05-06 07:29:01'),(16,'Austria','2013-05-06 07:29:01'),(17,'Azerbaijan','2013-05-06 07:29:01'),(18,'Burundi','2013-05-06 07:29:01'),(19,'Belgium','2013-05-06 07:29:01'),(20,'Benin','2013-05-06 07:29:01'),(21,'Burkina Faso','2013-05-06 07:29:01'),(22,'Bangladesh','2013-05-06 07:29:01'),(23,'Bulgaria','2013-05-06 07:29:01'),(24,'Bahrain','2013-05-06 07:29:01'),(25,'Bahamas','2013-05-06 07:29:01'),(26,'Bosnia and Herzegovina','2013-05-06 07:29:01'),(27,'Belarus','2013-05-06 07:29:01'),(28,'Belize','2013-05-06 07:29:01'),(29,'Bermuda','2013-05-06 07:29:01'),(30,'Bolivia','2013-05-06 07:29:01'),(31,'Brazil','2013-05-06 07:29:01'),(32,'Barbados','2013-05-06 07:29:01'),(33,'Brunei','2013-05-06 07:29:01'),(34,'Bhutan','2013-05-06 07:29:01'),(35,'Bouvet Island','2013-05-06 07:29:01'),(36,'Botswana','2013-05-06 07:29:01'),(37,'Central African Republic','2013-05-06 07:29:01'),(38,'Canada','2013-05-06 07:29:01'),(39,'Cocos (Keeling) Islands','2013-05-06 07:29:01'),(40,'Switzerland','2013-05-06 07:29:01'),(41,'Chile','2013-05-06 07:29:01'),(42,'China','2013-05-06 07:29:01'),(43,'Côte d’Ivoire','2013-05-06 07:29:01'),(44,'Cameroon','2013-05-06 07:29:01'),(45,'Congo, The Democratic Republic of the','2013-05-06 07:29:01'),(46,'Congo','2013-05-06 07:29:01'),(47,'Cook Islands','2013-05-06 07:29:01'),(48,'Colombia','2013-05-06 07:29:01'),(49,'Comoros','2013-05-06 07:29:01'),(50,'Cape Verde','2013-05-06 07:29:01'),(51,'Costa Rica','2013-05-06 07:29:01'),(52,'Cuba','2013-05-06 07:29:01'),(53,'Christmas Island','2013-05-06 07:29:01'),(54,'Cayman Islands','2013-05-06 07:29:01'),(55,'Cyprus','2013-05-06 07:29:01'),(56,'Czech Republic','2013-05-06 07:29:01'),(57,'Germany','2013-05-06 07:29:01'),(58,'Djibouti','2013-05-06 07:29:01'),(59,'Dominica','2013-05-06 07:29:01'),(60,'Denmark','2013-05-06 07:29:01'),(61,'Dominican Republic','2013-05-06 07:29:01'),(62,'Algeria','2013-05-06 07:29:01'),(63,'Ecuador','2013-05-06 07:29:01'),(64,'Egypt','2013-05-06 07:29:01'),(65,'Eritrea','2013-05-06 07:29:01'),(66,'Western Sahara','2013-05-06 07:29:01'),(67,'Spain','2013-05-06 07:29:01'),(68,'Estonia','2013-05-06 07:29:01'),(69,'Ethiopia','2013-05-06 07:29:01'),(70,'Finland','2013-05-06 07:29:01'),(71,'Fiji Islands','2013-05-06 07:29:01'),(72,'Falkland Islands','2013-05-06 07:29:01'),(73,'France','2013-05-06 07:29:01'),(74,'Faroe Islands','2013-05-06 07:29:01'),(75,'Micronesia, Federated States of','2013-05-06 07:29:01'),(76,'Gabon','2013-05-06 07:29:01'),(77,'United Kingdom','2013-05-06 07:29:01'),(78,'Georgia','2013-05-06 07:29:01'),(79,'Ghana','2013-05-06 07:29:01'),(80,'Gibraltar','2013-05-06 07:29:01'),(81,'Guinea','2013-05-06 07:29:01'),(82,'Guadeloupe','2013-05-06 07:29:01'),(83,'Gambia','2013-05-06 07:29:01'),(84,'Guinea-Bissau','2013-05-06 07:29:01'),(85,'Equatorial Guinea','2013-05-06 07:29:01'),(86,'Greece','2013-05-06 07:29:01'),(87,'Grenada','2013-05-06 07:29:01'),(88,'Greenland','2013-05-06 07:29:01'),(89,'Guatemala','2013-05-06 07:29:01'),(90,'French Guiana','2013-05-06 07:29:01'),(91,'Guam','2013-05-06 07:29:01'),(92,'Guyana','2013-05-06 07:29:01'),(93,'Hong Kong','2013-05-06 07:29:01'),(94,'Heard Island and McDonald Islands','2013-05-06 07:29:01'),(95,'Honduras','2013-05-06 07:29:01'),(96,'Croatia','2013-05-06 07:29:01'),(97,'Haiti','2013-05-06 07:29:01'),(98,'Hungary','2013-05-06 07:29:01'),(99,'Indonesia','2013-05-06 07:29:01'),(100,'India','2013-05-06 07:29:01'),(101,'British Indian Ocean Territory','2013-05-06 07:29:01'),(102,'Ireland','2013-05-06 07:29:01'),(103,'Iran','2013-05-06 07:29:01'),(104,'Iraq','2013-05-06 07:29:01'),(105,'Iceland','2013-05-06 07:29:01'),(106,'Israel','2013-05-06 07:29:01'),(107,'Italy','2013-05-06 07:29:01'),(108,'Jamaica','2013-05-06 07:29:01'),(109,'Jordan','2013-05-06 07:29:01'),(110,'Japan','2013-05-06 07:29:01'),(111,'Kazakstan','2013-05-06 07:29:01'),(112,'Kenya','2013-05-06 07:29:01'),(113,'Kyrgyzstan','2013-05-06 07:29:01'),(114,'Cambodia','2013-05-06 07:29:01'),(115,'Kiribati','2013-05-06 07:29:01'),(116,'Saint Kitts and Nevis','2013-05-06 07:29:01'),(117,'South Korea','2013-05-06 07:29:01'),(118,'Kuwait','2013-05-06 07:29:01'),(119,'Laos','2013-05-06 07:29:01'),(120,'Lebanon','2013-05-06 07:29:01'),(121,'Liberia','2013-05-06 07:29:01'),(122,'Libyan Arab Jamahiriya','2013-05-06 07:29:01'),(123,'Saint Lucia','2013-05-06 07:29:01'),(124,'Liechtenstein','2013-05-06 07:29:01'),(125,'Sri Lanka','2013-05-06 07:29:01'),(126,'Lesotho','2013-05-06 07:29:01'),(127,'Lithuania','2013-05-06 07:29:01'),(128,'Luxembourg','2013-05-06 07:29:01'),(129,'Latvia','2013-05-06 07:29:01'),(130,'Macao','2013-05-06 07:29:01'),(131,'Morocco','2013-05-06 07:29:01'),(132,'Monaco','2013-05-06 07:29:01'),(133,'Moldova','2013-05-06 07:29:01'),(134,'Madagascar','2013-05-06 07:29:01'),(135,'Maldives','2013-05-06 07:29:01'),(136,'Mexico','2013-05-06 07:29:01'),(137,'Marshall Islands','2013-05-06 07:29:01'),(138,'Macedonia','2013-05-06 07:29:01'),(139,'Mali','2013-05-06 07:29:01'),(140,'Malta','2013-05-06 07:29:01'),(141,'Myanmar','2013-05-06 07:29:01'),(142,'Mongolia','2013-05-06 07:29:01'),(143,'Northern Mariana Islands','2013-05-06 07:29:01'),(144,'Mozambique','2013-05-06 07:29:01'),(145,'Mauritania','2013-05-06 07:29:01'),(146,'Montserrat','2013-05-06 07:29:01'),(147,'Martinique','2013-05-06 07:29:01'),(148,'Mauritius','2013-05-06 07:29:01'),(149,'Malawi','2013-05-06 07:29:01'),(150,'Malaysia','2013-05-06 07:29:01'),(151,'Mayotte','2013-05-06 07:29:01'),(152,'Namibia','2013-05-06 07:29:01'),(153,'New Caledonia','2013-05-06 07:29:01'),(154,'Niger','2013-05-06 07:29:01'),(155,'Norfolk Island','2013-05-06 07:29:01'),(156,'Nigeria','2013-05-06 07:29:01'),(157,'Nicaragua','2013-05-06 07:29:01'),(158,'Niue','2013-05-06 07:29:01'),(159,'Netherlands','2013-05-06 07:29:01'),(160,'Norway','2013-05-06 07:29:01'),(161,'Nepal','2013-05-06 07:29:01'),(162,'Nauru','2013-05-06 07:29:01'),(163,'New Zealand','2013-05-06 07:29:01'),(164,'Oman','2013-05-06 07:29:01'),(165,'Pakistan','2013-05-06 07:29:01'),(166,'Panama','2013-05-06 07:29:01'),(167,'Pitcairn','2013-05-06 07:29:01'),(168,'Peru','2013-05-06 07:29:01'),(169,'Philippines','2013-05-06 07:29:01'),(170,'Palau','2013-05-06 07:29:01'),(171,'Papua New Guinea','2013-05-06 07:29:01'),(172,'Poland','2013-05-06 07:29:01'),(173,'Puerto Rico','2013-05-06 07:29:01'),(174,'North Korea','2013-05-06 07:29:01'),(175,'Portugal','2013-05-06 07:29:01'),(176,'Paraguay','2013-05-06 07:29:01'),(177,'Palestine','2013-05-06 07:29:01'),(178,'French Polynesia','2013-05-06 07:29:01'),(179,'Qatar','2013-05-06 07:29:01'),(180,'Réunion','2013-05-06 07:29:01'),(181,'Romania','2013-05-06 07:29:01'),(182,'Russian Federation','2013-05-06 07:29:01'),(183,'Rwanda','2013-05-06 07:29:01'),(184,'Saudi Arabia','2013-05-06 07:29:01'),(185,'Sudan','2013-05-06 07:29:01'),(186,'Senegal','2013-05-06 07:29:01'),(187,'Singapore','2013-05-06 07:29:01'),(188,'South Georgia and the South Sandwich Islands','2013-05-06 07:29:01'),(189,'Saint Helena','2013-05-06 07:29:01'),(190,'Svalbard and Jan Mayen','2013-05-06 07:29:01'),(191,'Solomon Islands','2013-05-06 07:29:01'),(192,'Sierra Leone','2013-05-06 07:29:01'),(193,'El Salvador','2013-05-06 07:29:01'),(194,'San Marino','2013-05-06 07:29:01'),(195,'Somalia','2013-05-06 07:29:01'),(196,'Saint Pierre and Miquelon','2013-05-06 07:29:01'),(197,'Sao Tome and Principe','2013-05-06 07:29:01'),(198,'Suriname','2013-05-06 07:29:01'),(199,'Slovakia','2013-05-06 07:29:01'),(200,'Slovenia','2013-05-06 07:29:01'),(201,'Sweden','2013-05-06 07:29:01'),(202,'Swaziland','2013-05-06 07:29:01'),(203,'Seychelles','2013-05-06 07:29:01'),(204,'Syria','2013-05-06 07:29:01'),(205,'Turks and Caicos Islands','2013-05-06 07:29:01'),(206,'Chad','2013-05-06 07:29:01'),(207,'Togo','2013-05-06 07:29:01'),(208,'Thailand','2013-05-06 07:29:01'),(209,'Tajikistan','2013-05-06 07:29:01'),(210,'Tokelau','2013-05-06 07:29:01'),(211,'Turkmenistan','2013-05-06 07:29:01'),(212,'East Timor','2013-05-06 07:29:01'),(213,'Tonga','2013-05-06 07:29:01'),(214,'Trinidad and Tobago','2013-05-06 07:29:01'),(215,'Tunisia','2013-05-06 07:29:01'),(216,'Turkey','2013-05-06 07:29:01'),(217,'Tuvalu','2013-05-06 07:29:01'),(218,'Taiwan','2013-05-06 07:29:01'),(219,'Tanzania','2013-05-06 07:29:01'),(220,'Uganda','2013-05-06 07:29:01'),(221,'Ukraine','2013-05-06 07:29:01'),(222,'United States Minor Outlying Islands','2013-05-06 07:29:01'),(223,'Uruguay','2013-05-06 07:29:01'),(224,'United States','2013-05-06 07:29:01'),(225,'Uzbekistan','2013-05-06 07:29:01'),(226,'Holy See (Vatican City State)','2013-05-06 07:29:01'),(227,'Saint Vincent and the Grenadines','2013-05-06 07:29:01'),(228,'Venezuela','2013-05-06 07:29:01'),(229,'Virgin Islands, British','2013-05-06 07:29:01'),(230,'Virgin Islands, U.S.','2013-05-06 07:29:01'),(231,'Vietnam','2013-05-06 07:29:01'),(232,'Vanuatu','2013-05-06 07:29:01'),(233,'Wallis and Futuna','2013-05-06 07:29:01'),(234,'Samoa','2013-05-06 07:29:01'),(235,'Yemen','2013-05-06 07:29:01'),(236,'Yugoslavia','2013-05-06 07:29:01'),(237,'South Africa','2013-05-06 07:29:01'),(238,'Zambia','2013-05-06 07:29:01'),(239,'Zimbabwe','2013-05-06 07:29:01');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `display_result_type`
--

DROP TABLE IF EXISTS `display_result_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `display_result_type` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `created_on` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `display_result_type_idx` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `display_result_type`
--

LOCK TABLES `display_result_type` WRITE;
/*!40000 ALTER TABLE `display_result_type` DISABLE KEYS */;
INSERT INTO `display_result_type` VALUES (1,'No score, questions','1',NULL,'0000-00-00 00:00:00'),(2,'Score only','1',NULL,'0000-00-00 00:00:00'),(3,'Score, Questions & choosen answers','1',NULL,'0000-00-00 00:00:00'),(4,'Score, Questions & choosen answers with correct an','1',NULL,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `display_result_type` ENABLE KEYS */;
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
  UNIQUE KEY `options_idx` (`question_id`),
  CONSTRAINT `options_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question_bank` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` VALUES (1,'1',1,'1','0000-00-00 00:00:00','0000-00-00 00:00:00');
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
  `answer` bigint(11) unsigned DEFAULT NULL,
  `points` float unsigned DEFAULT '0',
  `question_type` enum('1','2','3','4') NOT NULL COMMENT '1-True/false,2-objective',
  `status` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `created_on` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `question_bank_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_bank`
--

LOCK TABLES `question_bank` WRITE;
/*!40000 ALTER TABLE `question_bank` DISABLE KEYS */;
INSERT INTO `question_bank` VALUES (1,1,'csdf',NULL,0,'1','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,1,'What does PHP stand for?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,1,'What does PHP stand for?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,1,'What does PHP stand for?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,1,'What does PHP stand for?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,1,'What does PHP stand for?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,1,'What does PHP stand for?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,1,'What does PHP stand for?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,1,'What does PHP stand for?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,1,'What does PHP stand for?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,1,'What does PHP stand for?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,1,'What does PHP stand for?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,1,'How do you write &quot;Hello World&quot; in PHP',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,1,'How do you write &quot;Hello World&quot; in PHP',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,1,'How do you write &quot;Hello World&quot; in PHP',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,1,'How do you write &quot;Hello World&quot; in PHP',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,1,'How do you write &quot;Hello World&quot; in PHP',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(18,1,'How do you write &quot;Hello World&quot; in PHP',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,1,'How do you write &quot;Hello World&quot; in PHP',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,1,'How do you write &quot;Hello World&quot; in PHP',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(21,1,'How do you write &quot;Hello World&quot; in PHP',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,1,'What is the correct way to end a PHP statement?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(23,1,'What is the correct way to end a PHP statement?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(24,1,'What is the correct way to end a PHP statement?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(25,1,'What is the correct way to end a PHP statement?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26,1,'What is the correct way to end a PHP statement?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(27,1,'What is the correct way to end a PHP statement?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(28,1,'What is the correct way to end a PHP statement?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(29,1,'What is the correct way to end a PHP statement?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(30,1,'What is the correct way to end a PHP statement?',NULL,0,'2','','0000-00-00 00:00:00','0000-00-00 00:00:00');
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
  `start_time` datetime DEFAULT NULL,
  `test_duration` int(5) unsigned DEFAULT '0' COMMENT 'Total Time for test in Minutes/Seconds',
  `status` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `instructions` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `passing_marks` int(3) unsigned DEFAULT '0',
  `per_page_question` int(3) unsigned DEFAULT '0',
  `test_link` text,
  `certificate` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `link_expire_time` int(3) unsigned DEFAULT NULL COMMENT 'The time in minutes after start time',
  `question_order` enum('R','S') DEFAULT 'S' COMMENT 'R - Random, S - Sequential',
  `go_back` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `user_result_type_id` bigint(11) unsigned DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_result_type_id` (`user_result_type_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `test_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `test_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `test_ibfk_2` FOREIGN KEY (`user_result_type_id`) REFERENCES `display_result_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES (1,'',NULL,1,0,NULL,0,'1','1',0,0,NULL,'1',NULL,'S','1',NULL,NULL,'2013-05-06 11:10:36');
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
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
  `category_id` bigint(11) unsigned NOT NULL,
  `no_of_questions` bigint(3) unsigned DEFAULT '1',
  `status` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `created_on` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `test_question_category_idx` (`test_id`,`category_id`,`no_of_questions`),
  CONSTRAINT `test_question_category_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_question_category`
--

LOCK TABLES `test_question_category` WRITE;
/*!40000 ALTER TABLE `test_question_category` DISABLE KEYS */;
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `timezone_idx` (`time_zone`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timezone`
--

LOCK TABLES `timezone` WRITE;
/*!40000 ALTER TABLE `timezone` DISABLE KEYS */;
INSERT INTO `timezone` VALUES (1,'(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi','2013-05-06 07:30:24');
/*!40000 ALTER TABLE `timezone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_test_result`
--

DROP TABLE IF EXISTS `user_test_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_test_result` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `status` enum('0','1') DEFAULT '1' COMMENT '0 - False, 1 - True',
  `created_on` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_test_result_idx1` (`email_address`,`test_id`),
  UNIQUE KEY `user_test_result_idx2` (`email_address`,`test_id`,`marks`,`total_marks`),
  KEY `test_id` (`test_id`),
  CONSTRAINT `user_test_result_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_test_result`
--

LOCK TABLES `user_test_result` WRITE;
/*!40000 ALTER TABLE `user_test_result` DISABLE KEYS */;
INSERT INTO `user_test_result` VALUES (1,'m@oss.com',1,'1,2,3','1,2,3','1,2,3','1,2,3','1,2,3','1,2,3','1,2,3',78,100,'','0000-00-00 00:00:00','0000-00-00 00:00:00');
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
  `status` enum('0','1') DEFAULT '0' COMMENT '0 - False, 1 - True',
  `created_on` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `users_idx1` (`user_name`,`password`),
  UNIQUE KEY `users_idx2` (`first_name`,`last_name`,`email_address`),
  KEY `country_id` (`country_id`),
  KEY `time_zone_id` (`time_zone_id`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`time_zone_id`) REFERENCES `timezone` (`id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test','user','test@osscube.com','test1','827ccb0eea8a706c4c34a16891f84e7b',1,1,'1',NULL,'2013-05-06 07:35:22');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

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

-- Dump completed on 2013-05-06 16:41:43
