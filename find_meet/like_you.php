<?php
$flag=$vote_id=$id="";
include '../lib/db_connector.php';
if(isset($_GET["mode"]) &&$_GET["mode"]=="check"){
  $id = test_input($_GET["id"]);
  $vote_id = test_input($_GET["vote_id"]);
  $sql="SELECT*FROM member_like WHERE `id`='$id' and `vote_id`='$vote_id'";
  $result=mysqli_query($conn,$sql);
  $rowcount=mysqli_num_rows($result);

  if(empty($rowcount)){
    $sql="INSERT INTO member_like (`id`,`vote_id`)VALUES('$id','$vote_id')";
    $result=mysqli_query($conn,$sql) or die('Error: ' . mysqli_error($conn));
    $sql="SELECT*FROM member_like WHERE `id`='$vote_id' and `vote_id`='$id'";
    $result=mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($result);
    if(empty($rowcount)){
      echo "좋아요를 눌렀습니다.";
    }else{
      $match_time=date("Y-m-d");
      $sql="INSERT INTO member_meeting (`maching`,`maching_day`)VALUES('$id','$match_time')";
      echo "매칭이 성사 되었습니다~♥";
    }

    //$alarm="좋아요를 눌렀습니다.";
    //$s = '[{"alarm":"'.$alarm.'"},{"like":"0"}]';
  }else{
    //$alarm="이미 좋아요를 눌렀습니다.";
    //$s = '[{"alarm":"'.$alarm.'"},{"like":"-1"}]';

    echo "이미 좋아요를 눌렀습니다.";

  }
}


 ?>
