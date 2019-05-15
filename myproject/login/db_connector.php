<?php
$servername="localhost";
$username="root";
$password="123456";
$db_flag="NO";
//DB 아이디,비번
$db_con=mysqli_connect($servername,$username,$password);
if(!$db_con){
  die("DB Connection failed: ".mysqli_connect_error());
}
//db 연결
$sql="show databases";
$result=mysqli_query($sql) or die('DB Error:'.mysqli_error($db_con));
//db에 query문을 db에 입력
while ($row=mysqli_fetch_row($result)) {
  if($row[0] ==='userdb'){
    $dbflag="OK";
    break;
  }
}

if($dbflag==="NO"){
  $sql = "create database userdb";

  if(mysqli_query($conn,$sql)){
    echo "<script>alert('userdb 디비 생성되었습니다.');</script> ";
  }else{
    echo "실패원인".mysqli_error($conn);
  }
}

//2. 데이타 베이스 선택 use kdhong_db
$dbconn = mysqli_select_db($conn,"userdb") or die('Error: '.mysqli_error($conn));


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  //특수문자를 문자처리
  return $data;
}
function alert_back($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  //특수문자를 문자처리
  return $data;
}
 ?>
