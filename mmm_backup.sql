-- MySQL dump 10.13  Distrib 8.0.43, for Linux (x86_64)
--
-- Host: localhost    Database: mmm
-- ------------------------------------------------------
-- Server version	8.0.43-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `mmm`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `mmm` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `mmm`;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cas` datetime NOT NULL,
  `img_id` int NOT NULL,
  `tagstring` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'2025-07-24 22:24:43',1,'\'cute\',\'dog\''),(2,'2025-07-24 22:35:18',44,''),(3,'2025-07-24 22:35:32',43,'\'congratulations\''),(4,'2025-07-24 22:35:43',128,''),(5,'2025-07-24 22:43:11',8,'\'brainrot\',\'thisisfine\'thisisfine'),(6,'2025-07-24 22:43:23',21,'\'food\'k'),(7,'2025-07-24 22:52:33',75,'\'lotr\',\'q\''),(8,'2025-07-24 22:52:43',63,'\'lotr\',\'bookworm\''),(9,'2025-07-24 22:52:57',51,'\'congratulations\',\'mrbean\''),(10,'2025-07-26 13:21:17',51,'\'congratulations\',\'mrbean\''),(11,'2025-07-26 13:27:45',51,'\'congratulations\',\'mrbean\''),(12,'2025-07-26 13:27:57',51,'\'congratulations\',\'mrbean\''),(13,'2025-07-26 13:28:40',43,'\'congratulations\',\'lik\''),(14,'2025-07-26 13:28:49',43,'\'congratulations\',\'v\''),(15,'2025-08-11 13:46:56',26,'\'like\',\'understood\''),(16,'2025-08-27 12:26:06',75,'\'lotr\',\'isengard\''),(17,'2025-08-28 11:46:24',33,',\'notsame\''),(18,'2025-08-28 11:47:39',8,'\'irony\',\'thisisfine\''),(19,'2025-08-28 21:53:30',25,',\'gaming\''),(20,'2025-08-28 21:59:14',1,'\'dog\',\'cute\''),(21,'2025-08-28 21:59:29',123,'\'dog\',\'malevolent\''),(22,'2025-08-28 21:59:39',13,',\'self_deprecation\''),(23,'2025-08-28 22:02:07',27,'\'dog\',\'unknowing\''),(24,'2025-08-28 22:02:18',50,'\'cat\',\'kitten\''),(25,'2025-08-31 08:45:49',27,'\'dog\',\'unknowing\''),(26,'2025-08-31 08:45:57',98,',\'speedoflight\''),(27,'2025-08-31 08:47:10',43,'\'congratulations\',\'like\',\'cheers\''),(28,'2025-08-31 08:47:19',43,'\'congratulations\',\'dicaprio\''),(29,'2025-08-31 08:47:27',51,'\'congratulations\',\'mrbean\''),(30,'2025-08-31 08:51:12',43,'\'like\',\'congratulations\',\'dicaprio\''),(31,'2025-08-31 08:54:18',51,'\'like\',\'congratulations\''),(32,'2025-08-31 08:54:41',1,'\'dog\',\'cute\''),(33,'2025-08-31 09:00:00',101,'\'disappointment\',\'angry\''),(34,'2025-08-31 09:00:17',72,'\'mrbean\',\'congratulations\''),(35,'2025-08-31 09:00:41',27,'\'dog\',\'unknowing\''),(36,'2025-08-31 09:00:53',132,'\'dog\',\'chess\''),(37,'2025-08-31 09:01:00',123,',\'dog\''),(38,'2025-08-31 09:01:47',70,'\'irony\',\'like\''),(39,'2025-08-31 09:02:03',53,'\'irony\',\'mrbean\''),(40,'2025-08-31 09:02:14',15,'\'disappointment\',\'bufet\''),(41,'2025-08-31 09:02:31',48,'\'disappointment\',\'ancestors\''),(42,'2025-08-31 09:02:50',44,'\'disappointment\',\'sad\''),(43,'2025-08-31 09:03:01',47,',\'disappointment\''),(44,'2025-08-31 09:03:10',17,',\'emotionaldamage\''),(45,'2025-08-31 09:07:32',43,'\'congratulations\',\'dicaprio\''),(46,'2025-08-31 09:07:38',51,',\'congratulations\''),(47,'2025-08-31 09:07:51',56,'\'like\',\'raccoon\''),(48,'2025-08-31 09:08:12',119,'\'like\',\'thumbsup\''),(49,'2025-08-31 09:08:24',120,'\'like\',\'jensen\''),(50,'2025-08-31 09:08:41',26,'\'like\',\'understood\''),(51,'2025-08-31 09:09:05',70,',\'like\''),(52,'2025-08-31 09:09:14',144,',\'sadlike\''),(53,'2025-08-31 09:09:48',20,',\'awkward\''),(54,'2025-08-31 09:10:52',43,'\'like\',\'cheers\''),(55,'2025-08-31 09:59:47',173,',\'you_thing_im_stupid\''),(56,'2025-08-31 10:00:00',57,'\'idontcare\',\'jedem\''),(57,'2025-08-31 10:00:17',101,'\'yousuck\',\'angry\''),(58,'2025-08-31 10:00:48',100,'\'angry\',\'pomsta\',\'frieren\''),(59,'2025-08-31 10:01:56',168,'\'america\',\'usb\''),(60,'2025-08-31 10:02:13',18,'\'america\',\'fat\''),(61,'2025-08-31 10:02:18',9,',\'america\''),(62,'2025-08-31 10:02:26',17,',\'emotionaldamage\''),(63,'2025-08-31 10:02:39',48,'\'disappointment\',\'ancestors\'');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obrazek_tag`
--

DROP TABLE IF EXISTS `obrazek_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `obrazek_tag` (
  `img_id` int NOT NULL,
  `tag_id` int NOT NULL,
  `priorita` int DEFAULT NULL,
  PRIMARY KEY (`img_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obrazek_tag`
--

LOCK TABLES `obrazek_tag` WRITE;
/*!40000 ALTER TABLE `obrazek_tag` DISABLE KEYS */;
INSERT INTO `obrazek_tag` VALUES (1,247,2),(1,250,2),(2,38,2),(2,231,1),(2,232,1),(3,233,1),(4,212,1),(4,234,1),(4,235,1),(5,236,1),(6,84,1),(6,134,1),(6,135,1),(6,136,7),(7,110,1),(7,237,1),(8,4,1),(8,10,1),(8,25,3),(8,69,1),(9,19,3),(9,27,1),(10,38,9),(10,238,1),(11,56,5),(11,59,1),(11,239,1),(12,240,1),(13,241,1),(13,242,1),(14,38,1),(14,198,2),(14,238,1),(14,243,1),(15,7,1),(15,26,1),(16,199,1),(17,21,1),(17,22,1),(18,19,1),(18,20,1),(19,130,1),(19,131,1),(19,132,1),(19,133,1),(19,205,1),(20,28,1),(20,29,1),(20,30,1),(21,17,1),(21,18,1),(22,37,1),(22,38,1),(22,39,1),(23,33,1),(23,35,1),(23,36,1),(24,32,1),(24,33,1),(24,34,1),(25,23,1),(25,24,1),(26,40,5),(26,41,1),(27,42,3),(27,43,1),(27,247,1),(28,38,1),(28,73,1),(28,74,1),(28,75,1),(28,76,1),(28,238,1),(29,44,1),(29,45,1),(30,10,1),(31,71,1),(31,72,1),(32,38,1),(32,69,1),(32,70,1),(33,66,1),(33,67,1),(33,68,1),(34,63,1),(34,64,1),(34,65,1),(35,31,5),(35,253,1),(36,27,1),(36,41,1),(36,244,1),(37,46,1),(37,47,1),(37,48,1),(37,49,1),(37,50,1),(38,56,7),(38,57,1),(38,58,1),(38,59,1),(39,51,1),(39,52,1),(39,53,1),(39,54,1),(39,55,1),(40,60,1),(40,61,1),(40,62,1),(41,79,1),(41,80,1),(41,81,1),(42,82,1),(43,3,2),(43,40,2),(43,77,1),(43,78,1),(44,1,1),(44,7,1),(45,88,1),(45,89,1),(46,79,1),(46,83,1),(47,7,1),(47,84,1),(47,85,1),(47,86,1),(48,7,1),(48,66,1),(48,87,1),(49,11,1),(49,86,1),(49,90,1),(50,56,6),(50,91,1),(50,92,1),(51,3,1),(51,40,6),(51,93,3),(52,67,1),(52,93,1),(52,94,2),(53,4,1),(53,93,1),(53,95,1),(54,76,1),(54,86,1),(54,96,1),(55,10,1),(55,83,1),(56,40,1),(56,97,1),(57,9,2),(57,86,1),(57,90,1),(57,98,1),(57,99,1),(57,100,1),(58,84,1),(58,86,1),(58,101,1),(58,102,1),(59,103,1),(60,9,3),(60,104,1),(60,105,1),(61,4,1),(61,212,1),(62,5,7),(62,106,1),(62,107,1),(62,108,1),(62,249,1),(63,5,1),(63,110,2),(63,111,1),(63,112,1),(63,113,1),(63,114,1),(64,44,1),(64,245,1),(65,44,1),(65,245,1),(66,38,1),(66,115,1),(66,116,1),(68,117,1),(68,118,1),(69,23,1),(69,119,1),(70,4,1),(70,34,1),(70,40,4),(70,120,1),(70,121,1),(71,25,1),(71,69,1),(71,122,1),(72,46,1),(72,47,1),(72,93,1),(73,12,1),(73,86,1),(73,123,1),(73,124,1),(74,12,1),(74,84,1),(74,125,1),(74,126,1),(75,5,9),(75,14,1),(75,127,1),(75,128,1),(75,129,1),(76,5,8),(76,107,4),(76,200,1),(76,201,1),(77,5,4),(77,202,1),(77,203,1),(77,204,1),(78,16,1),(78,206,1),(79,137,1),(79,207,1),(80,138,1),(80,139,1),(81,17,1),(82,208,1),(82,209,1),(83,86,1),(83,90,1),(83,140,1),(84,86,1),(84,136,3),(84,141,1),(85,12,1),(85,66,1),(85,210,1),(85,211,1),(86,129,1),(86,142,1),(86,143,1),(87,13,1),(87,25,1),(87,69,1),(88,144,1),(88,145,1),(88,213,1),(88,214,1),(89,13,1),(89,15,1),(90,13,1),(90,15,1),(90,215,1),(91,14,1),(91,221,1),(92,222,1),(92,223,1),(92,224,1),(92,225,1),(92,226,1),(93,112,1),(93,146,1),(94,5,5),(94,136,1),(94,147,1),(95,86,1),(95,148,1),(95,149,1),(95,150,1),(96,129,1),(96,142,1),(96,151,1),(96,152,1),(97,153,1),(97,154,1),(97,155,1),(97,156,1),(98,65,1),(98,157,1),(98,227,1),(99,129,1),(99,158,1),(99,228,1),(99,229,1),(100,64,1),(100,136,4),(100,141,1),(100,159,1),(101,7,1),(101,15,1),(101,136,5),(101,230,1),(102,12,4),(102,56,1),(102,84,1),(103,38,1),(103,160,1),(103,161,1),(104,12,1),(104,42,7),(105,42,6),(105,162,1),(105,163,1),(106,42,1),(106,251,1),(107,164,1),(107,165,1),(107,166,1),(107,167,1),(108,168,1),(109,169,1),(110,170,1),(110,171,1),(110,172,1),(111,173,1),(111,174,1),(111,175,1),(112,173,1),(112,174,1),(112,175,1),(112,176,1),(113,173,1),(113,174,1),(114,38,3),(114,56,1),(114,74,1),(114,177,1),(115,178,1),(115,179,1),(116,180,1),(117,181,1),(117,182,1),(117,246,1),(118,183,1),(118,184,1),(118,252,1),(119,40,4),(119,270,1),(119,271,1),(120,40,3),(120,185,1),(120,186,1),(121,187,1),(121,188,1),(122,5,6),(122,189,1),(122,190,1),(122,191,1),(122,192,1),(122,193,1),(123,194,1),(123,247,1),(123,248,1),(124,38,1),(124,94,1),(125,38,1),(125,195,1),(125,196,1),(126,20,1),(126,197,1),(127,38,1),(127,198,1),(127,199,1),(128,6,1),(130,56,1),(130,110,1),(130,111,1),(131,56,1),(131,66,1),(131,110,1),(132,247,1),(132,254,1),(133,110,1),(133,255,1),(134,110,1),(134,255,1),(135,254,1),(135,256,1),(135,318,1),(136,257,1),(136,317,1),(137,10,1),(137,56,1),(137,129,1),(137,258,1),(138,110,1),(139,110,1),(139,111,1),(139,259,1),(140,17,1),(140,257,1),(140,260,1),(140,261,1),(140,317,1),(141,262,1),(142,263,1),(142,264,1),(144,56,1),(144,265,1),(146,266,1),(146,267,1),(146,268,1),(146,269,1),(147,272,1),(148,273,1),(148,274,1),(149,136,1),(149,275,1),(149,276,1),(149,277,1),(150,278,1),(150,279,1),(151,254,1),(151,280,1),(151,281,1),(151,282,1),(152,283,1),(152,284,1),(152,285,1),(153,254,1),(153,286,1),(153,287,1),(154,102,1),(154,254,1),(154,286,1),(154,288,1),(154,289,1),(155,102,1),(155,290,1),(155,291,1),(156,292,1),(157,293,1),(157,294,1),(158,38,1),(158,295,1),(158,296,1),(159,212,1),(159,254,1),(159,297,1),(160,298,1),(161,299,1),(162,5,1),(162,300,1),(163,9,1),(164,40,1),(164,254,1),(164,286,1),(164,301,1),(165,302,1),(165,303,1),(166,238,1),(166,304,1),(167,212,1),(167,254,1),(168,19,1),(168,305,1),(168,306,1),(169,307,1),(169,308,1),(169,309,1),(169,310,1),(170,5,1),(170,311,1),(170,312,1),(171,313,1),(172,38,1),(172,314,1),(172,315,1),(173,316,1);
/*!40000 ALTER TABLE `obrazek_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obrazek_tag_archive`
--

DROP TABLE IF EXISTS `obrazek_tag_archive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `obrazek_tag_archive` (
  `img_id` int NOT NULL,
  `tag_id` int NOT NULL,
  `priorita` int DEFAULT NULL,
  PRIMARY KEY (`img_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obrazek_tag_archive`
--

LOCK TABLES `obrazek_tag_archive` WRITE;
/*!40000 ALTER TABLE `obrazek_tag_archive` DISABLE KEYS */;
/*!40000 ALTER TABLE `obrazek_tag_archive` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obrazky`
--

DROP TABLE IF EXISTS `obrazky`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `obrazky` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nazev` varchar(255) NOT NULL,
  `tagy` int DEFAULT NULL,
  `lightness` int DEFAULT NULL,
  `prezdivka` varchar(255) DEFAULT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `lasttime` datetime NOT NULL DEFAULT '2025-07-22 21:57:43',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obrazky`
--

LOCK TABLES `obrazky` WRITE;
/*!40000 ALTER TABLE `obrazky` DISABLE KEYS */;
INSERT INTO `obrazky` VALUES (1,'acute.webp',NULL,NULL,'acute.webp',1,'2025-08-31 08:54:41'),(2,'ageisjustnumberstring.jpg',NULL,NULL,'ageisjustnumberstring.jpg',0,'2025-07-22 21:57:43'),(3,'aiprogrammergetittowork.jpg',NULL,NULL,'aiprogrammergetittowork.jpg',0,'2025-07-22 21:57:43'),(4,'big_brain.jpeg',NULL,NULL,'big_brain.jpeg',0,'2025-07-22 21:57:43'),(5,'birthday_false.webp',NULL,NULL,'birthday_false.webp',0,'2025-07-22 21:57:43'),(6,'bonk.avif',NULL,NULL,'bonk_shibainu_doggo',0,'2025-07-22 21:57:43'),(7,'book-and-then-after-they-had-ripped-out-half-of-her-pages-they-turned-her-into-a-movie-gasp-gasp.png',NULL,NULL,'book-and-then-after-they-had-ripped-out-half-of-her-pages-they-turned-her-into-a-movie-gasp-gasp.png',0,'2025-07-22 21:57:43'),(8,'brainrot_this_is_fine.jpg',NULL,NULL,'brainrot_this_is_fine.jpg',1,'2025-08-28 11:47:39'),(9,'captain_america_like.jpg',NULL,NULL,'captain_america_like.jpg',1,'2025-08-31 10:02:18'),(10,'codeworkswhynotworking.jpg',NULL,NULL,'codeworkswhynotworking.jpg',0,'2025-07-22 21:57:43'),(11,'coffeegrumpycat.avif',NULL,NULL,'coffeegrumpycat.avif',0,'2025-07-22 21:57:43'),(12,'colorblind_piechart.jpg',NULL,NULL,'colorblind_piechart.jpg',0,'2025-07-22 21:57:43'),(13,'criticize_yourself_Black-Guy-Thinking-Memes-8.jpeg',NULL,NULL,'criticize_yourself_Black-Guy-Thinking-Memes-8.jpeg',1,'2025-08-28 21:59:39'),(14,'different_error_progress_yay_.jpg',NULL,NULL,'different_error_progress_yay_.jpg',0,'2025-07-22 21:57:43'),(15,'disappointment_immeasurable_bufet.jpg',NULL,NULL,'disappointment_immeasurable_bufet.jpg',1,'2025-08-31 09:02:14'),(16,'drink-my-parents-wont-get-job-by-staying-infront-laptop-all-day-who-studies-computer-science.jpeg',NULL,NULL,'drink-my-parents-wont-get-job-by-staying-infront-laptop-all-day-who-studies-computer-science.jpeg',0,'2025-07-22 21:57:43'),(17,'emotional_damage.gif',NULL,NULL,'emotional_damage.gif',1,'2025-08-31 10:02:26'),(18,'fat_captain_america.jpg',NULL,NULL,'fat_captain_america.jpg',1,'2025-08-31 10:02:13'),(19,'favorite_color_monty_python.jpg',NULL,NULL,'favorite_color_monty_python.jpg',0,'2025-07-22 21:57:43'),(20,'fixing_own_errorprogramming-meme-1.jpg',NULL,NULL,'fixing_own_errorprogramming-meme-1.jpg',1,'2025-08-31 09:09:48'),(21,'food_eat_chewongjenseneating.gif',NULL,NULL,'food_eat_chewongjenseneating.gif',1,'2025-07-24 22:43:23'),(22,'for_loop_hulk.png',NULL,NULL,'for_loop_hulk.png',0,'2025-07-22 21:57:43'),(23,'french_jesuis_jesus_baguette.png',NULL,NULL,'french_jesuis_jesus_baguette.png',0,'2025-07-22 21:57:43'),(24,'french_pain_baguette.jpg',NULL,NULL,'french_pain_baguette.jpg',0,'2025-07-22 21:57:43'),(25,'gaming_hollowknight_thats-the-neat-part-you-dont-v0-184slsi7xibe1.webp',NULL,NULL,'gaming_hollowknight_thats-the-neat-part-you-dont-v0-184slsi7xibe1.webp',1,'2025-08-28 21:53:30'),(26,'good_understood_yes.jpg',NULL,NULL,'good_understood_yes.jpg',1,'2025-08-31 09:08:41'),(27,'howisleepknowingnothing.jpg',NULL,NULL,'howisleepknowingnothing.jpg',1,'2025-08-31 09:00:41'),(28,'changenothingandrunitagain.webp',NULL,NULL,'changenothingandrunitagain.webp',0,'2025-07-22 21:57:43'),(29,'i-dont-understande-that-reference.jpg',NULL,NULL,'i-dont-understande-that-reference.jpg',0,'2025-07-22 21:57:43'),(30,'im-losing-brain-cells-jackie-chan.jpg',NULL,NULL,'im-losing-brain-cells-jackie-chan.jpg',0,'2025-07-22 21:57:43'),(31,'im-not-even-mad-im-impressed.jpg',NULL,NULL,'im-not-even-mad-im-impressed.jpg',0,'2025-07-22 21:57:43'),(32,'In case of fire_git.jpg',NULL,NULL,'In case of fire_git.jpg',0,'2025-07-22 21:57:43'),(33,'introvertboring.webp',NULL,NULL,'introvertboring.webp',1,'2025-08-28 11:46:24'),(34,'ishigamisenku.jpg',NULL,NULL,'ishigamisenku.jpg',0,'2025-07-22 21:57:43'),(35,'italian_approved.gif',NULL,NULL,'italian_approved.gif',0,'2025-07-22 21:57:43'),(36,'i-understood-that-referenceCaptainAmerica.JPG',NULL,NULL,'i-understood-that-referenceCaptainAmerica.JPG',0,'2025-07-22 21:57:43'),(37,'klid_pat_mat.jpg',NULL,NULL,'klid_pat_mat.jpg',0,'2025-07-22 21:57:43'),(38,'kockashazujehrnek.jpg',NULL,NULL,'kockashazujehrnek.jpg',0,'2025-07-22 21:57:43'),(39,'kofola_jack_titanic.jpg',NULL,NULL,'kofola_jack_titanic.jpg',0,'2025-07-22 21:57:43'),(40,'ladiestakemynumber.jpg',NULL,NULL,'ladiestakemynumber.jpg',0,'2025-07-22 21:57:43'),(41,'lateforworkwednesday.jpeg',NULL,NULL,'lateforworkwednesday.jpeg',0,'2025-07-22 21:57:43'),(42,'learntocodethencode.webp',NULL,NULL,'learntocodethencode.webp',0,'2025-07-22 21:57:43'),(43,'Leonardo-Dicaprio-Cheers_celebration.jpg',NULL,NULL,'Leonardo-Dicaprio-Cheers_celebration.jpg',1,'2025-08-31 09:10:52'),(44,'let_down_roses_are_red.jpg',NULL,NULL,'let_down_roses_are_red.jpg',1,'2025-08-31 09:02:50'),(45,'linustalkischeapshowmethecode.jpg',NULL,NULL,'linustalkischeapshowmethecode.jpg',0,'2025-07-22 21:57:43'),(46,'lookingatprogrammingmemesvscoding.jpg',NULL,NULL,'lookingatprogrammingmemesvscoding.jpg',0,'2025-07-22 21:57:43'),(47,'lyvuju_pat_mat.jpg',NULL,NULL,'lyvuju_pat_mat.jpg',1,'2025-08-31 09:03:01'),(48,'Memes-for-Introverts-Celebrating-Solitude-FG-608x499.webp',NULL,NULL,'Memes-for-Introverts-Celebrating-Solitude-FG-608x499.webp',1,'2025-08-31 10:02:39'),(49,'mentalleky.jpeg',NULL,NULL,'mentalleky.jpeg',0,'2025-07-22 21:57:43'),(50,'mondaynicebutmonday.jpeg',NULL,NULL,'mondaynicebutmonday.jpeg',1,'2025-08-28 22:02:18'),(51,'mr-bean-thumbs-up.gif',NULL,NULL,'mr-bean-thumbs-up.gif',1,'2025-08-31 09:07:38'),(52,'Mr-bean-waiting-class-to-end.webp',NULL,NULL,'Mr-bean-waiting-class-to-end.webp',1,'2025-07-24 17:40:32'),(53,'mr_bean_wink.gif',NULL,NULL,'mr_bean_wink.gif',1,'2025-08-31 09:02:03'),(54,'muzi_pat_mat.jpg',NULL,NULL,'muzi_pat_mat.jpg',0,'2025-07-22 21:57:43'),(55,'my_last_brain_cell_died.jpg',NULL,NULL,'my_last_brain_cell_died.jpg',0,'2025-07-22 21:57:43'),(56,'myval.jpg',NULL,NULL,'myval.jpg',1,'2025-08-31 09:07:51'),(57,'nazor.gif',NULL,NULL,'nazor.gif',1,'2025-08-31 10:00:00'),(58,'ne.jpg',NULL,NULL,'ne.jpg',0,'2025-07-23 22:16:33'),(59,'nice.jpg',NULL,NULL,'nice.jpg',0,'2025-07-22 21:57:43'),(60,'oh-no-anyway.jpg',NULL,NULL,'oh-no-anyway.jpg',0,'2025-07-22 21:57:43'),(61,'ok_genius_rdj.jpeg',NULL,NULL,'ok_genius_rdj.jpeg',0,'2025-07-22 21:57:43'),(62,'one_more_step_sam_lotr_far_australia.jpg',NULL,NULL,'one_more_step_sam_lotr_far_australia.jpg',0,'2025-07-22 21:57:43'),(63,'people-in-nature-how-i-act-when-i-get-a-new-book-im-going-on-an-adventure.png',NULL,NULL,'people-in-nature-how-i-act-when-i-get-a-new-book-im-going-on-an-adventure.png',1,'2025-07-24 22:52:43'),(64,'pretendingtounderstand.jpg',NULL,NULL,'pretendingtounderstand.jpg',0,'2025-07-22 21:57:43'),(65,'pretendyouknow.jpg',NULL,NULL,'pretendyouknow.jpg',0,'2025-07-22 21:57:43'),(66,'pythonwritteninc.png',NULL,NULL,'pythonwritteninc.png',0,'2025-07-22 21:57:43'),(68,'regular_expressions_superhero.png',NULL,NULL,'regular_expressions_superhero.png',0,'2025-07-22 21:57:43'),(69,'releasesilksongordraw25.jpeg',NULL,NULL,'releasesilksongordraw25.jpeg',0,'2025-07-22 21:57:43'),(70,'sadthumbsup.webp',NULL,NULL,'sadthumbsup.webp',1,'2025-08-31 09:09:05'),(71,'signal-2022-11-26-18-15-40-803.gif',NULL,NULL,'cooking_flames_in_pan',0,'2025-07-22 21:57:43'),(72,'signal-2023-05-24-07-12-18-634.gif',NULL,NULL,'mrbean_calm_down',1,'2025-08-31 09:00:17'),(73,'signal-2023-09-20-19-55-44-421-1.png',NULL,NULL,'pat_a_mat_kopu_jamu',0,'2025-07-22 21:57:43'),(74,'signal-2023-09-22-06-33-38-108-1.jpg',NULL,NULL,'romeo_a_julie_oči',0,'2025-07-22 21:57:43'),(75,'signal-2023-10-04-18-03-05-525.jpg',NULL,NULL,'taking_the_hobbits_to_isengard',1,'2025-08-27 12:26:06'),(76,'signal-2023-10-04-18-06-30-014.jpg',NULL,NULL,'lotr_fellowship_sam',0,'2025-07-22 21:57:43'),(77,'signal-2023-10-04-18-33-31-659.png',NULL,NULL,'scamdalf',0,'2025-07-22 21:57:43'),(78,'signal-2023-12-09-21-13-34-329.jpg',NULL,NULL,'mediocrates',0,'2025-07-22 21:57:43'),(79,'signal-2023-12-09-21-15-06-790.jpg',NULL,NULL,'youlooklikeshit',0,'2025-07-22 21:57:43'),(80,'signal-2024-02-16-19-53-11-982.jpg',NULL,NULL,'vlad_turkish_kebab',0,'2025-07-22 21:57:43'),(81,'signal-2024-02-20-05-48-56-665.png',NULL,NULL,'food _in _every_ situation',0,'2025-07-22 21:57:43'),(82,'signal-2024-03-13-08-56-53-152.png',NULL,NULL,'spreadsheet_xkcd',0,'2025-07-22 21:57:43'),(83,'signal-2024-04-08-14-44-53-173.jpg',NULL,NULL,'ten_hoch_je_marny_patamat',0,'2025-07-22 21:57:43'),(84,'signal-2024-04-08-14-45-33-696.jpg',NULL,NULL,'tohle_ti_nedaruju_patamat',0,'2025-07-22 21:57:43'),(85,'signal-2024-04-25-15-38-41-048.jpg',NULL,NULL,'death_or_treat',0,'2025-07-22 21:57:43'),(86,'signal-2024-04-28-19-42-03-068.jpg',NULL,NULL,'tudum_vlak_shitpost',0,'2025-07-22 21:57:43'),(87,'signal-2024-09-12-10-36-20-656.gif',NULL,NULL,'burninghouseflood',0,'2025-07-22 21:57:43'),(88,'signal-2024-09-23-21-00-37-972.jpg',NULL,NULL,'startrek_asi_sto',0,'2025-07-22 21:57:43'),(89,'signal-2024-10-10-19-23-13-787.jpg',NULL,NULL,'i_hate_my_life',0,'2025-07-22 21:57:43'),(90,'signal-2024-10-12-12-33-17-779.jpg',NULL,NULL,'life_or_yousuck',0,'2025-07-22 21:57:43'),(91,'signal-2024-10-13-07-06-37-259.jpg',NULL,NULL,'hes_got_a_point',0,'2025-07-22 21:57:43'),(92,'signal-2024-10-16-11-16-08-147.png',NULL,NULL,'your_moms_phone_lotr',0,'2025-07-22 21:57:43'),(93,'signal-2024-10-17-20-50-34-612.png',NULL,NULL,'silmarillion_tweet_240characters',0,'2025-07-22 21:57:43'),(94,'signal-2024-10-30-13-15-46-927.png',NULL,NULL,'elrond_ok_boomer',0,'2025-07-22 21:57:43'),(95,'signal-2024-11-03-20-22-31-840.jpg',NULL,NULL,'monarchie_debil_1_retard',0,'2025-07-22 21:57:43'),(96,'signal-2024-11-04-16-30-55-756.png',NULL,NULL,'vlak_masaryk_shitpost',0,'2025-07-22 21:57:43'),(97,'signal-2024-12-01-12-10-29-748.jpg',NULL,NULL,'priest_guns_holydamage',0,'2025-07-22 21:57:43'),(98,'signal-2025-02-18-16-07-03-830.jpg',NULL,NULL,'speedoflight_ragebait',1,'2025-08-31 08:45:57'),(99,'signal-2025-05-15-19-52-01-747.jpg',NULL,NULL,'prasek_ktery_vas_primeje_rict_vztazitelne',0,'2025-07-22 21:57:43'),(100,'signal-2025-06-14-17-14-40-741.png',NULL,NULL,'frieren_grenade_launcher',1,'2025-08-31 10:00:48'),(101,'signal-2025-06-14-17-14-54-818.png',NULL,NULL,'considers_giving_you_up',1,'2025-08-31 10:00:17'),(102,'signal-2025-06-14-17-15-07-451.png',NULL,NULL,'bathing_toaster',0,'2025-07-22 21:57:43'),(103,'signal-2025-07-12-091529_002.png',NULL,NULL,'danger_infinite_recursion',0,'2025-07-22 21:57:43'),(104,'sleepdeathwithoutcommitment.webp',NULL,NULL,'sleepdeathwithoutcommitment.webp',0,'2025-07-22 21:57:43'),(105,'sleepforfun.jpg',NULL,NULL,'sleepforfun.jpg',0,'2025-07-22 21:57:43'),(106,'sleepyatworksleepatwork.jpeg',NULL,NULL,'sleepyatworksleepatwork.jpeg',0,'2025-07-22 21:57:43'),(107,'snorting_coke_sigma_beatles.gif',NULL,NULL,'snorting_coke_sigma_beatles.gif',0,'2025-07-22 21:57:43'),(108,'stonks.webp',NULL,NULL,'stonks.webp',0,'2025-07-22 21:57:43'),(109,'superioritycomparator.webp',NULL,NULL,'superioritycomparator.webp',0,'2025-07-22 21:57:43'),(110,'swiss_flag_plus.jpeg',NULL,NULL,'swiss_flag_plus.jpeg',0,'2025-07-22 21:57:43'),(111,'tea_beatles.gif',NULL,NULL,'tea_beatles.gif',0,'2025-07-22 21:57:43'),(112,'tea_sipping_aubrey.gif',NULL,NULL,'tea_sipping_aubrey.gif',0,'2025-07-22 21:57:43'),(113,'tea_sipping_tom.gif',NULL,NULL,'tea_sipping_tom.gif',0,'2025-07-22 21:57:43'),(114,'testing_code_testing_me.jpeg',NULL,NULL,'testing_code_testing_me.jpeg',0,'2025-07-22 21:57:43'),(115,'thar-escalated-quickly.jpg',NULL,NULL,'thar-escalated-quickly.jpg',0,'2025-07-22 21:57:43'),(116,'that-which-does-not-kill-us-makes-us-stronger-it-also-gives-us-unhealthy-coping-mechanisms-and-a-really-dark-sense-of-humor--89419.png',NULL,NULL,'that-which-does-not-kill-us-makes-us-stronger-it-also-gives-us-unhealthy-coping-mechanisms-and-a-really-dark-sense-of-humor--89419.png',0,'2025-07-22 21:57:43'),(117,'thesecretingredientiscrime.jpeg',NULL,NULL,'thesecretingredientiscrime.jpeg',0,'2025-07-22 21:57:43'),(118,'they_got_us_in_the_first_half.jpg',NULL,NULL,'they_got_us_in_the_first_half.jpg',0,'2025-07-22 21:57:43'),(119,'thumbupboy.jpeg',NULL,NULL,'thumbupboy.jpeg',1,'2025-08-31 09:08:12'),(120,'thumbupjensen.jpg',NULL,NULL,'thumbupjensen.jpg',1,'2025-08-31 09:08:24'),(121,'toilet_ihave_seen_terrible_things.webp',NULL,NULL,'toilet_ihave_seen_terrible_things.webp',0,'2025-07-22 21:57:43'),(122,'travel--vacation-photos-brace.jpg',NULL,NULL,'travel--vacation-photos-brace.jpg',0,'2025-07-22 21:57:43'),(123,'troubleforsomethingyoudid.jpeg',NULL,NULL,'troubleforsomethingyoudid.jpeg',1,'2025-08-31 09:01:00'),(124,'waitingprogrammingpatience.jpg',NULL,NULL,'waitingprogrammingpatience.jpg',0,'2025-07-22 21:57:43'),(125,'while vs do while loop.jpg',NULL,NULL,'while vs do while loop.jpg',0,'2025-07-22 21:57:43'),(126,'yomamabinarytreelinkedlist.jpg',NULL,NULL,'yomamabinarytreelinkedlist.jpg',0,'2025-07-22 21:57:43'),(127,'2009 vs 2019_programming.jpg',NULL,NULL,'2009 vs 2019_programming.jpg',0,'2025-07-22 21:57:43'),(128,'So_That_Was_a_Lie.jpg',NULL,NULL,'So_That_Was_a_Lie.jpg',1,'2025-07-24 22:35:43'),(130,'bookmeme1_cat.jpg',NULL,NULL,'bookmeme1_cat.jpg',0,'2025-07-22 21:57:43'),(131,'book_room_happy_cat.jpg',NULL,NULL,'book_room_happy_cat.jpg',0,'2025-07-22 21:57:43'),(132,'dogplayingchess.jpg',NULL,NULL,'dogplayingchess.jpg',1,'2025-08-31 09:00:53'),(133,'happiness_books.jpg',NULL,NULL,'happiness_books.jpg',0,'2025-07-22 21:57:43'),(134,'happiness_is_book_series.jpg',NULL,NULL,'happiness_is_book_series.jpg',0,'2025-07-22 21:57:43'),(135,'chess_funny_face.jpg',NULL,NULL,'chess_funny_face.jpg',0,'2025-07-22 21:57:43'),(136,'Chicken_Jockey.webp',NULL,NULL,'Chicken_Jockey.webp',0,'2025-07-22 21:57:43'),(137,'i_eat_cement_cat_meme_funny_brainrot_unhinged_brain_rot_women_shirt.jpg',NULL,NULL,'i_eat_cement_cat_meme_funny_brainrot_unhinged_brain_rot_women_shirt.jpg',0,'2025-07-22 21:57:43'),(138,'knihy_amazon_box_on_truck.jpg',NULL,NULL,'knihy_amazon_box_on_truck.jpg',0,'2025-07-22 21:57:43'),(139,'knihy_no_regret.jpg',NULL,NULL,'knihy_no_regret.jpg',0,'2025-07-22 21:57:43'),(140,'lava_chicken.jpg',NULL,NULL,'lava_chicken.jpg',0,'2025-07-22 21:57:43'),(141,'massive.jpeg',NULL,NULL,'massive.jpeg',0,'2025-07-22 21:57:43'),(142,'nestojimovasekidy.png',NULL,NULL,'nestojimovasekidy.png',0,'2025-07-22 21:57:43'),(143,'reading.jpg',NULL,NULL,'reading.jpg',0,'2025-07-22 21:57:43'),(144,'sadlike.webp',NULL,NULL,'sadlike.webp',1,'2025-08-31 09:09:14'),(146,'vrcholkinematografie.gif',NULL,NULL,'vrcholkinematografie.gif',0,'2025-07-22 21:57:43'),(147,'adhd.jpg',NULL,NULL,'adhd.jpg',0,'2025-08-31 09:33:29'),(148,'brno_ne_dekuji.jpeg',NULL,NULL,'brno_ne_dekuji.jpeg',0,'2025-08-31 09:33:29'),(149,'dnes_sekne.jpeg',NULL,NULL,'dnes_sekne.jpeg',0,'2025-08-31 09:33:29'),(150,'double_negative.jpeg',NULL,NULL,'double_negative.jpeg',0,'2025-08-31 09:33:29'),(151,'gotham_chess_that_takes_skill.gif',NULL,NULL,'gotham_chess_that_takes_skill.gif',0,'2025-08-31 09:33:29'),(152,'headache_russia.png',NULL,NULL,'headache_russia.png',0,'2025-08-31 09:33:29'),(153,'hikaru_idk_chess.gif',NULL,NULL,'hikaru_idk_chess.gif',0,'2025-08-31 09:33:29'),(154,'hikaru_wtf_chess-blunder.gif',NULL,NULL,'hikaru_wtf_chess-blunder.gif',0,'2025-08-31 09:33:29'),(155,'i_hide_you_seek_professional_help.jpeg',NULL,NULL,'i_hide_you_seek_professional_help.jpeg',0,'2025-08-31 09:33:29'),(156,'is_this_a_ragebait.jpg',NULL,NULL,'is_this_a_ragebait.jpg',0,'2025-08-31 09:33:29'),(157,'maybe_draco.gif',NULL,NULL,'maybe_draco.gif',0,'2025-08-31 09:33:29'),(158,'objects_women_programming_languages_window.webp',NULL,NULL,'objects_women_programming_languages_window.webp',0,'2025-08-31 09:33:29'),(159,'outstanding_move_chess.jpg',NULL,NULL,'outstanding_move_chess.jpg',0,'2025-08-31 09:33:29'),(160,'paddle_faster_i_hear_banjos.jpeg',NULL,NULL,'paddle_faster_i_hear_banjos.jpeg',0,'2025-08-31 09:33:29'),(161,'play_ukulele_gun.jpeg',NULL,NULL,'play_ukulele_gun.jpeg',0,'2025-08-31 09:33:29'),(162,'radagast.jpeg',NULL,NULL,'radagast.jpeg',0,'2025-08-31 09:33:29'),(163,'searching_for_somebody_who_cares.gif',NULL,NULL,'searching_for_somebody_who_cares.gif',0,'2025-08-31 09:33:29'),(164,'smiling_hikaru_chess.gif',NULL,NULL,'smiling_hikaru_chess.gif',0,'2025-08-31 09:33:29'),(165,'spanish_question.jpeg',NULL,NULL,'spanish_question.jpeg',0,'2025-08-31 09:33:29'),(166,'spiders_developers_enjoy_finding_bugs.jpg',NULL,NULL,'spiders_developers_enjoy_finding_bugs.jpg',0,'2025-08-31 09:33:29'),(167,'teacher_winning_argument.jpeg',NULL,NULL,'teacher_winning_argument.jpeg',0,'2025-08-31 09:33:29'),(168,'usa_usb_tea.jpeg',NULL,NULL,'usa_usb_tea.jpeg',1,'2025-08-31 10:01:56'),(169,'venn_yohohoho.jpeg',NULL,NULL,'venn_yohohoho.jpeg',0,'2025-08-31 09:33:29'),(170,'walkietalkie_ageofmen_is_over.jpeg',NULL,NULL,'walkietalkie_ageofmen_is_over.jpeg',0,'2025-08-31 09:33:29'),(171,'Well_Yes_But_Actually_No.jpg',NULL,NULL,'Well_Yes_But_Actually_No.jpg',0,'2025-08-31 09:33:29'),(172,'xminus1.webp',NULL,NULL,'xminus1.webp',0,'2025-08-31 09:33:29'),(173,'you_think_im_stupid.png',NULL,NULL,'you_think_im_stupid.png',1,'2025-08-31 09:59:47');
/*!40000 ALTER TABLE `obrazky` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obrazky_archive`
--

DROP TABLE IF EXISTS `obrazky_archive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `obrazky_archive` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nazev` varchar(255) NOT NULL,
  `tagy` int DEFAULT NULL,
  `lightness` int DEFAULT NULL,
  `prezdivka` varchar(255) DEFAULT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `lasttime` datetime NOT NULL DEFAULT '2025-07-22 21:57:43',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obrazky_archive`
--

LOCK TABLES `obrazky_archive` WRITE;
/*!40000 ALTER TABLE `obrazky_archive` DISABLE KEYS */;
/*!40000 ALTER TABLE `obrazky_archive` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `znamky` int DEFAULT NULL,
  `prezdivka` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'Katerina Zvanovcova','zmie@email.cz',1,'Katerina Zvanovcova'),(2,'Franta Shovnocucem','franta@fekal.cz',2,'Franta Shovnocucem'),(3,'Pepa Zdepa',NULL,NULL,'Pepa Zdepa'),(4,'Vrata Odchlivka',NULL,NULL,'Vrata Odchlivka'),(5,'Pepa Zdepa',NULL,NULL,'Pepa Zdepa'),(6,'Vrata Odchlivka',NULL,NULL,'Vrata Odchlivka'),(7,'Pepa Zdepa',NULL,NULL,'Pepa Zdepa'),(8,'Vrata Odchlivka',NULL,NULL,'Vrata Odchlivka'),(9,'Pepa Zdepa',NULL,NULL,'Pepa Zdepa'),(10,'Vrata Odchlivka',NULL,NULL,'Vrata Odchlivka');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tagy`
--

DROP TABLE IF EXISTS `tagy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tagy` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nazev` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=319 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tagy`
--

LOCK TABLES `tagy` WRITE;
/*!40000 ALTER TABLE `tagy` DISABLE KEYS */;
INSERT INTO `tagy` VALUES (1,'sad'),(3,'congratulations'),(4,'irony'),(5,'lotr'),(6,'lie'),(7,'disappointment'),(9,'idontcare'),(10,'brainrot'),(11,'mental'),(12,'death'),(13,'lifesucks'),(14,'truth'),(15,'yousuck'),(16,'mediocre'),(17,'food'),(18,'chew'),(19,'america'),(20,'fat'),(21,'emotionaldamage'),(22,'upset'),(23,'hollowknight'),(24,'gaming'),(25,'thisisfine'),(26,'bufet'),(27,'lawfulgood'),(28,'bugfix'),(29,'awkward'),(30,'gratulation'),(31,'approved'),(32,'france'),(33,'baguette'),(34,'pain'),(35,'jesuis'),(36,'jesus'),(37,'forloop'),(38,'programming'),(39,'copypaste'),(40,'like'),(41,'understood'),(42,'sleep'),(43,'unknowing'),(44,'dontunderstand'),(45,'supernatural'),(46,'klid'),(47,'calm'),(48,'ajeto'),(49,'bakalari'),(50,'petka'),(51,'kofola'),(52,'breakup'),(53,'titanic'),(54,'priority'),(55,'priorities'),(56,'cat'),(57,'malevolence'),(58,'destruction'),(59,'coffee'),(60,'avogadro'),(61,'number'),(62,'heyladies'),(63,'senku'),(64,'anime'),(65,'science'),(66,'introvert'),(67,'boring'),(68,'notsame'),(69,'fire'),(70,'git'),(71,'impressed'),(72,'notmad'),(73,'tryagain'),(74,'coding'),(75,'notsmart'),(76,'dumb'),(77,'cheers'),(78,'dicaprio'),(79,'work'),(80,'late'),(81,'wednesday'),(82,'learn'),(83,'notfun'),(84,'done'),(85,'leaving'),(86,'patamat'),(87,'ancestors'),(88,'linus'),(89,'workhard'),(90,'roast'),(91,'monday'),(92,'kitten'),(93,'mrbean'),(94,'waiting'),(95,'wink'),(96,'men'),(97,'raccoon'),(98,'opinion'),(99,'nazor'),(100,'jedem'),(101,'nope'),(102,'no'),(103,'nice'),(104,'ohno'),(105,'anyway'),(106,'longest'),(107,'sam'),(108,'frodo'),(110,'book'),(111,'bookworm'),(112,'tolkien'),(113,'hobbit'),(114,'adventure'),(115,'python'),(116,'car'),(117,'regularexpressions'),(118,'unlikelysuperhero'),(119,'silksong'),(120,'dyinginside'),(121,'deadinside'),(122,'cooking'),(123,'jama'),(124,'funeral'),(125,'romeo'),(126,'juliet'),(127,'legolas'),(128,'isengard'),(129,'shitpost'),(130,'favoritecolor'),(131,'favouritecolor'),(132,'montypython'),(133,'peoplewhoknow'),(134,'bonk'),(135,'shibainu'),(136,'angry'),(137,'shit'),(138,'vlad'),(139,'kebab'),(140,'marny'),(141,'pomsta'),(142,'vlak'),(143,'tudum'),(144,'r'),(145,'startrek'),(146,'silmarillion'),(147,'okboomer'),(148,'monarchy'),(149,'idiot'),(150,'politics'),(151,'masaryk'),(152,'rusko'),(153,'gun'),(154,'holydamage'),(155,'priest'),(156,'christian'),(157,'einstein'),(158,'relatable'),(159,'frieren'),(160,'danger'),(161,'recursion'),(162,'homer'),(163,'fun'),(164,'coke'),(165,'beatles'),(166,'rule'),(167,'breakingrule'),(168,'stonks'),(169,'aristocracy'),(170,'switzerland'),(171,'swiss'),(172,'bigplus'),(173,'tea'),(174,'england'),(175,'sipstea'),(176,'aubrey'),(177,'testing'),(178,'escalation'),(179,'thatescalatedquickly'),(180,'dark'),(181,'crime'),(182,'ingredient'),(183,'theyhadus'),(184,'ngl'),(185,'jensen'),(186,'glasses'),(187,'toilet'),(188,'terrible'),(189,'boromir'),(190,'travel'),(191,'photos'),(192,'holiday'),(193,'beach'),(194,'siblinglove'),(195,'while'),(196,'cliff'),(197,'yomama'),(198,'progress'),(199,'computer'),(200,'samwise'),(201,'fellowship'),(202,'scam'),(203,'scamdalf'),(204,'parparmenu'),(205,'color'),(206,'meh'),(207,'lookslikeshit'),(208,'spreadsheet'),(209,'xkcd'),(210,'reaper'),(211,'fear'),(212,'genius'),(213,'asi_sto'),(214,'badpun'),(215,'life_or_you_suck'),(221,'point'),(222,'phone'),(223,'mum'),(224,'yourmum'),(225,'bigfont'),(226,'brightness'),(227,'speedoflight'),(228,'vztažitelné'),(229,'prášek'),(230,'rickroll'),(231,'age'),(232,'string'),(233,'ai'),(234,'bigbrain'),(235,'brain'),(236,'birthday'),(237,'bookmovie'),(238,'debugging'),(239,'angrycat'),(240,'colorblind'),(241,'self_deprecation'),(242,'critic'),(243,'error_message'),(244,'iunderstood'),(245,'pretending_to_understand'),(246,'secret_ingredient'),(247,'dog'),(248,'malevolent'),(249,'repeat'),(250,'cute'),(251,'sleepatwork'),(252,'plottwist'),(253,'italy'),(254,'chess'),(255,'happiness'),(256,'funnyface'),(257,'chicken'),(258,'eatcement'),(259,'regretnothing'),(260,'steve'),(261,'lava'),(262,'massive'),(263,'kidy'),(264,'limonadovyjoe'),(265,'sadlike'),(266,'kinematografie'),(267,'kino'),(268,'vrchol'),(269,'svěrák'),(270,'boy'),(271,'thumbsup'),(272,'adha'),(273,'brno'),(274,'ne_diky'),(275,'poprava'),(276,'sekne'),(277,'gilotina'),(278,'double_negative'),(279,'education'),(280,'skill'),(281,'takes_skill'),(282,'gothamchess'),(283,'ukraine'),(284,'headache'),(285,'russia'),(286,'hikaru'),(287,'idk'),(288,'wtf'),(289,'blunder'),(290,'seek_help'),(291,'hide'),(292,'ragebait'),(293,'maybe'),(294,'dracomalfoy'),(295,'objectifying'),(296,'languages'),(297,'outstanding_move'),(298,'banjo'),(299,'ukulele'),(300,'radagast'),(301,'smiling'),(302,'spanish'),(303,'question'),(304,'web'),(305,'usa'),(306,'usb'),(307,'venn_diagram'),(308,'pirates'),(309,'santa'),(310,'gangsta'),(311,'walkie_talkie'),(312,'age_of_men'),(313,'yes_but_no'),(314,'spiderman'),(315,'xplus1'),(316,'you_thing_im_stupid'),(317,'minecraft'),(318,'complex');
/*!40000 ALTER TABLE `tagy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tagy_archive`
--

DROP TABLE IF EXISTS `tagy_archive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tagy_archive` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nazev` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=317 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tagy_archive`
--

LOCK TABLES `tagy_archive` WRITE;
/*!40000 ALTER TABLE `tagy_archive` DISABLE KEYS */;
/*!40000 ALTER TABLE `tagy_archive` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-08-31 10:18:34
