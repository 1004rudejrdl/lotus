<?php
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";


$prd_q_cont = test_input($_POST["prd_q_cont"]);
$secret = test_input($_POST["secret"]);
$prd_num = test_input($_POST["prd_num"]);
$id = "세션값";
$regist_day=date("Y-m-d (H:i)");
$sql = "INSERT INTO `prd_q` VALUES(null,'$prd_num','$prd_q_cont','$secret','n','$id','$regist_day');";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }

mysqli_close($conn);

  $s = '[{"id":"'.$id.'"},{"prd_q_cont":"'.$prd_q_cont.'"},{"regist_day":"'.$regist_day.'"}]';

echo $s;
 ?>
