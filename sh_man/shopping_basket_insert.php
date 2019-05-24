<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

if (isset($_SESSION['userid'])) {

  $session=$_SESSION['userid'];
  $prd_num = trim($_POST['prd_num']);
  $size = trim($_POST['size']);

  $color = trim($_POST["color"]);
  $count = trim($_POST["count"]);



  $sql = "INSERT INTO `wish_list` VALUES('$prd_num','$session','$count','$color','$size');";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }
}else{
  echo '<script >
    alert("로그인 후 이용해주세요");
  </script>';
}


mysqli_close($conn);




 ?>
