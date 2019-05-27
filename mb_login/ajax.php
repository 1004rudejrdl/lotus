<?php

include '../lib/db_connector.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if($_GET['mode']=="id"){
    $id=$_POST['id'];
    if (!preg_match("/^([a-zA-Z0-9_]){8,20}$/",$id)) {
      echo "아이디 형식이 맞지 않습니다";
      return;
    }
    $sql="SELECT*FROM member WHERE `id`='$id'";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $rowcount=mysqli_num_rows($result);
    if(!$rowcount){
      echo "사용가능한 아이디입니다.";
    }else{
      echo "사용불가능한 아이디입니다.";
    }
  }else if($_GET['mode']=="pw"){
    $pw=$_POST['pw'];
    if(!preg_match("/(?=.*\d{1,20})(?=.*[~`!@#$%\^&*()-+=]{1,20})(?=.*[a-zA-Z]{1,20}).{4,20}$/", $pw)){
      echo "비밀번호 양식이 맞지않습니다.";
    }else{
      echo "사용 가능한 비밀번호 ";
    }
  }else if($_GET['mode']=="phone"){
    $num=$_POST['num'];
    if (!(preg_match("/^(\d{11})$/",$num))) {
      echo "전화번호 형식이 맞지 않습니다";
      return;
    }
    $sql="SELECT*FROM member WHERE `tel`='$num'";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $rowcount=mysqli_num_rows($result);
    if(!$rowcount){
      echo "사용가능한 전화번호입니다.";
    }else{
      echo "사용불가능한 전화번호입니다.";
    }
  }
}
 ?>
