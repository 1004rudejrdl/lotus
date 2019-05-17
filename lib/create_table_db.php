<?php

function create_table($conn,$table_name){
  $flag = "NO";
  $sql = "show tables from ansisung";
  $result = mysqli_query($conn,$sql) or die('Error: ' . mysqli_error($conn));
  while ($row = mysqli_fetch_row($result)) {
    if($row[0]==="$table_name"){
      $flag="OK";
      break;
    }
  }
if ($flag==="NO") {
  switch ($table_name) {
    case 'member':
    $sql = "CREATE TABLE `member` (
      `mb_num` int(11) NOT NULL AUTO_INCREMENT,
      `id` varchar(22) NOT NULL,
      `passwd` varchar(22) NOT NULL,
      `name` varchar(10) NOT NULL,
      `email` varchar(45) NOT NULL,
      `tel` char(13) NOT NULL,
      `birth` char(8) NOT NULL,
      `gender` char(1) NOT NULL,
      `post_num` char(5) NOT NULL,
      `post_addr` varchar(100) NOT NULL,
      `black_list` char(1) DEFAULT NULL,
      `naver` varchar(45) DEFAULT NULL,
      `kakao` varchar(45) DEFAULT NULL,
      `facebook` varchar(45) DEFAULT NULL,
      `google` varchar(45) DEFAULT NULL,
      PRIMARY KEY (`id`),
      UNIQUE KEY `mb_num_UNIQUE` (`mb_num`),
      UNIQUE KEY `id_UNIQUE` (`id`),
      UNIQUE KEY `email_UNIQUE` (`email`),
      UNIQUE KEY `tel_UNIQUE` (`tel`),
      UNIQUE KEY `sns_UNIQUE` (`naver`),
      UNIQUE KEY `kakao_UNIQUE` (`kakao`),
      UNIQUE KEY `facebook_UNIQUE` (`facebook`),
      UNIQUE KEY `google_UNIQUE` (`google`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
      ";
      break;
      case 'member_meeting':
      $sql = "CREATE TABLE `member_meeting` (
        `id` VARCHAR(22) NOT NULL,
        `job` CHAR(2) NOT NULL,
        `height` CHAR(3) NOT NULL,
        `weight` CHAR(3) NOT NULL,
        `self_info` TEXT NOT NULL,
        `img` VARCHAR(100) NOT NULL,
        `good` CHAR(10) NULL,
        `maching` CHAR(10) NULL,
        `maching_day` CHAR(20) NULL,
        `op1` VARCHAR(45) NULL,
        `op2` VARCHAR(45) NULL,
        PRIMARY KEY (`id`));
    ";
        break;
      case 'member_msg':
      $sql = "CREATE TABLE `member_msg` (
      `msg_num` INT NOT NULL AUTO_INCREMENT,
      `r_id` VARCHAR(22) NOT NULL,
      `s_id` VARCHAR(22) NOT NULL,
      `msg_cont` TEXT NOT NULL,
      `read` CHAR(1) NOT NULL,
      `send_time` VARCHAR(30) NOT NULL,
      `op1` VARCHAR(45) NULL,
      `op2` VARCHAR(45) NULL,
      PRIMARY KEY (`msg_num`));
    ";
        break;
      default :
      echo '<script >
        alert("'.$table_name.' 테이블을 찾지 못했습니다.");
      </script>';
      break;

  }//end of switch
  if(mysqli_query($conn,$sql)){
      echo '<script >
        alert("'.$table_name.' 테이블 생성되었습니다.");
      </script>';
  }else{
    echo "실패원인".mysqli_query($conn);
  }
}//end of if flag
  //$name=$sub1=$sub2=$sub3=$sub4=$sub5=$sum=$avg="";
  //$mode=$result="";
  //``백틱을 쓰는 이유는 일반 변수와 차이를 두기 위하여


}





 ?>
