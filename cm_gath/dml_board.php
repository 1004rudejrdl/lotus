<?php
include $_SERVER['DOCUMENT_ROOT']."/lotus/cm_gath/lib/session_call.php";
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
include $_SERVER['DOCUMENT_ROOT']."/lotus/cm_gath/lib/alert_back.php";

?>
<meta charset="utf-8">

<?php


$content= $q_content = $sql= $result = $userid= $group_num = $depth="";
$userid = $_SESSION['userid'];
$board_type = "m";


if(isset($_GET["mode"])&&$_GET["mode"]=="insert"){
    $content = trim($_POST["content"]);
    $subject = trim($_POST['subject']);
    $board_type = trim($_POST["board_type"]);
    if(empty($content) || empty($subject)){
      echo "<script>alert('내용입력요망!');history.go(-1);</script>";
      exit;
    }



    $subject = test_input($_POST["subject"]);
    $content = test_input($_POST["content"]);
    $userid = test_input($userid);
    $hit =0;
    // $is_html = test_input($_POST['is_html']);
    // $is_html = (!isset($_POST['is_html']))?('n'):("y");



    $q_subject = mysqli_real_escape_string($conn, $subject);
    $q_content = mysqli_real_escape_string($conn, $content);
    $q_userid = mysqli_real_escape_string($conn, $userid);
    $regist_day=date("Y-m-d (H:i)");

    $detph=0;
    $ord=0;

      include $_SERVER['DOCUMENT_ROOT']."/lotus/cm_gath/lib/file_upload.php";

      //파일의 실제명과 저장되는 명을 삽입한다.
      //등록된 사용자가 최근 입력한 이미지 게시판을 보여주기 ㅟ하여 num찾아서 전달하기 위한것
      $sql = "INSERT INTO `commu` VALUES('$board_type',null,0,'$detph','$ord','$q_userid','$q_subject','$q_content','$regist_day','$hit',null,null,'$type[0]','$upfile_name',null,null,'$copied_file_name',null,null);";

      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }

      $sql = "SELECT max(num) from commu;";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
      $row=mysqli_fetch_array($result);
      $max_num=$row['max(num)'];

      $sql = "UPDATE `commu` SET `group_num` = $max_num WHERE `num` = $max_num;";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }


      mysqli_close($conn);
      echo "<script> location.href='./cm_gath_view.php?num=$max_num&hit=$hit';</script>";
  //end of if rowcount

}else if(isset($_GET["mode"])&&$_GET["mode"]=="delete"){

    $num = test_input($_GET["num"]);
    $q_num = mysqli_real_escape_string($conn, $num);

    //삭제할 게시물의 이미지 파일 명을 가져와서 삭제한다.
    $sql = "SELECT `file_copied_0` from `commu` where num = '$q_num';";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
        alert_back('6. Error: ' . mysqli_error($conn));
      //die('Error: ' . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);
    $file_copied_0=$row['file_copied_0'];

    if (!empty($file_copied_0)) {
      //이미지 정보를 가져오게 하는 방법이다  width height type
      unlink("./data/".$file_copied_0);
    }


    $sql ="DELETE FROM `commu` WHERE num=$q_num";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }
    $sql ="DELETE FROM `commu_ripple` WHERE parent=$q_num";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }



    mysqli_close($conn);
    echo "<script>location.href='./cm_gath_list.php?page=1';</script>";


}
else if(isset($_GET["mode"])&&$_GET["mode"]=="update"){
  $num = $_POST["num"];
  $hit = $_POST["hit"];
  $content = trim($_POST["content"]);
  $subject = trim($_POST['subject']);
  if(empty($content) || empty($subject)){
    echo "<script>alert('내용입력요망!');history.go(-1);</script>";
    exit;
  }
    $subject = test_input($_POST["subject"]);
    $content = test_input($_POST["content"]);
    $userid = test_input($userid);
    // $is_html = test_input($_POST['is_html']);
    // $is_html = (!isset($_POST['is_html']))?('n'):("y");
    $num = test_input($num);
    $hit = test_input($hit);
    // $is_html = (isset($_POST['is_html']))?('y'):("n");
    $q_subject = mysqli_real_escape_string($conn, $subject);
    $q_content = mysqli_real_escape_string($conn, $content);
    $q_userid = mysqli_real_escape_string($conn, $userid);
    $q_num = mysqli_real_escape_string($conn, $num);
    $regist_day=date("Y-m-d (H:i)");
    //$del_file = $_POST['del_file'];
    //내용을 수정하던 하지않던 삭제할 파일이 있으면
    //기존 파일이 삭제 되었느냐
    if (isset($_POST['del_file'])  &&  $_POST['del_file']=='1') {
      $sql = "SELECT `file_copied_0` from `commu` where num = '$q_num';";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
          alert_back('6. Error: ' . mysqli_error($conn));
        //die('Error: ' . mysqli_error($conn));
      }
      $row=mysqli_fetch_array($result);
      $file_copied_0=$row['file_copied_0'];

      if (!empty($file_copied_0)) {
        //이미지 정보를 가져오게 하는 방법이다  width height type
        unlink("./data/".$file_copied_0);
      }

      $sql = "UPDATE `commu` SET `file_name_0` = '', `file_copied_0` = '', `file_type_0` = ''  WHERE `num` = '$q_num';";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
    }

    //파일첨부
    //파일삭제 신경쓰지않고 업로드가됐느냐안됐느냐

    if (!empty($_FILES['upfile']['name'])) {
      include "./lib/file_upload.php";
      $sql = "UPDATE `commu` SET `file_name_0` = '$upfile_name', `file_copied_0` = '$copied_file_name', `file_type_0` = '$type[0]'  WHERE `num` = '$q_num';";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
    }
    //파일과 상관없이 무조건 내용 중심으로
    //주제와 내용만 신경쓰는것
    $sql = "UPDATE `commu` SET `subject` = '$q_subject', `content` = '$content', `regist_day` = '$regist_day' WHERE `num` = '$q_num';";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }



    echo "<script>location.href='./cm_gath_view.php?num=$num&page=1&hit=$hit';</script>";

}else if(isset($_GET["mode"])&&$_GET["mode"]=="insert_ripple") {
  if(empty($_POST["ripple_content"])){
    echo "<script>alert('내용입력요망!');history.go(-1);</script>";
    exit;
  }
  //댓글을 다는 사람은 로그인을 해야한다는 것을 말한것 이다.
  $userid=$_SESSION['userid'];
  $q_userid = mysqli_real_escape_string($conn, $userid);
  $sql="SELECT * from `lotus_db` where id = '$q_userid'";
  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }
  $rowcount=mysqli_num_rows($result);

  if(!$rowcount){
    echo "<script>alert('없는 아이디!!');history.go(-1);</script>";
    exit;
  }else{
    $content = test_input($_POST["ripple_content"]);
    $page = test_input($_POST["page"]);
    $parent = test_input($_POST["parent"]);
    $hit = test_input($_POST["hit"]);

    $q_usernick = mysqli_real_escape_string($conn, $_SESSION['usernick']);
    $q_username = mysqli_real_escape_string($conn, $_SESSION['username']);
    $q_content = mysqli_real_escape_string($conn, $content);
    $q_parent = mysqli_real_escape_string($conn, $parent);
    $regist_day=date("Y-m-d (H:i)");

    $sql="INSERT INTO `commu_ripple` VALUES (null,'$q_parent','$q_userid','$q_username', '$q_usernick','$q_content','$regist_day')";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }
    mysqli_close($conn);
    echo "<script>location.href='./cm_gath_view.php?num=$q_parent&page=$page&hit=$hit';</script>";
}//end of if rowcount

}//end of if insert
else if(isset($_GET["mode"])&&$_GET["mode"]=="delete_ripple"){
  $page= test_input($_GET["page"]);
  $num = test_input($_POST["num"]);
  $parent = test_input($_POST["parent"]);
  $hit = test_input($_GET["hit"]);
  $q_num = mysqli_real_escape_string($conn, $num);

  $sql ="DELETE FROM `commu_ripple` WHERE num=$q_num";
  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }
  mysqli_close($conn);
  echo "<script>location.href='./cm_gath_view.php?num=$parent&page=$page&hit=$hit';</script>";
}

else if(isset($_GET["mode"])&&$_GET["mode"]=="response"){
  $content = trim($_POST["content"]);
  $subject = trim($_POST['subject']);
  if(empty($content) || empty($subject)){
    echo "<script>alert('내용입력요망!');history.go(-1);</script>";
    exit;
  }
    $subject = test_input($_POST["subject"]);
    $content = test_input($_POST["content"]);
    $userid = test_input($userid);
    //$is_html = test_input($_POST['is_html']);
    // $is_html = (!isset($_POST['is_html']))?('n'):("y");
    $num = test_input($_POST['num']);
    $hit = test_input($_POST['hit']);
    $q_subject = mysqli_real_escape_string($conn, $subject);
    $q_content = mysqli_real_escape_string($conn, $content);
    $q_userid = mysqli_real_escape_string($conn, $userid);
    $q_num = mysqli_real_escape_string($conn, $num);
    $regist_day=date("Y-m-d (H:i)");

    $sql = "SELECT * from `commu` where num = $q_num;";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);
    $group_num = (int)$row['group_num'];
    $depth = (int)$row['depth'] +1;
    $ord = (int)$row['ord'] +1;

    $sql = "UPDATE `commu` SET `ord`=`ord`+1 WHERE `group_num` = $group_num && `ord` >= $ord;";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }

    $sql = "INSERT INTO `commu` VALUES('$board_type',null,0,'$depth','$ord','$q_userid','$q_subject','$q_content','$regist_day','$hit',null,null,null,null,null,null);";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }

    $sql = "SELECT max(num) from `commu`;";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);
    $max_num=$row['max(num)'];

    echo "<script>location.href='./cm_gath_view.php?num=$max_num&hit=$hit';</script>";
}

mysqli_close($conn);

?>
