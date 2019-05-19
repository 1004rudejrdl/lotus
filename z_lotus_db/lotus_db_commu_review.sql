-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: lotus_db
-- ------------------------------------------------------
-- Server version	5.7.10-log

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
-- Table structure for table `commu_review`
--

DROP TABLE IF EXISTS `commu_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commu_review` (
  `maching` char(10) NOT NULL,
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(22) NOT NULL,
  `name` varchar(10) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `regist_day` char(10) NOT NULL,
  `hit` int(11) NOT NULL,
  `file_name_0` varchar(50) DEFAULT NULL,
  `file_copied_0` varchar(50) DEFAULT NULL,
  `file_name_1` varchar(50) DEFAULT NULL,
  `file_copied_1` varchar(50) DEFAULT NULL,
  `file_name_2` varchar(50) DEFAULT NULL,
  `file_copied_2` varchar(50) DEFAULT NULL,
  `file_name_3` varchar(50) DEFAULT NULL,
  `file_copied_3` varchar(50) DEFAULT NULL,
  `file_name_4` varchar(50) DEFAULT NULL,
  `file_copied_4` varchar(50) DEFAULT NULL,
  `file_name_5` varchar(50) DEFAULT NULL,
  `file_copied_5` varchar(50) DEFAULT NULL,
  `file_name_6` varchar(50) DEFAULT NULL,
  `file_copied_6` varchar(50) DEFAULT NULL,
  `file_name_7` varchar(50) DEFAULT NULL,
  `file_copied_7` varchar(50) DEFAULT NULL,
  `file_name_8` varchar(50) DEFAULT NULL,
  `file_copied_8` varchar(50) DEFAULT NULL,
  `file_name_9` varchar(50) DEFAULT NULL,
  `file_copied_9` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commu_review`
--

LOCK TABLES `commu_review` WRITE;
/*!40000 ALTER TABLE `commu_review` DISABLE KEYS */;
/*!40000 ALTER TABLE `commu_review` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-20  6:34:26
