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
      <a href="#about">관 리 자</a>
      <a href="#services">맛집 관리</a>
      <a href="#clients">숙박 관리</a>
      <a href="#services">렌트카 관리</a>
      <a href="admin_a.php">권한 관리</a>
      <a href="company_info.php">회사정보 관리</a>
      <a href="main.php">메인 이미지 관리</a>
      <a href="order_takeback.php">반품&환불 관리</a>
      <a href="prd_a.php">답변내역 관리</a>
    </div><!-- sidenav end -->

    <div class="main">
      <div style="color:rgb(156, 156, 156); width:10%;">
        렌트카 등록
      </div>
      <!-- <div class=""><img style="margin-right: 1270px; opacity:0.5; width:50px; height:50px; display: inline-block; float:right;" src="./img/Rental_cars.png" alt=""></div> -->

      <hr size="1" width="80%" align="left">
      <form action="countrt_insert.php" method="post" name="country_form">
        <table class="table1" style="width:60%;">
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 상품 번호</td>
            <td><input type="text" name="product_num" class="div_none" placeholder="ex)20190517서울1336" autofocus></td>
          </tr>
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 상품 제목</td>
            <td><input type="text" name="title" class="div_none" placeholder="ex)[롯데] 5월6월 렌터카" autofocus></td>
          </tr>
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 지 역</td>
            <td><input type="text" name="area" class="div_none" placeholder="ex)서울" autofocus></td>
          </tr>
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 차 종</td>
            <td><input type="text" name="model" class="div_none" placeholder="ex)아반떼, 스파크, 모닝" autofocus></td>
          </tr>
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 차 번 호</td>
            <td><input type="text" name="model_num" class="div_none" placeholder="ex)서울1336" autofocus></td>
          </tr>
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 대여 기간</td>
            <td><input type="text" id="datepicker1" name="datepicker1" class="div_none" placeholder="ex) 날짜를 선택해주세요." autofocus></td>
          </tr>
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 반납 기간</td>
            <td><input type="text" id="datepicker2" name="datepicker2" class="div_none" placeholder="ex) 날짜를 선택해주세요." autofocus></td>
          </tr>
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 요 금</td>
            <td><input type="text" name="Fare" class="div_none" placeholder="ex)57,000원" autofocus></td>
          </tr>
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 재 고</td>
            <td><input type="text" name="stock" class="div_none" placeholder="ex)1개" autofocus></td>
          </tr>
          <tr>
            <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 상품 등록 날짜</td>
            <td><input type="text" id="datepicker3" name="datepicker3" class="div_none" placeholder="ex) 날짜를 선택해주세요." autofocus></td>
          </tr>
          <tr>
            <td>렌트카 이미지 미리보기</td>
            <td><img id="profile_image3" style="width:100px;height:100px;"></td>
          </tr>
          <tr>
            <td><span style="color:rgb(240, 165, 0);">*</span> 렌트카 이미지 선택</td>
            <td><input onchange="change_img_upload3(this)" type="file" name="fileimage3" class="div_none" placeholder="ex) 날짜를 선택해주세요." autofocus></td>
          </tr>
          <tr>
            <td>상품설명 이미지 미리보기</td>
            <td><img id="profile_image1" style="width:100px;height:100px;"></td>
          </tr>
          <tr>
            <td><span style="color:rgb(240, 165, 0);">*</span> 상품설명 이미지 선택</td>
            <td><input onchange="change_img_upload1(this)" type="file" name="fileimage1" class="div_none" placeholder="ex) 날짜를 선택해주세요." autofocus></td>
          </tr>
          <tr>
            <td>상품정보 이미지 미리보기</td>
            <td><img id="profile_image2" style="width:100px;height:100px;"></td>
          </tr>
          <tr>
            <td><span style="color:rgb(240, 165, 0);">*</span> 상품정보 이미지 선택</td>
            <td><input onchange="change_img_upload2(this)" type="file" name="fileimage2" class="div_none" placeholder="ex)2019-05-22" autofocus></td>
          </tr>


        </table>

        <hr size="1" width="80%" align="left">
      </form>
      <div id="btn_cancel">
        <input id="flight_insert" type="button" onclick="check_input()" value="등  록">
        <input id="flight_insert" type="button" onclick="clear()" value="취  소">
      </div>


    </div> <!-- main end -->
  </div> <!-- main_body end -->
  <!-- footer start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
  <!-- footer_bg end -->
</body>

</html>
