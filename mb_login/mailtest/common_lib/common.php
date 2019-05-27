<?php
//@extract 함수의 역할은 배열속의 키값들을 변수화 시키는 것이다.
  @extract ($_POST);
  @extract ($_GET);
  @extract ($_SESSION);
  @extract ($_COOKIE);
  @extract ($_FILES);
  @extract ($_SERVER);
  @extract ($_ENV);

  date_default_timezone_set("Asia/Seoul");
  $DBflag = "NO";
  $con =mysqli_connect("localhost","root","123456","") or die("MySQL 접속실패!");
  $sql = "show databases";
  $result = mysqli_query($con, $sql) or die("실패원인: 1".mysqli_error($con));

  while($row=mysqli_fetch_row($result)){
    if($row[0] == "ticketDreamDB"){
      $DBflag = "OK";
      break;
    }
  }
  if($DBflag !== "OK"){
    $sql = "create database ticketDreamDB";
    if(mysqli_query($con,$sql)){
      echo "<script>alert('ticketDreamDB 생성완료!')</script>";
    }
  }
  $con = mysqli_connect("localhost","root","123456","ticketDreamDB") or die("ticketDreamDB 접속실패!");
?>
