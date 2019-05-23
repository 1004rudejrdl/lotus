<?php
include_once '../lib/db_connector.php';

$msg_cnum = $_GET['msg_num'];

$sql = "delete from member_msg where msg_cnum = '$msg_cnum'";
mysqli_query($con, $sql);

mysqli_close($con);

echo "<script> alert('삭제 되었습니다.'); window.close();
       window.opener.location.reload(true);
      </script>";

?>
