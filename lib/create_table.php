<?php
function create_table($conn, $table_name){
  $flag="NO";
  $sql = "show tables from lotus_db";
  $result=mysqli_query($conn,$sql) or die('Error: '.mysqli_error($conn));

  while ($row=mysqli_fetch_row($result)) {
    if($row[0] === "$table_name"){//문자열로 넘어오므로 ""으로 처리 ''은 문자열뿐아니라 속성도 반영
      //ansisung 스키마에 찾는 테이블이 있는 경우
      $flag="OK";
      break;
    }
  }//end of while

  if($flag==="NO"){
    switch($table_name){
          case 'member' :
            $sql = "CREATE TABLE `member` (
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
                  );";
            break;
          case 'member_meeting' :
            $sql = "CREATE TABLE `member_meeting` (
                    `id` varchar(22) NOT NULL,
                    `job` char(2) NOT NULL,
                    `height` char(3) NOT NULL,
                    `weight` char(3) NOT NULL,
                    `self_info` text NOT NULL,
                    `img` varchar(100) NOT NULL,
                    `matching` varchar(22) DEFAULT NULL,
                    `matching_day` char(20) DEFAULT NULL,
                    PRIMARY KEY (`id`)
                  );";
            break;
          case 'member_msg' :
            $sql = "CREATE TABLE `member_msg` (
                    `msg_num` int(11) NOT NULL AUTO_INCREMENT,
                    `r_id` varchar(22) NOT NULL,
                    `s_id` varchar(22) NOT NULL,
                    `msg_cont` text NOT NULL,
                    `read` char(1) NOT NULL,
                    `send_time` varchar(30) NOT NULL,
                    PRIMARY KEY (`msg_num`)
                  );";
            break;
          case 'member_like' :
            $sql = "CREATE TABLE `member_like` (
                    `id` varchar(22) DEFAULT NULL,
                    `vote_id` varchar(22) DEFAULT NULL
                  );";
            break;
          case 'member_type_survey' :
            $sql = "CREATE TABLE `member_type_survey` (
                    `id` varchar(22) NOT NULL,
                    `type_height` char(1) NOT NULL,
                    `type_shape` char(1) NOT NULL,
                    `type_age` char(1) NOT NULL,
                    `type_job` char(1) NOT NULL,
                    `type_place` char(1) NOT NULL,
                    PRIMARY KEY (`id`)
                  );";
            break;
          case 'com_info' :
            $sql = "CREATE TABLE `com_info` (
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
                    `com_regist_num` varchar(15) NOT NULL,
                    PRIMARY KEY (`com_num`)
                  );";
            break;
          case 'prd_shop' :
            $sql = "CREATE TABLE `prd_shop` (
                    `com_type` char(6) NOT NULL,
                    `com_num` int(11) NOT NULL,
                    `shop_num` int(11) NOT NULL AUTO_INCREMENT,
                    `shop_name` char(20) NOT NULL,
                    `shop_img` varchar(50) NOT NULL,
                    `shop_list_link` varchar(50),
                    `shop_tel` char(11) NOT NULL,
                    `shop_postcode` char(6) NOT NULL,
                    `shop_address` varchar(45) NOT NULL,
                    `shop_detailAddress` varchar(45) NOT NULL,
                    `shop_extraAddress` varchar(45) DEFAULT NULL,
                    `shop_notice` text,
                    PRIMARY KEY (`shop_num`)
                  );";
            break;
          case 'prd_shop_detail' :
            $sql = "CREATE TABLE `prd_shop_detail` (
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
                  );";
            break;
          case 'order_list' :
            $sql = "CREATE TABLE `order_list` (
                    `order_type` char(5) NOT NULL,
                    `order_num` int(11) NOT NULL AUTO_INCREMENT,
                    `id` varchar(22) NOT NULL,
                    `prd_num` char(20) NOT NULL,
                    `order_count` char(2) NOT NULL,
                    `tackback_state` char(1) NOT NULL,
                    `takeback_reason` varchar(100) NOT NULL,
                    `tackback_day` char(20) DEFAULT NULL,
                    `back_acc` char(1) NOT NULL,
                    PRIMARY KEY (`order_num`)
                  );";
            break;
          case 'prd_like' :
            $sql = "CREATE TABLE `prd_like` (
                    `prd_num` char(20) NOT NULL,
                    `id` varchar(22) NOT NULL
                  );";
            break;
          case 'wish_list' :
            $sql = "CREATE TABLE `wish_list` (
              `prd_num` char(20) NOT NULL,
              `id` varchar(22) NOT NULL,
              `count` char(3) DEFAULT NULL,
              `color` char(1) DEFAULT NULL,
              `size` char(1) DEFAULT NULL
                  );";
            break;
          case 'commu' :
            $sql = "CREATE TABLE `commu` (
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
                  );";
            break;
          case 'commu_ripple' :
            $sql = "CREATE TABLE `commu_ripple` (
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
                  );";
            break;
          case 'commu_review' :
            $sql = "CREATE TABLE `commu_review` (
                    `matching` char(10) NOT NULL,
                    `num` int(11) NOT NULL AUTO_INCREMENT,
                    `id` varchar(22) NOT NULL,
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
                  );";
            break;
          case 'admin_authority' :
            $sql = "CREATE TABLE `admin_authority` (
                    `id` varchar(22) NOT NULL,
                    `passwd` varchar(22) NOT NULL,
                    `name` char(10) NOT NULL,
                    `auth_meeting` char(1) DEFAULT NULL,
                    `auth_ra` char(1) DEFAULT NULL,
                    `auth_shop` char(1) DEFAULT NULL,
                    `auth_test` char(1) DEFAULT NULL,
                    `auth_commu` char(1) DEFAULT NULL,
                    `auth_member` char(1) DEFAULT NULL,
                    PRIMARY KEY (`id`)
                  );";
            break;
          case 'company_information' :
            $sql = "CREATE TABLE `company_information` (
                    `com_rg_num` char(15) NOT NULL,
                    `com_name` char(15) NOT NULL,
                    `com_ceo` char(10) NOT NULL,
                    `com_postcode` char(6) NOT NULL,
                    `com_address` varchar(45) NOT NULL,
                    `com_detailAddress` varchar(45) NOT NULL,
                    `com_extraAddress` varchar(45) DEFAULT NULL,
                    `com_phone` char(20) NOT NULL,
                    `com_fax` char(20) NOT NULL,
                    `com_email` char(45) NOT NULL,
                    `com_intro` char(60) NOT NULL,
                    `com_bank` char(10) NOT NULL,
                    `com_acc` char(20) NOT NULL,
                    `com_manager` char(10) NOT NULL,
                    `com_time` char(20) NOT NULL,
                    PRIMARY KEY (`com_rg_num`)
                  );";
            break;
      default:
        echo "<script>alert('해당 테이블이름이 없습니다. ');</script>";
        break;
    }//end of switch

    if(mysqli_query($conn,$sql)){
      echo "<script>alert('$table_name 테이블이 생성되었습니다.');</script>";
    }else{
      echo "실패원인".mysqli_error($conn);
    }
  }//end of if flag

}//end of function

?>
