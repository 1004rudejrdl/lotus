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
-- Table structure for table `prd_shop_detail`
--

DROP TABLE IF EXISTS `prd_shop_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prd_shop_detail` (
  `shop_num` int(11) NOT NULL,
  `prd_num` int(11) NOT NULL AUTO_INCREMENT,
  `prd_regist_day` char(20) NOT NULL,
  `prd_name` varchar(30) NOT NULL,
  `prd_type` char(1) NOT NULL,
  `shop_price` char(7) NOT NULL,
  `shop_color` char(1) NOT NULL,
  `shop_size` char(1) NOT NULL,
  `shop_best` char(1) DEFAULT NULL,
  `shop_stock` char(3) NOT NULL,
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
  PRIMARY KEY (`prd_num`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prd_shop_detail`
--

LOCK TABLES `prd_shop_detail` WRITE;
/*!40000 ALTER TABLE `prd_shop_detail` DISABLE KEYS */;
INSERT INTO `prd_shop_detail` VALUES (1,1,'2019-05-29 (16:22)','캐칭 청자켓','m','34800','1','2','','99','lotus_shop_캐칭 청자켓2.gif','2019_05_29_16_22_25_0.gif','lotus_shop_캐칭 청자켓.jpg','2019_05_29_16_22_25_1.jpg','','','','','','','','','','','','','','','',''),(1,2,'2019-05-29 (16:13)','몬타나 프린팅후드','m','19800','5','1','','99','lotus_shop_몬타나 프린팅후드.jpg','2019_05_29_16_13_41_0.jpg','','','','','','','','','','','','','','','','','',''),(1,3,'2019-05-29 (16:15)','레티노 린넨 셋업 싱글자켓','m','56800','2','2','','99','lotus_shop_레티노 린넨 셋업 싱글자켓.jpg','2019_05_29_16_15_59_0.jpg','','','','','','','','','','','','','','','','','',''),(1,4,'2019-05-29 (16:19)','라이키 데미지 워싱 진','m','24800','1','1','','99','lotus_shop_라이키2.gif','2019_05_29_16_19_19_0.gif','','','','','','','','','','','','','','','','','',''),(1,5,'2019-05-29 (16:24)','롱다리 9부 슬랙스','m','25800','1','1','','99','lotus_shop_롱다리 9부 슬랙스2.gif','2019_05_29_16_24_23_0.gif','lotus_shop_롱다리 9부 슬랙스.jpg','2019_05_29_16_24_23_1.jpg','','','','','','','','','','','','','','','',''),(1,6,'2019-05-29 (16:28)','베르만 오버 줄지 셔츠','m','19800','1','1','','99','lotus_shop_베르만 오버 줄지 셔츠.gif','2019_05_29_16_28_31_0.gif','lotus_shop1_베르만 오버 줄지셔츠.jpg','2019_05_29_16_28_31_1.jpg','','','','','','','','','','','','','','','',''),(1,7,'2019-05-29 (16:30)','크리미 린넨 7부 헨리넥셔츠','m','23900','1','1','','99','lotus_shop_크리미 린넨2.gif','2019_05_29_16_30_46_0.gif','lotus_shop2_크리미 린넨 7부 헨리넥 셔츠.jpg','2019_05_29_16_30_46_1.jpg','','','','','','','','','','','','','','','',''),(1,8,'2019-05-29 (16:33)','쿠앤크 헨리넥 반팔셔츠','m','22800','1','1','','99','lotus_shop_쿠앤크 헨리2.gif','2019_05_29_16_33_11_0.gif','lotus_shop3_쿠앤크 헨리 넥 반팔셔츠.jpg','2019_05_29_16_33_11_1.jpg','','','','','','','','','','','','','','','',''),(1,9,'2019-05-29 (16:34)','소매레옹 특양면 맨투맨','m','14800','1','1','','99','lotus_shop_소매레옹2.gif','2019_05_29_16_34_49_0.gif','lotus_shop4_소매레옹 특양면 맨투맨.jpg','2019_05_29_16_34_49_1.jpg','','','','','','','','','','','','','','','',''),(1,10,'2019-05-29 (16:36)','자이 면마 밴딩 반바지','m','15800','1','1','','88','lotus_shop_자이 면마 밴딩 반바지.jpg','2019_05_29_16_36_55_0.jpg','','','','','','','','','','','','','','','','','',''),(1,11,'2019-05-29 (16:40)','블랑 시크릿밴드 슬랙스','m','17800','1','1','','99','lotus_shop_블랑 시크릿밴드 슬랙스.gif','2019_05_29_16_40_04_0.gif','lotus_shop 블랑 시크릿밴드 슬랙스2.jpg','2019_05_29_16_40_04_1.jpg','','','','','','','','','','','','','','','',''),(2,12,'2019-05-29 (16:48)','러멘디(스카이에코백)','w','29800','1','1','','99','lotus_shop_러멘디(스카이에코백).jpg','2019_05_29_16_48_47_0.jpg','','','','','','','','','','','','','','','','','',''),(2,13,'2019-05-29 (16:50)','레노아(샤랄라플라워퍼퓸)','w','19800','1','1','','99','lotus_shop_레노아2.gif','2019_05_29_16_50_22_0.gif','lotus_shop_레노아(샤랄라플라워퍼퓸).jpg','2019_05_29_16_50_23_1.jpg','','','','','','','','','','','','','','','',''),(2,14,'2019-05-29 (16:52)','머밍레브(샤플라워JP)','w','28900','1','1','','99','lotus_shop_머밍레브2.gif','2019_05_29_16_52_09_0.gif','','','','','','','','','','','','','','','','','',''),(2,15,'2019-05-29 (16:54)','마델린(달링치마바지)','w','28000','1','1','','99','lotus_shop_마델린2.gif','2019_05_29_16_54_40_0.gif','lotus_shop_마델린(달링치마바지).jpg','2019_05_29_16_54_40_1.jpg','','','','','','','','','','','','','','','',''),(2,16,'2019-05-29 (16:56)','밀리언즈(기능성쿨스키니)','w','37000','1','1','','99','lotus_shop_밀리언즈2.gif','2019_05_29_16_56_41_0.gif','lotus_shop_밀리언즈(기능성쿨스키니).jpg','2019_05_29_16_56_41_1.jpg','','','','','','','','','','','','','','','',''),(2,17,'2019-05-29 (16:58)','벤티에(레터링윈드브레이커JP)','w','29800','1','1','','99','lotus_shop_벤티에2.gif','2019_05_29_16_58_32_0.gif','lotus_shop_벤티에(레터링윈드브레이커JP).jpg','2019_05_29_16_58_32_1.jpg','','','','','','','','','','','','','','','',''),(2,18,'2019-05-29 (17:00)','봄바람(찰랑주름밴딩롱SK)','w','13800','1','1','','99','lotus_shop_봄바람2.gif','2019_05_29_17_00_33_0.gif','lotus_shop_봄바람(찰랑주름밴딩롱SK).jpg','2019_05_29_17_00_33_1.jpg','','','','','','','','','','','','','','','',''),(2,19,'2019-05-29 (17:02)','어디에나(536P)','w','32000','1','1','','99','lotus_shop_어디에나2.gif','2019_05_29_17_02_46_0.gif','lotus_shop_어디에나(536P).jpg','2019_05_29_17_02_46_1.jpg','','','','','','','','','','','','','','','',''),(2,20,'2019-05-29 (17:04)','카푸치노(포켓원버튼JK)','w','24800','1','1','','99','lotus_shop_카푸치노2.gif','2019_05_29_17_04_28_0.gif','lotus_shop_카푸치노(오버빅포켓원버튼JK).jpg','2019_05_29_17_04_28_1.jpg','','','','','','','','','','','','','','','',''),(2,21,'2019-05-29 (17:14)','제르티(SS057H)','s','19800','1','1','','99','lotus_shoes_제르티(SS057SH).jpg','2019_05_29_17_14_37_0.jpg','','','','','','','','','','','','','','','','','',''),(2,22,'2019-05-29 (17:15)','그렇게널(1543SH)','s','29800','1','1','','99','lotus_shoes_그렇게널(1543SH).jpg','2019_05_29_17_15_20_0.jpg','','','','','','','','','','','','','','','','','',''),(1,23,'2019-05-29 (17:16)','트리플 스니커즈','s','39800','1','1','','99','lotus_shoes_트리플 스니커즈.jpg','2019_05_29_17_16_30_0.jpg','','','','','','','','','','','','','','','','','',''),(1,24,'2019-05-29 (17:17)','스페셜 하요 스니커즈','s','39000','1','1','','99','lotus_shoes_스페셜 하요 스니커즈.gif','2019_05_29_17_17_33_0.gif','','','','','','','','','','','','','','','','','',''),(1,25,'2019-05-29 (17:18)','비켄 스니커즈','s','29800','1','1','','99','lotus_shoes_비켄 스니커즈.jpg','2019_05_29_17_18_35_0.jpg','','','','','','','','','','','','','','','','','',''),(1,26,'2019-05-29 (17:19)','라운디 커플 스니커즈','s','32800','1','1','','99','lotus_shoes_라운디 커플 스니커즈.gif','2019_05_29_17_19_42_0.gif','','','','','','','','','','','','','','','','','',''),(3,27,'2019-05-31 (10:24)','테스트상품','w','100','4','3','1','1','lotus_logo_text_black.png','2019_05_31_10_24_24_0.png','','','','','','','','','','','','','','','','','','');
/*!40000 ALTER TABLE `prd_shop_detail` ENABLE KEYS */;
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
