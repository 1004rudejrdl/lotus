<?php
session_start();


if(isset($_GET['mode'])&&$_GET['mode']=="delete"){
  $id=$_GET['id'];
  $sql="DELETE FROM member WHERE `id`=$id";
  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
  $sql="DELETE FROM member_meeting WHERE `id`=$id";
  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
  $sql="DELETE FROM member_like WHERE `id`=$id";
  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

  unset($_SESSION['userid']);

  Header("Location: ../index.php");
}
 ?>
