<?php

include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

$com_type = trim($_POST['com_type']);
$com_num = trim($_POST['com_num']);
$shop_num = trim($_POST['shop_num']);
$shop_name = trim($_POST['shop_name']);
$shop_list_link = trim($_POST['shop_list_link']);
$shop_tel = trim($_POST["shop_tel"]);
$shop_postcode = trim($_POST['postcode']);
$shop_address = trim($_POST['address']);
$shop_detailAddress = trim($_POST['detailAddress']);
$shop_extraAddress = trim($_POST['extraAddress']);
$shop_notice = trim($_POST['shop_notice']);

if(isset($_POST['del_file']) && $_POST['del_file'] =='1'){
// 삭제 할 게시물의 이미지 파일경로를 가져와서 삭제한다.
$sql="SELECT `shop_img` from `prd_shop` where `com_type` = '$com_type' and `com_num` = '$com_num' and `shop_num`='$shop_num';";
$result = mysqli_query($conn,$sql);
if (!$result) die('Error: ' . mysqli_error($conn));
  $row = mysqli_fetch_array($result);
  $shop_img = $row['shop_img'];

  if (!empty($shop_img)) {
    unlink("./img/".$shop_img);
  }
  //삭제된 파일정보를 cus_complain 테이블에서 해당되는 필드에 수정해야한다.
  $sql="UPDATE `prd_shop` SET `shop_img`='' where `com_type` = '$com_type' and `com_num` = '$com_num' and `shop_num`='$shop_num';";
  $result = mysqli_query($conn,$sql);
  if (!$result) die('Error: ' . mysqli_error($conn));
}
if (!empty($_FILES['shop_img']['name'])) {

include './lib/file_upload.php';

$sql = "UPDATE `prd_shop` SET
`shop_name`='$shop_name',
`shop_img`='$copied_file_name',
`shop_list_link`='$shop_list_link',
`shop_tel`='$shop_tel',
`shop_postcode`='$shop_postcode',
`shop_address`='$shop_address',
`shop_detailAddress`='$shop_detailAddress',
`shop_extraAddress`='$shop_extraAddress',
`shop_notice`='$shop_notice'
where `com_type` = '$com_type' and `com_num` = '$com_num' and `shop_num`='$shop_num';";
$result = mysqli_query($conn,$sql);
if (!$result) die('Error: ' . mysqli_error($conn));

}else {
  $sql = "UPDATE `prd_shop` SET
  `shop_name`='$shop_name',
  `shop_img`='$shop_img',
  `shop_list_link`='$shop_list_link',
  `shop_tel`='$shop_tel',
  `shop_postcode`='$shop_postcode',
  `shop_address`='$shop_address',
  `shop_detailAddress`='$shop_detailAddress',
  `shop_extraAddress`='$shop_extraAddress',
  `shop_notice`='$shop_notice'
  where `com_type` = '$com_type' and `com_num` = '$com_num' and `shop_num`='$shop_num';";
$result = mysqli_query($conn,$sql);
if (!$result) die('Error: ' . mysqli_error($conn));
}

  mysqli_close($conn);

  echo "<script>location.href='./a_shop_v_d.php?com_type=$com_type&com_num=$com_num&shop_num=$shop_num';</script>";


 ?>
