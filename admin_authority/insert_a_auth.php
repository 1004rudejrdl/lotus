<?php

include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

$admin_id = trim($_POST['admin_id']);
$admin_pass = trim($_POST['admin_pass']);
$admin_name = trim($_POST['admin_name']);
$confirmed_email1 = trim($_POST["confirmed_email1"]);
$confirmed_email2 = trim($_POST["confirmed_email2"]);

$auth_mt=(!isset($_POST['auth_mt']))?(''):('O');
$auth_ra=(!isset($_POST['auth_ra']))?(''):('O');
$auth_sh=(!isset($_POST['auth_sh']))?(''):('O');
$auth_tt=(!isset($_POST['auth_tt']))?(''):('O');
$auth_commu=(!isset($_POST['auth_commu']))?(''):('O');
$auth_mb=(!isset($_POST['auth_mb']))?(''):('O');

$auth_mt = trim($auth_mt);
$auth_ra = trim($auth_ra);
$auth_sh = trim($auth_sh);
$auth_tt = trim($auth_tt);
$auth_commu = trim($auth_commu);
$auth_mb = trim($auth_mb);

  $sql = "INSERT INTO `admin_authority` VALUES('$admin_id','$admin_pass','$admin_name','$auth_mt','$auth_ra','$auth_sh','$auth_tt','$auth_commu','$auth_mb');";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }



  mysqli_close($conn);

  echo "<script>location.href='./a_auth_main.php';</script>";


 ?>
