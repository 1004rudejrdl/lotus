<?php

include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

$mb_num = trim($_POST['mb_num']);
$mb_id = trim($_POST['id']);
$naver = trim($_POST["naver"]);
$kakao = trim($_POST["kakao"]);
$facebook = trim($_POST["facebook"]);
$google = trim($_POST["google"]);
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$tel = trim($_POST["tel"]);
$birth = trim($_POST["birth"]);
$gender = trim($_POST["gender"]);
$black_list = trim($_POST["black_list"]);
$matching_day = trim($_POST["matching_day"]);
$matching = trim($_POST["matching"]);

  $sql = "UPDATE `member` SET
  `name`='$name',
  `email`='$email',
  `tel`='$tel',
  `birth`='$birth',
  `gender`='$gender',
  `black_list`='$black_list',
  `naver`='$naver',
  `kakao`='$kakao',
  `facebook`='$facebook',
  `google`='$google'
  where `mb_num` = '$mb_num';";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }

  $sql = "UPDATE `member_meeting` SET
  `matching_day`='$matching_day',
  `matching`='$matching'
  where `id` = '$mb_id';";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }

  mysqli_close($conn);

  echo "<script>location.href='./a_mb_mt_v.php?id=$mb_id';</script>";

 ?>
