<?php
session_start();
?>
<meta charset="utf-8">
<?php
//db 연결하는 파일을 include 하여 그 파일의 기능을 그대로 구현 가능.
include '../lib/db_con.php';
//쿼리문을 실행하는 파일
$id= $q_id = $sql= $result = $pass = $q_pass= $row= "";
$flag ="NO";

$sql = "show tables from ansisung";
$result=mysqli_query($conn,$sql) or die('Error: '.mysqli_error($conn));

while ($row=mysqli_fetch_row($result)) {
  if($row[0] ==='member'){
    //ansisung 스키마에  member 테이블이 있는 경우
    $flag="OK";
    break;
  }
}
//테이블이 존재하지 않으면 돌려 보내고 종료한다.
if($flag==="NO"){
    echo "<script>alert('member 테이블이 없습니다.');
      history.go(-1);
    </script> ";
    mysqli_close($conn); //언제 더 이상 문장을 실행하지 않고 나가는지 확인해서 자원을 모두 닫아주어야 한다.
    exit;
}

//mode에 대한 값이 세팅이 되어있고 && $mode = id_check 일 때,
if(isset($_GET['mode'])&&$_GET['mode']=="login"){
  if(!(isset($_POST["id"]) && isset($_POST["password"]))||
  (empty($_POST["id"]) || empty($_POST["password"]))){
    //1) 아이디 또는 비밀번호값이 셋팅이 안되어 있는 경우 //2) 아이디 또는 비밀번호 값이 없는 경우
    echo "<script>alert('id와 pass 모두 입력해주세요.');
    history.go(-1);
    </script> ";
    mysqli_close($conn);
    exit;
  }else{
    //3-1) 아이디 비밀번호 값이 있을 때 값을 받아옴
    $id= test_input($_POST["id"]);
    $pw= test_input($_POST["password"]);
    //3-2) 데이터 베이스에서 sql injection 방어
    $q_id = mysqli_real_escape_string($conn, $id);
    $q_pw = mysqli_real_escape_string($conn, $pw);
    //3-3) db에서 id와 pass가 모두 일치 하는 경우 값을 받아옴
    $sql="select * from member where id = '$q_id' AND pass = '$q_pw'";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }
    $rowcount=mysqli_num_rows($result);
    // var_dump($rowcount);
    if(!$rowcount){
      echo "<script>alert('로그인실패');
      history.go(-1);
      </script> "; //echo는 html언어. html소스만 보내주면 소스를 받은 웹브라우저가 실행(웹브라우저 html해독기가 실행) php와 관련 없음
      mysqli_close($conn);
      exit; //login.php가 끝이 남(php해석기가 해석을 더 이상 하지 않음)
    }else{
      $row=mysqli_fetch_array($result);
      // 세션값을 주려면 제일 위에 session_start를 해야함
      $_SESSION['userid']=$row['id'];
    }
  }//end of  check id and pass
}else if(isset($_GET['mode'])&&$_GET['mode']=="kakao"){
  $_POST['']
  $n_id=$_POST['n_id'];
  $_POST['n_email'];
  $_POST['n_birth'];
  $_POST['n_gender'];
  $_POST['n_name'];
  $_POST['n_pic'];
  $_POST['k_email'];
  $_POST['k_name'];
  $_POST['k_pic'];
  $_POST['k_birth'];
  $_POST['k_gender'];
  $_POST['fb_id'];
  $_POST['g_id'];
  $_POST['g_name'];
  $_POST['g_pic'];
  $_POST['g_email'];
  $_POST['n_email'];
  $_POST['n_gender'];
  $_POST['n_id'];
  $_POST['n_name'];
  $_POST['n_profile_image'];
  $_POST['n_birth'];
}

mysqli_close($conn);//언제 더 이상 문장을 실행하지 않고 나가는지 확인해서 자원을 모두 닫아주어야 한다.
Header("Location: ../index.php");
// Header는 php명령어
//location.href 는 스크립트 명령어

?>
