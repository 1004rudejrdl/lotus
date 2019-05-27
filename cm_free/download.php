<?php
include $_SERVER['DOCUMENT_ROOT']."/lotus/cm_free/lib/session_call.php";
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
if(isset($_GET["mode"])&&$_GET["mode"]=="download"){
      $num = test_input($_GET["num"]);
      $q_num = mysqli_real_escape_string($conn, $num);

      //삭제할 게시물의 파일명을 가져와서 삭제한다.
      $sql = "SELECT * from `free` where num = '$q_num';";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
          alert_back('1. Error: ' . mysqli_error($conn));
        //die('Error: ' . mysqli_error($conn));
      }
      $row=mysqli_fetch_array($result);
      $file_name_0=$row['file_name_0'];
      $file_copied_0=$row['file_copied_0'];
      $file_type_0=$row['file_type_0'];

      mysqli_close($conn);
      //echo "<script>location.href='./view.php?num=$num&hit=$hit';</script>";
  //end of if rowcount

}
//1테이블에서 파일명이 있는지 점검
if (empty($file_copied_0) || $file_type_0 == 'image') {
  alert_back("데이터 베이스 테이블에 파일이 존재하지 않거나 이미지 파일입니다.");
}
$file_path = "./data/$file_copied_0";

//서버 데이터 영역에 실제 파일이 있는지 점검
if (file_exists($file_path)) {
  $fp = fopen($file_path, 'rb');  //$fp 는 파일 핸들값이다. 이진모드로준다
  //지정된 파일 타입일 경우 모든 브라우저 프로토콜 규약이 되어있음.
  if ($file_type_0) {

    Header('Content-type: application/x-msdownload');
    Header('Content-Length: '.filesize($file_path));
    Header("Content-Disposition: attachment; filename=$file_name_0");
    Header("Content-Transfer-Encoding: binary");
    Header("Content-Discription: File Transfer");
    Header("Expires: 0");
    //지정된 타입이 아닌경우
  }else {
    //타입이 알려지지 않았을 경 익스플러러 프로토콜 통신 방식이다.
    if (eregi("(MSIE 5.0|MSIE 5.1|MSIE 5.5|MSIE 6.0)", $_SERVER['HTTP_USER_AGENT'])) {
      Header('Content-type: application/octet-stream');
      Header('Content-Length: '.filesize($file_path));
      Header("Content-Disposition: attachment; filename=$file_name_0");
      Header("Content-Transfer-Encoding: binary");
      Header("Expires: 0");
    } else {
      Header('Content-type: file/unknown');
      Header('Content-Length: '.filesize($file_path));
      Header("Content-Disposition: attachment; filename=$file_name_0");
      Header("Content-Description: PHP3 Generated Data");
      Header("Expires: 0");
    }

  }
  fpassthru($fp);
  fclose($fp);
}else {
  alert_back("서버에 실제 파일이 존재하지 않습니다.");
}


 ?>
