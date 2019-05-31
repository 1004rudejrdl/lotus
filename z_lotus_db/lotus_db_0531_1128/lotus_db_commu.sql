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
-- Table structure for table `commu`
--

DROP TABLE IF EXISTS `commu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commu` (
  `board_type` char(1) NOT NULL,
  `num` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_num` int(11) unsigned NOT NULL,
  `depth` int(11) unsigned NOT NULL,
  `ord` int(11) unsigned NOT NULL,
  `id` varchar(22) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `regist_day` char(20) NOT NULL,
  `hit` int(11) NOT NULL,
  `secret` char(1) DEFAULT NULL,
  `no_ripple` char(1) DEFAULT NULL,
  `file_type_0` char(7) DEFAULT NULL,
  `file_name_0` varchar(50) DEFAULT NULL,
  `file_name_1` varchar(50) DEFAULT NULL,
  `file_name_2` varchar(50) DEFAULT NULL,
  `file_copied_0` varchar(50) DEFAULT NULL,
  `file_copied_1` varchar(50) DEFAULT NULL,
  `file_copied_2` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commu`
--

LOCK TABLES `commu` WRITE;
/*!40000 ALTER TABLE `commu` DISABLE KEYS */;
INSERT INTO `commu` VALUES ('f',1,1,0,0,'dmsdudwo6','안냐떼여','뀨&gt;&lt;','2019-05-29 (13:11)',2,NULL,NULL,'image','KakaoTalk_20181207_113857523.png',NULL,NULL,'2019_05_29_13_11_06_0.png',NULL,NULL),('r',2,2,0,0,'dmsdudwo','연결되었습니다! ^^ 이쁘게 연애할게요','안녕하세요 연꽃으로 연결되어서 너무 기쁘고 행복합니다 이쁜 사랑하겠습니다.','2019-05-29 (14:49)',3,NULL,NULL,'image','8(가로).jpg',NULL,NULL,'2019_05_29_14_49_27_0.jpg',NULL,NULL),('f',3,3,0,0,'dmsdudwo','안녕하세요~^^ 잘부탁드립니다.','잘부탁드립니다!','2019-05-29 (14:50)',1,NULL,NULL,'image','21.jpg',NULL,NULL,'2019_05_29_14_50_22_0.jpg',NULL,NULL),('m',4,4,0,0,'dmsdudwo','6/15일 정모일정입니다.','7시 퇴근 후 곱창먹고\r\n볼링장가기로 하죠!','2019-05-29 (14:52)',2,NULL,NULL,'image','1_BN_P.jpg',NULL,NULL,'2019_05_29_14_52_16_0.jpg',NULL,NULL),('f',5,5,0,0,'dmsdudwo9','요즘 영화 볼만한거 추천좀 해주세요','소개팅잡혔는데 뭐 보는게 제일 좋을까요?','2019-05-29 (14:57)',0,NULL,NULL,'image','1_BN_P.jpg',NULL,NULL,'2019_05_29_14_57_12_0.jpg',NULL,NULL),('q',6,6,0,0,'dmsdudwo9','글이 안써지는데 어떻게 해야하나요?','성공후기 게시판에 글을 쓰고 싶은데 안써지네요..','2019-05-29 (14:58)',5,NULL,NULL,'image','8(가로).jpg',NULL,NULL,'2019_05_29_14_58_46_0.jpg',NULL,NULL),('r',7,7,0,0,'dmsdudwo2','좋은인연 연결해주셔서 감사합니다~','오래오래 사귈게요 ㅎ','2019-05-30 (13:07)',0,NULL,NULL,'image','5.jpg',NULL,NULL,'2019_05_30_13_07_55_0.jpg',NULL,NULL),('r',8,8,0,0,'dmsdudwo1','연결 될 줄 몰랐는데 좋은 분과 연결되서 행복합니다 ㅎㅎㅎㅎ','감사해요 ㅎㅎㅎㅎ','2019-05-30 (13:11)',1,NULL,NULL,'image','6948bf566fd147e64063069a0af86298.jpg',NULL,NULL,'2019_05_30_13_11_14_0.jpg',NULL,NULL),('f',9,9,0,0,'dmsdudwo1','오늘 날씨 너무 덥지않나요 ㅠㅠ??','얇게 입고 나왔는데도 땀이..','2019-05-30 (13:12)',0,NULL,NULL,'image','20190221_서핑_피씨배경.jpg',NULL,NULL,'2019_05_30_13_12_16_0.jpg',NULL,NULL),('q',10,10,0,0,'dmsdudwo7','쪽지가 안보내지는데 어떻게 해야하나요 ??','상대방에게 쪽지가 안보내집니다..','2019-05-30 (13:13)',2,NULL,NULL,'image','1_BN_P.jpg',NULL,NULL,'2019_05_30_13_13_27_0.jpg',NULL,NULL);
/*!40000 ALTER TABLE `commu` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-31 11:31:29
