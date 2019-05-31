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
-- Table structure for table `commu_ripple`
--

DROP TABLE IF EXISTS `commu_ripple`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commu_ripple` (
  `board_type` char(1) NOT NULL,
  `parent` int(11) unsigned NOT NULL,
  `num` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_num` int(11) unsigned NOT NULL,
  `depth` int(11) unsigned NOT NULL,
  `ord` int(11) unsigned NOT NULL,
  `id` varchar(22) NOT NULL,
  `content` text NOT NULL,
  `regist_day` char(20) NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commu_ripple`
--

LOCK TABLES `commu_ripple` WRITE;
/*!40000 ALTER TABLE `commu_ripple` DISABLE KEYS */;
INSERT INTO `commu_ripple` VALUES ('r',2,1,0,0,0,'skdp1','축하드려요 ^^','2019-05-29 (14:56)'),('q',6,2,0,0,0,'admin','안녕하세요 *^^* 연꽃관리자입니다. \r\n고객님께서 문의해주신 성공후기 게시판 글쓰기기능은 이성유저와의 매칭이 이루어져야 사용 할 수 있습니다.','2019-05-29 (15:08)'),('q',10,3,0,0,0,'admin','안녕하세요 고객님 확인결과 단순 오류로 확인되었습니다. 재로그인 후 쪽지함을 확인해주세요!^^','2019-05-30 (13:14)');
/*!40000 ALTER TABLE `commu_ripple` ENABLE KEYS */;
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
