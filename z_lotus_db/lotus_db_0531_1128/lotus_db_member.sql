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
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `mb_num` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(22) NOT NULL,
  `passwd` varchar(22) NOT NULL,
  `name` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `tel` char(13) NOT NULL,
  `birth` char(8) NOT NULL,
  `gender` char(1) NOT NULL,
  `postcode` char(6) NOT NULL,
  `address` varchar(45) NOT NULL,
  `detailAddress` varchar(45) NOT NULL,
  `extraAddress` varchar(45) DEFAULT NULL,
  `black_list` char(1) DEFAULT NULL,
  `naver` varchar(45) DEFAULT NULL,
  `kakao` varchar(45) DEFAULT NULL,
  `facebook` varchar(45) DEFAULT NULL,
  `google` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mb_num_UNIQUE` (`mb_num`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `tel_UNIQUE` (`tel`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'dmsdudwo','1234','은영재','dmsdudwo1002@dddda.com','01023482329','05231993','0','05834','서울 강남구','가 길','45','0',NULL,NULL,NULL,NULL),(2,'dmsdudwo1','1234','이영재','dmsdudwo1003@dass.com','01023432323','05121995','0','05934','서울 동대문구','나 길','12','1',NULL,NULL,NULL,NULL),(3,'dmsdudwo2','1234','조영재','dmsdudwo1004@dass.com','01034345454','05221994','0','05834','서울 성동구','다 길','23','1',NULL,NULL,NULL,NULL),(4,'dmsdudwo3','1234','박영재','dmsdudwo1005@dass.com','01094342233','05211992','0','05834','서울 종로구','라 길','32','0',NULL,NULL,NULL,NULL),(5,'dmsdudwo4','1234','잼미','dmsdudwo1006@dass.com','01045453434','05211991','1','05834','대전 대덕구','마 길','6','0',NULL,NULL,NULL,NULL),(6,'dmsdudwo5','1234','양팡','dmsdudwo1007@dass.com','01023456565','05121994','1','05834','부산 강서구','바 길','94','0',NULL,NULL,NULL,NULL),(7,'dmsdudwo6','1234','유소나','dmsdudwo1008@dass.com','01023443232','05121996','1','05834','광주 광산구','사 길','1','1',NULL,NULL,NULL,NULL),(8,'dmsdudwo7','1234','꽃빈','dmsdudwo1009@dass.com','01034323232','05111992','1','05834','제주특별자치도 제주시','아 길','65','0',NULL,NULL,NULL,NULL),(9,'dmsdudwo8','1234','곽영재','dmsdudwo1010@dass.com','01088554343','05111995','0','05834','인천 부평구','자 길','54','0',NULL,NULL,NULL,NULL),(10,'dmsdudwo9','1234','서강준','dmsdudwo1011@dass.com','01023455454','05111985','0','05834','경기도 평택시','차 길','12','0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-31 11:31:31
