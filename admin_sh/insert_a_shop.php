<?php

include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

$copied_file_name="";
$com_type = trim($_POST['com_type']);
$com_num_name = trim($_POST['com_num_name']);
$shop_name = trim($_POST['shop_name']);
$shop_list_link = trim($_POST["shop_list_link"]);
$shop_tel = trim($_POST["shop_tel"]);
$shop_postcode = trim($_POST['postcode']);
$shop_address = trim($_POST['address']);
$shop_detailAddress = trim($_POST['detailAddress']);
$shop_extraAddress = trim($_POST['extraAddress']);
$shop_notice = trim($_POST['shop_notice']);

  $com_num_name=explode("/", $com_num_name);
  $com_num=$com_num_name[0];
  $com_name=$com_num_name[1];

  if (!($_FILES['shop_img']['name']=="")) {
    include './lib/file_upload.php';
  }

  $sql = "INSERT INTO `prd_shop` VALUES('$com_type','$com_num',null,'$shop_name','$copied_file_name','$shop_list_link','$shop_tel','$shop_postcode','$shop_address','$shop_detailAddress','$shop_extraAddress','$shop_notice');";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }



  mysqli_close($conn);

  //echo "<script>location.href='./a_shop_main.php';</script>";


 ?>
