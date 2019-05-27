<?php

include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

if ((isset($_GET['com_type'])&&!empty($_GET['com_type']))&&
    (isset($_GET['com_num'])&&!empty($_GET['com_num']))&&
    (isset($_GET['shop_num'])&&!empty($_GET['shop_num']))) {
      $com_type=test_input($_GET['com_type']);
      $com_num=test_input($_GET['com_num']);
      $shop_num=test_input($_GET['shop_num']);

      $sql="DELETE FROM `prd_shop` where `com_type` = '$com_type' and `com_num` = '$com_num' and `shop_num` = '$shop_num';";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
}

  mysqli_close($conn);
  echo "<script>location.href='./a_shop_main.php';</script>";

 ?>
