<?php


session_start();
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
$session=$_SESSION['userid'];

$sql="SELECT prd_num,count from `wish_list` where id='$session'";

$result = mysqli_query($conn,$sql);
if (!$result) {
  die('Error: ' . mysqli_error($conn));
}

$total = mysqli_num_rows($result);

$ord_time=date("Y-m-d H:i:s");

for ($i=0; $i < $total; $i++) {
  $row1 = mysqli_fetch_array($result);
  $prd_type_num1=$row1['prd_num'];
  $count=$row1['count'];
  $prd_type[$i]=substr($prd_type_num1, 0,1);
  $prd_num[$i]=substr($prd_type_num1, 1);
  $sql = "INSERT INTO `order_list`
  VALUES('s$prd_type_num1',null,'$session','$prd_num[$i]','$count','$ord_time','0',null,null,'n');";
  $result1 = mysqli_query($conn,$sql);
  if (!$result1) {
    die('Error: ' . mysqli_error($conn));
  }

  $sql="SELECT shop_stock from `prd_shop_detail` where prd_num='$prd_num[$i]';";
  $result2 = mysqli_query($conn,$sql)or die("실패원인 : " . mysqli_error($conn));
  $row = mysqli_fetch_array($result2);
  $shop_stock = $row['shop_stock'];

  $sql="UPDATE `prd_shop_detail` SET `shop_stock` = $shop_stock*1-$count*1 where prd_num='$prd_num[$i]';";
  $result3 = mysqli_query($conn, $sql) or die("실패원인 : " . mysqli_error($conn));


}
$sql = "DELETE from wish_list where id = '$session'";
$result=mysqli_query($conn, $sql);
if (!$result) {
  die('Error: ' . mysqli_error($conn));
}




mysqli_close($conn);
echo "<script>location.href='./sh_man_list.php?mode=man';</script>";



 ?>
