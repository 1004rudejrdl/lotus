<?php
function insert_init_data($conn, $table_name){
  $flag="NO";
  $sql = "SELECT * from $table_name";
  $result=mysqli_query($conn,$sql) or die('Error: '.mysqli_error($conn));

  $is_set=mysqli_num_rows($result);

  if(!empty($is_set) ){
    $flag="OK";
  }

  if($flag=="NO"){
    switch($table_name){
          case 'member' :
            $sql = "INSERT INTO `member` VALUES (1,'dmsdudwo','1234','은영재','dmsdudwo1002@dddda.com','01023482329','05231993','0','05834','서울 강남구','가 길','45','0',NULL,NULL,NULL,NULL),(2,'dmsdudwo1','1234','이영재','dmsdudwo1003@dass.com','01023432323','05121995','0','05934','서울 동대문구','나 길','12','1',NULL,NULL,NULL,NULL),(3,'dmsdudwo2','1234','조영재','dmsdudwo1004@dass.com','01034345454','05221994','0','05834','서울 성동구','다 길','23','1',NULL,NULL,NULL,NULL),(4,'dmsdudwo3','1234','박영재','dmsdudwo1005@dass.com','01094342233','05211992','0','05834','서울 종로구','라 길','32','0',NULL,NULL,NULL,NULL),(5,'dmsdudwo4','1234','잼미','dmsdudwo1006@dass.com','01045453434','05211991','1','05834','대전 대덕구','마 길','6','0',NULL,NULL,NULL,NULL),(6,'dmsdudwo5','1234','양팡','dmsdudwo1007@dass.com','01023456565','05121994','1','05834','부산 강서구','바 길','94','0',NULL,NULL,NULL,NULL),(7,'dmsdudwo6','1234','유소나','dmsdudwo1008@dass.com','01023443232','05121996','1','05834','광주 광산구','사 길','1','1',NULL,NULL,NULL,NULL),(8,'dmsdudwo7','1234','꽃빈','dmsdudwo1009@dass.com','01034323232','05111992','1','05834','제주특별자치도 제주시','아 길','65','0',NULL,NULL,NULL,NULL),(9,'dmsdudwo8','1234','곽영재','dmsdudwo1010@dass.com','01088554343','05111995','0','05834','인천 부평구','자 길','54','0',NULL,NULL,NULL,NULL),(10,'dmsdudwo9','1234','서강준','dmsdudwo1011@dass.com','01023455454','05111985','0','05834','경기도 평택시','차 길','12','0',NULL,NULL,NULL,NULL);";
            break;
          case 'member_meeting' :
            $sql = "INSERT INTO `member_meeting` VALUES ('dmsdudwo','1','180','72','모태솔로 구해주세요','profile_img/lotus1.jpg','dmsdudwo4','2019-05-29'),('dmsdudwo1','2','177','70','좋은 사람 만나고 싶어요 ','profile_img/lotus2.png','dmsdudwo5','2019-05-30'),('dmsdudwo2','3','175','70','뭐야 여기 왜 존잘 존예만 있어','profile_img/lotus3.jpg','dmsdudwo7','2019-05-30'),('dmsdudwo3','2','182','78','쪽지 주세요! 칼답 갑니다','profile_img/lotus4.jpg',NULL,NULL),('dmsdudwo4','3','160','47','자기소개서는 초등학교 이후로는 처음이라 무슨 말이 써야 할지 잘 모르겠습니다. 글보다는 직접 보는게 더 빠르지 않을까요?','profile_img/lotus7.jpg','dmsdudwo','2019-05-29'),('dmsdudwo5','1','162','49','일단 연락하고 봐요 인연이면 만나겠죠','profile_img/lotus8.jpg','dmsdudwo1','2019-05-30'),('dmsdudwo6','2','164','48','같이 바다 놀러가요~! 착한 분 만나고 싶습니다','profile_img/lotus9.jpg','dmsdudwo','2019-05-29'),('dmsdudwo7','4','166','50','정모 무조건 나갑니다. 여름에 같이 캠핑 가실 분 쪽지 주세요','profile_img/lotus10.jpg','dmsdudwo2','2019-05-30'),('dmsdudwo8','1','179','80','게임 좋아하시는 분 만나고 싶어','profile_img/lotus5.jpg',NULL,NULL),('dmsdudwo9','1','182','79','지역 가까운 분 만나고 싶어요','profile_img/lotus6.jpg',NULL,NULL);";
            break;
          case 'member_msg' :
            $sql = "INSERT INTO `member_msg` VALUES (1,'dmsdudwo6','dmsdudwo1','안녕하세요~^^','0','2019-05-30 (04:03)'),(2,'dmsdudwo1','dmsdudwo6','안녕하세요 ㅎㅎㅎㅎ','0','2019-05-30 (04:04)');";
            break;
          case 'member_like' :
            $sql = "INSERT INTO `member_like` VALUES ('dmsdudwo','dmsdudwo4'),('dmsdudwo1','dmsdudwo5'),('dmsdudwo2','dmsdudwo7'),('dmsdudwo4','dmsdudwo'),('dmsdudwo5','dmsdudwo1'),('dmsdudwo6','dmsdudwo'),('dmsdudwo7','dmsdudwo2');";
            break;
          case 'member_type_survey' :
            $sql = "INSERT INTO `member_type_survey` VALUES ('dmsdudwo1','4','4','4','1','1'),('dmsdudwo2','5','5','4','4','1'),('dmsdudwo3','2','3','2','1','4'),('dmsdudwo4','5','3','3','5','5'),('dmsdudwo5','5','2','4','3','3'),('dmsdudwo6','5','4','4','3','2'),('dmsdudwo7','3','2','5','2','1'),('dmsdudwo8','4','5','5','1','5'),('dmsdudwo9','2','3','3','1','2');";
            break;
          case 'com_info' :
            $sql = "INSERT INTO `com_info` VALUES ('s_',1,'미스터스트릿','04574','서울 중구 난계로 185','제이엠플러스빌딩 4층','(황학동)','shinhj1991@naver.com','18339940','204-86-43584','2016-서울중구-0907호'),('s_',2,'윙스몰','02512','서울 동대문구 휘경동 49-324','자이빌딩 6층','(휘경동)','shinhj1991@naver.com','18990422','201-86-24666','2013-서울동대문-0499'),('s_',3,'연꽃테스터','07542','서울 성동구 무학로 2길','신방빌딩','(왕십리)','shinhj1991','01091559597','103-95-75098','2019-서울성동-5845호');";
            break;
          case 'prd_shop' :
            $sql = "INSERT INTO `prd_shop` VALUES ('s_',2,1,'미스터스트릿','2019_05_29_16_08_45_s_2_rg.jpg','http://mr-s.co.kr/product/list.html?cate_no=341','18339940','04574','서울 중구 난계로 185','제이엠플러스빌딩 4층','(황학동)','네'),('s_',3,2,'윙스몰','2019_05_29_16_46_51_s_3_rg.JPG','http://www.wingsmall.co.kr/','18990422','02436','서울 동대문구 망우로21길 4','춘태빌딩 C동 5층','(휘경동)','윙스몰입니다 ^^'),('s_',3,3,'연꽃테스터','2019_05_31_10_23_30_s_3_rg.png','연, 꽃','01091555957','04709','서울 성동구 무학로2길 54','4층','(도선동)','연애 꽃피우다 쇼핑몰 입니다');";
            break;
          case 'prd_shop_detail' :
            $sql = "INSERT INTO `prd_shop_detail` VALUES (1,1,'2019-05-29 (16:22)','캐칭 청자켓','m','34800','1','2','1','99','lotus_shop_캐칭 청자켓2.gif','2019_05_29_16_22_25_0.gif','lotus_shop_캐칭 청자켓.jpg','2019_05_29_16_22_25_1.jpg','','','','','','','','','','','','','','','',''),(1,2,'2019-05-29 (16:13)','몬타나 프린팅후드','m','19800','5','1','','99','lotus_shop_몬타나 프린팅후드.jpg','2019_05_29_16_13_41_0.jpg','','','','','','','','','','','','','','','','','',''),(1,3,'2019-05-29 (16:15)','레티노 린넨 셋업 싱글자켓','m','56800','2','2','','99','lotus_shop_레티노 린넨 셋업 싱글자켓.jpg','2019_05_29_16_15_59_0.jpg','','','','','','','','','','','','','','','','','',''),(1,4,'2019-05-29 (16:19)','라이키 데미지 워싱 진','m','24800','1','1','','99','lotus_shop_라이키2.gif','2019_05_29_16_19_19_0.gif','','','','','','','','','','','','','','','','','',''),(1,5,'2019-05-29 (16:24)','롱다리 9부 슬랙스','m','25800','1','1','1','99','lotus_shop_롱다리 9부 슬랙스2.gif','2019_05_29_16_24_23_0.gif','lotus_shop_롱다리 9부 슬랙스.jpg','2019_05_29_16_24_23_1.jpg','','','','','','','','','','','','','','','',''),(1,6,'2019-05-29 (16:28)','베르만 오버 줄지 셔츠','m','19800','1','1','','99','lotus_shop_베르만 오버 줄지 셔츠.gif','2019_05_29_16_28_31_0.gif','lotus_shop1_베르만 오버 줄지셔츠.jpg','2019_05_29_16_28_31_1.jpg','','','','','','','','','','','','','','','',''),(1,7,'2019-05-29 (16:30)','크리미 린넨 7부 헨리넥셔츠','m','23900','1','1','','99','lotus_shop_크리미 린넨2.gif','2019_05_29_16_30_46_0.gif','lotus_shop2_크리미 린넨 7부 헨리넥 셔츠.jpg','2019_05_29_16_30_46_1.jpg','','','','','','','','','','','','','','','',''),(1,8,'2019-05-29 (16:33)','쿠앤크 헨리넥 반팔셔츠','m','22800','1','1','','99','lotus_shop_쿠앤크 헨리2.gif','2019_05_29_16_33_11_0.gif','lotus_shop3_쿠앤크 헨리 넥 반팔셔츠.jpg','2019_05_29_16_33_11_1.jpg','','','','','','','','','','','','','','','',''),(1,9,'2019-05-29 (16:34)','소매레옹 특양면 맨투맨','m','14800','1','1','','99','lotus_shop_소매레옹2.gif','2019_05_29_16_34_49_0.gif','lotus_shop4_소매레옹 특양면 맨투맨.jpg','2019_05_29_16_34_49_1.jpg','','','','','','','','','','','','','','','',''),(1,10,'2019-05-29 (16:36)','자이 면마 밴딩 반바지','m','15800','1','1','','88','lotus_shop_자이 면마 밴딩 반바지.jpg','2019_05_29_16_36_55_0.jpg','','','','','','','','','','','','','','','','','',''),(1,11,'2019-05-31 (14:06)','블랑 시크릿밴드 슬랙스','m','17800','1','1','','99','lotus_shop_블랑 시크릿밴드 슬랙스.gif','2019_05_29_16_40_04_0.gif','lotus_shop 블랑 시크릿밴드 슬랙스2.jpg','2019_05_29_16_40_04_1.jpg','','','','','','','','','','','','','','','',''),(2,12,'2019-05-29 (16:48)','러멘디(스카이에코백)','w','29800','1','1','','99','lotus_shop_러멘디(스카이에코백).jpg','2019_05_29_16_48_47_0.jpg','','','','','','','','','','','','','','','','','',''),(2,13,'2019-05-29 (16:50)','레노아(샤랄라플라워퍼퓸)','w','19800','1','1','','99','lotus_shop_레노아2.gif','2019_05_29_16_50_22_0.gif','lotus_shop_레노아(샤랄라플라워퍼퓸).jpg','2019_05_29_16_50_23_1.jpg','','','','','','','','','','','','','','','',''),(2,14,'2019-05-29 (16:52)','머밍레브(샤플라워JP)','w','28900','1','1','','99','lotus_shop_머밍레브2.gif','2019_05_29_16_52_09_0.gif','','','','','','','','','','','','','','','','','',''),(2,15,'2019-05-29 (16:54)','마델린(달링치마바지)','w','28000','1','1','','99','lotus_shop_마델린2.gif','2019_05_29_16_54_40_0.gif','lotus_shop_마델린(달링치마바지).jpg','2019_05_29_16_54_40_1.jpg','','','','','','','','','','','','','','','',''),(2,16,'2019-05-29 (16:56)','밀리언즈(기능성쿨스키니)','w','37000','1','1','','99','lotus_shop_밀리언즈2.gif','2019_05_29_16_56_41_0.gif','lotus_shop_밀리언즈(기능성쿨스키니).jpg','2019_05_29_16_56_41_1.jpg','','','','','','','','','','','','','','','',''),(2,17,'2019-05-29 (16:58)','벤티에(레터링윈드브레이커JP)','w','29800','1','1','','99','lotus_shop_벤티에2.gif','2019_05_29_16_58_32_0.gif','lotus_shop_벤티에(레터링윈드브레이커JP).jpg','2019_05_29_16_58_32_1.jpg','','','','','','','','','','','','','','','',''),(2,18,'2019-05-29 (17:00)','봄바람(찰랑주름밴딩롱SK)','w','13800','1','1','','99','lotus_shop_봄바람2.gif','2019_05_29_17_00_33_0.gif','lotus_shop_봄바람(찰랑주름밴딩롱SK).jpg','2019_05_29_17_00_33_1.jpg','','','','','','','','','','','','','','','',''),(2,19,'2019-05-29 (17:02)','어디에나(536P)','w','32000','1','1','1','99','lotus_shop_어디에나2.gif','2019_05_29_17_02_46_0.gif','lotus_shop_어디에나(536P).jpg','2019_05_29_17_02_46_1.jpg','','','','','','','','','','','','','','','',''),(2,20,'2019-05-29 (17:04)','카푸치노(포켓원버튼JK)','w','24800','1','1','','99','lotus_shop_카푸치노2.gif','2019_05_29_17_04_28_0.gif','lotus_shop_카푸치노(오버빅포켓원버튼JK).jpg','2019_05_29_17_04_28_1.jpg','','','','','','','','','','','','','','','',''),(2,21,'2019-05-29 (17:14)','제르티(SS057H)','s','19800','1','1','','99','lotus_shoes_제르티(SS057SH).jpg','2019_05_29_17_14_37_0.jpg','','','','','','','','','','','','','','','','','',''),(2,22,'2019-05-29 (17:15)','그렇게널(1543SH)','s','29800','1','1','','99','lotus_shoes_그렇게널(1543SH).jpg','2019_05_29_17_15_20_0.jpg','','','','','','','','','','','','','','','','','',''),(1,23,'2019-05-29 (17:16)','트리플 스니커즈','s','39800','1','1','','99','lotus_shoes_트리플 스니커즈.jpg','2019_05_29_17_16_30_0.jpg','','','','','','','','','','','','','','','','','',''),(1,24,'2019-05-29 (17:17)','스페셜 하요 스니커즈','s','39000','1','1','1','99','lotus_shoes_스페셜 하요 스니커즈.gif','2019_05_29_17_17_33_0.gif','','','','','','','','','','','','','','','','','',''),(1,25,'2019-05-29 (17:18)','비켄 스니커즈','s','29800','1','1','','99','lotus_shoes_비켄 스니커즈.jpg','2019_05_29_17_18_35_0.jpg','','','','','','','','','','','','','','','','','',''),(1,26,'2019-05-29 (17:19)','라운디 커플 스니커즈','s','32800','1','1','','99','lotus_shoes_라운디 커플 스니커즈.gif','2019_05_29_17_19_42_0.gif','','','','','','','','','','','','','','','','','',''),(3,27,'2019-05-31 (10:24)','테스트상품','w','100','4','3','','1','lotus_shoes_라운디 커플 스니커즈.gif','2019_05_29_17_19_42_0.gif','','','','','','','','','','','','','','','','','','');";
            break;
          case 'order_list' :
            $sql = "INSERT INTO `order_list` VALUES ('sw27',1,'dmsdudwo7',27,'1','2019-05-01 10:37:35','6',NULL,NULL,'n'),('sm11',2,'dmsdudwo5',11,'1','2019-05-02 10:58:11','6',NULL,NULL,'n'),('sm6',3,'dmsdudwo2',6,'2','2019-05-03 10:58:11','6',NULL,NULL,'n'),('sm8',4,'dmsdudwo1',8,'3','2019-05-06 10:58:11','5',NULL,NULL,'n'),('sm9',5,'dmsdudwo',9,'2','2019-05-07 10:58:11','5',NULL,NULL,'n'),('sm11',6,'dmsdudwo',11,'1','2019-05-10 10:58:11','5',NULL,NULL,'n'),('ss21',7,'dmsdudwo',21,'5','2019-05-11 10:58:11','4',NULL,NULL,'n'),('ss22',8,'dmsdudwo1',22,'7','2019-05-12 10:58:11','4',NULL,NULL,'n'),('ss24',9,'dmsdudwo9',24,'1','2019-05-13 10:58:11','3',NULL,NULL,'n'),('sw13',10,'dmsdudwo6',13,'1','2019-05-14 10:58:11','3',NULL,NULL,'n'),('sw14',11,'dmsdudwo3',14,'1','2019-05-15 10:58:11','2',NULL,NULL,'n'),('sw17',12,'dmsdudwo1',17,'2','2019-05-20 10:58:11','2',NULL,NULL,'n'),('sw19',13,'dmsdudwo8',19,'6','2019-05-21 10:58:11','1',NULL,NULL,'n'),('sw20',14,'dmsdudwo4',20,'1','2019-05-28 10:58:11','1',NULL,NULL,'n'),('sm1',15,'dmsdudwo',1,'2','2019-05-30 10:58:11','0',NULL,NULL,'n'),('ss25',16,'dmsdudwo',25,'3','2019-05-31 10:58:11','0',NULL,NULL,'n'),('sm5',17,'dmsdudwo',5,'1','2019-06-03 00:31:30','0',NULL,NULL,'n'),('sm2',18,'dmsdudwo',2,'1','2019-06-03 00:31:30','0',NULL,NULL,'n'),('sm1',19,'dmsdudwo',1,'1','2019-06-03 00:31:30','0',NULL,NULL,'n');";
            break;
          case 'wish_list' :
            $sql = "INSERT INTO `wish_list` VALUES ('w27','dmddudwo','1','w','L');";
            break;
          case 'commu' :
            $sql = "INSERT INTO `commu` VALUES ('f',1,1,0,0,'dmsdudwo6','안냐떼여','뀨&gt;&lt;','2019-05-29 (13:11)',2,NULL,NULL,'image','KakaoTalk_20181207_113857523.png',NULL,NULL,'2019_05_29_13_11_06_0.png',NULL,NULL),('r',2,2,0,0,'dmsdudwo','연결되었습니다! ^^ 이쁘게 연애할게요','안녕하세요 연꽃으로 연결되어서 너무 기쁘고 행복합니다 이쁜 사랑하겠습니다.','2019-05-29 (14:49)',3,NULL,NULL,'image','8(가로).jpg',NULL,NULL,'2019_05_29_14_49_27_0.jpg',NULL,NULL),('f',3,3,0,0,'dmsdudwo','안녕하세요~^^ 잘부탁드립니다.','잘부탁드립니다!','2019-05-29 (14:50)',1,NULL,NULL,'image','21.jpg',NULL,NULL,'2019_05_29_14_50_22_0.jpg',NULL,NULL),('m',4,4,0,0,'dmsdudwo','6/15일 정모일정입니다.','7시 퇴근 후 곱창먹고\r\n볼링장가기로 하죠!','2019-05-29 (14:52)',2,NULL,NULL,'image','1_BN_P.jpg',NULL,NULL,'2019_05_29_14_52_16_0.jpg',NULL,NULL),('f',5,5,0,0,'dmsdudwo9','요즘 영화 볼만한거 추천좀 해주세요','소개팅잡혔는데 뭐 보는게 제일 좋을까요?','2019-05-29 (14:57)',0,NULL,NULL,'image','1_BN_P.jpg',NULL,NULL,'2019_05_29_14_57_12_0.jpg',NULL,NULL),('q',6,6,0,0,'dmsdudwo9','글이 안써지는데 어떻게 해야하나요?','성공후기 게시판에 글을 쓰고 싶은데 안써지네요..','2019-05-29 (14:58)',5,NULL,NULL,'image','8(가로).jpg',NULL,NULL,'2019_05_29_14_58_46_0.jpg',NULL,NULL),('r',7,7,0,0,'dmsdudwo2','좋은인연 연결해주셔서 감사합니다~','오래오래 사귈게요 ㅎ','2019-05-30 (13:07)',0,NULL,NULL,'image','5.jpg',NULL,NULL,'2019_05_30_13_07_55_0.jpg',NULL,NULL),('r',8,8,0,0,'dmsdudwo1','연결 될 줄 몰랐는데 좋은 분과 연결되서 행복합니다 ㅎㅎㅎㅎ','감사해요 ㅎㅎㅎㅎ','2019-05-30 (13:11)',1,NULL,NULL,'image','6948bf566fd147e64063069a0af86298.jpg',NULL,NULL,'2019_05_30_13_11_14_0.jpg',NULL,NULL),('f',9,9,0,0,'dmsdudwo1','오늘 날씨 너무 덥지않나요 ㅠㅠ??','얇게 입고 나왔는데도 땀이..','2019-05-30 (13:12)',0,NULL,NULL,'image','20190221_서핑_피씨배경.jpg',NULL,NULL,'2019_05_30_13_12_16_0.jpg',NULL,NULL),('q',10,10,0,0,'dmsdudwo7','쪽지가 안보내지는데 어떻게 해야하나요 ??','상대방에게 쪽지가 안보내집니다..','2019-05-30 (13:13)',2,NULL,NULL,'image','1_BN_P.jpg',NULL,NULL,'2019_05_30_13_13_27_0.jpg',NULL,NULL);";
            break;
          case 'commu_ripple' :
            $sql = "INSERT INTO `commu_ripple` VALUES ('r',2,1,0,0,0,'skdp1','축하드려요 ^^','2019-05-29 (14:56)'),('q',6,2,0,0,0,'admin','안녕하세요 *^^* 연꽃관리자입니다. 고객님께서 문의해주신 성공후기 게시판 글쓰기기능은 이성유저와의 매칭이 이루어져야 사용 할 수 있습니다.','2019-05-29 (15:08)'),('q',10,3,0,0,0,'admin','안녕하세요 고객님 확인결과 단순 오류로 확인되었습니다. 재로그인 후 쪽지함을 확인해주세요!^^','2019-05-30 (13:14)');";
            break;
          case 'admin_authority' :
            $sql = "INSERT INTO `admin_authority` VALUES ('admin','ad','총관리','O','O','O','O','O','O');";
            break;
      default:
        echo "<script>alert('해당 테이블이름이 없습니다. ');</script>";
        break;
    }//end of switch

    if(mysqli_query($conn,$sql)){
      echo "<script>alert('$table_name 테이블 초기값 셋팅 완료');</script>";
    }else{
      echo "실패원인".mysqli_error($conn);
    }
  }//end of if flag

}//end of function

?>
