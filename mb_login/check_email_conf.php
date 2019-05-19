<!-- 이메일로 받은 인증코드 확인 -->
<?php
session_start();

if(isset($_GET['mode']) && $_GET['mode']=="unset"){
    unset($_SESSION['code']);
    echo "<script> window.close(); </script>";
    exit ;
}

if(!isset($_SESSION['code'])){
    echo "<script> alert('접근 제한'); history.back(); </script>";
    exit;
}else{
     $code= $_SESSION['code'];
}

$email= $_GET['email'];
$email_ex= explode("@", $email);
$email1= $email_ex[0];
$email2= $email_ex[1];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<script>
    	var myVar;
    	var count=300;

    	function check_email_conf(a,b,c){
  			if(document.getElementById("code").value!=a){
  				alert("인증번호가 틀립니다.\n 다시 입력해주세요!");
  				return ;
  			}
  			alert("인증 되었습니다.");
  			opener.login_form.confirmed_email1.value=b;//현창을 열어준 이 전창(opener)
  			opener.login_form.confirmed_email2.value=c;
        opener.document.getElementById("check_button").src="./img/check_email.png";
  			window.close();
		  }

    	function closer(){
    		window.close();
    	}

    	function myFunction() {
    	    var min= parseInt(count/60);
    	    var sec= count%60;
 	   	    count--;
			document.getElementById('conf_time').innerHTML="("+min+":"+sec+")";

    	    if(!count){
    	       alert('시간초과');
    	       location.href="check_email_conf.php?mode=unset";
    	       return ;
    	    }
    	    myVar = setTimeout(myFunction, 1000);
    	}
	</script>
</head>
<body>
	<div id=wrap>
		<div id=id_check_title>
			<div id=id_check_title1><img src="./../main_img/lotus_logo_text_black.png" alt=""> </div>
			<div id=id_check_title2>
      </div>
		</div>
		<div class=clear></div>
		<div id=hr_line></div>
		<br>
		<div id=text1 align=center>
			<b style="coler : blue"><?=$email?></b> 로 인증번호를 보냈습니다.<br>
			정확히 입력해 주세요.
		</div>
		<br>
		<div align=center>
			<input type="text" id="code" size="10">
      <button type="button" name="button" onclick="check_email_conf(<?=$code?>,'<?=$email1?>', '<?=$email2?>')">인증하기</button>
    		<div id="conf_time" style="color : blue"></div>
    		<script>
    			myFunction()
    		</script>
		</div>
		<br>
		<div id=hr_line_middle></div>
		<br>
	</div>
</body>
</html>
