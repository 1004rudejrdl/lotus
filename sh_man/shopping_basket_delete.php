<?php


session_start();
$session=$_SESSION['userid'];
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
// include $_SERVER['DOCUMENT_ROOT']."/ansisung/lib/session_call.php"; 로그인 인증이 필요한곳
// include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_con.php";
// include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/create_table.php";
// include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/func_main.php";
// include __DIR__."/../lib/create_table.php"; 자기 폴더 까지 찍으므로 상대경로의 문제점을 고치지는 못함
$all_delete=$_GET['mode'];
$user_delete=$_GET['mode_user'];

if ($all_delete=='all_delete'||$user_delete=='all_delete') {
  $sql="DELETE from `wish_list` where id='$session'";
}else{
  $prd_num=$_POST['prd_num'];
  $sql="DELETE from `wish_list` where id='$session' AND prd_num='$prd_num'";
}

$result = mysqli_query($conn,$sql);
if (!$result) {
  die('Error: ' . mysqli_error($conn));
}


  mysqli_close($conn);
  if ($_GET['mode_user']) {
    echo "<script>location.href='./user_shopping_basket.php';</script>";
  }else{
    echo "<script>location.href='./shopping_basket.php';</script>";
  }

 ?>
