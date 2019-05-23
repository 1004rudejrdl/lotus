<?php
session_start();

$id = $_SESSION['userid'];
$name = $_SESSION['name'];

$r_id = $_POST['r_id'];
$msg_cont =$_POST['msg_cont'];

$send_time = date("Y-m-d (H:i)");

include_once '../lib/db_connector.php';
$sql = "show tables from lotus_db";
$result=mysqli_query($conn,$sql) or die('Error: '.mysqli_error($conn));

 while ($row=mysqli_fetch_row($result)) {
   if($row[0] ==='member'){//lotus_db 스키마에  member 테이블이 있는 경우
     $flag="OK";
     break;
   }
 }//테이블이 존재하지 않으면 돌려 보내고 종료한다.
 if($flag==="NO"){
     echo "<script>alert('member 테이블이 없습니다.');
       history.go(-1);
     </script> ";
     mysqli_close($conn); //언제 더 이상 문장을 실행하지 않고 나가는지 확인해서 자원을 모두 닫아주어야 한다.
     exit;
 }
$sql ="select * from member where id = '$r_id'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
if(mysqli_num_rows($result) == 0){
    echo "<script>
            alert('잘못된 아이디 입니다.');
            window.history.go(-1);
          </script>";
}else if(empty($msg_cont)){
    echo "<script>
            alert('메세지를 입력해 주세요.');
            window.history.go(-1);
          </script>";
}else{
    $sql = "insert into member_msg (r_id,s_id,msg_cont,read,send_time)";
    $sql .= "values('$r_id', '$id', '$msg_cont',0,'$send_time')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    echo "<script>
            window.close();
            alert('전송됐습니다.');
          </script>";

}

?>
