
<?php
session_start();
include './Sendmail.php';
$g_id=$fb_id=$n_id=$k_id=$fullemail=$email[0]=$email[1]=$name=$birth=$gender="";
?>
<!DOCTYPE html>
<html>
<head>
<?php
  if(!empty($_GET['mode'])&&($_GET['mode']=="google")){
    $g_id=$_GET['id'];
    $fullemail=$_GET['email'];
    $email=explode('@',$fullemail);
    $name=$_GET['name'];
  }else if(!empty($_GET['mode'])&&($_GET['mode']=="facebook")){
    $fb_id=$_GET['id'];
    $fullemail=$_GET['email'];
    $email=explode('@',$fullemail);
    $name=$_GET['name'];
  }else if(!empty($_GET['mode'])&&($_GET['mode']=="naver")){
    $n_id=$_GET['id'];
    $fullemail=$_GET['email'];
    $email=explode('@',$fullemail);
  }else if(!empty($_GET['mode'])&&($_GET['mode']=="kakao")){
    $k_id=$_GET['id'];
    $fullemail=$_GET['email'];
    $email=explode('@',$fullemail);
  }
?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" />
  <link rel="stylesheet" href="../css/common.css">
  <!-- <link rel="stylesheet" href="../css/join.css"> -->
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <script type="text/javascript" src="../js/sign_update_check_html.js?ver=1" ></script> -->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    if($('#confirmed_email1').value==""){
      $('#check_button').attr("src", "./img/none_check_email.png");
    }else{
      $('#check_button').attr("src", "./img/check_email.png");
    }
  });
$(document).ready(function() {
  $('#user_name').blur(function(event) {
    $('#profile_name').val($('#user_name').val());
  });
});
$(document).ready(function() {
  $('#mem_hei').blur(function(event) {
    $('#profile_hei').val($('#mem_hei').val());
  });
});
$(document).ready(function() {
  $('#mem_wei').blur(function(event) {
    $('#profile_wei').val($('#mem_wei').val());
  });
});
$(document).ready(function() {
  $('#introduce_myself_text').blur(function(event) {
    $('#introduce_myself_profile').val($('#introduce_myself_text').val());
  });
});
$(document).ready(function() {
  $('#profile_age').focus(function(event) {
    var nowage=$('#datepicker').val();
    var now=nowage.split("/");
    var year=new Date().getFullYear();
    var day=new Date().getDate();
    var month=new Date().getMonth()+1 ;
    var yearage=year-now[2];
    var age;
console.log(nowage);
console.log(now[0]);
console.log(now[1]);
console.log(now[2]);
console.log(year);
console.log(day);
console.log(month);
console.log(yearage);
console.log(age);
    if(month>now[0]){
      age=yearage+1;
    }else if(month=now[0]){
      if(day>=now[1]){
        age=yearage+1;
      }else if(day<now[1]){
        age=yearage;
      }
    }else if(month<now[0]){
      age=yearage;
    }
    $('#profile_age').val(age);
  });
});
$(document).ready(function() {
  $('#mem_job option:selected').click(function(event) {
    var job=$('#mem_job option:selected').val();
    $('#profile_job').val(job);
  });
});

  function check_email(){
    window.open("./check_email.php", "IDEmail", "left=200, top=200, width=700, height=550, scrollbars=no, resizable=no");
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


$(function(){
    $("#datepicker").datepicker({
      changeYear: true,
      yearRange: "1920:+nn",
      currentText: '오늘 날짜',
      closeText: '닫기',
      minDate: -100000,
      maxDate:"-19Y"
    });
  });
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
  $("#profile_image1").attr("src", e.target.result);
}
reader.readAsDataURL(pic.files[0]);
}

</script>
  <!-- <script type="text/javascript" src="../js/sign_update_check_ajax_main.js?ver=1"></script> -->
</head>
<body>
<!-- header start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
<!-- header end -->
<!-- main_body start -->
<div class="main_body">
<div id="sidenav" class="sidenav">
  <a href="#about">추천/예약</a>
  <a href="#services">맛집</a>
  <a href="#clients">숙박</a>
  <a href="#contact">렌트카</a>
</div><!-- sidenav end -->
<div class="main">
  <form name="login_form" action="member_join.php?mode=member_join" method="post">
    <table>
      <th>로그인</th>
      <tr>
        <td colspan="3" rowspan="4"><img id="profile_image" style="width:430px;height:300px;" > </td>
        <td > <label id="login_table_id_label">아이디</label></td>
        <td colspan="5"><input type="text" name="id"  id="login_form_id" value="" placeholder="아이디를 입력하세요." required> </td>
        <td><p id="ajax_respond_id"></p> </td>
      </tr>
      <tr>
        <td>비밀번호</td>
        <td colspan="5"><input type="password" name="pw" id="login_form_pw" value="" placeholder="비밀번호를 입력하세요."required > </td>
        <td><p id="confirm_pw"></p> </td>
      </tr>
      <tr>
        <td>비밀번호 확인</td>
        <td colspan="5"><input type="password" name="pw" id="login_form_id_chk" value="" placeholder="비밀번호를 재입력하세요."required > </td>
        <td><p id="ajax_respond_pw"></p> </td>
      </tr>
      <tr>
        <td>이메일</td>
        <td colspan="3">
          <input type="text" id="confirmed_email1" name="confirmed_email1" value="<?=$email[0]?>" readonly required/>@
          <input type="text" id="confirmed_email2" name="confirmed_email2" value="<?=$email[1]?>" ReadOnly required/>
          <a id="check_button_anchor" name="check_button_anchor" href="#">
            <img name="check_button"id="check_button" onclick="check_email()" style="height: 50px;">
          </a>
        </td>
      </tr>
      <tr>
        <td>프로필사진 등록</td>
        <td ><input type="file" name="user_pic_input" value="사진을 넣어주세요." onchange='change_img_upload(this)'required > </td>
        <td colspan="2">이름</td>
        <td><input type="text" id="user_name" name="user_name" value="<?=$name?>" required> </td>
      </tr>
      <tr>
        <td>주소</td>
        <td colspan="4">
          <input type="text" id="postcode" placeholder="우편번호">
  <input type="button" onclick="execDaumPostcode()" value="우편번호 찾기"><br>
  <input type="text" id="address" placeholder="주소"><br>
  <input type="text" id="detailAddress" placeholder="상세주소">
  <input type="text" id="extraAddress" placeholder="참고항목">

  <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
  <script>
      function execDaumPostcode() {
          new daum.Postcode({
              oncomplete: function(data) {
                  // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                  // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                  // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                  var addr = ''; // 주소 변수
                  var extraAddr = ''; // 참고항목 변수

                  //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                  if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                      addr = data.roadAddress;
                  } else { // 사용자가 지번 주소를 선택했을 경우(J)
                      addr = data.jibunAddress;
                  }

                  // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                  if(data.userSelectedType === 'R'){
                      // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                      // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                      if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                          extraAddr += data.bname;
                      }
                      // 건물명이 있고, 공동주택일 경우 추가한다.
                      if(data.buildingName !== '' && data.apartment === 'Y'){
                          extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                      }
                      // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                      if(extraAddr !== ''){
                          extraAddr = ' (' + extraAddr + ')';
                      }
                      // 조합된 참고항목을 해당 필드에 넣는다.
                      document.getElementById("extraAddress").value = extraAddr;

                  } else {
                      document.getElementById("extraAddress").value = '';
                  }

                  // 우편번호와 주소 정보를 해당 필드에 넣는다.
                  document.getElementById('postcode').value = data.zonecode;
                  document.getElementById("address").value = addr;
                  // 커서를 상세주소 필드로 이동한다.
                  document.getElementById("detailAddress").focus();
              }
          }).open();
      }
  </script>
        </td>
        <td>생일</td>
        <td colspan="4">
          Date: <input type="text" name="datepicker" id="datepicker">
        </td>
      </tr>
      <tr>
        <td>직업</td>
        <td colspan="4" ><select id="mem_job" name="mem_job">
          <option value="1" selected>무직</option>
          <option value="2">공무원</option>
          <option value="3">학생</option>
          <option value="4">자영업</option>
          <option value="5">직장인</option>
        </select> </td>
        <td>핸드폰번호</td>
        <td colspan="4"><input type="text" id="phone_num" name="phone_num" placeholder="전화번호를 입력하세요"> </td>
      </tr>
      <tr>
        <td>키</td>
        <td colspan="4"><input type="text" id="mem_hei" name="mem_hei" placeholder="키를 입력하세요"> </td>
        <td>체중</td>
        <td colspan="4"><input type="text" id="mem_wei" name="mem_wei" placeholder="체중을 입력하세요"> </td>
      </tr>
    </table>
    성별 <input type="radio" name="gender" id="gender" value="male" checked="checked"> <label for="male">남성</label>
    <input type="radio" name="gender" id="gender" value="female"><label for="female">여성</label>
    <input type="hidden" name="g_id" value="<?=$g_id?>">
    <input type="hidden" name="fb_id" value="<?=$fb_id?>">
    <input type="hidden" name="n_id" value="<?=$n_id?>">
    <input type="hidden" name="k_id" value="<?=$k_id?>">
    <input type="submit" name="button_submit" value="Log In">
    <input type="reset" name="button_reset" value="재작성">
    <textarea name="introduce_myself_text" rows="8" cols="80"placeholder="자신을 소개해주세요.(최대 500자)"style="resize:none;"></textarea>
  </form>
    <br>
    <h2>프로필 미리보기</h2>
    <div class="">
      <img id="profile_image1" style="width:600px;height:450px;" >
      이름<input type="text" id="profile_name"  >
      나이<input type="text" id="profile_age" name="profile_age" value="">
      직업<input type="text" id="profile_job" name="profile_job" value="">
      키  <input type="text" id="profile_hei" name="profile_hei" value="">
      체중<input type="text" id="profile_wei" name="profile_wei" value="">
      성별 <input type="text" id="profile_gender" name="profile_gender" value="">
      <textarea name="introduce_myself_profile" rows="8" cols="80"style="resize:none;"></textarea>
    </div>
</div>  <!-- main end -->
</div>  <!-- main_body end -->
<!-- footer start -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
<!-- footer_bg end -->
</body>

</html>
