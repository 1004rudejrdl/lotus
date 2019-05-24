<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

$regist_day=date("Y-m-d (H:i)");
if (isset($_SESSION['userid'])) {
  $prd_q_cont = test_input($_POST["prd_q_cont"]);
  $secret = test_input($_POST["secret"]);
  $prd_num = test_input($_POST["prd_num"]);
  $id = $_SESSION['userid'];
  $sql = "INSERT INTO `prd_q` VALUES(null,'$prd_num','$prd_q_cont','$secret','n','$id','$regist_day');";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }

  mysqli_close($conn);

  $s = '[{"id":"'.$id.'"},{"prd_q_cont":"'.$prd_q_cont.'"},{"regist_day":"'.$regist_day.'"}]';

}else{

$s = '[{"id":"아이디"},{"prd_q_cont":"로그인 후 이용해 주세요"},{"regist_day":"'.$regist_day.'"}]';
}
echo $s;
 ?>
