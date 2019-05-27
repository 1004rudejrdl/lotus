<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
if (isset($_SESSION['userid'])) {
  $user_id=$_SESSION['userid'];
}else{
  ?>
  <script type="text/javascript">
    alert("로그인 후 이용해 주세요");
    history.go(-1);
  </script>


  <?php
  exit;
}

$prd_num=$_POST['prd_num'];
$session=$_SESSION['userid'];
$flag="true";
$sql7 = "SELECT id from `prd_like` where prd_num = '$prd_num';";
$result7 = mysqli_query($conn, $sql7) or die("실패원인 : " . mysqli_error($conn));
$total7 = mysqli_num_rows($result7);
for ($i=0; $i < $total7; $i++) {
  $row7 = mysqli_fetch_array($result7);
  if ($row7['id']==$session) {
    $flag="false";
    break;
  }
}
$img="heart_good.png";

if ($flag=='true') {
  //삽입
  $sql = "INSERT INTO `prd_like` VALUES('$prd_num','$session');";
  $result7 = mysqli_query($conn, $sql) or die("실패원인 : " . mysqli_error($conn));

}else{
  //삭제
  $img="heart_notgood.png";
  $sql = "DELETE from `prd_like` where id='$session' and prd_num='$prd_num' ";
  $result7 = mysqli_query($conn, $sql) or die("실패원인 : " . mysqli_error($conn));
}
  echo $img;
mysqli_close($conn);





 ?>
