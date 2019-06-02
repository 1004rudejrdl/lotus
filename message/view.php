<?php
session_start();
$id = $_SESSION['userid'];
$name = $_SESSION['name'];

include_once "../lib/db_connector.php";

$msg_num = $_GET['msg_num'];

$sql = "select * from member_msg where msg_num = '$msg_num'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$s_id=$row["s_id"];
$msg_cont=$row["msg_cont"];
$sql = "select * from member where id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$send_name=$row["name"];

$sql = "update member_msg SET `read` = '1' where `msg_num` = '$msg_num'";
mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="./css/msg_form.css">
</head>
<title>연愛, 꽃 피우다</title>
<body>
  <div class="m_f_title">
    <h1>Received Message</h1>
  </div>
  <hr class="title_hr">
  <form action="./check_receive.php" method="Post">
    <div class="m_f_send">
      <b><span><?=$send_name."님"?></span>&nbsp;<?="( ".$s_id." ) 이 보낸 메세지 "?></b>
      <br>
      <textarea name="msg_cont" rows="10" readonly><?= $msg_cont?></textarea>
    </div>
    <div class="m_f_receive">
      <a href="./message_form.php?s_id=<?= $s_id?>">답장 보내기</a>
    </div>
    <br>
    <div class="che_del_btn">
      <a href="#" onclick="receive_message_close()">확인</a>
      <a href="./message_delete.php?msg_num=<?=$msg_num ?>">삭제</a>
    </div>
  </form>
</body>
</html>
