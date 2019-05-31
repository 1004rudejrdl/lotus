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
-- Table structure for table `prd_shop`
--

DROP TABLE IF EXISTS `prd_shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prd_shop` (
  `com_type` char(6) NOT NULL,
  `com_num` int(11) NOT NULL,
  `shop_num` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` char(20) NOT NULL,
  `shop_img` varchar(50) NOT NULL,
  `shop_list_link` varchar(50) DEFAULT NULL,
  `shop_tel` char(11) NOT NULL,
  `shop_postcode` char(6) NOT NULL,
  `shop_address` varchar(45) NOT NULL,
  `shop_detailAddress` varchar(45) NOT NULL,
  `shop_extraAddress` varchar(45) DEFAULT NULL,
  `shop_notice` text,
  PRIMARY KEY (`shop_num`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prd_shop`
--

LOCK TABLES `prd_shop` WRITE;
/*!40000 ALTER TABLE `prd_shop` DISABLE KEYS */;
INSERT INTO `prd_shop` VALUES ('s_',2,1,'미스터스트릿','2019_05_29_16_08_45_s_2_rg.jpg','http://mr-s.co.kr/product/list.html?cate_no=341','18339940','04574','서울 중구 난계로 185','제이엠플러스빌딩 4층','(황학동)','네'),('s_',3,2,'윙스몰','2019_05_29_16_46_51_s_3_rg.JPG','http://www.wingsmall.co.kr/','18990422','02436','서울 동대문구 망우로21길 4','춘태빌딩 C동 5층','(휘경동)','윙스몰입니다 ^^'),('s_',3,3,'연꽃테스터','2019_05_31_10_23_30_s_3_rg.png','연, 꽃','01091555957','04709','서울 성동구 무학로2길 54','4층','(도선동)','연애 꽃피우다 쇼핑몰 입니다');
/*!40000 ALTER TABLE `prd_shop` ENABLE KEYS */;
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
