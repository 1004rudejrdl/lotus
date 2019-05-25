<?php
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";



$prd_num = trim($_POST['prd_num']);
$size = trim($_POST['size']);

$color = trim($_POST["color"]);
$count = trim($_POST["count"]);



$sql = "INSERT INTO `wish_list` VALUES('$prd_num','세션값','$count','$color','$size');";

$result = mysqli_query($conn,$sql);
if (!$result) {
  die('Error: ' . mysqli_error($conn));
}


mysqli_close($conn);




 ?>
