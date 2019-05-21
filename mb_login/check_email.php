<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
</head>
	<script>
    function check_exp(elem, exp, msg){
    		if(!elem.value.match(exp)){
    			alert(msg);
    			return true;
    		}
    	}
		// 이메일 검사
		function check_email_conf(){
			var exp_email1= /^[0-9a-zA-Z~!@#$%^&*()]+$/;
			var exp_email2= /^[a-z]+\.[a-z]+$/;
			if(!document.email_check_form.email1.value){
				alert("이메일을 정확히입력해주세요");
				document.email_check_form.email1.focus();
				return ;
			}
			if(!document.email_check_form.email2.value){
				alert("이메일을 정확히입력해주세요");
				document.email_check_form.email2.focus();
				return ;
			}
			if(check_exp(document.email_check_form.email1,exp_email1, "이메일을 정확히 입력해주세요!")){
				document.email_check_form.email1.focus();
				document.email_check_form.email1.select();
				return ;
			}
			if(check_exp(document.email_check_form.email2,exp_email2, "이메일을 정확히 입력해주세요!")){
				document.email_check_form.email2.focus();
				document.email_check_form.email2.select();
				return ;
			}
			document.email_check_form.submit();
		}
		function SetEmailTail(emailValue) {
		  var email = document.all("email")    // 사용자 입력
		  var emailTail = document.all("email2") // Select box

		  if ( emailValue == "notSelected" ){
				return;
			}else if ( emailValue == "etc" ) {
		   emailTail.readOnly = false;
		   emailTail.value = "";
		   emailTail.focus();
		  } else {
		   emailTail.readOnly = true;
		   emailTail.value = emailValue;
		  }
		 }
    function closer(){
    		window.close();
    }
	</script>
<body>
	<div id=wrap>
		<div id=id_check_title>
			<div id=id_check_title1></div>
		</div>
		<div class=clear></div>
		<div id=hr_line></div>
		<br>
		<div id=text1 align=center>
			이메일 인증이 필요합니다.<br>
			입력하신 이메일 주소로 인증번호를 요청합니다.
		</div>
		<br><br><br>
		<form name=email_check_form method="post" action="./email.php">
		<div align=center>
			<input type="text" name="email1" value=""/>@
    	<input type="text" name="email2" value="" ReadOnly/>
		<select name="emailCheck"onchange="SetEmailTail(emailCheck.options[this.selectedIndex].value)">
    	<option value="notSelected">::선택하세요::</option>
    	<option value="etc">직접입력</option>
    	<option value="naver.com">naver.com</option>
    	<option value="nate.com">nate.com</option>
    	<option value="hanmail.net">hanmail.net</option>
    	<option value="gmail.com">gmail.com</option>
   	</select>
			<button type="button" onclick="check_email_conf()" style="height:50px;" name="button">인증번호발송</button>
		</div>
		</form>
		<br>
		<div id=hr_line_middle></div>
		<br>
	</div>
</body>
</html>
