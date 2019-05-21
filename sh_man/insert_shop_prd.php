<?php

include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";


function alert_back($data) {
  echo "<script>alert('$data');history.go(-1);</script>";
  exit;
}


$shop_name = trim($_POST['shop_name']);
$prd_name = trim($_POST['prd_name']);

$type_m_w_s = trim($_POST["type_m_w_s"]);
$prd_price = trim($_POST["prd_price"]);
$prd_color = trim($_POST['prd_color']);
$prd_size = trim($_POST['prd_size']);
$prd_best = trim($_POST['prd_best']);
$prd_stock = trim($_POST['prd_stock']);

$regist_day=date("Y-m-d (H:i)");
$sql="SELECT shop_num from `prd_shop` where shop_name='$shop_name'";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }
$row = mysqli_fetch_array($result);
$shop_num = $row[0];


include $_SERVER['DOCUMENT_ROOT']."/lotus/sh_man/shop_register_img.php";

  $sql = "INSERT INTO `prd_shop_detail` VALUES('$shop_num',null,'$regist_day','$prd_name','$type_m_w_s','$prd_price','$prd_color',
    '$prd_size','$prd_best','$prd_stock'
  ,'{$upfile_name[0]}','$copied_file_name[0]'
,'{$upfile_name[1]}','$copied_file_name[1]'
,'{$upfile_name[2]}','$copied_file_name[2]'
,'{$upfile_name[3]}','$copied_file_name[3]'
,'{$upfile_name[4]}','$copied_file_name[4]'
,'{$upfile_name[5]}','$copied_file_name[5]'
,'{$upfile_name[6]}','$copied_file_name[6]'
,'{$upfile_name[7]}','$copied_file_name[7]'
,'{$upfile_name[8]}','$copied_file_name[8]'
,'{$upfile_name[9]}','$copied_file_name[9]');";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }


if ($type_m_w_s=="m") {
  $list_name = "man";
}else if($type_m_w_s=="w"){
  $list_name = "woman";
}else{
  $list_name = "shose";
}
  mysqli_close($conn);
  echo "<script>location.href='./sh_man_list.php?mode=$list_name';</script>";

 ?>
