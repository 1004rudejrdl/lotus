<?php
session_start();
$match_time=$flag=$vote_id=$id="";
$userid=$_SESSION['userid'];
include '../lib/db_connector.php';
if(isset($_GET["mode"]) &&$_GET["mode"]=="check"){
  $id = test_input($_GET["id"]);
  $vote_id = test_input($_GET["vote_id"]);
  $sql="SELECT*FROM member_like WHERE `id`='$id' and `vote_id`='$vote_id'";
  $result=mysqli_query($conn,$sql);
  $rowcount=mysqli_num_rows($result);
  if($userid==$id){
    $sql="SELECT*FROM member_like WHERE `id`='$id'";
    $result=mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($result);
    $like1=$rowcount;
    echo "본인을 추천할 수 없습니다.".$like1;
  }else{
    if(empty($rowcount)){
      $sql="INSERT INTO member_like (`id`,`vote_id`)VALUES('$id','$vote_id')";
      $result=mysqli_query($conn,$sql) or die('Error: ' . mysqli_error($conn));
      $sql="SELECT*FROM member_like WHERE `id`='$id'";
      $result=mysqli_query($conn,$sql);
      $rowcount=mysqli_num_rows($result);
      $like=$rowcount;
      $sql="SELECT*FROM member_like WHERE `id`='$vote_id' and `vote_id`='$id'";
      $result=mysqli_query($conn,$sql);
      $rowcount=mysqli_num_rows($result);
      if(empty($rowcount)){
        echo "좋아요를 눌렀습니다.".$like;
      }else{
        $match_time=date("Y-m-d");
        $sql="UPDATE  member_meeting SET
        `matching`='$vote_id',`matching_day`='$match_time'WHERE `id`='$id'";
        $result=mysqli_query($conn,$sql);
        $sql="UPDATE  member_meeting SET
        `matching`='$id',`matching_day`='$match_time'WHERE `id`='$vote_id'";
        $result=mysqli_query($conn,$sql);
        echo "매칭이 성사 되었습니다.".$like;
      }

      //$alarm="좋아요를 눌렀습니다.";
      //$s = '[{"alarm":"'.$alarm.'"},{"like":"0"}]';
    }else{
      //$alarm="이미 좋아요를 눌렀습니다.";
      //$s = '[{"alarm":"'.$alarm.'"},{"like":"-1"}]';
      $sql="SELECT*FROM member_like WHERE `id`='$id'";
      $result=mysqli_query($conn,$sql);
      $rowcount=mysqli_num_rows($result);
      $like1=$rowcount;
      echo "이미 좋아요를 눌렀습니다.".$like1;

    }
  }
}


 ?>
