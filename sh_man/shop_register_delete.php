<?php
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";


function alert_back($data) {
  echo "<script>alert('$data');history.go(-1);</script>";
  exit;
}

$prd_num=$_POST['prd_num'];
$list_name=$_POST['list_name'];

$sql = "SELECT * from prd_shop_detail where prd_num = '$prd_num'";
$result = mysqli_query($conn,$sql);
if (!$result) {
  die('Error: ' . mysqli_error($conn));
}
$row = mysqli_fetch_array($result);

for($i=0;$i<10;$i++){
    $copied_name[$i] = $row["file_copied_$i"];
    if ($copied_name[$i]){
        $image_name = "./img/".$copied_name[$i];
        unlink($image_name);
    }

}

$sql = "DELETE from prd_review where order_type like 's_$prd_num' ";
$result = mysqli_query($conn,$sql);
if (!$result) {
  die('Error: ' . mysqli_error($conn));
}
$sql = "SELECT que_num from prd_q where prd_num = '$prd_num'";
$result = mysqli_query($conn,$sql);
if (!$result) {
  die('Error: ' . mysqli_error($conn));
}
$total = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
for ($i=0; $i < $total; $i++) {
  $sql = "DELETE from prd_a where parent = '$row[$i]' ";
  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }
}


$sql = "DELETE from prd_q where prd_num = '$prd_num' ";
$result=mysqli_query($conn, $sql);
if (!$result) {
  die('Error: ' . mysqli_error($conn));
}
$sql = "DELETE from wish_list where prd_num like '_$prd_num' ";
$result=mysqli_query($conn, $sql);
if (!$result) {
  die('Error: ' . mysqli_error($conn));
}

$sql = "DELETE from prd_shop_detail where prd_num = '$prd_num' ";

$result=mysqli_query($conn, $sql);
if (!$result) {
  die('Error: ' . mysqli_error($conn));
}
mysqli_close($conn);

echo "<script>location.href='./sh_man_list.php?mode=$list_name';</script>";

 ?>