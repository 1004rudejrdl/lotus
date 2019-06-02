<?php
session_start();
$id = $_SESSION['userid'];
$name = $_SESSION['name'];
$s_id="";
if(!empty($_GET['s_id'])){
  $s_id=$_GET['s_id'];
}
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
    <h1>Message Send</h1>
  </div>
  <hr class="title_hr">
  <form action="./check_receive.php" method="Post">
    <div class="m_f_send">
      <b>보내는 메세지</b>
      <br>
      <textarea name="msg_cont" rows="10"></textarea>
    </div>
    <div class="m_f_receive">
      <input type="text" name="r_id" value="<?=$s_id?>">
      <b>상대방 아이디 :&nbsp;</b>
    </div>
    <br>
    <div class="send_btn">
      <input type="image" src="./img/sendmail.png" name="" value="">
    </div>
  </form>
</body>
</html>
