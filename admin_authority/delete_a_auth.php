<?php

include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

if ((isset($_GET['id'])&&!empty($_GET['id']))) {
      $admin_id=test_input($_GET['id']);

      $sql="DELETE FROM `admin_authority` where `id` = '$admin_id';";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
}

  mysqli_close($conn);
  echo "<script>location.href='./a_auth_main.php';</script>";

 ?>
