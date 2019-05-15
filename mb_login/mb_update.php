<?php
session_start();
include '../lib/login_db.php';
include $_SERVER['DOCUMENT_ROOT']."/company/aWeb/lib/check_member.php";
 ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/update_mem.css">
<script type="text/javascript" src="../js/sign_update_check_html.js" ></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script>
  $(document).ready(function() {
    $("#phone1").blur(function(event) {
      checkPhoneNo();
    });
    $("#phone2").blur(function(event) {
      checkPhoneNo();
    });
    $("#phone3").blur(function(event) {
      checkPhoneNo();
    });
  });
  function checkPhoneNo(){
    <?php
    include $_SERVER['DOCUMENT_ROOT']."/company/aWeb/js/sign_update_check_phno.php";
    ?>
    $.ajax({
      url: '../lib/mem_qurey.php?mode=select_ph_mem',
      type: 'POST',
      data: {
        id: $("#id").val(),
        phone1: $("#phone1").val(),
        phone2: $("#phone2").val(),
        phone3: $("#phone3").val()
      }
    })
    .done(function(result) {
      $("#span_ph_ch").html(result);
    })
    .fail(function() {
      alert("DB연결오류가 발생했습니다.");
    })
    .always(function() {
      console.log("complete");
    });
  }
</script>
<?php

$id=$phf=$sql=$g="";
if (isset($_SESSION["userid"])) {
  $id = test_input($_SESSION["userid"]);
  //var_dump($id);
  $q_id = mysqli_real_escape_string($conn, $id);
  $sql = "select * from userdb where id = '$q_id'";
  $result = mysqli_query($conn, $sql); //레코드 셋 DB에서 가져오는 오든 자료
  // var_dump($result);
  if (!$result) {
    die('Error: ' . mysqli_error($connd));
  }
  // 세션값을 주려면 제일 위에 session_start를 해야함
  $_SESSION['userid']=$id;

  while ($row = mysqli_fetch_array($result)) {

  if ($row['gender']=="F"||$row['gender']=="f") {
    $g='<input type="radio" class="gender" name="gender" value="M">남
        <input type="radio" class="gender" name="gender" value="F" checked>여';
  } else if ($row['gender']=="M"||$row['gender']=="m") {
    $g='<input type="radio" class="gender" name="gender" value="M" checked>남
    <input type="radio" class="gender" name="gender" value="F">여';
  }

  if ($row['phone1']=="010") {
    $phf='<option>선택</option>
    <option value="010" selected>010</option>
    <option value="011">011</option>
    <option value="017">017</option>';
  } else if ($row['phone1']=="011") {
    $phf='<option>선택</option>
    <option value="010">010</option>
    <option value="011" selected>011</option>
    <option value="017">017</option>';
  } else if ($row['phone1']=="017") {
    $phf='<option>선택</option>
    <option value="010">010</option>
    <option value="011">011</option>
    <option value="017" selected>017</option>';
  }

  if ($row['movie']=="yes") {
    $hch='<input type="checkbox" class="hobby" name="movie" id="movie" value="yes" checked>영화감상 &nbsp;';
  }elseif ($row['movie']=="no"){
    $hch='<input type="checkbox" class="hobby" name="movie" id="movie" value="yes">영화감상 &nbsp;';
  }
  if ($row['book']=="yes") {
    $hch.='<input type="checkbox" class="hobby" name="book" id="book" value="yes" checked>독서 &nbsp';
  }elseif ($row['book']=="no"){
    $hch.='<input type="checkbox" class="hobby" name="book" id="book" value="yes">독서 &nbsp';
  }
  if ($row['shop']=="yes") {
    $hch.='<input type="checkbox" class="hobby" name="shop" id="shop" value="yes" checked>쇼핑 &nbsp';
  }elseif ($row['shop']=="no"){
    $hch.='<input type="checkbox" class="hobby" name="shop" id="shop" value="yes">쇼핑 &nbsp';
  }
  if ($row['sport']=="yes") {
    $hch.='<input type="checkbox" class="hobby" name="sport" id="sport" value="yes" checked>운동';
  }elseif ($row['sport']=="no"){
    $hch.='<input type="checkbox" class="hobby" name="sport" id="sport" value="yes">운동';
  }
  $url="'../lib/mem_qurey.php?mode=delete_mem'";
    // "", 0, null, undefine, false 거짓
    // 그냥 찍는 경우에는 키값 입력시 '' 빼주어야함
    echo ('
    <!-- modal signup form //modal div 줄 수 없음-->
    <div style="width:100%; height:80px; background-color: #2196F3;">
    <span class="close" onclick="history.go(-1);"title="Close Modal">&times;</span>
    </div>
      <form name="mem_form" method="post" action="..\lib\mem_qurey.php?mode=update_mem">
        <div class="container">
          <h1>Update User Information</h1>
          <div class="secede">
            <input type="button" value="*secede" onclick="window.open('.$url.')">
          </div>
          <input type="hidden" name="title" value="회원정보수정">
          <p>Can\'t modify your ID and NAME</p>
          <hr>
          <!-- 아이디 -->
          <label for="email"><b>ID </b><span id="span_id_ch" style="color:red; font-size:12px; float:right;">* 아이디 수정 불가</span></label>
          <input type="text" size="20" maxlength="20" required placeholder="3~20자,영문자,숫자,_" name="id" id="id" value="'.$row['id'].'" readonly
          <!-- 이름 -->
          <label for="name"><b>NAME</b><span id="span_id_ch" style="color:red; font-size:12px; float:right;">* 이름 수정 불가</span></label>
          <input type="text" size="20" maxlength="6" required placeholder="2자~6자" name="name" id="name" value="'.$row['name'].'"readonly>
          <!-- 비밀번호 -->
          <label for="password"><b>Password</b></label>
          <input type="password" size="20" maxlength="16" required placeholder="4~16자,영,숫조합,!@#$%^*" name="passwd" id="passwd" value="'.$row['passwd'].'">
          <!-- 비밀번호 확인 -->
          <label for="passwd_confirm"><b>Repeat Password</b></label>
          <input type="password" size="20" maxlength="16" required placeholder="Repeat Password" id="passwd_confirm" name="passwd_confirm" value="'.$row['passwd_confirm'].'">
          <!-- 성별 -->
          <label for="gender"><b>Gender</b></label>
          <label>
            '.$g.'
          </label>
          <!-- 전화번호 -->
          <div class="phone">
            <label for="phone"><b>Phone Number</b><span id="span_ph_ch" style="color:red; font-size:12px; float:right;"></span></label>
            <br>
            <select name="phone1" id="phone1" required>
              '.$phf.'
            </select>&nbsp;&nbsp;
            <input type="text" size="4" id="phone2" required name="phone2" maxlength="4" value="'.$row['phone2'].'">&nbsp;&nbsp;
            <input type="text" size="4" id="phone3" required name="phone3" maxlength="4" value="'.$row['phone3'].'">
          </div>
          <!-- 주소 -->
          <label for="address"><b>Address</b></label>
          <input type="text" size="50" placeholder="300글자 이하" required maxlength="300" name="address" id="address" value="'.$row['address'].'">
          <!-- 취미 -->
          <label for="hobby"><b>Hobby</b></label>&nbsp;&nbsp;&nbsp;&nbsp;
          <label>
            '.$hch.'
          </label>
          <br>
          <!-- 자기소개 -->
          <label for="address"><b>Introduce</b></label>
          <textarea name="intro" id="intro" placeholder="300글자 이하" maxlength="300" rows="5" cols="60">'.$row['intro'].'</textarea>

          <div class="clearfix">
            <button type="button" onclick="history.go(-1);" class="cancelbtn">Cancel</button>
            <input type="reset" value="Reset" class="resetbtn">
            <button type="button" onclick="valueCheck()" class="signupbtn">Update</button>
          </div>
        </div>
      </form>
    ');
  }
}

mysqli_close($conn);
?>
