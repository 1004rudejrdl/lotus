<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

$id = $_SESSION['userid'];


$sql = "SELECT * from order_list;";
$result = mysqli_query($conn, $sql) or die("실패원인 : " . mysqli_error($conn));
$total = mysqli_num_rows($result);
$regist_day=date("Y-m-d (H:i)");
for ($i=0; $i < $total; $i++) {
  $row=mysqli_fetch_array($result);
  $order_num=$row['order_num'];
  if (!empty($_POST["order_num$i"])) {
    $ordernum = $_POST["order_num$i"];
    if ($order_num==$ordernum) {
      $sql1="UPDATE `order_list` SET `tackback_day` = '$regist_day' where order_num='$order_num';";
      $result1 = mysqli_query($conn, $sql1) or die("실패원인 : " . mysqli_error($conn));
    }
  }

}



  mysqli_close($conn);
  echo "<script>location.href='./test_orderlist_return.php';</script>";

 ?>
