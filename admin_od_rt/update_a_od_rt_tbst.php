<?php

session_start();
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

$id = $_SESSION['userid'];
$order_num=$_POST["order_num"];

//$sql = "SELECT * from order_list where id = '$id';";
$sql = "SELECT tackback_state,order_num from order_list;";
$result = mysqli_query($conn, $sql) or die("실패원인 : " . mysqli_error($conn));
$total=mysqli_num_rows($result);
// var_dump($total);
  for ($i=0; $i < $total; $i++) {
    $row=mysqli_fetch_array($result);
    $tackback_state=$row['tackback_state'];
    $order_num_db=$row['order_num'];
    if (isset($_POST["order_list_inf$i"])) {
      $order_list_inf=$_POST["order_list_inf$i"];
      if ($order_num==$order_num_db) {
        $sql1="UPDATE `order_list` SET `tackback_state` = '$order_list_inf' where order_num = '$order_num_db';";
        $result1 = mysqli_query($conn, $sql1) or die("실패원인 : " . mysqli_error($conn));
      }
    }
  }

  mysqli_close($conn);
  echo "<script>location.href='./a_od_rt_main.php';</script>";

 ?>
