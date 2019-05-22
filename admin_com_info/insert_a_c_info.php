<?php

include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

$com_type = trim($_POST['com_type']);
$com_name = trim($_POST['com_name']);
$com_postcode = trim($_POST['postcode']);
$com_address = trim($_POST['address']);
$com_detailAddress = trim($_POST['detailAddress']);
$com_extraAddress = trim($_POST['extraAddress']);
$com_email1 = trim($_POST['confirmed_email1']);
$com_email2 = trim($_POST['confirmed_email2']);
$com_tel = trim($_POST["com_tel"]);
$com_busi_num = trim($_POST["com_busi_num"]);
$com_regist_num = trim($_POST['com_regist_num']);
$com_email=$com_email1.'@'.$com_email2;


  $sql = "INSERT INTO `com_info` VALUES('$com_type',null,'$com_name','$com_postcode','$com_address','$com_detailAddress','$com_extraAddress','$com_email','$com_tel','$com_busi_num','$com_regist_num');";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }



  mysqli_close($conn);

  echo "<script>location.href='./a_c_info_main.php';</script>";


 ?>
