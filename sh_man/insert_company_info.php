<?php

include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

$company_num = trim($_POST['company_num']);
$company_name = trim($_POST['company_name']);
$com_addr1 = trim($_POST['com_addr1']);
$com_addr2 = trim($_POST['com_addr2']);
$com_email1 = trim($_POST['com_email1']);
$com_email2 = trim($_POST['com_email2']);
$com_tel = trim($_POST["com_tel"]);
$com_regist_num = trim($_POST["com_regist_num"]);
$com_tel_report = trim($_POST['com_tel_report']);
$com_addr=$com_addr1.$com_addr2;
$com_email=$com_email1.$com_email2;


  $sql = "INSERT INTO `com_info` VALUES('$company_num',null,'$company_name','$com_addr','$com_email','$com_tel','$com_regist_num','$com_tel_report');";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }



  mysqli_close($conn);
  echo "<script>location.href='../index.php';</script>";


 ?>
