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
-- Table structure for table `com_info`
--

DROP TABLE IF EXISTS `com_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_info` (
  `com_type` char(6) NOT NULL,
  `com_num` int(11) NOT NULL AUTO_INCREMENT,
  `com_name` char(20) NOT NULL,
  `com_postcode` char(6) NOT NULL,
  `com_address` varchar(45) NOT NULL,
  `com_detailAddress` varchar(45) NOT NULL,
  `com_extraAddress` varchar(45) DEFAULT NULL,
  `com_email` varchar(45) NOT NULL,
  `com_tel` char(11) NOT NULL,
  `com_busi_num` char(15) NOT NULL,
  `com_regist_num` varchar(20) NOT NULL,
  PRIMARY KEY (`com_num`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_info`
--

LOCK TABLES `com_info` WRITE;
/*!40000 ALTER TABLE `com_info` DISABLE KEYS */;
INSERT INTO `com_info` VALUES ('s_',1,'미스터스트릿','04574','서울 중구 난계로 185','제이엠플러스빌딩 4층','(황학동)','shinhj1991@naver.com','18339940','204-86-43584','2016-서울중구-0907호'),('s_',2,'윙스몰','02512','서울 동대문구 휘경동 49-324','자이빌딩 6층','(휘경동)','shinhj1991@naver.com','18990422','201-86-24666','2013-서울동대문-0499'),('s_',3,'연꽃테스터','07542','서울 성동구 무학로 2길','신방빌딩','(왕십리)','shinhj1991','01091559597','103-95-75098','2019-서울성동-5845호');
/*!40000 ALTER TABLE `com_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-31 11:31:32
