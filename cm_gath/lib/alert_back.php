<?php
function alert_back($data) {
  echo "<script>alert('$data');history.go(-1);</script>";
  exit;
}


 ?>
