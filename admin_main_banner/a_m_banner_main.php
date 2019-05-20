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
        메인 이미지
      </div>
      <!-- <div id="server_time" style="font-size:14px"; align="center";></div> -->



      <hr size="1" width="80%" align="left">
      <form action="countrt_insert.php" method="post" name="country_form">
        <table class="table1" style="width:50%;  float:left;">
          <tr>
            <td style="width:210px; height:130px; text-align:center;">메인 이미지</td>
            <td><input onchange="change_img_upload1(this)" type="file" name="main" class="div_none" placeholder="ex)20190517서울1336" autofocus></td>
            <td style="width:100px;"><img id="profile_image1" style="width:100px;height:100px;"></td>
          </tr>
          <tr>
            <td style="width:210px; height:130px; text-align:center;">서브 이미지1</td>
            <td><input onchange="change_img_upload2(this)" type="file" name="sub1" class="div_none" placeholder="ex)[롯데] 5월6월 렌터카" autofocus></td>
            <td style="width:100px;"><img id="profile_image2" style="width:100px;height:100px;"></td>
          </tr>
          <tr>
            <td style="width:210px; height:130px; text-align:center;">서브 이미지2</td>
            <td><input onchange="change_img_upload3(this)" type="file" name="sub2" class="div_none" placeholder="ex)서울" autofocus></td>
            <td style="width:100px;"><img id="profile_image3" style="width:100px;height:100px;"></td>
          </tr>
            <td style="width:210px; height:130px; text-align:center;">서브 이미지3</td>
            <td><input onchange="change_img_upload4(this)" type="file" name="sub3" class="div_none" placeholder="ex)아반떼, 스파크, 모닝" autofocus></td>
            <td style="width:100px;"><img id="profile_image4" style="width:100px;height:100px;"></td>
          </tr>
            <td style="width:210px; height:130px; text-align:center;">서브 이미지4</td>
            <td><input onchange="change_img_upload5(this)" type="file" name="sub4" class="div_none" placeholder="ex)서울1336" autofocus></td>
            <td style="width:100px;"><img id="profile_image5" style="width:100px;height:100px;"></td>
          </tr>
        </table>
        <table style="width:30%; float:left;">
          <tr>
            <!-- <td style="width:200px;">메인 이미지 미리보기</td> -->

          </tr>
          <tr>
            <!-- <td style="width:200px;">서브 이미지1 미리보기</td> -->

          </tr>
          <tr>
            <!-- <td style="width:200px;">서브 이미지2 미리보기</td> -->

          </tr>
          <tr>
            <!-- <td style="width:200px;">서브 이미지3 미리보기</td> -->

          </tr>
          <tr>
            <!-- <td style="width:200px;">서브 이미지4 미리보기</td> -->

          </tr>
        </table>



        <hr size="1" width="80%" align="left" style="background-color:rgb(199, 199, 199);">
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
