<meta charset="utf-8">

<?php
include_once '../lib/db_connector.php';
include '../lib/create_table.php';
create_table($conn, 'member'); //낙서장 테이블 생성

if(isset($_GET["mode"])&&$_GET["mode"]=="member_join"){
    include './upload_img.php';
    $id = test_input($_POST["id"]);
    $q_id = mysqli_real_escape_string($conn, $id);
    $sql="select * from member where id = '$q_id'";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }
    $rowcount=mysqli_num_rows($result);
    // var_dump($rowcount);
    if($rowcount){
      echo "<script>alert('중복된 아이디가 잇습니다.');history.go(-1);</script>";
      exit;
    }else{
      $id = test_input($_POST["id"]);
      $g_id = test_input($_POST["g_id"]);
      $fb_id = test_input($_POST["fb_id"]);
      $k_id = test_input($_POST["k_id"]);
      $n_id = test_input($_POST["n_id"]);
      $pw = test_input($_POST["pw"]);
      $name= test_input($_POST["user_name"]);
      $tel = test_input($_POST["phone_num"]);
      $email1 = test_input($_POST["confirmed_email1"]);
      $email2 = test_input($_POST["confirmed_email2"]);
      $email = $email1."@".$email2;
      $birth = test_input($_POST["job"]);
      $gender = test_input($_POST["gender"]);
      $postcode = test_input($_POST["postcode"]);
      $address = test_input($_POST["address"]);
      $detailAddress = test_input($_POST["detailAddress"]);
      $extraAddress = test_input($_POST["extraAddress"]);
      $post_addr=$address.$detailAddress.$extraAddress;
      $hei = test_input($_POST["mem_hei"]);
      $wei = test_input($_POST["mem_wei"]);
      $job = test_input($_POST["mem_job"]);
      $self_info=test_input($_POST["introduce_myself_text"]);

      $sql="INSERT INTO member (id,passwd,name,email,tel,birth,gender,post_num,post_addr,black_list,naver,kakao,facebook,google) ";
      $sql.=" VALUES ('$id','$pw','$name','$email','$tel','$birth','$gender','$postcode','$address',0,'$n_id','$k_id','$fb_id','$g_id')";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
      $sql="INSERT INTO member_meeting (id,job,height,weight,self_info,img,mb_type,maching,maching_day) ";
      $sql.=" VALUES ('$id','$job','$hei','$wei','$self_info','$upload_file',0,null,null)";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
      mysqli_close($conn);
      echo "<script>location.href='../index.php';</script>";
  }//end of if rowcount

}//end of if insert

mysqli_close($conn);
// Header("Location: p260_score_list.php");

?>
