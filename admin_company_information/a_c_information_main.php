<!-- 권한 관리 메인 -->
<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="./css/a_c_information_main.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
  <!-- <script type="text/javascript" src="../js/sign_update_check_ajax_main.js?ver=1"></script> -->
</head>

<body>
  <!-- header start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
  <!-- header end -->
  <!-- main_body start -->
  <div id="main_body" class="main_body">
    <div id="sidenav" class="sidenav">
      <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav_admin_link.php"; ?>
    </div><!-- sidenav end -->

    <div class="main">
      <div class="admin_title">
         LOTUS 정보
      </div>
      <hr class="title_hr">
      <form action="a_auth_qurey.php" method="post" name="a_auth_form">
        <table class="admin_table">
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 상 호 명</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 주식회사 lotus" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 대표자 이름</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 김 경 덕"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 주 소</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 성북구 신방빌딩"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 연 락 처</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 02-3495-1923"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 팩스 번호</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 050-3495-1923"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 이 메 일</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) jsa0jsa@naver.com"  autofocus></td>
          </tr>
        </table>
        <table class="admin_table">
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 개인정보 책임담당자</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 신 혜 지"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 운영 시간</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 09:00~18:00"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 사업자 번호</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 384SB신방빌딩"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 통신판매 신고여부</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 02-3495-1923"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 은 행</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 미래 은행"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 계좌 번호</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 054-29391-232311"  autofocus></td>
          </tr>
        </table>
        <table class="admin_table witdh_100">
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 회사 소개</td>
          </tr>
          <tr>
            <td class="tb_cont">
              <textarea name="product_num" class="div_none" placeholder="ex) 회사소개"  autofocus rows="8"></textarea>
            </td>
          </tr>
        </table>
      <hr class="title_hr">
      <div class="btn_center">
        <div class="btn_submit">
          <button type="reset" name="button">취 소</button>
          <button type="submit" name="button" onclick="check_input()">확 인</button>
        </div>
      </div>
    </form>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    </div> <!-- main end -->
  </div> <!-- main_body end -->
  <!-- footer start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
  <!-- footer_bg end -->
  <!-- <script src="../js/admin_effect_common.js"></script> -->
  <!-- Sticky event를 위해서 상단에 올리지 못함 -->
</body>

</html>
