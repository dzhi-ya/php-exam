-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 2.59.42.52    Database: questionnaire
-- ------------------------------------------------------
-- Server version	5.7.32-0ubuntu0.18.04.1-log

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
-- Table structure for table `asks`
--

DROP TABLE IF EXISTS `asks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(10) unsigned NOT NULL,
  `type` varchar(64) NOT NULL,
  `payload` longtext NOT NULL,
  `anwser` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asks`
--

LOCK TABLES `asks` WRITE;
/*!40000 ALTER TABLE `asks` DISABLE KEYS */;
INSERT INTO `asks` VALUES (20,17,'1','Сколько вам лет?','45'),(21,17,'1','Как вам погода?','Отличная'),(22,18,'1','Как дела?','Хорошо'),(23,16,'1','Вы студент?','Да'),(24,19,'1','Сколько звезд на небе?','10000'),(25,20,'1','На каком вы курсе?','2'),(26,20,'1','Сколько у вас экзаменов?','5'),(27,20,'1','Сколько у вас зачетов?','5'),(28,19,'1','Что делать?','Радоваться!!!'),(29,21,'1','Что делать?','ничего'),(30,21,'1','Как вы себя чувствуете?','хорошо'),(36,21,'[\"17\",\"18\",\"19\",\"20\"]','Сколько Вам лет','17'),(38,22,'','Что делать?',NULL),(39,22,'','Что делать?',NULL),(40,19,'[\"16\",\"17\",\"18\"]','Сколько Вам лет','16'),(41,23,'[\"что-нибудь\",\"еще что-нибудь\"]','Что делать?','еще что-нибудь'),(42,23,'1','Что делать?','ро'),(44,24,'[\"что-нибудь\",\"еще что-нибудь\",\"пам\"]','Что делать?','пам'),(45,25,'[\"что-нибудь\",\"еще что-нибудь\"]','Что делать?',NULL),(46,25,'[\"что-нибудь\",\"еще что-нибудь3\",\"пам\"]','Что делать?',NULL),(50,25,'[\"хорошо\",\"плохо\",\"нормально3\"]','Как вы себя чувствуете?',NULL),(58,25,'1','2354534gdfgd',NULL);
/*!40000 ALTER TABLE `asks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `questions` varchar(256) NOT NULL,
  `answer` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `session` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `closed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_UNIQUE` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session`
--

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` VALUES (16,'b6ccb05100da9f52f29725bc27e9ca4d7d71076f','Сессия1',1),(17,'b4d87c99ce66d94984f30b82ef13e9ff4b7d5eaf','Сессия2',1),(18,'ceddd4a9ce5e27fb507d2cc15d1a03cba6431ac3','Сессия3',1),(19,'6972aa2f377d33c4ad65186b0e90fe6c680be877','Сессия4',1),(20,'a4ec27187f72cbdca6ede31b67a43ad5b0716877','Сессия5',1),(21,'4ce23692213a8ea284b8cc8539c6d24a3b5ec2ae','Сессия6',1),(22,'e6db9cbb57810f4eaaba946ee14381bed906efa5','Сессия8',0),(24,'ff72fb2499a33cf9d7e78335493411fbebc2223b','Сессия10',1),(25,'5e5efb24c447904a1bf460120672691b3f179122','Сессия11',0),(26,'b9341eea55ca01db6437538bf20f2f29ac24c893','Мой опрос',0);
/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telephone` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'all','admin@mail.ru','25d55ad283aa400af464c76d713c07ad','+7(909)999-99-99');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-28 16:22:51
