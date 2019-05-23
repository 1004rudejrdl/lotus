<meta charset="utf-8">

<?php
include_once '../lib/db_connector.php';
include '../lib/create_table.php';
create_table($conn, 'member'); //낙서장 테이블 생성
$id = $g_id = $fb_id =$k_id =$n_id =$pw =$name=$tel =$email1 =$email2 =$email =$birthorigin =$birth=$gender =$postcode =$address =$detailAddress = $extraAddress = $hei = $wei = $job =$self_info="";
if(isset($_GET["mode"])&&$_GET["mode"]=="member_join"){
    include './upload_img.php';
    $id = test_input($_POST["id"]);
    $email1 = test_input($_POST["confirmed_email1"]);
    $email2 = test_input($_POST["confirmed_email2"]);
    $email = $email1."@".$email2;
    $q_id = mysqli_real_escape_string($conn, $id);
    $q_email = mysqli_real_escape_string($conn, $email);
    $sql1="select * from member where id = '$q_id'";
    $sql2="select * from member where email = '$q_email'";
    $result1 = mysqli_query($conn,$sql1);
    $result2 = mysqli_query($conn,$sql2);
    if (!$result1) {
      die('Error: ' . mysqli_error($conn));
    }
    if (!$result2) {
      die('Error: ' . mysqli_error($conn));
    }
    $rowcount1=mysqli_num_rows($result1);
    $rowcount2=mysqli_num_rows($result2);
    // var_dump($rowcount);
    if($rowcount1){
      echo "<script>alert('중복된 아이디가 있습니다.');history.go(-1);</script>";
      exit;
    }else if($rowcount2){
      echo "<script>alert('중복된 이메일이 있습니다.');history.go(-1);</script>";
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
      $birthorigin = test_input($_POST["datepicker"]);
      $birth=str_replace('/', '', $birthorigin);
      $gender = test_input($_POST["gender"]);
      $postcode = test_input($_POST["postcode"]);
      $address = test_input($_POST["address"]);
      $detailAddress = test_input($_POST["detailAddress"]);
      $extraAddress = test_input($_POST["extraAddress"]);
      $hei = test_input($_POST["mem_hei"]);
      $wei = test_input($_POST["mem_wei"]);
      $job = test_input($_POST["mem_job"]);
      $self_info=test_input($_POST["introduce_myself_text"]);

      $sql="INSERT INTO member (id,passwd,name,email,tel,birth,gender,postcode,address,detailAddress,extraAddress,black_list,naver,kakao,facebook,google) ";
      $sql.=" VALUES ('$id','$pw','$name','$email','$tel','$birth','$gender','$postcode','$address','$detailAddress','$extraAddress',0,'$n_id','$k_id','$fb_id','$g_id')";
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
