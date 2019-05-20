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


  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
  <script type="text/javascript">
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
    function check_input() {
      if (!document.country_form.admin_id.value) {
        alert("아이디를 입력해주세요.");
        document.country_form.admin_id.focus();
        return;
      }
      if (!document.country_form.admin_pass.value) {
        alert("비밀번호를 입력해주세요");
        document.country_form.admin_pass.focus();
        return;
      }
      if (!document.country_form.admin_name.value) {
        alert("이름을 입력해주세요");
        document.country_form.admin_name.focus();
        return;
      }
      if (!document.country_form.admin_right.value) {
        alert("권한을 입력해주세요");
        document.country_form.admin_right.focus();
        return;
      }

      document.country_form.submit();
    }
  </script>

</head>

<body>
  <!-- header start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
  <!-- header end -->
  <!-- main_body start -->
  <div class="main_body">
    <div id="sidenav" class="sidenav">
      <a href="#about">관 리 자</a>
      <a href="#services">맛집 관리</a>
      <a href="#clients">숙박 관리</a>
      <a href="ra_car_country_admin_insert.php">렌트카 관리</a>
      <a href="admin_a.php">권한 관리</a>
      <a href="company_info.php">회사정보 관리</a>
      <a href="main.php">메인 이미지 관리</a>
      <a href="order_takeback.php">반품&환불 관리</a>
      <a href="prd_a.php">답변내역 관리</a>
    </div><!-- sidenav end -->
    <div class="main">
      <div style="color:rgb(156, 156, 156);">
         권한부여
      </div>

      <hr size="1" width="80%" align="left">
      <form action="countrt_insert.php" method="post" name="country_form">
        <table class="table1" style="width:70%;">
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 아 이 디</td>
            <td><input type="text" name="admin_id" class="div_none" placeholder="ex) 영문, 숫자만 가능" autofocus></td>
          </tr>
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 키</td>
            <td><select class="" name="admin_tall" autofocus>
              <option>160cm&nbsp;</option>
              <option>165cm&nbsp;</option>
              <option>170cm&nbsp;</option>
              <option>175cm&nbsp;</option>
              <option>180cm&nbsp;</option>
            </select></td>
          </tr>
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 체 형</td>
            <td><select class="" name="admin_body" autofocus>
              <option>유료&nbsp;</option>/
              <option>무료&nbsp;</option>
            </select></td>
          </tr>
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 나 이</td>
            <td><select class="" name="admin_age" autofocus>
              <option>10대&nbsp;</option>/
              <option>20대&nbsp;</option>
              <option>30대&nbsp;</option>
              <option>40대&nbsp;</option>
              <option>50대&nbsp;</option>
            </select></td>
          </tr>
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 이성의 직업군</td>
            <td><select class="" name="admin_work" autofocus>
              <option>회사원&nbsp;</option>/
              <option>공무원&nbsp;</option>
              <option>연구원&nbsp;</option>
              <option>의사&nbsp;</option>
              </select></td>
          </tr>
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 첫만남 장소</td>
            <td><select class="" name="admin_place" autofocus>
              <option>회사원&nbsp;</option>/
              <option>공무원&nbsp;</option>
              <option>연구원&nbsp;</option>
              <option>의사&nbsp;</option>
              </select></td>
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
