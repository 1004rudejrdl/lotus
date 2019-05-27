<?php
session_start();
include '../lib/db_connector.php';
$userid=$_SESSION['userid'];
$username=$_SESSION['name'];
$g_id=$fb_id=$n_id=$k_id=$fullemail=$email[0]=$email[1]=$name=$birth=$gender="";
if(!empty($_GET['mode'])&&($_GET['mode']=="google")){
  $g_id=$_GET['id'];
}else if(!empty($_GET['mode'])&&($_GET['mode']=="facebook")){
  $fb_id=$_GET['id'];
}else if(!empty($_GET['mode'])&&($_GET['mode']=="naver")){
  $n_id=$_GET['id'];
}else if(!empty($_GET['mode'])&&($_GET['mode']=="kakao")){
  $k_id=$_GET['id'];
}
$sql="SELECT *FROM member where `id`='$userid'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$id=$row['id'];
// $passwd=$row['passwd']; 개인정보 보호 차원에서 다시 입력하도록 밑에 value를 "", required로 줌
$name=$row['name'];
$email=$row['email'];
$email=explode('@', $email);
$tel=$row['tel'];
$birth=$row['birth'];
$postcode=$row['postcode'];
$address=$row['address'];
$detailAddress=$row['detailAddress'];
$extraAddress=$row['extraAddress'];
$sql1="SELECT *FROM member_meeting where `id`='$userid'";
$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($result1);
$job=$row1['job'];
$height=$row1['height'];
$weight=$row1['weight'];
$self_info=$row1['self_info'];
$img=$row1['img'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" />
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="./css/mb_join_form.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
    $('#input:radio[name="gender"]').each(function() {
      var gender=$('#input:radio[name="gender"]:checked').val();
      var profile_gender="";
      if(gender=='0'){
        profile_gender='남자';
      }else if(gender=='1'){
        profile_gender='여자';
      }
      $('#profile_gender').val(profile_gender);
    });
  });

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
  $('#profile_job').change(function(event) {

  });
  });
  $(document).ready(function() {
  $('#mem_job').change(function(event) {
    var job=$('#mem_job option:checked').val();
    var jobbob="";
    if(job=='1'){
      jobbob='무직';
    }else if(job=='2'){
      jobbob='공무원';
    }else if(job=='3'){
      jobbob='학생';
    }else if(job=='4'){
      jobbob='자영업';
    }else if(job=='5'){
      jobbob='직장인';
    }
    $('#profile_job').val(jobbob);
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
</head>

<body>
  <!-- header start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
  <!-- header end -->
  <!-- main_body start -->
  <div id="main_body" class="main_body">
    <div id="sidenav" class="sidenav">
      <a href="#">연애, 꽃피우다</a>
      <a href="#">이성찾기</a>
      <a href="#">쇼핑몰</a>
      <a href="#">테스트</a>
      <a href="#">커뮤니티</a>
    </div><!-- sidenav end -->

    <div class="main">
      <div class="admin_title">
        정보수정
      </div>
      <hr class="title_hr">
      <form name="login_form" action="member_join.php?mode=member_modify" method="post" enctype="multipart/form-data">
        <input type="hidden" name="g_id" value="<?=$g_id?>">
        <input type="hidden" name="fb_id" value="<?=$fb_id?>">
        <input type="hidden" name="n_id" value="<?=$n_id?>">
        <input type="hidden" name="k_id" value="<?=$k_id?>">
        <table class="admin_table">
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 아 이 디</td>
            <td class="tb_cont">
              <input type="text" name="id" id="login_form_id" value="<?=$id?>" placeholder="아이디를 입력하세요." required>
              <span class="alret_ment" id="ajax_respond_id" name="ajax_respond_id"></span>
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 비밀번호</td>
            <td class="tb_cont">
              <input type="password" name="pw" id="login_form_pw" value="" placeholder="비밀번호를 입력하세요." required>
              <span class="alret_ment" id="confirm_pw"></span>
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 비밀번호 확인</td>
            <td class="tb_cont">
              <input type="password" name="pw" id="login_form_id_chk" value="" placeholder="비밀번호를 재입력하세요." required>
              <span class="alret_ment" id="ajax_respond_pw"></span>
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 이 메 일</td>
            <td class="tb_cont input_email">
              <input type="text" id="confirmed_email1" name="confirmed_email1" value="<?=$email[0]?>" placeholder="이메일 인증이 필요합니다" readonly required />@
              <input type="text" id="confirmed_email2" name="confirmed_email2" value="<?=$email[1]?>" placeholder="X버튼을 누르고 인증하세요" ReadOnly required />
              <a id="check_button_anchor" name="check_button_anchor" href="#">
                <img name="check_button" id="check_button" onclick="check_email()">
              </a>
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 이 름</td>
            <td class="tb_cont">
              <input type="text" id="user_name" name="user_name" value="<?=$name?>" required>
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 주 소</td>
            <td class="tb_cont">
              <input class="shorter addr" type="text" name="postcode" id="postcode" value="<?=$postcode?>" placeholder="우편번호">
              <input class="shorter addr" type="button" onclick="execDaumPostcode()" value="우편번호 찾기">
              <br>
              <input class="addr" type="text" name="address" id="address" value="<?=$address?>" placeholder="주소">
              <input class="addr" type="text" name="detailAddress" id="detailAddress" value="<?=$detailAddress?>" placeholder="상세주소" required>
              <br>
              <input type="text" name="extraAddress" id="extraAddress" value="<?=$extraAddress?>" placeholder="참고항목">

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
                      if (data.userSelectedType === 'R') {
                        // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                        // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                        if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
                          extraAddr += data.bname;
                        }
                        // 건물명이 있고, 공동주택일 경우 추가한다.
                        if (data.buildingName !== '' && data.apartment === 'Y') {
                          extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                        }
                        // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                        if (extraAddr !== '') {
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
          </tr>
        </table>
        <table class="admin_table">
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 생 일</td>
            <td class="tb_cont">
              <input type="text" name="datepicker" id="datepicker" value="<?=$birth?>" placeholder="클릭하여 선택하세요">
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 직 업</td>
            <td class="tb_cont">
              <select id="mem_job" name="mem_job">
                <?php
                if ($job=='1') {
                ?>
                  <option value="1" selected>무직</option>
                <?php
                } else {
                  ?>
                  <option value="1">무직</option>
                  <?php
                }
                if ($job=='2') {
                  ?>
                  <option value="2" selected>공무원</option>
                  <?php
                } else {
                  ?>
                  <option value="2">공무원</option>
                  <?php
                }
                if ($job=='3') {
                  ?>
                  <option value="3" selected>학생</option>
                  <?php
                } else {
                  ?>
                  <option value="3">학생</option>
                  <?php
                }
                if ($job=='4') {
                  ?>
                  <option value="4" selected>자영업</option>
                  <?php
                } else {
                  ?>
                  <option value="4">자영업</option>
                  <?php
                }
                if ($job=='5') {
                  ?>
                  <option value="5" selected>직장인</option>
                  <?php
                } else {
                  ?>
                  <option value="5">직장인</option>
                  <?php
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 핸드폰번호</td>
            <td class="tb_cont">
              <input type="text" id="phone_num" name="phone_num"  value="<?=$tel?>" placeholder="전화번호를 입력하세요">
              <span class="alret_ment" id="confirm_phone"></span>
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 키</td>
            <td class="tb_cont">
              <input type="text" id="mem_hei" name="mem_hei" value="<?=$height?>" placeholder="키를 입력하세요">
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 체 중</td>
            <td class="tb_cont">
              <input type="text" id="mem_wei" name="mem_wei" value="<?=$weight?>" placeholder="체중을 입력하세요">
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 성 별</td>
            <td class="tb_cont">
              성별 변경은 관리자에게 문의하세요
            </td>
          </tr>
        </table>
        <table class="admin_table">
          <tr>
            <td colspan="2" class="td_subjet"><span class="td_subjet_star">*</span> 프로필사진 등록</td>
          </tr>
          <tr>
            <td colspan="2"><input type="file" name="user_pic_input" value="사진을 넣어주세요." onchange='change_img_upload(this)' required></td>
          </tr>
          <tr>
            <td colspan="2" class="p_img"><img id="profile_image" src="<?=$img?>"></td>
          </tr>
        </table>
        <table class="admin_table witdh_100 mb_bottom">
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 자기 소개</td>
          </tr>
          <tr>
            <td class="tb_cont">
              <textarea name="introduce_myself_text" rows="8" placeholder="자신을 소개해주세요.(최대 500자)"><?=$self_info?></textarea>
            </td>
          </tr>
        </table>
        <hr class="title_hr">
        <div class="btn_center">
          <div class="btn_submit btn_3">
            <a href="./delete_id.php?mode=delete&id=<?=$userid?>">회원탈퇴</a>
            <input type="submit" name="button_submit" value="가입하기">
            <input type="reset" name="button_reset" value="재작성">
          </div>
        </div>
      </form>
      <p>&nbsp;</p>
      <div class="mg_bottom">
        <table class="admin_table witdh_100 mb_bottom">
          <tr>
            <td colspan="2" class="td_subjet"><span class="td_subjet_star">*</span> 프로필 미리보기</td>
          </tr>
        </table>
        <table class="admin_table">
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 이 름</td>
            <td class="tb_cont">
              <input type="text" id="profile_name">
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 나 이</td>
            <td class="tb_cont">
              <input type="text" id="profile_age" name="profile_age" value="">
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 직 업</td>
            <td class="tb_cont">
              <input type="text" id="profile_job" name="profile_job" value="">
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 키</td>
            <td class="tb_cont">
              <input type="text" id="profile_hei" name="profile_hei" value="">
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 체 중</td>
            <td class="tb_cont">
              <input type="text" id="profile_wei" name="profile_wei" value="">
            </td>
          </tr>
        </table>
        <table class="admin_table">
          <tr>
            <td class="p_img" colspan="2" rowspan="5"><img id="profile_image1"></td>
          </tr>
        </table>
        <table class="admin_table witdh_100 mb_bottom">
          <tr>
            <td class="tb_cont">
              <textarea name="introduce_myself_text" rows="8"placeholder="자신을 소개해주세요.(최대 500자)"></textarea>
            </td>
          </tr>
        </table>
      </div>      <!-- mg_bottom end -->
    </div> <!-- main end -->
  </div> <!-- main_body end -->
  <!-- footer start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
  <!-- footer_bg end -->
  <!-- <script src="../js/admin_effect_common.js"></script> -->
  <!-- Sticky event를 위해서 상단에 올리지 못함 -->
</body>

</html>
