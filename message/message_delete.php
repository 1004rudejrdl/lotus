<?php
include_once '../lib/db_connector.php';

$msg_num = $_GET['msg_num'];

$sql = "DELETE from member_msg where `msg_num` = '$msg_num'";
mysqli_query($conn, $sql);

mysqli_close($conn);

echo "<script> alert('삭제 되었습니다.'); window.close();
       window.opener.location.reload(true);
      </script>";

?>
