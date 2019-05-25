<?php

include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";


function alert_back($data) {
  echo "<script>alert('$data');history.go(-1);</script>";
  exit;
}

$list_name = $_GET['mode'];

$company_name = trim($_POST['company_name']);
$shop_name = trim($_POST['shop_name']);

$shop_link = trim($_POST["shop_link"]);
$shop_tel = trim($_POST["shop_tel"]);
$shop_addr1 = trim($_POST['shop_addr1']);
$shop_addr2 = trim($_POST['shop_addr2']);
$shop_note = trim($_POST['shop_note']);

$shop_addr = $shop_addr1.$shop_addr2;
$sql="SELECT com_type,com_num from `com_info` where com_name='$company_name'";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }
$row = mysqli_fetch_array($result);
$company_type = $row[0];
$company_num = $row[1];

include $_SERVER['DOCUMENT_ROOT']."/lotus/sh_man/shop_register_img.php";

  $sql = "INSERT INTO `prd_shop` VALUES('$company_type','$company_num',null,'$shop_name','$copied_file_name','$shop_link','$shop_tel','$shop_addr','$shop_note');";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }



  mysqli_close($conn);
  echo "<script>location.href='./sh_man_list.php?mode=$list_name';</script>";

 ?>
