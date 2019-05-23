<?php
//ob_start();
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

$q_userid=$q_username=$q_subject=$q_content=$regist_day=$secret=$no_ripple=$upfile_name=$copied_file_name=$type="";
// 회원 민원 게시판
// 회원 민원 게시판
// 회원 민원 게시판
// 회원 민원 게시판
// 회원 민원 게시판
// 회원 민원 게시판
//if(isset($_GET["mode"]) && $_GET["mode"]=="insert_cm_free"){

  // $content=trim($_POST['content']);
  // $subject=trim($_POST['subject']);
  // if(empty($content)||empty($subject)){
  //   alert_back('제목과 내용을 모두 입력하세요');
  // }
  // // $userid=$_SESSION['userid'];
  // $userid="admin"
  // // $q_userid = mysqli_real_escape_string($conn, $userid);
  // // $sql="SELECT * from member where id ='$q_userid'";
  // // $result = mysqli_query($conn,$sql);
  // // if (!$result) {
  // //   die('Error: ' . mysqli_error($conn));
  // // }
  // // $rowcount=mysqli_num_rows($result);
  //
  // if(!$rowcount){
  //   alert_back('해당 아이디가 존재하지 않습니다');
  // }else{
  //
  //     $depth = 0;
  //     $ord = 0;
  //
  //     $subject = test_input($_POST["subject"]);
  //     $content = test_input($_POST["content"]);
  //     $userid = test_input($_SESSION['userid']);
  //     $username = test_input($_SESSION['username']);
  //     htmlspecialchars($subject);
  //     htmlspecialchars($content);
  //     htmlspecialchars($userid);
  //     htmlspecialchars($username);
  //     $q_userid = mysqli_real_escape_string($conn, $userid);
  //     $q_username = mysqli_real_escape_string($conn, $username);
  //     $q_subject = mysqli_real_escape_string($conn, $subject);
  //     $q_content = mysqli_real_escape_string($conn, $content);
  //
  //     $hit = 0;
  //     $secret=(!isset($_POST["secret"]))?('n'):('y');
  //     $no_ripple=(!isset($_POST["no_ripple"]))?('n'):('y');
  //     $regist_day=date("Y-m-d (H:i)");
  //
  //     if (!($_FILES['upfile']['name']=="")) {
  //       include './file_upload.php';
  //       $sql="INSERT INTO `web_page`.`commu` VALUES (null,0, 0, $depth, $ord,'$q_userid','$q_subject', '$q_content','$regist_day',0,'$secret','$no_ripple','$file_name_0','$file_name_1','$file_name_2','$file_copied_0','$file_copied_1','$file_copied_2')";
  //       $result = mysqli_query($conn,$sql);
  //       if (!$result) alert_back('Error: ' . mysqli_error($conn));
  //     }else{
  //       // 컬럼수 = 괄호로 지정해서 넣는 것이 아니라 일괄로 들어가는 경우 들어가는 필드갯수 모두 맞춰서 써주어야 함
  //       // (X)(X)(X)$sql="INSERT INTO `web_page`.`cus_complain` VALUES (null,'$q_writer','$q_subject', '$q_content','$regist_day',0,'$no_ripple');";(X)(X)(X)
  //       $sql="INSERT INTO `web_page`.`cus_complain` VALUES (null,0, 0, $depth, $ord,'$q_userid','$q_subject', '$q_content','$regist_day',0,'$secret','$no_ripple','','','','','','')";
  //       $result = mysqli_query($conn,$sql);
  //       if (!$result){ alert_back('Error: ' . mysqli_error($conn));}
  //     }
  //
  //     $sql="SELECT max(num) from `web_page`.`commu`;";
  //     $result = mysqli_query($conn,$sql);
  //     if (!$result) {
  //       die('Error: ' . mysqli_error($conn));
  //     }
  //     $row=mysqli_fetch_array($result);
  //     $max_num = $row['max(num)'];
  //
  //     $sql = "UPDATE `web_page`.`commu` SET `group_num`='$max_num' WHERE num='$max_num';";
  //     $result = mysqli_query($conn,$sql);
  //     if (!$result) {
  //       die('Error: ' . mysqli_error($conn));
  //     }
  //
  //     mysqli_close($conn);
       echo "<script>location.href='./cm_free_view.php';</script>";
  //     }//end of if rowcount

//}
//else
if(isset($_GET["mode"])&&$_GET["mode"]=="update_cm_free"){

  $page=$_POST['page'];
  $content=trim($_POST['content']);
  $subject=trim($_POST['subject']);
    if(empty($content)||empty($subject)){
      alert_back('제목과 내용을 모두 입력하세요');
    }
  $userid=$_SESSION['userid'];
  $q_userid = mysqli_real_escape_string($conn, $userid);
  $sql="SELECT * from member where id ='$q_userid'";
  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }
  $rowcount=mysqli_num_rows($result);

  if(!$rowcount){
    alert_back('해당 아이디가 존재하지 않습니다');
  }else{
      $num = test_input($_POST['num']);
      $subject = test_input($_POST["subject"]);
      $content = test_input($_POST["content"]);
      $userid = test_input($_SESSION['userid']);
      $username = test_input($_SESSION['username']);
      htmlspecialchars($subject);
      htmlspecialchars($content);
      htmlspecialchars($userid);
      htmlspecialchars($username);
      $q_num = mysqli_real_escape_string($conn, $num);
      $q_userid = mysqli_real_escape_string($conn, $userid);
      $q_username = mysqli_real_escape_string($conn, $username);
      $q_subject = mysqli_real_escape_string($conn, $subject);
      $q_content = mysqli_real_escape_string($conn, $content);

      $hit=$_POST['hit'];
      $secret=(!isset($_POST["secret"]))?('n'):('y');
      $no_ripple=(!isset($_POST["no_ripple"]))?('n'):('y');
      $regist_day=date("Y-m-d (H:i)");

      if(isset($_POST['del_file']) && $_POST['del_file'] =='1'){
      $sql="SELECT `file_copied_0` from `commu` where num = '$q_num';";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        alert_back('Error: ' . mysqli_error($conn));
        // die('Error: ' . mysqli_error($conn));
      }
      $row = mysqli_fetch_array($result);
      $file_copied_0 = $row['file_copied_0'];

      if (!empty($file_copied_0)) {
        unlink("./data/".$file_copied_0);
      }
      $sql="UPDATE `commu` SET `file_name_0`='', `file_copied_0` ='',`file_type_0`='' WHERE `num`=$q_num;";
      $result = mysqli_query($conn,$sql);
      if (!$result) die('Error: ' . mysqli_error($conn));

    }

    if (!empty($_FILES['upfile']['name'])) {

    include './cm_free_file_upload.php';

    $sql = "UPDATE `commu` SET `subject`='$q_subject',`content`='$q_content',`regist_day`='$regist_day',`hit`='$hit',`secret`='$secret',`no_ripple`='$no_ripple',`file_name_0`='$upfile_name',`file_copied_0`='$copied_file_name', `file_type_0`='$type[1]' WHERE `num`=$q_num";
    $result = mysqli_query($conn,$sql);
    if (!$result) die('Error: ' . mysqli_error($conn));

  }else {
    $sql = "UPDATE `commu` SET `subject`='$q_subject',`content`='$q_content',`regist_day`='$regist_day',`hit`='$hit',`secret`='$secret',`no_ripple`='$no_ripple' WHERE `num`=$q_num";
    $result = mysqli_query($conn,$sql);
    if (!$result) die('Error: ' . mysqli_error($conn));
  }
  mysqli_close($conn);
    // echo '<script>location.href="./list.php?page='.$page.'>"</script>';
    echo "<script>location.href='./cm_free_view.php?num=$num&hit=$hit';</script>";
}
}else if(isset($_GET["mode"])&&$_GET["mode"]=="delete_cm_free"){
    $num = test_input($_GET["num"]);
    $q_num = mysqli_real_escape_string($conn, $num);

    $sql="SELECT `file_copied_0` from `commu` where `num` = '$q_num'";
    $result = mysqli_query($conn,$sql);
    if (!$result) die('Error: ' . mysqli_error($conn));
    $row=mysqli_fetch_array($result);
    $file_copied_0 = $row['file_copied_0'];

    if (!empty($file_copied_0)) {
      unlink("./data/".$file_copied_0);
    }

    $sql ="DELETE FROM `web_page`.`commu` WHERE num=$q_num";
    $result = mysqli_query($conn,$sql);
    if (!$result) die('Error: ' . mysqli_error($conn));

    $sql="DELETE FROM `web_page`.`cm_free_ripple` WHERE parent=$q_num";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }
    mysqli_close($conn);
    echo "<script>location.href='./cm_free_exhibit.php?page=1';</script>";
// Header("Location:./memo_main.php?page=$page");

}else if(isset($_GET["mode"])&&$_GET["mode"]=="download_cm_free"){
  ob_end_clean();
  $num = test_input($_GET["num"]);
  $q_num = mysqli_real_escape_string($conn, $num);

//9. 사용자가 입력한 최근 게시물 보기. num을 찾아서 view에 전달하기 위함
  $sql="SELECT * from `commu` where num ='$q_num';";
  $result = mysqli_query($conn,$sql);
  if (!$result) {
    alert_back('cm_free query Error: ' . mysqli_error($conn));
    // die('Error: ' . mysqli_error($conn));
  }
  $row = mysqli_fetch_array($result);
  $file_name_0 = $row['file_name_0'];
  $file_copied_0 = $row['file_copied_0'];
  $file_type_0 = $row['file_type_0'];

  mysqli_close($conn);

  //1. 테이블에 파일명이 있는지 점검
  if (empty($file_copied_0)) {
    alert_back('다운로드 할 파일이 없습니다');
  }
  $file_path="./data/$file_copied_0";

  //2. 서버의 data영역에 실제 파일이 있는지 점검
  if (file_exists($file_path)) {
    $fp=fopen($file_path, 'rb'); //$파일 디스크립터 파일 핸들. 레코드셋과 같음
    // 지정되 파일타입일 경우
    if ($file_type_0) {
      Header('Content-type: application/x-msdownload');
      Header('Content-Length: '.filesize($file_path));
      Header("Content-Disposition: attachment; filename=$file_name_0");
      Header("Content-Transfer-Encoding: binary");
      Header("Content-Discription: File Transfer");
      Header("Expires: 0");
      //지정된 타입이 아닌경우
    }else {
      // 타입이 지정되지 않았을 때 익스플로러의 프로토콜 통신방식
      // if (eregi("(MSIE 5.0|MSIE 5.1|MSIE 5.5|MSIE 6.0)", $_SERVER['HTTP_USER_AGENT'])) { php 7 이전
      if (freg_match("(MSIE 5.0|MSIE 5.1|MSIE 5.5|MSIE 6.0)", $_SERVER['HTTP_USER_AGENT'])) {
        Header('Content-type: application/octet-stream');
        Header('Content-Length: '.filesize($file_path));
        Header("Content-Disposition: attachment; filename=$file_name_0");
        Header("Content-Transfer-Encoding: binary");
        Header("Expires: 0");
      }else {
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
}else if(isset($_GET["mode"])&&$_GET["mode"]=="insert_cm_free_rip"){
  if(empty($_POST["ripple_content"])){
    echo "<script>alert('내용입력요망!');history.go(-1);</script>";
    exit;
  }

    $parent = test_input($_POST["parent"]);
    $hit = test_input($_POST["hit"]);
    $q_parent = mysqli_real_escape_string($conn, $parent);
    $q_ripple_writer = $_POST["ripple_writer"];
    $content = test_input($_POST["ripple_content"]);
    $q_content = mysqli_real_escape_string($conn, $content);
    $regist_day=date("Y-m-d (H:i)");
    $page = test_input($_POST["page"]);

    $sql="INSERT INTO `commu_ripple` VALUES (null,'$q_parent','$q_ripple_writer', '$q_content','$regist_day')";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }
    mysqli_close($conn);
    echo "<script>location.href='./cm_free_view.php?hit=$hit&num=$q_parent';</script>";

}else if(isset($_GET["mode"])&&$_GET["mode"]=="delete_cm_free_rip"){
//삭제한 페이지로 이동하기 위해서 페이지를 받아온다
  $page= test_input($_GET["page"]);
  $hit= test_input($_GET["hit"]);
  $num = test_input($_POST["num"]);
  $parent = test_input($_POST["parent"]);
  $q_num = mysqli_real_escape_string($conn, $num);

  $sql ="DELETE FROM `commu_ripple` WHERE num=$q_num";
  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }
  mysqli_close($conn);
  echo "<script>location.href='./cm_free_view.php?page=$page&num=$parent&hit=$hit';</script>";

}else if(isset($_GET["mode"])&&$_GET["mode"]=="response_cm_free"){

  $page=$_POST['page'];
  $content=trim($_POST['content']);
  $subject=trim($_POST['subject']);
  if(empty($content)||empty($subject)){
    alert_back('제목과 내용을 모두 입력하세요');
  }
  $userid=$_SESSION['userid'];
  $q_userid = mysqli_real_escape_string($conn, $userid);
  $sql="SELECT * from member where id ='$q_userid'";
  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }
  $rowcount=mysqli_num_rows($result);

  if(!$rowcount){
      alert_back('해당 아이디가 존재하지 않습니다');
  }else{
    $num = test_input($_POST['num']);
    $subject = test_input($_POST["subject"]);
    $content = test_input($_POST["content"]);
    $userid = test_input($_SESSION['userid']);
    $username = test_input($_SESSION['username']);
    htmlspecialchars($subject);
    htmlspecialchars($content);
    htmlspecialchars($userid);
    htmlspecialchars($username);
    $q_num = mysqli_real_escape_string($conn, $num);
    $q_userid = mysqli_real_escape_string($conn, $userid);
    $q_username = mysqli_real_escape_string($conn, $username);
    $q_subject = mysqli_real_escape_string($conn, $subject);
    $q_content = mysqli_real_escape_string($conn, $content);

    $hit = 0;
    $secret=(!isset($_POST["secret"]))?('n'):('y');
    $no_ripple=(!isset($_POST["no_ripple"]))?('n'):('y');
    $regist_day=date("Y-m-d (H:i)");


    $sql="SELECT * from `web_page`.`commu` where num = '$q_num';";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);
    $group_num = (int)$row['group_num'];
    $depth = (int)$row['depth']+1;
    $ord = (int)$row['ord']+1;

    $sql = "UPDATE `web_page`.`commu` SET `ord`=`ord`+1 WHERE `group_num`='$group_num' and `ord`>= $ord";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }

    if (!($_FILES['upfile']['name']=="")) {
      include './cm_free_file_upload.php';
      // 8. 파일의 실제이름과 경로명을 저장한다.
      $sql="INSERT INTO `web_page`.`commu` VALUES (null,$num, $group_num, $depth, $ord,'$q_userid','$q_subject', '$q_content','$regist_day',0,'$secret','$no_ripple','$file_name0','$file_name1','$file_name2','$file_copied_0','$file_copied_1','$file_copied_2')";
      $result = mysqli_query($conn,$sql);
      if (!$result) alert_back('Error: ' . mysqli_error($conn));
    }else{
      $sql="INSERT INTO `web_page`.`commu` VALUES (null,$num, $group_num, $depth, $ord,'$q_userid','$q_subject', '$q_content','$regist_day',0,'$secret','$no_ripple','','','','','','')";
      $result = mysqli_query($conn,$sql);
      if (!$result){ alert_back('Error: ' . mysqli_error($conn));}
    }

    $sql="SELECT max(num) from `web_page`.`commu`;";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);
    $max_num = $row['max(num)'];

    mysqli_close($conn);
    // echo '<script>location.href="./list.php?page='.$page.'>"</script>';
    echo "<script>location.href='./cm_free_view.php?num=$max_num&hit=$hit';</script>";

}


}//end of if insert

//mysqli_close($conn);
// Header("Location: p260_score_list.php");
?>
