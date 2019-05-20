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
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="./css/country0.css">
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
      <a>관 리 자</a>
      <a href="../admin_mb_mt/a_mb_mt_main.php">회원/매칭 관리</a>
      <a href="../admin_ra_cplx_exp/a_r_c_exp_main.php">맛집/체험 관리</a>
      <a href="../admin_ra_cplx_acm/a_r_c_acm_main.php">숙박 관리</a>
      <a href="../admin_ra_cplx_rent/a_r_c_rent_main.php">렌트카 관리</a>
      <a href="../admin_order_takeback/a_o_takeback_main.php">반품/취소/환불 관리</a>
      <a href="../admin_prd_qna/a_p_qna_main.php">문의/답변 관리</a>
      <a href="../admin_authority/a_auth_main.php">권한 관리</a>
      <a href="../admin_main_banner/a_m_banner_main.php">메인 이미지 관리</a>
      <a href="../admin_company_information/a_c_information_main.php">회사정보 관리</a>
    </div><!-- sidenav end -->

    <div class="main">
      <div style="color:rgb(156, 156, 156);">
         회원/매칭 관리
      </div>
      <hr size="1" width="80%" align="left">
        <table class="table1" style="width:60%;">

          <form class="" action="a_mb_mt_main.php" method="post">
            <tr>
              <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span>회원검색</td>
              <td colspan="5"><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
            </tr>
          </form>

          <form action="countrt_insert.php" method="post" name="country_form">
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 회원 구분</td>
            <td><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 블랙리스트여부</td>
            <td><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 좋아요 </td>
            <td><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 매칭 일자</td>
            <td><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 매칭 상대</td>
            <td colspan="3"><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 회원 번호</td>
            <td colspan="5"><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 아 이 디</td>
            <td colspan="5"><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 네이버 아이디</td>
            <td colspan="5"><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 카카오 아이디</td>
            <td colspan="5"><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 페이스북 아이디</td>
            <td colspan="5"><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 구글 아이디</td>
            <td colspan="5"><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 비밀번호</td>
            <td colspan="5"><input type="password" name="sender_id" class="div_none" placeholder="ex)" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 이  름</td>
            <td colspan="5"><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 이메일</td>
            <td colspan="5"><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 전화번호</td>
            <td colspan="5"><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 생  일</td>
            <td colspan="5"><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 성  별</td>
            <td colspan="5"><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 직  업</td>
            <td colspan="5"><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 키</td>
            <td colspan="5"><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 우편번호</td>
            <td colspan="5"><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 우편상세주소</td>
            <td colspan="5"><input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span style="color:rgb(240, 165, 0);">*</span> 자기소개</td>
            <td colspan="5"><textarea name="note_contents" rows="8" cols="150" autofocus></textarea></td>
          </tr>

        </table> <br>

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
