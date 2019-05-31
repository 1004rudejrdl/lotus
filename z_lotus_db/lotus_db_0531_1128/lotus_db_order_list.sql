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
-- Table structure for table `order_list`
--

DROP TABLE IF EXISTS `order_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_list` (
  `order_type` char(5) NOT NULL,
  `order_num` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(22) NOT NULL,
  `prd_num` char(20) NOT NULL,
  `order_count` char(2) NOT NULL,
  `order_day` char(20) NOT NULL,
  `tackback_state` char(1) NOT NULL,
  `takeback_reason` varchar(100) DEFAULT NULL,
  `tackback_day` char(20) DEFAULT NULL,
  `back_acc` char(1) NOT NULL,
  PRIMARY KEY (`order_num`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_list`
--

LOCK TABLES `order_list` WRITE;
/*!40000 ALTER TABLE `order_list` DISABLE KEYS */;
INSERT INTO `order_list` VALUES ('sw27',1,'dmsdudwo9','27','1','2019-05-01 10:37:35','6',NULL,NULL,'n'),('sm11',2,'dmsdudwo8','11','1','2019-05-02 10:58:11','6',NULL,NULL,'n'),('sm6',3,'dmsdudwo6','6','2','2019-05-03 10:58:11','6',NULL,NULL,'n'),('sm8',4,'dmsdudwo4','8','3','2019-05-06 10:58:11','5',NULL,NULL,'n'),('sm9',5,'dmsdudwo2','9','2','2019-05-07 10:58:11','5',NULL,NULL,'n'),('sm11',6,'dmsdudwo1','11','1','2019-05-10 10:58:11','5',NULL,NULL,'n'),('ss21',7,'dmsdudwo3','21','5','2019-05-11 10:58:11','4',NULL,NULL,'n'),('ss22',8,'dmsdudwo4','22','7','2019-05-12 10:58:11','4',NULL,NULL,'n'),('ss24',9,'dmsdudwo9','24','1','2019-05-13 10:58:11','3',NULL,NULL,'n'),('sw13',10,'dmsdudwo8','13','1','2019-05-14 10:58:11','3',NULL,NULL,'n'),('sw14',11,'dmsdudwo7','14','1','2019-05-15 10:58:11','2',NULL,NULL,'n'),('sw17',12,'dmsdudwo5','17','2','2019-05-20 10:58:11','2',NULL,NULL,'n'),('sw19',13,'dmsdudwo5','19','6','2019-05-21 10:58:11','1',NULL,NULL,'n'),('sw20',14,'dmsdudwo7','20','1','2019-05-28 10:58:11','1',NULL,NULL,'n'),('sm1',15,'dmsdudwo1','1','2','2019-05-30 10:58:11','0',NULL,NULL,'n'),('ss25',16,'dmsdudwo2','25','3','2019-05-31 10:58:11','0',NULL,NULL,'n');
/*!40000 ALTER TABLE `order_list` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-31 11:31:30
