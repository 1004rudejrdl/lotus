<?php

include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

if ((isset($_GET['id'])&&!empty($_GET['id']))) {
      $admin_id=test_input($_GET['id']);

      $sql="DELETE FROM `member` where `id` = '$id';";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
      $sql="DELETE FROM `member_meeting` where `id` = '$id';";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
      $sql="DELETE FROM `member_like` where `id` = '$id';";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
}

  mysqli_close($conn);
  echo "<script>location.href='./a_mb_mt_main.php';</script>";

 ?>
