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





$sql = "update msg_cont SET read = '1' where msg_num = '$msg_num'";
mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Ya! Gaja~</title>
<script type="text/javascript">
function receive_message_close(){
	window.close();
	window.opener.location.reload(true);
}
</script>
</head>
<body>
  <div id="head">
    <h1>Receive msg_cont</h1>
  </div>
  <hr>

<div style="margin: 8px; text-align: left;">
<?=$send_name."님"?>&nbsp<?="( ".$s_id." ) 이 보낸 메세지 "?> <br> <textarea name="message_content" rows="10" cols="57" readonly style="margin-top: 5px;"><?= $msg_cont?></textarea>
</div>
<div style="text-align: right;">
<a href="./message_form.php?s_id=<?= $s_id?>">[답장 보내기]</a>
</div>
<br>
<div style="text-align: center;">
<a href="#" onclick="receive_message_close()">[확인]</a>
<a href="./message_delete.php?msg_num=<?=$msg_num ?>">[삭제]</a>
</div>

</body>
</html>
