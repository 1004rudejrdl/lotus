<?php
session_start();
$id = $_SESSION['userid'];
$name = $_SESSION['name'];
$m_id="";
if(!empty($_GET['id'])){
  $m_id=$_GET['id'];
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>연愛, 꽃 피우다</title>

</head>
<body>
  <div id="head">
    <h1>Message Send</h1>
  </div>
  <hr>

<form action="./check_receive.php" method="Post">
<div style="margin: 8px; text-align: left;">
<b>보내는 메세지</b> <br> <textarea name="msg_cont" rows="10" cols="57" style="resize:none"></textarea>
</div>
<div style="margin: 5px; text-align: right;">
<b>상대방 아이디</b> : <input type="text" size="12px;" name="r_id" value="<?=$m_id?>">
</div>
<br>


<div style="text-align: center;">
<input type="image" src="./img/sendmail.png" name="" value="">
</div>
</form>

</body>
</html>
