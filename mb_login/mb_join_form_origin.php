<?php
include "../example/example_main.php";







?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">

    </style>
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
    function change_img_upload(pic){
		fileNm = $(pic).val();
		if(fileNm != ""){
			var ext = fileNm.slice(fileNm.lastIndexOf(".") +1).toLowerCase();
			if(!(ext == "gif" || ext == "jpg" || ext == "png")){
				alert("이미지파일 (.jpg, .png, .gif) 만 업로드 가능합니다.");
				$(pic).val("");
				return;
			}
		}
		var reader = new FileReader();
		reader.onload = function(e){
			$("#profile_image").attr("src", e.target.result);
		}
		reader.readAsDataURL(pic.files[0]);
}

    </script>
  </head>
  <body>
    <form name="login_form" action="index.html" method="post">
      <table>
        <th>로그인</th>
        <tr>
          <td colspan="3" rowspan="4"><img id="profile_image" > </td>
          <td > <label id="login_table_id_label">아이디</label></td>
          <td colspan="5"><input type="text" name="id"  id="login_form_id" value="" placeholder="아이디를 입력하세요."> </td>
          <td><p id="ajax_respond_id"></p> </td>
        </tr>
        <tr>
          <td>비밀번호</td>
          <td colspan="5"><input type="password" name="pw" value="" placeholder="비밀번호를 입력하세요." > </td>
          <td><p id="confirm_pw"></p> </td>
        </tr>
        <tr>
          <td>비밀번호 확인</td>
          <td colspan="5"><input type="password" name="pw" value="" placeholder="비밀번호를 입력하세요." > </td>
          <td><p id="ajax_respond_pw"></p> </td>
        </tr>
        <tr>
          <td>이메일</td>
          <td colspan="3"><input type="email" name="email" value="">@ <select id="email_flatform_combo" name="email_flatform_combo">
            <option value="naver.com">naver.com</option>
            <option value="daum.net">daum.net</option>
            <option value="nate.com">nate.com</option>
            <option value="gmail.com">gmail.com</option>
            <option value=""><input type="text" name="email_flatform_text" value="" placeholder="직접입력해주세요."> </option>
          </select> </td>
        </tr>
        <tr>
          <td>프로필사진 등록</td>
          <td ><input type="file" name="user_pic_input" value="사진을 넣어주세요." onchange='change_img_upload(this)'> </td>
        </tr>
        <tr>
          <td>주소</td>
          <td></td>
        </tr>
        <tr>
          <td>직업</td>
          <td colspan="4" ><select id="mem_job" name="mem_job">
            <option value="1">무직</option>
            <option value="2">공무원</option>
            <option value="3">학생</option>
            <option value="4">자영업</option>
            <option value="5">직장인</option>
          </select> </td>
          <td>핸드폰번호</td>
          <td colspan="4"><input type="text" name="phone_num" value="phone_num"> </td>
        </tr>
        <tr>
          <td>키</td>
          <td colspan="4"><input type="text" name="mem_hei" value="mem_hei"> </td>
          <td>체중</td>
          <td colspan="4"><input type="text" name="mem_wei" value="mem_wei"> </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
        </tr>

      </table>
      <input type="submit" name="button_submit" value="Log In">
      <input type="reset" name="button_reset" value="재작성">
    </form>
    <form name="" action="index.html" method="post">

    </form>
  </body>
</html>
