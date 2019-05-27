<?php
session_start();
$email="";
if(!isset($_POST['email1']) || !isset($_POST['email2'])){
    echo "<script> alert('접근 제한'); history.back(); </script>";
    exit;
}else{
    $email= $_POST['email1']."@".$_POST['email2'];
}

include './Sendmail.php';

srand((double)microtime()*1000000); //난수값 초기화
$_SESSION['code']=rand(100000,999999);
$code=$_SESSION['code'];
$count=1;
$to=$email;
$from="관리자";
$subject="[연애, 꽃피우다] 관리자 등록 인증번호입니다.";
$body="[연애, 꽃피우다] 관리자 등록 인증번호 입니다.\n인증번호 : ".$code."\n정확히 입력해주세요.";
$cc_mail="";
$bcc_mail=""; /* 메일 보내기*/

$sendmail->send_mail($to, $from, $subject, $body,$cc_mail,$bcc_mail);

echo "<script>
        location.href='./check_email_conf.php?email=$email';
    </script>";
?>
