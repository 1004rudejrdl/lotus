<!-- 권한 관리 메인 -->
<?php
  session_start();

?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="./css/country0.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
  <script type="text/javascript">
    function change_img_upload1(pic1) {
      fileNm = $(pic1).val();
      if (fileNm != "") {
        var ext = fileNm.slice(fileNm.lastIndexOf(".") + 1).toLowerCase();
        if (!(ext == "gif" || ext == "jpg" || ext == "png")) {
          alert("이미지파일 (.jpg, .png, .gif) 만 업로드 가능합니다.");
          $(pic1).val("");
          return;
        }
      }
      var reader = new FileReader();
      reader.onload = function(e) {
        $("#profile_image1").attr("src", e.target.result);
      }
      reader.readAsDataURL(pic1.files[0]);
    }

    function change_img_upload2(pic2) {
      fileNm = $(pic2).val();
      if (fileNm != "") {
        var ext = fileNm.slice(fileNm.lastIndexOf(".") + 1).toLowerCase();
        if (!(ext == "gif" || ext == "jpg" || ext == "png")) {
          alert("이미지파일 (.jpg, .png, .gif) 만 업로드 가능합니다.");
          $(pic2).val("");
          return;
        }
      }
      var reader = new FileReader();
      reader.onload = function(e) {
        $("#profile_image2").attr("src", e.target.result);
      }
      reader.readAsDataURL(pic2.files[0]);
    }

    function change_img_upload3(pic3) {
      fileNm = $(pic3).val();
      if (fileNm != "") {
        var ext = fileNm.slice(fileNm.lastIndexOf(".") + 1).toLowerCase();
        if (!(ext == "gif" || ext == "jpg" || ext == "png")) {
          alert("이미지파일 (.jpg, .png, .gif) 만 업로드 가능합니다.");
          $(pic3).val("");
          return;
        }
      }
      var reader = new FileReader();
      reader.onload = function(e) {
        $("#profile_image3").attr("src", e.target.result);
      }
      reader.readAsDataURL(pic3.files[0]);
    }

    $.datepicker.setDefaults({
      dateFormat: 'yy-mm-dd',
      prevText: '이전 달',
      nextText: '다음 달',
      monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
      dayNames: ['일', '월', '화', '수', '목', '금', '토'],
      dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
      showMonthAfterYear: true,
      yearSuffix: '년'
    });

    $(function() {
      $("#datepicker1").datepicker({
        minDate: 0
      });
    });
    $.datepicker.setDefaults({
      dateFormat: 'yy-mm-dd',
      prevText: '이전 달',
      nextText: '다음 달',
      monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
      dayNames: ['일', '월', '화', '수', '목', '금', '토'],
      dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
      showMonthAfterYear: true,
      yearSuffix: '년'
    });

    $(function() {
      $("#datepicker2").datepicker({
        minDate: 1
      });
    });
    $.datepicker.setDefaults({
      dateFormat: 'yy-mm-dd',
      prevText: '이전 달',
      nextText: '다음 달',
      monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
      dayNames: ['일', '월', '화', '수', '목', '금', '토'],
      dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
      showMonthAfterYear: true,
      yearSuffix: '년'
    });

    $(function() {
      $("#datepicker3,#datepicker1").datepicker({
        minDate: 0
      });
    });

    function check_input() {


      if (!document.country_form.product_num.value) {
        alert("상품번호를 입력해주세요.");
        document.country_form.product_num.focus();
        return;
      }
      if (!document.country_form.area.value) {
        alert("지역을 입력해주세요");
        document.country_form.area.focus();
        return;
      }
      if (!document.country_form.model.value) {
        alert("차종을 입력해주세요");
        document.country_form.model.focus();
        return;
      }
      if (!document.country_form.model_num.value) {
        alert("차 번호를 입력해주세요");
        document.country_form.model_num.focus();
        return;
      }
      if (!document.country_form.datepicker1.value) {
        alert("대여기간을 입력해주세요");
        document.country_form.datepicker1.focus();
        return;
      }
      if (!document.country_form.datepicker2.value) {
        alert("반납기간을 입력해주세요");
        document.country_form.datepicker2.focus();
        return;
      }
      if (!document.country_form.Fare.value) {
        alert("요금을 입력해주세요");
        document.country_form.Fare.focus();
        return;
      }
      if (!document.country_form.stock.value) {
        alert("재고를 입력해주세요");
        document.country_form.stock.focus();
        return;
      }
      if (!document.country_form.datepicker3.value) {
        alert("상품등록날짜를 입력해주세요");
        document.country_form.datepicker3.focus();
        return;
      }

      document.country_form.submit();
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
      <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav_admin_link.php"; ?>
    </div><!-- sidenav end -->

    <div class="main">
      <div style="color:rgb(156, 156, 156);">
         권한 등록/관리
      </div>

      <hr size="1" width="80%" align="left">
      <form action="countrt_insert.php" method="post" name="country_form">
        <table class="table1" style="width:70%;">
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 아 이 디</td>
            <td><input type="text" name="admin_id" class="div_none" placeholder="ex)영문, 숫자만 가능" autofocus></td>
          </tr>
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 비밀번호</td>
            <td><input type="text" name="admin_pass" class="div_none" placeholder="ex)영문, 숫자 특수문자 조합" autofocus></td>
          </tr>
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 이 름</td>
            <td><input type="text" name="admin_name" class="div_none" placeholder="ex)2,3자리 한글만 가능" autofocus></td>
          </tr>
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 권 한</td>
            <td>
              <input type="checkbox" name="auth_mb" value="auth_mb">&nbsp;멤버관리&nbsp;
              <input type="checkbox" name="auth_mt" value="auth_mt">&nbsp;이성찾기&nbsp;
              <input type="checkbox" name="auth_ra" value="auth_ar">&nbsp;추천/예약&nbsp;
              <input type="checkbox" name="auth_sh" value="auth_sh">&nbsp;쇼핑몰&nbsp;
              <input type="checkbox" name="auth_tt" value="auth_tt">&nbsp;테스트&nbsp;
              <input type="checkbox" name="auth_commu" value="auth_commu">&nbsp;커뮤니티&nbsp;
            </td>
          </tr>
        </table>
        <hr size="1" width="80%" align="left">
      </form>
      <div id="btn_cancel">
        <input id="flight_insert" type="button" onclick="check_input()" value="확  인">
      </div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>

    </div> <!-- main end -->
  </div> <!-- main_body end -->
  <!-- footer start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
  <!-- footer_bg end -->
</body>

</html>
