<?php


session_start();
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

$id = $_SESSION['userid'];


$sql = "SELECT * from order_list order by `order_num` desc;";
$result = mysqli_query($conn, $sql) or die("실패원인 : " . mysqli_error($conn));
$total = mysqli_num_rows($result);
$regist_day=date("Y-m-d (H:i)");
for ($i=0; $i < $total; $i++) {
  $row=mysqli_fetch_array($result);
  $order_num=$row['order_num'];
  $order_count=$row['order_count'];
  $prd_num=$row['prd_num'];
  if (!empty($_POST["order_num$i"])) {
    $ordernum = $_POST["order_num$i"];
    var_export($ordernum);
    if ($order_num==$ordernum) {
      $sql1="UPDATE `order_list` SET `back_acc` = '1' where order_num='$order_num';";
      $result1 = mysqli_query($conn, $sql1) or die("실패원인 : " . mysqli_error($conn));
      var_export($ordernum);
      $sql="SELECT shop_stock from `prd_shop_detail` where prd_num='$prd_num';";
      $result2 = mysqli_query($conn,$sql)or die("실패원인 : " . mysqli_error($conn));
      $row = mysqli_fetch_array($result2);
      $shop_stock = $row['shop_stock'];

      $sql="UPDATE `prd_shop_detail` SET `shop_stock` = $shop_stock*1+$order_count*1 where prd_num='$prd_num';";
      $result3 = mysqli_query($conn, $sql) or die("실패원인 : " . mysqli_error($conn));
    }
  }

}



  mysqli_close($conn);
  echo "<script>location.href='./a_od_rt_main.php';</script>";


 ?>
